<?php 

	// mysql config
	// define('MYSQL_SERVER_NAME','localhost');
	// define('MYSQL_USERNAME','xxx');
	// define('MYSQL_PASSWORD','xxx');
	// define('MYSQL_DATABASE','xxx');

	if(defined('MYSQL_USERNAME')){
		// hostker
		define('MYSQL_SERVER_NAME','localhost');
	}else{
		// aliyun
		define('MYSQL_SERVER_NAME','y2443mysql.mysql.rds.aliyuncs.com:3307');
		define('MYSQL_USERNAME','kcvp_web');
		define('MYSQL_PASSWORD','sql2443');
		define('MYSQL_DATABASE','my_client');
	}
?>