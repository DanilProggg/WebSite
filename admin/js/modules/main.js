import $ from 'jquery';
import jQuery from 'jquery';


export function select2_main(){
	if($(window).width() < 1390){
		$("#group").select2();
	$(".lesson").select2({
		width:250
	});
	$('.teacher').select2({
		width:250
	});
	$('.cabinet').select2({
		width:150
	});
} else{
		$("#group").select2();
	$(".lesson").select2({
		width:450
	});
	$('.teacher').select2({
		width:450
	});
	$('.cabinet').select2({
		width:150
	});
}
	

}

export function save(){
	$('.save').click(function(){
	saveData();
	});
}

export function update(){
	$('#date, #group').on('change', function() {
		if($('#date').val() != null && $('#group').val() != null){
			$('.save').prop("disabled",false);
		}
		console.log($('#date').val());
		console.log($('#group').val());
		updateData();
	});
}


function saveData() {
	
	const saveData = {
		date: $('#date').val(),
		group: $('#group').val(),
		lessons : {}
	};


	let date_validate = false;
	let lessons_validate = true;
	let calander_validate = false;

	for (var i = 1; i <= 6; i++) {
		//Если хотябы 1 элемент не выбран
		if($(`#lesson-${i}`).val() == 0 || $(`#teacher-${i}`).val() == 0 || $(`#cabinet-${i}`).val() == 0){
			if(!($(`#lesson-${i}`).val() == 0 && $(`#teacher-${i}`).val() == 0 && $(`#cabinet-${i}`).val() == 0)){
				lessons_validate = false;
				break;
			}
		} else{
			saveData.lessons[i] = {
				s_group_check_box: $(`#chk_table_list-${i}-2`).is(':checked'),
				lesson 	: 	$(`#lesson-${i}`).val(),
				teacher : 	$(`#teacher-${i}`).val(),
				cabinet : 	$(`#cabinet-${i}`).val(),
			}
		}

		if($(`#lesson-${i}-2`).val() == 0 || $(`#teacher-${i}-2`).val() == 0 || $(`#cabinet-${i}-2`).val() == 0){
			if(!($(`#lesson-${i}-2`).val() == 0 && $(`#teacher-${i}-2`).val() == 0 && $(`#cabinet-${i}-2`).val() == 0)){
				lessons_validate = false;
				break;
			}
		} else {
			saveData.lessons[`${i}-2`] = {
				s_group_check_box: $(`#chk_table_list-${i}-2`).is(':checked'),
				lesson 	: 	$(`#lesson-${i}-2`).val(),
				teacher : 	$(`#teacher-${i}-2`).val(),
				cabinet : 	$(`#cabinet-${i}-2`).val(),
			}
		}
		
	}		  
	//валидация календаря
	if(saveData.date === ""){
		calander_validate = false;
	} else {
		let d1 = new Intl.DateTimeFormat('en', {day:'numeric', month:'numeric', year: 'numeric' }).format(new Date());
		let d2 = new Intl.DateTimeFormat('en', {day:'numeric', month:'numeric', year: 'numeric' }).format(new Date(document.querySelector('#date').value));
		if(new Date(d1).getTime() > new Date(d2).getTime()){
			calander_validate = false;

		} else {
			calander_validate = true;
		}
	}
	//date
	if($('#group').val() != null){
		date_validate = true;
	}

	if(lessons_validate === true && calander_validate === true && date_validate === true) {
		console.log(JSON.stringify(saveData));
		$.ajax({
			url: 'php_querys/save_query.php',
			method: 'post',
			dataType: 'json',
			contentType: 'application/json',
			data: JSON.stringify(saveData),
			success:function(){
				console.log(saveData);
			}
		});
		saveForm();
	} else {
		errorForm();
	}
}

function updateData() {
	let params = jQuery.param({
		date: $('#date').val(),
		group: $('#group').val(),
	});
	for(var k = 1; k <= 6; k++ ){
		$(`#lesson-${k}`).prop('disabled','disabled');
		$(`#teacher-${k}`).prop('disabled','disabled');
		$(`#cabinet-${k}`).prop('disabled','disabled');

		$(`#lesson-${k}-2`).prop('disabled','disabled');
		$(`#teacher-${k}-2`).prop('disabled','disabled');
		$(`#cabinet-${k}-2`).prop('disabled','disabled');

		$(`#chk_table_list-${k}-2`).prop('checked', false);
		$(`#table_list-${k}-2`).css("display","none");
	}
	$.ajax({
		url: 'php_querys/update_list_query.php' + '?' + params,
		method: 'get',
		dataType: 'json',
		success:function(data){
			for(var k = 1; k <= 6; k++ ){
				//Делает селекты активными
				$(`#lesson-${k}`).prop('disabled',false);
				$(`#teacher-${k}`).prop('disabled',false);
				$(`#cabinet-${k}`).prop('disabled',false);

				$(`#lesson-${k}-2`).prop('disabled',false);
				$(`#teacher-${k}-2`).prop('disabled',false);
				$(`#cabinet-${k}-2`).prop('disabled',false);

				//Ставит значение селектов на 0

				$(`#lesson-${k}`).val(0).change();
				$(`#teacher-${k}`).val(0).change();
				$(`#cabinet-${k}`).val(0).change();

				$(`#lesson-${k}-2`).val(0).change();
				$(`#teacher-${k}-2`).val(0).change();
				$(`#cabinet-${k}-2`).val(0).change();
			}
			console.log(data['status']);	
			if(data['status'] == 'OK'){
				if(data.lessons.length == 0){
					for(var k = 1; k <= 6; k++ ){
							$(`#lesson-${k}`).val(0).change();
							$(`#teacher-${k}`).val(0).change();
							$(`#cabinet-${k}`).val(0).change();
					}
				} else {
					for(var k = 1; k <= 6; k++ ){
						try{
							if(data.lessons[k].s_group_check_box == true || data.lessons[k+"-2"].s_group_check_box == true){
								$(`#chk_table_list-${k}-2`).prop('checked', true);
								$(`#table_list-${k}-2`).css("display","table-row");
							}
						} catch(e){
							console.log("Exeption:"+e);
						}
						
						if(Object.hasOwn(data.lessons, k) == true){
								$(`#lesson-${k}`).val(data.lessons[k].lesson).change();
								$(`#teacher-${k}`).val(data.lessons[k].teacher).change();
								$(`#cabinet-${k}`).val(data.lessons[k].cabinet).change();
						} else {
								$(`#lesson-${k}`).val(0).change();
								$(`#teacher-${k}`).val(0).change();
								$(`#cabinet-${k}`).val(0).change();
						}
						if(Object.hasOwn(data.lessons,`${k}-2`) == true){
								
								$(`#chk_table_list-${k}-2`).prop('checked', true);
								$(`#table_list-${k}-2`).css("display","table-row");
								
								$(`#lesson-${k}-2`).val(data.lessons[`${k}-2`].lesson).change();
								$(`#teacher-${k}-2`).val(data.lessons[`${k}-2`].teacher).change();
								$(`#cabinet-${k}-2`).val(data.lessons[`${k}-2`].cabinet).change();
						} else {
								$(`#lesson-${k}-2`).val(0).change();
								$(`#teacher-${k}-2`).val(0).change();
								$(`#cabinet-${k}-2`).val(0).change();
						}
					}
				}
				console.log(data);
			}
			if(data['status'] == 'EMPTY') {
				for(var k = 1; k <= 6; k++ ){
						$(`#lesson-${k}`).val(0).change();
						$(`#teacher-${k}`).val(0).change();
						$(`#cabinet-${k}`).val(0).change();
					}
			}
		}
	});
}

export function errorForm(){
	$('.error_window').css('opacity','1');
	setTimeout(() => { $('.error_window').css('opacity','0');}, 2000);
};
function saveForm(){
	$('.save_window').css('opacity','1');
	setTimeout(() => { $('.save_window').css('opacity','0');}, 2000);
};

export function s_group(){
	$("#chk_table_list-1-2").click(function() {
    	// this function will get executed every time the #home element is clicked (or tab-spacebar changed)
	    if($(this).is(":checked")) // "this" refers to the element that fired the event
	    {
	       $('#table_list-1-2').css("display","table-row");
	    } else {
	    	$('#table_list-1-2').css("display","none");
	    	$(`#lesson-1-2`).val(0).change();
			$(`#teacher-1-2`).val(0).change();
			$(`#cabinet-1-2`).val(0).change();
	    }
	});
	$("#chk_table_list-2-2").click(function() {
    	// this function will get executed every time the #home element is clicked (or tab-spacebar changed)
	    if($(this).is(":checked")) // "this" refers to the element that fired the event
	    {
	       $('#table_list-2-2').css("display","table-row");
	    } else {
	    	$('#table_list-2-2').css("display","none");
	    	$(`#lesson-2-2`).val(0).change();
			$(`#teacher-2-2`).val(0).change();
			$(`#cabinet-2-2`).val(0).change();
	    }
	});
	$("#chk_table_list-3-2").click(function() {
    	// this function will get executed every time the #home element is clicked (or tab-spacebar changed)
	    if($(this).is(":checked")) // "this" refers to the element that fired the event
	    {
	       $('#table_list-3-2').css("display","table-row");
	    } else {
	    	$('#table_list-3-2').css("display","none");
	    	$(`#lesson-3-2`).val(0).change();
			$(`#teacher-3-2`).val(0).change();
			$(`#cabinet-3-2`).val(0).change();
	    }
	});
	$("#chk_table_list-4-2").click(function() {
    	// this function will get executed every time the #home element is clicked (or tab-spacebar changed)
	    if($(this).is(":checked")) // "this" refers to the element that fired the event
	    {
	       $('#table_list-4-2').css("display","table-row");
	    } else {
	    	$('#table_list-4-2').css("display","none");
	    	$(`#lesson-4-2`).val(0).change();
			$(`#teacher-4-2`).val(0).change();
			$(`#cabinet-4-2`).val(0).change();
	    }
	});
	$("#chk_table_list-5-2").click(function() {
    	// this function will get executed every time the #home element is clicked (or tab-spacebar changed)
	    if($(this).is(":checked")) // "this" refers to the element that fired the event
	    {
	       $('#table_list-5-2').css("display","table-row");
	    } else {
	    	$('#table_list-5-2').css("display","none");
	    	$(`#lesson-5-2`).val(0).change();
			$(`#teacher-5-2`).val(0).change();
			$(`#cabinet-5-2`).val(0).change();
	    }
	});
	$("#chk_table_list-6-2").click(function() {
    	// this function will get executed every time the #home element is clicked (or tab-spacebar changed)
	    if($(this).is(":checked")) // "this" refers to the element that fired the event
	    {
	       $('#table_list-6-2').css("display","table-row");
	    } else {
	    	$('#table_list-6-2').css("display","none");
	    	$(`#lesson-6-2`).val(0).change();
			$(`#teacher-6-2`).val(0).change();
			$(`#cabinet-6-2`).val(0).change();
	    }
	});
}