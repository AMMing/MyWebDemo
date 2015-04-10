<?php  

	/**
	* mysql helper
	*/
	class AdminTableSql extends BasaSql
	{
		public $tableName='admin_table';

		protected function newModel($sqlval){
			return new adminTableModel($sqlval);
		}

		function getList(){
			$sqlstr= "SELECT * FROM `$this->tableName`";

			return parent::baseGetList($sqlstr);
		}

		function get($id){
            if(!is_int($id)){
            	return null;
            }
			$sqlstr= "SELECT * FROM `$this->tableName` WHERE `Id`=$id";

			return parent::baseGetItem($sqlstr);
		}

		function add($name, $password){
			$nowdate=date('Y-m-d H:i:s',time());

			$item = new stdClass();
			$item->name=$name;
			$item->password=$password;
			$item->create_date=$nowdate;
			$item->login_date=$nowdate;
			$item->login_ip='unlogin';

			return parent::baseInsertWhere($item,"`name`='$name'");
		}

		function update($id, $password){
			$item = new stdClass();
			$item->password=$password;

			return parent::baseUpdate($item,"`Id`=$id");
		}
	}
?>