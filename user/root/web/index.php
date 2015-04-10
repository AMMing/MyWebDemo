<?php 

	include_once('base.php');

	// // $http->views('index');


	$sql =new AdminAccessSql();
	$result= $sql->getList(1);
	// $result= $sql->get(1,3);
	// $result= $sql->add(151,312);
	// $result= $sql->delete(151,312);
	print_r($result);

	// $sql =new AdminTableSql();
	// $result= $sql->getList();
	// $result= $sql->get(39);
	// $result= $sql->add('ami2ng','asdadasdadsd3');
	// $result= $sql->update(38,'sssassssczxcd666');
	// $result= $sql->delete(38);
	// $result= $sql->login('admin','sssasd666');
	// if ($result) {
	// 	echo "ture";
	// }else{
	// 	echo "false";
	// }
	// print_r($result);
?>