<?php 
	require 'view/includes/admin_nav.php';
	// var_dump($this->data['employees']);
	// var_dump($this->data['employeesAdmin']);
	// var_dump($this->data['employeesButNoAdmin']);
?>
<div class="container-fluid">
<!-- 	<h3 class="h3">svi zaposleni</h3>
	<div class="row">
		
	</div> -->
	<h3 class="h3"> dodaj novog zaposlenog</h3>
  	<div class="row">
      	<form name="" action="<?php echo WEBSITE_URL; ?>admin/new_employees" method="post" enctype="multipart/form-data" class="form-horizontal">
			<div class="clearfix form-group">
				<label for="first_name" class="control-label col-sm-2">Ime</label>
				<div class="col-sm-8">
					<input type="text" name="first_name" id="first_name" placeholder="" required="" class="form-control">
				</div>
			</div>
			<div class="clearfix form-group">
				<label for="last_name" class="control-label col-sm-2">Prezime</label>
				<div class="col-sm-8">
					<input type="text" name="last_name" id="last_name" placeholder="" required="" class="form-control">
				</div>
			</div>
			<div class="clearfix form-group">
				<label for="jmbg" class="control-label col-sm-2">Vas JMBG</label>
				<div class="col-sm-8">
					<input type="number" name="jmbg" id="jmbg" placeholder="" required="" class="form-control">
				</div>
			</div>
			<div class="clearfix form-group">
				<label for="email" class="control-label col-sm-2">Email</label>
				<div class="col-sm-8">
					<input type="text" name="email" id="email" placeholder="" required="" class="form-control">
				</div>
			</div>
			<div class="clearfix form-group">
				<label for="address" class="control-label col-sm-2">Adresa</label>
				<div class="col-sm-8">
					<input type="text" name="address" id="address" placeholder="" required="" class="form-control">
				</div>
			</div>
			<div class="clearfix form-group">
				<label for="city" class="control-label col-sm-2">Grad</label>
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
				<label for="phone" class="control-label col-sm-2">Telefon</label>
				<div class="col-sm-8">
					<input type="number" name="phone" id="phone" placeholder="" required="" class="form-control">
				</div>
			</div>	
				<div class="form-group">
					<label for="img_id" class="col-sm-2 control-label">Slika</label>
					<div class="col-sm-8">
						<input type="file" name="img_id" id="img_id" />
					</div>
				</div>
				<input type="hidden" name="form_id_new_employees">
				<div class="col-sm-offset-2 col-sm-8 text-left">
					<input type="submit" name="" value="Registruj" class="btn btn-success ">
				</div>
		</form>
  	</div>
	<h3 class="h3">dodaj novog admina</h3>
	<div class="row dodatak">
		<form action="<?php echo WEBSITE_URL; ?>admin/new_admin" method="post" class="form-inline">
			<div class="form-group">
				<label for="emp_id">Izaberi zaposlenog</label>
				<select name="emp_id" id="emp_id" class="form-control">
					<option value="" disabled selected >izaberi zaposlenog</option> 
					<?php 
						foreach ($this->data['employeesButNoAdmin'] as $emp) {
							echo '<option value="'.$emp['emp_id'].'">'.$emp['first_name'].' '.$emp['last_name'].'</option>';
						}
					?>
				</select>
			</div>
			<div class="form-group">
				<label for="username">Username</label>
				<input class="form-control" type="text" name="username" id="username" required="">
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input class="form-control" type="password" name="password" id="password" required="">
			</div>
			<div class="form-group">
				<label for="reentry_password">Reentry-password</label>
				<input class="form-control" type="password" name="reentry_password" id="reentry_password" required="">
			</div>
			<input type="hidden" name="form_id_add_admin">
			<input type="submit" value="dodaj" class="btn btn-default">
		</form>
	</div>
</div>
