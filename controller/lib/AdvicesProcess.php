<?php

include_once 'model/DB.php';
include_once 'model/ImgData.php';

class AdvicesProcess {

	public static function changeAdvice($post, $files){

		$changeAdviceData = array();
		$replace  = array(' ');
		
		if ($post['description'] == '') {
			$changeAdviceData['description'] = $post['description_old'];
		} else {
			$changeAdviceData['description'] = $post['description'];
		}

		if ($files['advice_text']['size'] == 0 || $files['advice_text']['type'] != "text/plain") {
			$changeAdviceData['advice_text'] = $post['advice_text_old'];
		} else {
			$files['advice_text']['name'] = str_replace($replace, '_', $files['advice_text']['name']);
			$changeAdviceData['advice_text'] = file_get_contents($files['advice_text']['tmp_name']);
		}

		if ($files['img_id']['size'] ==0) {
			$changeAdviceData['img_id'] = $post['img_id_old'];
		} else if ($files['img_id']['type'] != "image/jpeg" && $files['img_id']['type'] != "image/png" && $files['img_id']['type'] != "image/jpg" && $files['img_id']['type'] != "image/gig") {
			$changeAdviceData['img_id'] = $post['img_id_old'];
		} else {
			$files['img_id']['name'] = str_replace($replace, '_', $files['img_id']['name']);
			move_uploaded_file($files['img_id']['tmp_name'], DOCUMENT_ROOT.'assets/img/advices/'.$files['img_id']['name']);
			$img_title = explode('.', $files['img_id']['name']);
			$last_img_id = ImgData::insert_img($files['img_id']['name'], $img_title[0]);
			$changeAdviceData['img_id'] = $last_img_id;
		}
		return $changeAdviceData;

	}

	public static function uploadingImgAdvice($files){
		$img_id = '';
		if ($files['img_id']['type'] == "image/jpeg" || $files['img_id']['type'] == "image/png" || $files['img_id']['type'] == "image/jpg" || $files['img_id']['type'] == "image/gig") {
			
			$files['img_id']['name'] = str_replace($replace, '_', $files['img_id']['name']);
			move_uploaded_file($files['img_id']['tmp_name'], DOCUMENT_ROOT.'assets/img/advices/'.$files['img_id']['name']);
			$img_title = explode('.', $files['img_id']['name']);
			$last_img_id = ImgData::insert_img($files['img_id']['name'], $img_title[0]);
			$img_id = $last_img_id;
		}
		return $img_id;
	}
}