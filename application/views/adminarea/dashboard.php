    <title><?php echo adminTitle."Dashboard"; ?></title>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="<?= site_url('admin/dashboard'); ?>">Dashboard</a></li>
        </ul>
      </div>
      <div class="row">
        <?php foreach ($user as $users): ?>
          <div class="col-md-6 col-lg-3">
            <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
              <div class="info">
                <h4>Users</h4>
                <p><b><?php echo $users->total_users; ?></b></p>
              </div>
            </div>
          </div>
        <?php endforeach ?>
        <?php foreach ($post as $posts): ?>
          <div class="col-md-6 col-lg-3">
            <div class="widget-small warning coloured-icon"><i class="icon fa fa-file-text fa-3x"></i>
              <div class="info">
                <h4>Total Post</h4>
                <p><b><?php echo $posts->total_posts; ?></b></p>
              </div>
            </div>
          </div>
        <?php endforeach ?>
        <!-- <div class="col-md-6 col-lg-3">
          <div class="widget-small info coloured-icon"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
            <div class="info">
              <h4>Uploades</h4>
              <p><b>10</b></p>
            </div>
          </div>
        </div> -->
       <!--  <div class="col-md-6 col-lg-3">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
            <div class="info">
              <h4>Stars</h4>
              <p><b>500</b></p>
            </div>
          </div>
        </div> -->
      </div>
    </main>