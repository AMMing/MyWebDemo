<?php  

	/**
	* mysql helper
	*/
	class BasaSql
	{
		public $sqlhelper;

		public $tableName;

		function __construct()
		{
			$this->objectHelper=new ObjectHelper();
			$this->sqlhelper=new mysqlHelper();
		}

		protected function newModel($sqlval){
			return 'null';
		}

		protected function baseGetList($sqlstr){
			$result= $this->sqlhelper->getList($sqlstr);
			$list= array();
			foreach ($result as $item) {
				$model = $this->newModel($item);
				array_push($list, $model);
			}

			return $list;
		}

		protected function baseGetItem($sqlstr){
			$result= $this->sqlhelper->getItem($sqlstr);
			if($result==NULL){
            	return null;
            }
			$model = $this->newModel($result);

			return $model;
		}

		protected function baseInsert($obj){
			$sql_key='';
			$sql_val='';
			foreach ($obj as $key => $value) {
				$sql_key.="`$key`,";
				if(is_string($value)){
					$sql_val.="'$value',";
				}else{
					$sql_val.="$value,";
				}
			}
			$sql_key=rtrim($sql_key,',');
			$sql_val=rtrim($sql_val,',');
			$sqlstr= "INSERT INTO `$this->tableName` ($sql_key) VALUES ($sql_val)";

			$result= $this->sqlhelper->addItem($sqlstr);

			return $result;
		}

		protected function baseInsertWhere($obj,$where){
			$sql_key='';
			$sql_val='';
			foreach ($obj as $key => $value) {
				$sql_key.="`$key`,";
				if(is_string($value)){
					$sql_val.="'$value',";
				}else{
					$sql_val.="$value,";
				}
			}
			$sql_key=rtrim($sql_key,',');
			$sql_val=rtrim($sql_val,',');
			$sqlstr= "IF NOEXISES";
			$sqlstr= "INSERT INTO `$this->tableName`($sql_key) SELECT $sql_val FROM DUAL WHERE NOT EXISTS(SELECT * FROM `$this->tableName` WHERE $where)";

			$result= $this->sqlhelper->addItem($sqlstr);

			return $result;
		}

		protected function baseUpdate($obj,$where){
			$sql_set='';
			foreach ($obj as $key => $value) {
				$sql_set.="`$key`=";
				if(is_string($value)){
					$sql_set.="'$value',";
				}else{
					$sql_set.="$value,";
				}
			}
			$sql_set=rtrim($sql_set,',');
			$sqlstr= "UPDATE `$this->tableName` SET $sql_set WHERE $where";

			$result= $this->sqlhelper->addItem($sqlstr);

			return $result;
		}
	}
?>