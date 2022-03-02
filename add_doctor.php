<?php include('inc/header.php'); ?>
  <!-- Main Sidebar Container -->
  
  <?php include('inc/sidemanu.php'); ?>

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Doctor</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add New Doctor</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Doctor Details</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <form action="">
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Doctor Name</label>
                  <input type="text" name="doc_name" id="doc_name" value="<?php echo $doc_name; ?>" placeholder="Please Enter Doctor Name" class="form-control">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Email-Id</label>
                  <input type="email" name="doc_email" id="doc_email" value="<?php echo $doc_email; ?>" placeholder="Please Enter Email-Id" class="form-control">
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Mobile No.</label>
                  <input type="text" name="doc_mobile" id="doc_mobile" value="<?php echo $doc_mobile; ?>" placeholder="Please Enter Mobile No" class="form-control">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Address</label>
                  <input type="text" name="doc_address" id="doc_address" value="<?php echo $doc_address; ?>" placeholder="Please Enter Address" class="form-control">
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

           
            <div class="row">
              <div class="col-12 col-sm-6">
                <div class="form-group">
                  <label>Profile</label>
                  <input type="text" name="doc_profile" id="doc_profile" value="<?php echo $doc_profile; ?>" placeholder="Please Enter Profile" class="form-control">
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-12 col-sm-6">
                <div class="form-group">
                  <label>Image Upload</label>
                  <div class="select2-purple">
                  <input type="file" name="doc_img" id="doc_img" class="form-control">
                  </div>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
         
        </div>

        <div class="row">
            <div class="col-md-1">
                </div>
                <div class="col-md-1">
                   <center><button type="submit" name="submit" class="btn btn-info col submit"><span>Submit</span></button> </center>
                </div>
            <div class="col-md-1">
                  <center><button type="reset" name="reset" class="btn btn-danger col cancel">
                         <i class="fas fa-times-circle"></i><span>Cancel</span></button> </center>
                </div>
                </div>
        </form>
    </section>
    <!-- /.content -->
  </div>
  <?php include('inc/footer.php'); ?>


