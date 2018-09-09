<?php

require 'BaseController.php';

class Contact extends BaseController {

	public function index(){
		if (isset($_SESSION['user'])) {
			self::disabled($_SESSION['user']);
		}
		
		$this->show_view('contact');
	}

	public function add_msg(){
		self::redirect_unathorized($_POST['form_id_msg'], 'contact');
		MessageData::add_msg($_POST['subject'], $_POST['poruka'], $_SESSION['user_id']);
		header('Location:'.WEBSITE_URL.'contact');
	}
}
