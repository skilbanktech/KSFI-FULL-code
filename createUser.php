<?php 
session_start();

 if (isset($_SESSION['usertype']))
 {
 
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
<script language="javascript" src="js/loanApplication.js" type="text/javascript"> </script>
<script language="javascript" src="js/copy_state.js" type="text/javascript"> </script>
<script language="javascript" src="js/contactus.js" type="text/javascript"> </script>
<script language="javascript" src="js/common.js" type="text/javascript"> </script>

<script language="javascript" type="text/javascript">
function  AddList(list,text)
{
 var list =document.getElementById(list);
 var selectCity=document.getElementById(text)
 
 var li =document.createElement("option");
 li.id = selectCity.value;
 li.value=selectCity.value;
 li.innerHTML=selectCity.value;
 list.appendChild(li);
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
</style>
</head>

<body id="Body">

<noscript></noscript>
<div align="center">
	<form id="Form" action="send_createUser.php" autocomplete="off" enctype="multipart/form-data" method="post" name="Form" onsubmit="return validateInternalLoginFormOnSubmit(this)" style="height: 100%;">
			<?php include('./common/common_mainmenu.php'); ?>
					<!-- #BeginEditable "Content" -->
					<?php
					include('./connection.php');
					
					$query="select distinct usertype from roles";
                    $record=mysql_query($query);
                    // echo  $query;
                   $UserType="";
                   
                   while($row1 = @mysql_fetch_assoc($record))
                   {
                    $UserTyp=$row1["usertype"];
                    $UserType.="<OPTION VALUE=\"$UserTyp\">".$UserTyp;
                   }
				 ?>
					<table align="center">
								<tr><td height="50"></td></tr>
								<tr>
									<td class="heading" colspan="3">Login Details</td></tr>
								<tr>
									<td>UserType</td>
									<td>:</td>
									<td>
									<select id="cmbUser" name="cmbUser"  size="1" onchange="PopulateRoles(this,'cmbUsertype')">
	                                <option>Select</option><?php echo $UserType?> </select></td>

										</tr>
								<tr>
									<td>Role</td>
									<td>:</td>
									<td>
									<select name="cmbUsertype" id="cmbUsertype" >
									<option>Select</option></select></td>
								</tr>
								<tr>
									<td>First/Company Name</td>
									<td>:</td>
									<td>
									<input name="firstname" size="40" type="text"></td>
								</tr>
								<tr>
									<td>Last Name</td>
									<td>:</td>
									<td>
									<input name="lastname" size="40" type="text"></td>
								</tr>
                                                               
                                                             <!--   <tr>
							<td>Location</td>
							<td>:</td>
							<td>
							<select id="countrySelect"   name="country"  size="1">
							</select><script type="text/javascript">initCountry('','countrySelect','','');</script></td>
                                                        </tr> -->
                            <tr>
							<td>State</td>
							<td>:</td>
							<td>
							<select id="countrySelect"  name="country" onchange="populateState('countrySelect','stateSelect'); populateCity('countrySelect','citySelect')" size="1">
							</select></td>
						</tr>
						<tr>
							<td>District</td>
							<td>:</td>
							<td><select id="stateSelect"  name="state" size="1">
							</select><script type="text/javascript">initCountry('','countrySelect','stateSelect','citySelect');</script>
							</td>
						</tr>
						<tr>
							<td>City</td>
							<td>:</td>
							<td><select id="citySelect"  name="city" size="1" onchange="EnabledCityList('btnAdd')">
							</select>
							<script type="text/javascript">initCountry('','countrySelect','stateSelect','citySelect');</script>
							<input name="btnAdd" type="button" id="btnAdd" value="ADD" onclick="AddList('listofcity','citySelect')" disabled="disabled"></td>
						</tr>

                                                               
                                                                                                              <tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>																		
                                                        <select multiple="multiple" name="listofcity" id="listofcity"> </select>
									</td>
								</tr>

                                                               
                                                                <tr>
									<td>Mobile</td>
									<td>:</td>
									<td>
									<input name="mobile" size="40" maxlength="10" type="text"></td>
								</tr>

								<tr>
									<td>Email</td>
									<td>:</td>
									<td>
									<input name="email" size="40" type="text"></td>
								</tr>
								<tr>
									<td>Password</td>
									<td>:</td>
									<td>
									<input name="password" size="40" type="password"></td>
								</tr>
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

<?php }  else {   header("Location: ./index.php");       } ?>
