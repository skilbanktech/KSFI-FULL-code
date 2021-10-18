<?php 
session_start();

if(isset($_SESSION['id']))
{
$id=$_SESSION['id'];


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
<script language="javascript" src="js/contactus.js" type="text/javascript"> </script>
<link type="text/css" href="css/cupertino/jquery-ui-1.8.16.custom.css" rel="stylesheet">
<script language="javascript" src="js/common.js" type="text/javascript"> </script>
<script language="javascript" src="js/loanApplication.js" type="text/javascript"> </script>
<script language="javascript" src="js/popupValidation.js" type="text/javascript"> </script>
<script language="javascript" src="js/copy_state.js" type="text/javascript"> </script>
<link type="text/css" rel="stylesheet" href="css/popupstyle.css" >
<script type="text/javascript" src="js/jquery-1.8.2.js"></script>

<script type="text/javascript">
function changeState(fld,fld1,fld2,fld3,fld4,fld5,fld6)
{


	var cb1 = document.getElementById(fld1);

	var cb2 = document.getElementById(fld2);

	var cb3 = document.getElementById(fld3);

	var cb4 = document.getElementById(fld4);

	var cb5 = document.getElementById(fld5);

	var cb6 = document.getElementById(fld6);	

	

	cb1.disabled = true;

	cb2.disabled = true;

	cb3.disabled = true;
	
	cb1.style.display = "none";

	cb2.style.display = "none";
	
	cb3.style.display = "none";
	
	cb4.style.display = "";

	cb5.style.display = "";
	
	cb6.style.display = "";
	
	

	

	cb4.disabled = false;

	cb5.disabled = false;

	cb6.disabled = false;



      

}

</script>
<style type="text/css">
#overlay {
position: fixed;
top: 0;
left: 0;
width: 100%;
height: 100%;
background-color: #000;
filter:alpha(opacity=70);
-moz-opacity:0.7;
-khtml-opacity: 0.7;
opacity: 0.7;
z-index: 100;
display: none;
 
}
.cnt223 a{
text-decoration: none;
}
.popup{
width: 100%;
margin: 0 auto;
display: none;
position: fixed;
z-index: 101;
 overflow-y:scroll;
 height:100%;
}
.cnt223{
min-width: 600px;
width: 850px;
min-height: 150px;
margin: 100px auto;
background: white;
position: relative;
z-index: 103;
padding: 10px;
border-radius: 5px;
box-shadow: 0 2px 5px #000;

}
.cnt223 p{
clear: both;
color: #555555;
text-align: justify;
}
.cnt223 p a{
color: #d91900;
font-weight: bold;
}
.cnt223 .x{
float: right;
height: 35px;
left: 22px;
position: relative;
top: -25px;
width: 34px;
}
.cnt223 .x:hover{
cursor: pointer;
}
</style>
<script type="text/javascript">
	
	$(function(){
	
	
	$(".social_login").show();
			$(".user_login").hide();
			
			
		// Calling Login Form
		$("#next").click(function(){
			$(".social_login").hide();
			$(".user_login").show();
			return false;
		});

		// Calling Register Form
		$("#register_form").click(function(){
			$(".social_login").hide();
			$(".user_register").show();
			$(".header_title").text('Register');
			return false;
		});

		// Going back to Social Forms
		$(".back_btn").click(function(){
			$(".user_login").hide();
			$(".user_register").hide();
			$(".social_login").show();
			$(".header_title").text('Login');
			return false;
		});

	})
</script>
<script type='text/javascript'>
$(function(){
var overlay = $('<div id="overlay"></div>');
overlay.show();
overlay.appendTo(document.body);
$('.popup').show();
$('.close').click(function(){
$('.popup').hide();
overlay.appendTo(document.body).remove();
return false;
});
$('.x').click(function(){
$('.popup').hide();
overlay.appendTo(document.body).remove();
return false;
});
});
</script>
<script type='text/javascript'>
function validateTerms(fld)

{
if(fld.checked== true)

{
document.getElementById("submit1").disabled = false;

}
else
{
document.getElementById("submit1").disabled = true;
}

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
<script type="text/javascript">

			$(function()

			{

			$( "#datepicker" ).datepicker({

			changeMonth: true,

			changeYear: true,

			maxDate:new Date(),

			yearRange:"c-100:c+1"

		});

		



			});

		</script>

		   
	
</head>

<body id="Body">


<div class='popup'>
<div class='cnt223'>


<div class="modal-body">

<div class="social_login">

<?php 
include('./connection.php');
$select_query = "Select reference_id,firstname,middlename,lastname,dob,email,password,address,street1,street2,state,district,

            city,pincode,stdcode,phone,mobile,phone1 from student_details where reference_id = '$id'";

	$select_record=mysql_query($select_query); 

	//echo $select_query;


	$row= mysql_fetch_row($select_record);

        

	if($row)

            {

                $col = array('reference_id','firstname','middlename','lastname','dob','email','password','address','street1','street2','state','district',

                'city','pincode','stdcode','phone','mobile','phone1');



                $fetch = array_combine($col,$row); 
				
				$firstname=$fetch['firstname'];
				
				$fname=ucfirst($firstname);
				
				$fullname=$fname."  ".$fetch['middlename']. " " .$fetch['lastname'];

}
$select_query2 = "Select reference_id,coborrowerid,relation,relative,cfirstname,cmiddlename,clastname,cdob,

                cpanno,cemail,caddress,cstreet1,cstreet2,cstate,cdistrict,ccity,cpincode,cstdcode,cphone,cmobile,samestudadd from coapplicant_details where reference_id = '$id' and coborrowerid='1'";

	$select_record2=mysql_query($select_query2); 

	//or die(mysql_error());

	



	$row2= mysql_fetch_row($select_record2);

        

        $coborrowerCol = array('reference_id','coborrowerid','relation','relative','cfirstname','cmiddlename','clastname','cdob',

                'cpanno','cemail','caddress','cstreet1','cstreet2','cstate','cdistrict','ccity','cpincode','cstdcode','cphone','cmobile','samestudadd' );


				
       if($row2)

            {
				
				
			   $fetch2 = array_combine($coborrowerCol,$row2); 
			 
			   $cfirstname=$fetch2['cfirstname'];
				
			   $cfname=ucfirst($cfirstname);
				
			   $cfullname=$cfname."  ".$fetch2['cmiddlename']. " " .$fetch2['clastname'];

            }

?>
<form id="" action="send_declarationdetails.php"  method="post" name="loanApplication" onsubmit="return validateLoanApplicationFormOnSubmit(this,'1');">	
  <table width="100%">
 						<tr>
							
							<td><img alt="KSF Logo" src="images/img2.gif"> </td>
							</tr>
							
  
<tr><td>    
Dear  <?php 		
       if($row2)

            { echo $fullname." and " .$cfullname ."," ; } else { echo  $fullname; }?> </td></tr>

<tr><td colspan="2">Thank you for filling the application form. Please correct/confirm the contact information  below.</td></tr>

<tr>
    <td>
          <table>
		  <tr><td><input type="hidden"  name="fullname" 

                                    value="<?php if($row) {  echo $fname."  ".$fetch['middlename']. " " .$fetch['lastname'];} ?>"></td></tr>
									<tr>
									<tr><td><input type="hidden"  name="cfullname" 

                                    value="<?php if($row2) {  echo $cfname."  ".$fetch2['cmiddlename']. " " .$fetch2['clastname'];} ?>"></td></tr>
									
                                     	<tr><td><input type="hidden"  name="coborrowerdetails" id="coborrowerdetails" 

                                    value="<?php if($row2) {  echo "Yes";  }else { echo "No"; } ?>"></td></tr>
									

									<tr>

                            <td><b><?php echo $fullname.' details:'?></b></td></tr>

									<tr>

                            <td>First Name</td>

                            

                            <td>

                            <input id="firstname" name="firstname" style='width:300px;' type="text"

                                    value="<?php if($row) { echo $fetch['firstname']; } ?>"></td>

                    </tr>

                    <tr>

                            <td>Middle Name</td>

                           

                            <td>

                            <input id="middlename" name="middlename" style='width:300px;' type="text" 

                                    value="<?php if($row) { echo $fetch['middlename']; } ?>"></td>

                    </tr>

					
                    <tr>

                            <td>Last Name</td>

                           

                            <td>

                            <input id="lastname" name="lastname" style='width:300px;' type="text" 

                                    value="<?php if($row) { echo $fetch['lastname']; } ?>"></td>

                    </tr>

                    
                    <tr>

                            <td>Date of Birth</td>

                            

                            <td>

                            <input id="datepicker" name="datepicker" style='width:300px;' type="text" 

                                    value="<?php if($row) { $originaldate= $fetch['dob'];

                                                            $newdate=date("d-m-Y",strtotime($originaldate));

                                                            echo "$newdate";} ?>"></td></tr>

                   

                            <tr><td>Email Address</td>

                           

                            

                            <td><input id="email" name="email" style='width:300px;' type="text" value="<?php if($row) { echo $fetch['email']; } ?>"></td>

                    </tr>

                    <tr>

                            <td>Address</td>

                            

                            <td>

                            <input id="address" name="address"  style='width:300px;' type="text" 

                                    value="<?php if($row) { echo $fetch['address']; } ?>"></td>

                    </tr>

                    <tr>

                            <td>Street1</td>

                            <td>

                            <input id="street1" name="street1" style='width:300px;' type="text" 

                                    value="<?php if($row) { echo $fetch['street1']; } ?>"></td>
					</tr>
					<tr>
					

                           <td> Street2 (optional)</td>

                            <td><input id="street2" name="street2" style='width:300px;' type="text" 

                                    value="<?php if($row) { echo $fetch['street2']; } ?>">

								   
                            </td>

                    </tr>

                    <tr>

                            <td>State</td>

                            

                            <td>



                            <input id="countrySelect1"  name="country1" style='width:300px;' type="text" 

                                        onChange="changeState(this,'countrySelect1','stateSelect1','citySelect1','countrySelect','stateSelect','citySelect');"     value="<?php if($row) { echo $fetch['state']; } ?>">

                                       



                            <select disabled="disabled"  style="display:none" id="countrySelect"  name="country" 

                                    onchange="populateState('countrySelect','stateSelect');

                                            populateCity('countrySelect','citySelect')" size="1">

                            </select></td>
							

                  </tr>
				  <tr>



                          <td>   District</td>
                                <td><input id="stateSelect1" name="state1" style='width:300px;' type="text" onChange="changeState(this,'countrySelect1','stateSelect1','citySelect1','countrySelect','stateSelect','citySelect');"

                                            value="<?php if($row) { echo $fetch['district']; } ?>" > 

                                            

                                <select disabled="disabled" style="display:none" id="stateSelect"  name="state" size="1"></select>

                        </tr>        <script type="text/javascript">initCountry('','countrySelect','stateSelect','citySelect');</script></td>

                          <tr><td> City</td>
                            <td><input id="citySelect1" name="city1" style='width:300px;' type="text"
							onChange="changeState(this,'countrySelect1','stateSelect1','citySelect1','countrySelect','stateSelect','citySelect');"

                                        value="<?php if($row) { echo $fetch['city']; } ?>" >  

                                            

                            <select id="citySelect" style="display:none"  name="city" size="1" disabled="disabled">

                            </select>

                            <script type="text/javascript">initCountry('','countrySelect','stateSelect','citySelect');</script>

                            </td>

                    </tr>
					
				 <tr>

                            <td>Phone No.</td>

                            

                            <td>

                           <input id="stdcode" placeholder="STD Code" maxlength="6" name="stdcode" size="12" type="text" 

                                    value="<?php if($row) { echo $fetch['stdcode']; } ?>" >
                                
                            <input id="phone" placeholder="Enter 8 digits" maxlength="8" name="phone" size="20" type="text" 

                                value="<?php if($row) { echo $fetch['phone']; } ?>"> </td>
								
					</tr>			
                             <td>  Mobile No.</td>
                            <td><input id="mobile" maxlength="10" name="mobile" style='width:300px;' type="text" 

                        value="<?php if($row) { echo $fetch['mobile']; } ?>"> 

                                </td>

								
                    </tr>
					</tr>			
                           
                            <td><input id="phone1" maxlength="10" name="phone1" style='width:300px;' type="hidden" > </td>

								
                    </tr>
					
					
					 <tr>

                   
            
		
		     </table>
	    </td>
		<td>
		<?php 			
       if($row2)

            
		{ ?>
		
		<table>
		
		
									
		<tr>

                            <td colspan="2"> <b><?php echo $cfullname.' details:'?></b></td></tr>

								
								
								<tr>

                            <td>First Name</td>

                            

                            <td>

                            <input id="cfirstname" name="cfirstname" style='width:300px;' type="text"

                                    value="<?php if($row2) { echo $fetch2['cfirstname']; } ?>"></td>

                    </tr>

                    <tr>

                            <td>Middle Name</td>

                           

                            <td>

                            <input id="cmiddlename" name="cmiddlename" style='width:300px;' type="text" 

                                    value="<?php if($row2) { echo $fetch2['cmiddlename']; } ?>"></td>

                    </tr>

					
                    <tr>

                            <td>Last Name</td>

                           

                            <td>

                            <input id="clastname" name="clastname" style='width:300px;' type="text" 

                                    value="<?php if($row2) { echo $fetch2['clastname']; } ?>"></td>

                    </tr>
		<tr>

                    <td>Date of Birth</td>

                   

                    <td>

                    <input id="datepicker1" name="datepicker1" style='width:290px;' type="text"

                    value="<?php if($row2) { $originaldate= $fetch2['cdob'];

                    $newdate=date("d-m-Y",strtotime($originaldate));

                    echo $newdate;

                    } ?>"  >

                   </td>

            </tr>

           

            <tr>

                    <td>Email Address</td>

                    

                    <td>

                    <input id="cemail" name="cemail" style='width:290px;' type="text"

                value="<?php if($row2) { echo $fetch2['cemail']; } ?>" ></td>

            </tr>

            <tr>

                    <td bgcolor="#E6F0FA" colspan="2">

                    <input name="same" onclick="return onclickSameAddress(this)" type="checkbox"  

                        <?php if($row2){

                                if($fetch2['samestudadd'] == 'on')

                                    {   echo "checked='checked'";   }	}

                                    ?>>Same as Student's Address

                    </td>

            </tr>

            <tr>

                    <td>Address</td>

                   

                    <td>

                    <input id="caddress" name="caddress" style='width:290px;' type="text"

                        value="<?php if($row2) { echo $fetch2['caddress']; } ?>" 
						
                        <?php if($row2){

                                if($fetch2['samestudadd'] == 'on')

                                    { echo  'readonly=readonly';     }	}

                                    ?>	></td>

            </tr>

            <tr>

                    <td>Street1</td>

                    

                    <td>

                    <input id="cstreet1" name="cstreet1" style='width:290px;' type="text" 

                        value="<?php if($row2) { echo $fetch2['cstreet1']; } ?>" 
						
						<?php if($row2){

                                if($fetch2['samestudadd'] == 'on')

                                    { echo  'readonly=readonly';     }	}

                                    ?> >				

                       </td>

            </tr>

            <tr>

                    <td>Street2 (optional)</td>

                   

                    <td>

                    <input id="cstreet2" name="cstreet2" style='width:290px;' type="text"

                        value="<?php if($row2) { echo $fetch2['cstreet2']; } ?>" 

                      <?php if($row2){

                                if($fetch2['samestudadd'] == 'on')

                                    { echo  'readonly=readonly';     }	}

                                    ?>	>									

                       

                    

                    </td>

            </tr>

            <tr>

                    <td>State</td>

                   

                    <td>

                    <input id="ccountry1" style='width:290px;'  name="ccountry1" type="text" onChange="changeState(this,'ccountry1','cstate1','ccity1','ccountrySelect','cstateSelect','ccitySelect');" 

                            value="<?php if($row2) { echo $fetch2['cstate']; } ?>"
                            <?php if($row2){

                                if($fetch2['samestudadd'] == 'on')

                                    { echo  'readonly=readonly';     }	}

                                    ?>	>										

                            


                    <select disabled="disabled"  style="display:none" id="ccountrySelect" name="ccountry" 

                            onchange="populateState('ccountrySelect','cstateSelect'); populateCity('ccountrySelect','ccitySelect')" size="1">

                    </select>

                    </td>

            </tr>

            <tr>

                    <td>District</td>

                    

                    <td>





                        <input id="cstate1" style='width:290px;' name="cstate1" type="text" onChange="changeState(this,'ccountry1','cstate1','ccity1','ccountrySelect','cstateSelect','ccitySelect');" 

                    value="<?php if($row2) { echo $fetch2['cdistrict']; } ?>" 
					<?php if($row2){

                                if($fetch2['samestudadd'] == 'on')

                                    { echo  'readonly=readonly';     }	}

                                    ?>	>			

                    
                    <select id="cstateSelect" style="display:none" disabled="disabled" name="cstate" size="1">

                    </select><script type="text/javascript">initCountry('','ccountrySelect','cstateSelect','ccitySelect');</script>

                    </td>

            </tr>

            <tr>

                    <td>City</td>

                   

                    <td align="left" valign="top">

                        <input id="ccity1" name="ccity1" style='width:290px;' type="text" onChange="changeState(this,'ccountry1','cstate1','ccity1','ccountrySelect','cstateSelect','ccitySelect');" 

                                        value="<?php if($row2) { echo $fetch2['ccity']; } ?>" 
										<?php if($row2){

                                if($fetch2['samestudadd'] == 'on')

                                    { echo  'readonly=readonly';     }	}

                                    ?>	>
					

                    <select id="ccitySelect" style="display:none" disabled="disabled" name="ccity" size="1"></select>

                    <script type="text/javascript">initCountry('','ccountrySelect','cstateSelect','ccitySelect'); </script>



                    </td>

            </tr>



            

            <tr>

                    <td>Phone No.</td>


                    <td>

                    <input id="cstdcode" placeholder="STD Code" maxlength="6" name="cstdcode" size="10" type="text"

                        value="<?php if($row2) { echo $fetch2['cstdcode']; } ?>"
						<?php if($row2){

                                if($fetch2['samestudadd'] == 'on')

                                    { echo  'readonly=readonly';     }	}

                                    ?>	>			

                       

                    <input id="cphone"  placeholder="Enter 8 digits" maxlength="8" name="cphone" size="20" type="text" 

                            value="<?php if($row2) { echo $fetch2['cphone']; } ?>"
							<?php if($row2){

                                if($fetch2['samestudadd'] == 'on')

                                    { echo  'readonly=readonly';     }	}

                                    ?>></td>



            </tr>
			</tr>			
                             <td>  Mobile No.</td>
                            <td><input id="cmobile" maxlength="10" name="cmobile" style='width:300px;' type="text" 

                        value="<?php if($row2) { echo $fetch2['cmobile']; } ?>"> 

                                </td>

								
                    </tr>
					</tr>			
                           
                            <td><input id="cphone1" maxlength="10" name="cphone1" style='width:300px;' type="hidden" > </td>

								
                    </tr>
		</table>
		
		<?php } ?>
		</td>
   </tr>
		
		
<tr><td>&nbsp;</td></tr>
					<tr>
                    <td colspan="3">
					<div >
					<div align="center" style="margin-right:10px;"><input type="button" id="confirm" width="120px" name="loanApplication" value="Confirm" onclick="return validateLoanApplicationFormOnSubmit(this,'1');" >
					<input type="button"  hidden="true"  disabled="disabled" id="next" value="Next>>" >
					</div>
					
                       </td>
                  </tr>
				  
</table> 
</div>
</div>
<div class="user_login">
				
				<form>
					<table>
					<tr>
							
							<td><img alt="KSF Logo" src="images/img2.gif"> </td>
							</tr>
					<tr><td><span class="bluetext">Terms and Conditions</span></td></tr>
<tr><td><ul><li>
I/We agree that all information provided in this student loan application form is true and correct.</li>
<li>
I/We authorize Kashmir Finance Pvt. Ltd. and its partner companies/agents to verify the information provided by me/us in this application which includes residence verification, employmentverification, and telephone verification.
</li>
<li>I/We understand and acknowledge that Kashmir Finance Pvt. Ltd. shall have the absolute discretion, without assigning any reason (unless required by applicable law), to reject our application and that Kashmir Finance Pvt. Ltd.  shall not be responsible/liable in any manner whatsoever to me/us for such rejection, or any delay in notifying me/us of such rejection and any costs, losses, damage or expenses or other consequences, caused by such rejection, or any delay in notifying me/us of such rejection, of my/our application.</li>
<li>
I/We have been explained and I/We have understood, acknowledge and agree that the rate of interest on the loan applied, would be dependent on variable risk related parameters,with respect to our credit history as well as other information provided by us, at time and during the processing of loan, and other factors like cost of funds and operational costs of Kashmir Finance Pvt Ltd.</li>
<li>I/We Declare that I have not availed any educational loan from any other bank/financial Institution.</li>
<li>I/We Confirm that I have not defaulted on any other loan or have no insolvency proceedings against me nor I have been adjudicated as insolvent.</li>
<li>I/We understand that this online application form in itself is not a 
	complete set of information for loan application requirement. This has to be 
	supported with hard copy of Kashmir Finance Pvt Ltd Loan application form on 
	paper, along with supporting documents duly filled as well as signed by 
	myself, should be submitted at the nearest Kashmir Finance Pvt Ltd office or 
	customer service office.</li>
	
</ul></td></tr>
<tr>
                    <td align="left" class="formsubelement"><input type="checkbox" name="term" id="term" value="term" onclick="validateTerms(this)">I/We agree to the above terms and conditions.</td></tr>
					
					<tr><td><input type="submit" name="submit" value="Submit" id="submit1" disabled='disabled'/></td></tr>
					
					
			
					
					
					</table>	
			</form>
			</div>

				</div>
</div>
</p>
</div>
</div>





<div align="center">
	<form id="Form"  autocomplete="off" enctype="multipart/form-data" method="post" name="Form" onsubmit="return validateLoginFormOnSubmit(this)" style="height: 100%;">
		<div align="center" class="skinwrapper">
			<table align="center" border="0" cellpadding="0" cellspacing="0" class="auto-style2" style="width: 1007px; height: 400px">
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
											
											if (!isset($_SESSION['firstname'])) { ?>
											<a class="normal" href="index.php">Login</a>
											<?php }else { echo "Welcome,  ".$_SESSION['name']; ?>&nbsp;&nbsp;|&nbsp;&nbsp;
											<a class="normal" href="logout.php">
											Logout</a>&nbsp;&nbsp;|&nbsp;&nbsp;
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
							<img alt="" height="1" src="images/pixel.gif" width="8"></td>
						</tr>
					</table>
        <!-- #BeginEditable "Content" -->
					
                <table align="center" border="0" style="width: 578px; height: 292px">
                        <tr>
                                <td style="height: 100px"></td>
                        </tr>
                        <tr>
                                <td class="services">Thank you for registering and 
                                applying for a loan.<br>Your login details 
                                have been sent on your(Student) email address.<br></td>
                        </tr>
                        <tr>
                                <td class="services">&nbsp;Print the filled 

                                application form and/or download the complete Application 

                                Form from download application section and submit to nearest ksfi branch for faster processing.<br><br>



                                </td>
                        </tr>
                        
                        <tr>
                                <td height="100"></td>
                        </tr>
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

<?php 

} else {   header('location:index.php'); } ?>

<!-- #EndTemplate -->

</html>
