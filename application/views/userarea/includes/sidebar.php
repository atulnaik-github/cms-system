    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="<?= site_url('user'); ?>">CMS</a>
                <a class="navbar-brand hidden" href="<?= site_url('user'); ?>">C</a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                   <!--  <li>
                        <div class="app-sidebar__user row mt-3">
                            <div class="col-md-4">
                                <img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
                            </div>
                            <div class="col-md-8 my-auto p-3 p-md-0 p-md-1">
                              <p class="app-sidebar__user-name text-capitalize"><?php echo $this->session->sessiondata['fullname']; ?></p>
                              <small class="app-sidebar__user-designation">Software Developer</small>
                            </div>
                        </div>
                    </li> -->
                    <!-- <h3 class="menu-title"></h3> -->
                    <li class="active">
                        <a href="<?= site_url('user'); ?>"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-file-text"></i>Post</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-angle-right"></i><a href="<?= site_url('user/add-post'); ?>">Add Post</a></li>
                            <li><i class="fa fa-angle-right"></i><a href="<?= site_url('user/post-list'); ?>">Post List</a></li>
                        </ul>
                    </li>
                     <li>
                        <a href="<?= site_url('user/user-setting'); ?>"> <i class="menu-icon fa fa-cog"></i>Edit Profile</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->