import $ from 'jquery';
export function lesson() {

	$(".canvas-block-form-input").keyup(function(event) {
	    if (event.keyCode === 13) {
	        $("#add_lesson").click();
	    }
	});

	$('.del_lesson').on('click',function() {
	    var clickId = $(this).parent().attr('id');
	    delete_lesson(clickId);
	});

	$('#add_lesson').on('click',function(){
		$("#add_lesson").prop("disabled",true);
		add_lesson();

	});
}

function delete_lesson(id) {
	$(`#${id}`).remove();
	let data_to_delete = {
		action:'DELETE',
		object:id
	}
	$.ajax({
		url: 'php_querys/lessons_query.php',
		method: 'post',
		dataType: 'json',
		contentType: 'application/json',
		data: JSON.stringify(data_to_delete),
		success:function(){
			console.log('Data deleted');
		}
	});
}


function add_lesson() {

	let data_to_add = {
	action:'ADD',
	object: $('.name').val()
	}


		//query to create lesson
	$.ajax({
			url: 'php_querys/lessons_query.php',
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