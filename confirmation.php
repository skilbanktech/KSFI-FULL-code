<?php



// Passkey that got from link 
$passkey=$_GET['passkey'];

   include('./connection.php');
   include('common/class_Common.php');
						  
   $val=new Common();
   
   $conf_code =$val ->getdecryptedcode($passkey);

  

//check confirmation code is same as passkey
if($conf_code==$passkey)
{
	
	 //to send the information into the database
    $select_query="Select user_id,firstname,lastname,username,usertype,password,location,role,mobile from login_details where role='Admin'";
    $select_record=mysql_query($select_query);
    //echo $select_query;
    $inforow= mysql_fetch_row($select_record);

    if($inforow)
    {   
        $infocol = array('user_id','firstname','lastname','username','usertype','password','location','role','mobile');
        $loggedinfo = array_combine($infocol,$inforow); 
        }

    if((mysql_num_rows($select_record)!=0))
    {	

        session_start();
        // put in session 
		$_SESSION['user_id']=$loggedinfo['user_id'];
        $_SESSION['firstname'] = $loggedinfo['firstname'];
        $_SESSION['usertype'] = trim($loggedinfo['usertype']);
        $curr_role=	trim($loggedinfo['role']);
		 
		$_SESSION['Currentrole']="'".$curr_role."'";
        $_SESSION['internal_email'] = $loggedinfo['username'];
        $mail=explode("@",$loggedinfo['username']);

        $_SESSION['name'] = $mail[0];
	}
	
	
	  header('Location:./ViewUserDetails.php?confid='.$conf_code);
	     exit;

}
else
{
	
		header('Location:./intlogin.php?Role=Employee');
		    exit;
			
}

?>