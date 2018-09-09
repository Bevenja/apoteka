window.onload = function(){
	// apsolutna putanja do ruta sajta
	var WEBSITE_URL = 'http://localhost/bevenja/apoteka';
	var proizvodi = [];
	var total_price = 0;
	var total_price_shiping = 0;
	var purchase = {
		total_price : 0,
		id : [],
		kolicina : []
	};

	add_to_chart();
	remove_btn();

	// ova f priprema podatke koji dolaze vezane za proizvode iz php i stavlja ih u sessionStorage
	function add_to_chart(){
		var add_to_chart_form = document.getElementById('add_to_chart_form');
		var dugmad = document.querySelectorAll('input[value = "dodaj_u_korpu"]');

		for (var i = 0; i < dugmad.length; i++) {
			dugmad[i].onclick = function(event){
				var dugme = event.target;
				var forma = dugme.parentElement;
				var kolicina = forma.querySelector('input[type = "number"]').value;
				if (kolicina < 1) {
					kolicina = 1;
				}
				var id = forma.querySelector('input[id = "dodaj"]').value;
				var product = forma.querySelector('input[id = "dodaj_all"]').value;
				product = product.slice(0,-1)+',"kolicina" : "'+kolicina+'"}';
				// var all = JSON.parse(all);

				
				var values = [];
				sessionStorage.setItem('product_id_'+id, product);
				// sessionStorage.setItem('kolicina_'+id, kolicina);
				// sessionStorage.setItem('product_id_all'+id, all);
				
				forma.querySelector('input[type = "number"]').value = '';
			}
		}
		// 
				// sessionStorage.clear();
	}

	// samo ako sam na strani chart
	if (window.location.href == WEBSITE_URL+'/client/chart'){
		products_chart();
		delete_product();
		kupovina();
		change_product();
	}

	// kad se korisnik izloguje brise se sessionStorage
	var log_out_btn = document.querySelector('input[name="log_out_btn"]');
	if (log_out_btn != null){
		log_out_btn.onclick = function(){
			alert('cao cao');
			sessionStorage.clear();
		}
	}
	// samo ako sam na strani chart
	if (window.location.href == WEBSITE_URL+'/products'){
		
		var select = document.querySelector('select[name="proizvodjac"]');
		var pretraga_po_proizvodjacu = document.getElementById('pretraga_po_proizvodjacu');
		var pretraga_po_proizvodjacu_btn = document.getElementById('pretraga_po_proizvodjacu_btn');
		select_check(pretraga_po_proizvodjacu_btn, select, pretraga_po_proizvodjacu);

		var select = document.querySelector('select[name="atc_klasifikacija"]');
		var pretraga_po_atc = document.getElementById('pretraga_po_atc');
		var pretraga_po_atc_btn = document.getElementById('pretraga_po_atc_btn');
		select_check(pretraga_po_atc_btn, select, pretraga_po_atc);
		// 

	}
// definicije funkcija

	// ova f priprema podatke iz sessioaStorig i u odgovarajuci html ih ubacuje u div na strani
	function products_chart(){
		var div = document.getElementById('chart_products');
		var chart_products_HTML = '';
		var shiping_price = document.getElementById('shiping_price').innerHTML;
		shiping_price = shiping_price * 1;
		

		if (sessionStorage.length != 0) {
			var i = 0;
		    total_price = 0;
		    total_price_shiping = 0;
		    proizvodi = [];
			Object.entries(sessionStorage).forEach(([key, val]) => {
			    // 
			    // 
			    val = JSON.parse(val);
				chart_products_HTML += '<div class="product" id="'+key+'"><span>'+val.name+' </span><input type="number" min="1" value="'+val.kolicina+'" class="kolicina"><span class="otkazi btn btn-danger"> otkazi </span></div>';
			    div.innerHTML = chart_products_HTML;
			    proizvodi[i] = val.name +' '+val.kolicina;
		   		total_price +=(val.price*val.kolicina);
		   		document.getElementById('price').innerText = total_price + ' RSD';
		   		purchase.id[i] = val.product_id;
		   		purchase.kolicina[i] = val.kolicina;
			    i++;
			});
			total_price_shiping = total_price + shiping_price;
			total_price_shiping = total_price_shiping.toFixed(2);
	   		document.getElementById('total_price').innerText = total_price_shiping;
			purchase.total_price = total_price_shiping;

			kupovina();
			delete_product();
			change_product();
			
		} else {
		    proizvodi = [];
		    total_price = 0;
		    total_price_shiping = 0;
	   		document.getElementById('total_price').innerText = total_price_shiping;
	   		document.getElementById('price').innerText = total_price + ' RSD';
			chart_products_HTML = '<p> Vasa korpa je prazna </p>';
			div.innerHTML = chart_products_HTML;
			sessionStorage.clear();
		}
	}
	// ova dozvoljava brisanje
	function delete_product(){
		var dugmad = document.querySelectorAll('span[class = "otkazi btn btn-danger"]');
		for (var i = 0; i < dugmad.length; i++) {
			dugmad[i].onclick = function(event){
				var dugme = event.target;
				var div = dugme.parentElement;
				sessionStorage.removeItem(div.id);
				
				purchase.total_price = 0;
				purchase.id = [];
				purchase.kolicina = [];
				products_chart();
				// proizvodi = [];
			 //    total_price = 0;
			 //    total_price_shiping = 0;
				// kupovina();
			}
		}
	}
	// ova promenu kolicine
	function change_product(){
		var inputi = document.querySelectorAll('input[type = "number"]');
		for (var i = 0; i < inputi.length; i++) {
			inputi[i].onchange = function(event){
				// alert('dddd');
				var dugme = event.target;
				var div = dugme.parentElement;
				var kolicina = sessionStorage.getItem(div.id);
				var index = kolicina.indexOf('kolicina');
				kolicina = kolicina.slice(0,index)+'kolicina" : "'+dugme.value+'"}';
				// sessionStorage.removeItem(div.id);
				sessionStorage.setItem(div.id , kolicina);
				products_chart();
				// kupovina();
				
			}
		}
	}
	function kupovina(){
		var kupi_btn = document.querySelector('span[name="buy_btn"]');
		if (kupi_btn != null) {
			kupi_btn.onclick = function(){
				if (confirm('kupices ovo: '+proizvodi+' '+ 'a ukupna cena je: '+total_price_shiping+' RSD.')) {
					var buy = document.getElementById('buy');
					buy.value = JSON.stringify(purchase);
					var forma = kupi_btn.parentElement;
					sessionStorage.clear();
					forma.submit();
				}	
			}
		}
	}
	// sklanja dugme i dodaje da se klikom na h2 pristupa savetu
	function remove_btn(){
		// submit dugmad koja treba da se sklone
		var pogledaj_savet = document.querySelectorAll('input[value="pogledaj_savet"]');
		// dugme na koje treba da se klikne
		var link = document.getElementsByClassName('klik');
		for (var i = 0; i < pogledaj_savet.length; i++) {
			pogledaj_savet[i].style.display = 'none';
			link[i].onclick = function(event){
				var dugme = event.target;
				var forma = dugme.parentElement;
				forma.submit();
			}
		}
	}
	// funkcije za proveravanje formi
	function select_check(dugme, select_input, form){
		dugme.onclick = function(evt){
			evt.preventDefault();
			
			if (select_input.value == '') {
				alert('morate odabrati nesto');
			} else {
				form.submit();
			}

		}
	}

}