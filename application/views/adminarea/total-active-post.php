    <title><?php echo adminTitle."Active Post List"; ?></title>
    <main class="app-content">
		<?php $this->load->view('adminarea/includes/alert-message'); ?>
    	<div class="app-title">
    		<div>
    			<h1><i class="fa fa-th-list"></i> Active Post List</h1>
    		</div>
    		<ul class="app-breadcrumb breadcrumb side">
    			<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    			<li class="breadcrumb-item">Dashboard</li>
    			<li class="breadcrumb-item active"><a href="<?= site_url('admin/total-active-post'); ?>">Total Active Post</a></li>
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
                                        <th>Sr.No</th>
    									<th width="50px">Post Id</th>
    									<th>Date</th>
    									<th>Post Title</th>
    									<th>Category</th>
    									<th>Post Author</th>
    									<th>Status</th>
    									<!-- <th>Is_deleted</th> -->
    									<th width="20px">Edit</th>
                                        <th width="20px">Delete</th>
    								</tr>
    							</thead>
    							<tbody>
    								<?php $count = 1; foreach ($postDetails as $post_details) {?>
	    								<tr>
                                            <td><?php echo $count;?></td>
	    									<td class="align-middle py-1"><?php echo $post_details->id; ?></td>
	    									<td class="align-middle py-1"><?php echo date('d M, Y',strtotime($post_details->created_at)); ?></td>
	    									<td class="align-middle py-1"><?php echo $post_details->post_title; ?></td>
	    									<td class="align-middle py-1"><?php echo $post_details->category_name; ?></td>
	    									<td class="align-middle py-1"><?php echo $post_details->first_name." ".$post_details->last_name; ?></td>
	    									<td class="align-middle py-1">
                                                <?php if ($post_details->status == '1') {?>
	    										<span class="badge badge-success">Active</span>
                                                <?php } else { ?>
	    										<span class="badge badge-danger">In-Active</span>
                                                <?php } ?>
	    									</td>
	    									<!-- <td class="align-middle py-1">
                                                <?php if ($post_details->is_deleted == '1') {?>
	    										<span class="badge badge-success">Live</span>
                                                <?php } else { ?>
	    										<span class="badge badge-danger">Dead</span>
                                                <?php } ?>
	    									</td> -->
                                            <td class="align-middle py-1">
                                                <a href="<?= site_url('admin/edit-post/').$post_details->id; ?>" class="btn btn-link btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                            </td>
	    									<td class="align-middle py-1">
              									<form action="<?= site_url('admin/delete-post'); ?>" method="post">
                                                    <button class="btn btn-link btn-sm" name="delete" value="<?php echo $post_details->id; ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fa fa-trash"></i></button>
                                                </form>
	    									</td>
	    								</tr>
    								<?php $count++;} ?>
    							</tbody>
    						</table>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </main>
