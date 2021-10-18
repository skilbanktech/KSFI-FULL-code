<?php session_start();

 if(isset($_SESSION['internal_email']))
    {
		
		?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml">

<!-- #BeginTemplate "webtemplate.dwt" -->

<head id="Head">
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta content="First Education Loans in India, Fast Education Loans" name="description" />
<meta content="Financial Consultancy, Education Loans" name="keywords" />
<meta content="&amp;copy; 2011 KSFi Ltd." name="COPYRIGHT" />
<meta content="KSFi Ltd" name="AUTHOR" />
<meta content="DOCUMENT" name="RESOURCE-TYPE" />
<meta content="GLOBAL" name="DISTRIBUTION" />
<meta content="INDEX, FOLLOW" name="ROBOTS" />
<meta content="1 DAYS" name="REVISIT-AFTER" />
<meta content="GENERAL" name="RATING" />
<meta content="RevealTrans(Duration=0,Transition=1)" http-equiv="PAGE-ENTER" />
<title>Education Loans KSF Pvt Ltd.</title>
<link id="KSFSkin" href="css/skin.css" rel="stylesheet" type="text/css">
<link id="KSFSkin" href="css/ksfi.css" rel="stylesheet" type="text/css">

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="bootstrap/js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="bootstrap/js/bootstrap-submenu.min.js" defer></script>


<script language="javascript" src="js/contactus.js" type="text/javascript"> </script>
 <script language="javascript" src="js/common.js" type="text/javascript"> </script>
 <link type="text/css" href="css/cupertino/jquery-ui-1.8.16.custom.css" rel="stylesheet" >

<script language="javascript" src="js/jquery-1.6.2.min.js" type="text/javascript">
 </script>

<script language="javascript" src="js/jquery-ui-1.8.16.custom.min.js" type="text/javascript">
 </script>
<script type="text/javascript">
			$(function()
			{
			$( "#fdate" ).datepicker({
			changeMonth: true,
			changeYear: true,
			maxDate:new Date(),
			yearRange:"c-100:c+1",
                        dateFormat: "yy-mm-dd"
                        
		});
		
                	$( "#tdate" ).datepicker({
			changeMonth: true,
			changeYear: true,
			maxDate:new Date(),
			yearRange:"c-100:c+1",
                        dateFormat: "yy-mm-dd"
                        
		});

			});
			
   function onclickClearall()
	
	{
	
	
	document.getElementById('fdate').value="";
	document.getElementById('tdate').value="";
	document.getElementById('location').value="";
	document.getElementById('referenceID').value="";
	document.getElementById('name').value="";
	document.getElementById('mobile').value="";
	document.getElementById('email').value="";
	
	
	
	
	}

		</script>
<style type="text/css">
.auto-style2 {
	background-image: url('images/rtoutline.jpg');
}
.auto-style3 {
	margin-left: 2px;
	margin-bottom: 2px;
}
.auto-style4 {
	margin-left: 0px;
}
.verticalmenu
{
	/*font: bold 12px arial, helvetica, sans-serif; */
	font-weight:bold;
	font-size:21px;
	background:#99CCFF;
}
.pg-normal {
                color: black;
                font-weight: normal;
                text-decoration: none;    
                cursor: pointer;    
}
.pg-selected {
                color: black;
                font-weight: bold;        
                text-decoration: underline;
                cursor: pointer;
}

</style>
</head>

 
</head>

<body id="Body">



	<form id="Form"  autocomplete="off" enctype="multipart/form-data" method="post" name="Form" style="height: 100%;">
		
<div align="center">
	<?php include('./common/bootstrap_common_mainmenu.php'); ?>

	
					<!-- #BeginEditable "Content" -->
					
			<table width="100%"><tbody><tr><td height="20" class="heading" >Partner Email details</td></tr></tbody></table>
					
					

					<table id="box-table-a" align="center" border="1" cellpadding="3" cellspacing="3" style="width: 570px; height: 24px; ">
					<thead>
					
					

					<tr>
						<th class="formHeader">Select</th>
						<th class="formHeader">Email</th>
						<th class="formHeader">New Email</th>
					
												</tr></thead>
	<?php
	
	

	//session_start();
	
	
           //database connection
			include('./connection.php');

		//to send the information into the database		
		//set the authority for roles
		$select_rolerights="select * from rolerights where role='".$_SESSION['Currentrole']."'";
		$record_roleright=mysql_query($select_rolerights);
		$createuser="";
			while ($row_rolerights = @mysql_fetch_assoc($record_roleright))
		{		 			
		 		 if($row_rolerights['rights_id']=="9")//reassign
		 		{
		 		$createuser=$row_rolerights['rights_id'];
		 		}	 					 		
		}
		   
		   

		//if($createuser!=""){
                $select_query="select * from request_useremailchange";

            //  echo $select_query;
		//}
				
				

				

		$select_record=mysql_query($select_query);
			//$select_Row=mysql_fetch_row($select_record);
			while ($row = @mysql_fetch_assoc($select_record) ) {
						
						

	      print '<tr>'
	       .'<td><input type="radio" name="myradio" value="'.$row['id'].'" id="'. $row['id'].'"
	        onclick="SearchEnableRadio(this)"></td>'
	       
	       

			.'<td>'. $row['current_email'] .'</td>'	
			.'<td>'. $row['newemail'] .'</td>
				 </tr>';	     
             }					
?>
</table>
<div id="pageNavPosition" align="center"> </div>
			<table align="center">
			<tbody>
			<tr><td height="20"></td></tr>
			<tr>
                          <!--    <td><input disabled="disabled" name="btnSubmit" type="submit" value="Submit" />
			<input name="btnBack" type="button" value="Back" onclick="location.href='searchStatus.php'" /></td> -->
                        
                        

                               <td align="center">
                                   <input type='submit' name="btnBack"
                           value='Back' onclick="setaction('searchUser.php');"></input>
						   
						   <input type='submit' name="btnChangeEmail"  disabled="disabled"
                           value='Change Email'  onclick="setaction('send_requestedemailchange.php');"></input>
                                 
                                 
                                 <input type='submit' name="btnApplication" disabled="disabled"
                           value='View User'  onclick="setaction('ViewUserDetails.php');"></input>                          
         
         

                           <input type='submit' name="btnModify" value='Modify User' disabled="disabled" onclick="setaction('ModifyUserDetail.php');"></input>                       
                             
                   
                              
                   

                              

			</td>
                        </tr>
			<tr><td height="50"></td></tr></tbody></table>
	
					<!-- #EndEditable -->
				<?php include('./common/bootstrap_commonFooter.php');?>
				
				<?php }  else { 	header("Location: ./intLogin.php?Role=Employee");  } //redirect to login page if user is logged in?>