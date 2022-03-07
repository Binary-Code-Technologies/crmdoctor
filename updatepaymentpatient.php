<?php
include('adminsession.php');
$pat_id = $_REQUEST['pat_id'];
$paytype = $_REQUEST['paytype'];
$paidamount = $_REQUEST['paidamount'];
$paydate = $_REQUEST['paydate'];
//echo "UPDATE patient_entry SET paytype='$paytype',paidamount='$paidamount',paydate='$paydate' where pat_id='$pat_id'"; die;
mysqli_query($conn,"UPDATE patient_entry SET paytype='$paytype',paidamount='$paidamount',paydate='$paydate' where pat_id='$pat_id'");




?>