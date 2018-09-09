<?php

include_once 'DB.php';

class AdvicesData extends DB {

	public static function all_advices_description($where = ''){
		$sql = 'select a.id, a.title, a.description, a.time, i.img_url, i.title as img_title, p.first_name, p.last_name, a.status from advices as a inner join img as i on a.img_id = i.id inner join employees as e on a.employees_id = e.id inner join person as p on e.person_id = p.id '.$where.' ORDER BY p.id DESC';
		$all_advices = self::getData($sql);
		return $all_advices;
		
	}

	public static function single_advice($id){
		$sql = 'select a.id, a.title, a.description, a.advice_text, a.time, i.img_url, i.title as img_title, p.first_name, p.last_name, a.status from advices as a inner join img as i on a.img_id = i.id inner join employees as e on a.employees_id = e.id inner join person as p on e.person_id = p.id where a.id = '.$id;
		$single_advice = self::getData($sql);
		return $single_advice;
	}
	public static function all_advices(){
		$sql = 'select * from advices ORDER BY time DESC';
		$all_advices = self::getData($sql);
		return $all_advices;
	}

	public static function change_advice($title, $description, $advice_text, $employees_id, $img_id, $status, $advices_id){
		// $db = self::connection();
		$advice_text = mysqli_real_escape_string($db , $advice_text);
		$sql = 'UPDATE advices SET title = "'.$title.'", description = "'.$description.'" , advice_text = "'.$advice_text.'", time = NOW() , employees_id = '.$employees_id.', img_id = '.$img_id.' ,  status = '.$status.' WHERE id ='.$advices_id;
		self::executeSQL($sql);
		// $res = $db->query($sql);
	}

	public static function add_advice($title, $description, $advice_text, $employees_id, $img_id, $status){
		// $db = self::connection();
		$sql = 'INSERT INTO advices (id, title, description, advice_text, time, employees_id, img_id, status) values (NULL, "'.$title.'", "'.$description.'", "'.$advice_text.'", NOW(), '.$employees_id.', '.$img_id.', '.$status.');';
		self::executeSQL($sql);
		// $res = $db->query($sql);
	}
}
