<?php
	namespace Luckerman;
	
	class Autoloader{
		protected static $classMap = array();
		
		public static function load($class){
			$class_file = str_replace('\\','/',dirname(dirname(__FILE__)).'/'.$class.'.php');	
			//echo $class_file."<br>";
			if(!isset(self::$classMap[$class])){
				if(file_exists($class_file)){
					require_once $class_file;
					self::$classMap[$class] = $class;
					return true;
				}else{
					return false;	
				}
			}else{
				return true;
			}
		}	
	}
	
	spl_autoload_register('\Luckerman\Autoloader::load');
	\Luckerman\Library\Lucker::run();
?>