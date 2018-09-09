<?php

require 'BaseController.php';
include_once 'lib/AdvicesProcess.php';
include_once 'lib/ProductsProcess.php';
include_once 'lib/EmployeesProcess.php';



class Admin extends BaseController {

	public function index(){
		$this->redirect_unathorized($_SESSION['admin']);
		$this->show_view('admin');
	}

	public function advices(){
		$this->redirect_unathorized($_SESSION['admin']);
		$this->data['all_advices'] = AdvicesData::all_advices();
		$this->show_view('admin/advices');
	}
	public function change_advice(){
		$this->redirect_unathorized($_SESSION['admin']);
		$this->redirect_unathorized($_POST['form_id_change_advice']);
		$changeAdviceData = AdvicesProcess::changeAdvice($_POST, $_FILES);

		// kada se ubacuje text mora se voditi racuna da bude enkodovan kako treba... najbolje u UTF8
		AdvicesData::change_advice($_POST['title'], $changeAdviceData['description'], $changeAdviceData['advice_text'], $_SESSION['employees_id'], $changeAdviceData['img_id'], $_POST['status'], $_POST['form_id_change_advice']);
		header('Location:'.WEBSITE_URL.'admin/advices');
	}
	public function add_advice(){
	
		$img_id = AdvicesProcess::uploadingImgAdvice($_FILES);
		AdvicesData::add_advice($_POST['title'], $_POST['description'], file_get_contents($_FILES['advice_text']['tmp_name']), $_SESSION['employees_id'], $img_id, $_POST['status']);
		header('Location:'.WEBSITE_URL.'admin/advices');
	}
	// ovo cu morati jos da doradim...
	
	public function products(){
		$this->redirect_unathorized($_SESSION['admin']);
		$this->data['city'] = UsersData::getAllCity();
		
		$this->data['all_products'] = ProductsData::all_products();
		$this->data['product_not_akcija'] = ProductsData::product_not_akcija();
		$this->data['product_on_akcija'] = ProductsData::product_on_akcija();
		$this->data['proizvodjaci'] = ProductsData::getAllProizvodjac();
		$this->data['atc'] = ProductsData::getATC();
		$this->data['symptoms'] = ProductsData::getSymptoms();
		$this->data['products'] = ProductsProcess::product_with_symptoms();
		$this->show_view('admin/products');
	}
	public function add_product(){
		$img_id = ProductsProcess::uploadingImgProduct($_FILES);
		$last_img_id = ProductsData::addProduct($_POST['name'], $_POST['price'], $_POST['sifra'], $_POST['description'], $_POST['stock'], $_POST['status'], $_POST['proizvodjac_id'], $_POST['kategorija_id'], $img_id);
		ProductsProcess::add_symptoms_product_index($last_img_id, $_POST);
		header('Location:'.WEBSITE_URL.'admin/products');
	}
	public function change_product(){
		
		$product_new_data = ProductsProcess::change_product_ruter($_POST , $_FILES);
		if (!empty($product_new_data)) {
			ProductsData::change_product($_POST['form_id_change_product'], $product_new_data['name'] , $product_new_data['price'], $product_new_data['sifra'], $product_new_data['description'], $product_new_data['stock'], $product_new_data['status'], $product_new_data['proizvodjac_id'], $product_new_data['kategorija_id'], $product_new_data['img_id']);
		}
		header('Location:'.WEBSITE_URL.'admin/products');
	}

	public function users(){
		$this->redirect_unathorized($_SESSION['admin']);
		// $this->data['all_advices'] = AdvicesData::all_advices();
		$this->data['all_clients_person'] = UsersData::getAllClientsByType(1, 1);
		$this->data['all_clients_person_new'] = UsersData::getAllClientsByType(1, 0);
		$this->data['all_clients_company'] = UsersData::getAllClientsByType(2, 1);
		$this->data['all_clients_company_new'] = UsersData::getAllClientsByType(2, 0);
		$this->show_view('admin/users');
	}

	public function purchase(){
		$this->redirect_unathorized($_SESSION['admin']);
		$this->data['purchase_status_1'] = $this->strToArray(PurchaseData::getPurchase('', 1 ));
		$this->data['purchase_status_2'] = $this->strToArray(PurchaseData::getPurchase('', 2 ));
		$this->data['purchase_status_3'] = $this->strToArray(PurchaseData::getPurchase('', 3 ));
		$this->data['purchase_status_0'] = $this->strToArray(PurchaseData::getPurchase('', '0' ));
		// var_dump($this->data);
		// die;
		$this->show_view('admin/purchase');
	}
	public function purchase_change(){
		$this->redirect_unathorized($_SESSION['admin']);
		PurchaseData::changePurchase($_POST['status'], $_POST['form_id']);
		header('Location:'.WEBSITE_URL.'admin/purchase');
	}

	public function user_change_status(){
		$this->redirect_unathorized($_SESSION['admin']);
		UsersData::changeUserStatus($_POST['status'], $_POST['form_id']);
		header('Location:'.WEBSITE_URL.'admin/users');
	}

	public function employees(){
		$this->redirect_unathorized($_SESSION['admin']);
		$this->data['city'] = UsersData::getAllCity();
		$this->data['employeesAdmin'] = UsersData::getEmployeesAdmin();
		$this->data['employees'] = UsersData::getAllEmployees();
		$this->data['employeesButNoAdmin'] =UsersData::employeesButNoAdmin();
		$this->show_view('admin/employees');
	}
	public function new_employees(){
		$this->redirect_unathorized($_SESSION['admin']);
		// var_dump($_FILES);
		// die();
		$img_id = EmployeesProcess::uploadingImgEmployees($_FILES);
		UsersData::addNewEmployees($_POST['address'], $_POST['phone'], $_POST['email'], $_POST['city_id'], $_POST['first_name'], $_POST['last_name'], $_POST['jmbg'], $img_id);
		header('Location:'.WEBSITE_URL.'admin/employees');

	}
	public function new_admin(){
		$this->redirect_unathorized($_SESSION['admin']);
		UsersData::addNewAdmin($_POST['username'], $_POST['password'], $_POST['emp_id']);
		header('Location:'.WEBSITE_URL.'admin/employees');

	}
	public function single_user(){
		$this->redirect_unathorized($_SESSION['admin']);
		// $this->redirect_unathorized($_POST['user_id'], 'admin/users');
		// var_dump($_GET);die;
		if (isset($_POST['user_id'])) {
			$user_id = $_POST['user_id'];
		} else if (isset($_GET['p'])) {
			$user_id = $_GET['p'];
		} else {
			header('Location: '.WEBSITE_URL.'admin/users');
		}
		// var_dump($_POST);die;
		$this->data['single_user'] = UsersData::getClient($user_id);
		// var_dump($this->data['single_user'][0]);
		$clients_id = $this->data['single_user'][0]['client_id']; 
		$this->data['purchase_status_1'] = $this->strToArray(PurchaseData::getPurchase($clients_id, 1));
		$this->data['purchase_status_2'] = $this->strToArray(PurchaseData::getPurchase($clients_id, 2));
		$this->data['purchase_status_3'] = $this->strToArray(PurchaseData::getPurchase($clients_id, 3));
		$this->data['purchase_status_0'] = $this->strToArray(PurchaseData::getPurchase($clients_id, '0'));
		// var_dump($this->data);
		$this->show_view('admin/single_user');
		// die;
	}

	public function new_proizvodjac(){
		$this->redirect_unathorized($_SESSION['admin']);
		// var_dump($_POST);die;
		$img_id = ProductsProcess::uploadingImgCompany($_FILES);
		UsersData::addNewProizvodjac($_POST['address'], $_POST['phone'], $_POST['email'], $_POST['city_id'], $_POST['name'], $_POST['pib'], $img_id);
		header('Location:'.WEBSITE_URL.'admin/products');
	}
	public function new_symptom(){
		$this->redirect_unathorized($_SESSION['admin']);
		ProductsData::addNewSymptom($_POST['symptom']);
		header('Location:'.WEBSITE_URL.'admin/products');
	}

	public function add_product_akcija(){
		$this->redirect_unathorized($_SESSION['admin']);
		if (!isset($_POST['product_id'])) {
			header('Location:'.WEBSITE_URL.'admin/products');
		} else {
			$old_price = ProductsData::getSingleProduct($_POST['product_id']);
			$new_price = $old_price['price'] - ($old_price['price'] * $_POST['percentage'] / 100);
			ProductsData::change_product_price($new_price, $_POST['product_id']);
			ProductsData::add_akcija($_POST['percentage'], $old_price['price'], $new_price, $_POST['product_id']);
			header('Location:'.WEBSITE_URL.'admin/products');
		}
	}

	public function delete_product_akcija(){
		$this->redirect_unathorized($_SESSION['admin']);
		foreach ($_POST['id'] as $res) {
			$res = explode('|', $res);
			$id = $res[0];
			$old_price = $res[1];
			$product_id = $res[2];
			ProductsData::delete_akcija($id);
			ProductsData::change_product_price($old_price, $product_id);
		}
		header('Location:'.WEBSITE_URL.'admin/products');
	}





}

// 'product_id' => string '2' (length=1)
// 'percentage' => string '10' (length=2)
// 'form_id_add_akcija' => string '' (length=0)

// treba zavrsiti sa usersima da moze da se vidi svaciji profil i sve njegove porudzbine sa mogucnoscu brisanja korisnika. 
// videti da zavrsim sa zaposlenima(ima vec komentar).
// videti konacno sta sa porukama

// odraditi samo jos akcije. poruke lete... 

// poceti sa javascript i css
// videti rich text editor
// napraviti funkcije koje ce upisati sve atc kategorije, neke gradove i simptome da ja ne moram rucno
// ubaciti mogucnost da se doda proizvodjac, novi simptom i grad