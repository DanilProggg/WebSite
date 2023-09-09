import $ from 'jquery';
import 'jquery.cookie';
import 'select2';                       // globally assign select2 fn to $ element
import 'select2/dist/css/select2.css';

import {save,update,select2_main} from './modules/main.js';
import {group} from './modules/groups.js';
import {lesson} from './modules/lessons.js';
import {teacher} from './modules/teachers.js';
import {cabinet} from './modules/cabinets.js';


$(document).ready(function() {
	select2_main();

	$.ajax({  //Ajax запрос - запрашивает все дисиплины для дальнейшего их использования
		url: 'php_querys/db_cleaner.php',
		method: 'get',
		success: function () {
		console.log("Data have been cleaned");
		}
	});

	//Удаление куков и тем самым выход из админки
	$(".header__container-exit").click(function(){
		$.cookie("login", null, { path: '/admin' });
		$.cookie("pass", null, { path: '/admin' });
   		location.reload();
	});

	save();
	group();
	update();
	lesson();
	teacher();
	cabinet();
	

});

