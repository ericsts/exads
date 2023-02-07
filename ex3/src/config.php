<?php
define('HOST','db');
define('DBNAME','exads');
define('USER','exads');
define('PWD','exads');

class ConnectionDB{

	private static $conn = null;

	private function __construct(){}

	public static function getInstance(){
		if(!isset(self::$conn)){
			try{
				self::$conn = new mysqli(HOST, USER, PWD, DBNAME);
			}catch(PDOException $e){
				print "Error: ".$e->getMessage();
			}
		}
		return self::$conn;
	}
}
