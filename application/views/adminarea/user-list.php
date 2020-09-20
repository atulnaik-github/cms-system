<title><?php echo adminTitle."User List"; ?></title>
<main class="app-content">
<?php $this->load->view('adminarea/includes/alert-message'); ?>
	<div class="app-title">
		<div>
			<h1><i class="fa fa-th-list"></i> User List</h1>
		</div>
		<ul class="app-breadcrumb breadcrumb side">
			<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
			<li class="breadcrumb-item">User</li>
			<li class="breadcrumb-item active"><a href="<?= site_url('admin/user-list'); ?>">User List</a></li>
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
									<th>User Id</th>
									<th>Name</th>
									<th>Mobile Number</th>
									<th>DOB</th>
									<th>Number Of Post</th>
									<th>Status</th>
									<th width="20px">Edit</th>
									<th width="20px">Delete</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($user_details as $user) {?>
									<tr>
										<td class="align-middle py-1"><?php echo $user->user_id; ?></td>
										<td class="align-middle py-1"><?php echo $user->fname." ".$user->lname; ?></td>
										<td class="align-middle py-1"><?php echo $user->mobile; ?></td>
										<td class="align-middle py-1"><?php echo date('d M, Y',strtotime($user->date_of_birth)); ?></td>
										<td class="align-middle py-1"><?php echo $user->post_count; ?></td>
										<td class="align-middle py-1">
											<?php if ($user->status == '1') {?>
												<span class="badge badge-success">Active</span>
											<?php } else { ?>
												<span class="badge badge-danger">In-Active</span>
											<?php } ?>
										</td>
										<td class="align-middle py-1">
											<a href="<?= site_url('admin/edit-user/').$user->user_id;?>" class="btn btn-link btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fa fa-edit"></i></a>
										</td>
										<td class="align-middle py-1">
											<form action="<?= site_url('admin/delete-user'); ?>" method="post">
												<button class="btn btn-link btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" name="delete" value="<?php echo $user->user_id; ?>"><i class="fa fa-trash"></i></button>
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

