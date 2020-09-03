<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/ico" sizes="48x48" href="<?= site_url('assets/adminarea/images/favicon.ico'); ?>">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?= site_url('assets/adminarea/docs/css/main.css'); ?>">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>CMS | Login</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="alert-messages">
      <div class="container">
        <div class="row alert-messages">
          <div class="col-lg-3">
            <?php if ($this->session->userdata('successMSG')) { ?>
              <div class="bs-component">
                <div class="alert alert-dismissible alert-success">
                  <button class="close" type="button" data-dismiss="alert">×</button>
                  <strong>Well done !</strong> <?php echo $this->session->userdata('successMSG'); $this->session->unset_userdata('successMSG');?>
                </div>
              </div>
            <?php } ?>
          </div>
          <div class="col-lg-3">
            <?php if ($this->session->userdata('dangerMSG')) { ?>
              <div class="bs-component">
                <div class="alert alert-dismissible alert-danger">
                  <button class="close" type="button" data-dismiss="alert">×</button>
                  <strong>Opps !</strong> <?php echo $this->session->userdata('dangerMSG'); $this->session->unset_userdata('dangerMSG');?>
                </div>
              </div>
            <?php } ?>
          </div>
          <div class="col-lg-3">
            <?php if ($this->session->userdata('infoMSG')) { ?>
              <div class="bs-component">
                <div class="alert alert-dismissible alert-info">
                  <button class="close" type="button" data-dismiss="alert">×</button>
                  <strong>Attention !</strong> <?php echo $this->session->userdata('infoMSG'); $this->session->unset_userdata('infoMSG');?>
                </div>
              </div>
            <?php } ?>
          </div>
          <div class="col-lg-3">
            <?php if ($this->session->userdata('warningMSG')) { ?>
              <div class="bs-component">
                <div class="alert alert-dismissible alert-warning">
                  <button class="close" type="button" data-dismiss="alert">×</button>
                  <strong>Alert !</strong> <?php echo $this->session->userdata('warningMSG'); $this->session->unset_userdata('warningMSG');?>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>CMS</h1>
      </div>
      <div class="login-box">
        <form class="login-form" action="<?= site_url('login'); ?>" method="post">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
          <div class="form-group mb-4">
            <label class="control-label">USERNAME</label>
            <input class="form-control" type="text" name="username" placeholder="Email" value="<?php echo set_value('username'); ?>" autofocus>
            <small><?php echo form_error('username'); ?></small>
          </div>
          <div class="form-group mb-4">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" type="password" name="password" placeholder="Password" value="<?php echo set_value('password'); ?>">
            <small><?php echo form_error('password'); ?></small>
          </div>
          <div class="form-group">
            <div class="utility justify-content-end">
             <!--  <div class="animated-checkbox">
                <label>
                  <input type="checkbox"><span class="label-text">Stay Signed in</span>
                </label>
              </div> -->
              <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Forgot Password ?</a></p>
            </div>
          </div>
          <div class="form-group btn-container">
            <input class="btn btn-primary btn-block" name="submit" type="submit" value="SIGN IN">
          </div>
        </form>
        <form class="forget-form" action="index.html">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
          <div class="form-group">
            <label class="control-label">EMAIL</label>
            <input class="form-control" type="text" placeholder="Email">
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
          </div>
          <div class="form-group mt-3">
            <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
          </div>
        </form>
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="<?= site_url('assets/adminarea/docs/js/jquery-3.3.1.min.js'); ?>"></script>
    <script src="<?= site_url('assets/adminarea/docs/js/popper.min.js'); ?>"></script>
    <script src="<?= site_url('assets/adminarea/docs/js/bootstrap.min.js'); ?>"></script>
    <script src="<?= site_url('assets/adminarea/docs/js/main.js'); ?>"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="<?= site_url('assets/adminarea/docs/js/plugins/pace.min.js'); ?>"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>
    <script>
      setTimeout(function(){
        $('.alert-messages').delay(150).fadeOut('slow');
      }, 5000);
    </script>
    <style>
      .alert-messages .col-lg-3{
        position: absolute;
        top: 5%;
        left: 50%;
        transform: translate(-50%,-10%);
      }
    </style>
  </body>
</html>