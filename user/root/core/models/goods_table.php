<?php  

	/**
	* areaTableModel
	*/
	class goodsTableModel
	{
		public $Id;

		public $name;

		public $price;

		public $remark;

		function __construct($row)
		{
			$this->Id=(int)$row['Id'];
			$this->name=$row['name'];
			$this->price=(double)$row['price'];
			$this->remark=$row['remark'];
		}
	}
?>