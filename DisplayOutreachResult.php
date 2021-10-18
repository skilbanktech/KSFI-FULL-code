<?php
session_start();
include('./connection.php');

$fdate = $_POST['fromdate'];

 $tdate = $_POST['todate'];


                   if($fdate != "")

                        {

                            $fdate = $_POST['fromdate'];

                        }

                        else

                        {

                            $fdate="2010-01-01";

                        }

                        

                        if($tdate != "")

                        { 

                            $fdate = $_POST['fromdate'];

                        }

                        else

                        {

                            $tdate=getdate();



                           // echo getdate();

                            

                            $tdate= date('Y')."-".date('m')."-".date('d');

                            //$tdate="2012-05-18";

                            

                         }

				$reference_id = $_POST['referenceID'];

				


        $select_query1="SELECT reference_id,firstname ,lastname,email,mobile,prevCourse,prevUniversity,college,course,facebooklink,amount,created 
                    
					FROM  registration_details where facebooklink!='' and     created between '".$fdate."' and '".$tdate."'";
			   
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
<form action="EditApplication.php" name="registeredetails" method="post" style="background-color:#f4f4f4">
 	
	
	<table  id="box-table-a" border="1" align="center" style="background-color:white"  width="100%" > 
	
	
	
	
<?php
 if($count_newcourses1!=0) {   ?>


    <tr>   
	
	     <th>Applied for loan</th>
	   
		 <th>Facebook Link</th>
	
		
	
	</tr>
	
	<?php

       
	  while($row1=mysql_fetch_array($select_record1))
	   {
	   
	   
	      $referenceid=$row1['reference_id'];
	   
	       $email=$row1['email'];
	   
	       $fblink=$row1['facebooklink'] ; 
	
	
	?>
	
	
	<tr>
	    
		  <td> 
		<?php if($referenceid !='') {  echo $row1['reference_id'];  } else {   echo "No"; } ?>
		 </td>
		  <td><a href="<?php echo $row1['facebooklink'];  ?>">Facebook link</a></td>
		
		 
	           

	   
	</tr>
	
	
	<?php }  }  ?>
	
			</table> </form> <div id="pageNavPosition" align="center"> </div>
			
		<?php     include('./common/comFooter.php');?>