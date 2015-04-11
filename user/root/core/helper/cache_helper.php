<?php

	/**
	* 缓存helper
	*/
	class CacheHelper
	{
		//获取缓存的key
		private static function getKey($keys){
			$temp = 'CacheKey';
			foreach ($keys as $key => $value) {
				$temp.='_'.$key.'_'.$value;
			}

			return $temp;
		}
		//获取缓存文件目录
		private static function getDir($area){
			$path = ROOT_PATH.'/cache';
			foreach ($area as $key => $value) {
				$path.='/'.$value;
			}

			return $path;
		}
		//获取缓存文件的路径
		private static function getPath($area, $cacheKey){
			$cacheKeyMD5=md5($cacheKey);
			$path = CacheHelper::getDir($area);
			$path.='/'.$cacheKeyMD5.'.cache.txt';

			return $path;
		}
		//获取缓存文件的内容并反序列化json
		private static function getCacheContent($path){
			if(!file_exists($path)){
				return null;
			}
			$json= FileHelper::read($path);
			$result = json_decode($json);

			return $result;
		}
		//保存缓存对象到缓存文件
		private static function saveCacheContent($path,$content){
			FileHelper::dirByPath($path);
			$json =json_encode($content);
			FileHelper::save($path,$json);
		}
		//判断缓存文件是否存在或者过期
		private static function isCacheOrTimeout($cacheObj){
			// 检查对象
			return
				is_null($cacheObj)||
				is_null($cacheObj->outtime)||
				$cacheObj->outtime < time()||
				is_null($cacheObj->data)
				;
			//// 检查数组
			// return
			// 	is_null($cacheObj)||
			// 	!array_key_exists('outtime', $cacheObj)||
			// 	$cacheObj['outtime'] < time()||
			// 	!array_key_exists('data', $cacheObj)||
			// 	is_null($cacheObj['data'])
			// 	;
		}
		//获取缓存内容如果不存在就从方法获取
		public static function getCache($area, $keys, $getMethod){
			$cacheKey = CacheHelper::getKey($keys);
			$path = CacheHelper::getPath($area,$cacheKey);
			$result = CacheHelper::getCacheContent($path);

			if (CacheHelper::isCacheOrTimeout($result)) {
				$content = $getMethod();
				$result = array(
					'from' => 'cache',
					'outtime' => strtotime('+'.CacheOutTime.' minute'),
					'data' => $content
					);
				CacheHelper::saveCacheContent($path, $result);
				$result['from'] ='method';
			}

			return $result;
		}
		//删除缓存文件
		public static function deleteCache($area, $keys){
			$cacheKey = CacheHelper::getKey($keys);
			$path = CacheHelper::getPath($area,$cacheKey);

			FileHelper::delete($path);
		}
		//删除某个缓存区域的全部文件
		public static function deleteALlCache($area){
			$path = CacheHelper::getDir($area);

			FileHelper::deleteAll($path);
		}
	}
?>