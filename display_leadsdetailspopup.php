
<?php

include('./connection.php');


 //seleted application id
          $selrefID = $_POST['selrefID'];
		  
		
		  
		  
		  
session_start();

  $select_query1="SELECT reference_id,firstname ,lastname,email,mobile,prevCourse,prevUniversity,college,course,amount,partnername,AccManager,serviceRep,created 
                    
					FROM  registration_details where  mobile like '%".$selrefID ."%'";
			   
			
		 
		 $select_record1= mysql_query($select_query1);
	  
	    if($select_record1)
          {
	        $count_newcourses1=mysql_num_rows($select_record1);
	   
		 }
		 else
		{
		  $count_newcourses1=0;
		}
		
		$Currentrole=$_SESSION['Currentrole'];

	$select_rolerights="select * from rolerights where role='".$_SESSION['Currentrole']."'"; 

		$record_roleright=mysql_query($select_rolerights);

		$btnassign="";

	
                $btnAccMgrassign="";

             
				

		while ($row_rolerights = @mysql_fetch_assoc($record_roleright))

		{		 		

                   if($row_rolerights['rights_id']=="5") //btnassign

                    {

                        $btnassign=$row_rolerights['rights_id'];

                    }	 

                   

                    else if($row_rolerights['rights_id']=="19") //btnAccMgr_assign

                    {

                        $btnAccMgrassign=$row_rolerights['rights_id'];

                    }

                   
					

                    

		}
		
		 $ASOquery="select username from login_details where role='Service Manager' or role='Field Officer' or role='Service Officer' or 
		 role='Senior Manager'";

                $ASOrecord=mysql_query($ASOquery);

                $ASOoption="";

                while($ASOrow1 = @mysql_fetch_assoc($ASOrecord))

                {

                    $username=$ASOrow1["username"];

                    $ASOoption.="<OPTION VALUE=\"$username\">".$username;

                }
				
				
		 	$query="select username from login_details where  role='Field Officer' or role='Service Officer' or role='Service Manager'";

                $record=mysql_query($query);

                $option="";

                while($row11 = @mysql_fetch_assoc($record))

                {

                    $username=$row11["username"];

                    $option.="<OPTION VALUE=\"$username\">".$username;

                }
				
				$query1="select username from login_details where role='Partner' or role='Agency' ";

                $record1=mysql_query($query1);

                $options="";

                while($row12 = @mysql_fetch_assoc($record1))

                {

                    $username1=$row12["username"];

                    $options.="<OPTION VALUE=\"$username1\">".$username1;

                }
				
				
					  while($row1=mysql_fetch_array($select_record1))
	                {
	   
	   
					   $referenceid=$row1['reference_id'];
					   
						   $email=$row1['email'];
						   
						   $mob=$row1['mobile'];
						   
						   // encode
					   $mob_encoded = rtrim(strtr(base64_encode($mob), '+*', '-_'), '=');
					   

				  
			 print '<tr><td class="formHeader">First Name</td><td>: '.$row1['firstname'].'</td></tr>'

			.'<tr><td class="formHeader">Last Name</td><td>: '.$row1['lastname'].'</td></tr>'				

			
			.'<tr><td class="formHeader" style="width: 85px">Mobile</td><td>: '.$row1['mobile'].'</td></tr>'

                        .'<tr><td class="formHeader" style="width: 85px">Email</td><td>: '.$row1['email'].'</td></tr>'				

	
                        .'<tr><td class="formHeader" style="width: 100px">Course Name</td><td>: '.$row1['course'].'</td></tr>'

                        .'<tr><td class="formHeader" style="width: 100px">Loan Amount</td><td>: '.$row1['amount'].'</td></tr>';

                       // '<input type="hidden" id="'.$row['reference_id'].'myAssignAccMgr" name="'.$row['reference_id'].'myAssignAccMgr" value="'.$row2['ResidenceVeri'].'" >';;

            
            // ---------------- New field added- Account Manager -----------------  <?php  if ($btnAccMgrassign!="") { 

            $AccManager = "";

            if(isset($row1['AccManager']))

            {

                $AccManager=$row1['AccManager'];

            }

            print '<tr><td class="formHeader" style="width: 100px" >Account Manager</td><td>: ';

            print '<input id="'.$row1['mobile'].'txtAccMgr" name="'.$row1['mobile'].'txtAccMgr" value="'.$AccManager.'" disabled="disabled"';

            if(!isset($row1['AccManager']))

            {  print ' style="Display:none"';

            }

            print '/>';

            if ($btnAccMgrassign!="") 

            {

            print '<select id="'.$row1['mobile'].'cmbAccMgr" 

                      

                            name="'.$row1['mobile'].'cmbAccMgr" size="1" onchange="OnSOChangeAssign(this)"';



            //if($btnAccMgrassign=="")

            //{

              //  print  ' style="Display:none"';

            //}

            print '>';

            print '<option value="">Select</option>'.$ASOoption.'</select>';

            }

            print '</td></tr>';   

                 

            //----------------- Assigned Service Representative Combo --------------------	        

            $id= $row1['reference_id']; 

           

            $PartnerName=$row1['partnername'];
			
			
			$serviceRep=$row1['serviceRep'];
			

            print '<tr> <td id="AssignedSR" name="AssignedSR" class="formHeader" style="width: 100px">Service Representative</td><td>: ';

            print '<input id="'.$row1['mobile'].'txtName" name="'.$row1['mobile'].'txtName" value="'.$serviceRep.'"';

            if(!isset($row1['serviceRep']))

            {	    

                  print ' style="Display:none"';                                                    

            }	  

            print ' disabled="disabled" />';

            if ($btnassign!="")

            {

            print '<select id="'.$row1['mobile'].'cmbName" 

                            name="'.$row1['mobile'].'cmbName"  size="1" onchange="OnChangeAssign(this)">

                            <option value="">Select</option>'.$option.'</select>';  

            }

          
            print '</td></tr>';

              
            print '<tr> <td id="AssignedPT" name="AssignedPT" class="formHeader" style="width: 100px">Partner/Agency</td><td>: ';

            print '<input id="'.$row1['mobile'].'txtPTName" name="'.$row1['mobile'].'txtPTName" value="'.$PartnerName.'"';

            if(!isset($row1['partnername']))

            {	    

                  print ' style="Display:none"';                                                    

            }	  

            print ' disabled="disabled" />';

            if ($btnassign!="")

            {

            print '<select id="'.$row1['mobile'].'cmbPTName" 

                            name="'.$row1['mobile'].'cmbPTName"  size="1" onchange="OnChangeAssign(this)">

                            <option value="">Select</option>'.$options.'</select>';  

            }
                print '</td></tr>';
           

           

    } 	?>	 
	
<tr><td>&nbsp;</td></tr>
<tr><td colspan="3">

<?php  if ($btnAccMgrassign!="") { ?>

                              <input type='submit' name="btnAccMgrassign" 

                                     value="Assign" onclick="setactionforform('send_AssignLeadsAccMgr.php','registeredetails');">                      

                            <?php  }  ?>

                         

                                

                  </td></tr>
				 





 