<?phpsession_start();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">



<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml">







<!-- #BeginTemplate "webtemplate.dwt" -->







<head id="Head">



<meta content="First Education Loans in India, Fast Education Loans" name="description">



<meta content="Financial Consultancy, Education Loans" name="keywords">



<meta content="&amp;copy; 2011 KSFi Ltd." name="COPYRIGHT">



<meta content="KSFi Ltd" name="AUTHOR">



<meta content="DOCUMENT" name="RESOURCE-TYPE">



<meta content="GLOBAL" name="DISTRIBUTION">



<meta content="INDEX, FOLLOW" name="ROBOTS">



<meta content="1 DAYS" name="REVISIT-AFTER">



<meta content="GENERAL" name="RATING">



<meta content="RevealTrans(Duration=0,Transition=1)" http-equiv="PAGE-ENTER">



<title>Education Loans KSF Pvt Ltd.</title>



<link id="KSFSkin" href="css/skin.css" rel="stylesheet" type="text/css">



<link id="KSFSkin" href="css/ksfi.css" rel="stylesheet" type="text/css">



<script language="javascript" src="js/contactus.js" type="text/javascript"> </script>







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







<body id="Body">







<noscript></noscript>



<div align="center">



	<form id="Form" action="send_login.php" autocomplete="off" enctype="multipart/form-data" method="post" name="Form" onsubmit="return validateLoginFormOnSubmit(this)" >
 <?php  include('./common/common_mainmenu.php'); //sub-menuif((isset($_SESSION['AppID']))&&($_SESSION['AppID']!='')){include('./common/common_submenu.php'); }?>						 
					<!-- #BeginEditable "Content" -->

					<table align="center"><tr><td height="300"><b>

					<?php
                
					$Msg = $_GET['Msg'];
               
					if($Msg == 0)

					{

					echo "Application Status updation failed.";

					}

					else if($Msg == 1)

					{

					echo "Application Status successfully updated.";

					}

					else if($Msg == 2)

					{

					echo "Document successfully sent.<a href='DocumentUpload.php' style='color:#0080ff'>Click here to check the uploaded documents</a>";

					}

					else if($Msg == 3)

					{

					echo "Document sending failed.";

					}

					else if($Msg == 4)

					{

					echo "Due to some technical problem we are unable to process the request.Please try after sometime.\n

Contact us on mail @ customerservice@ksfi.co.in or phone: 022 65932385";

							

							



					}

					else if($Msg == 5)

					{

					echo "You have already applied for loan.Please write to loan@ksfi.co.in to know the status of your loan application.";

					}

                    else if($Msg == 6)

					{
                                        // echo "Leads Assign to Partner successfully.";   -------// change to "Account manager assigned"
                                        echo "Account manager assigned";
					}
					  else if($Msg == 7)
                    {
                    echo "Payment Detail save successfully.";
                    }
                      else if($Msg == 8)
                    {
                    echo "Payment Detail saving failed.";
                    }
                    
                    

                      else if($Msg == 9)
                    {
                    echo "Payment Detail Update successfully.";
                    }
                      else if($Msg == 10)
                    {
                    echo "Payment Detail Updation failed.";
                    }
                    
                    

                      else if($Msg == 11)
                    {
                    echo "Mail Send successfully.";
                    }
                      else if($Msg == 12)
                    {
                    echo "Mail Sending failed.";
                    }
                      else if($Msg == 13)
                    {
                    echo "User Detail Update successfully.";
                    }  
                    else if($Msg == 14)
                    {
                    echo "Added successfully.";
                    } 
                    else if($Msg == 15)
                    {
                    echo "Updated successfully.";
                    } 
                    else if ($Msg == 16)
                    {
                        echo " Assigned successfully.";
                    }
                    else if ($Msg == 17)
                    {
                        echo "Assignment failed. Please try after sometime or contact administrator.";
                    }
                    else if ($Msg == 18)
                    {
                        echo "Service Representative assigned successfully.";
                    }
                    else if ($Msg == 19)
                    {
                        echo "Same document cannot be uploaded.";
                    }
                    else if ($Msg == 20)
                    {
                        echo "You can not upload Documents without reference Id";
                    }
                    else if ($Msg == 21)
                    {
                        echo "Data Deleted Successfully.";
                    }
                    else if ($Msg == 22)
                    {
                         echo "Document Deleted Successfully.";   
                    }
                    else if ($Msg == 23 )
                    {
                        echo "You do not have sufficient rights to perform this operation. Please contact administrator.";
                    }					else if ($Msg == 24 )                    {                        echo "You have already registered.";                    }					else if ($Msg == 25 )                    {                        echo "Activated Successfully.";                    }					else if ($Msg == 26 )                    {                        echo "Your Request sent successfully.";                    }					 else if($Msg == 27)                    {                    echo "Payment Detail save successfully.<a href='./search_PDCheckDetail.php' style='color:#0080ff'> Click here to see the payment details</a>";                    }								
 					/*  else if($Msg == 14)
                    {
                    echo "User Detail Updation failed.";
                    }
                    else if($Msg == 15)
                    {
                    echo "User Detail Updation failed.";
                    }
                    else if($Msg == 16)
                    */
                    

                    

					?></b></td></tr>
                                            <tr><td colspan="3">
                                                     <?php if(($_SESSION['usertype'] == 'Employee') || ($_SESSION['usertype'] == 'Partner')|| ($_SESSION['usertype'] == 'Agency')){ ?>
                                                                        <input name="btnBack" type="button" value="Back" onclick="history.back(-1)" /><?php } ?>
                                                </td></tr></table>

					





<!-- #EndEditable -->



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







<!-- #EndTemplate -->







</html>