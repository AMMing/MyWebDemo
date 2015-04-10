<?php

	// config
	include_once(CORE_PATH.'/config.php');
	include_once(CORE_PATH.'/mysql_config.php');
	// models
	include_once(CORE_PATH.'/models/admin_access.php');
	include_once(CORE_PATH.'/models/admin_table.php');
	include_once(CORE_PATH.'/models/competence.php');
	include_once(CORE_PATH.'/models/customer_information.php');
	include_once(CORE_PATH.'/models/customer_price.php');
	include_once(CORE_PATH.'/models/goods_table.php');
	// helper
	include_once(CORE_PATH.'/helper/object_helper.php');
	include_once(CORE_PATH.'/helper/http_helper.php');
	include_once(CORE_PATH.'/helper/html_helper.php');
	include_once(CORE_PATH.'/helper/file_helper.php');
	// method
	// sql helper
	// include_once(CORE_PATH.'/sqlhelper/helper.php');
	include_once(CORE_PATH.'/sqlhelper/pdohelper.php');
	include_once(CORE_PATH.'/sqlhelper/basaSql.php');
	include_once(CORE_PATH.'/sqlhelper/admin_access.php');
	include_once(CORE_PATH.'/sqlhelper/admin_table.php');

?>