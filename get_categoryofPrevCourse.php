<?php 

include('./connection.php');





$selval=$_POST['value'];







$select1="select dropdown_name from  previouscourse_dropdownlist  where previouscourse_id = '$selval'";


$query_result1=mysql_query($select1);


 

 $json = array();
 
 while($row=mysql_fetch_array($query_result1))
				{
				
				
						 echo '<option value="'.$row['dropdown_name'].'">' . $row['dropdown_name'] . "</option>";
					}
					
				
		
					
				//echo json_encode($json);
 
 





?>