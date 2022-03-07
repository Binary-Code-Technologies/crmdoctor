<?php 
	include("adminsession.php");
   $pat_id = $_REQUEST['pat_id'];

   $get = mysqli_query($conn,"SELECT * FROM patient_entry WHERE pat_id='$pat_id' ORDER BY `pat_id` DESC limit 1");

   $new = mysqli_fetch_array($get);

   $doc_name = $cmn->getvalfield($conn,"doctor_entry","doc_name","doc_id='$new[doc_id]'");
//echo $doc_name; die;
   $patient_id = $new['patient_id'];
   $pat_parents = $new['pat_parents'];
   $pat_dob = $new['pat_dob'];
   $pat_age = $new['pat_age'];
   $pat_email = $new['pat_email'];
   $gender = $new['gender'];
   $pat_mobile = $new['pat_mobile'];
   $full_address = $new['full_address'];
   $refer_name = $new['refer_name'];
   $pat_date = $new['pat_date'];
   $reporting_time = $new['reporting_time'];
   
   $pat_amount = $new['pat_amount'];
   





 echo $patient_id."|".ucwords($pat_parents)."|".$pat_dob."|".$pat_age."|".$pat_email."|".$gender."|".$pat_mobile."|".$full_address."|".ucwords($refer_name)."|".$pat_date."|".$reporting_time."|".$doc_name."|".$pat_amount;




   ?>