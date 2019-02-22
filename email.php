<?php 
	
	echo '<link rel=stylesheet  type=text/css href="css/log_in.css">';
	
	echo '<link rel=stylesheet  type=text/css href="css/style.css">';
	if(isset($_POST['submit']))
{
require 'connection.php';
require("phpmailer/PHPMailerAutoload.php");

		$email=$_REQUEST['email'];
			 
$mail=new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth=true;
$mail->SMTPDebug=false;
$mail->Host='smtp.gmail.com';
$mail->Username='gauravkedia2803@gmail.com';
$mail->Password='01664241491';
$mail->SMTPSecure='ssl';
$mail->Port='465';

$mail->From='realestate';
$mail->FromName='realestate';
$mail->addReplyTo($email,'');
$mail->addCC($email,'');
$mail->Subject='Email Verification for realestate';
$mail->Body='For registration form pls visit the link given below.<br><br><a href=estateagency.esy.es/registration_form.php?id='.base64_encode($email).'>Click here to register</a>. ';
$mail->AltBody='Body';

		
		if($mail->send()==TRUE)
                {
			echo '<br><br>Verification mail sent.<br><br><br>'.$mail->ErrorInfo;
				}
				else
				{
			echo '<br><br>Mailer Error:<br><br><br>'.$mail->ErrorInfo;
				}
				

}
?>
<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta charset="utf-8" />
		<link rel="icon" href="favicon.ico" type="image/x-icon">
<style>
body {
    margin: 0;
    padding: 0;
    text-align: justify;
}

*{
    margin: 0 auto;
}

  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 70%;
      margin: auto;
  }

#nav {
    width: 100%;
    margin: 0;
    padding: 0;
    text-align: center;
    list-style: none;
    background-color: #2580a2;
    border-bottom: 1px solid #ccc;
    border-top: 1px solid #ccc;
}

h2 {
    text-shadow: 2px 2px #aa33ee;
}

h3 {
    text-shadow: 2px 2px #33aa21;
}

#nav li {
    display: inline-block;
	text-align:center;
}

#nav li a {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

#nav li a:hover{
    background-color:#ff99ff;
}

#footer {
    background-color:black;
    color:white;
    clear:both;
    text-align:center;
   padding:5px;	 	 
}

#header{
	background:linear-gradient(to bottom right,#aaaaaa, white);
	border-radius:5px;
}

#header img{
	width:9%;
	/*background:linear-gradient(to bottom right,#9999ff, white);*/
	height:110px;
	padding:5px;
	border-radius:100%;
	float:center;
	margin-right:20px;
}

#header 
	{
		position: relative;
		overflow: hidden;
		text-align: center;
		width: 100%;
		text-transform: uppercase;
	}

#header 
	{
		position: relative;
		overflow: hidden;
		text-align: center;
		width: 100%;
		text-transform: uppercase;
	}

#header:hover div.ease
	{
		transition: 2s ease-in;
        float: left;
	}


#header h1
	{
		color: #ffa500;
		-webkit-animation-name: example;
		-webkit-animation-duration: 10s;
		animation-name: example;
		animation-duration: 10s;
	}

@-webkit-keyframes example 
	{
		from {color: #ffa500;}
		to {color: green;}
	}

@keyframes example 
	{
		from {color: #ffa500;}
		to {color: green;}
	}

#header h2
	{
		color: #9999ff;
	}
	
#content
	{
		position: relative;
		overflow: hidden;
		width: 100%;
	}

#content h1::first-letter {color: #ff0000;font-size: xx-large;}

#content h1::first-line {color: #0000ff; font-variant: small-caps;}

div.desc 
	{
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

	@media screen and (min-width: 1001px) and (max-width: 1400px)
	{
		body
		{
			background-image:url(image/1.jpg);
			background-size:100%;
			background-repeat:repeat;
			background-attachment:scroll;
		}
	}
	
	@media screen and (min-width: 501px) and (max-width: 1000px)
	{
		body
		{
			background-image:url(image/2.jpg);
			background-size:100%;
			background-repeat:repeat;
			background-attachment:scroll;
		}
	}
	
	@media screen and (min-width: 240px) and (max-width: 500px)
	{
		body
		{
			background-image:url(image/3.jpg);
			background-size:100%;
			background-repeat:repeat;
			background-attachment:scroll;
		}
	}


</style>


</head>
	<div id="header">
			<img src="logo.png">
				<b><h1>REAL ESTATE</b></h1>
				<p>its all about property...</p>
				<marquee><h2>Buying, Selling, Renting And Leasing Of Properties In Mumbai</h2></marquee>
	</div>
	
  <ul id="nav">
	<li><a  href="index.html">Home</a></li>
    <li><a href="About_Us.html">About US</a></li>
    <li><a href="contactus.html">Contact Us</a></li>
	<li><a class="active" href="email.php">Register</a></li>
	<li><a href="login.php">Log in</a></li>
	<li><a href="feed.html">Feedback</a></li>
  </ul>

<br><br><br><br><br><br>
<div class="container"> 
<form action="email.php" method="post">
Email<input type="email" class=field name="email"><br>
<input class="btn-submit" type="submit" name="submit">
</form>
</div>

<br><br><br><br><br><br><br><br><br><br>
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