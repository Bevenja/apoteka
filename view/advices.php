<div class="container">
	<h2 class="h2">Saveti iz oblasti farmacije i medicine</h2>
	<?php
		$replace  = array(' ' , '/' , '<' , '>' , ';', '"' , '\'' , '`' , '%', '.', ',' , '+' , '-' , '[' , ']' , '!');
		$all_advices_description = $this->data['all_advices_description'];
		foreach ($all_advices_description as $advices) {
			$title_url = str_replace($replace, '_', $advices['title']);
			?>
			<!-- <a href="<?php // echo WEBSITE_URL.'advices/single_advice/'.$title_url; ?>">eeee</a> -->
			<div class="row mali_savet">
					<form action="<?php echo WEBSITE_URL.'advices/single_advice/'.$title_url; ?>"	method="post">
						<h4 class="klik h4 text-left"><?php echo $advices['title'] ?></h4>
						<div class="description">
						<!-- <p><?php echo $advices['description'] ?></p> -->
							<p>Autor: <?php echo $advices['first_name'].' '.$advices['last_name'].'. '.$advices['time']; ?> </p>
							<p><strong><?php echo $advices['description'] ?></strong></p>
						</div>
						<?php
							if (isset($advices['img_url'])) {
								?><img class="img-responsive" src="<?php echo WEBSITE_URL.'assets/img/advices/'.$advices['img_url'];?>" alt="<?php echo $advices['img_title'];?>">
								<?php						
							} 
						?>
						<input type="hidden" name="form_id_advice" value="<?php echo $advices['id']; ?>">
						<input type="submit" value="pogledaj_savet">
					</form>
			</div>
			<?php
		}
	?>

</div>