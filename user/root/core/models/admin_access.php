<?php  

	/**
	* areaTableModel
	*/
	class AdminAccessModel
	{
		public $adminId;

		public $competenceId;


		function __construct($row)
		{
			$this->adminId=(int)$row['admin_id'];
			$this->competenceId=(int)$row['competence_id'];
		}

	}
?>