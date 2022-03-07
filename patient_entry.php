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
            <h1> Patient Registration </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">HOME</a></li>
              <li class="breadcrumb-item active">Patient Details</li>
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
              <div class="col-md-6">
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Patient Name</label>
                  <input type="text" name="patient_name" id="patient_name" Value="<?php echo $patient_name; ?>"  placeholder="Please Enter Patient Name" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Patient ID</label>
                  <input type="text" name="patient_id" id="patient_id" Value="<?php echo $patient_id; ?>"  placeholder="Please Enter Patient ID" class="form-control" readonly>
                </div>
              </div>
            
            </div>
            <!-- /.row -->
            <div class="row">
              <div class="col-md-6">
               
                <!-- /.form-group -->
                <div class="form-group">
                  <label>S/W/D of</label>
                  <input type="text" name="pat_parents" id="pat_parents" Value="<?php echo $pat_parents; ?>"  placeholder="Please Enter S/W/D of" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Date of Birth</label>
                  <input type="date" name="pat_dob" id="pat_dob" onchange="Getage(this.value)" Value="<?php echo $pat_dob; ?>"  placeholder="Please Enter Date of Birth" class="form-control">
                </div>
              </div>
            
            </div>
            <div class="row">
              <div class="col-md-6">
               
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Age</label>
                  <input type="number" name="pat_age" id="pat_age" Value="<?php echo $pat_age; ?>"  placeholder="Please Enter Age" class="form-control" readonly>
                </div>
              </div>
              <div class="col-md-6">
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Email-Id</label>
                  <input type="email" name="pat_email" id="pat_email" Value="<?php echo $pat_email; ?>"  placeholder="Please Enter Email-Id" class="form-control">
                </div>
              </div>
            
            </div>
            <div class="row">
              <div class="col-md-6">
               
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Gender</label>
                  <select name="gender" id="gender" class="form-control select2">
                    <option value="">-Select-</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                  </select>
                  <script>document.getElementById('gender').value='<?php echo $gender; ?>';</script> 
                </div>
              </div>
              <div class="col-md-6">
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Mobile No</label>
                  <input type="text" name="pat_mobile" id="pat_mobile" maxlength="10" value="<?php echo $pat_mobile; ?>"  placeholder="Please Enter Mobile No" class="form-control">
                </div>
              </div>
            
            </div>
            <div class="row">
              <div class="col-md-6">
               
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Full Address</label>
                  <input type="text" name="full_address" id="full_address" value="<?php echo $full_address; ?>"  placeholder="Please Enter full Address " class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Referral Name</label>
                  <input type="text" name="refer_name" id="refer_name" value="<?php echo $refer_name; ?>"  placeholder="Please Enter Referral Name" class="form-control">
                </div>
              </div>
            
            </div>
            <div class="row">
              <div class="col-md-6">
               
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Date</label>
                  <input type="date" name="pat_date" id="pat_date" value="<?php echo $pat_date; ?>"  placeholder="Please Enter Date Name" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Reporting Time</label>
                  <input type="time" name="reporting_time" id="reporting_time" value="<?php echo $reporting_time; ?>"  placeholder="Please Enter Reporting Time" class="form-control">
                </div>
              </div>
            
            </div>
            <div class="row">
              <div class="col-md-6">
               
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Doctor's Name</label>
                  <select name="doc_id" id="doc_id" class="form-control select2">
                    <option value="">-Select-</option>
                    <?php
                    $data = mysqli_query($conn,"SELECT * FROM doctor_entry");
                    while($get = mysqli_fetch_array($data)){

                    ?>
                    <option value="<?php echo $get['doc_id']; ?>"><?php echo $get['doc_name']; ?></option>
                   <?php } ?>
                  </select>
                  
                  <script>document.getElementById('doc_id').value='<?php echo $doc_id; ?>';</script>
                </div>
              </div>
              <div class="col-md-6">
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Amount</label>
                  <input type="number" name="pat_amount" id="pat_amount" value="<?php echo $pat_amount; ?>"  placeholder="Please Enter Amount" class="form-control">
                </div>
              </div>
            
            </div>
          </div>
          <!-- /.card-body -->
         
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
                    <th>Payment</th>
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

                    <td> <?php if($row['paidamount']!=0){ ?>
                    <center><a  class="btn btn-xs btn btn-danger"><span>Paid</span></a></center>
                    <?php }else{ ?>
                      
                    <center><a onClick="paymentEntry(<?php echo $row['pat_id']; ?>)" class="btn btn-xs btn btn-success"><span>Payment</span></a></center>
                           <?php } ?>           
                    </td>
                   
                   <td><center><a href="print_patient_entry.php?pat_id=<?php echo $row['pat_id']; ?>" target="_blank"><strong> <span class="nav-icon fas fa-print"></span></strong></a></center></td>
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
           <!-- Modal -->
      <div id="editmodel" class="modal fade" role="dialog">
      <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content" style="width: 813px;">
      
      <div class="modal-header">
      
      <h4 class="modal-title">Patient Payment</h4>
      </div>
      <div class="modal-body">
      <div id="showedit">

      </div>
      </div>
      <div class="modal-footer">
     
      </div>
      </div>
      </div>
      </div>

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
  function paymentEntry(pat_id){  
    //alert('hi');
    // var pat_id = jQuery("#pat_id").val();
    // alert(pat_id);
         $.ajax({
            type: 'POST',
            url: 'paypatient.php',
            data: 'pat_id='+pat_id,           
            dataType: 'html',
            success: function(data){
            // alert(data);
         jQuery('#editmodel').modal('show');
         jQuery("#showedit").html(data);
             }          
            });//ajax close		
         } 
  </script>