import $ from 'jquery';
import 'select2';                       // globally assign select2 fn to $ element
import 'select2/dist/css/select2.css';

import {saveData,updateData} from './modules/main.js';

$(document).ready(function() {
	$("#group").select2();
	$(".lesson").select2({
		width:300
	});
	$('.teacher').select2({
		width:450
	});
	$('.cabinet').select2({
		width:150
	});
});

$('.save').click(function(){
	saveData();
});

$('#date, #group').on('change', function() {
	updateData();
});


