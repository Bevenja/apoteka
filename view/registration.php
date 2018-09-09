<div class="container-fluid text-center">
	<?php 
		if (!isset($_SESSION['user']) && !isset($_SESSION['admin'])){
	?>
		<h2 class="h2">Ulogujte se</h2>
		<div class="row log_in">
			<form action="<?php echo WEBSITE_URL;?>registration/is_log_in" method="post" class="form-horizontal" >
				<div class="form-group">
					<label for="username" class="control-label col-sm-2">Username</label>
					<div class="col-sm-6">
						<input type="text" id="username" name="username" class="form-control" required="">
					</div>
				</div>
				<div class="form-group">
					<label for="password" class="control-label col-sm-2">Password</label>
					<div class="col-sm-6">
						<input type="password" id="password" name="password" class="form-control" required="">
						<input type="hidden" id="log_in">
					</div>
				</div>
				<div class="form-group">        
				    <div class="col-sm-offset-2 col-sm-10 text-left">
						<input type="submit" value="log_in" class="btn btn-success">
					</div>
				</div>
			</form>
		</div>
	<?php 
		} else {
			?>
			<h2 class="h2">log out</h2>
			<div class="log_in row">
				<form action="<?php echo WEBSITE_URL; ?>registration/is_log_out" method="post">
					<input type="hidden" name="log_out" value="log_out">
					<input type="submit" name="log_out_btn" value="log_out" class="btn btn-success">
				</form>
			</div>
			<?php
		}

	?>
	<h2 class="h2">registracija novog korisnika</h2>
	<ul class="nav nav-tabs nav-justified">
	    <li class="active"><a data-toggle="tab" href="#fizicko">Registracija novog korisnicka (fizicko lice)</a></li>
	    <li><a data-toggle="tab" href="#pravno">Registracija novog korisnicka (pravno lice)</a></li>
	  </ul>

	  <div class="tab-content">
	    <div id="fizicko" class="tab-pane reg fade in active">
	      	<div class="row">
		      	<form name="" action="<?php echo WEBSITE_URL; ?>registration/new_client" method="post" class="form-horizontal">
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
					<div class="clearfix form-group">
						<label for="username_reg" class="control-label col-sm-2">Username</label>
						<div class="col-sm-8">
							<input type="text" name="username_reg" id="username_reg" placeholder="" required="" class="form-control">
						</div>
					</div>
					<div class="clearfix form-group">
						<label for="password_reg" class="control-label col-sm-2">Password</label>
						<div class="col-sm-8">
							<input type="password" name="password_reg" id="password_reg" placeholder="" required="" class="form-control">
						</div>
					</div>
					<div class="clearfix form-group">
						<label for="password_reg2" class="control-label col-sm-2">Reenter password</label>
						<div class="col-sm-8">
							<input type="password" name="password_reg2" id="password_reg2" placeholder="" required="" class="form-control">
						</div>
						<input type="hidden" name="form_id_new_client" value="person">
					</div>
					<div class="col-sm-offset-2 col-sm-8 text-left">
						<input type="submit" name="" value="Registruj" class="btn btn-success ">
					</div>
				</form>
	      	</div>
	    </div>
	    <div id="pravno" class="tab-pane reg fade">
	      	<h5>Registracija novog korisnicka (pravno lice)</h5>
			<div class="row">
				<form name="" action="<?php echo WEBSITE_URL; ?>registration/new_client" method="post"	class="form-horizontal">
					<div class="clearfix form-group">
						<label for="name_company" class="control-label col-sm-2">Ime</label>
						<div class="col-sm-8">
							<input type="text" name="name_company" id="name_company" placeholder="" required="" class="form-control">
						</div>
					</div>
					<div class="clearfix form-group">
						<label for="pib_company" class="control-label col-sm-2">PIB</label>
						<div class="col-sm-8">
							<input type="number" name="pib_company" id="pib_company" placeholder="" required="" class="form-control">
						</div>
					</div>
					<div class="clearfix form-group">
						<label for="email_company" class="control-label col-sm-2">Email</label>
						<div class="col-sm-8">
							<input type="text" name="email_company" id="email_company" placeholder="" required="" class="form-control">
						</div>
					</div>
					<div class="clearfix form-group">
						<label for="address_company" class="control-label col-sm-2">Adresa</label>
						<div class="col-sm-8">
							<input type="text" name="address_company" id="address_company" placeholder="" required="" class="form-control">
						</div>
					</div>
					<div class="clearfix form-group">
						<label for="city" class="control-label col-sm-2">Grad</label>
						<div class="col-sm-8">
							<select name="city_id_company" id="city_id_company" class="form-control">
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
						<label for="phone_company" class="control-label col-sm-2">Telefon</label>
						<div class="col-sm-8">
							<input type="number" name="phone_company" id="phone_company" placeholder="" required="" class="form-control">
						</div>
					</div>
					<div class="clearfix form-group">
						<label for="username_reg_company" class="control-label col-sm-2">Username</label>
						<div class="col-sm-8">
							<input type="text" name="username_reg_company" id="username_reg_company" placeholder="" required="" class="form-control">
						</div>
					</div>
					<div class="clearfix form-group">
						<label for="password_reg_company" class="control-label col-sm-2">Password</label>
						<div class="col-sm-8">
							<input type="password" name="password_reg_company" id="password_reg_company" placeholder="" required="" class="form-control">
						</div>
					</div><div class="clearfix form-group">
						<label for="password_reg2_company" class="control-label col-sm-2">Reenter password</label>
						<div class="col-sm-8">
							<input type="password" name="password_reg2_company" id="password_reg2_company" placeholder="" required="" class="form-control">
							<input type="hidden" name="form_id_new_client" value="company">
						</div> 
					</div>
					<div class="col-sm-offset-2 col-sm-8 text-left">
						<input type="submit" name="" value="Registruj" class="btn btn-success">
					</div>
				</form>
			</div>
	    </div>
	    
	  </div>
 	<div class="proizvodi text-center row">
		<h3>
			<a href="<?php echo WEBSITE_URL.'products';?>" class="btn btn-success">Pogledajte  nase proizvode</a>
		</h3>
	</div>

<!-- 	<h5>Registracija novog korisnicka (fizicko lice)</h5>
	<form name="" action="<?php echo WEBSITE_URL; ?>registration/new_client" method="post">
		<div class="clearfix">
			<label for="first_name">Ime</label>
			<input type="text" name="first_name" id="first_name" placeholder="Milan" required="">
		</div>
		<div class="clearfix">
			<label for="last_name">Prezime</label>
			<input type="text" name="last_name" id="last_name" placeholder="Tarot" required="">
		</div>
		<div class="clearfix">
			<label for="jmbg">Vas JMBG</label>
			<input type="number" name="jmbg" id="jmbg" placeholder="332333216166" required="">
		</div>
		<div class="clearfix">
			<label for="email">Email</label>
			<input type="text" name="email" id="email" placeholder="yourmail@example.com" required="">
		</div>
		<div class="clearfix">
			<label for="address">Adresa</label>
			<input type="text" name="address" id="address" placeholder="Gandijeva 666" required="">
		</div>
		<div>
			<label for="city">Grad</label>
			<select name="city_id" id="city_id">
				<option value="" disabled selected >izaberi grad</option> 
				<?php 
					foreach ($this->data['city'] as $city) {
						echo '<option value="'.$city['id'].'">'.$city['city'].'</option>';
					}
				?>
			</select>
		</div>
		<div class="clearfix">
			<label for="phone">Telefon</label>
			<input type="number" name="phone" id="phone" placeholder="333 666" required="">
		</div>
		<div class="clearfix">
			<label for="username_reg">Username</label>
			<input type="text" name="username_reg" id="username_reg" placeholder="Username" required="">
		</div>
		<div class="clearfix">
			<label for="password_reg">Password</label>
			<input type="password" name="password_reg" id="password_reg" placeholder="Gandijeva 666" required="">
		</div><div class="clearfix">
			<label for="password_reg2">Reenter password</label>
			<input type="password" name="password_reg2" id="password_reg2" placeholder="Gandijeva 666" required="">
		</div>
		<input type="hidden" name="form_id_new_client" value="person">
		<input type="submit" name="" value="Registruj">
	</form>
	<hr>
	<h5>Registracija novog korisnicka (pravno lice)</h5>
	<form name="" action="<?php echo WEBSITE_URL; ?>registration/new_client" method="post">
		<div class="clearfix">
			<label for="name">Ime</label>
			<input type="text" name="name" id="name" placeholder="" required="">
		</div>
		<div class="clearfix">
			<label for="pib">PIB</label>
			<input type="number" name="pib" id="pib" placeholder="332333216166" required="">
		</div>
		<div class="clearfix">
			<label for="email">Email</label>
			<input type="text" name="email" id="email" placeholder="yourmail@example.com" required="">
		</div>
		<div class="clearfix">
			<label for="address">Adresa</label>
			<input type="text" name="address" id="address" placeholder="Gandijeva 666" required="">
		</div>
		<div>
			<label for="city">Grad</label>
			<select name="city_id" id="city_id">
				<option value="" disabled selected >izaberi grad</option> 
				<?php 
					foreach ($this->data['city'] as $city) {
						echo '<option value="'.$city['id'].'">'.$city['city'].'</option>';
					}
				?>
			</select>
		</div>
		<div class="clearfix">
			<label for="phone">Telefon</label>
			<input type="number" name="phone" id="phone" placeholder="333 666" required="">
		</div>
		<div class="clearfix">
			<label for="username_reg">Username</label>
			<input type="text" name="username_reg" id="username_reg" placeholder="Username" required="">
		</div>
		<div class="clearfix">
			<label for="password_reg">Password</label>
			<input type="password" name="password_reg" id="password_reg" placeholder="Gandijeva 666" required="">
		</div><div class="clearfix">
			<label for="password_reg2">Reenter password</label>
			<input type="password" name="password_reg2" id="password_reg2" placeholder="Gandijeva 666" required="">
		</div>
		<input type="hidden" name="form_id_new_client" value="company">
		<input type="submit" name="" value="Registruj">
	</form> -->
</div>	