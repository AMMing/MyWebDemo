<?php  

	/**
	* AdminTableSql
	*/
	class CustomerPriceSql extends SqlBase
	{
		public $tableName='customer_price';

		protected function newModel($sqlval){
			return new CustomerPriceModel($sqlval);
		}

		function getList(){
			return parent::baseGetListWhere();
		}

		function get($id){
			$where = array(
				'id' => $id
				);

			return parent::baseGetItemWhere($where);
		}
		function getByUser($cid,$gid){
			$where = array(
				'customer_id' => $cid,
				'goods_id' => $gid
				);

			return parent::baseGetItemWhere($where);
		}

		function add($cid, $gid, $price, $remark){
			$obj=array(
				'customer_id'=>$cid,
				'goods_id'=>$gid,
				'price'=>$price,
				'remark'=>$remark
				);

			$where=array(
				'customer_id'=>$cid,
				'goods_id'=>$gid
				);

			return parent::baseInsertWhere($obj,$where);
		}

		function update($id, $price, $remark){
			$obj=array(
				'price'=>$price,
				'remark'=>$remark
				);
			$where=array(
				'Id'=>$id
				);

			return parent::baseUpdate($obj,$where);
		}

		function delete($id){
			$where=array(
				'Id'=>$id
				);

			return parent::baseDelete($where);
		}
	}
?>