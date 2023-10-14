import $ from 'jquery';
import jQuery from 'jquery';
export function stats(){
	$('#statsadd-group').on('change',function(){
		var clickId = $(this).parent().attr('id');
		statsaddUpdate(clickId);
	});
}

function statsaddUpdate(groupId){
	$.ajax({
		url: 'php_querys/stats_query.php' + '?' + jQuery.param({group: $('#statsadd-group').val()}),
		method: 'get',
		dataType: 'json',
		success:function(data){
			console.log(data.length);
			if(data.length !=null) {
				for (var i = 0; i < data.length; i++) {
					$('.linked-groups').append(`<div class="linked-groups-unit" id='${data[i][id]}'><div class="exist-groups-unit-name">${data[i][name]}</div><img src="img/arrow-right.svg"></div>`);
				}
			}
		}
	});
}