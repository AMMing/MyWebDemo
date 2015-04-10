<?php  

	/**
	* areaTableModel
	*/
	class customerPriceModel
	{
		public $Id;

		public $customerId;

		public $goodsId;

		public $price;

		public $remark;

		function __construct($row)
		{
			$this->Id=(int)$row['Id'];
			$this->customerId=(int)$row['customer_id'];
			$this->goodsId=(int)$row['goods_id'];
			$this->price=(double)$row['price'];
			$this->remark=$row['remark'];
		}
	}
?>