<?php  

	/**
	* AdminTableSql
	*/
	class GoodsTableSql extends SqlBase
	{
		public $tableName='goods_table';

		protected function newModel($sqlval){
			return new GoodsTableModel($sqlval);
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

		function add($name, $price, $remark){
			$nowdate=date('Y-m-d H:i:s',time());

			$obj=array(
				'name'=>$name,
				'price'=>$price,
				'remark'=>$remark
				);

			$where=array('name'=>$name);

			return parent::baseInsertWhere($obj,$where);
		}

		function update($id, $name, $price, $remark){
			$obj=array(
				'name'=>$name,
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