<title><?php echo userTitle."Dashboard"; ?></title>
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="col-sm-6 col-lg-3">
            <?php foreach ($total_posts as $post): ?>
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                          <i class="fa fa-file-text fa-3x"></i>
                        </div>
                        <h4 class="mb-0">
                            <span class="counts"><?php echo $post->total_posts; ?></span>
                        </h4>
                        <p class="text-light">Total Posts</p>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <!--/.col-->
        <div class="col-sm-6 col-lg-3">
            <?php foreach ($active_posts as $active_post): ?>
                <div class="card text-white bg-flat-color-2">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                          <i class="fa fa-file-text fa-3x"></i>
                        </div>
                        <h4 class="mb-0">
                            <span class="counts"><?php echo $active_post->total_active_posts; ?></span>
                        </h4>
                        <p class="text-light">Total Active Posts</p>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <!--/.col-->
        <div class="col-sm-6 col-lg-3">
            <?php foreach ($inactive_posts as $inactive_post): ?>
                <div class="card text-white bg-flat-color-4">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                          <i class="fa fa-file-text fa-3x"></i>
                        </div>
                        <h4 class="mb-0">
                            <span class="counts"><?php echo $inactive_post->total_inactive_posts; ?></span>
                        </h4>
                        <p class="text-light">Total In-Active Posts</p>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div> <!-- .content -->
</div><!-- /#right-panel -->

 