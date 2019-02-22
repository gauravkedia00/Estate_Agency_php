<?php 

function m_log($arMsg)  
{  
	//define empty string                                 
	$stEntry="";  
	//get the event occur date time,when it will happened  
	$arLogData['event_datetime']='['.date('D Y-m-d h:i:s A').'] [client '.$_SERVER['REMOTE_ADDR'].']';  
	//if message is array type  
	if(is_array($arMsg))  
	{  
	//concatenate msg with datetime  
	foreach($arMsg as $msg)  
	$stEntry.=$arLogData['event_datetime']." ".$msg."rn";  
}  
else  
{   //concatenate msg with datetime  
	
	$stEntry.=$arLogData['event_datetime']." ".$arMsg."rn";  
}  
//create file with current date name  
$stCurLogFileName='log_'.date('Ymd').'.txt';  
//open the file append mode,dats the log file will create day wise  
$fHandler=fopen(LOG_PATH.$stCurLogFileName,'a+');  
//write the info into the file  
fwrite($fHandler,$stEntry);  
//close handler  
fclose($fHandler);  
}  


$con = mysqli_connect("localhost","root","","acres");

if (mysqli_connect_errno()) {
	
	
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	m_log("Sorry,returned the following ERROR: ".$fault->faultcode."-".$fault->faultstring); 
}
?>