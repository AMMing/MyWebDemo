<?php

	/**
	* HttpHelper
	*/
	class HttpHelper
	{
		//获取ip
		static function getIP() {
			$ip =$_SERVER["REMOTE_ADDR"];

			return $ip;
		}
		//重定向
		static function redirect($url){
			header('Location: '.$url);
			exit;
		}
		//是否post
		static function isPost(){
			return $_SERVER['REQUEST_METHOD']=='POST';
		}
		//返回json
		static function json($data){
			$json = json_encode($data);
			header('Content-type: text/json; charset=UTF-8');
			echo $json;
			exit;
		}
		//获取get的数据
		static function get($key){
			return $_GET[$key];
		}
		//获取post的数据
		static function post($key){
			return $_POST[$key];
		}
		//获取post的数据，如果没有就用默认值
		static function postd($key,$default){
			$val =$this->post($key);
			if($val==NULL||$val==""){
				return $default;
			}
			return $val;
		}
		//引用view文件
		static function views($name){
			include_once(SITE_ROOT_PATH.'/views/'.$name.'.php');
		}
		//设置utf-8的编码
		static function UTF8(){
			header("Content-Type: text/html; charset=utf-8");
		}
	}
?>