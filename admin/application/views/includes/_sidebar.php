<?php  
if(!empty($this->uri->segment(2))){
  $cur_tab = $this->uri->segment(2)==''?'dashboard': $this->uri->segment(2);  
}else{
  $cur_tab = $this->uri->segment(1)==''?'dashboard': $this->uri->segment(1);  
}

?>  

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?= base_url('admin'); ?>" class="brand-link">
    <img src="<?= base_url($this->general_settings['logo']); ?>" alt="Logo" class="brand-image elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">&nbsp;<?php //$this->general_settings['application_name']; ?></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url()?>assets/dist/img/avatar01.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?= ucwords($this->session->userdata('username')); ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

        <li id="profile" class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-user"></i>
            <p>
              Profile
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('profile'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Change Profile</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('profile/change_pwd'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Change Password</p>
              </a>
            </li>
          </ul>
        </li>

        <?php  
        if($this->general_user_premissions['dashboard']['is_allow']==1){ ?>
        <li id="dashboard" class="nav-item">
          <a href="<?= base_url('dashboard'); ?>" class="nav-link">
            <i class="nav-icon fa fa-dashboard"></i>
            <p>
              Dashboard 
            </p>
          </a> 
        </li>
        <?php } ?>
      
      
     


        <?php if($this->general_user_premissions['category']['is_allow']==1){ ?>
        <li id="category" class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-tags"></i>
            <p>
              Categories
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('category'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Categories List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('category/add'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Add New Category</p>
              </a>
            </li>
          </ul>
        </li> 
        <?php } ?>

        <?php if($this->general_user_premissions['blogs']['is_allow']==1){ ?>        
        <li id="blogs" class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-rss"></i>
            <p>
              Blogs
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('blogs'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Blogs List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('blogs/add'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Add New Blogs</p>
              </a>
            </li>
          </ul>
        </li> 
        <?php } ?>






       


         


        <?php if($this->general_user_premissions['general_settings']['is_allow']==1){ ?>
        <li id="general_settings" class="nav-item">
          <a href="<?= base_url('general_settings'); ?>" class="nav-link">
            <i class="nav-icon fa fa-cogs"></i>
            <p>
              General Settings
            </p>
          </a>
        </li>
        <?php } ?>

                

       
  
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

<script>
  $("#<?= $cur_tab ?>").addClass('menu-open');
  $("#<?= $cur_tab ?> > a").addClass('active');
</script>