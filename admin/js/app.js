import $ from 'jquery';
import 'jquery.cookie';
import 'select2';                       // globally assign select2 fn to $ element
import 'select2/dist/css/select2.css';

import {save,update,select2_main,s_group,update_group} from './modules/main.js';
import {group} from './modules/groups.js';
import {lesson} from './modules/lessons.js';
import {teacher} from './modules/teachers.js';
import {cabinet} from './modules/cabinets.js';
import {stats} from './modules/stats.js';


$(document).ready(function() {
	

	//Удаление куков и тем самым выход из админки
	$(".header__container-exit").click(function(){
		$.cookie("login", null, { path: '/admin' });
		$.cookie("pass", null, { path: '/admin' });
   		location.reload();
	});


/* Components */
	save();
	stats();
	group();
	update();
	lesson();
	teacher();
	cabinet();

	
	

	s_group(); //2 подгруппа

	
		$("#group,.group").select2();
		$(".lesson").select2();
		$('.teacher').select2();
		$('.cabinet').select2();

});

