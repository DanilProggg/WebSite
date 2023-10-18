import $ from 'jquery';
import jQuery from 'jquery';
export function stats(){
	$('#statsadd-group').on('change',function(){
		$('.linked-groups-unit').remove();
		statsaddUpdate($('#statsadd-group').val());


	});

	$(document).on('change', '#stats-group', function(){
		$('.canvas-stats_group_list-unit').remove();
		statsUpdate($('#stats-group').val());
		console.log($('#stats-group').val());
	});


	$(document).on('change', '.planed-hours', function(){
		let clickId = $(this).parent().attr('id');
		hoursUpdate(clickId);
	});

	//--------

	$(document).on('click touchstart', '.link_button', function(){
		let clickId = $(this).parent().attr('id').replace(/[^0-9]/g,"");
		statsaddAdd(clickId);
		console.log(clickId);
	});


	$(document).on('click touchstart', '.delete_link_button', function(){ 
        let clickId = $(this).parent().attr('id').replace(/[^0-9]/g,"");
		statsaddDelete(clickId);
		console.log(clickId);
    });
}


function statsUpdate(groupId){
	$.ajax({
		url: 'php_querys/stats_query.php' + '?' + jQuery.param({group: groupId}),
		method: 'get',
		dataType: 'json',
		success:function(data){
			console.log(data);
			if(data.length !=null) {
				for (var i = 0; i < data.length; i++) {
					let persent = data[i].past_hours / data[i].planed_hours * 100;
					persent = parseInt(persent);
					if(data[i].past_hours == 0){
						persent = 0;
					}
					$('.canvas-stats_group_list').append(`<div class="canvas-stats_group_list-unit" id='${data[i].id_stats}'>
						<div class="canvas-stats_group_list-unit-name">${data[i].lesson_name}</div>
						<input class="planed-hours" value='${data[i].planed_hours}'>
						<div class="past-hours">${data[i].past_hours}</div>
						<div class="persent">${persent}%</div></div>`);
				}
			}
		}
	});
}



function statsaddUpdate(groupId){
	$.ajax({
		url: 'php_querys/statsadd_get_query.php' + '?' + jQuery.param({group: $('#statsadd-group').val()}),
		method: 'get',
		dataType: 'json',
		success:function(data){
			console.log(data);
			if(data.length !=null) {
				for (var i = 0; i < data.length; i++) {
					$('.linked-groups').append(`<div class="linked-groups-unit" id='linked-${data[i].id}'><div class="linked-groups-unit-name">${data[i].name}</div><div class="delete_link_button">Удалить</div></div>`);
				}
			}
		}
	});
}

function statsaddAdd(lessonId){

	const statsData = {
		action:'ADD',
		id: $('#statsadd-group').val(),
		lesId: lessonId
	};
	let block_text = $(`#exist-${lessonId}`).children('.exist-groups-unit-name').text();
	$('.linked-groups').append(`<div class="linked-groups-unit" id='linked-${lessonId}'><div class="linked-groups-unit-name">${block_text}</div><div class="delete_link_button">Удалить</div></div>`);

	$.ajax({
		url: 'php_querys/statsadd_query.php',
		method: 'post',
		dataType: 'json',
		contentType: 'application/json',
		data: JSON.stringify(statsData),
		success:function(){
			console.log();

		}
	});

}

function statsaddDelete(lessonId){

	const statsData = {
		action:'DELETE',
		id: $('#statsadd-group').val(),
		lesId: lessonId
	};

	$(`#linked-${lessonId}`).remove();

	$.ajax({
		url: 'php_querys/statsadd_query.php',
		method: 'post',
		dataType: 'json',
		contentType: 'application/json',
		data: JSON.stringify(statsData),
		success:function(){
			console.log("sended");
			console.log(statsData);
		}
	});

}

function hoursUpdate(id){

	const stats = {
		action:'UPDATE',
		id: id,
		hours: $(`#${id}`).children('.planed-hours').val()
	};
	$.ajax({
		url: 'php_querys/statsadd_query.php',
		method: 'post',
		dataType: 'json',
		contentType: 'application/json',
		data: JSON.stringify(stats),
		success:function(){
			console.log(stats);
		}
	});

}