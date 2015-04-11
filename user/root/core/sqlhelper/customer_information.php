<?php  

	/**
	* AdminTableSql
	*/
	class CustomerInformationSql extends SqlBase
	{
		public $tableName='customer_information';

		protected function newModel($sqlval){
			return new CustomerInformationModel($sqlval);
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

		function add($name, $phones, $remark, $address){
			$py = new PinYin();
			// $sname=$py->getAllPY($name);
			$sname=$py->getFirstPY($name);

			$obj=array(
				'name'=>$name,
				'short_name'=>$sname,
				'phones'=>$phones,
				'remark'=>$remark,
				'address'=>$address
				);

			$where=array('name'=>$name);

			return parent::baseInsertWhere($obj,$where);
		}

		function update($id,$name, $phones, $remark, $address){
			$py = new PinYin();
			// $sname=$py->getAllPY($name);
			$sname=$py->getFirstPY($name);
			$obj=array(
				'name'=>$name,
				'short_name'=>$sname,
				'phones'=>$phones,
				'remark'=>$remark,
				'address'=>$address
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

		function find($name,$sname){
			$sqlstr= "SELECT * FROM `$this->tableName` WHERE `name` LIKE :name OR `short_name` LIKE :sname";
			$obj=array(
				':name'=>$name,
				':sname'=>$sname
				);

			return parent::baseGetList($sqlstr,$obj);
		}
	}
?>