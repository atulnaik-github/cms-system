<title><?php echo adminTitle."Add User"; ?></title>
<main class="app-content">
<?php $this->load->view('adminarea/includes/alert-message'); ?>

	<div class="app-title">
		<div>
			<h1><i class="fa fa-edit"></i> Create New User</h1>
		</div>
		<ul class="app-breadcrumb breadcrumb">
			<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
			<li class="breadcrumb-item">User</li>
			<li class="breadcrumb-item"><a href="<?= site_url('admin/add-user'); ?>">Add User</a></li>
		</ul>
	</div>
	<form action="<?= site_url('admin/add-user'); ?>" enctype="multipart/form-data" method="post">
		<div class="row">
			<div class="col-md-8">
				<div class="tile">
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group mb-4">
								<label for="first_name">First Name</label>
								<input class="form-control" id="first_name" name="first_name" type="text" value="<?php echo set_value('first_name'); ?>" placeholder="Enter first name">
								<small><?php echo form_error('first_name'); ?></small>
							</div>
							<div class="form-group mb-4">
								<label for="last_name">Last Name</label>
								<input class="form-control" id="last_name" name="last_name" type="text" value="<?php echo set_value('last_name'); ?>" placeholder="Enter first name">
								<small><?php echo form_error('last_name'); ?></small>
							</div>
							<div class="form-group mb-4">
								<label for="user_img">User Image</label>
								<input class="form-control-file" id="user_img" name="user_img" onChange="displayImage(this)" value="<?php echo set_value('user_img') ;?>" type="file" accept="image/*">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="tile">
					<div class="row">
						<div class="col-lg-12 text-center">
							<img src="<?= site_url('assets/adminarea/images/img-thumbnail.jpg'); ?>" onClick="triggerClick()" id="user_display" class="img-fluid" alt="img-thumbnail" style="height: 260px;">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="tile">
					<div class="row">
						<div class="col-lg-12">
							<div class="row">
								<div class="col-lg-4">
									<div class="form-group mb-4">
										<label for="mobile">Mobile</label>
										<input class="form-control" id="mobile" name="mobile" value="<?php echo set_value('mobile'); ?>" type="number" placeholder="Enter mobile number">
										<small><?php echo form_error('mobile'); ?></small>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group mb-4">
										<label for="dob">DOB (Date of Birth)</label>
										<input class="form-control" id="dob" name="dob" value="<?php echo set_value('dob'); ?>" type="date">
										<small><?php echo form_error('dob'); ?></small>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group mb-4">
										<label for="gender">Gender</label>
										<div class="row">
											<div class="col-lg-6">
												<div class="animated-radio-button">
													<label>
														<input type="radio" name="gender" value="male" checked=""><span class="label-text">Male</span>
													</label>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="animated-radio-button">
													<label>
														<input type="radio" name="gender" value="female"><span class="label-text">Female</span>
													</label>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group mb-4">
								<label for="address">Address</label>
								<textarea name="address" id="address" cols="30" rows="2" class="form-control" placeholder="Enter address"><?php echo set_value('address'); ?></textarea>
								<small><?php echo form_error('address'); ?></small>
							</div>
							<div class="row">
								<div class="col-lg-3">
									<div class="form-group mb-4">
										<label for="country">Country</label>
										<select name="country" id="country" class="form-control">
											<option value="" selected="" disabled="">-- Choose Country --</option>
											<?php foreach ($country as $countries): ?>
												<option value="<?php echo $countries->id; ?>"><?php echo $countries->name; ?></option>
											<?php endforeach ?>
										</select>
										<small><?php echo form_error('country'); ?></small>
									</div>
								</div>
								<div class="col-lg-3">
									<div class="form-group mb-4">
										<label for="state">State</label>
										<select name="state" id="state" class="form-control">
											<option value="" selected="" disabled="">-- Choose State --</option>
											<option value="1">1</option>
											<option value="1">1</option>
										</select>
										<small><?php echo form_error('state'); ?></small>
									</div>
								</div>
								<div class="col-lg-3">
									<div class="form-group mb-4">
										<label for="city">City</label>
										<select name="city" id="city" class="form-control">
											<option value="" selected="" disabled="">-- Choose City --</option>
											<option value="1">1</option>
											<option value="1">1</option>
										</select>
										<small><?php echo form_error('city'); ?></small>
									</div>
								</div>
								<div class="col-lg-3">
									<div class="form-group mb-4">
										<label for="zipcode">Zipcode</label>
										<input type="text" name="zipcode" id="zipcode" class="form-control" value="<?php echo set_value('zipcode'); ?>">
										<small><?php echo form_error('zipcode'); ?></small>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group mb-4">
										<label for="username">Username</label>
										<input class="form-control" id="username" name="username" type="text" value="<?php echo set_value('username'); ?>" placeholder="Enter usenname">
										<small><?php echo form_error('username'); ?></small>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group mb-4">
										<label for="email">Email</label>
										<input class="form-control" id="email" name="email" type="email" value="<?php echo set_value('email'); ?>" placeholder="Enter email">
										<small><?php echo form_error('email'); ?></small>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group mb-4">
										<label for="password">Password</label>
										<input class="form-control" id="password" name="password" type="password" value="" placeholder="Enter password">
										<small><?php echo form_error('password'); ?></small>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group mb-4">
										<label for="confirm_password">Confirm Password</label>
										<input class="form-control" id="confirm_password" name="confirm_password" type="password" value="" placeholder="Enter confirm password">
										<small><?php echo form_error('confirm_password'); ?></small>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tile-footer">
						<input class="btn btn-primary" name="submit" id="submit" type="submit" value="Submit">
					</div>
				</div>
			</div>
		</div>
	</form>
</main>

<script>
	function triggerClick(e) {
		document.querySelector('#user_img').click();
	}
	function displayImage(e) {
		if (e.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e){
				document.querySelector('#user_display').setAttribute('src', e.target.result);
			}
			reader.readAsDataURL(e.files[0]);
		}
	}
</script>