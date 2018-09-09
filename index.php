<?php

	session_start();

	define('WEBSITE_URL', 'http://localhost/bevenja/apoteka/');
	define('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT'].'/bevenja/apoteka/');
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASS', '');
	define('DB_NAME', 'apoteka');
	// u main.js se nalazi jos jedna globalna promenjiva koja se mora izmeniti ako dodje do promene strukture fajlova
	// var WEBSITE_URL = 'http://localhost/bevenja/apoteka';


	// ovde negde napraviti verovatno preko sesije da ako nije setovana da se vrati na pocetnu stranu...
	function my_autoloader($classname) {
		require ('model/'.$classname.'.php');

	}
	spl_autoload_register('my_autoloader');

	// ovde mozda napraviti bolji ruter...
	if (empty($_GET['c']) && empty($_GET['m'])) {
		// echo "string";
		$_GET['c'] = 'home';
		$_GET['m'] = 'index';
	} else if (empty($_GET['m'])) {
		// echo "stffffring";
		$_GET['m'] = 'index';
	}

	// var_dump($_GET);
	$controller = $_GET['c'];
	define('CONTROLER', $_GET['c']);
	// var_dump(CONTROLER);
	$method = $_GET['m'];
	require 'controller/'.$controller.'.php';
	// require 'controller/'.CONTROLER.'.php';
	$c = new $controller;
	$c->$method();


	// treba jos: popraviti ruter. ubaciti datum vracanja. ubaciti js i validaciju.