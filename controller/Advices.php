<?php

require 'BaseController.php';

class Advices extends BaseController {

	public function index(){
		$this->data['all_advices_description'] = AdvicesData::all_advices_description('where a.status = 1');
		$this->show_view('advices');
	}

	public function single_advice(){
		// var_dump($_POST);die('dddd');
		// var_dump($_GET['p']);die;
		// ovde nastaje problem kada pokusa da se vrati na sa neke strane korak unazad na ovu stranu...
		$this->redirect_unathorized($_POST['form_id_advice'], 'advices');
		// $this->redirect_unathorized($_GET['p'], 'advices');
		$this->data['single_advice'] = AdvicesData::single_advice($_POST['form_id_advice']);
		// $this->data['single_advice'] = AdvicesData::single_advice($_GET['p']);
		// $_GET['p'] = $this->data['single_advice'][0]['title'];
		$this->show_view('savet');
	}

}
