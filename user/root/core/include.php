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
	include_once(CORE_PATH.'/models/customer_goods_price.php');

	// helper
	include_once(CORE_PATH.'/helper/http_helper.php');
	include_once(CORE_PATH.'/helper/html_helper.php');
	include_once(CORE_PATH.'/helper/file_helper.php');
	// include_once(CORE_PATH.'/helper/mysql_helper.php');
	include_once(CORE_PATH.'/helper/pdo_helper.php');
	include_once(CORE_PATH.'/helper/sql_base.php');
	include_once(CORE_PATH.'/helper/cache_helper.php');

	// helper ex
	include_once(CORE_PATH.'/helper/ex/getPingYing.php');
	// method

	// sql helper
	include_once(CORE_PATH.'/sqlhelper/admin_access.php');
	include_once(CORE_PATH.'/sqlhelper/admin_table.php');
	include_once(CORE_PATH.'/sqlhelper/competence.php');
	include_once(CORE_PATH.'/sqlhelper/customer_information.php');
	include_once(CORE_PATH.'/sqlhelper/customer_price.php');
	include_once(CORE_PATH.'/sqlhelper/goods_table.php');
	include_once(CORE_PATH.'/sqlhelper/customer_goods_price.php');

	// cache helper
	include_once(CORE_PATH.'/method/cache/customer_goods_price.php');
?>