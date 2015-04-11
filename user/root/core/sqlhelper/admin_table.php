<?php  

	/**
	* AdminTableSql
	*/
	class AdminTableSql extends SqlBase
	{
		public $tableName='admin_table';

		protected function newModel($sqlval){
			return new AdminTableModel($sqlval);
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

		function add($name, $password){
			$nowdate=date('Y-m-d H:i:s',time());

			$obj=array(
				'name'=>$name,
				'password'=>$password,
				'create_date'=>$nowdate,
				'login_date'=>$nowdate,
				'login_ip'=>'unlogin'
				);

			$where=array('name'=>$name);

			return parent::baseInsertWhere($obj,$where);
		}

		function update($id, $password){
			$obj=array(
				'password'=>$password
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

		function login($name,$pwd){
			$where = array(
				'name' => $name,
				'password' => $pwd
				);

			return parent::baseGetItemWhere($where);
		}
	}
?>