<?php  

	/**
	* areaTableModel
	*/
	class CustomerGoodsPriceModel
	{
		public $Id;

		public $customerId;

		public $goodsId;

		public $name;

		public $sourcePrice;

		public $price;

		public $goodsRemark;

		public $remark;

		function __construct($row)
		{
			$this->Id=(int)$row['Id'];
			$this->customerId=(int)$row['customer_id'];
			$this->goodsId=(int)$row['goods_id'];
			$this->name=$row['name'];
			$this->sourcePrice=(double)$row['source_price'];
			$this->price=(double)$row['price'];
			$this->goodsRemark=$row['goods_remark'];
			$this->remark=$row['remark'];
		}
	}
?>