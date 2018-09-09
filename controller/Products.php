<?php

require 'BaseController.php';
include_once 'model/ProductsData.php';
include_once 'lib/ProductsProcess.php';

class Products extends BaseController {

	public function index(){
		// mozda postaviti da kad se okine da prvo obrise ovo dole pa onda da se puni...
		$this->data['products'] = ProductsData::all_products();
		$this->data['proizvodjaci'] = ProductsData::getAllProizvodjac();
		$this->data['atc'] = ProductsData::getATC();
		$this->data['symptoms'] = ProductsData::getSymptoms();
		$this->show_view('products');
	}

	// ova metoda sluzi da bi kada podaci stignu iz forme pozvala metodu ruter iz lib/SelectedProduct i pripremila url a zatim preusmerila na sledecu metodu u ovom kontroleru ali sa promenjenim url koji se dinamicki sklapa. nisam mogao ovo preusmeravanje da radim iz lib jer gda controler ruter iz indexa.php ne prepoznaje... 

	public function searched_products_ruter(){
		$url = ProductsProcess::searched_products_ruter($_POST);
		// var_dump($url); die('ovde');
		$_SESSION['post_data'] = $_POST;
		header('Location: '.WEBSITE_URL.$url);

	}
	public function searched_products(){
		$this->redirect_unathorized($_GET['p'], 'products');
		$this->data['selected_products'] = ProductsProcess::products_list($_SESSION['post_data']);
		$this->data['rezultat'] ='';
		if (isset($_SESSION['post_data']['search'])) {
			$this->data['kriterijum'] = 'po pretrazi za:';
			$this->data['rezultat'] = $_SESSION['post_data']['search'];
		} else if (isset($_SESSION['post_data']['proizvodjac'])){
			$this->data['kriterijum'] = 'po proizvodjacu:';
			$rezultat = explode('|', $_SESSION['post_data']['proizvodjac']);
			$this->data['rezultat'] = $rezultat[0];
		} else if (isset($_SESSION['post_data']['atc_klasifikacija'])){
			$this->data['kriterijum'] = 'po atc_klasifikaciji:';
			$rezultat = explode('|', $_SESSION['post_data']['atc_klasifikacija']);
			$this->data['rezultat'] = $rezultat[0];
		} else if (isset($_SESSION['post_data']['symptom_check'])){
			$this->data['kriterijum'] = 'po simptomima:';
			foreach ($_SESSION['post_data']['symptom_check'] as $res) {
				$res2 = explode('|', $res);
				$res2 = $res2[1];
				$this->data['rezultat'] .=$res2 . ' ';
			}
		} else {
			header('Location: '.WEBSITE_URL.'products');
		}


		// var_dump($this->data['selected_products']);die;
		// unset($_SESSION['post_data']);
		// unset($_SESSION['product_id']);
		$this->show_view('searched_products');
	}

	public function selected_product(){
		$this->redirect_unathorized($_GET['p'], 'products');
		$this->data['selected_product'] = ProductsData::selected_products('p.id = '.$_SESSION['product_id']);
		// unset($_SESSION['post_data']);
		// unset($_SESSION['product_id']);
		$this->show_view('selected_product');
	}

}
