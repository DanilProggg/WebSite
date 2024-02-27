<?php
	include_once("config.php");
	include_once("check_auth.php");
?>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<link rel="stylesheet" type="text/css" href="styles/select2_override.css">
	<link rel="stylesheet" type="text/css" href="styles/main.css">
	<link rel="stylesheet" type="text/css" href="styles/adaptive.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">


</head>
<body>
	<?php include("db.php") ?>
	<header>
		<div class="header-logo">
			РАСПИСАНИЕ
		</div>
		<?php include("components/header.html") ?>
	</header>
	<div class="error_window">Ошибка в заполнении формы<br>(Проверте выбранали ли группа и дата, приавльно ли заполнена форма)</div>
	<div class="save_window">Расписание сохранено</div>
	<main>
		<nav class="menu">
			
			<?php include("components/nav.html") ?>
		</nav>
		<div class="canvas">
			
			<form method="get">
			<select name="group" onchange="this.form.submit()" id="group"><option value="0" selected disabled>Выберите группу</option>
				<?php 
					$result = mysqli_query($db, "SELECT * FROM группы ORDER BY группа ASC");
						while ($row = mysqli_fetch_array($result)){

							echo "<option value=".$row["id_группы"];

							if($_GET['group']==$row["id_группы"]) echo " selected";

							echo ">".$row["группа"]."</option>";
					}
				?>
			</select>
			</form>
			<div id="calendar">
				
			</div>
		</div>
	</main>
		<script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
	    <script type="text/javascript" src="js/dist/bundle.js"></script>
		<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
		<script>
			var queryString = window.location.search;
			queryString = queryString.replace(/[^0-9]/g, '');
			console.log(queryString);
			document.addEventListener('DOMContentLoaded', function() {
	        	var calendarEl = document.getElementById('calendar');
	        	var calendar = new FullCalendar.Calendar(calendarEl, {
	          		initialView: 'dayGridMonth',
	          		locale: 'ru',
	          		headerToolbar: {
				  		start: 'title',
				  		center: '',
					  	end: 'today prev,next'
					},

					dateClick: function(info) {
						console.log(info);					    				    
					},

					eventClick: function (info) {
						alert(info.event.title);
					},

					eventDidMount(info){
						$(info.el).attr('title',info.event.title);
					},


			  		dayMaxEvents: true, // for all non-TimeGrid views
					views: {
					    timeGrid: {
					    	dayMaxEvents: 6 // adjust to 6 only for timeGridWeek/timeGridDay
					    }
					},
			  	
	
					eventSources: [
			    		{
			      			url: '/admin/php_querys/get_lessons_json.php?group='+queryString,
			      			method: 'GET',
			      			color: 'yellow',   // a non-ajax option
			      			textColor: 'black' // a non-ajax option
			    		}
			    	]
			  	
	        	});
	        	calendar.render();
	        	});
		</script>

</body>
</html>