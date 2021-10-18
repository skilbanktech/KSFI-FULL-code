<?php

session_start();


include('./connection.php');


$email=$_REQUEST['emailid'];
$fname=$_REQUEST['fname'];
$lname=$_REQUEST['lname'];
$gender=$_REQUEST['gender'];
$location=$_REQUEST['location'];

$work=$_REQUEST['work'];
$education=$_REQUEST['education'];
$link=$_REQUEST['link'];


if($location=='undefined')
{
$location='';
}
if($work=='undefined')
{
$work ='';
}
if($education=='undefined')
{
$education='';
}

    $_SESSION['fbemail']=$email;
 
    $_SESSION['fbfirstname']=$fname;
 
    $_SESSION['fblastname']=$lname;
	
	$_SESSION['fblink']=$link;
 
 
 
    $sql="insert into fblogin_details (first_name,last_name,email,gender,hometown,work,education,link,created)values('$fname','$lname','$email','$gender',
	'$location','$work','$education',
	'$link',NOW())";
 

     mysql_query($sql);
		
    $select_query="select 1 from registration_details  where email='$email'";
	
    $result=mysql_query($select_query);
	
	$count = mysql_num_rows($result);
	
	if($count !=0)
	
	{
	
	// decode
       $email_encoded = rtrim(strtr(base64_encode($email), '+*', '-_'), '=');
	   
	   echo $email_encoded;
	   
	  header('Location:send_login.php?email='.$email_encoded);
	}
	
	else
	
	{
	
       header('Location:signup.php');
	   
	 }

?>
