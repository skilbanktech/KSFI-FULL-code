<?php

	
session_start();

          include('./connection.php');

          include('common/class_Common.php');
						  
             $objCommon=new Common();
			 
            //set  the session to check the user registering from  the form
			$_SESSION['useridentity']='partner';
			
			
		//generate otp
			$OTP=$objCommon->OTP();
			
		    $emailOTP=$objCommon->smallAlphabets_OTP();

          

?>
<!DOCTYPE html>
<html lang="en">
<head>
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
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="bootstrap/js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="bootstrap/js/bootstrap-submenu.min.js" defer></script>
<link id="KSFSkin" href="css/bootstrap_skin.css" rel="stylesheet" type="text/css">

<link id="KSFSkin" href="css/ksfi.css" rel="stylesheet" type="text/css">

<link type="text/css" href="css/cupertino/jquery-ui-1.8.16.custom.css" rel="stylesheet">

<script language="javascript" src="js/copy_state.js" type="text/javascript"></script>

<script language="javascript" src="js/partner_registration.js" type="text/javascript">

 </script>
 <script language="javascript" src="js/loanApplication.js" type="text/javascript"></script>
 
 
 
<link href="bootstrap/css/bootstrap-dropdownhover.css" rel="stylesheet">

<script language="javascript" src="js/jquery-1.6.2.min.js" type="text/javascript"></script>

 <script language="javascript" src="js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>


 <script language="javascript" src="js/common.js" type="text/javascript">
</script>



		
<?php  if(isset($_SESSION['fbemail']))  { ?>
		
<?php   }  else { ?>
<script language="javascript" src="js/facebook.js" type="text/javascript"></script>
 <?php }  ?>


<style type="text/css">

.btn { background: #ffb248;}
.btn_red {background: #ED6347; color: #FFF;}

.btn:hover {background: #E4E4E2;}
.btn_red:hover {background: #C12B05;}


label{
float:left;
}


</style>
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 60%;
   height: 95%;
}


</style>
<script>
function onselectdisable(fld,fld1,fld2,fld3,fld4,fld5,fld6,fld7)
{
	
	 if (fld.checked == true) {
		
	   val = fld.value;
	   
	  
	   document.getElementById(fld7).value=val; 
	   document.getElementById(fld1).disabled= true;
	   document.getElementById(fld2).disabled= true;
	   document.getElementById(fld4).disabled= true;
	   document.getElementById(fld5).disabled= true;
	   document.getElementById(fld6).disabled= true;
	   document.getElementById(fld3).disabled= true;
	   
	   
		
		
	}	
	else
	{
	 document.getElementById(fld7).value=""; 	
	document.getElementById(fld1).disabled= false;
    document.getElementById(fld2).disabled= false;	
    document.getElementById(fld4).disabled= false;
	document.getElementById(fld5).disabled= false;
	document.getElementById(fld6).disabled= false;
	document.getElementById(fld3).disabled= false;	
	
		
	}
	
	
}

</script>
<script>

function insertweblink()

{
	
document.getElementById('URL').value = 'http://www.';
	
	
}



function validate(){

		var AnswerInput = document.getElementsByName('role[]');
		for (i=0; i<AnswerInput.length; i++)
			{
			 if (AnswerInput[i].checked == false)
				{
			 	 alert('Complete all the fields');		
			 	 return false;
				}
			}
	}
</script>

 
</head>





<link type="text/css" href="bootstrap/css/bootstrapmultislider.css" rel="stylesheet">


</head> 
<body onload="popup()">
<div class="bs-example" >
    
	
							
			<div style="background-color:white">
               <table width="100%" style="background-color:white">	
						<tr height="15px"></tr>
						<tr><td align="left">			
						 <span align="left" >
                           <img alt="KSF Logo" src="images/img2.gif" class="img-responsive"/></span></td>
						        <td align="right">
			                               
			                               <span align="right"  valign="top">
											
										
											<a href="./signup.php" style="font-size: 16px;"  class="button">Apply for Loan</a>
											<div class="dropdown" >
												  <a href="#" style="font-size: 16px;"  class="button"><img src="images/employee.png" style="height:20px;width:20px;">&nbsp;&nbsp;Login &nbsp;&nbsp;<span class="caret"></span></a>
												  <div class="dropdown-content">
													<a href="./login.php"  style="font-size:14px" align="left">Student</a>
													<a href="./login.php"  style="font-size:14px" align="left">Loan Applicant</a>
													<a href="intLogin.php?Role=Employee" style="font-size:14px" align="left">Employee</a>
													<a href="intLogin.php?Role=Partner"  style="font-size:14px" align="left" >Partner/Agency</a>
												  </div>
												</div>
																						
								            
								            
                </td></tr> <tr height="18px"></tr>
			</table>
        </div> 
    <nav role="navigation" class="navbar navbar-default" style="background-color:#6495ed">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" style="font-size:16px" href="index.html">Home</a>
        </div>
        <!-- Collection of nav links and other content for toggling -->
        <div id="navbarCollapse" align="left" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                
                 <li><a href="services.html"  style="font-size:15px">Services</a> </li>
             <li><a href="aboutus.html" style="font-size:15px">About Us</a></li>
             <li><a href="location.html"  style="font-size:15px">Location</a></li>
             <li><a href="contactus.html" style="font-size:15px">Contact us</a></li>
            </ul>
       
        </div>
    </nav>
	<form id="msform"    method="post"  action="send_partnerRegistration.php" enctype="multipart/form-data" name="loanApplication" onsubmit="return validateLoanApplicationshortFormOnSubmit(this,'1')">
	
<!-----------------contact details slider1-------------->
<!-- fieldsets -->
       
		
<fieldset>

<h2 class="fs-title">Partner sign up</h2>
<h3 class="fs-subtitle">Tell us your contact details</h3>

 <input type="text" name="firstname"  class="form-control" id="firstname"   
 value="<?php  if(isset($_SESSION['socialLogin_user_fname'])) { echo $_SESSION['socialLogin_user_fname']; } ?>" placeholder="First Name" /> 
  <input type="text" name="lastname" class="form-control" id="lastname"  value="<?php if(isset($_SESSION['socialLogin_user_lname'])) { echo $_SESSION['socialLogin_user_lname']; }?>"placeholder="Last Name"  />   
  <input type="text" name="email"   class="form-control" id="email"
             value="<?php if(isset($_SESSION['socialLogin_email'])) { echo $_SESSION['socialLogin_email'];  } ?>"  placeholder="Email"  /> 
			  
			   
	    <input id="mobile" maxlength="10"  class="form-control" name="mobile" size="40" type="text" placeholder="Mobile">
		
		<select id="typeofcompany" class="form-control"  name="typeofcompany" size="1">
		
			<option value="">Select Company Type</option>
			<option>Proprietor</option>
			<option>Partnership</option>
			<option>Private Limited</option>
			<option>Limited</option>
			
		</select><br>
		 
		 
		<input type="hidden" id="phone1" maxlength="10" name="phone1" size="40">
		<input type="hidden" id="stdcode" maxlength="10" name="stdcode" size="40" >
		<input type="hidden" id="phone" maxlength="10" name="phone" size="40" >
		<input type="hidden" name="confirm_sentotp"  id="confirm_sentotp"  /> 
	<input type="hidden" name="showOTPtoApplicant"  id="showOTPtoApplicant"   value="<?php if(!isset($_SESSION['usertype'])) //if applicant is applying
			   	{  echo "yes"; }  else {  echo "no";?>	
				 
				 <?php } ?>"/>		

    <input type="hidden" name="setnextslide"  id="setnextslide"  />  				 
<input type="submit" id="confirm1"  class="submit action-button"  value="Next" onclick="validateLoanApplicationshortFormOnSubmit(this,'1');"  />




</fieldset>


<!-----------------OTP slider2-------------->

<fieldset>

<h2 class="fs-title"> Partner sign up</h2>
<h3 class="fs-subtitle">Verification</h3>
 <input type="text" name="verifyOTP"  class="form-control" id="verifyOTP" placeholder="Enter the OTP"/> 
<input type="hidden" name="otp"   id="otp" value="<?php echo $OTP; ?>" />  
<input type="hidden" name="emailotp"   id="emailotp" value="<?php echo $emailOTP; ?>" />  

<input type="hidden" name="verified"  id="verified" />  
<input type="hidden" name="link" value="<?php echo $_SESSION['fblink'];?>">
<input type="submit" id="confirm3"  class="action-button"  value="Next" onclick="validateLoanApplicationshortFormOnSubmit(this,'1');"  />

</fieldset>

		<fieldset id="bankdetails">
	<h2 class="fs-title">Partner sign up</h2>
	<h3 class="fs-subtitle">Bank Details</h3>

                <input maxlength="18" Placeholder="IFSC Code"   class="form-control" size="40" id="ifsccode" name="ifsccode"  
					 onKeyup="getbankdetailfromifsc('ifsccode','bankname','branchname','branchadd','micr')" value=""  type="text">
				<input maxlength="18" Placeholder="Account No." class="form-control" size="40"  id="accountNo" name="accountNo" onkeypress="return isNumber(event)" type="text" value="">
				<input maxlength="50" Placeholder="Account Holder"  size="40" id="accountholder" name="accountholder" id="accountholder" type="text" value="" >
				<input maxlength="50" Placeholder="Bank Name"  class="form-control" size="40" id="bankname" name="bankname"  type="text" value="">
				<input maxlength="50" Placeholder="Branch Name"  class="form-control" size="40" id="branchname" name="branchname"  type="text" value="">
				<input maxlength="50" Placeholder="Branch Location"  class="form-control" size="40" id="branchadd" name="branchadd" type="text" value="">
				<input maxlength="18" Placeholder="MICR"  class="form-control" size="40" id="micr" name="micr"  value=""  type="text">
			
			<input type="submit" id="confirm4"  class="action-button next"  value="Next"   />
				 

  </fieldset>

<fieldset >
<h2 class="fs-title">Partner sign up</h2>
<h3 class="fs-subtitle">Tell us about your location</h3>


 <select id="countrySelect" class="form-control"  name="country" onchange="populateState('countrySelect','stateSelect'); populateCity('countrySelect','citySelect')" size="1"></select><br>
			   <select id="stateSelect" class="form-control"  name="state" size="1"></select>
				<script type="text/javascript">initCountry('','countrySelect','stateSelect','citySelect');</script><br>
				<select class="form-control" id="citySelect"  name="city" size="1"></select><br>
				<script type="text/javascript">initCountry('','countrySelect','stateSelect','citySelect');</script>
				<input id="URL" name="url" type="url" onclick="insertweblink();"Placeholder="Website Link">
				<span style="font-size:14px">Upload Brochure/doc</style>
				   <input type="file"  name="file" id="file" size="42" >
					
					
	<input type="hidden"  name="EducationCounsellor"  id="EducationCounsellor" value=""> 
	<input type="hidden"  name="LoanAgency"  id="LoanAgency" value=""> 
	<input type="hidden"  name="TrainingInstitute"  id="TrainingInstitute" value=""> 
	<input type="hidden"  name="VerificationAgency"  id="VerificationAgency" value="">
    <input type="hidden"  name="Merchant_promoter"  id="Merchant_promoter" value=""> 
	<input type="hidden"  name="Sales_assoc"  id="Sales_assoc" value="">
    <input type="hidden"  name="Others"  id="Others" value="">	
    
 <input type="submit" name="submit" id="disablenext2"  class="submit action-button" value="Submit" onclick="return validateLoanApplicationshortFormOnSubmit(this,'1')" />
 
</fieldset>


</form>



<div id="myModal" class="modal">
  <!-- Modal content -->
  
  <div class="modal-content" align="center" >
   <fieldset>
   
     <legend> <span align="left" >
                           <img alt="KSF Logo" src="images/img2.gif" width="200px" class="img-responsive"/></span>
             Partner Register</legend>
			  </table>
			  
			  <h4 class="fs-subtitle">What would you like to register as</h3>
 
         <table>
			<tr><td style="font-size:16px" >
     
            
		     <input type="checkbox"  name="role[]"  id="Education_Counsellor" value="Education Counsellor"  onclick="onselectdisable(this,'Loan_Agency','Verification_Agency','','Merchant','Sales','Other','EducationCounsellor')">&nbsp;Education Counsellor <br/><br/> 
			 <input type="checkbox"  name="role[]" style="" id="Loan_Agency" value="Loan Agency"  onclick="onselectdisable(this,'Education_Counsellor','Verification_Agency','Training_Institute','Merchant','Sales','Other','LoanAgency')">&nbsp;Loan Agency<br/><br/>   
			 <input type="checkbox"  name="role[]" style=""  id="Training_Institute" value="Training Institute"  onclick="onselectdisable(this,'Verification_Agency','','','Merchant','Sales','Other','TrainingInstitute')">&nbsp;Training Institute<br/><br/> 
             <input type="checkbox"  name="role[]" style="" id="Verification_Agency" value="Verification Agency"  onclick="onselectdisable(this,'Training_Institute','Loan_Agency','Education_Counsellor','Merchant','Sales','Other','VerificationAgency')">&nbsp;Verification Agency<br/><br/>  	
			  <!---<input type="checkbox"  name="role[]" style="" id="Merchant" value="Merchant"  onclick="onselectdisable(this,'Training_Institute','Loan_Agency','Education_Counsellor','Verification_Agency','Sales',
			  'Other','Merchant_promoter')">&nbsp;Merchant/Promoter<br/><br/>  	
			   <input type="checkbox"  name="role[]" style="" id="Sales" value="Direct Sales Associate"  onclick="onselectdisable(this,'Training_Institute','Loan_Agency','Education_Counsellor','Verification_Agency','Merchant','Other','Sales_assoc')">&nbsp;Direct Sales Associate<br/><br/>  	
			   <input type="checkbox"  name="role[]" style="" id="Other" value="Other"  onclick="onselectdisable(this,'Training_Institute','Loan_Agency','Education_Counsellor','Verification_Agency','Merchant','Sales','Others')">&nbsp;Other<br/><br/> ----> 	
          
		     <input type="submit" style="width:150px;height:40px" class="submit close1" value="Next" onclick="return validate()" />
			 </tr></td>
              		   
		</table>
	 
           </fieldset>
  </div>
</div>

<script>

function popup()
{
// Get the modal
var modal = document.getElementById('myModal');



// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close1")[0];

// When the user clicks the button, open the modal 

    modal.style.display = "block";


// When the user clicks on <span> (x), close the modal
  span.onclick = function() {
    modal.style.display = "none";
	
	
}

// When the user clicks anywhere outside of the modal, close it
/*window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}*/

}
</script>
				

<!-- jQuery easing plugin --> 
<script src="bootstrap/js/jquery.easing.min.js" type="text/javascript"></script> 
<script language="javascript" src="bootstrap/js/bootstrapmultislider.js" type="text/javascript"></script>

<div id="pageNavPosition" align="center"> </div>
					<div style="border-top:1px solid blue; margin-top:520px; color:#fff; text-align:center;">
	
							<img alt="" height="1" src="images/pixel.gif" class="img-responsive" width="1">
							<img alt="" height="1" src="images/pixel.gif"class="img-responsive" width="22">
							
									<a class="Normal" style="color:black;" href="disclaimer.html" target="_self">
									Disclaimer</a>&nbsp;&nbsp; |&nbsp;&nbsp;
									<a class="Normal" style="color:black;" href="privacypolicy.html" target="_self">
									Privacy Policy</a>
							<img alt="" height="1" src="images/pixel.gif" class="img-responsive" width="1">
							<div class="skinfooter"> Copyright &copy; 2011 KSFi Pvt Ltd.</div>
							
					<span background="images/rtoutline.jpg" class="img-responsive" width="12px">
				
		</div>
	
 
<script type="text/javascript"><!--
    var pager = new Pager('box-table-a',10); 
    pager.init(); 
    pager.showPageNav('pager', 'pageNavPosition'); 
    pager.showPage(1);
//--></script>
		
	
	
</div>


</body>
</html>                                		