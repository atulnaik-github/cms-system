    <title><?php echo userTitle."User Profile"; ?></title>

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>User Setting</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="<?= site_url('user/setting'); ?>">Setting</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <?php $this->load->view('userarea/includes/alert-message'); ?>
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title mb-3">Profile Card</strong>
                        </div>
                        <div class="card-body">
                            <div class="mx-auto d-block text-center">
                                <img class="rounded-circle mx-auto d-block" src="<?= site_url('').$userData->user_img; ?>" alt="Card image cap" style="height: 139px;"><br>
                                <button class="btn btn-sm btn-link text-secondary" data-toggle="tooltip" data-placement="top" title="Change Profile Picture"><i class="fa fa-edit" data-target="#profile_img" data-toggle="modal"></i></button>
                                <h5 class="text-sm-center mt-2 mb-1 text-capitalize"><?php echo $userData->first_name." ".$userData->last_name; ?></h5>
                                <div class="location text-sm-center"><i class="fa fa-map-marker"></i> <?php echo $userData->city; ?></div>
                            </div>
                            <hr>
                            <div class="card-text text-sm-center">
                                <a href="#"><i class="fa fa-facebook pr-1"></i></a>
                                <a href="#"><i class="fa fa-twitter pr-1"></i></a>
                                <a href="#"><i class="fa fa-linkedin pr-1"></i></a>
                                <a href="#"><i class="fa fa-pinterest pr-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <form action="" method="post">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title mb-3">Basic Details</strong>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label>First Name</label>
                                        <input class="form-control" readonly="" type="text" name="first_name" value="<?php echo $userData->first_name;?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Last Name</label>
                                        <input class="form-control" readonly="" type="text" name="last_name" value="<?php echo $userData->last_name;?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label>Email</label>
                                        <input class="form-control" type="text" name="email" value="<?php echo $userData->email;?>">
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-12 mb-3">
                                        <label>Mobile No</label>
                                        <input class="form-control" type="text" name="mobile" value="<?php echo $userData->mobile_number;?>">
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" name="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Submit
                                </button>
                                <button type="reset" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Reset
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- .row -->
            <div class="row">
                <div class="col-md-8 offset-md-4">
                    <form action="<?= site_url('user/change-password'); ?>" method="post">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title mb-3">Change Password</strong>
                            </div>
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Old Password</label>
                                            <input class="form-control" type="password" name="old_password">
                                            <small><?php echo form_error('old_password'); ?></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>New Password</label>
                                            <input class="form-control" type="password" name="new_password">
                                            <small><?php echo form_error('new_password'); ?></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input class="form-control" type="password" name="confirm_password">
                                            <small><?php echo form_error('confirm_password'); ?></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="submit" class="btn btn-primary btn-sm" name="submit" value="Submit">
                                <button type="reset" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Reset
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

</div><!-- /#right-panel -->

<div class="modal" id="profile_img">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Change Profile Picture</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-lg-12 text-center">
              <img src="<?= site_url('').$userData->user_img; ?>" onClick="triggerClick()" id="user_display" class="img-fluid" alt="img-thumbnail" style="height: 236px;">
          </div>
          <div class="col-lg-8 offset-2 text-center">
              <div class="form-group mt-3 text-center">
                <input class="form-control-file" id="user_img" name="user_img" onChange="displayImage(this)" type="file" accept="image/*">
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button class="btn btn-primary" type="button">Save changes</button>
    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
</div>
<!-- </div>
</div>
</div>
-->
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