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
<br><br><br><br>

<?php  
require ('../connection.php'); 

echo '<link rel=stylesheet  type=text/css href="../css/table.css">';
	
	echo '<link rel=stylesheet  type=text/css href="../css/style.css">';
session_start();
if(isset($_SESSION['CurrentUser']))
{
$id=$_SESSION['CurrentUser'];
$sql="select * from flat JOIN users on flat.user_id=users.user_id";
$run=mysqli_query($con,$sql);
echo '<form action="view_properties.php" method="post"><table>
			<th>Select a building</th>
			<th>Building name</th>
			<th>Type</th>
			<th>Location</th>
			<th>Bedrooms</th>
			<th>Per sq.ft</th>
			<th>Total Area</th>
			<th>Action</th>';
while ($row=$run->fetch_assoc())
{
	echo '<tr><td>';
	echo '<input type="radio" name=id value='.$row["id"].'><br>';
	echo '</td>';
	
	echo '<td>';
	echo '<input type="text" class="field" readonly name=name value='.$row["building_name"].'><br>';
	echo '</td>';
	
	echo '<td>';
	echo '<input type="text" class="field" readonly name=type value='.$row["bldg_type"].'><br>';
	echo '</td>';
	
	echo '<td>';
	echo '<input type="text" readonly class="field" name=location value='.$row["location"].'><br>';
	echo '</td>';
	
	echo '<td>';
	echo '<input type="text" readonly name=bedrooms class="field" value='.$row["bedrooms"].'><br>';
	echo '</td>';
	
	echo '<td>';
	echo '<input class="field" type="text" readonly name=persqft value='.$row["per_sqft"].'><br>';
	echo '</td>';
	
	
	echo '<td>';
	echo '<input type="text" class="field" readonly name=area value='.$row["area"].'><br>';
	echo '</td>';
	echo '<td>';
	echo '<input type="submit" class="btn-submit" name=delete value=Delete><br>';
	echo '</td></tr>';
	echo $message="";
	}
echo '</table></form><br><a href="index.php">Back</a>';
if(isset($_POST['delete']))
{
	$flat_id=$_POST['id'];
	$sql="delete from flat where id='$flat_id'";
	$run=mysqli_query($con,$sql);
	if($run)
	{
		echo "Property deleted<br>";
	}
	else
	{
		echo "Error";
	}
}
}
else
{
	echo "Please login first";
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