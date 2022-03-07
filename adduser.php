
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
if($_GET['id']!=""){
$keyvalue=$_GET['id'];
}else{
  $keyvalue=0;
}

if(isset($_POST['submit'])){
   $username = $_POST['username'];
   $password = $_POST['password'];
   $usertype = $_POST['usertype'];
   $mobile = $_POST['mobile'];
   $address = $_POST['address'];
   $user_img = $_FILES['user_img'];

   if($keyvalue==0){

    $data = mysqli_query($conn,"SELECT * FROM  adduser where username='$username' OR mobile='$mobile'");
    $get = mysqli_num_rows($data);
    if($get == $keyvalue){

        $user_image = $user_img['name'];
        $tm="DOC";
        $tm.=microtime(true)*1000;
        $ext = pathinfo($user_image, PATHINFO_EXTENSION);
        $user_image=$tm.".".$ext;
        move_uploaded_file($user_img['tmp_name'],"uploaded/".$user_image);

        //echo "INSERT INTO adduser set username='$username',password='$password',usertype='$usertype',mobile='$mobile',address='$address',user_img='$user_image',loginid='$loginid',ipaddress='$ipaddress',createdate='$createdate'"; die;

        mysqli_query($conn,"INSERT INTO adduser set username='$username',password='$password',usertype='$usertype',mobile='$mobile',address='$address',user_img='$user_image',loginid='$loginid',ipaddress='$ipaddress',createdate='$createdate'");
        $action = 1;
       }
       else
       $action =4;
       }else{     

       mysqli_query($conn,"UPDATE adduser set username='$username',password='$password',usertype='$usertype',mobile='$mobile',address='$address',loginid='$loginid',ipaddress='$ipaddress',createdate='$createdate' where id='$keyvalue'");
       $action = 2;
   
       if($user_img['name']!=""){
        $user_image = $user_img['name'];
        $tm="DOC";
        $tm.=microtime(true)*1000;
        $ext = pathinfo($user_image, PATHINFO_EXTENSION);
        $user_image=$tm.".".$ext;
        move_uploaded_file($user_img['tmp_name'],"uploaded/".$user_image);
        mysqli_query($conn,"UPDATE adduser set user_img='$user_image' where id='$keyvalue'");
        $action = 2;
    }
   }
       echo "<script>location='adduser.php?action=$action';</script>";
   }

  if($_GET['id']!=""){

  $btn_name = 'Update';
  $sql = mysqli_query($conn,"SELECT * FROM adduser where id='$_GET[id]'");
  $rowedit = mysqli_fetch_array($sql);
  $username = $rowedit['username'];
  $password = $rowedit['password'];
  $usertype = $rowedit['usertype'];
  $mobile = $rowedit['mobile'];
  $address = $rowedit['address'];
  $user_img = $rowedit['user_img'];
  }else{
    $username = '';
    $password = '';
    $usertype = '';
    $mobile = '';
    $address = '';
    $user_img = '';
  }



?>
  <?php include('inc/header.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <style>
   span.select2-selection.select2-selection--single{
    height:38px;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    box-shadow: inset 0 0 0 transparent;
    transition: border-color .15s
   }
 </style>
  <?php include('inc/sidemanu.php'); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">HOME</a></li>
              <li class="breadcrumb-item active">Add Users</li>
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
            <h3 class="card-title">Add Users Details  <center> <h4><span style="color:red;"><?php echo $msg;?></span></h4></center></h3>

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
          <input type="hidden" name="id" id="id" value="<?php echo $keyvalue; ?>">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>User Name</label>
                  <input type="text" name="username" id="username" value="<?php echo $username; ?>" placeholder="Please Enter User Name" class="form-control">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="password" id="password" value="<?php echo $password; ?>" placeholder="Please Enter Password" class="form-control">
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-12">
                <div class="form-group">
                  <label>User Type</label>
                  <select name="usertype" id="usertype" class="form-control select2">
                       <option value="">-Select-</option>
                       <option value="Admin">Admin</option>
                       <option value="Users">Users</option>
                  </select>
                  <script>document.getElementById('usertype').value='<?php echo $usertype; ?>';</script> 
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Mobile No</label>
                  <input type="text" name="mobile" id="mobile" value="<?php echo $mobile; ?>" placeholder="Please Enter Mobile No" class="form-control">
                </div>
                <div class="form-group">
                  <label>Full Address</label>
                  <input type="text" name="address" id="address" value="<?php echo $address; ?>" placeholder="Please Enter Full Address" class="form-control">
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
                  <input type="file" name="user_img" id="user_img" class="form-control">
                  </div>
                </div>
                <!-- /.form-group -->
              </div>
              <div class="col-6 col-sm-6">
                <div class="form-group">
                  
                  <div class="select2-purple">
                  <span><img src="uploaded/<?php echo $user_img; ?>" width="200px;" height="100px;" alt="<?php echo $user_img; ?>" /></span>
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
                   <center><a href="adduser.php" type="reset" name="reset" class="btn btn-danger col submit"><span>Reset</span></a> </center>
                </div>
           
                </div>
                <br>
        </form>
    </section>
    <!-- /.content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card" >
              <div class="card-header">
                <h3 class="card-title">Patient Details List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="overflow:auto;">
             
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.No.</th>
                    <th>User Name</th>
                    <th>Password</th>
                    <th>User Type</th>
                    <th>Mobile No</th>
                    <th>Full Address</th>
                    <th>Image Upload</th>
                    <th>Action</th> 
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sn=1;
                    $data = mysqli_query($conn,"SELECT * FROM adduser order by id desc");

                    while($row = mysqli_fetch_array($data)){
                    ?>
                  <tr>
                    <td><?php echo $sn++; ?></td>
                    <td><?php echo ucwords($row['username']); ?></td>
                    <td><?php echo ucwords($row['password']); ?></td>
                    <td><?php echo ucwords($row['usertype']); ?></td>
                    <td><?php echo $row['mobile']; ?></td>
                    <td><?php echo ucwords($row['address']); ?></td>
                    <td><img src="uploaded/<?php echo $row['user_img']; ?>" width="80px;" height="60px;" alt="<?php echo $row['user_img']; ?>" /></td>
                    <td><a href="adduser.php?id=<?php echo $row['id']; ?>"><strong> <span class="nav-icon fas fa-edit"></span></strong></a> &nbsp;
                    
                    <a onclick="funDel(<?php echo  $row['id']; ?>);" ><strong><span class="nav-icon fas fa-trash"></span></strong></a>
                  </td>
                   
                  </tr>
                  <?php } ?>
                 
                  </tbody>
                  
                </table>
              
              </div>
              <!-- /.card-body -->
            </div>
    </section>
  </div>
  <?php include('inc/footer.php'); ?>


