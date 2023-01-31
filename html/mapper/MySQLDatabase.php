<?php
define ('DB_SERVER', 'db');
define ('DB_USER', 'dbuser');
define ('DB_PASSWORD', 'dbpassword');
define ('DB_DATABASE', 'rvr');

class MySQLDatabase {
	private static $instance;

	public static function getInstance(){
		if(!self::$instance){
			try{
				self::$instance  = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
				self::$instance->set_charset("utf8");
			}
			catch(Exception $e){
				echo self::$instance->connect_error;
			}
		}
		return self::$instance;
	}
}
?>
