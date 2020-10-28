<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
  <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?= site_url('').$this->session->sessiondata['user_img'] ?>" alt="User Image" class="img-fluid" style="height: 40px; width: 40px;">
    <div>
      <p class="app-sidebar__user-name text-capitalize"><?php echo $this->session->sessiondata['fullname']; ?></p>
      <p class="app-sidebar__user-designation">Software Developer</p>
    </div>
  </div>
  <ul class="app-menu">
    <li>
      <a class="app-menu__item active" href="<?= site_url('admin/dashboard'); ?>">
        <i class="app-menu__icon fa fa-dashboard"></i>
        <span class="app-menu__label">Dashboard</span>
      </a>
    </li>
    <li class="treeview">
      <a class="app-menu__item" href="javascript:void(0)" data-toggle="treeview">
        <i class="app-menu__icon fa fa-file-text"></i>
        <span class="app-menu__label">Post</span>
        <i class="treeview-indicator fa fa-angle-right"></i>
      </a>
      <ul class="treeview-menu">
        <li><a class="treeview-item" href="<?= site_url('admin/add-post'); ?>"><i class="icon fa fa-circle-o"></i> Add Post</a></li>
        <li><a class="treeview-item" href="<?= site_url('admin/post-list'); ?>"><i class="icon fa fa-circle-o"></i> Post List</a></li>
      </ul>
    </li>
    <!-- <li><a class="app-menu__item" href="charts.html"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Charts</span></a></li> -->
    <li class="treeview">
      <a class="app-menu__item" href="javascript:void(0)" data-toggle="treeview">
        <i class="app-menu__icon fa fa-th-list"></i>
        <span class="app-menu__label">Category</span>
        <i class="treeview-indicator fa fa-angle-right"></i>
      </a>
      <ul class="treeview-menu">
        <li><a class="treeview-item" href="<?= site_url('admin/add-category'); ?>"><i class="icon fa fa-circle-o"></i> Add Category</a></li>
        <li><a class="treeview-item" href="<?= site_url('admin/category-list'); ?>"><i class="icon fa fa-circle-o"></i> Category List</a></li>
      </ul>
    </li>
    <li class="treeview">
      <a class="app-menu__item" href="javascript:void(0)" data-toggle="treeview">
        <i class="app-menu__icon fa fa-user"></i>
        <span class="app-menu__label">Users</span>
        <i class="treeview-indicator fa fa-angle-right"></i>
      </a>
      <ul class="treeview-menu">
        <li><a class="treeview-item" href="<?= site_url('admin/add-user'); ?>"><i class="icon fa fa-circle-o"></i> Add User</a></li>
        <li><a class="treeview-item" href="<?= site_url('admin/user-list'); ?>"><i class="icon fa fa-circle-o"></i> User List</a></li>
      </ul>
    </li>
  </ul>
</aside>