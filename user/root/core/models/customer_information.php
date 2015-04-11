<?php  

	/**
	* areaTableModel
	*/
	class CustomerInformationModel
	{
		public $Id;

		public $name;

		public $shortName;

		public $phones;

		public $remark;

		public $address;

		function __construct($row)
		{
			$this->Id=(int)$row['Id'];
			$this->name=$row['name'];
			$this->shortName=$row['short_name'];
			$this->phones=$row['phones'];
			$this->remark=$row['remark'];
			$this->address=$row['address'];
		}
	}
?>