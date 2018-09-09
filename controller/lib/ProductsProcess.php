<?php
include_once 'model/ProductsData.php';

class ProductsProcess {
		
		public static function products_list($par){
			// var_dump($par);die;
			$replace  = array(' ' , '/' , '<' , '>' , ';', '"' , '\'' , '`' , '%', '.', ',' , '+' , '-' , '[' , ']' , '!');
			// $x = $par;
			// var_dump($x);

			if (isset($par['form_id_proizvodjac']) && $par['proizvodjac'] != '/') {
				$res = explode('|', $par['proizvodjac']);
				$res[0] = str_replace($replace, '_', $res[0]);
				$selected_products_by = 'pr.id = '.$res[1];
				
				$final_products_list = ProductsData::selected_products($selected_products_by);
				return $final_products_list;

			} else if (isset($par['form_id_atc']) && $par['atc_klasifikacija'] != '/') {
				$res = explode('|', $par['atc_klasifikacija']);
				$res[0] = str_replace($replace, '_', $res[0]);
				$selected_products_by = 'k.id = '.$res[1];
				$final_products_list = ProductsData::selected_products($selected_products_by);
				return $final_products_list;


			} else if (isset($par['form_id_search']) && $par['search'] != '') {
				$res = str_replace($replace, '_', $par['search']);
				$selected_products_by = ' p.name LIKE "%'.$res.'%" ORDER BY name ASC';
				$final_products_list = ProductsData::selected_products($selected_products_by);
				return $final_products_list;

			} else if (isset($par['symptom_check']) && $par['symptom_check'] != '/') {
				// niz selected_products_simptoms se puni rezultatima iz kverija za svaki podatak koji stigne iz upita. svaki proizvod koji ima vise simptoma se ponavlja vise puta
				$selected_products_simptoms = array();
				foreach ($par['symptom_check'] as $res) {
					$res = explode('|', $res);
					$products_one_symptom = ProductsData::selected_products_simptoms($res[0]);
					foreach ($products_one_symptom as $key => $value) {
						array_push($selected_products_simptoms, $value);
					}
				}
				// ovaj deo odbacije proizvode koji se vise puta pojavljuju ali spaja simptome i pokazuje koliko su se puta duplirali
				$product_with_symptoms = array();
				$temp_array = array(); 
				$brojac = 0; 
				$key_array = array();
				foreach($selected_products_simptoms as $product) { 
				    if (!in_array($product['product_id'], $key_array)) { 
				        $key_array[$brojac] = $product['product_id']; 
				        $temp_array[$brojac] = $product; 
				        $temp_array[$brojac]['ponavljanje'] = 1; 
				    } else {
				      	foreach ($temp_array as $kljuc => $temp_product) {
				        	if ($temp_product['product_id'] == $product['product_id']) {
				        		$temp_array[$kljuc]['symptom'] .= '|'.$product['symptom'];
				           		$temp_array[$kljuc]['ponavljanje'] ++; 
				        	}
				       	}
				    }
				    $brojac++; 
				} 
				$product_with_symptoms = $temp_array;
				// var_dump($product_with_symptoms);
				// ovde se niz sortira po broju ponavljanja odnosno po broju pogodjenih simptoma
				usort($product_with_symptoms, function($a, $b) {
				    return $b['ponavljanje'] - $a['ponavljanje'];
				});
				$final_products_list = $product_with_symptoms;
				return $final_products_list;

			}

			// header('Location: '.WEBSITE_URL.$url);
		}
		public static function searched_products_ruter($par){
			$url='products';
			$replace  = array(' ' , '/' , '<' , '>' , ';', '"' , '\'' , '`' , '%', '.', ',' , '+' , '-' , '[' , ']' , '!');
			
			if (isset($par['form_id_proizvodjac']) && $par['proizvodjac'] != '/') {
				$res = explode('|', $par['proizvodjac']);
				$res[0] = str_replace($replace, '_', $res[0]);
				$url .= '/searched_products/'.$res[0];
				
				return $url;

			} else if (isset($par['form_id_atc']) && $par['atc_klasifikacija'] != '/') {
				$res = explode('|', $par['atc_klasifikacija']);
				$res[0] = str_replace($replace, '_', $res[0]);
				$url .= '/searched_products/'.$res[0];
				
				return $url;


			} else if (isset($par['form_id_search']) && $par['search'] != '') {
				$res = str_replace($replace, '_', $par['search']);
				$url .='/searched_products/'.$res;
				return $url;

			} else if (isset($par['symptom_check']) && $par['symptom_check'] != '/') {
				$url_res ='';
				
				// niz selected_products_simptoms se puni rezultatima iz kverija za svaki podatak koji stigne iz upita. svaki proizvod koji ima vise simptoma se ponavlja vise puta
				$selected_products_simptoms = array();
				foreach ($par['symptom_check'] as $res) {
					// ovde mozda videti da se dovuku simptomi umesto jnihovih id za url
					$res = explode('|', $res);
					$url_res .=$res[1].'_';
					
				}
				$url_res = substr($url_res, 0, -1);
				$url .='/searched_products/'.$url_res;
				return $url;

			} else if (isset($par['form_id_detalji']) && $par['form_id_detalji'] != '/') {
				$res = explode('|', $par['form_id_detalji']);
				$res[1] = str_replace($replace, '_', $res[1]);
				$_SESSION['product_id'] = $res[0];
				$url .='/selected_product/'.$res[1];
				return $url;
			} else {
				return $url;

			}

			// header('Location: '.WEBSITE_URL.$url);
		}
		public static function uploadingImgProduct($files){
			$replace  = array(' ');
			var_dump($files);
			// pod id = 10 u tabeli img je snimljen placeholder za lekove
			$img_id = 10;
			if ($files['img_id']['type'] == "image/jpeg" || $files['img_id']['type'] == "image/png" || $files['img_id']['type'] == "image/jpg" || $files['img_id']['type'] == "image/gig") {
				
				$files['img_id']['name'] = str_replace($replace, '_', $files['img_id']['name']);
				move_uploaded_file($files['img_id']['tmp_name'], DOCUMENT_ROOT.'assets/img/products/'.$files['img_id']['name']);
				$img_title = explode('.', $files['img_id']['name']);
				$last_img_id = ImgData::insert_img($files['img_id']['name'], $img_title[0]);
				$img_id = $last_img_id;
			}
			return $img_id;
		}
		public static function uploadingImgCompany($files){
			$replace  = array(' ');
			var_dump($files);
			// pod id = 16 u tabeli img je snimljen placeholder za kompanije
			$img_id = 16;
			if ($files['img_id']['type'] == "image/jpeg" || $files['img_id']['type'] == "image/png" || $files['img_id']['type'] == "image/jpg" || $files['img_id']['type'] == "image/gig") {
				
				$files['img_id']['name'] = str_replace($replace, '_', $files['img_id']['name']);
				move_uploaded_file($files['img_id']['tmp_name'], DOCUMENT_ROOT.'assets/img/company/'.$files['img_id']['name']);
				$img_title = explode('.', $files['img_id']['name']);
				$last_img_id = ImgData::insert_img($files['img_id']['name'], $img_title[0]);
				$img_id = $last_img_id;
			}
			return $img_id;
		}
		public static function add_symptoms_product_index($products_id, $post){
			if (isset($post['symptom_id'])) {
				foreach ($post['symptom_id'] as $symptom) {
					ProductsData::addSymptomsProducts($products_id, $symptom);
				}
			}
		}
		public static function product_with_symptoms(){
			$products = ProductsData::all_products();
			foreach ($products as $key => $value) {
				$symptoms = ProductsData::products_simptoms($value['product_id']);
				$products[$key]['symptoms'] = $symptoms;
			}
			return $products;
		}
		public static function change_product_ruter($post, $files){
			
			function identical_values( $arrayA , $arrayB ) { 
			    sort( $arrayA ); 
			    sort( $arrayB ); 
			    return $arrayA == $arrayB; 
			}


			// preko product_id koji ce mi stici zi forme pod kljucem ['form_id_change_product'] nadji taj proizvod. ostale podatke koji stizu iz forme, ako su prazni stavljaj stare podatke a ako su novi menjaj. na kraju tako dobijanu varijablu vrati i sa njom radi kveri... nesto slicno imas i kod menjanja saveta ali to mozda i promenim...
			$product_new_data = array();
			$product_old_data = ProductsData::getSingleProduct($post['form_id_change_product']);
			$symptoms_data = ProductsData::products_simptoms($post['form_id_change_product']);
			$symptom_id_array = array();
			foreach ($symptoms_data as $key => $value) {
				array_push($symptom_id_array, $value['symptoms_id']);
			}
			$product_old_data['symptom_id'] = $symptom_id_array;

			// ovde porveravam da nije dosao nepromenjen zahtev. ako jeste vraca i ne dira bazu...
			if ($post['name'] == '' && $post['price'] == '' && $post['sifra'] == '' && $post['description'] == '' && $post['stock'] == '' && !isset($post['proizvodjac_id']) && !isset($post['status']) && !isset($post['kategorija_id']) && identical_values($post['symptom_id'], $product_old_data['symptom_id']) && $files['img_id']['size'] == 0) {
				return $product_new_data;
			}

			// ovde mozda napraviti neku funkciju da ne ponavljam ovo vise puta...
			if (!isset($post['name']) || $post['name'] == '') {
				$product_new_data['name'] = $product_old_data['name'];
			} else {
				$product_new_data['name'] = $post['name'];
			}
			
			if (!isset($post['price']) || $post['price'] == '') {
				$product_new_data['price'] = $product_old_data['price'];
			} else {
				$product_new_data['price'] = $post['price'];
			}
			
			if (!isset($post['sifra']) || $post['sifra'] == '') {
				$product_new_data['sifra'] = $product_old_data['sifra'];
			} else {
				$product_new_data['sifra'] = $post['sifra'];
			}
			
			if (!isset($post['description']) || $post['description'] == '') {
				$product_new_data['description'] = $product_old_data['description'];
			} else {
				$product_new_data['description'] = $post['description'];
			}
			
			if (!isset($post['stock']) || $post['stock'] == '') {
				$product_new_data['stock'] = $product_old_data['stock'];
			} else {
				$product_new_data['stock'] = $post['stock'];
			}
				// ijskdkw
			if (!isset($post['proizvodjac_id'])) {
				$product_new_data['proizvodjac_id'] = $product_old_data['proizvodjac_id'];
			} else {
				$product_new_data['proizvodjac_id'] = $post['proizvodjac_id'];
			}
			if (!isset($post['status'])) {
				$product_new_data['status'] = $product_old_data['status'];
			} else {
				$product_new_data['status'] = $post['status'];
			}

			if (!isset($post['kategorija_id'])) {
				$product_new_data['kategorija_id'] = $product_old_data['kategorija_id'];
			} else {
				$product_new_data['kategorija_id'] = $post['kategorija_id'];
			}


			// ako nista nije menjano za simptome onda nece radi nista, ali ako jeste onda brise stare relacije u indeksnoj tabeli i stavlja nove...ovo je brzo resenje ali svaki put kada se i samo jedan simptom promeni on obrise sve postojece veze i postavlja nove...

			if (!isset($post['symptom_id'])) {
				ProductsData::delete_products_symptoms($post['form_id_change_product']);
			} else if (identical_values($post['symptom_id'], $product_old_data['symptom_id']) == false) {
				ProductsData::delete_products_symptoms($post['form_id_change_product']);
				foreach ($post['symptom_id'] as $symptom) {
					ProductsData::addSymptomsProducts($post['form_id_change_product'], $symptom);
				}
			}
			if ($files['img_id']['size'] ==0) {
				$product_new_data['img_id'] = $product_old_data['img_id'];
			} else if ($files['img_id']['type'] != "image/jpeg" && $files['img_id']['type'] != "image/png" && $files['img_id']['type'] != "image/jpg" && $files['img_id']['type'] != "image/gig") {
				$product_new_data['img_id'] = $product_old_data['img_id'];
			} else {
				$product_new_data['img_id'] = self::uploadingImgProduct($post['form_id_change_product']);
			}
			return $product_new_data;
		}

}