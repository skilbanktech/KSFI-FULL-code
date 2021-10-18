

<?php

ob_start();


session_start();


  include('common/class_Common.php');
						  
   $objCommon=new Common();
   
   
   
     //select id for course in application_scoringfields_list table
            $courseid=$objCommon->getIdofrecord('application_scoringfields_list','actual_field_name','course');
			
			$collegeid=$objCommon->getIdofrecord('application_scoringfields_list','actual_field_name','college');
			
			$universityid=$objCommon->getIdofrecord('application_scoringfields_list','actual_field_name','university');
			
			
				  
	 


include('./connection.php');

   if(($_SESSION['usertype'] == 'Employee') || ($_SESSION['usertype'] == 'Partner')|| ($_SESSION['usertype'] == 'Agency') || ($_SESSION['usertype'] == 'Institute') )

           {

              if(isset($_POST['myradio']))
			  
			   {
                $id=$_POST['myradio'];
			   
			    //set session for applicant id
			   $_SESSION['AppID']=$id;
               }
			    elseif(isset($_GET['id']))
			   {
				  $id= $_GET['id'];
				  
				   $_SESSION['AppID']=$id;
				   
			   }
			   elseif(isset($_SESSION['AppID']))
			   {
			     $id=$_SESSION['AppID']; 
			   }
			  
			   
	       }

            else 

            {

            $id=$_SESSION['id'];

            }

        

        



	$select_query = "Select reference_id,firstname,middlename,lastname,dob,adharcardno,panno,gender,marital_status,email,
	  bankdetails,password,address,street1,street2,state,district,

     city,per_sameadd,per_address,per_street1,per_street2,per_state,per_district,per_city,yearsInResidence,ResidentialStatus,residentialstatus_others,pincode,stdcode,phone,mobile,phone1,prevUniversity,prevCollege,prevCourse,
	 category_prevcourse,category_prevcourseothers,MaxmarksObtainedIn,marks,entranceTest,typeoftest,GDScore,PIScore,prefer_day,

      prefer_time,query,app_date,source,mail_status,update_date,partnername,app_status,employment,employment_other,business,

            designation,yearsInEmployement,income,bankbal,appworking,verificationstatus,Empaddress,Empstreet1,Empstreet2,Empcountry,Empstate,

            Empcity,Emppincode,Empstdcode,Empphone,AppliedBy, AppliedByRole,BusiRec,loantype,typeofLoan,vehicleloanType,AssetType,AssetName,AssetBrand from student_details where reference_id = '$id'";

	$select_record=mysql_query($select_query); 

	



	$row= mysql_fetch_row($select_record);

        

	if($row)

            {

                $col = array('reference_id','firstname','middlename','lastname','dob','adharcardno','panno','gender','marital_status','email',
				'bankdetails','password','address','street1','street2','state','district',

                'city','per_sameadd','per_address','per_street1','per_street2','per_state','per_district','per_city','yearsInResidence','ResidentialStatus','residentialstatus_others','pincode','stdcode','phone','mobile','phone1','prevUniversity','prevCollege','prevCourse','category_prevcourse','category_prevcourseothers','MaxmarksObtainedIn','marks','entranceTest','typeoftest','GDScore','PIScore', 'prefer_day',

                'prefer_time','query','app_date','source','mail_status','update_date','partnername','app_status','employment',
				'employment_other','business',

                'designation','yearsInEmployement','income','bankbal','appworking','verificationstatus','Empaddress','Empstreet1','Empstreet2','Empcountry','Empstate',

                'Empcity','Emppincode','Empstdcode','Empphone','AppliedBy', 'AppliedByRole','BusiRec','loantype','typeofLoan','vehicleloanType','AssetType','AssetName','AssetBrand');



                $fetch = array_combine($col,$row); 

                $BusiRec=$fetch['BusiRec'];
				
				
				
				$entranceTest=$fetch['entranceTest'];
				
				
					if($entranceTest == '')
				{
				
				
				$entranceTest='No';
				
				
				}
				
				
				$income=$fetch['income'];
				
				
				$marital_status=$fetch['marital_status'];
				
				if($marital_status == '')
				{
				
				
				$marital_status='Single';
				
				
				}
				
				
				
				if($fetch['MaxmarksObtainedIn'] == 'CGPA(gradepoints)')
				
				{
				
				$marksObtained=$fetch['marks'];
                
				$grade_Points =  explode('outof', $marksObtained);
				
					$gradepoints1=$grade_Points[0];
					
					$gradepoints2=$grade_Points[1];
					
					
					}
					
					
					
				if($fetch['MaxmarksObtainedIn'] == '')

              {
			 
			  $fetch['MaxmarksObtainedIn']='percentage';
             }			  
					
				   
				
				
            }
			
			
			$select_bankdetails="select bankdetails,accountNo,accountholder,
                       
					   bankname,branchname,branchadd,ifsccode,micr,created from bank_details where reference_id = '$id' and borrowertype='Borrower'";
					   
			$result_bankdetails = mysql_query($select_bankdetails);
			
			$fetch_bankinfo = mysql_fetch_array($result_bankdetails);			
			
			
			$select_assets = "Select reference_id,assets_investments,immovablePropertyvalue,governmentsecuritiesvalue,insurancepoliciesvalue,
	                       chits_kurisvalue,
						   sharesvalue,MFsvalue,debenturesvalue,BankFixedDepositsvalue,ProvidentFundvalue,GoldOrnamentsvalue,
						
						VehiclesSelfOwnedvalue,OtherAssetsvalue,total_AssetsAmount,immovablePropertyCollateral,
						governmentsecuritiesCollateral,insurancepoliciesCollateral,chits_kurisCollateral,
						
						sharesCollateral,MFsCollateral,debenturesCollateral,BankFixedDepositsCollateral,ProvidentFundCollateral,
						GoldOrnamentsCollateral,
						
						VehiclesSelfOwnedCollateral,OtherAssetsCollateral from applicant_assets_details where reference_id = '$id'";

	$select_assetsrecord=mysql_query($select_assets); 

	



	$row11= mysql_fetch_row($select_assetsrecord);

        $count_records=mysql_num_rows($select_assetsrecord);
		
		

	if($row11)

            {

                $col11 = array('reference_id','assets_investments','immovablePropertyvalue','governmentsecuritiesvalue',   
				
								'insurancepoliciesvalue','chits_kurisvalue',
								
								'sharesvalue','MFsvalue','debenturesvalue','BankFixedDepositsvalue','ProvidentFundvalue','GoldOrnamentsvalue',
								
								'VehiclesSelfOwnedvalue','OtherAssetsvalue','total_AssetsAmount','immovablePropertyCollateral','governmentsecuritiesCollateral','insurancepoliciesCollateral',
								'chits_kurisCollateral',
								
								'sharesCollateral','MFsCollateral','debenturesCollateral','BankFixedDepositsCollateral','ProvidentFundCollateral','GoldOrnamentsCollateral','VehiclesSelfOwnedCollateral','OtherAssetsCollateral');



                $fetch_assets = array_combine($col11,$row11); 
				
				
				}
				
				if($count_records>0)
				{
				$assets_investment=$fetch_assets['assets_investments'];
				}
				else
				{
				$assets_investment='No';
				}

                 $assets_investments= stripslashes(trim($assets_investment));


        // Check if form to be shown in readonly mode.

        $readonly=false;

        if(isset($_GET['Mode']))

        { 

                $mode=$_GET['Mode']
				
				;

                if($mode=='VIEW')

                { 

                    $readonly=true;

                }

        }

        else    //------> student case

        { 

           if ($row && $BusiRec=="Yes")

           {

               $readonly=true;

           }

           else

           {

               $readonly=false;

           }

        }



        $select_query1 = "Select reference_id, studyCountry, otherCountry, university, course, courseCategory, otherCourse ,

                                 typeCourse,loanrequiredforcourseType, loanMonth, loanYear, duedate, amount,SelfContribution, duration,totalfees,security, durationtype

                                 from course_details where reference_id = '$id'";
								 
								 

	$select_record1=mysql_query($select_query1); 

	$row1= mysql_fetch_row($select_record1);

        

        if($row1){

     

	$col1 = array('reference_id','studyCountry','otherCountry','university','course','courseCategory','otherCourse',

                        'typeCourse','loanrequiredforcourseType','loanMonth','loanYear','duedate','amount','SelfContribution','duration','totalfees','security','durationtype');

	$fetch1 = array_combine($col1,$row1); 

	}

       

  



 $select_query6 = "select * from collegeaddressdetail where reference_id = '$id'";

	$select_record6=mysql_query($select_query6); 

	//or die(mysql_error());

	

	



	$row6= mysql_fetch_row($select_record6);       

    if($row6)

    {     

	$col6 = array('reference_id','address','street1','street2','state','district','city','pincode','stdcode','phone','Email','ContactPerson','college');

	$fetch6 = array_combine($col6,$row6); 	

	}

     

         $select_query2 = "Select reference_id,coborrowerid,relation,relative,cfirstname,cmiddlename,clastname,cdob,cadharcardno,

                cpanno,cemail,cbankdetails,caddress,cstreet1,cstreet2,cstate,cdistrict,ccity,cyearsInResidence,cResidentialStatus,cresidentialstatus_others,cpincode,cper_sameadd,cper_address,cper_street1,cper_street2,cper_state,cper_district,cper_city,cstdcode,cphone,cmobile,cphone1,

                cemployment,cemployment_other,cbusiness,cdesignation,cyearsInEmployement,cincome,cloan,housingamt,caramt,jeepamt,twowheeleramt,consamt,totamt,cbankbal,samestudadd,

                housingemi,caremi,jeepemi,twowheeleremi,consemi,totemi,cempaddress,cempstreet1,cempstreet2,

                cempstate,cempdistrict,cempcity,cemppincode,cempstdcode,cempphone

        from coapplicant_details where reference_id = '$id'";

	$select_record2=mysql_query($select_query2); 

	//or die(mysql_error());

	



	$row22= mysql_fetch_row($select_record2);

        

        $coborrowerCol = array('reference_id','coborrowerid','relation','relative','cfirstname','cmiddlename','clastname','cdob','cadharcardno',

                'cpanno','cemail','cbankdetails','caddress','cstreet1','cstreet2','cstate','cdistrict','ccity','cyearsInResidence','cResidentialStatus','cresidentialstatus_others','cpincode','cper_sameadd','cper_address','cper_street1','cper_street2','cper_state','cper_district','cper_city','cstdcode','cphone','cmobile','cphone1',

                'cemployment','cemployment_other','cbusiness','cdesignation','cyearsInEmployement','cincome','cloan','housingamt','caramt','jeepamt','twowheeleramt','consamt','totamt',

                'cbankbal','samestudadd','housingemi','caremi','jeepemi','twowheeleremi','consemi','totemi','cempaddress','cempstreet1','cempstreet2',

                    'cempstate','cempdistrict','cempcity','cemppincode','cempstdcode','cempphone');



       if($row22)

            {

             $fetch2 = array_combine($coborrowerCol,$row22); 
              $cincome=$fetch2['cincome'];
			  
			  
			  $select_cbankdetails="select bankdetails,accountNo,accountholder,
                       
					   bankname,branchname,branchadd,ifsccode,micr,created from bank_details where reference_id = '$id' and borrowertype='Coborrower1'";
						   
				$result_cbankdetails = mysql_query($select_cbankdetails);
				
				$fetch_cbankinfo = mysql_fetch_array($result_cbankdetails);			
			
            }
			
			
			
				
				
				


      
      $rowc2= mysql_fetch_row($select_record2);

        

      if($rowc2){

     

     



/*	$colc2 = array('reference_id','coborrowerid','relation','relative','cfirstname','cmiddlename','clastname','cdob',

'cpanno','cemail','caddress','cstreet1','cstreet2','cstate','cdistrict','ccity','cpincode','cstdcode','cphone','cmobile','cphone1',

'cemployment','cbusiness','cdesignation','cincome','cloan','housingamt','caramt','jeepamt','twowheeleramt','consamt','totamt',

'cbankbal','samestudadd','housingemi','caremi','jeepemi','twowheeleremi','consemi','totemi','cempaddress','cempstreet1','cempstreet2',

    'cempstate','cempdistrict','cempcity','cemppincode','cempstdcode','cempphone');*/

	   $fetchc2 = array_combine($coborrowerCol,$rowc2); 

	   
				$coincome=$fetchc2['cincome'];
				
				
       $select_cobankdetails="select bankdetails,accountNo,accountholder,
                       
					   bankname,branchname,branchadd,ifsccode,micr,created from bank_details where reference_id = '$id' and borrowertype='Coborrower2'";
						   
				$result_cobankdetails = mysql_query($select_cobankdetails);
				
				$fetch_cobankinfo = mysql_fetch_array($result_cobankdetails);	

	   
	   
	   

	}
	
	
	
	
	
	$select_assets1 = "Select reference_id,cassets_investments,cimmovablePropertyvalue,cgovernmentsecuritiesvalue,cinsurancepoliciesvalue,
	
	                   cchits_kurisvalue,csharesvalue,cMFsvalue,cdebenturesvalue,cBankFixedDepositsvalue,cProvidentFundvalue,
					   cGoldOrnamentsvalue,
	
						cVehiclesSelfOwnedvalue,cOtherAssetsvalue,ctotal_AssetsAmount,cimmovablePropertyCollateral,cgovernmentsecuritiesCollateral,cinsurancepoliciesCollateral,
						cchits_kurisCollateral,
						
						csharesCollateral,cMFsCollateral,cdebenturesCollateral,cBankFixedDepositsCollateral,cProvidentFundCollateral,cGoldOrnamentsCollateral,
						
						cVehiclesSelfOwnedCollateral,cOtherAssetsCollateral from coapplicant_assets_details where reference_id = '$id'";

	$select_assetsrecord1=mysql_query($select_assets1); 

	

          $count_records1=mysql_num_rows($select_assetsrecord1);

	$row12= mysql_fetch_row($select_assetsrecord1);

        

	if($row12)

            {

                $col12 = array('reference_id','cassets_investments','cimmovablePropertyvalue','cgovernmentsecuritiesvalue',
	
							'cinsurancepoliciesvalue','cchits_kurisvalue','csharesvalue','cMFsvalue','cdebenturesvalue','cBankFixedDepositsvalue',
							
							'cProvidentFundvalue','cGoldOrnamentsvalue','cVehiclesSelfOwnedvalue','cOtherAssetsvalue','ctotal_AssetsAmount','cimmovablePropertyCollateral','cgovernmentsecuritiesCollateral',
							
							'cinsurancepoliciesCollateral','cchits_kurisCollateral','csharesCollateral','cMFsCollateral','cdebenturesCollateral','cBankFixedDepositsCollateral',
							
							'cProvidentFundCollateral','cGoldOrnamentsCollateral','cVehiclesSelfOwnedCollateral','cOtherAssetsCollateral');



                $fetch_assets2 = array_combine($col12,$row12); 
				
				
				}
				
				
				if($count_records1>0)
				{
				$cassets_investment=$fetch_assets2['cassets_investments'];
				
				 if($fetch_assets2['cassets_investments']=='')
				   {
					  $cassets_investment='No'; 
				   }
				}
				else
				{
				$cassets_investment='No';
				}
				
				
				 $rowc12= mysql_fetch_row($select_assetsrecord1);

        

            if($rowc12){
			
			$fetch_assetsc2 = array_combine($col12,$rowc12); 
			
			}
			
			if(isset($fetch_assetsc2['cassets_investments']))
			{
				if($fetch_assetsc2['cassets_investments']!='')
				{
				$coassets_investment=$fetch_assetsc2['cassets_investments'];
				}
				else
				{
					$coassets_investment='No';
				}
			}
			else
			{
			$coassets_investment='No';
			}
			$cassets_investments= stripslashes(trim($cassets_investment));
			$coassets_investments= stripslashes(trim($coassets_investment));
			
			//select entrance test list
			$select_entrancetest=mysql_query("SELECT id,TestName FROM entrancetest_list");

			 $selecttest= mysql_query("select  score,testName from test_score where reference_id='$id'");
		  
		   
		         $counttests=mysql_num_rows($selecttest);
				 
				 if($counttests!=0)
				 {
		                   while($row4=mysql_fetch_array($selecttest))
										 
				           {						   
										   
										 
										 $tests_array[]= $row4['testName']; 
										   
										  
			                }
										 
								
		                        
										$test=implode(',',$tests_array);
								  
								  $Var = $test;
								  
		                     $enttestnames=explode(',', $Var);	
								 
								  
								//  $enttest = split(',',$test);
					}			  
						
                    
					if($fetch['loantype']=='Others')	
					{
								
			              $otherloans='yes';
					}
					else
					{
						$otherloans='No';
						
					}
					
			$squery =  "SELECT doc_name FROM document_details where reference_id='".$id."' and doc_type='Photo'";

	        $sresult =  mysql_query($squery);
			
			$row_count = mysql_num_rows($sresult);
			
			if($row_count!=0)
						
				{
					$row14 = mysql_fetch_array($sresult);
					
				    $doc_name = $row14['doc_name'];
					
					$docpath = './'.$id.'/'.$doc_name;
					
				}
				
			
				    $adhardoc_name = $objCommon->getDocname($id,'Applicant','Aadhar');
					$pandoc_name = $objCommon->getDocname($id,'Applicant','PAN');
					$photo_name =  $objCommon->getDocname($id,'Applicant','photo');
					$video_name = $objCommon->getDocname($id,'Applicant','video');
					
					
					 $cadhardoc_name = $objCommon->getDocname($id,'Co-Borrower 1','Aadhar');
					$cpandoc_name = $objCommon->getDocname($id,'Co-Borrower 1','PAN');
					$cphoto_name =  $objCommon->getDocname($id,'Co-Borrower 1','photo');
				
					
					
					$coadhardoc_name = $objCommon->getDocname($id,'Co-Borrower 2','Aadhar');
					$copandoc_name = $objCommon->getDocname($id,'Co-Borrower 2','PAN');
					$cophoto_name =  $objCommon->getDocname($id,'Co-Borrower 2','photo');
					
					
					
				$amount=$fetch1['amount'];
			
			 //select online_applicationfieldslist to show fileds according to the loan amount
		   $select_query="select *  from online_applicationfieldslist where $amount between loanRange_From and loanRange_To";
		   
           $query_result= mysql_query($select_query);
		   
		   $fetchinfo= mysql_fetch_array($query_result);
		   
		   
		    //select online_applicationfieldslist to show fileds according to the loan amount
		   $select_query1="select *  from online_application_cob_fieldslist where $amount between loanRange_From and loanRange_To";
		  
           $query_result1= mysql_query($select_query1);
		   
		   $fetchinfo1= mysql_fetch_array($query_result1);
		   
		   
		    $querydis =  "SELECT * FROM loanstatus where reference_id='".$id."' and status='Loan Disbursed' ";
      
     // echo $querydis;
		   $resultdis =  mysql_query($querydis);  
			
			$loan_disbursed_row= mysql_fetch_row($resultdis);

         $reference_id_encoded = rtrim(strtr(base64_encode($id), '+*', '-_'), '=');
				
				
				
 
			
			 


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

<script language="javascript" src="js/loanApplication.js" type="text/javascript">

 </script>

<script language="javascript" src="js/jquery-1.6.2.min.js" type="text/javascript"></script>

 <script language="javascript" src="js/common.js" type="text/javascript"></script>





<script language="javascript" src="js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
  
  <script>
  $( function() {
     $( "#tabs" ).tabs();
	 
	  } );
  </script>
<script>

var windows = [];

/*window.onload = function()
{
var t=setTimeout("mywindow()",1000); 
 // call other functions which you want to be called when window loads   
 
 
}*/
function mywindow(state,adhar,PAN,photo,video,borrowertype)
{
	
	
	
	if(state =='open')
		
	{
	 	 if(photo!='') { 
	  var win1 = windows.push(window.open('./open_uploadedDocument.php?reference=<?php echo $reference_id_encoded;?>&doc='+photo, '_blank','width=450,height=250,top=100,left=50','window1'));
	 // document.getElementById("cadharcardno").focus(); 
  
	   }
	  
	 if(adhar!='') { 
      var win2 = windows.push(window.open('./open_uploadedDocument.php?reference=<?php echo $reference_id_encoded;?>&doc=<?php echo $adhardoc_name;?>', '_blank','width=450,height=250,top=100,left=980','window2'));
	  } 
	  if(video!='') {
	  var win3 = windows.push(window.open('./open_uploadedDocument.php?reference=<?php echo $reference_id_encoded;?>&doc=<?php echo $video_name;?>', '_blank','width=450,height=250,top=500,left=50','window3'));
	   }
	   if(PAN!='') { 
	  var win4 = windows.push(window.open('./open_uploadedDocument.php?reference=<?php echo $reference_id_encoded;?>&doc=<?php echo $pandoc_name;?>', '_blank','width=450,height=250,top=500,left=980','window4'));
	  }
	  
	  
	 
	  
	}
} 


function closewindow()
{
	
	 
	  //then you can iterate over them and close them all like this:
		for(var i = 0; i < windows.length; i++){
			
			
			windows[i].close();
		
	}
	
	return true;
	
	
	
}

	   
	 


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

</script>
<style>

a#edit
{
background-color:white;

}
</style>
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

td{

font-size:14px;
}

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



</style>

</head>

    



<body id="Body">
<form id="loanApplication" action="updateApplication.php"  method="post" name="loanApplication" onsubmit="return validateLoanApplicationFormOnSubmit(this,'3')">		<div align="center" class="skinwrapper">



					<!-- #BeginEditable "Content" -->
      



 <?php  include('./common/common_mainmenu.php'); 

//sub-menu

include('./common/common_submenu.php'); 

?>
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

                <table align="center" border="0" cellpadding="3" cellspacing="0" width="650">

                    <tr>

                            <td style="height: 20px"></td>

                    </tr>

                    <tr>

                            <td class="heading" colspan="3">Applicant Details</td>

                    </tr>

                    <tr>

                            <td height="5"></td>

                    </tr>
					 

                           
							
                  


                    <tr>

                            <td>Reference ID</td>

                            <td>:</td>

                            <td>

                            <input id="" name="refID" size="40" type="text"

                                    value="<?php if($id) { echo $id; } ?>"

                                            <?php if($readonly) echo 'readonly=readonly'; 

                                                ?>  ></td>
												
												
                    </tr>
				
                    <tr>

                            <td>First Name</td>

                            <td>:</td>

                            <td>

                            <input id="firstname" name="firstname" size="40" type="text"

                                    value="<?php if($row) { echo $fetch['firstname']; } ?>"

                                            <?php if($readonly) echo 'readonly=readonly'; 

                                                ?>  ></td>

                    </tr>
					
				
                     <?php if($fetchinfo1['Middle_Name']=='YES') { ?>
                    <tr>

                            <td>Middle Name</td>

                            <td>:</td>

                            <td>

                            <input id="middlename" name="middlename" size="40" type="text" 

                                    value="<?php if($row) { echo $fetch['middlename']; } ?>"

                                            <?php if($readonly) echo 'readonly=readonly'; 

                                                ?> ></td>

                    </tr>
					 <?php } ?>
              
                    <tr>

                            <td>Last Name</td>

                            <td>:</td>

                            <td>

                            <input id="lastname" name="lastname" size="40" type="text" 

                                    value="<?php if($row) { echo $fetch['lastname']; } ?>"

                                            <?php if($readonly) echo 'readonly=readonly'; 

                                                ?> ></td>

                    </tr>
                    
                     <?php if($fetchinfo['Date_of_Birth']=='YES') { ?>
                    <tr>

                            <td>Date of Birth</td>

                            <td>:</td>

                            <td>

                            <input id="datepicker" name="datepicker" size="40" type="text" 

                                    value="<?php if($row) { $originaldate= $fetch['dob'];

                                                            $newdate=date("d-m-Y",strtotime($originaldate));

                                                            echo "$newdate";} ?>"

                                                            <?php if($readonly) echo 'readonly=readonly'; 

                                                ?> ></td>

                    </tr>
					 <?php } ?>
					 <?php if($fetchinfo['Aadhar_Card_No']=='YES') { ?>
					<tr>

                            <td>Aadhar Card No.</td>

                            <td>:</td>

                            <td>

                            <input id="adharcardno" onkeyup="allowonlynumeric(this)"  maxlength="12"  name="adharcardno" size="40" type="text" 

                                    value="<?php if($row) { echo $fetch['adharcardno']; } ?>"

                                            <?php if($readonly) echo 'readonly=readonly'; 

                                                ?> ></td>
											<?php 
											if($_SESSION['usertype'] == 'Employee') { 
      											?>
												
									 <?php if($adhardoc_name!='' || $pandoc_name!='' || $photo_name!='' || $video_name!='') { ?>
												<td >
												
											<a href="#" onClick="mywindow('open','<?php echo $adhardoc_name ?>','<?php echo $pandoc_name; ?>','<?php echo $photo_name; ?>','<?php echo $video_name; ?>')" ><input type="button" value="View KYC"> </a>
											<a href="#" onClick="closewindow()" ><input type="button" value="Close KYC"> </a>
												</td>
												
											<?php } }	?>


                    </tr>
					 <?php } ?>
					
					<tr>

                            <td>PAN No.</td>

                            <td>:</td>

                            <td>

                            <input id="panno" maxlength="10"  name="panno" size="40" type="text" 

                                    value="<?php if($row) { echo $fetch['panno']; } ?>"

                                            <?php if($readonly) echo 'readonly=readonly'; 

                                                ?> ></td>
												
												

                    </tr>
					
					<?php if($fetchinfo['Gender']=='YES') { ?>
						<tr>

                            <td>Gender</td>

                            <td>:</td>

                            <td>

                            <input  id="gender"  name="gender" type="radio" <?php if($row) { if($fetch['gender'] == 'Male') { echo "checked=checked"; } } ?> value="Male"                                    
							<?php if($readonly) echo 'disabled=disabled'; 

                                               ?> >Male
							 <input  id="gender"  name="gender" type="radio" <?php if($row) { if($fetch['gender'] == 'Female') { 
							 echo "checked=checked"; } } ?>   value="Female"                                   
							 <?php if($readonly) echo 'disabled=disabled'; 

                                                ?> >Female
							 <input  id="gender"  name="gender" type="radio" <?php if($row) { if($fetch['gender'] == 'Other') { 
							 echo "checked=checked"; } } ?>   value="Other"
							          <?php if($readonly) echo 'disabled=disabled'; 

                                                ?> >Other
							
							
                            

                            </td>

                    </tr>
					<?php } ?>
					<?php if($fetchinfo['Marital_Status']=='YES') { ?>
					
					<tr>

                           <td>Marital Status</td>

                            <td>:</td>

                            <td>

                            <select id="marital_status"  name="marital_status"   size="1" 
							      <?php if($readonly) echo 'disabled=disabled'; 

                                                ?> >

                            <option  <?php if($row){

                                    if($marital_status == 'Single')

                                    {        echo "selected='selected'";      }	}										     

                                    ?>>Single</option>
							<option <?php if($row){

                                    if($marital_status == 'Married')

                                    {        echo "selected='selected'";      }	}										     

                                    ?>>Married</option>
							<option <?php if($row){

                                    if($marital_status == 'Widow')

                                    {        echo "selected='selected'";      }	}										     

                                    ?>>Widow</option>
							<option <?php if($row){

                                    if($marital_status == 'Separated')

                                    {        echo "selected='selected'";      }	}										     

                                    ?>>Separated</option>
							</select>
							
							
						</td>
						</tr>
					<?php } ?>
						

                    <tr>

                            <td>Email Address</td>

                            <td>:</td>

                            <td>

                            <input id="email" name="email" size="40" type="text" value="<?php if($row) { echo $fetch['email']; } ?>"

                                    <?php if($readonly) echo 'readonly=readonly'; 

                                                ?> ></td>

                    </tr>
					<?php if($otherloans!='No')   
            	{?>
					<tr>

                            <td>Do You want to provide your bank details?</td>

                            <td>:</td>

                            <td>

                            <input  id="bankdetails"  name="bankdetails" type="radio"   <?php if($readonly) echo 'disabled=disabled'; ?> 
                            
							<?php if($row) {  if($fetch['bankdetails']=='Yes') { echo "checked='checked'"; } } ?>
							value="Yes" onclick="onselectbankdetails(this,false,'accountNo','accountholder','bankname','branchname','branchadd','ifsccode','bankdetails','micr')">Yes
							<input  id="bankdetails"  name="bankdetails" type="radio" <?php if($readonly) echo 'disabled=disabled'; ?> 
							<?php if($row) {  if($fetch['bankdetails']=='No'||$fetch['bankdetails']=='') { echo "checked='checked'"; } }
                              else { echo "checked='checked'";  }  ?>  
							value="No" onclick="onselectbankdetails(this,true,'accountNo','accountholder','bankname','branchname','branchadd','ifsccode','bankdetails','micr')">No
							
                            
                        </td>

                    </tr>
					 <tr id="bankdetails6" <?php if($row) {  if($fetch['bankdetails']=='No'||$fetch['bankdetails']=='') { ?> style="display:none" <?php }} ?>>
						     <td><label id="lblIFSCCode">IFSC Code</label></td>
							 <td>:</td>
							 <td><input maxlength="18" size="40" id="ifsccode" name="ifsccode"  
							 <?php if($readonly) echo 'readonly=readonly';  if($row) {  if($fetch['bankdetails']!='Yes') { echo 'disabled=disabled'; }}
							  else { echo "disabled=disabled";  } ?>

                             onkeyup="getbankdetailfromifsc('ifsccode','bankname','branchname','branchadd','micr')"        value="<?php if($row) {  if($fetch['bankdetails']=='Yes') { echo $fetch_bankinfo['ifsccode']; } } ?>" id="ifsccode" type="text">
							 
							</td>
						</tr>
					<tr id="bankdetails1" <?php if($row) {  if($fetch['bankdetails']=='No'||$fetch['bankdetails']=='') { ?> style="display:none" <?php }} ?>>
					     <td>Account No.</td>
						 <td>:</td>
						 
                            <td>
                               <input maxlength="18" size="40"  id="accountNo" name="accountNo"  onkeypress="return isNumber(event)"  id="accountNo" 
							   type="text"  <?php if($readonly) echo 'readonly=readonly';  if($row) {  if($fetch['bankdetails']!='Yes') { echo 'disabled=disabled'; }}
							                       else { echo "disabled=disabled";  }?>

                                            value="<?php if($row) {  if($fetch['bankdetails']=='Yes') { echo $fetch_bankinfo['accountNo']; } } ?>">
							</td>
					</tr>


                     <tr id="bankdetails2" <?php if($row) {  if($fetch['bankdetails']=='No'||$fetch['bankdetails']=='') { ?> style="display:none" <?php }} ?>>
								<td ><label id="AccountHolder"  >Account Holder</label></td>
                                <td>:</td>
								<td>
                                   <input maxlength="50"  size="40" id="accountholder" name="accountholder" id="accountholder" type="text" 
								    <?php if($readonly) echo 'readonly=readonly';  if($row) {  if($fetch['bankdetails']!='Yes') { echo 'disabled=disabled'; }}
									else { echo "disabled=disabled";  } ?>

                                                value="<?php if($row) {  if($fetch['bankdetails']=='Yes') { echo $fetch_bankinfo['accountholder']; } } ?>">
									</td>
						</tr>


					     <tr id="bankdetails3" <?php if($row) {  if($fetch['bankdetails']=='No'||$fetch['bankdetails']=='') { ?> style="display:none" <?php }} ?>>
								<td ><label id="BankName" >Bank Name</label></td>
								<td>:</td>
								<td>
									<input maxlength="50"  size="40" id="bankname" name="bankname" id="bankname"
									type="text"  <?php if($readonly) echo 'readonly=readonly';  if($row) {  if($fetch['bankdetails']!='Yes') { echo 'disabled=disabled'; }}
									else { echo "disabled=disabled";  } ?>

                                                value="<?php if($row) {  if($fetch['bankdetails']=='Yes') { echo $fetch_bankinfo['bankname']; } } ?>">
								</td>
						</tr>
                        <tr id="bankdetails4" <?php if($row) {  if($fetch['bankdetails']=='No'||$fetch['bankdetails']=='') { ?> style="display:none" <?php }} ?>>
						     <td ><label id="BranchName">Branch Name</label></td>
							 <td>:</td>
							 <td>
                                <input maxlength="50"  size="40" id="branchname" name="branchname" id="branchname" type="text"
								<?php if($readonly) echo 'readonly=readonly';  if($row) {  if($fetch['bankdetails']!='Yes') { echo 'disabled=disabled'; }}
								else { echo "disabled=disabled";  }  ?>

                                                value="<?php if($row) {  if($fetch['bankdetails']=='Yes') { echo $fetch_bankinfo['branchname']; } } ?>">
							</td>
						</tr>

                        <tr id="bankdetails5" <?php if($row) {  if($fetch['bankdetails']=='No'||$fetch['bankdetails']=='') { ?> style="display:none" <?php }} ?>>
						    <td><label id="BranchLocation">Branch Location</label></td>
							<td>:</td>
							<td>
                               <input maxlength="50" size="40" id="branchadd" name="branchadd" id="branchadd" type="text"
							   <?php if($readonly) echo 'readonly=readonly';  if($row) {  if($fetch['bankdetails']!='Yes') { echo 'disabled=disabled'; }}
							   else { echo "disabled=disabled";  } ?>

                                                value="<?php if($row) {  if($fetch['bankdetails']=='Yes') { echo $fetch_bankinfo['branchadd']; } } ?>"> 
							</td>
						</tr>

                       
						<tr id="bankdetails7" <?php if($row) {  if($fetch['bankdetails']=='No'||$fetch['bankdetails']=='') { ?> style="display:none" <?php }} ?>>
						     <td><label id="lblmicrCode">MICR</label></td>
							 <td>:</td>
							 <td><input maxlength="18" size="40" id="micr" name="micr"  
							 <?php if($readonly) echo 'readonly=readonly';  if($row) {  if($fetch['bankdetails']!='Yes') { echo 'disabled=disabled'; }}
							  else { echo "disabled=disabled";  } ?>

                                                value="<?php if($row) {  if($fetch['bankdetails']=='Yes') { echo $fetch_bankinfo['micr']; } } ?>"  type="text">
							 
							</td>
						</tr>
				<?php } ?>
                   	<?php if($fetchinfo['Address']=='YES') { ?>
                    <tr>

                            <td>Address</td>

                            <td>:</td>

                            <td>

                            <input id="address" name="address" size="40" type="text" 

                                    value="<?php if($row) { echo $fetch['address']; } ?>"

                                    <?php if($readonly) echo 'readonly=readonly'; 

                                                ?> ></td>

                    </tr>
					<?php } ?>
					<?php if($fetchinfo['Street1']=='YES') { ?>

                    <tr>

                            <td>Street1</td>

                            <td>:</td>

                            <td>

                            <input id="street1" name="street1" size="40" type="text" 

                                    value="<?php if($row) { echo $fetch['street1']; } ?>"

                                    <?php if($readonly) echo 'readonly=readonly'; 

                                                ?>></td>

                    </tr>
					 <?php } ?>
					<?php if($fetchinfo['Street2']=='YES') { ?>

                    <tr>

                            <td style="height: 28px">Street2 (optional)</td>

                            <td style="height: 28px">:</td>

                            <td style="height: 28px">

                            <input id="street2" name="street2" size="40" type="text" 

                                    value="<?php if($row) { echo $fetch['street2']; } ?>"

                                    <?php if($readonly) echo 'readonly=readonly'; 

                                                ?>>

                           
                            </td>

                    </tr>
					 <?php } ?>
					<?php if($fetchinfo['State']=='YES') { ?>

                    <tr>

                            <td>State</td>

                            <td>:</td>

                            <td>



                            <input id="countrySelect1" name="country1" size="20" type="text" onChange="changeState(this,'countrySelect1','stateSelect1','citySelect1','countrySelect','stateSelect','citySelect');" 

                                            value="<?php if($row) { echo $fetch['state']; } ?>"

                                                <?php if($readonly) echo 'readonly=readonly'; ?> >



                            <select style="display:none" disabled="disabled" id="countrySelect"  name="country" 

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



                                <input id="stateSelect1" name="state1" size="20" type="text" onChange="changeState(this,'countrySelect1','stateSelect1','citySelect1','countrySelect','stateSelect','citySelect');" 

                                            value="<?php if($row) { echo $fetch['district']; } ?>"  

                                            <?php if($readonly) echo 'readonly=readonly'; ?>>

                                <select  style="display:none" disabled="disabled" id="stateSelect"  name="state" size="1"></select>

                                <script type="text/javascript">initCountry('','countrySelect','stateSelect','citySelect');</script>

                            </td>

                    </tr>
					 <?php } ?>
					<?php if($fetchinfo['City']=='YES') { ?>

                    <tr>

                            <td>City</td>

                            <td>:</td>

                            <td>

                            <input id="citySelect1" name="city1" size="20" type="text" onChange="changeState(this,'countrySelect1','stateSelect1','citySelect1','countrySelect','stateSelect','citySelect');" 

                                        value="<?php if($row) { echo $fetch['city']; } ?>"   

                                            <?php if($readonly) echo 'readonly=readonly'; ?>>

                            <select id="citySelect"  style="display:none" name="city" size="1" disabled="disabled">

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

                            <select id="yearsInResidence" name="yearsInResidence" size="1"

							<?php if($readonly) echo 'disabled=disabled'; ?>>

                            <option value="">Select</option>
							<option <?php if($row){

                                    if($fetch['yearsInResidence'] == '<1')

                                    {        echo "selected='selected'";      }	}										     

                                    ?>><1</option>
							
					             <?php if($row) { if($fetch['yearsInResidence']!='<1' && $fetch['yearsInResidence']!='>15' && $fetch['yearsInResidence']!='') { ?>	
                                          <script>
											filldropdown_numbersofSelected('yearsInResidence', 1,15,1,<?php echo 
											$fetch['yearsInResidence'].'+1';?>);
											
											</script> 
											<?php }    else { ?>
											<script>
											filldropdown_numbers('yearsInResidence', 1,15);
											
											</script> <?php } }  ?>
										
											

							 
								 
								  <option <?php if($row){

                                    if($fetch['yearsInResidence'] == '>15')

                                    {        echo "selected='selected'";      }	}										     

                                    ?>>>15</option>
							   

                            

                          

                            </select></td>

                    </tr>
					<?php } ?>
					<?php if($fetchinfo['Residential_Status']=='YES') { ?>
					<tr>

                            <td>Residential Status</td>

                            <td>:</td>

                            <td>

                            <select id="ResidentialStatus" name="ResidentialStatus"  onchange="return onOtherSelectedIndexChange(this,'residentialstatus_others')" size="1" 
							
							
							<?php if($readonly) echo 'disabled=disabled'; ?>>

                            <option selected="selected">Select</option>
							<option <?php if($row){

                                    if($fetch['ResidentialStatus'] == 'Staying with Friends or Hostel')

                                    {        echo "selected='selected'";      }	}										     

                                    ?>>Staying with Friends or Hostel</option>
							<option <?php if($row){

                                    if($fetch['ResidentialStatus'] == 'Staying with Relative')

                                    {        echo "selected='selected'";      }	}										     

                                    ?> >Staying with Relative</option>
							<option <?php if($row){

                                    if($fetch['ResidentialStatus'] == 'Self Rented/Paying Guest')

                                    {        echo "selected='selected'";      }	}										     

                                    ?>>Self Rented/Paying Guest</option>
							<option <?php if($row){

                                    if($fetch['ResidentialStatus'] == 'Rented by Parents')

                                    {        echo "selected='selected'";      }	}										     

                                    ?>>Rented by Parents</option>
							<option <?php if($row){

                                    if($fetch['ResidentialStatus'] == 'Company Owned')

                                    {        echo "selected='selected'";      }	}										     

                                    ?>>Company Owned</option>
							<option <?php if($row){

                                    if($fetch['ResidentialStatus'] == 'Financed by Self')

                                    {        echo "selected='selected'";      }	}										     

                                    ?>>Financed by Self</option>
							<option <?php if($row){

                                    if($fetch['ResidentialStatus'] == 'Financed by Parents')

                                    {        echo "selected='selected'";      }	}										     

                                    ?>>Financed by Parents</option>
							<option <?php if($row){

                                    if($fetch['ResidentialStatus'] == 'Owned by Parents')

                                    {        echo "selected='selected'";      }	}										     

                                    ?>>Owned by Parents</option>
									<option <?php if($row){

                                    if($fetch['ResidentialStatus'] == 'Other')

                                    {        echo "selected='selected'";      }	}										     

                                    ?>>Other</option>
                           
                          

                            </select>
							 <input id="residentialstatus_others" size="17" name="residentialstatus_others"  type="text" hidden="true"

                                                        value="<?php if($row) { echo $fetch['residentialstatus_others']; } ?>" 

                                                        <?php if($readonly) { echo 'readonly=readonly';?>hidden="false" <?php } 

                                                        if($row && $fetch['ResidentialStatus']=='Other') {
														
														echo "style='display: block'";} 

                                                           ?>></td>
</td>

                    </tr>
					 <?php } ?>
					<?php if($fetchinfo['Pincode']=='YES') { ?>


                    <tr>

                            <td>Pincode</td>

                            <td>:</td>

                            <td>

                            <input id="pincode" maxlength="6" name="pincode" size="40" type="text" 

                                    value="<?php if($row) { echo $fetch['pincode']; } ?>" 

                                            <?php if($readonly) echo 'readonly=readonly'; 

                                                ?>></td>

                    </tr>
					 <?php } ?>
					 
					  <?php if($fetchinfo['per_Address']=='YES') { ?>
					   					  
					 
					 <tr>

                    <td bgcolor="#E6F0FA" colspan="3">

                    <input name="sameadd" onclick="return onclickPermanentSameAddress(this)" type="checkbox"  

                        <?php if($row){

                                if($fetch['per_sameadd'] == 'on')

                                    {   echo "checked='checked'";   }	}

                                    ?>>Permanent Address same as above Address

                    </td>

            </tr>
			

            <tr>

                    <td>Address</td>

                    <td>:</td>

                    <td>

                    <input id="per_address" name="per_address" size="40" type="text"

                        value="<?php if($row) { echo $fetch['per_address']; } ?>" 
						
                        <?php if($row){

                                if($fetch['per_sameadd'] == 'on')

                                    { echo  'readonly=readonly';     }	}

                                    ?>						

                        <?php if($readonly) echo 'readonly=readonly'; 

                                        ?>></td>

            </tr>

              
              
                 <tr>

                    <td>Street1</td>

                    <td>:</td>

                    <td>

                    <input id="per_street1" name="per_street1" size="40" type="text" 

                        value="<?php if($row) { echo $fetch['per_street1']; } ?>" 
						
						<?php if($row){

                                if($fetch['per_sameadd'] == 'on')

                                    { echo  'readonly=readonly';     }	}

                                    ?>				

                        <?php if($readonly) echo 'readonly=readonly'; 

                                        ?>></td>

            </tr>
				 <?php } ?>
				 <?php if($fetchinfo['per_Street2']=='YES') { ?>
            <tr>

                    <td>Street2 (optional)</td>

                    <td>:</td>

                    <td>

                    <input id="per_street2" name="per_street2" size="40" type="text"

                        value="<?php if($row) { echo $fetch['per_street2']; } ?>" 

                      <?php if($row){

                                if($fetch['per_sameadd'] == 'on')

                                    { echo  'readonly=readonly';     }	}

                                    ?>										

                        <?php if($readonly) echo 'readonly=readonly'; ?>> 

                    

                    </td>

            </tr>
             <?php } ?>
                <?php if($fetchinfo['per_State']=='YES') { ?>
            <tr>

                    <td>State</td>

                    <td>:</td>

                    <td>

                    <input id="per_country1"  name="per_country1" type="text" onChange="changeState(this,'per_country1','per_state1','per_city1','per_countrySelect','per_stateSelect','per_citySelect');" 

                            value="<?php if($row) { echo $fetch['per_state']; } ?>"
                            <?php if($row){

                                if($fetch['per_sameadd'] == 'on')

                                    { echo  'readonly=readonly';     }	}

                                    ?>											

                            <?php if($readonly) echo 'readonly=readonly'; ?>> 



                    <select disabled="disabled"  style="display:none" id="per_countrySelect" name="per_country" 

                            onchange="populateState('per_countrySelect','per_stateSelect'); populateCity('per_countrySelect','per_citySelect')" size="1">

                    </select>

                    </td>

            </tr>
           <?php } ?>
                <?php if($fetchinfo['per_District']=='YES') { ?>
            <tr>

                    <td>District</td>

                    <td>:</td>

                    <td>





                        <input id="per_state1"  name="per_state1" type="text" onChange="changeState(this,'per_country1','per_state1','per_city1','per_countrySelect','per_stateSelect','per_citySelect');" 

                    value="<?php if($row) { echo $fetch['per_district']; } ?>" 
					<?php if($row){

                                if($fetch['per_sameadd'] == 'on')

                                    { echo  'readonly=readonly';     }	}

                                    ?>				

                    <?php if($readonly) echo 'readonly=readonly';  ?>>

                    <select id="per_stateSelect" style="display:none" disabled="disabled" name="per_stateSelect" size="1">

                    </select><script type="text/javascript">initCountry('','per_countrySelect','per_stateSelect','per_citySelect');</script>

                    </td>

            </tr>
			 <?php } ?>
                <?php if($fetchinfo['per_City']=='YES') { ?>

            <tr>

                    <td>City</td>

                    <td>:</td>

                    <td align="left" valign="top">

                        <input id="per_city1" name="per_city1"  type="text" onChange="
						changeState(this,'per_country1','per_state1','per_city1','per_countrySelect','per_stateSelect','per_citySelect');" 

                                        value="<?php if($row) { echo $fetch['per_city']; } ?>" 
										<?php if($row){

                                if($fetch['per_sameadd'] == 'on')

                                    { echo  'readonly=readonly';     }	}

                                    ?>				


                    <?php if($readonly) echo 'readonly=readonly'; ?>>
					

                    <select id="per_citySelect" style="display:none" disabled="disabled" name="per_citySelect" size="1"></select>

                    <script type="text/javascript">initCountry('','per_countrySelect','per_stateSelect','per_citySelect'); </script>



                    </td>

            </tr>
			 <?php } ?>

                    <tr>

                            <td>Phone No.</td>

                            <td>:</td>

                            <td>

                            <input id="stdcode" placeholder="STD Code" maxlength="6" name="stdcode" size="10" type="text" 

                                    value="<?php if($row) { echo $fetch['stdcode']; } ?>" 

                                    <?php if($readonly) echo 'readonly=readonly'; 

                                                ?>>

                            <input id="phone" placeholder="Enter 8 digits" maxlength="8" name="phone" size="24" type="text" 

                                value="<?php if($row) { echo $fetch['phone']; } ?>" 

                                    <?php if($readonly) echo 'readonly=readonly'; 

                                                ?>></td>

                    </tr>
					<?php if($fetchinfo['Mobile_No']=='YES') { ?>

                    <tr>

                            <td>Mobile No.</td>

                            <td>:</td>

                            <td>

                            <input id="mobile" maxlength="10" name="mobile" size="40" type="text" 

                        value="<?php if($row) { echo $fetch['mobile']; } ?>" 

                                <?php if($readonly) echo 'readonly=readonly'; 

                                                ?>></td>

                    </tr>
					 <?php } ?>

                                                                    <tr>

                            <td>Alternate Contact No.</td>

                            <td>:</td>

                            <td>







                            <input id="phone1" maxlength="10" name="phone1" size="40" type="text" 

                                value="<?php if($row) { echo $fetch['phone1']; } ?>"   

                                        <?php if($readonly) echo 'readonly=readonly'; 

                                                ?>></td>

                    </tr>

					<?php if($otherloans=='No')
					{ ?>
                    <tr>

                            <td>Previous University</td>

                            <td>:</td>

                            <td>

                            <input id="prevUniversity" name="prevUniversity" size="40" type="text"

                            value="<?php if($row) { echo $fetch['prevUniversity']; } ?>"

                                    <?php if($readonly) echo 'readonly=readonly'; 

                                                ?>></td>

                    </tr>

                    <tr>

                            <td>Previous College</td>

                            <td>:</td>

                            <td>

                            <input id="prevCollege" name="prevCollege" size="40" type="text" 

                                value="<?php if($row) { echo $fetch['prevCollege']; } ?>" 

                                        <?php if($readonly) echo 'readonly=readonly'; 

                                                ?>></td>

                    </tr>

                    <tr>

                            <td>Previous Course/Class</td>

                            <td>:</td>

                            <td>

                            <select id="prevCourse" name="prevCourse"   style="width:310px"  onChange="getprevCourse();"  
							
							<?php if($readonly) { echo 'disabled=disabled';  }?>>
                             <option> Select</option>
                          <?php
						  
						

						  
						  $tablename='previous_courselist';
						  $cloumnname='previous_course';
						  $arrvalue=$fetch['prevCourse'];
						  
						  
                        $objCommon->getoptionsfromdbchecked($tablename,$cloumnname,$arrvalue);
						?></select></td>

                    </tr>
					<tr>

                            <td>Category of Previous Course</td>

                            <td>:</td>

                            <td>

                            <select id="category_prevcourse"  name="category_prevcourse"   onchange="return onOtherSelectedIndexChange(this,'category_prevcourseothers')" 
							
							<?php if($row){

                                    if($fetch['category_prevcourse'] == '')

                                    {  

							echo 'disabled=disabled' ;    } } ?>


							<?php if($readonly) echo  'disabled=disabled'; ?>>
							
							<option>Select</option>
							
							
                             <option selected="selected"><?php if($row){

                                    if($fetch['category_prevcourse'] != '')

                                    {  

									echo $fetch['category_prevcourse'] ;    } else { echo "Select"; }  } ?> </option>
									
                         </select>
						 <input id="category_prevcourseothers" name="category_prevcourseothers"  type="text" hidden="true"

                                                        value="<?php if($row) { echo $fetch['category_prevcourseothers']; } ?>" 

                                                        <?php if($readonly) { echo 'readonly=readonly';?>hidden="false" <?php } 

                                                        if($row && $fetch['category_prevcourse']=='Other') {
														
														echo "style='display: block'";} 

                                                           ?>></td>
									
									
									 

                    </tr>
					
					<tr>

                            <td valign="top">Marks obtained in Previous Course/Class</td>

                            <td>:</td>

                            <td>

                            <table>


        <tr>
		
		   

                                            <td>

                                           <input id="marksinPercentage"  name="marks" onclick="return onMarkChecked(this,'Percentage','CGPA_Grade','CGPA_Gradepoints','CGPA_outof_GradePoint')" type="radio" value="percentage" <?php if($row){

                                    if($fetch['MaxmarksObtainedIn'] == 'percentage')

                                    {        echo "checked='checked'";      }	}



                                        if($readonly) echo 'disabled=disabled'; 

                                       ?>>Percentage</td>
									   
									   
									   <td>

                                            <input id="marksingrade" name="marks" onclick="return onMarkChecked(this,'CGPA_Grade','Percentage','CGPA_Gradepoints','CGPA_outof_GradePoint')" type="radio" value="CGPA(grade)" <?php if($row){

											if($fetch['MaxmarksObtainedIn'] == 'CGPA(grade)')

											{        echo "checked='checked'";      }	}



												if($readonly) echo 'disabled=disabled'; 

                                          ?>>CGPA(Grade)</td>
										  
										  
										  
										  <td>

                                            <input id="marksingradepoints" name="marks" onclick="return onGradePointsChecked(this,'CGPA_Gradepoints','CGPA_outof_GradePoint','Percentage','CGPA_Grade')" type="radio" value="CGPA(gradepoints)"<?php if($row){

											if($fetch['MaxmarksObtainedIn'] == 'CGPA(gradepoints)')

											{        echo "checked='checked'";      }	}



												if($readonly) echo 'disabled=disabled'; 

                                           ?>>CGPA(Grade Points)</td>


                                        
									
									</table>

                            </td>
							
							</tr>
							
							
							<tr><td>Select the Maximum Marks Obtained</td>
							     <td>:</td>
								 
								     <td>

                                             <select <?php if($readonly) echo 'disabled="disabled"';
											 
											 if($fetch['MaxmarksObtainedIn'] == 'percentage')

											{ echo ''; } else {  echo  'disabled="disabled"'; } ?>id="Percentage" name="Percentage" size="1">

												<option>Select</option>

												<option <?php if($row){

											if($fetch['MaxmarksObtainedIn'] == 'percentage')

											{   
											
                                           if($fetch['marks'] == '<=50%') { echo 'selected=selected'; } } } ?> >&lt;=50%</option>

												<option <?php if($row){

											if($fetch['MaxmarksObtainedIn'] == 'percentage')

											{   
											
                                           if($fetch['marks'] == '51%-59%') { echo 'selected=selected'; } } } ?>>51%-59%</option>

												<option <?php if($row){

											if($fetch['MaxmarksObtainedIn'] == 'percentage')

											{   
											
                                           if($fetch['marks'] == '60%-69%') { echo 'selected=selected'; } } } ?>>60%-69%</option>

												<option <?php if($row){

											if($fetch['MaxmarksObtainedIn'] == 'percentage')

											{   
											
                                           if($fetch['marks'] == '70%-79%') { echo 'selected=selected'; } } } ?>>70%-79%</option>

												<option <?php if($row){

											if($fetch['MaxmarksObtainedIn'] == 'percentage')

											{   
											
                                           if($fetch['marks'] == '80%-89%') { echo 'selected=selected'; } } } ?>>80%-89%</option>

												<option <?php if($row){

											if($fetch['MaxmarksObtainedIn'] == 'percentage')

											{   
											
                                           if($fetch['marks'] == '>=90%') { echo 'selected=selected'; } } } ?>>&gt;=90%</option>

												</select>

                                       <!-- CPGA GRADE   -->

                                            <select <?php if($readonly) echo 'disabled="disabled"';
											
											if($fetch['MaxmarksObtainedIn'] != 'CGPA(grade)')

											{   echo  'disabled="disabled"'; } ?> name="CGPA_Grade" id="CGPA_Grade">

                                            <option>Select</option>

                                            <option <?php if($row){

											if($fetch['MaxmarksObtainedIn'] == 'CGPA(grade)')

											{   
											
                                           if($fetch['marks'] == 'A+') { echo 'selected=selected'; } } } ?>>A+</option>

                                            <option <?php if($row){

											if($fetch['MaxmarksObtainedIn'] == 'CGPA(grade)')

											{   
											
                                           if($fetch['marks'] == 'A') { echo 'selected=selected'; } } } ?>>A</option>

                                            <option <?php if($row){

											if($fetch['MaxmarksObtainedIn'] == 'CGPA(grade)')

											{   
											
                                           if($fetch['marks'] == 'A-') { echo 'selected=selected'; } } } ?>>A-</option>

                                            <option <?php if($row){

											if($fetch['MaxmarksObtainedIn'] == 'CGPA(grade)')

											{   
											
                                           if($fetch['marks'] == 'B+') { echo 'selected=selected'; } } } ?>>B+</option>
											
											<option <?php if($row){

											if($fetch['MaxmarksObtainedIn'] == 'CGPA(grade)')

											{   
											
                                           if($fetch['marks'] == 'B') { echo 'selected=selected'; } } } ?>>B</option>
											
											<option <?php if($row){

											if($fetch['MaxmarksObtainedIn'] == 'CGPA(grade)')

											{   
											
                                           if($fetch['marks'] == 'B-') { echo 'selected=selected'; } } } ?>>B-</option>
											
											<option <?php if($row){

											if($fetch['MaxmarksObtainedIn'] == 'CGPA(grade)')

											{   
											
                                           if($fetch['marks'] == 'C+') { echo 'selected=selected'; } } } ?>>C+</option>
											
											<option <?php if($row){

											if($fetch['MaxmarksObtainedIn'] == 'CGPA(grade)')

											{   
											
                                           if($fetch['marks'] == 'C') { echo 'selected=selected'; } } } ?>>C</option>
											
											<option <?php if($row){

											if($fetch['MaxmarksObtainedIn'] == 'CGPA(grade)')

											{   
											
                                           if($fetch['marks'] == 'C-') { echo 'selected=selected'; } } } ?>>C-</option>
											
											<option <?php if($row){

											if($fetch['MaxmarksObtainedIn'] == 'CGPA(grade)')

											{   
											
                                           if($fetch['marks'] == 'D+') { echo 'selected=selected'; } } } ?>>D+</option>
											
											<option <?php if($row){

											if($fetch['MaxmarksObtainedIn'] == 'CGPA(grade)')

											{   
											
                                           if($fetch['marks'] == 'D') { echo 'selected=selected'; } } } ?>>D</option>
											
											<option <?php if($row){

											if($fetch['MaxmarksObtainedIn'] == 'CGPA(grade)')

											{   
											
                                           if($fetch['marks'] == 'F') { echo 'selected=selected'; } } } ?>>F</option>
											 
											 

                                            </select>

                                            
                                            <!-- CPGA GRADE POINTS  -->


                                            <select <?php if($readonly) echo 'disabled="disabled"';
											if($fetch['MaxmarksObtainedIn'] != 'CGPA(gradepoints)')

											{   echo  'disabled="disabled"'; } ?> name="CGPA_Gradepoints" id="CGPA_Gradepoints" size="1">

                                            <option>Select</option>
											
											
											
										<?php if($fetch['MaxmarksObtainedIn'] == 'CGPA(gradepoints)')

											{ ?>	
                                          <script>
											filldropdown_numbersofSelected('CGPA_Gradepoints', 1,10,1,<?php echo $gradepoints1;?>);
											
											</script> 
											<?php } else { ?>
											<script>
											filldropdown_numbers('CGPA_Gradepoints', 1,10);
											
											</script> <?php } ?>
											

                                            </select>
											
											<!-- CPGA OUTOF GRADE POINTS -->

											<span id="outof">Outof</span>
											 

                                            <select <?php if($readonly) echo 'disabled="disabled"';
											if($fetch['MaxmarksObtainedIn'] != 'CGPA(gradepoints)')

											{   echo  'disabled="disabled"'; } ?>name="CGPA_outof_GradePoint" id="CGPA_outof_GradePoint">

                                            <option>Select</option>
                                             <?php if($fetch['MaxmarksObtainedIn'] == 'CGPA(gradepoints)')

											{ ?>	
                                          <script>
											filldropdown_numbersofSelected('CGPA_outof_GradePoint', 1,10,1,<?php echo $gradepoints2;?>);
											
											</script> 
											<?php } else { ?>
											<script>
											filldropdown_numbers('CGPA_outof_GradePoint', 1,10);
											
											</script> <?php } ?>
											

                                           
											

                                            </select></td>




                                    </tr>
									 
                                <tr>

                                         <td>Entrance Test Taken(if any)</td>

                                         <td>:</td>

                                         <td>

										<input  id="entranceTest"  <?php if($entranceTest=='Yes'){ echo "checked='checked'"; }   ?> name="entranceTest" type="radio" value="Yes" onclick="return     onSelectedEntranceTest(this,'display_entranceTest','entrancetestpanel','display_GD','display_PI','yes')"  
										<?php if($readonly) echo 'disabled=disabled'; 
                                                ?>>Yes
										 <input  id="entranceTest" <?php if($entranceTest=='No'){ echo "checked='checked'"; }   ?>   name="entranceTest" type="radio" value="No" onclick="return     onSelectedEntranceTest(this,'display_entranceTest','entrancetestpanel','display_GD','display_PI','no')" 
										 <?php if($readonly) echo 'disabled=disabled'; 
                                                ?>>No
										 
							
							            </td>

                                    </tr>
                                      <tr id="display_entranceTest"  <?php if($entranceTest=='No'){ ?> style="display:none" <?php } ?>>
										    <td>
											Type of Test Taken
                                            </td>	<td>:</td>		
											
											<td>
											 <input  id="writtentest"   <?php if($fetch['typeoftest']=='WrittenTest'){ echo "checked='checked'"; }   ?> name="writtentest" type="radio"  onclick="return     onSelectedEntranceTest(this,'entrancetestpanel','display_entranceTest','display_GD','display_PI','writtentest')" value="WrittenTest" <?php if($readonly) echo 'disabled=disabled'; 
                                                ?>>Written Test
											
											 <input  id="writtentest" <?php if($fetch['typeoftest']=='WrittenTest_GD_PI'){ echo "checked='checked'"; }   ?> name="writtentest" type="radio"  onclick="return     onSelectedEntranceTest(this,'entrancetestpanel','display_entranceTest','display_GD','display_PI','GD_PI')" value="WrittenTest_GD_PI" <?php if($readonly) echo 'disabled=disabled'; 
                                                ?>>Written Test+GD/PI
											</td>
										</tr>

          									
                                
					                <?php } ?>
                           </table>
						   
						<?php if($otherloans=='No')
					{ ?>			
                        <table  <?php if($entranceTest=='No'){   ?> style="display:none" <?php } ?> id="entrancetestpanel" align="center" border="0" cellpadding="3" cellspacing="0" width="650">
					         
								     <tr>
										    <td>
											Select Entrance Test
                                            </td>	<td></td>		
											
											<td align="left">
											Score of Entrance Test
											</td>
										</tr>
										<?php
										
										
								 while($row3=mysql_fetch_array($select_entrancetest))
										 
								{   
										    $TestName=$row3['TestName'];
										    $TestScore=$TestName.'Score';
											
									$selecttest= mysql_query("select score,otherEntTest from test_score where testName='$TestName' and reference_id='$id'");
		   
									   $count_tests=mysql_num_rows($selecttest);
									   
									   
									   if($count_tests==1)
									   
									   {
											$fetchtest=mysql_fetch_array($selecttest); 
											
											  $enttestscore=$fetchtest['score'];
											  
											 $otherEntTest = $fetchtest['otherEntTest'];
									   
									   }
									   else
									   
									   {
									     $otherEntTest='';
										  $enttestscore='0';
										   
									   } ?>
														   
														   
																			
							 <tr>
									 <td><input   id="<?php echo $TestName;?>"  name="nameofEntTest[]" type="checkbox"  
										value="<?php echo $TestName;?>"   
										 
									    <?php   if($counttests!=0){
				 
										    foreach($enttestnames as $enttestname)
										 {  if($enttestname == $TestName) { 
											 echo "checked='checked'";
											} else { echo ""; }
										  } } ?> onclick="onEntranceTestCheked(this,'<?php echo $TestScore; ?>','specifyotherTest');" <?php if($readonly) echo 'disabled=disabled'; 
                                                ?>><?php echo $TestName;?> 
										  <?php if($TestName=='Other') { ?> <br> 
										  <input id="specifyotherTest"   <?php  if($counttests!=0) { 
										   if($otherEntTest != '') { echo ""; } else { echo "disabled='disabled'";    }  }?> placeholder="Specify Other Entrance Test" maxlength="45" name="specifyotherTest"    size="22" type="text" value="<?php echo $otherEntTest;  ?>" <?php if($readonly) echo 'readonly=readonly'; 
                                                ?>></td> 	
										
											<?php } ?></td>	<td></td>		
										   <td><input id="<?php echo $TestScore;?>" value="<?php echo $enttestscore;?>" maxlength="4"
										   <?php if($enttestscore>0) { echo  ""; } else { echo "disabled='disabled'";}   ?> maxlength="45" name="entrancetestscore[]" onClick="return  removeStartingZero(this)"  size="22" type="text" 
										   <?php if($readonly) echo 'readonly=readonly'; 
                                                ?>></td>
										    
										</tr>
										
										<?php   }   ?>
		   
		                                
										
					           	<tr id="display_GD"  <?php if($entranceTest=='Yes' && $fetch['typeoftest']=='WrittenTest'){ ?> style="display:none" <?php } elseif($entranceTest=='No') {  ?>style="display:none"   <?php } ?>>
                                                    								

										<td>Group Discussion Score</td>

										<td>:</td>

										<td>

										<input id="GDScore"  name="GDScore"  size="22" type="text" value="<?php echo $fetch['GDScore'];?>"  <?php if($readonly) echo 'readonly=readonly'; 
                                                ?>></td>

									</tr>
									<tr id="display_PI" <?php if($entranceTest=='Yes' && $fetch['typeoftest']=='WrittenTest'){ ?> style="display:none" <?php } elseif($entranceTest=='No') {  ?>style="display:none"   <?php } ?>  
									<?php if($readonly) echo 'readonly=readonly'; 
                                                ?>>

										<td>Personal Interview Score</td>

										<td>:</td>

										<td>

										<input id="PIScore"  name="PIScore"  size="22" type="text" value="<?php echo $fetch['PIScore'];?>" ></td>

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

                            <td class="heading" colspan="3"><span style="font-size:12"><b>Course Details for Which Loan is Required<b></span></td>

                    </tr>

                    <tr>

                            <td height="5"></td>

                    </tr>

                    <tr>

                            <td>Country of Study</td>

                            <td>:</td>

                            <td>

                            <select id="studyCountry" name="studyCountry" onchange="return onOtherSelectedIndexChange(this,'otherCountry')" size="1"

                                    <?php if($readonly) echo 'disabled=disabled'; 

                                ?>>

                            <option >Select</option>

                            <option <?php if($row1){

                                    if($fetch1['studyCountry'] == 'India')

                                    {        echo "selected='selected'";      }	}										     

                                    ?> >India</option>



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

                                    if($fetch1['studyCountry'] == 'Japan')

                                    {        echo "selected='selected'";      }	}										     

                                    ?>>Japan</option>



                            <option <?php if($row1){

                                    if($fetch1['studyCountry'] == 'Other')

                                    {        echo "selected='selected'";      }	}										     

                                    ?>>Other</option>

                            </select>

							

                            <input id="otherCountry" name="otherCountry" size="22" type="text" hidden="true"

                            value="<?php if($row1) { echo $fetch1['otherCountry']; } ?>"     

                                    <?php if($readonly) { echo 'readonly=readonly'; ?> hidden="false" <?php }

                                     if($row1 && $fetch1['studyCountry'] == 'Other') { echo "style='display: block'";}

                                    ?>></td>

                </tr>

                <tr>

                            <td>University of Study</td>

                            <td>:</td>

                            <td>

                            <input id="university" name="university" size="40" type="text"

                            value="<?php if($row1) { echo $fetch1['university']; } ?>" 

                                    <?php if($readonly) echo 'readonly=readonly'; 

                                                ?>></td>

                    </tr>

                    <tr>

                            <td>College of Study</td>

                            <td>:</td>

                            <td>

                            <input id="college" name="college" size="40" type="text"

                                value="<?php if($row6) { echo $fetch6['college']; } ?>"  

                                        <?php if($readonly) echo 'readonly=readonly'; 

                                                ?>></td>

                    </tr>

                    <tr>

                            <td>College Address</td>

                            <td>:</td>

                            <td>

                            <input id="Coladdress" maxlength="45"  onClick="coladdress('college','Autofill_collegeInformation.php')" name="Coladdress" size="40" type="text" onchange="onchangeAdd(this)" 

                            value="<?php if($row6) { echo $fetch6['address']; } ?>"

                                    <?php if($readonly) echo 'readonly=readonly'; 

                                                ?>></td>

                    </tr>

                    <tr>

                            <td>Street1</td>

                            <td>:</td>

                            <td>

                            <input id="Colstreet1" maxlength="45" name="Colstreet1" size="40" type="text" onchange="onchangeStreet1(this)"

                            value="<?php if($row6) { echo $fetch6['street1']; } ?>" 

                                    <?php if($readonly) echo 'readonly=readonly'; 

                                                ?>></td>

                    </tr>

                    <tr>

                            <td style="height: 28px">Street2 (optional)</td>

                            <td style="height: 28px">:</td>

                            <td style="height: 28px">

                            <input id="Colstreet2" maxlength="45" name="Colstreet2" size="40" type="text" onchange="onchangeStreet2(this)"

                            value="<?php if($row6) { echo $fetch6['street2']; } ?>" 

                                    <?php if($readonly) echo 'readonly=readonly';?>>&nbsp;  

                            
                            </td>

                    </tr>

                    <tr>

                        <td>State/County</td>

                        <td>:</td>

                        <td>

                                <input id="ColcountrySelect1" name="Colcountry1" size="20" type="text"

                                                        value="<?php if($row6) { echo $fetch6['state']; } ?>" 

                                                            <?php if($readonly) echo 'readonly=readonly'; ?>>

                        <select <?php if($row6){ if($fetch6['state']!=''){ echo 'disabled="disabled"'; }}?> 

                            id="ColcountrySelect" style="display:none"  name="Colcountry"  onchange="populateState('ColcountrySelect','ColstateSelect'); populateCity('ColcountrySelect','ColcitySelect')" size="1">

                        </select>

                        </td>

                    </tr>

                    <tr>

                            <td>District</td>

                            <td>:</td>

                            <td>

                                <input id="ColstateSelect1" name="Colstate1" size="20" type="text" 

                                        value="<?php if($row6) { echo $fetch6['district']; } ?>" 

                                            <?php if($readonly) echo 'readonly=readonly'; ?>>



                            <select <?php if($row6){ if($fetch6['district']!=''){ echo 'disabled="disabled"'; }}?> id="ColstateSelect"     style="display:none" name="Colstate" size="1">

                            </select><script type="text/javascript">initCountry('','ColcountrySelect','ColstateSelect','ColcitySelect');</script>

                            &nbsp;</td>

                    </tr>

                    <tr>

                            <td>City</td>

                            <td>:</td>

                            <td>

							

                            <input id="ColcitySelect1" name="Colcity1" size="20" type="text" 

                                    value="<?php if($row6) { echo $fetch6['city']; } ?>" 

                                    <?php if($readonly) echo 'readonly=readonly'; ?>>



                                    <select id="ColcitySelect" <?php if($row6){ if($fetch6['city']!=''){ echo 'disabled="disabled"'; }}?>   style="display:none"name="Colcity" size="1">

                                    </select>

                                    <script type="text/javascript">initCountry('','ColcountrySelect','ColstateSelect','ColcitySelect');</script>

                            </td>

                    </tr>

                    <tr>

                            <td>Pincode/Zipcode</td>

                            <td>:</td>

                            <td>

                                <input id="Colpincode" maxlength="6" name="Colpincode" size="40" type="text" onchange="onchangePincode(this)"

                                value="<?php if($row6) { echo $fetch6['pincode']; } ?>" 

                                       <?php if($readonly) echo 'readonly=readonly';?>>

                            </td>

                    </tr>

                    <tr>

                            <td>Phone No.</td>

                            <td>:</td>

                            <td>

                            <input id="Colstdcode"  placeholder="STD/ISD Code" maxlength="6" name="Colstdcode" size="12" type="text" onchange="onchangeStdcode(this)"

                            value="<?php if($row6) { echo $fetch6['stdcode']; } ?>" 

                                    <?php if($readonly) echo 'readonly=readonly'; 

                                                ?>>

                            <input id="Colphone" placeholder="Enter 8 digits" maxlength="8" name="Colphone" size="22" type="text" onchange="onchangePhone(this)"

                            value="<?php if($row6) { echo $fetch6['phone']; } ?>" 

                                    <?php if($readonly) echo 'readonly=readonly'; 

                                                ?>>

                            </td>

                    </tr>

                    <tr>

                            <td>Contact Person Name</td>

                            <td>:</td>

                            <td>

                            <input id="ContactPName" maxlength="45" name="ContactPName" size="40" type="text" 

                                    value="<?php if($row6) { echo $fetch6['ContactPerson']; } ?>" 

                                            <?php if($readonly) echo 'readonly=readonly'; 

                                                ?>></td>

                    </tr>

                    <tr>

                            <td>Email</td>

                            <td>:</td>

                            <td>

                            <input id="CollegeEMail" maxlength="45" name="CollegeEMail" size="40" type="text" 

                                    value="<?php if($row6) { echo $fetch6['Email']; } ?>" 

                                            <?php if($readonly) echo 'readonly=readonly'; 

                                                ?>></td>

                    </tr>



                    <tr>

                            <td>Course Name</td>

                            <td>:</td>

                            <td>

                            <input id="course" name="course" size="40" type="text"

                            value="<?php if($row1) { echo $fetch1['course']; } ?>"  

                                    <?php if($readonly) echo 'readonly=readonly'; 

                                                ?>></td>

                    </tr>

                   
                    <tr>

                            <td>Medium of Course</td>

                            <td>:</td>

                            <td>

                            <input  id="fulltime"  name="courseType" type="radio" value="Full Time"

                                        <?php if($row1){

                                    if($fetch1['typeCourse'] == 'Full Time')

                                    {        echo "checked='checked'";      }	}



                                        if($readonly) echo 'disabled=disabled'; 

                                ?>>Full Time



                            <input id="parttime" name="courseType" type="radio" value="Part Time"

                                        <?php if($row1){

                                    if($fetch1['typeCourse'] == 'Part Time')

                                    {        echo "checked='checked'";      }	}



                                        if($readonly) echo 'disabled=disabled'; 

                                ?>>Part Time

							

                            <input id="correspondence" name="courseType" type="radio" value="Correspondence"

                                        <?php if($row1){

                                    if($fetch1['typeCourse'] == 'Correspondence')

                                    {        echo "checked='checked'";      }	}



                                        if($readonly) echo 'disabled=disabled'; 

                                ?>>Correspondence
								
								
								<input id="online" name="courseType" type="radio" value="Online"

                                        <?php if($row1){

                                    if($fetch1['typeCourse'] == 'Online')

                                    {        echo "checked='checked'";      }	}



                                        if($readonly) echo 'disabled=disabled'; 

                                ?>>Online

                            

                            </td>

                    </tr>
					<tr>

                            <td>Type of course for which loan is required</td>

                            <td>:</td>

                            <td>

                            <input  id="loanrequiredforcourseType"  name="loanrequiredforcourseType" type="radio" value="Vocational Education"

                                        <?php if($row1){

                                    if($fetch1['loanrequiredforcourseType'] == 'Vocational Education' || $fetch1['loanrequiredforcourseType']=='')

                                    {        echo "checked='checked'";      }	}



                                        if($readonly) echo 'disabled=disabled'; 

                                ?>  onClick="incomerange('6');changeCategoryofcourseOptions('vocationalcourseCategory','courseCategory','otherCourse');">Vocational Education



                            

                            <input id="loanrequiredforcourseType" name="loanrequiredforcourseType" type="radio" value="Higher Education"

                                        <?php if($row1){

                                    if($fetch1['loanrequiredforcourseType'] == 'Higher Education')

                                    {        echo "checked='checked'";      }	}



                                        if($readonly) echo 'disabled=disabled'; 

                                ?>onClick="incomerange('6');changeCategoryofcourseOptions('courseCategory','vocationalcourseCategory','otherCourse');">Higher Education

                            

                            </td>

                    </tr>
					
					 <tr>

                            <td>Category of Course</td>

                            <td>:</td>

                            <td>

                            <select id="courseCategory" name="courseCategory"  size="1" 

                                    onchange="return onOtherSelectedIndexChange(this,'otherCourse')" 

                                <?php if($readonly) echo 'disabled=disabled'; 
								
                                    if($fetch1['loanrequiredforcourseType'] == 'Vocational Education' || $fetch1['loanrequiredforcourseType']=='')

                                    {
                                 	    echo 'disabled=disabled  hidden=hidden'; 
                                    } ?>>

                            <option>Select</option>

                            <option <?php if($row1){

                                    if($fetch1['courseCategory'] == 'Engineering/MS')

                                    {        echo "selected='selected'";      }	}										     

                                        if($readonly) echo 'disabled=disabled'; 

                                ?>>Engineering/MS</option>



                            <option  <?php if($row1){

                                    if($fetch1['courseCategory'] == 'MBA/PGPM')

                                    {        echo "selected='selected'";      }	}										     

                                        if($readonly) echo 'disabled=disabled'; 

                                ?>>MBA/PGPM</option>



                            <option  <?php if($row1){

                                    if($fetch1['courseCategory'] == 'Medical')

                                    {        echo "selected='selected'";      }	}										     

                                        if($readonly) echo 'disabled=disabled'; 

                                ?>>Medical</option>



                            <option  <?php if($row1){

                                    if($fetch1['courseCategory'] == 'Hotel Management')

                                    {        echo "selected='selected'";      }	}										     

                                        if($readonly) echo 'disabled=disabled'; 

                                ?>>Hotel Management</option>



                            <option  <?php if($row1){

                                    if($fetch1['courseCategory'] == 'Vocational' )

                                    {        echo "selected='selected'";      }	}										     

                                        if($readonly) echo 'disabled=disabled'; 

                                ?>>Vocational</option>



                            <option  <?php if($row1){

                                    if($fetch1['courseCategory'] == 'Certificate')

                                    {        echo "selected='selected'";      }	}										     

                                        if($readonly) echo 'disabled=disabled'; 

                                ?>>Certificate</option>



                            <option  <?php if($row1){

                                    if($fetch1['courseCategory'] == 'Other')

                                    {        echo "selected='selected'";      }	}										     

                                        if($readonly) echo 'disabled=disabled'; 

                                ?>>Other</option>

                            </select>
							 <select id="vocationalcourseCategory" name="courseCategory1"   onchange="return onOtherSelectedIndexChange(this,'otherCourse')" size="1"  <?php if($readonly) echo 'disabled=disabled'; 
							                 if($fetch1['loanrequiredforcourseType'] == 'Higher Education')

                                           { 
							                   echo 'disabled=disabled  hidden=hidden'; 
										    }    ?>>
							
							
							 <option>Select</option>
							 
							 <option  <?php if($row1){

                                    if($fetch1['courseCategory'] == 'Master Diploma Online')

                                    {        echo "selected='selected'";      }	}										     

                                        if($readonly) echo 'disabled=disabled'; 

                                ?>>Master Diploma Online</option>
							 
							 <option  <?php if($row1){

                                    if($fetch1['courseCategory'] == 'Master Diploma Offline')

                                    {        echo "selected='selected'";      }	}										     

                                        if($readonly) echo 'disabled=disabled'; 

                                ?>>Master Diploma Offline</option>
							 
							 <option  <?php if($row1){

                                    if($fetch1['courseCategory'] == 'Post Diploma Online')

                                    {        echo "selected='selected'";      }	}										     

                                        if($readonly) echo 'disabled=disabled'; 

                                ?>>Post Diploma Online</option>
							 
							 <option  <?php if($row1){

                                    if($fetch1['courseCategory'] == 'Post Diploma Offline')

                                    {        echo "selected='selected'";      }	}										     

                                        if($readonly) echo 'disabled=disabled'; 

                                ?>>Post Diploma Offline</option>
							 
							 <option  <?php if($row1){

                                    if($fetch1['courseCategory'] == 'Diploma Offline')

                                    {        echo "selected='selected'";      }	}										     

                                        if($readonly) echo 'disabled=disabled'; 

                                ?>>Diploma Offline</option>
							 
							 <option  <?php if($row1){

                                    if($fetch1['courseCategory'] == 'Diploma Online')

                                    {        echo "selected='selected'";      }	}										     

                                        if($readonly) echo 'disabled=disabled'; 

                                ?>>Diploma Online</option>
							 
							 <option  <?php if($row1){

                                    if($fetch1['courseCategory'] == 'Certificate Programme/ITI Online')

                                    {        echo "selected='selected'";      }	}										     

                                        if($readonly) echo 'disabled=disabled'; 

                                ?>>Certificate Programme/ITI Online</option>
							 
							 <option  <?php if($row1){

                                    if($fetch1['courseCategory'] == 'Certificate Programme/ITI Offline')

                                    {        echo "selected='selected'";      }	}										     

                                        if($readonly) echo 'disabled=disabled'; 

                                ?>>Certificate Programme/ITI Offline</option>
							 
							 <option  <?php if($row1){

                                    if($fetch1['courseCategory'] == 'Short Term Vocational Online')

                                    {        echo "selected='selected'";      }	}										     

                                        if($readonly) echo 'disabled=disabled'; 

                                ?>>Short Term Vocational Online</option>
							 
							 <option  <?php if($row1){

                                    if($fetch1['courseCategory'] == 'Short Term Vocational Offline')

                                    {        echo "selected='selected'";      }	}										     

                                        if($readonly) echo 'disabled=disabled'; 

                                ?>>Short Term Vocational Offline</option>
							 
							  <option  <?php if($row1){

                                    if($fetch1['courseCategory'] == 'Other')

                                    {        echo "selected='selected'";      }	}										     

                                        if($readonly) echo 'disabled=disabled'; 

                                ?>>Other</option>
							 
							  </select>



                                <input id="otherCourse" name="otherCourse"  size="17" type="text" hidden="true"

                                                        value="<?php if($row1) { echo $fetch1['otherCourse']; } ?>" 

                                                        <?php if($readonly) {echo 'readonly=readonly';?>hidden="false" <?php } 

                                                        if($row1 && $fetch1['courseCategory']=='Other') {echo "style='display: block'";} 

                                                           ?>>

                            </td>

                    </tr>
                  <?php } ?>

                  <?php if($otherloans=='No')   
						   {?>
                    <tr>

                            <td>When loan is required?</td>

                            <td>:</td>

                            <td>

                            <select  id="loanMonth" name="loanMonth" size="1">

                            <option >Select</option>

                            <option  <?php if($row1){

                                    if($fetch1['loanMonth'] == 'January')

                                    {        echo "selected='selected'";      }	}										     

                                        if($readonly) echo 'disabled=disabled'; 

                                ?>>January</option>



                            <option  <?php if($row1){

                                    if($fetch1['loanMonth'] == 'February')

                                    {        echo "selected='selected'";      }	}										     

                                        if($readonly) echo 'disabled=disabled'; 

                                ?>>February</option>



                            <option  <?php if($row1){

                                    if($fetch1['loanMonth'] == 'March')

                                    {        echo "selected='selected'";      }	}										     

                                        if($readonly) echo 'disabled=disabled'; 

                                ?>>March</option>



                            <option  <?php if($row1){

                                    if($fetch1['loanMonth'] == 'April')

                                    {        echo "selected='selected'";      }	}										     

                                        if($readonly) echo 'disabled=disabled'; 

                                ?>>April</option>



                            <option  <?php if($row1){

                                    if($fetch1['loanMonth'] == 'May')

                                    {        echo "selected='selected'";      }	}										     

                                        if($readonly) echo 'disabled=disabled'; 

                                ?>>May</option>

							

                            <option  <?php if($row1){

                                    if($fetch1['loanMonth'] == 'June')

                                    {        echo "selected='selected'";      }	}										     

                                        if($readonly) echo 'disabled=disabled'; 

                                ?>>June</option>



                            <option  <?php if($row1){

                                    if($fetch1['loanMonth'] == 'July')

                                    {        echo "selected='selected'";      }	}										     

                                        if($readonly) echo 'disabled=disabled'; 

                                ?>>July</option>

                            <option  <?php if($row1){

                                    if($fetch1['loanMonth'] == 'August')

                                    {        echo "selected='selected'";      }	}										     

                                        if($readonly) echo 'disabled=disabled'; 

                                ?>>August</option>



                            <option  <?php if($row1){

                                    if($fetch1['loanMonth'] == 'September')

                                    {        echo "selected='selected'";      }	}										     

                                    if($readonly) echo 'disabled=disabled'; 

                                ?>>September</option>



                            <option  <?php if($row1){

                                    if($fetch1['loanMonth'] == 'October')

                                    {        echo "selected='selected'";      }	}										     

                                        if($readonly) echo 'disabled=disabled'; 

                                ?>>October</option>



                            <option  <?php if($row1){

                                    if($fetch1['loanMonth'] == 'November')

                                    {        echo "selected='selected'";      }	}										     

                                        if($readonly) echo 'disabled=disabled'; 

                                ?>>November</option>



                            <option  <?php if($row1){

                                    if($fetch1['loanMonth'] == 'December')

                                    {        echo "selected='selected'";      }	}										     

                                        if($readonly) echo 'disabled=disabled'; 

                                ?>>December</option>

                            </select>

							

                            <input id="loanYear1" name="loanYear1" type="text" readonly="readonly" size="6"

                                value="<?php if($row1) { echo $fetch1['loanYear']; } ?>">



                            <select id="loanYear" name="loanYear" size="1" disabled="disabled"

                                    <?php if($readonly) echo 'readonly=readonly';  ?>></select> 

                            <script type="text/javascript">OnLoadLoanYear('loanYear');</script>

                            

                            <input type="button" name="btnChangeYear" value="change LoanYear" onclick="enableddissabledloanYear(this);" >

                            </td>

                    </tr>
				   <?php } ?>
                    <tr>  
					<?php if($otherloans=='No')   
						   {?>

                            <td>Due Date of Fees(if any)</td>
						     <?php  } else { ?>
							 
                            <td>Due Date of Invoice(if any)</td>
						    <?php  } ?>
                            <td>:</td>

                            <td>

                            <input id="datepicker2" name="datepicker2" size="40" type="text" 

                                    value="<?php if($row1) { $originaldate=  $fetch1['duedate']; 

                                    $newdate=date("d-m-Y",strtotime($originaldate));

                                    echo $newdate; } ?>"

                                    <?php if($readonly) echo 'readonly=readonly'; ?>></td>

                    </tr>

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
							value="<?php if($row1){ if($fetch1['totalfees']!=''){ echo $fetch1['totalfees']; } else { echo "0"; } }  ?>"

                                    <?php if($readonly) echo 'readonly=readonly'; 

                                               ?> onchange="subtractionoftwofields('totalfees','amount','SelfContribution')"  
												onclick="additionoftwofields('SelfContribution','amount','totalfees')"   onfocus="additionoftwofields('SelfContribution','amount','totalfees')" ></td>


                    </tr>



                    <tr>

                            <td>Loan Amount (in Rupees)</td>

                            <td>:</td>

                            <td>

                            <input id="amount" maxlength="7"  name="amount" readonly="readonly"  size="40" type="text"

                                value="<?php if($row1) { echo $fetch1['amount']; } ?>"

                                    <?php if($readonly) echo 'readonly=readonly'; 

                                                ?> onclick="subtractionoftwofields('totalfees','SelfContribution','amount')" onfocus="subtractionoftwofields('totalfees','SelfContribution','amount')" ></td>

                    </tr>
					<tr>

                            <td>Self Contribution/Margin money</td>

                            <td>:</td>

                            <td>

                            <input id="SelfContribution" maxlength="6" name="SelfContribution" size="40" type="text"  
							value="<?php if($row1){ if($fetch1['SelfContribution']!=''){ echo $fetch1['SelfContribution']; } else { echo "0"; } }  ?>"

                                    <?php if($readonly) echo 'readonly=readonly'; 

                                                ?>  onchange="subtractionoftwofields('totalfees','SelfContribution','amount')" onclick="subtractionoftwofields('totalfees','amount','SelfContribution')"  onfocus="subtractionoftwofields('totalfees','amount','SelfContribution')" ></td>


                    </tr>
						<tr><td><input type="hidden" maxlength="6"  id="loantype" name="loantype" value="<?php echo $fetch['loantype'];?>"></td></tr>
										
			 <?php if($otherloans!='No')   
			   {
							   
				    if($fetch['typeofLoan']=='Consumer Finance'|| $fetch['typeofLoan']=='Home Improvement') 
				   {   ?>
				   <tr>

                            <td>Asset Type</td>

                            <td>:</td>

                            <td> 
								<select id="AssetType"  name="AssetType" size="1" onchange="">
								<option> Select</option>
                          <?php
						  
						 

						  
						  $tablename='consumerloans_categories';
						  $cloumnname='name';
						  $arrvalue=$fetch['AssetType'];
						  
                          $objCommon->getoptionsfromdbchecked($tablename,$cloumnname,$arrvalue);
						?></select></td>

								 </select>
							 </td>
						</tr>
						<tr>

                            <td>Asset Name</td>

                            <td>:</td>

                            <td> 
						       <input type="text" maxlength="50" size="40"  id="AssetName" name="AssetName" value="<?php echo $fetch['AssetName'];?>">
						   
					        </td>
					   
					   </tr>
					   
					   <tr>

                            <td>Asset Brand</td>

                            <td>:</td>

                            <td> 
						       <input type="text" maxlength="50" size="40"  id="AssetBrand" name="AssetBrand" value="<?php echo $fetch['AssetBrand'];?>">
						   
					        </td>
					   
					   </tr>
						   <?php  }  ?>
					
					
						 

					
					<tr>

                            <td>Loan Type</td>

                            <td>:</td>

                            <td> 
							<select id="typeofLoan"  name="typeofLoan"  size="1"

                                    <?php if($readonly) echo 'disabled=disabled'; 

                                ?> onchange="return onchangetypeofLoan(this);">

                            <option value="" >Select</option>

                            <option <?php 

                                    if($fetch['typeofLoan'] == 'Vehicle Finance')

                                    {        echo "selected='selected'";      }										     

                                    ?> >Vehicle Finance</option>



                           <option <?php 

                                    if($fetch['typeofLoan'] == 'Livelihood Loan')

                                    {        echo "selected='selected'";      }										     

                                    ?> >Livelihood Loan</option>
									
									<option <?php 

                                    if($fetch['typeofLoan'] == 'SME Loans')

                                    {        echo "selected='selected'";      }										     

                                    ?> >SME Loans</option>
								 <option <?php 

                                    if($fetch['typeofLoan'] == 'Higher Education')

                                    {        echo "selected='selected'";      }										     

                                    ?> >Higher Education</option>
									 <option <?php 

                                    if($fetch['typeofLoan'] == 'Home Improvement')

                                    {        echo "selected='selected'";      }										     

                                    ?> >Home Improvement</option>
									 <option <?php 

                                    if($fetch['typeofLoan'] == 'Consumer Finance')

                                    {        echo "selected='selected'";      }										     

                                    ?> >Consumer Finance</option>
                            </select>


                           </td></tr>
						
							 <?php if($fetch['typeofLoan'] == 'Vehicle Finance') { ?>
							<tr>

                            <td>Vehicle Type</td>

                            <td>:</td>

                            <td> 
							<select id="vehicleloanType" name="vehicleloanType" size="1"

                                   <?php if($fetch['typeofLoan'] != 'Vehicle Finance') { ?> disabled='disabled'  <?php } ?>
								   <?php if($readonly) echo 'disabled=disabled'; 

                                ?>>

                            <option value="" >Select</option>

                            <option <?php 

                                    if($fetch['vehicleloanType'] == 'E rickshaw')

                                    {        echo "selected='selected'";      }										     

                                    ?> >E rickshaw</option>
									
							 <option <?php 

                                    if($fetch['vehicleloanType'] == 'Two Wheeler')

                                    {        echo "selected='selected'";      }										     

                                    ?> >Two Wheeler</option>



                           <option <?php 

                                    if($fetch['vehicleloanType'] == 'Others')

                                    {        echo "selected='selected'";      }										     

                                    ?> >Others</option>
									
									
                            </select>


                           </td></tr>
			   <?php } } ?>
                   


                      <?php if($otherloans=='No')   
						   {?>

                    <tr>

                            <td>Course Duration</td>

                            <td>:</td>

                            <td>

                            <input id="duration" name="duration" size="20" type="text" maxlength="2"

                            value="<?php if($row1) { echo $fetch1['duration']; } ?>"  

                            <?php if($readonly) echo 'readonly=readonly'; 

                                                ?>>

                                                              

                                 

                            <select id="DurationIn" name="DurationIn" size="1" 

                                            <?php if($readonly) echo 'disabled=disabled'; 

                                        ?>>

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

                
						   <?php } ?>
                <tr>

                        <td>Is Applicant Working ?</td>

                        <td>:</td>

                        <td>

                                <input id="workYes" name="work" type="radio" value="Yes" onclick="onSelectedAppEmployment(this,false)" 

                                <?php if($row){

                                        if($fetch['appworking'] == 'Yes')

                                        {        echo "checked='checked'";      }	}



                                            if($readonly) echo 'disabled=disabled'; 

                                    ?>>Yes



                                <input id="workNo" name="work" type="radio" value="No" onclick="onSelectedAppEmployment(this,true)" 

                                <?php if($row){

                                        if($fetch['appworking'] == 'No')

                                        {        echo "checked='checked'";      }	}



                                            if($readonly) echo 'disabled=disabled'; 

                                    ?> <?php if($fetch['typeofLoan']=='Consumer Finance'|| $fetch['typeofLoan']=='Home Improvement') {?> disabled='disabled' <?php } ?>>No</td>

        </tr>

        <tr><td colspan="3">

           <div id="AppWork_panel" name="AppWork_panel"  <?php if($row){

                                        if($fetch['appworking'] == 'No')

		                                  {  ?> style="display:none"  <?php } } ?> >

             <table>

                <tr>

                        <td>Type of Employment</td>

                        <td>:</td>

                        <td>

                            <select <?php if($row){

                                    if($fetch['appworking'] == 'No')

                                    {     echo "disabled='disabled'"; }   }	                                                               

                                    ?>

                                     id="employment" name="employment" size="1" 

                                    <?php if($readonly) echo 'disabled=disabled'; ?> onchange="return onSelectedIndexChange(this,'employment_other')">

                                <option >Select</option>

                               <option <?php if($row){

                            if($fetch['employment'] == 'EX-Govt Employee')

                            {        echo "selected='selected'";      }	}										     

                                ?>>EX-Govt Employee</option>
								
								<option <?php if($row){

                            if($fetch['employment'] == 'EX-Private Employee')

                            {        echo "selected='selected'";      }	}										     

                                ?>>EX-Private Employee</option>
								<option <?php if($row){

                            if($fetch['employment'] == 'Business')

                            {        echo "selected='selected'";      }	}										     

                                ?>>Business</option>

                    <option <?php if($row){

                            if($fetch['employment'] == 'Salaried')

                            {        echo "selected='selected'";      }	}										     

                                ?>>Salaried</option>

                    <option <?php if($row){

                            if($fetch['employment'] == 'Self Employed')

                            {        echo "selected='selected'";      }	}										     

                                ?>>Self Employed</option>
								<option <?php if($row){

                            if($fetch['employment'] == 'Pensioner')

                            {        echo "selected='selected'";      }	}										     

                                ?>>Pensioner</option>
								<option <?php if($row){

                            if($fetch['employment'] == 'Agriculture')

                            {        echo "selected='selected'";      }	}										     

                                ?>>Agriculture</option>
								<option <?php if($row){

                            if($fetch['employment'] == 'Rental Income')

                            {        echo "selected='selected'";      }	}										     

                                ?>>Rental Income</option>
								
								<option <?php if($row){

                            if($fetch['employment'] == 'Other')

                            {        echo "selected='selected'";      }	}										     

                                ?>>Other</option>

                            </select>
							<select id="employment_other" name="employment_other" size="1" 

                                        <?php if($readonly) echo 'disabled=disabled'; 

                                        if($row){if($fetch['employment']!='Other') echo "disabled='disabled'"; }?> >

                                        <option >Select</option>
                                      <?php 
									  
									  
									  $tablename='other_typeofemployment_list';
									  $cloumnname='employment';
									  $arrvalue=$fetch['employment_other'];
									  
									  
									$objCommon->getoptionsfromdbchecked($tablename,$cloumnname,$arrvalue);
									  
									  
									  ?></select>
                                        

                        </td>

                </tr>

                <tr>

                        <td>Name of the Company</td>

                        <td>:</td>

                        <td>

                        <input <?php if($row){

                                if($fetch['appworking'] == 'No')

                                {     echo "disabled='disabled'"; }   }	                                                               

                                    ?>

                            id="business" name="business"  maxlength="150" size="40" type="text" 

                                value="<?php if($row) { echo $fetch['business']; } ?>"

                                <?php if($readonly) echo 'readonly=readonly'; 

                                            ?>></td>

                </tr>

                <tr>

                        <td>Designation</td>

                        <td>:</td>

                        <td>

                        <input 

                            <?php if($row){

                                if($fetch['appworking'] == 'No')

                                {     echo "disabled='disabled'"; }   }	                                                               

                                   ?>

                            id="designation"  maxlength="50" name="designation" size="40" type="text"  

                                value="<?php if($row) { echo $fetch['designation']; } ?>"

                                <?php if($readonly) echo 'readonly=readonly'; 

                                            ?>></td>

                </tr>
				<tr>

                            <td>Years in Current Employment</td>

                            <td>:</td>

                            <td>

                            <select id="yearsInEmployement"  <?php if($row){

                                if($fetch['appworking'] == 'No')

                                {     echo "disabled='disabled'"; }   }	                                                               

                                    ?>name="yearsInEmployement" size="1" <?php if($readonly) echo 'disabled=disabled'; ?>>

                            <option selected="selected">Select</option>
							<option <?php if($row){

											 
							            if($fetch['yearsInEmployement'] == '<1') { echo 'selected=selected'; } }  ?>><1</option>
							
							<option <?php if($row){

											 
							            if($fetch['yearsInEmployement'] == 1) { echo 'selected=selected'; } }  ?>>1</option>
							
											<option <?php if($row){

									    if($fetch['yearsInEmployement'] == 2) { echo 'selected=selected'; } }?>>2</option>
											<option <?php if($row){

									    if($fetch['yearsInEmployement'] == 3) { echo 'selected=selected'; } } ?>>3</option>
											<option <?php if($row){

										if($fetch['yearsInEmployement'] == 4) { echo 'selected=selected'; } }  ?>>4</option>
											<option <?php if($row){

								        if($fetch['yearsInEmployement'] == 5) { echo 'selected=selected';  } } ?>>5</option>
											<option <?php if($row){

										if($fetch['yearsInEmployement'] == 6) { echo 'selected=selected';  } } ?>>6</option>
											<option <?php if($row){

										if($fetch['yearsInEmployement'] == 7) { echo 'selected=selected'; } } ?>>7</option>
											<option <?php if($row){

										if($fetch['yearsInEmployement'] == 8) { echo 'selected=selected'; } } ?>>8</option>
											<option <?php if($row){

										if($fetch['yearsInEmployement'] == 9) { echo 'selected=selected';  } } ?>>9</option>
											<option <?php if($row){

										if($fetch['yearsInEmployement'] == 10) { echo 'selected=selected';  } } ?>>10</option>
										
										
										<option <?php if($row){

											 
							            if($fetch['yearsInEmployement'] == 11) { echo 'selected=selected'; } }  ?>>11</option>
							
											<option <?php if($row){

									    if($fetch['yearsInEmployement'] == 12) { echo 'selected=selected'; } }?>>12</option>
											<option <?php if($row){

									    if($fetch['yearsInEmployement'] == 13) { echo 'selected=selected'; } } ?>>13</option>
											<option <?php if($row){

										if($fetch['yearsInEmployement'] == 14) { echo 'selected=selected'; } }  ?>>14</option>
											<option <?php if($row){

								        if($fetch['yearsInEmployement'] == 15) { echo 'selected=selected';  } } ?>>15</option>
										

                                  <option <?php if($row){

                                if($fetch['yearsInEmployement'] == '>15')

                                {        echo "selected='selected'";      }	}										     

                                    ?>>>15</option>

                          

                            </select>
							</td>

                    </tr>

                <tr>

                        <td>Gross Monthly Income</td>

                        <td>:</td>

                        <td><input  maxlength="5"   id="income" name="income" size="40"
					        	
								<?php if($row){

                                if($fetch['appworking'] == 'No')

                                {     echo "disabled='disabled'"; }   }	                                                               

                                    ?>
                                        value="<?php if($row) { echo $income; } ?>" 
                                                            <?php if($readonly) echo 'disabled=disabled'; 

                                                                            ?>></td>

                </tr>

                <tr>

                        <td>Average Monthly Bank Balance for Last 3 months</td>

                        <td>:</td>

                        <td>

                        <input <?php if($row){

                                if($fetch['appworking'] == 'No')

                                {     echo "disabled='disabled'"; }   }	                                                               

                                    ?>

                            id="bankbal" maxlength="6" name="bankbal" size="40" type="text" 

                                value="<?php if($row) { echo $fetch['bankbal']; } ?>"

                                        <?php if($readonly) echo 'readonly=readonly'; 

                                            ?>></td>

                </tr>
                 <tr>

                        <td>Address</td>

                        <td>:</td>

                        <td>

                        <input <?php if($row){

                                if($fetch['appworking'] == 'No')

                                {     echo "disabled='disabled'"; }   }	                                                               

                                    ?> id="Empaddress" maxlength="45" name="Empaddress" size="40" type="text"

                        value="<?php if($row) { echo $fetch['Empaddress']; } ?>"

                                <?php if($readonly) echo 'readonly=readonly'; 

                                            ?>></td>

                </tr>

                <tr>

                        <td>Street1</td>

                        <td>:</td>

                        <td>

                        <input <?php if($row){

                                if($fetch['appworking'] == 'No')

                                {     echo "disabled='disabled'"; }   }	                                                               

                                    ?>

                            id="Empstreet1" maxlength="45" name="Empstreet1" size="40" type="text" 

                        value="<?php if($row) { echo $fetch['Empstreet1']; } ?>"

                        <?php if($readonly) echo 'readonly=readonly'; 

                                            ?>></td>

                </tr>

                <tr>

                        <td>Street2 (optional)</td>

                        <td>:</td>

                        <td>

                        <input <?php if($row){

                                if($fetch['appworking'] == 'No')

                                {     echo "disabled='disabled'"; }   }	                                                               

                                  ?>

                           id="Empstreet2" maxlength="45" name="Empstreet2" size="40" type="text" 

                        value="<?php if($row) { echo $fetch['Empstreet2']; } ?>"

                                <?php if($readonly) echo 'readonly=readonly'; 

                                            ?>>&nbsp;

                        

                        </td>

                </tr>

                <tr>

                        <td>State</td>

                        <td>:</td>

                        <td>

                            <input id="EmpcountrySelect1" name="Empcountry1" size="20" type="text" onChange="changeState(this,'EmpcountrySelect1','EmpstateSelect1','EmpcitySelect1','EmpcountrySelect','EmpstateSelect','EmpcitySelect');" 

                                    value="<?php if($row) { echo $fetch['Empcountry']; } ?>" 
									
									<?php if($row){

                                if($fetch['appworking'] == 'No')

                                {     echo "disabled='disabled'"; }   }	                                                               

                                    ?>

                                    <?php if($readonly) echo 'readonly=readonly'; 

                                            ?>>

                            <select id="EmpcountrySelect" style="display:none" disabled="disabled" name="Empcountry" onchange="populateState('EmpcountrySelect','EmpstateSelect'); populateCity('EmpcountrySelect','EmpcitySelect')"

                                <?php if($row){

                                if($fetch['appworking'] == 'No' )

                                

                                { echo  'disabled="disabled"'; }  }	                                                               

                                    ?> size="1">

                        </select>

                        </td>

                </tr>

                <tr>

                        <td>District</td>

                        <td>:</td>

                        <td>

                            <input id="EmpstateSelect1"  name="Empstate1" size="20"  type="text" onChange="changeState(this,'EmpcountrySelect1','EmpstateSelect1','EmpcitySelect1','EmpcountrySelect','EmpstateSelect','EmpcitySelect');" 

                            value="<?php if($row) { echo $fetch['Empstate']; } ?>"  

                            <?php if($readonly) echo 'readonly=readonly'; ?>
							<?php if($row){

                                if($fetch['appworking'] == 'No')

                                {     echo "disabled='disabled'"; }   }	                                                               

                                    ?>>



                            <select id="EmpstateSelect" style="display:none" disabled="disabled" name="Empstate" size="1" <?php if($row){

                                if($fetch['appworking'] == 'No')

                                {     echo "disabled='disabled'"; }   }	                                                               

                                    ?>>

                        </select>



                            <script type="text/javascript">initCountry('','EmpcountrySelect','EmpstateSelect','EmpcitySelect');</script>

                        </td>

                </tr>

                <tr>

                        <td>City</td>

                        <td>:</td>

                        <td>

                        <input id="EmpcitySelect1" name="Empcity1" size="20" type="text" onChange="changeState(this,'EmpcountrySelect1','EmpstateSelect1','EmpcitySelect1','EmpcountrySelect','EmpstateSelect','EmpcitySelect');" 

                            value="<?php if($row) { echo $fetch['Empcity']; } ?>" 

                            <?php if($readonly) echo 'readonly=readonly'; ?>
							<?php if($row){

                                if($fetch['appworking'] == 'No')

                                {     echo "disabled='disabled'"; }   }	                                                               

                                    ?>>

                        <select id="EmpcitySelect" style="display:none" disabled="disabled" name="Empcity" size="1" <?php if($row){

                                if($fetch['appworking'] == 'No')

                                {     echo "disabled='disabled'"; }   }	                                                               

                                    ?>>

                        </select>

                        <script type="text/javascript">initCountry('','EmpcountrySelect','EmpstateSelect','EmpcitySelect');</script>

                        </td>

                </tr>



                <tr>

                        <td>Pincode</td>

                        <td>:</td>

                        <td>

                        <input <?php if($row){

                                if($fetch['appworking'] == 'No')

                                {     echo "disabled='disabled'"; }   }	                                                               

                                   ?>

                            id="Emppincode" maxlength="6" name="Emppincode" size="40" type="text" 

                                value="<?php if($row) { echo $fetch['Emppincode']; } ?>"

                                        <?php if($readonly) echo 'readonly=readonly'; 

                                            ?>></td>

                </tr>

                <tr>

                        <td>Phone No.</td>

                        <td>:</td>

                        <td>

                        <input <?php if($row){

                                if($fetch['appworking'] == 'No')

                                {     echo "disabled='disabled'"; }   }	                                                               

                                    ?>id="Empstdcode" maxlength="6"  placeholder="STD Code" name="Empstdcode" size="10" type="text"  value="<?php if($row) { echo $fetch['Empstdcode']; } ?>"

                                            <?php if($readonly) echo 'readonly=readonly'; 

                                                        ?>>

                                    <input <?php if($row){

                                            if($fetch['appworking'] == 'No')

                                            {     echo "disabled='disabled'"; }   }	                                                               

                                               ?>id="Empphone"  placeholder="Enter 8 digits"  maxlength="8" name="Empphone" size="24" type="text"

                                            value="<?php if($row) { echo $fetch['Empphone']; } ?>"

                                            <?php if($readonly) echo 'readonly=readonly'; 

                                                        ?>>

                        </td>

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

                            <input id="assets1" name="assets" type="radio" value="Yes" 
							<?php
							if($row11){ if($assets_investments == 'Yes'){ echo "checked='checked'"; } } ?>
							
							 <?php if($readonly) echo  'disabled="disabled"'; ?> 
							
							onClick="showAssetspanel('typeofassets','typeofassets1','assets2','totAssets','totAssets1','totAssets2')">Yes

                            <input id="assets"   name="assets" type="radio" value="No" <?php if($assets_investments == 'No'){ echo "checked"; }  ?>
							 <?php if($readonly) echo  'disabled="disabled"'; ?> 
							 onClick="disableAssetspanel('typeofassets','typeofassets1','assets2','totAssets','totAssets1','totAssets2')">No</td>

                    </tr>
					
					
					<tr>
					
					    <td id="typeofassets" <?php if($assets_investments == 'No') { ?> style="display:none" <?php } ?>valign="top"></td>
						<td  id="typeofassets1" <?php if($assets_investments == 'No') { ?> style="display:none" <?php } ?>  valign="top"></td></tr><tr>
					    <td><div id="assets2" <?php if($assets_investments == 'No') { ?> style="display:none" <?php } ?>>
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

                                            <input  id="immovableProperty" 
											
											<?php if($row11){ if($fetch_assets['immovablePropertyvalue'] > 0){ echo "checked='checked'"; } } ?>  

                                             <?php if($readonly) echo  'disabled="disabled"'; ?> 
											 name="immovableProperty"  type="checkbox" onClick="return  onTypeofAssetsChecked('immovableProperty','immovablePropertyvalue','immovablePropertyCollateral')">Immovable Property</td>
											 

                                            <td>

                                            <input maxlength="10"   name="immovablePropertyvalue" id="immovablePropertyvalue" 
										
                                                onkeyup="allowonlynumeric(this)" onClick="return  removeStartingZero(this)"    onClick="return  removeStartingZero(this)"
											value="<?php if($row11){  
											
											echo $fetch_assets['immovablePropertyvalue']; 
											} 
                                             else {
											 
											 echo '0'; } ?>"
											<?php if($assets_investments == 'No')

                                                  { ?>disabled="disabled" <?php }?> 

                                             <?php if($readonly) echo  'disabled="disabled"'; ?>onchange="calculateTotalAssetsAmount('totAssets','immovablePropertyvalue','governmentsecuritiesvalue','insurancepoliciesvalue','chits_kurisvalue','sharesvalue','MFsvalue','debenturesvalue','BankFixedDepositsvalue','ProvidentFundvalue',
										  'GoldOrnamentsvalue','VehiclesSelfOwnedvalue','OtherAssetsvalue')"  type="text"></td>

                                            <td align="center">

                                            <input  type="checkbox" value="yes"  onclick="CheckAsssetsAmountEntered('immovablePropertyvalue',this)"
											<?php
							            if($row11){ 
										
										if($fetch_assets['immovablePropertyCollateral'] == 'yes')
										{
										
										          echo "checked"; 
										 } 
										 elseif($fetch_assets['immovablePropertyvalue'] == 0) {
										 
										         echo 'disabled=disabled';
                                               }

										 }  ?><?php if($assets_investments == 'No')

                                                  { echo 'disabled=disabled'; 

											  } ?> 

                                             <?php if($readonly)  echo  'disabled="disabled"'; ?>name="immovablePropertyCollateral"id="immovablePropertyCollateral"></td>

                                    </tr>

                                    <tr>

                                            <td>

                                            <input 
											<?php if($row11){ if($fetch_assets['governmentsecuritiesvalue'] > 0){ echo "checked"; } } ?>  

                                             <?php if($readonly) echo  'disabled="disabled"'; ?> id="governmentsecurities" name="governmentsecurities"  type="checkbox" onClick="return  onTypeofAssetsChecked('governmentsecurities','governmentsecuritiesvalue','governmentsecuritiesCollateral')">Investment in government securities</td>

                                            <td>

                                            <input maxlength="10"  onkeyup="allowonlynumeric(this)" onClick="return  removeStartingZero(this)"  value="<?php if($row11){  
											
											echo $fetch_assets['governmentsecuritiesvalue']; 
											} 
                                             else {
											 
											echo '0'; } ?>"
											<?php if($assets_investments == 'No')

                                                  { ?>disabled="disabled" <?php }?> 

                                             <?php if($readonly) echo  'disabled="disabled"'; ?>name="governmentsecuritiesvalue"  id="governmentsecuritiesvalue"  onchange="calculateTotalAssetsAmount('totAssets','immovablePropertyvalue','governmentsecuritiesvalue','insurancepoliciesvalue','chits_kurisvalue','sharesvalue','MFsvalue','debenturesvalue','BankFixedDepositsvalue','ProvidentFundvalue',
										  'GoldOrnamentsvalue','VehiclesSelfOwnedvalue','OtherAssetsvalue')" type="text"></td>
										  

                                            <td align="center">

                                            <input  type="checkbox" value="yes"  onclick="CheckAsssetsAmountEntered('governmentsecuritiesvalue',this)"
											<?php
							            if($row11){ 
										
										if($fetch_assets['governmentsecuritiesCollateral'] == 'yes')
										{
										
										          echo "checked"; 
										 } 
										 elseif($fetch_assets['governmentsecuritiesvalue'] == 0)  {
										 
										         echo 'disabled=disabled';
                                               }

										 }  ?><?php if($assets_investments == 'No')

                                                  { echo 'disabled=disabled'; 

												  } ?> 

                                             <?php if($readonly)  echo  'disabled="disabled"'; ?> name="governmentsecuritiesCollateral" id="governmentsecuritiesCollateral"></td>

                                    </tr>
									 <tr>

                                            <td>
                                            <input <?php if($row11){ if($fetch_assets['insurancepoliciesvalue'] > 0){ echo "checked"; } } ?>  

                                             <?php if($readonly) echo  'disabled="disabled"'; ?> id="insurancepolicies" name="insurancepolicies"  type="checkbox" onClick="return  onTypeofAssetsChecked('insurancepolicies','insurancepoliciesvalue','insurancepoliciesCollateral')">Investment in insurance policies</td>

                                            <td>

                                            <input maxlength="10"    onkeyup="allowonlynumeric(this)" onClick="return  removeStartingZero(this)"     value="<?php if($row11){  
											
											echo $fetch_assets['insurancepoliciesvalue']; 
											} 
                                             else {
											 
											 echo '0'; } ?>"
											<?php if($assets_investments == 'No')

                                                  { ?> disabled="disabled" <?php }?> 

                                             <?php if($readonly) echo  'disabled="disabled"'; ?> name="insurancepoliciesvalue" id="insurancepoliciesvalue" onchange="calculateTotalAssetsAmount('totAssets','immovablePropertyvalue','governmentsecuritiesvalue','insurancepoliciesvalue','chits_kurisvalue','sharesvalue','MFsvalue','debenturesvalue','BankFixedDepositsvalue','ProvidentFundvalue',
										  'GoldOrnamentsvalue','VehiclesSelfOwnedvalue','OtherAssetsvalue')"  type="text"></td>

                                            <td align="center">

                                            <input type="checkbox" value="yes" onclick="CheckAsssetsAmountEntered('insurancepoliciesvalue',this)" <?php
							            if($row11){ 
										
										if($fetch_assets['insurancepoliciesCollateral'] == 'yes')
										{
										
										          echo "checked"; 
										 } 
										 elseif($fetch_assets['insurancepoliciesvalue'] == 0) {
										 
										         echo 'disabled=disabled';
                                               }

										 }  ?><?php if($assets_investments == 'No')

                                                  { echo 'disabled=disabled'; 

												  } ?> 

                                             <?php if($readonly)  echo  'disabled="disabled"'; ?> name="insurancepoliciesCollateral" id="insurancepoliciesCollateral"></td>

                                    </tr>
									 <tr>

                                            <td>


                                            <input <?php if($row11){ if($fetch_assets['chits_kurisvalue'] > 0){ echo "checked"; } } ?>  

                                             <?php if($readonly) echo  'disabled="disabled"'; ?> id="chits_kuris" name="chits_kuris"  type="checkbox" onClick="return  onTypeofAssetsChecked('chits_kuris','chits_kurisvalue','chits_kurisCollateral')">Investment in chits & kuris</td>

                                            <td>

                                            <input   maxlength="10"    onkeyup="allowonlynumeric(this)" onClick="return  removeStartingZero(this)"    value="<?php if($row11){  
											
											echo $fetch_assets['chits_kurisvalue']; 
											} 
                                             else {
											 
											 echo '0'; } ?>"
											<?php if($assets_investments == 'No')

                                                  { ?>disabled="disabled" <?php }?> 

                                             <?php if($readonly) echo  'disabled="disabled"'; ?> name="chits_kurisvalue" onchange="calculateTotalAssetsAmount('totAssets','immovablePropertyvalue','governmentsecuritiesvalue','insurancepoliciesvalue','chits_kurisvalue','sharesvalue','MFsvalue','debenturesvalue','BankFixedDepositsvalue','ProvidentFundvalue',
										  'GoldOrnamentsvalue','VehiclesSelfOwnedvalue','OtherAssetsvalue')"id="chits_kurisvalue"  type="text"></td>

                                            <td align="center">

                                            <input type="checkbox" value="yes"  onclick="CheckAsssetsAmountEntered('chits_kurisvalue',this)" <?php
							            if($row11){ 
										
										if($fetch_assets['chits_kurisCollateral'] == 'yes')
										{
										
										          echo "checked"; 
										 } 
										 elseif($fetch_assets['chits_kurisvalue'] == 0) {
										         echo 'disabled=disabled';
                                               }

										 }  ?><?php if($assets_investments == 'No')

                                                  { echo 'disabled=disabled'; 

												  } ?> 

                                             <?php if($readonly)  echo  'disabled="disabled"'; ?> name="chits_kurisCollateral" id="chits_kurisCollateral"></td>

                                    </tr>
									 <tr>

                                            <td>

                                            <input <?php if($row11){ if($fetch_assets['sharesvalue'] > 0){ echo "checked"; } } ?>  

                                             <?php if($readonly) echo  'disabled="disabled"'; ?> id="shares" name="shares"  type="checkbox" onClick="return  onTypeofAssetsChecked('shares','sharesvalue','sharesCollateral')">Investment in shares</td>

                                            <td>

                                            <input maxlength="10"    onkeyup="allowonlynumeric(this)" onClick="return  removeStartingZero(this)"    value="<?php if($row11){  
											
											echo $fetch_assets['sharesvalue']; 
											} 
                                             else {
											 
											 echo '0'; } ?>"
											<?php if($assets_investments == 'No')

                                                  { ?>disabled="disabled" <?php }?> 

                                             <?php if($readonly) echo  'disabled="disabled"'; ?> name="sharesvalue" onchange="calculateTotalAssetsAmount('totAssets','immovablePropertyvalue','governmentsecuritiesvalue','insurancepoliciesvalue','chits_kurisvalue','sharesvalue','MFsvalue','debenturesvalue','BankFixedDepositsvalue','ProvidentFundvalue',
										  'GoldOrnamentsvalue','VehiclesSelfOwnedvalue','OtherAssetsvalue')" id="sharesvalue"  type="text"></td>

                                            <td align="center">

                                            <input type="checkbox"  value="yes"  onclick="CheckAsssetsAmountEntered('sharesvalue',this)" <?php
							            if($row11){ 
										
										if($fetch_assets['sharesCollateral'] == 'yes')
										{
										
										          echo "checked"; 
										 } 
										 elseif($fetch_assets['sharesvalue'] == 0) {
										         echo 'disabled=disabled';
                                               }

										 }  ?> <?php if($assets_investments == 'No')

                                                  { echo 'disabled=disabled'; 

												  } ?> 

                                             <?php if($readonly)  echo  'disabled="disabled"'; ?> name="sharesCollateral" id="sharesCollateral"></td>

                                    </tr>
									 <tr>

                                            <td>

                                            <input <?php if($row11){ if($fetch_assets['MFsvalue'] > 0){ echo "checked"; } } ?>  

                                             <?php if($readonly) echo  'disabled="disabled"'; ?> id="MFs" name="MFs"  type="checkbox" onClick="return  onTypeofAssetsChecked('MFs','MFsvalue','MFsCollateral')">Investment in MFs</td>

                                            <td>

                                            <input maxlength="10"    onkeyup="allowonlynumeric(this)" onClick="return  removeStartingZero(this)"    value="<?php if($row11){  
											
											echo $fetch_assets['MFsvalue']; 
											} 
                                             else {
											 
											 echo '0'; } ?>"
											<?php if($assets_investments == 'No')

                                                  { ?>disabled="disabled" <?php }?> 

                                             <?php if($readonly) echo  'disabled="disabled"'; ?> onchange="calculateTotalAssetsAmount('totAssets','immovablePropertyvalue','governmentsecuritiesvalue','insurancepoliciesvalue','chits_kurisvalue','sharesvalue','MFsvalue','debenturesvalue','BankFixedDepositsvalue','ProvidentFundvalue',
										  'GoldOrnamentsvalue','VehiclesSelfOwnedvalue','OtherAssetsvalue')" name="MFsvalue" id="MFsvalue"   type="text"></td>

                                            <td align="center">

                                            <input type="checkbox" value="yes"  onclick="CheckAsssetsAmountEntered('MFsvalue',this)" <?php
							            if($row11){ 
										
										if($fetch_assets['MFsCollateral'] == 'yes')
										{
										
										          echo "checked"; 
										 } 
										  elseif($fetch_assets['MFsvalue'] == 0){
										         echo 'disabled=disabled';
                                               }

										 }  ?> <?php if($assets_investments == 'No')

                                                  { echo 'disabled=disabled'; 

												  } ?> 

                                             <?php if($readonly)  echo  'disabled="disabled"'; ?> name="MFsCollateral" id="MFsCollateral"></td>

                                    </tr>
									 <tr>

                                            <td>

                                            <input <?php if($row11){ if($fetch_assets['debenturesvalue'] > 0){ echo "checked"; } } ?>  

                                             <?php if($readonly) echo  'disabled="disabled"'; ?> id="debentures" name="debentures"  type="checkbox"onClick="return  onTypeofAssetsChecked('debentures','debenturesvalue','debenturesCollateral')">Investment in debentures</td>

                                            <td>

                                            <input maxlength="10"    onkeyup="allowonlynumeric(this)" onClick="return  removeStartingZero(this)"    value="<?php if($row11){  
											
											echo $fetch_assets['debenturesvalue']; 
											} 
                                             else {
											 
											 echo '0'; } ?>"
											<?php if($assets_investments == 'No')

                                                  { ?>disabled="disabled" <?php }?> 

                                             <?php if($readonly) echo  'disabled="disabled"'; ?> name="debenturesvalue" onchange="calculateTotalAssetsAmount('totAssets','immovablePropertyvalue','governmentsecuritiesvalue','insurancepoliciesvalue','chits_kurisvalue','sharesvalue','MFsvalue','debenturesvalue','BankFixedDepositsvalue','ProvidentFundvalue',
										  'GoldOrnamentsvalue','VehiclesSelfOwnedvalue','OtherAssetsvalue')" id="debenturesvalue"   type="text"></td>

                                            <td align="center">

                                            <input type="checkbox" value="yes" onclick="CheckAsssetsAmountEntered('debenturesvalue',this)" <?php
							            if($row11){ 
										
										if($fetch_assets['debenturesCollateral'] == 'yes')
										{
										
										          echo "checked"; 
										 } 
										 elseif($fetch_assets['debenturesvalue'] == 0) {
										         echo 'disabled=disabled';
                                               }

										 }  ?> <?php if($assets_investments == 'No')

                                                  { echo 'disabled=disabled'; 

												  } ?> 

                                             <?php if($readonly)  echo  'disabled="disabled"'; ?> name="debenturesCollateral" id="debenturesCollateral"></td>

                                    </tr>
									 <tr>

                                            <td>

                                            <input <?php if($row11){ if($fetch_assets['BankFixedDepositsvalue'] > 0){ echo "checked"; } } ?>  

                                             <?php if($readonly) echo  'disabled="disabled"'; ?> id="BankFixedDeposits" name="BankFixedDeposits"  type="checkbox" onClick="return  onTypeofAssetsChecked('BankFixedDeposits','BankFixedDepositsvalue','BankFixedDepositsCollateral')">Bank fixed deposits</td>

                                            <td>

                                            <input maxlength="10"    onkeyup="allowonlynumeric(this)" onClick="return  removeStartingZero(this)"    value="<?php if($row11){  
											
											echo $fetch_assets['BankFixedDepositsvalue']; 
											} 
                                             else {
											 
											 echo '0'; } ?>"
											<?php if($assets_investments == 'No')

                                                  { ?>disabled="disabled" <?php }?> 

                                             <?php if($readonly) echo  'disabled="disabled"'; ?> onchange="calculateTotalAssetsAmount('totAssets','immovablePropertyvalue','governmentsecuritiesvalue','insurancepoliciesvalue','chits_kurisvalue','sharesvalue','MFsvalue','debenturesvalue','BankFixedDepositsvalue','ProvidentFundvalue',
										  'GoldOrnamentsvalue','VehiclesSelfOwnedvalue','OtherAssetsvalue')" name="BankFixedDepositsvalue" id="BankFixedDepositsvalue"   type="text"></td>

                                            <td align="center">

                                            <input type="checkbox"  value="yes" onclick="CheckAsssetsAmountEntered('BankFixedDepositsvalue',this)" <?php
							            if($row11){ 
										
										if($fetch_assets['BankFixedDepositsCollateral'] == 'yes')
										{
										
										          echo "checked"; 
										 } 
										  elseif($fetch_assets['BankFixedDepositsvalue'] == 0) {
										         echo 'disabled=disabled';
                                               }

										 }  ?><?php if($assets_investments == 'No')

                                                  { echo 'disabled=disabled'; 

												  } ?> 

                                             <?php if($readonly)  echo  'disabled="disabled"'; ?> name="BankFixedDepositsCollateral" id="BankFixedDepositsCollateral"></td>

                                    </tr>
									 <tr>

                                            <td>

                                            <input <?php if($row11){ if($fetch_assets['ProvidentFundvalue'] > 0){ echo "checked"; } } ?>  

                                             <?php if($readonly) echo  'disabled="disabled"'; ?> id="ProvidentFund" name="ProvidentFund"  type="checkbox" onClick="return  onTypeofAssetsChecked('ProvidentFund','ProvidentFundvalue','ProvidentFundCollateral')">Provident Fund</td>

                                            <td>

                                            <input maxlength="10"    onkeyup="allowonlynumeric(this)" onClick="return  removeStartingZero(this)"    value="<?php if($row11){  
											
											echo $fetch_assets['ProvidentFundvalue']; 
											} 
                                             else {
											 
											 echo '0'; } ?>"
											<?php if($assets_investments == 'No')

                                                  { ?>disabled="disabled" <?php }?> 

                                             <?php if($readonly) echo  'disabled="disabled"'; ?> name="ProvidentFundvalue" onchange="calculateTotalAssetsAmount('totAssets','immovablePropertyvalue','governmentsecuritiesvalue','insurancepoliciesvalue','chits_kurisvalue','sharesvalue','MFsvalue','debenturesvalue','BankFixedDepositsvalue','ProvidentFundvalue',
										  'GoldOrnamentsvalue','VehiclesSelfOwnedvalue','OtherAssetsvalue')"  id="ProvidentFundvalue"   type="text"></td>

                                            <td align="center">

                                            <input type="checkbox" value="yes" onclick="CheckAsssetsAmountEntered('ProvidentFundvalue',this)" <?php
							            if($row11){ 
										
										if($fetch_assets['ProvidentFundCollateral'] == 'yes')
										{
										
										          echo "checked"; 
										 } 
										 elseif($fetch_assets['ProvidentFundvalue'] == 0) {
										         echo 'disabled=disabled';
                                               }

										 }  ?><?php if($assets_investments == 'No')

                                                  { echo 'disabled=disabled'; 

												  } ?> 

                                             <?php if($readonly)  echo  'disabled="disabled"'; ?> name="ProvidentFundCollateral" id="ProvidentFundCollateral"></td>

                                    </tr>
									 <tr>

                                            <td>

                                            <input  <?php if($row11){ if($fetch_assets['GoldOrnamentsvalue'] > 0){ echo "checked"; } } ?>  

                                             <?php if($readonly) echo  'disabled="disabled"'; ?> id="GoldOrnaments" name="GoldOrnaments"  type="checkbox" onClick="return  onTypeofAssetsChecked('GoldOrnaments','GoldOrnamentsvalue','GoldOrnamentsCollateral')">Gold Ornaments</td>

                                            <td>

                                            <input maxlength="10"    onkeyup="allowonlynumeric(this)" onClick="return  removeStartingZero(this)"    value="<?php if($row11){  
											
											echo $fetch_assets['GoldOrnamentsvalue']; 
											} 
                                             else {
											 
											 echo '0'; } ?>"
											<?php if($assets_investments == 'No')

                                                  { ?>disabled="disabled" <?php }?> 

                                             <?php if($readonly) echo  'disabled="disabled"'; ?> onchange="calculateTotalAssetsAmount('totAssets','immovablePropertyvalue','governmentsecuritiesvalue','insurancepoliciesvalue','chits_kurisvalue','sharesvalue','MFsvalue','debenturesvalue','BankFixedDepositsvalue','ProvidentFundvalue',
										  'GoldOrnamentsvalue','VehiclesSelfOwnedvalue','OtherAssetsvalue')" name="GoldOrnamentsvalue" id="GoldOrnamentsvalue"   type="text"></td>

                                            <td align="center">

                                            <input type="checkbox" value="yes" onclick="CheckAsssetsAmountEntered('GoldOrnamentsvalue',this)" <?php
							            if($row11){ 
										
										if($fetch_assets['GoldOrnamentsCollateral'] == 'yes')
										{
										
										          echo "checked"; 
										 } 
										 elseif($fetch_assets['GoldOrnamentsvalue'] == 0) {
										         echo 'disabled=disabled';
                                               }

										 }  ?> <?php if($assets_investments == 'No')

                                                  { echo 'disabled=disabled'; 

												  } ?> 

                                             <?php if($readonly)  echo  'disabled="disabled"'; ?> name="GoldOrnamentsCollateral" id="GoldOrnamentsCollateral"></td>

                                    </tr>
									 <tr>

                                            <td>

                                            <input <?php if($row11){ if($fetch_assets['VehiclesSelfOwnedvalue'] > 0){ echo "checked"; } } ?>  

                                             <?php if($readonly) echo  'disabled="disabled"'; ?>  id="VehiclesSelfOwned" name="VehiclesSelfOwned"  type="checkbox" onClick="return  onTypeofAssetsChecked('VehiclesSelfOwned','VehiclesSelfOwnedvalue','VehiclesSelfOwnedCollateral')">Vehicles Self Owned</td>

                                            <td>

                                            <input maxlength="10"    onkeyup="allowonlynumeric(this)" onClick="return  removeStartingZero(this)"    value="<?php if($row11){  
											
											echo $fetch_assets['VehiclesSelfOwnedvalue']; 
											} 
                                             else {
											 
											 echo '0'; } ?>"
											<?php if($assets_investments == 'No')

                                                  { ?>disabled="disabled" <?php }?> 

                                             <?php if($readonly) echo  'disabled="disabled"'; ?>  onchange="calculateTotalAssetsAmount('totAssets','immovablePropertyvalue','governmentsecuritiesvalue','insurancepoliciesvalue','chits_kurisvalue','sharesvalue','MFsvalue','debenturesvalue','BankFixedDepositsvalue','ProvidentFundvalue',
										  'GoldOrnamentsvalue','VehiclesSelfOwnedvalue','OtherAssetsvalue')" name="VehiclesSelfOwnedvalue" id="VehiclesSelfOwnedvalue"   type="text"></td>

                                            <td align="center">

                                            <input type="checkbox" value="yes" onclick="CheckAsssetsAmountEntered('VehiclesSelfOwnedvalue',this)" <?php
							            if($row11){ 
										
										if($fetch_assets['VehiclesSelfOwnedCollateral'] == 'yes')
										{
										
										          echo "checked"; 
										 } 
										  elseif($fetch_assets['VehiclesSelfOwnedvalue'] == 0) {
										         echo 'disabled=disabled';
                                               }

										 }  ?> <?php if($assets_investments == 'No')

                                                  { echo 'disabled=disabled';
												  

												  } ?> 

                                             <?php if($readonly)  echo  'disabled="disabled"'; ?> name="VehiclesSelfOwnedCollateral" id="VehiclesSelfOwnedCollateral"></td>

                                    </tr>
									<tr>

                                            <td>

                                            <input  <?php if($row11){ if($fetch_assets['OtherAssetsvalue'] > 0){ echo "checked"; } } ?>  

                                             <?php if($readonly) echo  'disabled="disabled"'; ?> id="OtherAssets" name="OtherAssets"  type="checkbox" onClick="return  onTypeofAssetsChecked('OtherAssets','OtherAssetsvalue','OtherAssetsCollateral')">Other Assets Owned ( TV, Fridge ,etc )</td>

                                            <td>

                                            <input maxlength="10"    onkeyup="allowonlynumeric(this)" onClick="return  removeStartingZero(this)"    value="<?php if($row11){  
											
											echo $fetch_assets['OtherAssetsvalue']; 
											} 
                                             else {
											 
											 echo '0'; } ?>"
											<?php if($assets_investments == 'No')

                                                  { ?>disabled="disabled" <?php }?> 

                                             <?php if($readonly) echo  'disabled="disabled"'; ?> name="OtherAssetsvalue" onchange="calculateTotalAssetsAmount('totAssets','immovablePropertyvalue','governmentsecuritiesvalue','insurancepoliciesvalue','chits_kurisvalue','sharesvalue','MFsvalue','debenturesvalue','BankFixedDepositsvalue','ProvidentFundvalue',
										  'GoldOrnamentsvalue','VehiclesSelfOwnedvalue','OtherAssetsvalue')" id="OtherAssetsvalue"  type="text"></td>

                                            <td align="center">

                                            <input type="checkbox" value="yes" onclick="CheckAsssetsAmountEntered('OtherAssetsvalue',this)" <?php
							            if($row11){ 
										
										if($fetch_assets['OtherAssetsCollateral'] == 'yes')
										{
										
										          echo "checked"; 
										 } 
										 elseif($fetch_assets['OtherAssetsvalue'] == 0){
										         echo 'disabled=disabled';
                                               }

										 }  ?> <?php if($assets_investments == 'No')

                                                  { echo 'disabled=disabled'; 

												  } ?> 

                                             <?php if($readonly)  echo  'disabled="disabled"'; ?> name="OtherAssetsCollateral" id="OtherAssetsCollateral"></td>

                                    </tr>
									

                            </table></div>

							
                         </td>
					</tr>
					
					<tr>

                            <td  <?php if($assets_investments == 'No') { ?> style="display:none" <?php } ?> id="totAssets1">Total Assets Amount</td>

                            <td  <?php if($assets_investments == 'No') { ?> style="display:none" <?php } ?> id="totAssets2">:</td>

                            <td>

                            <input id="totAssets"  <?php if($assets_investments == 'No') { ?> style="display:none" <?php } ?> readonly="readonly" value="<?php if($row11 && $assets_investments == 'Yes' ){ 
										
										
										
										         echo $fetch_assets['total_AssetsAmount'];
										 } ?>"  name="totAssets"  size="40" type="text"></td>

                    </tr>
					<tr><td align="right"><input id="action"  class="nextbutton" style="font-size: 16px;" type="button" value="Back" onclick="activetabs('0')"></td>
					
					<td align="right"><input id="action"  class="nextbutton" style="font-size: 16px;" type="button" value="Next" onclick="activetabs('2')"></td></tr>
 
       <?php } ?>
	   </table>

 <!-- --------------------------------  coborrower 1_panel start ------------------------------------------------------------------------------ -->      
    </div>
	 <?php 	if($fetch['typeofLoan']!='Consumer Finance'&& $fetch['typeofLoan']!='Home Improvement')
       {?>
	<div id="tabs-3" style="background-color:white">
	      <table align="center" border="0" cellpadding="3" cellspacing="0" width="650">
          	<?php if(!$row22) //if Other loans is selects  
	     {?>
					
                   <tr>

                            <td class="heading" colspan="3" style="height: 26px">

                                <input name="chkpanel1" id="chkpanel1" type="checkbox" 

                                    <?php if($readonly) 

                                    { echo 'disabled=disabled';} if(!$row22){ }else{ echo "checked"; }?> >

                                      Select to add Co-Borrower 1 Details

                            </td>

                    </tr>

                    <?php } else { ?>      
		     <tr>

                            <td class="heading" colspan="3"><span style="font-size:12px"><b>Co-Borrower 1 Details</b></td>

                    </tr>
		   <?php } ?>

                    <tr>

                            <td height="5"><br></td>

                    </tr>

                   <tr><td colspan="3"><div id="coborrower1_panel" 

                                <?php if(!$row22){echo "style='display: none'"; }else{ echo "style='display:block'"; }?>  >
								
								
								<table>

		     <?php if($fetchinfo1['Relation_with_Applicant']=='YES') { ?>
            <tr>

                    <td>Relation with Applicant</td>

                    <td>:</td>

                    <td>

                        <select id="relation" name="relation" size="1" 

                                onchange="return onSelectedIndexChange(this,'relative')"

                                <?php if($readonly) echo 'disabled=disabled';  ?>>

                    <option >Select</option>

                   <?php
					
					$q=  mysql_query("select Relation from relation");

					while($n = @mysql_fetch_assoc($q)){?>
								<option <?php if($row22){if($fetch2['relation']==$n['Relation']){echo " selected='selected'";}}?>
									value="<?php echo $n['Relation']; ?>"><?php echo $n['Relation']; ?></option>
					 <?php } ?>
					 
					 </select>
                    <select id="relative" name="relative" size="1" 

                                <?php if($readonly) echo 'disabled=disabled'; 

                                  if($row22 && $fetch2['relation'] != 'Relative') echo"disabled='disabled'"?>>

                            <option >Select</option>

                            <option <?php if($row22){

                                    if($fetch2['relative'] == 'Cousin')

                                    {        echo "selected='selected'";      }	}										     

                                        ?>>Cousin</option>

                            <option <?php if($row22){

                                    if($fetch2['relative'] == 'Paternal Uncle (Chacha)')

                                    {        echo "selected='selected'";      }	}										     

                                        ?>>Paternal Uncle (Chacha)</option>

                            <option <?php if($row22){

                                    if($fetch2['relative'] == 'Paternal Aunt (Chachi)')

                                    {        echo "selected='selected'";      }}										     

                                        ?>>Paternal Aunt (Chachi)</option>

                            <option <?php if($row22){

                                    if($fetch2['relative'] == 'Maternal Uncle (Mama)')

                                    {        echo "selected='selected'";      }	}										     

                                        ?>>Maternal Uncle (Mama)</option>

                            <option <?php if($row22){

                                    if($fetch2['relative'] == 'Paternal Grandfather (Dadaji)')

                                    {        echo "selected='selected'";      }	}										     

                                        ?>>Paternal Grandfather (Dadaji)</option>

                            <option <?php if($row22){

                                    if($fetch2['relative'] == 'Paternal Grandmother (Dadi)')

                                    {        echo "selected='selected'";      }	}										     

                                        ?>>Paternal Grandmother (Dadi)</option>

                            <option <?php if($row22){

                                    if($fetch2['relative'] == 'Maternal Grandfather (Nanaji)')

                                    {        echo "selected='selected'";      }	}										     

                                        ?>>Maternal Grandfather (Nanaji)</option>

                            <option <?php if($row22){

                                    if($fetch2['relative'] == 'Maternal Grandmother (Nani)')

                                    {        echo "selected='selected'";      }	}										     

                                        ?>>Maternal Grandmother (Nani)</option>

                    </select>          

                    </td>

            </tr>
             <?php } ?>
                 <?php if($fetchinfo1['First_Name']=='YES') { ?>
            <tr>

                    <td>First Name</td>

                    <td>:</td>

                    <td>

                    <input id="cfirstname" name="cfirstname" size="40" type="text"

                        value="<?php if($row22) { echo $fetch2['cfirstname']; } ?>"    

                        <?php if($readonly) echo 'readonly=readonly'; 

                                        ?>></td>

            </tr>
				 <?php } ?>
				  <?php if($fetchinfo1['Middle_Name']=='YES') { ?>

            <tr>

                    <td>Middle Name</td>

                    <td>:</td>

                    <td>

                    <input id="cmiddlename" name="cmiddlename" size="40" type="text"

                    value="<?php if($row22) { echo $fetch2['cmiddlename']; } ?>"  

                    <?php if($readonly) echo 'readonly=readonly'; 

                                        ?>></td>

            </tr>
				  <?php } ?>
			<?php if($fetchinfo1['Last_Name']=='YES') { ?>

            <tr>

                    <td>Last Name</td>

                    <td>:</td>

                    <td>

                    <input id="clastname" name="clastname" size="40" type="text"

                        value="<?php if($row22) { echo $fetch2['clastname']; } ?>"    

                        <?php if($readonly) echo 'readonly=readonly'; 

                                        ?>></td>

            </tr>
			 <?php } ?>
                <?php if($fetchinfo1['Date_of_Birth']=='YES') { ?>

            <tr>

                    <td>Date of Birth</td>

                    <td>:</td>

                    <td>

                    <input id="datepicker1" name="datepicker1" size="40" type="text"

                    value="<?php if($row22) { $originaldate= $fetch2['cdob'];

                    $newdate=date("d-m-Y",strtotime($originaldate));

                    echo $newdate;

                    } ?>"  

                    <?php if($readonly) echo 'readonly=readonly'; 

                                        ?>></td>

            </tr>
			 <?php } ?>
                <?php if($fetchinfo1['Aadhar_Card_No']=='YES') { ?>
			<tr>

                    <td>Aadhar Card No.</td>

                    <td>:</td>

                    <td>

                    <input id="cadharcardno" maxlength="12" name="cadharcardno" size="40" type="text"

                        value="<?php if($row22) { echo $fetch2['cadharcardno']; } ?>"    

                        <?php if($readonly) echo 'readonly=readonly'; 

                                        ?>></td>
										<?php 
											if($_SESSION['usertype'] == 'Employee') { 
      											?>
												
									 <?php if($cadhardoc_name!='' || $cpandoc_name!='' || $cphoto_name!='' ) { ?>
					
												<td >
												
											<a href="#" onClick="mywindow('open','<?php echo $cadhardoc_name ?>','<?php echo $cpandoc_name; ?>','<?php echo $cphoto_name; ?>','')" ><input type="button" value="View KYC"> </a>
											<a href="#" onClick="closewindow()" ><input type="button" value="Close KYC"> </a>
												</td>
												
											<?php } }	?>

            </tr>
			<?php } ?>
                <?php if($fetchinfo1['PAN_No']=='YES') { ?>


            <tr>

                    <td>PAN No.</td>

                    <td>:</td>

                    <td>

                    <input id="cpanno" maxlength="10" name="cpanno" size="40" type="text"

                        value="<?php if($row22) { echo $fetch2['cpanno']; } ?>"    

                        <?php if($readonly) echo 'readonly=readonly'; 

                                        ?>></td>

            </tr>
			<?php } ?>
                <?php if($fetchinfo1['Email_Address']=='YES') { ?>

            <tr>

                    <td>Email Address</td>

                    <td>:</td>

                    <td>

                    <input id="cemail" name="cemail" size="40" type="text"

                value="<?php if($row22) { echo $fetch2['cemail']; } ?>" 

                <?php if($readonly) echo 'readonly=readonly'; 

                                        ?>></td>

            </tr>
				<?php } ?>
            <tr>

                            <td>Do You want to provide your bank details?</td>

                            <td>:</td>

                            <td>

                            <input  id="cbankdetails"  name="cbankdetails" type="radio" <?php if($readonly) echo 'disabled=disabled'; ?>
							<?php if($row22) {  if($fetch2['cbankdetails']=='Yes') { echo "checked='checked'"; } } ?>
							value="Yes" onclick="onselectbankdetails(this,false,'caccountNo','caccountholder','cbankname','cbranchname','cbranchadd','cifsccode','cbankdetails','cmicr')">Yes
							<input  id="cbankdetails"  name="cbankdetails" type="radio" <?php if($readonly) echo 'disabled=disabled'; ?>
							<?php if($row22) {  if($fetch2['cbankdetails']=='No'||$fetch2['cbankdetails']=='') { echo "checked='checked'"; } }
							 else { echo "checked='checked'";  }   					?>  
							value="No" onclick="onselectbankdetails(this,true,'caccountNo','caccountholder','cbankname','cbranchname','cbranchadd','cifsccode','cbankdetails','cmicr')">No
							
                            
                        </td>

                    </tr>
					<tr id="cbankdetails6" <?php if($row22) {  if($fetch2['cbankdetails']=='No'||$fetch2['cbankdetails']=="") { ?> style="display:none" <?php } } ?>>
						     <td><label id="lblIFSCCode">IFSC Code</label></td>
							 <td>:</td>
							 <td><input maxlength="18" size="40" id="cifsccode" name="cifsccode"  
							 <?php if($readonly) echo 'readonly=readonly';  if($row22) {  if($fetch2['cbankdetails']!='Yes') { echo 'disabled=disabled'; }}
							     else { echo "disabled=disabled";  } ?>
                                  onKeyup="getbankdetailfromifsc('cifsccode','cbankname','cbranchname','cbranchadd','cmicr')"
										  value="<?php if($row22) {  if($fetch2['cbankdetails']=='Yes') { echo $fetch_cbankinfo['ifsccode']; } } ?>" id="ifsccode" type="text">
							 
							</td>
						</tr>
					<tr id="cbankdetails1"<?php if($row22) {  if($fetch2['cbankdetails']=='No'||$fetch2['cbankdetails']=="") {  ?> style="display:none" <?php } } ?> >
					     <td>Account No.</td>
						 <td>:</td>
						 
                            <td>
                               <input maxlength="18" size="40"  id="caccountNo" name="caccountNo" onkeypress="return isNumber(event)"  id="accountNo" 
							   type="text"  <?php if($readonly) echo 'readonly=readonly';  if($row22) {  if($fetch2['cbankdetails']!='Yes') { echo 'disabled=disabled'; }}
							                  else { echo "disabled=disabled";  } ?>

                                               value="<?php if($row22) {  if($fetch2['cbankdetails']=='Yes') { echo $fetch_cbankinfo['accountNo']; } } ?>">
							</td>
					</tr>


                     <tr id="cbankdetails2" <?php if($row22) {  if($fetch2['cbankdetails']=='No'||$fetch2['cbankdetails']==""){  ?> style="display:none" <?php } } ?>>
								<td ><label id="AccountHolder"  >Account Holder</label></td>
                                <td>:</td>
								<td>
                                   <input maxlength="50"  size="40" id="caccountholder" name="caccountholder"  type="text" 
								    <?php if($readonly) echo 'readonly=readonly';  if($row22) {  if($fetch2['cbankdetails']!='Yes') { echo 'disabled=disabled'; }}
									 else { echo "disabled=disabled";  }?>

                                                value="<?php if($row22) {  if($fetch2['cbankdetails']=='Yes') { echo $fetch_cbankinfo['accountholder']; } } ?>">
									</td>
						</tr>


					     <tr id="cbankdetails3" <?php if($row22) {  if($fetch2['cbankdetails']=='No'||$fetch2['cbankdetails']=="") {  ?> style="display:none" <?php } } ?>>
								<td ><label id="BankName" >Bank Name</label></td>
								<td>:</td>
								<td>
									<input maxlength="50"  size="40" id="cbankname" name="cbankname" 
									type="text"  <?php if($readonly) echo 'readonly=readonly';  if($row22) {  if($fetch2['cbankdetails']!='Yes') { echo 'disabled=disabled'; }}
									 else { echo "disabled=disabled";  } ?>

                                                value="<?php if($row22) {  if($fetch2['cbankdetails']=='Yes') { echo $fetch_cbankinfo['bankname']; } } ?>">
								</td>
						</tr>
                        <tr id="cbankdetails4" <?php if($row22) {  if($fetch2['cbankdetails']=='No'||$fetch2['cbankdetails']=="")  { ?> style="display:none" <?php } } ?>>
						     <td ><label id="BranchName">Branch Name</label></td>
							 <td>:</td>
							 <td>
                                <input maxlength="50"  size="40" id="cbranchname" name="cbranchname"  type="text"
								<?php if($readonly) echo 'readonly=readonly';  if($row22) {  if($fetch2['cbankdetails']!='Yes') { echo 'disabled=disabled'; }}
								 else { echo "disabled=disabled";  } ?>

                                                value="<?php if($row22) {  if($fetch2['cbankdetails']=='Yes') { echo $fetch_cbankinfo['branchname']; } } ?>">
							</td>
						</tr>

                        <tr id="cbankdetails5" <?php if($row22) {  if($fetch2['cbankdetails']=='No'||$fetch2['cbankdetails']=="") { ?> style="display:none" <?php } } ?>>
						    <td><label id="BranchLocation">Branch Location</label></td>
							<td>:</td>
							<td>
                               <input maxlength="50" size="40" id="cbranchadd" name="cbranchadd" type="text"
							   <?php if($readonly) echo 'readonly=readonly';  if($row22) {  if($fetch2['cbankdetails']!='Yes') { echo 'disabled=disabled'; }}
							    else { echo "disabled=disabled";  } ?>

                                                value="<?php if($row22) {  if($fetch2['cbankdetails']=='Yes') { echo $fetch_cbankinfo['branchadd']; } } ?>"> 
							</td>
						</tr>

                        
						<tr id="cbankdetails7" <?php if($row22) {  if($fetch2['cbankdetails']=='No'||$fetch2['cbankdetails']=="") { ?> style="display:none" <?php } } ?>>
						     <td><label id="lblmicrCode">MICR</label></td>
							 <td>:</td>
							 <td><input maxlength="18" size="40" id="cmicr" name="cmicr"  
							 <?php if($readonly) echo 'readonly=readonly';  if($row22) {  if($fetch2['cbankdetails']!='Yes') { echo 'disabled=disabled'; }}
							   else { echo "disabled=disabled";  } ?>

                                                value="<?php if($row22) {  if($fetch2['cbankdetails']=='Yes') { echo $fetch_cbankinfo['micr']; } } ?>" type="text">
							 
							</td>
						</tr>
            <tr>

                    <td bgcolor="#E6F0FA" colspan="3">

                    <input name="same" onclick="return onclickSameAddress(this)" type="checkbox"  

                        <?php if($row22){

                                if($fetch2['samestudadd'] == 'on')

                                    {   echo "checked='checked'";   }	}

                                    ?>>Same as Applicant's Address

                    </td>

            </tr>
			 <?php if($fetchinfo1['Address']=='YES') { ?>

            <tr>

                    <td>Address</td>

                    <td>:</td>

                    <td>

                    <input id="caddress" name="caddress" size="40" type="text"

                        value="<?php if($row22) { echo $fetch2['caddress']; } ?>" 
						
                        <?php if($row22){

                                if($fetch2['samestudadd'] == 'on')

                                    { echo  'readonly=readonly';     }	}

                                    ?>						

                        <?php if($readonly) echo 'readonly=readonly'; 

                                        ?>></td>

            </tr>

               <?php } ?>
                <?php if($fetchinfo1['Street1']=='YES') { ?>
                 <tr>

                    <td>Street1</td>

                    <td>:</td>

                    <td>

                    <input id="cstreet1" name="cstreet1" size="40" type="text" 

                        value="<?php if($row22) { echo $fetch2['cstreet1']; } ?>" 
						
						<?php if($row22){

                                if($fetch2['samestudadd'] == 'on')

                                    { echo  'readonly=readonly';     }	}

                                    ?>				

                        <?php if($readonly) echo 'readonly=readonly'; 

                                        ?>></td>

            </tr>
				<?php } ?>
				 <?php if($fetchinfo1['Street2']=='YES') { ?>
            <tr>

                    <td>Street2 (optional)</td>

                    <td>:</td>

                    <td>

                    <input id="cstreet2" name="cstreet2" size="40" type="text"

                        value="<?php if($row22) { echo $fetch2['cstreet2']; } ?>" 

                      <?php if($row22){

                                if($fetch2['samestudadd'] == 'on')

                                    { echo  'readonly=readonly';     }	}

                                    ?>										

                        <?php if($readonly) echo 'readonly=readonly'; ?>> 

                    

                    </td>

            </tr>
             <?php } ?>
                <?php if($fetchinfo1['State']=='YES') { ?>
            <tr>

                    <td>State</td>

                    <td>:</td>

                    <td>

                    <input id="ccountry1"  name="ccountry1" type="text" onChange="changeState(this,'ccountry1','cstate1','ccity1','ccountrySelect','cstateSelect','ccitySelect');" 

                            value="<?php if($row22) { echo $fetch2['cstate']; } ?>"
                            <?php if($row22){

                                if($fetch2['samestudadd'] == 'on')

                                    { echo  'readonly=readonly';     }	}

                                    ?>											

                            <?php if($readonly) echo 'readonly=readonly'; ?>> 



                    <select disabled="disabled"  style="display:none" id="ccountrySelect" name="ccountry" 

                            onchange="populateState('ccountrySelect','cstateSelect'); populateCity('ccountrySelect','ccitySelect')" size="1">

                    </select>

                    </td>

            </tr>
           <?php } ?>
                <?php if($fetchinfo1['District']=='YES') { ?>
            <tr>

                    <td>District</td>

                    <td>:</td>

                    <td>





                        <input id="cstate1"  name="cstate1" type="text" onChange="changeState(this,'ccountry1','cstate1','ccity1','ccountrySelect','cstateSelect','ccitySelect');" 

                    value="<?php if($row22) { echo $fetch2['cdistrict']; } ?>" 
					<?php if($row22){

                                if($fetch2['samestudadd'] == 'on')

                                    { echo  'readonly=readonly';     }	}

                                    ?>				

                    <?php if($readonly) echo 'readonly=readonly';  ?>>

                    <select id="cstateSelect" style="display:none" disabled="disabled" name="cstate" size="1">

                    </select><script type="text/javascript">initCountry('','ccountrySelect','cstateSelect','ccitySelect');</script>

                    </td>

            </tr>
			 <?php } ?>
                <?php if($fetchinfo1['City']=='YES') { ?>

            <tr>

                    <td>City</td>

                    <td>:</td>

                    <td align="left" valign="top">

                        <input id="ccity1" name="ccity1"  type="text" onChange="changeState(this,'ccountry1','cstate1','ccity1','ccountrySelect','cstateSelect','ccitySelect');" 

                                        value="<?php if($row22) { echo $fetch2['ccity']; } ?>" 
										<?php if($row22){

                                if($fetch2['samestudadd'] == 'on')

                                    { echo  'readonly=readonly';     }	}

                                    ?>				

                    <?php if($readonly) echo 'readonly=readonly'; ?>>
					

                    <select id="ccitySelect" style="display:none" disabled="disabled" name="ccity" size="1"></select>

                    <script type="text/javascript">initCountry('','ccountrySelect','cstateSelect','ccitySelect'); </script>



                    </td>

            </tr>
			 <?php } ?>
                <?php if($fetchinfo1['Years_living_at_Current_Residence']=='YES') { ?>
<tr>

                            <td>Years  living at Current Residence</td>

							
                            <td>:</td>

                            <td>

                            <select  id="cyearsInResidence" name="cyearsInResidence" size="1"

                            <?php if($row22){

                                    if($fetch2['samestudadd'] == 'on')

                                      { echo 'disabled=disabled'; ?> style="display:none"; <?php }  } ?>
										 <?php if($readonly) echo 'disabled=disabled'; ?> >

                            <option value="">Select</option>
							 <option <?php if($row22){

                                    if($fetch2['cyearsInResidence'] == '<1')

                                    {        echo "selected='selected'";      }	}										     

                                    ?>><1</option>
							
						               <?php if($row22) { if($fetch2['cyearsInResidence']!=''&& $fetch2['cyearsInResidence']!='>15'&& $fetch2['cyearsInResidence']!='<1') { ?>	
                                          <script>
											filldropdown_numbersofSelected('cyearsInResidence', 1,15,1,<?php echo 
											$fetch2['cyearsInResidence'].'+1';?>);
											
											</script> 
											<?php } else { ?>
											<script>
											filldropdown_numbers('cyearsInResidence', 1,15);
											
											</script> <?php } } ?>
								  <option <?php if($row22){

                                    if($fetch2['cyearsInResidence'] == '>15')

                                    {        echo "selected='selected'";      }	}										     

                                    ?>>>15</option>
							   

                            

                          

                            </select>
							<input id="cyearsInResidence1" name="cyearsInResidence1"<?php if($row22){

                                    if($fetch2['samestudadd'] == 'on')

                                        { echo 'readonly=readonly'; ?>  value="<?php if($row22){

                                          echo $fetch2['cyearsInResidence'];      	}										     

                                   ?>" <?php   } else { ?> style="display:none" disabled="disabled"  <?php	} } ?>

                                        <?php if($readonly) echo 'readonly=readonly'; ?> ></td>

                    </tr>
										 <?php } ?>
                <?php if($fetchinfo1['Residential_Status']=='YES') { ?>
					<tr>

                            <td>Residential Status</td>

                            <td>:</td>

                            <td>

                            <select id="cResidentialStatus" name="cResidentialStatus" onchange="return onOtherSelectedIndexChange(this,'cresidentialstatus_others')" size="1"
							<?php if($row22){

                                    if($fetch2['samestudadd'] == 'on')

                                      { echo 'disabled=disabled'; ?> style="display:none"; <?php }  } ?>
										 <?php if($readonly) echo 'disabled=disabled'; ?> >

                            <option selected="selected">Select</option>
							<option <?php if($row22){

                                    if($fetch2['cResidentialStatus'] == 'Staying with Friends or Hostel')

                                    {        echo "selected='selected'";      }	}										     

                                    ?>>Staying with Friends or Hostel</option>
							<option <?php if($row22){

                                    if($fetch2['cResidentialStatus'] == 'Staying with Relative')

                                    {        echo "selected='selected'";      }	}										     

                                    ?> >Staying with Relative</option>
							<option <?php if($row22){

                                    if($fetch2['cResidentialStatus'] == 'Self Rented/Paying Guest')

                                    {        echo "selected='selected'";      }	}										     

                                    ?>>Self Rented/Paying Guest</option>
							<option <?php if($row22){

                                    if($fetch2['cResidentialStatus'] == 'Rented by Parents')

                                    {        echo "selected='selected'";      }	}										     

                                    ?>>Rented by Parents</option>
							<option <?php if($row22){

                                    if($fetch2['cResidentialStatus'] == 'Company Owned')

                                    {        echo "selected='selected'";      }	}										     

                                    ?>>Company Owned</option>
							<option <?php if($row22){

                                    if($fetch2['cResidentialStatus'] == 'Financed by Self')

                                    {        echo "selected='selected'";      }	}										     

                                    ?>>Financed by Self</option>
							<option <?php if($row22){

                                    if($fetch2['cResidentialStatus'] == 'Financed by Parents')

                                    {        echo "selected='selected'";      }	}										     

                                    ?>>Financed by Parents</option>
							<option <?php if($row22){

                                    if($fetch2['cResidentialStatus'] == 'Owned by Parents')

                                    {        echo "selected='selected'";      }	}										     

                                    ?>>Owned by Parents</option>
									<option <?php if($row22){

                                    if($fetch2['cResidentialStatus'] == 'Other')

                                    {        echo "selected='selected'";      }	}										     

                                    ?>>Other</option>
									
                           
                          

                            </select>
							<input id="cResidentialStatus1" name="cResidentialStatus1" <?php if($row22){

                                    if($fetch2['samestudadd'] == 'on')

                                        { echo 'readonly=readonly'; ?>  value="<?php if($row22){

                                          echo $fetch2['cResidentialStatus'];      	}										     

                                 ?>" <?php   } else { ?> style="display:none" disabled="disabled"  <?php	} } ?>

                                        <?php if($readonly) echo 'readonly=readonly'; ?> >  <input id="cresidentialstatus_others" size="17" name="cresidentialstatus_others"  type="text" hidden="true"

                                                        value="<?php if($row22) { echo $fetch2['cresidentialstatus_others']; } ?>" 

                                                        <?php if($readonly) { echo 'readonly=readonly';?>hidden="false" <?php } 

                                                        if($row22 && $fetch2['cResidentialStatus']=='Other') {
														
														echo "style='display: block'";} 

                                                           ?>></td>
                    </tr>
					<?php } ?>
                <?php if($fetchinfo1['Pincode']=='YES') { ?>


            <tr>

                    <td>Pincode</td>

                    <td>:</td>

                    <td>

                    <input id="cpincode" maxlength="6" name="cpincode" size="40" type="text"

                        value="<?php if($row22) { echo $fetch2['cpincode']; } ?>" 
                      <?php if($row22){

                                if($fetch2['samestudadd'] == 'on')

                                    { echo  'readonly=readonly';     }	}

                                    ?>										

                        <?php if($readonly) echo 'readonly=readonly'; 

                                        ?>></td>

            </tr>
			 <?php } ?>
			  <?php if($fetchinfo['per_Address']=='YES') { ?>
					   					  
					 
					 <tr>

                    <td bgcolor="#E6F0FA" colspan="3">

                    <input name="csameadd" onclick="return onclickcoPermanentSameAddress(this)" type="checkbox"  

                        <?php if($row22){

                                if($fetch2['cper_sameadd'] == 'on')

                                    {   echo "checked='checked'";   }	}

                                    ?>>Permanent Address same as above Address

                    </td>

            </tr>
			

            <tr>

                    <td>Address</td>

                    <td>:</td>

                    <td>

                    <input id="cper_address" name="cper_address" size="40" type="text"

                        value="<?php if($row22) { echo $fetch2['cper_address']; } ?>" 
						
                        <?php if($row22){

                                if($fetch2['cper_sameadd'] == 'on')

                                    { echo  'readonly=readonly';     }	}

                                    ?>						

                        <?php if($readonly) echo 'readonly=readonly'; 

                                        ?>></td>

            </tr>

              
               
                 <tr>

                    <td>Street1</td>

                    <td>:</td>

                    <td>

                    <input id="cper_street1" name="cper_street1" size="40" type="text" 

                        value="<?php if($row22) { echo $fetch2['cper_street1']; } ?>" 
						
						<?php if($row22){

                                if($fetch2['cper_sameadd'] == 'on')

                                    { echo  'readonly=readonly';     }	}

                                    ?>				

                        <?php if($readonly) echo 'readonly=readonly'; 

                                        ?>></td>

            </tr>
			 <?php } ?>
			
				 <?php if($fetchinfo['per_Street2']=='YES') { ?>
            <tr>

                    <td>Street2 (optional)</td>

                    <td>:</td>

                    <td>

                    <input id="cper_street2" name="cper_street2" size="40" type="text"

                        value="<?php if($row22) { echo $fetch2['cper_street2']; } ?>" 

                      <?php if($row22){

                                if($fetch2['cper_sameadd'] == 'on')

                                    { echo  'readonly=readonly';     }	}

                                    ?>										

                        <?php if($readonly) echo 'readonly=readonly'; ?>> 

                    

                    </td>

            </tr>
             <?php } ?>
                <?php if($fetchinfo['per_State']=='YES') { ?>
            <tr>

                    <td>State</td>

                    <td>:</td>

                    <td>

                    <input id="cper_country1"  name="cper_country1" type="text" onChange="changeState(this,'cper_country1','cper_state1','cper_city1','cper_countrySelect','cper_stateSelect','cper_citySelect');" 

                            value="<?php if($row22) { echo $fetch2['cper_state']; } ?>"
                            <?php if($row22){

                                if($fetch2['cper_sameadd'] == 'on')

                                    { echo  'readonly=readonly';     }	}

                                    ?>											

                            <?php if($readonly) echo 'readonly=readonly'; ?>> 



                    <select disabled="disabled"  style="display:none" id="cper_countrySelect" name="cper_country" 

                            onchange="populateState('cper_countrySelect','cper_stateSelect'); populateCity('cper_countrySelect','cper_citySelect')" size="1">

                    </select>

                    </td>

            </tr>
           <?php } ?>
                <?php if($fetchinfo['per_District']=='YES') { ?>
            <tr>

                    <td>District</td>

                    <td>:</td>

                    <td>





                        <input id="cper_state1"  name="cper_state1" type="text" onChange="changeState(this,'cper_country1','cper_state1','cper_city1','cper_countrySelect','cper_stateSelect','cper_citySelect');" 

                    value="<?php if($row22) { echo $fetch2['cper_district']; } ?>" 
					<?php if($row22){

                                if($fetch2['cper_sameadd'] == 'on')

                                    { echo  'readonly=readonly';     }	}

                                    ?>				

                    <?php if($readonly) echo 'readonly=readonly';  ?>>

                    <select id="cper_stateSelect" style="display:none" disabled="disabled" name="cper_stateSelect" size="1">

                    </select><script type="text/javascript">initCountry('','cper_countrySelect','cper_stateSelect','cper_citySelect');</script>

                    </td>

            </tr>
			 <?php } ?>
                <?php if($fetchinfo['per_City']=='YES') { ?>

            <tr>

                    <td>City</td>

                    <td>:</td>

                    <td align="left" valign="top">

                        <input id="cper_city1" name="cper_city1"  type="text" onChange="changeState(this,'cper_country1','cper_state1','cper_city1','cper_countrySelect','cper_stateSelect','cper_citySelect');" 

                                        value="<?php if($row22) { echo $fetch2['cper_city']; } ?>" 
										<?php if($row22){

                                if($fetch2['cper_sameadd'] == 'on')
                                if($fetch2['cper_sameadd'] == 'on')

                                    { echo  'readonly=readonly';     }	}

                                    ?>				

                    <?php if($readonly) echo 'readonly=readonly'; ?>>
					

                    <select id="cper_citySelect" style="display:none" disabled="disabled" name="cper_citySelect" size="1"></select>

                    <script type="text/javascript">initCountry('','cper_countrySelect','cper_stateSelect','cper_citySelect'); </script>



                    </td>

            </tr>
			 <?php } ?>

            <tr>

                    <td>Phone No.</td>

                    <td>:</td>

                    <td>

                    <input id="cstdcode"  placeholder="STD Code" maxlength="6" name="cstdcode" size="10" type="text"

                        value="<?php if($row22) { echo $fetch2['cstdcode']; } ?>"
						<?php if($row22){

                                if($fetch2['samestudadd'] == 'on')

                                    { echo  'readonly=readonly';     }	}

                                    ?>				

                        <?php if($readonly) echo 'readonly=readonly'; 

                                        ?>>

                    <input id="cphone" placeholder="Enter 8 digits" maxlength="8" name="cphone" size="24" type="text" 

                            value="<?php if($row22) { echo $fetch2['cphone']; } ?>"
							<?php if($row22){

                                if($fetch2['samestudadd'] == 'on')

                                    { echo  'readonly=readonly';     }	}

                                    ?>				

                            <?php if($readonly) echo 'readonly=readonly'; 

                                        ?>></td>



            </tr>
			 <?php if($fetchinfo1['Mobile_No']=='YES') { ?>

            <tr>

                    <td>Mobile No.</td>

                    <td>:</td>

                    <td>

                    <input id="cmobile" maxlength="10" name="cmobile" size="40" type="text" 

                        value="<?php if($row22) { echo $fetch2['cmobile']; } ?>" 

                        <?php if($readonly) echo 'readonly=readonly'; 

                                        ?>></td>

            </tr>
			 <?php } ?>

            <tr>

                    <td>Alternate Contact No.</td>

                    <td>:</td>

                    <td>

                    <input id="cphone1" maxlength="10" name="cphone1" size="40" type="text" 

                        value="<?php if($row22) { echo $fetch2['cphone1']; } ?>"    

                            <?php if($readonly) echo 'readonly=readonly'; ?> >

                    </td>

            </tr>
			
                <?php if($fetchinfo1['Type_of_Employment']=='YES') { ?>

            <tr>

                    <td>Type of Employment</td>

                    <td>:</td>

                    <td>

                    <select id="cemployment" name="cemployment" size="1"

                                <?php if($readonly) echo 'disabled=disabled'; 

                                        ?>onchange="return onSelectedIndexChange(this,'cemployment_other')">

                    <option >Select</option>
					
					<option <?php if($row22){

                            if($fetch2['cemployment'] == 'EX-Govt Employee')

                            {        echo "selected='selected'";      }	}										     

                                ?>>EX-Govt Employee</option>
								
								<option <?php if($row22){

                            if($fetch2['cemployment'] == 'EX-Private Employee')

                            {        echo "selected='selected'";      }	}										     

                                ?>>EX-Private Employee</option>
								<option <?php if($row22){

                            if($fetch2['cemployment'] == 'Business')

                            {        echo "selected='selected'";      }	}										     

                                ?>>Business</option>

                    <option <?php if($row22){

                            if($fetch2['cemployment'] == 'Salaried')

                            {        echo "selected='selected'";      }	}										     

                                ?>>Salaried</option>

                    <option <?php if($row22){

                            if($fetch2['cemployment'] == 'Self Employed')

                            {        echo "selected='selected'";      }	}										     

                                ?>>Self Employed</option>
								<option <?php if($row22){

                            if($fetch2['cemployment'] == 'Pensioner')

                            {        echo "selected='selected'";      }	}										     

                                ?>>Pensioner</option>
								<option <?php if($row22){

                            if($fetch2['cemployment'] == 'Agriculture')

                            {        echo "selected='selected'";      }	}										     

                                ?>>Agriculture</option>
								<option <?php if($row22){

                            if($fetch2['cemployment'] == 'Rental Income')

                            {        echo "selected='selected'";      }	}										     

                                ?>>Rental Income</option>
								
								<option <?php if($row22){

                            if($fetch2['cemployment'] == 'Other')

                            {        echo "selected='selected'";      }	}										     

                                ?>>Other</option>

                    </select><select id="cemployment_other" name="cemployment_other" size="1" 

                                        <?php if($readonly) echo 'disabled=disabled'; 

                                        if($row22){if($fetch2['cemployment']!='Other') echo "disabled='disabled'"; }?> >

                                        <option >Select</option>
                                      <?php 
									  
									  
									  $tablename='other_typeofemployment_list';
									  $cloumnname='employment';
									  $arrvalue=$fetch2['cemployment_other'];
									  
									  
									$objCommon->getoptionsfromdbchecked($tablename,$cloumnname,$arrvalue);
									  
									  
									  ?></select>
                                        
</td>

            </tr>
			 <?php } ?>
                <?php if($fetchinfo1['Name_of_Company']=='YES') { ?>

            <tr>

                    <td>Name of Employer/Business</td>

                    <td>:</td>

                    <td>

                    <input id="cbusiness" name="cbusiness" maxlength="150" size="40" type="text" 

                            value="<?php if($row22) { echo $fetch2['cbusiness']; } ?>"   

                                <?php if($readonly) echo 'readonly=readonly'; 

                                        ?>></td>

            </tr>
			 <?php } ?>
                <?php if($fetchinfo1['Designation']=='YES') { ?>

            <tr>

                    <td>Designation</td>

                    <td>:</td>

                    <td>

                    <input id="cdesignation" maxlength="50" name="cdesignation" size="40" type="text" 

                    value="<?php if($row22) { echo $fetch2['cdesignation']; } ?>"   

                        <?php if($readonly) echo 'readonly=readonly'; 

                                        ?>></td>

            </tr>
			<?php } ?>
                <?php if($fetchinfo1['Years_in_Current_Employment']=='YES') { ?>
<tr>

                            <td>Years in Current Employment</td>

                            <td>:</td>

                            <td>

                            <select id="cyearsInEmployement"  name="cyearsInEmployement" size="1" <?php if($readonly) echo 'disabled=disabled'; ?>>

                            <option>Select</option>
							
							 <option <?php if($row22){
                                        if($fetch2['cyearsInEmployement'] == '<1') { echo 'selected=selected'; } }  ?>><1</option>
							
											<option <?php if($row22){
											 
							            if($fetch2['cyearsInEmployement'] == 1) { echo 'selected=selected'; } }  ?>>1</option>
							
											<option <?php if($row22){

									    if($fetch2['cyearsInEmployement'] == 2) { echo 'selected=selected'; } }?>>2</option>
											<option <?php if($row22){

									    if($fetch2['cyearsInEmployement'] == 3) { echo 'selected=selected'; } } ?>>3</option>
											<option <?php if($row22){

										if($fetch2['cyearsInEmployement'] == 4) { echo 'selected=selected'; } }  ?>>4</option>
											<option <?php if($row22){

								        if($fetch2['cyearsInEmployement'] == 5) { echo 'selected=selected';  } } ?>>5</option>
											<option <?php if($row22){

										if($fetch2['cyearsInEmployement'] == 6) { echo 'selected=selected';  } } ?>>6</option>
											<option <?php if($row22){

										if($fetch2['cyearsInEmployement'] == 7) { echo 'selected=selected'; } } ?>>7</option>
											<option <?php if($row22){

										if($fetch2['cyearsInEmployement'] == 8) { echo 'selected=selected'; } } ?>>8</option>
											<option <?php if($row22){

										if($fetch2['cyearsInEmployement'] == 9) { echo 'selected=selected';  } } ?>>9</option>
											<option <?php if($row22){

										if($fetch2['cyearsInEmployement'] == 10) { echo 'selected=selected';  } } ?>>10</option>
										
										
										<option <?php if($row22){

											 
							            if($fetch2['cyearsInEmployement'] == 11) { echo 'selected=selected'; } }  ?>>11</option>
							
											<option <?php if($row22){

									    if($fetch2['cyearsInEmployement'] == 12) { echo 'selected=selected'; } }?>>12</option>
											<option <?php if($row22){

									    if($fetch2['cyearsInEmployement'] == 13) { echo 'selected=selected'; } } ?>>13</option>
											<option <?php if($row22){

										if($fetch2['cyearsInEmployement'] == 14) { echo 'selected=selected'; } }  ?>>14</option>
											<option <?php if($row22){

								        if($fetch2['cyearsInEmployement'] == 15) { echo 'selected=selected';  } } ?>>15</option>

                            <option <?php if($row22){

                                if($fetch2['cyearsInEmployement'] == '>15')

                                {        echo "selected='selected'";      }	}										     

                                    ?>>>15</option>

                          

                            </select>
							</td>

                    </tr>
					<?php } ?>
                <?php if($fetchinfo1['Employment_Address']=='YES') { ?>
            <tr>

                    <td>Employment Address</td>

                    <td>:</td>

                    <td>

                    <input id="cempaddress" maxlength="45" name="cempaddress" size="40" type="text"

                            value="<?php if($row22) { echo $fetch2['cempaddress']; } ?>" 

                                    <?php if($readonly) echo 'readonly=readonly'; 

                                        ?>></td>

            </tr>
			 <?php } ?>
                <?php if($fetchinfo1['empStreet1']=='YES') { ?>

            <tr>

                    <td>Street1</td>

                    <td>:</td>

                    <td>

                    <input id="cempstreet1" maxlength="45" name="cempstreet1" size="40" type="text" 

                            value="<?php if($row22) { echo $fetch2['cempstreet1']; } ?>" 

                                    <?php if($readonly) echo 'readonly=readonly'; 

                                        ?>></td>

            </tr>
			<?php } ?>
                <?php if($fetchinfo1['empStreet2']=='YES') { ?>

            <tr>

                    <td>Street2 (optional)</td>

                    <td>:</td>

                    <td>

                    <input id="cempstreet2" maxlength="45" name="cempstreet2" size="40" type="text" 

                            value="<?php if($row22) { echo $fetch2['cempstreet2']; } ?>" 

                                    <?php if($readonly) echo 'readonly=readonly'; ?>> 

                   

                    </td>

            </tr>
			<?php } ?>
                <?php if($fetchinfo1['empState']=='YES') { ?>

            <tr>

                    <td>State</td>

                    <td>:</td>

                    <td>

                    <input id="cempcountrySelect1" name="cempcountry1" size="20" type="text" onChange="changeState(this,'cempcountrySelect1','cempstateSelect1','cempcitySelect1','cempcountrySelect','cempstateSelect','cempcitySelect');" 

                                                    value="<?php if($row22) { echo $fetch2['cempstate']; } ?>"

                            <?php if($readonly) echo 'readonly=readonly'; ?>>

                    <select id="cempcountrySelect" style="display:none" name="cempcountry" onchange="populateState('cempcountrySelect','cempstateSelect'); 

                    populateCity('cempcountrySelect','cempcitySelect')"  <?php if($row22) { if($fetch2['cempstate']!=''){ echo 'disabled="disabled"';} } ?> size="1">

                    </select>

                    </td>

            </tr>
			 <?php } ?>
                <?php if($fetchinfo1['empDistrict']=='YES') { ?>

						<tr>

							<td>District</td>

							<td>:</td>

							<td>

							 <input id="cempstateSelect1" name="cempstate1" size="20" type="text" onChange="changeState(this,'cempcountrySelect1','cempstateSelect1','cempcitySelect1','cempcountrySelect','cempstateSelect','cempcitySelect');" 

                                                        value="<?php if($row22) { echo $fetch2['cempdistrict']; } ?>"  

                                                                    <?php if($readonly) echo 'readonly=readonly'; ?>>

                                                         <select id="cempstateSelect" style="display:none" name="cempstate" size="1" <?php if($row22) { if($fetch2['cempdistrict']!=''){ echo 'disabled="disabled"';} } ?> >

							</select><script type="text/javascript">initCountry('','cempcountrySelect','cempstateSelect','cempcitySelect');</script>

							</td>

						</tr>
						 <?php } ?>
                <?php if($fetchinfo1['empCity']=='YES') { ?>


						<tr>

							<td>City</td>

							<td>:</td>

							<td align="left" valign="top">

							<input id="cempcitySelect1" name="cempcity1" size="20" type="text" onChange="changeState(this,'cempcountrySelect1','cempstateSelect1','cempcitySelect1','cempcountrySelect','cempstateSelect','cempcitySelect');" 

                                                                    value="<?php if($row22) { echo $fetch2['cempcity']; } ?>" 

                                                                <?php if($readonly) echo 'readonly=readonly'; ?>>&nbsp;

							<select id="cempcitySelect" style="display:none" name="cempcity" size="1" <?php if($row22) { if($fetch2['cempcity']!=''){ echo 'disabled="disabled"';} } ?> >

							</select>

							<script type="text/javascript">initCountry('','cempcountrySelect','cempstateSelect','cempcitySelect'); </script>

                                                        </td>

						</tr>
						 <?php } ?>
                <?php if($fetchinfo1['Pincode']=='YES') { ?>

						<tr>

							<td>Pincode</td>

							<td>:</td>

							<td>

							<input id="cemppincode" maxlength="6" name="cemppincode" size="40" type="text" 

                                                               value="<?php if($row22) { echo $fetch2['cemppincode']; } ?>" 

                                                               <?php if($readonly) echo 'readonly=readonly'; 

                                                                            ?>

                                                               ></td>

						</tr>
						 <?php } ?>

						<tr>

							<td>Phone No.</td>

							<td>:</td>

							<td>

							<input id="cempstdcode" placeholder="STD Code" maxlength="6" name="cempstdcode" size="10" type="text" 

                                                               value="<?php if($row22) { echo $fetch2['cempstdcode']; } ?>" 

                                                               <?php if($readonly) echo 'readonly=readonly'; 

                                                                            ?>>

							<input id="cempphone" placeholder="Enter 8 digits" maxlength="8" name="cempphone" size="24" type="text" 

                                                               value="<?php if($row22) { echo $fetch2['cempphone']; } ?>" 

                                                               <?php if($readonly) echo 'readonly=readonly'; 

                                                                            ?>></td>

						</tr>
						  <?php if($fetchinfo1['Gross_Monthly_Income']=='YES') { ?>





						<tr>

							<td>Gross Monthly Income</td>

							<td>:</td>

							<td><input  maxlength="6"   id="cincome" name="cincome" size="40"
                                         value="<?php if($row22) { echo $cincome; } ?>" 
                                                                    <?php if($readonly) echo 'disabled=disabled'; 

                                                                            ?>>

							</td>

						</tr>
						 <?php } ?>
                <?php if($fetchinfo1['Assets_and_Investments']=='YES') { ?>
						<tr>

                            <td>Assets and Investments</td>

                            <td>:</td>

                            <td>

                             <input id="cassets1" name="cassets" type="radio" value="Yes" <?php
							 if($cassets_investments == 'Yes'){ echo "checked='checked'";  } ?>  <?php if($readonly)  echo  'disabled="disabled"'; ?>onClick="showAssetspanel('ctypeofassets','ctypeofassets1','cassets2','ctotAssets','ctotAssets1','ctotAssets2')">Yes
                            <input id="cassets"   name="cassets" type="radio" <?php
							 if($cassets_investments == 'No'){ echo "checked='checked'";  } ?> <?php if($readonly)  echo  'disabled="disabled"'; ?> value="No" onClick="disableAssetspanel('ctypeofassets','ctypeofassets1','cassets2','ctotAssets','ctotAssets1','ctotAssets2')">No</td>

                    </tr>
				
				<tr>
					
					    <td id="ctypeofassets" <?php if($cassets_investments == 'No') { ?>style="display:none" <?php } ?>valign="top"></td>
						<td  id="ctypeofassets1"  <?php if($cassets_investments == 'No') { ?>style="display:none" <?php } ?> valign="top"></td></tr>
						<tr>
					    <td><div id="cassets2" <?php if($cassets_investments == 'No') { ?>style="display:none" <?php } ?>>
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

                                            <input  id="cimmovableProperty"
                                            <?php if($row12){ if($fetch_assets2['cimmovablePropertyvalue'] > 0){ echo "checked"; } } ?>  

                                             <?php if($readonly) echo  'disabled="disabled"'; ?>										name="cimmovableProperty"  type="checkbox" onClick="return  onTypeofAssetsChecked('cimmovableProperty','cimmovablePropertyvalue','cimmovablePropertyCollateral')">Immovable Property</td>

                                            <td>

                                            <input  maxlength="10"    onkeyup="allowonlynumeric(this)" onClick="return  removeStartingZero(this)" value="<?php if($row12){  
											
											echo $fetch_assets2['cimmovablePropertyvalue']; 
											} 
                                             else {
											 
									         echo '0'; } ?>"
											<?php if($cassets_investments == 'No')

                                                  { ?> disabled="disabled" <?php }?> 

                                             <?php if($readonly) echo  'disabled="disabled"'; ?>  name="cimmovablePropertyvalue" id="cimmovablePropertyvalue" onchange="calculateTotalAssetsAmount('ctotAssets','cimmovablePropertyvalue','cgovernmentsecuritiesvalue','cinsurancepoliciesvalue','cchits_kurisvalue','csharesvalue','cMFsvalue','cdebenturesvalue','cBankFixedDepositsvalue','cProvidentFundvalue',
										  'cGoldOrnamentsvalue','cVehiclesSelfOwnedvalue','cOtherAssetsvalue')"   type="text"></td>

                                            <td align="center">

                                            <input  type="checkbox" value="yes"  onclick="CheckAsssetsAmountEntered('cimmovablePropertyvalue',this)" <?php
							            if($row12){ 
										
										if($fetch_assets2['cimmovablePropertyCollateral'] == 'yes')
										{
										
										          echo "checked"; 
										 } 
										 else {
										         echo 'disabled=disabled';
                                               }

										 }  ?> <?php if($cassets_investments == 'No')

                                                  { echo 'disabled=disabled'; 

												  } ?> 

                                             <?php if($readonly)  echo  'disabled="disabled"'; ?> name="cimmovablePropertyCollateral" id="cimmovablePropertyCollateral"></td>

                                    </tr>

                                     <tr>

                                            <td>

                                            <input id="cgovernmentsecurities" <?php if($row12){ if($fetch_assets2['cgovernmentsecuritiesvalue'] > 0){ echo "checked"; } } ?>  

                                             <?php if($readonly) echo  'disabled="disabled"'; ?>	name="cgovernmentsecurities"  type="checkbox" onClick="return  onTypeofAssetsChecked('cgovernmentsecurities','cgovernmentsecuritiesvalue','cgovernmentsecuritiesCollateral')">Investment in government securities</td>

                                            <td>

                                            <input  maxlength="10"    onkeyup="allowonlynumeric(this)" onClick="return  removeStartingZero(this)" value="<?php if($row12){  
											
											echo $fetch_assets2['cgovernmentsecuritiesvalue']; 
											} 
                                             else {
											 
									         echo '0'; } ?>"
											<?php if($cassets_investments == 'No')

                                                  { ?>disabled="disabled" <?php }?> 

                                             <?php if($readonly) echo  'disabled="disabled"'; ?> name="cgovernmentsecuritiesvalue" id="cgovernmentsecuritiesvalue"  onchange="calculateTotalAssetsAmount('ctotAssets','cimmovablePropertyvalue','cgovernmentsecuritiesvalue','cinsurancepoliciesvalue','cchits_kurisvalue','csharesvalue','cMFsvalue','cdebenturesvalue','cBankFixedDepositsvalue','cProvidentFundvalue',
										  'cGoldOrnamentsvalue','cVehiclesSelfOwnedvalue','cOtherAssetsvalue')"  type="text"></td>

                                            <td align="center">

                                            <input type="checkbox" value="yes"  onclick="CheckAsssetsAmountEntered('cgovernmentsecuritiesvalue',this)" <?php
							            if($row12){ 
										
										if($fetch_assets2['cgovernmentsecuritiesCollateral'] == 'yes')
										{
										
										          echo "checked"; 
										 } 
										 else {
										         echo 'disabled=disabled';
                                               }

										 }  ?> <?php if($cassets_investments == 'No')

                                                  { echo 'disabled=disabled'; 

												  } ?> 

                                             <?php if($readonly)  echo  'disabled="disabled"'; ?> name="cgovernmentsecuritiesCollateral" id="cgovernmentsecuritiesCollateral"></td>

                                    </tr>
									 <tr>

                                            <td>

                                            <input id="cinsurancepolicies" <?php if($row12){ if($fetch_assets2['cinsurancepoliciesvalue'] > 0){ echo "checked"; } } ?>  

                                             <?php if($readonly) echo  'disabled="disabled"'; ?>	name="cinsurancepolicies"  type="checkbox" onClick="return  onTypeofAssetsChecked('cinsurancepolicies','cinsurancepoliciesvalue','cinsurancepoliciesCollateral')">Investment in insurance policies</td>

                                            <td>

                                            <input  maxlength="10"    onkeyup="allowonlynumeric(this)" onClick="return  removeStartingZero(this)" value="<?php if($row12){  
											
											echo $fetch_assets2['cinsurancepoliciesvalue']; 
											} 
                                             else {
											 
									        echo '0'; } ?>"
											<?php if($cassets_investments == 'No')

                                                  { ?> disabled="disabled" <?php }?> 

                                             <?php if($readonly) echo  'disabled="disabled"'; ?> name="cinsurancepoliciesvalue" id="cinsurancepoliciesvalue" onchange="calculateTotalAssetsAmount('ctotAssets','cimmovablePropertyvalue','cgovernmentsecuritiesvalue','cinsurancepoliciesvalue','cchits_kurisvalue','csharesvalue','cMFsvalue','cdebenturesvalue','cBankFixedDepositsvalue','cProvidentFundvalue',
										  'cGoldOrnamentsvalue','cVehiclesSelfOwnedvalue','cOtherAssetsvalue')"   type="text"></td>

                                            <td align="center">

                                            <input type="checkbox" value="yes"  onclick="CheckAsssetsAmountEntered('cinsurancepoliciesvalue',this)" <?php
							            if($row12){ 
										
										if($fetch_assets2['cinsurancepoliciesCollateral'] == 'yes')
										{
										
										          echo "checked"; 
										 } 
										 else {
										         echo 'disabled=disabled';
                                               }

										 }  ?> <?php if($cassets_investments == 'No')

                                                  { echo 'disabled=disabled'; 

												  } ?> 

                                             <?php if($readonly)  echo  'disabled="disabled"'; ?> name="cinsurancepoliciesCollateral" id="cinsurancepoliciesCollateral"></td>

                                    </tr>
									 <tr>

                                            <td>

                                            <input id="cchits_kuris"<?php if($row12){ if($fetch_assets2['cchits_kurisvalue'] > 0){ echo "checked"; } } ?>  

                                             <?php if($readonly) echo  'disabled="disabled"'; ?>	 name="cchits_kuris"  type="checkbox" onClick="return  onTypeofAssetsChecked('cchits_kuris','cchits_kurisvalue','cchits_kurisCollateral')">Investment in chits & kuris</td>

                                            <td>

                                            <input  maxlength="10"    onkeyup="allowonlynumeric(this)" onClick="return  removeStartingZero(this)" value="<?php if($row12){  
											
											echo $fetch_assets2['cchits_kurisvalue']; 
											} 
                                             else {
											 
									        echo '0'; } ?>"
										    <?php if($cassets_investments == 'No')

                                                  { echo "disabled=disabled";  } ?> 

                                             <?php if($readonly) echo  'disabled="disabled"'; ?> name="cchits_kurisvalue" id="cchits_kurisvalue"  onchange="calculateTotalAssetsAmount('ctotAssets','cimmovablePropertyvalue','cgovernmentsecuritiesvalue','cinsurancepoliciesvalue','cchits_kurisvalue','csharesvalue','cMFsvalue','cdebenturesvalue','cBankFixedDepositsvalue','cProvidentFundvalue',
										  'cGoldOrnamentsvalue','cVehiclesSelfOwnedvalue','cOtherAssetsvalue')"  type="text"></td>

                                            <td align="center">

                                            <input type="checkbox" value="yes"  onclick="CheckAsssetsAmountEntered('cchits_kurisvalue',this)" <?php
							            if($row12){ 
										
										if($fetch_assets2['cchits_kurisCollateral'] == 'yes')
										{
										
										          echo "checked"; 
										 } 
										 else {
										         echo 'disabled=disabled';
                                               }

										 }  ?> <?php if($cassets_investments == 'No')

                                                  { echo 'disabled=disabled'; 

												  } ?> 

                                             <?php if($readonly)  echo  'disabled="disabled"'; ?> name="cchits_kurisCollateral" id="cchits_kurisCollateral"></td>

                                    </tr>
									 <tr>

                                            <td>

                                            <input id="cshares" <?php if($row12){ if($fetch_assets2['csharesvalue'] > 0){ echo "checked"; } } ?>  

                                             <?php if($readonly) echo  'disabled="disabled"'; ?>	name="cshares"  type="checkbox" onClick="return  onTypeofAssetsChecked('cshares','csharesvalue','csharesCollateral')">Investment in shares</td>

                                            <td>

                                            <input  maxlength="10"    onkeyup="allowonlynumeric(this)" onClick="return  removeStartingZero(this)"  value="<?php if($row12){  
											
											echo $fetch_assets2['csharesvalue']; 
											} 
                                             else {
											 
									        echo '0'; } ?>"
										    <?php if($cassets_investments == 'No')

                                                  { echo "disabled=disabled"; } ?>
												  
												  <?php if($readonly) echo  'disabled="disabled"'; ?> name="csharesvalue" id="csharesvalue" onchange="calculateTotalAssetsAmount('ctotAssets','cimmovablePropertyvalue','cgovernmentsecuritiesvalue','cinsurancepoliciesvalue','cchits_kurisvalue','csharesvalue','cMFsvalue','cdebenturesvalue','cBankFixedDepositsvalue','cProvidentFundvalue',
										  'cGoldOrnamentsvalue','cVehiclesSelfOwnedvalue','cOtherAssetsvalue')"   type="text"></td>

                                            <td align="center">

                                            <input type="checkbox" value="yes"  onclick="CheckAsssetsAmountEntered('csharesvalue',this)" <?php
							            if($row12){ 
										
										if($fetch_assets2['csharesCollateral'] == 'yes')
										{
										
										          echo "checked"; 
										 } 
										 else {
										         echo 'disabled=disabled';
                                               }

										 }  ?> <?php if($cassets_investments == 'No')

                                                  { echo 'disabled=disabled'; 

												  } ?> 

                                             <?php if($readonly)  echo  'disabled="disabled"'; ?> name="csharesCollateral" id="csharesCollateral"></td>

                                    </tr>
									 <tr>

                                            <td>

                                            <input id="cMFs" <?php if($row12){ if($fetch_assets2['cMFsvalue'] > 0){ echo "checked"; } } ?>  

                                             <?php if($readonly) echo  'disabled="disabled"'; ?>	name="cMFs"  type="checkbox" onClick="return  onTypeofAssetsChecked('cMFs','cMFsvalue','cMFsCollateral')">Investment in MFs</td>

                                            <td>

                                            <input  maxlength="10"    onkeyup="allowonlynumeric(this)" onClick="return  removeStartingZero(this)" value="<?php if($row12){  
											
											echo $fetch_assets2['cMFsvalue']; 
											} 
                                             else {
											 
									         echo '0'; } ?>"
											<?php if($cassets_investments == 'No')

                                                  { ?>disabled="disabled" <?php }?> 

                                             <?php if($readonly) echo  'disabled="disabled"'; ?> name="cMFsvalue" id="cMFsvalue" onchange="calculateTotalAssetsAmount('ctotAssets','cimmovablePropertyvalue','cgovernmentsecuritiesvalue','cinsurancepoliciesvalue','cchits_kurisvalue','csharesvalue','cMFsvalue','cdebenturesvalue','cBankFixedDepositsvalue','cProvidentFundvalue',
										  'cGoldOrnamentsvalue','cVehiclesSelfOwnedvalue','cOtherAssetsvalue')"   type="text"></td>

                                            <td align="center">

                                            <input type="checkbox" value="yes"  onclick="CheckAsssetsAmountEntered('cMFsvalue',this)" <?php
							            if($row12){ 
										
										if($fetch_assets2['cMFsCollateral'] == 'yes')
										{
										
										          echo "checked"; 
										 } 
										 else {
										         echo 'disabled=disabled';
                                               }

										 }  ?> <?php if($cassets_investments == 'No')

                                                  { echo 'disabled=disabled'; 

												  } ?> 

                                             <?php if($readonly)  echo  'disabled="disabled"'; ?>  name="cMFsCollateral" id="cMFsCollateral"></td>

                                    </tr>
									 <tr>

                                            <td>

                                            <input id="cdebentures" <?php if($row12){ if($fetch_assets2['cdebenturesvalue'] > 0){ echo "checked"; } } ?>  

                                             <?php if($readonly) echo  'disabled="disabled"'; ?>	name="cdebentures"  type="checkbox"onClick="return  onTypeofAssetsChecked('cdebentures','cdebenturesvalue','cdebenturesCollateral')">Investment in debentures</td>

                                            <td>

                                            <input  maxlength="10"    onkeyup="allowonlynumeric(this)" onClick="return  removeStartingZero(this)" value="<?php if($row12){  
											
											echo $fetch_assets2['cdebenturesvalue']; 
											} 
                                             else {
											 
									         echo '0'; } ?>"
											<?php if($cassets_investments == 'No')

                                                  { ?> disabled="disabled" <?php }?> 

                                             <?php if($readonly) echo  'disabled="disabled"'; ?> name="cdebenturesvalue" id="cdebenturesvalue"       onchange="calculateTotalAssetsAmount('ctotAssets','cimmovablePropertyvalue','cgovernmentsecuritiesvalue','cinsurancepoliciesvalue','cchits_kurisvalue','csharesvalue','cMFsvalue','cdebenturesvalue','cBankFixedDepositsvalue','cProvidentFundvalue',
										  'cGoldOrnamentsvalue','cVehiclesSelfOwnedvalue','cOtherAssetsvalue')"   type="text"></td>

                                            <td align="center">

                                            <input type="checkbox"value="yes"  onclick="CheckAsssetsAmountEntered('cdebenturesvalue',this)" <?php
							            if($row12){ 
										
										if($fetch_assets2['cdebenturesCollateral'] == 'yes')
										{
										
										          echo "checked"; 
										 } 
										 else {
										         echo 'disabled=disabled';
                                               }

										 }  ?> <?php if($cassets_investments == 'No')

                                                  { echo 'disabled=disabled'; 

												  } ?> 

                                             <?php if($readonly)  echo  'disabled="disabled"'; ?> name="cdebenturesCollateral" id="cdebenturesCollateral"></td>

                                    </tr>
									 <tr>

                                            <td>

                                            <input id="cBankFixedDeposits" <?php if($row12){ if($fetch_assets2['cBankFixedDepositsvalue'] > 0){ echo "checked"; } } ?>  

                                             <?php if($readonly) echo  'disabled="disabled"'; ?>	name="cBankFixedDeposits"  type="checkbox" onClick="return  onTypeofAssetsChecked('cBankFixedDeposits','cBankFixedDepositsvalue','cBankFixedDepositsCollateral')">Bank fixed deposits</td>

                                            <td>

                                            <input  maxlength="10"    onkeyup="allowonlynumeric(this)" onClick="return  removeStartingZero(this)" value="<?php if($row12){  
											
											echo $fetch_assets2['cBankFixedDepositsvalue']; 
											} 
                                             else {
											 
									         echo '0'; } ?>"
											<?php if($cassets_investments == 'No')

                                                  { ?>disabled="disabled" <?php }?> 

                                             <?php if($readonly) echo  'disabled="disabled"'; ?> name="cBankFixedDepositsvalue" onchange="calculateTotalAssetsAmount('ctotAssets','cimmovablePropertyvalue','cgovernmentsecuritiesvalue','cinsurancepoliciesvalue','cchits_kurisvalue','csharesvalue','cMFsvalue','cdebenturesvalue','cBankFixedDepositsvalue','cProvidentFundvalue',
										  'cGoldOrnamentsvalue','cVehiclesSelfOwnedvalue','cOtherAssetsvalue')" id="cBankFixedDepositsvalue"   type="text"></td>

                                            <td align="center">

                                            <input type="checkbox" value="yes"  onclick="CheckAsssetsAmountEntered('cBankFixedDepositsvalue',this)" <?php
							            if($row12){ 
										
										if($fetch_assets2['cBankFixedDepositsCollateral'] == 'yes')
										{
										
										          echo "checked"; 
										 } 
										 else {
										         echo 'disabled=disabled';
                                               }

										 }  ?> <?php if($cassets_investments == 'No')

                                                  { echo 'disabled=disabled'; 

												  } ?> 

                                             <?php if($readonly)  echo  'disabled="disabled"'; ?> name="cBankFixedDepositsCollateral" id="cBankFixedDepositsCollateral"></td>

                                    </tr>
									 <tr>

                                            <td>

                                            <input id="cProvidentFund" <?php if($row12){ if($fetch_assets2['cProvidentFundvalue'] > 0){ echo "checked"; } } ?>  

                                             <?php if($readonly) echo  'disabled="disabled"'; ?>	name="cProvidentFund"  type="checkbox" onClick="return  onTypeofAssetsChecked('cProvidentFund','cProvidentFundvalue','cProvidentFundCollateral')">Provident Fund</td>

                                            <td>

                                            <input  maxlength="10"    onkeyup="allowonlynumeric(this)" onClick="return  removeStartingZero(this)" value="<?php if($row12){  
											
											echo $fetch_assets2['cProvidentFundvalue']; 
											} 
                                             else {
											 
									         echo '0'; } ?>"
											<?php if($cassets_investments == 'No')

                                                  { ?>disabled="disabled" <?php }?> 

                                             <?php if($readonly) echo  'disabled="disabled"'; ?> name="cProvidentFundvalue" id="cProvidentFundvalue"  onchange="calculateTotalAssetsAmount('ctotAssets','cimmovablePropertyvalue','cgovernmentsecuritiesvalue','cinsurancepoliciesvalue','cchits_kurisvalue','csharesvalue','cMFsvalue','cdebenturesvalue','cBankFixedDepositsvalue','cProvidentFundvalue',
										  'cGoldOrnamentsvalue','cVehiclesSelfOwnedvalue','cOtherAssetsvalue')"   type="text"></td>

                                            <td align="center">

                                            <input type="checkbox" value="yes"  onclick="CheckAsssetsAmountEntered('cProvidentFundvalue',this)" <?php
							            if($row12){ 
										
										if($fetch_assets2['cProvidentFundCollateral'] == 'yes')
										{
										
										          echo "checked"; 
										 } 
										 else {
										         echo 'disabled=disabled';
                                               }

										 }  ?> <?php if($cassets_investments == 'No')

                                                  { echo 'disabled=disabled'; 

												  } ?> 

                                             <?php if($readonly)  echo  'disabled="disabled"'; ?> name="cProvidentFundCollateral" id="cProvidentFundCollateral"></td>

                                    </tr>
									 <tr>

                                            <td>

                                            <input id="cGoldOrnaments" <?php if($row12){ if($fetch_assets2['cGoldOrnamentsvalue'] > 0){ echo "checked"; } } ?>  

                                             <?php if($readonly) echo  'disabled="disabled"'; ?>	name="cGoldOrnaments"  type="checkbox" onClick="return  onTypeofAssetsChecked('cGoldOrnaments','cGoldOrnamentsvalue','cGoldOrnamentsCollateral')">Gold Ornaments</td>

                                            <td>

                                            <input  maxlength="10"    onkeyup="allowonlynumeric(this)" onClick="return  removeStartingZero(this)" value="<?php if($row12){  
											
											echo $fetch_assets2['cGoldOrnamentsvalue']; 
											} 
                                             else {
											 
									         echo '0'; } ?>"
											<?php if($cassets_investments == 'No')

                                                  { ?>disabled="disabled" <?php }?> 

                                             <?php if($readonly) echo  'disabled="disabled"'; ?> onchange="calculateTotalAssetsAmount('ctotAssets','cimmovablePropertyvalue','cgovernmentsecuritiesvalue','cinsurancepoliciesvalue','cchits_kurisvalue','csharesvalue','cMFsvalue','cdebenturesvalue','cBankFixedDepositsvalue','cProvidentFundvalue',
										  'cGoldOrnamentsvalue','cVehiclesSelfOwnedvalue','cOtherAssetsvalue')" name="cGoldOrnamentsvalue" id="cGoldOrnamentsvalue" type="text"></td>

                                            <td align="center">

                                            <input type="checkbox" value="yes"  onclick="CheckAsssetsAmountEntered('cGoldOrnamentsvalue',this)" <?php
							            if($row12){ 
										
										if($fetch_assets2['cGoldOrnamentsCollateral'] == 'yes')
										{
										
										          echo "checked"; 
										 } 
										 else {
										         echo 'disabled=disabled';
                                               }

										 }  ?> <?php if($cassets_investments == 'No')

                                                  { echo 'disabled=disabled'; 

												  } ?> 

                                             <?php if($readonly)  echo  'disabled="disabled"'; ?> name="cGoldOrnamentsCollateral" id="cGoldOrnamentsCollateral"></td>

                                    </tr>
									 <tr>

                                            <td>

                                            <input id="cVehiclesSelfOwned" <?php if($row12){ if($fetch_assets2['cVehiclesSelfOwnedvalue'] > 0){ echo "checked"; } } ?>  

                                             <?php if($readonly) echo  'disabled="disabled"'; ?>	name="cVehiclesSelfOwned"  type="checkbox" onClick="return  onTypeofAssetsChecked('cVehiclesSelfOwned','cVehiclesSelfOwnedvalue','cVehiclesSelfOwnedCollateral')">Vehicles Self Owned</td>

                                            <td>

                                            <input  maxlength="10"    onkeyup="allowonlynumeric(this)" onClick="return  removeStartingZero(this)" value="<?php if($row12){  
											
											echo $fetch_assets2['cVehiclesSelfOwnedvalue']; 
											} 
                                             else {
											 
									         echo '0'; } ?>"
											<?php if($cassets_investments == 'No')

                                                  { ?>disabled="disabled" <?php }?> 

                                             <?php if($readonly) echo  'disabled="disabled"'; ?>onchange="calculateTotalAssetsAmount('ctotAssets','cimmovablePropertyvalue','cgovernmentsecuritiesvalue','cinsurancepoliciesvalue','cchits_kurisvalue','csharesvalue','cMFsvalue','cdebenturesvalue','cBankFixedDepositsvalue','cProvidentFundvalue',
										  'cGoldOrnamentsvalue','cVehiclesSelfOwnedvalue','cOtherAssetsvalue')" name="cVehiclesSelfOwnedvalue" id="cVehiclesSelfOwnedvalue"   type="text"></td>

                                            <td align="center">

                                            <input type="checkbox" value="yes"  onclick="CheckAsssetsAmountEntered('cVehiclesSelfOwnedvalue',this)" <?php
							            if($row12){ 
										
										if($fetch_assets2['cVehiclesSelfOwnedCollateral'] == 'yes')
										{
										
										          echo "checked"; 
										 } 
										 else {
										         echo 'disabled=disabled';
                                               }

										 }  ?> <?php if($cassets_investments == 'No')

                                                  { echo 'disabled=disabled'; 

												  } ?> 

                                             <?php if($readonly)  echo  'disabled="disabled"'; ?> name="cVehiclesSelfOwnedCollateral" id="cVehiclesSelfOwnedCollateral"></td>

                                    </tr>
									<tr>

                                            <td>

                                            <input id="cOtherAssets" <?php if($row12){ if($fetch_assets2['cOtherAssetsvalue'] > 0){ echo "checked"; } } ?>  

                                             <?php if($readonly) echo  'disabled="disabled"'; ?>	name="cOtherAssets"  type="checkbox" onClick="return  onTypeofAssetsChecked('cOtherAssets','cOtherAssetsvalue','cOtherAssetsCollateral')">Other Assets Owned ( TV, Fridge ,etc )</td>

                                            <td>

                                            <input  maxlength="10"    onkeyup="allowonlynumeric(this)" onClick="return  removeStartingZero(this)" value="<?php if($row12){  
											
											echo $fetch_assets2['cOtherAssetsvalue']; 
											} 
                                             else {
											 
									         echo '0'; } ?>"
											<?php if($cassets_investments == 'No')

                                                  { ?>disabled="disabled" <?php }?> 

                                             <?php if($readonly) echo  'disabled="disabled"'; ?> onchange="calculateTotalAssetsAmount('ctotAssets','cimmovablePropertyvalue','cgovernmentsecuritiesvalue','cinsurancepoliciesvalue','cchits_kurisvalue','csharesvalue','cMFsvalue','cdebenturesvalue','cBankFixedDepositsvalue','cProvidentFundvalue',
										  'cGoldOrnamentsvalue','cVehiclesSelfOwnedvalue','cOtherAssetsvalue')" name="cOtherAssetsvalue" id="cOtherAssetsvalue"   type="text"></td>

                                            <td align="center">

                                            <input type="checkbox" value="yes"  onclick="CheckAsssetsAmountEntered('cOtherAssetsvalue',this)" <?php
							            if($row12){ 
										
										if($fetch_assets2['cOtherAssetsCollateral'] == 'yes')
										{
										
										          echo "checked"; 
										 } 
										 else {
										         echo 'disabled=disabled';
                                               }

										 }  ?> <?php if($cassets_investments == 'No')

                                                  { echo 'disabled=disabled'; 

												  } ?> 

                                             <?php if($readonly)  echo  'disabled="disabled"'; ?> name="cOtherAssetsCollateral" id="cOtherAssetsCollateral"></td>

                                    </tr>

                            </table></div>

							
                         </td>
					</tr>
					
					<tr>

                            <td  <?php if($cassets_investments == 'No') { ?> style="display:none" <?php } ?> id="ctotAssets1">Total Assets Amount</td>

                            <td   <?php if($cassets_investments == 'No') { ?> style="display:none" <?php } ?> id="ctotAssets2">:</td>

                            <td>

                            <input  <?php if($cassets_investments == 'No') { ?> style="display:none" <?php } ?> id="ctotAssets" value="<?php if($row12 && $cassets_investments == 'Yes' ){ 
										
										
										
										         echo $fetch_assets2['ctotal_AssetsAmount'];
										 } ?>" name="ctotAssets" readonly="readonly" size="40" type="text"></td>

                    </tr>
					<?php } ?>
                <?php if($fetchinfo1['Any_Other_Outstanding_Loan']=='YES') { ?>



						<tr>

							<td>Any Other Outstanding Loan</td>

							<td>:</td>

							<td>

							<input id="cloan1" name="cloan"  type="radio" value="Yes" 

                                                               onclick="onSelectedOutstandingLoan('housing','car','jeep','twowheeler','consDurable',false)"

                                                            <?php if($readonly) echo 'disabled=disabled'; 

                                                                            ?>

                                                                 <?php if($row22){

								if($fetch2['cloan'] == 'Yes')

								{        echo "checked='checked'";      }	}

                                                                

								 ?> >Yes

							<input id="cloan2"  name="cloan" type="radio" value="No" 

                                                               onclick="onSelectedOutstandingLoan('housing','car','jeep','twowheeler','consDurable',true);

                                                                        enableDisabledAssetsChecked(false,'housingamt','housingemi');

                                                                        enableDisabledAssetsChecked(false,'caramt','caremi');

                                                                        enableDisabledAssetsChecked(false,'jeepamt','jeepemi');

                                                                        enableDisabledAssetsChecked(false,'twowheeleramt','twowheeleremi');

                                                                        enableDisabledAssetsChecked(false,'consamt','consemi');

                                                                        enableDisabledAssetsChecked(false,'totamount','totemi');"

                                                               <?php if($readonly) echo 'disabled=disabled'; 

                                                                            ?>

                                                                <?php if($row22){

								if($fetch2['cloan'] == 'No')

								{        echo "checked='checked'";      }	}

                                                                

								 ?>>No</td>

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

                            <td>Outstanding Amount</td>

                            <td>EMI amount</td>

                    </tr>



                   

                                                                                                        

                    <tr>

                        <td>

                            <input  id="housing" name="housing" type="checkbox"

                                    <?php if($readonly) {echo 'disabled=disabled'; }

                                             if($row22){if($fetch2['cloan'] == 'No')

                                            { ?>  disabled="disabled" <?php } }?>

                                    <?php if($row22){ if($fetch2['housingamt'] > 0){ echo "checked";}}?> 

                                    onclick="onAssetsChecked(this,'housingamt','housingemi');calculateAmount('totamount','housingamt','caramt','jeepamt','twowheeleramt','consamt');" 

                                    >Housing

                        </td>

                        <td>

                            <input maxlength="7" id="housingamt" name="housingamt"  type="text"

                                    value="<?php if($row22) { echo $fetch2['housingamt']; } ?>"

                                           <?php if($readonly) echo 'readonly=readonly'; 

                                           if($row22){if($fetch2['cloan'] == 'No')

                                            { ?>  disabled="disabled" <?php }} ?>

                                    onchange="calculateAmount('totamount','housingamt','caramt','jeepamt','twowheeleramt','consamt')" >

                        </td>

                        <td>

                            <input maxlength="7" name="housingemi" id="housingemi"  type="text"

                                    value="<?php if($row22) { echo $fetch2['housingemi']; } ?>"  

                                           <?php if($readonly) echo 'readonly=readonly'; 

                                           if($row22){if($fetch2['cloan'] == 'No')

                                            { ?>  disabled="disabled" <?php }} ?>

                                    onchange="calculateAmount('totemi','housingemi','caremi','jeepemi','twowheeleremi','consemi')" >

                        </td>

                    </tr>

                    <tr>

                            <td>

                            <input name="car"  id="car" type="checkbox"

                                    <?php if($row22){ if($fetch2['caramt'] > 0){ echo "checked";}}?>  

                                    <?php if($readonly) echo 'disabled=disabled'; 

                                          if($row22){if($fetch2['cloan'] == 'No')

                                            { ?>  disabled="disabled" <?php }} ?>

                                   onclick="onAssetsChecked(this,'caramt','caremi');calculateAmount('totamount','housingamt','caramt','jeepamt','twowheeleramt','consamt');"

                                   >Car

                            </td>

                            <td>

                            <input maxlength="7" name="caramt" id="caramt"  type="text"

                                    value="<?php if($row22) { echo $fetch2['caramt']; } ?>"

                                           <?php if($readonly) echo 'readonly=readonly';

                                           if($row22){if($fetch2['cloan'] == 'No')

                                            { ?>  disabled="disabled" <?php }} ?>

                                    onchange="calculateAmount('totamount','housingamt','caramt','jeepamt','twowheeleramt','consamt')" >

                            </td>

                            <td>

                            <input maxlength="7" name="caremi" id="caremi"   type="text"

                                    value="<?php if($row22) { echo $fetch2['caremi']; } ?>" 

                                           <?php if($readonly) echo 'readonly=readonly'; 

                                           if($row22){if($fetch2['cloan'] == 'No')

                                            { ?>  disabled="disabled" <?php }} ?>

                                     onchange="calculateAmount('totemi','housingemi','caremi','jeepemi','twowheeleremi','consemi')" >

                            </td>



                    </tr>

                    <tr>

                            <td>

                            <input  name="jeep" id="jeep" type="checkbox"

                                    <?php if($row22){ if($fetch2['jeepamt'] > 0){ echo "checked";}}?> 

                                    <?php if($readonly) echo 'disabled=disabled'; 

                                          if($row22){if($fetch2['cloan'] == 'No')

                                            { ?>  disabled="disabled" <?php }} ?>

                                    onclick="onAssetsChecked(this,'jeepamt','jeepemi');calculateAmount('totamount','housingamt','caramt','jeepamt','twowheeleramt','consamt');" 

                                    >Jeep

                            </td>

                            <td>

                            <input maxlength="7" name="jeepamt" id="jeepamt"  type="text"

                                    value="<?php if($row22) { echo $fetch2['jeepamt']; } ?>"

                                           <?php if($readonly) echo 'readonly=readonly'; 

                                           if($row22){if($fetch2['cloan'] == 'No')

                                            { ?>  disabled="disabled" <?php }} ?>

                                   onchange="calculateAmount('totamount','housingamt','caramt','jeepamt','twowheeleramt','consamt')" >

                            </td>

                            <td>

                            <input maxlength="7" name="jeepemi" id="jeepemi"   type="text"

                                    value="<?php if($row22) { echo $fetch2['jeepemi']; } ?>"

                                           <?php if($readonly) echo 'readonly=readonly'; 

                                           if($row22){if($fetch2['cloan'] == 'No')

                                            { ?>  disabled="disabled" <?php }} ?>

                                   onchange="calculateAmount('totemi','housingemi','caremi','jeepemi','twowheeleremi','consemi')" >

                            </td>



                    </tr>

                    <tr>

                            <td>

                            <input name="twowheeler" id="twowheeler" type="checkbox"

                                    <?php if($row22){ if($fetch2['twowheeleramt'] > 0){ echo "checked";}}?> 

                                    <?php if($readonly) echo 'disabled=disabled'; 

                                          if($row22){if($fetch2['cloan'] == 'No')

                                            { ?>  disabled="disabled" <?php }} ?>

                                   onclick="onAssetsChecked(this,'twowheeleramt','twowheeleremi');calculateAmount('totamount','housingamt','caramt','jeepamt','twowheeleramt','consamt');"

                                   >Two-wheeler

                            </td>

                            <td>

                            <input maxlength="7" name="twowheeleramt" id="twowheeleramt"  type="text"

                                        value="<?php if($row22) { echo $fetch2['twowheeleramt']; } ?>"

                                               <?php if($readonly) echo 'readonly=readonly'; 

                                               if($row22){if($fetch2['cloan'] == 'No')

                                            { ?>  disabled="disabled" <?php }} ?>

                                        onchange="calculateAmount('totamount','housingamt','caramt','jeepamt','twowheeleramt','consamt')" >

                            </td>

                            <td>

                            <input maxlength="7" name="twowheeleremi" id="twowheeleremi"   type="text"	

                                    value="<?php if($row22) { echo $fetch2['twowheeleremi']; } ?>"

                                    <?php if($readonly) echo 'readonly=readonly'; 

                                    if($row22){if($fetch2['cloan'] == 'No')

                                            { ?>  disabled="disabled" <?php }} ?>

                                    onchange="calculateAmount('totemi','housingemi','caremi','jeepemi','twowheeleremi','consemi')" >

                            </td>



                    </tr>

                    <tr>

                            <td>

                            <input name="consDurable" id="consDurable" type="checkbox"

                                    <?php if($row22){ if($fetch2['consamt'] > 0){ echo "checked";}}?> 

                                    <?php if($readonly) echo 'disabled=disabled'; 

                                          if($row22){if($fetch2['cloan'] == 'No')

                                            { ?>  disabled="disabled" <?php }} ?>

                                   onclick="onAssetsChecked(this,'consamt','consemi');calculateAmount('totamount','housingamt','caramt','jeepamt','twowheeleramt','consamt');"

                                   >Consumer Durables

                            </td>

                            <td>

                            <input maxlength="7" name="consamt" id="consamt"  type="text"

                                    value="<?php if($row22) { echo $fetch2['consamt']; } ?>"

                                    <?php if($readonly) echo 'readonly=readonly'; 

                                    if($row22){if($fetch2['cloan'] == 'No')

                                            { ?>  disabled="disabled" <?php }} ?>

                                    onchange="calculateAmount('totamount','housingamt','caramt','jeepamt','twowheeleramt','consamt')" >

                            </td>

                            <td>

                            <input maxlength="7" name="consemi" id="consemi"   type="text"

                                    value="<?php if($row22) { echo $fetch2['consemi']; } ?>" 

                                    <?php if($readonly) echo 'readonly=readonly'; 

                                    if($row22){if($fetch2['cloan'] == 'No')

                                            { ?>  disabled="disabled" <?php }} ?>

                                    onchange="calculateAmount('totemi','housingemi','caremi','jeepemi','twowheeleremi','consemi')" >

                            </td>



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

                            <input id="totamount" name="totamount"  size="40" type="text" readonly="readonly"

                                    value="<?php if($row22 && $fetch2['cloan'] == 'Yes') { echo $fetch2['totamt']; } ?>"   

                                    <?php if($readonly) echo 'readonly=readonly'; ?>></td>

                    </tr>
					 <?php } ?>
                <?php if($fetchinfo1['Total_EMI']=='YES') { ?>

                    <tr>

                            <td>Total EMI Amount</td>

                            <td>:</td>

                            <td>

                            <input id="totemi"  name="totemi"  size="40" type="text" readonly="readonly"

                                   value="<?php if($row22 && $fetch2['cloan'] == 'Yes') { echo $fetch2['totemi']; } ?>"

                                    <?php if($readonly) echo 'readonly=readonly';   ?>></td>

                    </tr>
					<?php } ?>
                <?php if($fetchinfo1['Average_Monthly_Bank_Balance_for_Last_3_months']=='YES') { ?>



                   <tr>

                            <td>Average Monthly Bank Balance for Last 3 months</td>

                            <td>:</td>

                            <td>

                            <input id="cbankbal" maxlength="7" name="cbankbal" size="40" type="text" 

                                    value="<?php if($row22) { echo $fetch2['cbankbal']; } ?>" 

                                    <?php if($readonly) echo 'readonly=readonly'; 

                                                ?>></td>

                    </tr>
					 <?php } ?>
					
                    <tr>

                            <td height="5"></td>

                    </tr>

                    <tr>

                            <td class="heading" colspan="3" style="height: 26px">

                                <input name="chkpanel2" id="chkpanel2" type="checkbox" 

                                    <?php if($readonly) 

                                    { echo 'disabled=disabled';} if(!$rowc2){ }else{ echo "checked"; }?> >

                                      Select to add Co-Borrower 2 Details

                            </td>

                    </tr>

                    <tr>

                            <td height="5"></td>

                    </tr>

                                                
               </table></div></td></tr>
					
<!-- --------------------------------  coborrower2_panel start ------------------------------------------------------------------------------ -->                                              

                    <tr

                        ><td colspan="3"><div id="coborrower2_panel" 

                                <?php if(!$rowc2){echo "style='display: none'"; }else{ echo "style='display:block'"; }?>    ><table>
								
					<?php if($fetchinfo1['Relation_with_Applicant']=='YES') { ?>

                    <tr> 

                            <td>Relation with Applicant</td>

                            <td>:</td>

                            <td>

                                    <select id="corelation" name="corelation" size="1" 

                                                onchange="return onSelectedIndexChange(this,'corelative')"

                                                <?php if($readonly) echo "disabled='disabled'"; 

                                                     ?>>
                                                  <option>Select</option>
                                           <?php
										
										$q1=  mysql_query("select Relation from relation");

										while($n1 = @mysql_fetch_assoc($q1)){?>
													<option <?php if($rowc2){if($fetchc2['relation']==$n1['Relation']){ echo " selected='selected'";}}?>
														value="<?php echo $n1['Relation']; ?>"><?php echo $n1['Relation']; ?></option>
										 <?php } ?>

                                    </select>  



                                    <select id="corelative" name="corelative" size="1" 

                                        <?php if($readonly) echo 'disabled=disabled'; 

                                        if($rowc2){if($fetchc2['relation']!='Relative') echo "disabled='disabled'"; }?>>

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
				 <?php } ?>
					<?php if($fetchinfo1['First_Name']=='YES') { ?>

                <tr>

                        <td>First Name</td>

                        <td>:</td>

                        <td>

                        <input id="cofirstname" name="cofirstname" size="40" type="text" 

                                value="<?php if($rowc2) { echo $fetchc2['cfirstname']; } ?>"   

                                <?php if($readonly) echo 'readonly=readonly'; 

                                            ?>></td>

                </tr>
				 <?php } ?>
                <?php if($fetchinfo1['Middle_Name']=='YES') { ?>
                <tr>

                        <td>Middle Name</td>

                        <td>:</td>

                        <td>

                        <input id="comiddlename" name="comiddlename" size="40" type="text"  

                                value="<?php if($rowc2) { echo $fetchc2['cmiddlename']; } ?>" 

                                <?php if($readonly) echo 'readonly=readonly'; 

                                            ?>></td>
                <?php } ?>
                </tr>
					<?php if($fetchinfo1['Last_Name']=='YES') { ?>

                <tr>

                        <td>Last Name</td>

                        <td>:</td>

                        <td>

                        <input id="colastname" name="colastname" size="40" type="text" 

                                value="<?php if($rowc2) { echo $fetchc2['clastname']; } ?>"

                                <?php if($readonly) echo 'readonly=readonly'; 

                                            ?>></td>

                </tr>
				 <?php } ?>
					<?php if($fetchinfo1['Date_of_Birth']=='YES') { ?>

                <tr>

                        <td>Date of Birth</td>

                        <td>:</td>

                        <td>

                        <input id="datepicker3" name="datepicker3" size="40" type="text" 

                                value="<?php if($rowc2) {$originaldate=  $fetchc2['cdob']; 



                                $newdate=date("d-m-Y",strtotime($originaldate));

                                echo $newdate;

                                } ?>"

                                <?php if($readonly) echo 'readonly=readonly'; 

                                            ?>></td>

                </tr>
				<?php } ?>
					<?php if($fetchinfo1['Aadhar_Card_No']=='YES') { ?>
				<tr>

                        <td>Aadhar Card No.</td>

                        <td>:</td>

                        <td>

                        <input id="coadharcardno" maxlength="12" name="coadharcardno" size="40" type="text" 

                                value="<?php if($rowc2) { echo $fetchc2['cadharcardno']; } ?>" 

                                <?php if($readonly) echo 'readonly=readonly'; 

                                            ?>></td>
											<?php 
											if($_SESSION['usertype'] == 'Employee') { 
      											?>
												
									 <?php if($coadhardoc_name!='' || $copandoc_name!='' || $cophoto_name!='' ) { ?>
					
												<td >
												
											<a href="#" onClick="mywindow('open','<?php echo $coadhardoc_name ?>','<?php echo $copandoc_name; ?>','<?php echo $cophoto_name; ?>','')" ><input type="button" value="View KYC"> </a>
											<a href="#" onClick="closewindow()" ><input type="button" value="Close KYC"> </a>
												</td>
												
											<?php } }	?>

                </tr>
				<?php } ?>
					<?php if($fetchinfo1['PAN_No']=='YES') { ?>

                <tr>

                        <td>PAN No.</td>

                        <td>:</td>

                        <td>

                        <input id="copanno" maxlength="10" name="copanno" size="40" type="text" 

                                value="<?php if($rowc2) { echo $fetchc2['cpanno']; } ?>" 

                                <?php if($readonly) echo 'readonly=readonly'; 

                                            ?>></td>

                </tr>
				 <?php } ?>
					<?php if($fetchinfo1['Email_Address']=='YES') { ?>

                <tr>

                        <td>Email Address</td>

                        <td>:</td>

                        <td>

                        <input id="coemail" name="coemail" size="40" type="text" 

                                value="<?php if($rowc2) { echo $fetchc2['cemail']; } ?>" 

                                <?php if($readonly) echo 'readonly=readonly'; 

                                            ?>></td>

                </tr>
				 <?php } ?>
				 
				 <tr>

                            <td>Do You want to provide your bank details?</td>

                            <td>:</td>

                            <td>

                            <input  id="cobankdetails"  name="cobankdetails" type="radio" <?php if($readonly) echo 'disabled=disabled'; ?>
							<?php if($rowc2) {  if($fetchc2['cbankdetails']=='Yes') { echo "checked='checked'"; } } ?>
							value="Yes" onclick="onselectbankdetails(this,false,'coaccountNo','coaccountholder','cobankname','cobranchname','cobranchadd','coifsccode','cobankdetails','comicr')">Yes
							<input  id="cobankdetails"  name="cobankdetails" type="radio" <?php if($readonly) echo 'disabled=disabled'; ?> 
							<?php if($rowc2) {  if($fetchc2['cbankdetails']=='No'||$fetchc2['cbankdetails']=='') { echo "checked='checked'"; } }
						    else { echo "checked='checked'";  }   ?>  
							value="No" onclick="onselectbankdetails(this,true,'coaccountNo','coaccountholder','cobankname','cobranchname','cobranchadd','coifsccode','cobankdetails','comicr')">No
							
                            
                        </td>

                    </tr>
					
                        <tr id="cobankdetails6" <?php if($rowc2) {  if($fetchc2['cbankdetails']=='No'||$fetchc2['cbankdetails']=='') { ?>   style="display:none" <?php }} ?>>
						     <td><label id="lblIFSCCode">IFSC Code</label></td>
							 <td>:</td>
							 <td><input maxlength="18" size="40" id="coifsccode" name="coifsccode"  
							 <?php if($readonly) echo 'readonly=readonly';  if($rowc2) {  if($fetchc2['cbankdetails']!='Yes') { echo 'disabled=disabled'; }}
							     else { echo "disabled=disabled";  } ?>

                                   onKeyup="getbankdetailfromifsc('coifsccode','cobankname','cobranchname','cobranchadd','comicr')"    value="<?php if($rowc2) {  if($fetchc2['cbankdetails']=='Yes') { echo $fetch_cobankinfo['ifsccode']; } } ?>" id="ifsccode" type="text">
							 
							</td>
						</tr>
					<tr id="cobankdetails1" <?php if($rowc2) {  if($fetchc2['cbankdetails']=='No'||$fetchc2['cbankdetails']=='') { ?>style="display:none" <?php }} ?> >
					     <td>Account No.</td>
						 <td>:</td>
						 
                            <td>
                               <input maxlength="18" size="40"  id="coaccountNo" name="coaccountNo" onkeypress="return isNumber(event)"  id="accountNo" 
							   type="text"  <?php if($readonly) echo 'readonly=readonly';  if($rowc2) {  if($fetchc2['cbankdetails']!='Yes') { echo 'disabled=disabled'; }}
							                   else { echo "disabled=disabled";  } ?>

                                                value="<?php if($rowc2) {  if($fetchc2['cbankdetails']=='Yes') { echo $fetch_cobankinfo['accountNo']; } } ?>">
							</td>
					</tr>


                     <tr id="cobankdetails2" <?php if($rowc2) {  if($fetchc2['cbankdetails']=='No'||$fetchc2['cbankdetails']=='') { ?> style="display:none" <?php }} ?> >
								<td ><label id="AccountHolder"  >Account Holder</label></td>
                                <td>:</td>
								<td>
                                   <input maxlength="50"  size="40" id="coaccountholder" name="coaccountholder"  type="text" 
								    <?php if($readonly) echo 'readonly=readonly';  if($rowc2) {  if($fetchc2['cbankdetails']!='Yes') { echo 'disabled=disabled'; }}
									 else { echo "disabled=disabled";  }?>

                                                value="<?php if($rowc2) {  if($fetchc2['cbankdetails']=='Yes') { $fetch_cobankinfo['accountholder']; } } ?>">
									</td>
						</tr>


					     <tr id="cobankdetails3"  <?php if($rowc2) {  if($fetchc2['cbankdetails']=='No'||$fetchc2['cbankdetails']=='') { ?>  style="display:none" <?php } } ?>>
								<td ><label id="BankName" >Bank Name</label></td>
								<td>:</td>
								<td>
									<input maxlength="50"  size="40" id="cobankname" name="cobankname" 
									type="text"  <?php if($readonly) echo 'readonly=readonly';  if($rowc2) {  if($fetchc2['cbankdetails']!='Yes') { echo 'disabled=disabled'; }}
									  else { echo "disabled=disabled";  } ?>

                                                value="<?php if($rowc2) {  if($fetchc2['cbankdetails']=='Yes') { echo $fetch_cobankinfo['bankname']; } } ?>">
								</td>
						</tr>
                        <tr id="cobankdetails4" <?php if($rowc2) {  if($fetchc2['cbankdetails']=='No'||$fetchc2['cbankdetails']=='') { ?>   style="display:none" <?php }} ?>>
						     <td ><label id="BranchName">Branch Name</label></td>
							 <td>:</td>
							 <td>
                                <input maxlength="50"  size="40" id="cobranchname" name="cobranchname"  type="text"
								<?php if($readonly) echo 'readonly=readonly';  if($rowc2) {  if($fetchc2['cbankdetails']!='Yes') { echo 'disabled=disabled'; }}
								 else { echo "disabled=disabled";  } ?>

                                                value="<?php if($rowc2) {  if($fetchc2['cbankdetails']=='Yes') { echo $fetch_cobankinfo['branchname']; } } ?>">
							</td>
						</tr>

                        <tr id="cobankdetails5" <?php if($rowc2) {  if($fetchc2['cbankdetails']=='No'||$fetchc2['cbankdetails']=='') { ?>   style="display:none" <?php }} ?>>
						    <td><label id="BranchLocation">Branch Location</label></td>
							<td>:</td>
							<td>
                               <input maxlength="50" size="40" id="cobranchadd" name="cobranchadd" type="text"
							   <?php if($readonly) echo 'readonly=readonly';  if($rowc2) {  if($fetchc2['cbankdetails']!='Yes') { echo 'disabled=disabled'; }}
							    else { echo "disabled=disabled";  } ?>

                                                value="<?php if($rowc2) {  if($fetchc2['cbankdetails']=='Yes') { echo $fetch_cobankinfo['branchadd']; } } ?>"> 
							</td>
						</tr>

						<tr id="cobankdetails7" <?php if($rowc2) {  if($fetchc2['cbankdetails']=='No'||$fetchc2['cbankdetails']=='') { ?>   style="display:none" <?php }} ?>>
						     <td><label id="lblMICRCode">MICR</label></td>
							 <td>:</td>
							 <td><input maxlength="18" size="40" id="comicr" name="comicr"  
							 <?php if($readonly) echo 'readonly=readonly';  if($rowc2) {  if($fetchc2['cbankdetails']!='Yes') { echo 'disabled=disabled'; }}
							  else { echo "disabled=disabled";  } ?>

                                                value="<?php if($rowc2) {  if($fetchc2['cbankdetails']=='Yes') { echo $fetch_cobankinfo['micr']; } } ?>" type="text">
							 
							</td>
						</tr>

                

                <tr>

                        <td bgcolor="#E6F0FA" colspan="3">

                        <input name="cosame" onclick="return onclickCoSameAddress(this)" type="checkbox"  

                            <?php if($rowc2){

                                    if($fetchc2['samestudadd'] == 'on')

                                        { echo "checked='checked'";  }	}

                            ?>>Same as Applicant's Address</td>

                </tr>
				<?php if($fetchinfo1['Address']=='YES') { ?>

                <tr>

                        <td>Address</td>

                        <td>:</td>

                        <td>

                        <input id="coaddress" name="coaddress" size="40" type="text" 

                                value="<?php if($rowc2) { echo $fetchc2['caddress']; } ?>" 
								<?php if($rowc2){

                                    if($fetchc2['samestudadd'] == 'on')

                                        { echo 'readonly=readonly';   }	} ?>

                                <?php if($readonly) echo 'readonly=readonly'; 

                                            ?>></td>

                </tr>
				 <?php } ?>
					<?php if($fetchinfo1['Street1']=='YES') { ?>

                <tr>

                        <td>Street1</td>

                        <td>:</td>

                        <td>

                        <input id="costreet1" name="costreet1" size="40" type="text" 

                                    value="<?php if($rowc2) { echo $fetchc2['cstreet1']; } ?>"
									
									<?php if($rowc2){

                                    if($fetchc2['samestudadd'] == 'on')

                                       { echo 'readonly=readonly';   }	} ?>

                                    <?php if($readonly) echo 'readonly=readonly'; 

                                            ?>></td>

                </tr>
				 <?php } ?>
					<?php if($fetchinfo1['Street2']=='YES') { ?>

                <tr>

                        <td>Street2 (optional)</td>

                        <td>:</td>

                        <td>

                        <input id="costreet2" name="costreet2" size="40" type="text" 

                                    value="<?php if($rowc2) { echo $fetchc2['cstreet2']; } ?>"

									<?php if($rowc2){

                                    if($fetchc2['samestudadd'] == 'on')

                                        { echo 'readonly=readonly';   }	} ?>
                                    <?php if($readonly) echo "readonly='readonly'"; 
                                            ?>></td></tr>
											
					<?php } ?>
					<?php if($fetchinfo1['State']=='YES') { ?>
                    <tr>

                           

                <tr>

                        <td>State</td>

                        <td>:</td>

                        <td>

                <input id="cocountry1" name="cocountry1"  type="text" onChange="changeState(this,'cocountry1','costate1','cocity1','cocountrySelect','costateSelect','cocitySelect');" 

                        value="<?php if($rowc2) { echo $fetchc2['cstate']; } ?>"  
						<?php if($rowc2){

                                    if($fetchc2['samestudadd'] == 'on')

                                        { echo 'readonly=readonly';   }	} ?>

                                <?php if($readonly) echo "readonly='readonly'"; ?>>

                <select disabled="disabled" style="display:none" id="cocountrySelect" name="cocountry" 

                        onchange="populateState('cocountrySelect','costateSelect'); populateCity('cocountrySelect','cocitySelect')" size="1">

                        </select>	

                     </td>

                </tr>
				<?php } ?>
					<?php if($fetchinfo1['District']=='YES') { ?>

                <tr>

                        <td>District</td>

                        <td>:</td>

                        <td>



                                <input id="costate1" name="costate1" type="text" onChange="changeState(this,'cocountry1','costate1','cocity1','cocountrySelect','costateSelect','cocitySelect');" 

                                        value="<?php if($rowc2) { echo $fetchc2['cdistrict']; } ?>" 
										
										<?php if($rowc2){

                                    if($fetchc2['samestudadd'] == 'on')

                                        { echo 'readonly=readonly';   }	} ?>

                                        <?php if($readonly) echo 'readonly=readonly'; ?>>



                    <select id="costateSelect" style="display:none" disabled="disabled" name="costate" size="1"></select>

                    <script type="text/javascript">initCountry('','cocountrySelect','costateSelect','cocitySelect');</script>



    <!--                         <input id="costateSelect" name="costateSelect" size="40" type="text" 

                        value="<?php if($rowc2) { echo $fetchc2['cdistrict']; } ?>"  

                        <?php if($readonly) echo 'readonly=readonly'; ?>>

    -->                 

                        </td>

                </tr>
				 <?php } ?>
					<?php if($fetchinfo1['City']=='YES') { ?>

                <tr>

                        <td>City</td>

                        <td>:</td>

                        <td align="left" valign="top">



                            <input id="cocity1" name="cocity1"  type="text" onChange="changeState(this,'cocountry1','costate1','cocity1','cocountrySelect','costateSelect','cocitySelect');" 

                        value="<?php if($rowc2) { echo $fetchc2['ccity']; } ?>" 
						
						<?php if($rowc2){

                                    if($fetchc2['samestudadd'] == 'on')

                                        { echo 'readonly=readonly';   }	} ?>

                                <?php if($readonly) echo 'readonly=readonly'; ?>>

                            <select id="cocitySelect"  style="display:none" disabled="disabled" name="cocity" size="1">

                        </select>

                        <script type="text/javascript">initCountry('','cocountrySelect','costateSelect','cocitySelect'); </script>



                <!--           

                                <input id="cocitySelect" name="cocitySelect" size="40" type="text" 

                        value="<?php if($rowc2) { echo $fetchc2['ccity']; } ?>" 

                        <?php if($readonly) echo 'readonly=readonly'; ?>>

                -->

                        </td>

                </tr>
				 <?php } ?>
					<?php if($fetchinfo1['Years_living_at_Current_Residence']=='YES') { ?>
                    <tr>

                            <td>Years  living at Current Residence</td>

							
                            <td>:</td>

                            <td>
							

                            <select   id="coyearsInResidence" name="coyearsInResidence" size="1"

                           <?php if($rowc2){

                                    if($fetchc2['samestudadd'] == 'on')

                                      { echo 'disabled=disabled'; ?> style="display:none"; <?php }  } ?>
										 <?php if($readonly) echo 'disabled=disabled'; ?> >

                            <option value="">Select</option>
							 <option <?php if($rowc2){

                                    if($fetchc2['cyearsInResidence'] == '<1')

                                    {        echo "selected='selected'";      }	}										     

                                    ?>><1</option>
							
							  <?php if($rowc2) {  if($fetchc2['cyearsInResidence']!='>15' && $fetchc2['cyearsInResidence']!='<1' && $fetchc2['cyearsInResidence']!='') { ?>	
                                          <script>
											filldropdown_numbersofSelected('coyearsInResidence', 1,15,1,<?php echo 
											$fetchc2['cyearsInResidence'].'+1';?>);
											
											</script> 
											<?php }  else { ?>
											<script>
											filldropdown_numbers('coyearsInResidence', 1,15);
											
											</script> <?php } } else { ?>
											<script>
											filldropdown_numbers('coyearsInResidence', 1,15);
											
											</script> <?php }  ?>

								 
								  <option <?php if($rowc2){

                                    if($fetchc2['cyearsInResidence'] == '>15')

                                    {        echo "selected='selected'";      }	}										     

                                    ?>>>15</option>
							   

                            

                          

                            </select>
							
							<input id="coyearsInResidence1" name="coyearsInResidence1" <?php if($rowc2){

                                    if($fetchc2['samestudadd'] == 'on')

                                        { echo 'readonly=readonly'; ?>  value="<?php if($rowc2){

                                          echo $fetchc2['cyearsInResidence'];      	}										     

                                    ?>" <?php   } else { ?> style="display:none" disabled="disabled"  <?php	} } else { ?> style="display:none" disabled="disabled"<?php }  ?>

                                        <?php if($readonly) echo 'readonly=readonly'; ?> ></td>
					
                    </tr>
					<?php } ?>
					<?php if($fetchinfo1['Residential_Status']=='YES') { ?>
										<tr>

                            <td>Residential Status</td>

                            <td>:</td>

                            <td>
							
							
							
                               <select   id="coResidentialStatus" name="coResidentialStatus" onchange="return onOtherSelectedIndexChange(this,'coresidentialstatus_others')" size="1"

                            	<?php if($rowc2){

                                    if($fetchc2['samestudadd'] == 'on')

                                      { echo 'disabled=disabled'; ?> style="display:none"; <?php }  } ?>
										 <?php if($readonly) echo 'disabled=disabled'; ?> > 

                            <option selected="selected">Select</option>
							<option <?php if($rowc2){

                                    if($fetchc2['cResidentialStatus'] == 'Staying with Friends or Hostel')

                                    {        echo "selected='selected'";      }	}										     

                                    ?>>Staying with Friends or Hostel</option>
							<option <?php if($rowc2){

                                    if($fetchc2['cResidentialStatus'] == 'Staying with Relative')

                                    {        echo "selected='selected'";      }	}										     

                                    ?> >Staying with Relative</option>
							<option <?php if($rowc2){

                                    if($fetchc2['cResidentialStatus'] == 'Self Rented/Paying Guest')

                                    {        echo "selected='selected'";      }	}										     

                                    ?>>Self Rented/Paying Guest</option>
							<option <?php if($rowc2){

                                    if($fetchc2['cResidentialStatus'] == 'Rented by Parents')

                                    {        echo "selected='selected'";      }	}										     

                                    ?>>Rented by Parents</option>
							<option <?php if($rowc2){

                                    if($fetchc2['cResidentialStatus'] == 'Company Owned')

                                    {        echo "selected='selected'";      }	}										     

                                    ?>>Company Owned</option>
							<option <?php if($rowc2){

                                    if($fetchc2['cResidentialStatus'] == 'Financed by Self')

                                    {        echo "selected='selected'";      }	}										     

                                    ?>>Financed by Self</option>
							<option <?php if($rowc2){

                                    if($fetchc2['cResidentialStatus'] == 'Financed by Parents')

                                    {        echo "selected='selected'";      }	}										     

                                    ?>>Financed by Parents</option>
							<option <?php if($rowc2){

                                    if($fetchc2['cResidentialStatus'] == 'Owned by Parents')

                                    {        echo "selected='selected'";      }	}										     

                                    ?>>Owned by Parents</option>
									<option <?php if($rowc2){

                                    if($fetchc2['cResidentialStatus'] == 'Other')

                                    {        echo "selected='selected'";      }	}										     

                                    ?>>Other</option>
                           
                           
                          

                            </select>
							
							
							<input id="coResidentialStatus1" name="coResidentialStatus1"  <?php if($rowc2){

                                    if($fetchc2['samestudadd'] == 'on')

                                        { echo 'readonly=readonly'; ?>  value="<?php if($rowc2){

                                          echo $fetchc2['cResidentialStatus'];      	}										     

                                 ?>" <?php   } else { ?> style="display:none" disabled="disabled"  <?php	} } else { ?> style="display:none" disabled="disabled"<?php }  ?>

                                        <?php if($readonly) echo 'readonly=readonly'; ?> >
										 <input id="coresidentialstatus_others" size="17" name="coresidentialstatus_others"  type="text" hidden="true"

                                                        value="<?php if($rowc2) { echo $fetchc2['cresidentialstatus_others']; } ?>" 

                                                        <?php if($readonly) { echo 'readonly=readonly';?>hidden="false" <?php } 

                                                        if($rowc2 && $fetchc2['cResidentialStatus']=='Other') {
														
														echo "style='display: block'";} 

                                                           ?>></td>

                    </tr>
					 <?php } ?>
					<?php if($fetchinfo1['Pincode']=='YES') { ?>

                <tr>

                        <td>Pincode</td>

                        <td>:</td>

                        <td>

                        <input id="copincode" maxlength="6" name="copincode" size="40" type="text" 

                                value="<?php if($rowc2) { echo $fetchc2['cpincode']; } ?>" 
								<?php if($rowc2){

                                    if($fetchc2['samestudadd'] == 'on')

                                        { echo 'readonly=readonly';   }	} ?>

                                <?php if($readonly) echo 'readonly=readonly'; 

                                            ?>></td>

                </tr>
				  <?php } ?>
				   <?php if($fetchinfo['per_Address']=='YES') { ?>
					   					  
					 
					 <tr>

                    <td bgcolor="#E6F0FA" colspan="3">

                    <input name="cosameadd" onclick="return onclickco2PermanentSameAddress(this)" type="checkbox"  

                        <?php if($rowc2){

                                if($fetchc2['cper_sameadd'] == 'on')

                                    {   echo "checked='checked'";   }	}

                                    ?>>Permanent Address same as above Address

                    </td>

            </tr>
			

            <tr>

                    <td>Address</td>

                    <td>:</td>

                    <td>

                    <input id="coper_address" name="coper_address" size="40" type="text"

                        value="<?php if($rowc2) { echo $fetchc2['cper_address']; } ?>" 
						
                        <?php if($rowc2){

                                if($fetchc2['cper_sameadd'] == 'on')

                                    { echo  'readonly=readonly';     }	}

                                    ?>						

                        <?php if($readonly) echo 'readonly=readonly'; 

                                        ?>></td>

            </tr>

               
              
                 <tr>

                    <td>Street1</td>

                    <td>:</td>

                    <td>

                    <input id="coper_street1" name="coper_street1" size="40" type="text" 

                        value="<?php if($rowc2) { echo $fetchc2['cper_street1']; } ?>" 
						
						<?php if($rowc2){

                                if($fetchc2['cper_sameadd'] == 'on')

                                    { echo  'readonly=readonly';     }	}

                                    ?>				

                        <?php if($readonly) echo 'readonly=readonly'; 

                                        ?>></td>

            </tr>
			<?php } ?>
				
				 <?php if($fetchinfo['per_Street2']=='YES') { ?>
            <tr>

                    <td>Street2 (optional)</td>

                    <td>:</td>

                    <td>

                    <input id="coper_street2" name="coper_street2" size="40" type="text"

                        value="<?php if($rowc2) { echo $fetchc2['cper_street2']; } ?>" 

                      <?php if($rowc2){

                                if($fetchc2['cper_sameadd'] == 'on')

                                    { echo  'readonly=readonly';     }	}

                                    ?>										

                        <?php if($readonly) echo 'readonly=readonly'; ?>> 

                    

                    </td>

            </tr>
             <?php } ?>
                <?php if($fetchinfo['per_State']=='YES') { ?>
            <tr>

                    <td>State</td>

                    <td>:</td>

                    <td>

                    <input id="coper_country1"  name="coper_country1" type="text" onChange="changeState(this,'coper_country1','coper_state1','coper_city1','coper_countrySelect','coper_stateSelect','coper_citySelect');" 

                            value="<?php if($rowc2) { echo $fetchc2['cper_state']; } ?>"
                            <?php if($rowc2){

                                if($fetchc2['cper_sameadd'] == 'on')

                                    { echo  'readonly=readonly';     }	}

                                    ?>											

                            <?php if($readonly) echo 'readonly=readonly'; ?>> 



                    <select disabled="disabled"  style="display:none" id="coper_countrySelect" name="coper_country" 

                            onchange="populateState('coper_countrySelect','coper_stateSelect'); populateCity('coper_countrySelect','coper_citySelect')" size="1">

                    </select>

                    </td>

            </tr>
           <?php } ?>
                <?php if($fetchinfo['per_District']=='YES') { ?>
            <tr>

                    <td>District</td>

                    <td>:</td>

                    <td>





                        <input id="coper_state1"  name="coper_state1" type="text" onChange="changeState(this,'coper_country1','coper_state1','coper_city1','coper_countrySelect','coper_stateSelect','coper_citySelect');" 

                    value="<?php if($rowc2) { echo $fetchc2['cper_district']; } ?>" 
					<?php if($rowc2){

                                if($fetchc2['cper_sameadd'] == 'on')

                                    { echo  'readonly=readonly';     }	}

                                    ?>				

                    <?php if($readonly) echo 'readonly=readonly';  ?>>

                    <select id="coper_stateSelect" style="display:none" disabled="disabled" name="coper_stateSelect" size="1">

                    </select><script type="text/javascript">initCountry('','coper_countrySelect','coper_stateSelect','coper_citySelect');</script>

                    </td>

            </tr>
			 <?php } ?>
                <?php if($fetchinfo['per_City']=='YES') { ?>

            <tr>

                    <td>City</td>

                    <td>:</td>

                    <td align="left" valign="top">

                        <input id="coper_city1" name="coper_city1"  type="text" onChange="changeState(this,'coper_country1','coper_state1','coper_city1','coper_countrySelect','coper_stateSelect','coper_citySelect');" 

                                        value="<?php if($rowc2) { echo $fetchc2['cper_city']; } ?>" 
										<?php if($rowc2){

                                if($fetchc2['cper_sameadd'] == 'on')

                                    { echo  'readonly=readonly';     }	}

                                    ?>				

                    <?php if($readonly) echo 'readonly=readonly'; ?>>
					

                    <select id="coper_citySelect" style="display:none" disabled="disabled" name="coper_citySelect" size="1"></select>

                    <script type="text/javascript">initCountry('','coper_countrySelect','coper_stateSelect','coper_citySelect'); </script>



                    </td>

            </tr>
			 <?php } ?>

                <tr>

                        <td>Phone No.</td>

                        <td>:</td>

                        <td>

                        <input  id="costdcode"  placeholder="STD Code" maxlength="6" name="costdcode" size="10" type="text" 

                                value="<?php if($rowc2) { echo $fetchc2['cstdcode']; } ?>"
								<?php if($rowc2){

                                    if($fetchc2['samestudadd'] == 'on')

                                        { echo 'readonly=readonly';   }	} ?>

                                <?php if($readonly) echo 'readonly=readonly'; 

                                            ?>>

                        <input id="cophone" placeholder="Enter 8 digits" maxlength="8" name="cophone" size="24" type="text" 

                                value="<?php if($rowc2) { echo $fetchc2['cphone']; } ?>"
								<?php if($rowc2){

                                    if($fetchc2['samestudadd'] == 'on')

                                        { echo 'readonly=readonly';   }	} ?>

                                <?php if($readonly) echo 'readonly=readonly'; 

                                            ?>></td>

                </tr>
				<?php if($fetchinfo1['Mobile_No']=='YES') { ?>

                <tr>

                        <td>Mobile No.</td>

                        <td>:</td>

                        <td>

                        <input id="comobile" maxlength="10" name="comobile" size="40" type="text" 

                                value="<?php if($rowc2) { echo $fetchc2['cmobile']; } ?>" 

                                <?php if($readonly) echo 'readonly=readonly'; 

                                            ?>></td>

                </tr>
				                     <?php } ?>

                <tr>

                        <td>Alternate Contact No.</td>

                        <td>:</td>

                        <td>

                        <input id="cophone1" maxlength="10" name="cophone1" size="40" type="text" 

                                    value="<?php if($rowc2) { echo $fetchc2['cphone1']; } ?>" 

                                    <?php if($readonly) echo 'readonly=readonly'; 

                                            ?>></td>

                </tr>
				<?php if($fetchinfo1['Type_of_Employment']=='YES') { ?>

                <tr>

                        <td>Type of Employment</td>

                        <td>:</td>

                        <td>

                        <select  id="coemployment" name="coemployment" size="1"

                                <?php if($readonly) echo 'disabled=disabled'; 

                                            ?>  onchange="return onSelectedIndexChange(this,'coemployment_other')">

                        <option >Select</option>

                        
									<option <?php if($rowc2){

                            if($fetchc2['cemployment'] == 'EX-Govt Employee')

                            {        echo "selected='selected'";      }	}										     

                                ?>>EX-Govt Employee</option>
								
								<option <?php if($rowc2){

                            if($fetchc2['cemployment'] == 'EX-Private Employee')

                            {        echo "selected='selected'";      }	}										     

                                ?>>EX-Private Employee</option>
								<option <?php if($rowc2){

                            if($fetchc2['cemployment'] == 'Business')

                            {        echo "selected='selected'";      }	}										     

                                ?>>Business</option>

                    <option <?php if($rowc2){

                            if($fetchc2['cemployment'] == 'Salaried')

                            {        echo "selected='selected'";      }	}										     

                                ?>>Salaried</option>

                    <option <?php if($rowc2){

                            if($fetchc2['cemployment'] == 'Self Employed')

                            {        echo "selected='selected'";      }	}										     

                                ?>>Self Employed</option>
								<option <?php if($rowc2){

                            if($fetchc2['cemployment'] == 'Pensioner')

                            {        echo "selected='selected'";      }	}										     

                                ?>>Pensioner</option>
								<option <?php if($rowc2){

                            if($fetchc2['cemployment'] == 'Agriculture')

                            {        echo "selected='selected'";      }	}										     

                                ?>>Agriculture</option>
								<option <?php if($rowc2){

                            if($fetchc2['cemployment'] == 'Rental Income')

                            {        echo "selected='selected'";      }	}										     

                                ?>>Rental Income</option>
								
								<option <?php if($rowc2){

                            if($fetchc2['cemployment'] == 'Other')

                            {        echo "selected='selected'";      }	}										     

                                ?>>Other</option>

                        </select>
						
						<select id="coemployment_other" name="coemployment_other" size="1" 

                                        <?php if($readonly) echo 'disabled=disabled'; 

                                        if($rowc2){ if($fetchc2['cemployment']!='Other') echo "disabled='disabled'"; }   else { ?>  disabled="disabled"<?php }  ?>>

                                        <option >Select</option>
                                      <?php 
									  
									  
									  $tablename='other_typeofemployment_list';
									  $cloumnname='employment';
									  $arrvalue=$fetchc2['cemployment_other'];
									  
									  
									$objCommon->getoptionsfromdbchecked($tablename,$cloumnname,$arrvalue);
									  
									  
									  ?>
                                        

                                </select>    

                                                              

						
						</td>

                </tr>
				 <?php } ?>
					<?php if($fetchinfo1['Name_of_Company']=='YES') { ?>

                <tr>

                        <td>Name of Employer/Business</td>

                        <td>:</td>

                        <td>

                        <input id="cobusiness" name="cobusiness" maxlength="150" size="40" type="text" 

                                    value="<?php if($rowc2) { echo $fetchc2['cbusiness']; } ?>" 

                                    <?php if($readonly) echo 'readonly=readonly'; 

                                            ?>></td>

                </tr>
				<?php } ?>
					<?php if($fetchinfo1['Designation']=='YES') { ?>

                <tr>

                        <td>Designation</td>

                        <td>:</td>

                        <td>

                        <input id="codesignation" maxlength="50" name="codesignation" size="40" type="text" 

                                    value="<?php if($rowc2) { echo $fetchc2['cdesignation']; } ?>" 

                                    <?php if($readonly) echo 'readonly=readonly'; 

                                            ?>></td>

                </tr>
				  <?php } ?>
					<?php if($fetchinfo1['Years_in_Current_Employment']=='YES') { ?>
<tr>

                            <td>Years in Current Employment</td>

                            <td>:</td>

                            <td>

                            <select id="coyearsInEmployement"  name="coyearsInEmployement" size="1" <?php if($readonly) echo 'disabled=disabled'; ?>>

                            <option value="">Select</option>
							
							
							
							<option <?php if($rowc2){

                                if($fetchc2['cyearsInEmployement'] == '<1')

                                {        echo "selected='selected'";      }	}										     

                                    ?>><1</option>

                            <option <?php if($rowc2){

											 
							            if($fetchc2['cyearsInEmployement'] == 1) { echo 'selected=selected'; } }  ?>>1</option>
							
											<option <?php if($rowc2){

									    if($fetchc2['cyearsInEmployement'] == 2) { echo 'selected=selected'; } }?>>2</option>
											<option <?php if($rowc2){

									    if($fetchc2['cyearsInEmployement'] == 3) { echo 'selected=selected'; } } ?>>3</option>
											<option <?php if($rowc2){

										if($fetchc2['cyearsInEmployement'] == 4) { echo 'selected=selected'; } }  ?>>4</option>
											<option <?php if($rowc2){

								        if($fetchc2['cyearsInEmployement'] == 5) { echo 'selected=selected';  } } ?>>5</option>
											<option <?php if($rowc2){

										if($fetchc2['cyearsInEmployement'] == 6) { echo 'selected=selected';  } } ?>>6</option>
											<option <?php if($rowc2){

										if($fetchc2['cyearsInEmployement'] == 7) { echo 'selected=selected'; } } ?>>7</option>
											<option <?php if($rowc2){

										if($fetchc2['cyearsInEmployement'] == 8) { echo 'selected=selected'; } } ?>>8</option>
											<option <?php if($rowc2){

										if($fetchc2['cyearsInEmployement'] == 9) { echo 'selected=selected';  } } ?>>9</option>
											<option <?php if($rowc2){

										if($fetchc2['cyearsInEmployement'] == 10) { echo 'selected=selected';  } } ?>>10</option>
										
										
										<option <?php if($rowc2){

											 
							            if($fetchc2['cyearsInEmployement'] == 11) { echo 'selected=selected'; } }  ?>>11</option>
							
											<option <?php if($rowc2){

									    if($fetchc2['cyearsInEmployement'] == 12) { echo 'selected=selected'; } }?>>12</option>
											<option <?php if($rowc2){

									    if($fetchc2['cyearsInEmployement'] == 13) { echo 'selected=selected'; } } ?>>13</option>
											<option <?php if($rowc2){

										if($fetchc2['cyearsInEmployement'] == 14) { echo 'selected=selected'; } }  ?>>14</option>
											<option <?php if($rowc2){

								        if($fetchc2['cyearsInEmployement'] == 15) { echo 'selected=selected';  } } ?>>15</option>
                            <option <?php if($rowc2){

                                if($fetchc2['cyearsInEmployement'] == '>15')

                                {        echo "selected='selected'";      }	}										     

                                    ?>>>15</option>

                          

                            </select>
							</td>

                    </tr>
					 <?php } ?>
					<?php if($fetchinfo1['Employment_Address']=='YES') { ?>
                <tr>

                        <td>Employment Address</td>

                        <td>:</td>

                        <td>

                        <input id="coempaddress" maxlength="45" name="coempaddress" size="40" type="text" 

                                value="<?php if($rowc2) { echo $fetchc2['cempaddress']; } ?>" 

                                <?php if($readonly) echo 'readonly=readonly'; 

                                            ?>></td>

                </tr>
				 <?php } ?>
					<?php if($fetchinfo1['empStreet1']=='YES') { ?>

                <tr>

                        <td>Street1</td>

                        <td>:</td>

                        <td>

                        <input id="coempstreet1" maxlength="45" name="coempstreet1" size="40" type="text" 

                                value="<?php if($rowc2) { echo $fetchc2['cempstreet1']; } ?>" 

                                <?php if($readonly) echo 'readonly=readonly'; 

                                            ?>></td>

                </tr>
				 <?php } ?>
					<?php if($fetchinfo1['empStreet2']=='YES') { ?>

                <tr>

                        <td>Street2 (optional)</td>

                        <td>:</td>

                        <td>

                        <input id="coempstreet2" maxlength="45" name="coempstreet2" size="40" type="text" 

                                value="<?php if($rowc2) { echo $fetchc2['cempstreet2']; } ?>" 

                                <?php if($readonly) echo 'readonly=readonly'; 

                                            ?>></td></tr> 

                        <tr><td></td><td></td><td></td>

                </td>

                </tr>
				  <?php } ?>
					<?php if($fetchinfo1['empState']=='YES') { ?>

                <tr>

                        <td>State</td>

                        <td>:</td>

                        <td>

                            <input id="coempcountrySelect1" name="coempcountry1" size="20" type="text" onChange="changeState(this,'coempcountrySelect1','coempstateSelect1','coempcitySelect1','coempcountrySelect','coempstateSelect','coempcitySelect');" 

                                    value="<?php if($rowc2) { echo $fetchc2['cempstate']; } ?>" >



                        <select id="coempcountrySelect" style="display:none" name="coempcountry" onchange="populateState('coempcountrySelect','coempstateSelect'); 

                        populateCity('coempcountrySelect','coempcitySelect')" 

                            <?php if($rowc2) { if($fetchc2['cempstate']!=''){ echo 'disabled="disabled"';} } ?> disabled="disabled" size="1">

                        </select></td>

                </tr>
				 <?php } ?>
					<?php if($fetchinfo1['empDistrict']=='YES') { ?>
                    <tr>

           

                        <td>District</td>

                        <td>:</td>

                        <td>

                            <input id="coempstateSelect1" name="coempstate1" size="20" type="text" onChange="changeState(this,'coempcountrySelect1','coempstateSelect1','coempcitySelect1','coempcountrySelect','coempstateSelect','coempcitySelect');" 

                                        value="<?php if($rowc2) { echo $fetchc2['cempdistrict']; } ?>"  >



                        <select id="coempstateSelect" style="display:none" name="coempstate" size="1" <?php if($rowc2) { if($fetchc2['cempdistrict']!=''){ echo 'disabled="disabled"';} } ?>

                                disabled="disabled">

                        </select><script type="text/javascript">initCountry('','coempcountrySelect','coempstateSelect','coempcitySelect');</script>

                        </td>

                </tr>
				  <?php } ?>
					<?php if($fetchinfo1['empCity']=='YES') { ?>

                <tr>

                        <td>City</td>

                        <td>:</td>

                        <td align="left" valign="top">

                        <input id="coempcitySelect1"  name="coempcity1" size="20" type="text" onChange="changeState(this,'coempcountrySelect1','coempstateSelect1','coempcitySelect1','coempcountrySelect','coempstateSelect','coempcitySelect');" 

                                value="<?php if($rowc2) { echo $fetchc2['cempcity']; } ?>"  >



                        <select id="coempcitySelect" style="display:none" name="coempcity" size="1" <?php if($rowc2) { if($fetchc2['cempcity']!=''){ echo 'disabled="disabled"';} } ?>

                                disabled="disabled">

                        </select>

                        <script type="text/javascript">initCountry('','coempcountrySelect','coempstateSelect','coempcitySelect'); </script></td>

                </tr>

                    <?php } ?>
					<?php if($fetchinfo1['Pincode']=='YES') { ?>

                <tr>

                        <td>Pincode</td>

                        <td>:</td>

                        <td>

                        <input id="coemppincode" maxlength="6" name="coemppincode" size="40" type="text" 

                                value="<?php if($rowc2) { echo $fetchc2['cemppincode']; } ?>" 

                                <?php if($readonly) echo 'readonly=readonly'; 

                                            ?>></td>

                </tr>
					<?php } ?>

                <tr>

                        <td>Phone No.</td>

                        <td>:</td>

                        <td>

                        <input id="coempstdcode"   placeholder="STD Code" maxlength="6" name="coempstdcode" size="10" type="text" 

                                value="<?php if($rowc2) { echo $fetchc2['cempstdcode']; } ?>" 

                                <?php if($readonly) echo 'readonly=readonly'; 

                                            ?>>

                        <input id="coempphone"  placeholder="Enter 8 digits" maxlength="8" name="coempphone" size="24" type="text" 

                                value="<?php if($rowc2) { echo $fetchc2['cempphone']; } ?>" 

                                <?php if($readonly) echo 'readonly=readonly'; 

                                            ?>></td>

                </tr>


              
			<?php if($fetchinfo1['Gross_Monthly_Income']=='YES') { ?>


                <tr>

                        <td>Gross Monthly Income</td>

                        <td>:</td>

                        <td><input  maxlength="6"   id="coincome" name="coincome" size="40"
                                         value="<?php if($rowc2) { echo $coincome; } ?>" 
                                                                    <?php if($readonly) echo 'disabled=disabled'; 

                                                                            ?>></td>

                </tr>
				  <?php } ?>
					<?php if($fetchinfo1['Assets_and_Investments']=='YES') { ?>
				<tr>

                            <td>Assets and Investments</td>

                            <td>:</td>

                            <td>

                            <input id="coassets1" name="coassets" type="radio" value="Yes" <?php
							if($rowc12){ if($coassets_investments == 'Yes'){ echo "checked"; } } ?>

                                             <?php if($readonly)  echo  'disabled="disabled"'; ?> onClick="showAssetspanel('cotypeofassets','cotypeofassets1','coassets2','cototAssets','cototAssets1','cototAssets2')"> Yes

                            <input id="coassets"   name="coassets" type="radio"  value="No" 
							<?php if($coassets_investments == 'No')

                                                  { echo "checked";

												  } ?> 

                                             <?php if($readonly)  echo  'disabled="disabled"'; ?>onClick="disableAssetspanel('cotypeofassets','cotypeofassets1','coassets2','cototAssets','cototAssets1','cototAssets2')">No</td>

                    </tr>
					
					<tr>
					
					    <td id="cotypeofassets" <?php if($coassets_investments == 'No') { ?>style="display:none" <?php } ?>  valign="top"></td>
						<td  id="cotypeofassets1" <?php if($coassets_investments == 'No') { ?>style="display:none" <?php } ?>   valign="top"></td></tr>
						<tr>
					    <td><div id="coassets2" <?php if($coassets_investments == 'No') { ?>style="display:none" <?php } ?> >
						 <table border="0" width="250%">

                                    <tr>
                                       
                                            <td>

                                            Select Type of Assets</td>

                                            <td>Current Market Value in Rs (Approx)</td>

                                            <td>Select if being offered as Collateral</td>

                                    </tr>

                                    <tr>

                                            <td>

                                            <input  id="coimmovableProperty" <?php if($rowc12){ if($fetch_assetsc2['cimmovablePropertyvalue'] > 0){ echo "checked"; } } ?>  

                                             <?php if($readonly) echo  'disabled="disabled"'; ?> name="coimmovableProperty"  type="checkbox" onClick="return  onTypeofAssetsChecked('coimmovableProperty','coimmovablePropertyvalue','coimmovablePropertyCollateral')">Immovable Property</td>

                                            <td>

                                            <input maxlength="10"    onkeyup="allowonlynumeric(this)" onClick="return  removeStartingZero(this)"   value="<?php if($rowc12){  
											
											echo $fetch_assetsc2['cimmovablePropertyvalue']; 
											} 
                                             else {
											 
									          echo '0'; } ?>"
											<?php if($coassets_investments == 'No')

                                                  { echo "disabled=disabled";  } ?>

                                             <?php if($readonly) echo  'disabled="disabled"'; ?> onchange="calculateTotalAssetsAmount('cototAssets','coimmovablePropertyvalue','cogovernmentsecuritiesvalue','coinsurancepoliciesvalue','cochits_kurisvalue','cosharesvalue','coMFsvalue','codebenturesvalue','coBankFixedDepositsvalue','coProvidentFundvalue',
										  'coGoldOrnamentsvalue','coVehiclesSelfOwnedvalue','coOtherAssetsvalue')" name="coimmovablePropertyvalue" id="coimmovablePropertyvalue"   type="text"></td>

                                            <td align="center">

                                            <input  type="checkbox"  value="yes"  onclick="CheckAsssetsAmountEntered('coimmovablePropertyvalue',this)" <?php
							            if($rowc12){ 
										
										if($fetch_assetsc2['cimmovablePropertyCollateral'] == 'yes')
										{
										
										          echo "checked"; 
										 } 
										 elseif($fetch_assetsc2['cimmovablePropertyvalue'] == 0){
										         echo 'disabled=disabled';
                                               }

										 }  ?> <?php if($coassets_investments == 'No')

                                                  { echo 'disabled=disabled'; 

												  } ?> 

                                             <?php if($readonly)  echo  'disabled="disabled"'; ?> name="coimmovablePropertyCollateral" id="coimmovablePropertyCollateral"></td>

                                    </tr>

                                     <tr>

                                            <td>

                                            <input id="cogovernmentsecurities" <?php if($rowc12){ if($fetch_assetsc2['cgovernmentsecuritiesvalue'] > 0){ echo "checked"; } } ?>  

                                             <?php if($readonly) echo  'disabled="disabled"'; ?>name="cogovernmentsecurities"  type="checkbox" onClick="return  onTypeofAssetsChecked('cogovernmentsecurities','cogovernmentsecuritiesvalue','cogovernmentsecuritiesCollateral')">Investment in government securities</td>

                                            <td>

                                            <input   id="txt_box" maxlength="10"  onkeyup="allowonlynumeric(this)" onClick="return  removeStartingZero(this)"    value="<?php if($rowc12){  
											
											echo $fetch_assetsc2['cgovernmentsecuritiesvalue']; 
											} 
                                             else {
											 
									          echo '0'; } ?>"
											<?php if($coassets_investments == 'No')

                                               { ?>disabled="disabled" <?php }?> 

                                             <?php if($readonly) echo  'disabled="disabled"'; ?> onchange="calculateTotalAssetsAmount('cototAssets','coimmovablePropertyvalue','cogovernmentsecuritiesvalue','coinsurancepoliciesvalue','cochits_kurisvalue','cosharesvalue','coMFsvalue','codebenturesvalue','coBankFixedDepositsvalue','coProvidentFundvalue',
										  'coGoldOrnamentsvalue','coVehiclesSelfOwnedvalue','coOtherAssetsvalue')" name="cogovernmentsecuritiesvalue" id="cogovernmentsecuritiesvalue"></td>

                                            <td align="center">

                                            <input type="checkbox" value="yes"  onclick="CheckAsssetsAmountEntered('cogovernmentsecuritiesvalue',this)" <?php
							            if($rowc12){ 
										
										if($fetch_assetsc2['cgovernmentsecuritiesCollateral'] == 'yes')
										{
										
										          echo "checked"; 
										 } 
										  elseif($fetch_assetsc2['cgovernmentsecuritiesvalue'] == 0) {
										         echo 'disabled=disabled';
                                               }

										 }  ?> <?php if($coassets_investments == 'No')

                                                  { echo 'disabled=disabled'; 

												  } ?> 

                                             <?php if($readonly)  echo  'disabled="disabled"'; ?> name="cogovernmentsecuritiesCollateral" id="cogovernmentsecuritiesCollateral"></td>

                                    </tr>
									 <tr>

                                            <td>

                                            <input id="coinsurancepolicies"<?php if($rowc12){ if($fetch_assetsc2['cinsurancepoliciesvalue'] > 0){ echo "checked"; } } ?>  

                                             <?php if($readonly) echo  'disabled="disabled"'; ?> name="coinsurancepolicies"  type="checkbox" onClick="return  onTypeofAssetsChecked('coinsurancepolicies','coinsurancepoliciesvalue','coinsurancepoliciesCollateral')">Investment in insurance policies</td>

                                            <td>

                                            <input maxlength="10"    onkeyup="allowonlynumeric(this)" onClick="return  removeStartingZero(this)"  value="<?php if($rowc12){  
											
											echo $fetch_assetsc2['cinsurancepoliciesvalue']; 
											} 
                                             else {
											 
									         echo '0'; } ?>"
											<?php if($coassets_investments == 'No')

                                                  { ?> disabled="disabled" <?php }?> 

                                             <?php if($readonly) echo  'disabled="disabled"'; ?> onchange="calculateTotalAssetsAmount('cototAssets','coimmovablePropertyvalue','cogovernmentsecuritiesvalue','coinsurancepoliciesvalue','cochits_kurisvalue','cosharesvalue','coMFsvalue','codebenturesvalue','coBankFixedDepositsvalue','coProvidentFundvalue',
										  'coGoldOrnamentsvalue','coVehiclesSelfOwnedvalue','coOtherAssetsvalue')" name="coinsurancepoliciesvalue" id="coinsurancepoliciesvalue"   type="text"></td>

                                            <td align="center">

                                            <input type="checkbox" value="yes"  onclick="CheckAsssetsAmountEntered('coinsurancepoliciesvalue',this)" <?php
							            if($rowc12){ 
										
										if($fetch_assetsc2['cinsurancepoliciesCollateral'] == 'yes')
										{
										
										          echo "checked"; 
										 } 
										  elseif($fetch_assetsc2['cinsurancepoliciesvalue'] == 0) {
										         echo 'disabled=disabled';
                                               }

										 }  ?> <?php if($coassets_investments == 'No')

                                                  { echo 'disabled=disabled'; 

												  } ?> 

                                             <?php if($readonly)  echo  'disabled="disabled"'; ?> name="coinsurancepoliciesCollateral" id="coinsurancepoliciesCollateral"></td>

                                    </tr>
									 <tr>

                                            <td>

                                            <input id="cochits_kuris" <?php if($rowc12){ if($fetch_assetsc2['cchits_kurisvalue'] > 0){ echo "checked"; } } ?>  

                                             <?php if($readonly) echo  'disabled="disabled"'; ?>name="cochits_kuris"  type="checkbox" onClick="return  onTypeofAssetsChecked('cochits_kuris','cochits_kurisvalue','cochits_kurisCollateral')">Investment in chits & kuris</td>

                                            <td>

                                            <input maxlength="10"    onkeyup="allowonlynumeric(this)" onClick="return  removeStartingZero(this)"   value="<?php if($rowc12){  
											
											echo $fetch_assetsc2['cchits_kurisvalue']; 
											} 
                                             else {
											 
									         echo '0'; } ?>"
										    <?php if($coassets_investments == 'No')

                                                  { echo "disabled=disabled";  } ?> 

                                             <?php if($readonly) echo  'disabled="disabled"'; ?> onchange="calculateTotalAssetsAmount('cototAssets','coimmovablePropertyvalue','cogovernmentsecuritiesvalue','coinsurancepoliciesvalue','cochits_kurisvalue','cosharesvalue','coMFsvalue','codebenturesvalue','coBankFixedDepositsvalue','coProvidentFundvalue',
										  'coGoldOrnamentsvalue','coVehiclesSelfOwnedvalue','coOtherAssetsvalue')" name="cochits_kurisvalue" id="cochits_kurisvalue"   type="text"></td>

                                            <td align="center">

                                            <input type="checkbox" value="yes"  onclick="CheckAsssetsAmountEntered('cochits_kurisvalue',this)" <?php
							            if($rowc12){ 
										
										if($fetch_assetsc2['cchits_kurisCollateral'] == 'yes')
										{
										
										          echo "checked"; 
										 } 
										  elseif($fetch_assetsc2['cchits_kurisvalue'] == 0) {
										         echo 'disabled=disabled';
                                               }

										 }  ?> <?php if($coassets_investments == 'No')

                                                  { echo 'disabled=disabled'; 

												  } ?> 

                                             <?php if($readonly)  echo  'disabled="disabled"'; ?> name="cochits_kurisCollateral" id="cochits_kurisCollateral"></td>

                                    </tr>
									 <tr>

                                            <td>

                                            <input id="coshares" <?php if($rowc12){ if($fetch_assetsc2['csharesvalue'] > 0){ echo "checked"; } } ?>  

                                             <?php if($readonly) echo  'disabled="disabled"'; ?> name="coshares"  type="checkbox" onClick="return  onTypeofAssetsChecked('coshares','cosharesvalue','cosharesCollateral')">Investment in shares</td>

                                            <td>

                                            <input maxlength="10"    onkeyup="allowonlynumeric(this)" onClick="return  removeStartingZero(this)"   value="<?php if($rowc12){  
											
											echo $fetch_assetsc2['csharesvalue']; 
											} 
                                             else {
											 
									         echo '0'; } ?>"
										    <?php if($coassets_investments == 'No')

                                                  { echo "disabled=disabled"; } ?>
												  
												  <?php if($readonly) echo  'disabled="disabled"'; ?>onchange="calculateTotalAssetsAmount('cototAssets','coimmovablePropertyvalue','cogovernmentsecuritiesvalue','coinsurancepoliciesvalue','cochits_kurisvalue','cosharesvalue','coMFsvalue','codebenturesvalue','coBankFixedDepositsvalue','coProvidentFundvalue',
										  'coGoldOrnamentsvalue','coVehiclesSelfOwnedvalue','coOtherAssetsvalue')" name="cosharesvalue" id="cosharesvalue"   type="text"></td>

                                            <td align="center">

                                            <input type="checkbox" value="yes"  onclick="CheckAsssetsAmountEntered('cosharesvalue',this)" <?php
							            if($rowc12){ 
										
										if($fetch_assetsc2['csharesCollateral'] == 'yes')
										{
										
										          echo "checked"; 
										 } 
										  elseif($fetch_assetsc2['csharesvalue'] == 0) {
										         echo 'disabled=disabled';
                                               }

										 }  ?> <?php if($coassets_investments == 'No')

                                                  { echo 'disabled=disabled'; 

												  } ?> 

                                             <?php if($readonly)  echo  'disabled="disabled"'; ?> name="cosharesCollateral" id="cosharesCollateral"></td>

                                    </tr>
									 <tr>

                                            <td>

                                            <input id="coMFs" <?php if($rowc12){ if($fetch_assetsc2['cMFsvalue'] > 0){ echo "checked"; } } ?>  

                                             <?php if($readonly) echo  'disabled="disabled"'; ?> name="coMFs"  type="checkbox" onClick="return  onTypeofAssetsChecked('coMFs','coMFsvalue','coMFsCollateral')">Investment in MFs</td>

                                            <td>

                                            <input maxlength="10"    onkeyup="allowonlynumeric(this)" onClick="return  removeStartingZero(this)"   value="<?php if($rowc12){  
											
											echo $fetch_assetsc2['cMFsvalue']; 
											} 
                                             else {
											 
									          echo '0'; } ?>"
											<?php if($coassets_investments == 'No')

                                                  { ?>disabled="disabled" <?php }?> 

                                             <?php if($readonly) echo  'disabled="disabled"'; ?> onchange="calculateTotalAssetsAmount('cototAssets','coimmovablePropertyvalue','cogovernmentsecuritiesvalue','coinsurancepoliciesvalue','cochits_kurisvalue','cosharesvalue','coMFsvalue','codebenturesvalue','coBankFixedDepositsvalue','coProvidentFundvalue',
										  'coGoldOrnamentsvalue','coVehiclesSelfOwnedvalue','coOtherAssetsvalue')" name="coMFsvalue" id="coMFsvalue"   type="text"></td>

                                            <td align="center">

                                            <input type="checkbox" value="yes"  onclick="CheckAsssetsAmountEntered('coMFsvalue',this)" <?php
							            if($rowc12){ 
										
										if($fetch_assetsc2['cMFsCollateral'] == 'yes')
										{
										
										          echo "checked"; 
										 } 
										  elseif($fetch_assetsc2['cMFsvalue'] == 0) {
										         echo 'disabled=disabled';
                                               }

										 }  ?> <?php if($coassets_investments == 'No')

                                                  { echo 'disabled=disabled'; 

												  } ?> 

                                             <?php if($readonly)  echo  'disabled="disabled"'; ?> name="coMFsCollateral" id="coMFsCollateral"></td>

                                    </tr>
									 <tr>

                                            <td>

                                            <input id="codebentures" <?php if($rowc12){ if($fetch_assetsc2['cdebenturesvalue'] > 0){ echo "checked"; } } ?> <?php if($readonly) echo  'disabled="disabled"'; ?> 

                                             <?php if($readonly) echo  'disabled="disabled"'; ?>name="codebentures"  type="checkbox"onClick="return  onTypeofAssetsChecked('codebentures','codebenturesvalue','codebenturesCollateral')">Investment in debentures</td>

                                            <td>

                                            <input maxlength="10"    onkeyup="allowonlynumeric(this)" onClick="return  removeStartingZero(this)"   value="<?php if($rowc12){  
											
											echo $fetch_assetsc2['cdebenturesvalue']; 
											} 
                                             else {
											 
									        echo '0'; } ?>"
											<?php if($coassets_investments == 'No')

                                                  { ?>disabled="disabled" <?php }?> 

                                             <?php if($readonly) echo  'disabled="disabled"'; ?> onchange="calculateTotalAssetsAmount('cototAssets','coimmovablePropertyvalue','cogovernmentsecuritiesvalue','coinsurancepoliciesvalue','cochits_kurisvalue','cosharesvalue','coMFsvalue','codebenturesvalue','coBankFixedDepositsvalue','coProvidentFundvalue',
										  'coGoldOrnamentsvalue','coVehiclesSelfOwnedvalue','coOtherAssetsvalue')" name="codebenturesvalue" id="codebenturesvalue"  type="text"></td>

                                            <td align="center">

                                            <input type="checkbox" value="yes"  onclick="CheckAsssetsAmountEntered('codebenturesvalue',this)" <?php
							            if($rowc12){ 
										
										if($fetch_assetsc2['cdebenturesCollateral'] == 'yes')
										{
										
										          echo "checked"; 
										 } 
										  elseif($fetch_assetsc2['cdebenturesvalue'] == 0) {
										         echo 'disabled=disabled';
                                               }

										 }  ?> <?php if($coassets_investments == 'No')

                                                  { echo 'disabled=disabled'; 

												  } ?> 

                                             <?php if($readonly)  echo  'disabled="disabled"'; ?> name="codebenturesCollateral" id="codebenturesCollateral"></td>

                                    </tr>
									 <tr>

                                            <td>

                                            <input id="coBankFixedDeposits" <?php if($rowc12){ if($fetch_assetsc2['cBankFixedDepositsvalue'] > 0){ echo "checked"; } } ?>  

                                             <?php if($readonly) echo  'disabled="disabled"'; ?>

											name="coBankFixedDeposits"  type="checkbox" onClick="return  onTypeofAssetsChecked('coBankFixedDeposits','coBankFixedDepositsvalue','coBankFixedDepositsCollateral')">Bank fixed deposits</td>

                                            <td>

                                            <input maxlength="10"    onkeyup="allowonlynumeric(this)" onClick="return  removeStartingZero(this)"   value="<?php if($rowc12){  
											
											echo $fetch_assetsc2['cBankFixedDepositsvalue']; 
											} 
                                             else {
											 
									         echo '0'; } ?>"
											<?php if($coassets_investments == 'No')

                                                  { ?>disabled="disabled" <?php }?> 

                                             <?php if($readonly) echo  'disabled="disabled"'; ?> onchange="calculateTotalAssetsAmount('cototAssets','coimmovablePropertyvalue','cogovernmentsecuritiesvalue','coinsurancepoliciesvalue','cochits_kurisvalue','cosharesvalue','coMFsvalue','codebenturesvalue','coBankFixedDepositsvalue','coProvidentFundvalue',
										  'coGoldOrnamentsvalue','coVehiclesSelfOwnedvalue','coOtherAssetsvalue')" name="coBankFixedDepositsvalue" id="coBankFixedDepositsvalue"   type="text"></td>

                                            <td align="center">

                                            <input type="checkbox"  value="yes"  onclick="CheckAsssetsAmountEntered('coBankFixedDepositsvalue',this)" <?php
							            if($rowc12){ 
										
										if($fetch_assetsc2['cBankFixedDepositsCollateral'] == 'yes')
										{
										
										          echo "checked"; 
										 } 
										  elseif($fetch_assetsc2['cBankFixedDepositsvalue'] == 0) {
										         echo 'disabled=disabled';
                                               }

										 }  ?> <?php if($coassets_investments == 'No')

                                                  { echo 'disabled=disabled'; 

												  } ?> 

                                             <?php if($readonly)  echo  'disabled="disabled"'; ?> name="coBankFixedDepositsCollateral" id="coBankFixedDepositsCollateral"></td>

                                    </tr>
									 <tr>

                                            <td>

                                            <input id="coProvidentFund"<?php if($rowc12){ if($fetch_assetsc2['cProvidentFundvalue'] > 0){ echo "checked"; } } ?>  

                                             <?php if($readonly) echo  'disabled="disabled"'; ?> name="coProvidentFund"  type="checkbox" onClick="return  onTypeofAssetsChecked('coProvidentFund','coProvidentFundvalue','coProvidentFundCollateral')">Provident Fund</td>

                                            <td>

                                            <input maxlength="10"    onkeyup="allowonlynumeric(this)" onClick="return  removeStartingZero(this)"   value="<?php if($rowc12){  
											
											echo $fetch_assetsc2['cProvidentFundvalue']; 
											} 
                                             else {
											 
									         echo '0'; } ?>"
											<?php if($coassets_investments == 'No')

                                                  { ?>disabled="disabled" <?php }?> 

                                             <?php if($readonly) echo  'disabled="disabled"'; ?> onchange="calculateTotalAssetsAmount('cototAssets','coimmovablePropertyvalue','cogovernmentsecuritiesvalue','coinsurancepoliciesvalue','cochits_kurisvalue','cosharesvalue','coMFsvalue','codebenturesvalue','coBankFixedDepositsvalue','coProvidentFundvalue',
										  'coGoldOrnamentsvalue','coVehiclesSelfOwnedvalue','coOtherAssetsvalue')" name="coProvidentFundvalue" id="coProvidentFundvalue"  type="text"></td>

                                            <td align="center">

                                            <input type="checkbox" value="yes"  onclick="CheckAsssetsAmountEntered('coProvidentFundvalue',this)" <?php
							            if($rowc12){ 
										
										if($fetch_assetsc2['cProvidentFundCollateral'] == 'yes')
										{
										
										          echo "checked"; 
										 } 
										  elseif($fetch_assetsc2['cProvidentFundvalue'] == 0) {
										         echo 'disabled=disabled';
                                               }

										 }  ?> <?php if($coassets_investments == 'No')

                                                  { echo 'disabled=disabled'; 

												  } ?> 

                                             <?php if($readonly)  echo  'disabled="disabled"'; ?> name="coProvidentFundCollateral" id="coProvidentFundCollateral"></td>

                                    </tr>
									 <tr>

                                            <td>

                                            <input id="coGoldOrnaments" <?php if($rowc12){ if($fetch_assetsc2['cGoldOrnamentsvalue'] > 0){ echo "checked"; } } ?>  

                                             <?php if($readonly) echo  'disabled="disabled"'; ?> name="coGoldOrnaments"  type="checkbox" onClick="return  onTypeofAssetsChecked('coGoldOrnaments','coGoldOrnamentsvalue','coGoldOrnamentsCollateral')">Gold Ornaments</td>

                                            <td>

                                            <input maxlength="10"    onkeyup="allowonlynumeric(this)" onClick="return  removeStartingZero(this)"   value="<?php if($rowc12){  
											
											echo $fetch_assetsc2['cGoldOrnamentsvalue']; 
											} 
                                             else {
											 
									        echo '0'; } ?>"
											<?php if($coassets_investments == 'No')

                                                  { ?>disabled="disabled" <?php }?> 

                                             <?php if($readonly) echo  'disabled="disabled"'; ?> onchange="calculateTotalAssetsAmount('cototAssets','coimmovablePropertyvalue','cogovernmentsecuritiesvalue','coinsurancepoliciesvalue','cochits_kurisvalue','cosharesvalue','coMFsvalue','codebenturesvalue','coBankFixedDepositsvalue','coProvidentFundvalue',
										  'coGoldOrnamentsvalue','coVehiclesSelfOwnedvalue','coOtherAssetsvalue')" name="coGoldOrnamentsvalue" id="coGoldOrnamentsvalue"  type="text"></td>

                                            <td align="center">

                                            <input type="checkbox" value="yes"  onclick="CheckAsssetsAmountEntered('coGoldOrnamentsvalue',this)" <?php
							            if($rowc12){ 
										
										if($fetch_assetsc2['cGoldOrnamentsCollateral'] == 'yes')
										{
										
										          echo "checked"; 
										 } 
										  elseif($fetch_assetsc2['cGoldOrnamentsvalue'] == 0) {
										         echo 'disabled=disabled';
                                               }

										 }  ?> <?php if($coassets_investments == 'No')

                                                  { echo 'disabled=disabled'; 

												  } ?> 

                                             <?php if($readonly)  echo  'disabled="disabled"'; ?> name="coGoldOrnamentsCollateral" id="coGoldOrnamentsCollateral"></td>

                                    </tr>
									 <tr>

                                            <td>

                                            <input id="coVehiclesSelfOwned" <?php if($rowc12){ if($fetch_assetsc2['cVehiclesSelfOwnedvalue'] > 0){ echo "checked"; } } ?>  

                                             <?php if($readonly) echo  'disabled="disabled"'; ?> name="coVehiclesSelfOwned"  type="checkbox" onClick="return  onTypeofAssetsChecked('coVehiclesSelfOwned','coVehiclesSelfOwnedvalue','coVehiclesSelfOwnedCollateral')">Vehicles Self Owned</td>

                                            <td>

                                            <input maxlength="10"    onkeyup="allowonlynumeric(this)" onClick="return  removeStartingZero(this)"   value="<?php if($rowc12){  
											
											echo $fetch_assetsc2['cVehiclesSelfOwnedvalue']; 
											} 
                                             else {
											 
									         echo '0'; } ?>"
											<?php if($coassets_investments == 'No')

                                                  { ?>disabled="disabled" <?php }?> 

                                             <?php if($readonly) echo  'disabled="disabled"'; ?> onchange="calculateTotalAssetsAmount('cototAssets','coimmovablePropertyvalue','cogovernmentsecuritiesvalue','coinsurancepoliciesvalue','cochits_kurisvalue','cosharesvalue','coMFsvalue','codebenturesvalue','coBankFixedDepositsvalue','coProvidentFundvalue',
										  'coGoldOrnamentsvalue','coVehiclesSelfOwnedvalue','coOtherAssetsvalue')" name="coVehiclesSelfOwnedvalue" id="coVehiclesSelfOwnedvalue"   type="text"></td>

                                            <td align="center">

                                            <input type="checkbox"  value="yes"  onclick="CheckAsssetsAmountEntered('coVehiclesSelfOwnedvalue',this)" <?php
							            if($rowc12){ 
										
										if($fetch_assetsc2['cVehiclesSelfOwnedCollateral'] == 'yes')
										{
										
										          echo "checked"; 
										 } 
										  elseif($fetch_assetsc2['cVehiclesSelfOwnedvalue'] == 0) {
										         echo 'disabled=disabled';
                                               }

										 }  ?> <?php if($coassets_investments == 'No')

                                                  { echo 'disabled=disabled'; 

												  } ?> 

                                             <?php if($readonly)  echo  'disabled="disabled"'; ?> name="coVehiclesSelfOwnedCollateral" id="coVehiclesSelfOwnedCollateral"></td>

                                    </tr>
									<tr>

                                            <td>

                                            <input id="coOtherAssets" <?php if($rowc12){ if($fetch_assetsc2['cOtherAssetsvalue'] > 0){ echo "checked"; } } ?>  

                                             <?php if($readonly) echo  'disabled="disabled"'; ?>name="coOtherAssets"  type="checkbox" onClick="return  onTypeofAssetsChecked('coOtherAssets','coOtherAssetsvalue','coOtherAssetsCollateral')">Other Assets Owned ( TV, Fridge ,etc )</td>

                                            <td>

                                            <input maxlength="10"    onkeyup="allowonlynumeric(this)" onClick="return  removeStartingZero(this)"   value="<?php if($rowc12){  
											
											echo $fetch_assetsc2['cOtherAssetsvalue']; 
											} 
                                             else {
											 
									         echo '0'; } ?>"
											<?php if($coassets_investments == 'No')

                                                  { ?>  disabled="disabled" <?php }?> 

                                             <?php if($readonly) echo  'disabled="disabled"'; ?>onchange="calculateTotalAssetsAmount('cototAssets','coimmovablePropertyvalue','cogovernmentsecuritiesvalue','coinsurancepoliciesvalue','cochits_kurisvalue','cosharesvalue','coMFsvalue','codebenturesvalue','coBankFixedDepositsvalue','coProvidentFundvalue',
										  'coGoldOrnamentsvalue','coVehiclesSelfOwnedvalue','coOtherAssetsvalue')" name="coOtherAssetsvalue" id="coOtherAssetsvalue"  type="text"></td>

                                            <td align="center">

                                            <input type="checkbox"  value="yes"  onclick="CheckAsssetsAmountEntered('coOtherAssetsvalue',this)" <?php
							            if($rowc12){ 
										
										if($fetch_assetsc2['cOtherAssetsCollateral'] == 'yes')
										{
										
										          echo "checked"; 
										 } 
										  elseif($fetch_assetsc2['cOtherAssetsvalue'] == 0) {
										         echo 'disabled=disabled';
                                               }

										 }  ?> <?php if($coassets_investments == 'No')

                                                  { echo 'disabled=disabled'; 

												  } ?> 

                                             <?php if($readonly)  echo  'disabled="disabled"'; ?> name="coOtherAssetsCollateral" id="coOtherAssetsCollateral"></td>

                                    </tr>
									

                            </table></div>

							
                         </td>
					</tr>
					<tr>

                            <td  <?php if($coassets_investments == 'No') { ?> style="display:none" <?php } ?>  id="cototAssets1">Total Assets Amount</td>

                            <td <?php if($coassets_investments == 'No') { ?> style="display:none" <?php } ?> id="cototAssets2">:</td>

                            <td>

                            <input  <?php if($coassets_investments == 'No') { ?> style="display:none" <?php } ?> id="cototAssets" value="<?php if($rowc12 && $coassets_investments == 'Yes' ){ 
										
										
										
										         echo $fetch_assetsc2['ctotal_AssetsAmount'];
										 } ?>" name="cototAssets" readonly="readonly"  size="40" type="text"></td>

                    </tr>
					 <?php } ?>
					<?php if($fetchinfo1['Any_Other_Outstanding_Loan']=='YES') { ?>
				
                <tr>

                        <td>Any Other Outstanding Loan</td>

                        <td>:</td>

                        <td>

                        <input id="coloan1" name="coloan"  type="radio" value="Yes" 

                               onclick="onSelectedOutstandingLoan('cohousing','cocar','cojeep','cotwowheeler','coconsDurable',false)"          

                                <?php if($readonly) echo 'disabled=disabled'; 

                                            ?>   

                                <?php if($rowc2){

                                if($fetchc2['cloan'] == 'Yes')

                                {        echo "checked='checked'";      }	}



                                    ?>  >Yes

                        <input id="coloan2"  name="coloan" type="radio"   value="No" 

                               onclick="onSelectedOutstandingLoan('cohousing','cocar','cojeep','cotwowheeler','coconsDurable',true);

                                        enableDisabledAssetsChecked(false,'cohousingamt','cohousingemi');

                                        enableDisabledAssetsChecked(false,'cocaramt','cocaremi');

                                        enableDisabledAssetsChecked(false,'cojeepamt','cojeepemi');

                                        enableDisabledAssetsChecked(false,'cotwowheeleramt','cotwowheeleremi');

                                        enableDisabledAssetsChecked(false,'coconsamt','coconsemi'); 

                                        enableDisabledAssetsChecked(false,'cototamount','cototemi');" 

                                <?php if($readonly) echo 'disabled=disabled'; 

                                            ?>

                            <?php if($rowc2){

                                if($fetchc2['cloan'] == 'No')

                                {        echo "checked='checked'";      }	}



                                    ?>   >No</td>

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

                            <input  name="cohousing" id="cohousing" type="checkbox"

                                    onclick="onAssetsChecked(this,'cohousingamt','cohousingemi');calculateAmount('cototamount','cohousingamt','cocaramt','cojeepamt','cotwowheeleramt','coconsamt');"

                                     

                                    <?php if($readonly) echo 'disabled=disabled'; 

                                    if($rowc2){ if($fetchc2['housingamt'] > 0){ echo "checked";}}

                                    if($rowc2){if($fetchc2['cloan'] == 'No')

                                        {?> disabled="disabled" <?php }}

                                     ?>>Housing</td>

                                    <td>

                          <input maxlength="7" ID="cohousingamt" name="cohousingamt"   type="text" 

                                    onchange="calculateAmount('cototamount','cohousingamt','cocaramt','cojeepamt','cotwowheeleramt','coconsamt')"

                                    value="<?php if($rowc2) { echo $fetchc2['housingamt']; } ?>" 

                                    

                                    <?php if($readonly) echo 'readonly=readonly'; 

                                    if($rowc2){if($fetchc2['cloan'] == 'No')

                                        {?> disabled="disabled" <?php }}?>>

                                    </td>

                                    <td>									

                         <input maxlength="7"  id="cohousingemi" name="cohousingemi"  type="text"

                                    onchange="calculateAmount('cototemi','cohousingemi','cocaremi','cojeepemi','cotwowheeleremi','coconsemi')" 

                                    value="<?php if($rowc2) { echo $fetchc2['housingemi']; } ?>" 

                                    <?php if($readonly) echo 'readonly=readonly'; 

                                    if($rowc2){if($fetchc2['cloan'] == 'No')

                                        {?> disabled="disabled" <?php }}?>>

                                    </td>

                    </tr>

                

                    <tr>

                        <td><input name="cocar" id="cocar" type="checkbox"

                                   <?php if($rowc2){ if($fetchc2['caramt'] > 0){ echo "checked";}}?>  

                                    <?php if($readonly) echo 'disabled=disabled'; 

                                            if($rowc2){if($fetchc2['cloan'] == 'No')

                                                 {?> disabled="disabled" <?php }} ?>

                                   onchange="onAssetsChecked(this,'cocaramt','cocaremi');calculateAmount('cototamount','cohousingamt','cocaramt','cojeepamt','cotwowheeleramt','coconsamt');"

                                   >Car</td>

                        <td><input maxlength="7" id="cocaramt" name="cocaramt"   type="text"

                                    value="<?php if($rowc2) { echo $fetchc2['caramt']; } ?>"

                                    <?php if($readonly) echo 'readonly=readonly'; 

                                    if($rowc2){if($fetchc2['cloan'] == 'No')

                                        {?>disabled="disabled" <?php }}?>

                                    onchange="calculateAmount('cototamount','cohousingamt','cocaramt','cojeepamt','cotwowheeleramt','coconsamt')">

                        </td>

                        <td><input maxlength="7"  id="cocaremi"  name="cocaremi"   type="text"

                                    value="<?php if($rowc2) { echo $fetchc2['caremi']; } ?>" 

                                    <?php if($readonly) echo 'readonly=readonly'; 

                                    if($rowc2){if($fetchc2['cloan'] == 'No')

                                        {?>disabled="disabled" <?php }}?>

                                    onchange="calculateAmount('cototemi','cohousingemi','cocaremi','cojeepemi','cotwowheeleremi','coconsemi')" ></td>

                    </tr>

                    <tr>

                            <td><input name="cojeep" id="cojeep" type="checkbox"

                                    <?php if($rowc2){ if($fetchc2['jeepamt'] > 0){ echo "checked";}}?>

                                    <?php if($readonly) echo 'disabled=disabled'; 

                                            if($rowc2){if($fetchc2['cloan'] == 'No')

                                                 {?> disabled="disabled" <?php }} ?>

                                       onclick="onAssetsChecked(this,'cojeepamt','cojeepemi');calculateAmount('cototamount','cohousingamt','cocaramt','cojeepamt','cotwowheeleramt','coconsamt');"

                                       >Jeep</td>

                            <td><input maxlength="7" id="cojeepamt" name="cojeepamt"   type="text"

                                    value="<?php if($rowc2) { echo $fetchc2['jeepamt']; } ?>" 

                                        <?php if($readonly) echo 'readonly=readonly'; 

                                        if($rowc2){if($fetchc2['cloan'] == 'No')

                                        {?>disabled="disabled" <?php }}?>

                                    onchange="calculateAmount('cototamount','cohousingamt','cocaramt','cojeepamt','cotwowheeleramt','coconsamt')"></td>

                            <td><input maxlength="7" name="cojeepemi" id="cojeepemi"   type="text"

                                        <?php if($readonly) echo 'readonly=readonly'; 

                                        if($rowc2){if($fetchc2['cloan'] == 'No')

                                        {?>disabled="disabled" <?php }}?>

                                    value="<?php if($rowc2) { echo $fetchc2['jeepemi']; } ?>"

                                    onchange="calculateAmount('cototemi','cohousingemi','cocaremi','cojeepemi','cotwowheeleremi','coconsemi')" ></td>





                    </tr>

                    <tr>

                            <td><input  name="cotwowheeler" id="cotwowheeler" type="checkbox"

                                        <?php if($rowc2){ if($fetchc2['twowheeleramt'] > 0){ echo "checked";}}?> 

                                        <?php if($readonly) echo 'disabled=disabled'; 

                                                if($rowc2){if($fetchc2['cloan'] == 'No')

                                                 {?> disabled="disabled" <?php }} ?>

                                        onclick="onAssetsChecked(this,'cotwowheeleramt','cotwowheeleremi');calculateAmount('cototamount','cohousingamt','cocaramt','cojeepamt','cotwowheeleramt','coconsamt');"

                                        >Two-wheeler</td>

                            <td><input maxlength="7" id="cotwowheeleramt" name="cotwowheeleramt"   type="text"

                                    value="<?php if($rowc2) { echo $fetchc2['twowheeleramt']; } ?>" 

                                        <?php if($readonly) echo 'readonly=readonly'; 

                                        if($rowc2){if($fetchc2['cloan'] == 'No')

                                        {?>disabled="disabled" <?php }}?>

                                    onchange="calculateAmount('cototamount','cohousingamt','cocaramt','cojeepamt','cotwowheeleramt','coconsamt')"></td>

                            <td><input maxlength="7" name="cotwowheeleremi" id="cotwowheeleremi"   type="text"

                                        <?php if($readonly) echo 'readonly=readonly'; 

                                        if($rowc2){if($fetchc2['cloan'] == 'No')

                                        {?>disabled="disabled" <?php }}?>

                                    value="<?php if($rowc2) { echo $fetchc2['twowheeleremi']; } ?>"

                                    onchange="calculateAmount('cototemi','cohousingemi','cocaremi','cojeepemi','cotwowheeleremi','coconsemi')"  ></td>





                    </tr>

                    <tr>

                            <td><input name="coconsDurable" id="coconsDurable" type="checkbox"

                                    <?php if($rowc2){ if($fetchc2['consamt'] > 0){ echo "checked";}}?>  

                                    <?php if($readonly) echo 'disabled=disabled'; 

                                            if($rowc2){if($fetchc2['cloan'] == 'No')

                                                 {?> disabled="disabled" <?php }} ?>

                                       onclick="onAssetsChecked(this,'coconsamt','coconsemi');calculateAmount('cototamount','cohousingamt','cocaramt','cojeepamt','cotwowheeleramt','coconsamt');"

                                 >Consumer Durables</td>

                            <td><input maxlength="7" id="coconsamt" name="coconsamt"  type="text"

                                    value="<?php if($rowc2) { echo $fetchc2['consamt']; } ?>" 

                                        <?php if($readonly) echo 'readonly=readonly'; 

                                        if($rowc2){if($fetchc2['cloan'] == 'No')

                                        {?>disabled="disabled" <?php }}?>

                                    onchange="calculateAmount('cototamount','cohousingamt','cocaramt','cojeepamt','cotwowheeleramt','coconsamt')"></td>

                            <td><input maxlength="7" name="coconsemi" id="coconsemi"   type="text"

                                        <?php if($readonly) echo 'readonly=readonly'; 

                                        if($rowc2){if($fetchc2['cloan'] == 'No')

                                        {?>disabled="disabled" <?php }}?>

                                    value="<?php if($rowc2) { echo $fetchc2['consemi']; } ?>"

                                    onchange="calculateAmount('cototemi','cohousingemi','cocaremi','cojeepemi','cotwowheeleremi','coconsemi')" ></td>



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

                <input id="cototamount" name="cototamount"  size="40" type="text" readonly="readonly" 

                        value="<?php if($rowc2 && $fetchc2['cloan'] == 'Yes') { echo $fetchc2['totamt']; } ?>"  

                        <?php if($readonly) echo 'readonly=readonly'; ?>></td>

        </tr>
		<?php } ?>
					<?php if($fetchinfo1['Total_EMI']=='YES') { ?>

        <tr>							

                <td>Total EMI</td>

                <td>:</td>

                <td>

                <input id="cototemi" name="cototemi"  size="40" type="text" readonly="readonly"

                value="<?php if($rowc2 && $fetchc2['cloan'] == 'Yes') { echo $fetchc2['totemi']; } ?>"

                <?php if($readonly) echo 'readonly=readonly'; ?>></td>

        </tr>
		 <?php } ?>
					<?php if($fetchinfo1['Average_Monthly_Bank_Balance_for_Last_3_months']=='YES') { ?>


        <tr>

                <td>Average Monthly Bank Balance for Last 3 months</td>

                <td>:</td>

                <td>

                <input id="cobankbal" maxlength="7" name="cobankbal" size="40" type="text" 

                        value="<?php if($rowc2) { echo $fetchc2['cbankbal']; } ?>"  

                        <?php if($readonly) echo 'readonly=readonly'; 

                                    ?>></td>

        </tr>
					<?php  } ?>

        </table></div></td></tr>
		
					<?php if($fetchinfo1['Can_Offer_Collateral_Security']=='YES') { ?>

		<tr>

                        <td>Can Offer Collateral Security?</td>

                        <td>:</td>

                        <td>





                        <input  id="security1" name="security" type="radio" value="Yes" 





                                <?php if($row1){

                                if($fetch1['security'] == 'Yes')

                                {        echo "checked='checked'";      }	}



                                    if($readonly) echo 'disabled=disabled'; 

                            ?>onclick="onclickConfirmAssetsCollateral(this)" >Yes

                        <input id="security2" name="security" type="radio" value="No"

                            <?php if($row1){

                                if($fetch1['security'] == 'No')

                                {        echo "checked='checked'";      }	}



                                    if($readonly) echo 'disabled=disabled'; 

                            ?>  onclick="onclickConfirmAssetsCollateral(this)" >No</td>

                </tr>
					<?php  } ?>
					
					<tr><td align="right"><input id="action"  class="nextbutton" style="font-size: 16px;" type="button" value="Back" onclick="activetabs('1')"></td>
					
					<td><input id="action" type="button"   class="nextbutton" style="font-size: 16px;" value="Next" onclick="activetabs('3')"></td></tr>
					</table>
					
	  </div>
	  <?php } ?>
	  
	  <div id="tabs-4" style="background-color:white">
				
        <table align="center" border="0" cellpadding="3" cellspacing="0" width="650">
        <tr>

                <td class="heading" colspan="3">Contact Preference</td>

        </tr>

        <tr>

                <td valign="top">Best Day to Call You Regarding Loan</td>

                <td valign="top">:</td>

                <td>

                <table width="100%">

                    <tr>

                          <td><input name="anyday" type="checkbox" <?php if($readonly) echo 'disabled=disabled'; ?>  

                                <?php 

                                if($row) {

                                            $prefer_day =$fetch['prefer_day'];



                                            $str =explode(".",$prefer_day);



                                            if(in_array('Any Day', $str)){ echo "checked='checked'"; }



                                        }

                                ?>  >Any Day</td>



                          <td><input name="monday" type="checkbox" <?php if($readonly) echo 'disabled=disabled'; ?>                               

                                <?php if($row) {

                                $prefer_day =$fetch['prefer_day'];



                                $str1 =explode(".",$prefer_day);



                                if(in_array('Monday', $str)){ echo "checked='checked'"; }



                               }

                            ?> >Monday</td>

                     </tr>

                        <tr>

                                <td><input name="tuesday" type="checkbox" 

                                            <?php if($readonly) echo 'disabled=disabled'; 

                                    ?>

                                            <?php if($row) {

                $prefer_day =$fetch['prefer_day'];



                        $str =explode(".",$prefer_day);



                        if(in_array('Tuesday', $str)){ echo "checked='checked'"; }

                                            }



                ?> >Tuesday</td>

                                <td><input name="wednesday" type="checkbox" 

                                            <?php if($readonly) echo 'disabled=disabled'; 

                                    ?>

                                                                            <?php 

                            if($row) {

                $prefer_day =$fetch['prefer_day'];



                        $str =explode(".",$prefer_day);



                        if(in_array('Wednesday', $str)){ echo "checked='checked'"; }



                            }

                ?>  >Wednesday</td>

                        </tr>

                        <tr>

                                <td><input name="thursday" type="checkbox" 

                                            <?php if($readonly) echo 'disabled=disabled'; 

                                    ?>

                                <?php 

                                if($row) {

                                            $prefer_day =$fetch['prefer_day'];



                                                    $str =explode(".",$prefer_day);



                                                    if(in_array('Thursday', $str)){ echo "checked='checked'"; }



                                         }

                                            ?>  >Thursday</td>

                                <td><input name="friday" type="checkbox" 

                                            <?php if($readonly) echo 'disabled=disabled'; 

                                    ?>

                                <?php if($row) {

                                                $prefer_day =$fetch['prefer_day'];



                                                    $str =explode(".",$prefer_day);



                                                    if(in_array('Friday', $str)){ echo "checked='checked'"; }

                                            }



                                ?>  >Friday</td>

                        </tr>

                        <tr>

                                <td><input name="saturday" type="checkbox" 

                                            <?php if($readonly) echo 'disabled=disabled'; 

                                    ?>

                                                <?php 

                                if($row) {

                $prefer_day =$fetch['prefer_day'];



                        $str =explode(".",$prefer_day);



                        if(in_array('Saturday', $str)){ echo "checked='checked'"; }



                                }

                ?> >Saturday</td>

                                <td><input name="sunday" type="checkbox"

                                            <?php if($readonly) echo 'disabled=disabled'; 

                                    ?>

                                    <?php 

                                    if($row) {

                $prefer_day =$fetch['prefer_day'];



                        $str =explode(".",$prefer_day);



                        if(in_array('Sunday', $str)){ echo "checked='checked'"; }



                                    }  

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

                         <?php if($readonly) echo 'disabled=disabled'; 

                                                                            ?>

                        <?php if($row) {

                            $prefer_time =$fetch['prefer_time'];



                            $str =explode(".",$prefer_time);



                            if(in_array('Any Time', $str)){ echo "checked='checked'"; }

                        }



                    ?>>Any Time</td>

        </tr>

         <tr>

            <td>

            <input name="morning"  type="checkbox" onclick="return onTimeChecked(this,'morning_time')"

                    <?php if($readonly) echo 'disabled=disabled'; ?>

                    <?php 

                    $ChkMorningTimeValue = 0;

                     if($row) {

                                $prefer_time =$fetch['prefer_time'];

                                $str =explode(".",$prefer_time);



                                if(in_array('08 AM to 09 AM', $str)){ $ChkMorningTimeValue = 0; }

                                else if(in_array('09 AM to 10 AM', $str)){ $ChkMorningTimeValue = 0; }

                                else if(in_array('10 AM to 11 AM', $str)){ $ChkMorningTimeValue = 0; }

                                else if(in_array('11 AM to 12 PM', $str)){ $ChkMorningTimeValue = 0; }

                                else $ChkMorningTimeValue = 1;

                              }   

                              if($ChkMorningTimeValue == 0) echo "checked='checked'";

                    ?> >Morning

            </td>

                                    <td>

                                    <select name="morning_time" id="morning_time"

                                        <?php if($readonly) 

                                             {echo 'disabled=disabled';}

                                                else if ($ChkMorningTimeValue == 1)

                                                {

                                                    echo 'disabled=disabled';

                                                }?>

                                            >

                                    <option>Select</option>

                                    <option  <?php if($readonly) echo 'disabled=disabled'; ?>

                                             <?php if($row) {

                                                            $prefer_time =$fetch['prefer_time'];

                                                            $str =explode(".",$prefer_time);

                                                            if(in_array('08 AM to 09 AM', $str)){ echo "selected='selected'"; }     }

                                                        ?> >08 AM to 09 AM</option>

                                    

                                    <option <?php if($readonly) echo 'disabled=disabled'; ?>

                                            <?php if($row) {

                                                            $prefer_time =$fetch['prefer_time'];

                                                            $str =explode(".",$prefer_time);

                                                            if(in_array('09 AM to 10 AM', $str)){ echo "selected='selected'"; }    } 

                                                        ?> >09 AM to 10 AM</option>

                                   

                                    <option 

                                         <?php if($readonly) echo 'disabled=disabled'; ?>

                                            <?php if($row) {

                                                            $prefer_time =$fetch['prefer_time'];

                                                            $str =explode(".",$prefer_time);

                                                            if(in_array('10 AM to 11 AM', $str)){ echo "selected='selected'"; }   }  

                                                        ?> >10 AM to 11 AM</option>

                                   

                                    <option   <?php if($readonly) echo 'disabled=disabled'; ?>

                                         <?php if($row) {

                                                            $prefer_time =$fetch['prefer_time'];

                                                            $str =explode(".",$prefer_time);

                                                            if(in_array('11 AM to 12 PM', $str)){ echo "selected='selected'"; }    } 

                                                        ?>  >11 AM to 12 PM</option>

                                                        </select></td>

                            </tr>

                            <tr>

                                    <td>

                <input name="afternoon" type="checkbox"  onclick="return onTimeChecked(this,'afternoon_time')" 

                    <?php if($readonly) echo 'disabled=disabled'; ?>

                          <?php 

                          $ChkAftrnunTimeValue=0;

                          if($row) {

                            $prefer_time =$fetch['prefer_time'];

                            $str =explode(".",$prefer_time);



                            if(in_array('12 PM to 01 PM', $str)){ $ChkAftrnunTimeValue = 0; }

                            else if(in_array('01 PM to 02 PM', $str)){ $ChkAftrnunTimeValue = 0; }

                            else if(in_array('02 PM to 03 PM', $str)){ $ChkAftrnunTimeValue = 0; }

                            else if(in_array('03 PM to 04 PM', $str)){ $ChkAftrnunTimeValue = 0; }

                            else $ChkAftrnunTimeValue = 1;

                            }

                            if($ChkAftrnunTimeValue == 0) echo "checked='checked'";



                           ?>>Afternoon</td>

                                    <td>

                                    <select name="afternoon_time" id="afternoon_time"

                                   <?php if($readonly) 

                                            {  echo 'disabled=disabled';   }

                                         else if ($ChkAftrnunTimeValue == 1)

                                            {

                                                echo 'disabled=disabled';

                                            }?>>

                                    <option>Select</option>

                                    <option   

                                            <?php if($row) {

                                                $prefer_time =$fetch['prefer_time'];

                                                $str =explode(".",$prefer_time);

                                                if(in_array('12 PM to 01 PM', $str)){ echo "selected='selected'"; }     }

                                            ?> >12 PM to 01 PM</option>

                                    <option 

                                            <?php if($row) {

                                                $prefer_time =$fetch['prefer_time'];

                                                $str =explode(".",$prefer_time);

                                                if(in_array('01 PM to 02 PM', $str)){ echo "selected='selected'"; }    } 

                                            ?> >01 PM to 02 PM</option>

                                    <option 

                                           <?php if($row) {

                                                $prefer_time =$fetch['prefer_time'];

                                                $str =explode(".",$prefer_time);

                                                if(in_array('02 PM to 03 PM', $str)){ echo "selected='selected'"; }   }  

                                            ?>  >02 PM to 03 PM</option>

                                    <option 

                                            <?php if($row) {

                                                $prefer_time =$fetch['prefer_time'];

                                                $str =explode(".",$prefer_time);

                                                if(in_array('03 PM to 04 PM', $str)){ echo "selected='selected'"; }     }

                                            ?>  >03 PM to 04 PM</option>

                                    </select></td>

                            </tr>

                            <tr>

                                    <td>

                   <input name="evening"  type="checkbox" onclick="return onTimeChecked(this,'evening_time')"

                                  <?php if($readonly) echo 'disabled=disabled'; ?>

                                    <?php 

                                    $ChkEveningTimeValue = 0;

                                    if($row) {

                                        $prefer_time =$fetch['prefer_time'];

                                        $str =explode(".",$prefer_time);



                                        if(in_array('04 PM to 05 PM', $str)){ $ChkEveningTimeValue = 0; }

                                        else if(in_array('05 PM to 06 PM', $str)){ $ChkEveningTimeValue = 0; }

                                        else if(in_array('06 PM to 07 PM', $str)){ $ChkEveningTimeValue = 0; }

                                        else if(in_array('07 PM to 08 PM', $str)){ $ChkEveningTimeValue = 0; }

                                        else $ChkEveningTimeValue = 1;

                                        } 

                                        if($ChkEveningTimeValue == 0) echo "checked='checked'";

                                    ?>>Evening</td>

                                    <td>



                                    <select name="evening_time" id="evening_time"

                                      <?php if($readonly) 

                                            {   echo 'disabled=disabled';  }

                                            else if ($ChkEveningTimeValue == 1)

                                            {

                                                echo 'disabled=disabled';

                                            }?>>?>>

                                    <option>Select</option>

                                    <option 

                                        <?php if($row) {

                                                $prefer_time =$fetch['prefer_time'];

                                                $str =explode(".",$prefer_time);

                                                if(in_array('04 PM to 05 PM', $str)){ echo "selected='selected'"; }   }  

                                            ?> >04 PM to 05 PM</option>

                                    <option 

                                        <?php if($row) {

                                                $prefer_time =$fetch['prefer_time'];

                                                $str =explode(".",$prefer_time);

                                                if(in_array('05 PM to 06 PM', $str)){ echo "selected='selected'"; } }    

                                            ?> >05 PM to 06 PM</option>

                                    <option 

                                        <?php if($row) {

                                                $prefer_time =$fetch['prefer_time'];

                                                $str =explode(".",$prefer_time);

                                                if(in_array('06 PM to 07 PM', $str)){ echo "selected='selected'"; }     }

                                            ?> >06 PM to 07 PM</option>

                                    <option

                                    <?php if($row) {

                                                $prefer_time =$fetch['prefer_time'];

                                                $str =explode(".",$prefer_time);

                                                if(in_array('07 PM to 08 PM', $str)){ echo "selected='selected'"; }    } 

                                            ?> >07 PM to 08 PM</option>

                 	</select></td>

		</tr>

    </table>

                    </td>

        </tr>

        <tr>

            <td colspan="3">

        <div id="BusiRec_panel" name="BusiRec_panel" <?php if ($_SESSION['usertype'] == 'Employee') {  ?> style="display: block" <?php } else { ?> style="display: none" <?php } ?>>

        <table>

        <tr>

                <td>Business Recommendation</td>

                <td> : </td>

                <td colspan="2"> 

                    <input   id="BusiRec1" name="BusiRec" type="radio" value="Yes"  

                                <?php 

                                if($readonly) echo 'disabled=disabled'; 

                                    ?>

                        <?php if($row){

                        if($fetch['BusiRec'] == 'Yes')

                            { echo "checked='checked'"; }	}?>>Yes

                    <input id="BusiRec2" name="BusiRec" type="radio" value="No"  

                            <?php if($readonly) echo 'disabled=disabled'; 

                                    ?>

                        <?php if($row){

                            if($fetch['BusiRec'] == 'No')

                            { echo "checked='checked'"; }   }?>>No

                </td>

        </tr>  

         <tr><td><?php if (isset($_POST['myradio'])) { ?> 

                        <input type="hidden" name="no" value="<?php echo $_POST['myradio']; ?>"  />

                 <?php } ?>

             </td>

         </tr>

        <tr></tr>
		

        </table>

        </div>

                </td>

                </tr>

                        

        <tr><td align="center" colspan="3">

           
			
			 <?php  if(($_SESSION['usertype'] == 'Employee') || ($_SESSION['usertype'] == 'Partner')  )

            { ?>
			
			<a href="DisplaySearchResult.php"><input name="btnBack" type="button" class="nextbutton" style="font-size: 16px;" value="Back to Search Results " /></a> 
			
			<?php } ?>
         <input id="action"  class="nextbutton" style="font-size: 16px;" type="button" value="Back" onclick="activetabs('2')">
					
							
            <input id="submit" name="submit" class="nextbutton" style="font-size: 16px;"  type="submit" value="Submit" onclick="setaction('updateApplication.php');"
              
			  
			 <?php if($readonly) echo 'disabled=disabled'; 
					
					
                            if($loan_disbursed_row) { echo 'disabled=disabled';  }
					
					

                            ?>>

            </td>

        </tr>

                        

<?php require_once("./common/ListOfDocuments.php"); ?>                                   

                        </tr>

<div id="pageNavPosition" align="center"> </div>

    </table>					

		</div>			

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



</html>

<?php ob_flush(); ?>