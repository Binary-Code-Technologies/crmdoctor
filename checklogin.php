<?php
 include("adminsession.php");
 
if(isset($_POST['submit']))
{
     $admin_name = $_POST['admin_name']; 
     $admin_pwd = $_POST['admin_pwd']; 

    if($admin_name != "" && $admin_pwd != "")
    {  
        //echo "select * from user where userid ='$admin_name' and password='$admin_pwd'";die;  
        $res = mysqli_query($conn,"SELECT * from adduser where userid ='$admin_name' and password ='$admin_pwd'");
        //die;
         $count = mysqli_num_rows($res);
        if($count == 1)
        {
            $row = mysqli_fetch_assoc($res);
            echo $_SESSION['loginid'] = $row['id'];       
            
            //die;        
            echo "<script>location='dashboard.php'</script>";     
        }
        else
            echo "<script>location='index.php?msg=error'</script>" ;
    }
    echo "<script>location='index.php?msg=blank'</script>" ;
}

?>
