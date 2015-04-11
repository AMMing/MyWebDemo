<?php  

	/**
	* AdminTableSql
	*/
	class CompetenceSql extends SqlBase
	{
		public $tableName='competence';

		protected function newModel($sqlval){
			return new CompetenceModel($sqlval);
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
	}
?>