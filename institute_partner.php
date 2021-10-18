

<?php 
 session_start();
 
 include('common/class_Common.php');
						  
   $val=new Common();
   
   if(isset($_GET['course_id']))
   {
   $course_id=$_GET['course_id'];
   }
   else
   {
	 $course_id='';  
	   
   }
  include('./connection.php');
  
 // partner id
	$employee_id=$_SESSION['user_id'];
  
  $select_query= "Select college,university,course_id,coursetitle_name,course_name,course_type,course_duration_years,course_duration_months,sessions_of_program,conditional_offer_beforetraining,conditional_offer_companyname,unconditional_offer_beforetraining,unconditional_offer_companyname,corporate_tieup,corporate_tieup_companyname,industry_type,other_industrytype,nsdc_approval,location_number,company_location,other_companylocation,previous_recruited_companies,jobskill_type,monthly_salary,newtraining_program,newtrainingprogram_years,students_trained,students_placed,basic_qualification,degree_qualification,other_degree_qualification,masters_education,other_master_education,eligibility_test,test_name,written_test,personal_interview,group_discussion,previous_academic_percentage,cutoff_percentage,tution_fees,examination_fees,studymaterials_cost,travelling_expenses,transportation_expenses,owner_training_experience,owner_trainingexperience_years,corporate_driven_institute,corporate_driveninstitute_years,owner_industry_experience,
		owner_industryexperience_years,owner_course_experience,owner_courseexperience_years,NSDC_standard_content,
    institute_inhouse,industry_approved_content,trainers_qualification,delivery_model from institute_partnerdetails where employee_id='$employee_id' and course_id='$course_id' ";
  
//echo($select_query);
$result = mysql_query($select_query); 
$count=mysql_num_rows($result);

$row = mysql_fetch_array($result);


?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml">



<!-- #BeginTemplate "webtemplate.dwt" -->



<head id="Head">
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
<link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="./bootstrap/js/jquery.min.js"></script>
<script src="./bootstrap/js/bootstrap.min.js"></script>
<script src="./bootstrap/js/bootstrap-submenu.min.js" defer></script>
<link id="KSFSkin" href="./css/ksfi.css" rel="stylesheet" type="text/css">
<style>
.services{font-family: Verdana, Arial, Helvetica, sans-serif;	font-size: 12px; 
font-weight:normal; text-decoration:none; text-align:justify; color: #262278; }
.heading{ background:#E6F0FA; font:bold 12px; text-align:center;}

 label {
  
    
    text-align:left;
}


</style>
<script type="text/javascript">
    function ShowHideDiv(val,id) {
		
	 var fld = document.getElementById(id);
		if(val=='show')
		{
        
         fld.style.display ="";
		}
		else if(val=='hide')
		{
		 fld.style.display ="none";
        }
       
    }
	
	
</script>
<script language="javascript" src="js/contactus.js" type="text/javascript"> </script>
 
  
<script language="javascript" src="js/copy_state.js" type="text/javascript"> </script>

<script language="javascript" src="js/common.js" type="text/javascript"> </script>

<style>
a#contactus{  background-color: #157ab5;}

label

{font-size:12px;}

</style>



<body id="Body">

<div align="center">
<?php  include_once('./common/bootstrap_common_mainmenu.php'); ?>
	
<table  border="0" align="center">
	
	
	
	<tr>
	<td>
	
    <div class="container theme-showcase" role="main" style="padding:30px;"> 
  
  <div class="span8"> 
  
   <form action='add_institute_partnerdetails.php' method='post' border='0'>
 
	
  <div class="form-group">
            <h3 align="left"> Course Details</h3>
			<hr></hr>
			
			 <div class="row">
        <div class="form-group">
        <div class="col-md-3">
		<label>College </label>
		 <input type="text" class="form-control border-input" name="college" id="college" 
			placeholder="College"  value="<?php if($row) { echo $row['college']; } ?>" required><br>
		</div>
		<div class="col-md-3">
		<label>University</label>
		<input type="text" class="form-control border-input" name="university" id="university" 
			placeholder="university"  value="<?php if($row) { echo $row['university']; } ?>" required><br>
		</div>
		</div>
		</div>
	
    <div class="row">
      <div class="form-group">
        <div class="col-md-3">
                  
         <label>Title of the Course</label>
		 <input type="hidden" name="course_id" id="course_id" value="<?php if($row) { echo $row['course_id']; } ?>"/> 
         <input type="text" class="form-control border-input" name="coursetitle_name" id="coursetitle_name" 
												placeholder="Title of the Course"  value="<?php if($row) { echo $row['coursetitle_name']; } ?>" required><br>
        </div>

        <div class="col-md-3">      
                     <label>Name of the Course</label>
             <input type="text" class="form-control border-input" name="course_name" placeholder="Course Name" value="<?php  if($row) { echo $row['course_name']; } ?>" required>
                                            </div>
      </div>  
	  </div>
	  <div class="row">
	  <div class="form-group">
        <div class="col-md-3">
                  
         <label >Course Type</label>
            <select name="course_type" class="form-control border-input" required>
			<option><?php if($row) { echo $row['course_type']; } ?></option>
			 <option value="">Select</option>
			   
			   <option>Full Time Training Program</option>
			   <option>Part Time Training Program</option>
			   <option>Online or Correspondence</option>
		    </select>
				 
				<br>  
        </div>
     
        <div class="col-md-3">
                  
        <label>Type of Industry catering to</label>
        <select class="form-control border-input" id="course_details"  name="industry_type" onchange="enableIndustry(this)" >
			<option value="">--Select--</option>
			 <?php
	
		$table_name1='industry';
		$col_name1='name';
		$arrvalue=$row['industry_type'];
	 
	 
	    $val->getoptionsfromdbchecked($table_name1,$col_name1,$arrvalue);
	    ?>
		</select>
        </div>
       </div>
	  </div>
	
	<div class="row">
	  <div class="form-group">
        <div class="col-md-3">
                  
                                     <label>Complete Duration of Training Progarm</label>
                                               <select name="course_duration_years" class="form-control border-input" id="course_duration_years" required>
											   <?php if($row) {   ?><option><?php echo $row['course_duration_years'];?> </option><?php } ?>
				     <option value="">Years</option>
					 <option value="0">0</option>
					 <option value="1">1</option>
					 <option value="2">2</option>
					 <option value="3">3</option>
					 <option value="4">4</option>
					 <option value="5">5</option>
					 <option value="6">6</option>
					 <option value="7">7</option>
					 <option value="8">8</option>
					 <option value="9">9</option>
					 <option value="10">10</option>
					 <option value="11">11</option>
					 <option value="12">12</option>
					 <option value="13">13</option>
					 <option value="14">14</option>
					 <option value="15">15</option>
					 <option value="16">16</option>
					 <option value="17">17</option>
					 <option value="18">18</option>
					 <option value="19">19</option>
					 <option value="20">20</option>
					 <option value="21">21</option>
					 <option value="22">22</option>
					 <option value="23">23</option>
					 <option value="24">24</option>
					 <option value="25">25</option>
					 
			</select>
					
            <select name="course_duration_months" class="form-control border-input" id="course_duration_months"  required>
			
			<?php if($row) {   ?><option selected="selected"><?php echo $row['course_duration_months'];  ?></option><?php } ?>
			<option selected="" value="">Months</option>  
					<option value="00">0</option>
					<option value="01">1</option>
					<option value="02">2</option>
					<option value="03">3</option>
					<option value="04">4</option>
					<option value="05">5</option>
					<option value="06">6</option>
					<option value="07">7</option>
					<option value="08">8</option>
					<option value="09">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					</select><br>
        </div>

        <div class="col-md-3">      
                    <label>Specific Sessions Of The Program</label>
                                              
												<select name="sessions_of_program" class="form-control border-input" >
												<?php if($row) {  ?><option selected="selected"><?php echo $row['sessions_of_program'];  ?></option><?php } ?>
												<option value="">--Select--</option>
												<option>Classroom Theoritical Secession In Hrs</option>
												<option>Classroom Practical Secession In Hrs</option>
												<option>Industry Visit  days</option>
												<option>On The Job Training  Program In Months</option>
												<option>Apprenticeship In Months</option>
												<option>Paid Internship Program In Months</option>
												</select>
        </div>
      </div>  
	  
	  
    </div>

	
	<div class="row">
	  <div class="form-group">
        <div class="col-md-3">
                  
         <label>Is there Conditional Offer letter before training </label><br/>
                                               
		<label ><input type="radio" name="conditional_offer_beforetraining"   value='Yes'<?php if($row) {  if($row['conditional_offer_beforetraining']=='Yes'){ echo 'checked';} } ?> id="chkYes" onclick="ShowHideDiv('show','conditionaloffer')">Yes</label>
		<label ><input type="radio"   name="conditional_offer_beforetraining" value='No' <?php if($row) {  if($row['conditional_offer_beforetraining']=='No'){ echo 'checked';} }?> id="chkNo"onclick="ShowHideDiv('hide','conditionaloffer')">No
			<br/>									
        </div>
  
        <div class="col-md-6">
                  
           <label>Is there Un-Conditional Offer letter before training</label><br/>
           <label ><input type="radio" name="unconditional_offer_beforetraining" value="Yes "<?php if($row) { if($row['unconditional_offer_beforetraining']=='Yes'){ echo 'checked';} }?>  id="chYes" onclick="ShowHideDiv('show','unconditionoffer')">Yes</label>
			<label  ><input type="radio" name="unconditional_offer_beforetraining" value="No" <?php  if($row) { if($row['unconditional_offer_beforetraining']=='No'){ echo 'checked';} }?>  onclick="ShowHideDiv('hide','unconditionoffer')">No</label>
        </div>
      </div>  
    </div>

    
 <div class="row"  id="conditionaloffer" <?php  if($row) { if($row['conditional_offer_beforetraining']!='Yes') { ?>  style="display: none" <?php } } else {  ?>    style="display: none" <?php } ?> >
	      <div class="form-group">
               <div class="col-md-3">
                   <label >Company Name </label>
                   <input type="text" name="conditional_offer_companyname" class="form-control border-input" placeholder="If yes name the company"  value="<?php  if($row) {  echo $row['conditional_offer_companyname']; } ?>" /><br/>
			 
            
	             </div>
                </div>
              </div>
    <div class="row" id="unconditionoffer"   <?php  if($row) { if($row['unconditional_offer_beforetraining']!='Yes') { ?>  style="display: none" <?php } } else {  ?>    style="display: none" <?php } ?> >
	      <div class="form-group">
	
               <div class="col-md-3"  >
                <label >Company Name </label>
                 <input type="text" placeholder="If yes name the company"  class="form-control border-input" name="unconditional_offer_companyname"
				 value="<?php if($row) {  echo $row['unconditional_offer_companyname']; } ?>"  />
			 </div>
             </div>
	 </div>
	<div class="row">
      <div class="form-group">
        <div class="col-md-3">
                  
         <label>Is there any Corporate Tie-up for recruitment </label><br/>
        <label><input type="radio"name="corporate_tieup" value="Yes" id="cYes" <?php  if($row) { if($row['corporate_tieup']=='Yes'){ echo 'checked';} }?> onclick="ShowHideDiv('show','corporatetieup')"> Yes</label>
			<label ><input type="radio" name="corporate_tieup" value="No" <?php if($row) { if($row['corporate_tieup']=='No'){ echo 'checked';} } ?>   onclick="ShowHideDiv('hide','corporatetieup')">No</label><br>
        </div>
      
        <div class="col-md-6">      
                     <label> Is it Approved by NSDC Program </label><br/>
					 <label ><input type="radio"  name="nsdc_approval" <?php if($row) { if($row['nsdc_approval']=='Yes') { echo 'checked=checked'; } } ?>  value="Yes" id="nsdc_approval"/>Yes</label>
			        <label ><input type="radio" name="nsdc_approval" <?php if($row) { if($row['nsdc_approval']=='No') { echo 'checked=checked'; } } ?>  value="No" id="nsdc_approval"/>No</label>
        </div>
        </div> 
	  </div><br/>	  
	  <div class="row"  id="corporatetieup"   <?php  if($row) { if($row['corporate_tieup']!='Yes') { ?>  style="display: none" <?php } } else {  ?>    style="display: none" <?php } ?>> 
	      <div class="form-group">
               <div class="col-md-3">
                <label >Company Name </label>
              <input type="text" value="<?php if($row) { echo $row['corporate_tieup_companyname']; } ?>" placeholder="If yes name the company" name="corporate_tieup_companyname"  class="form-control border-input" />
			 </div>
             </div>
	 </div>
	 
	 <div class="row"  id="coursedetails_panel"  style="display:none"> 
	      <div class="form-group">
               <div class="col-md-3">
             
	           <input type="text" placeholder="If Others Specify" name="other_industrytype" class="form-control border-input"><br/>
           
			 </div>
             </div>
	 </div>
	
	 
	  <div class="row">
      <div class="form-group">
        <div class="col-md-3">
                  
         <label>Number of Locations(cities/districts) </label>
         <input type="number" name="location_number" placeholder="Number of Locations"  value=" <?php if($row) { echo $row['location_number']; } ?>" class="form-control border-input" /> <br/>
        </div>

      
        <div class="col-md-3">
                  
         <label>Name of the Location</label>
		 <select class="form-control border-input" id="company_location" type="text" name="company_location" onchange="enableLocation(this)" >
			<option value="">--Select--</option>
			 <?php
	
		$table_name='searchjoblocationlist';
		$col_name='name';
		if($row) {
		$arrvalue=$row['company_location'];
		}
		else { $arrvalue=""; }
	 
	    $val->getoptionsfromdbchecked($table_name,$col_name,$arrvalue);
	    ?>
		</select>
        
        </div>
		</div>  
	  </div>
	   <div class="row"  id="location_panel" style="display:none"> 
	      <div class="form-group">
               <div class="col-md-3">
             
	           <input type="text" placeholder="If Others Specify" name="other_companylocation" value="<?php if($row) { echo $row['other_companylocation']; } ?>"class="form-control border-input">
           
			 </div>
             </div>
	 </div>
	  <div class="row">
      <div class="form-group">
        <div class="col-md-3">
                  
         <label>Companies Previously Recruited From Institute</label>
		<input type="text" name="previous_recruited_companies" placeholder="Companies"  value="<?php  if($row) { echo $row['previous_recruited_companies']; } ?>" class="form-control border-input" /> 
        
        </div><br/>

        <div class="col-md-3">      
                     <label>Type of Job the skill provides</label>
             <select name="jobskill_type" class="form-control border-input"  >
			  <?php if($row) {   ?><option><?php echo $row['jobskill_type'];?> </option><?php } ?>
				<option value="">--Select---</option>
				<option>Basic entry level</option>
				<option>Specialised entry level</option>
				<option>Lateral recruit</option>
				</select><br/>
                  </div>
      </div>  
	  </div> 
       
	   <div class="row">
      <div class="form-group">
        <div class="col-md-3">
                  
         <label>Monthly Gross Income expected</label>
		 <select name="monthly_salary"  id="salary" class="form-control border-input" >
		 	<?php if($row) {  ?><option selected="selected"><?php echo $row['monthly_salary'];  ?></option><?php } ?>
					<option value="">--Select--</option>
			  
                        <option value="2500-3000">
						2500-3000</option>
						<option value="3000-4000">
						3000-4000</option>
						<option value="4000-5000">
						4000-5000</option>
						<option value="5000-10,000">
						5000-10,000</option>
						<option value="10,000-15,000">
						10,000-15,000</option>
						<option value="15,000-20,000">
						15,000-20,000</option>
						<option value="20,000-30,000">
						20,000-30,000</option>
						<option value="30,000-40,000">
						30,000-40,000</option>
						<option value="greaterthan50,000">
						>50,000</option>

                     </select><br/>
		
        
        </div>

        <div class="col-md-3">      
                     <label>Is it New Training Program</label><br/>
            		<label ><input type="radio" id="newtraining_program" name="newtraining_program"  value="Yes" <?php if($row) { if($row['newtraining_program']=='Yes'){ echo 'checked';} }?>  />Yes</label>
			        <label ><input type="radio" name="newtraining_program" value="No" <?php if($row) { if($row['newtraining_program']=='No'){ echo 'checked';} }?> id="nsdc_approval"/>No</label>
                  </div>
      </div>  
	  </div> <br/>
	  <div class="row"  id="coursedetails_panel"  style="display:none"> 
	      <div class="form-group">
               <div class="col-md-3">
             <label>If no,how many years is it going on </label>
		     <select name="newtrainingprogram_years" class="form-control border-input" >
		<?php if($row) {  ?><option selected="selected"><?php echo $row['newtrainingprogram_years'];  ?></option><?php } ?>
			<option value="">Select</option>
			<option>0</option>
			<option>1</option>
			<option>2</option>
			<option>3</option>
			<option>4</option>
			<option>5</option>
			<option>6</option>
			<option>7</option>
			<option>8</option>
			<option>9</option>
			<option>10</option>
			<option>11</option>
			<option>12+</option>
	
	</select>
           
			 </div>
             </div>
	 </div>
       
	   <div class="row">
      <div class="form-group">
        <div class="col-md-3">
                  
         <label>No Of Students Already Trained</label>
        	<select name="students_trained" class="form-control border-input" >
			
		<?php if($row) { ?><option selected="selected"><?php echo $row['students_trained'];  ?></option><?php } ?>
			<option value="">Select</option>
				<option> <10 </option>
				<option><30</option>
				<option><50</option>
				<option><100</option>
				<option><500</option>
				<option><1000</option>
				<option><5000</option>
				<option>>5000</option>
				</select><br/>
		
        </div>

        <div class="col-md-3">      
                     <label>No Of Students Placed by the Institute</label>
            <input type="number" value="<?php if($row) { echo  $row['students_placed']; } ?>" name="students_placed" placeholder="Approximate Number" class="form-control border-input">
                  </div>
      </div>  
	  </div>
      <br/>	  
	   <div class="row">
      <div class="form-group">
        <div class="col-md-3">
		     <h4>Eligibility Criteria Details</h4>
		</div>
		</div>
	    </div>
		<hr></hr>
       
	   <div class="row">
      <div class="form-group">
        <div class="col-md-3">
                  
         <label>Please select Basic Education</label>
		 <select class="form-control border-input" id="basic_qualification" type="text" name="basic_qualification" onchange="enableQualification(this)" >
			<option value="">--Select--</option>
			 <?php
	
		$table_name3='qualificationlevel_list';
		$col_name3='name';
		$arrvalue=$row['basic_qualification'];
	 
	    $val->getoptionsfromdbchecked($table_name3,$col_name3,$arrvalue);
	    ?>
		</select><br/>
        
        </div>

     
        <div class="col-md-3">
                  
         <label>Please select Masters Education</label>
        <select class="form-control border-input" id="masters" type="text" name="masters_education" onchange="enableMasters(this)" >
			<option value="">--Select--</option>
			 <?php
	
		$table_name5='masterseducation_list';
		$col_name5='name';
		$arrvalue=$row['masters_education'];
		
	 
	    $val->getoptionsfromdbchecked($table_name5,$col_name5,$arrvalue);
	    ?>
		</select>
        </div>
		</div>
		</div><br/>
	   <div class="row"  id="degree_panel"  style="display:none"> 
	      <div class="form-group">
               <div class="col-md-3">
            
	    <input type="text" placeholder="If Others Specify" name="other_degree_qualification"  value="<?php echo $row['other_degree_qualification'];  ?>" class="form-control border-input" >
       
           
			 </div>
             </div>
	 </div><br/>
	  
        <div class="row"  id="masters_panel"   style="display:none"> 
	      <div class="form-group">
               <div class="col-md-3">
             
	          <input type="text" placeholder="If Others Specify" name="other_master_education" value="<?php if($row) { echo $row['other_master_education'];  }?>"  class="form-control border-input" >
           
			 </div>
             </div>
	 </div>
	   <div class="row">
      <div class="form-group">
        <div class="col-md-6">
                  
         <label>Eligibility Test</label><br/>
         <label ><input type="radio" name="eligibility_test" value="Yes" id="eligibility_test" onclick="ShowHideDiv('show','Test_Name')"  <?php if($row) { if($row['eligibility_test']=='Yes'){ echo 'checked';} }?>  id="eligibility_test">Yes</label>
			<label ><input type="radio" name="eligibility_test" value="No" id="eligibility_test" onclick="ShowHideDiv('hide','Test_Name')"<?php if($row) { if($row['eligibility_test']=='No'){ echo 'checked';} } ?>  id="eligibility_test">No</label>
		 </div>
		 </div>
		 </div>
		 <br/>
     
		 <div id="Test_Name"    <?php if($row) { if($row['eligibility_test']=='No'){ ?>  style="display:none" <?php } } else { ?> style="display:none" <?php } ?>">
		<div class="row"  >
      <div class="form-group">
        <div class="col-md-3">
     
                     <label>Name of the Test</label>
            <input type="text" name="test_name"  value="<?php echo $row['test_name'];  ?>" placeholder="GMAT/XAT/Institute specific one name if any" class="form-control border-input">
		
                  </div>
      </div>  
	  </div><br/>
     <div class="row">
      <div class="form-group">
        <div class="col-md-3">
                  
         <label>Written Test</label><br/>
         <label ><input type="radio" name="written_test" value="Yes" id="written_test" <?php if($row) { if($row['written_test']=='Yes'){ echo 'checked';} }?> >Yes</label>
			<label ><input type="radio" name="written_test" value="No"  <?php if($row) { if($row['written_test']=='No'){ echo 'checked';} }?>  id="written_test">No</label><br/>
        </div>
       
        <div class="col-md-3">
                  
         <label>Personal Interview</label><br/>
         <label ><input type="radio" name="personal_interview" value="Yes" <?php  if($row) {  if($row['personal_interview']=='Yes'){ echo 'checked';}}?>  id="personal_interview">Yes</label>
			<label><input type="radio" name="personal_interview" <?php if($row) {  if($row['personal_interview']=='No'){ echo 'checked';} } ?> value="No" id="personal_interview">No</label>
        </div>
         </div>
		 </div><br/>
       <div class="row">
      <div class="form-group">
        <div class="col-md-3">
                  
         <label>Group Discussion</label><br/>
         <label ><input type="radio" name="group_discussion" value="Yes" id="group_discussion">Yes</label>
			<label ><input type="radio" name="group_discussion" value="No" id="group_discussion">No</label>
        </div>
       
        <div class="col-md-3">
                  
         <label>Previous Academic Percentage</label></br>
         <label >
		 <input type="radio" name="previous_academic_percentage" id="ckYes" onclick="ShowHideDiv('show','previousacademic_percentage')">Yes</label>
			<label ><input type="radio" name="previous_academic_percentage" onclick="ShowHideDiv('hide','previousacademic_percentage')" id="eligibility_test">No</label>
        </div>
         </div>
		 </div><br/>
<div class="row" id="previousacademic_percentage"  style="display: none">
      <div class="form-group">
        <div class="col-md-3">
                  
         <label>If Yes,cut off Percentage/CGPA</label>
         <input type="text" name="cutoff_percentage"  value="<?php  if($row) {  echo $row['cutoff_percentage'];}  ?>" class="form-control border-input" placeholder="If Yes,cut off Percentage/CGPA" />
        </div>
         </div>
		 </div>	<br/>
		 </div>
		 <div class="row" >
      <div class="form-group">
        <div class="col-md-3">
		  <h4>Fees and Expenses Details</h4>
					
		</div>
		</div>
	
		</div>
		<hr></hr>
<div class="row" >
      <div class="form-group">
        <div class="col-md-3">
                  
         <label>Tution Fees</label>
      <input type="number" name="tution_fees" id="tution_fees" placeholder="Tution fees(Eg:5000)" value="<?php  if($row) {  echo $row['tution_fees']; } ?>" class="form-control border-input" /><br/>
        </div>
		<div class="col-md-3">
                  
         <label>Examination Fees</label>
        <input type="number" name="examination_fees" id="examination_fees" placeholder="Examination fees(Eg:500)" value="<?php  if($row) {  echo $row['examination_fees']; }  ?>" class="form-control border-input" />
        </div>
     </div>
</div><br/>
    <div class="row" >
      <div class="form-group">
        <div class="col-md-3">
                  
         <label>Cost of Study Materials</label>
     <input type="number" name="studymaterials_cost" id="studymaterials_cost" value="<?php  if($row) {  echo $row['studymaterials_cost']; }  ?>"  placeholder="Cost of Study Materials" class="form-control border-input" /><br/>
        </div>
		<div class="col-md-3">
                  
         <label>Travelling Expenses</label>
       <input type="number" name="travelling_expenses" id="travelling_expenses" value="<?php  if($row) {  echo $row['travelling_expenses']; } ?>" placeholder="Travelling Expenses" class="form-control border-input" />
        </div>
     </div>
</div><br/>
     <div class="row" >
      <div class="form-group">
        <div class="col-md-3">
                  
         <label>Transportation Expenses</label>
     <input type="number" name="transportation_expenses" id="transportation_expenses"  value="<?php  if($row) {  echo $row['transportation_expenses']; } ?>" placeholder="Transportation Expenses" class="form-control border-input">
        </div>
     </div>
</div><br/>
<div class="row" >
      <div class="form-group">
        <div class="col-md-3">
                  
     <label>Owner/ Promoter's training experience </label><br/>
     <label >
		 <input type="radio" name="owner_training_experience" value="Yes"  <?php   if($row) { if($row['owner_training_experience']=='Yes'){ echo 'checked';} }?> id="chekYes" onclick="ShowHideDiv('show','trainingexperience')">Yes</label>
			<label ><input type="radio" name="owner_training_experience" value="No"  <?php  if($row) {  if($row['owner_training_experience']=='No'){ echo 'checked';} }?>id="owner_training_experience" onclick="ShowHideDiv('hide','trainingexperience')">No</label><br/>
        </div>
     
        <div class="col-md-6">
                  
     <label>Owner/ Promoter's Industry experience </label><br/>
     <label >
		 <input type="radio" name="owner_industry_experience" <?php  if($row) {  if($row['owner_industry_experience']=='Yes'){ echo 'checked';} }?> value="Yes" id="chekYes" onclick="ShowHideDiv('show','industryexperience')">Yes</label>
			<label ><input type="radio" name="owner_industry_experience" <?php  if($row) {  if($row['owner_industry_experience']=='No'){ echo 'checked';} }?> value="No" id="owner_industry_experience" onclick="ShowHideDiv('hide','industryexperience')">No</label>
        </div>
     </div>
</div> 			 	 			 			 
       
<div class="row" id="trainingexperience"  <?php  if($row) { if($row['owner_training_experience']!='Yes') { ?>  style="display: none" <?php } } else {  ?>    style="display: none" <?php } ?>>
      <div class="form-group">
        <div class="col-md-3">
                  
     <label>  If yes mention in years </label>
     <select name="owner_trainingexperience_years" class="form-control border-input">
	 	<?php if($row) {  ?><option selected="selected"><?php echo $row['owner_trainingexperience_years'];  ?></option><?php } ?>
	<option value="">--Select--</option>

	<option>0</option>
	<option>1</option>
	<option>2</option>
	<option>3</option>
	<option>4</option>
	<option>5</option>
	<option>6</option>
	<option>7</option>
	<option>8</option>
	<option>9</option>
	<option>10</option>
	<option>11</option>
	<option>12+</option>
	
	</select><br/>
        </div>
		</div>
		</div>
		
    <div class="row"  id="industryexperience"  <?php  if($row) { if($row['owner_industry_experience']!='Yes') { ?>  style="display: none" <?php } } else {  ?>    style="display: none" <?php } ?>>
      <div class="form-group">
        <div class="col-md-3">
     
                  
     <label>  If yes mention in years </label>
     <select name="owner_industryexperience_years" class="form-control border-input">
		<?php if($row) {  ?><option selected="selected"><?php echo $row['owner_industryexperience_years'];  ?></option><?php } ?>
	<option value="">--Select--</option>
	<option>0</option>
	<option>1</option>
	<option>2</option>
	<option>3</option>
	<option>4</option>
	<option>5</option>
	<option>6</option>
	<option>7</option>
	<option>8</option>
	<option>9</option>
	<option>10</option>
	<option>11</option>
	<option>12+</option>
	
	</select>
        </div>
     </div>
</div>
 			   
      <div class="row" >
      <div class="form-group">
        <div class="col-md-3">
                  
     <label>Owner/Promoter's experience relevance to course </label><br/>
     <label >
		 <input type="radio" name="owner_course_experience" <?php  if($row) {  if($row['owner_course_experience']=='Yes'){ echo 'checked=checked';} }?> value="Yes" id="chekYes" onclick="ShowHideDiv('show','courseexperience')">Yes</label>
			<label ><input type="radio" name="owner_course_experience" <?php  if($row) {  if($row['owner_course_experience']=='No'){ echo 'checked=checked';} }?> value="No" id="owner_course_experience" onclick="ShowHideDiv('hide','courseexperience')">No</label><br/>
        </div>
     
        <div class="col-md-6">
                  
     <label>Corporate driven Institute(Run as and by a Company)</label><br/>
     <label >
		<input type="radio" name="corporate_driven_institute" value="Yes"<?php  if($row) {  if($row['corporate_driven_institute']=='Yes'){ echo 'checked';} }?> 
		id="corporate_driven_institute" onclick="ShowHideDiv('show','corporatedriven_institute')">Yes</label>
			   <label><input type="radio" name="corporate_driven_institute" value="No" <?php  if($row) {  if($row['corporate_driven_institute']=='No'){ echo 'checked';} }?>   id="corporate_driven_institute" onclick="ShowHideDiv('hide','corporatedriven_institute')">No</label>
        </div>
     </div>
</div>	 			 			 
       			 			 
       
<div class="row" id="courseexperience"   <?php  if($row) { if($row['owner_course_experience']!='Yes') { ?>  style="display: none" <?php } } else {  ?>    style="display: none" <?php } ?> >
      <div class="form-group">
        <div class="col-md-3">
                  
     <label>  If yes mention in years	</label>
     <select name="owner_courseexperience_years" class="form-control border-input">
	 
	<?php if($row) {  ?><option selected="selected"><?php echo $row['owner_courseexperience_years'];  ?></option><?php } ?>
	<option value="">--Select--</option>
	<option>0</option>
	<option>1</option>
	<option>2</option>
	<option>3</option>
	<option>4</option>
	<option>5</option>
	<option>6</option>
	<option>7</option>
	<option>8</option>
	<option>9</option>
	<option>10</option>
	<option>11</option>
	<option>12+</option>
	
	</select>
        </div>
		
		</div>
		</div>
     
     <div class="row" id="corporatedriven_institute"    <?php  if($row) { if($row['corporate_driven_institute']!='Yes') { ?>  style="display: none" <?php } } else {  ?>    style="display: none" <?php } ?> >
      <div class="form-group">
        <div class="col-md-3">
                  
     <label>  If yes mention in years </label>
     <select name="corporate_driveninstitute_years" class="form-control border-input">
	<?php if($row) {  ?><option selected="selected"><?php  echo  $row['corporate_driveninstitute_years'];  ?></option><?php } ?>
	<option value="">--Select--</option>
	<option>0</option>
	<option>1</option>
	<option>2</option>
	<option>3</option>
	<option>4</option>
	<option>5</option>
	<option>6</option>
	<option>7</option>
	<option>8</option>
	<option>9</option>
	<option>10</option>
	<option>11</option>
	<option>12+</option>
	
	</select>
        </div>
     </div>
</div>	<br/>	 		 
       		 	 			 			 
  <div class="row" >
      <div class="form-group">
        <div class="col-md-3">
                  
     <label>NSDC standard Content</label><br/>
     <label >
		<input type="radio" name="NSDC_standard_content" <?php if($row) { if($row['NSDC_standard_content']=='Yes'){ echo 'checked';} }?>  value="Yes" onclick="ShowHideDiv('hide','NSDC_standardcontent')">Yes</label>
			   <label ><input type="radio" name="NSDC_standard_content" <?php if($row) { if($row['NSDC_standard_content']=='No'){ echo 'checked';} } ?>value="No" id="cekYes"  id="NSDC_standard_content" onclick="ShowHideDiv('show','NSDC_standardcontent')">No</label><br/>
        </div>
   
        <div class="col-md-6">
                  
     <label>Industry approved content(govt/semi govt/other pvt)</label><br/>
     <label>
		<input type="radio" name="industry_approved_content" value="Yes" <?php  if($row) { if($row['industry_approved_content']=='Yes'){ echo 'checked';} }?>  >Yes</label>
			   <label><input type="radio" name="industry_approved_content" <?php  if($row) {  if($row['industry_approved_content']=='No'){ echo 'checked';} }?> value="No"  id="industry_approved_content" >No</label>
        </div>
     </div>
</div>
<div class="row"  id="NSDC_standardcontent"  <?php  if($row) { if($row['NSDC_standard_content']!='No') { ?>  style="display: none" <?php } } else {  ?>    style="display: none" <?php } ?>>
      <div class="form-group">
        <div class="col-md-6">
                  
     <label> Institute's inhouse developed content</label><br/>
     <label >
		<input type="radio" name="institute_inhouse" <?php  if($row) {  if($row['institute_inhouse']=='Yes'){ echo 'checked';} }?> value="Yes" >Yes</label>
			   <label ><input type="radio" name="institute_inhouse" <?php  if($row) {  if($row['institute_inhouse']=='No'){ echo 'checked';} }?> value="No"  id="Institute_inhouse" >No</label>
        </div>
     </div>
</div><br/>

<div class="row">
      <div class="form-group">
        <div class="col-md-3">
                  
     <label>Trainers Qualification</label>
     <input type="text" name="trainers_qualification" value="<?php  if($row) {  echo $row['trainers_qualification']; } ?>" class="form-control border-input" placeholder="Trainers Qualification"></br>
        </div>
		 <div class="col-md-3">
                  
     <label>Delivery Model</label>
     <input type="text" name="delivery_model" value="<?php  if($row) {  echo $row['delivery_model'];  }?>" class="form-control border-input" placeholder="Delivery Model">
     </div>
</div>	 	  		     		 
  </div>  <br/>   	  		     		 
       

    <div class="form-group">
      <button type="submit"  class="submit">Submit</button>	 
    </div>
</form>  </div>
</div>        </div> <!-- /container -->
  
   </td>
   </tr>
   
   </table>
<style>
    .map {
        min-width: 300px;
        min-height: 300px;
        width: 100%;
        height: 100%;
    }

    .header {
        background-color: #F5F5F5;
        color: #36A0FF;
        height: 70px;
        font-size: 27px;
        padding: 10px;
    }
</style>

<!-------footer---------->
							
							
						<table style="width:100%; height:30px; background-color:#87CEFA; color:#778899; text-align:center; font-size:12px">		
							<tr><td> &copy; 2011 KSFi Pvt Ltd.-<a class="Normal" style="color:#778899;" href="disclaimer.html" target="_self">
									Disclaimer</a>&nbsp;&nbsp; |&nbsp;&nbsp;
									<a class="Normal" style="color:#778899;" href="privacypolicy.html" target="_self">
									Privacy Policy</a></td>
									 
					
								</tr>
									
									
							</table>
				
				
		
	
 
<script type="text/javascript"><!--
    var pager = new Pager('box-table-a',10); 
    pager.init(); 
    pager.showPageNav('pager', 'pageNavPosition'); 
    pager.showPage(1);
//--></script>
		
	
	
</div></div></div>



</body>



</html>

