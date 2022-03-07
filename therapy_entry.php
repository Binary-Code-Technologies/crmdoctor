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
   if($_GET['pat_id']!=""){
   $keyvalue=$_GET['pat_id'];
   }else{
    $keyvalue=0;
   }
   
   if(isset($_POST['submit'])){
      $patient_name = $_POST['patient_name'];
      $patient_id = $_POST['patient_id'];
      $pat_parents = $_POST['pat_parents'];
      $pat_dob = $_POST['pat_dob'];
      $pat_age = $_POST['pat_age'];
      $pat_email = $_POST['pat_email'];
      $gender = $_POST['gender'];
      $pat_mobile = $_POST['pat_mobile'];
      $full_address = $_POST['full_address'];
      $refer_name = $_POST['refer_name'];
      $pat_date = $_POST['pat_date'];
      $reporting_time = $_POST['reporting_time'];
      $doc_id = $_POST['doc_id'];
      $pat_amount = $_POST['pat_amount'];
   
      if($keyvalue==0){
   
         //echo "INSERT INTO patient_entry set patient_name='$patient_name',patient_id='$patient_id',pat_parents='$pat_parents',pat_dob='$pat_dob',pat_age='$pat_age',pat_email='$pat_email',gender='$gender',pat_mobile='$pat_mobile',full_address='$full_address',refer_name='$refer_name',pat_date='$pat_date',reporting_time='$reporting_time',doc_id='$doc_id',pat_amount='$pat_amount',loginid='$loginid',ipaddress='$ipaddress',createdate='$createdate'"; die;
       
          mysqli_query($conn,"INSERT INTO patient_entry set patient_name='$patient_name',patient_id='$patient_id',pat_parents='$pat_parents',pat_dob='$pat_dob',pat_age='$pat_age',pat_email='$pat_email',gender='$gender',pat_mobile='$pat_mobile',full_address='$full_address',refer_name='$refer_name',pat_date='$pat_date',reporting_time='$reporting_time',doc_id='$doc_id',pat_amount='$pat_amount',loginid='$loginid',ipaddress='$ipaddress',createdate='$createdate'");
          $action=1;
       
      }
      else{
          mysqli_query($conn,"UPDATE patient_entry set patient_name='$patient_name',patient_id='$patient_id',pat_parents='$pat_parents',pat_dob='$pat_dob',pat_age='$pat_age',pat_email='$pat_email',gender='$gender',pat_mobile='$pat_mobile',full_address='$full_address',refer_name='$refer_name',pat_date='$pat_date',reporting_time='$reporting_time',doc_id='$doc_id',pat_amount='$pat_amount',loginid='$loginid',ipaddress='$ipaddress',createdate='$createdate' where pat_id='$keyvalue'");
          $action = 2;
          }
   
          echo "<script>location='patient_entry.php?action=$action';</script>";
     }
     if($_GET['pat_id']!=""){
       $btn_name = 'Update';
       $sql = mysqli_query($conn,"SELECT * FROM patient_entry where pat_id='$_GET[pat_id]'");
       $rowedit = mysqli_fetch_array($sql);
       $patient_name = $rowedit['patient_name'];
       $patient_id = $rowedit['patient_id'];
       $pat_parents = $rowedit['pat_parents'];
       $pat_dob = $rowedit['pat_dob'];
       $pat_age = $rowedit['pat_age'];
       $pat_email = $rowedit['pat_email'];
       $gender = $rowedit['gender'];
       $pat_mobile = $rowedit['pat_mobile'];
       $full_address = $rowedit['full_address'];
       $refer_name = $rowedit['refer_name'];
       $pat_date = $rowedit['pat_date'];
       $reporting_time = $rowedit['reporting_time'];
       $doc_id = $rowedit['doc_id'];
       $pat_amount = $rowedit['pat_amount'];
     
     }else{
       $patient_name = '';
       $patient_id = '';
       $pat_parents = '';
       $pat_dob = '';
       $pat_age = '';
       $pat_email = '';
       $gender = '';
       $pat_mobile = '';
       $full_address = '';
       $refer_name = '';
       $pat_date = date('Y-m-d');
       $reporting_time = date('H:i:s');
       $doc_id = '';
       $pat_amount = '';
         
     }
   
     $patient_id = $cmn->getvalfield($conn,"patient_entry","count(*)","1=1");
      if($patient_id=='0')
      {
      	$patient_id = $cmn->getcode($conn,'patient_entry',"patient_id","1=1");	
      }
      else
      {
      	 $patient_id = $cmn->getcode($conn,'patient_entry',"patient_id","1=1");	
      }
   ?>
<?php include('inc/header.php'); ?>
<!-- Main Sidebar Container -->
<?php include('inc/sidemanu.php'); ?>
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
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1> Theraphy Test </h1>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="dashboard.php">HOME</a></li>
               <li class="breadcrumb-item active">Theraphy Test</li>
            </ol>
         </div>
      </div>
   </div>
   <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
   <div class="container-fluid">
   <!-- SELECT2 EXAMPLE -->
   <div class="card card-default">
      <div class="card-header">
         <h3 class="card-title">
         Theraphy Test  
            <center>
               <h4><span style="color:red;"><?php echo $msg;?></span></h4>
            </center>
         </h3>
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
         <input type="hidden" name="pat_id" id="pat_id" Value="<?php echo $keyvalue; ?>">
         <div class="card-body">
            <div class="row">
               <div class="col-md-3">
                  <!-- /.form-group -->
                  <div class="form-group">
                     <label>Patient Name</label>
                     <select name="pat_id" id="pat_id" onchange="GetDetail(this.value);" class="form-control select2">
                        <option value="">-Select-</option>
                     <?php
                          $patient = mysqli_query($conn,"SELECT * FROM patient_entry order by pat_id desc");
                          while($row = mysqli_fetch_array($patient)){
                            
                         ?>
                        <option value="<?php echo $row['pat_id']; ?>"><?php echo ucwords($row['patient_name']);?></option>
                        <?php } ?>
                     </select>
                     <script>document.getElementById('pat_id').value='<?php echo $pat_id; ?>';</script> 
                  </div>
               </div>
               <div class="col-md-3">
                  <!-- /.form-group -->
                  <div class="form-group">
                     <label>Patient ID</label>
                     <input type="text" name="patient_id" id="patient_id" Value="<?php echo $patient_id; ?>"  placeholder="Please Enter Patient ID" class="form-control" readonly>
                  </div>
               </div>
               <div class="col-md-3">
                  <!-- /.form-group -->
                  <div class="form-group">
                     <label>S/W/D of</label>
                     <input type="text" name="pat_parents" id="pat_parents" Value="<?php echo ucwords($pat_parents); ?>"  placeholder="Please Enter S/W/D of" class="form-control">
                  </div>
               </div>
               <div class="col-md-3">
                  <!-- /.form-group -->
                  <div class="form-group">
                     <label>Date of Birth</label>
                     <input type="date" name="pat_dob" id="pat_dob" onchange="Getage(this.value)" Value="<?php echo $pat_dob; ?>"  placeholder="Please Enter Date of Birth" class="form-control">
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-3">
                  <!-- /.form-group -->
                  <div class="form-group">
                     <label>Age</label>
                     <input type="number" name="pat_age" id="pat_age" Value="<?php echo $pat_age; ?>"  placeholder="Please Enter Age" class="form-control" readonly>
                  </div>
               </div>
               <div class="col-md-3">
                  <!-- /.form-group -->
                  <div class="form-group">
                     <label>Email-Id</label>
                     <input type="email" name="pat_email" id="pat_email" Value="<?php echo $pat_email; ?>"  placeholder="Please Enter Email-Id" class="form-control">
                  </div>
               </div>
               <div class="col-md-3">
                  <!-- /.form-group -->
                  <div class="form-group">
                     <label>Gender</label>
                     <input type="text" name="gender" id="gender"  value="<?php echo $gender; ?>"  placeholder="Please Enter Gender" class="form-control">

                  </div>
               </div>
               <div class="col-md-3">
                  <!-- /.form-group -->
                  <div class="form-group">
                     <label>Mobile No</label>
                     <input type="text" name="pat_mobile" id="pat_mobile" maxlength="10" value="<?php echo $pat_mobile; ?>"  placeholder="Please Enter Mobile No" class="form-control">
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-3">
                  <!-- /.form-group -->
                  <div class="form-group">
                     <label>Full Address</label>
                     <input type="text" name="full_address" id="full_address" value="<?php echo $full_address; ?>"  placeholder="Please Enter full Address " class="form-control">
                  </div>
               </div>
               <div class="col-md-3">
                  <!-- /.form-group -->
                  <div class="form-group">
                     <label>Referral Name</label>
                     <input type="text" name="refer_name" id="refer_name" value="<?php echo ucwords($refer_name); ?>"  placeholder="Please Enter Referral Name" class="form-control">
                  </div>
               </div>
               <div class="col-md-3">
                  <!-- /.form-group -->
                  <div class="form-group">
                     <label>Doctor's Name</label>
                     <input type="text" name="doc_id" id="doc_id" value="<?php echo $doc_id; ?>"  placeholder="Please Enter Doctor  Name" class="form-control">

                  </div>
               </div>
               <div class="col-md-3">
                  <!-- /.form-group -->
                  <div class="form-group">
                     <label>Amount</label>
                     <input type="number" name="pat_amount" id="pat_amount" value="<?php echo $pat_amount; ?>"  placeholder="Please Enter Amount" class="form-control">
                  </div>
               </div>
            </div>
         </div>
   </div>
   <div class="card card-default">
   <div class="card-header">
   <h3 class="card-title">Patient Details  <center> <h4><span style="color:red;"><?php echo $msg;?></span></h4></center></h3>
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
   <input type="hidden" name="pat_id" id="pat_id" Value="<?php echo $keyvalue; ?>">
   <div class="card-body">
   <div class="row">
   <div class="col-md-3">
   <!-- /.form-group -->
   <div class="form-group">
   <label>Test Name</label>
   <select name="test_id" id="test_id" class="form-control select2">
   <option value="">-Select-</option>
   <?php
      $test = mysqli_query($conn,"SELECT * FROM test_entry");
      while($restrow = mysqli_fetch_array($test)){
      ?>
   <option value="<?php echo $restrow['test_id']; ?>"><?php echo $restrow['test_name']; ?></option>
   <?php } ?>
   </select>
   <script>document.getElementById('test_id').value='<?php echo $test_id; ?>';</script>
   </div>
   </div>
   <div class="col-md-2">
   <!-- /.form-group -->
   <div class="form-group">
   <label>Charge</label>
   <input type="text" name="charge" id="charge" onchange="getTotal();" value="<?php echo $charge; ?>"  placeholder="Please Enter charge" class="form-control" >
   </div>
   </div>
   <div class="col-md-2">
   <!-- /.form-group -->
   <div class="form-group">
   <label>Qty</label>
   <input type="text" name="qty" id="qty" onchange="getTotal();" value="<?php echo $qty; ?>"  placeholder="Please Enter Qty" class="form-control">
   </div>
   </div>
   <div class="col-md-2">
   <!-- /.form-group -->
   <div class="form-group">
   <label>Total</label>
   <input type="text" name="total" id="total" value="<?php echo $total; ?>"  placeholder="Total Amount" class="form-control">
   </div>
   </div>
   <div class="col-md-1">
   <!-- /.form-group -->
   <div class="form-group">
   <center><a type="submit" style="margin-top: 32px;" name="submit" class="btn btn-success col submit"><span>Add</span></a> </center>
   </div>
   </div>
   </div>
   </div>
   </div>
   <div class="row">
   <div class="col-md-1">
   <center><button type="submit" name="submit" class="btn btn-info col submit"><span><?php echo $btn_name; ?></span></button> </center>
   </div>
   <div class="col-md-1">
   <center><a href="patient_entry.php" type="reset" name="reset" class="btn btn-danger col cancel">
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
                     <th>Patient Id</th>
                     <th>Patient Name</th>
                     <th>S/W/D of</th>
                     <th>Age / Gender</th>
                     <th>Mobile No.</th>
                     <th>Email-Id</th>
                     <th>Full Address</th>
                     <th>Referral Name</th>
                     <th>Doctor's Name</th>
                     <th>Amount</th>
                     <th>Date</th>
                     <th>Reporting Time</th>
                     <th>Print</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                     $sn=1;
                     $data = mysqli_query($conn,"SELECT * FROM patient_entry order by pat_id desc");
                     
                     while($row = mysqli_fetch_array($data)){
                     
                       $doc_name = $cmn->getvalfield($conn,"doctor_entry","doc_name","doc_id='$row[doc_id]'");
                     
                     ?>
                  <tr>
                     <td><?php echo $sn++; ?></td>
                     <td><?php echo $row['patient_id']; ?></td>
                     <td><?php echo ucwords($row['patient_name']); ?></td>
                     <td><?php echo ucwords($row['pat_parents']); ?></td>
                     <td><?php echo $row['pat_age']." / ". $row['gender']; ?></td>
                     <td><?php echo $row['pat_mobile']; ?></td>
                     <td><?php echo $row['pat_email']; ?></td>
                     <td><?php echo $row['full_address']; ?></td>
                     <td><?php echo ucwords($row['refer_name']); ?></td>
                     <td><?php echo ucwords($doc_name); ?></td>
                     <td><?php echo $row['pat_amount']; ?></td>
                     <td><?php echo date('d-m-Y',strtotime($row['pat_date'])); ?></td>
                     <td><?php echo $row['reporting_time']; ?></td>
                     <td>
                        <center><a href="print_patient_entry.php?pat_id=<?php echo $row['pat_id']; ?>" target="_blank"><strong> <span class="nav-icon fas fa-print"></span></strong></a></center>
                     </td>
                     <td><a href="patient_entry.php?pat_id=<?php echo $row['pat_id']; ?>"><strong> <span class="nav-icon fas fa-edit"></span></strong></a> &nbsp;
                        <a onclick="funDel(<?php echo  $row['pat_id']; ?>);" ><strong><span class="nav-icon fas fa-trash"></span></strong></a>
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
         tblname = 'patient_entry';
        	tblpkey = 'pat_id';
        	pagename = 'patient_entry.php';
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
  
   function GetDetail(pat_id){

      $.ajax({
                        type: 'get',
                        url: 'patientDetails.php',
                        data: 'pat_id='+pat_id,
                        dataType: 'html',
          success: function(data){
            var myArray = data.split("|");
             // jQuery('#patient_id').val(data);

            jQuery('#patient_id').val(myArray[0]);
            jQuery('#pat_parents').val(myArray[1]);
            jQuery('#pat_dob').val(myArray[2]);
            jQuery('#pat_age').val(myArray[3]);
            jQuery('#pat_email').val(myArray[4]);
             jQuery('#gender').val(myArray[5]).trigger("select2:updated");
            jQuery('#pat_mobile').val(myArray[6]);
            jQuery('#full_address').val(myArray[7]);
            jQuery('#refer_name').val(myArray[8]);
            jQuery("#pat_date").val(myArray[9]);
            jQuery("#reporting_time").val(myArray[10]);
            jQuery("#doc_id").val(myArray[11]).trigger("select2:updated");
            jQuery("#pat_amount").val(myArray[12]);

           }
          });//ajax close
    
   }

   function getTotal(){
      var charge = jQuery('#charge').val();
      var qty = jQuery('#qty').val();
     

      var total = charge*qty;
      jQuery('#total').val(total);
     
   }
   
   

</script>