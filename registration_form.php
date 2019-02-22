
<script type="text/javascript">
    function CheckPasswordStrength(password) {
        var password_strength = document.getElementById("password_strength");
 
        //TextBox left blank.
        if (password.length == 0) {
            password_strength.innerHTML = "";
            return;
        }
 
        //Regular Expressions.
        var regex = new Array();
        regex.push("[A-Z]"); //Uppercase Alphabet.
        regex.push("[a-z]"); //Lowercase Alphabet.
        regex.push("[0-9]"); //Digit.
        regex.push("[$@$!%*#?&]"); //Special Character.
 
        var passed = 0;
 
        //Validate for each Regular Expression.
        for (var i = 0; i < regex.length; i++) {
            if (new RegExp(regex[i]).test(password)) {
                passed++;
            }
        }
 
        //Validate for length of Password.
        if (passed > 2 && password.length > 8) {
            passed++;
        }
 
        //Display status.
        var color = "";
        var strength = "";
        switch (passed) {
            case 0:
            case 1:
                strength = "Weak";
                color = "red";
                break;
            case 2:
                strength = "Good";
                color = "darkorange";
                break;
            case 3:
            case 4:
                strength = "Strong";
                color = "green";
                break;
            case 5:
                strength = "Very Strong";
                color = "darkgreen";
                break;
        }
        password_strength.innerHTML = strength;
        password_strength.style.color = color;
    }
</script>


<?php 
echo '<link rel=stylesheet  type=text/css href="css/log_in.css">';
	
	echo '<link rel=stylesheet  type=text/css href="css/style.css">';
	
require 'connection.php';
require("/phpmailer/PHPMailerAutoload.php");

		

if(isset($_POST['register']))
{

		$email=$_POST['email'];
		$name=$_POST['name'];
	$password=$_POST['pass'];
	$user=$_POST['type'];
	$contact=$_POST['contact'];
		 
$mail=new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth=true;
$mail->SMTPDebug=false;
$mail->Host='smtp.gmail.com';
$mail->Username='projectcollege123@gmail.com';
$mail->Password='Qwerty!@';
$mail->SMTPSecure='ssl';
$mail->Port='465';
$mail->From='realestate';
$mail->FromName='realestate';
$mail->addReplyTo($email,'');
$mail->addCC($email,'');
$mail->Subject='Registration successfull';
$mail->Body='Thank you for registering on Real Estate.<br>Your email id is your username for login in on the website.Your Name:'.$name.'.<br>Password: '.$password.'<br>Contact: '.$contact.'';
$mail->AltBody='Body';
	
	$sql="insert into users values('','$email','$name','$password','$contact','$user');";
	$run=mysqli_query($con,$sql);
	
		if($mail->send()==TRUE)
			
                {
			echo '<br><br>Verification mail sent.<br><br><br>';
				if($run)
				{		
		echo "You have successfully register";
	
		echo "<a href='login.php'>Click here to login</a>";
				}
				}
				else
				{
			echo '<br><br>Something went wrong<br><br><br>';
				}
	
	
}
else
{
	echo '<div class="container">
<form action="registration_form.php" method="post">
Email</td><td><input class="field" type="email" value="'.base64_decode($email=$_GET["id"]).'" name="email" required readonly><br>
Name<input type="text" class="field" name="name" placeholder="First Name Surname" required><br>
Password<input type="password" class="field" onkeyup="CheckPasswordStrength(this.value)" name="pass" required><br>
<span id="password_strength"></span><br>

Contact<input type="number" name="contact" class="field" required><br>
Usertype<input type="radio" name="type" value="customer" checked=checked>Customer<input type="radio" name="type" value="builder">Builder<br>
<input class="btn-submit" type="submit" name="register">

</form>
';

		echo "<a href='login.php'>Click here to login</a></div>";

}



?>
