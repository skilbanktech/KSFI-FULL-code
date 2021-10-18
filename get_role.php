<?php 

include('./connection.php');





$selval=$_POST['value'];







$select1="SELECT * FROM `roles` WHERE usertype='$selval'";


$query_result1=mysql_query($select1);


 

 $json = array();
 
 while($row=mysql_fetch_array($query_result1))
				{
				
				
						 echo '<option value="'.$row['rolename'].'">' . $row['rolename'] . "</option>";
					}
					
				
		
					
				//echo json_encode($json);
 
 





?>