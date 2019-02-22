<?php
$name =$_POST['name'];
$email=$_POST['email'];
$feedback =$_POST['feedback'];

$to ="grvkd2803@gmail.com";
$subject="Feedback from our site";
$msg="This is an automated request please do not reply .\n\n $feedback . \n\n  From $email";
$abc=mail($to,$subject,$msg);
if($abc){
	echo "Thankyou for your feedback";
}
else {
	echo "error";
}
?>

