<?php 
session_start();

?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">



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



<link type="text/css" href="css/cupertino/jquery-ui-1.8.16.custom.css" rel="stylesheet" >



<script language="javascript" src="js/contactus.js" type="text/javascript"> </script>



<script language="javascript" src="js/jquery-1.6.2.min.js" type="text/javascript"></script>

<script language="javascript" src="js/loanApplication.js" type="text/javascript">

 </script>

<script language="javascript" src="js/jquery-ui-1.8.16.custom.min.js" type="text/javascript">



 </script>


<script>

function enableSelectOptions(fld,fld1,fld2)
{

document.getElementById(fld).disabled = false;
document.getElementById(fld1).disabled = true;
document.getElementById(fld2).disabled = true;
}

function formvalidation(theform)

{
var  typeofsearch = theform.typeofsearch.selectedIndex;

var  selecteddaystype = theform.daystype.value;

if(selecteddaystype!='')
{
 
 var days= document.getElementById(selecteddaystype).selectedIndex;
}
	if(typeofsearch==0)
	{
         alert("You din't select search type.");
		 
		 return false;
	}
	if(selecteddaystype =='')
	{
         alert("You din't select from date.");
		 
		 return false;
	}
	
	if(days==0)
	{
	  alert("You din't select " +selecteddaystype);
		 
		 return false;
	
	}
	
   return true;
}
</script>


</head>







<body id="Body">







<noscript></noscript>



<div align="center">



	<form id="searchStatus" action="Send_modifysearchdates.php" autocomplete="off" enctype="multipart/form-data" method="post" name="Form" onsubmit="return formvalidation(this)" style="height: 100%;">



			<?php include('./common/common_mainmenu.php'); ?>



					<!-- #BeginEditable "Content" -->



					<table align="center">



								<tr><td height="50"></td></tr>



								<tr>



									<td class="heading" colspan="3">Modify Search From Date</td>
									<tr><td height="12"></td></tr>


                                       <tr>



									<td>Select Search page</td>



									<td>:</td>
									
									
									<td>
									
								
									   <select name="typeofsearch">
									   
									   <option>Select</option>
									   <option>Search Loan Applications</option>
									   <option>Search Disbursed Loans</option>
									   <option>Search Initiate Verification</option>
									   <option>Search Contact Details</option>
									   <option>Search Leads</option>
									   </select>
									 </td>
									
									
									</tr>

                                                                          <tr>



									<td>Select Form Date</td>



									<td>:</td>



									<td><input  type="radio" name="daystype" value="days"
									onclick="enableSelectOptions('days','weeks','months')">
										<select name="days" id="days" disabled="disabled">
										<option>Days</option>
										<script>
											filldropdown_numbers('days', 1,10);
											
											 </script>
										</select>
										<input type="radio" name="daystype" value="weeks" 
										onclick="enableSelectOptions('weeks','months','days')">
									    <select id="weeks" name="weeks" disabled="disabled" >
										<option>Weeks</option>
										<script>
											filldropdown_numbers('weeks', 1,4);
											
											 </script>
										</select>
										<input type="radio" name="daystype" value="months"
										onclick="enableSelectOptions('months','days','weeks')">
									    <select id="months" name="months" disabled="disabled">
										<option>Months</option>
										<script>
											filldropdown_numbers('months', 1,10);
											
											 </script>
										</select>
									</td>



								</tr>



                              


                               <tr><td height="12"></td></tr>
							

								<tr>



									<td align="center" colspan="3">



									<input name="submit" type="submit" value="Submit"></td>



								</tr>



								<tr><td height="50"></td></tr>



							</table>



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



