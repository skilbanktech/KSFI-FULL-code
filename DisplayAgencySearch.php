<?php

session_start();

if(isset($_SESSION['internal_email']))
    {
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml">

<!-- #BeginTemplate "webtemplate.dwt" -->

<head id="Head">
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	 <meta name="viewport" content="width=device-width, initial-scale=1">
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
<link id="KSFSkin" href="css/skin.css" rel="stylesheet" type="text/css">
<link id="KSFSkin" href="css/skin.css" rel="stylesheet" type="text/css" />
<link id="KSFSkin" href="css/ksfi.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="js/contactus.js" type="text/javascript"> </script>
<script language="javascript" src="js/paging.js" type="text/javascript"> </script>

  <script src="./js/jquery.min.js"></script>
  
  
<script language="javascript" type="text/javascript">
function EnableRadio1(fld,fld1)
{ 

   
       // alert(document.Form.myradio.checked);
        //if (document.Form.myradio.checked==false)
        var selectedapp = fld.value;   // alert(selectedapp);     
	var ResiselObj = document.getElementById(selectedapp+"myResidenceVeri");
        var EmpselObj1 = document.getElementById(selectedapp+"myEmpVeri");
	var TeleselObj2 = document.getElementById(selectedapp+"myTeleVeri");
        var EnrollselObj3 = document.getElementById(selectedapp+"myEnrollVeri");
        var FieldEmail = document.getElementById(selectedapp+"FieldEmail");
        var TeleEmail = document.getElementById(selectedapp+"TeleEmail");
	var EnrolEmail = document.getElementById(selectedapp+"EnrolEmail");
     //   alert(FieldEmail.value); alert(TeleEmail.value); alert(EnrolEmail.value);
   
        if (selectedapp.checked==false)
            {
		        document.Form.btnResidenceVerification.disabled=true;
                document.Form.btnEditResiVerification.disabled=true;
                document.Form.btn_TeleVerification.disabled=true;
                document.Form.btnEditEnrollVerification.disabled=true;
            }
			else if(fld1!=''&&fld1!=undefined)
			{
				
               document.Form.btn_ResidenceVerification.disabled=false;
				document.Form.btn_EmpVerification.disabled=false;
				document.Form.btn_TeleVerification.disabled=false;
				document.Form.btn_EnrollVerification.disabled=false;
				
			}
       else                 
	    {
			
                if(FieldEmail.value=="")
                    {   
                        document.Form.btn_ResidenceVerification.disabled=true;
                    }
                else if( FieldEmail.value!="")
                    { 
                        document.Form.btn_ResidenceVerification.disabled=false;
                    }      
                    
                if( FieldEmail.value=="")
                    {
                        document.Form.btn_EmpVerification.disabled=true;
                    }
                else if( FieldEmail.value!="")
                    {
                        document.Form.btn_EmpVerification.disabled=false;
                    }
                    
                if(TeleEmail.value=="")
                    {
                        document.Form.btn_TeleVerification.disabled=true;
                    }
                else if( TeleEmail.value!="")
                    { 
                        document.Form.btn_TeleVerification.disabled=false;
                    }
                    
                if(EnrolEmail.value=="")
                    {
                        document.Form.btn_EnrollVerification.disabled=true;
                    }
                else if(EnrolEmail.value!="")
                    {
                        document.Form.btn_EnrollVerification.disabled=false;
                    }
		//document.Form.btnResidenceVerification.disabled=false;
		//document.Form.btnEditResiVerification.disabled=false;    
                //document.Form.btn_TeleVerification.disabled=false;  
                //document.Form.btnEditEnrollVerification.disabled=false;          
	    }
}
</script>
</head>

<body id="Body">

<?php


            $reference_id ="";
			$name = "";
			$location = "";
			//$mobile = $_POST['mobile'];
			$email = "";
			$fdate = "";
            $tdate = "";	

			
		if(isset($_POST['referenceID']))
		{			
			$reference_id =$_POST['referenceID'];
			$name = $_POST['name'];
			$location = $_POST['location'];
			//$mobile = $_POST['mobile'];
			$email = $_POST['email'];
			$fdate = $_POST['fdate'];
            $tdate = $_POST['tdate'];
		}	
			
		   
						
			//database connection
			include('./connection.php');
			                       
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
                        
        $currentrole=$_SESSION['Currentrole'];
		
		//set the authority for roles
		$select_rolerights="select * from rolerights where role in ($currentrole)";

		$record_roleright=mysql_query($select_rolerights);
		$btnassign="";
		$btnreAssign="";
		$restrictapp="";
		$btnSendDoc="";
		$btnApplicationStatus="";
		$btnApplication="";
		$btnModify="";
		$InitiateVeri="";
		$viewall="";
		$searchInitiatedVeri="";
				
		while ($row_rolerights = @mysql_fetch_assoc($record_roleright))
                {
		 		if($row_rolerights['rights_id']=="1")  //assign SendDoc
		 		{ 
		 		$btnSendDoc=$row_rolerights['rights_id'];
		 		}
		 		else if($row_rolerights['rights_id']=="2")//assign ApplicationStatus
		 		{
		 		$btnApplicationStatus=$row_rolerights['rights_id'];
		 		}
		 		else if($row_rolerights['rights_id']=="3") //assign view Application
		 		{
		 		$btnApplication=$row_rolerights['rights_id'];
		 		}
		 		else if($row_rolerights['rights_id']=="4")//Assign Modify
		 		{
		 		$btnModify=$row_rolerights['rights_id'];
		 		} 
		 		else if($row_rolerights['rights_id']=="5") //btnassign
		 		{
		 		 $btnassign=$row_rolerights['rights_id'];
		 		}	 
		 		else if($row_rolerights['rights_id']=="7") //restrictApp
		 		{
		 		 $restrictapp=$row_rolerights['rights_id'];
		 		}
		 		else if($row_rolerights['rights_id']=="8")	//reassign
		 		{
		 		$btnreAssign=$row_rolerights['rights_id'];
		 		}
		 	    else if($row_rolerights['rights_id']=="11")	//initiate Veri
		 		{
		 		$InitiateVeri=$row_rolerights['rights_id'];
		 		}
		 		else if($row_rolerights['rights_id']=="16")	//reassign
		 		{
		 		$viewall=$row_rolerights['rights_id'];
		 		}	
                else if($row_rolerights['rights_id']=="27")	//reassign
		 		{
		 		$searchInitiatedVeri=$row_rolerights['rights_id'];
		 		}	 				
		}
		
		?>

<noscript></noscript>
<div align="center">
	
		<?php include('./common/bootstrap_common_mainmenu.php'); ?>
		<form id="Form"  autocomplete="off" enctype="multipart/form-data" method="post" name="Form" >	
<table width="100%" align="center" style="margin-left:200px" ><tr><td>		
                                 
</td></tr></table>
					<!-- #BeginEditable "Content" -->
			
                                        <table width="100%"><tbody><tr><td height="20" class="heading" >
						Initiated Application Search Result</td></tr></tbody></table>
					
					<table id="box-table-a" class="table table-condensed" align="center" border="1" cellpadding="3" cellspacing="3"  >
					<thead>
					
					<tr>
						<th class="formHeader">Select</th>
						<th class="formHeader">Reference ID</th>
						<th class="formHeader">First Name</th>
						<th class="formHeader">Last Name</th>
						<th class="formHeader" style="width: 85px">City/Location</th>
					<!--	<th class="formHeader" style="width: 85px">Mobile</th> -->
                                                <th class="formHeader" style="width: 85px">Email</th>
						<th class="formHeader" style="width: 100px">Application Date</th>
                                               <!-- <th class="formHeader" style="width: 100px">College Name</th>  -->
                                       <!--         <th class="formHeader" style="width: 100px">Course Name</th>
                                                <th class="formHeader" style="width: 100px">Loan Amount</th>
                                                 <th class="formHeader" style="width: 100px">Application Status</th>  -->
                                               
                                               <?php  if($_SESSION['usertype'] !='student' ){?>
                                                 <th class="formHeader" style="width: 100px" >Verification Status</th>
												<?php } ?>
                                              <!--   <th><input type="hidden" name="Residence" value="">Residence</th>
                                                 <th><input type="hidden" name="Enrollment" value="">Enrollment</th>
                                                 <th><input type="hidden" name="Telephone" value="">Telephone</th>
                                                 <th><input type="hidden" name="Employment" value="">Employment</th> -->
                                               						</tr></thead>
	<?php
		
		$selectUserDetail="select user_id,firstname,lastname,username,usertype,password,location,role,mobile from login_details where username='".$_SESSION['internal_email']."'";
		$userDetail_record=mysql_query($selectUserDetail);
        $row_user= mysql_fetch_row($userDetail_record);
        
	    if($row_user){
     
	   $col = array('user_id','firstname','lastname','username','usertype','password','location','role','mobile');
	   $fetch = array_combine($col,$row_user); 
			}
			$assignCity=$fetch['location'];
		//$_SESSION['usertype']=='Partner'    
        if($searchInitiatedVeri !="")
		{
               //if($assignCity != "" && $viewall == "")//-------------Assign city no need just commebnt
            /*    if($viewall == "")
               {
                $select_query="Select s.reference_id,s.firstname,s.lastname,s.city,s.mobile,s.email,s.app_date,c.course,c.amount,
                s.app_status,s.VerificationStatus from student_details s inner join course_details c on s.reference_id=c.reference_id inner join 
                initiateverification i on s.reference_id=i.reference_id
                and s.reference_id like '%".$reference_id."%' and s.firstname like'%".$name."%'and s.city like '%".$location."%'
                and s.email like '%".$email."%' and (i.FieldEmail='".$_SESSION['internal_email']."' or i.TeleEmail='".$_SESSION['internal_email']."'
                or i.EnrolEmail='".$_SESSION['internal_email']."')
                and DATE(s.app_date) between '".$fdate."' and '".$tdate."' and s.city in('".$fetch['location']."') order by s.app_date desc;";
                echo "Code path 1 :".$select_query;
               }*/
                if($viewall == "")
               {
                $select_query="Select s.reference_id,s.firstname,s.lastname,s.city,s.mobile,s.email,s.app_date,c.course,c.amount,
                s.app_status,s.VerificationStatus from student_details s inner join course_details c on s.reference_id=c.reference_id 
                inner join initiateverification i on s.reference_id=i.reference_id
                and s.reference_id like '%".$reference_id."%' and s.firstname like'%".$name."%'and s.city like '%".$location."%'
                and s.email like '%".$email."%' and (i.FieldEmail='".$_SESSION['internal_email']."' or i.TeleEmail='".$_SESSION['internal_email']."'
                or i.EnrolEmail='".$_SESSION['internal_email']."')
                and DATE(s.app_date) between '".$fdate."' and '".$tdate."' order by s.app_date desc;";
            //    echo "Code path 2 :".$select_query;
               }  
               else if($assignCity !="" && $viewall !="") 
               {
              /*  $select_query="Select s.reference_id,s.firstname,s.lastname,s.city,s.mobile,s.email,s.app_date,c.course,c.amount,
                s.app_status,s.VerificationStatus from student_details s inner join course_details c on s.reference_id=c.reference_id 
                inner join initiateverification i on s.reference_id=i.reference_id
                and s.reference_id like '%".$reference_id."%' and s.firstname like'%".$name."%'and s.city like '%".$location."%'
                and s.email like '%".$email."%' and DATE(s.app_date) between '".$fdate."' and '".$tdate."'
                and s.city in('".$fetch['location']."') order by s.app_date desc;";*/
				
				 $select_query="Select s.reference_id,s.firstname,s.lastname,s.city,s.mobile,s.email,s.app_date,c.course,c.amount,
                s.app_status,s.VerificationStatus from student_details s inner join course_details c on s.reference_id=c.reference_id 
                inner join initiateverification i on s.reference_id=i.reference_id
                and s.reference_id like '%".$reference_id."%' and s.firstname like'%".$name."%'and s.city like '%".$location."%'
                and s.email like '%".$email."%' and DATE(s.app_date) between '".$fdate."' and '".$tdate."'
                order by s.app_date desc;";
           //     echo "Code path 3 :".$select_query;
               } 
               else if($viewall !="")
               {
                $select_query="Select s.reference_id,s.firstname,s.lastname,s.city,s.mobile,s.email,s.app_date,c.course,c.amount,
                s.app_status,s.VerificationStatus from student_details s inner join course_details c on s.reference_id=c.reference_id 
                inner join initiateverification i on s.reference_id=i.reference_id
                and s.reference_id like '%".$reference_id."%' and s.firstname like'%".$name."%'and s.city like '%".$location."%'
                and s.email like '%".$email."%' and DATE(s.app_date) between '".$fdate."' and '".$tdate."'
                order by s.app_date desc;";
           //     echo "Code path 4 :".$select_query;
               }          
      		}
		//echo $select_query;
				
		  $select_record=mysql_query($select_query);
			//$select_Row=mysql_fetch_row($select_record);
                           
                                        
			while ($row = @mysql_fetch_assoc($select_record) ) {
				$reference_id =$row['reference_id'];
                                        $selectDetail="select * from initiateverification where reference_id = '$reference_id'";
             //      echo($selectDetail);
                                        $record=mysql_query($selectDetail);
                                        $row2= @mysql_fetch_assoc($record);
              //      echo($row2['FieldEmail']);               
                          // echo($_SESSION['reference_id']);            		
	      print '<tr>'
		 
	       .'<td><input type="radio" name="myradio" value="'.$row['reference_id'].'" id="'.$row['reference_id'].'"
	         onclick="selectedapplication(this); EnableRadio(this)" ></td>'	 
		 			
			.'<td>'.$row['reference_id'].'</td>'	
			.'<td>'.$row['firstname'].'</td>'
			.'<td>'.$row['lastname'].'</td>'				
			.'<td>'.$row['city'].'</td>'
		    //	.'<td>'.$row['mobile'].'</td>'
                        .'<td>'.$row['email'].'</td>'				
                        .'<td>'.$row['app_date'].'</td>'
                    //  .'<td>'.$row['college'].'</td>'
                   //   .'<td>'.$row['course'].'</td>'
                   //   .'<td>'.$row['amount'].'</td>'
                   //   .'<td>'.$row['app_status'].'</td>'
                        .'<td>';
             if($_SESSION['usertype'] !='student')
            {
             print $row['VerificationStatus'].'</td>';
            }          
                    
          print 
      //      <select id="'.$row['reference_id'].'Name" name="'. $row['reference_id'].'Name"  size="1" onchange="OnChangeAssign(this)">
      //          <option>Select</option>'.$option.'</select></td>'; 
          //type="hidden"
            '<input type="hidden" id="'.$row['reference_id'].'myResidenceVeri" name="'.$row['reference_id'].'myResidenceVeri" value="'.$row2['ResidenceVeri'].'" >'
            .'<input type="hidden" id="'.$row['reference_id'].'myEmpVeri" name="'.$row['reference_id'].'myEmpVeri" value="'.$row2['EmploymentVeri'].'" >'
            .'<input type="hidden" id="'.$row['reference_id'].'myTeleVeri" name="'.$row['reference_id'].'myTeleVeri" value="'.$row2['OffTelephoneVeri'].'" >'
            .'<input type="hidden" id="'.$row['reference_id'].'myEnrollVeri" name="'.$row['reference_id'].'myEnrollVeri" value="'.$row2['EnrollmentVeri'].'" >'
            .'<input type="hidden"id="'.$row['reference_id'].'FieldEmail" name="'.$row['reference_id'].'FieldEmail"'; 
                    if($row2['FieldEmail']==$_SESSION['internal_email']) 
                    { 
                            print ' value="'.$_SESSION['internal_email'].'" >'; }
                    else 
                    {       print ' value="" >';
                    } 
                    
            print '<input type="hidden" id="'.$row['reference_id'].'TeleEmail" name="'.$row['reference_id'].'TeleEmail"'; 
                    if($row2['TeleEmail']==$_SESSION['internal_email']) 
                    { 
                            print ' value="'.$_SESSION['internal_email'].'" >'; }
                    else 
                    {       print ' value="" >';
                    } 
            print '<input type="hidden" id="'.$row['reference_id'].'EnrolEmail" name="'.$row['reference_id'].'EnrolEmail" ';
                   if($row2['EnrolEmail']==$_SESSION['internal_email']) 
                    { 
                            print ' value="'.$_SESSION['internal_email'].'" >'; }
                    else 
                    {       print ' value="" >';
                    } 
          print '</tr>';
    }					
?>
</table>
<div id="pageNavPosition" align="center"> </div>
			<table align="center">
			<tbody>
			<tr><td height="20"></td></tr>
			<tr>
                          <!--    <td><input disabled="disabled" name="btnSubmit" type="submit" value="Submit" />
			<input name="btnBack" type="button" value="Back" onclick="location.href='searchStatus.php'" /></td> -->
                        
                               <td align="center" style="height: 22px">
                               
                                <input type='submit' name="btnBack"
                           value='Back' onclick="setaction('SearchforAgency.php');" >
            
                                
                                  
                                 <!--  $_SESSION['usertype'] == 'Employee' -->
                 

			</td>
                        </tr>
							<tr><td height="50"></td></tr></tbody></table>
		
<div id="myModal" class="modal">

  
  <div class="modal-content">
  
  
   
    
    <div class="modal-header">
      <span class="close" style="color:white">&times;</span>
      <h2 align='left' style="color:white">Verification</h2>
    </div>
    <div  style="overflow-x:auto;"  class="modal-body">
   
				
	  <div class="row" >
				   <div class="form-group">
                    <div class="col-md-06" >  <input type="submit" class="submit btn" id="btn_ResidenceVerification" name="btn_ResidenceVerification" 
                                        value="ResidenceVerification"  onclick="setaction('./verification/ResidenceVerification.php');"></div></div></div>
             
                             <div class="row" >
				   <div class="form-group">
                    <div class="col-md-06" > 
							  <input type="submit" class="submit btn" name="btn_EmpVerification" disabled="disabled"
                                        value="EmploymentVerification"  onclick="setaction('./verification/EmploymentVerification.php');">
										</div></div></div>
						<div class="row" >
				   <div class="form-group">
                    <div class="col-md-06" > 
                                 
                                  <input type="submit" class="submit btn" name="btn_TeleVerification" disabled="disabled"
                                         value="TelephoneVerification" onclick="setaction('./verification/Telephoneverification.php');">
										
										</div></div></div>
                       <div class="row" >
				   <div class="form-group">
                    <div class="col-md-06" > 
                                  <input type="submit" class="submit btn" name="btn_EnrollVerification" disabled="disabled"
                                         value="EnrollmentVerification" onclick="setaction('./verification/Enroll_Ment.php');">
	                          </div></div></div>
	
     
    </div>
	
    
  </div>

</div>


						 <script>
 
 function selectedapplication(fld)
 
 {
 
 

// Get the modal
var modal = document.getElementById('myModal');

var selectedapp = fld.value;






// Get the button that opens the modal
var btn = document.getElementById(selectedapp);

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


			
<!-- #EndEditable -->
			
					
<script type="text/javascript"><!--
    var pager = new Pager('box-table-a',10); 
    pager.init(); 
    pager.showPageNav('pager', 'pageNavPosition'); 
    pager.showPage(1);
//--></script>
<?php include('./common/bootstrap_commonFooter.php');?>
<?php }  else { 	header("Location: ./intLogin.php?Role=Employee");  } //redirect to login page if user is logged in?>