<?php 
	require 'view/includes/admin_nav.php';
	?>
	<div class="container">
		<div class="col-sm-6">
			<h2 class="h2">klijenti fizicka lica</h2>
			<form action="<?php echo WEBSITE_URL ?>admin/single_user" method="post">
				<div class="form-group">
					<select name="user_id" id="user_id" class="form-control">
						<option value="" disabled selected >izaberi klijenta</option> 
						<?php
							foreach ($this->data['all_clients_person'] as $fizicko_lice) {
								echo '<option value="'.$fizicko_lice['user_id'].'">'.$fizicko_lice['user_id'].' '.$fizicko_lice['first_name'].' '.$fizicko_lice['last_name'].'</option>';
								?>
							<?php

							} ?>
					</select>
				</div>
				<input type="hidden" name="form_id" id="form_id" value="">
				<div class="">
					<input type="submit" value="vidi detalje" class="btn btn-success">
				</div>
			</form>
		</div>
		<div class="col-sm-6">
			<h2 class="h2">klijenti pravna lica</h2>
			<form action="<?php echo WEBSITE_URL ?>admin/single_user" method="post">
				<div class="form-group">
					<select name="user_id" id="user_id" class="form-control">
						<option value="" disabled selected >izaberi klijenta</option> 
						<?php
							foreach ($this->data['all_clients_company'] as $pravno_lice) {
								echo '<option value="'.$pravno_lice['user_id'].'">'.$pravno_lice['user_id'].' '.$pravno_lice['name'].'</option>';
								?>
							<?php

							} ?>
					</select>
				</div>
				<input type="hidden" name="form_id" id="form_id" value="">
				<input type="submit" value="vidi detalje" class="btn btn-success">
			</form>
		</div>
		<h2 class="h2">Novi klijenti</h2>
		<div class="row">
			<h4 class="h4">fizicka lica</h4>
		</div>
	<?php
		foreach ($this->data['all_clients_person_new'] as $fizicko_lice) {
			?>
			<div class="dodatak row">
				<h3 class="h3">Osnovni podaci</h3>
				<p>Ime i prezime: <strong><?php echo $fizicko_lice['first_name'].' '. $fizicko_lice['last_name']; ?></strong></p>
				<p>jmbg: <strong><?php echo $fizicko_lice['jmbg']; ?></strong></p>
				<p>adresa: <strong><?php echo $fizicko_lice['address']; ?></strong></p>
				<p>Grad: <strong><?php echo $fizicko_lice['city']; ?></strong></p>
				<p>Kontakt telefon: <strong><?php echo $fizicko_lice['phone']; ?></strong></p>
				<p>email: <strong><?php echo $fizicko_lice['mail']; ?></strong></p>
				<form action="<?php echo WEBSITE_URL ?>admin/user_change_status" method="post">
					<input type="radio" name="status" id="status" value="1">Prihvati
					<input type="radio" name="status" id="status" value="2">Odbaci
					<input type="hidden" name="form_id" id="form_id" value="<?php echo $fizicko_lice['user_id']; ?>">
					<input type="submit" value="Izvrsi" class="btn btn-default">
				</form>
			</div>
			<?php
		}
		echo '<h4>pravna lica</h4>';
		foreach ($this->data['all_clients_company_new'] as $pravno_lice) {
			?>
			<div class="dodatak row">
				<h3 class="h3">Osnovni podaci</h3>
				<p>Ime companije: <strong><?php echo $pravno_lice['name'];?></strong></p>
				<p>pib: <strong><?php echo $pravno_lice['pib']; ?></strong></p>
				<p>adresa: <strong><?php echo $pravno_lice['address']; ?></strong></p>
				<p>Grad: <strong><?php echo $pravno_lice['city']; ?></strong></p>
				<p>Kontakt telefon: <strong><?php echo $pravno_lice['phone']; ?></strong></p>
				<p>email: <strong><?php echo $pravno_lice['mail']; ?></strong></p>
				<form action="<?php echo WEBSITE_URL ?>admin/user_change_status" method="post">
					<input type="radio" name="status" id="status" value="1">Prihvati
					<input type="radio" name="status" id="status" value="2">Odbaci
					<input type="hidden" name="form_id" id="form_id" value="<?php echo $pravno_lice['user_id']; ?>">
					<input type="submit" value="Izvrsi" class="btn btn-default">
				</form>
			</div>
			<?php
		}
		// var_dump($this->data['all_clients_company_new']);
	?>
</div>