<?php   session_start(); ?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
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
<script language="javascript" src="js/paging.js" type="text/javascript"> </script>
<script language="javascript" src="js/loanApplication.js" type="text/javascript"> </script>
<script language="javascript" src="js/common.js" type="text/javascript"> </script><script language="javascript" src="js/jquery-1.6.2.min.js" type="text/javascript"></script><script language="javascript" src="js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script><link type="text/css" href="css/cupertino/jquery-ui-1.8.16.custom.css" rel="stylesheet">

<script type="text/javascript">
				$(function()			{			$( "#datepicker1" ).datepicker({			changeMonth: true,			changeYear: true,			yearRange:"c-10:c+10",			dateFormat: "dd-mm-yy",			beforeShowDay: function(date){ return [date.getDay() != 0, '']; }		    });						});
</script>

<script type="text/javascript"> 
        $(function () { 
            $('input:radio[id$=AppStep1]').click(function () { 
                if (this.checked) { 
                    $('div[id$=Applicantpanel]').show('slow'); 
                } 
                else { 
                    $('div[id$=Applicantpanel]').hide('slow'); 
                } 
            });   
        }); 
     
    </script> 
    

<style type="text/css">
.auto-style2 {
	background-image: url('js/images/rtoutline.jpg');
}
.auto-style3 {
	margin-left: 2px;
	margin-bottom: 2px;
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
	<form id="Form" action="Send_PDCheckDetails.php" autocomplete="off" enctype="multipart/form-data" method="post" name="Form" onsubmit="return validatePDCCheckDetailForm(this)" style="height: 100%;">
				<?php include('./common/common_mainmenu.php'); ?>
					<!-- #BeginEditable "Content" -->
					<?php					
					//database connection
	include('./connection.php');

        
        
         if(($_SESSION['usertype'] == 'Employee') || ($_SESSION['usertype'] == 'Partner'))
            {            			 
            $reference_id=$_SESSION['AppID'];
            //$email=$_POST[''];
            }
            else 
            {
            $reference_id=$_SESSION['id'];
            $email = $_SESSION['email'];
            }
    $PrevPresenDate="";	
	$select_query="select * from pdcheck_details where reference_id='$reference_id' order by presentationdate asc";
	$select_record=mysql_query($select_query);
	//echo($select_query);
	 while($row = @mysql_fetch_assoc($select_record))
                {
                    $PrevPresenDate=$row["presentationdate"];
                }
               
	
	$select_query1="Select * from student_details where reference_id='$reference_id'";
    
    $select_record1=mysql_query($select_query1);
	 while($row1 = @mysql_fetch_assoc($select_record1))
                {
                    $AppDate=$row1["app_date"];
                }

   if($PrevPresenDate !="")
	{
	 //echo($PrevPresenDate);
	 $originaldate=  $PrevPresenDate;
	 $Presentdate=add_date($originaldate,1);  
	 //echo($Presentdate);
	}
	else
	{		
	// echo($AppDate);
	 $Presentdate=add_date($AppDate,1);
	// echo($Presentdate);
	}
?>

<?php
function add_date($originaldate,$mth){
  $cd = strtotime($originaldate);
  $retDAY = date('Y-m-d', mktime(0,0,0,date('m',$cd)+$mth,'11',date('Y',$cd)));
  $weekday = date('l', strtotime($retDAY));

 if($weekday=='Sunday')
 {
  $retDAY = date('Y-m-d', mktime(0,0,0,date('m',$cd)+$mth,'12',date('Y',$cd)));
 }
  
  return $retDAY;
   }
?>  
					<table align="center">
					<tr><td height="20" colspan="2"></td></tr>
								<tr>
									<td class="heading" colspan="2"> 
									PDC Check Details</td>
								</tr>
								<tr><td height="10">Reference ID</td>
								<td height="10"><input id="refid" name="refid" size="20" type="text" readonly="readonly"
                                                               value="<?php echo $reference_id; ?>">
                                                               </td></tr>
								<tr><td height="10">Payment Type</td>
								<td height="10"><select id="payType" name="payType" size="1" onchange="return onSelectedIndexChangeCheque(this,'checkNo','bankname','branchname','ifsccode','branchadd')">
							<option>Select</option>
						    <option>Cheque</option>														<option>ECS</option>							<option>DDM</option>							<option>SI</option>							<option>Cash</option>							</select></td></tr>
								<tr><td height="10">Amount</td>
								<td height="10"><input maxlength="6" name="amount" id="amount" type="text"></td></tr>
							
								
								<tr><td class="servicesText">Check No.</td>
									<td class="servicesText">
									
									<input maxlength="8" name="checkNo" id="checkNo" type="text" disabled="disabled"></td></tr>
								<tr><td style="height: 17px">
									Bank Name</td><td style="height: 17px">
									<input maxlength="50" name="bankname" id="bankname" type="text" disabled="disabled"></td></tr>
								<tr><td>
									Branch Name</td><td>
									<input maxlength="50" name="branchname" id="branchname" type="text" disabled="disabled"></td></tr>
								<tr><td>
									IFSC Code</td><td>
									<input maxlength="10" name="ifsccode" id="ifsccode" type="text" disabled="disabled"></td></tr>
								<tr><td>
									Branch Location</td><td>
									<input maxlength="50" name="branchadd" id="branchadd" type="text" disabled="disabled"></td></tr>
								
								
									</td>
									</tr>
								<tr><td style="height: 26px">
									Presentation Date</td>
									
									<td style="height: 26px">
									<input id="datepicker1" name="datepicker1" size="50" type="text" style="width:129px" value=<?php 									
									// get the last added payment date 
									// if first one for application - disbursement 
									// Add + one month - "11/8/2012" - 11th 
									// then check if sunday - add one day - 
                                    $newdate=date("d-m-Y",strtotime($Presentdate));
                                                             echo "$newdate";

								?>	>
							    </td></tr>
								<tr><td>
									Presentation Status</td><td>
									<input maxlength="50" name="PresentationStatus" id="PresentationStatus" type="text"></td></tr>
								<tr><td>
									Clearing Status</td><td>
									<input maxlength="50" name="ClearingStatus" id="ClearingStatus" type="text"></td></tr>
								<tr><td>
									Upload Image</td><td>
								<input type="file"  name="file" id="file" size="42" ></td></tr>
								<tr><td>
									&nbsp;</td><td>
									&nbsp;</td></tr>
								<tr><td height="10" colspan="2"></td></tr>
								<tr>
									<td align="center" colspan="2">
									<input name="submit" type="submit" value="Submit" >
                                                                        <?php if(($_SESSION['usertype'] == 'Employee') || ($_SESSION['usertype'] == 'Partner')){ ?>
                                                                        <input name="btnBack" type="button" value="Back" onclick="history.back(-1)"></input> <?php } ?></td>
								</tr>
								<tr><td height="10" colspan="2"></td>
                                                                </tr>
                                                                <tr><td colspan="2">
                                     <input type="hidden" name="no" value="<?php if(($_SESSION['usertype'] == 'Employee') || ($_SESSION['usertype'] == 'Partner'))
                                                                {  echo $_POST['myradio']; } else{ } ?>"></input>
                                                                    </td></tr>
							</table>
							
									<div id="pageNavPosition" align="center"> </div>

					<!-- #EndEditable -->
					<table border="0" cellpadding="0" cellspacing="0" width="978">
						<tr>
							<td class="line" colspan="2" height="1">
							<img alt="" height="1" src="js/images/pixel.gif" width="1"></td>
						</tr>
						<tr class="bgfooter">
							<td colspan="1" height="25" width="22">
							<img alt="" height="1" src="js/images/pixel.gif" width="22"></td>
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
							<img alt="" height="1" src="js/images/pixel.gif" width="1"></td>
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
					<td background="js/images/rtoutline.jpg" class="rtbgborder" width="12px">
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

<!-- #EndTemplate -->

</html>
