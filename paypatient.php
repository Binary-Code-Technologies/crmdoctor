 <?php 
       include("adminsession.php");
	   
	  $pat_id =  $_REQUEST['pat_id'];	
	  $sql =  mysqli_query($conn,"SELECT * from patient_entry where pat_id='$pat_id'");
	  $row = mysqli_fetch_array($sql);
	  $doc_id =  $row['doc_id'];
	  $patient_name =  $row['patient_name'];
	  $pat_amount =  $row['pat_amount'];
	  $doc_name = $cmn->getvalfield($conn,"doctor_entry","doc_name","doc_id='$doc_id'");
	  $paydate=date('Y-m-d');
	 ?>
<html>
<head>
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
<title></title>
</head>
<body>	
  
<section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Patient Details</h3>

           
          </div>
          <!-- /.card-header -->
         
          <input type="hidden" name="pat_id" id="mpat_id" value="<?php echo $pat_id; ?>">
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
               
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Patient Name</label>
                  <input type="text" name="patient_name" id="patient_name" Value="<?php echo ucwords($patient_name); ?>"  placeholder="Please Enter Patient Name" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
               
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Doctor Name</label>
                  <input type="text" name="doc_id" id="doc_id" Value="<?php echo $doc_name; ?>"  placeholder="Please Enter Doctor Name" class="form-control">
                </div>
              </div>
            
            </div>
            
            <div class="row">
              <div class="col-md-6">
               
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Payment Amount</label>
                  <input type="text" name="pat_amount" id="pat_amount" Value="<?php echo $pat_amount; ?>"  placeholder="Please Enter Payment Amount" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
               
               <!-- /.form-group -->
               <div class="form-group">
                 <label>Pay Date</label>
                 <input type="date" name="paydate" id="paydate" Value="<?php echo $paydate; ?>"  class="form-control">
               </div>
             </div>
            
            </div>
            
            <div class="row">
              <div class="col-md-6">
               
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Paid Amount</label>
                  <input type="text" name="paidamount" id="paidamount" Value="<?php echo $paidamount; ?>"  placeholder="Please Enter Paid Amount" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
               
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Payment Type</label>
                  <select name="paytype" id="paytype" class="form-control select2">
                    
                    <option value="Cash">Cash</option>
                    <option value="PhonePay">PhonePay</option>
                    <option value="GooglePay">GooglePay</option>
                    <option value="cheque">CHEQUE</option>
                    <option value="neft">NEFT</option>
                  </select>
                
                </div>
              </div>
            
            </div>
           

            <!-- /.row -->
          </div>
          <!-- /.card-body -->
         
        </div>

        <div class="row">
            
                <div class="col-md-4">
                   <center><button type="submit" name="submit" onClick="getpayment();" class="btn btn-success col submit"><span>Payment</span></button> </center>
                </div>
               <div class="col-md-4">
               <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
                </div>
       
    </section>
</body>
</html>

 