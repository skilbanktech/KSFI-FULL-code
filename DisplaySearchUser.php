<?php session_start();

 if(isset($_SESSION['internal_email']))
    {



?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml">

<!-- #BeginTemplate "webtemplate.dwt" -->

<head id="Head">
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
<link id="KSFSkin" href="css/skin.css" rel="stylesheet" type="text/css" />
<link id="KSFSkin" href="css/ksfi.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="js/contactus.js" type="text/javascript"> </script>
<script language="javascript" src="js/paging.js" type="text/javascript"> </script>
<style type="text/css">
.auto-style2 {
	background-image: url('images/rtoutline.jpg');
}
.auto-style3 {
	margin-left: 2px;
	margin-bottom: 2px;
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

<body id="Body">

<noscript></noscript>
<div align="center">
	<form id="Form"  autocomplete="off" enctype="multipart/form-data" method="post" name="Form" style="height: 100%;">
		<?php include('./common/common_mainmenu.php'); ?>
					<!-- #BeginEditable "Content" -->
					<table width="100%"><tbody><tr><td height="20" class="heading" >User Search Result</td></tr></tbody></table>
					
					

					<table id="box-table-a" align="center" border="1" cellpadding="3" cellspacing="3" style="width: 570px; height: 24px; ">
					<thead>
					
					

					<tr>
						<th class="formHeader">Select</th>
						<th class="formHeader">User ID</th>
						<th class="formHeader">First Name</th>
						<th class="formHeader">Email</th>
						<th class="formHeader" style="width: 85px">Location</th>
						<th class="formHeader" style="width: 85px">Role</th>
                        <th class="formHeader" style="width: 85px">Mobile</th>
												</tr></thead>
	<?php
	
	

	//session_start();
	
	

			//$user_id =$_POST['userID'];
			$firstname = $_POST['firstname'];
			
			

			$username= $_POST['email'];
			$location = $_POST['country'];
			$role = $_POST['cmbUsertype'];
			$mobile = $_POST['mobile'];
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
                $select_query="select * from login_details where firstname like'%".$firstname."%' and username like '%".$username."%' and location like '%".$location."%' 
                        and role like '%".$role."%' and mobile like '%".$mobile."%'";

            //  echo $select_query;
		//}
				
				

				

		$select_record=mysql_query($select_query);
			//$select_Row=mysql_fetch_row($select_record);
			while ($row = @mysql_fetch_assoc($select_record) ) {
						
						

	      print '<tr>'
	       .'<td><input type="radio" name="myradio" value="'.$row['user_id'].'" id="'. $row['user_id'].'"
	        onclick="SearchEnableRadio(this)"></td>'
	       
	       

			.'<td>'. $row['user_id'] .'</td>'	
			.'<td>'. $row['firstname'] .'</td>'
			.'<td>'. $row['username'] .'</td>'				
			.'<td>'. $row['location'] .'</td>'
			.'<td>'. $row['role'] .'</td>'
            .'<td>'. $row['mobile'] .'</td>'; 				      
			     print '</tr>';	     
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
                                 
                                 

                            			               <input type='submit' name="btnApplication" disabled="disabled"
                           value='View User'  onclick="setaction('ViewUserDetails.php');"></input>                          
         
         

                           <input type='submit' name="btnModify" value='Modify User' disabled="disabled" onclick="setaction('ModifyUserDetail.php');"></input>                       
                             
                   
                              
                   

                              

			</td>
                        </tr>
			<tr><td height="50"></td></tr></tbody></table>
<!-- #EndEditable -->
			
			

					<table border="0" cellpadding="0" cellspacing="0" width="978">
						<tbody>
						<tr>
							<td class="line" colspan="2" height="1">
							<img alt="" height="1" src="images/pixel.gif" width="1" /></td>
						</tr>
						<tr class="bgfooter">
							<td colspan="1" height="25" width="22">
							<img alt="" height="1" src="images/pixel.gif" width="22" /></td>
							<td id="dnn_BottomPane" align="left" class="footer" nowrap="nowrap">
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tbody>
								<tr>
									<td align="left" class="normal">
									<a class="Normal" href="disclaimer.html" target="_self">
									Disclaimer</a>&nbsp;&nbsp; |&nbsp;&nbsp;
									<a class="Normal" href="privacypolicy.html" target="_self">
									Privacy Policy</a></td>
								</tr>
							</tbody>
							</table>
							</td>
						</tr>
						<tr>
							<td class="line" colspan="2" height="1">
							<img alt="" height="1" src="images/pixel.gif" width="1" /></td>
						</tr>
					</tbody>
					</table>
					
					

					<table border="0" cellpadding="0" cellspacing="0" width="978">
						<tbody>
						<tr>
							<td height="20px" width="27px"></td>
							<td align="left" class="footer">
							<div class="skinfooter"> Copyright &copy; 2011 KSFi Pvt Ltd.</div>
							</td>
						</tr>
					</tbody>
					</table>
					</td>
					<td background="images/rtoutline.jpg" class="rtbgborder" width="12px">
					</td>
				</tr>
			</tbody>
			</table>
		</div>
	</form>
</div>
<script type="text/javascript"><!--
    var pager = new Pager('box-table-a',10); 
    pager.init(); 
    pager.showPageNav('pager', 'pageNavPosition'); 
    pager.showPage(1);
//--></script>
</body>

<!-- #EndTemplate -->

</html>

<?php }  else { 	header("Location: ./intLogin.php?Role=Employee");  } ?>