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
           <a href="<?= site_url('admin/user-list'); ?>">
            <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
              <div class="info">
                <h5>Total Users</h5>
                <p><b><?php echo $users->total_users; ?></b></p>
              </div>
            </div>
          </a>
        </div>
      <?php endforeach ?>
      <?php foreach ($post as $posts): ?>
        <div class="col-md-6 col-lg-3">
          <a href="<?= site_url('admin/total-posts'); ?>">
            <div class="widget-small warning coloured-icon"><i class="icon fa fa-file-text fa-3x"></i>
              <div class="info">
                <h5>Total Post</h5>
                <p><b><?php echo $posts->total_posts; ?></b></p>
              </div>
            </div>
          </a>
        </div>
      <?php endforeach ?>
      <?php foreach ($active_posts as $active_post): ?>
        <div class="col-md-6 col-lg-3">
          <a href="<?= site_url('admin/total-active-post'); ?>">
            <div class="widget-small primary coloured-icon"><i class="icon fa fa-file-text fa-3x"></i>
              <div class="info">
                <h5>Total Active Post</h5>
                <p><b><?php echo $active_post->total_active_posts; ?></b></p>
              </div>
            </div>
          </a>
        </div>
      <?php endforeach ?>
      <?php foreach ($inactive_posts as $inactive_post): ?>
        <div class="col-md-6 col-lg-3">
          <a href="<?= site_url('admin/total-inactive-post'); ?>">
            <div class="widget-small danger coloured-icon"><i class="icon fa fa-file-text fa-3x"></i>
              <div class="info">
                <h5>Total In-Active Post</h5>
                <p><b><?php echo $inactive_post->total_inactive_posts; ?></b></p>
              </div>
            </div>
          </a>
        </div>
      <?php endforeach ?>
      <?php foreach ($deleted_posts as $deleted_post): ?>
        <div class="col-md-6 col-lg-3">
          <a href="<?= site_url('admin/total-deleted-post'); ?>">
            <div class="widget-small danger coloured-icon"><i class="icon fa fa-file-text fa-3x"></i>
              <div class="info">
                <h5>Total Deleted Post</h5>
                <div>
                  <p class="float-left"><b><?php echo $deleted_post->total_deleted_posts; ?></b></p>
                </div>
              </div>
            </div>
          </a>
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