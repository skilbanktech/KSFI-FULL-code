<?php

ob_start();

session_start();


  include('common/class_Common.php');
						  
   $objCommon=new Common();
   
   
   
     //select id for course in application_scoringfields_list table
            $courseid=$objCommon->getIdofrecord('application_scoringfields_list','actual_field_name','course');
			
			$collegeid=$objCommon->getIdofrecord('application_scoringfields_list','actual_field_name','college');
			
			$universityid=$objCommon->getIdofrecord('application_scoringfields_list','actual_field_name','university');
          


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

            $('input:checkbox[id$=chkpanel]').click(function () { 

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



</style>

</head>

    



<body id="Body">



<div align="center">

<form id="loanApplication" action="send_editcoursedetails.php"  method="post" name="loanApplication" onsubmit="return validateLoanApplicationFormOnSubmit(this,'3')">		<div align="center" class="skinwrapper">

			
<?php
include('./common/common_mainmenu.php');


        //database connection

	include('./connection.php');

   



	



         if(($_SESSION['usertype'] == 'Employee') || ($_SESSION['usertype'] == 'Partner') || ($_SESSION['usertype'] == 'Institute') )

            {

            $id=$_GET['id'];



            }

            else 

            {

            $id=$_SESSION['id'];

            }

        

        



	$select_query = "Select reference_id,firstname,middlename,lastname,dob,adharcardno,panno,gender,marital_status,email,password,address,street1,street2,state,district,

            city,yearsInResidence,ResidentialStatus,residentialstatus_others,pincode,stdcode,phone,mobile,phone1,prevUniversity,prevCollege,prevCourse,
			category_prevcourse,category_prevcourseothers,MaxmarksObtainedIn,marks,entranceTest,typeoftest,GDScore,PIScore,prefer_day,

            prefer_time,query,app_date,source,mail_status,update_date,partnername,app_status,employment,employment_other,business,

            designation,yearsInEmployement,income,bankbal,appworking,verificationstatus,Empaddress,Empstreet1,Empstreet2,Empcountry,Empstate,

            Empcity,Emppincode,Empstdcode,Empphone,AppliedBy, AppliedByRole,BusiRec from student_details where reference_id = '$id'";

	$select_record=mysql_query($select_query); 

	



	$row= mysql_fetch_row($select_record);

        

	if($row)

            {

                $col = array('reference_id','firstname','middlename','lastname','dob','adharcardno','panno','gender','marital_status','email','password','address','street1','street2','state','district',

                'city','yearsInResidence','ResidentialStatus','residentialstatus_others','pincode','stdcode','phone','mobile','phone1','prevUniversity','prevCollege','prevCourse','category_prevcourse','category_prevcourseothers','MaxmarksObtainedIn','marks','entranceTest','typeoftest','GDScore','PIScore', 'prefer_day',

                'prefer_time','query','app_date','source','mail_status','update_date','partnername','app_status','employment',
				'employment_other','business',

                'designation','yearsInEmployement','income','bankbal','appworking','verificationstatus','Empaddress','Empstreet1','Empstreet2','Empcountry','Empstate',

                'Empcity','Emppincode','Empstdcode','Empphone','AppliedBy', 'AppliedByRole', 'BusiRec');



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

                $mode=$_GET['Mode'];

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

                cpanno,cemail,caddress,cstreet1,cstreet2,cstate,cdistrict,ccity,cyearsInResidence,cResidentialStatus,cresidentialstatus_others,cpincode,cstdcode,cphone,cmobile,cphone1,

                cemployment,cemployment_other,cbusiness,cdesignation,cyearsInEmployement,cincome,cloan,housingamt,caramt,jeepamt,twowheeleramt,consamt,totamt,cbankbal,samestudadd,

                housingemi,caremi,jeepemi,twowheeleremi,consemi,totemi,cempaddress,cempstreet1,cempstreet2,

                cempstate,cempdistrict,cempcity,cemppincode,cempstdcode,cempphone

        from coapplicant_details where reference_id = '$id'";

	$select_record2=mysql_query($select_query2); 

	//or die(mysql_error());

	



	$row2= mysql_fetch_row($select_record2);

        

        $coborrowerCol = array('reference_id','coborrowerid','relation','relative','cfirstname','cmiddlename','clastname','cdob','cadharcardno',

                'cpanno','cemail','caddress','cstreet1','cstreet2','cstate','cdistrict','ccity','cyearsInResidence','cResidentialStatus','cresidentialstatus_others','cpincode','cstdcode','cphone','cmobile','cphone1',

                'cemployment','cemployment_other','cbusiness','cdesignation','cyearsInEmployement','cincome','cloan','housingamt','caramt','jeepamt','twowheeleramt','consamt','totamt',

                'cbankbal','samestudadd','housingemi','caremi','jeepemi','twowheeleremi','consemi','totemi','cempaddress','cempstreet1','cempstreet2',

                    'cempstate','cempdistrict','cempcity','cemppincode','cempstdcode','cempphone');



       if($row2)

            {

             $fetch2 = array_combine($coborrowerCol,$row2); 

            }
			
			
			
				$cincome=$fetch2['cincome'];
				
				


      
      $rowc2= mysql_fetch_row($select_record2);

        

      if($rowc2){

     

     



/*	$colc2 = array('reference_id','coborrowerid','relation','relative','cfirstname','cmiddlename','clastname','cdob',

'cpanno','cemail','caddress','cstreet1','cstreet2','cstate','cdistrict','ccity','cpincode','cstdcode','cphone','cmobile','cphone1',

'cemployment','cbusiness','cdesignation','cincome','cloan','housingamt','caramt','jeepamt','twowheeleramt','consamt','totamt',

'cbankbal','samestudadd','housingemi','caremi','jeepemi','twowheeleremi','consemi','totemi','cempaddress','cempstreet1','cempstreet2',

    'cempstate','cempdistrict','cempcity','cemppincode','cempstdcode','cempphone');*/

	   $fetchc2 = array_combine($coborrowerCol,$rowc2); 

	   
				$coincome=$fetchc2['cincome'];
				
				


	   
	   
	   

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
								
								
			
			
 ?>

                                            

                
									
                        <table align="center" border="0" cellpadding="3" cellspacing="0" width="650">
                   
                   
								

                    <tr>

                            <td height="5"></td>

                    </tr>

                    <tr>

                            <td class="heading" colspan="3"><span style="font-size:12"><b>Course Details for Which Loan is Required<b></span></td>

                    </tr>
					
					 <tr>

                            <td>Reference ID</td>

                            <td>:</td>

                            <td>

                            <input id="" name="refID" size="40" type="text"

                                    value="<?php if($id) { echo $id; } ?>"  ></td>

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

                        <td>State</td>

                        <td>:</td>

                        <td>

                                <input id="ColcountrySelect1" name="Colcountry1" size="20" type="text" onChange="changeState(this,'ColcountrySelect1','ColstateSelect1','ColcitySelect1','ColcountrySelect','ColstateSelect','ColcitySelect');" 

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

                                <input id="ColstateSelect1" name="Colstate1" size="20" type="text" onChange="changeState(this,'ColcountrySelect1','ColstateSelect1','ColcitySelect1','ColcountrySelect','ColstateSelect','ColcitySelect');" 

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

							

                            <input id="ColcitySelect1" name="Colcity1" size="20" type="text" onChange="changeState(this,'ColcountrySelect1','ColstateSelect1','ColcitySelect1','ColcountrySelect','ColstateSelect','ColcitySelect');" 

                                    value="<?php if($row6) { echo $fetch6['city']; } ?>" 

                                    <?php if($readonly) echo 'readonly=readonly'; ?>>



                                    <select id="ColcitySelect" <?php if($row6){ if($fetch6['city']!=''){ echo 'disabled="disabled"'; }}?>   style="display:none"name="Colcity" size="1">

                                    </select>

                                    <script type="text/javascript">initCountry('','ColcountrySelect','ColstateSelect','ColcitySelect');</script>

                            </td>

                    </tr>

                    <tr>

                            <td>Pincode</td>

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

                            <input id="Colstdcode"  placeholder="STD Code" maxlength="6" name="Colstdcode" size="10" type="text" onchange="onchangeStdcode(this)"

                            value="<?php if($row6) { echo $fetch6['stdcode']; } ?>" 

                                    <?php if($readonly) echo 'readonly=readonly'; 

                                                ?>>

                            <input id="Colphone" placeholder="Enter 8 digits" maxlength="8" name="Colphone" size="24" type="text" onchange="onchangePhone(this)"

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

            </table>
<table align="center" border="0" cellpadding="3" cellspacing="0" width="650">

                    <tr>

                            <td style="height: 20px"></td>

                    </tr>

                       <tr>

                                         <td>Eligibility Test Taken(if any)</td>

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

          									


                           </table>
									
                        <table  <?php if($entranceTest=='No'){   ?> style="display:none" <?php } ?> id="entrancetestpanel" align="center" border="0" cellpadding="3" cellspacing="0" width="650">
					         
								     <tr>
										    <td>
											Select Eligibility Test
                                            </td>	<td></td>		
											
											<td align="left">
											Score of Eligibility Test
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

      <table align="center">
	  
     <tr><td> <input id="submit" name="submit" type="submit" value="Submit" onclick=""></td></tr>

      </table>             
                   	

               

<?php include('./common/comFooter.php');?>