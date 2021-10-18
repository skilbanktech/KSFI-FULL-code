<?php
ob_start();

 if(isset($_GET['confid']))
			{				
			   $userid=$_GET['confid'];
			}
			   else
			{
			   $userid=$_POST['myradio'];
			   
			}

include('common/class_Common.php');



$objCommon=new Common();
     include('./connection.php');
	 
	 
	 
	 
	
   $update="update login_details set activeStatus=1 where user_id=$userid";

   
      
    $select_query="Select user_id,firstname,lastname,username,usertype,password,location,role,mobile from login_details where  user_id=$userid";

    $select_record=mysql_query($select_query);
    echo $select_query;
    $inforow= mysql_fetch_row($select_record);

    if($inforow)
    {   
        $infocol = array('user_id','firstname','lastname','username','usertype','password','location','role','mobile');
        $loggedinfo = array_combine($infocol,$inforow); 
        }

   	
        
	
		$username=$loggedinfo['username'];
        $firstname = $loggedinfo['firstname'];
		$password = $loggedinfo['password'];
  
	//echo( $update);
	$add_query=mysql_query($update);
    
	// Mail of sender

		$mail_from= "partner@ksfi.co.in"; 	

        // $cc="";

		$headers = "From: ".$mail_from." <".$mail_from.">\r\n"; 	

		// Contact subject

		$subject ="KSFi  Login Details"; 	

		// Details

		$body = "";
		
	    

		$body .= "Dear ".$firstname.",\r\n";

		$body .= "Your Account has been activated.\r\n";

	    $body .=  "Your login details are:\r\n";

		$body .= "Email/Username:".$username."\r\n";

		$body .= "Password:".$password."\r\n\n";
		
		$body .=  $objCommon->getemailendmsg();
		
       
	 

		// Enter your email address

		$to = "$userid"; 

		//echo ($body);			



		if (mail($to,$subject,$body,$headers))

		{
		
		
		 $mail_status="success";
		
		
		}	
      

        $Msg = 25;
		header("Location: ./AppStatusDetails.php?Msg=".$Msg);
	
ob_flush();
mysql_close($con);

?>