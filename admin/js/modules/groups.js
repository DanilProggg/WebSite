import $ from 'jquery';

export function group(){
	$(".canvas-block-form-input").keyup(function(event) {
	    if (event.keyCode === 13) {
	        $("#add_group").click();
	    }
	});

	$('.del_group').on('click',function() {
	    var clickId = $(this).attr('id');
	    delete_group(clickId);
	});

	$('#add_group').on('click',function(){
		$("#add_group").prop("disabled",true);
		add_group();
	});
}

function delete_group(id) {
	$(`#group-${id}`).remove();
	let data_to_delete = {
		action:'DELETE',
		object:`${id}`
	}
	$.ajax({
			url: 'php_querys/groups_query.php',
			method: 'post',
			dataType: 'json',
			contentType: 'application/json',
			data: JSON.stringify(data_to_delete),
			success:function(){
				console.log('Data deleted');
			}
		});
}

function add_group() {
	let data_to_add = {
		action:'ADD',
		object: $('.canvas-block-form-input').val()
	}	

		//создавать элемент при создании в таблице
	$.ajax({
			url: 'php_querys/groups_query.php',
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