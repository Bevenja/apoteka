<?php

require 'BaseController.php';

class Registration extends BaseController {

	public function index(){
		$this->data['city'] = UsersData::getAllCity();

		$this->show_view('registration');
	}
	public function is_log_in(){
		// if (!isset($_REQUEST['log_in'])){
		// 	header('Location: '.WEBSITE_URL.'registration');die();
		// }
		$users = UsersData::getUsers();
		foreach ($users as $user) {
			if ($_REQUEST['password'] == $user['password'] && $_REQUEST['username'] == $user['username']) {
				if ($user['level'] == 1 ) {
					unset($_SESSION['user']);
					unset($_SESSION['admin']);
					unset($_SESSION['user_id']);
					unset($_SESSION['client_id']);
					unset($_SESSION['client']);
					unset($_SESSION['employees_id']);

						
					$_SESSION['client'] = UsersData::getClient($user['id']);

					$_SESSION['user'] = true;
					$_SESSION['user_id'] = $user['id'];
					header('Location: '.WEBSITE_URL.'client');
					break;
				} else if ($user['level'] == 2) {
					unset($_SESSION['user']);
					unset($_SESSION['admin']);
					unset($_SESSION['user_id']);
					unset($_SESSION['client_id']);
					unset($_SESSION['client']);
					unset($_SESSION['employees_id']);
					
					$_SESSION['admin'] = true;
					$x = UsersData::getEmployeesId($user['id']);
					$_SESSION['employees_id'] = $x[0]['id'];
					header('Location: '.WEBSITE_URL.'admin');
					break;
				} else {
					header('Location: '.WEBSITE_URL.'registration');
				}
			} else {
				header('Location: '.WEBSITE_URL.'registration');
			}
		}

		$this->show_view('registration');
	}
		// vrsi izlogovanje i brise u sesiji...
	public function is_log_out(){
		if (!isset($_REQUEST['log_out'])){
			header('Location: '.WEBSITE_URL.'registration');die();
		} else {
			// var_dump('expression');
			unset($_SESSION['user']);
			unset($_SESSION['admin']);
			unset($_SESSION['user_id']);
			unset($_SESSION['client_id']);
			unset($_SESSION['employees_id']);
			unset($_SESSION['client']);
			header('Location: '.WEBSITE_URL.'registration');
		}
	}

	public function new_client(){
		// var_dump($_POST);
		// die();
		if ($_POST['form_id_new_client'] == 'person') {
			UsersData::newClientPerson($_POST['username_reg'], $_POST['password_reg'], $_POST['address'], $_POST['phone'], $_POST['email'], $_POST['city_id'], $_POST['first_name'], $_POST['last_name'], $_POST['jmbg']);
		} else if ($_POST['form_id_new_client'] == 'company') {
			UsersData::newClientCompany($_POST['username_reg_company'], $_POST['password_reg_company'], $_POST['address_company'], $_POST['phone_company'], $_POST['email_company'], $_POST['city_id_company'], $_POST['name_company'], $_POST['pib_company']);
		} else {
			header('Location: '.WEBSITE_URL.'registration');
		}

		header('Location: '.WEBSITE_URL.'registration');
	}



}

