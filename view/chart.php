<div class="container">
	<h2 class="h2">Vasa korpa</h2>
	<div class="chart">
		<div class="chart_products" id="chart_products">
			<p>vasa korpa je prazna</p>
		</div>
		<br>
		<p class="chart_products">Cena lekova je: <span id="price">0</span> 
		<br>+ postarina: <span id="shiping_price"><?php echo $_SESSION['client'][0]['shiping_price']; ?></span> RSD.
		<br>UKUPNA CENA JE <span id="total_price">0</span> RSD
		</p>
		<form action="<?php echo WEBSITE_URL;?>client/buy" method="post">
			<input type="hidden" name="buy" id="buy" value="">
			<span name="buy_btn" class="btn btn-success">Kupi izabrane lekove</span>
		</form>
	</div>
	<div class="proizvodi text-center row">
		<h3>
			<a href="<?php echo WEBSITE_URL.'products';?>" class="btn btn-success">Pogledajte  nase proizvode</a>
		</h3>
	</div>
</div>



<!-- samo ovu formu napraviti malo lepse... da ide post, da ide id i takve stvari -->
<?php 
	// ovo ce da ide negde drugde naravno... koristi se for jer ne znam koliko ima ukupno clanova a moram da ih spajam i kolicinu i id...
	if (isset($_POST['buy'])) {
		$res = json_decode($_POST['buy']);
		var_dump($res);

		for ($i=0; $i <count($res->id) ; $i++) { 
			echo $res->id[$i]."  |  ".$res->kolicina[$i]."<br>";
		}
	}
?>