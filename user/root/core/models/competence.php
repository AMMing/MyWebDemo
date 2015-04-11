<?php  

	/**
	* areaTableModel
	*/
	class CompetenceModel
	{
		public $Id;

		public $name;


		function __construct($row)
		{
			$this->Id=(int)$row['Id'];
			$this->name=$row['name'];
		}
	}
?>