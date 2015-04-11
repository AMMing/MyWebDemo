<?php

	/**
	* 文件helper
	*/
	class FileHelper
	{
		//读取文本内容
		static function read($path){
			$fp=fopen($path, 'r');
			$result=fread($fp, filesize($path));
			fclose($fp);

			return $result;
		}
		//保存文本内容
		static function save($path,$content){
			$fp=fopen($path, 'w');
			fwrite($fp, $content);
			fclose($fp);
		}
		//创建目录
		static function dir($dir){
			if(!is_dir($dir)){
				mkdir($dir,0777,true);
			}
		}
		//通过文件创建目录
		static function dirByPath($path){
			$dir = dirname($path);
			FileHelper::dir($dir);
		}
		//删除文件
		static function delete($path){
			if (file_exists($path)) {
				return unlink($path);
			}
			return false;
		}
		//删除所有文件
		static function deleteAll($dir){
			if(!is_dir($dir)) return;
			if(!$od=opendir($dir))return;

	        while(($file=readdir($od))!==false){
	        	if($file!="." && $file!="..") {
	        		FileHelper::delete($dir.'/'.$file);
			    }
	        }
		}
	}
?>