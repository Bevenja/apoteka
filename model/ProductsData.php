<?php
// require 'DB.php'; 
// ovo vise nece jer negde izgleda opet poziva ovu klasu...
include_once 'DB.php';
class ProductsData extends DB {
	public static function all_products(){
		$sql = 'select p.id as product_id, p.name, p.sifra, p.price, p.description, p.stock, p.status, p.time, k.kategorija, k.id as kategorija_id, i.img_url, i.title as image_title, co.name as company_name, co.id as company_id from product as p inner join kategorija as k on p.kategorija_id = k.id inner join img as i on i.id = p.img_id inner join proizvodjac as pr on pr.id = p.proizvodjac_id inner join company as co on co.id = pr.company_id';
		$all_products = self::getData($sql);
		return $all_products;
		
	}
	//ovo jos nisam koristio...
	public static function available_products(){
		$sql = 'select * product where status > 0';
		$available_products = self::getData($sql);
		return $available_products;
		
	}
	public static function getSingleProduct($id){
		$sql = 'select * from product where id ='.$id;
		$single_product = self::getData($sql);
		return $single_product[0];

	}
	public static function getAllProizvodjac(){
		$sql = 'select pr.id as proizvodjac_id , co.id as company_id, co.name as company_name from proizvodjac as pr join company as co on co.id = pr.company_id';
		$all_proizvodjaci = self::getData($sql);
		return $all_proizvodjaci;
	}
	public static function selected_products($selected_products_by){
		$sql = 'select p.id as product_id, p.name, p.sifra, p.price, p.description, p.stock, p.status, p.time, k.kategorija, k.id as kategorija_id, i.img_url, i.title as image_title, co.name as company_name, co.id as company_id from product as p inner join kategorija as k on p.kategorija_id = k.id inner join img as i on i.id = p.img_id inner join proizvodjac as pr on pr.id = p.proizvodjac_id inner join company as co on co.id = pr.company_id where '.$selected_products_by;
		$all_products = self::getData($sql);
		return $all_products;
		
	}

	public static function getATC(){
		$sql = 'select * from kategorija';
		$atc = self::getData($sql);
		return $atc;
		
	}	
	public static function getSymptoms(){
		$sql = 'select * from symptoms';
		$symptoms = self::getData($sql);
		return $symptoms;
	}
	public static function addNewSymptom($symptom){
		$sql = 'INSERT INTO symptoms (id, symptom) VALUES (NULL, "'.$symptom.'")';
		self::executeSQL($sql);
	}
	public static function selected_products_simptoms($symptoms_id){
		$sql = 'select p.id as product_id, p.name, p.sifra, p.price, p.description, p.stock, p.status, p.time, k.kategorija, k.id as kategorija_id, i.img_url, i.title as image_title, co.name as company_name, co.id as company_id, s.symptom from products_symptoms as ps inner join product as p on ps.products_id = p.id inner join kategorija as k on p.kategorija_id = k.id inner join img as i on i.id = p.img_id inner join proizvodjac as pr on pr.id = p.proizvodjac_id inner join company as co on co.id = pr.company_id inner join symptoms as s on ps.symptoms_id = s.id WHERE ps.symptoms_id = '.$symptoms_id;
		$products_simptoms = self::getData($sql);
		return $products_simptoms;
		
	}
	public static function products_simptoms($product_id){
		$sql = 'select ps.symptoms_id, s.symptom from products_symptoms as ps inner join symptoms as s on s.id = ps.symptoms_id where products_id ='.$product_id;
		$products_simptoms = self::getData($sql);
		return $products_simptoms;
	}
	public static function addProduct($name, $price, $sifra, $description, $stock, $status, $proizvodjac_id, $kategorija_id, $img_id){
		// $db = self::connection();
		$sql = 'INSERT INTO product (id, name, price, sifra, description, stock, status, time, proizvodjac_id, kategorija_id, img_id) VALUES (NULL, "'.$name.'", '.$price.', '.$sifra.', "'.$description.'", '.$stock.', '.$status.', NOW(), '.$proizvodjac_id.', '.$kategorija_id.', '.$img_id.')';
		// var_dump($sql);die('ovde');
		// $res = $db->query($sql);
		$last_product_id = self::executeSQL($sql);
		// var_dump($db);
		// die('ddd');
		// $last_product_id = $db->insert_id;
		return $last_product_id;
	}
	
	public static function addSymptomsProducts($products_id, $symptoms_id){
		$sql = 'INSERT INTO products_symptoms (id, products_id, symptoms_id) VALUES (NULL, "'.$products_id.'", '.$symptoms_id.')';
		self::executeSQL($sql);
		// var_dump($sql); die();
		// $res = $db->query($sql);
	}

	public static function delete_products_symptoms($products_id){
		// $db = self::connection();
		$sql = 'DELETE FROM products_symptoms WHERE products_id ='.$products_id;
		self::executeSQL($sql);
		// $res = $db->query($sql);
		
	}

	public static function change_product($id, $name, $price, $sifra, $description, $stock, $status, $proizvodjac_id, $kategorija_id, $img_id){
		
		// if (self::$connection === false) {
		// 	self::$connection = self::connection();
		// }

		// $db = self::$connection;

		$sql = 'UPDATE product SET name ="'.$name.'", price = '.$price.', sifra='.$sifra.', description = "'.$description.'", stock='.$stock.', status='.$status.', time = NOW(), proizvodjac_id = '.$proizvodjac_id.', kategorija_id = '.$kategorija_id.', img_id='.$img_id.' WHERE id ='.$id;
		// var_dump($sql); die;
		self::executeSQL($sql);
		// $res = $db->query($sql);
	}

	public static function add_akcija($percentage, $old_price, $new_price, $product_id){
		// $db = self::connection();

		// self
		// this

		$sql = 'INSERT INTO akcija (id, time, percentage, old_price, new_price, status, product_id) VALUES (NULL, NOW(), '.$percentage.', '.$old_price.', '.$new_price.', 1 , '.$product_id.')';
		self::executeSQL($sql);
		// var_dump($sql); die();
		// $res = $db->query($sql);
	}

	public static function change_product_price($price, $id){
		// $db = self::connection();
		$sql = 'UPDATE product SET price = '.$price.' WHERE id ='.$id;
		self::executeSQL($sql);
		// $res = $db->query($sql);
	}

	public static function product_not_akcija(){
		$sql = 'select id, name, price from product where id NOT IN (select product_id from akcija)';
		$product_not_akcija = self::getData($sql);
		return $product_not_akcija;
	}
	public static function product_on_akcija(){
		$sql = 'select a.id, a.time, a.percentage, a.old_price, a.new_price, a.status, a.product_id, p.name, i.id as img_id, i.img_url, i.title from akcija as a inner join product as p on a.product_id = p.id inner join img as i on i.id = p.img_id';
		$product_on_akcija = self::getData($sql);
		return $product_on_akcija;
	}

	public static function delete_akcija($id){
		// $db = self::connection();
		$sql = 'DELETE FROM akcija WHERE id ='.$id;
		self::executeSQL($sql);
		// $res = $db->query($sql);
	}

}