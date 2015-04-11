<?php

	/**
	* Html Helper
	*/
	class HtmlHelper
	{
		//引用css文件
		static function css($url){
			echo '<link href="'.$url.'?ver='.JsCssVer.'" rel="stylesheet" />';
		}
		//引用js文件
		static function js($url){
			echo '<script src="'.$url.'?ver='.JsCssVer.'"></script>';
		}
	}
?>