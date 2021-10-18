<?php
session_start();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml">

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
<script language="javascript" src="js/paging.js" type="text/javascript"> </script>
<script language="javascript" src="js/common.js" type="text/javascript"> </script>


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
<script>
function validatesecondEmail(fld)
{
   var error = "";
   if(fld.checked === true) {
   Form.semail.readOnly=false;
   }
   else
   {
	Form.semail.readOnly=true;
   }
   return error; 
}
</script>

</head>

<body id="Body">
<form id="Form" action="send_AppStatus.php" autocomplete="off" enctype="multipart/form-data" method="post" name="Form" onsubmit="return validateStatusForm(this)" >
<?php  include('./common/common_mainmenu.php'); 

//sub-menu
include('./common/common_submenu.php');

		

//database connection
	include('./connection.php');
if(($_SESSION['usertype'] == 'Employee') || ($_SESSION['usertype'] == 'Partner'))
{
$reference_id=$_SESSION['AppID'];
$_SESSION['id']=$reference_id;
$email = $_SESSION['internal_email'];
}
else 
{
$reference_id=$_SESSION['id'];
$email = $_SESSION['email'];
}

	$squery =  "SELECT * FROM loanstatus where reference_id='".$reference_id."' order by updation_date desc";
	$sresult =  mysql_query($squery);
/*
	$row= mysql_fetch_row($sresult);
if	($row)
{
	$col = array('reference_id','updation_date','username','internal_email','status','comments');

	$comb = array_combine($col,$row);
}
*/
      $querydis =  "SELECT * FROM loanstatus where reference_id='".$reference_id."' and status='Loan Disbursed' order by updation_date desc";
      
     // echo $querydis;
	$resultdis =  mysql_query($querydis);  
        
        $row= mysql_fetch_row($resultdis);
        if($row)
        {
        $col = array('reference_id','updation_date','username','internal_email','status','comments');

	$comb = array_combine($col,$row);
        }     
?>

					<table align="center" style="width: 555px; height: 225px">
                                            <tr><td><div id="appstatus_panel">
<table align="center" style="width: 555px; height: 225px">
								<tr><td height="20" style="width: 180px"></td></tr>
								<tr>
								<td class="heading" colspan="3">Application Status</td>
								</tr>
								<tr>
								<td colspan="3" align="center">
								 <table>
								 <tr>
								<td style="width: 180px">Reference ID</td>
									<td>:</td>
									<td >
									<input name="referenceID" size="40" readonly="readonly" type="text" value="<?php echo $_SESSION['id']; ?>" style="width: 350px" ></td>
								</tr>
								<tr>
									<td style="width: 180px">Name</td>
									<td>:</td>
									<td>
									<input name="firstname" size="40" type="text" readonly="readonly"  value="<?php echo $_SESSION['firstname']; ?>" style="width: 350px" ></td>
								</tr>

								<tr>
									<td style="width: 180px">Email</td>
									<td>:</td>
									<td>
									<input name="internal_email" size="40" type="text" readonly="readonly"  value="<?php echo $email; ?>" style="width: 350px" ></td>
								</tr>
								<tr>
									<td style="width: 180px">Status</td>
									<td>:</td>
									<td>
									<?php
									if ($_SESSION['usertype'] == 'student' || $_SESSION['usertype'] == 'Partner')
									{
									$msgrArr = array();	
									$msgrArr[] = "Need Information";	
									$msgrArr[] = "Comments";			
									}
									 else
									 {
									$msgrArr = array();	
									$msgrArr[] = "Need Information";	
									$msgrArr[] = "Partial File Received";	
									$msgrArr[] = "Pending Documents";
									$msgrArr[] = "Pending Verification";	
									$msgrArr[] = "Declined by Customer";	
									$msgrArr[] = "Declined by KSFi";	
									$msgrArr[] = "Need Information";	
									$msgrArr[] = "Loan Approved";	
									$msgrArr[] = "Loan Disbursed";	
									 }
									 if($row)
									 {
									  echo "<select name=\"status\" id=\"status\" disabled=disabled>\n"; 
									 echo "<option>Loan Disbursed</option>";
									 echo "</select>";
									 }
									 else{
									 echo "<select name=\"status\" id=\"status\">\n";
									 for($i=0; $i < count($msgrArr); $i++)  
									 echo "<option value=\"". $msgrArr [$i]."\">" . $msgrArr [$i] . "</option>";
									 echo "</select>"; 
									 }
									 ?>
									</td>
									<!--<input name="status" value="<?php if($row) { echo $comb['status']; } ?>" style="width: 350px" size="40" type="text" ></td>-->
								</tr>
								<tr>
									<td style="width: 180px">Comments</td>
									<td>:</td>
									<td>
									<textarea name="comments"   rows="4"  style="width: 349px"></textarea></td>
								</tr>
                                                                
                                                            <?php    if ($_SESSION['usertype'] == 'Employee') { ?>
                                                                <tr><td>
                                                                    <input  name="sendemail"  type="checkbox" onchange="validateCCEmail(this)"  >
                                                                    To Send Email</td><td>:</td>
                                                                    <td><input id="oemail" name="oemail" size="40" type="text"  readonly="readonly" ></td>
                                                                </tr>
                                                               
															    <tr><td>
                                                                    <input  name="secondemail"  type="checkbox" onchange="validatesecondEmail(this)" readOnly="readonly" >
                                                                    Add second Email</td><td>:</td>
                                                                    <td><input id="semail" name="semail" size="40" type="text"  readonly="readonly" ></td>
                                                                </tr>
                                                               
                                                                <?php } ?>
                                                                
                                                                
                                                                
                                                                
								<tr>
									<td align="center" colspan="3">
									<input name="submit" type="submit" value="Add Status">
                                                                       
                                                                       </td>
								</tr>
                                                                </table></td></tr>
								 </table>
								 </div>
								</td>
								</tr>
									
								<tr><td height="20" colspan="3"></td></tr>

								<tr>
									<td class="heading" colspan="3">Application Status History</td>
									
								<tr>
									<td colspan="3" align="center">
									<table id="box-table-a" class="auto-style4" style="width: 938px">
									<thead>
									<tr>
									<th  width="150px"> Date</th>
									<th  width="100px"> Updated By</th>
									<th style="width: 258px"> Status</th>
									<th  width="700px"> Comments</th>
									</tr>
							
									<?php
										
		while ($row = mysql_fetch_array($sresult) ) {
	      print '<tr>'
        .'<td>'. $row['updation_date'] .'</td>'	
		.'<td>'. $row['username'].' - '. $row['internal_email'] .'</td>'
		.'<td>'. $row['status'] .'</td>'				
        .'<td>'. $row['comments'].'</td>'
        .'</tr>';
        }	
        ?>			
										</thead>
                                                                                <tr>
                                                                                    <td align="center" colspan="6">
                                                             <?php if(($_SESSION['usertype'] == 'Employee') || ($_SESSION['usertype'] == 'Partner')){ ?>
															
			
			                                                <a href="DisplaySearchResult.php"><input name="btnBack" type="button" value="Back to Search Results " /></a> 
			
		                      	
                                                                <input name="btnBack" type="button" value="Back" onclick="history.back(-1)" /><?php } ?></td>
                                                                                </tr>
									</table>
									<div id="pageNavPosition" align="center"> </div>

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
			</td>
			</tr>
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

</html>
