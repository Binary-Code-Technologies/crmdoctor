
  <!-- Main Sidebar Container -->
  
  
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
if($_GET['doc_id']!=""){
$keyvalue=$_GET['doc_id'];
}else{
 $keyvalue=0;
}

if(isset($_POST['submit'])){
   $doc_name = $_POST['doc_name'];
   $doc_email = $_POST['doc_email'];
   $doc_mobile = $_POST['doc_mobile'];
   $doc_address = $_POST['doc_address'];
   $doc_profile = $_POST['doc_profile'];
   $doc_img = $_FILES['doc_img'];

   if($keyvalue==0){

    $data = mysqli_query($conn,"SELECT * FROM  doctor_entry where doc_email='$doc_email' OR doc_mobile='$doc_mobile'");
	  $get = mysqli_num_rows($data);
if($get == $keyvalue){
        $doc_image = $doc_img['name'];
        $tm="DOC";
        $tm.=microtime(true)*1000;
        $ext = pathinfo($doc_image, PATHINFO_EXTENSION);
        $doc_image = $tm.".".$ext;
        move_uploaded_file($doc_img['tmp_name'],"uploaded/".$doc_image);

       mysqli_query($conn,"INSERT INTO doctor_entry set doc_name='$doc_name',doc_email='$doc_email',doc_mobile='$doc_mobile',doc_address='$doc_address',doc_profile='$doc_profile',doc_img='$doc_image',loginid='$loginid',ipaddress='$ipaddress',createdate='$createdate'");
       $action=1;
}
else
$action = 4;
   }
   else{
       mysqli_query($conn,"UPDATE doctor_entry set doc_name='$doc_name',doc_email='$doc_email',doc_mobile='$doc_mobile',doc_address='$doc_address',doc_profile='$doc_profile',loginid='$loginid',ipaddress='$ipaddress',createdate='$createdate' where doc_id='$keyvalue'");
       $action = 2;

       if($doc_img['name']!=""){
        $doc_image = $doc_img['name'];
        $tm="DOC";
        $tm.=microtime(true)*1000;
        $ext = pathinfo($doc_image, PATHINFO_EXTENSION);
        $doc_image=$tm.".".$ext;
        move_uploaded_file($doc_img['tmp_name'],"uploaded/".$doc_image);

        mysqli_query($conn,"UPDATE doctor_entry set doc_img='$doc_image' where doc_id='$keyvalue'");
        $action = 2;
          }
       }

       echo "<script>location='add_doctor.php?action=$action';</script>";
}
if($_GET['doc_id']!=""){
  $btn_name = 'Update';
  $sql = mysqli_query($conn,"SELECT * FROM doctor_entry where doc_id='$_GET[doc_id]'");
  $rowedit = mysqli_fetch_array($sql);
   $doc_name = $rowedit['doc_name'];
   $doc_email = $rowedit['doc_email'];
   $doc_mobile = $rowedit['doc_mobile'];
   $doc_address = $rowedit['doc_address'];
   $doc_profile = $rowedit['doc_profile'];
   $doc_img = $rowedit['doc_img'];
}else{
   $doc_name =  '';
   $doc_email ='';
   $doc_mobile = '';
   $doc_address = '';
   $doc_profile = '';
   $doc_img = '';
}


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
            <h1>Add New Doctor</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">HOME</a></li>
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
            <h3 class="card-title">Doctor Details   <center> <h4><span style="color:red;"><?php echo $msg;?></span></h4></center></h3>

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
          <input type="hidden" name="doc_id" id="doc_id" value="<?php echo $keyvalue; ?>">
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
                  <input type="text" name="doc_mobile" maxlength="10" id="doc_mobile" value="<?php echo $doc_mobile; ?>" placeholder="Please Enter Mobile No" class="form-control">
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
                  <span><img src="uploaded/<?php echo $doc_img; ?>" width="80px;" alt="<?php echo $doc_img; ?>" /></span>
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
                   <center><button type="submit" name="submit" class="btn btn-info col submit"><span><?php echo $btn_name; ?></span></button> </center>
                </div>
            <div class="col-md-1">
                  <center><a href="add_doctor.php" type="reset" name="reset" class="btn btn-danger col cancel">
                         <i class="fas fa-times-circle"></i><span>Cancel</span></a> </center>
                </div>
                </div>
        </form>
    </section>
    <br>
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Doctor List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.No.</th>
                    <th>Doctor Name</th>
                    <th>Mobile No</th>
                    <th>Email-Id</th>
                    <th>Address</th>
                    <th>Profile</th>
                    <th>Image</th>

                    <th>Action</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sn=1;
                    $data = mysqli_query($conn,"SELECT * FROM doctor_entry order by doc_id desc");

                    while($row = mysqli_fetch_array($data)){

                    ?>
                  <tr>
                    <td><?php echo $sn++; ?></td>
                    <td><?php echo $row['doc_name']; ?></td>
                    <td><?php echo $row['doc_mobile']; ?></td>
                    <td><?php echo $row['doc_email']; ?></td>
                    <td><?php echo $row['doc_address']; ?></td>
                    <td><?php echo $row['doc_profile']; ?></td>
                    <td><img src="uploaded/<?php echo $row['doc_img']; ?>" width="80px;" alt="<?php echo $row['doc_img']; ?>" /></td>
                  

                    <td><a href="add_doctor.php?doc_id=<?php echo $row['doc_id']; ?>"><strong> <span class="nav-icon fas fa-edit"></span></strong></a> &nbsp;
                    <a onclick="funDel(<?php echo  $row['doc_id']; ?>);"><strong><span class="nav-icon fas fa-trash"></span></strong></a>
                  </td>
                   
                  </tr>
                  <?php } ?>
                 
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
    </section>
    <!-- /.content -->
  </div>
  <?php include('inc/footer.php'); ?>
  <script>
    function funDel(id){
          tblname = 'doctor_entry';
         	tblpkey = 'doc_id';
         	pagename = 'add_doctor.php';
         	submodule = '';
          oldimg = 'doc_img',
         	module = 'Doctor Data';
         	// alert(module); 
         	if(confirm("Are you sure! You want to delete this record."))
         	{
         		jQuery.ajax({
         		  type: 'POST',
         		  url: 'ajax/delete_form.php',
         		  data:'id='+id+'&tblname='+tblname+'&tblpkey='+tblpkey+'&submodule='+submodule+'&pagename='+pagename+'&oldimg='+oldimg+'&module='+module,
         		  dataType: 'html',
         		  success: function(data){
         			 // alert(data);
         			   location='<?php echo $pagename."?action=3" ; ?>';
         			}
         			
         		  });//ajax close
         	}//confirm close
    }
  </script>


