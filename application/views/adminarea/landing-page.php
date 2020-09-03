<title><?php echo adminTitle."Landing Page"; ?></title>


<main class="app-content">
	<div class="app-title">
		<div>
			<h1><i class="fa fa-laptop"></i> Landing Page</h1>
			<p>System Summary</p>
		</div>
		<ul class="app-breadcrumb breadcrumb">
			<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
			<li class="breadcrumb-item">System Summary</li>
			<!-- <li class="breadcrumb-item"><a href="#">Cards</a></li> -->
		</ul>
	</div>
	<div class="row">
		<div class="col-md-8 offset-md-2">
      <div class="row tile">
        <div class="col-md-3">
          <div class="text-center"><img class="user-img" src="<?= site_url('').$loginUser->user_img; ?>" style="height: 100px; border-radius: 50%; margin-bottom: 20px;"><br>
            <h4><?php echo $loginUser->first_name." ".$loginUser->last_name; ?></h4>
            <p>Software Developer</p>
          </div>
        </div>
        <div class="col-md-9">
          <h3 class="tile-title">Welcome</h3>
          <div class="tile-footer"></div>
          <div class="tile-body">
            <ul class="list-unstyled">
              <li><b>Last Login Date : </b></li>
              <li><b>Current Date : <?php echo date('d-m-Y');?></b></li>
              <li><b>Current Time : <?php echo date('h:i A');?></b></li>
            </ul>
          </div>
          <!-- <div class="tile-footer"><a class="btn btn-primary" href="#">Link</a></div> -->
        </div>
      </div>
    </div>
  </div>
</main>