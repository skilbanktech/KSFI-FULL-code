<script language="javascript" src="js/jquery.min.js" type="text/javascript"> </script>
<script language="javascript" src="js/paging.js" type="text/javascript"> </script>

<script type="text/javascript">

    var pager = new Pager('box-table-a',5); 

    pager.init(); 

    pager.showPageNav('pager', 'pageNavPosition'); 

    pager.showPage(1);
</script>

<script>
//send mail of pending documents to applicant 
function showdocumentsBlock(refid,otherloans,amount)
{
	document.getElementById('photos').hidden=false;
	document.getElementById('IdProof').hidden=false;
	document.getElementById('AcademicDocs').hidden=false;
	document.getElementById('ResdProof').hidden=false;
	document.getElementById('IncmProof').hidden=false;
	document.getElementById('BankStmt').hidden=false;
	
	
	//alert(otherloans);
	if(otherloans=='yes') { 
	
	document.getElementById('AcademicDocs').hidden=true;
	
	}
	if(amount<50000) { 
	
	document.getElementById('ResdProof').hidden=true;
	
	}
	if(amount<50000) { 
	document.getElementById('IncmProof').hidden=true;
	
	}
	
	//show the window
	
	 document.getElementById("overlay").style.display = "block";
	 
	  document.getElementById("currentRefid").value = refid;

}

function pendingdocs_sendmail()
{	 
	//document.getElementById('sendmail').innerHTML = "sending...";
	
    
   //get the selected checbox values
   
    var photo= getSelectedcheckboxValues('photo');
	var IdentityProof= getSelectedcheckboxValues('IdentityProof');
	var AcademicDocuments= getSelectedcheckboxValues('AcademicDocuments');
	var ResidenceProof= getSelectedcheckboxValues('ResidenceProof');
	var IncomeProof= getSelectedcheckboxValues('IncomeProof');
	var BankStatement= getSelectedcheckboxValues('BankStatement');
	
	var MailTo=getSelectedcheckboxValues('Mailto');
	var MailToksfi=getSelectedcheckboxValues('Mailtoksfi');
	
	
	
	//if not selected any document 
	if(photo==''&&IdentityProof==''&&AcademicDocuments==''&&ResidenceProof==''&&IncomeProof==''&&BankStatement=='')
	{
	alert("You didn't select any document.\r\nPlease select atleast one document to send the mail.");	
	
	return false;
	
	}
	else
	{
		// disable the send button 
		 document.getElementById('sendmailbutton').disabled=true;
	 
	     document.getElementById('close').disabled=true;
	 
		
		
	}
	
	
	refid=document.getElementById("currentRefid").value;
	
	var secondmail=document.getElementById("secondmail").value;
	
	
	dataserialize="ref="+refid+"&photo="+photo+"&IdentityProof="+IdentityProof+"&AcademicDocuments="+AcademicDocuments+"&IncomeProof="+IncomeProof+"&ResidenceProof="+ResidenceProof+"&BankStatement="+BankStatement+"&secondmail="+secondmail+"&mailTo="+MailTo+"&mailToksfi="+MailToksfi;  
	
	url="send_pendingdocumentsmail.php";
    
   $.ajax({
           type: "POST",
           url: url,
           data: dataserialize, // serializes the form's elements.
		   
		   beforeSend: function(){
    // Show image container
			$("#loader").show();
		   },
		   success: function(data){
			   
			 //alert(data);
			  
			   alert("Mail sent successfully");
			   
			   document.getElementById('sendmail').innerHTML = "Sent Successfully";
					  
					   
					 //close the window
					   closeWindow();
					    
						
		   
		   },
		   complete: function(data){
			   
			   $("#loader").hide();//hide the loader!
			   
			    
			   
		   }
			  
         
         });
		 
	 }
function addsecondmail(fld)
{
	
	if(fld.checked==true)
	{
		
	 document.getElementById('secondmail').disabled=false;	
		
	}
	else
	{
		document.getElementById('secondmail').disabled=true;	
		
	}
}



</script>
<script>
function selectAll(fld,tagname)
{
	
		if(fld.checked==true)
		{
			
        var items=document.getElementsByName(tagname);
			
				for(var i=0; i<items.length; i++){
					if(items[i].type=='checkbox')
						items[i].checked=true;
				 }
				
		 }
		else if(fld.checked==false)
				
		{
		   var items=document.getElementsByName(tagname);
			for(var i=0; i<items.length; i++){
					if(items[i].type=='checkbox')
						items[i].checked=false;
				 }
	  }

}


function getSelectedcheckboxValues(fld){
	
	/* declare an checkbox array */
	var chkArray = [];
	
	/* look for all checkboxes that have a class 'chk' attached to it and check if it was checked */
	$("."+fld+":checked").each(function() {
		
		chkArray.push($(this).val());
	});
	
	
	/* we join the array separated by the comma */
	var selected;
	selected = chkArray.join(',') ;
	
	/* check if there is selected checkboxes, by default the length is 1 as it contains one single comma */
	if(selected.length > 0){
		
		//alert("You have selected " + selected);	
		
	}else{
		
		selected ="";
		
		
	}
	
	return selected;
}
function opendocumentcenter()
{
	refid=document.getElementById("currentRefid").value;
	
	var url="./DocumentUpload.php?id="+refid;
	
	window.open(url,'_blank');
}

</script>
<style>
.noscroll { overflow: hidden; }

@media (min-device-width: 1025px) {
    /* not strictly necessary, just an experiment for 
       this specific example and couldn't be necessary 
       at all on some browser */
    .noscroll { 
        padding-right: 15px;
    }
}

#overlay { 
     position: fixed; 
     overflow-y: scroll;
     top: 0; left: 0; right: 0; bottom: 0;
}

[aria-hidden="true"] {    
    transition: opacity 1s, z-index 0s 1s;
    width: 100vw;
    z-index: -1; 
    opacity: 0;  
}

[aria-hidden="false"] {  
    transition: opacity 1s;
    width: 100%;
    z-index: 1;  
    opacity: 1; 
}
#overlay {
  position: fixed;
  display: none;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0,0,0,0.5);
  z-index: 2;
  cursor: pointer;
}
#text{
	
	font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555555;
	
}
 .popup .close {
            position: absolute;
            top: 20px;
            right: 30px;
            transition: all 200ms;
            font-size: 30px;
            font-weight: bold;
            text-decoration: none;
            color: #333;
          }
          .popup .close:hover {
            color: orange;
          }

/* Centered text */
.centered {
  position: absolute;
  top: 90%;
  left: 90%;
 
  font-size:15px;
  transform: translate(-50%, -50%);
}
</style>


<?php

include('./connection.php');


            $sel_queue=$_POST['sel_queue'];
		   
            $heading=$_POST['heading'];
			
            $reference_id =$_POST['referenceID'];  

			$name = $_POST['name']; 
			$location = $_POST['location']; 

			$mobile = $_POST['mobile']; 

			$email = $_POST['email']; 
			
			$app_status = $_POST['app_status']; 

			$fdate = $_POST['fdate']; 

            $tdate = $_POST['tdate'];   
			
			$typeofLoan = $_POST['typeofLoan'];   
			
			
			
			
			 if($fdate != "")

                        {

                            $fdate = $_POST['fdate'];

                        }

                        else

                        {

                            $fdate="2010-01-01";

                        }

                        

                        if($tdate != "")

                        { 

                            $fdate = $_POST['fdate'];

                        }

                        else

                        {

                            $tdate=getdate();



                           // echo getdate();

                            

                            $tdate= date('Y')."-".date('m')."-".date('d');

                            //$tdate="2012-05-18";

                            

                         }
						 
						$condition=" s.reference_id like '%".$reference_id."%' and s.firstname like'%".$name."%'and s.city like '%".$location."%'

                        and s.mobile like '%".$mobile."%' and s.email like '%".$email."%' 
						
						and  typeofLoan like '%".$typeofLoan."%'


                        and DATE(s.app_date) between '".$fdate."' and '".$tdate."'";


                    
                    if($sel_queue=='pendingdocs')
						
						{
							
							$select_query1="SELECT reference_id,firstname ,lastname,email,mobile,app_date,loantype,typeofLoan,docReminder_mail,docReminder_maildate
                    
					       FROM student_details s where ".$condition ." and  app_status='Applied' ";
							
						}
					elseif($sel_queue=='PDD')
					{
						
						$select_query1="SELECT s.reference_id,s.firstname ,s.lastname,s.email,s.mobile,s.app_date,s.loantype,s.typeofLoan,s.docReminder_mail,s.docReminder_maildate
                    
					FROM student_details s left join credit_appraisal_analysisdetails on credit_appraisal_analysisdetails.reference_id=s.reference_id where  
					s.sanction='Loan Disbursed'  and ".$condition;
						
						
					}

		 
		 $select_record1= mysql_query($select_query1);
	
          {
	        $count_newcourses1=mysql_num_rows($select_record1);
	   
		 } if($select_record1)
		 {
			 $count_newcourses1=1;
		 }
		 else
		{
		  $count_newcourses1=0;
		}






?>


<table ><tbody>

                                           <tr><td height="20px"></td></tr>

                                            <tr><td height="20" class="heading" ><?php echo $heading;?></td></tr>

                                          

                                            </tbody></table>
<div  class="table-responsive"   id='datatable' >
	<?php print'<table  id="box-table-a"  class="table table-striped table-bordered"  border="1" align="left" valign="top"style="background-color:white"> ';?>

	<?php  if($count_newcourses1!=0) {   


        print' <tr>  '; 
   
  
		 
	    print' 
		
		<th>Reminder For Submission Of Documents</th>
	
		<th> Reference_id </th>
		  <th>First Name</th>
		  
		  <th> Last Name </th>
		
		   <th>Email</th>
		   
		   <th>Mobile</th>
		   
		
		
		 
		 <th>Application Date</th>
		 
		
	    
	
		
	
	</tr>';
	
	?>
  
       <?php
	   
	   
	  while($row1=mysql_fetch_array($select_record1))
	   {
	   
	   
	   $referenceid=$row1['reference_id'];
	   
	       $email=$row1['email'];
		   
		   $mob=$row1['mobile'];
		   
		   
		   		 if($row1['loantype']=='Others')	
					{
								
			             $otherloans='yes';
					}
					else
					{
						$otherloans='No';
						
					}
		   
		   // encode
       $mob_encoded = rtrim(strtr(base64_encode($mob), '+*', '-_'), '=');
	   
	   
	       $s1 = "Select amount from course_details where reference_id = '$referenceid'";
								 
		   $s1record=mysql_query($s1); 

           $row11= mysql_fetch_array($s1record);

           $amount= $row11['amount'];

	 
		   $select_query2=mysql_query("select * from document_details where reference_id='$referenceid'");
		   
		   $count_rows=mysql_num_rows($select_query2);
	   
	if($count_rows<4) {
		
		
		
	?>
	
	
	 <td>
		  <?php if($row1['docReminder_mail']==''){ ?>
		  <a href="javascript:void(0);" onclick="showdocumentsBlock('<?php echo $referenceid;?>','<?php echo $otherloans; ?>','<?php echo $amount;?>')" ><input type="button" id="sendmail" style="text-decoration: none;" value="Send mail"></a>
	      <?php } else {  
		    echo $row1['docReminder_mail']."-".$row1['docReminder_maildate'];  
		   } ?>
		  </td>
		  
	      <td>
	
	

		 
		 <?php if($referenceid!='') { print'<a href="javascript:void(0)" id="'.$row1['reference_id'].'" onclick="selectedapplication(this)"><input type="button"    class="links"  name="myradio" value="'.$row1['reference_id'].'" id="'.$row1['reference_id'].'"/></a>';
		 
		 } else { ?>
		 
		 <a  style="color:#483D8B;" href="loan_application.php?mob=<?php echo $mob_encoded;?> ">Apply for Loan</a>
		 
		 <?php } ?>
		 
		 </td>
	
	    
	    
		  <td><?php echo $row1['firstname'];  ?> </td>
		  <td><?php echo  $row1['lastname'];  ?></td>
		  <td><?php echo  $row1['email'];  ?></td>
		  <td><?php echo  $row1['mobile'];  ?></td>
		  
		 <?php if($sel_queue=='leads')
		 {?>
		  <td><?php echo  $row1['created'];  ?></td>
		  
		 <?php } else { ?>
		  
		 <td><?php echo  $row1['app_date'];  ?></td>
         <?php } ?>
		 
		 
     
	</tr>
	
	
<?php } } } ?>
	
	
	<div id="pageNavPosition" align="right"> </div>
	</table>
</div>
	
	<div id="overlay">
  <div style="background-color:#fff;height:50%px;width:70%">
  <h3  align="center">Documents Pending Mail</h3>
 
  <table align="center" id="doctable" style="background-color:white">
        <tr>
		    <td id="text">
			<span>Select all the pending documents below:. </span>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)"  onclick="opendocumentcenter();" target="_blank" ><u>Check the submitted documents</u></a><br/><br/>
			<input type="hidden" name='currentRefid' id= "currentRefid" >
		<!--<input type="checkbox" name='lang[]' id= "selectall" value="All" onclick="selectAll(this,'lang[]')">Select All <br/>--->
		<div id="photos">
		<label > Photo :</label> <br/>
		<input type="checkbox" name='' id="photo" class="photo" value="Applicant">Applicant
		<input type="checkbox" name='' id="photo" class="photo" value="Co-Applicant1">Co-Applicant1
        <input type="checkbox" name='' id="photo" class="photo" value="Co-Applicant2">Co-Applicant2<br/><br/>
		
		</div>
		<div id="IdProof">
		<label > Identity Proof :</label>  <br/>
		<input type="checkbox" name='' id="IdentityProof" class="IdentityProof" value="Aadhar Card">Aadhar Card 
		<input type="checkbox" name='' id="IdentityProof" class="IdentityProof" value="Pan Card">Pan Card
        <input type="checkbox" name='' id="IdentityProof" class="IdentityProof" value="Passport">Passport
		<input type="checkbox" name='' id="IdentityProof" class="IdentityProof" value="Bank Passbook with first page">Bank Passbook with first page<br/><br/>
		</div>
		<div id="AcademicDocs">
		<label > Academic Documents :</label>  <br/>
		<input type="checkbox" name='' id="AcademicDocuments" class="AcademicDocuments" value="10th ">10th 
		<input type="checkbox" name='' id="AcademicDocuments" class="AcademicDocuments" value="12th ">12th 
        <input type="checkbox" name='' id="AcademicDocuments" class="AcademicDocuments" value="Graduation">Graduation
		<input type="checkbox" name='' id="AcademicDocuments" class="AcademicDocuments" value="P.G">P.G<br/><br/>
		
		</div>
		<div id="ResdProof">
		<label>Residence Proof :</label><br/>
		<input type="checkbox" name='' id="ResidenceProof" class="ResidenceProof" value="gas">gas
		<input type="checkbox" name='' id="ResidenceProof" class="ResidenceProof" value="electricity">electricity
        <input type="checkbox" name='' id="ResidenceProof" class="ResidenceProof" value="maintenance">maintenance
		<input type="checkbox" name='' id="ResidenceProof" class="ResidenceProof" value="property Tax">property Tax
		<input type="checkbox" name='' id="ResidenceProof" class="ResidenceProof" value="Rental Agreement">Rental Agreement
		<input type="checkbox" name='' id="ResidenceProof" class="ResidenceProof" value="Sale Deed">Sale Deed<br/><br/>
		
		</div>
		<div id="IncmProof">
		<label>Income Proof :</label><br/>
		<input type="checkbox" name='' id="IncomeProof" class="IncomeProof" value="3 months Salary Slips">3 months Salary Slips
		<input type="checkbox" name='' id="IncomeProof" class="IncomeProof" value="ITR of last 2 financial years">ITR of last 2 financial years
        <input type="checkbox" name='' id="IncomeProof" class="IncomeProof" value="Shop and Establishment certificate">Shop and Establishment certificate<br/><br/>
		
		</div>
		<div id="BankStmt">
		<label>Bank Statement :</label> <br/>
		<input type="checkbox" name='' id="BankStatement" class="BankStatement" value="3 months">3 months
		<input type="checkbox" name='' id="BankStatement" class="BankStatement" value="6 months">6 months
        <input type="checkbox" name='' id="BankStatement" class="BankStatement" value="12 months">12 months<br/><br/><br/>
		</div>
		
		 <label>Mail TO  :</label><br/>	
         <input type="checkbox" name='' id="" class="Mailto"  checked='checked' value="Applicant">Applicant
		 <input type="checkbox" name='' id="" class="Mailto" checked='checked'  value="CoApplicant1">Co-Applicant1
	     <input type="checkbox" name='' id="" class="Mailto" checked='checked'  value="CoApplicant2">Co-Applicant2<br/><br/><br/>
		
		  <label>Mail TO KSFi  :</label><br/>	
         <input type="checkbox" name='' id="" class="Mailtoksfi" checked='checked' value="loan">loan@ksfi.co.in
		 <input type="checkbox" name='' id="" class="Mailtoksfi" value="add" onclick="addsecondmail(this)" >Add Second Mail
	    		
								
									
									<?php 
									
									include('./connection.php');
									$query="select username from login_details where role='Partner' or role='Field Officer' or role='Service Officer' or role='Service Manager'";

									$record=mysql_query($query);

									$option="";

									while($row1 = @mysql_fetch_assoc($record))

									{

										$username=$row1["username"];

										$option.="<OPTION  id='employemail' name='employemail' VALUE=\"$username\">".$username;

									}
									

                                   ?>
			      <select id="secondmail" disabled='disabled' name="secondmail"><option value="">Select</option><?php echo $option; ?></select>

									
									
									</select><br/></br>
									
					<input type="button" value="Close" id="close" onclick="closeWindow()"> <input type="button" id="sendmailbutton" value="Send Mail" onclick="pendingdocs_sendmail()"><br/>
		
			</td>
		</tr>
		<tr><td height="20px"></td></tr>
		
		<tr><td height="40px"></td></tr>
  </table>
  <div id="loader" style="display:none;width:150px;height:200px;position:absolute;top:20%;padding:2px;"><img src='images/loader.gif' id="img" width="250" height="250" />
          <div class="centered">Sending...</div>
  </div>
  </div>
</div>


 
  
  

<script>


function closeWindow() {
  document.getElementById("overlay").style.display = "none";
}
</script>
   
	
		 