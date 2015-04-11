<?php  

	/**
	* BasaSql
	*/
	class SqlBase
	{
		public $sqlhelper;

		public $tableName;

		function __construct()
		{
			// $this->sqlhelper=new MYSQLHelper();
			$this->sqlhelper=new PDOHelper();
		}

		protected function newModel($sqlval){
			return 'null';
		}
		//手动写入sql语句
		protected function baseGetList($sqlstr,$args=null){
			$result= $this->sqlhelper->getListEx($sqlstr,$args);
			$list= array();
			foreach ($result as $item) {
				$model = $this->newModel($item);
				array_push($list, $model);
			}

			return $list;
		}
		//直接通过数组的条件进行生成sql语句
		protected function baseGetListWhere($where=null){
			$sql_where='';
			$args= array();
			if(count($where)>0){
				$sql_where='WHERE ';
				foreach ($where as $key => $value) {
					$sql_where.="`$key`=:$key AND";
					$args[':'.$key]=$value;
				}
				$sql_where=rtrim($sql_where,'AND');
			}

			$sqlstr= "SELECT * FROM `$this->tableName` $sql_where";

			$result= $this->sqlhelper->getListEx($sqlstr,$args);
			$list= array();
			foreach ($result as $item) {
				$model = $this->newModel($item);
				array_push($list, $model);
			}

			return $list;
		}

		//手动写入sql语句
		protected function baseGetItem($sql,$where){
			$result= $this->sqlhelper->getItemEx($sql,$where);
			if($result==NULL){
            	return null;
            }
			$model = $this->newModel($result);

			return $model;
		}
		//直接通过数组的条件进行生成sql语句
		protected function baseGetItemWhere($where){
			$list= $this->baseGetListWhere($where);

			if(count($list)<=0){
				return null;
			}
			$model= $list[0];

			return $model;
		}

		protected function baseInsert($obj){
			$sql_key='';
			$sql_val='';
			$args= array();
			foreach ($obj as $key => $value) {
				$sql_key.="`$key`,";
				$sql_val.=":$key,";
				$args[':'.$key]=$value;
			}
			$sql_key=rtrim($sql_key,',');
			$sql_val=rtrim($sql_val,',');
			$sqlstr= "INSERT INTO `$this->tableName` ($sql_key) VALUES ($sql_val)";

			$result= $this->sqlhelper->execEx($sqlstr,$args);

			return $result;
		}

		protected function baseInsertWhere($obj,$where){
			$sql_key='';
			$sql_val='';
			$args= array();
			foreach ($obj as $key => $value) {
				$sql_key.="`$key`,";
				$sql_val.=":$key,";
				$args[':'.$key]=$value;
			}
			$sql_key=rtrim($sql_key,',');
			$sql_val=rtrim($sql_val,',');

			$sql_where='';
			foreach ($where as $key => $value) {
				$sql_where.="`$key`=:$key AND";
				$args[':'.$key]=$value;
			}
			$sql_where=rtrim($sql_where,'AND');

			$sqlstr= "INSERT INTO `$this->tableName`($sql_key) SELECT $sql_val FROM DUAL WHERE NOT EXISTS(SELECT * FROM `$this->tableName` WHERE $sql_where)";

			$result= $this->sqlhelper->execEx($sqlstr,$args);

			return $result;
		}

		protected function baseUpdate($obj,$where){
			$sql_set='';
			$args= array();
			foreach ($obj as $key => $value) {
				$sql_set.="`$key`=:$key,";
				$args[':'.$key]=$value;
			}
			$sql_set=rtrim($sql_set,',');

			$sql_where='';
			foreach ($where as $key => $value) {
				$sql_where.="`$key`=:$key AND";
				$args[':'.$key]=$value;
			}
			$sql_where=rtrim($sql_where,'AND');

			$sqlstr= "UPDATE `$this->tableName` SET $sql_set WHERE $sql_where";

			$result= $this->sqlhelper->execEx($sqlstr,$args);

			return $result;
		}


		protected function baseDelete($where){
			$sql_where='';
			$args= array();
			foreach ($where as $key => $value) {
				$sql_where.="`$key`=:$key AND";
				$args[':'.$key]=$value;
			}
			$sql_where=rtrim($sql_where,'AND');

			$sqlstr= "DELETE FROM `$this->tableName` WHERE $sql_where";

			$result= $this->sqlhelper->execEx($sqlstr,$args);

			return $result;
		}
	}
?>