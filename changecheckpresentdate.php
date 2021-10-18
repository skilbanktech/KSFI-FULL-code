<?php 

include('./connection.php');




$selval=$_POST['value'];
$selval1=$_POST['val1'];
$selval2=$_POST['val2'];







$select1="update  pdcheck_details set presentationdate='$selval' where reference_id = '$selval1' and 
          check_id = '$selval2' ";


$query_result1=mysql_query($select1);



 echo "success";

 
		
					
				//echo json_encode($json);
 
 





?>