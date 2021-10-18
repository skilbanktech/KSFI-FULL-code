


<?php  

session_start();
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

<script language="javascript" src="js/jquery-1.6.2.min.js" type="text/javascript">
 </script>

<script language="javascript" src="js/jquery-ui-1.8.16.custom.min.js" type="text/javascript">
 </script>
 <script language="javascript" src="js/paging.js" type="text/javascript"> </script>
  
 

  
  

	
	</head>
	<body id="Body">
	
	

<?php include('./common/common_mainmenu.php'); 

				 include('./connection.php');
								 
						
		
		$current_date=date('Y-m-d');
		$currentdate=date("Y/m/d");
		
		$currentdate=strtotime($currentdate);
		$days_older=30;
		
		$date = strtotime("-".$days_older."day", $currentdate);
		
				 $fromdate= date('Y-m-d', $date);
		
		
		
		
	
		  
		?> 
 

  
  <?php if($_GET['type']=='reports') { ?>
    <table align="center"  style="background-color:white;width:50%">	
	 
  

	
								<tr><td height="50" style="width: 71px"></td></tr>
								<tr>



								<tr>
					<td style="background: #e6f0fa none repeat scroll 0 0;
                         text-align: center;" colspan="2">KSFI Reports</td>
                </tr>
			    <tr><td>&nbsp;</td></tr>

<?php

$sql=mysql_query("Select distinct report_title from report_selectedcolumnsdetails where report_title!='' " );
		$count=mysql_num_rows($sql);
		if($count!=0)
		{
			while ($row = mysql_fetch_array($sql)) {
			  
			  $report_titles[] = $row;
		 
		     }
		 }

	
		
if($count!=0)
{
    foreach($report_titles as $report){
     $title=$report['report_title'];

?>
 
  <tr>
        <td align="center"><a href ="mis/sendnewReport.php?title=<?php echo $title;?>"  style="font-size:14px"><?php echo $report['report_title'];?></a></td></tr>

	    <?php } }else {?> <tr><td>No Saved Reports. Please click on the create report link to continue.</td>
  </tr>
  
  <?php }?>
		
		
  
	
		</form></table>

<?php } elseif($_GET['type']=='create') { ?>



	
 
 
 
  <table align="center"   style="background-color:white;width:50%">	
  
 
		
		<tr><td align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="mis/createreport.php" style="color:blue">Click here to Create New Report</a></td></tr>
<tr><td>&nbsp;</td></tr>

 
							</table></form>  
							
							
				<?php  } ?> 
										
									
	
							
	

	<?php include('./common/comFooter.php');?>

	