<?php
// session_start();
include_once 'DB.php';
class UsersData extends DB {
	public static function getUsers(){
		$sql = "SELECT * from users where status > 0";
		$users = self::getData($sql);
		return $users;
	}

	public static function getTypeOfClient($id){
		$sql = 'select type from clients where users_id = '.$id;
		$type = self::getData($sql);
		return $type;
	}
	public static function getUserLevel($id){
		$sql = 'select level from users where id = '.$id;
		$level = self::getData($sql);
		$level = $level[0];
		return $level;
	}
	public static function getClient($id){
		$type = self::getTypeOfClient($id);
		$sql = '';
		if ($type[0]['type'] == 1) {
			// u sucaju da je tip 1 tj fizicko lice
			$sql = 'select u.id as user_id , c.id as client_id, c.type , c.status, cp.time , p.first_name , p.last_name, p.jmbg , gi.address, gi.mail, gi.phone, ci.city, ci.shiping_price from users as u inner join clients as c on u.id = c.users_id inner join client_person as cp on c.id = cp.clients_id inner join person as p on cp.person_id = p.id inner join general_info as gi on p.general_info_id = gi.id inner join city as ci on gi.city_id = ci.id WHERE u.id ='.$id;

		} else if ($type[0]['type'] == 2) {
			$sql = 'select u.id as user_id , c.id as client_id, c.type , c.status, cc.time , co.name, co.pib, gi.address, gi.mail, gi.phone, ci.city, ci.shiping_price from users as u join clients as c on u.id = c.users_id join client_company as cc on c.id = cc.clients_id join company as co on cc.company_id = co.id join general_info as gi on co.general_info_id = gi.id join city as ci on gi.city_id = ci.id WHERE u.id ='.$id;
			
		} 

		$client = self::getData($sql);
		return $client;
	}

	public static function getEmployeesAdmin($id = ''){
		$sql = 'select e.id as emp_id,  p.first_name, p.last_name, p.jmbg, gi.address, gi.mail, gi.phone, cy.city, i.img_url, i.title as img_title, a.id as admin_id, u.id as user_id from users as u 
		inner join admin as a on u.id = a.users_id 
		inner join employees as e on a.employees_id = e.id 
		inner join person as p on e.person_id = p.id 
		inner join general_info as gi on p.general_info_id = gi.id 
		inner join city as cy on gi.city_id = cy.id 
		inner join img as i on e.img_id = i.id where u.status > 0';
		$employees = self::getData($sql);
		return $employees;

	}
	public static function getAllEmployees($id = ''){
		$sql = 'select e.id as emp_id,  p.first_name, p.last_name, p.jmbg, gi.address, gi.mail, gi.phone, cy.city, i.img_url, i.title as img_title from employees as e 
		inner join person as p on e.person_id = p.id 
		inner join general_info as gi on p.general_info_id = gi.id 
		inner join city as cy on gi.city_id = cy.id 
		inner join img as i on e.img_id = i.id';
		$employees = self::getData($sql);
		return $employees;

	}

	public static function employeesButNoAdmin(){
		$sql = 'select e.id as emp_id, p.first_name, p.last_name, p.jmbg, gi.address, gi.mail, gi.phone, cy.city, i.img_url, i.title as img_title from employees as e inner join person as p on e.person_id = p.id inner join general_info as gi on p.general_info_id = gi.id inner join city as cy on gi.city_id = cy.id inner join img as i on e.img_id = i.id WHERE e.id NOT IN (SELECT employees_id FROM admin)';
		$employees = self::getData($sql);
		return $employees;
		
	}
	public static function getEmployeesId($id){
		$sql = 'select e.id from users as u inner join admin as a on u.id = a.users_id inner join employees as e on a.employees_id = e.id WHERE u.id = '.$id;
		$employees = self::getData($sql);
		return $employees;

	}

	public static function getAllClientsByType($type, $status = ''){
		if ($status == 0) {
			$status = 'and u.status ='.$status;
		} else if ($status == 1) {
			$status = 'and u.status >='.$status;
		}
		$sql = '';
		if ($type == 1) {
			$sql = 'select u.id as user_id , c.id as client_id, c.type , c.status, cp.time , p.first_name , p.last_name, p.jmbg , gi.address, gi.mail, gi.phone, ci.city, ci.shiping_price from users as u inner join clients as c on u.id = c.users_id inner join client_person as cp on c.id = cp.clients_id inner join person as p on cp.person_id = p.id inner join general_info as gi on p.general_info_id = gi.id inner join city as ci on gi.city_id = ci.id WHERE c.type = 1 '.$status;
		} else if ($type == 2) {
			$sql = 'select u.id as user_id , c.id as client_id, c.type , c.status, cc.time , co.name, co.pib, gi.address, gi.mail, gi.phone, ci.city, ci.shiping_price from users as u join clients as c on u.id = c.users_id join client_company as cc on c.id = cc.clients_id join company as co on cc.company_id = co.id join general_info as gi on co.general_info_id = gi.id join city as ci on gi.city_id = ci.id WHERE c.type = 2 '.$status;
		} else {

		}
		// var_dump($sql);
		// die;
		$all_clients = self::getData($sql);
		return $all_clients;
	}

	public static function getAllCity(){
		$sql = "SELECT * from city";
		$city = self::getData($sql);
		return $city;
	}

	public static function inserIntoUsers($username, $password, $status = 0){
		// $db = self::connection();
		// 1. users
		$sql = 'INSERT INTO users (id, username, password, salt, status, level) VALUES (NULL, "'.$username.'", "'.$password.'", "1111111111111", '.$status.', 1)';
		$last_users_id = self::executeSQL($sql);
		// $res = $db->query($sql);
		// $last_users_id = $db->insert_id;
		return $last_users_id;
	}
	public static function inserIntoGeneral_info($address, $phone, $mail, $city_id){
		// $db = self::connection();
		$sql = 'INSERT INTO general_info (id, address, phone, mail, city_id) VALUES (NULL, "'.$address.'", "'.$phone.'", "'.$mail.'", '.$city_id.')';
		$last_general_info_id = self::executeSQL($sql);
		// $res = $db->query($sql);
		// $last_general_info_id = $db->insert_id;
		return $last_general_info_id;
	}
	public static function insetIntoPerson($first_name, $last_name, $jmbg, $last_general_info_id){
		// $db = self::connection();
		$sql = 'INSERT INTO person (id, first_name, last_name, jmbg, general_info_id) VALUES (NULL, "'.$first_name.'", "'.$last_name.'", "'.$jmbg.'", '.$last_general_info_id.')';
		$last_person_id = self::executeSQL($sql);
		// $res = $db->query($sql);
		// $last_person_id = $db->insert_id;
		return $last_person_id;
	}
	public static function insertIntoClients($last_users_id){
		// $db = self::connection();
		$sql = 'INSERT INTO clients (id, type, status, users_id) VALUES (NULL, 1, 0, '.$last_users_id.')';
		$last_clients_id = self::executeSQL($sql);
		// $res = $db->query($sql);
		// $last_clients_id = $db->insert_id;
		return $last_clients_id;

	}

	public static function newClientPerson($username, $password, $address, $phone, $mail, $city_id, $first_name, $last_name, $jmbg){
		// $db = self::connection();

		// 1. users
		// $sql = 'INSERT INTO users (id, username, password, salt, status, level) VALUES (NULL, "'.$username.'", "'.$password.'", "1111111111111", 0, 1)';
		// $res = $db->query($sql);
		// $last_users_id = $db->insert_id;
		$last_users_id = self::inserIntoUsers($username, $password);
		// 2. general_info
		// $sql = 'INSERT INTO general_info (id, address, phone, mail, city_id) VALUES (NULL, "'.$address.'", "'.$phone.'", "'.$mail.'", '.$city_id.')';
		// $res = $db->query($sql);
		// $last_general_info_id = $db->insert_id;
		$last_general_info_id = self::inserIntoGeneral_info($address, $phone, $mail, $city_id);
		// 3. person
		// $sql = 'INSERT INTO person (id, first_name, last_name, jmbg, general_info_id) VALUES (NULL, "'.$first_name.'", "'.$last_name.'", "'.$jmbg.'", '.$last_general_info_id.')';
		// $res = $db->query($sql);
		// $last_person_id = $db->insert_id;
		$last_person_id = self::insetIntoPerson($first_name, $last_name, $jmbg, $last_general_info_id);
		// 4. clients
		// $sql = 'INSERT INTO clients (id, type, status, users_id) VALUES (NULL, 1, 0, '.$last_users_id.')';
		// $res = $db->query($sql);
		// $last_clients_id = $db->insert_id;
		$last_clients_id = insertIntoClients($last_users_id);

		// 5. client_person
		$sql = 'INSERT INTO client_person (id, time, clients_id, person_id) VALUES (NULL, NOW(), '.$last_clients_id.', '.$last_person_id.')';
		self::executeSQL($sql);
		// $res = $db->query($sql);

		// 6. 
		// return $last_product_id;
	}
	public static function inserIntoCompany($name, $pib, $last_general_info_id){
		// $db = self::connection();
		$sql = 'INSERT INTO company (id, name, pib, general_info_id) VALUES (NULL, "'.$name.'", '.$pib.', '.$last_general_info_id.')';
		$last_company_id = self::executeSQL($sql);
		// $res = $db->query($sql);
		// $last_company_id = $db->insert_id;
		return $last_company_id;

	}

	public static function newClientCompany($username, $password, $address, $phone, $mail, $city_id, $name, $pib){
		// $db = self::connection();

		// 1. users
		// $sql = 'INSERT INTO users (id, username, password, salt, status, level) VALUES (NULL, "'.$username.'", "'.$password.'", "1111111111111", 0, 1)';
		// $res = $db->query($sql);
		// $last_users_id = $db->insert_id;
		$last_users_id = self::inserIntoUsers($username, $password);
		// 2. general_info
		// $sql = 'INSERT INTO general_info (id, address, phone, mail, city_id) VALUES (NULL, "'.$address.'", "'.$phone.'", "'.$mail.'", '.$city_id.')';
		// $res = $db->query($sql);
		// $last_general_info_id = $db->insert_id;
		$last_general_info_id = self::inserIntoGeneral_info($address, $phone, $mail, $city_id);
		// 3. company
		// $sql = 'INSERT INTO company (id, name, pib, general_info_id) VALUES (NULL, "'.$name.'", '.$pib.', '.$last_general_info_id.')';
		// $res = $db->query($sql);
		// $last_company_id = $db->insert_id;
		$last_company_id = self::inserIntoCompany($name, $pib, $last_general_info_id);
		// 4. clients
		// $sql = 'INSERT INTO clients (id, type, status, users_id) VALUES (NULL, 2, 0, '.$last_users_id.')';
		// $res = $db->query($sql);
		// $last_clients_id = $db->insert_id;
		$last_clients_id = insertIntoClients($last_users_id);
		// 5. client_company
		$sql = 'INSERT INTO client_company (id, time, clients_id, person_id) VALUES (NULL, NOW(), '.$last_clients_id.', '.$last_company_id.')';
		self::executeSQL($sql);
		// $res = $db->query($sql);
		// 6. 
		// return $last_product_id;
	}

	public static function changeUserStatus($status, $id){
		// $db = self::connection();
		$sql = 'UPDATE users SET status ='.$status.' WHERE id ='.$id;
		self::executeSQL($sql);
		// var_dump($sql); die;
		// $res = $db->query($sql);
	}

	public static function addNewEmployees($address, $phone, $mail, $city_id, $first_name, $last_name, $jmbg, $img_id){

		// $db = self::connection();
		$last_general_info_id = self::inserIntoGeneral_info($address, $phone, $mail, $city_id);
		$last_person_id = self::insetIntoPerson($first_name, $last_name, $jmbg, $last_general_info_id);
		$sql = 'INSERT INTO employees (id, person_id, img_id) VALUES (NULL, '.$last_person_id.', '.$img_id.')';
		self::executeSQL($sql);
		// $res = $db->query($sql);
	}

	public static function addNewAdmin($username, $password, $employees_id){
		// $db = self::connection();
		$last_users_id = self::inserIntoUsers($username, $password, 1);
		$sql = 'INSERT INTO admin (id, users_id, employees_id) VALUES (NULL, '.$last_users_id.', '.$employees_id.')';
		self::executeSQL($sql);
		// $res = $db->query($sql);
	}

	public static function addNewProizvodjac($address, $phone, $mail, $city_id, $name, $pib, $img_id){
		// $db = self::connection();
		$last_general_info_id = self::inserIntoGeneral_info($address, $phone, $mail, $city_id);
		$last_company_id = self::inserIntoCompany($name, $pib, $last_general_info_id);
		$sql = 'INSERT INTO  proizvodjac (id, company_id, img_id) VALUES (NULL, '.$last_company_id.', '.$img_id.')';
		self::executeSQL($sql);
		// $res = $db->query($sql);
	}


}
