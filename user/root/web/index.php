<?php 

	include_once('base.php');

	// $http->views('index');


	// $sql =new AdminAccessSql();
	// // $result= $sql->getList();
	// // $result= $sql->getItem(1);
	// // $result= $sql->addItem(12,3);
	// $result= $sql->updateItem(12,666);
	// print_r($result);

	$sql =new AdminTableSql();
	// $result= $sql->getList();
	// $result= $sql->get(1);
	$result= $sql->add('ami2ng','asdadasdadsd3');
	// $result= $sql->update(1,'sss666');
	print_r($result);
?>