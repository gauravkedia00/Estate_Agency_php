<?php  
session_start();
include ('../connection.php');
if(isset($_SESSION['CurrentUser']))
{
	if(isset($_POST['submit']))
	{
		$bldg_name=$_POST['bldg_name'];
		$posted_by=$_POST['posted_by'];
		$per_sqft=$_POST['per_sqft'];
		$area=$_POST['area'];
		$bldg_type=$_POST['bldg_type'];
		$location=$_POST['location'];
		$rooms=$_POST['rooms'];
		$status=$_POST['status'];
		$url="uploads/".str_replace(' ', '', $bldg_name).".jpg";
		$sql="insert into flat values('','$bldg_name','$bldg_type','$location','$status','$rooms','$posted_by','$per_sqft','$area','$url');";
		$run=mysqli_query($con,$sql);
		if(move_uploaded_file( $_FILES['picture']['tmp_name'],"../uploads/".str_replace(' ', '', $bldg_name).".jpg")==TRUE)
		{
			echo "Property added<br>";
			echo '<a href="index.php">Go back</a>';
		}
		else
		{
			echo $sql;
		}

	}
	else
	{
		header('Location:./login.php');
	}
	
}
else
{
	echo "<a href='index.php'>Please login to continue.</a>";
}


?>