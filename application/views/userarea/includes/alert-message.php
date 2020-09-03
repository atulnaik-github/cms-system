<div class="row alert-messages">
  <div class="col-lg-9">
    <?php if ($this->session->userdata('successMSG')) { ?>
      <div class="bs-component">
        <div class="alert alert-dismissible alert-success">
          <button class="close" type="button" data-dismiss="alert">×</button>
          <strong>Well done !</strong> <?php echo $this->session->userdata('successMSG'); $this->session->unset_userdata('successMSG');?>
        </div>
      </div>
    <?php } ?>
  </div>
  <div class="col-lg-9">
    <?php if ($this->session->userdata('dangerMSG')) { ?>
      <div class="bs-component">
        <div class="alert alert-dismissible  alert-danger">
          <button class="close" type="button" data-dismiss="alert">×</button>
          <strong>Opps !</strong> <?php echo $this->session->userdata('dangerMSG'); $this->session->unset_userdata('dangerMSG');?>
        </div>
      </div>
    <?php } ?>
  </div>
  <div class="col-lg-9">
    <?php if ($this->session->userdata('infoMSG')) { ?>
      <div class="bs-component">
        <div class="alert alert-dismissible alert-info">
          <button class="close" type="button" data-dismiss="alert">×</button>
          <strong>Attention !</strong> <?php echo $this->session->userdata('infoMSG'); $this->session->unset_userdata('infoMSG');?>
        </div>
      </div>
    <?php } ?>
  </div>
  <div class="col-lg-9">
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
<style>
  .col-lg-9{
    position: fixed;
    top: 9.55%;
    z-index: 3000;
  }
</style>
<script>
  setTimeout(function(){
    $('.alert-messages').delay(150).fadeOut('slow');
  }, 5000);
</script>