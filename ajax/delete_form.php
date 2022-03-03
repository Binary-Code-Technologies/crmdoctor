<?php 

//echo "hi"; die;
 include("../adminsession.php");
 $id  = $_REQUEST['id'];
 $tblname  =$_REQUEST['tblname'];
 $tblpkey  =$_REQUEST['tblpkey'];
 $module = $_REQUEST['module'];
 $submodule = $_REQUEST['submodule'];
 $pagename = $_REQUEST['pagename'];
 $imgpath = $_REQUEST['imgpath'];
 $rowimg = mysqli_fetch_array(SelectDB($tblname,"$tblpkey ='$id'"));
 $oldimg = $rowimg["oldimg"];
 if($oldimg!= "")
 {
	unlink("uploaded/".$oldimg);	
 }

 $res =  mysqli_query($conn,"DELETE from $tblname where $tblpkey = '$id'");

 if($res)
 {
	//$cmn->InsertLog($connection,$pagename, $module, $submodule, $tblname, $tblpkey, $id, "deleted");
	echo "<script>location='$pagename?action=3';</script>";
 }


?>