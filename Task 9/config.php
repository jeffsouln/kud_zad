<?php
define("DSN","mysql:host=localhost;dbname=kudos;charset=utf8") ;
define ("USER", "root");
define ("PASS", "");

class Autoloader{
	public static function autoloadClass($className){
		if (file_exists($className.".class.php")) {
			include($className.".class.php");
		}	
	}

	public static function autoloadInterface($className){
		if (file_exists($className.".interface.php")) {
			require($className.".interface.php");
		}
	}
}
spl_autoload_register("Autoloader::autoloadClass");
spl_autoload_register("Autoloader::autoloadInterface");
