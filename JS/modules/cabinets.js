import $ from 'jquery';
export function delete_cabinet(id) {
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

export function add_cabinet() {
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