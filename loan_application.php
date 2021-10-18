


<?php

session_start();


             include('./connection.php');

          include('common/class_Common.php');
						  
             $objCommon=new Common();


function _generateRandom($length=6)

{



$_rand_src = array(

		array(48,57) //digits

		, array(97,122) //lowercase chars

		, array(65,90) //uppercase charsc

	);

	srand ((double) microtime() * 1000000);

	$random_string = "";

	for($i=0;$i<$length;$i++){

		$i1=rand(0,sizeof($_rand_src)-1);

		$random_string .= chr(rand($_rand_src[$i1][0],$_rand_src[$i1][1]));

	}

	return $random_string;

	

	



}

$rand = _generateRandom(6);

$_SESSION['captcha'] = $rand;

       $select_entrancetest=mysql_query("SELECT id,TestName FROM entrancetest_list");
	   
	    //select id for course in application_scoringfields_list table
            $courseid=$objCommon->getIdofrecord('application_scoringfields_list','actual_field_name','course');
			
			$collegeid=$objCommon->getIdofrecord('application_scoringfields_list','actual_field_name','college');
			
			$universityid=$objCommon->getIdofrecord('application_scoringfields_list','actual_field_name','university');
          

	   if(isset($_SESSION['mobile']))
        {		
          $registeredmobile=$_SESSION['mobile'];
		}
         elseif(isset($_GET['mob']))
          {
			  $mob=$_GET['mob'];
			  
			  //decode
          $registeredmobile = base64_decode(strtr($mob, '-_', '+*'));
         }
         else 
		 {
            $registeredmobile='';

         }		 
		  
		  
		   $query = "select id,firstname,lastname,email,mobile,prevCourse,prevUniversity,college,course,amount,loantype,typeofLoan,vehicleloanType,state,district,city,created from registration_details 
		     where mobile = '$registeredmobile'";
			 
			 //echo  $query ;

           $select_record1 = mysql_query($query);

           $row= mysql_fetch_row($select_record1);
		   if($row)

            {

                $col = array('id','firstname','lastname','email','mobile','prevCourse','prevUniversity','college','course','amount','loantype',
				'typeofLoan','vehicleloanType','state','district','city','created');
                $fetch = array_combine($col,$row); 
		   
		   
		   }
		   
		   $amount=$fetch['amount'];
		   
		   //select online_applicationfieldslist to show fileds according to the loan amount
		   $select_query="select *  from online_applicationfieldslist where $amount between loanRange_From and loanRange_To";
		   
           $query_result= mysql_query($select_query);
		   
		   $fetchinfo= mysql_fetch_array($query_result);
		   
		   
		    //select online_applicationfieldslist to show fileds according to the loan amount
		   $select_query1="select *  from online_application_cob_fieldslist where $amount between loanRange_From and loanRange_To";
		  
           $query_result1= mysql_query($select_query1);
		   
		   $fetchinfo1= mysql_fetch_array($query_result1);
		   
		   
		   
		   if($fetch['loantype']=='Others')	
					{
								
			             $otherloans='yes';
					}
					else
					{
						$otherloans='No';
						
					}

					
?>




<!doctype html>
<html lang="en">
<head>
 
 
  
 
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

<link type="text/css" href="css/cupertino/jquery-ui-1.8.16.custom.css" rel="stylesheet">

<script language="javascript" src="js/copy_state.js" type="text/javascript"> </script>

<script language="javascript" src="js/loanApplication.js" type="text/javascript">

 </script>

<script language="javascript" src="js/jquery-1.6.2.min.js" type="text/javascript">

 </script>

 <script language="javascript" src="js/common.js" type="text/javascript">

 </script>

<script language="javascript" src="js/jquery-ui-1.8.16.custom.min.js" type="text/javascript">

</script>

  <!--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">--->
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
  
  <script>
  $( function() {
     $( "#tabs" ).tabs();
	 
	  } );
  </script>

 <script type="text/javascript">
                $(document).ready(function(){
                    $("#stdcode").autocomplete({
					source:'getautocomplete.php?term='+ $('#stdcode').val()+'&field=stdcode&table=stdcode_list',
                        minLength:1
                    });
                });
				
				$(document).ready(function(){
                    $("#prevUniversity").autocomplete({
					source:'getautocomplete.php?term='+ $('#prevUniversity').val()+'&field=prevUniversity&table=student_details',
                        minLength:1
                    });
                });
				
				$(document).ready(function(){
                    $("#prevCollege").autocomplete({
					source:'getautocomplete.php?term='+ $('#prevUniversity').val()+'&field=prevCollege&table=student_details',
                        minLength:1
                    });
                });
				
				$(document).ready(function(){
                    $("#university").autocomplete({
					source:'getautocomplete.php?term='+ $('#university').val()+'&field=options&table=options_scoring_list&fieldname=field_id&id=<?php echo $universityid;?>',
                        minLength:1
                    });
                });
				
				$(document).ready(function(){
                    $("#college").autocomplete({
					
					source:'getautocomplete.php?term='+ $('#college').val()+'&field=options&table=options_scoring_list&fieldname=field_id&id=<?php echo $collegeid;?>',
                        minLength:1
                    });
                });
				$(document).ready(function(){
                    $("#course").autocomplete({
					
					source:'getautocomplete.php?term='+ $('#course').val()+'&field=options&table=options_scoring_list&fieldname=field_id&id=<?php echo $courseid;?>',
                        minLength:1
                    });
                });
        
        
                $(document).ready(function(){
                    $("#Colstdcode").autocomplete({
                        source:'getautocomplete.php?term='+ $('#stdcode').val()+'&field=stdcode&table=stdcode_list',
                        minLength:1
                    });
                });
				
				 $(document).ready(function(){
                    $("#Empstdcode").autocomplete({
                        source:'getautocomplete.php?term='+ $('#stdcode').val()+'&field=stdcode&table=stdcode_list',
                        minLength:1
                    });
                });
				
				 $(document).ready(function(){
                    $("#cstdcode").autocomplete({
                        source:'getautocomplete.php?term='+ $('#stdcode').val()+'&field=stdcode&table=stdcode_list',
                        minLength:1
                    });
                });
				 $(document).ready(function(){
                    $("#cempstdcode").autocomplete({
                        source:'getautocomplete.php?term='+ $('#stdcode').val()+'&field=stdcode&table=stdcode_list',
                        minLength:1
                    });
                });
				 $(document).ready(function(){
                    $("#costdcode").autocomplete({
                       source:'getautocomplete.php?term='+ $('#stdcode').val()+'&field=stdcode&table=stdcode_list',
                        minLength:1
                    });
                });
				 $(document).ready(function(){
                    $("#coempstdcode").autocomplete({
                        source:'getautocomplete.php?term='+ $('#stdcode').val()+'&field=stdcode&table=stdcode_list',
                        minLength:1
                    });
                });
				
				 
        </script>
		
		
		<script>
		$(document).ready(function(){
		
        $("#Percentage").show();
		$("#CGPA_Grade").hide();
		$("#CGPA_Gradepoints").hide();
		$("#CGPA_outof_GradePoint").hide();
		$("#outof").hide();
   
    $("#marksinPercentage").click(function(){
        $("#Percentage").show();
		$("#CGPA_Grade").hide();
		$("#CGPA_Gradepoints").hide();
		$("#CGPA_outof_GradePoint").hide();
		$("#outof").hide();
    });
	$("#marksingrade").click(function(){
        $("#Percentage").hide();
		$("#CGPA_Grade").show();
		$("#CGPA_Gradepoints").hide();
		$("#CGPA_outof_GradePoint").hide();
		$("#outof").hide();
    });
	
	$("#marksingradepoints").click(function(){
        $("#Percentage").hide();
		$("#CGPA_Grade").hide();
		$("#CGPA_Gradepoints").show();
		$("#CGPA_outof_GradePoint").show();
		$("#outof").show();
    });
	});
</script>


		<script type="text/javascript">

			$(function()

			{

			$( "#datepicker" ).datepicker({

			changeMonth: true,

			changeYear: true,

			maxDate:new Date(),

			yearRange:"c-100:c+1"

		});

		$( "#datepicker1" ).datepicker({

			changeMonth: true,

			changeYear: true,

			maxDate:new Date(),

			yearRange:"c-100:c+1"



		});

		$( "#datepicker2" ).datepicker({

			changeMonth: true,

			changeYear: true,

			minDate:new Date(),

			yearRange:"c-1:c+1"



		});

		$( "#datepicker3" ).datepicker({

			changeMonth: true,

			changeYear: true,

			maxDate:new Date(),

			yearRange:"c-100:c+1"



		});



			});

		</script>

		    <script type="text/javascript"> 

        $(function () { 

            $('input:checkbox[id$=chkpanel1]').click(function () { 

                if (this.checked) { 

                    $('div[id$=coborrower1_panel]').show('slow'); 

                } 

                else { 

                    $('div[id$=coborrower1_panel]').hide('slow'); 

                } 

            });   

        }); 
		 $(function () { 

            $('input:checkbox[id$=chkpanel2]').click(function () { 

                if (this.checked) { 

                    $('div[id$=coborrower2_panel]').show('slow'); 

                } 

                else { 

                    $('div[id$=coborrower2_panel]').hide('slow'); 

                } 

            });   

        }); 

    </script>
	
	<script>
	
	function incomerange(maxlength)
  {
    $("#income").attr('maxLength',maxlength );
	$("#cincome").attr('maxLength',maxlength );
	$("#coincome").attr('maxLength',maxlength );
	
	}
	
function  activetabs(tabindex) 
{
     $("#tabs").tabs();
	
   $( "#tabs" ).tabs({ active: tabindex });
   
   
   if(tabindex==0)
{ 
   $("#firstname").focus();

 } 
 else if(tabindex==1)
{ 
   $("#studyCountry").focus();
  }
  else if(tabindex==2)
  {
   
   $("#relation").focus();
  }
 
  
}


	
</script>
<script>
function onchangetypeofLoan(fld)
{
	
    var typeofLoan = fld.value;
	
     if(fld.value!='Vehicle Finance')
		 
    {
	 document.getElementById("vehicleloanType").disabled=true;
    }
	else
	{
	 document.getElementById("vehicleloanType").disabled=false;
    }
	
}
</script>
 
<style type="text/css">
 tr {
  
    
    text-align:left;
	
}
td
{
   font-size:14px;	
	
}

.auto-style2 {

	background-image: url('images/rtoutline.jpg');

}

.auto-style3 {

	margin-left: 2px;

	margin-bottom: 2px;

}


</style>


</head>
<body>
<body id="Body">

<div align="center">

<form id="loanApplication"   action="send_studentDetails.php"  method="post" name="loanApplication" onsubmit="return validateLoanApplicationFormOnSubmit(this,'1')">		

    <div align="center" class="skinwrapper">

		<?php  include('./common/common_mainmenu.php'); ?>

 
<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Borrower Details</a></li>
 <?php if($otherloans=='No')   
	{?>
    <li><a href="#tabs-2">Course Details</a></li>
	
  <li><a href="#tabs-3">Coborrower Details</a></li>
	

	 
	
	<?php } else  { ?>
	 <li><a href="#tabs-2">Loan Details</a></li>
	 
	 <?php 	if($fetch['typeofLoan']!='Consumer Finance'&& $fetch['typeofLoan']!='Home Improvement')
       {?>
	 <li><a href="#tabs-3">Coborrower Details</a></li>
	 
     <?php } ?>
	
	<?php } ?>
	
   
	<li><a href="#tabs-4">Contact Preference</a></li>
  </ul>
  <div  id="tabs-1" style="background-color:white">
    
   
					
		  <table id="form" align="center" border="0" cellpadding="3" cellspacing="0" width="800">

                   
            <tr><td><input type="hidden" maxlength="6"   id="typeofLoan" name="typeofLoan" value="<?php echo $fetch['typeofLoan'];?>"></td></tr>
             <tr><td><input type="hidden" maxlength="6"   id="vehicleloanType" name="vehicleloanType" value="<?php echo $fetch['vehicleloanType'];?>"></td></tr>
                    

                    <tr>

                            <td height="5"></td>

                    </tr>
                  <?php if($fetchinfo['First_Name']=='YES') { ?>
                    <tr>

                            <td>First Name</td>

                            <td>:</td>

                            <td>

                            <input id="firstname" maxlength="45"  name="firstname" size="40" type="text"  value="<?php if($row) { echo $fetch['firstname']; } ?>"></td>

                    </tr>
				  <?php } ?>
					  <?php if($fetchinfo['Middle_Name']=='YES') { ?>

                    <tr>

                            <td>Middle Name(optional)</td>

                            <td>:</td>

                            <td>

                            <input id="middlename" maxlength="45" name="middlename" size="40" type="text"  ></td>
							

                    </tr>
					  <?php } ?>
					
                    <?php if($fetchinfo['Last_Name']=='YES') { ?>
                    <tr>

                            <td>Last Name</td>

                            <td>:</td>

                            <td>

                            <input id="lastname" maxlength="45" name="lastname" size="40" type="text" value="<?php if($row) { echo $fetch['lastname']; } ?>"></td>

                    </tr>
					<?php } ?>
                     <?php if($fetchinfo['Date_of_Birth']=='YES') { ?>
                    <tr>

                            <td>Date of Birth</td>

                            <td>:</td>

                            <td>

                            <input id="datepicker" name="datepicker" size="40" type="text"></td>

                    </tr>
					 <?php } ?>
					 <?php if($fetchinfo['Aadhar_Card_No']=='YES') { ?>
					<tr>

                            <td>Aadhar Card No.</td>

                            <td>:</td>

                            <td>

                            <input id="adharcardno" onkeyup="allowonlynumeric(this)" name="adharcardno"  maxlength="12" size="40" type="text"></td>

                    </tr>
					 <?php } ?>
					
					<tr>

                            <td>PAN No.</td>

                            <td>:</td>

                            <td>

                            <input id="panno" maxlength="10" name="panno" size="40" type="text"></td>

                    </tr>
					 
					<?php if($fetchinfo['Gender']=='YES') { ?>
						<tr>

                            <td>Gender</td>

                            <td>:</td>

                            <td>

                            <input  id="gender"  name="gender" type="radio" value="Male">Male
							 <input  id="gender"  name="gender" type="radio" value="Female">Female
							 <input  id="gender"  name="gender" type="radio" value="Other">Other
							
							
                            

                            </td>

                    </tr>
					 <?php } ?>
					<?php if($fetchinfo['Marital_Status']=='YES') { ?>
					
					<tr>

                           <td>Marital Status</td>

                            <td>:</td>

                            <td>

                            <select id="marital_status"  name="marital_status"   size="1">

                            <option selected="selected">Single</option>
							<option>Married</option>
							<option>Widow</option>
							<option>Separated</option>
							</select>
							
							
						</td>
						</tr>
							
					 <?php } ?>
							
					
					
					
			

                    <tr>

                            <td>Email Address</td>

                            <td>:</td>

                            <td>

                            <input id="email" maxlength="45" name="email" size="40" type="text" value="<?php if($row) { echo $fetch['email']; } ?>"></td>

                    </tr>
					
					                   
                    </tr>
					  <?php if($otherloans!='No')
		              { ?>
					
								<tr>

                            <td>Do You want to provide your bank details?</td>

                            <td>:</td>

                            <td>

                            <input  id="bankdetails"  name="bankdetails" type="radio" value="Yes" 
							onclick="onselectbankdetails(this,false,'accountNo','accountholder','bankname','branchname','branchadd','ifsccode','bankdetails','micr')">Yes
							<input  id="bankdetails"  name="bankdetails" type="radio" checked='checked'  value="No" 
						    onclick="onselectbankdetails(this,true,'accountNo','accountholder','bankname','branchname','branchadd','ifsccode','bankdetails','micr')">No
							
                            
                        </td>

                    </tr>
					<tr id="bankdetails6" style="display:none">
						     <td><label id="lblIFSCCode">IFSC Code</label></td>
							 <td>:</td>
							 <td><input maxlength="18" disabled="disabled" size="40" id="ifsccode" name="ifsccode"  
							 onKeyup="getbankdetailfromifsc('ifsccode','bankname','branchname','branchadd','micr')" value="" id="ifsccode" type="text">
							 
							</td>
						</tr>
					<tr id="bankdetails1" style="display:none">
					     <td>Account No.</td>
						 <td>:</td>
						 
                            <td>
                               <input maxlength="18" size="40" disabled='disabled' id="accountNo" name="accountNo" onkeypress="return isNumber(event)" 
							    type="text" value="">
							</td>
					</tr>


                     <tr id="bankdetails2" style="display:none">
								<td ><label id="AccountHolder">Account Holder</label></td>
                                <td>:</td>
								<td>
                                   <input maxlength="50" disabled size="40" id="accountholder" name="accountholder" id="accountholder" type="text" value="" >
									</td>
						</tr>


					     <tr id="bankdetails3" style="display:none">
								<td ><label id="BankName" >Bank Name</label></td>
								<td>:</td>
								<td>
									<input maxlength="50" disabled size="40" id="bankname" name="bankname"  type="text" value="">
								</td>
						</tr>
                        <tr id="bankdetails4" style="display:none">
						     <td ><label id="BranchName">Branch Name</label></td>
							 <td>:</td>
							 <td>
                                <input maxlength="50" disabled size="40" id="branchname" name="branchname"  type="text" value="">
							</td>
						</tr>

                        <tr id="bankdetails5" style="display:none">
						    <td><label id="BranchLocation">Branch Location</label></td>
							<td>:</td>
							<td>
                               <input maxlength="50" disabled="disabled" size="40" id="branchadd" name="branchadd" type="text" value="">
							</td>
						</tr>
						<tr id="bankdetails7" style="display:none">
						     <td><label id="lblIFSCCode">MICR </label></td>
							 <td>:</td>
							 <td><input maxlength="18" disabled size="40" id="micr" name="micr"  value=""  type="text">
							 
							</td>
						</tr>

                        
					  <?php } ?>
					
					<?php if($fetchinfo['Address']=='YES') { ?>

                    <tr>

                            <td>Current Address</td>

                            <td>:</td>

                            <td>

                            <input id="address" maxlength="45" name="address" size="40" type="text" onchange="onchangeAdd(this)" ></td>

                    </tr>
                     <?php } ?>
					<?php if($fetchinfo['Street1']=='YES') { ?>
                    <tr>

                            <td>Street1</td>

                            <td>:</td>

                            <td>

                            <input id="street1" maxlength="45" name="street1" size="40" type="text" onchange="onchangeStreet1(this)"></td>

                    </tr>
                    <?php } ?>
					<?php if($fetchinfo['Street2']=='YES') { ?>
                    <tr>

                            <td style="height: 28px">Street2 (optional)</td>

                            <td style="height: 28px">:</td>

                            <td style="height: 28px">

                            <input id="street2" maxlength="45" name="street2" size="40" type="text" onchange="onchangeStreet2(this)"></td>

                    </tr>
                      <?php } ?>
					<?php if($fetchinfo['State']=='YES') { ?>
                    <tr>

                            <td>State</td>

                            <td>:</td>

                            <td>



                            <input id="countrySelect1" <?php if($row) { if($fetch['state']=='') { ?> style="display:none" disabled="disabled"  
										   <?php }  } else { ?> style="display:none" disabled="disabled" <?php } ?>  name="country1" size="20" type="text" onChange="changeState(this,'countrySelect1','stateSelect1','citySelect1','countrySelect','stateSelect','citySelect');" 

                                           value='<?php if($row) { if($fetch['state']!='') { echo $fetch['state'];   } else { ?> 
										   style="display:none" disabled="disabled" <?php   } } ?>' >



                            <select     <?php if($row) { if($fetch['state']!='') { ?> style="display:none" disabled="disabled"  
										   <?php }  } ?> 
                                         id="countrySelect"  name="country" 

                                    onchange="populateState('countrySelect','stateSelect');

                                            populateCity('countrySelect','citySelect')" size="1">

                            </select>





                            </td>

                    </tr>
                      <?php } ?>
					<?php if($fetchinfo['District']=='YES') { ?>
                    <tr>

                            <td>District</td>

                            <td>:</td>

                            <td>



                                <input id="stateSelect1" <?php if($row) { if($fetch['state']=='') { ?> style="display:none" disabled="disabled"  
										   <?php }  } else { ?> style="display:none" disabled="disabled" <?php } ?>  name="state1" size="20" type="text" onChange="changeState(this,'countrySelect1','stateSelect1','citySelect1','countrySelect','stateSelect','citySelect');" 

                                          value='<?php if($row) { if($fetch['district']!='') { echo $fetch['district']; } }  ?>' >

                                            

                                <select  <?php if($row) { if($fetch['state']!='') { ?> style="display:none" disabled="disabled"  
										   <?php }  } ?>  id="stateSelect"  name="state" size="1"></select>

                                <script type="text/javascript">initCountry('','countrySelect','stateSelect','citySelect');</script>

                            </td>

                    </tr>
                      <?php } ?>
					<?php if($fetchinfo['City']=='YES') { ?>
                    <tr>

                            <td>City</td>

                            <td>:</td>

                            <td>

                            <input id="citySelect1" <?php if($row) { if($fetch['state']=='') { ?> style="display:none" disabled="disabled"  
										   <?php }  } else { ?> style="display:none" disabled="disabled" <?php } ?>  name="city1" size="20" type="text" onChange="changeState(this,'countrySelect1','stateSelect1','citySelect1','countrySelect','stateSelect','citySelect');" 

                                         value='<?php if($row) { if($fetch['city']!='') { echo $fetch['city'];  } } ?>' >


                                            

                            <select id="citySelect"   <?php if($row) { if($fetch['state']!='') { ?> style="display:none" disabled="disabled"  
										   <?php }  } ?>  name="city" size="1" >

                            </select>

                            <script type="text/javascript">initCountry('','countrySelect','stateSelect','citySelect');</script>







                            </td>

                    </tr>
					<?php } ?>
					<?php if($fetchinfo['Years_living_at_Current_Residence']=='YES') { ?>
					<tr>

                            <td>Years  living at Current Residence</td>

                            <td>:</td>

                            <td>

                            <select id="yearsInResidence" name="yearsInResidence" size="1">

                            <option value="">Select</option>
							<option><1</option>
							
							<script>
				            filldropdown_numbers('yearsInResidence', 1,15,1);
				             </script>
								  <option>>15</option>
							   

                            

                          

                            </select></td>

                    </tr>
					 <?php } ?>
					<?php if($fetchinfo['Residential_Status']=='YES') { ?>
					<tr>

                            <td>Residential Status</td>

                            <td>:</td>

                            <td>

                            <select id="ResidentialStatus"  name="ResidentialStatus"  onchange="return onOtherSelectedIndexChange(this,'residentialstatus_others')" size="1">

                            <option selected="selected">Select</option>
							<option>Staying with Friends or Hostel</option>
							<option>Staying with Relative</option>
							<option>Self Rented/Paying Guest</option>
							<option>Rented by Parents</option>
							<option>Company Owned</option>
							<option>Financed by Self</option>
							<option>Financed by Parents</option>
							<option>Owned by Parents</option>
							<option>Other</option>
                           
                          

                            </select><input id="residentialstatus_others" maxlength="45" 
							name="residentialstatus_others" hidden="true" size="17" type="text"></td>

                    </tr>
                   <?php } ?>
					<?php if($fetchinfo['Pincode']=='YES') { ?>

                    <tr>

                            <td>Pincode</td>

                            <td>:</td>

                            <td>

                            <input id="pincode" maxlength="6" name="pincode" size="40" type="text" onchange="onchangePincode(this)" ></td>

                    </tr>
					 <?php } ?>
					  <tr>

                            <td>Phone No.(optional)</td>

                            <td>:</td>

                            <td>

                            <input id="stdcode" maxlength="6" placeholder="STD Code" name="stdcode" size="10" type="text" onchange="onchangeStdcode(this)">

                            <input id="phone" maxlength="8" placeholder="Enter 8 digits" name="phone" size="24" type="text" onchange="onchangePhone(this)"></td>

                    </tr>
                  
					<?php if($fetchinfo['Mobile_No']=='YES') { ?>
                    <tr>

                            <td>Mobile No.</td>

                            <td>:</td>

                            <td>

                            <input id="mobile" maxlength="10" name="mobile" size="40" type="text"  value="<?php if($row) { echo $fetch['mobile']; } ?>" ></td>

                    </tr>
                    <?php } ?>
					
                                                                                       <tr>

                            <td>Alternate Contact No.(optional)</td>

                            <td>:</td>

                            <td>

                            <input id="phone1" maxlength="10" name="phone1" size="40" type="text"></td>

                    </tr>
					 
					<?php if($fetchinfo['per_Address']=='YES') { ?>
	 
                  
					 
					  <tr>

                            <td bgcolor="#E6F0FA" colspan="3">

                            <input name="sameadd" onclick="return onclickPermanentSameAddress(this)" type="checkbox">Permanent Address same as above Address</td>

                    </tr>
				
                    <tr>

                            <td>Address</td>

                            <td>:</td>

                            <td>

                            <input id="per_address" maxlength="45" name="per_address" size="40" type="text" onchange="onchangeAdd(this)" ></td>

                    </tr>
					
					
                    <tr>

                            <td>Street1</td>

                            <td>:</td>

                            <td>

                            <input id="per_street1" maxlength="45" name="per_street1" size="40" type="text" onchange="onchangeStreet1(this)"></td>

                    </tr>
					<?php } ?>
                  
					<?php if($fetchinfo['per_Street2']=='YES') { ?>
                    <tr>

                            <td style="height: 28px">Street2 (optional)</td>

                            <td style="height: 28px">:</td>

                            <td style="height: 28px">

                            <input id="per_street2" maxlength="45" name="per_street2" size="40" type="text" onchange="onchangeStreet2(this)"></td>

                    </tr>
                      <?php } ?>
					<?php if($fetchinfo['per_State']=='YES') { ?>
                    <tr>

                            <td>State</td>

                            <td>:</td>

                            <td>

                           <select  id="per_countrySelect"  name="per_country" 

                                    onchange="populateState('per_countrySelect','per_stateSelect');

                               populateCity('per_countrySelect','per_citySelect')" size="1">

                            </select>
							 <input id="per_country1"  name="per_country1"  value="" style="display:none">
							</td>

                    </tr>
                      <?php } ?>
					<?php if($fetchinfo['per_District']=='YES') { ?>
                    <tr>

                            <td>District</td>

                            <td>:</td>

                            <td>
                                 <select    id="per_stateSelect"  name="per_stateSelect" size="1"></select>

                                <script type="text/javascript">initCountry('','per_countrySelect','per_stateSelect','per_citySelect');</script>
								 <input id="per_state1"  name="per_state1"  value="" style="display:none">

                            </td>

                    </tr>
                      <?php } ?>
					<?php if($fetchinfo['per_City']=='YES') { ?>
                    <tr>

                            <td>City</td>

                            <td>:</td>

                            <td>

                           <select id="per_citySelect"    name="per_citySelect" size="1" >

                            </select>
							 <input id="per_city1"  name="per_city1"  value="" style="display:none">

                            <script type="text/javascript">initCountry('','per_countrySelect','per_stateSelect','per_citySelect');</script>

                             </td>

                    </tr>
					 <?php } ?>
					
				    <?php if($otherloans=='No')
					{ ?>

                    <tr>

                            <td>Previous University</td>

                            <td>:</td>

                            <td>

                            <input id="prevUniversity" maxlength="45" name="prevUniversity" size="45" type="text"  value="<?php if($row) { echo $fetch['prevUniversity']; } ?>" ></td>

                    </tr>

                    <tr>

                            <td>Previous College</td>

                            <td>:</td>

                            <td>

                            <input id="prevCollege" maxlength="45" name="prevCollege" size="45" type="text"></td>

                    </tr>

                    <tr>

                            <td>Previous Course/Class</td>

                            <td>:</td>

                            <td>

                            <select id="prevCourse" name="prevCourse"  style="width:348px" onChange="getprevCourse();"  <?php if($readonly) echo 'readonly=readonly'; ?>>
                             <option> Select</option>
                          <?php
						  
						 

						  
						  $tablename='previous_courselist';
						  $cloumnname='previous_course';
						  $arrvalue="";
						  
                          $objCommon->getoptionsfromdbchecked($tablename,$cloumnname,$arrvalue);
						?></select></td>

                    </tr>
					<tr>

                            <td>Category of Previous Course</td>

                            <td>:</td>

                            <td>

                            <select id="category_prevcourse"  name="category_prevcourse"   onchange="return onOtherSelectedIndexChange(this,'category_prevcourseothers')" >
                            <option>Select</option>
							
							</select>
						 <input id="category_prevcourseothers" name="category_prevcourseothers"  type="text" hidden="true"></td>
									
						 </tr>
					
					<tr>

                            <td valign="top">Marks obtained in Previous Course/Class</td>

                            <td>:</td>

                            <td>

                            <table>

                                   

                                    <tr>

                                            <td>

                                            <input id="marksinPercentage"  name="marks" onclick="return onMarkChecked(this,'Percentage','CGPA_Grade','CGPA_Gradepoints','CGPA_outof_GradePoint')" type="radio" checked="checked" value="percentage">Percentage</td>
                                              
											 <td>

                                            <input id="marksingrade" name="marks" onclick="return onMarkChecked(this,'CGPA_Grade','Percentage','CGPA_Gradepoints','CGPA_outof_GradePoint')" type="radio" value="CGPA(grade)">CGPA(Grade)</td>
											
											
											<td>

                                            <input id="marksingradepoints" name="marks" onclick="return onGradePointsChecked(this,'CGPA_Gradepoints','CGPA_outof_GradePoint','Percentage','CGPA_Grade')" type="radio" value="CGPA(gradepoints)">CGPA(Grade Points)</td></tr>

                                         
                            </table>

                            </td>

                    </tr>
					
					 <tr>  <td>Select the Maximum Marks Obtained</td>
                             <td>:</td>
                                           <td>  <select  id="Percentage" name="Percentage" size="1">

												<option>Select</option>

												<option>&lt;=50%</option>

												<option>51%-59%</option>

												<option>60%-69%</option>

												<option>70%-79%</option>

												<option>80%-89%</option>

												<option>&gt;=90%</option>

												</select>

                                 

                                            

                                            
											
                                            <select disabled="disabled" name="CGPA_Grade" id="CGPA_Grade">

                                            <option>Select </option>

                                            <option>A+</option>

                                            <option>A</option>

                                            <option>A-</option>

                                            <option>B+</option>
											
											<option>B</option>
											
											<option>B-</option>
											
											<option>C+</option>
											
											<option>C</option>
											
											<option>C-</option>
											
											<option>D+</option>
											
											<option>D</option>
											
											<option>F</option>
											 
											 

                                            </select>

                                    

                                            

                                            

                                            <select disabled="disabled" name="CGPA_Gradepoints" id="CGPA_Gradepoints" size="1">

                                            <option>Select</option>
											<script>
											filldropdown_numbers('CGPA_Gradepoints', 1,10);
											
											 </script>
										   </select>
										   
											
										 	 <span id="outof">outof</span>

                                         <select disabled="disabled" name="CGPA_outof_GradePoint" id="CGPA_outof_GradePoint">

                                            <option>Select</option>
                                             <script>
											filldropdown_numbers('CGPA_outof_GradePoint', 1,10);
											 </script>

                                            </select></td>


                                    </tr>
									
						            <tr>

                                         <td>Eligibilty Test Taken(if any)</td>

                                         <td>:</td>

                                         <td>

										<input  id="entranceTest"  name="entranceTest" type="radio" value="Yes" onclick="return     onSelectedEntranceTest(this,'display_entranceTest','entrancetestpanel','display_GD','display_PI','yes')" >Yes
										 <input  id="entranceTest"  name="entranceTest" type="radio" value="No" onclick="return     onSelectedEntranceTest(this,'display_entranceTest','entrancetestpanel','display_GD','display_PI','no')" checked='checked'>No
										 
							
							            </td>

                                    </tr>
                                      <tr id="display_entranceTest" style="display:none">
										    <td>
											Type of Test Taken
                                            </td>	<td>:</td>		
											
											<td>
											 <input  id="writtentest"  name="writtentest" type="radio"  onclick="return     onSelectedEntranceTest(this,'entrancetestpanel','display_entranceTest','display_GD','display_PI','writtentest')" value="WrittenTest" >Written Test
											
											 <input  id="writtentest"  name="writtentest" type="radio"  onclick="return     onSelectedEntranceTest(this,'entrancetestpanel','display_entranceTest','display_GD','display_PI','GD_PI')" value="WrittenTest_GD_PI">Written Test+GD/PI
											</td>
										</tr>

          									


                           </table>
						   <table  style="display:none; background-color:white"   id="entrancetestpanel"  border="0" cellpadding="3" cellspacing="0" width="800">
					         
								     <tr>
										    <td>
											Select Eligibilty Test
                                            </td>	<td></td>		
											
											<td align="left">
											Score of Eligibilty Test
											</td>
										</tr>
										<?php
										
										
										 while($row3=mysql_fetch_array($select_entrancetest))
										 
										   {   
										    $TestName=$row3['TestName'];
										    $TestScore=$TestName.'Score';
										  				   
												
			                                                  
				   
														   ?>
														   
														   
																			
										  
										   <tr >
										    <td><input   id="<?php echo $TestName;?>"  name="nameofEntTest[]" 
										 type="checkbox"  value="<?php echo $TestName;?>"  
										 
										 onclick="onEntranceTestCheked(this,'<?php echo $TestScore; ?>','specifyotherTest');"><?php echo $TestName;?> <?php if($TestName=='Other') { ?> 	<br> <input id="specifyotherTest"  disabled="disabled"  placeholder="Specify Other Entrance Test" maxlength="45" name="specifyotherTest"    size="22" type="text"></td> 	
										
											<?php } ?></td>	<td></td>		
										   <td><input id="<?php echo $TestScore;?>" value="0" maxlength="4" disabled='disabled' maxlength="45" name="entrancetestscore[]" onClick="return  removeStartingZero(this)"  size="22" type="text"></td>
										    
										</tr>
										
										
										<?php   }   ?>
		   
		                                
										
					           	<tr id="display_GD">

										<td>Group Discussion Score</td>

										<td>:</td>

										<td>

										<input id="GDScore"  name="GDScore"  size="22" type="text"></td>

									</tr>
									<tr id="display_PI">

										<td>Personal Interview Score</td>

										<td>:</td>

										<td>

										<input id="PIScore"  name="PIScore"  size="22" type="text"></td>

									</tr>
									
									
									
									
								 

                        </table>
						
					<?php } ?>
						
						<table align="center">
						
						<tr><td><input id="action" type="button" value="Next"  class="nextbutton" style="font-size: 16px;" onclick="activetabs('1')"></td></tr>
						
						</table>
						
  </div>
 
  
  <div  id="tabs-2" style="background-color:white">
    <table align="center" border="0" cellpadding="3" cellspacing="0" width="650">
                    <tr>

                            <td height="5"></td>

                    </tr>
					
					
          <?php if($otherloans=='No')
		              { ?>
                    <tr>

                            <td class="heading" colspan="3"><span style="font-size:12"><b>Course Details for Which Loan is Required</b></td>

                    </tr>

                    <tr>

                            <td height="5"></td>

                    </tr>

                    <tr>

                            <td>Country of Study</td>

                            <td>:</td>

                            <td>

                            <select id="studyCountry" name="studyCountry" onchange="return onOtherSelectedIndexChange(this,'otherCountry')" size="1">

                            

                            <option selected="selected">India</option>

                            <option>USA</option>

                            <option>UK</option>

                            <option>Canada</option>

                            <option>Australia</option>

                            <option>New Zealand</option>

                            <option>Germany</option>

                            <option>France</option>

                            <option>Sweden</option>

                            <option>Ireland</option>

                            <option>Dubai</option>

                            <option>Singapore</option>

                            <option>Spain</option>

                            <option>Switzerland</option>

                            <option>Russia</option>

                            <option>China</option>
							
							<option>Japan</option>

                            <option>Other</option>

                            </select>
.
                            <input id="otherCountry" maxlength="45" name="otherCountry" hidden="true"  size="22" type="text"></td>

                    </tr>

                    <tr>

                            <td>University of Study</td>

                            <td>:</td>

                            <td>

                            <input id="university" maxlength="100" name="university" size="40" type="text"></td>

                    </tr>

                    <tr>

                            <td>College of Study</td>

                            <td>:</td>

                            <td>

                            <input id="college" maxlength="100" name="college" size="40" type="text"  value="<?php if($row) { echo $fetch['college']; } ?>"  ></td>

                    </tr>

                    <tr>

                            <td>College Address</td>

                            <td>:</td>

                            <td>

                            <input id="Coladdress" onClick="coladdress('college','Autofill_collegeInformation.php')" maxlength="45" name="Coladdress" size="40" type="text" onchange="onchangeAdd(this)" ></td>

                    </tr>

                    <tr>

                            <td>Street1</td>

                            <td>:</td>

                            <td>

                            <input id="Colstreet1" maxlength="45" name="Colstreet1" size="40" type="text" onchange="onchangeStreet1(this)"></td>

                    </tr>

                    <tr>

                            <td style="height: 28px">Street2 (optional)</td>

                            <td style="height: 28px">:</td>

                            <td style="height: 28px">

                            <input id="Colstreet2" maxlength="45" name="Colstreet2" size="40" type="text" onchange="onchangeStreet2(this)">
                           

                            </td>

                    </tr>

                    <tr>

                        <td>State/County</td>

                        <td>:</td>

                        <td>

                                <input style="display:none" disabled="disabled" id="ColcountrySelect1" name="Colcountry1" size="20" type="text" >

                                                       

                        <select 

                            id="ColcountrySelect"    name="Colcountry"  onchange="populateState('ColcountrySelect','ColstateSelect'); populateCity('ColcountrySelect','ColcitySelect')" size="1">

                        </select>

                        </td>

                    </tr>

                    <tr>

                            <td>District</td>

                            <td>:</td>

                            <td>

                                <input id="ColstateSelect1" style="display:none" disabled="disabled" name="Colstate1" size="20" type="text" >

                                     <select id="ColstateSelect"  name="Colstate" size="1">

                            </select><script type="text/javascript">initCountry('','ColcountrySelect','ColstateSelect','ColcitySelect');</script>

                            &nbsp;</td>

                    </tr>

                    <tr>

                            <td>City</td>

                            <td>:</td>

                            <td>

							

                            <input id="ColcitySelect1" style="display:none" disabled="disabled" name="Colcity1" size="20" type="text" >

                                    



                                    <select   id="ColcitySelect"   name="Colcity" size="1"></select>

                                    <script type="text/javascript">initCountry('','ColcountrySelect','ColstateSelect','ColcitySelect');</script>

                            </td>

                    </tr>
					 <tr>

                            <td>Pincode/Zipcode</td>

                            <td>:</td>

                            <td>

                            <input id="Colpincode" maxlength="6" name="Colpincode" size="40" type="text" onchange="onchangePincode(this)"></td>

                    </tr>


                    <tr>

                            <td>Phone No.</td>

                            <td>:</td>

                            <td>

                            <input  placeholder="STD/ISD Code" id="Colstdcode" maxlength="6" name="Colstdcode" size="12" type="text" onchange="onchangeStdcode(this)">

                            <input id="Colphone" maxlength="8" placeholder="Enter 8 digits" name="Colphone" size="22" type="text" onchange="onchangePhone(this)"></td>

                    </tr>

                    <tr>

                            <td>Contact Person Name(optional)</td>

                            <td>&nbsp;</td>

                            <td>

                            <input id="ContactPName" maxlength="45" name="ContactPName" size="40" type="text"></td>

                    </tr>

                    <tr>

                            <td>Email(optional)</td>

                            <td>&nbsp;</td>

                            <td>

                            <input id="CollegeEMail" maxlength="45" name="CollegeEMail" size="40" type="text"></td>

                    </tr>
					

                    <tr>

                            <td>Course Name</td>

                            <td>:</td>

                            <td>

                            <input id="course" maxlength="45" name="course" size="40" type="text"  value="<?php if($row) { echo $fetch['course']; } ?>"  ></td>

                    </tr>

                   
                    <tr>

                            <td style="height: 26px">Medium of Course</td>

                            <td style="height: 26px">:</td>

                            <td style="height: 26px">

                            <input id="fulltime" name="courseType" type="radio" value="Full Time">Full Time

                            <input id="parttime" name="courseType" type="radio" value="Part Time">Part Time

                            <input id="correspondence" name="courseType" type="radio" value="Correspondence">Correspondence
							
							<input id="Online" name="courseType" type="radio" value="Online">Online


                            </td>

                    </tr>
					<tr>

                            <td>Type of course for which loan is required</td>

                            <td>:</td>

                            <td>

                            <input  id="loanrequiredforcourseType"  name="loanrequiredforcourseType" checked="checked" type="radio" value="Vocational Education"onClick="incomerange('6');changeCategoryofcourseOptions('vocationalcourseCategory','courseCategory','otherCourse');">Vocational Education
							
							<input id="loanrequiredforcourseType" name="loanrequiredforcourseType"  type="radio" value="Higher Education" onClick="incomerange('6');changeCategoryofcourseOptions('courseCategory','vocationalcourseCategory','otherCourse');"> Higher Education

                            

                            </td>

                    </tr>
					
					 <tr>

                            <td>Category of Course</td>

                            <td>:</td>

                            <td>

                            <select id="courseCategory"  hidden="hidden" disabled="disabled"  name="courseCategory" onchange="return onOtherSelectedIndexChange(this,'otherCourse')" size="1">

                            <option>Select</option>

                            <option>Engineering/MS</option>

                            <option>MBA/PGPM</option>

                            <option>Medical</option>

                            <option>Hotel Management</option>

                            <option>Certificate</option>

                            <option>Other</option>

                            </select>
							
							 <select id="vocationalcourseCategory" name="courseCategory1"  onchange="return onOtherSelectedIndexChange(this,'otherCourse')" size="1">
							
							
							 <option>Select</option>
							 
							 <option>Master Diploma Online</option>
							 
							 <option>Master Diploma Offline</option>
							 
							 <option>Post Diploma Online</option>
							 
							 <option>Post Diploma Offline</option>
							 
							 <option>Diploma Offline</option>
							 
							 <option>Diploma Online</option>
							 
							 <option>Certificate Programme/ITI Online</option>
							 
							 <option>Certificate Programme/ITI Offline</option>
							 
							 <option>Short Term Vocational Online</option>
							 
							 <option>Short Term Vocational Offline</option>
							 
							  <option>Other</option>
							 
							  </select>


                            <input id="otherCourse" maxlength="45" name="otherCourse" hidden="true" size="17" type="text"></td>

                    </tr>

					  <?php } ?>
                     <?php if($otherloans=='No')   
						   {?>
                    <tr>

                            <td>When loan is required?</td>

                            <td>:</td>

                            <td>

                            <select id="loanMonth" name="loanMonth" size="1">

                            <option selected="selected">Select</option>

                            <option>January</option>

                            <option>February</option>

                            <option>March</option>

                            <option>April</option>

                            <option>May</option>

                            <option>June</option>

                            <option>July</option>

                            <option>August</option>

                            <option>September</option>

                            <option>October</option>

                            <option>November</option>

                            <option>December</option>

                            </select>



                            <select id="loanYear" name="loanYear" size="1"></select> 

                            <script type="text/javascript">OnLoadLoanYear('loanYear');</script></td>



                    </tr>
					  <?php } ?>
        <?php        if($fetch['typeofLoan']!='Livelihood Loan') { ?>
                    <tr>
                           <?php if($otherloans=='No')   
						   {?>
							<td>Due Date of Fees(if any)</td>   
							
						     <?php  } else { ?>
							 
                            <td>Due Date of Invoice(if any)</td>
							 <?php } ?>
                            <td>:</td>

                            <td>

                            <input id="datepicker2" name="datepicker2" size="40" type="text"></td>

                    </tr>
					
		<?php } ?>
				
					<tr>
                             <?php if($otherloans=='No')   
						   {?>
                            <td>Total Fees</td>
                            <?php  } else { ?>
							 <td>Total Invoice value </td>
							<?php } ?>
							
                            <td>:</td>

                            <td>


                            <input id="totalfees" maxlength="7" name="totalfees" size="40" type="text" 
							
							onchange="subtractionoftwofields('totalfees','amount','SelfContribution')"  
							onclick="additionoftwofields('SelfContribution','amount','totalfees')" onfocus="additionoftwofields('SelfContribution','amount','totalfees')"></td>
							
							
                             
                    </tr>


                  <tr>

                            <td>Loan Amount (in Rupees)</td>

                            <td>:</td>

                            <td>

                            <input id="amount" readonly="readonly" 
							maxlength="7" name="amount" size="40" type="text"  value="<?php if($row) { echo $fetch['amount']; } ?>"></td>

                    </tr>
					
					
					<tr>

                            <td>SelfContribution/Margin money </td>

                            <td>:</td>

                            <td>

                            <input id="SelfContribution" maxlength="6" name="SelfContribution" size="40" type="text" 
							onchange="subtractionoftwofields('totalfees','SelfContribution','amount')" onclick="subtractionoftwofields('totalfees','amount','SelfContribution')"
							onfocus="subtractionoftwofields('totalfees','amount','SelfContribution')"></td>

                    </tr>
					<tr><td><input type="hidden" maxlength="6"   id="loantype" name="loantype" value="<?php echo $fetch['loantype'];?>"></td></tr>
					
							
					
					 <?php if($otherloans!='No')   
						   {?>
                   <?php        
				   if($fetch['typeofLoan']=='Consumer Finance'|| $fetch['typeofLoan']=='Home Improvement') { ?>
				   <tr>

                            <td>Asset Type</td>

                            <td>:</td>

                            <td> 
								<select id="AssetType"  name="AssetType" size="1" onchange="">
								<option> Select</option>
                          <?php
						  
						 

						  
						  $tablename='consumerloans_categories';
						  $cloumnname='name';
						  $arrvalue="";
						  
                          $objCommon->getoptionsfromdbchecked($tablename,$cloumnname,$arrvalue);
						?></select></td>

								 </select>
							 </td>
						</tr>
						<tr>

                            <td>Asset Name</td>

                            <td>:</td>

                            <td> 
						       <input type="text" maxlength="50"  size="40"  id="AssetName" name="AssetName" value="">
						   
					        </td>
					   
					   </tr>
					   
					   <tr>

                            <td>Asset Brand</td>

                            <td>:</td>

                            <td> 
						       <input type="text" maxlength="50" size="40"  id="AssetBrand" name="AssetBrand" value="">
						   
					        </td>
					   
					   </tr>
						   <?php  } } ?>
					
					
						 
					
                       <?php if($otherloans=='No')   
						   {?>

                    <tr>

                            <td>Course Duration</td>

                            <td>:</td>

                            <td><select id="duration" name="duration" size="1"></select>

                            <script type="text/javascript">onLoadDurationMonths('duration');</script> 

                            

                            in &nbsp; 

                            <select id="DurationIn" name="DurationIn" size="1">

                            <option selected="selected">Select</option>

                            <option>Year</option>

                            <option>Month</option>

                            <option>Week</option>

                            <option>Day</option>

                        </select>



                            </td>

                    </tr>

                    
						   <?php } ?>
                    <tr>

                    <td>Is Applicant Working ?</td>

                    <td>:</td>

                    <td>

                        <input id="workYes" name="work" type="radio" value="Yes" onclick="onSelectedAppEmployment(this,false)"  <?php        
				           if($fetch['typeofLoan']=='Consumer Finance'|| $fetch['typeofLoan']=='Home Improvement') {?> checked='checked' <?php } ?>>Yes
                 
                            <input id="workNo" name="work" type="radio" value="No"  onclick="onSelectedAppEmployment(this,true)" <?php        
				           if($fetch['typeofLoan']=='Consumer Finance'|| $fetch['typeofLoan']=='Home Improvement') {?> disabled='disabled' <?php } else  { ?> checked="checked" <?php } ?>>No</td>

                    </tr>

                    <tr><td colspan="3"><div id="AppWork_panel" name="AppWork_panel" <?php if($fetch['typeofLoan']=='Consumer Finance'|| $fetch['typeofLoan']=='Home Improvement') {?> style="display:" <?php } else { ?> style="display:none" <?php } ?> >
					
					
					<table>
                     
                    <tr>

                            <td>Type of Employment</td>

                            <td>:</td>

                            <td>

                            <select id="employment" <?php if($fetch['typeofLoan']!='Consumer Finance'&& $fetch['typeofLoan']!='Home Improvement') {?> disabled='disabled' <?php } ?> name="employment" size="1"  onchange="return onSelectedIndexChange(this,'employment_other')">

                            <option selected="selected">Select</option>

                                <option>EX-Govt Employee</option>
								<option>EX-Private Employee</option>
								<option>Business</option>
								<option>Salaried</option>
								<option>Self Employed</option>
								<option>Pensioner</option>
								<option>Agriculture</option>
								<option>Rental Income</option>
								<option>Other</option>

                            </select><select id="employment_other" <?php if($fetch['typeofLoan']!='Consumer Finance'&& $fetch['typeofLoan']!='Home Improvement') {?> disabled='disabled' <?php } ?> name="employment_other" size="1">

                                        <option >Select</option>
                                      <?php 
									  
									  
									  $tablename='other_typeofemployment_list';
									  $cloumnname='employment';
									 
									  
									$objCommon->getoptions($tablename,$cloumnname);
									  
									  
									  ?></select></td>

                    </tr>

                    <tr>

                            <td>Name of the Company</td>

                            <td>:</td>

                            <td>

                            <input id="business" name="business" maxlength="150" size="40" type="text" <?php if($fetch['typeofLoan']!='Consumer Finance'&& $fetch['typeofLoan']!='Home Improvement') {?> disabled='disabled' <?php } ?>></td>

                    </tr>

                    <tr>

                            <td>Designation</td>

                            <td>:</td>

                            <td>

                            <input id="designation" maxlength="50" name="designation" size="40" type="text" <?php if($fetch['typeofLoan']!='Consumer Finance'&& $fetch['typeofLoan']!='Home Improvement') {?> disabled='disabled' <?php } ?>></td>

                    </tr>
					<tr>

                            <td>Years in Current Employment</td>

                            <td>:</td>

                            <td>

                            <select id="yearsInEmployement" name="yearsInEmployement" size="1" <?php if($fetch['typeofLoan']!='Consumer Finance'&& $fetch['typeofLoan']!='Home Improvement') {?> disabled='disabled' <?php } ?>>

                            <option selected="selected">Select</option>
							
							<option><1</option>

                            <script>
				            filldropdown_numbers('yearsInEmployement', 1,15);
				             </script>

                            <option>>15</option>

                          

                            </select>
							</td>

                    </tr>

                    <tr>

                            <td>Gross Monthly Income</td>

                            <td>:</td>

                            <td><input  maxlength="5"  onkeyup="allowonlynumeric(this)"  id="income" name="income"  <?php if($fetch['typeofLoan']!='Consumer Finance'&& $fetch['typeofLoan']!='Home Improvement') {?> disabled='disabled' <?php } ?> size="40"> </td>

                    </tr>

                    <tr>

                            <td>Average Monthly Bank Balance for Last 3 months</td>

                            <td>:</td>

                            <td>

                            <input id="bankbal" maxlength="6" name="bankbal" size="40" type="text" <?php if($fetch['typeofLoan']!='Consumer Finance'&& $fetch['typeofLoan']!='Home Improvement') {?> disabled='disabled' <?php } ?>></td>

                    </tr>

                    <tr>

                            <td>Address</td>

                            <td>:</td>

                            <td>

                            <input id="Empaddress" maxlength="45" name="Empaddress" size="40" type="text" <?php if($fetch['typeofLoan']!='Consumer Finance'&& $fetch['typeofLoan']!='Home Improvement') {?> disabled='disabled' <?php } ?>></td>

                    </tr>

                    <tr>

                            <td>Street1</td>

                            <td>:</td>

                            <td>

                            <input id="Empstreet1" maxlength="45" name="Empstreet1" size="40" type="text" <?php if($fetch['typeofLoan']!='Consumer Finance'&& $fetch['typeofLoan']!='Home Improvement') {?> disabled='disabled' <?php } ?>></td>

                    </tr>

                    <tr>

                            <td>Street2 (optional)</td>

                            <td>:</td>

                            <td>

                            <input id="Empstreet2" maxlength="45" name="Empstreet2" size="40" type="text" <?php if($fetch['typeofLoan']!='Consumer Finance'&& $fetch['typeofLoan']!='Home Improvement') {?> disabled='disabled' <?php } ?>></td>

                    </tr>

                    <tr>

                            <td>State</td>

                            <td>:</td>

                            <td>

                            <select id="EmpcountrySelect"  name="Empcountry" onchange="populateState('EmpcountrySelect','EmpstateSelect'); populateCity('EmpcountrySelect','EmpcitySelect')"

                            <?php if($fetch['typeofLoan']!='Consumer Finance'&& $fetch['typeofLoan']!='Home Improvement') {?> disabled='disabled' <?php } ?> size="1">

                            </select></td>

                    </tr>

                    <tr>

                            <td>District</td>

                            <td>:</td>

                            <td><select id="EmpstateSelect"  name="Empstate" size="1" <?php if($fetch['typeofLoan']!='Consumer Finance'&& $fetch['typeofLoan']!='Home Improvement') {?> disabled='disabled' <?php } ?>>

                            </select><script type="text/javascript">initCountry('','EmpcountrySelect','EmpstateSelect','EmpcitySelect');</script>

                            </td>

                    </tr>

                    <tr>

                            <td>City</td>

                            <td>:</td>

                            <td><select id="EmpcitySelect"  name="Empcity" size="1" <?php if($fetch['typeofLoan']!='Consumer Finance'&& $fetch['typeofLoan']!='Home Improvement') {?> disabled='disabled' <?php } ?>>

                            </select>

                            <script type="text/javascript">initCountry('','EmpcountrySelect','EmpstateSelect','EmpcitySelect');</script>

                            </td>

                    </tr>
					
					



                    <tr>

                            <td>Pincode</td>

                            <td>:</td>

                            <td>

                            <input id="Emppincode" maxlength="6" name="Emppincode" size="40" type="text" <?php if($fetch['typeofLoan']!='Consumer Finance'&& $fetch['typeofLoan']!='Home Improvement') {?> disabled='disabled' <?php } ?>></td>

                    </tr>

                    <tr>

                            <td>Phone No.</td>

                            <td>:</td>

                            <td>

                            <input id="Empstdcode"  placeholder="STD Code" maxlength="6" name="Empstdcode" size="10" type="text" <?php if($fetch['typeofLoan']!='Consumer Finance'&& $fetch['typeofLoan']!='Home Improvement') {?> disabled='disabled' <?php } ?>>

                            <input id="Empphone"  placeholder="Enter 8 digits" maxlength="8" name="Empphone" size="24" type="text" <?php if($fetch['typeofLoan']!='Consumer Finance'&& $fetch['typeofLoan']!='Home Improvement') {?> disabled='disabled' <?php } ?>></td>

                    </tr>
					



</table>

</div>   

</td>                    

</tr>
               <?php if($fetchinfo['Assets_and_Investments']=='YES') { ?>
                        <tr>

                            <td>Assets and Investments</td>

                            <td>:</td>

                            <td>

                            <input id="assets1" name="assets" type="radio" value="Yes" onClick="showAssetspanel('typeofassets','typeofassets1','assets2','totAssets','totAssets1','totAssets2')">Yes

                            <input id="assets"   name="assets" type="radio" checked="checked" value="No" onClick="disableAssetspanel('typeofassets','typeofassets1','assets2','totAssets','totAssets1','totAssets2')">No</td>

                    </tr>
					
					
					<tr>
					
					    <td id="typeofassets" style="display:none" valign="top"></td>
						<td  id="typeofassets1"  style="display:none" valign="top"></td></tr>
						<tr>
					    <td><div id="assets2" style="display:none">
						 <table border="0" width="250%">

                                    <tr>

                                            <td>

                                            Select Type of Assets</td>

                                            <td>

                                            Current Market Value in Rs (Approx)</td>

                                            <td>Select if  being offered as Collateral</td>

                                    </tr>

                             <tr>

                                            <td>

                                            <input  id="immovableProperty" name="immovableProperty"  type="checkbox" onClick="return  onTypeofAssetsChecked('immovableProperty','immovablePropertyvalue','immovablePropertyCollateral')">Immovable Property</td>

                                            <td>

                                            <input maxlength="10"  onkeyup="allowonlynumeric(this)" disabled="disabled" name="immovablePropertyvalue" id="immovablePropertyvalue" readonly="readonly" onchange="calculateTotalAssetsAmount('totAssets','immovablePropertyvalue','governmentsecuritiesvalue','insurancepoliciesvalue','chits_kurisvalue','sharesvalue','MFsvalue','debenturesvalue','BankFixedDepositsvalue','ProvidentFundvalue',
										  'GoldOrnamentsvalue','VehiclesSelfOwnedvalue','OtherAssetsvalue')"  type="text"></td>

                                            <td align="center">

                                            <input  type="checkbox" value="yes"  onclick="CheckAsssetsAmountEntered('immovablePropertyvalue',this)"  disabled="disabled" name="immovablePropertyCollateral" id="immovablePropertyCollateral"></td>

                                    </tr>

                                     <tr>

                                            <td>

                                            <input id="governmentsecurities" name="governmentsecurities"  type="checkbox" onClick="return  onTypeofAssetsChecked('governmentsecurities','governmentsecuritiesvalue','governmentsecuritiesCollateral')">Investment in government securities</td>

                                            <td>

                                            <input maxlength="10"  onkeyup="allowonlynumeric(this)"name="governmentsecuritiesvalue" disabled="disabled" id="governmentsecuritiesvalue" readonly="readonly" onchange="calculateTotalAssetsAmount('totAssets','immovablePropertyvalue','governmentsecuritiesvalue','insurancepoliciesvalue','chits_kurisvalue','sharesvalue','MFsvalue','debenturesvalue','BankFixedDepositsvalue','ProvidentFundvalue',
										  'GoldOrnamentsvalue','VehiclesSelfOwnedvalue','OtherAssetsvalue')" type="text"></td>

                                            <td align="center">

                                            <input type="checkbox" value="yes"  onclick="CheckAsssetsAmountEntered('governmentsecuritiesvalue',this)" disabled="disabled" name="governmentsecuritiesCollateral" id="governmentsecuritiesCollateral"></td>

                                    </tr>
									 <tr>

                                            <td>
                                            <input id="insurancepolicies" name="insurancepolicies"  type="checkbox" onClick="return  onTypeofAssetsChecked('insurancepolicies','insurancepoliciesvalue','insurancepoliciesCollateral')">Investment in insurance policies</td>

                                            <td>

                                            <input maxlength="10"  onkeyup="allowonlynumeric(this)"disabled="disabled" name="insurancepoliciesvalue" id="insurancepoliciesvalue" readonly="readonly" onchange="calculateTotalAssetsAmount('totAssets','immovablePropertyvalue','governmentsecuritiesvalue','insurancepoliciesvalue','chits_kurisvalue','sharesvalue','MFsvalue','debenturesvalue','BankFixedDepositsvalue','ProvidentFundvalue',
										  'GoldOrnamentsvalue','VehiclesSelfOwnedvalue','OtherAssetsvalue')"  type="text"></td>

                                            <td align="center">

                                            <input type="checkbox" value="yes"  onclick="CheckAsssetsAmountEntered('insurancepoliciesvalue',this)" disabled="disabled" name="insurancepoliciesCollateral" id="insurancepoliciesCollateral"></td>

                                    </tr>
									 <tr>

                                            <td>


                                            <input id="chits_kuris" name="chits_kuris"  type="checkbox" onClick="return  onTypeofAssetsChecked('chits_kuris','chits_kurisvalue','chits_kurisCollateral')">Investment in chits & kuris</td>

                                            <td>

                                            <input  onchange="calculateTotalAssetsAmount('totAssets','immovablePropertyvalue','governmentsecuritiesvalue','insurancepoliciesvalue','chits_kurisvalue','sharesvalue','MFsvalue','debenturesvalue','BankFixedDepositsvalue','ProvidentFundvalue',
										  'GoldOrnamentsvalue','VehiclesSelfOwnedvalue','OtherAssetsvalue')" maxlength="10"  onkeyup="allowonlynumeric(this)"disabled="disabled" name="chits_kurisvalue" id="chits_kurisvalue" readonly="readonly"  type="text"></td>

                                            <td align="center">

                                            <input type="checkbox" value="yes"  onclick="CheckAsssetsAmountEntered('chits_kurisvalue',this)" disabled="disabled" name="chits_kurisCollateral" id="chits_kurisCollateral"></td>

                                    </tr>
									 <tr>

                                            <td>

                                            <input id="shares" name="shares"  type="checkbox" onClick="return  onTypeofAssetsChecked('shares','sharesvalue','sharesCollateral')">Investment in shares</td>

                                            <td>

                                            <input maxlength="10"  onkeyup="allowonlynumeric(this)"disabled="disabled" name="sharesvalue" onchange="calculateTotalAssetsAmount('totAssets','immovablePropertyvalue','governmentsecuritiesvalue','insurancepoliciesvalue','chits_kurisvalue','sharesvalue','MFsvalue','debenturesvalue','BankFixedDepositsvalue','ProvidentFundvalue',
										  'GoldOrnamentsvalue','VehiclesSelfOwnedvalue','OtherAssetsvalue')" id="sharesvalue" readonly="readonly"  type="text"></td>

                                            <td align="center">

                                            <input type="checkbox"  value="yes"  onclick="CheckAsssetsAmountEntered('sharesvalue',this)" disabled="disabled" name="sharesCollateral" id="sharesCollateral"></td>

                                    </tr>
									 <tr>

                                            <td>

                                            <input id="MFs" name="MFs"  type="checkbox" onClick="return  onTypeofAssetsChecked('MFs','MFsvalue','MFsCollateral')">Investment in MFs</td>

                                            <td>

                                            <input maxlength="10"  onkeyup="allowonlynumeric(this)"disabled="disabled" onchange="calculateTotalAssetsAmount('totAssets','immovablePropertyvalue','governmentsecuritiesvalue','insurancepoliciesvalue','chits_kurisvalue','sharesvalue','MFsvalue','debenturesvalue','BankFixedDepositsvalue','ProvidentFundvalue',
										  'GoldOrnamentsvalue','VehiclesSelfOwnedvalue','OtherAssetsvalue')" name="MFsvalue" id="MFsvalue" readonly="readonly"  type="text"></td>

                                            <td align="center">

                                            <input type="checkbox" value="yes"  onclick="CheckAsssetsAmountEntered('MFsvalue',this)" disabled="disabled" name="MFsCollateral" id="MFsCollateral"></td>

                                    </tr>
									 <tr>

                                            <td>

                                            <input id="debentures" name="debentures"  type="checkbox"onClick="return  onTypeofAssetsChecked('debentures','debenturesvalue','debenturesCollateral')">Investment in debentures</td>

                                            <td>

                                            <input maxlength="10"  onkeyup="allowonlynumeric(this)"disabled="disabled" name="debenturesvalue" onchange="calculateTotalAssetsAmount('totAssets','immovablePropertyvalue','governmentsecuritiesvalue','insurancepoliciesvalue','chits_kurisvalue','sharesvalue','MFsvalue','debenturesvalue','BankFixedDepositsvalue','ProvidentFundvalue',
										  'GoldOrnamentsvalue','VehiclesSelfOwnedvalue','OtherAssetsvalue')" id="debenturesvalue" readonly="readonly"  type="text"></td>

                                            <td align="center">

                                            <input type="checkbox" value="yes"  onclick="CheckAsssetsAmountEntered('debenturesvalue',this)" disabled="disabled" name="debenturesCollateral" id="debenturesCollateral"></td>

                                    </tr>
									 <tr>

                                            <td>

                                            <input id="BankFixedDeposits" name="BankFixedDeposits"  type="checkbox" onClick="return  onTypeofAssetsChecked('BankFixedDeposits','BankFixedDepositsvalue','BankFixedDepositsCollateral')">Bank fixed deposits</td>

                                            <td>

                                            <input maxlength="10"  onkeyup="allowonlynumeric(this)"disabled="disabled" onchange="calculateTotalAssetsAmount('totAssets','immovablePropertyvalue','governmentsecuritiesvalue','insurancepoliciesvalue','chits_kurisvalue','sharesvalue','MFsvalue','debenturesvalue','BankFixedDepositsvalue','ProvidentFundvalue',
										  'GoldOrnamentsvalue','VehiclesSelfOwnedvalue','OtherAssetsvalue')" name="BankFixedDepositsvalue" id="BankFixedDepositsvalue" readonly="readonly"  type="text"></td>

                                            <td align="center">

                                            <input type="checkbox"  value="yes"  onclick="CheckAsssetsAmountEntered('BankFixedDepositsvalue',this)" disabled="disabled" name="BankFixedDepositsCollateral" id="BankFixedDepositsCollateral"></td>

                                    </tr>
									 <tr>

                                            <td>

                                            <input id="ProvidentFund" name="ProvidentFund"  type="checkbox" onClick="return  onTypeofAssetsChecked('ProvidentFund','ProvidentFundvalue','ProvidentFundCollateral')">Provident Fund</td>

                                            <td>

                                            <input maxlength="10"  onkeyup="allowonlynumeric(this)"disabled="disabled" name="ProvidentFundvalue" onchange="calculateTotalAssetsAmount('totAssets','immovablePropertyvalue','governmentsecuritiesvalue','insurancepoliciesvalue','chits_kurisvalue','sharesvalue','MFsvalue','debenturesvalue','BankFixedDepositsvalue','ProvidentFundvalue',
										  'GoldOrnamentsvalue','VehiclesSelfOwnedvalue','OtherAssetsvalue')"  id="ProvidentFundvalue" readonly="readonly"  type="text"></td>

                                            <td align="center">

                                            <input type="checkbox" value="yes"  onclick="CheckAsssetsAmountEntered('ProvidentFundvalue',this)" disabled="disabled" name="ProvidentFundCollateral" id="ProvidentFundCollateral"></td>

                                    </tr>
									 <tr>

                                            <td>

                                            <input id="GoldOrnaments" name="GoldOrnaments"  type="checkbox" onClick="return  onTypeofAssetsChecked('GoldOrnaments','GoldOrnamentsvalue','GoldOrnamentsCollateral')">Gold Ornaments</td>

                                            <td>

                                            <input maxlength="10"  onkeyup="allowonlynumeric(this)"disabled="disabled" onchange="calculateTotalAssetsAmount('totAssets','immovablePropertyvalue','governmentsecuritiesvalue','insurancepoliciesvalue','chits_kurisvalue','sharesvalue','MFsvalue','debenturesvalue','BankFixedDepositsvalue','ProvidentFundvalue',
										  'GoldOrnamentsvalue','VehiclesSelfOwnedvalue','OtherAssetsvalue')" name="GoldOrnamentsvalue" id="GoldOrnamentsvalue" readonly="readonly"  type="text"></td>

                                            <td align="center">

                                            <input type="checkbox" value="yes"  onclick="CheckAsssetsAmountEntered('GoldOrnamentsvalue',this)" disabled="disabled" name="GoldOrnamentsCollateral" id="GoldOrnamentsCollateral"></td>

                                    </tr>
									 <tr>

                                            <td>

                                            <input id="VehiclesSelfOwned" name="VehiclesSelfOwned"  type="checkbox" onClick="return  onTypeofAssetsChecked('VehiclesSelfOwned','VehiclesSelfOwnedvalue','VehiclesSelfOwnedCollateral')">Vehicles Self Owned</td>

                                            <td>

                                            <input maxlength="10"  onkeyup="allowonlynumeric(this)"disabled="disabled"  onchange="calculateTotalAssetsAmount('totAssets','immovablePropertyvalue','governmentsecuritiesvalue','insurancepoliciesvalue','chits_kurisvalue','sharesvalue','MFsvalue','debenturesvalue','BankFixedDepositsvalue','ProvidentFundvalue',
										  'GoldOrnamentsvalue','VehiclesSelfOwnedvalue','OtherAssetsvalue')" name="VehiclesSelfOwnedvalue" id="VehiclesSelfOwnedvalue" readonly="readonly"  type="text"></td>

                                            <td align="center">

                                            <input type="checkbox" value="yes"  onclick="CheckAsssetsAmountEntered('VehiclesSelfOwnedvalue',this)" disabled="disabled" name="VehiclesSelfOwnedCollateral" id="VehiclesSelfOwnedCollateral"></td>

                                    </tr>
									<tr>

                                            <td>

                                            <input id="OtherAssets" name="OtherAssets"  type="checkbox" onClick="return  onTypeofAssetsChecked('OtherAssets','OtherAssetsvalue','OtherAssetsCollateral')">Other Assets Owned ( TV, Fridge ,etc )</td>

                                            <td>

                                            <input maxlength="10"  onkeyup="allowonlynumeric(this)"disabled="disabled" name="OtherAssetsvalue" onchange="calculateTotalAssetsAmount('totAssets','immovablePropertyvalue','governmentsecuritiesvalue','insurancepoliciesvalue','chits_kurisvalue','sharesvalue','MFsvalue','debenturesvalue','BankFixedDepositsvalue','ProvidentFundvalue',
										  'GoldOrnamentsvalue','VehiclesSelfOwnedvalue','OtherAssetsvalue')" id="OtherAssetsvalue" readonly="readonly"  type="text"></td>

                                            <td align="center">

                                            <input type="checkbox" value="yes"  onclick="CheckAsssetsAmountEntered('OtherAssetsvalue',this)" disabled="disabled" name="OtherAssetsCollateral" id="OtherAssetsCollateral"></td>

                                    </tr>
									

                            </table></div>

							
                         </td>
					</tr>
					
					<tr>

                            <td  style="display:none" id="totAssets1">Total Assets Amount</td>

                            <td  style="display:none" id="totAssets2">:</td>

                            <td>

                            <input id="totAssets"  style="display:none" readonly="readonly"  name="totAssets"  size="40" type="text"></td>

                    </tr>
		 <?php } ?>
					<tr><td align="right"><input id="action"  class="nextbutton" style="font-size: 16px;" type="button" value="Back" onclick="activetabs('0')"></td>
					
					<td align="right"><input id="action"  class="nextbutton" style="font-size: 16px;" type="button" value="Next" onclick="activetabs('2')"></td></tr>
</table>

   
  </div>
  
  <?php 	if($fetch['typeofLoan']!='Consumer Finance'&& $fetch['typeofLoan']!='Home Improvement')
       { ?>
  <div id="tabs-3" style="background-color:white">
  <table id="form" align="center" border="0" cellpadding="3" cellspacing="0" width="800">
        <tr>

                            <td height="5"></td>

                    </tr>
					
		<?php if($otherloans!='No') //if Other loans is selects  
	     {?>
					
                    <tr>

                            <td class="heading" colspan="3" style="height: 26px"><input name="chkpanel1" id="chkpanel1" type="checkbox">Select 

                            to add Co-Borrower 1 Details</td>

		   </tr>
		   <?php } else { ?>      
		     <tr>

                            <td class="heading" colspan="3"><span style="font-size:12px"><b>Co-Borrower 1 Details</b></td>

                    </tr>
		   <?php } ?>

                    <tr>

                            <td height="5"><br></td>

                    </tr>

                    <tr><td colspan="3">
					<div id="coborrower1_panel" 				
							<?php if($otherloans!='No') //if Other loans is selects  
							 {?>  style="display:none" <?php }  ?> > <table>

                   <?php if($fetchinfo1['Relation_with_Applicant']=='YES') { ?>

                    <tr>

                            <td>Relation with Applicant</td>

                            <td>:</td>

                            <td>

                            <select id="relation" name="relation" onchange="return onSelectedIndexChange(this,'relative')">

                            <option selected="selected">Select</option>

                            <?php 
							 $q=  mysql_query("select Relation from relation");

							while($n = @mysql_fetch_assoc($q)){?>
										<option value="<?php echo $n['Relation']; ?>"><?php echo $n['Relation']; ?></option>
							 <?php } ?>
							 
							 
                            </select>

                            <select id="relative" disabled="disabled" name="relative" size="1">

                            <option>Select</option>

                            <option>Cousin</option>

                            <option>Paternal Uncle (Chacha)</option>

                            <option>Paternal Aunt (Chachi)</option>

                            <option>Maternal Uncle (Mama)</option>

                            <option>Maternal Aunt (Mami)</option>

                            <option>Paternal Grandfather (Dadaji)</option>

                            <option>Paternal Grandmother (Dadi)</option>

                            <option>Maternal Grandfather (Nanaji)</option>

                            <option>Maternal Grandmother (Nani)</option>

                            </select> </td>

                    </tr>
				   <?php } ?>
                 <?php if($fetchinfo1['First_Name']=='YES') { ?>
                    <tr>

                            <td>First Name</td>

                            <td>:</td>

                            <td>

                            <input id="cfirstname" maxlength="45" name="cfirstname" size="40" type="text"></td>

                    </tr>
					  <?php } ?>
               
					  <?php if($fetchinfo1['Middle_Name']=='YES') { ?>

                    <tr>

                            <td>Middle Name</td>

                            <td>:</td>

                            <td>

                            <input id="cmiddlename" maxlength="45" name="cmiddlename" size="40" type="text"></td>

                    </tr>
                   
					  <?php } ?>
                <?php if($fetchinfo1['Last_Name']=='YES') { ?>
                    <tr>

                            <td>Last Name</td>

                            <td>:</td>

                            <td>

                            <input id="clastname" maxlength="45" name="clastname" size="40" type="text"></td>

                    </tr>
                   <?php } ?>
                <?php if($fetchinfo1['Date_of_Birth']=='YES') { ?>
                    <tr>

                            <td>Date of Birth</td>

                            <td>:</td>

                            <td>

                            <input id="datepicker1" name="datepicker1" size="40" type="text"></td>

                    </tr>
					 <?php } ?>
                <?php if($fetchinfo1['Aadhar_Card_No']=='YES') { ?>
					<tr>

                            <td>Aadhar Card No.</td>

                            <td>:</td>

                            <td>

                            <input id="cadharcardno" name="cadharcardno"  maxlength="12" size="40" type="text"></td>

                    </tr>
					 <?php } ?>
                <?php if($fetchinfo1['PAN_No']=='YES') { ?>

                    <tr>

                            <td>PAN No.</td>

                            <td>:</td>

                            <td>

                            <input id="cpanno" maxlength="10" name="cpanno" size="40" type="text"></td>

                    </tr>
					 <?php } ?>
                <?php if($fetchinfo1['Email_Address']=='YES') { ?>

                    <tr>

                            <td>Email Address(optional)</td>

                            <td>:</td>

                            <td>

                            <input id="cemail" maxlength="45" name="cemail" size="40" type="text"></td>

                    </tr>
					 <?php } ?>
					 
								<tr>

                            <td>Do You want to provide your bank details?</td>

                            <td>:</td>

                            <td>

                            <input  id="cbankdetails"  name="cbankdetails" type="radio" value="Yes"
							onclick="onselectbankdetails(this,false,'caccountNo','caccountholder','cbankname','cbranchname','cbranchadd','cifsccode','cbankdetails','cmicr')">Yes
							<input  id="cbankdetails"  name="cbankdetails" type="radio" checked='checked'  value="No" 
							onclick="onselectbankdetails(this,true,'caccountNo','caccountholder','cbankname','cbranchname','cbranchadd','cifsccode','cbankdetails','cmicr')">No
							
                            
                        </td>

                    </tr>
					  <tr id="cbankdetails6" style="display:none">
						     <td><label id="lblIFSCCode">IFSC Code</label></td>
							 <td>:</td>
							 <td><input maxlength="18" disabled size="40" id="cifsccode" name="cifsccode"  
							 onKeyup="getbankdetailfromifsc('cifsccode','cbankname','cbranchname','cbranchadd','cmicr')" value="" type="text">
							 
							</td>
						</tr>
					<tr id="cbankdetails1" style="display:none">
					     <td>Account No.</td>
						 <td>:</td>
						 
                            <td>
                               <input maxlength="18" size="40" disabled='disabled' id="caccountNo" name="caccountNo" onkeypress="return isNumber(event)"  
							    type="text" value="">
							</td>
					</tr>


                     <tr id="cbankdetails2" style="display:none">
								<td ><label id="AccountHolder"  >Account Holder</label></td>
                                <td>:</td>
								<td>
                                   <input maxlength="50" disabled size="40" name="caccountholder" id="caccountholder" type="text" value="" >
									</td>
						</tr>


					     <tr id="cbankdetails3" style="display:none">
								<td ><label id="BankName" >Bank Name</label></td>
								<td>:</td>
								<td>
									<input maxlength="50" disabled size="40"  name="cbankname" id="cbankname" type="text" value="">
								</td>
						</tr>
                        <tr id="cbankdetails4" style="display:none">
						     <td ><label id="BranchName">Branch Name</label></td>
							 <td>:</td>
							 <td>
                                <input maxlength="50" disabled size="40" name="cbranchname" id="cbranchname" type="text" value="">
							</td>
						</tr>

                        <tr id="cbankdetails5" style="display:none">
						    <td><label id="BranchLocation">Branch Location</label></td>
							<td>:</td>
							<td>
                               <input maxlength="50" disabled size="40" name="cbranchadd" id="cbranchadd" type="text" value="">
							</td>
						</tr>
						<tr id="cbankdetails7" style="display:none">
						     <td><label id="lblIFSCCode">MICR </label></td>
							 <td>:</td>
							 <td><input maxlength="18" disabled="disabled" size="40" id="cmicr" name="cmicr"  value=""  type="text">
							 
							</td>
						</tr>

                      

                    <tr>

                            <td height="5"></td>

                    </tr>

                    <tr>

                            <td bgcolor="#E6F0FA" colspan="3">

                            <input name="same" onclick="return onclickSameAddress(this)" type="checkbox">Same 

                            as Applicant's Address</td>

                    </tr>

                    <tr>

                            <td height="5"></td>

                    </tr>
                  
                <?php if($fetchinfo1['Address']=='YES') { ?>
                    <tr>

                            <td>Current Address</td>

                            <td>:</td>

                            <td>

                            <input id="caddress" maxlength="45" name="caddress" size="40" type="text"></td>

                    </tr>
                     <?php } ?>
                <?php if($fetchinfo1['Street1']=='YES') { ?>
                    <tr>

                            <td>Street1</td>

                            <td>:</td>

                            <td>

                            <input id="cstreet1" maxlength="45" name="cstreet1" size="40" type="text"></td>

                    </tr>
                       <?php } ?>
                <?php if($fetchinfo1['Street2']=='YES') { ?>
                    <tr>

                            <td>Street2 (optional)</td>

                            <td>:</td>

                            <td>

                            <input id="cstreet2" maxlength="45" name="cstreet2" size="40" type="text"></td>

                    </tr>
                     <?php } ?>
                <?php if($fetchinfo1['State']=='YES') { ?>
                    <tr>

                            <td>State</td>

                            <td>:</td>

                            <td>

                            <select id="ccountrySelect" name="ccountry" onchange="populateState('ccountrySelect','cstateSelect'); populateCity('ccountrySelect','ccitySelect')" size="1">

                            </select>

                            <input id="ccountry1" name="ccountry1" readonly="readonly" style="display: none"></td>

                    </tr>
                <?php } ?>
                <?php if($fetchinfo1['District']=='YES') { ?>
                    <tr>

                            <td>District</td>

                            <td>:</td>

                            <td>

                            <select id="cstateSelect" name="cstate" size="1">

                            </select><script type="text/javascript">initCountry('','ccountrySelect','cstateSelect','ccitySelect');</script>

                            <input id="cstate1" name="cstate1" readonly="readonly" style="display: none">

                            </td>

                    </tr>
                     <?php } ?>
                <?php if($fetchinfo1['City']=='YES') { ?>
                    <tr>

                            <td>City</td>

                            <td>:</td>

                            <td align="left" valign="top">

                            <select id="ccitySelect" name="ccity" size="1">

                            </select>

                            <script type="text/javascript">initCountry('','ccountrySelect','cstateSelect','ccitySelect'); </script>

                            <input id="ccity1" name="ccity1" readonly="readonly" style="display: none"></td>

                    </tr>
					 <?php } ?>
                <?php if($fetchinfo1['Years_living_at_Current_Residence']=='YES') { ?>
					<tr>

                            <td>Years  living at Current Residence</td>

							
                            <td>:</td>

                            <td>

                            <select id="cyearsInResidence" name="cyearsInResidence" size="1">

                            <option value="">Select</option>
                             <option><1</option>
                           <script>
				            filldropdown_numbers('cyearsInResidence', 1,15);
				             </script>
								 
								  <option>>15</option>
							   
                          

                            </select>
							<input id="cyearsInResidence1" name="cyearsInResidence1" readonly="readonly" style="display: none"></td>

                    </tr>
					 <?php } ?>
                <?php if($fetchinfo1['Residential_Status']=='YES') { ?>
					<tr>

                            <td>Residential_Status</td>

                            <td>:</td>

                            <td>

                            <select id="cResidentialStatus" name="cResidentialStatus" onchange="return onOtherSelectedIndexChange(this,'cresidentialstatus_others')" size="1">

                            <option value="">Select</option>
                            <option>Staying with Friends or Hostel</option>
							<option>Staying with Relative</option>
							<option>Self Rented/Paying Guest</option>
							<option>Rented by Parents</option>
							<option>Company Owned</option>
							<option>Financed by Self</option>
							<option>Financed by Parents</option>
							<option>Owned by Parents</option>
							<option>Other</option>
                           
                          

                            </select>
							<input id="cResidentialStatus1" name="cResidentialStatus1" size="30" readonly="readonly" style="display: none">
							<input id="cresidentialstatus_others" maxlength="45" 
							name="cresidentialstatus_others" hidden="true" size="17" type="text"></td>

                    </tr>

                  <?php } ?>
                <?php if($fetchinfo1['Pincode']=='YES') { ?>

                    <tr>

                            <td>Pincode</td>

                            <td>:</td>

                            <td>

                            <input id="cpincode" maxlength="6" name="cpincode" size="40" type="text"></td>

                    </tr>
                    <?php } ?>
					<?php if($fetchinfo['per_Address']=='YES') { ?>
	 
                  
					 
					  <tr>

                            <td bgcolor="#E6F0FA" colspan="3">

                            <input name="csameadd" onclick="return onclickcoPermanentSameAddress(this)" type="checkbox">Permanent Address same as above Address</td>

                    </tr>
				
                    <tr>

                            <td>Address</td>

                            <td>:</td>

                            <td>

                            <input id="cper_address" maxlength="45" name="cper_address" size="40" type="text" onchange="onchangeAdd(this)" ></td>

                    </tr>
					
                    <tr>

                            <td>Street1</td>

                            <td>:</td>

                            <td>

                            <input id="cper_street1" maxlength="45" name="cper_street1" size="40" type="text" onchange="onchangeStreet1(this)"></td>

                    </tr>
                   <?php } ?>
					
					<?php if($fetchinfo['per_Street2']=='YES') { ?>
                    <tr>

                            <td style="height: 28px">Street2 (optional)</td>

                            <td style="height: 28px">:</td>

                            <td style="height: 28px">

                            <input id="cper_street2" maxlength="45" name="cper_street2" size="40" type="text" onchange="onchangeStreet2(this)"></td>

                    </tr>
                      <?php } ?>
					<?php if($fetchinfo['per_State']=='YES') { ?>
                    <tr>

                            <td>State</td>

                            <td>:</td>

                            <td>

                           <select  id="cper_countrySelect"  name="cper_country" 

                                    onchange="populateState('cper_countrySelect','cper_stateSelect');

                               populateCity('cper_countrySelect','cper_citySelect')" size="1">

                            </select>
							 <input id="cper_country1"  name="cper_country1"  value="" style="display:none">
							</td>

                    </tr>
                      <?php } ?>
					<?php if($fetchinfo['per_District']=='YES') { ?>
                    <tr>

                            <td>District</td>

                            <td>:</td>

                            <td>
                                 <select    id="cper_stateSelect"  name="cper_stateSelect" size="1"></select>

                                <script type="text/javascript">initCountry('','cper_countrySelect','cper_stateSelect','cper_citySelect');</script>
								 <input id="cper_state1"  name="cper_state1"  value="" style="display:none">

                            </td>

                    </tr>
                      <?php } ?>
					<?php if($fetchinfo['per_City']=='YES') { ?>
                    <tr>

                            <td>City</td>

                            <td>:</td>

                            <td>

                           <select id="cper_citySelect"    name="cper_citySelect" size="1" >

                            </select>
							 <input id="cper_city1"  name="cper_city1"  value="" style="display:none">

                            <script type="text/javascript">initCountry('','cper_countrySelect','cper_stateSelect','cper_citySelect');</script>

                             </td>

                    </tr>
					 <?php } ?>
                
                    <tr>

                            <td>Phone No.</td>

                            <td>:</td>

                            <td>

                            <input id="cstdcode"  placeholder="STD Code" maxlength="6" name="cstdcode" size="10" type="text">

                            <input id="cphone"  placeholder="Enter 8 digits" maxlength="8" name="cphone" size="24" type="text"></td>

                    </tr>
                    
                <?php if($fetchinfo1['Mobile_No']=='YES') { ?>
                    <tr>

                            <td>Mobile No.</td>

                            <td>:</td>

                            <td>

                            <input id="cmobile" maxlength="10" name="cmobile" size="40" type="text"></td>

                    </tr>
					 <?php } ?>
                   
                    <tr>

                            <td>Alternate Contact No.(optional)</td>

                            <td>:</td>

                            <td>

                            <input id="cphone1" maxlength="10" name="cphone1" size="40" type="text"></td>

                    </tr>
                   
                <?php if($fetchinfo1['Type_of_Employment']=='YES') { ?>
                    <tr>

                            <td>Type of Employment</td>

                            <td>:</td>

                            <td>

                            <select id="cemployment" name="cemployment" size="1" onchange="return onSelectedIndexChange(this,'cemployment_other')">

                            <option selected="selected">Select</option>

                                <option>EX-Govt Employee</option>
								<option>EX-Private Employee</option>
								<option>Business</option>
								<option>Salaried</option>
								<option>Self Employed</option>
								<option>Pensioner</option>
								<option>Agriculture</option>
								<option>Rental Income</option>
								
								<option>Other</option>
                            </select><select id="cemployment_other" disabled="disabled" name="cemployment_other" size="1">

                                        <option >Select</option>
                                      <?php 
									  
									  
									  $tablename='other_typeofemployment_list';
									  $cloumnname='employment';
									  
									  
									  
									$objCommon->getoptions($tablename,$cloumnname);
									  
									  
									  ?></select></td>

                    </tr>
                     <?php } ?>
                <?php if($fetchinfo1['Name_of_Company']=='YES') { ?>
                    <tr>

                            <td>Name of Company/Business</td>

                            <td>:</td>

                            <td>

                            <input id="cbusiness" name="cbusiness" maxlength="150" size="40" type="text"></td>

                    </tr>
                  <?php } ?>
                <?php if($fetchinfo1['Designation']=='YES') { ?>
                    <tr>

                            <td>Designation</td>

                            <td>:</td>

                            <td>

                            <input id="cdesignation" maxlength="50" name="cdesignation" size="40" type="text"></td>

                    </tr>
					 <?php } ?>
                <?php if($fetchinfo1['Years_in_Current_Employment']=='YES') { ?>
					<tr>

                            <td>Years in Current Employment</td>

							
                            <td>:</td>

                            <td>

                            <select id="cyearsInEmployement" name="cyearsInEmployement" size="1">

                            <option selected="selected">Select</option>

                            <option><1</option>

                            <script>
				            filldropdown_numbers('cyearsInEmployement', 1,15);
				             </script>


                            <option>>15</option>
                          

                            </select>
							</td>

                    </tr>
                  <?php } ?>
                <?php if($fetchinfo1['Employment_Address']=='YES') { ?>
                    <tr>

                            <td>Employment Address(optional)</td>

                            <td>:</td>

                            <td>

                            <input id="cempaddress" maxlength="45" name="cempaddress" size="40" type="text"></td>

                    </tr>
               <?php } ?>
                <?php if($fetchinfo1['empStreet1']=='YES') { ?>
                    <tr>

                            <td>Street1(optional)</td>

                            <td>:</td>

                            <td>

                            <input id="cempstreet1" maxlength="45" name="cempstreet1" size="40" type="text"></td>

                    </tr>
					 <?php } ?>
                <?php if($fetchinfo1['empStreet2']=='YES') { ?>

                    <tr>

                            <td>Street2 (optional)</td>

                            <td>:</td>

                            <td>

                            <input id="cempstreet2" maxlength="45" name="cempstreet2" size="40" type="text"></td>

                    </tr>
                    <?php } ?>
                <?php if($fetchinfo1['empState']=='YES') { ?>
                    <tr>

                            <td>State(optional)</td>

                            <td>:</td>

                            <td>

                            <select id="cempcountrySelect" name="cempcountry" onchange="populateState('cempcountrySelect','cempstateSelect'); populateCity('cempcountrySelect','cempcitySelect')" size="1">

                            </select></td>

                    </tr>
					 <?php } ?>
                <?php if($fetchinfo1['empDistrict']=='YES') { ?>

                    <tr>

                            <td>District(optional)</td>

                            <td>:</td>

                            <td>

                            <select id="cempstateSelect" name="cempstate" size="1">

                            </select><script type="text/javascript">initCountry('','cempcountrySelect','cempstateSelect','cempcitySelect');</script>

                            </td>

                    </tr>
					 <?php } ?>
                <?php if($fetchinfo1['empCity']=='YES') { ?>

                    <tr>

                            <td>City(optional)</td>

                            <td>:</td>

                            <td align="left" valign="top">

                            <select id="cempcitySelect" name="cempcity" size="1">

                            </select>

                            <script type="text/javascript">initCountry('','cempcountrySelect','cempstateSelect','cempcitySelect'); </script>

</td>

                    </tr>
					
                 <?php } ?>
                <?php if($fetchinfo1['Pincode']=='YES') { ?>
                    <tr>

                            <td>Pincode(optional)</td>

                            <td>:</td>

                            <td>

                            <input id="cemppincode" maxlength="6" name="cemppincode" size="40" type="text"></td>

                    </tr>
                <?php } ?>
               
                    <tr>

                            <td>Phone No.(optional)</td>

                            <td>:</td>

                            <td>

                            <input id="cempstdcode" placeholder="STD Code" maxlength="6" name="cempstdcode" size="10" type="text">

                            <input id="cempphone" placeholder="Enter 8 digits" maxlength="8" name="cempphone" size="24" type="text"></td>

                    </tr>
                 
                <?php if($fetchinfo1['Gross_Monthly_Income']=='YES') { ?>
                    <tr>

                            <td>Gross Monthly Income</td>

                            <td>:</td>

                            <td><input  maxlength="6" onkeyup="allowonlynumeric(this)"  id="cincome" name="cincome"  size="40"></td>

                    </tr>
					 <?php } ?>
                <?php if($fetchinfo1['Assets_and_Investments']=='YES') { ?>
					 <tr>

                            <td>Assets and Investments</td>

                            <td>:</td>

                            <td>

                            <input id="cassets1" name="cassets" type="radio" value="Yes" onClick="showAssetspanel('ctypeofassets','ctypeofassets1','cassets2','ctotAssets','ctotAssets1','ctotAssets2')">Yes

                            <input id="cassets"   name="cassets" type="radio" checked="checked" value="No" onClick="disableAssetspanel('ctypeofassets','ctypeofassets1','cassets2','ctotAssets','ctotAssets1','ctotAssets2')">No</td>

                    </tr>
					
					
					<tr>
					
					    <td id="ctypeofassets" style="display:none" valign="top"></td>
						<td  id="ctypeofassets1"  style="display:none" valign="top"></td></tr>
					    <tr><td><div id="cassets2" style="display:none">
						 <table border="0" width="150%">

                                    <tr>

                                            <td>

                                            Select Type of Assets</td>

                                            <td>

                                            Current Market Value in Rs (Approx)</td>

                                            <td>Select if  being offered as Collateral</td>

                                    </tr>

                                    <tr>

                                            <td>

                                            <input  id="cimmovableProperty" name="cimmovableProperty"  type="checkbox" onClick="return  onTypeofAssetsChecked('cimmovableProperty','cimmovablePropertyvalue','cimmovablePropertyCollateral')">Immovable Property</td>

                                            <td>

                                            <input maxlength="10"  onkeyup="allowonlynumeric(this)" disabled="disabled"  name="cimmovablePropertyvalue" id="cimmovablePropertyvalue" onchange="calculateTotalAssetsAmount('ctotAssets','cimmovablePropertyvalue','cgovernmentsecuritiesvalue','cinsurancepoliciesvalue','cchits_kurisvalue','csharesvalue','cMFsvalue','cdebenturesvalue','cBankFixedDepositsvalue','cProvidentFundvalue',
										  'cGoldOrnamentsvalue','cVehiclesSelfOwnedvalue','cOtherAssetsvalue')" readonly="readonly"  type="text"></td>

                                            <td align="center">

                                            <input  type="checkbox" value="yes"  onclick="CheckAsssetsAmountEntered('cimmovablePropertyvalue',this)" disabled="disabled" name="cimmovablePropertyCollateral" id="cimmovablePropertyCollateral"></td>

                                    </tr>

                                     <tr>

                                            <td>

                                            <input id="cgovernmentsecurities" name="cgovernmentsecurities"  type="checkbox" onClick="return  onTypeofAssetsChecked('cgovernmentsecurities','cgovernmentsecuritiesvalue','cgovernmentsecuritiesCollateral')">Investment in government securities</td>

                                            <td>

                                            <input maxlength="10"  onkeyup="allowonlynumeric(this)"disabled="disabled" name="cgovernmentsecuritiesvalue" id="cgovernmentsecuritiesvalue"  onchange="calculateTotalAssetsAmount('ctotAssets','cimmovablePropertyvalue','cgovernmentsecuritiesvalue','cinsurancepoliciesvalue','cchits_kurisvalue','csharesvalue','cMFsvalue','cdebenturesvalue','cBankFixedDepositsvalue','cProvidentFundvalue',
										  'cGoldOrnamentsvalue','cVehiclesSelfOwnedvalue','cOtherAssetsvalue')" readonly="readonly"  type="text"></td>

                                            <td align="center">

											
                                            <input type="checkbox" value="yes"  onclick="CheckAsssetsAmountEntered('cgovernmentsecuritiesvalue',this)" disabled="disabled" name="cgovernmentsecuritiesCollateral" id="cgovernmentsecuritiesCollateral"></td>

                                    </tr>
									 <tr>

                                            <td>

                                            <input id="cinsurancepolicies" name="cinsurancepolicies"  type="checkbox" onClick="return  onTypeofAssetsChecked('cinsurancepolicies','cinsurancepoliciesvalue','cinsurancepoliciesCollateral')">Investment in insurance policies</td>

                                            <td>

                                            <input maxlength="10"  onkeyup="allowonlynumeric(this)"disabled="disabled" name="cinsurancepoliciesvalue" id="cinsurancepoliciesvalue" onchange="calculateTotalAssetsAmount('ctotAssets','cimmovablePropertyvalue','cgovernmentsecuritiesvalue','cinsurancepoliciesvalue','cchits_kurisvalue','csharesvalue','cMFsvalue','cdebenturesvalue','cBankFixedDepositsvalue','cProvidentFundvalue',
										  'cGoldOrnamentsvalue','cVehiclesSelfOwnedvalue','cOtherAssetsvalue')" readonly="readonly"  type="text"></td>

                                            <td align="center">

                                            <input type="checkbox" value="yes"  onclick="CheckAsssetsAmountEntered('cinsurancepoliciesvalue',this)" disabled="disabled" name="cinsurancepoliciesCollateral" id="cinsurancepoliciesCollateral"></td>

                                    </tr>
									 <tr>

                                            <td>

                                            <input id="cchits_kuris" name="cchits_kuris"  type="checkbox" onClick="return  onTypeofAssetsChecked('cchits_kuris','cchits_kurisvalue','cchits_kurisCollateral')">Investment in chits & kuris</td>

                                            <td>

                                            <input maxlength="10"  onkeyup="allowonlynumeric(this)"disabled="disabled" name="cchits_kurisvalue" id="cchits_kurisvalue"  onchange="calculateTotalAssetsAmount('ctotAssets','cimmovablePropertyvalue','cgovernmentsecuritiesvalue','cinsurancepoliciesvalue','cchits_kurisvalue','csharesvalue','cMFsvalue','cdebenturesvalue','cBankFixedDepositsvalue','cProvidentFundvalue',
										  'cGoldOrnamentsvalue','cVehiclesSelfOwnedvalue','cOtherAssetsvalue')" readonly="readonly"  type="text"></td>

                                            <td align="center">

                                            <input type="checkbox" value="yes"  onclick="CheckAsssetsAmountEntered('cchits_kurisvalue',this)" disabled="disabled" name="cchits_kurisCollateral" id="cchits_kurisCollateral"></td>

                                    </tr>
									 <tr>

                                            <td>

                                            <input id="cshares" name="cshares"  type="checkbox" onClick="return  onTypeofAssetsChecked('cshares','csharesvalue','csharesCollateral')">Investment in shares</td>

                                            <td>

                                            <input maxlength="10"  onkeyup="allowonlynumeric(this)" disabled="disabled" name="csharesvalue" id="csharesvalue" onchange="calculateTotalAssetsAmount('ctotAssets','cimmovablePropertyvalue','cgovernmentsecuritiesvalue','cinsurancepoliciesvalue','cchits_kurisvalue','csharesvalue','cMFsvalue','cdebenturesvalue','cBankFixedDepositsvalue','cProvidentFundvalue',
										  'cGoldOrnamentsvalue','cVehiclesSelfOwnedvalue','cOtherAssetsvalue')" readonly="readonly"  type="text"></td>

                                            <td align="center">

                                            <input type="checkbox" value="yes"  onclick="CheckAsssetsAmountEntered('csharesvalue',this)" disabled="disabled" name="csharesCollateral" id="csharesCollateral"></td>

                                    </tr>
									 <tr>

                                            <td>

                                            <input id="cMFs" name="cMFs"  type="checkbox" onClick="return  onTypeofAssetsChecked('cMFs','cMFsvalue','cMFsCollateral')">Investment in MFs</td>

                                            <td>

                                            <input maxlength="10"  onkeyup="allowonlynumeric(this)"disabled="disabled" name="cMFsvalue" id="cMFsvalue" onchange="calculateTotalAssetsAmount('ctotAssets','cimmovablePropertyvalue','cgovernmentsecuritiesvalue','cinsurancepoliciesvalue','cchits_kurisvalue','csharesvalue','cMFsvalue','cdebenturesvalue','cBankFixedDepositsvalue','cProvidentFundvalue',
										  'cGoldOrnamentsvalue','cVehiclesSelfOwnedvalue','cOtherAssetsvalue')" readonly="readonly"  type="text"></td>

                                            <td align="center">

                                            <input type="checkbox" value="yes"  onclick="CheckAsssetsAmountEntered('cMFsvalue',this)" disabled="disabled"  name="cMFsCollateral" id="cMFsCollateral"></td>

                                    </tr>
									 <tr>

                                            <td>

                                            <input id="cdebentures" name="cdebentures"  type="checkbox"onClick="return  onTypeofAssetsChecked('cdebentures','cdebenturesvalue','cdebenturesCollateral')">Investment in debentures</td>

                                            <td>

                                            <input maxlength="10"  onkeyup="allowonlynumeric(this)"disabled="disabled" name="cdebenturesvalue" id="cdebenturesvalue"       onchange="calculateTotalAssetsAmount('ctotAssets','cimmovablePropertyvalue','cgovernmentsecuritiesvalue','cinsurancepoliciesvalue','cchits_kurisvalue','csharesvalue','cMFsvalue','cdebenturesvalue','cBankFixedDepositsvalue','cProvidentFundvalue',
										  'cGoldOrnamentsvalue','cVehiclesSelfOwnedvalue','cOtherAssetsvalue')" readonly="readonly"  type="text"></td>

                                            <td align="center">

                                            <input type="checkbox"value="yes"  onclick="CheckAsssetsAmountEntered('cdebenturesvalue',this)" disabled="disabled" name="cdebenturesCollateral" id="cdebenturesCollateral"></td>

                                    </tr>
									 <tr>

                                            <td>

                                            <input id="cBankFixedDeposits" name="cBankFixedDeposits"  type="checkbox" onClick="return  onTypeofAssetsChecked('cBankFixedDeposits','cBankFixedDepositsvalue','cBankFixedDepositsCollateral')">Bank fixed deposits</td>

                                            <td>

                                            <input maxlength="10"  onkeyup="allowonlynumeric(this)"disabled="disabled" name="cBankFixedDepositsvalue" onchange="calculateTotalAssetsAmount('ctotAssets','cimmovablePropertyvalue','cgovernmentsecuritiesvalue','cinsurancepoliciesvalue','cchits_kurisvalue','csharesvalue','cMFsvalue','cdebenturesvalue','cBankFixedDepositsvalue','cProvidentFundvalue',
										  'cGoldOrnamentsvalue','cVehiclesSelfOwnedvalue','cOtherAssetsvalue')" id="cBankFixedDepositsvalue" readonly="readonly"  type="text"></td>

                                            <td align="center">

                                            <input type="checkbox" value="yes"  onclick="CheckAsssetsAmountEntered('cBankFixedDepositsvalue',this)" disabled="disabled" name="cBankFixedDepositsCollateral" id="cBankFixedDepositsCollateral"></td>

                                    </tr>
									 <tr>

                                            <td>

                                            <input id="cProvidentFund" name="cProvidentFund"  type="checkbox" onClick="return  onTypeofAssetsChecked('cProvidentFund','cProvidentFundvalue','cProvidentFundCollateral')">Provident Fund</td>

                                            <td>

                                            <input maxlength="10"  onkeyup="allowonlynumeric(this)"disabled="disabled" name="cProvidentFundvalue" id="cProvidentFundvalue"  onchange="calculateTotalAssetsAmount('ctotAssets','cimmovablePropertyvalue','cgovernmentsecuritiesvalue','cinsurancepoliciesvalue','cchits_kurisvalue','csharesvalue','cMFsvalue','cdebenturesvalue','cBankFixedDepositsvalue','cProvidentFundvalue',
										  'cGoldOrnamentsvalue','cVehiclesSelfOwnedvalue','cOtherAssetsvalue')" readonly="readonly"  type="text"></td>

                                            <td align="center">

                                            <input type="checkbox" value="yes"  onclick="CheckAsssetsAmountEntered('cProvidentFundvalue',this)" disabled="disabled" name="cProvidentFundCollateral" id="cProvidentFundCollateral"></td>

                                    </tr>
									 <tr>

                                            <td>

                                            <input id="cGoldOrnaments" name="cGoldOrnaments"  type="checkbox" onClick="return  onTypeofAssetsChecked('cGoldOrnaments','cGoldOrnamentsvalue','cGoldOrnamentsCollateral')">Gold Ornaments</td>

                                            <td>

                                            <input maxlength="10"  onkeyup="allowonlynumeric(this)"disabled="disabled" onchange="calculateTotalAssetsAmount('ctotAssets','cimmovablePropertyvalue','cgovernmentsecuritiesvalue','cinsurancepoliciesvalue','cchits_kurisvalue','csharesvalue','cMFsvalue','cdebenturesvalue','cBankFixedDepositsvalue','cProvidentFundvalue',
										  'cGoldOrnamentsvalue','cVehiclesSelfOwnedvalue','cOtherAssetsvalue')" name="cGoldOrnamentsvalue" id="cGoldOrnamentsvalue" readonly="readonly"  type="text"></td>

                                            <td align="center">

                                            <input type="checkbox" value="yes"  onclick="CheckAsssetsAmountEntered('cGoldOrnamentsvalue',this)" disabled="disabled" name="cGoldOrnamentsCollateral" id="cGoldOrnamentsCollateral"></td>

                                    </tr>
									 <tr>

                                            <td>

                                            <input id="cVehiclesSelfOwned" name="cVehiclesSelfOwned"  type="checkbox" onClick="return  onTypeofAssetsChecked('cVehiclesSelfOwned','cVehiclesSelfOwnedvalue','cVehiclesSelfOwnedCollateral')">Vehicles Self Owned</td>

                                            <td>

                                            <input maxlength="10"  onkeyup="allowonlynumeric(this)"disabled="disabled" onchange="calculateTotalAssetsAmount('ctotAssets','cimmovablePropertyvalue','cgovernmentsecuritiesvalue','cinsurancepoliciesvalue','cchits_kurisvalue','csharesvalue','cMFsvalue','cdebenturesvalue','cBankFixedDepositsvalue','cProvidentFundvalue',
										  'cGoldOrnamentsvalue','cVehiclesSelfOwnedvalue','cOtherAssetsvalue')" name="cVehiclesSelfOwnedvalue" id="cVehiclesSelfOwnedvalue" readonly="readonly"  type="text"></td>

                                            <td align="center">

                                            <input type="checkbox" value="yes"  onclick="CheckAsssetsAmountEntered('cVehiclesSelfOwnedvalue',this)" disabled="disabled" name="cVehiclesSelfOwnedCollateral" id="cVehiclesSelfOwnedCollateral"></td>

                                    </tr>
									<tr>

                                            <td>

                                            <input id="cOtherAssets" name="cOtherAssets"  type="checkbox" onClick="return  onTypeofAssetsChecked('cOtherAssets','cOtherAssetsvalue','cOtherAssetsCollateral')">Other Assets Owned ( TV, Fridge ,etc )</td>

                                            <td>

                                            <input maxlength="10"  onkeyup="allowonlynumeric(this)"disabled="disabled" onchange="calculateTotalAssetsAmount('ctotAssets','cimmovablePropertyvalue','cgovernmentsecuritiesvalue','cinsurancepoliciesvalue','cchits_kurisvalue','csharesvalue','cMFsvalue','cdebenturesvalue','cBankFixedDepositsvalue','cProvidentFundvalue',
										  'cGoldOrnamentsvalue','cVehiclesSelfOwnedvalue','cOtherAssetsvalue')" name="cOtherAssetsvalue" id="cOtherAssetsvalue" readonly="readonly"  type="text"></td>

                                            <td align="center">

                                            <input type="checkbox" value="yes"  onclick="CheckAsssetsAmountEntered('cOtherAssetsvalue',this)" disabled="disabled" name="cOtherAssetsCollateral" id="cOtherAssetsCollateral"></td>

                                    </tr>

                            </table></div>

							
                         </td>
					</tr>
					
					<tr>

                            <td style="display:none" id="ctotAssets1">Total Assets Amount</td>

                            <td  style="display:none" id="ctotAssets2">:</td>

                            <td>

                            <input style="display:none" id="ctotAssets"  name="ctotAssets" readonly="readonly" size="40" type="text"></td>

                    </tr>
                  <?php } ?>
                <?php if($fetchinfo1['Any_Other_Outstanding_Loan']=='YES') { ?>
                    <tr>

                            <td>Any Other Outstanding Loan</td>

                            <td>:</td>

                            <td>

                            <input id="cloan1" name="cloan" onclick="onSelectedOutstandingLoan('housing','car','jeep','twowheeler','consDurable',false)" type="radio" value="Yes">Yes

                            <input id="cloan2" checked="checked" onclick="onSelectedOutstandingLoan('housing','car','jeep','twowheeler','consDurable',true)" name="cloan" type="radio" value="No">No</td>

                    </tr>
                    <?php } ?>
                <?php if($fetchinfo1['Type_of_Outstanding_Loan']=='YES') { ?>
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

                                            <input disabled="disabled" id="housing" name="housing" onclick="return onAssetsChecked(this,'housingamt','housingemi')" type="checkbox">Housing</td>

                                            <td>

                                            <input maxlength="7" name="housingamt" id="housingamt" readonly="readonly" onchange="calculateAmount('totamount','housingamt','caramt','jeepamt','twowheeleramt','consamt')" type="text"></td>

                                            <td>

                                            <input maxlength="7" name="housingemi" id="housingemi" readonly="readonly" onchange="calculateAmount('totemi','housingemi','caremi','jeepemi','twowheeleremi','consemi')" type="text"></td>

                                    </tr>

                                    <tr>

                                            <td>

                                            <input disabled="disabled" id="car" name="car" onclick="return onAssetsChecked(this,'caramt','caremi')" type="checkbox">Car</td>

                                            <td>

                                            <input maxlength="7" name="caramt" id="caramt" onchange="calculateAmount('totamount','housingamt','caramt','jeepamt','twowheeleramt','consamt')" readonly="readonly" type="text"></td>

                                        <td>

                                            <input maxlength="7" name="caremi" id="caremi" readonly="readonly" onchange="calculateAmount('totemi','housingemi','caremi','jeepemi','twowheeleremi','consemi')" type="text"></td>

                                    </tr>

                                    <tr>

                                            <td>

                                            <input disabled="disabled" id="jeep" name="jeep" onclick="return onAssetsChecked(this,'jeepamt','jeepemi')" type="checkbox">Jeep</td>

                                            <td>

                                            <input maxlength="7" name="jeepamt" id="jeepamt" onchange="calculateAmount('totamount','housingamt','caramt','jeepamt','twowheeleramt','consamt')" readonly="readonly" type="text"></td>

                                        <td>

                                            <input maxlength="7" name="jeepemi" id="jeepemi" readonly="readonly" onchange="calculateAmount('totemi','housingemi','caremi','jeepemi','twowheeleremi','consemi')" type="text"></td>

                                    </tr>
                                    <tr>

                                            <td>

                                            <input disabled="disabled" id="twowheeler" name="twowheeler" onclick="return onAssetsChecked(this,'twowheeleramt','twowheeleremi')" type="checkbox">Two-wheeler</td>

                                            <td>

                                            <input maxlength="7" name="twowheeleramt" id="twowheeleramt" onchange="calculateAmount('totamount','housingamt','caramt','jeepamt','twowheeleramt','consamt')" readonly="readonly" type="text"></td>

                                    <td>

                                            <input maxlength="7" name="twowheeleremi" id="twowheeleremi" readonly="readonly" onchange="calculateAmount('totemi','housingemi','caremi','jeepemi','twowheeleremi','consemi')" type="text"></td>

                                    </tr>

                                    <tr>

                                            <td>

                                            <input disabled="disabled" id="consDurable" name="consDurable" onclick="return onAssetsChecked(this,'consamt','consemi')" type="checkbox">Consumer 

                                            Durables</td>

                                            <td>

                                            <input maxlength="7" name="consamt" id="consamt" onchange="calculateAmount('totamount','housingamt','caramt','jeepamt','twowheeleramt','consamt')" readonly="readonly" type="text"></td>

                                        <td>

                                            <input maxlength="7" name="consemi" id="consemi" readonly="readonly" onchange="calculateAmount('totemi','housingemi','caremi','jeepemi','twowheeleremi','consemi')" type="text"></td>

                                    </tr>

                            </table>

                            </td>

                    </tr>
                <?php } ?>
                <?php if($fetchinfo1['Amount_of_Outstanding_Loan']=='YES') { ?>
                    <tr>

                            <td>Amount of Outstanding Loan</td>

                            <td>:</td>

                            <td>

                            <input id="totamount"  name="totamount" readonly="readonly" size="40" type="text"></td>

                    </tr>
                <?php } ?>
                <?php if($fetchinfo1['Total_EMI']=='YES') { ?>
                    <tr>

                            <td>Total EMI Amount</td>

                            <td>:</td>

                            <td>

                            <input id="totemi"  name="totemi" readonly="readonly" size="40" type="text"></td>

                    </tr>
					 <?php } ?>
                <?php if($fetchinfo1['Average_Monthly_Bank_Balance_for_Last_3_months']=='YES') { ?>

                    <tr>

                            <td>Average Monthly Bank Balance for Last 3 months</td>

                            <td>:</td>

                            <td>

                           <input id="cbankbal" maxlength="7" name="cbankbal" size="40" type="text"></td>

                    </tr>
					 <?php } ?>
             
                    <tr>

                            <td height="5"></td>

                    </tr>

                    <tr>

                            <td height="5"></td>

                    </tr>

                    <tr>

                            <td class="heading" colspan="3" style="height: 26px"><input name="chkpanel2" id="chkpanel2" type="checkbox">Select 

                            to add Co-Borrower 2 Details</td>

                    </tr>
          </table></div></td></tr>
                    <tr>

                            <td height="5"><br></td>

                    </tr>

                    <tr><td colspan="3"><div id="coborrower2_panel" style="display:none">
					<table>
                     
					<?php if($fetchinfo1['Relation_with_Applicant']=='YES') { ?>
                    <tr>

                            <td>Relation with Applicant</td>

                            <td>:</td>

                            <td>

                            <select id="corelation" name="corelation" onchange="return onSelectedIndexChange(this,'corelative')">

                            <option selected="selected">Select</option>

                             <?php 
							 $q1=  mysql_query("select Relation from relation");

							while($n1 = @mysql_fetch_assoc($q1)){?>
										<option value="<?php echo $n1['Relation']; ?>"><?php echo $n1['Relation']; ?></option>
							 <?php } ?>
						
    						</select>

                            <select id="corelative" disabled="disabled" name="corelative" size="1">

                            <option>Select</option>

                            <option>Cousin</option>

                            <option>Paternal Uncle (Chacha)</option>

                            <option>Paternal Aunt (Chachi)</option>

                            <option>Maternal Uncle (Mama)</option>

                            <option>Maternal Aunt (Mami)</option>

                            <option>Paternal Grandfather (Dadaji)</option>

                            <option>Paternal Grandmother (Dadi)</option>

                            <option>Maternal Grandfather (Nanaji)</option>

                            <option>Maternal Grandmother (Nani)</option>

                            </select> </td>

                    </tr>
                    <?php } ?>
					<?php if($fetchinfo1['First_Name']=='YES') { ?>
                    <tr>

                            <td>First Name</td>

                            <td>:</td>

                            <td>

                            <input id="cofirstname" maxlength="45" name="cofirstname" size="40" type="text"></td>

                    </tr>
					<?php } ?>
                    <?php if($fetchinfo1['Middle_Name']=='YES') { ?>
                    <tr>

                            <td>Middle Name</td>

                            <td>:</td>

                            <td>

                            <input id="comiddlename" maxlength="45" name="comiddlename" size="40" type="text"></td>

                    </tr>

					<?php } ?>
					<?php if($fetchinfo1['Last_Name']=='YES') { ?>
                    <tr>

                            <td>Last Name</td>

                            <td>:</td>

                            <td>

                            <input id="colastname" maxlength="45" name="colastname" size="40" type="text"></td>

                    </tr>
                    <?php } ?>
					<?php if($fetchinfo1['Date_of_Birth']=='YES') { ?>
                    <tr>

                            <td>Date of Birth</td>

                            <td>:</td>

                            <td>

                            <input id="datepicker3" name="datepicker3" size="40" type="text"></td>

                    </tr>
					<?php } ?>
					<?php if($fetchinfo1['Aadhar_Card_No']=='YES') { ?>
					<tr>

                            <td>Aadhar Card No.</td>

                            <td>:</td>

                            <td>

                            <input id="coadharcardno" name="coadharcardno"  maxlength="12" size="40" type="text"></td>

                    </tr>

                     <?php } ?>
					<?php if($fetchinfo1['PAN_No']=='YES') { ?>
                    <tr>

                            <td>PAN No.</td>

                            <td>:</td>

                            <td>

                            <input id="copanno" maxlength="10" name="copanno" size="40" type="text"></td>

                    </tr>
                    <?php } ?>
					<?php if($fetchinfo1['Email_Address']=='YES') { ?>
                    <tr>

                            <td>Email Address</td>

                            <td>:</td>

                            <td>

                            <input id="coemail" maxlength="45" name="coemail" size="40" type="text"></td>

                    </tr>
                    <?php } ?>
					
								<tr>

                            <td>Do You want to provide your bank details?</td>

                            <td>:</td>

                            <td>

                            <input  id="cobankdetails"  name="cobankdetails" type="radio" value="Yes" 
							onclick="onselectbankdetails(this,false,'coaccountNo','coaccountholder','cobankname','cobranchname','cobranchadd','coifsccode','cobankdetails','comicr')">Yes
							<input  id="cobankdetails"  name="cobankdetails" type="radio" checked="checked"  value="No" 
							onclick="onselectbankdetails(this,true,'coaccountNo','coaccountholder','cobankname','cobranchname','cobranchadd','coifsccode','cobankdetails','comicr')">No
							
                            
                        </td>

                    </tr>
					 <tr id="cobankdetails6" style="display:none">
						     <td><label id="lblIFSCCode">IFSC Code</label></td>
							 <td>:</td>
							 <td><input maxlength="18" disabled="disabled"  size="40" id="coifsccode" name="coifsccode"  
							 onKeyup="getbankdetailfromifsc('coifsccode','cobankname','cobranchname','cobranchadd','comicr')" value="" type="text">
							 
							</td>
						</tr>
					<tr id="cobankdetails1" style="display:none">
					     <td>Account No.</td>
						 <td>:</td>
						 
                            <td>
                               <input maxlength="18" size="40" disabled='disabled' id="coaccountNo" name="coaccountNo" onkeypress="return isNumber(event)"
							    type="text" value="">
							</td>
					</tr>


                     <tr id="cobankdetails2" style="display:none">
								<td ><label id="AccountHolder"  >Account Holder</label></td>
                                <td>:</td>
								<td>
                                   <input maxlength="50" disabled size="40" name="coaccountholder" id="coaccountholder" type="text" value="" >
									</td>
						</tr>


					     <tr id="cobankdetails3" style="display:none">
								<td ><label id="BankName" >Bank Name</label></td>
								<td>:</td>
								<td>
									<input maxlength="50" disabled size="40"  name="cobankname" id="cobankname" type="text" value="">
								</td>
						</tr>
                        <tr id="cobankdetails4" style="display:none">
						     <td ><label id="BranchName">Branch Name</label></td>
							 <td>:</td>
							 <td>
                                <input maxlength="50" disabled size="40" name="cobranchname" id="cobranchname" type="text" value="">
							</td>
						</tr>

                        <tr id="cobankdetails5" style="display:none">
						    <td><label id="BranchLocation">Branch Location</label></td>
							<td>:</td>
							<td>
                               <input maxlength="50" disabled size="40" name="cobranchadd" id="cobranchadd" type="text" value="">
							</td>
						</tr>
						<tr id="cobankdetails7" style="display:none">
						     <td><label id="lblIFSCCode">MICR </label></td>
							 <td>:</td>
							 <td><input maxlength="18" disabled="disabled" size="40" id="comicr" name="comicr"  value=""  type="text">
							 
							</td>
						</tr>

                       
                    <tr>

                            <td height="5"></td>

                    </tr>

                    <tr>

                            <td bgcolor="#E6F0FA" colspan="3">

                            <input name="cosame" onclick="return onclickCoSameAddress(this)" type="checkbox">Same 

                            as Applicant's Address</td>

                    </tr>
                  
					
                    <tr>

                            <td height="5"></td>

                    </tr>
                    <?php if($fetchinfo1['Address']=='YES') { ?>
                    <tr>

                            <td>Current Address</td>

                            <td>:</td>

                            <td>

                            <input id="coaddress" maxlength="45" name="coaddress" size="40" type="text"></td>

                    </tr>
                    <?php } ?>
					<?php if($fetchinfo1['Street1']=='YES') { ?>
                    <tr>

                            <td>Street1</td>

                            <td>:</td>

                            <td>

                            <input id="costreet1" maxlength="45" name="costreet1" size="40" type="text"></td>

                    </tr>
                   <?php } ?>
					<?php if($fetchinfo1['Street2']=='YES') { ?>
                    <tr>

                            <td>Street2 (optional)</td>

                            <td>:</td>

                            <td>

                            <input id="costreet2" maxlength="45" name="costreet2" size="40" type="text"></td>

                    </tr>
                     <?php } ?>
					<?php if($fetchinfo1['State']=='YES') { ?>
                    <tr>

                            <td>State</td>

                            <td>:</td>

                            <td>

                            <select id="cocountrySelect" name="cocountry" onchange="populateState('cocountrySelect','costateSelect'); populateCity('cocountrySelect','cocitySelect')" size="1">

                            </select>

                            <input id="cocountry1" name="cocountry1" readonly="readonly" style="display: none"></td>

                    </tr>
                   <?php } ?>
					<?php if($fetchinfo1['District']=='YES') { ?>
                    <tr>

                            <td>District</td>

                            <td>:</td>

                            <td>

                            <select id="costateSelect" name="costate" size="1">

                            </select><script type="text/javascript">initCountry('','cocountrySelect','costateSelect','cocitySelect');</script>

                            <input id="costate1" name="costate1" readonly="readonly" style="display: none">

                            </td>

                    </tr>
                      <?php } ?>
					<?php if($fetchinfo1['City']=='YES') { ?>
                    <tr>

                            <td>City</td>

                            <td>:</td>

                            <td align="left" valign="top">

                            <select id="cocitySelect" name="cocity" size="1">

                            </select>

                            <script type="text/javascript">initCountry('','cocountrySelect','costateSelect','cocitySelect'); </script>

                            <input id="cocity1" name="cocity1" readonly="readonly" style="display: none"></td>

                    </tr>
					  <?php } ?>
					<?php if($fetchinfo1['Years_living_at_Current_Residence']=='YES') { ?>
					<tr>

                            <td>Years living at Current Residence</td>

                            <td>:</td>

                            <td>

                            <select id="coyearsInResidence" name="coyearsInResidence" size="1">

                            <option value="">Select</option>
							<option><1</option>

                           <script>
				            filldropdown_numbers('coyearsInResidence', 1,15);
				             </script>
								 
								  <option>>15</option>
							   

                          

                            </select>
							<input id="coyearsInResidence1" name="coyearsInResidence1" readonly="readonly" style="display: none"></td>

                    </tr>
					  <?php } ?>
					<?php if($fetchinfo1['Residential_Status']=='YES') { ?>
					<tr>

                            <td>Residential Status</td>

                            <td>:</td>

                            <td>

                            <select id="coResidentialStatus" name="coResidentialStatus" onchange="return onOtherSelectedIndexChange(this,'coresidentialstatus_others')" size="1">

							
                           <option value="">Select</option>
							<option>Staying with Friends or Hostel</option>
							<option>Staying with Relative</option>
							<option>Self Rented/Paying Guest</option>
							<option>Rented by Parents</option>
							<option>Company Owned</option>
							<option>Financed by Self</option>
							<option>Financed by Parents</option>
							<option>Owned by Parents</option>
							<option>Other</option>
							
							

                            </select>
							
							<input id="coResidentialStatus1" name="coResidentialStatus1" size="30" readonly="readonly" style="display: none"><input id="coresidentialstatus_others" maxlength="45" 
							name="coresidentialstatus_others" hidden="true" size="17" type="text"></td>

                    </tr>

                     <?php } ?>
					<?php if($fetchinfo1['Pincode']=='YES') { ?>
                    <tr>

                            <td>Pincode</td>

                            <td>:</td>

                            <td>

                            <input id="copincode" maxlength="6" name="copincode" size="40" type="text"></td>

                    </tr>
                     <?php } ?>
					 <?php if($fetchinfo['per_Address']=='YES') { ?>
	 
                  
					 
					  <tr>

                            <td bgcolor="#E6F0FA" colspan="3">

                            <input name="cosameadd" onclick="return onclickco2PermanentSameAddress(this)" type="checkbox">Permanent Address same as above Address</td>

                    </tr>
				
                    <tr>

                            <td>Address</td>

                            <td>:</td>

                            <td>

                            <input id="coper_address" maxlength="45" name="coper_address" size="40" type="text" onchange="onchangeAdd(this)" ></td>

                    </tr>
					
					
                    <tr>

                            <td>Street1</td>


                            <td>:</td>

                            <td>

                            <input id="coper_street1" maxlength="45" name="cper_street1" size="40" type="text" onchange="onchangeStreet1(this)"></td>

                    </tr>
                    <?php } ?>
					<?php if($fetchinfo['per_Street2']=='YES') { ?>
                    <tr>

                            <td style="height: 28px">Street2 (optional)</td>

                            <td style="height: 28px">:</td>

                            <td style="height: 28px">

                            <input id="coper_street2" maxlength="45" name="cper_street2" size="40" type="text" onchange="onchangeStreet2(this)"></td>

                    </tr>
                      <?php } ?>
					<?php if($fetchinfo['per_State']=='YES') { ?>
                    <tr>

                            <td>State</td>

                            <td>:</td>

                            <td>

                           <select  id="coper_countrySelect"  name="coper_country" 

                                    onchange="populateState('coper_countrySelect','coper_stateSelect');

                               populateCity('coper_countrySelect','coper_citySelect')" size="1">

                            </select>
							 <input id="coper_country1"  name="coper_country1"  value="" style="display:none">
							</td>

                    </tr>
                      <?php } ?>
					<?php if($fetchinfo['per_District']=='YES') { ?>
                    <tr>

                            <td>District</td>

                            <td>:</td>

                            <td>
                                 <select    id="coper_stateSelect"  name="coper_stateSelect" size="1"></select>

                                <script type="text/javascript">initCountry('','coper_countrySelect','coper_stateSelect','coper_citySelect');</script>
								 <input id="coper_state1"  name="coper_state1"  value="" style="display:none">

                            </td>

                    </tr>
                      <?php } ?>
					<?php if($fetchinfo['per_City']=='YES') { ?>
                    <tr>

                            <td>City</td>

                            <td>:</td>

                            <td>

                           <select id="coper_citySelect"    name="coper_citySelect" size="1" >

                            </select>
							 <input id="coper_city1"  name="coper_city1"  value="" style="display:none">

                            <script type="text/javascript">initCountry('','coper_countrySelect','coper_stateSelect','coper_citySelect');</script>

                             </td>

                    </tr>
					 <?php } ?>
					
					
                    <tr>

                            <td>Phone No.</td>

                            <td>:</td>

                            <td>

                            <input id="costdcode"  placeholder="STD Code" maxlength="6" name="costdcode" size="10" type="text">

                            <input id="cophone"  placeholder="Enter 8 digits" maxlength="8" name="cophone" size="24" type="text"></td>

                    </tr>
                  
					<?php if($fetchinfo1['Mobile_No']=='YES') { ?>
                    <tr>

                            <td>Mobile No.</td>

                            <td>:</td>

                            <td>

                            <input id="comobile" maxlength="10" name="comobile" size="40" type="text"></td>

                    </tr>
                     <?php } ?>
					
                    <tr>

                            <td>Alternate Contact No.</td>

                            <td>:</td>

                            <td>

                            <input id="cophone1" maxlength="10" name="cophone1" size="40" type="text"></td>

                    </tr>
					
					<?php if($fetchinfo1['Type_of_Employment']=='YES') { ?>

                    <tr>

                            <td>Type of Employment</td>

                            <td>:</td>

                            <td>

                            <select id="coemployment" name="coemployment" size="1" onchange="return onSelectedIndexChange(this,'coemployment_other')">

                            <option selected="selected">Select</option>

                            <option>EX-Govt Employee</option>
								<option>EX-Private Employee</option>
								<option>Business</option>
								<option>Salaried</option>
								<option>Self Employed</option>
								<option>Pensioner</option>
								<option>Agriculture</option>
								<option>Rental Income</option>
								
								<option>Other</option>

                            </select><select id="coemployment_other" disabled="disabled" name="coemployment_other" size="1">

                                        <option >Select</option>
                                      <?php 
									  
									  
									  $tablename='other_typeofemployment_list';
									  $cloumnname='employment';
									 
									  
									  
									$objCommon->getoptions($tablename,$cloumnname);
									  
									  
									  ?></select></td>

                    </tr>
                   <?php } ?>
					<?php if($fetchinfo1['Name_of_Company']=='YES') { ?>
                    <tr>

                            <td>Name of Employer/Business</td>

                            <td>:</td>

                            <td>

                            <input id="cobusiness" name="cobusiness" maxlength="150" size="40" type="text"></td>

                    </tr>
                    <?php } ?>
					<?php if($fetchinfo1['Designation']=='YES') { ?>
                    <tr>

                            <td>Designation</td>

                            <td>:</td>

                            <td>

                            <input id="codesignation" maxlength="50" name="codesignation" size="40" type="text"></td>

                    </tr>
					  <?php } ?>
					<?php if($fetchinfo1['Years_in_Current_Employment']=='YES') { ?>
					<tr>

                            <td>Years in Current Employment</td>

                            <td>:</td>

                            <td>

                            <select id="coyearsInEmployement" name="coyearsInEmployement" size="1">

                            <option selected="selected">Select</option>

                            <option><1</option>

                           <script>
				            filldropdown_numbers('coyearsInEmployement', 1,15);
				             </script>


                            <option>>15</option>
                          

                            </select>
							</td>

                    </tr>
                    <?php } ?>
					<?php if($fetchinfo1['Employment_Address']=='YES') { ?>
                    <tr>

                            <td>Employment Address</td>

                            <td>:</td>

                            <td>

                            <input id="coempaddress" maxlength="45" name="coempaddress" size="40" type="text"></td>

                    </tr>
                     <?php } ?>
					<?php if($fetchinfo1['empStreet1']=='YES') { ?>
                    <tr>

                            <td>Street1</td>

                            <td>:</td>

                            <td>

                            <input id="coempstreet1" maxlength="45" name="coempstreet1" size="40" type="text"></td>

                    </tr>
                     <?php } ?>
					<?php if($fetchinfo1['empStreet2']=='YES') { ?>
                    <tr>

                            <td>Street2 (optional)</td>

                            <td>:</td>

                            <td>


                            <input id="coempstreet2" maxlength="45" name="coempstreet2" size="40" type="text"></td>

                    </tr>
                    <?php } ?>
					<?php if($fetchinfo1['empState']=='YES') { ?>
                    <tr>

                            <td>State</td>

                            <td>:</td>

                            <td>

                            <select id="coempcountrySelect" name="coempcountry" onchange="populateState('coempcountrySelect','coempstateSelect'); populateCity('coempcountrySelect','coempcitySelect')" size="1">

                            </select></td>

                    </tr>
                      <?php } ?>
					<?php if($fetchinfo1['empDistrict']=='YES') { ?>
                    <tr>

                            <td>District</td>

                            <td>:</td>

                            <td>

                            <select id="coempstateSelect" name="coempstate" size="1">

                            </select><script type="text/javascript">initCountry('','coempcountrySelect','coempstateSelect','coempcitySelect');</script>

                            </td>

                    </tr>
                  <?php } ?>
					<?php if($fetchinfo1['empCity']=='YES') { ?>
                    <tr>

                            <td>City</td>

                            <td>:</td>

                            <td align="left" valign="top">

                            <select id="coempcitySelect" name="coempcity" size="1">

                            </select>

                            <script type="text/javascript">initCountry('','coempcountrySelect','coempstateSelect','coempcitySelect'); </script></td>

                    </tr>
                    <?php } ?>
					<?php if($fetchinfo1['Pincode']=='YES') { ?>
                    <tr>

                            <td>Pincode</td>

                            <td>:</td>

                            <td>

                            <input id="coemppincode" maxlength="6" name="coemppincode" size="40" type="text"></td>

                    </tr>
                    <?php } ?>
					
                    <tr>

                            <td>Phone No.</td>

                            <td>:</td>

                            <td>

                            <input id="coempstdcode"  placeholder="STD Code" maxlength="6" name="coempstdcode" size="10" type="text">

                            <input id="coempphone"  placeholder="Enter 8 digits" maxlength="8" name="coempphone" size="24" type="text"></td>

                    </tr>

                  
					<?php if($fetchinfo1['Gross_Monthly_Income']=='YES') { ?>

                    <tr>

                            <td>Gross Monthly Income</td>

                            <td>:</td>

                            <td><input  maxlength="6" onkeyup="allowonlynumeric(this)"  id="coincome" name="coincome"  size="40"></td>

                    </tr>
					  <?php } ?>
					<?php if($fetchinfo1['Assets_and_Investments']=='YES') { ?>
					<tr>

                            <td>Assets and Investments</td>

                            <td>:</td>

                            <td>

                            <input id="coassets1" name="coassets" type="radio" value="Yes" onClick="showAssetspanel('cotypeofassets','cotypeofassets1','coassets2','cototAssets','cototAssets1','cototAssets2')">Yes

                            <input id="coassets"   name="coassets" type="radio" checked="checked" value="No" onClick="disableAssetspanel('cotypeofassets','cotypeofassets1','coassets2','cototAssets','cototAssets1','cototAssets2')">No</td>

                    </tr>
					
					<tr>
					
					    <td id="cotypeofassets" style="display:none" valign="top"></td>
						<td  id="cotypeofassets1" style="display:none"  valign="top"></td></tr>
						<tr>
					    <td><div id="coassets2" style="display:none">
						 <table border="0" width="150%">

                                    <tr>

                                            <td>

                                            Select Type of Assets</td>

                                            <td>

                                            Current Market Value in Rs (Approx)</td>

                                            <td>Select if  being offered as Collateral</td>

                                    </tr>

                                    <tr>

                                            <td>

                                            <input  id="coimmovableProperty" name="coimmovableProperty"  type="checkbox" onClick="return  onTypeofAssetsChecked('coimmovableProperty','coimmovablePropertyvalue','coimmovablePropertyCollateral')">Immovable Property</td>

                                            <td>

                                            <input maxlength="10"  onkeyup="allowonlynumeric(this)"disabled="disabled" onchange="calculateTotalAssetsAmount('cototAssets','coimmovablePropertyvalue','cogovernmentsecuritiesvalue','coinsurancepoliciesvalue','cochits_kurisvalue','cosharesvalue','coMFsvalue','codebenturesvalue','coBankFixedDepositsvalue','coProvidentFundvalue',
										  'coGoldOrnamentsvalue','coVehiclesSelfOwnedvalue','coOtherAssetsvalue')" name="coimmovablePropertyvalue" id="coimmovablePropertyvalue" readonly="readonly"  type="text"></td>

                                            <td align="center">

                                            <input  type="checkbox" value="yes"  onclick="CheckAsssetsAmountEntered('coimmovablePropertyvalue',this)" disabled="disabled" name="coimmovablePropertyCollateral" id="coimmovablePropertyCollateral"></td>

                                    </tr>

                                     <tr>

                                            <td>

                                            <input id="cogovernmentsecurities" name="cogovernmentsecurities"  type="checkbox" onClick="return  onTypeofAssetsChecked('cogovernmentsecurities','cogovernmentsecuritiesvalue','cogovernmentsecuritiesCollateral')">Investment in government securities</td>

                                            <td>

                                            <input maxlength="10"  onkeyup="allowonlynumeric(this)"disabled="disabled"  onchange="calculateTotalAssetsAmount('cototAssets','coimmovablePropertyvalue','cogovernmentsecuritiesvalue','coinsurancepoliciesvalue','cochits_kurisvalue','cosharesvalue','coMFsvalue','codebenturesvalue','coBankFixedDepositsvalue','coProvidentFundvalue',
										  'coGoldOrnamentsvalue','coVehiclesSelfOwnedvalue','coOtherAssetsvalue')" name="cogovernmentsecuritiesvalue" id="cogovernmentsecuritiesvalue" readonly="readonly"  type="text"></td>

                                            <td align="center">

                                            <input type="checkbox" value="yes"  onclick="CheckAsssetsAmountEntered('cogovernmentsecuritiesvalue',this)" disabled="disabled" name="cogovernmentsecuritiesCollateral" id="cogovernmentsecuritiesCollateral"></td>

                                    </tr>
									 <tr>

                                            <td>

                                            <input id="coinsurancepolicies" name="coinsurancepolicies"  type="checkbox" onClick="return  onTypeofAssetsChecked('coinsurancepolicies','coinsurancepoliciesvalue','coinsurancepoliciesCollateral')">Investment in insurance policies</td>

                                            <td>

                                            <input maxlength="10"  onkeyup="allowonlynumeric(this)"disabled="disabled" onchange="calculateTotalAssetsAmount('cototAssets','coimmovablePropertyvalue','cogovernmentsecuritiesvalue','coinsurancepoliciesvalue','cochits_kurisvalue','cosharesvalue','coMFsvalue','codebenturesvalue','coBankFixedDepositsvalue','coProvidentFundvalue',
										  'coGoldOrnamentsvalue','coVehiclesSelfOwnedvalue','coOtherAssetsvalue')" name="coinsurancepoliciesvalue" id="coinsurancepoliciesvalue" readonly="readonly"  type="text"></td>

                                            <td align="center">

                                            <input type="checkbox" value="yes"  onclick="CheckAsssetsAmountEntered('coinsurancepoliciesvalue',this)" disabled="disabled" name="coinsurancepoliciesCollateral" id="coinsurancepoliciesCollateral"></td>

                                    </tr>
									 <tr>

                                            <td>

                                            <input id="cochits_kuris" name="cochits_kuris"  type="checkbox" onClick="return  onTypeofAssetsChecked('cochits_kuris','cochits_kurisvalue','cochits_kurisCollateral')">Investment in chits & kuris</td>

                                            <td>

                                            <input maxlength="10"  onkeyup="allowonlynumeric(this)"disabled="disabled" onchange="calculateTotalAssetsAmount('cototAssets','coimmovablePropertyvalue','cogovernmentsecuritiesvalue','coinsurancepoliciesvalue','cochits_kurisvalue','cosharesvalue','coMFsvalue','codebenturesvalue','coBankFixedDepositsvalue','coProvidentFundvalue',
										  'coGoldOrnamentsvalue','coVehiclesSelfOwnedvalue','coOtherAssetsvalue')" name="cochits_kurisvalue" id="cochits_kurisvalue" readonly="readonly"  type="text"></td>

                                            <td align="center">

                                            <input type="checkbox" value="yes"  onclick="CheckAsssetsAmountEntered('cochits_kurisvalue',this)" disabled="disabled" name="cochits_kurisCollateral" id="cochits_kurisCollateral"></td>

                                    </tr>
									 <tr>

                                            <td>

                                            <input id="coshares" name="coshares"  type="checkbox" onClick="return  onTypeofAssetsChecked('coshares','cosharesvalue','cosharesCollateral')">Investment in shares</td>

                                            <td>

                                            <input maxlength="10"  onkeyup="allowonlynumeric(this)"disabled="disabled" onchange="calculateTotalAssetsAmount('cototAssets','coimmovablePropertyvalue','cogovernmentsecuritiesvalue','coinsurancepoliciesvalue','cochits_kurisvalue','cosharesvalue','coMFsvalue','codebenturesvalue','coBankFixedDepositsvalue','coProvidentFundvalue',
										  'coGoldOrnamentsvalue','coVehiclesSelfOwnedvalue','coOtherAssetsvalue')" name="cosharesvalue" id="cosharesvalue" readonly="readonly"  type="text"></td>

                                            <td align="center">

                                            <input type="checkbox" value="yes"  onclick="CheckAsssetsAmountEntered('cosharesvalue',this)" disabled="disabled" name="cosharesCollateral" id="cosharesCollateral"></td>

                                    </tr>
									 <tr>

                                            <td>

                                            <input id="coMFs" name="coMFs"  type="checkbox" onClick="return  onTypeofAssetsChecked('coMFs','coMFsvalue','coMFsCollateral')">Investment in MFs</td>

                                            <td>

                                            <input maxlength="10"  onkeyup="allowonlynumeric(this)"disabled="disabled" onchange="calculateTotalAssetsAmount('cototAssets','coimmovablePropertyvalue','cogovernmentsecuritiesvalue','coinsurancepoliciesvalue','cochits_kurisvalue','cosharesvalue','coMFsvalue','codebenturesvalue','coBankFixedDepositsvalue','coProvidentFundvalue',
										  'coGoldOrnamentsvalue','coVehiclesSelfOwnedvalue','coOtherAssetsvalue')" name="coMFsvalue" id="coMFsvalue" readonly="readonly"  type="text"></td>

                                            <td align="center">

                                            <input type="checkbox" value="yes"  onclick="CheckAsssetsAmountEntered('coMFsvalue',this)" disabled="disabled" name="coMFsCollateral" id="coMFsCollateral"></td>

                                    </tr>
									 <tr>

                                            <td>

                                            <input id="codebentures" name="codebentures"  type="checkbox"onClick="return  onTypeofAssetsChecked('codebentures','codebenturesvalue','codebenturesCollateral')">Investment in debentures</td>

                                            <td>

                                            <input maxlength="10"  onkeyup="allowonlynumeric(this)"disabled="disabled" onchange="calculateTotalAssetsAmount('cototAssets','coimmovablePropertyvalue','cogovernmentsecuritiesvalue','coinsurancepoliciesvalue','cochits_kurisvalue','cosharesvalue','coMFsvalue','codebenturesvalue','coBankFixedDepositsvalue','coProvidentFundvalue',
										  'coGoldOrnamentsvalue','coVehiclesSelfOwnedvalue','coOtherAssetsvalue')" name="codebenturesvalue" id="codebenturesvalue" readonly="readonly"  type="text"></td>

                                            <td align="center">

                                            <input type="checkbox" value="yes"  onclick="CheckAsssetsAmountEntered('codebenturesvalue',this)" disabled="disabled" name="codebenturesCollateral" id="codebenturesCollateral"></td>

                                    </tr>
									 <tr>

                                            <td>

                                            <input id="coBankFixedDeposits" name="coBankFixedDeposits"  type="checkbox" onClick="return  onTypeofAssetsChecked('coBankFixedDeposits','coBankFixedDepositsvalue','coBankFixedDepositsCollateral')">Bank fixed deposits</td>

                                            <td>

                                            <input maxlength="10"  onkeyup="allowonlynumeric(this)"disabled="disabled" onchange="calculateTotalAssetsAmount('cototAssets','coimmovablePropertyvalue','cogovernmentsecuritiesvalue','coinsurancepoliciesvalue','cochits_kurisvalue','cosharesvalue','coMFsvalue','codebenturesvalue','coBankFixedDepositsvalue','coProvidentFundvalue',
										  'coGoldOrnamentsvalue','coVehiclesSelfOwnedvalue','coOtherAssetsvalue')" name="coBankFixedDepositsvalue" id="coBankFixedDepositsvalue" readonly="readonly"  type="text"></td>

                                            <td align="center">

                                            <input type="checkbox"  value="yes"  onclick="CheckAsssetsAmountEntered('coBankFixedDepositsvalue',this)" disabled="disabled" name="coBankFixedDepositsCollateral" id="coBankFixedDepositsCollateral"></td>

                                    </tr>
									 <tr>

                                            <td>

                                            <input id="coProvidentFund" name="coProvidentFund"  type="checkbox" onClick="return  onTypeofAssetsChecked('coProvidentFund','coProvidentFundvalue','coProvidentFundCollateral')">Provident Fund</td>

                                            <td>

                                            <input maxlength="10"  onkeyup="allowonlynumeric(this)"disabled="disabled" onchange="calculateTotalAssetsAmount('cototAssets','coimmovablePropertyvalue','cogovernmentsecuritiesvalue','coinsurancepoliciesvalue','cochits_kurisvalue','cosharesvalue','coMFsvalue','codebenturesvalue','coBankFixedDepositsvalue','coProvidentFundvalue',
										  'coGoldOrnamentsvalue','coVehiclesSelfOwnedvalue','coOtherAssetsvalue')" name="coProvidentFundvalue" id="coProvidentFundvalue" readonly="readonly"  type="text"></td>

                                            <td align="center">

                                            <input type="checkbox" value="yes"  onclick="CheckAsssetsAmountEntered('coProvidentFundvalue',this)" disabled="disabled" name="coProvidentFundCollateral" id="coProvidentFundCollateral"></td>

                                    </tr>
									 <tr>

                                            <td>

                                            <input id="coGoldOrnaments" name="coGoldOrnaments"  type="checkbox" onClick="return  onTypeofAssetsChecked('coGoldOrnaments','coGoldOrnamentsvalue','coGoldOrnamentsCollateral')">Gold Ornaments</td>

                                            <td>

                                            <input maxlength="10"  onkeyup="allowonlynumeric(this)"disabled="disabled" onchange="calculateTotalAssetsAmount('cototAssets','coimmovablePropertyvalue','cogovernmentsecuritiesvalue','coinsurancepoliciesvalue','cochits_kurisvalue','cosharesvalue','coMFsvalue','codebenturesvalue','coBankFixedDepositsvalue','coProvidentFundvalue',
										  'coGoldOrnamentsvalue','coVehiclesSelfOwnedvalue','coOtherAssetsvalue')" name="coGoldOrnamentsvalue" id="coGoldOrnamentsvalue" readonly="readonly"  type="text"></td>

                                            <td align="center">

                                            <input type="checkbox" value="yes"  onclick="CheckAsssetsAmountEntered('coGoldOrnamentsvalue',this)" disabled="disabled" name="coGoldOrnamentsCollateral" id="coGoldOrnamentsCollateral"></td>

                                    </tr>
									 <tr>

                                            <td>

                                            <input id="coVehiclesSelfOwned"  name="coVehiclesSelfOwned"  type="checkbox" onClick="return  onTypeofAssetsChecked('coVehiclesSelfOwned','coVehiclesSelfOwnedvalue','coVehiclesSelfOwnedCollateral')">Vehicles Self Owned</td>

                                            <td>

                                            <input maxlength="10"  onkeyup="allowonlynumeric(this)"disabled="disabled" onchange="calculateTotalAssetsAmount('cototAssets','coimmovablePropertyvalue','cogovernmentsecuritiesvalue','coinsurancepoliciesvalue','cochits_kurisvalue','cosharesvalue','coMFsvalue','codebenturesvalue','coBankFixedDepositsvalue','coProvidentFundvalue',
										  'coGoldOrnamentsvalue','coVehiclesSelfOwnedvalue','coOtherAssetsvalue')" name="coVehiclesSelfOwnedvalue" id="coVehiclesSelfOwnedvalue" readonly="readonly"  type="text"></td>

                                            <td align="center">

                                            <input type="checkbox"  value="yes"  onclick=
											"CheckAsssetsAmountEntered('coVehiclesSelfOwnedvalue',this)" disabled="disabled" name="coVehiclesSelfOwnedCollateral" id="coVehiclesSelfOwnedCollateral"></td>

                                    </tr>
									<tr>

                                            <td>

                                            <input id="coOtherAssets" name="coOtherAssets"  type="checkbox" onClick="return  onTypeofAssetsChecked('coOtherAssets','coOtherAssetsvalue','coOtherAssetsCollateral')">Other Assets Owned ( TV, Fridge ,etc )</td>

                                            <td>

                                            <input maxlength="10"  onkeyup="allowonlynumeric(this)"disabled="disabled" onchange="calculateTotalAssetsAmount('cototAssets','coimmovablePropertyvalue','cogovernmentsecuritiesvalue','coinsurancepoliciesvalue','cochits_kurisvalue','cosharesvalue','coMFsvalue','codebenturesvalue','coBankFixedDepositsvalue','coProvidentFundvalue',
										  'coGoldOrnamentsvalue','coVehiclesSelfOwnedvalue','coOtherAssetsvalue')" name="coOtherAssetsvalue" id="coOtherAssetsvalue" readonly="readonly"  type="text"></td>

                                            <td align="center">

                                            <input type="checkbox"  value="yes"  onclick="CheckAsssetsAmountEntered('coOtherAssetsvalue',this)" disabled="disabled" name="coOtherAssetsCollateral" id="coOtherAssetsCollateral"></td>

                                    </tr>
									

                            </table></div>

							
                         </td>
					</tr>
					<tr>

                            <td style="display:none"  id="cototAssets1">Total Assets Amount</td>

                            <td  style="display:none" id="cototAssets2">:</td>

                            <td>

                            <input  style="display:none" id="cototAssets"  name="cototAssets" readonly="readonly" size="40" type="text"></td>

                    </tr>
                    <?php } ?>
					<?php if($fetchinfo1['Any_Other_Outstanding_Loan']=='YES') { ?>
                    <tr>

                            <td>Any Other Outstanding Loan</td>

                            <td>:</td>

                            <td>

                            <input id="coloan1" name="coloan" type="radio"  onclick="onSelectedOutstandingLoan('cohousing','cocar','cojeep','cotwowheeler','coconsDurable',false)" value="Yes">Yes

                            <input id="coloan2" checked="checked" name="coloan" type="radio" onclick="onSelectedOutstandingLoan('cohousing','cocar','cojeep','cotwowheeler','coconsDurable',true)"  value="No">No</td>

                                                                                                                    </tr>
                     <?php } ?>
					<?php if($fetchinfo1['Type_of_Outstanding_Loan']=='YES') { ?>
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

                                            <input disabled="disabled" id="cohousing" name="cohousing"  onclick="return onAssetsChecked(this,'cohousingamt','cohousingemi')" type="checkbox">Housing</td>

                                            <td>

                                            <input maxlength="7" id="cohousingamt" name="cohousingamt" onchange="calculateAmount('cototamount','cohousingamt','cocaramt','cojeepamt','cotwowheeleramt','coconsamt')" readonly="readonly" type="text"></td>

                                            <td>									

                                            <input maxlength="7"  id="cohousingemi" name="cohousingemi" readonly="readonly" onchange="calculateAmount('cototemi','cohousingemi','cocaremi','cojeepemi','cotwowheeleremi','coconsemi')" type="text"></td>

                                    </tr>

                                    <tr>

                                            <td>

                                            <input disabled="disabled" id="cocar" name="cocar" onclick="return onAssetsChecked(this,'cocaramt','cocaremi')" type="checkbox">Car</td>

                                            <td>

                                            <input maxlength="7" id="cocaramt" name="cocaramt" onchange="calculateAmount('cototamount','cohousingamt','cocaramt','cojeepamt','cotwowheeleramt','coconsamt')" readonly="readonly" type="text"></td>

                                    <td>



                                            <input maxlength="7"  id="cocaremi"  name="cocaremi" readonly="readonly" onchange="calculateAmount('cototemi','cohousingemi','cocaremi','cojeepemi','cotwowheeleremi','coconsemi')" type="text"></td>

                                    </tr>

                                    <tr>

                                            <td>

                                            <input disabled="disabled" id="cojeep" name="cojeep" onclick="return onAssetsChecked(this,'cojeepamt','cojeepemi')" type="checkbox">Jeep</td>

                                            <td>

                                            <input maxlength="7" id="cojeepamt" name="cojeepamt" onchange="calculateAmount('cototamount','cohousingamt','cocaramt','cojeepamt','cotwowheeleramt','coconsamt')" readonly="readonly" type="text"></td>

                                        <td>

                                            <input maxlength="7" name="cojeepemi" id="cojeepemi" readonly="readonly" onchange="calculateAmount('cototemi','cohousingemi','cocaremi','cojeepemi','cotwowheeleremi','coconsemi')" type="text"></td>



                                    </tr>

                                    <tr>

                                            <td>

                                            <input disabled="disabled" id="cotwowheeler" name="cotwowheeler" onclick="return onAssetsChecked(this,'cotwowheeleramt','cotwowheeleremi')" type="checkbox">Two-wheeler</td>

                                            <td>

                                            <input maxlength="7" id="cotwowheeleramt" name="cotwowheeleramt" onchange="calculateAmount('cototamount','cohousingamt','cocaramt','cojeepamt','cotwowheeleramt','coconsamt')" readonly="readonly" type="text"></td>

                                        <td>

                                            <input maxlength="7" name="cotwowheeleremi" id="cotwowheeleremi" readonly="readonly" onchange="calculateAmount('cototemi','cohousingemi','cocaremi','cojeepemi','cotwowheeleremi','coconsemi')" type="text"></td>



                                    </tr>

                                    <tr>

                                            <td>

                                            <input disabled="disabled" id="coconsDurable"  name="coconsDurable" onclick="return onAssetsChecked(this,'coconsamt','coconsemi')" type="checkbox">Consumer 

                                            Durables</td>

                                            <td>

                                            <input maxlength="7" id="coconsamt" name="coconsamt" onchange="calculateAmount('cototamount','cohousingamt','cocaramt','cojeepamt','cotwowheeleramt','coconsamt')" readonly="readonly" type="text"></td>

                                        <td>

                                            <input maxlength="7" name="coconsemi" id="coconsemi" readonly="readonly" onchange="calculateAmount('cototemi','cohousingemi','cocaremi','cojeepemi','cotwowheeleremi','coconsemi')" type="text"></td>



                                    </tr>

                            </table>

                            </td>

                    </tr>
                   <?php } ?>
					<?php if($fetchinfo1['Amount_of_Outstanding_Loan']=='YES') { ?>
                    <tr>

                            <td>Amount of Outstanding Loan</td>

                            <td>:</td>

                            <td>

                            <input id="cototamount" name="cototamount" readonly="readonly" size="40" type="text"></td>

                            </tr>
                   <?php } ?>
					<?php if($fetchinfo1['Total_EMI']=='YES') { ?>
                            <tr>							

                            <td>Total EMI</td>

                            <td>:</td>

                            <td>

                            <input id="cototemi" name="cototemi" readonly="readonly" size="40" type="text"></td>

                    </tr>



                      <?php } ?>
					<?php if($fetchinfo1['Average_Monthly_Bank_Balance_for_Last_3_months']=='YES') { ?>

                    <tr>

                            <td>Average Monthly Bank Balance for Last 3 months</td>

                            <td>:</td>

                            <td>
							
                           
							<input id="cobankbal" maxlength="7" onkeyup="allowonlynumeric(this)" name="cobankbal" size="40" type="text">
							</td>

                    </tr>
					  <?php } ?>
					
					<tr height="20px">
					
					</tr>
					
					 


                   

                    </table></div></td></tr>
					<table align="center">
					<?php if($fetchinfo1['Can_Offer_Collateral_Security']=='YES') { ?>
					<tr>

                            <td>Can Offer Collateral Security?</td>

                            <td>:</td>

                            <td>

                            <input id="security1" name="security" type="radio" value="Yes" onclick="onclickConfirmAssetsCollateral(this)">Yes

                            <input id="security2" checked="checked" name="security" type="radio" onclick="onclickConfirmAssetsCollateral(this)" value="No">No</td>

                    </tr>
					<?php } ?>
				<tr><td align="right"><input id="action"  class="nextbutton" style="font-size: 16px;" type="button" value="Back" onclick="activetabs('1')"></td>
					
					<td align="right"><input id="action" type="button"   class="nextbutton" style="font-size: 16px;" value="Next" onclick="activetabs('3')"></td></tr>
					
					 

  </table>
   
  </div>
  
	   <?php }  // End of if condition?>
  
  
  
  <div id="tabs-4" style="background-color:white">
   <table id="form" align="center" border="0" cellpadding="3" cellspacing="0" width="600">
  
 

                    <tr>

                            <td height="5"></td>

                    </tr>

                    <tr>

                            <td valign="top">Best Day to Call You Regarding Loan</td>

                            <td valign="top">:</td>

                            <td>

                            <table width="100%">

                                    <tr>

                                            <td><input name="anyday" type="checkbox" checked="checked">Any 

                                            Day</td>

                                            <td><input name="monday" type="checkbox">Monday</td>

                                    </tr>

                                    <tr>

                                            <td><input name="tuesday" type="checkbox">Tuesday</td>

                                            <td><input name="wednesday" type="checkbox">Wednesday</td>

                                    </tr>

                                    <tr>

                                            <td><input name="thursday" type="checkbox">Thursday</td>

                                            <td><input name="friday" type="checkbox">Friday</td>

                                    </tr>

                                    <tr>

                                            <td><input name="saturday" type="checkbox">Saturday</td>

                                            <td><input name="sunday" type="checkbox">Sunday</td>

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

                                            <td><input name="anytime" type="checkbox" checked="checked">Any Time</td>

                                    </tr>

                                    <tr>

                                            <td>

                                            <input name="morning" onclick="return onTimeChecked(this,'morning_time')" type="checkbox">Morning</td>

                                            <td>

                                            <select disabled="disabled" name="morning_time" id="morning_time">

                                            <option>Select</option>

                                            <option>08 AM to 09 AM</option>

                                            <option>09 AM to 10 AM</option>

                                            <option>10 AM to 11 AM</option>

                                            <option>11 AM to 12 PM</option>

                                            </select></td>

                                    </tr>

                                    <tr>

                                            <td>

                                            <input name="afternoon" onclick="return onTimeChecked(this,'afternoon_time')" type="checkbox">Afternoon</td>

                                            <td>

                                            <select disabled="disabled" name="afternoon_time" id="afternoon_time">

                                            <option>Select</option>

                                            <option>12 PM to 01 PM</option>

                                            <option>01 PM to 02 PM</option>

                                            <option>02 PM to 03 PM</option>

                                            <option>03 PM to 04 PM</option>

                                            </select></td>

                                    </tr>

                                    <tr>

                                            <td>

                                            <input name="evening" onclick="return onTimeChecked(this,'evening_time')" type="checkbox">Evening</td>

                                            <td>

                                            <select disabled="disabled" name="evening_time" id="evening_time">

                                            <option>Select</option>

                                            <option>04 PM to 05 PM</option>

                                            <option>05 PM to 06 PM</option>

                                            <option>06 PM to 07 PM</option>

                                            <option>07 PM to 08 PM</option>

                                            </select></td>

                                    </tr>

                            </table>

                            </td>

                    </tr>

                    <tr>

                            <td height="5"></td>

                    </tr>

                    <tr>

                            <td class="heading" colspan="3">Additional Information</td>

                    </tr>

                    <tr>

                            <td height="5"></td>

                    </tr>

                    <tr>

                            <td>Additional Information/Query(if any)</td>

                            <td>:</td>

                            <td>

                            <textarea id="query" cols="32" name="query" rows="3"></textarea></td>

                    </tr>

                    <tr>

                            <td align="center" colspan="3"><fieldset>

                            <legend>Verification</legend>

                            <!--  <p class="formsubelement2" >Click image to refresh</p> -->

                          

                            <div id="captchaimage" align="center">

                                    <!--  <a href="" name="_img_captcha" id="_img_captcha" onclick="refreshimg(); return false;" title="Click to refresh image"> -->

                                    <img id="captcha" alt="Captcha image" height="46" src="captcha.php?txt=<?php echo $_SESSION['captcha']?>" width="111">

                            </div>

                        

                            <div align="center">

                                    Enter characters shown on picture:<br>

                                    

                                    <input id="txtcaptcha" class="inplaceError" maxlength="6" name="txtcaptcha" style="width: 111px;" type="text">

                                    <input id="captcha_test" maxlength="6" name="captcha_test" type="hidden" value="<?php echo  $_SESSION['captcha'] ?>">

                            </div>

                            </fieldset></td>

                    </tr>
				<!--	<tr><td><div >
    <a href="https://www.facebook.com/sharer/sharer.php?u=ksfi.edu" class="" target="_top"><img  src="images/facebook.png" style="width:28px;height:28px" title="Share on Facebook"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					
	<a href="https://twitter.com/intent/tweet?text=title=ksfi(knowledge and skill financing) provides educational loans  &url=http://www.ksfi.co.in" class="" ><img  src="images/twitter.png" style="width:28px;height:28px" title="Tweet on Twitter"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
	<a href="https://www.linkedin.com/shareArticle?title=ksfi (knowledge and skill financing) provides educational loans  &url=http://www.ksfi.co.in
" class=""><img  src="images/linkedin.png" style="width:28px;height:28px"
	title="Share on Linkedin"></a></div></td></tr>-->
					
					

                    <tr>

                            <td align="center" colspan="3">
							
							
							<tr><td align="right"><input id="action"  class="nextbutton" style="font-size: 16px;" type="button" value="Back" onclick="activetabs('2')"></td>
							
							<td align="right"><input id="action"  class="nextbutton" style="font-size: 16px;" type="submit" value="Submit" ></td>
					
					

                           

                    </tr>

                    <tr>

                            <td height="20"></td>

                    </tr>

            </table>					

					
  </div>
</div>
 
 
				<table border="0" cellpadding="0" cellspacing="0" width="978">

						<tr>

							<td class="line" colspan="2" height="1">

							<!--<img alt="" height="1" src="images/pixel.gif" width="1">---></td>

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

							<td  class="line" colspan="2" height="1">

							<!--<img alt="" height="1" src="images/pixel.gif" width="1">--></td>

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