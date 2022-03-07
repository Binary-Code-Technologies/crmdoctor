<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <?php

$show = mysqli_query($conn,"SELECT * FROM company_settings");
$rowcom = mysqli_fetch_array($show);
?>
    
    <a href="dashboard.php" class="brand-link">
      <img src="./uploaded/<?php echo $rowcom['com_img']; ?>" alt="<?php echo $rowcom['com_img']; ?>" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><?php echo $rowcom['com_name']; ?></span>
    </a>
<?php
        $set = mysqli_query($conn,"SELECT * FROM adduser");
        $rowuser = mysqli_fetch_array($set);
      //  echo $usertype = $rowuser['usertype']; 
?>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
 <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="dashboard.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard </p>
                </a>
              </li>
              
            </ul>
          </li>
         
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Master
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="companysetting.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Company Settings</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="adduser.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="add_doctor.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Doctor</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="departmentname.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Department Master</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="testname.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Test Master</p>
                </a>
              </li>
             
            </ul>
            </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Patient
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="patient_entry.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Patient Entry</p>
                </a>
              </li>
              
             
            </ul>
            </li>
            <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
              Theraphy Test
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="therapy_entry.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Theraphy Test Entry</p>
                </a>
              </li>
              
             
            </ul>
            </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>