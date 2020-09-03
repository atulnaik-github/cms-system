<title><?php echo adminTitle."Add Post"; ?></title>
<main class="app-content">

	<div class="app-title">
		<div>
			<h1><i class="fa fa-edit"></i> Create New Post</h1>
		</div>
		<ul class="app-breadcrumb breadcrumb">
			<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
			<li class="breadcrumb-item">Post</li>
			<li class="breadcrumb-item"><a href="<?= site_url('admin/add-post'); ?>">Add Post</a></li>
		</ul>
	</div>
	<form action="<?= site_url('admin/add-post'); ?>" enctype="multipart/form-data" method="post">
		<div class="row">
			<div class="col-md-8">
				<div class="tile">
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group mb-4">
								<label for="post_title">Post Title</label>
								<input class="form-control" id="post_title" name="post_title" value="<?php echo set_value('post_title');?>" type="text" placeholder="Enter post title">
								<small><?php echo form_error('post_title'); ?></small>
							</div>
							<div class="form-group mb-4">
								<label for="post_category">Post Category</label>
								<select class="form-control text-capitalize" id="post_category" name="post_category">
									<option selected="" disabled="">-- Choose Category --</option>
									<?php foreach ($categories as $cat) {?>
										<option value="<?php echo $cat->id ;?>"><?php echo $cat->category_name; ?></option>
									<?php } ?>
								</select>
								<small><?php echo form_error('post_category'); ?></small>
							</div>
							<div class="form-group mb-4">
								<label for="post_img">Post Image</label>
								<input class="form-control-file" id="post_img" name="post_img" onChange="displayImage(this)" accept="image/*" type="file" require>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="tile">
					<div class="row">
						<div class="col-lg-12 text-center">
							<img src="<?= site_url('assets/adminarea/images/img-thumbnail.jpg'); ?>" onClick="triggerClick()" id="post_display" class="img-fluid" alt="img-thumbnail" style="height: 260px;">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="tile">
					<div class="row">
						<!-- <div class="col-md-12">
							<div class="form-group-inner">
									<textarea name="post_description" id="summernote4" value="" cols="30" rows="10" class="form-control topreasons" placeholder="Write here..."></textarea>
								<small><?php echo form_error('post_description'); ?></small>
							</div>
						</div> -->
						<div class="col-lg-12">
							<h4 class="card-title">Post Description</h4>
							<div class="box-body pad form-group mb-4">
								<textarea class="form-control" rows="10" placeholder="Place some text here" name="post_description"></textarea>
								<small><?php echo form_error('post_description'); ?></small>
							</div>
						</div>
					</div>
					<div class="tile-footer">
						<input class="btn btn-primary" type="submit" name="submit" id="submit">
					</div>
				</div>
			</div>
		</div>
	</form>
</main>

<script>
	function triggerClick(e) {
		document.querySelector('#post_img').click();
	}
	function displayImage(e) {
		if (e.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e){
				document.querySelector('#post_display').setAttribute('src', e.target.result);
			}
			reader.readAsDataURL(e.files[0]);
		}
	}
</script>