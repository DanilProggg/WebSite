import $ from 'jquery';
import jQuery from 'jquery';
export function stats(){
	$('#statsadd-group').on('change',function(){
		statsaddUpdate($('#statsadd-group').val());
	});

	$('.exist-groups-unit > img').click(function(){
		var clickId = $(this).parent().attr('id');
		statsaddAdd(clickId);
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
					$('.linked-groups').append(`<div class="linked-groups-unit" id='${data[i].id}'><div class="linked-groups-unit-name">${data[i].name}</div><img src="img/cross.svg"></div>`);
				}
			}
		}
	});
}

function statsaddAdd(groupId){
	console.log(groupId);
	const saveData = {
		action:'ADD',
		id: groupId,
		name: $(`#${groupId}`).children('.exist-groups-unit-name').text()
	};
	$.ajax({
		url: 'php_querys/statsadd_query.php',
		method: 'post',
		dataType: 'json',
		contentType: 'application/json',
		data: JSON.stringify(saveData),
		success:function(saveData){
			console.log(saveData);

		}
	});
	$(document).ajaxStop(function(){
	    window.location.reload();
	});	

}