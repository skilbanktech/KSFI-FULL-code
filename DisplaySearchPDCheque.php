<?php session_start();?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml">

<!-- #BeginTemplate "webtemplate.dwt" -->

<head id="Head">
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	 <meta name="viewport" content="width=device-width, initial-scale=1">
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

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="bootstrap/js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="bootstrap/js/bootstrap-submenu.min.js" defer></script>

<link id="KSFSkin" href="css/skin.css" rel="stylesheet" type="text/css">
<link id="KSFSkin" href="css/ksfi.css" rel="stylesheet" type="text/css">
<script language="javascript" src="js/contactus.js" type="text/javascript"> </script>
<script language="javascript" src="js/paging.js" type="text/javascript"> </script>

 <script language="javascript" src="js/jquery-1.6.2.min.js" type="text/javascript"></script>
 
 <link type="text/css" href="css/cupertino/jquery-ui-1.8.16.custom.css" rel="stylesheet">




<script language="javascript" src="js/common.js" type="text/javascript"></script>



<script language="javascript" src="js/contactus.js" type="text/javascript"></script>



<script language="javascript" src="js/jquery-ui-1.8.16.custom.min.js" type="text/javascript">



</script>





 
<style type="text/css">
.auto-style2 {
	background-image: url('images/rtoutline.jpg');
}
.auto-style3 {
	margin-left: 2px;
	margin-bottom: 2px;
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

<script type="text/javascript">
function changedate(fld,fld1,fld2)
{
	var conf= confirm("Do you want to update the presentation Date");
	
	if(conf==true)
	{
		
	
	var selectedVal= fld.value;
	
	 $.ajax({
            type: 'POST',
            url: 'changecheckpresentdate.php',
            data: "value="+selectedVal+"&val1="+fld1+"&val2="+fld2,
			
			 cache: false,
			 
      success:  function(data){
	  
	  alert("Updated successfully");
	  
	 }
	  });
	}
	
	}


			function showdatepicker(fld)


			{
                 
              

			$( "#"+fld ).datepicker({



			changeMonth: true,



			changeYear: true,



			yearRange:"c-10:c+10",



			dateFormat: "yy-mm-dd",



			beforeShowDay: function(date){ return [date.getDay() != 0, '']; }


           
		    }).focus();			


			}



</script>

</head>

<body id="Body">

<noscript></noscript>
<div align="center">
	
	<?php include('./common/bootstrap_common_mainmenu.php'); ?>	
					<!-- #BeginEditable "Content" -->
		<form id="Form"  autocomplete="off" enctype="multipart/form-data" method="post" name="Form" >
					<table width="100%"><tbody><tr><td height="20" class="heading" >PDC Cheque Search Result</td></tr></tbody>
				</table>
					
					<table id="box-table-a" align="center" border="1" cellpadding="3" cellspacing="3" style="width: 570px; height: 24px; ">
					<thead>					
					<tr>
						<th class="formHeader">Select</th>
						<th class="formHeader">Reference ID</th>
						<th  width="150px">Payment ID</th>

									<th class="formHeader" style="width: 100px"> Amount</th>

									<th class="formHeader" style="width: 100px">Payment Type </th>

                                    <th class="formHeader" style="width: 100px"> Account No.</th>
									
									<th class="formHeader" style="width: 100px">cheque No.</th>

									<th class="formHeader" style="width: 100px"> Bank Name  </th>

									<th class="formHeader" style="width: 100px"> Branch Name</th>

                                    <th class="formHeader" style="width: 100px"> Branch Location</th>

                                    <th class="formHeader" style="width: 100px">Presentation date</th>

                                    <th class="formHeader" style="width: 100px">Presentation status</th>
						</tr></thead>
	<?php
	
		if(isset($_POST['referenceID']))
		{
	        $reference_id =$_POST['referenceID'];
			$payType =$_POST['payType'];
			$amount = $_POST['amount'];
			$checkno = $_POST['checkno'];
			$fdate = $_POST['fdate'];
            $tdate = $_POST['tdate'];
			
	      }
			elseif(isset($_SESSION['payType']))
			{
				
			 $reference_id=$_SESSION['searchreference_id'];
			 $payType=$_SESSION['payType'];
			 $amount=$_SESSION['amount'];
			 $checkno=$_SESSION['checkno'];
			 $fdate=$_SESSION['searchfdate'];
			 $tdate=$_SESSION['searchtdate']; 
				
		     
			}
			else {
				
			 $_SESSION['searchreference_id']= $reference_id;
			 $_SESSION['payType']= $payType;
			 $_SESSION['amount']= $amount;
			 $_SESSION['checkno']= $checkno;
			 $_SESSION['searchfdate']= $fdate;
			 $_SESSION['searchtdate']= $tdate; 
				
				
			}

            
           // echo($amount);
                        
			//database connection
			include('./connection.php');
			
                        
                        if($fdate != "")
                        {
                           // $fdate = $_POST['fdate'];
                        }
                        else
                        {
                           // $fdate="2010-01-01";
                        }
                        
                        if($tdate != "")
                        { 
                           // $fdate = $_POST['fdate'];
                        }
                        else
                        {
                           // $tdate=getdate();

                           // echo getdate();
                            
                           // $tdate= date('Y')."-".date('m')."-".date('d');
                           //$tdate="2012-05-18";                           
                         }   
		        if($fdate !="" && $tdate != "")
		        {
             		$select_query="select * from pdcheck_details where reference_id like'%".$reference_id."%' and paymentype like '%".$payType."%' 
                    and amount like '%".$amount."%' and checkno like '%".$checkno."%' 
                    and DATE(presentationdate) between '".$fdate."' and '".$tdate."' order by presentationdate desc;";
                    //echo($select_query);
                }
                else if($fdate !="" && $tdate=="")
                {
                $select_query="select * from pdcheck_details where reference_id like '%".$reference_id."%' and paymentype like '%".$payType."%' 
                    and amount like '%".$amount."%' and checkno like '%".$checkno."%' 
                    and DATE(presentationdate) like '%".$fdate."%' order by presentationdate desc;";
                }
                else if($fdate =="" && $tdate !="")
                {
                    $select_query="select * from pdcheck_details where reference_id like '%".$reference_id."%' and paymentype like '%".$payType."%' 
                    and amount like '%".$amount."%' and checkno like '%".$checkno."%' 
                    and DATE(presentationdate) like '%".$tdate."%' order by presentationdate desc;";
                }
                else if($fdate =="" && $tdate =="")
                {
                $select_query="select * from pdcheck_details where reference_id like '%".$reference_id."%' and paymentype like '%".$payType."%' 
                    and amount like '%".$amount."%' and checkno like '%".$checkno."%' 
                    order by presentationdate desc;";
                }
               // echo($select_query);
               //echo($select_query); 				
		$select_record=mysql_query($select_query);
		
			//$select_Row=mysql_fetch_row($select_record);
			while ($row = @mysql_fetch_assoc($select_record)) {
				
				$refid=$row['reference_id'];
						      print '<tr>'
	       .'<td><a href="PDChequeDetail.php?id='. $row['check_id'].'&refid='. $row['reference_id'].'" ><img src="images/edit.png" style="height:15px;width:15px;" title="Edit"></a></td>'
		   .'<td>'. $row['reference_id'] .'</td>'	
	    .'<td>'. $row['check_id'] .'</td>'	

		.'<td>'. $row['amount'].'</td>'

		.'<td>'. $row['paymentype'].'</td>'

		.'<td>'. $row['accountno'] .'</td>'
		
		.'<td>'. $row['checkno'] .'</td>'

        .'<td>'. $row['bankname'] .'</td>'

        .'<td>'. $row['branchname'] .'</td>' 

        .'<td>'. $row['branchaddress'] .'</td>'
		
		.'<td>'. $row['presentationdate'].'</td>';
		?>

       <!--- <td><input id="datepicker<?php //echo $row['check_id'];?>"  name="datepicker" type="text" 
		onclick="showdatepicker('datepicker<?php //echo $row['check_id'];?>')" onchange="changedate(this,'<?php // echo $row['reference_id'];?>','<?php echo $row['check_id'];?>');" 
		value=<?php // echo $row['presentationdate']; ?>></td>---->

     <td><?php echo $row['presentationstatus']; ?></td>
          <?php  	print '</tr>';	     
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
                        
                               <td align="center">
                                   <input type='submit' name="btnBack"
                           value='Back' onclick="setaction('search_PDCheckDetail.php');" >
                          
                             <!--  $_SESSION['usertype'] == 'Employee' -->
                             
			</td>
                        </tr>
                         <tr><td colspan="2">
                                     <input type="hidden" name="no" value="<?php echo $_POST['referenceID'];  ?>">                                  
                                                                    </td></tr>

			<tr><td height="50"></td></tr></tbody></table>
			<script type="text/javascript"><!--
    var pager = new Pager('box-table-a',10); 
    pager.init(); 
    pager.showPageNav('pager', 'pageNavPosition'); 
    pager.showPage(1);
//--></script>
<!-- #EndEditable -->
			<?php include('./common/bootstrap_commonFooter.php');?>