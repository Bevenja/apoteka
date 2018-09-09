<?php

class DB {
	private static $conn;
	private static $istance;
	private static function getInstance(){
		if (!isset(self::$conn)) {
			self::$istance = new self;
		}
		return self::$conn;
	}

	private function __construct(){
		self::$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		self::$conn->set_charset('utf8');
	}
	protected static function executeSQL($sql){
		$db = self::getInstance();
		$req = $db->query($sql);
		$last_img_id = $db->insert_id;
		return $last_img_id;
	}
	protected static function getData($sql){
		$db = self::getInstance();
		$req = $db->query($sql);
		$resault = $req->fetch_all(MYSQL_ASSOC);
		return $resault;
	}
	
}
