import $ from 'jquery';
import jQuery from 'jquery';
export function stats(){
	$('#statsadd-group').on('change',function(){
		$('.linked-groups-unit').remove();
		statsaddUpdate($('#statsadd-group').val());


	});

	$('.exist-groups-unit > .link_button').click(function(){
		let clickId = $(this).parent().attr('id').replace(/[^0-9]/g,"");
		statsaddAdd(clickId);
		console.log(clickId);
	});

	$('.delete_link_button').click(function(){
		let clickId = $(this).parent().attr('id').replace(/[^0-9]/g,"");
		statsaddDelete(clickId);
		console.log(clickId);
	});

	$('.delete_link_button').on('click',function(){
		console.log('click');
	});
}

function statsaddUpdate(groupId){
	$.ajax({
		url: 'php_querys/stats_query.php' + '?' + jQuery.param({group: $('#statsadd-group').val()}),
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
	console.log(statsData);
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