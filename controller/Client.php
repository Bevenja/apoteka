<?php

require 'BaseController.php';
include_once 'model/UsersData.php';

class Client extends BaseController {

	public function index(){
		$this->redirect_unathorized($_SESSION['user'], 'registration');
		$this->data['client'] = UsersData::getClient($_SESSION['user_id']);
		$_SESSION['client_id'] = $this->data['client'][0]['client_id'];
		$client_id_putchase = $this->data['client'][0]['client_id'];
	
		$this->data['purchase_status_1'] = $this->strToArray(PurchaseData::getPurchase($client_id_putchase, 1 ));
		$this->data['purchase_status_2'] = $this->strToArray(PurchaseData::getPurchase($client_id_putchase, 2 ));
		$this->data['purchase_status_3'] = $this->strToArray(PurchaseData::getPurchase($client_id_putchase, 3 ));
		$this->data['purchase_status_0'] = $this->strToArray(PurchaseData::getPurchase($client_id_putchase, '0' ));
		$this->show_view('client');
	}
	public function chart(){
		$this->redirect_unathorized($_SESSION['user'] , 'registration');
		$this->show_view('chart');
	}

	public function buy(){
		PurchaseData::add_purchase($_SESSION['client'][0]['client_id'], $_POST['buy']);
		header('Location: '.WEBSITE_URL.'client/chart');
	}


}
