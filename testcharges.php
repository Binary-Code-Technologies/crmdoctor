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
            <h1>test details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">HOME</a></li>
              <li class="breadcrumb-item active">test charges  details</li>
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
            <h3 class="card-title">Test details</h3>

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
          <form action="" method="POST">
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>patient id</label>
                  <input type="text" name="doc_name" id="doc_name"  placeholder="Please Enter department id" class="form-control">
                </div>

                <div class="form-group">
                  <label>patient name</label>
                  <input type="email" name="doc_email" id="doc_email"  placeholder="Please Enter department name" class="form-control">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>test name</label>
                  <input type="email" name="doc_email" id="doc_email"  placeholder="Please Enter department name" class="form-control">
                </div>
                <div class="form-group">
                  <label>test charges</label>
                  <input type="email" name="doc_email" id="doc_email"  placeholder="Please Enter department name" class="form-control">
                </div>
                <div class="form-group">
                  <label>date of test</label>
                  <input type="email" name="doc_email" id="doc_email"  placeholder="Please Enter department name" class="form-control">
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
           
              <!-- /.col -->
             
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

    <table class="table" >
  <thead>
    <tr>
      
      <th scope="col">patient id</th>
      <th scope="col">patient problem</th>
      <th scope="col">test name</th>
      <th scope="col">test charges </th>
      <th scope="col">date</th>
      <th scope="col">Actions</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>@mdo</td>

      <td>edit    delete</td>

    </tr>
    
    
  </tbody>
</table>
  </div>
  <?php include('inc/footer.php'); ?>