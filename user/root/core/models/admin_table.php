<?php  

	/**
	* areaTableModel
	*/
	class AdminTableModel
	{
		public $Id;

		public $name;

		public $password;

		public $createDate;

		public $loginDate;

		public $loginIp;

		function __construct($row)
		{
			$this->Id=(int)$row['Id'];
			$this->name=$row['name'];
			$this->password=$row['password'];
			$this->createDate=$row['create_date'];
			$this->loginDate=$row['login_date'];
			$this->loginIp=$row['login_ip'];
		}
	}
?>