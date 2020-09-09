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
                <form action="<?= site_url('user/basic-details'); ?>" method="post">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title mb-3">Basic Details (You can update your details)</strong>
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
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
                                <div class="col-md-12 mb-2">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" type="text" name="email" value="<?php echo $userData->email;?>">
                                        <small><?php echo form_error('email'); ?></small>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-12 mb-2">
                                    <div class="form-group">
                                        <label>Mobile No</label>
                                        <input class="form-control" type="text" name="mobile" value="<?php echo $userData->mobile_number;?>">
                                        <small><?php echo form_error('mobile'); ?></small>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary btn-sm" name="save" value="Update">
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
                                        <input class="form-control" type="text" name="old_password">
                                        <small><?php echo form_error('old_password'); ?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <label for="new_password">New Password</label>
                                    <div class="input-group">
                                        <input class="form-control" type="password" name="new_password" id="new_password" value="">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" onclick="showNewPass()"><i class="fa fa-eye"></i></span>
                                        </div>
                                    </div>
                                    <small class="input-group"><?php echo form_error('new_password'); ?></small>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <label for="confirm_password">Confirm Password</label>
                                    <div class="input-group">
                                        <input class="form-control" type="password" name="confirm_password" id="confirm_password" value="">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" onclick="showConfirmPass()"><i class="fa fa-eye"></i></span>
                                        </div>
                                    </div>
                                    <small class="input-group"><?php echo form_error('confirm_password'); ?></small>
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
        <form action="<?= site_url('user/change-profile-image'); ?>" method="post" enctype="multipart/form-data">
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
                    <input class="btn btn-primary" type="submit" value="Save Changes" name="submit">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
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

<script>
    function showNewPass() {
        var x = document.getElementById("new_password");
        if (x.type == "password") {
          x.type = "text";
      } else {
          x.type = "password";
      }
  }

  function showConfirmPass() {
    var x = document.getElementById("confirm_password");
    if (x.type == "password") {
      x.type = "text";
  } else {
      x.type = "password";
  }
}
</script> 