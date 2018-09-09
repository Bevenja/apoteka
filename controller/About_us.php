<?php

require 'BaseController.php';

class About_us extends BaseController {

	public function index(){
		$this->show_view('about_us');
	}
}
