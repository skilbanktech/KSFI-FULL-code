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

$name = $_POST['name'];

$select_query="select id,Reference_id,course,college,app_date  from newcourse_collegedetails_list where  Reference_id like '%".$reference_id."%' 
               
			   and course like'%".$name."%' and app_date between '".$fdate."' and '".$tdate."'";
			   
		
		 
		$select_record= mysql_query($select_query);
	  
	  if($select_record)
	  {
	        $count_newcourses=mysql_num_rows($select_record);
	   
		}
		else
		{
		  $count_newcourses=0;
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
<body>


<body id="Body">

<div align="center">
	<form id="Form"  autocomplete="off" enctype="multipart/form-data" method="post" name="Form" onsubmit="return validateLoginFormOnSubmit(this)" style="height: 100%;">
		
		<?php  include('./common/common_mainmenu.php'); ?>
<table align="center">
      <tr>
	       <td class="heading" colspan="3" align="center" > New Course and College Details </td>
	  </tr>

</table>
<form action="editcoursedetails.php" method="post"  style="background-color:#f4f4f4">
 	
	
	<table  id="box-table-a" border="1" align="center" style="background-color:white"  width="100%">
	
	
<?php
 if($count_newcourses!=0)
 {  ?>


    <tr>   <th>
		 Reference_id
		 
		 </th>
	   
		  <th>
		 Course
		 
		 </th>
		  <th>
		 College
		 
		 </th>
		
		 <th>
		 Action
		 
		 </th>
		
	
	</tr>
	
	<?php

       
	  while($row1=mysql_fetch_array($select_record))
	   {
	   
	   
	   $referenceid=$row1['Reference_id'];
	   
	   $courseid=$row1['id'];
	
	
	?>
	
	<tr>
	     <td>
		<a  style="color:#483D8B" href="editcoursedetails.php?id=<?php echo $row1['Reference_id'];  ?>"><?php echo $row1['Reference_id'];  ?></a></i>
		 
		 </td>
	
	    
	    
		  <td>
		<?php echo $row1['course'];  ?>
		 
		 </td>
		  <td>
		<?php echo  $row1['college'];  ?>
		 
		 </td>
	
	
	    <td>
		 
		 <a style="color:#483D8B" href="scoring/newcourse_ranking.php?id=<?php echo $row1['Reference_id'];?>" style="font-size:14;color:blue;">New Course Ranking</a>  
		 
		 </td>
	</tr>
	
	
	<?php }  } ?>
	
			</table> </form> <div id="pageNavPosition" align="center"> </div>
			
			
			<?php include('./common/comFooter.php'); ?>