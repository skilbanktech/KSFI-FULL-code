 <?php session_start();?>

 
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



<link type="text/css" href="css/cupertino/jquery-ui-1.8.16.custom.css" rel="stylesheet">



<script language="javascript" src="js/copy_state.js" type="text/javascript"> </script>



<script language="javascript" src="js/loanApplication.js" type="text/javascript">



</script>



<script language="javascript" src="js/jquery-1.6.2.min.js" type="text/javascript">



</script>



<script language="javascript" src="js/common.js" type="text/javascript"></script>



<script language="javascript" src="js/contactus.js" type="text/javascript"></script>



<script language="javascript" src="js/jquery-ui-1.8.16.custom.min.js" type="text/javascript">



</script>











<script type="text/javascript">



			$(function()



			{



			$( "#datepicker1" ).datepicker({



			changeMonth: true,



			changeYear: true,



			yearRange:"c-10:c+10",



			dateFormat: "dd-mm-yy",



			beforeShowDay: function(date){ return [date.getDay() != 0, '']; }



		    });			



			});



</script>




<script>

function onSelectedIndexChangeCheque1(fld,fld1,fld2,fld3,fld4,fld5,fld6,fld7,fld8,fld9,fld10,fld11,
                                      fld12,fld13,fld14)
{
	
	
	var error="";

    var cb= document.getElementById(fld1);
    var cb1= document.getElementById(fld2);
    var cb2= document.getElementById(fld3);
    var cb3= document.getElementById(fld4);
	var cb4= document.getElementById(fld5);
	var cb6= document.getElementById(fld6);
	
	var cb7= document.getElementById(fld7);
	var cb8= document.getElementById(fld8);
	var cb9= document.getElementById(fld9);
	var cb10= document.getElementById(fld10);
	var cb11= document.getElementById(fld11);
	var cb12= document.getElementById(fld12);
	var cb13= document.getElementById(fld13);
	var cb14= document.getElementById(fld14);
	
      
	if(fld.value=="Cash")
	 {	

		 cb.disabled=false;
		 cb1.disabled=true;
         cb2.disabled=true;
         cb3.disabled=true;
		 cb4.disabled=true;
		 cb6.disabled=true;
		 cb7.disabled=true;
		 cb8.disabled=true;
		 cb9.disabled=true;
		 cb10.disabled=true;
		 cb11.disabled=true;
		 cb12.disabled=true;
		 cb13.disabled=true;
         cb1.value="";
		 cb2.value="";
		 cb3.value="";
		 cb4.value="";
		 cb6.value="";
		 cb7.value="";
		 cb8.value="";
		 cb9.value="";
		 cb10.value="";
		 cb12.value="";
		 cb13.value="";
	 }
	 else if(fld.value=="ECS")
	 {	


		 cb.disabled=true;
		 cb1.disabled=true;
         cb2.disabled=false;
         
		 cb3.disabled=true;
		 cb4.disabled=false;
		 cb6.disabled=false;
		 cb7.disabled=false;
		 cb8.disabled=false;
		 cb9.disabled=false;
		 cb10.disabled=false;
		 cb11.disabled=true;
		 cb12.disabled=false;
		 cb13.disabled=false;
		 cb14.disabled=false;
		
        
         cb1.value="";
	     cb2.value="";
		 cb3.value="";
			
		
	 }
	 else if(fld.value=="Cheque")
	 {
		  cb.disabled=true;
          // cb.value="";
          cb1.disabled=false;
          cb2.disabled=false;
          cb3.disabled=false;
		  cb4.disabled=true;
		  cb6.disabled=true;
		  cb7.disabled=false;
		  cb8.disabled=false;
		  cb9.disabled=false;
		  cb10.disabled=false;
		  cb11.disabled=false;
		  cb12.disabled=true;
		  cb13.disabled=true;
		  cb14.disabled=true;
		
		 
	 }
	 
	 else
	 {
		
          cb.disabled=false;
          // cb.value="";
          cb1.disabled=false;
          cb2.disabled=false;
          cb3.disabled=false;
		  cb4.disabled=true;
		  cb6.disabled=true;
		  cb7.disabled=false;
		  cb8.disabled=false;
		  cb9.disabled=false;
		  cb10.disabled=false;
		  cb11.disabled=false;
		  cb12.disabled=true;
		  cb13.disabled=true;
		  cb12.disabled=true;
		  
	 return error;

	 }
	 
}
	 
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

<script>
function insRow()
{

    var checkno=document.getElementById('checkNo').value;
	
 if(checkno!='')
 {
	
	document.getElementById('chequelist1').value=checkno;
	
	var val=document.getElementById('numofcheques').value;
	
	var i=1;
	
	for(i=i;i<val;i++)
	{
	
	var x=document.getElementById('chequesTable1');	
	
       // deep clone the targeted row
    var new_row = x.rows[1].cloneNode(true);
       // get the total number of rows
    var len = x.rows.length;
	var i= len-1;
	
	
	
       // set the innerHTML of the first row 
   var inp = new_row.cells[0].getElementsByTagName('input')[0];
   
   
	
	
    var res11 = "chequelist";
	
  //update its name
    res11+= len;
	
	inp.name = res11;
	inp.id = res11;
	
	checkno = parseInt(checkno)+1;
	inp.value=checkno;

	//alert(res11)
     x.appendChild( new_row );
	  
 // inp1.option = inp1.name;
 
	
	
	}
	
	}
		
}

</script>

    
<style type="text/css">
#table-wrapper {
  position:relative;
}
#table-scroll {
  height:150px;
  overflow:auto;  
  margin-top:20px;
}
#table-wrapper table {
  width:100%;

}
#table-wrapper table * {
  background:white;
  color:black;
}
#table-wrapper table thead th .text {
  position:absolute;   
  top:-20px;
  z-index:2;
  height:20px;
  width:35%;
  border:1px solid red;
}

/* The Modal (background) popup window */
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
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 40%;
	height: 40%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0} 
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

/* The Close Button */
.close {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

.modal-header {
    padding: 2px 16px;
    background-color: #0f55a4;
    color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
    padding: 2px 16px;
    background-color: #5cb85c;
  color: white;
}


</style>







<style type="text/css">



.auto-style2 {



	background-image: url('images/rtoutline.jpg');



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



	<form id="Form" action="Send_PDChequeDetails.php" autocomplete="off" enctype="multipart/form-data" method="post" name="Form" style="height: 100%;">



			<?php include('./common/common_mainmenu.php'); ?>
			
			


					<!-- #BeginEditable "Content" -->



					<?php					



					//database connection



	include('./connection.php');



   



	  if(isset($_GET['refid']))
	  {		  
      $reference_id=$_GET['refid'];
	  
	  $_SESSION['reference_id']=$reference_id;
	  
	  }
	  else
	  {
		$reference_id=$_SESSION['reference_id'];  
		  
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



	 $row1 = @mysql_fetch_assoc($select_record1);



      $AppDate=$row1["app_date"];


                $select_query4=mysql_query("Select * from coapplicant_details where reference_id='$reference_id'");
			
				$countcob=mysql_num_rows($select_query4);
				
				
                







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



	



	$select_query2="select max(check_id) as 'check_id' from pdcheck_details where reference_id='$reference_id'";



    



    $select_record2=mysql_query($select_query2);



	$row2= mysql_fetch_row($select_record2);



        



	if($row2){   



	$col2 = array('check_id');



	$fetch2 = array_combine($col2,$row2); 



	

	
	 if(isset($_GET['id']))
	 {
		$chequeID=$_GET['id'];
		
	 }
	 elseif(isset($_POST['myradio']))
	 {
		 
		$chequeID= $_POST['myradio'];  
	 }
	 else
	 {
		$chequeID= $fetch2['check_id'];   
	 }
	 


	



	$select_query3="SELECT reference_id,amount,checkno,bankname,branchname,ifsccode,branchaddress,presentationdate,presentationstatus,cashdepositedby,docname,paymentype,bouncedreasons,depositorname,accountno,email,mobile,applicantType,debitType,frequency,UMRN,accountholder FROM pdcheck_details where reference_id='$reference_id' and check_id='$chequeID';";

	


    



    $select_record3=mysql_query($select_query3);



	$row3= mysql_fetch_row($select_record3);



        



	if($row3){   



	$col3 = array('reference_id','amount','checkno','bankname','branchname','ifsccode','branchaddress','presentationdate','presentationstatus','cashdepositedby','docname','paymentype','bouncedreasons','depositorname','accountno','email','mobile','applicantType','debitType','frequency','UMRN','accountholder');



	$fetch3 = array_combine($col3,$row3); 

          }

        }



	$select_queryDeatils="select * from pdcheck_details where reference_id='$reference_id' order by presentationdate asc";

	$select_recordDeatils=mysql_query($select_queryDeatils);



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
   
   $current_date=date('d-m-Y');
		 



?>  <?php 



					if($_SESSION['usertype'] == 'student'){ ?>







					<table border="0" cellpadding="0" cellspacing="0" width="978">



						<tr height="15px" class="verticalmenu" >



							 <td align="center" >



									<a style="font-size:12px;font-weight:bold" href="downloadapplication.php">Download Application</a></td>



                                                         <td align="center">



									<a style="font-size:12px;font-weight:bold" href="EditApplication.php">My Application</a></td>



									<td align="center">



									<a style="font-size:12px;font-weight:bold" href="DocumentUpload.php">Document Center</a></td>



									<td align="center" >



									<?php  if ($_SESSION['row_count'] <= 1) { ?>



											<a style="font-size:12px;font-weight:bold" href="ApplicationStatus.php">My Application Status</a>											



                                                                                            <?php }else {  ?>



											<a style="font-size:12px;font-weight:bold" href="searchStatus.php">My Application Status</a><?php }?>



									</td>



									<td align="center">



									<a style="font-size:12px;font-weight:bold" href="changePassword.php">Change Password</a>



							</td>



						</tr>



					</table>



<?php } ?>



					<table align="center">



					<tr><td height="20" colspan="2"></td></tr>



								<tr>



									<td class="heading" colspan="2"> 



									Payment Detail</td>



								</tr>

                                <tr><td><input type="hidden" id="ID" name="ID"  value="<?php if(isset($_GET['id'])) { 
								echo $_GET['id']; } else { echo ""; }  ?>"></td></tr>

								<tr><td height="10">Reference ID</td>



								<td height="10"><input id="refid" name="refid" size="20" type="text" readonly="readonly"



                                                               value="<?php echo $reference_id; ?>">



                                                               </td></tr>
			                  

                                  <tr><td style="height: 26px">Borrower Type </td>



							<td style="height: 26px">
							
							<select id="applicantType" name="applicantType" size="1" >


                            <option>Select</option>
							
                          
							<option <?php if($row3) {  if($fetch3['applicantType']=='Borrower') { echo 'selected="selected"'; } } ?> >Borrower</option>

                         <?php  if($countcob >0) { ?>

							<option <?php if($row3) {  if($fetch3['applicantType']=='Coborrower1') { echo 'selected="selected"'; } } ?>>Coborrower1</option>

                         <?php }   if($countcob ==2) { ?>
                            <option <?php if($row3) {  if($fetch3['applicantType']=='Coborrower2') { echo 'selected="selected"'; } } ?>>Coborrower2</option>
                         <?php } ?>
                            



							</select></td></tr>

								<tr><td height="10">Monthly Payment</td>



								<td height="10"><input maxlength="6" name="amount" onkeypress="return isNumber(event)" id="amount" type="text" visible="true"
								value="<?php if($row3) { echo $fetch3['amount']; } ?>"></td></tr>


                               <tr><td style="height: 26px">Payment Type</td>



							<td style="height: 26px">
							
							<select id="payType" name="payType" size="1" onchange="return onSelectedIndexChangeCheque1(this,'CashDepositedBy','checkNo','ifsccode','file','email',
									'mobile','accountNo','bankname','branchname','branchadd','numofcheques','frequency','debitType','UMRN')">


                            <option><?php if($row3) { echo $fetch3['paymentype']; } else {  "Select"; } ?></option>
							


							<option>Cheque</option>
							
							<option>SPDC Cheques</option>
							

                            <option>ECS</option>


                            <option>DDM</option>

                            <option>SI</option>

                            <option>Cash</option>
							
							<option>MMT</option>
							
							<option>UPI</option>
							
							<option>WALLET</option>
							
							<option>IMPS</option>



							</select></td></tr>


						

							<tr><td class="servicesText" style="width: 139px; height: 26px;"><label for="checkNo" id="lblchequeRefNo">Cheque/Referenced No.</label></td>



							<td class="servicesText" style="height: 26px">							



								<input maxlength="8" name="checkNo" id="checkNo" type="text" value="<?php if($row3) { echo $fetch3['checkno']; }  ?>"></td>
								</tr>

                               <tr><td style="height: 17px; width: 139px;">Number of Cheque</td><td style="height: 17px">


                               <select id="numofcheques"   name="numofcheques" style='width:80px;height:25px' onchange=" insRow();" >

                                   <option selected="selected">Select</option>
							
											<script>
											filldropdown_numbers('numofcheques', 1,300);
											
											</script>
											</select>
				            </td></tr>
							
							
                               <tr><td style="width:173px">Frequency</td><td style="height: 17px">


                               <select id="frequency"   name="frequency" style="width:173px" disabled="disabled" >

                                   <option>Select</option>
								    <option <?php if($row3) {  if($fetch3['frequency']=='Monthly') { echo 'selected="selected"'; } } ?>>Monthly</option>
									<option <?php if($row3) {  if($fetch3['frequency']=='Quarterly') { echo 'selected="selected"'; } } ?>>Quarterly</option>
									<option <?php if($row3) {  if($fetch3['frequency']=='HalfYearly') { echo 'selected="selected"'; } } ?>>HalfYearly</option>
									<option <?php if($row3) {  if($fetch3['frequency']=='As and When presented') { echo 'selected="selected"'; } } ?>>As and When presented</option>
							
										
											</select>
				            </td></tr>
							 <tr><td >Debit Type</td><td style="height: 17px">


                               <select id="debitType"   name="debitType" style="width:173px" disabled="disabled" >

                                   <option>Select</option>
								    <option <?php if($row3) {  if($fetch3['debitType']=='Fixed Amount') { echo 'selected="selected"'; } } ?> >Fixed Amount</option>
									<option <?php if($row3) {  if($fetch3['debitType']=='Maximum Amount') { echo 'selected="selected"'; } } ?>>Maximum Amount</option>
									
										
											</select>
				            </td></tr>
 
 
							
 
				                     
									 <tr>

											<td>UMRN</td>

											
											<td>

											<input id="UMRN" maxlength="10" name="UMRN"  disabled="disabled"  type="text"value="<?php if($row3) {  if($fetch3['UMRN']!='') { echo $fetch3['UMRN']; } } ?>"></td>

									</tr>
									<tr>

											<td>Mobile No.</td>

											
											<td>

											<input id="mobile" maxlength="10" name="mobile" 
											value="<?php echo $row1["mobile"];?>" disabled="disabled"  type="text"></td>

									</tr>
									 <tr>

										<td>Email Address(optional)</td>

										

										<td>

										<input id="email" maxlength="45" name="email" value="<?php echo $row1["email"];?>" disabled="disabled" type="text"></td>

								    </tr>


								<tr><td style="height: 17px; width: 139px;">Account No.</td><td style="height: 17px">



								<input maxlength="18" name="accountNo" onkeypress="return isNumber(event)"  id="accountNo" type="text" value="<?php if($row3) { echo $fetch3['accountno']; }  ?>"></td></tr>


                                <tr><td style="height: 17px; width: 139px;"><label id="AccountHolder"  >Account Holder</label></td><td style="height: 17px">



									<input maxlength="50" name="accountholder" id="accountholder" type="text" value="<?php if($row3) { echo $fetch3['accountholder']; }  ?>" ></td></tr>


									



								<tr><td style="height: 17px; width: 139px;"><label id="BankName" >Bank Name</label></td><td style="height: 17px">



									<input maxlength="50" name="bankname" id="bankname" type="text" value="<?php if($row3) { echo $fetch3['bankname']; } ?>"></td></tr>



									



								<tr><td style="width: 139px"><label id="BranchName">Branch Name</label></td><td>



									<input maxlength="50" name="branchname" id="branchname" type="text" value="<?php if($row3) { echo $fetch3['branchname']; } ?>"></td></tr>



									



								<tr><td style="width: 139px"><label id="BranchLocation">Branch Location</label></td><td>



									<input maxlength="50" name="branchadd" id="branchadd" type="text" value="<?php if($row3) { echo $fetch3['branchaddress']; } ?>"></td></tr>



									



								<tr><td style="width: 139px"><label id="lblIFSCCode">IFSC Code</label></td><td>



									<input maxlength="18" name="ifsccode"  value="<?php if($row3) { echo $fetch3['ifsccode']; } ?>" id="ifsccode" type="text"></td></tr>



								



								<tr><td style="height: 26px">Presentation/Deposited Date</td><td style="height: 26px">



									<input id="datepicker1"  name="datepicker1"  type="text" value="<?php 



                                                             $newdate=date("d-m-Y",strtotime($Presentdate));

                                                              if($row3) { 
															  
															  echo $fetch3['presentationdate'];
															  
															  }else
															  {
															  
                                                                echo "$current_date";
															  }



                                       ?>"></td></tr>



                                                             



								<tr><td>



									Presentation Status</td><td><select id="PresentationStatus" name="PresentationStatus" size="1"  style="width:173px"



									onchange="return onPresentationStatusChanged(this,'bouncedreasons')">

                            <option><?php if($row3) { echo $fetch3['presentationstatus']; } else { echo "Select";} ?></option>

							



							<option>To be Presented</option>



							<option>Presented Clearing Awaited</option>



							<option>Cleared</option>



							<option>Bounced</option>



							</select></td></tr>


.
								<tr><td><label for="bouncedreasons" id="BouncedReasons">Bounced Reasons</label>



									</td><td>



					<select id="bouncedreasons" name="bouncedreasons" size="1" disabled="disabled" style="width:173px">



							 <option><?php if($row3) { echo $fetch3['bouncedreasons']; } else { echo "InSufficient Funds";} ?></option>




							<option>Signature Mismatch</option>



							<option>account Closed</option>


                            <option>Cheque wrongly Dated</option>
							
							
							<option>Amount Mismatched</option>
							
							
							<option>Stopped  Payment</option>
							
							<option>Wrong Cheque Details</option>

							<option>Not Counter Signed</option>

                           <option selected='selected'>InSufficient Funds</option>



							</select>



						   </td></tr>



								<tr><td><label id="lblCashDeposited" disabled="disabled">Cash Deposited By</label></td><td>



									<select id="CashDepositedBy" name="CashDepositedBy" size="1" disabled="disabled"



									onchange="return onCashDepositedByChanged(this,'Depositorname')">

                            <option><?php if($row3) { echo $fetch3['cashdepositedby']; }  else { "Select"; } ?></option>

							



							<option>Employee</option>



							<option>Partner </option>



							<option>Depositor</option>

     

							</select></td></tr>



								<tr><td>Depositor name</td><td>



									<input maxlength="50" name="Depositorname" id="Depositorname" type="text" disabled="disabled" value="<?php if($row3) { echo $fetch3['depositorname']; }   ?>"></td></tr>



								<tr><td><label id="lblUploadImage" visible="true">Upload Image</label>



									</td><td>



								<input type="file"  name="file" id="file" size="42" visible="true"></td></tr>



								<tr><td style="height: 17px">



									</td><td style="height: 17px">



									</td></tr>



								<tr><td height="10" colspan="2"></td></tr>


                               </table>
	<table align="center">
									

       <tr>
 
               <td>
 
 
 
		 <div id="myModal" class="modal">

		  
		  <div class="modal-content">
			<div class="modal-header">
			  <span class="close">&times;</span>
			  <h2 align='left'>Cheque Details</h2>
			</div>
			<div  style="overflow-x:auto;" class="modal-body">
			<div id="table-wrapper">
              <div id="table-scroll">
			 <table id="chequesTable1" align="center" id="popup"> 
			 <tbody>
			  <tr>
			  <td>cheques No.List</td>
			   </tr>
			   <tr>
			 
			   <td>Account Holder :<?php if($row3) { echo $fetch3['accountholder']; }  ?></td>
				
				</tr>
				<tr>
			 
			   <td>Account Number : <?php if($row3) { echo $fetch3['accountholder']; }  ?></td>
				
				</tr>
			   
			  
			   <tr>
					<td>
					<input id="chequelist1" name="chequelist1" class="" >
					</td>
			   </tr>
			   </tbody>
			 </table>
			 </div>
			 </div>
			 
    </div>
    
  </div>

</div>
 
 </td>
 </tr>
 
 
 
 <script>
 
 function selectedchequelist()
 
 {
 

 
// Get the modal
var modal = document.getElementById('myModal');


// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 

    modal.style.display = "block";
	modal.style.height="1100";
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


}
</script>
								</table>

							   <table  align="center">
								<tr>

                                      								
										 <td>
										 <input type="button" value="Detailed Cheque List" onclick="selectedchequelist();">
										 </td>
								
									

									<td align="center" colspan="2">

                                  

									<input name="submit" type="submit" value="Submit" >
									
									
								   
                                <input name="btnBack" type="button" value="Back" onclick="history.back(-1)"> </td>



								</tr>



								<tr><td height="10" colspan="2"></td>



                                                                </tr>



                                                                <tr><td colspan="2">



                                     <input type="hidden" name="no" value="<?php if(($_SESSION['usertype'] == 'Employee') || ($_SESSION['usertype'] == 'Partner'))



                                                                {  echo $reference_id; } else{ } ?>">



                                                                    </td></tr>



							</table>

							<div class="heading">Payment Details</div>

							<table id="box-table-a" class="auto-style4" style="width: 938px">

									<thead>

																<tr>

						<th  width="150px">Payment ID</th>

									<th class="formHeader" style="width: 100px"> Amount</th>

									<th class="formHeader" style="width: 100px">Payment Type </th>

                                    <th class="formHeader" style="width: 100px"> Account No.</th>
									
									<th class="formHeader" style="width: 100px">cheque No.</th>

									<th class="formHeader" style="width: 100px"> Bank Name  </th>

									<th class="formHeader" style="width: 100px"> Branch Name</th>

                                    <th class="formHeader" style="width: 100px"> Branch Location</th>

                                    <th class="formHeader" style="width: 100px">Presentation date</th>

                                    <th class="formHeader" style="width: 100px">Presentation status</th>

                                    <th class="formHeader" style="width: 100px">Update/Edit</th>									

						</tr>

									<?php

								echo "<td>"; 

                                                                    



		while($rowDeatils = @mysql_fetch_assoc($select_recordDeatils)){

	      print '<tr>'

        .'<td>'. $rowDeatils['check_id'] .'</td>'	

		.'<td>'. $rowDeatils['amount'].'</td>'

		.'<td>'. $rowDeatils['paymentype'].'</td>'

		.'<td>'. $rowDeatils['accountno'] .'</td>'
		
		.'<td>'. $rowDeatils['checkno'] .'</td>'

        .'<td>'. $rowDeatils['bankname'] .'</td>'

        .'<td>'. $rowDeatils['branchname'] .'</td>' 

        .'<td>'. $rowDeatils['branchaddress'] .'</td>'

        .'<td>'. $rowDeatils['presentationdate'] .'</td>'

        .'<td>'. $rowDeatils['presentationstatus'] .'</td>' 
		
		 .'<td><a href="PDChequeDetail.php?id='.$rowDeatils['check_id'].'">Edit</a></td>' 

        .'</tr>';

        }	

        ?>			

										</thead>

							</table>
  
  
					 

							<div id="message" name="message"></div>



									<div id="pageNavPosition" align="center"> </div>







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



<script type="text/javascript"><!--



    var pager = new Pager('box-table-a',10); 



    pager.init(); 



    pager.showPageNav('pager', 'pageNavPosition'); 



    pager.showPage(1);



//--></script>







</body>







<!-- #EndTemplate -->







</html>



