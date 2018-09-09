<?php	require 'view/includes/admin_nav.php'; ?>


<div class="container-fluid">
<h2 class="h2">Saveti</h2>	
<h3 class="h3">dodaj novi savet</h3>
<div class="row">

	<form action="<?php echo WEBSITE_URL.'admin/add_advice' ?>"	method="post" enctype="multipart/form-data" class="form-horizontal">
		<div class="form-group">
			<label class="col-sm-2 control-label" for="title">Naslov</label>
			<div class="col-sm-8">
				<input type="text" name="title" id="title" value="" required class="form-control">
				
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="description">Opis teksta</label>
			<div class="col-sm-8">
				<textarea name="description" id="description" value="" required class="form-control"></textarea>
				
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="advice_text">Tekst</label>
			<div class="col-sm-8">
				<input type="file" name="advice_text" id="advice_text" required class=""/>
				
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="img_id">Slika</label>
			<div class="col-sm-8">
				<input type="file" name="img_id" id="img_id" />
				
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="status">Status</label>
			<div class="col-sm-8">
				<input type="radio" name="status" id="status" value="1" required />Aktivan
				<input type="radio" name="status" id="status" value="0" />Neaktivan
				
			</div>
		</div>
		<input type="hidden" name="form_id_add_advice" value="">
		<div class="col-sm-offset-2 col-sm-8">
			<input type="submit" value="dodaj savet" class="btn btn-success">
		</div>
	</form>
</div>
<hr>
<h3 class="h3">izmeni postojece savete</h3>
<?php 
	$replace  = array(' ' , '/' , '<' , '>' , ';', '"' , '\'' , '`' , '%', '.', ',' , '+' , '-' , '[' , ']' , '!');
	$all_advices = $this->data['all_advices'];
	foreach ($all_advices as $advices) {
		$title_url = str_replace($replace, '_', $advices['title']);
		?>
		<div class="row">
			
			<form action="<?php echo WEBSITE_URL.'admin/change_advice' ?>"	method="post" enctype="multipart/form-data" class="form-horizontal">
				<div class="form-group">
					<label class="col-sm-2 control-label" for="title">Naslov</label>
					<div class="col-sm-8">
						<input class="form-control" type="text" name="title" id="title" value="<?php echo $advices['title']?>">
						
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="description">Opis teksta</label>
					<div class="col-sm-8">
						<textarea class="form-control" name="description" id="description" value="<?php echo $advices['description']?>" placeholder="<?php echo $advices['description']?>" ></textarea>
						
					</div>
				</div>
				<input type="hidden" name="description_old" id="description_old" value="<?php echo $advices['description']?>">
				<div class="form-group">
					<label class="col-sm-2 control-label" for="advice_text">Tekst</label>
					<div class="col-sm-8">
						<input class="" type="file" name="advice_text" id="advice_text" />
						
					</div>
				</div>
				<input type="hidden" name="advice_text_old" id="advice_text_old" value="<?php echo $advices['advice_text']?>">
				<div class="form-group">
					<label class="col-sm-2 control-label" for="img_id">Slika</label>
					<div class="col-sm-8">
						<input class="" type="file" name="img_id" id="img_id" />
						
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="status">Status</label>
					<div class="col-sm-8">
						<input class="" type="radio" name="status" id="status" value="1" required />Aktivan
						<input type="radio" name="status" id="status" value="0" />Neaktivan
						
					</div>
				</div>
				<input type="hidden" name="img_id_old" id="img_id_old" value="<?php echo $advices['img_id']?>">
				<input type="hidden" name="form_id_change_advice" value="<?php echo $advices['id']?>">
				<div class=" col-sm-offset-2 col-sm-8">
					<input type="submit" value="izmeni_savet" class="btn btn-success">
				</div>
			</form>
			<form action="<?php echo WEBSITE_URL.'advices/savet/'.$title_url; ?>" method="post">
				<!-- <a href="<?php // echo WEBSITE_URL.'advices/savet/'.$advices['id']; ?>">vidi detalje</a> -->
				<input type="hidden" name="form_id_advice" value="<?php echo $advices['id']?>">
				<input type="submit" value="pogledaj savet" class="btn btn-success">
			</form>
			<hr>
		</div>

		<?php
	}
?>
</div>