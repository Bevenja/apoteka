<div class="jumbotron">
	<div class="container text-center">
		<h1>Apoteka</h1>      
		<p>Dobrodošli u našu apoteku!</p>
		<p>Nudimo Vam šorko asortiman lekova i ostalih medicinskih sredstava</p>
	</div>
</div>
<div class="container-fluid bg-3 text-center ">    
	<h3>Iz ponude izdvajamo</h3><br>
	<div class="row">
		<?php
			foreach ($this->data['product_on_akcija'] as $product) {
				?>
					<div class="col-xs-6 col-sm-3 product_cotainer">
				    	<div class="product_content">
					    	<img src="<?php echo WEBSITE_URL.'assets/img/products/'.$product['img_url'];?>" class="img-responsive" style="width:100%" alt="Image">
					    	<h4 class="h4"><?php echo $product['name']; ?></h4>
					    	<!-- <span class="price">Cena: <?php echo $product['price']; ?> RSD</span> -->
					    	<span class="old_price"><?php echo $product['old_price']; ?></span>
				    		<span class="new_price"><?php echo $product['new_price']; ?></span>
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

	<div class="proizvodi text-center row">
		<h3>
			<a href="<?php echo WEBSITE_URL.'products';?>" class="btn btn-success">Pogledajte i nase ostale proizvode</a>
		</h3>
	</div>

	<div class="row">
		<div class="col-sm-6 col-md-3 info">
			<img src="<?php echo WEBSITE_URL.'assets/img/website/truck2.png';?>" alt="">
			<h4>Dostava i plaćanje</h4>
			<p>Dostavu vršimo putem kurirske službe na teritoriji cele Srbije. Plaćanje se vrši pouzećem i cena dostave zavisi od grada u koji se salje. Trenutno nemamo mogućnost slanja u druge zemlje.</p>
		</div>
		<div class="col-sm-6 col-md-3 info">
			<img src="<?php echo WEBSITE_URL.'assets/img/website/time2.png';?>" alt="">
			<h4>Radno vreme</h4>
			<p>Porudžbine preko sajta primamo: 00 – 24 h. Slanje porudžbina vršimo isključivo radnim danima do 15h (zbog kurirske službe).</p>
		</div>
		<div class="clearfix visible-sm"></div>
		<div class="col-sm-6 col-md-3 info">
			<img src="<?php echo WEBSITE_URL.'assets/img/website/lock2.png';?>" alt="">
			<h4>Gde se nalazimo?</h4>
			<p>Apoteka se nalazi na Karaburmi – Beograd. Telefone, radno vreme kao i precizne lokacije možete pronaći na stranici Kontakt.</p>
		</div>
		<div class="col-sm-6 col-md-3 info">
			<img src="<?php echo WEBSITE_URL.'assets/img/website/question2.png';?>" alt="">
			<h4>Imate pitanje?</h4>
			<p>Tu smo zbog Vas. Za sva pitanja stojimo Vam na raspolaganju. Možete nam pisati sa stranice: Kontakt ili pozvati na telefon apoteke.</p>
		</div>
	</div>
</div>
