import $ from 'jquery';
import jQuery from 'jquery';
export function saveData() {
	const saveData = {
		date: $('#date').val(),
		group: $('#group').val(),
		lessons:{}
	};

	let date_validate = false;
	let lessons_validate = true;
	let calander_validate = false;

	for (var i = 1; i <= 6; i++) {


		if($(`#lesson-${i}`).val() == 0 || $(`#teacher-${i}`).val() == 0 || $(`#cabinet-${i}`).val() == 0){
			
			if(!($(`#lesson-${i}`).val() == 0 && $(`#teacher-${i}`).val() == 0 && $(`#cabinet-${i}`).val() == 0)){


				lessons_validate = false;
				break;
			}

		} else {

			
			saveData.lessons[i] = {
				lesson: $(`#lesson-${i}`).val(),
				teacher : $(`#teacher-${i}`).val(),
				cabinet : $(`#cabinet-${i}`).val()
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
				console.log('Data loaded');
			}
		});
	} else {
			errorForm();
	}
}

export function updateData() {
	let params = jQuery.param({
		date: $('#date').val(),
		group: $('#group').val(),
	});
	for(var k = 1; k <= 6; k++ ){
		$(`#lesson-${k}`).prop('disabled','disabled');
		$(`#teacher-${k}`).prop('disabled','disabled');
		$(`#cabinet-${k}`).prop('disabled','disabled');
	}
	$.ajax({
		url: 'php_querys/update_list_query.php' + '?' + params,
		method: 'get',
		dataType: 'json',
		success:function(data){
			for(var k = 1; k <= 6; k++ ){
				$(`#lesson-${k}`).prop('disabled',false);
				$(`#teacher-${k}`).prop('disabled',false);
				$(`#cabinet-${k}`).prop('disabled',false);
			}
			console.log(data['status']);	
			if(data['status'] == 'OK'){
				if(data.lessons.length == 0){
					for(var k = 1; k <= 6; k++ ){
							$(`#lesson-${k}`).val(0).change();;
							$(`#teacher-${k}`).val(0).change();;
							$(`#cabinet-${k}`).val(0).change();;
					}
				} else {
					for(var k = 1; k <= 6; k++ ){
						if(Object.hasOwn(data.lessons, k) == true){
							$(`#lesson-${k}`).val(data.lessons[k].lesson).change();;
							$(`#teacher-${k}`).val(data.lessons[k].teacher).change();;
							$(`#cabinet-${k}`).val(data.lessons[k].cabinet).change();;
						}
					}
				}
				console.log(data);
			}
			if(data['status'] == 'EMPTY') {
				for(var k = 1; k <= 6; k++ ){
						$(`#lesson-${k}`).val(0).change();;
						$(`#teacher-${k}`).val(0).change();;
						$(`#cabinet-${k}`).val(0).change();;
					}
			}
		}
	});
}

export function errorForm(){
	$('.error_window').css('opacity','1');
	setTimeout(() => { $('.error_window').css('opacity','0');}, 2000);
};