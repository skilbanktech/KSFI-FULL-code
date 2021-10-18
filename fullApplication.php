<?php
session_start();

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

<link id="KSFSkin" href="css/ksfi.css" rel="stylesheet" type="text/css">


<link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="./bootstrap/js/jquery.min.js"></script>
<script src="./bootstrap/js/bootstrap.min.js"></script>
<script src="./bootstrap/js/bootstrap-submenu.min.js" ></script>


<script>
$(window).load(function(){        
   $('#myModal').modal('show');
    }); 
</script>	
<style>

a.nextbutton
{

background-color: #008CBA;
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;border-radius:4px;

}

</style>
</head>

<body id="Body">

<div align="center">
	<form id="Form"  autocomplete="off" enctype="multipart/form-data" method="post" name="Form" onsubmit="return validateLoginFormOnSubmit(this)" style="height: 100%;">
		 <div align="center">


    <div align="center" class="skinwrapper">

			<table align="center" border="0" cellpadding="0" cellspacing="0" class="auto-style2" style="width: 1065px; height: 400px">

				<tr>

					<td background="images/lftoutline.jpg" class="ltbgborder" width="12px">

					</td>

					<td class="bgheader" height="98">

					<table border="0" cellpadding="0" cellspacing="0" width="978">

						<tr>

							<td height="20" style="width: 14px">

							<img alt="" height="1" src="images/pixel.gif" width="37"></td>

							<td style="width: 264px"></td>

							<td style="width: 332px">

							<img alt="" height="1" src="images/pixel.gif" width="295"></td>

							<td></td>

						</tr>

						<tr>

							<td height="78" style="width: 14px"></td>

							<td align="left" style="width: 264px" valign="top">

							<img alt="KSF Logo" src="images/img2.gif"> </td>

							<td align="right" style="width: 332px" valign="top">

							<table border="0" cellpadding="0" cellspacing="0" class="auto-style3" style="width: 120%; height: 58px">

								<tr>

									<td height="11px" style="width: 395px">

									<img alt="" height="11" src="images/pixel.gif" width="1"></td>

								</tr>

								<tr>

									<td id="dnn_topPane3" align="right" style="width: 395px" valign="top">

									<table  border="0" cellpadding="0" cellspacing="0"  width="100%">
                                      
										

									

										<tr>

										<td align="right"  valign="top" width="100%">

											<?php // Inialize session

											//session_start();

											if (!isset($_SESSION['firstname'])) { ?>

											<a class="normal" href="index.php">Login</a>

											<?php }else { echo "Welcome,  ".$_SESSION['name']; ?>&nbsp;&nbsp;|&nbsp;&nbsp;

											<a class="normal" href="logout.php">

											Logout</a>&nbsp;&nbsp;|&nbsp;&nbsp;
											<a class="normal" href="./loans">Apply for loan</a> &nbsp;&nbsp;|&nbsp;&nbsp;

											<?php 

											if ($_SESSION['usertype'] == 'student') { ?>

											<a class="normal" href="MyAccount.php">

											My Account</a>

											<?php }else { if($_SESSION['usertype']=='Agency')

											{ ?>

											<a class="normal" href="SearchforAgency.php">

											My Account</a>

											<?php }else{ ?>

											<a class="normal" href="searchStatus.php">

											My Account</a><?php }} }?>&nbsp;&nbsp;</td>

										</tr>
										
										
									</table>

									</td>

								</tr>

								<tr>

									<td height="10px" style="width: 395px">

									<img alt="" height="10" src="images/pixel.gif" width="1"></td>

								</tr>

							</table>

							</td>

							<td width="15px">

							<img alt="" height="1" src="images/pixel.gif" width="15"></td>

						</tr>

					</table>
		
		
		<table border="0" cellpadding="0" cellspacing="0" width="978" style="background-color:#99ccff">

						<tr height="15px" class="verticalmenu" >

							 <td align="center" >

									<a style="font-size:14px;font-weight:bold;color:#767676" href="downloadapplication.php">Download Application</a></td>

                                                         <td align="center">

									<a style="font-size:14px;font-weight:bold;color:#767676" href="EditApplication.php">My Application</a></td>

									<td align="center">

									<a style="font-size:14px;font-weight:bold;color:#767676" href="DocumentUpload.php">Document Center</a></td>

									<td align="center" >

								     <a style="font-size:14px;font-weight:bold;color:#767676" href="ApplicationStatus.php">My Application Status</a>    

									</td>

									<td align="center">

									<a style="font-size:14px;font-weight:bold;color:#767676" href="changePassword.php">Change Password</a>

							</td>

						</tr>
						

					</table>


        <!-- #BeginEditable "Content" -->
					
                <table align="center" border="0" style="width: 578px; height: 292px">
                        <tr>
                                <td style="height: 100px"></td>
                        </tr>
						
						
                        <tr>
                                <td class="services">Thank you for registering and 
                                applying for a loan.</td>
                        </tr>
						
				<?php  if( $_SESSION['usertype'] == 'student')
					   { ?>
                          <tr>
                                <td class="services">&nbsp;Print the filled 

                                application form and/or download the complete Application 

                                Form from download application section and submit to nearest ksfi branch for faster processing.<br><br>



                                </td>
                        </tr>
                
                        <tr>
                                <td align="center">
                                <!---<input id="submit" name="submit" type="submit" value="Submit" disabled="true" 
                                    <?php if($_SESSION['usertype'] == 'student'){ ?> 
                                                    onclick="setaction('MyAccount.php');" <?php  } 
                                          else {  $Msg = 14;
                                                //$Msg ="New Record Added.";
                                                  header("Location: ./AppStatusDetails.php?Msg=".$Msg); 
                                                } ?> >--->
                               <input name="btnPrint" id="btnPrint" type='submit' value="Print Application"  onclick="setaction('ViewAplication.php');">
                                <input id="cancel" onclick="setaction('MyAccount.php');" name="cancel" type='submit' value="Cancel"></td>
                        </tr>
					   <?php } ?>
                        <tr>
                                <td height="100"></td>
                        </tr>
                </table>
				<div id="myModal" class="modal" role="dialog" >
  <div class="modal-dialog" style="background-color:black">
    <!-- Modal content-->
    <div class="modal-content" >
     
        <button type="button" class="close" data-dismiss="modal">&times;</button>
       
    
     <div class="modal-body" >
	  <div align="center">
	  <h4>Thank You.</h4>
	
			You have registered successfully.<br><br>
			
			Do you want to upload the KYC documents now<br><br>
			<a href="upload_documents.php" class="nextbutton" >Yes</button>
			<a href=""  class="nextbutton" data-dismiss="modal">No,I will upload later</a>
       
			
           
					   
	  </div><br/>
	  </div>
	  </div>
	  </div>
	  
	  </div>

	    <table border="0" cellpadding="0" cellspacing="0" width="978">

                <tr>

                        <td class="line" colspan="2" height="1">

                        <img alt="" height="1" src="images/pixel.gif" width="1"></td>

                </tr>

                <tr class="bgfooter">

                        <td colspan="1" height="25" width="22">

                        <img alt="" height="1" src="images/pixel.gif" width="22"></td>

                        <td id="dnn_BottomPane" align="left" class="footer" nowrap="nowrap">

                        <table border="0" cellpadding="0" cellspacing="0" width="100%">

                                <tr>

                                        <td align="left" class="normal">

                                        <a class="Normal" href="disclaimer.html" target="_self">

                                        Disclaimer</a>&nbsp;&nbsp; |&nbsp;&nbsp;

                                        <a class="Normal" href="privacypolicy.html" target="_self">

                                        Privacy Policy</a></td>

                                </tr>

                        </table>

                        </td>

                </tr>

                <tr>

                        <td class="line" colspan="2" height="1">

                        <img alt="" height="1" src="images/pixel.gif" width="1"></td>

                </tr>

        </table>

					

                <table border="0" cellpadding="0" cellspacing="0" width="978">

                        <tr>

                                <td height="20px" width="27px"></td>

                                <td align="left" class="footer">

                                <div class="skinfooter"> Copyright &copy; 2011 KSFi Pvt Ltd.</div>

                                </td>

                        </tr>

                </table>

                </td>

                <td background="images/rtoutline.jpg" class="rtbgborder" width="12px">

                </td>

        </tr>

</table>

		</div>
		

	</form>
	
	

</div>



</body>



</html>
		
					
					

	