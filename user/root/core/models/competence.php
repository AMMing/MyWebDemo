<?php  

	/**
	* areaTableModel
	*/
	class competenceModel
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