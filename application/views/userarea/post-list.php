<title><?php echo userTitle."Post List"; ?></title>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Post Details</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="javascript:void(0);">Post</a></li>
                    <li class="active">Post List</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <?php $this->load->view('userarea/includes/alert-message'); ?>
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Post List</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered text-capitalize">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th width="60px">Post Id</th>
                                    <th>Date</th>
                                    <th>Post Title</th>
                                    <th>Category</th>
                                    <!-- <th>Post Author</th> -->
                                    <th>Status</th>
                                    <!-- <th>Is_deleted</th> -->
                                    <th width="20px">Edit</th>
                                    <th width="20px">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $count = 1; foreach ($postDetails as $post) {?>
                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td><?php echo $post->id; ?></td>
                                        <td><?php echo date('d M, Y', strtotime($post->created_at)); ?></td>
                                        <td><?php echo $post->post_title; ?></td>
                                        <td><?php echo $post->category_name; ?></td>
                                        <!-- <td><?php echo $post->first_name." ".$post->last_name; ?></td> -->
                                        <td>
                                            <?php if ($post->status == '1') { ?>
                                                <span class="badge bg-success text-white">Active</span>   
                                            <?php }else {?>
                                                <span class="badge bg-danger text-white">In-Active</span>
                                            <?php } ?>
                                        </td>
                                       <!--  <td>
                                            <?php if ($post->is_deleted == '1') { ?>
                                                <span class="badge bg-success text-white">Live</span>   
                                            <?php }else {?>
                                                <span class="badge bg-danger text-white">Dead</span>
                                            <?php } ?>
                                        </td> -->
                                        <td>
                                            <a href="<?= site_url('user/edit-post/').$post->id; ?>" class="btn-sm btn btn-primary" data-toggle="tooltip" title="Edit Post">Edit</a>
                                        </td>
                                        <td>
                                            <form action="<?= site_url('user/delete-post'); ?>" method="post">
                                                <button class="btn-sm btn btn-secondary" name="delete" data-toggle="tooltip" title="Delete Post" type="submit" value="<?php echo $post->id; ?>">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php $count++; } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->


</div><!-- /#right-panel -->

    <!-- Right Panel -->