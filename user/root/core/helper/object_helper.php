<?php

	/**
	* 
	*/
	class ObjectHelper
	{
		function getProp($instance)
		{
			$varArray = get_object_vars($instance);
			return array_keys($varArray);
		}

		function save($path,$content){
			$fp=fopen($path, 'w');
			fwrite($fp, $content);
			fclose($fp);
		}
	}
?>