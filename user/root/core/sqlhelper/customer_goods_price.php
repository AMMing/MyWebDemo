<?php  

	/**
	* CustomerGoodsPriceSql
	*/
	class CustomerGoodsPriceSql extends SqlBase
	{
		protected function newModel($sqlval){
			return new CustomerGoodsPriceModel($sqlval);
		}

		private $sqlSelect = "SELECT `customer_price`.`Id` AS `Id`, `customer_price`.`customer_id` AS `customer_id`, `customer_price`.`goods_id` AS `goods_id`, `customer_price`.`price` AS `price`, `customer_price`.`remark` AS `remark`, `goods_table`.`name` AS `name`, `goods_table`.`price` AS `source_price`, `goods_table`.`remark` AS `goods_remark`  FROM `customer_price` , `goods_table` WHERE `customer_price`.`goods_id` = `goods_table`.`Id` ";

		function getList($cid){
			$sql = $this->sqlSelect." AND `customer_price`.`customer_id` = :cid";
			$where = array(
				':cid' => $cid
				);

			return parent::baseGetList($sql,$where);
		}

		function get($id){
			$sql = $this->sqlSelect." AND `customer_price`.`Id` = :id";
			$where = array(
				':id' => $id
				);

			return parent::baseGetItem($sql,$where);
		}
	}
?>