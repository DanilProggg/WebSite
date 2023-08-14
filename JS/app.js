import $ from 'jquery';
import 'select2';                       // globally assign select2 fn to $ element
import 'select2/dist/css/select2.css';

import {saveData,updateData} from './modules/main.js';
import {delete_lesson,add_lesson} from './modules/lessons.js';
import {delete_teacher,add_teacher} from './modules/teachers.js';


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



	$('.save').click(function(){
	saveData();
	});

	$('#date, #group').on('change', function() {
		updateData();
	});

	$('.del_lesson').on('click',function() {
	    var clickId = $(this).attr('id');
	    delete_lesson(clickId);
	});

	$('#add_lesson').on('click',function(){
		$("#add_lesson").prop("disabled",true);
		add_lesson();

	});



	$('.del_teacher').on('click',function() {
	    var clickId = $(this).attr('id');
	    delete_teacher(clickId);
	});

	$('#add_teacher').on('click',function(){
		$("#add_teacher").prop("disabled",true);
		add_teacher();

	});


});

