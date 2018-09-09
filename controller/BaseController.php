<?php 
	class BaseController {
	public $data = array();
	public $disabled = 'disabled';
	public $view;
	public function show_view($view, $header='header', $footer='footer'){
		require 'view/includes/'.$header.'.php';
		require 'view/'.$view.'.php';
		require 'view/includes/'.$footer.'.php';
	}
	public function redirect_unathorized($role,$url=''){
		if(!isset($role) && empty($role)){
			header('Location: '.WEBSITE_URL.$url);
			return;
		}
	}
	public function disabled($role){
		if(isset($role) && $role){
			$this->disabled = '';
			return $this->disabled;
		}
	}
	public function strToArray($x){
		foreach ($x as $key => $value) {
			$x[$key]['name'] = explode('|', $value['name']);
			$x[$key]['quantity'] = explode('|', $value['quantity']);
		}
		return $x;
	}
}

