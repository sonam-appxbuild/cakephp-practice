<ul class="sidebar-menu" data-widget="tree">
  <li class="header">MAIN NAVIGATION</li>
  <li class="treeview">
    <a href="#">
      <i class="fa fa-dashboard"></i> <span>Users</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="<?php echo $this->Url->build('/users/add'); ?>"><i class="fa fa-circle-o"></i> New User </a></li>
      <li><a href="<?php echo $this->Url->build('/users'); ?>"><i class="fa fa-circle-o"></i> List all Users</a></li>
    </ul>
  </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>Products</span>
            <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build('/products/add'); ?>"><i class="fa fa-circle-o"></i> New Products </a></li>
            <li><a href="<?php echo $this->Url->build('/products'); ?>"><i class="fa fa-circle-o"></i> List all Products</a></li>
        </ul>
    </li>
</ul>
