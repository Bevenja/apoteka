<?php

include_once 'DB.php';

class ImgData extends DB {
	public static function insert_img($img_url, $title){
		$sql = 'INSERT INTO img (id, img_url, title) values (NULL, "'.$img_url.'", "'.$title.'");';
		$last_img_id = self::executeSQL($sql);
		// $last_img_id = $db->insert_id;
		return $last_img_id;
	}
}