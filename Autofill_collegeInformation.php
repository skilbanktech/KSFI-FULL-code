<?php 

include('./connection.php');





$col=$_POST['value'];


$select="select * from  course_collegeaddressdetail_list where college = '$col'";
$query_result=mysql_query($select);


$array=mysql_fetch_row($query_result);

 echo json_encode($array);
 
 





?>