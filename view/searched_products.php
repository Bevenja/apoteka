<div class="container-fluid text-center">
	
<h2 class="h2">Trazeni proizvodi</h2>
<?php 
	// var_dump($this->data['selected_products']);
	// var_dump($_SESSION);
	// var_dump($this->data['kriterijum']);
	// var_dump($this->data['rezultat']);
echo '<h3 class="h3">'.$this->data['kriterijum'].' '.$this->data['rezultat'].'</h3>';
// var_dump(CONTROLER);
	if (isset($this->data['selected_products'][0]['symptom'])) {
		?>
		<!-- <div>
			<table border="1" cellpadding="10">
				<tr>
					<th>naziv leka</th>
					<th>sifra</th>
					<th>cena</th>
					<th>opis</th>
					<th>atc kategorija</th>
					<th>proizvodjac</th>
					<th>simptomi</th>
				</tr>
				<?php 
				foreach ($this->data['selected_products'] as $product) {
					?>
					<tr>
						<td><?php echo $product['name']; ?></td>
						<td><?php echo $product['sifra']; ?></td>
						<td><?php echo $product['price']; ?></td>
						<td><?php echo $product['description']; ?></td>
						<td><?php echo $product['kategorija']; ?></td>
						<td><?php echo $product['company_name']; ?></td>
						<td><?php echo $product['symptom']; ?></td>
					</tr>
				<?php
					}
				?>
			</table>
		</div> -->
		<div class="row">
			<?php
			foreach ($this->data['selected_products'] as $product) {
				?>
					<div class="col-xs-6 col-sm-3 product_cotainer">
				    	<div class="product_content">
					    	<img src="<?php echo WEBSITE_URL.'assets/img/products/'.$product['img_url'];?>" class="img-responsive" style="width:100%" alt="Image">
					    	<h4 class="h4"><?php echo $product['name']; ?></h4>
					    	<span class="price">Cena: <?php echo $product['price']; ?> RSD</span><br>
					    	<span class="price">Trazeni simptomi koji se poklapaju:<br> 
					    		<?php 
					    			$symptom = array();
					    			$symptom = explode('|', $product['symptom']);
					    			$product['symptom'] = str_replace('|', ', ', $product['symptom']);
					    			echo $product['symptom'];
					    		?></span>
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
	<?php
	} else {
		?>
		<!-- <div>
			<table border="1" cellpadding="10">
				<tr>
					<th>naziv leka</th>
					<th>sifra</th>
					<th>cena</th>
					<th>opis</th>
					<th>atc kategorija</th>
					<th>proizvodjac</th>
				</tr>
				<?php 
				foreach ($this->data['selected_products'] as $product) {
					?>
					<tr>
						<td><?php echo $product['name']; ?></td>
						<td><?php echo $product['sifra']; ?></td>
						<td><?php echo $product['price']; ?></td>
						<td><?php echo $product['description']; ?></td>
						<td><?php echo $product['kategorija']; ?></td>
						<td><?php echo $product['company_name']; ?></td>
					</tr>
				<?php
					}
				?>
			</table>
		</div> -->
		<div class="row">
			<?php
			foreach ($this->data['selected_products'] as $product) {
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
	<?php
	}
	?>
</div>
