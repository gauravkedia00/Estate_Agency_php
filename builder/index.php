
<head><link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">


<style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 70%;
      margin: auto;
  }

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #0000cc;
}
h2 {
    text-shadow: 2px 2px #aa33ee;
}
h3 {
    text-shadow: 2px 2px #33aa21;
}
li {
    float: left;
}

li a, .dropbtn {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
    background-color:#ff99ff;
}

li.dropdown {
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #99ffff;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {background-color: #0000cc}

.dropdown:hover .dropdown-content { 
    display: block;
}





section ul{ 
	list-style:none;
}
section ul li{ 
	display:inline-block;
}

#login {
    background-color:blue;
    color:white;
    text-align:center;
    padding:5px;
}


h1 {
    text-shadow: 2px 2px #118899;
}

div.img {background-color: #001122;
    margin: 5px;
    border: 1px solid #ccc;
    float: left;
    width: 280px;font-color:"white";
}	

div.img:hover {
    border: 1px solid #777;
}

div.img img {font-color:"white";
    width: 100%;
    height: auto;
}

div.desc { font-color:"white";
    padding: 15px;
    text-align: center;
}
#footer {
    background-color:black;
    color:white;
    clear:both;
    text-align:center;
   padding:5px;	 	 
}
</style>


</head>
<h2>Real Estate</h2>
  
 
  <ul>
  <li><a class="active" href="../index.html">Home</a></li>
 <li class="dropdown">
    <a href="#" class="dropbtn">For rent</a>
    <div class="dropdown-content">
      <a href="#">Apartment for rent</a>
      <a href="#">Popular Styles</a>
    </div>  <li><a href="#projectgallery">Project Gallery</a></li>
  <li class="dropdown">
    <a href="#" class="dropbtn">Home Design</a>
    <div class="dropdown-content">
      <a href="#">Find design ideas</a>
      <a href="#">Popular Styles</a>
      <a href="#">Popular Features</a>
    </div>
  
    <li><a href="About_Us.html">About US</a></li>
    <li><a href="contactus.html">Contact Us</a></li>
	<li><a href="email.php">Register</a></li>
	<li><a href="login.php">Log in</a></li>
  
</ul>

<?php 
require ('../connection.php'); 
echo '<link rel=stylesheet  type=text/css href="../css/log_in.css">';
	
	echo '<link rel=stylesheet  type=text/css href="../css/style.css">';

session_start();
if(isset($_SESSION['CurrentUser']))
{
	$id="";
	$email=$_SESSION['CurrentUser'];
	$sql="select * from users where email='$email';";
	$run=mysqli_query($con,$sql);
	while($row=$run->fetch_assoc())
	{
		$id=$row["user_id"];
	}
	if($run)
	{
		echo "You are logged in as: ".$email.'<br><br><br><br>';
		echo 'Add property<div class=container>';
		echo '<form action="add_property.php" enctype="multipart/form-data" method="post">
		
		Building name<input class="field" type="text" name="bldg_name"><br>
		Building type<br><input type="radio" name="bldg_type" value="residential" checked=checked>Residential
		<input type="radio" name="bldg_type" value="commercial">Commercial<br>
		Location <input class="field" type="text" name="location"><br>
		Construcion status<br><input type="radio" name="status" value="yes" checked=checked>Ready
		<input type="radio" name="status" value="no">Underconstruction<br>
		Price per sq.ft<input class="field" type="number" name="per_sqft"> <br>
		Total Area<input type="number" class="field" name="area"> <br>
		Total rooms<input type="number" name="rooms" class="field"><br>
		Plot image<input type="file" name="picture" ><br>
		<input type="hidden" name="posted_by" value='.$id.'>
		<input type="submit" class="btn-submit" name="submit">
		
		
		</form></div>
		';
	}
	else
	{
		echo "error";
	}
	echo '<a href="edit_profile.php">Edit profile</a>&nbsp;&nbsp;&nbsp;<a href="view_properties.php">View my properties</a>&nbsp;&nbsp;&nbsp;<a href="change_pass.php">Change password</a>&nbsp;&nbsp;&nbsp;<a href="../logout.php">Logout</a>';

	}
else
{
	echo "Please login to continue.";
}
?>
<footer id="footer">

			<div>
				<a href="http://www.edu.net/" class="url">The best property deal</a>
			</div>

			
			<div>
				Copyright &copy; R.E.P. All rights reserved.
			</div>
			

			<div>
				<a href="/common/sitemap/" class="url">SITEMAP</a>
			</div>

		</footer>