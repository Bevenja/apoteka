<?php

require 'BaseController.php';
include_once 'lib/ProductsProcess.php';


class Home extends BaseController {

	public function index(){
		$this->data['product_on_akcija'] = ProductsData::product_on_akcija();
		$this->show_view('home');
	}
}