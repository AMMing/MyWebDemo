<?php 

	include_once('base.php');

	$cache = new CustomerGoodsPriceCache();
	// $result = $cache->getList(1);
	$result = $cache->get(5);

	print_r($result);
?>