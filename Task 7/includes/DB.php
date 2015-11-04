<?php

// klasa DB daje instancu klase PDO, singlton 
class DB {																
	private static $instance = null;
	
	final private function __construct() { }
	final private function __clone() { }

	public static function getInstance() {
		if (!self::$instance) {
			self::$instance = new PDO('mysql:dbname=delivery_methods;host=localhost', 'root', '');  //!!! vrednosti DSN, USERNAME i PASSWORD su hardkodirane za potrebe testiranja 
			}
		return self::$instance;
	}
}