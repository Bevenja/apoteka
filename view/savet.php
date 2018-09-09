<div class="container">
	<?php
		$savet = $this->data['single_advice'][0];
	?>
	<div class="savet">
		<h2 class="h2"><?php echo $savet['title']; ?></h2>
		<div class="savet_content">
			<p><strong><?php echo $savet['description']; ?></strong></p>
			<img src="<?php echo WEBSITE_URL.'assets/img/advices/'.$savet['img_url'];?>" class="img-responsive" style="width:100%" alt="<?php echo $savet['img_title'];?>">
			<p><?php echo $savet['advice_text'] ?></p>
			<p>Autor: <?php echo $savet['first_name'].' '.$savet['last_name']; ?></p>
			<p><?php echo $savet['time'] ?></p>
		</div>
	</div>


</div>