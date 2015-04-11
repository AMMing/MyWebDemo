<?php  

	/**
	* CustomerGoodsPriceSql
	*/
	class CustomerGoodsPriceCache
	{
		public $sqlhelper;

		function __construct()
		{
			$this->sqlhelper=new CustomerGoodsPriceSql();
		}

		function getList($cid){
			$area = array('admin','CustomerGoodsPrice','getList');
			$keys = array('cid' => $cid);
			$result = CacheHelper::getCache($area,$keys,function($a,$b){
				return $a->getList($b['cid']);
			},$this->sqlhelper);

			return CacheHelper::getData($result);
		}

		function get($id){
			$area = array('admin','CustomerGoodsPrice','get');
			$keys = array('id' => $id);
			$result = CacheHelper::getCache($area,$keys,function($a,$b){
				return $a->get($b['id']);
			},$this->sqlhelper);

			return CacheHelper::getData($result);
		}
	}
?>