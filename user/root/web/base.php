<?php

	// include php files
	define('ROOT_PATH',dirname(dirname(__FILE__)));
	define('CORE_PATH',ROOT_PATH.'/core');
	define('SITE_ROOT_PATH',ROOT_PATH.'/web');

	include_once(CORE_PATH.'/include.php');

	//http
	$http = new HttpHelper();

	header("Content-Type: text/html; charset=utf-8");

?>