<?php
include('adminsession.php');

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
if($_GET['test_id']!=""){
$keyvalue=$_GET['test_id'];
}else{
 $keyvalue=0;
}

if(isset($_POST['submit'])){
   $test_name = $_POST['test_name'];
   $charge = $_POST['charge'];
   if($keyvalue==0){

      $data = mysqli_query($conn,"SELECT * FROM  test_entry where test_name='$test_name'");
	  $get = mysqli_num_rows($data);
   if($get == $keyvalue){
    
       mysqli_query($conn,"INSERT INTO test_entry set test_name='$test_name',charge='$charge',loginid='$loginid',ipaddress='$ipaddress',createdate='$createdate'");
       $action=1;
    }
    else
     $action = 4;
   }
   else{
       mysqli_query($conn,"UPDATE test_entry set test_name='$test_name',charge='$charge',loginid='$loginid',ipaddress='$ipaddress',createdate='$createdate' where test_id='$keyvalue'");
       $action = 2;
       }

       echo "<script>location='testname.php?action=$action';</script>";
  }
  if($_GET['test_id']!=""){
    $btn_name = 'Update';
    $sql = mysqli_query($conn,"SELECT * FROM test_entry where test_id='$_GET[test_id]'");
    $rowedit = mysqli_fetch_array($sql);
    $test_name = $rowedit['test_name'];
    $charge = $rowedit['charge'];
  
  }else{
    $test_name =  '';
    $charge = '';
      
  }
?>
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
            <h1>Add Test </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">HOME</a></li>
              <li class="breadcrumb-item active">Test Details</li>
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
            <h3 class="card-title">Test Details  <center> <h4><span style="color:red;"><?php echo $msg;?></span></h4></center></h3>

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
          <input type="hidden" name="test_id" id="test_id" Value="<?php echo $keyvalue; ?>">
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
               
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Test Name</label>
                  <input type="text" name="test_name" id="test_name" Value="<?php echo $test_name; ?>"  placeholder="Please Enter Test Name" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Charge</label>
                  <input type="number" name="charge" id="charge" Value="<?php echo $charge; ?>"  placeholder="Please Enter Charge" class="form-control">
                </div>
              </div>
            
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
                  <center><a href="testname.php" type="reset" name="reset" class="btn btn-danger col cancel">
                         <i class="fas fa-times-circle"></i><span>Cancel</span></a> </center>
                </div>
                </div>
        </form>
    </section>
    <br>
    <!-- /.content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Test List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.No.</th>
                    <th>Test Name</th>
                    <th>Charge</th>
                    <th>Action</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sn=1;
                    $data = mysqli_query($conn,"SELECT * FROM test_entry order by test_id desc");

                    while($row = mysqli_fetch_array($data)){

                    ?>
                  <tr>
                    <td><?php echo $sn++; ?></td>
                    <td><?php echo $row['test_name']; ?></td>
                    <td><?php echo $row['charge']; ?></td>
                    <td><a href="testname.php?test_id=<?php echo $row['test_id']; ?>"><strong> <span class="nav-icon fas fa-edit"></span></strong></a> &nbsp;
                    <a onclick="funDel(<?php echo  $row['test_id']; ?>);" ><strong><span class="nav-icon fas fa-trash"></span></strong></a>
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
  <script>
    function funDel(id){
          tblname = 'test_entry';
         	tblpkey = 'test_id';
         	pagename = 'testname.php';
         	submodule = '';
          // oldimg = 'formimg',
         	// module = 'From Data';
         	// alert(module); 
         	if(confirm("Are you sure! You want to delete this record."))
         	{
         		jQuery.ajax({
         		  type: 'POST',
         		  url: 'ajax/delete_form.php',
         		  data:'id='+id+'&tblname='+tblname+'&tblpkey='+tblpkey+'&submodule='+submodule+'&pagename='+pagename,
         		  dataType: 'html',
         		  success: function(data){
         			 // alert(data);
         			   location='<?php echo $pagename."?action=3" ; ?>';
         			}
         			
         		  });//ajax close
         	}//confirm close
    }
  </script>