<?php
		//database configuration
		if($_SERVER["SERVER_NAME"]=="localhost" || $_SERVER["SERVER_NAME"]=="binary" || $_SERVER["SERVER_NAME"]=="binary" || $_SERVER["SERVER_NAME"]=="binary-code-Technologist")
		{
			$host_name="localhost";
			$db_name="adminpanel";
			$db_user="root";
			$db_pwd="";
		}
		else
		{
			$host_name="localhost";
			$db_name="";
			$db_user="";
			$db_pwd="";
			//https://p3nlmysqladm002.secureserver.net/grid55/287/index.php	
		}
		
		//connect databse
		$conn=mysqli_connect("$host_name","$db_user","$db_pwd",$db_name);
		
		if(!$conn){
			die("Failed to connect ");
		}
	
?>
