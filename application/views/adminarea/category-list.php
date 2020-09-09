<title><?php echo adminTitle."Category List"; ?></title>
<main class="app-content">
	<?php $this->load->view('adminarea/includes/alert-message'); ?>
	<div class="app-title">
		<div>
			<h1><i class="fa fa-th-list"></i> Category List</h1>
		</div>
		<ul class="app-breadcrumb breadcrumb side">
			<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
			<li class="breadcrumb-item">Category</li>
			<li class="breadcrumb-item active"><a href="<?= site_url('admin/category-list'); ?>">Category List</a></li>
		</ul>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="tile">
				<div class="tile-body">
					<div class="table-responsive">
						<table class="table table-hover table-bordered text-capitalize" id="sampleTable">
							<thead>
								<tr>
									<th width="10px">Cat.ID</th>
									<th>Created Date</th>
									<th>Category Name</th>
									<th>Number Of Post</th>
									<th>Status</th>
									<th width="20px">Edit</th>
									<th width="20px">Delete</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($catData as $cat) { ?>
								<tr>
									<td class="align-middle py-1"><?php echo $cat->id; ?></td>
									<td class="align-middle py-1"><?php echo date('d M, Y', strtotime($cat->created_at)); ?></td>
									<td class="align-middle py-1"><?php echo $cat->category_name; ?></td>
									<td class="align-middle py-1"><?php echo $cat->post_count; ?></td>
									<td class="align-middle py-1">
										<?php if ($cat->status == '1') {?>
										<span class="badge badge-success">Active</span>
										<?php } else { ?>
										<span class="badge badge-danger">In-Active</span>
										<?php } ?>
									</td>
									<td class="align-middle py-1">
										<a href="<?= site_url('admin/edit-category/').$cat->id; ?>" class="btn btn-link btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fa fa-edit"></i></a>
									</td>
									<td class="align-middle py-1">
										<form action="<?= site_url('admin/delete-category'); ?>" method="post">
											<button class="btn btn-link btn-sm" name="delete" value="<?php echo $cat->id; ?>" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
										</form>
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>