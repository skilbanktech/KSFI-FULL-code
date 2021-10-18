<?php 


session_start();

	//database connection

			include('./connection.php');			

            include('./common/class_Common.php');
			
			 if(isset($_GET['refid']))
		   {
			   
			$reference_id =$_GET['refid'];

			$name = "";

			$location = "";

			$mobile = "";

			$email = "";

			$fdate = "";

            $tdate = "";  
			   
			   
		   }
		   else
		   {
			$reference_id =$_POST['referenceID'];

			$name = $_POST['name'];

			$location = $_POST['location'];

			$mobile = $_POST['mobile'];

			$email = $_POST['email'];

			$fdate = $_POST['fdate'];

            $tdate = $_POST['tdate'];
			
		   }

		
						  
            $objCommon=new Common();
  $selectquery="select approval_type,approved_By,approval_status,reason,verif_condition,
						   doc_condition,PF_condition,created from loan_decisioning  where reference_id='$reference_id' and approval_type='1'";
			
			
			 $queryresult=mysql_query($selectquery);
			
			 $countapproval1 = mysql_num_rows($queryresult);
			//fetching  details
			 $approvalinfo1= mysql_fetch_assoc($queryresult);	
			
			 $verif_condition=$approvalinfo1['verif_condition'];
			 $doc_condition=$approvalinfo1['doc_condition'];
			 $PF_condition=$approvalinfo1['PF_condition'];
             
             $selectquery1  =   "select * from credit_appraisal_analysisdetails  where reference_id='$reference_id'";
			
			
			 $queryresult1=mysql_query($selectquery1);
			
			 $fetch_analysisInfo= mysql_fetch_assoc($queryresult1);	   

             $verifi               =  $fetch_analysisInfo['verifi_completed'];
             $subm_all_docs        =  $fetch_analysisInfo['subm_all_docs'];
             $Processing_Fees      =  $fetch_analysisInfo['Processing_Fees'];								 





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
<link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="./bootstrap/js/jquery.min.js"></script>
<script src="./bootstrap/js/bootstrap.min.js"></script>
<script src="./bootstrap/js/bootstrap-submenu.min.js" ></script>
<script src="./bootstrap/js/jquery.easing.min.js" type="text/javascript"></script> 
<script language="javascript" src="./bootstrap/js/bootstrapmultislider.js" type="text/javascript"></script>
<link type="text/css" href="./bootstrap/css/bootstrapmultislider.css" rel="stylesheet">
<script language="javascript" src="js/paging.js" type="text/javascript"> </script>

<script language="javascript" src="js/common.js" type="text/javascript"> </script>

<script language="javascript">
function showloanDecisioning(approvaltype)
{
	
	var subm_all_docs='<?php echo $subm_all_docs;?>';
		
	var verifi='<?php echo $verifi;?>';
	
	var PF='<?php echo $Processing_Fees;?>';
	
	var id= '<?php echo $reference_id;?>';
	
	  
	    //if verification condition is not null
		if(verifi!='Yes'&& subm_all_docs!='Yes'&&PF!='Yes')
		{
			
			
			$('#myModal').modal('show');
			
		}
		//if document condition is not null
		else if(verifi=='Yes'&& subm_all_docs!='Yes'&& PF!='Yes')
		{
			
			 $('#myModal').modal('show');
			 nextslide("#verifi_yes");
			 nextslide("#verif_condition");
			
			
			
		}
		else if(verifi=='Yes'&& subm_all_docs=='Yes'&&PF!='Yes')
		{
			
			 $('#myModal').modal('show');
			 nextslide("#verifi_yes");
			 nextslide("#verif_condition");
			 nextslide("#doc_yes");
			 nextslide("#doc_condition");
			
			
			
		}
		else if(verifi=='Yes'&& subm_all_docs=='Yes'&&PF=='Yes')
		{
			
	 		
	      window.location.href="./product_details.php?id="+id;
	
		}
		
		
		
	
	
	
}
</script>
<script> 
	function checkallapprovaldetails(type,state)
	{
		
		var subm_all_docs='<?php echo $subm_all_docs;?>';
		
	    var verifi='<?php echo $verifi;?>';
	
	    var PF='<?php echo $Processing_Fees;?>';
		
        var id= '<?php echo $reference_id;?>';
     
        if(type=='verif' && state=='Yes')
		{
			 nextslide("#verifi_yes");
		     
			
		}
		else if(type=='verif' && state=='No')
		{
			
			$('#myModal').modal('hide');
			
			window.location.href="./verification/credit_appraisal_memo.php";
		    
		}
		else if(type=='doc' && state=='Yes')
		{
			nextslide("#verifi_yes");
			 nextslide("#verif_condition");
			 nextslide("#doc_yes");
		     
			
		}
		else if(type=='doc' && state=='No')
		{
			
			$('#myModal').modal('hide');
			
			window.location.href="./verification/credit_appraisal_memo.php";
		    
		}
		else if(type=='PF' && state=='Yes')

		{
			 nextslide("#verifi_yes");
			 nextslide("#verif_condition");
			 nextslide("#doc_yes");
			 nextslide("#doc_condition");
			 nextslide("#PF_yes");
		     
			
		}
		else if(type=='PF' && state=='No')
		{
			
			$('#myModal').modal('hide');
			
			window.location.href="./verification/credit_appraisal_memo.php";
		    
		}
		else if(type=='verif_condition' && state=='Yes')
		{
			
			 nextslide("#verifi_yes");
			 nextslide("#verif_condition");
			 
			 if(subm_all_docs=='Yes')//if all doc submitted skip this slide
			 {
			  nextslide("#doc_yes");
			  nextslide("#doc_condition"); 
				 
			 }
			 
			 submitapprovaldetails(type);
			 
			  if(subm_all_docs=='Yes'&& PF=='Yes')//if PF is yes skip this slide
			 {
				 $('#myModal').modal('hide');
			  window.location.href="./product_details.php?id="+id;
				 
			 }
		     
			
		}
		else if(type=='doc_condition' && state=='Yes')
		{
			 nextslide("#verifi_yes");
			 nextslide("#verif_condition");
			 nextslide("#doc_yes");
			 nextslide("#doc_condition");
			 
			  
			 
			 submitapprovaldetails(type);
			 
		     if(PF=='Yes')//if PF is yes skip this slide
			 {
				 $('#myModal').modal('hide');
			  window.location.href="./product_details.php?id="+id;
				 
			 }
			
		}
		else if(type=='PF_condition' && state=='Yes')
		{
			 nextslide("#verifi_yes	");
			 nextslide("#verif_condition");
			 nextslide("#doc_yes");
			 nextslide("#doc_condition");
			 nextslide("#PF_yes");
			 nextslide("#PF_condition");
			var id= '<?php echo $reference_id; ?>';
			 
			 submitapprovaldetails(type);
			 $('#myModal').modal('hide');
			 window.location.href="./product_details.php?id="+id;
		     
			
		}

    }
</script>
<script>
 function nextslide(id){

var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches


	if(animating) return false;
	animating = true;
	
	current_fs = $(id).parent();
	next_fs = $(id).parent().next();
	
	//activate next step on progressbar using the index of next_fs
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
	
	//show the next fieldset
	next_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'transform': 'scale('+scale+')'});
			next_fs.css({'left': left, 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});

	}
	 </script>
	 
	 <script>
 function submitapprovaldetails(fld)
 {
	
	
	 var reference_id= '<?php echo $reference_id;?>';
	 
	
	/* var verif_condition= $("#verif_condition").val();
	 var doc_condition= $("#doc_condition").val();
	 var PF_condition= $("#PF_condition").val();*/
	 
	 var reason=$("#"+fld).val();
		
    
	 
 var dataserialize="reference_id="+reference_id+"&typeOfFld="+fld+"&reason="+reason;
	 
	
    $.ajax({
           type: "POST",
           url: './verification/send_loan_decisioningdetails.php',
           data: dataserialize, // serializes the form's elements.
           success: function(data)
           {
			  
		   
		   }
         });





 }

</script>

<style>


.modalbox .box {
    background-color: rgba(0,0,0,0.4);
    margin: 0 auto;
    min-width: 390px;
    padding: 50px;
    width: 40%;
    margin-top: 100px;
    }
    .modalbox .title {
    border-bottom: 1px solid #ccc;
    font-family: verdana;
    font-size: 18px;
    letter-spacing: 0.2em;
    margin: 0;
    padding: 0 0 10px;
    text-transform: uppercase;
    color: #fff;
        }
    .modalbox .content {
    display: block;
    font-family: Verdana;
	
    font-size: 16px;
    line-height: 22px;
    padding: 10px 0 0;
    color: #fff;
        }
    .modalbox .close1 {
    color: #fff;
    display: block;
    float: right;
    font-family: Verdana;
    font-size: 18px;
    height: 25px;
    text-decoration: none;
        }


.modalbox{
    display: none;
    position: fixed;
    z-index: 9999;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    color:#333333;
    }

.modalbox:target {
    display: block;
    outline: none;
}


.link-modal{
    width: 90%;
    text-align: center;
    margin: 0 auto;
    padding-top: 600px;
    padding-left: 15px;
}


.link-modal a{
    border: 1px solid #fff;
    color: #fff;
    font-family: Verdana;
    font-size: 20px;
    letter-spacing: 0.3em;
    padding: 10px;
    text-decoration: none;
    text-transform: uppercase;
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

</head>

<body id="Body">



<div align="center">

	<form id="Form" action="send_AppStatus.php" autocomplete="off" enctype="multipart/form-data" method="post" name="Form" onsubmit="return validateStatusForm(this)" style="height: 100%;">

		<?php include('./common/bootstrap_common_mainmenu.php'); ?>
					<!-- #BeginEditable "Content" -->

					<table width="100%"><tbody><tr><td height="20" class="heading" >Loan Agreement Details</td></tr></tbody></table>

					

					



					<table id="box-table-a" align="center" border="1" cellpadding="3" cellspacing="3" style="width: 570px; height: 24px; margin-left: 20px;">

					<thead>

					

					



					<tr>

						<th class="formHeader">Loan Agreement</th>

						<th class="formHeader">Reference ID</th>

						<th class="formHeader">First Name</th>

						<th class="formHeader">Last Name</th>

						<th class="formHeader" style="width: 85px">City</th>

						<th class="formHeader" style="width: 85px">Mobile</th>

                                                <th class="formHeader" style="width: 85px">Email</th>

						<th class="formHeader" style="width: 100px">Application Date</th>

                                               

                                                <th class="formHeader" style="width: 100px">Loan Amount</th>

                                                 <th class="formHeader" style="width: 100px">Application Status</th>
												  <th class="formHeader" style="width: 100px">Processing Fees</th>


                                               
                                               

                                               



						</tr></thead>

	<?php
          
                        
           

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



                            $tdate= date('Y')."-".date('m')."-".date('d');

                            //$tdate="2012-05-18";

                        }

                        



		//to send the information into the database		

		//set the authority for roles

		$select_rolerights="select * from rolerights where role='".$_SESSION['Currentrole']."'";

		$record_roleright=mysql_query($select_rolerights);

		$btnassign="";

		$btnreAssign="";

		$restrictapp="";

		$btnSendDoc="";

		$btnApplicationStatus="";

		$btnApplication="";

		$btnModify="";

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

		}		

		//$_SESSION['usertype']=='Partner' 

		   

		   



	

                 // -------------- to get " assignCity "   --------- 6/7/2013 -------Tanu------------

                        $selectUserDetail="select user_id,firstname,lastname,username,usertype,password,location,role,mobile 

                                        from login_details where username='".$_SESSION['internal_email']."'";

                        $userDetail_record=mysql_query($selectUserDetail);

                        $row_user= mysql_fetch_row($userDetail_record);



                        if($row_user)

                        {

                            $col = array('user_id','firstname','lastname','username','usertype','password','location','role','mobile');

                            $fetch = array_combine($col,$row_user); 

                        }

                        $assignCity=$fetch['location'];

           
//<----------------------get the id's of applicants  based on selecting processing fees status-------------------->
                      
                         if($restrictapp!="")

                            { echo($assignCity);

                              if($assignCity!="")

                              { 

                                  

                                $select_query="Select * from student_details s ,course_details c inner join collegeaddressdetail ca on ca.reference_id = c.reference_id 

                                    where s.reference_id=c.reference_id 

                                    and s.reference_id like '%".$reference_id."%' and firstname like'%".$name."%'

                                    and mobile like '%".$mobile."%'

                                    and s.email like '%".$email."%' and DATE(app_date) between '".$fdate."' and '".$tdate."'

                                     and s.city like '%".$location."%' and s.city in (select location from login_details)

                                    order by app_date desc;";



                           

                              }

                              else

                              {

                               $select_query="Select * from student_details s ,course_details c inner join collegeaddressdetail ca on ca.reference_id = c.reference_id 

                                    where s.reference_id=c.reference_id 

                                    and s.reference_id like '%".$reference_id."%' and firstname like'%".$name."%'

                                    and mobile like '%".$mobile."%'

                                    and s.email like '%".$email."%' and DATE(app_date) between '".$fdate."' and '".$tdate."'

                                     and s.city like '%".$location."%'  order by app_date desc;";



                              }

                            }

                          else

                              {	

                               $select_query="Select * from student_details s ,course_details c inner join collegeaddressdetail ca on ca.reference_id = c.reference_id 

                                    where s.reference_id=c.reference_id 

                                    and s.reference_id like '%".$reference_id."%' and firstname like'%".$name."%'

                                    and s.city like '%".$location."%' and mobile like '%".$mobile."%'

                                    and s.email like '%".$email."%' and DATE(app_date) between '".$fdate."' and '".$tdate."'

                                    order by app_date desc;";



                         

                              }

                

                              

		


//echo $select_query;
		 $query="select username from login_details where role='Partner' or role='Field Officer'";

                $record=mysql_query($query);

                $option="";

                while($row1 = @mysql_fetch_assoc($record))

                {

                    $username=$row1["username"];

                    $option.="<OPTION VALUE=\"$username\">".$username;

                }

		

		



		$select_record=mysql_query($select_query);

			//$select_Row=mysql_fetch_row($select_record);

			while ($row = @mysql_fetch_assoc($select_record) ) {

						

					$refid= $row['reference_id'];	
					
					 $select_query="SELECT Processing_Fees='YES'  FROM credit_appraisal_analysisdetails WHERE reference_id=$refid ";
						
						$result=mysql_query($select_query);
						if($result)
						{
						
							$fetch=mysql_fetch_array($result);
							
							$fetch['Processing_Fees'];
							
							if($fetch['Processing_Fees']=='Yes')
							{
								$pf="Paid";
							}
							else
							{
								$pf="Not Paid";
							}
						}
						else
						{
							$pf="Not Paid";
						}



	      print '<tr>';
		  
		 if($countapproval1==0)
		 {
			   print '<td><a href="./verification/credit_appraisal_memo.php"  >Pending Loan Decisioning</a></td>'; 
			 
		 }
		 else
			 
			 {
				print'<td><a href="javascript:void(0);" onclick="showloanDecisioning(1);"  >Download</a></td>'; 
				 
			 }
	    //   .'<td><a href="./product_details.php?id='. $row['reference_id'].'" >Download</a></td>'
		  
         print '<td>'. $row['reference_id'] .'</td>'	

			.'<td>'. $row['firstname'] .'</td>'

			.'<td>'. $row['lastname'] .'</td>'				

			.'<td>'. $row['city'] .'</td>'

			.'<td>'. $row['mobile'] .'</td>'

                        .'<td>'. $row['email'] .'</td>'				

			            .'<td>'. $row['app_date'] .'</td>'

			           

                        .'<td>'. $row['amount'] .'</td>'

                        .'<td>'. $row['app_status'] .'</td>'
						
						 

                        .'<td>'. $pf .'</td>';

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

                                   <input type='submit' name="btnBack" style="width:90px;height:30px;font-size:15px"

                           value='Back' onclick="setaction('loanAgreement.php');" >
						   </td>

                        </tr>

			<tr><td height="50"></td></tr></tbody></table>
	</form>
<!--------------loan_decisioning popup window----------------------------------->
	 <div id="myModal" class="modal" role="dialog" >
  <div class="modal-dialog" style="background-color:">
   
    <!-- Modal content-->
    <div >
      
     <div class="modal-body">
	
	  <div align="Left">
	 <form id="msform" >  
	  <fieldset>
    	        <h3 class="fs-title">Verification Details</h3>
				<h3 class="fs-subtitle" >Proceed without completing verfication</h3> 
			   <input type="button" id="verifi_yes"  class="action-button" style="width:200px;" onclick="return checkallapprovaldetails('verif','Yes');" value="Yes">
			
			   <input type="button" id="verifi_no"  class="action-button" style="width:200px;" onclick="return checkallapprovaldetails('verif','No');" value="No">
			   
      </fieldset>
	  <fieldset>
    	        <h3 class="fs-title">Verification Details</h3>
				<h3 class="fs-subtitle" >Condition</h3> 
			   <select name="verif_condition" id="verif_condition" class="form-control" onChange=" checkallapprovaldetails('verif_condition','Yes');"  >
							    <option value="">Select</option>
								
									<?php
							  $tablename='listofconditions';
							  $cloumnname='verifi_condition';
							  
							  
							  $objCommon->getoptions($tablename,$cloumnname);
							?>
				            </select>
			   
      </fieldset>
	  <fieldset>
    	        <h3 class="fs-title">Document Details</h3>
				<h3 class="fs-subtitle" >Proceed without submitting the complete documents</h3> 
			   <input type="button" id="doc_yes"  class="action-button" style="width:200px;" onclick="return checkallapprovaldetails('doc','Yes');" value="Yes">
			
			   <input type="button" id="doc_no"  class="action-button" style="width:200px;" onclick="return checkallapprovaldetails('doc','No');" value="No">
			   
      </fieldset>
	  
	  
	 
	  <fieldset>
    	        <h3 class="fs-title">Document Details</h3>
				<h3 class="fs-subtitle" >Condition</h3> 
			   <select name="reason" id="doc_condition" class="form-control" onChange=" checkallapprovaldetails('doc_condition','Yes');" >
							    <option value="">Select</option>
								
										<?php
								  $tablename='listofconditions';
								  $cloumnname='doc_condition';
								  
								  
								  $objCommon->getoptions($tablename,$cloumnname);
								?>
				            </select>
			   
      </fieldset>
	  <fieldset>
    	        <h3 class="fs-title">Processing Fee Details</h3>
				<h3 class="fs-subtitle" >Proceed without Processing Fee</h3> 
			   <input type="button" id="PF_yes"  class="action-button" style="width:200px;" onclick="return checkallapprovaldetails('PF','Yes');" value="Yes">
			
			   <input type="button" id="PF_no"  class="action-button" style="width:200px;" onclick="return checkallapprovaldetails('PF','No');" value="No">
			   
      </fieldset>
	  <fieldset>
    	        <h3 class="fs-title">Processing Fee Details</h3>
				<h3 class="fs-subtitle" >Condition</h3> 
			   <select name="reason" id="PF_condition" class="form-control" onChange=" checkallapprovaldetails('PF_condition','Yes');" >
							    <option value="">Select</option>
								
										<?php
								  $tablename='listofconditions';
								  $cloumnname='PF_condition';
								  
								  
								  $objCommon->getoptions($tablename,$cloumnname);
								?>
				            </select>
	         </fieldset>

      </form>
	 
	  </div><br/>
	  

		   
		   
        </div>
     
    </div>

  </div>
</div>			 

				
			



					<?php include('./common/bootstrap_commonFooter.php');?>

<script type="text/javascript"><!--

    var pager = new Pager('box-table-a',10); 

    pager.init(); 

    pager.showPageNav('pager', 'pageNavPosition'); 

    pager.showPage(1);

//--></script>



 


</body>



<!-- #EndTemplate -->



</html>