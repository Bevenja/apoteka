<?php 
	require 'view/includes/admin_nav.php';
	$purchase_status_1 = $this->data['purchase_status_1'];
	$purchase_status_2 = $this->data['purchase_status_2'];
	$purchase_status_3 = $this->data['purchase_status_3'];
	$purchase_status_0 = $this->data['purchase_status_0'];
?>
<div class="container">
	<h2 class="h2">sve narudzbine</h2>
	<ul class="nav nav-tabs">
			    <li class="active"><a data-toggle="tab" href="#naruceno">Naruceno</a></li>
			    <li><a data-toggle="tab" href="#poslate">Poslate</a></li>
			    <li><a data-toggle="tab" href="#dospele">Dospele</a></li>
			    <li><a data-toggle="tab" href="#dospele">Otkazane</a></li>
			  </ul>

			  <div class="tab-content">
			    <div id="naruceno" class="tab-pane fade in active">
			     	<h3>Porudzbine koje ste narucili cekaju odobrenje da budu poslate</h3>
			     	<?php
			      		foreach ($purchase_status_1 as $key => $value) {
			      		$brojac = 0;
			      	?>
					<p>ID klijenta: <strong><?php echo $value['clients_id']; ?></strong></p>
					<p>Sifra porudzbine: <strong><?php echo $value['id']; ?></strong></p>
					<p>Ukupna vrednost: <strong><?php echo $value['total']; ?></strong></p>
					<p>Vreme narucivanja: <strong><?php echo $value['time']; ?></strong></p>
		      		<p>Proizvodu i kolicina: <strong>
		      		<?php
		      			foreach ($value['name'] as $lek) {
		      				echo $lek.'</strong> komada <strong>'.$value['quantity'][$brojac].'; '; 
		      				$brojac++;
		      			}
		      		?>
					</strong></p>
					<a href="<?php echo WEBSITE_URL.'admin/single_user/'.$value['users_id'];?>" class="btn btn-success">Vidi detalje</a>
					<form action="<?php echo WEBSITE_URL ?>admin/purchase_change" method="post">
						<input type="radio" name="status" id="status" value="2">Posalji
						<input type="radio" name="status" id="status" value="0">Otkazi posiljku
						<input type="hidden" name="form_id" id="form_id" value="<?php echo $value['id'] ?>">
						<input type="submit" value="izvrsi">
					</form>
		      		<hr>
			      	<?php
			      		}
			      	?>
			    </div>
			    <div id="poslate" class="tab-pane fade">
			      	<h3>Porudzbine su poslate i mozete ocekivati isporuku nakon cega se to i konstatuje</h3>
			     	<?php
			      		foreach ($purchase_status_2 as $key => $value) {
			      		$brojac = 0;
			      	?>
					<p>ID klijenta: <strong><?php echo $value['clients_id']; ?></strong></p>
					<p>Sifra porudzbine: <strong><?php echo $value['id']; ?></strong></p>
					<p>Ukupna vrednost: <strong><?php echo $value['total']; ?></strong></p>
					<p>Vreme narucivanja: <strong><?php echo $value['time']; ?></strong></p>
		      		<p>Proizvodu i kolicina: <strong>
		      		<?php
		      			foreach ($value['name'] as $lek) {
		      				echo $lek.'</strong> komada <strong>'.$value['quantity'][$brojac].'; '; 
		      				$brojac++;
		      			}
		      		?>
					</strong></p>
					<a href="<?php echo WEBSITE_URL.'admin/single_user/'.$value['users_id'];?>" class="btn btn-success">Vidi detalje</a>
					<form action="<?php echo WEBSITE_URL ?>admin/purchase_change" method="post">
						<input type="radio" name="status" id="status" value="2">Primljene i placene
						<input type="radio" name="status" id="status" value="0">Otkazi posiljku
						<input type="hidden" name="form_id" id="form_id" value="<?php echo $value['id'] ?>">
						<input type="submit" value="izvrsi">
					</form>
		      		<hr>
			      	<?php
			      		}
			      	?>
			    </div>
			    <div id="dospele" class="tab-pane fade">
			      	<h3>Porudzbine su stigle, placene i preuzete</h3>
			     	<?php
			      		foreach ($purchase_status_3 as $key => $value) {
			      		$brojac = 0;
			      	?>
					<p>ID klijenta: <strong><?php echo $value['clients_id']; ?></strong></p>
					<p>Sifra porudzbine: <strong><?php echo $value['id']; ?></strong></p>
					<p>Ukupna vrednost: <strong><?php echo $value['total']; ?></strong></p>
					<p>Vreme narucivanja: <strong><?php echo $value['time']; ?></strong></p>
		      		<p>Proizvodu i kolicina: <strong>
		      		<?php
		      			foreach ($value['name'] as $lek) {
		      				echo $lek.'</strong> komada <strong>'.$value['quantity'][$brojac].'; '; 
		      				$brojac++;
		      			}
		      		?>
					</strong></p>
					<a href="<?php echo WEBSITE_URL.'admin/single_user/'.$value['users_id'];?>" class="btn btn-success">Vidi detalje</a>
					<!-- <form action="<?php echo WEBSITE_URL ?>admin/purchase_change" method="post">
						<input type="radio" name="status" id="status" value="2">Posalji
						<input type="radio" name="status" id="status" value="0">Otkazi posiljku
						<input type="hidden" name="form_id" id="form_id" value="<?php echo $value['id'] ?>">
						<input type="submit" value="izvrsi">
					</form> -->
		      		<hr>
			      	<?php
			      		}
			      	?>
			    </div>
			    <div id="dospele" class="tab-pane fade">
			      	<h3>Porudzbina iz nekog razloga nije realizovana, za vise informacija obratite nam se telefonom</h3>
			     	<?php
			      		foreach ($purchase_status_0 as $key => $value) {
			      		$brojac = 0;
			      	?>
					<p>ID klijenta: <strong><?php echo $value['clients_id']; ?></strong></p>
					<p>Sifra porudzbine: <strong><?php echo $value['id']; ?></strong></p>
					<p>Ukupna vrednost: <strong><?php echo $value['total']; ?></strong></p>
					<p>Vreme narucivanja: <strong><?php echo $value['time']; ?></strong></p>
		      		<p>Proizvodu i kolicina: <strong>
		      		<?php
		      			foreach ($value['name'] as $lek) {
		      				echo $lek.'</strong> komada <strong>'.$value['quantity'][$brojac].'; '; 
		      				$brojac++;
		      			}
		      		?>
					</strong></p>
					<a href="<?php echo WEBSITE_URL.'admin/single_user/'.$value['users_id'];?>" class="btn btn-success">Vidi detalje</a>
			<!-- 		<form action="<?php echo WEBSITE_URL ?>admin/purchase_change" method="post">
						<input type="radio" name="status" id="status" value="2">Posalji
						<input type="radio" name="status" id="status" value="0">Otkazi posiljku
						<input type="hidden" name="form_id" id="form_id" value="<?php echo $value['id'] ?>">
						<input type="submit" value="izvrsi">
					</form> -->
		      		<hr>
			      	<?php
			      		}
			      	?>
			    </div>
			  </div>
		</div>
</div>
