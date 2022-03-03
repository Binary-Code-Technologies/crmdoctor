
  <?php 
include("adminsession.php");
//error_reporting(0);
//echo $loginid; die;
$btn_name = 'Submit';
if($_GET['action']==1){
$msg = "Data Has been Inserted Successfully";
}

if($_GET['action']==2){
$msg = "Data Has been Updated Successfully";
}

if($_GET['action']==3){
$msg = "Data Has been Deleted Successfully";
}
if($_GET['action']==4){
  $msg = "Data is Already Exist";
  }

$btn_name = 'Submit';
if($_GET['com_id']!=""){
$keyvalue=$_GET['com_id'];
}else{
  $keyvalue=1;
}

if(isset($_POST['submit'])){
   $com_name = $_POST['com_name'];
   $com_email = $_POST['com_email'];
   $com_mobile = $_POST['com_mobile'];
   $com_address = $_POST['com_address'];
   $com_img = $_FILES['com_img'];

   if($keyvalue!=""){
    mysqli_query($conn,"UPDATE company_settings set com_name='$com_name',com_email='$com_email',com_mobile='$com_mobile',com_address='$com_address',loginid='$loginid',ipaddress='$ipaddress',createdate='$createdate' where com_id='$keyvalue'");
    $action = 2;

    if($com_img['name']!=""){
     $com_image = $com_img['name'];
     $tm="DOC";
     $tm.=microtime(true)*1000;
     $ext = pathinfo($com_image, PATHINFO_EXTENSION);
     $com_image=$tm.".".$ext;
     move_uploaded_file($com_img['tmp_name'],"uploaded/".$com_image);

     mysqli_query($conn,"UPDATE company_settings set com_img='$com_image' where com_id='$keyvalue'");
     $action = 2;
       }

   }
   
       echo "<script>location='companysetting.php?action=$action';</script>";
}

  $btn_name = 'Update';
  $sql = mysqli_query($conn,"SELECT * FROM company_settings where com_id='$keyvalue'");
  $rowedit = mysqli_fetch_array($sql);
   $com_name = $rowedit['com_name'];
   $com_email = $rowedit['com_email'];
   $com_mobile = $rowedit['com_mobile'];
   $com_address = $rowedit['com_address'];
   $com_img = $rowedit['com_img'];



?>
  <?php include('inc/header.php'); ?>
  <!-- Content Wrapper. Contains page content -->

  <?php include('inc/sidemanu.php'); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Company Settings</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">HOME</a></li>
              <li class="breadcrumb-item active">Company Settings</li>
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
            <h3 class="card-title">Company Details   <center> <h4><span style="color:red;"><?php echo $msg;?></span></h4></center></h3>

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
          <form action="" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="com_id" id="com_id" value="<?php echo $keyvalue; ?>">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Company Name</label>
                  <input type="text" name="com_name" id="com_name" value="<?php echo $com_name; ?>" placeholder="Please Enter Comapny Name" class="form-control">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Email-Id</label>
                  <input type="email" name="com_email" id="com_email" value="<?php echo $com_email; ?>" placeholder="Please Enter Email-Id" class="form-control">
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-12">
                <div class="form-group">
                  <label>Mobile No.</label>
                  <input type="text" name="com_mobile" maxlength="10" id="com_mobile" value="<?php echo $com_mobile; ?>" placeholder="Please Enter Mobile No" class="form-control">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Full Address</label>
                  <input type="text" name="com_address" id="com_address" value="<?php echo $com_address; ?>" placeholder="Please Enter Full Address" class="form-control">
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

           
            <div class="row">
              
              <div class="col-6 col-sm-6">
                <div class="form-group">
                  <label>Image Upload</label>
                  <div class="select2-purple">
                  <input type="file" name="com_img" id="com_img" class="form-control">
                  </div>
                </div>
                <!-- /.form-group -->
              </div>
              <div class="col-6 col-sm-6">
                <div class="form-group">
                  
                  <div class="select2-purple">
                  <span><img src="uploaded/<?php echo $com_img; ?>" width="200px;" height="100px;" alt="<?php echo $com_img; ?>" /></span>
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
                   <center><button type="submit" name="submit" class="btn btn-info col submit"><span><?php echo $btn_name; ?></span></button> </center>
                </div>
           
                </div>
                <br>
        </form>
    </section>
    <!-- /.content -->
  </div>
  <?php include('inc/footer.php'); ?>


