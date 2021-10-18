<script language="javascript" src="js/jquery.min.js" type="text/javascript"> </script>
<script language="javascript" src="js/paging.js" type="text/javascript"> </script>




<script type="text/javascript">

    var pager = new Pager('box-table-a',5); 

    pager.init(); 

    pager.showPageNav('pager', 'pageNavPosition'); 

    pager.showPage(1);
</script>

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
						 
						  if($sel_queue=='Application')
				 {
					 
					 
						 
						$condition=" s.reference_id like '%".$reference_id."%' and s.firstname like'%".$name."%'and s.city like '%".$location."%'

                        and s.mobile like '%".$mobile."%' and s.email like '%".$email."%' 
						
						 and s.app_status like '%".$app_status."%' and typeofLoan like '%".$typeofLoan."%' 
						
                        and DATE(s.app_date) between '".$fdate."' and '".$tdate."'";
				 }
				else 
				{
						
						$condition=" s.reference_id like '%".$reference_id."%' and s.firstname like'%".$name."%'and s.city like '%".$location."%'

                        and s.mobile like '%".$mobile."%' and s.email like '%".$email."%' 
						
						and typeofLoan like '%".$typeofLoan."%' 
						
                        and DATE(s.app_date) between '".$fdate."' and '".$tdate."'";


				 }	
						
						
						
						
if($sel_queue=='Application')
{
	$select_query1="SELECT reference_id,firstname ,lastname,email,mobile,app_date
                    
					FROM student_details s where ".$condition;
	
	
}
elseif($sel_queue=='leads')
{
	$select_query1="SELECT reference_id,firstname ,lastname,email,mobile,created
                    
					FROM registration_details where 
						
						
                        created  between '".$fdate."' and '".$tdate."'" ;
	
}

elseif($sel_queue=='newApplication')
{
	$select_query1="SELECT reference_id,firstname ,lastname,email,mobile,app_date
                    
					FROM student_details s where ".$condition."  and app_status='Applied'";
	
	
}
elseif($sel_queue=='verfication')
{
	$select_query1="SELECT reference_id,firstname ,lastname,email,mobile,app_date
                    
					FROM student_details s where ".$condition." and  app_status='Loan Approved' and verificationStatus!='Completed' ";
	
	
}
elseif($sel_queue=='sanctionpending')
{
	$select_query1="SELECT reference_id,firstname ,lastname,email,mobile,app_date
                    
					FROM student_details s where ".$condition." and   s.app_status='Loan Approved' and s.verificationStatus='Completed' and 
					
					s.sanction!='Approved' ";
	
	
}
elseif($sel_queue=='PFP')
{
	$select_query1="SELECT s.reference_id,s.firstname ,s.lastname,s.email,s.mobile,s.app_date from student_details s  left join credit_appraisal_analysisdetails on credit_appraisal_analysisdetails.reference_id=s.reference_id where  s.app_status='Loan Approved' and verificationStatus='Completed' and 
					credit_appraisal_analysisdetails.Processing_Fees='No' and ".$condition;
	
	
}
elseif($sel_queue=='SC_PP')
{
	$select_query1="SELECT s.reference_id,s.firstname ,s.lastname,s.email,s.mobile,s.app_date
                    
					FROM student_details s left join credit_appraisal_analysisdetails on credit_appraisal_analysisdetails.reference_id=s.reference_id where  
					s.sanction='Approved' and credit_appraisal_analysisdetails.Processing_Fees='No'and ".$condition;
	
	
}
elseif($sel_queue=='DP')
{
	$select_query1="SELECT s.reference_id,s.firstname ,s.lastname,s.email,s.mobile,s.app_date
                    
					FROM student_details s left join credit_appraisal_analysisdetails on credit_appraisal_analysisdetails.reference_id=s.reference_id where  
					s.sanction='Approved' and verificationStatus!='Completed' and  credit_appraisal_analysisdetails.Processing_Fees='Yes' and ".$condition;
	
	
}

		 
		 
		 //echo $select_query1;
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

	<table width="100%"><tbody>
                                    <tr><td height="20px"></td></tr>
									
                                            <tr><td height="20" class="heading" ><?php echo $heading;?></td></tr>

                                          

                                            </tbody></table>
<div  class="table-responsive"   id='datatable' >
<?php print'<table  id="box-table-a"  class="table table-striped table-bordered"  border="1" align="left" valign="top"style="background-color:white"> ';?>



<?php  if($count_newcourses1!=0) {   


       print' <tr>  '; 
   
   if($sel_queue=='newApplication'||$sel_queue=='Application')
   {
	    print' <th> Select</th>';
   }
		 
	    print' <th> Reference_id </th>
	   
		   <th>First Name</th>
		  
		   <th>Last Name</th>
		
		   <th>Email</th>
		   
		   <th>Mobile</th>
		   
		   <th>Application Date</th>';
	
	    if($sel_queue=='leads')
		{
		
	       print'<th>Reminder For Filling the full application</th>';
	
		}
	
	    print'</tr>'; 
	
	?>
  
       <?php
	   
	   
	  while($row1=mysql_fetch_array($select_record1))
	   {
	   
	   
	   $referenceid=$row1['reference_id'];
	   
	       $email=$row1['email'];
		   
		   $mob=$row1['mobile'];
		   
		   // encode
       $mob_encoded = rtrim(strtr(base64_encode($mob), '+*', '-_'), '=');
	   
	   
	   
	
	   
	
		
	?>
	
	<?php if($sel_queue=='newApplication'||$sel_queue=='Application') {
	
	print '<td><div class="radio">
                         <label class="radio-inline"> <input type="radio"  id="'.$row1['reference_id'].'"myBtn"  class="links"  name="myradio" value="'.$row1['reference_id'].'" id="'.$row1['reference_id'].'"

	   onclick="selectedapplication1(this)" /></lable></div> </td>'; } ?>
		   
	     <td>
		
		 <?php if($referenceid!='') { 
		 print'<a href="javascript:void(0)" id="'.$row1['reference_id'].'" onclick="selectedapplication(this)"><input type="button"    class="links"  name="myradio" value="'.$row1['reference_id'].'" id="'.$row1['reference_id'].'"/></a>';?>
		
		 
		 <?php } else { ?>
		 
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
		  <td> <a href="javascript:void(0);" id="sendmail" style="text-decoration: none;"
		  onclick="showdocumentsBlock('<?php echo $referenceid; ?>')">Send mail</a></td>
		  
		 <?php } else { ?>
		  
		 <td><?php echo  $row1['app_date'];  ?></td>
         <?php } ?>
	   
	</tr>
	
	
<?php }  }   ?>
	
	
	<div id="pageNavPosition" align="right"> </div>
	</table>
	</div>
	
	
		 