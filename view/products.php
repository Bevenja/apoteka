<div class="container-fluid text-center">
	<h2 class="h2 products">Pretrazite proizvode</h2>
	<ul class="nav nav-tabs nav-justified text-center">
	    <li class="active"><a data-toggle="tab" href="#ime">Pretraga po imenu</a></li>
	    <li><a data-toggle="tab" href="#proizvodjac">Pretraga po proizvodjacu</a></li>
	    <li><a data-toggle="tab" href="#kategorija">Pretraga po kategoriji</a></li>
	    <li><a data-toggle="tab" href="#simptom">Pretraga po simptomu</a></li>
	</ul>

	<div class="tab-content products">
	    <div id="ime" class="tab-pane fade in active">
		    <h3>Pretraga po imenu</h3>
				<form action="<?php echo WEBSITE_URL ?>Products/searched_products_ruter" method="post"  class="form-horizontal">
					<div class="form-group">
						<label class="control-label col-sm-2" for="search">Pretraga:</label>
						<div class="col-sm-8">
							<input type="text" name="search" id="search" placeholder="unesite naziv leka" class="form-control">
						</div>
					</div>
					<input type="hidden" name="form_id_search" value="search">
					<div class="form-group text-left">
						<div class=" col-sm-offset-2 col-sm-8">
							<input type="submit" value="trazi" class="btn btn-success ">
						</div>
					</div>
				</form>
	    </div>
	    
	    <div id="proizvodjac" class="tab-pane fade">
	    	<h3>Pretraga po proizvodjacu</h3>
			<div>
				<form action="<?php echo WEBSITE_URL ?>Products/searched_products_ruter" method="post" class="form-horizontal" id="pretraga_po_proizvodjacu">
					<div class="form-group">
						<label for="proizvodjac" class="control-label col-sm-2">Proizvodjac: </label>
						<div class="col-sm-8">
							<select name="proizvodjac" id="proizvodjac" class="form-control">
								<option value="" disabled selected >izaberi proizvodjaca</option> 
								<?php 
									foreach ($this->data['proizvodjaci'] as $proizvodjac) {
										echo '<option value="'.$proizvodjac['company_name'].'|'.$proizvodjac['proizvodjac_id'].'">'.$proizvodjac['company_name'].'</option>';
									}
								?>		
							</select>
						</div>
					</div>
					<input type="hidden" name="form_id_proizvodjac" id="form_id_proizvodjac" value="proizvodjac">
					<div class="form-group text-left">
						<div class="col-sm-offset-2 col-sm-8">
							<input type="submit" value="prikazi" class="btn btn-success " id="pretraga_po_proizvodjacu_btn">
						</div>
					</div>
				</form>
			</div>
	    </div>

	    <div id="kategorija" class="tab-pane fade">
	    	<h3>Pretraga po kategoriji</h3>
	    	<div>
				<form action="<?php echo WEBSITE_URL ?>Products/searched_products_ruter" method="post" class="form-horizontal" id="pretraga_po_atc">
					<!-- <p>Izaberite lekove po atc klasifikaciji.</p> -->
					<div class="form-group">
						<label for="proizvodjac" class="control-label col-sm-2">ATC klasifikacija: </label>
						<div class="col-sm-8">
							<select name="atc_klasifikacija" id="atc_klasifikacija" class="form-control">
								<option value="" disabled selected >izaberi proizvodjaca</option> 
									<?php
									foreach ($this->data['atc'] as $atc) {
										echo '<option value="'.$atc['kategorija'].'|'.$atc['id'].'">'.$atc['kategorija'].'</option>';
									}
									 ?>	
								</select>
							</div>
						</div>
					<input type="hidden" name="form_id_atc" id="form_id_atc" value="atc">
					<div class="form-group text-left">
						<div class="col-sm-offset-2 col-sm-8">
							<input type="submit" value="prikazi" class="btn btn-success " id="pretraga_po_atc_btn">
						</div>
					</div>
				</form>
			</div>
	    </div>

	    <div id="simptom" class="tab-pane fade">
	    	<h3>Pretraga po simptomu</h3>
	    	<div class="row">
		    			
		    		<div class="col-sm-2">
						<p>pretraga po simptomima</p>
		    			</div>
		    		<div class="col-sm-10">
						<div class="dropdown text-left">
						    <form action="<?php echo WEBSITE_URL ?>Products/searched_products_ruter" method="post">
	    		<div class="form-group">
						    <button class="btn btn-success products dropdown-toggle text-center" type="button" data-toggle="dropdown">Izaberite simptome
						    <span class="caret"></span></button>
						    <ul class="dropdown-menu text-center">
									<?php 
									foreach ($this->data['symptoms'] as $symptom) {
										echo '<li><input type="checkbox" name="symptom_check[]" value="'.$symptom['id'].'|'.$symptom['symptom'].'">'.$symptom['symptom'].'</li>';
									}
									?>
							</ul>
							<input type="hidden" name="form_id_symptoms" id="form_id_symptoms" value="symptoms">
		    			</div>
		    		</div>
	    		</div>
			</div>
    		<div class="row">
    			<div class="form-group">
    				
		    		<div class="col-sm-offset-2 col-sm-10 text-left">
						<input type="submit" value="trazi" class="btn btn-success ">
							</form>
					</div>
    			</div>
    		</div>
	    </div>
	</div>
</div>
<div class="container-fluid text-center all_products">
	<h2 class="h2 products">Ovo su svi proizvodi u nasoj ponudi</h2>
<!-- 	<div>
		<table border="1" cellpadding="10">
			<tr>
				<th>naziv leka</th>
				<th>sifra</th>
				<th>cena</th>
				<th>opis</th>
				<th>atc kategorija</th>
				<th>proizvodjac</th>
				<th></th>
				<?php 
				if (isset($_SESSION['user'])) {
					echo "<th></th>";
				}
				?>
				
			</tr>
			<?php 
			foreach ($this->data['products'] as $product) {
				?>
				<tr>
					<td><?php echo $product['name']; ?></td>
					<td><?php echo $product['sifra']; ?></td>
					<td><?php echo $product['price']; ?></td>
					<td><?php echo $product['description']; ?></td>
					<td><?php echo $product['kategorija']; ?></td>
					<td><?php echo $product['company_name']; ?></td>
					<?php 
					if (isset($_SESSION['user'])) {
						?>
					<td>
						<form action="" method="post" id="add_to_chart_form">
							<input type="number" min="1" id="kolicina<?php echo $product['product_id']; ?>">
							<input type="hidden" name="dodaj" id="dodaj"  value="<?php echo $product['product_id']; ?>">
							<input type="hidden" name="dodaj_all" id="dodaj_all"  value='<?php echo json_encode($product); ?>'>
							<input type="button"  value="dodaj_u_korpu" id="<?php echo $product['product_id']; ?>" calss="dodaj">
						</form>
					</td>
						<?php
					}
					?>
					<td>
						<form action="<?php echo WEBSITE_URL ?>Products/searched_products_ruter" method="post">
							<input type="hidden" name="form_id_detalji" value="<?php echo $product['product_id'].'|'.$product['name']; ?>"		>
							<input type="submit" value="vidi detalje" class=" btn btn-success">
						</form>
					</td>
				</tr>
			<?php
				// var_dump(json_encode($product));
			}
			?>
		</table>
	</div> -->
	<div class="row">
		<?php
		foreach ($this->data['products'] as $product) {
			?>
				<div class="col-xs-6 col-sm-3 product_cotainer">
			    	<div class="product_content">
				    	<img src="<?php echo WEBSITE_URL.'assets/img/products/'.$product['img_url'];?>" class="img-responsive" style="width:100%" alt="Image">
				    	<h4 class="h4"><?php echo $product['name']; ?></h4>
				    	<span class="price">Cena: <?php echo $product['price']; ?> RSD</span>
					<?php if (isset($_SESSION['user'])) { ?>
				    	<form action="" method="post" id="add_to_chart_form">
							<input type="number" min="1" name="kolicina" id="kolicina<?php echo $product['product_id']; ?>">
							<input type="hidden" name="dodaj" id="dodaj"  value="<?php echo $product['product_id']; ?>">
							<input type="hidden" name="dodaj_all" id="dodaj_all"  value='<?php echo json_encode($product); ?>'>
							<input type="button"  value="dodaj_u_korpu" id="<?php echo $product['product_id']; ?>" class="dodaj btn btn-success product">
						</form>
					<?php  } ?>
						<form action="<?php echo WEBSITE_URL ?>Products/searched_products_ruter" method="post" class="form-group" >
							<input type="hidden" name="form_id_detalji" value="<?php echo $product['product_id'].'|'.$product['name']; ?>"		>
							<input type="submit" value="vidi detalje" class=" btn btn-success product_det form-control">
						</form>
			    	</div>
			    </div>
			<?php
		}
		?>
		</div>
	</div>
		
<!-- </div> -->

<!-- glavobolja
zubobolja
bol misica
mucnina
povracanje
vrtoglavica
hronicni umor
prehlada
menstrualni bolovi
bol u stomaku
upala misica
poviseni pritisak
pad pritiska
ubrzani puls
Problemi sa probavom
Učestalo mokrenje
alergijska reakcija
kijavica
gubitak apetita
zatvor
zamagljen vid
konstantna nervoza
nesanica
drhtavica
Ubrzan ili iregularni srčani ritam
Znojenje
Bledilo lica
Suvoća usta
Drhtavica
Ubrzano disanje
Osećaj trnjenja ili utrnulosti u usnama i prstima
Ubrzano disanje
Vrtloglavica
dijareja -->