<?php  

	/**
	* mysql helper
	*/
	class AdminAccessSql extends SqlBase
	{
		public $tableName='admin_access';

		protected function newModel($sqlval){
			return new AdminAccessModel($sqlval);
		}

		function getList($id){
			$where = array(
				'admin_id' => $id
				);

			return parent::baseGetListWhere($where);
		}

		function get($aid,$cid){
			$where=array(
				'admin_id'=>$aid,
				'competence_id'=>$cid
				);

			return parent::baseGetItemWhere($where);
		}

		function add($aid,$cid){
			$obj=array(
				'admin_id'=>$aid,
				'competence_id'=>$cid
				);

			return parent::baseInsert($obj,$obj);
		}

		function delete($aid,$cid){
			$obj=array(
				'admin_id'=>$aid,
				'competence_id'=>$cid
				);

			return parent::baseDelete($obj,$obj);
		}
	}
?>