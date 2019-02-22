<?php 
session_start();
    
if(isset($_SESSION['CurrentUser']))
{
	
	
	session_unset();
	session_destroy();
	header("location:login.php");


	
}

else
{
	echo "Please log in to continue.<a href='index.php'>Login</a>";
}
?>