<?php

class EmployeesProcess{
	public static function uploadingImgEmployees($files){
		$replace  = array(' ');
		// pod id = 6 u tabeli img je snimljen placeholder za osobe
		$img_id = 6;
		if ($files['img_id']['type'] == "image/jpeg" || $files['img_id']['type'] == "image/png" || $files['img_id']['type'] == "image/jpg" || $files['img_id']['type'] == "image/gig") {
			
			$files['img_id']['name'] = str_replace($replace, '_', $files['img_id']['name']);
			move_uploaded_file($files['img_id']['tmp_name'], DOCUMENT_ROOT.'assets/img/emploees/'.$files['img_id']['name']);
			$img_title = explode('.', $files['img_id']['name']);
			$last_img_id = ImgData::insert_img($files['img_id']['name'], $img_title[0]);
			$img_id = $last_img_id;
		}
		return $img_id;
	}



}

