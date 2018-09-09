<?php 
	require 'view/includes/admin_nav.php';
	// var_dump($this->data['product_not_akcija']);
	// die;
  ?>
<div class="container-fluid text-center">
	<h2 class="h2 text-left">dodaj product</h2>
	<div class="row">
		<form action="<?php echo WEBSITE_URL ?>admin/add_product" method="post" enctype="multipart/form-data" class="form-horizontal">
			<div class="form-group">
				<label for="name" class="control-label col-sm-2">Ime</label>
				<div class="col-sm-8">
					<input type="text" name="name" id="name" placeholder="" required class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label for="price" class="control-label col-sm-2">Cena</label>
				<div class="col-sm-8">
					<input type="number" name="price" id="price" placeholder="cena" step='0.01' required class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label for="sifra" class="control-label col-sm-2">Sifra</label>
				<div class="col-sm-8">
					<input type="number" name="sifra" id="sifra" placeholder="sifra" required class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label for="description" class="col-sm-2 control-label">Opis</label>
				<div class="col-sm-8">
					<textarea name="description" id="description" placeholder="opis" required class="form-control"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label for="stock" class="col-sm-2 control-label">Stanje</label>
				<div class="col-sm-8">
					<input type="number" name="stock" id="stock" placeholder="stanje" required class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label for="stock" class="col-sm-2 control-label">Status</label>
				<div class="col-sm-8">
					<input type="radio" name="status" id="status" value="1" required />U prodaji
					<input type="radio" name="status" id="status" value="0" />Van prodaje
				</div>
			</div>
			<div class="form-group">
				<label for="stock" class="col-sm-2 control-label">Izaberi proizvodjaca</label>
				<div class="col-sm-8">
					<select name="proizvodjac_id" id="proizvodjac_id" class="form-control">
						<option value="" disabled selected>izaberi proizvodjaca</option> 
							<?php 
								foreach ($this->data['proizvodjaci'] as $proizvodjac) {
									echo '<option value="'.$proizvodjac['proizvodjac_id'].'">'.$proizvodjac['company_name'].'</option>';
								}
							?>
						
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="stock" class="col-sm-2 control-label">Izaberi proizvodjaca</label>
				<div class="col-sm-8">
					<select name="kategorija_id" id="kategorija_id" class="form-control">
						<option value="" disabled selected >izaberi atc kategoriju</option> 
						<?php 
							foreach ($this->data['atc'] as $atc) {
								echo '<option value="'.$atc['id'].'">'.$atc['kategorija'].'</option>';
							}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="symptom_id[] " class="col-sm-2 control-label">Izaberi simptome</label>
					<div class="col-sm-8 text-left">
						<button class="btn btn-success products dropdown-toggle" type="button" data-toggle="dropdown">Izaberite simptome
						    <span class="caret"></span></button>
						    <ul class="dropdown-menu">
									<?php 
										foreach ($this->data['symptoms'] as $symptom) {
											echo '<li><input type="checkbox" name="symptom_id[]" value="'.$symptom['id'].'">'.$symptom['symptom'].'</li>';
										}
									?>
							</ul>
					</div>
			</div>
			<div class="form-group">
				<label for="img_id" class="col-sm-2 control-label">Dodaj sliku</label>
				<div class="col-sm-8">
					<input type="file" name="img_id" id="img_id" css="btn btn-success" />
					<input type="hidden" name="form_id_add_product" id="form_id_add_product">
				</div>
			</div>
			<div class="form-group">        
			    <div class="col-sm-offset-2 col-sm-10 text-left">
					<input type="submit" value="dodaj" class="btn btn-success">
				</div>
			</div>
		</form>
	</div>


	<div class="row">
		<h2 class="h2">izmeni postojece proizvode</h2>
		<?php 
			foreach ($this->data['products'] as $product) {
				// var_dump($product);
				?>
				<!-- <div class="row"> -->
					<h3 class="h3"><?php echo $product['name'] ?></h3>
					<form action="<?php echo WEBSITE_URL ?>admin/change_product" method="post" enctype="multipart/form-data" class="form-horizontal">
						<div class="form-group">
							<span class="col-sm-4"><?php echo $product['name'] ?></span>
							<div class="col-sm-6">
								<input type="text" name="name" id="name" placeholder="naziv leka" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<span class="col-sm-4"><?php echo $product['price'] ?></span>
							<div class="col-sm-6">
								<input type="number" name="price" id="price" placeholder="cena" step='0.01' class="form-control">
							</div>
						</div>
						<div class="form-group">
							<span class="col-sm-4"><?php echo $product['sifra'] ?></span>
							<div class="col-sm-6">
								<input type="number" name="sifra" id="sifra" placeholder="sifra" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<span class="col-sm-4"><?php echo $product['description'];	?></span>
							<div class="col-sm-6">
								<textarea name="description" id="description" placeholder="opis" class="form-control" ></textarea>
							</div>
						</div>
						<div class="form-group">
							<span class="col-sm-4"><?php echo $product['stock'] ?></span>
							<div class="col-sm-6">
								<input type="number" name="stock" id="stock" placeholder="stanje" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<span class="col-sm-4"><?php if ($product['status'] == 1) {
								echo "U prodaji";
							}  else {
								echo "Van prodaje";
							}
							?></span>
							<div class="col-sm-6">
								<input type="radio" name="status" id="status" value="0" />Van prodaje
								<input type="radio" name="status" id="status" value="1"  />U prodaji
							</div>
						</div>
						<div class="form-group">
							<span class="col-sm-4"><?php echo $product['company_name'] ?></span>
							<div class="col-sm-6">
								<select name="proizvodjac_id" id="proizvodjac_id" class="form-control">
									<option value="" disabled selected>izaberi proizvodjaca</option> 
										<?php 
											foreach ($this->data['proizvodjaci'] as $proizvodjac) {
												echo '<option value="'.$proizvodjac['proizvodjac_id'].'">'.$proizvodjac['company_name'].'</option>';
											}
										?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<span class="col-sm-4"><?php echo $product['kategorija'] ?></span>
							<div class="col-sm-6">
								<select name="kategorija_id" id="kategorija_id" class="form-control">
									<option value="" disabled selected >izaberi atc kategoriju</option> 
									<?php 
										foreach ($this->data['atc'] as $atc) {
											echo '<option value="'.$atc['id'].'">'.$atc['kategorija'].'</option>';
										}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<span class="col-sm-4"><?php 
								foreach ($product['symptoms'] as $key => $value) {
										echo $value['symptom'].'<br>';
									foreach ($value as $key2 => $value2) {
										// var_dump($value2);
									}
								}
							?></span>
							<div class="col-sm-6">
								<?php 
								foreach ($this->data['symptoms'] as $symptom) {
									$checked = '';
									foreach ($product['symptoms'] as $key => $value) {
										if ($value['symptoms_id'] == $symptom['id']) {
											$checked = 'checked';
										}
									}
										// var_dump($checked);
									echo '<input type="checkbox" name="symptom_id[]" value="'.$symptom['id'].'" '.$checked.'>'.$symptom['symptom'];
								}
								?>
							</div>
						</div>	
						<div class="form-group">
							<span class="col-sm-4"><?php echo $product['image_title'] ?></span>
							<div class="col-sm-6">
								<input type="file" name="img_id" id="img_id" />
							</div>
						</div>
						<input type="hidden" name="form_id_change_product" id="form_id_change_product" value="<?php echo $product['product_id'] ?>">
						<div class="col-sm-offset-4 col-sm-10 text-left">
							<input type="submit" value="izmeni" class="btn btn-success">
						</div>
					</form>
				<!-- </div> -->
				<hr>
				<?php
				}
			?>
	</div>

	
	<div class="row">
		<div class="col-sm-6">
			<h2 class="h2">dodaj novog proizvodjaca</h2>
			<form name="" action="<?php echo WEBSITE_URL; ?>admin/new_proizvodjac" method="post" enctype="multipart/form-data" class="form-horizontal">
				<div class="clearfix form-group">
					<label class="control-label col-sm-2" for="name">Ime</label>
					<div class="col-sm-8">
						<input type="text" name="name" id="name" placeholder="" required="" class="form-control">
					</div>
				</div>
				<div class="clearfix form-group">
					<label class="control-label col-sm-2" for="pib">pib</label>
					<div class="col-sm-8">
						<input type="number" name="pib" id="pib" placeholder="" required="" class="form-control">
					</div>
				</div>
				<div class="clearfix form-group">
					<label class="control-label col-sm-2" for="email">Email</label>
					<div class="col-sm-8">
						<input type="text" name="email" id="email" placeholder="" required="" class="form-control">
					</div>
				</div>
				<div class="clearfix form-group">
					<label class="control-label col-sm-2" for="address">Adresa</label>
					<div class="col-sm-8">
						<input type="text" name="address" id="address" placeholder="" required="" class="form-control">
					</div>
				</div>
				<div class="clearfix form-group">
					<label class="control-label col-sm-2" for="city">Grad</label>
					<div class="col-sm-8">
						<select name="city_id" id="city_id" class="form-control">
							<option value="" disabled selected >izaberi grad</option> 
							<?php 
								foreach ($this->data['city'] as $city) {
									echo '<option value="'.$city['id'].'">'.$city['city'].'</option>';
								}
							?>
						</select>
					</div>
				</div>
				<div class="clearfix form-group">
					<label class="control-label col-sm-2" for="phone">Telefon</label>
					<div class="col-sm-8">
						<input type="number" name="phone" id="phone" placeholder="" required="" class="form-control">
					</div>
				</div>
				<div>
					<label class="control-label col-sm-2" for="img_id">Slika</label>
					<div class="col-sm-8">
						<input type="file" name="img_id" id="img_id"/>
					</div>
				</div>
				<input type="hidden" name="form_id_new_proizvodjac">
				<div class="col-sm-offset-2 col-sm-10 text-left">
					<input type="submit" name="" value="Registruj" class="btn btn-success">
				</div>
			</form>
		</div>
		<div class="col-sm-6">
			<h3 class="h2">dodaj novi simptom</h3>
			<form action="<?php echo WEBSITE_URL; ?>admin/new_symptom" method="post" class="form-horizontal">
				<div class="form-group">
					<label for="symptom" class="col-sm-2 control-label">Simptom</label>
					<div class="col-sm-8">
						<input type="text" id="symptom" name="symptom" required="" class="form-control">
					</div>
				</div>
				<input type="hidden" name="form_id_symptom" id="form_id_symptom">
				<div class="col-sm-offset-2 col-sm-10 text-left">
					<input type="submit" value="dodaj" class="btn btn-success">
				</div>
			</form>
			<hr>
		</div>
		<hr>
	</div>

	<div class="row">
		<div class="col-sm-6">
			<h3>akcija</h3>
			<form action="<?php echo WEBSITE_URL; ?>admin/add_product_akcija" method="post" class="form-horizontal">
				<div class="form-group">
					<label for="product_id" class="control-label col-sm-2">Izaberi proizvod</label>
					<div class="col-sm-8 ">
						<select name="product_id" id="product_id" class="form-control">
							<option value="" disabled selected >izaberi proizvod</option> 
							<?php 
								foreach ($this->data['product_not_akcija'] as $product) {
									echo '<option value="'.$product['id'].'">'.$product['name'].' '.$product['price'].'</option>';
								}
							?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="percentage" class="control-label col-sm-2">Procenat</label>
					<div class="col-sm-8">
						<input type="number" name="percentage" id="percentage" required="" class="form-control">
					</div>
				</div>
				<div class="col-sm-offset-2 col-sm-8 text-left">
						<input type="hidden" name="form_id_add_akcija">
					<input type="submit" value="dodaj" class="btn btn-success">
				</div>
			</form>
		</div>
		<div class="col-sm-6">
			<h3>skini sa akcije</h3>
			<form action="<?php echo WEBSITE_URL; ?>admin/delete_product_akcija" method="post" class="form-horizontal text-left">
					<div class="form-group">
						<?php 
							foreach ($this->data['product_on_akcija'] as $product) {
								echo '<input type="checkbox" name="id[]" value="'.$product['id'].'|'.$product['old_price'].'|'.$product['product_id'].'">'.$product['name'].' staqra cena '.$product['old_price'].'; nova cena '.$product['new_price'].'<br>';
							}
						?>
					</div>
				<input type="hidden" name="form_id_adelete_akcija">
				<div class="col-sm-offset-2 col-sm-10 text-left">
					<input type="submit" value="izbrisi" class="btn btn-success">
				</div>
			</form>
		</div>
	</div>




</div>

