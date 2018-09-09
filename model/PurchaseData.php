<?php

include_once 'DB.php';
// include_once 'model/ProductsData.php';

class PurchaseData extends DB {

	public static function add_purchase($clients_id, $post){
		// $db = self::connection();
	
		$post_res = json_decode($post);
		// $post = $_POST['buy']
		$total = $post_res->total_price;

		$sql = "INSERT INTO purchase (id, total, status, time, clients_id) VALUES (NULL, $total, 1, NOW(), $clients_id)";
		$last_id = self::executeSQL($sql);
		// $res = $db->query($sql);
		// $addRental = $res;
		// $last_id = $db->insert_id;

		for ($i=0; $i <count($post_res->id) ; $i++) { 
			$sql = 'INSERT INTO product_purchase (id, purchase_id, product_id, quantity) VALUES (NULL, '.$last_id.', '.$post_res->id[$i].', '.$post_res->kolicina[$i].')';
			// $res = $db->query($sql);
			self::executeSQL($sql);
		}
		
	}

	// uzima sve kupovine koje je obavio klijent. po statusu se moze filtrirati samo se doda "and pu.status = i broj od 0do 3 ali ovo nisi ubacio...
	public static function getPurchase($clients_id = '' , $status = ''){
		if ($clients_id !='' && $status !=''){
			$clients_id = 'where pu.clients_id ='.$clients_id;
			$status = ' and pu.status = '.$status;
		} else if ($status != '') {
			$status = 'where pu.status = '.$status;
		} else if ($clients_id != '') {
			$clients_id = 'where pu.clients_id ='.$clients_id;
		}
		// var_dump($clients_id);
		// where pu.clients_id =
		
		$sql = 'select pu.id, pu.clients_id, pu.total, pu.status, pu.time, p.name, p_pu.quantity, p_pu.id as p_pu_id, c.users_id from purchase as pu inner join product_purchase as p_pu on pu.id = p_pu.purchase_id inner join product as p on p.id = p_pu.product_id inner join clients as c on c.id = pu.clients_id '.$clients_id.$status.'  ORDER BY pu.id DESC';
		// var_dump($sql);die;	
		$getPurchase1 = self::getData($sql);
		$getPurchase = $getPurchase1;
		// var_dump($getPurchase);die;

		$purchase = array();
		$value_id ='';
		foreach ($getPurchase as $key => $value) {
			if ($value_id != $value['id']) {
				$purchase[$value['id']] = $value;
			} else {
				$purchase[$value_id]['name'] .= '|'.$value['name'];
				$purchase[$value_id]['quantity'] .= '|'.$value['quantity'];
			}
			$value_id = $value['id'];
		}
		// var_dump($purchase);die();
		return $purchase;

	}

	public static function changePurchase($status, $id){
		// $db = self::connection();
		$sql = 'UPDATE purchase SET status ='.$status.' WHERE id ='.$id;
		self::executeSQL($sql);
		// var_dump($sql); die;
		// $res = $db->query($sql);
	}
	
}