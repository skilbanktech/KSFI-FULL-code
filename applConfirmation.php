<?php 

if(isset($_GET['sign']))
 {
    $mobile_encoded = $_GET['sign'];
	
  header('location:send_login.php?mob='.$mobile_encoded);
 
 
 }
 else
 {
	 header('location:./login.php');
     
	 
 }

  exit();

?>