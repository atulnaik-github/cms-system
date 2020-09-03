<title><?php echo adminTitle."Add Category"; ?></title>
<main class="app-content">
	<?php $this->load->view('adminarea/includes/alert-message'); ?>
	<div class="app-title">
		<div>
			<h1><i class="fa fa-edit"></i> Create New Category</h1>
		</div>
		<ul class="app-breadcrumb breadcrumb">
			<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
			<li class="breadcrumb-item">Category</li>
			<li class="breadcrumb-item"><a href="<?= site_url('admin/add-category'); ?>">Add Category</a></li>
		</ul>
	</div>
	<form action="<?php echo site_url('admin/add-category'); ?>" method="post">
		<div class="row">
			<div class="col-md-6">
				<div class="tile">
					<div class="tile-body">
						<div class="form-group mb-4">
							<label for="category_name">Category Name</label>
							<input class="form-control" id="category_name" name="category_name" value="<?php echo set_value('category_name'); ?>" type="text" placeholder="Enter category name">
							<small><?php echo form_error('category_name'); ?></small>
						</div>
					</div>
					<div class="tile-footer">
						<input class="btn btn-primary" type="submit" name="submit" id="submit" value="Submit">
					</div>
				</div>
			</div>
		</div>
	</form>
</main>