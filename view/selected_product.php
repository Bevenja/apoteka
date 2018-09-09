<?php 
$selected_product = $this->data['selected_product'][0];
// var_dump($selected_product); 
?>

<div class="container text-center selected_product">
	<h2 class="h2"><?php echo $selected_product['name']; ?></h2>
	<div class="row">
		<div class="col-sm-4 text-left dodatak111">
			<p><?php echo $selected_product['name']; ?></p>
			<p>Sifra: <?php echo $selected_product['sifra']; ?></p>
			<p>Cena: <?php echo $selected_product['price']; ?> RSD</p>
			<p>ATC kategorija: <?php echo $selected_product['kategorija']; ?></p>
			<p>Proizvodjac: <?php echo $selected_product['company_name']; ?></p>
			<?php if (isset($_SESSION['user'])) { ?>
			    	<form action="" method="post" id="add_to_chart_form">
						<input type="number" min="1" name="kolicina" id="kolicina<?php echo $selected_product['product_id']; ?>">
						<input type="hidden" name="dodaj" id="dodaj"  value="<?php echo $selected_product['product_id']; ?>">
						<input type="hidden" name="dodaj_all" id="dodaj_all"  value='<?php echo json_encode($selected_product); ?>'>
						<input type="button"  value="dodaj_u_korpu" id="<?php echo $selected_product['product_id']; ?>" class="dodaj btn btn-primary product">
					</form>
				<?php  } ?>
		</div>
		<div class="col-sm-8">
			<img class="img-responsive" style="width:100%" src="<?php echo WEBSITE_URL.'assets/img/products/'.$selected_product['img_url'];?>" alt="<?php echo $selected_product['image_title'];?>">
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12 text-left">
			<h4>Detalji o leku</h4>
			<p><?php echo $selected_product['description']; ?></p>
		</div>
	</div>

	
</div>