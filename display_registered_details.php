<?php
session_start();
include('./connection.php');



	

	
	
	if(isset($_POST['mobile']))
	{
		$mobile = $_POST['mobile'];

		$email = $_POST['email'];
		
		$f1date = $_POST['fromdate'];
		
		$t1date = $_POST['todate'];


	
		$_SESSION['searchleadsmobile']= $mobile;
		
		$_SESSION['searchleadsemail']= $email;
		
		$_SESSION['searchleadsfdate'] = $f1date ;
		
		$_SESSION['searchleadstodate']= $t1date ;

		
	}
	else
	{
		
		
		$mobile = $_SESSION['searchleadsmobile'];

		$email = $_SESSION['searchleadsemail'];
		
		$f1date = $_SESSION['searchleadsfdate'];
		
		$t1date = $_SESSION['searchleadstodate'];
	}


	

	
	


                   if($f1date != "")

                        {

                            $fdate = $f1date;

                        }

                        else

                        {

                            $fdate="2010-01-01";

                        }

                        

                        if($t1date != "")

                        { 

                            $tdate = $t1date;

                        }

                        else

                        {

                            $tdate=getdate();



                           // echo getdate();

                            

                            $tdate= date('Y')."-".date('m')."-".date('d');

                            //$tdate="2012-05-18";

                            

                         }

			

	
			
				
				
				



        $select_query1="SELECT reference_id,firstname ,lastname,email,mobile,prevCourse,prevUniversity,college,course,amount,partnername,AccManager,serviceRep,created 
                    
					FROM  registration_details where  mobile like '%".$mobile."%' and   email like  '%".$email."%' and created between '".$fdate."' and '".$tdate."'";
			   
			  // echo $select_query;
		 
		 $select_record1= mysql_query($select_query1);
	  
	    if($select_record1)
          {
	        $count_newcourses1=mysql_num_rows($select_record1);
	   
		 }
		 else
		{
		  $count_newcourses1=0;
		}
		
		


?>
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

<script language="javascript" src="js/jquery.min.js" type="text/javascript"> </script>

<script language="javascript" src="js/contactus.js" type="text/javascript"> </script>
   
<script language="javascript" src="js/paging.js" type="text/javascript"> </script>

<script type="text/javascript">

    var pager = new Pager('box-table-a',10); 

    pager.init(); 

    pager.showPageNav('pager', 'pageNavPosition'); 

    pager.showPage(1);
</script>

</head>
<body id="Body">

<div align="center">


		<?php include('./common/common_mainmenu.php'); ?>
					<!-- #BeginEditable "Content" -->
					<table>
	
<table width="100%" align="center"><tbody>

                                            <tr><td height="20" class="heading" >Registration Search Result</td></tr>

                                            <tr><td> <input type="hidden" id="currentlyselRefID" name="currentlyselRefID"> </td> </tr>

                                            </tbody></table>
<form name="registeredetails" id="registeredetails" method="post" style="background-color:#f4f4f4">
 	
	
	<table  id="box-table-a" border="1" align="center" style="background-color:white"  width="100%" > 
	
	
	
	
<?php
 if($count_newcourses1!=0) {   ?>


    <tr>   
	     <th>Select</th>
		 
	     <th> Reference_id </th>
	   
		  <th>First Name</th>
		  
		  <th> Last Name </th>
		
		   <th>Email</th>
		   
		   <th>Mobile</th>
		   
		   <th>Previous Course</th>
		
		  <th>Previous University</th>
		  
		  <th>College</th>
		  
		  <th>Course</th>
		  
		 <th>Amount</th>
		 
		 <th>Application Date</th>
	
	    
	
		
	
	</tr>
	
	<?php

       
	  while($row1=mysql_fetch_array($select_record1))
	   {
	   
	   
	   $referenceid=$row1['reference_id'];
	   
	       $email=$row1['email'];
		   
		   $mob=$row1['mobile'];
		   
		   // encode
       $mob_encoded = rtrim(strtr(base64_encode($mob), '+*', '-_'), '=');
	   
		   
	   
	  
	
	
	?>
	
	<tr>
	
	<?php
	     

	       print'<td><input type="radio"  id="'.$row1['mobile'].'"myBtn"  class="links"  name="myradio" value="'.$row1['mobile'].'" id="'.$row1['mobile'].'"

	        onclick="selectedapplication(this)" /></td>'	       ?>
	    
	     <td>
		 
		 <?php if($referenceid!='') { ?>
		 
		<a  style="color:#483D8B" href="EditApplication.php?myradio=<?php echo $row1['reference_id'];  ?>"><?php echo $row1['reference_id'];  ?></a>
		 
		 <?php } else { ?>
		 
		 <a  style="color:#483D8B;" href="loan_application.php?mob=<?php echo $mob_encoded;?> ">Apply for Loan</a>
		 
		 <?php } ?>
		 
		 </td>
	
	    
	    
		  <td><?php echo $row1['firstname'];  ?> </td>
		  <td><?php echo  $row1['lastname'];  ?></td>
		  <td><?php echo  $row1['email'];  ?></td>
		  <td><?php echo  $row1['mobile'];  ?></td>
		  <td><?php echo  $row1['prevCourse'];  ?> </td>
		  <td><?php echo  $row1['prevUniversity'];  ?></td>
		  <td><?php echo  $row1['college'];  ?> </td>
		  <td><?php echo  $row1['course'];  ?></td>
		  <td><?php echo  $row1['amount'];  ?></td>
		  <td><?php echo  $row1['created'];  ?></td>
		  
		

	   
	</tr>
	
	
	<?php }  } ?>
	<table>
	<table>
							<tr align='right'>
<td>
		
<div id="myModal" class="modal">

  
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2 align='left'>Application Details</h2>
    </div>
    <div  style="overflow-x:auto;" class="modal-body">
     <table  align="center" id="popup"> 
	 
	 
	  </table>
     
    </div>
    
  </div>

</div>
</td></tr>

 <script>
 
 function selectedapplication(fld)
 
 {
 
 
 
// Get the modal
var modal = document.getElementById('myModal');

var selectedapp = fld.value;

var ajaxurl='display_leadsdetailspopup.php';

document.getElementById("currentlyselRefID").value=selectedapp;



// Get the button that opens the modal
var btn = document.getElementById(selectedapp+"myBtn");

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



$.ajax({

            type: 'POST',
            url: ajaxurl,
            data: "selrefID="+selectedapp,
		
			 cache: false,
			
      success:  function(data){
	 $('#popup').html(data);
	  
	    }
	  
	 });

}
</script>
	
			</table> </form> <div id="pageNavPosition" align="center"> </div>
			
		<?php     include('./common/comFooter.php');?>