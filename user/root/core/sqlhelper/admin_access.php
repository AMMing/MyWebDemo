<?php  

	/**
	* mysql helper
	*/
	class AdminAccessSql extends BasaSql
	{
		public $tableName='admin_access';

		protected function newModel($sqlval){
			return new adminAccessModel($sqlval);
		}

		function getList(){
			$sqlstr= "SELECT * FROM `$this->tableName`";

			return parent::baseGetList($sqlstr);
		}

		function get($id){
            if(!is_int($id)){
            	return null;
            }
			$sqlstr= "SELECT * FROM `$this->tableName` WHERE `admin_id`=$id";

			return parent::baseGetItem($sqlstr);
		}

		function add($aid,$cid){
			$item = new stdClass();
			$item->admin_id=$aid;
			$item->competence_id=$cid;

			return parent::baseInsert($item);
		}

	}
?>