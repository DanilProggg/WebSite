import $ from 'jquery';

export function cabinet(){
	$(".canvas-block-form-input").keyup(function(event) {
	    if (event.keyCode === 13) {
	        $("#add_cabinet").click();
	    }
	});

	$('.del_cabinet').on('click',function() {
	    var clickId = $(this).attr('id');
	    delete_cabinet(clickId);
	});

	$('#add_cabinet').on('click',function(){
		$("#add_cabinet").prop("disabled",true);
		add_cabinet();
	});
}

function delete_cabinet(id) {
	$(`#cabinet-${id}`).remove();
	let data_to_delete = {
		action:'DELETE',
		object:`${id}`
	}
	$.ajax({
			url: 'php_querys/cabinets_query.php',
			method: 'post',
			dataType: 'json',
			contentType: 'application/json',
			data: JSON.stringify(data_to_delete),
			success:function(){
				console.log('Data deleted');
			}
		});
}

function add_cabinet() {
	let data_to_add = {
		action:'ADD',
		object: $('.canvas-block-form-input').val()
	}	

		//создавать элемент при создании в таблице
	$.ajax({
			url: 'php_querys/cabinets_query.php',
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