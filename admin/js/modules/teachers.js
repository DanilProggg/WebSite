import $ from 'jquery';

export function teacher(){
	$(".canvas-block-form-input").keyup(function(event) {
	    if (event.keyCode === 13) {
	        $("#add_teacher").click();
	    }
	});

	$('.del_teacher').on('click',function() {
	    var clickId = $(this).attr('id');
	    delete_teacher(clickId);
	});

	$('#add_teacher').on('click',function(){
		$("#add_teacher").prop("disabled",true);
		add_teacher();
	});
}

function delete_teacher(id) {
	$(`#teacher-${id}`).remove();
	let data_to_delete = {
		action:'DELETE',
		id:`${id}`
	}
	$.ajax({
			url: 'php_querys/teachers_query.php',
			method: 'post',
			dataType: 'json',
			contentType: 'application/json',
			data: JSON.stringify(data_to_delete),
			success:function(){
				console.log('Data deleted');
			}
		});
}

function add_teacher() {
	let data_to_add = {
		action:'ADD',
		surname :$('.surname').val(),
		name :$('.name').val(),
		patronymic : $('.patronymic').val()
	}	

		//создавать элемент при создании в таблице
	$.ajax({
			url: 'php_querys/teachers_query.php',
			method: 'post',
			dataType: 'json',
			contentType: 'application/json',
			data: JSON.stringify(data_to_add),
			success:function(){
				console.log(data_to_add);
			}
		});
	$(document).ajaxStop(function(){
	    window.location.reload();
	});	
}