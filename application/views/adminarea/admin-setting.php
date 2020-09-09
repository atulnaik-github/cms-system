<title><?php echo adminTitle."Admin Profile"; ?></title>
<main class="app-content">
  <?php $this->load->view('adminarea/includes/alert-message'); ?>

  <div class="row user">
    <div class="col-md-12">
      <div class="profile">
        <div class="info"><img class="user-img" src="<?= site_url('').$loginUser->user_img; ?>" alt="profile picture"><br>
          <button class="btn btn-sm btn-link text-white" data-toggle="tooltip" data-placement="top" title="" data-original-title="Change Profile Picture"><i class="fa fa-edit" data-target="#profile_img" data-toggle="modal"></i></button>
          <h4><?php echo $loginUser->first_name." ".$loginUser->last_name; ?></h4>
          <p>Software Developer</p>
        </div>
        <div class="cover-image"></div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="tile p-0">
        <ul class="nav flex-column nav-tabs user-tabs">
          <li class="nav-item"><a class="nav-link active" href="<?= site_url('admin/admin-setting'); ?>">Edit Basic Details</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= site_url('admin/change-password'); ?>">Change Password</a></li>
        </ul>
      </div>
    </div>
    <div class="col-md-9">
      <div class="tab-content">
        <div class="tab-pane active" id="user-timeline">
          <div class="tile user-settings">
            <h4 class="line-head">Basic Details</h4>
            <form action="<?= site_url('admin/admin-setting'); ?>" method="post">
              <div class="row mb-2">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>First Name</label>
                    <input class="form-control" value="<?php echo $loginUser->first_name; ?>" type="text" name="first_name">
                    <small><?php echo form_error('first_name'); ?></small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Last Name</label>
                    <input class="form-control" value="<?php echo $loginUser->last_name; ?>" type="text" name="last_name">
                    <small><?php echo form_error('last_name'); ?></small>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 mb-2">
                  <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" type="text" name="email" value="<?php echo $loginUser->email; ?>">
                    <small><?php echo form_error('email'); ?></small>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-8 mb-4">
                  <div class="form-group">
                    <label>Mobile No</label>
                    <input class="form-control" type="text" name="mobile" value="<?php echo $loginUser->mobile_number; ?>">
                    <small><?php echo form_error('mobile'); ?></small>
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="row mb-10">
                <div class="col-md-12">
                  <input class="btn btn-primary" name="submit" type="submit" value="Save">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<div class="modal" id="profile_img">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Change Profile Picture</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <form action="<?= site_url('admin/change-profile-image'); ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-12 text-center">
              <img src="<?= site_url('').$loginUser->user_img; ?>" onClick="triggerClick()" id="user_display" class="img-fluid" alt="img-thumbnail" style="height: 236px;">
            </div>
            <div class="col-lg-8 offset-2 text-center">
              <div class="form-group mt-3 text-center">
                <input class="form-control-file" id="user_img" name="user_img" onChange="displayImage(this)" type="file" accept="image/*">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Save Changes">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

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