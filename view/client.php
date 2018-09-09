<?php 
	$client = $this->data['client'][0];
	$purchase_status_1 = $this->data['purchase_status_1'];
	$purchase_status_2 = $this->data['purchase_status_2'];
	$purchase_status_3 = $this->data['purchase_status_3'];
	$purchase_status_0 = $this->data['purchase_status_0'];

	
?>
<div class="container">
	<h2 class="h2">Vas profil</h2>
	<div class="row">
		<div class="col-sm-4 dodatak">
			<h3 class="h3">Vasi podaci</h3>
			<?php
				if ($client['type'] == 1) {
					echo '<p>Ime i prezime: <strong>'.$client['first_name'].' '.$client['last_name'].'</strong></p><p>Vas JMBG je: <strong>'.$client['jmbg'].'</strong></p>'; 
				} else {
					echo '<p>Ime kompanije: <strong>'.$client['name'].'</strong></p><p>Vas PIB je: <strong>'.$client['pib'].'</strong></p>'; 
				}
			?>
			<p>Vasa adresa je: <strong><?php echo $client['address']; ?></strong></p>
			<p>Grad: <strong><?php echo $client['city']; ?></strong></p>
			<p>Kontakt telefon: <strong><?php echo $client['phone']; ?></strong></p>
			<p>email: <strong><?php echo $client['mail']; ?></strong></p>
		</div>
		<div class="col-sm-8 porudzbine">
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
		      		<hr>
			      	<?php
			      		}
			      	?>
			    </div>
			    <div id="poslate" class="tab-pane fade">
			      	<h3>Porudzbine su poslate i mozete ocekivati isporuku</h3>
			     	<?php
			      		foreach ($purchase_status_2 as $key => $value) {
			      		$brojac = 0;
			      	?>
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
		      		<hr>
			      	<?php
			      		}
			      	?>
			    </div>
			    <div id="dospele" class="tab-pane fade">
			      	<h3>Porudbine su stigle, placene i preuzete</h3>
			     	<?php
			      		foreach ($purchase_status_3 as $key => $value) {
			      		$brojac = 0;
			      	?>
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
		      		<hr>
			      	<?php
			      		}
			      	?>
			    </div>
			  </div>
		</div>
	</div>
</div>
