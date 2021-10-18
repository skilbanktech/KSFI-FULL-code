<?php
ob_start();
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
<link type="text/css" href="css/cupertino/jquery-ui-1.8.16.custom.css" rel="stylesheet" >
<script language="javascript" src="js/copy_state.js" type="text/javascript"> </script>
<script language="javascript" src="js/loanApplication.js" type="text/javascript"> </script>
<script language="javascript" src="js/jquery-1.6.2.min.js" type="text/javascript">
 </script>
 <script language="javascript" src="js/common.js" type="text/javascript">
 </script>
<script language="javascript" src="js/jquery-ui-1.8.16.custom.min.js" type="text/javascript">
 </script>
		<script type="text/javascript">
			$(function()
			{
			$( "#datepicker" ).datepicker({
			changeMonth: true,
			changeYear: true,
			maxDate:new Date(),
			yearRange:"c-100:c+1",
                        dateFormat: "dd-mm-yy"
                        
	
		});
		$( "#datepicker1" ).datepicker({
			changeMonth: true,
			changeYear: true,
			maxDate:new Date(),
			yearRange:"c-100:c+1",
                        dateFormat: "dd-mm-yy"

		});
		$( "#datepicker2" ).datepicker({
			changeMonth: true,
			changeYear: true,
			minDate:new Date(),
			yearRange:"c-1:c+1",
                        dateFormat: "dd-mm-yy"
		});
		$( "#datepicker3" ).datepicker({
			changeMonth: true,
			changeYear: true,
			maxDate:new Date(),
			yearRange:"c-100:c+1",
                        dateFormat: "dd-mm-yy"
		});

			});
		</script>
		    <script type="text/javascript"> 
        $(function () { 
            $('input:checkbox[id$=chkpanel]').click(function () { 
                if (this.checked) { 
                    $('div[id$=coborrower2_panel]').show('slow'); 
                } 
                else { 
                    $('div[id$=coborrower2_panel]').hide('slow'); 
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
</style>
</head>

<body id="Body">

<div align="center">
<form id="loanApplication" action="updateApplication.php" method="post" name="loanApplication" onsubmit="return validateLoanApplicationFormOnSubmit(this,'2')"><div align="center" class="skinwrapper">

			<table align="center" border="0" cellpadding="0" cellspacing="0" class="auto-style2" style="width: 1007px; height: 400px">
				<tr>
					<td background="js/images/lftoutline.jpg" class="ltbgborder" width="12px">
					</td>
					<td class="bgheader" height="98">
					<table border="0" cellpadding="0" cellspacing="0" width="978">
						<tr>
							<td height="20" style="width: 14px">
							<img alt="" height="1" src="js/images/pixel.gif" width="37"></td>
							<td style="width: 264px"></td>
							<td style="width: 332px">
							<img alt="" height="1" src="js/images/pixel.gif" width="295"></td>
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
									<img alt="" height="11" src="js/images/pixel.gif" width="1"></td>
								</tr>
								<tr>
									<td id="dnn_topPane3" align="right" style="width: 395px" valign="top">
									<table  border="0" cellpadding="0" cellspacing="0"  width="100%">
										<tr>
											<td align="right">
											&nbsp;&nbsp;
											<a class="normal" href="index.php">Home</a>&nbsp;&nbsp; 
											|&nbsp;&nbsp;
											<a class="Normal" href="contactus.php">
											Contact Us</a>&nbsp;&nbsp; |&nbsp;&nbsp;
											<a class="Normal" href="sitemap.php">
											Site Map</a>&nbsp;&nbsp; |&nbsp;&nbsp;
											<a class="Normal" href="loan_application.php">
											Apply for a Loan</a></td>
										</tr>
										<tr><td>&nbsp;
										</td></tr>
										<tr>
										<td align="right"  valign="top" width="100%">
											<?php // Inialize session
											//session_start();
											if (!isset($_SESSION['firstname'])) { ?>
											<a class="normal" href="index.php">Login</a>
											<?php }else { echo "Welcome,  ".$_SESSION['name']; ?>&nbsp;&nbsp;|&nbsp;&nbsp;
											<a class="normal" href="logout.php">
											Logout</a>&nbsp;&nbsp;|&nbsp;&nbsp;
											<?php 
											if ($_SESSION['usertype'] == 'student') { ?>
											<a class="normal" href="MyAccount.php">
											My Account</a>
											<?php }else {  ?>
											<a class="normal" href="searchStatus.php">
											My Account</a><?php } }?>&nbsp;&nbsp;</td>
										</tr>
									</table>
									</td>
								</tr>
								<tr>
									<td height="10px" style="width: 395px">
									<img alt="" height="10" src="js/images/pixel.gif" width="1"></td>
								</tr>
							</table>
							</td>
							<td         width="15px">
							<img alt="" height="1" src="js/images/pixel.gif" width="15"></td>
						</tr>
					</table>
					<table border="0" cellpadding="0" cellspacing="0" width="978">
						<tr bgcolor="#6495ED">
							<td style="height: 20px">
							<div id="menu">
								<ul>
									<li>
									<a href="index.php">HOME</a></li>
								</ul>
								<ul>
									<li>
									<a href="services.php">SERVICES</a> </li>
								</ul>
								<ul>
									<li>
									<a href="aboutus.php">ABOUT US</a></li>
								</ul>
								<ul>
									<li>
									<a href="location.php">LOCATION</a></li>
								</ul>
								<ul>
									<li>
									<a href="contactus.php">CONTACT US</a></li>
								</ul>
							</div>
							</td>
						</tr>
						<tr>
							<td height="8">
							<img alt="" height="1" src="js/images/pixel.gif" width="8"></td>
						</tr>
					</table>
<?php
        //database connection
	include('./connection.php');

         $id=$_POST['myradio'];


	 $select_query = "Select reference_id,firstname,middlename,lastname,dob,email,password,address,street1,street2,state,district,
            city,pincode,stdcode,phone,mobile,phone1,prevUniversity,prevCollege,prevCourse,marks,prefer_day,
            prefer_time,query,app_date,source,mail_status,update_date,partnername,app_status,employment,business,designation,
            income,bankbal,appworking,verificationstatus,Empaddress,Empstreet1,Empstreet2,Empcountry,Empstate,
            Empcity,Emppincode,Empstdcode,Empphone,AppliedBy, AppliedByRole from student_details where reference_id = '$id'";
	$select_record=mysql_query($select_query); 
	//or die(mysql_error());

	$row= @mysql_fetch_assoc($select_record);
       if($row){
                $col = array('reference_id','firstname','middlename','lastname','dob','email','password','address','street1','street2','state','district',
                                'city','pincode','stdcode','phone','mobile','phone1','prevUniversity','prevCollege','prevCourse','marks','prefer_day',
                                'prefer_time','query','app_date','source','mail_status','update_date','partnername','app_status','employment','business',
                                'designation','income','bankbal','appworking','verificationstatus','Empaddress','Empstreet1','Empstreet2','Empcountry',
                                'Empstate','Empcity','Emppincode','Empstdcode','Empphone','AppliedBy', 'AppliedByRole');
	$fetch = array_combine($col,$row); 
	}

        $select_query1 = "Select reference_id,studyCountry,otherCountry,university,course,courseCategory,otherCourse,
                          typeCourse,loanMonth,loanYear,duedate,amount,duration,security,durationtype from course_details where reference_id = '$id'";
	$select_record1=mysql_query($select_query1); 
	//or die(mysql_error());	
    $row1= @mysql_fetch_assoc($select_record1);       
    if($row1)
    {     
        $col1 = array('reference_id','studyCountry','otherCountry','university','course','courseCategory','otherCourse',
                      'typeCourse','loanMonth','loanYear','duedate','amount','duration','security','durationtype');
	$fetch1 = array_combine($col1,$row1); 	
    }
        
    $select_query6 = "select reference_id,address,street1,street2,state,district,city,pincode,stdcode,phone,Email,ContactPerson,college
                        from collegeaddressdetail where reference_id = '$id'";
	$select_record6=mysql_query($select_query6); 
	//or die(mysql_error());
	
	$row6= @mysql_fetch_assoc($select_record6);       
    if($row6)
    {     
	$col6 = array('reference_id','address','street1','street2','state','district','city','pincode','stdcode','phone','Email','ContactPerson','college');
	$fetch6 = array_combine($col6,$row6); 	
	}
   
         
    $select_query2 = "Select reference_id,coborrowerid,relation,relative, cfirstname, cmiddlename,clastname, cdob,cpanno,cemail,caddress,
                      cstreet1,cstreet2, cstate,cdistrict,ccity, cpincode,cstdcode,cphone,cmobile,cphone1,
                      cemployment,cbusiness,cdesignation,cincome,cloan,housingamt,caramt,jeepamt,twowheeleramt,consamt,totamt,
                      cbankbal,samestudadd,housingemi,caremi,jeepemi,twowheeleremi,consemi,totemi,cempaddress,cempstreet1,cempstreet2,
                      cempstate,cempdistrict,cempcity,cemppincode,cempstdcode,cempphone  from coapplicant_details where reference_id = '$id'";
    
	$select_record2=mysql_query($select_query2); 
	//or die(mysql_error());
	

	$row2= mysql_fetch_row($select_record2);
        
        if($row2){
     
	$col2 = array('reference_id','coborrowerid','relation','relative','cfirstname','cmiddlename','clastname','cdob',
'cpanno','cemail','caddress','cstreet1','cstreet2','cstate','cdistrict','ccity','cpincode','cstdcode','cphone','cmobile','cphone1',
'cemployment','cbusiness','cdesignation','cincome','cloan','housingamt','caramt','jeepamt','twowheeleramt','consamt','totamt',
'cbankbal','samestudadd','housingemi','caremi','jeepemi','twowheeleremi','consemi','totemi','cempaddress','cempstreet1','cempstreet2',
    'cempstate','cempdistrict','cempcity','cemppincode','cempstdcode','cempphone');
	$fetch2 = array_combine($col2,$row2); 
	}
      
        $rowc2= mysql_fetch_row($select_record2);
        
        if($rowc2){
     
	$colc2 = array('reference_id','coborrowerid','relation','relative','cfirstname','cmiddlename','clastname','cdob',
'cpanno','cemail','caddress','cstreet1','cstreet2','cstate','cdistrict','ccity','cpincode','cstdcode','cphone','cmobile','cphone1',
'cemployment','cbusiness','cdesignation','cincome','cloan','housingamt','caramt','jeepamt','twowheeleramt','consamt','totamt',
'cbankbal','samestudadd','housingemi','caremi','jeepemi','twowheeleremi','consemi','totemi','cempaddress','cempstreet1','cempstreet2',
    'cempstate','cempdistrict','cempcity','cemppincode','cempstdcode','cempphone');
	$fetchc2 = array_combine($colc2,$rowc2); 
	}
        
 ?>
					<table align="center" border="0" cellpadding="3" cellspacing="0" width="540">
						<tr>
							<td height="20"></td>
						</tr>
						<tr>
							<td class="heading" colspan="3">Student Details</td>
						</tr>
						<tr>
							<td height="5"></td>
						</tr>
						<tr>
							<td>First Name</td>
							<td>:</td>
							<td>
							<input id="firstname" name="firstname" size="40" type="text"
                                                               value="<?php if($row) { echo $fetch['firstname']; } ?>"></td>
						</tr>
						<tr>
							<td>Middle Name</td>
							<td>:</td>
							<td>
							<input id="middlename" name="middlename" size="40" type="text"
                                                               value="<?php if($row) { echo $fetch['middlename']; } ?>"></td>
						</tr>
						<tr>
							<td>Last Name</td>
							<td>:</td>
							<td>
							<input id="lastname" name="lastname" size="40" type="text"
                                                               value="<?php if($row) { echo $fetch['lastname']; } ?>"></td>
						</tr>
						<tr>
							<td>Date of Birth</td>
							<td>:</td>
							<td>
							<input id="datepicker" name="datepicker" size="40" type="text"
                                                               value="<?php if($row) { 
                                                                                        $originaldate= $fetch['dob'];

                                                                                        $newdate=date("d-m-Y",strtotime($originaldate));
                                                                                        echo "$newdate";

                                                                                     } ?>"></td>
						</tr>
						<tr>
							<td>Email Address</td>
							<td>:</td>
							<td>
							<input id="email" name="email" size="40" type="text"
                                                               value="<?php if($row) { echo $fetch['email']; } ?>"></td>
						</tr>
						<tr>
							<td>Address</td>
							<td>:</td>
							<td>
							<input id="address" name="address" size="40" type="text" onchange="onchangeAdd(this)"
                                                               value="<?php if($row) { echo $fetch['address']; } ?>"></td>
						</tr>
						<tr>
							<td>Street1</td>
							<td>:</td>
							<td>
							<input id="street1" name="street1" size="40" type="text"
                                                               value="<?php if($row) { echo $fetch['street1']; } ?>"></td>
						</tr>
						<tr>
							<td style="height: 28px">Street2 (optional)</td>
							<td style="height: 28px">:</td>
							<td style="height: 28px">
							<input id="street2" name="street2" size="40" type="text"
                                                               value="<?php if($row) { echo $fetch['street2']; } ?>">
                                                        
                            <input type="button" name="btnModifyCountry" value="Modify Location" 
                            onclick="enableddissabledState(this,'countrySelect1','stateSelect1','citySelect1','countrySelect','stateSelect','citySelect');" >          
                                                               </td>
						</tr>
                                <tr>
                                        <td>State</td>
                                        <td>:</td>
                                        <td>
                                            <input id="countrySelect1" name="country1" size="20" type="text" readonly="readonly"
                                                                       value="<?php if($row) { echo $fetch['state']; } ?>" >

                                            <select disabled="disabled" id="countrySelect"  name="country" 
                                                    onchange="populateState('countrySelect','stateSelect');
                                                              populateCity('countrySelect','citySelect')" size="1">
                                            </select>

                                        </td>
                                </tr>
                                <tr>
                                        <td>District</td>
                                        <td>:</td>
                                        <td>                                                      
                                             <input id="stateSelect1" name="state1" size="20" type="text" readonly="readonly"
                                                                      value="<?php if($row) { echo $fetch['district']; } ?>"  >
                                             <select disabled="disabled" id="stateSelect"  name="state" size="1">
                                            </select>
                                             <script type="text/javascript">initCountry('','countrySelect','stateSelect','citySelect');</script>

                                        </td>
                                </tr>
                                <tr>
                                        <td>City</td>
                                        <td>:</td>
                                        <td>

                                            <input id="citySelect1" name="city1" size="20" type="text" readonly="readonly"
                                                                    value="<?php if($row) { echo $fetch['city']; } ?>"  >
                                            <select id="citySelect"  name="city" size="1" disabled="disabled">
                                            </select>
                                             <script type="text/javascript">initCountry('','countrySelect','stateSelect','citySelect');</script>
                                        </td>
                                </tr>
                                <tr>
							<td>Pincode</td>
							<td>:</td>
							<td>
							<input id="pincode" maxlength="6" name="pincode" size="40" type="text"
                                                                value="<?php if($row) { echo $fetch['pincode']; } ?>" ></td>
						</tr>
						<tr>
							<td>Phone No.</td>
							<td>:</td>
							<td>
							<input id="stdcode" maxlength="6" name="stdcode" size="10" type="text"
                                                               value="<?php if($row) { echo $fetch['stdcode']; } ?>" >
							<input id="phone" maxlength="8" name="phone" size="24" type="text"
                                                         value="<?php if($row) { echo $fetch['phone']; } ?>" ></td>
						</tr>
						<tr>
							<td>Mobile No.</td>
							<td>:</td>
							<td>
							<input id="mobile" maxlength="10" name="mobile" size="40" type="text"
                                                    value="<?php if($row) { echo $fetch['mobile']; } ?>" ></td>
						</tr>
												<tr>
							<td>Alternate Contact No.</td>
							<td>:</td>
							<td>
                                                            
							<input id="phone1" maxlength="14" name="phone1" size="40" type="text"
                                                          value="<?php if($row) { echo $fetch['phone']; } ?>"    ></td>
						</tr>
						<tr>
							<td>Previous University</td>
							<td>:</td>
							<td>
							<input id="prevUniversity" name="prevUniversity" size="40" type="text"
                                                        value="<?php if($row) { echo $fetch['prevUniversity']; } ?>" ></td>
						</tr>
						<tr>
							<td>Previous College</td>
							<td>:</td>
							<td>
							<input id="prevCollege" name="prevCollege" size="40" type="text"
                                                          value="<?php if($row) { echo $fetch['prevCollege']; } ?>"   ></td>
						</tr>
						<tr>
							<td>Previous Course/Class</td>
							<td>:</td>
							<td>
							<input id="prevCourse" name="prevCourse" size="40" type="text"
                                                       value="<?php if($row) { echo $fetch['prevCourse']; } ?>"   ></td>
						</tr>
						<tr>
							<td>Marks obtained in Previous Course/Class</td>
							<td>:</td>
							<td>
							<select id="prevMarks" name="prevMarks" size="1">
							<option>Select</option>
							<option <?php if($row){
								if($fetch['marks'] == '<=50%')
								{        echo "selected='selected'";      }	}										     
								 ?>
                                                            >&lt;=50%</option>
							<option <?php if($row){
								if($fetch['marks'] == '51%-59%')
								{        echo "selected='selected'";      }	}										     
								 ?>>51%-59%</option>
							<option 
                                                            <?php if($row){
								if($fetch['marks'] == '60%-69%')
								{        echo "selected='selected'";      }	}										     
								 ?>
                                                            >60%-69%</option>
							<option
                                                            <?php if($row){
								if($fetch['marks'] == '70%-79%')
								{        echo "selected='selected'";      }	}										     
								 ?>
                                                            >70%-79%</option>
							<option <?php if($row){
								if($fetch['marks'] == '80%-89%')
								{        echo "selected='selected'";      }	}										     
								 ?>
                                                            >80%-89%</option>
							<option <?php if($row){
								if($fetch['marks'] == '>=90%')
								{        echo "selected='selected'";      }	}										     
								 ?>
                                                            >&gt;=90%</option>
							</select></td>
						</tr>
						<tr>
							<td height="5"></td>
						</tr>
						<tr>
							<td class="heading" colspan="3">Course Details for Which 
							Loan is Needed</td>
						</tr>
						<tr>
							<td height="5"></td>
						</tr>
						<tr>
							<td>Country of Study</td>
							<td>:</td>
							<td>
							<select id="studyCountry" name="studyCountry"  size="1">
							<option >Select</option>
							<option <?php if($row1){
								if($fetch1['studyCountry'] == 'India')
								{        echo "selected='selected'";      }	}										     
								 ?>>India</option>
							<option <?php if($row1){
								if($fetch1['studyCountry'] == 'USA')
								{        echo "selected='selected'";      }	}										     
								 ?>>USA</option>
							<option <?php if($row1){
								if($fetch1['studyCountry'] == 'UK')
								{        echo "selected='selected'";      }	}										     
								 ?>>UK</option>
							<option <?php if($row1){
								if($fetch1['studyCountry'] == 'Canada')
								{        echo "selected='selected'";      }	}										     
								 ?>>Canada</option>
							<option <?php if($row1){
								if($fetch1['studyCountry'] == 'Australia')
								{        echo "selected='selected'";      }	}										     
								 ?>>Australia</option>
							<option <?php if($row1){
								if($fetch1['studyCountry'] == 'New Zealand')
								{        echo "selected='selected'";      }	}										     
								 ?>>New Zealand</option>
							<option <?php if($row1){
								if($fetch1['studyCountry'] == 'Germany')
								{        echo "selected='selected'";      }	}										     
								 ?>>Germany</option>
							<option <?php if($row1){
								if($fetch1['studyCountry'] == 'France')
								{        echo "selected='selected'";      }	}										     
								 ?>>France</option>
							<option <?php if($row1){
								if($fetch1['studyCountry'] == 'Sweden')
								{        echo "selected='selected'";      }	}										     
								 ?>>Sweden</option>
							<option <?php if($row1){
								if($fetch1['studyCountry'] == 'Ireland')
								{        echo "selected='selected'";      }	}										     
								 ?>>Ireland</option>
							<option <?php if($row1){
								if($fetch1['studyCountry'] == 'Dubai')
								{        echo "selected='selected'";      }	}										     
								 ?>>Dubai</option>
							<option <?php if($row1){
								if($fetch1['studyCountry'] == 'Singapore')
								{        echo "selected='selected'";      }	}										     
								 ?>>Singapore</option>
							<option <?php if($row1){
								if($fetch1['studyCountry'] == 'Spain')
								{        echo "selected='selected'";      }	}										     
								 ?>>Spain</option>
							<option <?php if($row1){
								if($fetch1['studyCountry'] == 'Switzerland')
								{        echo "selected='selected'";      }	}										     
								 ?>>Switzerland</option>
							<option <?php if($row1){
								if($fetch1['studyCountry'] == 'Russia')
								{        echo "selected='selected'";      }	}										     
								 ?>>Russia</option>
							<option <?php if($row1){
								if($fetch1['studyCountry'] == 'China')
								{        echo "selected='selected'";      }	}										     
								 ?>>China</option>
							<option <?php if($row1){
								if($fetch1['studyCountry'] == 'Other')
								{        echo "selected='selected'";      }	}										     
								 ?>>Other</option>
							</select>
							
							<input id="otherCountry" maxlength="45" name="otherCountry" readonly="readonly" size="22" type="text">
						<tr>
							<td>University of Study</td>
							<td>:</td>
							<td>
							<input id="university" name="university" size="40" type="text"
                                                       value="<?php if($row1) { echo $fetch1['university']; } ?>"  ></td>
						</tr>
						<tr>
							<td>College of Study</td>
							<td>:</td>
							<td>
							<input id="college" name="college" size="40" type="text"
                                                          value="<?php if($row6) { echo $fetch6['college']; } ?>"    ></td>
						</tr>
						<!-- college Address     -->
						<tr>
							<td>College Address</td>
							<td>:</td>
							<td>
							<input id="Coladdress" maxlength="45" name="Coladdress" size="40" type="text" onchange="onchangeAdd(this)" 
							value="<?php if($row6) { echo $fetch6['address']; } ?>" ></td>
						</tr>
						<tr>
							<td>Street1</td>
							<td>:</td>
							<td>
							<input id="Colstreet1" maxlength="45" name="Colstreet1" size="40" type="text" onchange="onchangeStreet1(this)"
							value="<?php if($row6) { echo $fetch6['street1']; } ?>" ></td>
						</tr>
						<tr>
							<td style="height: 28px">Street2 (optional)</td>
							<td style="height: 28px">:</td>
							<td style="height: 28px">
							<input id="Colstreet2" maxlength="45" name="Colstreet2" size="40" type="text" onchange="onchangeStreet2(this)"
							value="<?php if($row6) { echo $fetch6['street2']; } ?>" >
							 <input type="button" name="btnModifyCourseAdd" value="Modify Location" 
							 onclick="enableddissabledState(this,'ColcountrySelect1','ColstateSelect1','ColcitySelect1','ColcountrySelect','ColstateSelect','ColcitySelect');" >   </td>
						</tr>
						<tr>
							<td>State</td>
							<td>:</td>
							<td>
							 <input id="ColcountrySelect1" name="Colcountry1" size="20" type="text" readonly="readonly"
                                                                                       value="<?php if($row6) { echo $fetch6['state']; } ?>" >
							<select <?php if($row6){ if($fetch6['state']!=''){ echo 'disabled="disabled"'; }}?> 
                                                            id="ColcountrySelect"  name="Colcountry"  onchange="populateState('ColcountrySelect','ColstateSelect'); populateCity('ColcountrySelect','ColcitySelect')" size="1">
							</select></td>
						</tr>
						<tr>
							<td>District</td>
							<td>:</td>
							<td>
							 <input id="ColstateSelect1" name="Colstate1" size="20" type="text" readonly="readonly"
                                                                    value="<?php if($row6) { echo $fetch6['district']; } ?>"  >

							<select <?php if($row6){ if($fetch6['district']!=''){ echo 'disabled="disabled"'; }}?> id="ColstateSelect"  name="Colstate" size="1">
							</select><script type="text/javascript">initCountry('','ColcountrySelect','ColstateSelect','ColcitySelect');</script>
							</td>
						</tr>
						<tr>
							<td>City</td>
							<td>:</td>
							<td>
							
                            <input id="ColcitySelect1" name="Colcity1" size="20" type="text" readonly="readonly"
                              value="<?php if($row6) { echo $fetch6['city']; } ?>"  >

							<select id="ColcitySelect" <?php if($row6){ if($fetch6['city']!=''){ echo 'disabled="disabled"'; }}?>  name="Colcity" size="1">
							</select>
							<script type="text/javascript">initCountry('','ColcountrySelect','ColstateSelect','ColcitySelect');</script>
							</td>
						</tr>
						<tr>
							<td>Pincode</td>
							<td>:</td>
							<td>
							<input id="Colpincode" maxlength="6" name="Colpincode" size="40" type="text" onchange="onchangePincode(this)"
							value="<?php if($row6) { echo $fetch6['pincode']; } ?>" ></td>
						</tr>
						<tr>
							<td>Phone No.</td>
							<td>:</td>
							<td>
							<input id="Colstdcode" maxlength="6" name="Colstdcode" size="10" type="text" onchange="onchangeStdcode(this)"
							value="<?php if($row6) { echo $fetch6['stdcode']; } ?>" >
							<input id="Colphone" maxlength="8" name="Colphone" size="24" type="text" onchange="onchangePhone(this)"
							value="<?php if($row6) { echo $fetch6['phone']; } ?>" ></td>
						</tr>
						<tr>
							<td>Contact Person Name</td>
							<td>&nbsp;</td>
							<td>
							<input id="ContactPName" maxlength="45" name="ContactPName" size="40" type="text" value="<?php if($row6) { echo $fetch6['ContactPerson']; } ?>" ></td>
						</tr>
						<tr>
							<td>Email</td>
							<td>&nbsp;</td>
							<td>
							<input id="CollegeEMail" maxlength="45" name="CollegeEMail" size="40" type="text" value="<?php if($row6) { echo $fetch6['Email']; } ?>" ></td>
						</tr>

						<tr>
							<td>Course Name</td>
							<td>:</td>
							<td>
							<input id="course" name="course" size="40" type="text"
                                                       value="<?php if($row1) { echo $fetch1['course']; } ?>"  ></td>
						</tr>
						<tr>
							<td>Category of Course</td>
							<td>:</td>
							<td>
							<select id="courseCategory" name="courseCategory" onchange="return onOtherSelectedIndexChange(this,'otherCourse')" size="1">
							<option>Select</option>
							<option <?php if($row1){
								if($fetch1['courseCategory'] == 'Engineering/MS')
								{        echo "selected='selected'";      }	}										     
								 ?>>Engineering/MS</option>
							<option  <?php if($row1){
								if($fetch1['courseCategory'] == 'MBA/PGPM')
								{        echo "selected='selected'";      }	}										     
								 ?>>MBA/PGPM</option>
							<option  <?php if($row1){
								if($fetch1['courseCategory'] == 'Medical')
								{        echo "selected='selected'";      }	}										     
								 ?>>Medical</option>
							<option  <?php if($row1){
								if($fetch1['courseCategory'] == 'Hotel Management')
								{        echo "selected='selected'";      }	}										     
								 ?>>Hotel Management</option>
							<option  <?php if($row1){
								if($fetch1['courseCategory'] == 'Vocational')
								{        echo "selected='selected'";      }	}										     
								 ?>>Vocational</option>
							<option  <?php if($row1){
								if($fetch1['courseCategory'] == 'Certificate')
								{        echo "selected='selected'";      }	}										     
								 ?>>Certificate</option>
							<option  <?php if($row1){
								if($fetch1['courseCategory'] == 'Other')
								{        echo "selected='selected'";      }	}										     
								 ?>>Other</option>
							</select>
							<input id="otherCourse" name="otherCourse" readonly="readonly" size="17" type="text"
                                                        value="<?php if($row1) { echo $fetch1['otherCourse']; } ?>"     ></td>
						</tr>
						<tr>
							<td>Type of Course</td>
							<td>:</td>
							<td>
							<input id="fulltime"  name="courseType" type="radio" value="Full Time"
                                                                 <?php if($row1){
								if($fetch1['typeCourse'] == 'Full Time')
								{        echo "checked='checked'";      }	}
                                                                
								 ?>>Full Time
							<input id="parttime" name="courseType" type="radio" value="Part Time"
                                                                 <?php if($row1){
								if($fetch1['typeCourse'] == 'Part Time')
								{        echo "checked='checked'";      }	}
                                                                
								 ?>>Part Time
							<input id="correspondence" name="courseType" type="radio" value="Correspondence"
                                                                 <?php if($row1){
								if($fetch1['typeCourse'] == 'Correspondence')
								{        echo "checked='checked'";      }	}                                                               
								 ?>>Correspondence
							<input type="button" name="btnChangeYear" value="change LoanYear" onclick="enableddissabledloanYear(this);" >
							</td>
						</tr>
						<tr>
							<td>When loan is required?</td>
							<td>:</td>
							<td>
							<select id="loanMonth" name="loanMonth" size="1">
							<option >Select</option>
							<option  <?php if($row1){
								if($fetch1['loanMonth'] == 'January')
								{        echo "selected='selected'";      }	}										     
								 ?>>January</option>
							<option  <?php if($row1){
								if($fetch1['loanMonth'] == 'February')
								{        echo "selected='selected'";      }	}										     
								 ?>>February</option>
							<option  <?php if($row1){
								if($fetch1['loanMonth'] == 'March')
								{        echo "selected='selected'";      }	}										     
								 ?>>March</option>
							<option  <?php if($row1){
								if($fetch1['loanMonth'] == 'April')
								{        echo "selected='selected'";      }	}										     
								 ?>>April</option>
							<option  <?php if($row1){
								if($fetch1['loanMonth'] == 'May')
								{        echo "selected='selected'";      }	}										     
								 ?>>May</option>
							<option  <?php if($row1){
								if($fetch1['loanMonth'] == 'June')
								{        echo "selected='selected'";      }	}										     
								 ?>>June</option>
							<option  <?php if($row1){
								if($fetch1['loanMonth'] == 'July')
								{        echo "selected='selected'";      }	}										     
								 ?>>July</option>
							<option  <?php if($row1){
								if($fetch1['loanMonth'] == 'August')
								{        echo "selected='selected'";      }	}										     
								 ?>>August</option>
							<option  <?php if($row1){
								if($fetch1['loanMonth'] == 'September')
								{        echo "selected='selected'";      }	}										     
								 ?>>September</option>
							<option  <?php if($row1){
								if($fetch1['loanMonth'] == 'October')
								{        echo "selected='selected'";      }	}										     
								 ?>>October</option>
							<option  <?php if($row1){
								if($fetch1['loanMonth'] == 'November')
								{        echo "selected='selected'";      }	}										     
								 ?>>November</option>
							<option  <?php if($row1){
								if($fetch1['loanMonth'] == 'December')
								{        echo "selected='selected'";      }	}										     
								 ?>>December</option>
							</select>
							<input id="loanYear1" name="loanYear1" type="text" readonly="readonly" 
                                                         value="<?php if($row1) { echo $fetch1['loanYear']; } ?>">
                                                         
							<select id="loanYear" name="loanYear" size="1" disabled="disabled"></select> 
							<script type="text/javascript">OnLoadLoanYear('loanYear');</script>
							&nbsp;</td>
							
						</tr>
						<tr>
							<td>Due Date of Fees(if any)</td>
							<td>:</td>
							<td>
							<input id="datepicker2" name="datepicker2" size="40" type="text"
                                                                value="<?php if($row1) {$originaldate=  $fetch1['duedate']; 
                                                                
                                                                $newdate=date("d-m-Y",strtotime($originaldate));
                                                                echo $newdate;
                                                                } ?>"></td>
						</tr>
						<tr>
							<td>Loan Amount (in Rupees)</td>
							<td>:</td>
							<td>
							<input id="amount" maxlength="7" name="amount" size="40" type="text"
                                                         value="<?php if($row1) { echo $fetch1['amount']; } ?>"></td>
						</tr>
						<tr>
							<td>Course Duration(in Months)</td>
							<td>:</td>
							<td>
                               <input id="duration" name="duration" size="20" type="text" value="<?php if($row1) { echo $fetch1['duration']; } ?>"  >   
                               <select id="DurationIn" name="DurationIn" size="1">
							<option >Select</option>
							<option  <?php if($row1){
								if($fetch1['durationtype'] == 'Year')
								{        echo "selected='selected'";      }	}										     
								 ?>>Year</option>
							<option  <?php if($row1){
								if($fetch1['durationtype'] == 'Month')
								{        echo "selected='selected'";      }	}										     
								 ?>>Month</option>
							<option  <?php if($row1){
								if($fetch1['durationtype'] == 'Week')
								{        echo "selected='selected'";      }	}										     
								 ?>>Week</option>
							<option  <?php if($row1){
								if($fetch1['durationtype'] == 'Day')
								{        echo "selected='selected'";      }	}										     
								 ?>>Day</option>
									</select>
                                                       
							</td>
						</tr>
						<tr>
							<td>Can Offer Collateral Security?</td>
							<td>:</td>
							<td>
                                                       
                                                            
							<input id="security1" name="security" type="radio" value="Yes" 
                                                           

                                                                <?php if($row1){
								if($fetch1['security'] == 'Yes')
								{        echo "checked='checked'";      }	}
                                                                
								 ?> >Yes
							<input id="security2" name="security" type="radio" value="No"
                                                            <?php if($row1){
								if($fetch1['security'] == 'No')
								{        echo "checked='checked'";      }	}
                                                                
								 ?>   >No</td>
						</tr>
						<tr>
						<td>Applicant Working or not</td>
						<td>:</td>
						<td>
							<input id="workYes" name="work" type="radio" value="Yes" onclick="onSelectedAppEmployment(this,false)" 
							<?php if($row){
								if($fetch['appworking'] == 'Yes')
								{        echo "checked='checked'";      }	}
                                                                
								 ?>>Yes
							<input id="workNo" name="work" type="radio" value="No" onclick="onSelectedAppEmployment(this,true)" 
							<?php if($row){
								if($fetch['appworking'] == 'No')
								{        echo "checked='checked'";      }	}
                                                                
								 ?>>No</td>
						</tr>
						<tr><td colspan="3"><div id="AppWork_panel" name="AppWork_panel"><table>
						<tr>
							<td>Type of Employment</td>
							<td>:</td>
							<td>
							<?php echo $fetch['appworking'] ?>
							<select <?php if($row){
								if($fetch['appworking'] == 'No')
								{     echo "disabled='disabled'"; }   }	                                                               
								 ?> id="employment" name="employment" size="1">
							<option >Select</option>
							<option <?php if($row){
								if($fetch['employment'] == 'Salaried')
								{        echo "selected='selected'";      }	}										     
								 ?>>Salaried</option>
							<option  <?php if($row){
								if($fetch['employment'] == 'Self Employed')
								{        echo "selected='selected'";      }	}										     
								 ?>>Self Employed</option>
							</select></td>
						</tr>
						<tr>
							<td>Name of Employer/Business</td>
							<td>:</td>
							<td>
							<input id="business" name="business" <?php if($row){
								if($fetch['appworking'] == 'No')
								{    echo  'disabled="disabled"'; }   }	                                                               
								 ?>  maxlength="150" size="40" type="text" value="<?php if($row) { echo $fetch['business']; } ?>"></td>
						</tr>
						<tr>
							<td>Designation</td>
							<td>:</td>
							<td>
							<input id="designation" <?php if($row){
								if($fetch['appworking'] == 'No')
								{    echo  'disabled="disabled"'; }   }	                                                               
								 ?> maxlength="50" name="designation" size="40" type="text"  value="<?php if($row) { echo $fetch['designation']; } ?>"></td>
						</tr>
						<tr>
							<td>Gross Monthly Income</td>
							<td>:</td>
							<td><select id="income" <?php if($row){
								if($fetch['appworking'] == 'No')
								{     echo 'disabled="disabled"'; }   }	                                                               
								 ?> name="income" size="1">
							<option >Select</option>
							<option <?php if($row){
								if($fetch['income'] == '<=Rs.5,000')
								{        echo "selected='selected'";      }	}										     
								 ?>>&lt;=Rs.5,000</option>
							<option <?php if($row){
								if($fetch['income'] == 'Rs.5,001-Rs.8,000')
								{        echo "selected='selected'";      }	}										     
								 ?>>Rs.5,001-Rs.8,000</option>
							<option <?php if($row){
								if($fetch['income'] == 'Rs.8,001-Rs.10,000')
								{        echo "selected='selected'";      }	}										     
								 ?>>Rs.8,001-Rs.10,000</option>
							<option <?php if($row){
								if($fetch['income'] == 'Rs.10,001-Rs.12,000')
								{        echo "selected='selected'";      }	}										     
								 ?>>Rs.10,001-Rs.12,000</option>
							<option <?php if($row){
								if($fetch['income'] == 'Rs.12,001-Rs.15,000')
								{        echo "selected='selected'";      }	}										     
								 ?>>Rs.12,001-Rs.15,000</option>
							<option <?php if($row){
								if($fetch['income'] == 'Rs.15,001-Rs.20,000')
								{        echo "selected='selected'";      }	}										     
								 ?>>Rs.15,001-Rs.20,000</option>
							<option <?php if($row){
								if($fetch['income'] == 'Rs.20,001-Rs.30,000')
								{        echo "selected='selected'";      }	}										     
								 ?>>Rs.20,001-Rs.30,000</option>
							<option <?php if($row){
								if($fetch['income'] == 'Rs.30,001-Rs.50,000')
								{        echo "selected='selected'";      }	}										     
								 ?>>Rs.30,001-Rs.50,000</option>
							<option <?php if($row){
								if($fetch['income'] == '>Rs.50,000')
								{        echo "selected='selected'";      }	}										     
								 ?>>&gt;Rs.50,000</option>
							</select></td>
						</tr>
						<tr>
							<td>Average Monthly Bank Balance for Last 3 months</td>
							<td>:</td>
							<td>
							<input id="bankbal" <?php if($row){
								if($fetch['appworking'] == 'No')
								{    echo  'disabled="disabled"'; }   }	                                                               
								 ?> maxlength="6" name="bankbal" size="40" type="text" value="<?php if($row) { echo $fetch['bankbal']; } ?>"></td>
						</tr>
                        <tr>
							<td>Address</td>
							<td>:</td>
							<td>
							<input <?php if($row){
								if($fetch['appworking'] == 'No')
								{    echo  'disabled="disabled"'; }   }	                                                               
								 ?> id="Empaddress" maxlength="45" name="Empaddress" size="40" type="text"
							value="<?php if($row) { echo $fetch['Empaddress']; } ?>"></td>
						</tr>
						<tr>
							<td>Street1</td>
							<td>:</td>
							<td>
							<input id="Empstreet1" <?php if($row){
								if($fetch['appworking'] == 'No')
								{     echo 'disabled="disabled"'; }   }	                                                               
								 ?> maxlength="45" name="Empstreet1" size="40" type="text" 
							value="<?php if($row) { echo $fetch['Empstreet1']; } ?>"></td>
						</tr>
						<tr>
							<td>Street2 (optional)</td>
							<td>:</td>
							<td>
							<input <?php if($row){
								if($fetch['appworking'] == 'No')
								{     echo 'disabled="disabled"'; }   }	                                                               
								 ?> id="Empstreet2" maxlength="45" name="Empstreet2" size="40" type="text" 
							value="<?php if($row) { echo $fetch['Empstreet2']; } ?>">
							
							<input type="button" <?php if($row){
								if($fetch['appworking'] == 'No')
								{    echo  'disabled="disabled"'; }   }	                                                               
								 ?>
							 name="btnModifyAppEmpAdd" value="Modify Location" onclick="enableddissabledState(this,'EmpcountrySelect1','EmpstateSelect1','EmpcitySelect1','EmpcountrySelect','EmpstateSelect','EmpcitySelect');" >
							</td>
						</tr>
						<tr>
							<td>State</td>
							<td>:</td>
							<td>
							 <input id="EmpcountrySelect1" name="Empcountry1" size="20" type="text" readonly="readonly"
                          value="<?php if($row) { echo $fetch['Empcountry']; } ?>" >

							<select id="EmpcountrySelect"  name="Empcountry" onchange="populateState('EmpcountrySelect','EmpstateSelect'); populateCity('EmpcountrySelect','EmpcitySelect')"
							<?php if($row){
								if($fetch['appworking'] == 'Yes' && $fetch['Empcountry']=='')
								{     } else
								{echo  'disabled="disabled"';}  }	                                                               
								 ?> size="1">
							</select>
							</td>
						</tr>
						<tr>
							<td>District</td>
							<td>:</td>
							<td>
							 <input id="EmpstateSelect1" name="Empstate1" size="20" type="text" readonly="readonly"
                                                                value="<?php if($row) { echo $fetch['Empstate']; } ?>"  >

							<select id="EmpstateSelect"  name="Empstate" size="1" <?php if($row){
								if($fetch['appworking'] == 'Yes' && $fetch['Empstate']=='')
								{     } else
								{echo  'disabled="disabled"';}  }	                                                               
								 ?>>
							</select><script type="text/javascript">initCountry('','EmpcountrySelect','EmpstateSelect','EmpcitySelect');</script>
							</td>
						</tr>
						<tr>
							<td>City</td>
							<td>:</td>
							<td>
							<input id="EmpcitySelect1" name="Empcity1" size="20" type="text" readonly="readonly"
                                                                    value="<?php if($row) { echo $fetch['Empcity']; } ?>"  >

							<select id="EmpcitySelect"  name="Empcity" size="1" <?php if($row){
								if($fetch['appworking'] == 'Yes' && $fetch['Empcity']=='')
								{     } else
								{echo  'disabled="disabled"';}  }	                                                               
								 ?>>
							</select>
							<script type="text/javascript">initCountry('','EmpcountrySelect','EmpstateSelect','EmpcitySelect');</script>
							</td>
						</tr>

						<tr>
							<td>Pincode</td>
							<td>:</td>
							<td>
							<input id="Emppincode" maxlength="6" name="Emppincode" size="40" type="text" <?php if($row){
								if($fetch['appworking'] == 'No')
								{    echo  'disabled="disabled"'; }   }	                                                               
								 ?>
							value="<?php if($row) { echo $fetch['Emppincode']; } ?>"></td>
						</tr>
						<tr>
							<td>Phone No.</td>
							<td>:</td>
							<td>
							<input id="Empstdcode" maxlength="6" name="Empstdcode" size="10" type="text" <?php if($row){
								if($fetch['appworking'] == 'No')
								{     echo 'disabled="disabled"'; }   }	                                                               
								 ?> value="<?php if($row) { echo $fetch['Empstdcode']; } ?>">
							<input id="Empphone" maxlength="8" name="Empphone" size="24" type="text" <?php if($row){
								if($fetch['appworking'] == 'No')
								{     echo 'disabled="disabled"'; }   }	                                                               
								 ?> value="<?php if($row) { echo $fetch['Empphone']; } ?>"></td>
						</tr>

                        </table>
                        </div>   
                        </td>                    
                        </tr>
						<tr>
							<td height="5"></td>
						</tr>
						<tr>
							<td class="heading" colspan="3">Co-Borrower 1 Details</td>
						</tr>
						<tr>
							<td height="5"></td>
						</tr>
						<tr>
							<td>Relation with Student</td>
							<td>:</td>
							<td>
                                  <select id="relation" name="relation" size="1" onchange="return onSelectedIndexChange(this,'relative')">
							<option >Select</option>
							<option <?php if($row2){
								if($fetch2['relation'] == 'Father')
								{        echo "selected='selected'";      }	}										     
								 ?>>Father</option>
							<option <?php if($row2){
								if($fetch2['relation'] == 'Mother')
								{        echo "selected='selected'";      }	}										     
								 ?>>Mother</option>
								 <option <?php if($row2){
								if($fetch2['relation'] == 'Brother')
								{        echo "selected='selected'";      }}										     
								 ?>>Brother</option>
                                <option <?php if($row2){
								if($fetch2['relation'] == 'Sister')
								{        echo "selected='selected'";      }	}										     
								 ?>>Sister</option>
                                 <option <?php if($row2){
								if($fetch2['relation'] == 'Spouse')
								{        echo "selected='selected'";      }	}										     
								 ?>>Spouse</option>
								 <option <?php if($row2){
								if($fetch2['relation'] == 'Relative')
								{        echo "selected='selected'";      }	}										     
								 ?>>Relative</option>
							</select>                                                               
                              <select id="relative" name="relative" size="1" disabled="disabled">
							<option >Select</option>
							<option <?php if($row2){
								if($fetch2['relative'] == 'Cousin')
								{        echo "selected='selected'";      }	}										     
								 ?>>Cousin</option>
							<option <?php if($row2){
								if($fetch2['relative'] == 'Paternal Uncle (Chacha)')
								{        echo "selected='selected'";      }	}										     
								 ?>>Paternal Uncle (Chacha)</option>
								 <option <?php if($row2){
								if($fetch2['relative'] == 'Paternal Aunt (Chachi)')
								{        echo "selected='selected'";      }}										     
								 ?>>Paternal Aunt (Chachi)</option>
                                <option <?php if($row2){
								if($fetch2['relative'] == 'Maternal Uncle (Mama)')
								{        echo "selected='selected'";      }	}										     
								 ?>>Maternal Uncle (Mama)</option>
                                 <option <?php if($row2){
								if($fetch2['relative'] == 'Paternal Grandfather (Dadaji)')
								{        echo "selected='selected'";      }	}										     
								 ?>>Paternal Grandfather (Dadaji)</option>
								 <option <?php if($row2){
								if($fetch2['relative'] == 'Paternal Grandmother (Dadi)')
								{        echo "selected='selected'";      }	}										     
								 ?>>Paternal Grandmother (Dadi)</option>
								 <option <?php if($row2){
								if($fetch2['relative'] == 'Maternal Grandfather (Nanaji)')
								{        echo "selected='selected'";      }	}										     
								 ?>>Maternal Grandfather (Nanaji)</option>
                                 <option <?php if($row2){
								if($fetch2['relative'] == 'Maternal Grandmother (Nani)')
								{        echo "selected='selected'";      }	}										     
								 ?>>Maternal Grandmother (Nani)</option>
							</select>  

                                                             
							 </td>
						</tr>
						<tr>
							<td>First Name</td>
							<td>:</td>
							<td>
							<input id="cfirstname" name="cfirstname" size="40" type="text"
                                                          value="<?php if($row2) { echo $fetch2['cfirstname']; } ?>"    ></td>
						</tr>
						<tr>
							<td>Middle Name</td>
							<td>:</td>
							<td>
							<input id="cmiddlename" name="cmiddlename" size="40" type="text"
                                                        value="<?php if($row2) { echo $fetch2['cmiddlename']; } ?>"  ></td>
						</tr>
						<tr>
							<td>Last Name</td>
							<td>:</td>
							<td>
							<input id="clastname" name="clastname" size="40" type="text"
                                                           value="<?php if($row2) { echo $fetch2['clastname']; } ?>"     ></td>
						</tr>
						<tr>
							<td>Date of Birth</td>
							<td>:</td>
							<td>
							<input id="datepicker1" name="datepicker1" size="40" type="text"
                                                       value="<?php if($row2) { $originaldate= $fetch2['cdob'];
                                                       
                                                       $newdate=date("d-m-Y",strtotime($originaldate));
                                                       echo $newdate;; } ?>"   ></td>
						</tr>
						<tr>
							<td>PAN No.</td>
							<td>:</td>
							<td>
							<input id="cpanno" maxlength="10" name="cpanno" size="40" type="text"
                                                          value="<?php if($row2) { echo $fetch2['cpanno']; } ?>"       ></td>
						</tr>
						<tr>
							<td>Email Address</td>
							<td>:</td>
							<td>
							<input id="cemail" name="cemail" size="40" type="text"
                                                    value="<?php if($row2) { echo $fetch2['cemail']; } ?>"  ></td>
						</tr>
						<tr>
							<td height="5"></td>
						</tr>
						<tr>
							<td bgcolor="#E6F0FA" colspan="3">
							<input name="same" onclick="return onclickSameAddress(this)" type="checkbox"  <?php if($row2){
								if($fetch2['samestudadd'] == 'on')
								{        echo "checked='checked'";      }	}
                                                                
								 ?>>Same 
							as Student's Address</td>
						</tr>
						<tr>
							<td height="5"></td>
						</tr>
						<tr>
							<td>Address</td>
							<td>:</td>
							<td>
							<input id="caddress" name="caddress" size="40" type="text"
                                                          value="<?php if($row2) { echo $fetch2['caddress']; } ?>"      ></td>
						</tr>
						<tr>
							<td>Street1</td>
							<td>:</td>
							<td>
							<input id="cstreet1" name="cstreet1" size="40" type="text"
                                                            value="<?php if($row2) { echo $fetch2['cstreet1']; } ?>" ></td>
						</tr>
						<tr>
							<td>Street2 (optional)</td>
							<td>:</td>
							<td>
							<input id="cstreet2" name="cstreet2" size="40" type="text"
                                                            value="<?php if($row2) { echo $fetch2['cstreet2']; } ?>">
                                                        <input type="button" name="btnModifyCOBo2EmpAdd" value="Modify Location" 
							onclick="enableddissabledState(this,'ccountry1','cstate1','ccity1','ccountrySelect','cstateSelect','ccitySelect');" >
                                                        </td>
						</tr>
						<tr>
							<td>State</td>
							<td>:</td>
							<td>
							<input id="ccountry1" name="ccountry1" type="text" readonly="readonly"
                                                                              value="<?php if($row2) { echo $fetch2['cstate']; } ?>"  >                                                      
                                                        <select disabled="disabled" id="ccountrySelect" name="ccountry" 
                                                                onchange="populateState('ccountrySelect','cstateSelect'); populateCity('ccountrySelect','ccitySelect')" size="1">
							</select>
                          </td>
						</tr>
						<tr>
							<td>District</td>
							<td>:</td>
							<td>							
                      <input id="cstate1"  name="cstate1" type="text" readonly="readonly"
                                                       value="<?php if($row2) { echo $fetch2['cdistrict']; } ?>"  >
                            <select id="cstateSelect" disabled="disabled" name="cstate" size="1">
							</select><script type="text/javascript">initCountry('','ccountrySelect','cstateSelect','ccitySelect');</script>

							</td>
						</tr>
						<tr>
							<td>City</td>
							<td>:</td>
							<td align="left" valign="top">
							<input id="ccity1" name="ccity1"  type="text" readonly="readonly"
                                                                           value="<?php if($row2) { echo $fetch2['ccity']; } ?>"  >
                                                        <select id="ccitySelect" disabled="disabled" name="ccity" size="1"></select>
							<script type="text/javascript">initCountry('','ccountrySelect','cstateSelect','ccitySelect'); </script>

                                                        </td>
						</tr>
						<tr>
							<td>Pincode</td>
							<td>:</td>
							<td>
							<input id="cpincode" maxlength="6" name="cpincode" size="40" type="text"
                                                         value="<?php if($row2) { echo $fetch2['cpincode']; } ?>"        ></td>
						</tr>
						<tr>
							<td>Phone No.</td>
							<td>:</td>
							<td>
							<input id="cstdcode" maxlength="6" name="cstdcode" size="10" type="text"
                                                         value="<?php if($row2) { echo $fetch2['cstdcode']; } ?>">
							<input id="cphone" maxlength="8" name="cphone" size="24" type="text"
                                                                value="<?php if($row2) { echo $fetch2['cphone']; } ?>"></td>
                                                        
						</tr>
						<tr>
							<td>Mobile No.</td>
							<td>:</td>
							<td>
							<input id="cmobile" maxlength="10" name="cmobile" size="40" type="text"
                                                          value="<?php if($row2) { if($fetch2['cmobile'] !='0'){ echo $fetch2['cmobile'];} } ?>" ></td>
						</tr>
						<tr>
							<td>Alternate Contact No.</td>
							<td>:</td>
							<td>
							<input id="cphone1" maxlength="14" name="cphone1" size="40" type="text"
                                                         value="<?php if($row2) { if($fetch2['cphone1'] !='0'){echo $fetch2['cphone1']; }} ?>"     ></td>
						</tr>
						<tr>
							<td style="height: 28px">Type of Employment</td>
							<td style="height: 28px">:</td>
							<td style="height: 28px">
							<select id="cemployment" name="cemployment" size="1">
							<option >Select</option>
							<option <?php if($row2){
								if($fetch2['cemployment'] == 'Salaried')
								{        echo "selected='selected'";      }	}										     
								 ?>>Salaried</option>
							<option <?php if($row2){
								if($fetch2['cemployment'] == 'Self Employed')
								{        echo "selected='selected'";      }	}										     
								 ?>>Self Employed</option>
							</select></td>
						</tr>
						<tr>
							<td>Name of Employer/Business</td>
							<td>:</td>
							<td>
							<input id="cbusiness" name="cbusiness" maxlength="150" size="40" type="text"
                                                             value="<?php if($row2) { echo $fetch2['cbusiness']; } ?>"      ></td>
						</tr>
						<tr>
							<td>Designation</td>
							<td>:</td>
							<td>
							<input id="cdesignation" maxlength="50" name="cdesignation" size="40" type="text"
                                                     value="<?php if($row2) { echo $fetch2['cdesignation']; } ?>"     ></td>
						</tr>
						<tr>
							<td>Employment Address</td>
							<td>:</td>
							<td>
							<input id="cempaddress" maxlength="45" name="cempaddress" size="40" type="text" value="<?php if($row2) { echo $fetch2['cempaddress']; } ?>" ></td>
						</tr>
						<tr>
							<td>Street1</td>
							<td>:</td>
							<td>
							<input id="cempstreet1" maxlength="45" name="cempstreet1" size="40" type="text" value="<?php if($row2) { echo $fetch2['cempstreet1']; } ?>" ></td>
						</tr>
						<tr>
							<td>Street2 (optional)</td>
							<td>:</td>
							<td>
							<input id="cempstreet2" maxlength="45" name="cempstreet2" size="40" type="text" value="<?php if($row2) { echo $fetch2['cempstreet2']; } ?>" >
							<input type="button" name="btnModifyCoBo1EmpAdd" value="Modify Location" 
							onclick="enableddissabledState(this,'cempcountrySelect1','cempstateSelect1','cempcitySelect1','cempcountrySelect','cempstateSelect','cempcitySelect');" ></td>
						</tr>
						<tr>
							<td>State</td>
							<td>:</td>
							<td>
							 <input id="cempcountrySelect1" name="cempcountry1" size="20" type="text" readonly="readonly"
                                                                                        value="<?php if($row2) { echo $fetch2['cempstate']; } ?>" >

							<select id="cempcountrySelect" name="cempcountry" onchange="populateState('cempcountrySelect','cempstateSelect'); 
							populateCity('cempcountrySelect','cempcitySelect')"  <?php if($row2) { if($fetch2['cempstate']!=''){ echo 'disabled="disabled"';} } ?> size="1">
							</select></td>
						</tr>
						<tr>
							<td>District</td>
							<td>:</td>
							<td>
							 <input id="cempstateSelect1" name="cempstate1" size="20" type="text" readonly="readonly"
                              value="<?php if($row2) { echo $fetch2['cempdistrict']; } ?>"  >

							<select id="cempstateSelect" name="cempstate" size="1" <?php if($row2) { if($fetch2['cempdistrict']!=''){ echo 'disabled="disabled"';} } ?> >
							</select><script type="text/javascript">initCountry('','cempcountrySelect','cempstateSelect','cempcitySelect');</script>
							</td>
						</tr>
						<tr>
							<td>City</td>
							<td>:</td>
							<td align="left" valign="top">
							<input id="cempcitySelect1" name="cempcity1" size="20" type="text" readonly="readonly"
                                                                    value="<?php if($row2) { echo $fetch2['cempcity']; } ?>"  >

							<select id="cempcitySelect" name="cempcity" size="1" <?php if($row2) { if($fetch2['cempcity']!=''){ echo 'disabled="disabled"';} } ?> >
							</select>
							<script type="text/javascript">initCountry('','cempcountrySelect','cempstateSelect','cempcitySelect'); </script>
                     </td>
						</tr>
						<tr>
							<td>Pincode</td>
							<td>:</td>
							<td>
							<input id="cemppincode" maxlength="6" name="cemppincode" size="40" type="text" value="<?php if($row2) { echo $fetch2['cemppincode']; } ?>" ></td>
						</tr>
						<tr>
							<td>Phone No.</td>
							<td>:</td>
							<td>
							<input id="cempstdcode" maxlength="6" name="cempstdcode" size="10" type="text" value="<?php if($row2) { echo $fetch2['cempstdcode']; } ?>" >
							<input id="cempphone" maxlength="8" name="cempphone" size="24" type="text" value="<?php if($row2) { echo $fetch2['cempphone']; } ?>" ></td>
						</tr>

						<tr>
							<td>Gross Monthly Income</td>
							<td>:</td>
							<td><select id="cincome" name="cincome" size="1">
							<option >Select</option>
							<option  <?php if($row2){
								if($fetch2['cincome'] == '<=Rs.5,000')
								{        echo "selected='selected'";      }	}										     
								 ?>>&lt;=Rs.5,000</option>
							<option  <?php if($row2){
								if($fetch2['cincome'] == 'Rs.5,001-Rs.8,000')
								{        echo "selected='selected'";      }	}										     
								 ?>>Rs.5,001-Rs.8,000</option>
							<option  <?php if($row2){
								if($fetch2['cincome'] == 'Rs.8,001-Rs.10,000')
								{        echo "selected='selected'";      }	}										     
								 ?>>Rs.8,001-Rs.10,000</option>
							<option  <?php if($row2){
								if($fetch2['cincome'] == 'Rs.10,001-Rs.12,000')
								{        echo "selected='selected'";      }	}										     
								 ?>>Rs.10,001-Rs.12,000</option>
							<option  <?php if($row2){
								if($fetch2['cincome'] == 'Rs.12,001-Rs.15,000')
								{        echo "selected='selected'";      }	}										     
								 ?>>Rs.12,001-Rs.15,000</option>
							<option  <?php if($row2){
								if($fetch2['cincome'] == 'Rs.15,001-Rs.20,000')
								{        echo "selected='selected'";      }	}										     
								 ?>>Rs.15,001-Rs.20,000</option>
							<option  <?php if($row2){
								if($fetch2['cincome'] == 'Rs.20,001-Rs.30,000')
								{        echo "selected='selected'";      }	}										     
								 ?>>Rs.20,001-Rs.30,000</option>
							<option  <?php if($row2){
								if($fetch2['cincome'] == 'Rs.30,001-Rs.50,000')
								{        echo "selected='selected'";      }	}										     
								 ?>>Rs.30,001-Rs.50,000</option>
							<option  <?php if($row2){
								if($fetch2['cincome'] == '>Rs.50,000')
								{        echo "selected='selected'";      }	}										     
								 ?>>&gt;Rs.50,000</option>
							</select></td>
						</tr>
						<tr>
							<td>Any Other Outstanding Loan</td>
							<td>:</td>
							<td>
							<input id="cloan1" name="cloan" onclick="onSelectedOutstandingLoan('housing','car','jeep','twowheeler','consDurable',false)" type="radio" value="Yes"
                                                              <?php if($row2){
								if($fetch2['cloan'] == 'Yes')
								{        echo "checked='checked'";      }	}
                                                                
								 ?>  >Yes
							<input id="cloan2"  onclick="onSelectedOutstandingLoan('housing','car','jeep','twowheeler','consDurable',true)" name="cloan" type="radio" value="No"
                                                                  <?php if($row2){
								if($fetch2['cloan'] == 'No')
								{        echo "checked='checked'";      }	}
                                                                
								 ?>>No</td>
						</tr>
						<tr>
							<td valign="top">Type of Outstanding Loan</td>
							<td valign="top">:</td>
							<td>
							<table border="0">
							<tr>
									<td>
									&nbsp;</td>
									<td>
									Outstanding Amount</td>
									<td>EMI amount</td>
								</tr>

								<tr>
									<td>
									<input  id="housing" name="housing" onclick="onAssetsChecked(this,'housingamt','housingemi');calculateAmount('totamount','housingamt','caramt','jeepamt','twowheeleramt','consamt');" 
									type="checkbox" <?php if($row2){ if($fetch2['housingamt'] > 0){ echo "checked";}}?> >Housing</td>
									<td>
									<input maxlength="6" name="housingamt" id="housingamt" onchange="calculateAmount('totamount','housingamt','caramt','jeepamt','twowheeleramt','consamt')"   type="text"
                                                                                 value="<?php if($row2) { echo $fetch2['housingamt']; } ?>" ></td>
                                  									<td>
									<input maxlength="6" name="housingemi" id="housingemi"   onchange="calculateAmount('totemi','housingemi','caremi','jeepemi','twowheeleremi','consemi')" type="text"
									                                              value="<?php if($row2) { echo $fetch2['housingemi']; } ?>"   ></td>

								</tr>
								<tr>
									<td>
									<input  name="car" id="car" onclick="onAssetsChecked(this,'caramt','caremi');calculateAmount('totamount','housingamt','caramt','jeepamt','twowheeleramt','consamt');" type="checkbox"
                                                                                  <?php if($row2){ if($fetch2['caramt'] > 0){ echo "checked";}}?> >Car</td>
									<td>
									<input maxlength="6" name="caramt" id="caramt" onchange="calculateAmount('totamount','housingamt','caramt','jeepamt','twowheeleramt','consamt')"   type="text"
                                                                               value="<?php if($row2) { echo $fetch2['caramt']; } ?>" ></td>
                                    <td>
									<input maxlength="6" name="caremi" id="caremi"   onchange="calculateAmount('totemi','housingemi','caremi','jeepemi','twowheeleremi','consemi')" type="text"
									                                              value="<?php if($row2) { echo $fetch2['caremi']; } ?>" ></td>

								</tr>
								<tr>
									<td>
									<input  name="jeep" id="jeep" onclick="onAssetsChecked(this,'jeepamt','jeepemi');calculateAmount('totamount','housingamt','caramt','jeepamt','twowheeleramt','consamt');" type="checkbox"
                                                                                 <?php if($row2){ if($fetch2['jeepamt'] > 0){ echo "checked";}}?>  >Jeep</td>
									<td>
									<input maxlength="6" name="jeepamt" id="jeepamt" onchange="calculateAmount('totamount','housingamt','caramt','jeepamt','twowheeleramt','consamt')"   type="text"
                                                                                 value="<?php if($row2) { echo $fetch2['jeepamt']; } ?>"></td>
								<td>
									<input maxlength="6" name="jeepemi" id="jeepemi"   onchange="calculateAmount('totemi','housingemi','caremi','jeepemi','twowheeleremi','consemi')" type="text"
																					value="<?php if($row2) { echo $fetch2['jeepemi']; } ?>"></td>
								
								</tr>
								<tr>
									<td>
									<input  name="twowheeler" id="twowheeler" onclick="onAssetsChecked(this,'twowheeleramt','twowheeleremi');calculateAmount('totamount','housingamt','caramt','jeepamt','twowheeleramt','consamt');" type="checkbox"
                                                                               <?php if($row2){ if($fetch2['twowheeleramt'] > 0){ echo "checked";}}?> >Two-wheeler</td>
									<td>
									<input maxlength="6" name="twowheeleramt" id="twowheeleramt" onchange="calculateAmount('totamount','housingamt','caramt','jeepamt','twowheeleramt','consamt')"   type="text"
                                                                                 value="<?php if($row2) { echo $fetch2['twowheeleramt']; } ?>" ></td>
								<td>
									<input maxlength="6" name="twowheeleremi" id="twowheeleremi"   onchange="calculateAmount('totemi','housingemi','caremi','jeepemi','twowheeleremi','consemi')" type="text"
														   value="<?php if($row2) { echo $fetch2['twowheeleremi']; } ?>"></td>
								
								</tr>
								<tr>
									<td>
									<input name="consDurable" id="consDurable" onclick="onAssetsChecked(this,'consamt','consemi');calculateAmount('totamount','housingamt','caramt','jeepamt','twowheeleramt','consamt');" type="checkbox"
                                                                                 <?php if($row2){ if($fetch2['consamt'] > 0){ echo "checked";}}?> >Consumer 
									Durables</td>
									<td>
									<input maxlength="6" name="consamt" id="consamt" onchange="calculateAmount('totamount','housingamt','caramt','jeepamt','twowheeleramt','consamt')"   type="text"
                                                                                 value="<?php if($row2) { echo $fetch2['consamt']; } ?>" ></td>
                                    <td>
									<input maxlength="6" name="consemi" id="consemi"  onchange="calculateAmount('totemi','housingemi','caremi','jeepemi','twowheeleremi','consemi')" type="text"
																					value="<?php if($row2) { echo $fetch2['consemi']; } ?>" ></td>
								
								</tr>
							</table>
							</td>
						</tr>
						<tr>
							<td>Amount of Outstanding Loan</td>
							<td>:</td>
							<td>
							<input id="totamount" name="totamount"   size="40" type="text"
                                                           value="<?php if($row2) { echo $fetch2['totamt']; } ?>"       ></td>
						</tr>
						<tr>
							<td>Total EMI Amount</td>
							<td>:</td>
							<td>
							<input id="totemi"  name="totemi"   size="40" type="text"  value="<?php if($row2) { echo $fetch2['totemi']; } ?>"></td>
						</tr>

						<tr>
							<td>Average Monthly Bank Balance for Last 3 months</td>
							<td>:</td>
							<td>
							<input id="cbankbal" maxlength="6" name="cbankbal" size="40" type="text"
                                                                value="<?php if($row2) { echo $fetch2['cbankbal']; } ?>" ></td>
						</tr>
						<tr>
							<td height="5"></td>
						</tr>
						<tr>
							<td class="heading" colspan="3" style="height: 26px">
                                                            <input name="chkpanel" id="chkpanel" type="checkbox"
                                                                   <?php if(!$rowc2){ }else{ echo "checked"; }?>>Select to add Co-Borrower 2 Details</td>
						</tr>
						<tr>
							<td height="5"></td>
						</tr>
						<tr><td colspan="3"><div id="coborrower2_panel" 
                                                                     <?php if(!$rowc2){echo "style='display:none'"; }else{ echo "style='display:block'";}?>    ><table>
						<tr>
							<td>Relation with Student</td>
							<td>:</td>
							<td>
                                             <select id="corelation" name="corelation" size="1" onchange="return onSelectedIndexChange(this,'corelative')">
							<option >Select</option>
							<option <?php if($rowc2){
								if($fetchc2['relation'] == 'Father')
								{        echo "selected='selected'";      }	}										     
								 ?>>Father</option>
                                                                <option <?php if($rowc2){
								if($fetchc2['relation'] == 'Mother')
								{        echo "selected='selected'";      }	}										     
								 ?>>Mother</option>
								 <option <?php if($rowc2){
								if($fetchc2['relation'] == 'Brother')
								{        echo "selected='selected'";      }}										     
								 ?>>Brother</option>
                                                                <option <?php if($rowc2){
								if($fetchc2['relation'] == 'Sister')
								{        echo "selected='selected'";      }	}										     
								 ?>>Sister</option>
                                                                <option <?php if($rowc2){
								if($fetchc2['relation'] == 'Spouse')
								{        echo "selected='selected'";      }	}										     
								 ?>>Spouse</option>
								 <option <?php if($rowc2){
								if($fetchc2['relation'] == 'Relative')
								{        echo "selected='selected'";      }	}										     
								 ?>>Relative</option>
							</select>                                                               
                                                    <select id="corelative" name="corelative" size="1" disabled="disabled">
							<option >Select</option>
                                                            <option <?php if($rowc2){
								if($fetchc2['relative'] == 'Cousin')
								{        echo "selected='selected'";      }	}										     
								 ?>>Cousin</option>
                                                                <option <?php if($rowc2){
								if($fetchc2['relative'] == 'Paternal Uncle (Chacha)')
								{        echo "selected='selected'";      }	}										     
								 ?>>Paternal Uncle (Chacha)</option>
								 <option <?php if($rowc2){
								if($fetchc2['relative'] == 'Paternal Aunt (Chachi)')
								{        echo "selected='selected'";      }}										     
								 ?>>Paternal Aunt (Chachi)</option>
                                                                 <option <?php if($rowc2){
								if($fetchc2['relative'] == 'Maternal Uncle (Mama)')
								{        echo "selected='selected'";      }	}										     
								 ?>>Maternal Uncle (Mama)</option>
                                                                <option <?php if($rowc2){
								if($fetchc2['relative'] == 'Paternal Grandfather (Dadaji)')
								{        echo "selected='selected'";      }	}										     
								 ?>>Paternal Grandfather (Dadaji)</option>
								 <option <?php if($rowc2){
								if($fetchc2['relative'] == 'Paternal Grandmother (Dadi)')
								{        echo "selected='selected'";      }	}										     
								 ?>>Paternal Grandmother (Dadi)</option>
								 <option <?php if($rowc2){
								if($fetchc2['relative'] == 'Maternal Grandfather (Nanaji)')
								{        echo "selected='selected'";      }	}										     
								 ?>>Maternal Grandfather (Nanaji)</option>
                                 <option <?php if($rowc2){
								if($fetchc2['relative'] == 'Maternal Grandmother (Nani)')
								{        echo "selected='selected'";      }	}										     
								 ?>>Maternal Grandmother (Nani)</option>
							</select>  
                                       
							 </td>
						</tr>
						<tr>
							<td>First Name</td>
							<td>:</td>
							<td>
							<input id="cofirstname" name="cofirstname" size="40" type="text"
                                                             value="<?php if($rowc2) { echo $fetchc2['cfirstname']; } ?>"      ></td>
						</tr>
						<tr>
							<td>Middle Name</td>
							<td>:</td>
							<td>
							<input id="comiddlename" name="comiddlename" size="40" type="text" 
                                                               value="<?php if($rowc2) { echo $fetchc2['cmiddlename']; } ?>" ></td>
						</tr>
						<tr>
							<td>Last Name</td>
							<td>:</td>
							<td>
							<input id="colastname" name="colastname" size="40" type="text" 
                                                               value="<?php if($rowc2) { echo $fetchc2['clastname']; } ?>"></td>
						</tr>
						<tr>
							<td>Date of Birth</td>
							<td>:</td>
							<td>
							<input id="datepicker3" name="datepicker3" size="40" type="text"
                                                               value="<?php if($rowc2) { $originaldate=  $fetchc2['cdob']; 
                                                               
                                                               $newdate=date("d-m-Y",strtotime($originaldate));
                                                               echo $newdate; } ?>"></td>
						</tr>
						<tr>
							<td>PAN No.</td>
							<td>:</td>
							<td>
							<input id="copanno" maxlength="10" name="copanno" size="40" type="text"
                                                               value="<?php if($rowc2) { echo $fetchc2['cpanno']; } ?>" ></td>
						</tr>
						<tr>
							<td>Email Address</td>
							<td>:</td>
							<td>
							<input id="coemail" name="coemail" size="40" type="text" 
                                                                value="<?php if($rowc2) { echo $fetchc2['cemail']; } ?>" ></td>
						</tr>
						<tr>
							<td height="5"></td>
						</tr>
						<tr>
							<td bgcolor="#E6F0FA" colspan="3">
							<input name="cosame" onclick="return onclickCoSameAddress(this)" type="checkbox"  <?php if($rowc2){
								if($fetchc2['samestudadd'] == 'on')
								{        echo "checked='checked'";      }	}
                                                                
								 ?>>Same 
							as Student's Address</td>
						</tr>
						<tr>
							<td height="5"></td>
						</tr>
						<tr>
							<td>Address</td>
							<td>:</td>
							<td>
							<input id="coaddress" name="coaddress" size="40" type="text"
                                                              value="<?php if($rowc2) { echo $fetchc2['caddress']; } ?>"  ></td>
						</tr>
						<tr>
							<td>Street1</td>
							<td>:</td>
							<td>
							<input id="costreet1" name="costreet1" size="40" type="text" 
                                                                 value="<?php if($rowc2) { echo $fetchc2['cstreet1']; } ?>"></td>
						</tr>
						<tr>
							<td>Street2 (optional)</td>
							<td>:</td>
							<td>
							<input id="costreet2" name="costreet2" size="40" type="text"
                                                                 value="<?php if($rowc2) { echo $fetchc2['cstreet2']; } ?>">
                                                        <input type="button" name="btnModifyCountry" value="Modify Location" 
                            onclick="enableddissabledState(this,'cocountry1','costate1','cocity1','cocountrySelect','costateSelect','cocitySelect');" >          
                                                               
                                                        </td>
						</tr>
						<tr>
							<td>State</td>
							<td>:</td>
							<td>
							
                                                        
                            <input id="cocountry1" name="cocountry1"  type="text" readonly="readonly"
                                                       value="<?php if($rowc2) { echo $fetchc2['cstate']; } ?>"  >
                           <select disabled="disabled" id="cocountrySelect" name="cocountry" onchange="populateState('cocountrySelect','costateSelect'); populateCity('cocountrySelect','cocitySelect')" size="1">
							</select>
                                                        
                                                        </td>
						</tr>
						<tr>
							<td>District</td>
							<td>:</td>
							<td>
                                <input id="costate1" name="costate1" type="text" readonly="readonly"
                                  value="<?php if($rowc2) { echo $fetchc2['cdistrict']; } ?>"  >
                 
               <select id="costateSelect" disabled="disabled" name="costate" size="1"></select>
               <script type="text/javascript">initCountry('','cocountrySelect','costateSelect','cocitySelect');</script>

							</td>
						</tr>
						<tr>
							<td>City</td>
							<td>:</td>
							<td align="left" valign="top">
			<input id="cocity1" name="cocity1"  type="text" readonly="readonly"
                                                       value="<?php if($rowc2) { echo $fetchc2['ccity']; } ?>"  >
                       <select id="cocitySelect" disabled="disabled" name="cocity" size="1">
							</select>
							<script type="text/javascript">initCountry('','cocountrySelect','costateSelect','cocitySelect'); </script>

                                                        </td>
						</tr>
						<tr>
							<td>Pincode</td>
							<td>:</td>
							<td>
							<input id="copincode" maxlength="6" name="copincode" size="40" type="text"
                                                               value="<?php if($rowc2) { echo $fetchc2['cpincode']; } ?>" ></td>
						</tr>
						<tr>
							<td>Phone No.</td>
							<td>:</td>
							<td>
							<input id="costdcode" maxlength="6" name="costdcode" size="10" type="text"
                                                               value="<?php if($rowc2) { echo $fetchc2['cstdcode']; } ?>" >
							<input id="cophone" maxlength="8" name="cophone" size="24" type="text"
                                                               value="<?php if($rowc2) { echo $fetchc2['cphone']; } ?>" ></td>
						</tr>
						<tr>
							<td>Mobile No.</td>
							<td>:</td>
							<td>
							<input id="comobile" maxlength="10" name="comobile" size="40" type="text"
                                                               value="<?php if($rowc2) {if( $fetchc2['cmobile']!='0') {echo $fetchc2['cmobile'];} } ?>" ></td>
						</tr>
						<tr>
							<td>Alternate Contact No.</td>
							<td>:</td>
							<td>
							<input id="cophone1" maxlength="14" name="cophone1" size="40" type="text"
                                                                 value="<?php if($rowc2) {if($fetchc2['cphone1'] !='0'){ echo $fetchc2['cphone1'];} } ?>"  ></td>
						</tr>
						<tr>
							<td>Type of Employment</td>
							<td>:</td>
							<td>
							<select id="coemployment" name="coemployment" size="1">
							<option >Select</option>
							<option <?php if($rowc2){
								if($fetchc2['cemployment'] == 'Salaried')
								{        echo "selected='selected'";      }	}										     
								 ?>>Salaried</option>
							<option  <?php if($rowc2){
								if($fetchc2['cemployment'] == 'Self Employed')
								{        echo "selected='selected'";      }	}										     
								 ?>>Self Employed</option>
							</select></td>
						</tr>
						<tr>
							<td>Name of Employer/Business</td>
							<td>:</td>
							<td>
							<input id="cobusiness" name="cobusiness" maxlength="150" size="40" type="text"
                                                                 value="<?php if($rowc2) { echo $fetchc2['cbusiness']; } ?>"  ></td>
						</tr>
						<tr>
							<td>Designation</td>
							<td>:</td>
							<td>
							<input id="codesignation" maxlength="50" name="codesignation" size="40" type="text"
                                                                  value="<?php if($rowc2) { echo $fetchc2['cdesignation']; } ?>"  ></td>
						</tr>
						<tr>
							<td>Employment Address</td>
							<td>:</td>
							<td>
							<input id="coempaddress" maxlength="45" name="coempaddress" size="40" type="text" value="<?php if($rowc2) { echo $fetchc2['cempaddress']; } ?>" ></td>
						</tr>
						<tr>
							<td>Street1</td>
							<td>:</td>
							<td>
							<input id="coempstreet1" maxlength="45" name="coempstreet1" size="40" type="text" value="<?php if($rowc2) { echo $fetchc2['cempstreet1']; } ?>" ></td>
						</tr>
						<tr>
							<td>Street2 (optional)</td>
							<td>:</td>
							<td>
							<input id="coempstreet2" maxlength="45" name="coempstreet2" size="40" type="text" value="<?php if($rowc2) { echo $fetchc2['cempstreet2']; } ?>" >
							<input type="button" name="btnModifyCOBo2EmpAdd" value="Modify Location" 
							onclick="enableddissabledState(this,'coempcountrySelect1','coempstateSelect1','coempcitySelect1','coempcountrySelect','coempstateSelect','coempcitySelect');" ></td>
						</tr>
						<tr>
							<td>State</td>
							<td>:</td>
							<td>
							 <input id="coempcountrySelect1" name="coempcountry1" size="20" type="text" readonly="readonly"
                         value="<?php if($rowc2) { echo $fetchc2['cempstate']; } ?>" >

							<select id="coempcountrySelect" name="coempcountry" onchange="populateState('coempcountrySelect','coempstateSelect'); 
							populateCity('coempcountrySelect','coempcitySelect')" <?php if($rowc2) { if($fetchc2['cempstate']!=''){ echo 'disabled="disabled"';} } ?> disabled="disabled" size="1">
							</select></td>
						</tr>
						<tr>
							<td>District</td>
							<td>:</td>
							<td>
							 <input id="coempstateSelect1" name="coempstate1" size="20" type="text" readonly="readonly"
                               value="<?php if($rowc2) { echo $fetchc2['cempdistrict']; } ?>"  >

							<select id="coempstateSelect" name="coempstate" size="1" <?php if($rowc2) { if($fetchc2['cempdistrict']!=''){ echo 'disabled="disabled"';} } ?>
                                                                disabled="disabled">
							</select><script type="text/javascript">initCountry('','coempcountrySelect','coempstateSelect','coempcitySelect');</script>
							</td>
						</tr>
						<tr>
							<td>City</td>
							<td>:</td>
							<td align="left" valign="top">
							<input id="coempcitySelect1" name="coempcity1" size="20" type="text" readonly="readonly"
                              value="<?php if($rowc2) { echo $fetchc2['cempcity']; } ?>"  >

							<select id="coempcitySelect" name="coempcity" size="1" <?php if($rowc2) { if($fetchc2['cempcity']!=''){ echo 'disabled="disabled"';} } ?>
                                                                disabled="disabled">
							</select>
							<script type="text/javascript">initCountry('','coempcountrySelect','coempstateSelect','coempcitySelect'); </script></td>
						</tr>
						<tr>
							<td>Pincode</td>
							<td>:</td>
							<td>
							<input id="coemppincode" maxlength="6" name="coemppincode" size="40" type="text" value="<?php if($rowc2) { echo $fetchc2['cemppincode']; } ?>" ></td>
						</tr>
						<tr>
							<td>Phone No.</td>
							<td>:</td>
							<td>
							<input id="coempstdcode" maxlength="6" name="coempstdcode" size="10" type="text" value="<?php if($rowc2) { echo $fetchc2['cempstdcode']; } ?>" >
							<input id="coempphone" maxlength="8" name="coempphone" size="24" type="text" value="<?php if($rowc2) { echo $fetchc2['cempphone']; } ?>" ></td>
						</tr>

						<tr>
							<td>Gross Monthly Income</td>
							<td>:</td>
							<td><select id="coincome" name="coincome" size="1">
							<option >Select</option>
							<option <?php if($rowc2){
								if($fetchc2['cincome'] == '<=Rs.5,000')
								{        echo "selected='selected'";      }	}										     
								 ?>>&lt;=Rs.5,000</option>
							<option <?php if($rowc2){
								if($fetchc2['cincome'] == 'Rs.5,001-Rs.8,000')
								{        echo "selected='selected'";      }	}										     
								 ?>>Rs.5,001-Rs.8,000</option>
							<option <?php if($rowc2){
								if($fetchc2['cincome'] == 'Rs.8,001-Rs.10,000')
								{        echo "selected='selected'";      }	}										     
								 ?>>Rs.8,001-Rs.10,000</option>
							<option <?php if($rowc2){
								if($fetchc2['cincome'] == 'Rs.10,001-Rs.12,000')
								{        echo "selected='selected'";      }	}										     
								 ?>>Rs.10,001-Rs.12,000</option>
							<option <?php if($rowc2){
								if($fetchc2['cincome'] == 'Rs.12,001-Rs.15,000')
								{        echo "selected='selected'";      }	}										     
								 ?>>Rs.12,001-Rs.15,000</option>
							<option <?php if($rowc2){
								if($fetchc2['cincome'] == 'Rs.15,001-Rs.20,000')
								{        echo "selected='selected'";      }	}										     
								 ?>>Rs.15,001-Rs.20,000</option>
							<option <?php if($rowc2){
								if($fetchc2['cincome'] == 'Rs.20,001-Rs.30,000')
								{        echo "selected='selected'";      }	}										     
								 ?>>Rs.20,001-Rs.30,000</option>
							<option <?php if($rowc2){
								if($fetchc2['cincome'] == 'Rs.30,001-Rs.50,000')
								{        echo "selected='selected'";      }	}										     
								 ?>>Rs.30,001-Rs.50,000</option>
							<option <?php if($rowc2){
								if($fetchc2['cincome'] == '>Rs.50,000')
								{        echo "selected='selected'";      }	}										     
								 ?>>&gt;Rs.50,000</option>
							</select></td>
						</tr>
						<tr>
							<td>Any Other Outstanding Loan</td>
							<td>:</td>
							<td>
							<input id="coloan1" name="coloan"  type="radio" value="Yes" 
							onclick="onSelectedOutstandingLoan('cohousing','cocar','cojeep','cotwowheeler','coconsDurable',false)"                                                           
                                <?php if($rowc2){
								if($fetchc2['cloan'] == 'Yes')
								{        echo "checked='checked'";      }	}
                                                                
								 ?>  >Yes
							<input id="coloan2"  name="coloan" type="radio"   value="No"  onclick="onSelectedOutstandingLoan('cohousing','cocar','cojeep','cotwowheeler','coconsDurable',true)" 
                                                            <?php if($rowc2){
								if($fetchc2['cloan'] == 'No')
								{        echo "checked='checked'";      }	}
                                                                
								 ?>   >No</td>
						</tr>
						<tr>
							<td valign="top">Type of Outstanding Loan</td>
							<td valign="top">:</td>
							<td>
							<table border="0">
							<tr>
									<td>
									</td>
									<td>
									Outstanding Amount</td>
									<td>EMI amount</td>
								</tr>

								<tr>
									<td>
									<input  id="cohousing" name="cohousing" type="checkbox" onclick="onAssetsChecked(this,'cohousingamt','cohousingemi');calculateAmount('cototamount','cohousingamt','cocaramt','cojeepamt','cotwowheeleramt','coconsamt');"
									<?php if($rowc2){ if($fetchc2['housingamt'] > 0){ echo "checked";}}?> >Housing</td>
									<td>
									<input maxlength="6" name="cohousingamt" id="cohousingamt" type="text" 
                                                                               onchange="calculateAmount('cototamount','cohousingamt','cocaramt','cojeepamt','cotwowheeleramt','coconsamt')"
                                                                             value="<?php if($rowc2) { echo $fetchc2['housingamt']; } ?>"     ></td>
                                      <td>									
									<input maxlength="6"  id="cohousingemi" name="cohousingemi" onchange="calculateAmount('cototemi','cohousingemi','cocaremi','cojeepemi','cotwowheeleremi','coconsemi')" type="text"
									                                          value="<?php if($rowc2) { echo $fetchc2['housingemi']; } ?>"  ></td>
								
								</tr>
								<tr>
									<td>
									<input  name="cocar" id="cocar" type="checkbox" onclick="onAssetsChecked(this,'cocaramt','cocaremi');calculateAmount('cototamount','cohousingamt','cocaramt','cojeepamt','cotwowheeleramt','coconsamt');"
									<?php if($rowc2){ if($fetchc2['caramt'] > 0){ echo "checked";}}?>   >Car</td>
									<td>
									<input maxlength="6" name="cocaramt" id="cocaramt" type="text"
                                                                               onchange="calculateAmount('cototamount','cohousingamt','cocaramt','cojeepamt','cotwowheeleramt','coconsamt')"
                                                                                value="<?php if($rowc2) { echo $fetchc2['caramt']; } ?>" ></td>
                                  <td>
									
									<input maxlength="6"  id="cocaremi"  name="cocaremi" onchange="calculateAmount('cototemi','cohousingemi','cocaremi','cojeepemi','cotwowheeleremi','coconsemi')" type="text"
									 											value="<?php if($rowc2) { echo $fetchc2['caremi']; } ?>" 	></td>
								
								</tr>
								<tr>
									<td>
									<input  id="cojeep" name="cojeep" type="checkbox" onclick="onAssetsChecked(this,'cojeepamt','cojeepemi');calculateAmount('cototamount','cohousingamt','cocaramt','cojeepamt','cotwowheeleramt','coconsamt');"
                                                                                <?php if($rowc2){ if($fetchc2['jeepamt'] > 0){ echo "checked";}}?> >Jeep</td>
									<td>
									<input maxlength="6" name="cojeepamt" id="cojeepamt"  type="text" onchange="calculateAmount('cototamount','cohousingamt','cocaramt','cojeepamt','cotwowheeleramt','coconsamt')"
                                                                               value="<?php if($rowc2) { echo $fetchc2['jeepamt']; } ?>" ></td>
                                                                                <td>
									<input maxlength="6" name="cojeepemi" id="cojeepemi" onchange="calculateAmount('cototemi','cohousingemi','cocaremi','cojeepemi','cotwowheeleremi','coconsemi')" type="text"
									                  							 value="<?php if($rowc2) { echo $fetchc2['jeepemi']; } ?>" ></td>

								</tr>
								<tr>
									<td>
									<input name="cotwowheeler" id="cotwowheeler" type="checkbox" onclick="onAssetsChecked(this,'cotwowheeleramt','cotwowheeleremi');calculateAmount('cototamount','cohousingamt','cocaramt','cojeepamt','cotwowheeleramt','coconsamt');"
                                                                                 <?php if($rowc2){ if($fetchc2['twowheeleramt'] > 0){ echo "checked";}}?> >Two-wheeler</td>
									<td>
									<input maxlength="6" name="cotwowheeleramt" id="cotwowheeleramt" type="text" onchange="calculateAmount('cototamount','cohousingamt','cocaramt','cojeepamt','cotwowheeleramt','coconsamt')"
                                                                                value="<?php if($rowc2) { echo $fetchc2['twowheeleramt']; } ?>" ></td>
                                     <td>
									<input maxlength="6" name="cotwowheeleremi" id="cotwowheeleremi" onchange="calculateAmount('cototemi','cohousingemi','cocaremi','cojeepemi','cotwowheeleremi','coconsemi')" type="text"
																				 value="<?php if($rowc2) { echo $fetchc2['twowheeleremi']; } ?>" ></td>


								</tr>
								<tr>
									<td>
									<input name="coconsDurable" id="coconsDurable" type="checkbox"  onclick="onAssetsChecked(this,'coconsamt','coconsemi');calculateAmount('cototamount','cohousingamt','cocaramt','cojeepamt','cotwowheeleramt','coconsamt');"
                                                                               <?php if($rowc2){ if($fetchc2['consamt'] > 0){ echo "checked";}}?>  >Consumer 
									Durables</td>
									<td>
									<input maxlength="6" name="coconsamt" id="coconsamt" type="text" onchange="calculateAmount('cototamount','cohousingamt','cocaramt','cojeepamt','cotwowheeleramt','coconsamt')"
                                                                                value="<?php if($rowc2) { echo $fetchc2['consamt']; } ?>" ></td>
								 <td>
									<input maxlength="6" name="coconsemi" id="coconsemi" onchange="calculateAmount('cototemi','cohousingemi','cocaremi','cojeepemi','cotwowheeleremi','coconsemi')" type="text"
																					 value="<?php if($rowc2) { echo $fetchc2['consemi']; } ?>" ></td>
								</tr>
							</table>
							</td>
						</tr>
						<tr>
							<td>Amount of Outstanding Loan</td>
							<td>:</td>
							<td>
							<input id="cototamount" name="cototamount" readonly="readonly" size="40" type="text" 
                                                               value="<?php if($rowc2) { echo $fetchc2['totamt']; } ?>"   ></td>
						</tr>
						<tr>							
							<td>Total EMI</td>
							<td>:</td>
							<td>
							<input id="cototemi" name="cototemi" readonly="readonly" size="40" type="text"
							value="<?php if($rowc2) { echo $fetchc2['totemi']; } ?>"></td>
						</tr>

						<tr>
							<td>Average Monthly Bank Balance for Last 3 months</td>
							<td>:</td>
							<td>
							<input id="cobankbal" maxlength="6" name="cobankbal" size="40" type="text" 
                                                          value="<?php if($rowc2) { echo $fetchc2['cbankbal']; } ?>"      ></td>
						</tr>
						</table></div></td></tr>
						<tr>
							<td height="5"></td>
						</tr>
						<tr>
							<td class="heading" colspan="3">Contact Preference</td>
						</tr>
						<tr>
							<td height="5"></td>
						</tr>
						<tr>
							<td valign="top">Best Day to Call You Regarding Loan</td>
							<td valign="top">:</td>
							<td>
							<table width="100%">
								<tr>
									<td><input name="anyday" type="checkbox" 
                                                                                    <?php 
                                                        $prefer_day =$fetch['prefer_day'];
                                                             
                                                               $str =explode(".",$prefer_day);
                                                              
                                                               if(in_array('Any Day', $str)){ echo "checked='checked'"; }
                                                           
                                                               
                                                       ?>>Any 
									Day</td>
									<td><input name="monday" type="checkbox"
                                                                                   <?php 
                                                        $prefer_day =$fetch['prefer_day'];
                                                             
                                                               $str =explode(".",$prefer_day);
                                                              
                                                               if(in_array('Monday', $str)){ echo "checked='checked'"; }
                                                           
                                                               
                                                       ?> >Monday</td>
								</tr>
								<tr>
									<td><input name="tuesday" type="checkbox"
                                                                                                                  <?php 
                                                        $prefer_day =$fetch['prefer_day'];
                                                             
                                                               $str =explode(".",$prefer_day);
                                                              
                                                               if(in_array('Tuesday', $str)){ echo "checked='checked'"; }
                                                           
                                                               
                                                       ?> >Tuesday</td>
									<td><input name="wednesday" type="checkbox"
                                                                                                                                            <?php 
                                                        $prefer_day =$fetch['prefer_day'];
                                                             
                                                               $str =explode(".",$prefer_day);
                                                              
                                                               if(in_array('Wednesday', $str)){ echo "checked='checked'"; }
                                                           
                                                               
                                                       ?> >Wednesday</td>
								</tr>
								<tr>
									<td><input name="thursday" type="checkbox"
                                                                                                  <?php 
                                                        $prefer_day =$fetch['prefer_day'];
                                                             
                                                               $str =explode(".",$prefer_day);
                                                              
                                                               if(in_array('Thursday', $str)){ echo "checked='checked'"; }
                                                           
                                                               
                                                       ?> >Thursday</td>
									<td><input name="friday" type="checkbox" 
                                                                                      <?php 
                                                        $prefer_day =$fetch['prefer_day'];
                                                             
                                                               $str =explode(".",$prefer_day);
                                                              
                                                               if(in_array('Friday', $str)){ echo "checked='checked'"; }
                                                           
                                                               
                                                       ?> >Friday</td>
								</tr>
								<tr>
									<td><input name="saturday" type="checkbox"
                                                                                                              <?php 
                                                        $prefer_day =$fetch['prefer_day'];
                                                             
                                                               $str =explode(".",$prefer_day);
                                                              
                                                               if(in_array('Saturday', $str)){ echo "checked='checked'"; }
                                                           
                                                               
                                                       ?>     >Saturday</td>
									<td><input name="sunday" type="checkbox" 
                                                                                                         <?php 
                                                        $prefer_day =$fetch['prefer_day'];
                                                             
                                                               $str =explode(".",$prefer_day);
                                                              
                                                               if(in_array('Sunday', $str)){ echo "checked='checked'"; }
                                                           
                                                               
                                                       ?> >Sunday</td>
								</tr>
							</table>
							</td>
						</tr>
						<tr>
							<td valign="top">Best Time to Call You Regarding Loan</td>
							<td valign="top">:</td>
							<td>
							<table>
    <tr>
            <td><input name="anytime" type="checkbox"
                <?php $prefer_time =$fetch['prefer_time'];
                      $str =explode(".",$prefer_time);
                       if(in_array('Any Time', $str)){ echo "checked='checked'"; }?> >Any Time
            </td>
    </tr>
    <tr>
        <td>
        <input name="morning" onclick="return onTimeChecked(this,'morning_time')" type="checkbox"
           <?php 
            $prefer_time =$fetch['prefer_time'];
            $str =explode(".",$prefer_time);

                     if(in_array('08 AM to 09 AM', $str)){ echo "checked='checked'"; }
                else if(in_array('09 AM to 10 AM', $str)){ echo "checked='checked'"; }
                else if(in_array('10 AM to 11 AM', $str)){ echo "checked='checked'"; }
                else if(in_array('11 AM to 12 PM', $str)){ echo "checked='checked'"; }?> >Morning
        </td>


        <td>
        <select disabled="disabled" name="morning_time" id="morning_time">
        <option>Select</option>
        <option
              <?php 
                    $prefer_time =$fetch['prefer_time'];
                    $str =explode(".",$prefer_time);
                    if(in_array('08 AM to 09 AM', $str)){ echo "selected='selected'"; }     
                ?> >08 AM to 09 AM
        </option>
        <option 
              <?php 
                    $prefer_time =$fetch['prefer_time'];
                    $str =explode(".",$prefer_time);
                    if(in_array('09 AM to 10 AM', $str)){ echo "selected='selected'"; }     
                ?> >09 AM to 10 AM
        </option>
        <option 
             <?php 
                    $prefer_time =$fetch['prefer_time'];
                    $str =explode(".",$prefer_time);
                    if(in_array('10 AM to 11 AM', $str)){ echo "selected='selected'"; }     
                ?> >10 AM to 11 AM
        </option>
        <option
             <?php 
                    $prefer_time =$fetch['prefer_time'];
                    $str =explode(".",$prefer_time);
                    if(in_array('11 AM to 12 PM', $str)){ echo "selected='selected'"; }     
                ?>  >11 AM to 12 PM
        </option>
       </select>
        </td>
    </tr>
    <tr>
        <td>
        <input name="afternoon" onclick="return onTimeChecked(this,'afternoon_time')" type="checkbox"
           <?php 
            $prefer_time =$fetch['prefer_time'];

                    $str =explode(".",$prefer_time);

                    if(in_array('12 PM to 01 PM', $str)){ echo "checked='checked'"; }
                    else if(in_array('01 PM to 02 PM', $str)){ echo "checked='checked'"; }
                else if(in_array('02 PM to 03 PM', $str)){ echo "checked='checked'"; }
                    else if(in_array('03 PM to 04 PM', $str)){ echo "checked='checked'"; }

            ?> >Afternoon</td>
            <td>
            <select disabled="disabled" name="afternoon_time" id="afternoon_time">
            <option>Select</option>
            <option                 <?php 
            $prefer_time =$fetch['prefer_time'];
                    $str =explode(".",$prefer_time);
                    if(in_array('12 PM to 01 PM', $str)){ echo "selected='selected'"; }     
                ?> >12 PM to 01 PM</option>
                            <option 
                                        <?php 
            $prefer_time =$fetch['prefer_time'];
                    $str =explode(".",$prefer_time);
                    if(in_array('01 PM to 02 PM', $str)){ echo "selected='selected'"; }     
                ?> >01 PM to 02 PM</option>
                            <option 
                                                            <?php 
            $prefer_time =$fetch['prefer_time'];
                    $str =explode(".",$prefer_time);
                    if(in_array('02 PM to 03 PM', $str)){ echo "selected='selected'"; }     
                ?>  >02 PM to 03 PM</option>
                            <option 
                                                                                    <?php 
            $prefer_time =$fetch['prefer_time'];
                    $str =explode(".",$prefer_time);
                    if(in_array('03 PM to 04 PM', $str)){ echo "selected='selected'"; }     
                ?>  >03 PM to 04 PM</option>
                            </select></td>
                    </tr>
                    <tr>
                    <td>
                    <input name="evening" onclick="return onTimeChecked(this,'evening_time')" type="checkbox"
                                                    <?php 
            $prefer_time =$fetch['prefer_time'];

                    $str =explode(".",$prefer_time);

                    if(in_array('04 PM to 05 PM', $str)){ echo "checked='checked'"; }
                    else if(in_array('05 PM to 06 PM', $str)){ echo "checked='checked'"; }
                else if(in_array('06 PM to 07 PM', $str)){ echo "checked='checked'"; }
                    else if(in_array('07 PM to 08 PM', $str)){ echo "checked='checked'"; }

            ?>  >Evening</td>
        <td>
        <select disabled="disabled" name="evening_time" id="evening_time">
        <option>Select</option>
        <option 
                                <?php 
            $prefer_time =$fetch['prefer_time'];
                    $str =explode(".",$prefer_time);
                    if(in_array('04 PM to 05 PM', $str)){ echo "selected='selected'"; }     
                ?> >04 PM to 05 PM</option>
                            <option 
                            <?php 
            $prefer_time =$fetch['prefer_time'];
                    $str =explode(".",$prefer_time);
                    if(in_array('05 PM to 06 PM', $str)){ echo "selected='selected'"; }     
                ?> >05 PM to 06 PM</option>
                            <option 
                                <?php 
            $prefer_time =$fetch['prefer_time'];
                    $str =explode(".",$prefer_time);
                    if(in_array('06 PM to 07 PM', $str)){ echo "selected='selected'"; }     
                ?> >06 PM to 07 PM</option>
                            <option
                            <?php 
            $prefer_time =$fetch['prefer_time'];
                    $str =explode(".",$prefer_time);
                    if(in_array('07 PM to 08 PM', $str)){ echo "selected='selected'"; }     
                ?> >07 PM to 08 PM</option>
                            </select></td>
                    </tr>
            </table>
            </td>
</tr>
						<tr>
							<td height="5"></td>
						</tr>
						</td></tr>
                     			
						<tr>
							<td align="center" colspan="3">
							<input id="submit" name="submit" type="submit" value="Submit">
							
                                                         <input name="btnBack" type="button" value="Back" onclick="history.back();return false;" /></td>
						</tr>
                                                
<?php require_once("./common/ListOfDocuments.php"); ?>                                                    
            <tr><td><input type="hidden" name="no" value="<?php echo $_POST['myradio']; ?>" />
                            </td></tr>
            <tr>
                    <td height="20"></td>
            </tr>
    </table>					

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

</body>

</html>
<?php ob_flush(); ?>