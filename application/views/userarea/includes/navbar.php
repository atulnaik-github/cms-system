<div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="<?= site_url('').$this->session->sessiondata['user_img']; ?>" alt="User Avatar">
                        </a>
                        <div class="user-menu dropdown-menu">
                            <!-- <a class="nav-link" href="#"><i class="fa fa-user"></i> My Profile</a>

                            <a class="nav-link" href="#"><i class="fa fa-user"></i> Notifications <span class="count">13</span></a> -->

                            <a class="nav-link" href="<?= site_url('user/user-setting'); ?>"><i class="fa fa-cog"></i> Settings</a>

                            <a class="nav-link" href="#logout" data-toggle="modal"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>
                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->


        <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm h-100 d-flex flex-column justify-content-center my-0" role="document">
                <div class="modal-content">
                    <div class="modal-body text-center py-4">
                        <h5 class="mb-3">Are you sure want to logout?</h5>
                        <a href="<?= site_url('logout'); ?>" class="btn btn-success px-4">Yes</a>
                        <button type="button" class="btn btn-danger px-4" data-dismiss="modal">No</button>
                    </div>
                </div>
            </div>
        </div>