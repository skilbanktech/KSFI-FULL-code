<?php
    ob_start();
    session_start();
    include('connection.php');
    //$docid = $_POST['mydoc'];
	
	$docid = $_GET['mydoc'];
	
  //decode
	$docid  = base64_decode(strtr($docid , '-_', '+*'));
 
         
         $deletedocupload="delete from document_details where doc_id='$docid'";
         $run_deldocupload=mysql_query($deletedocupload);
         $Msg = 22;
         header("Location:AppStatusDetails.php?Msg=".$Msg);
         
mysql_close($con);
ob_flush();

?>