<?php

include('./connection.php');

$term=$_GET['term'];

$field=$_GET['field'];

$table=$_GET['table'];


if(isset($_GET['id']))
{
   if($_GET['id']!='')
   {
     $id=$_GET['id'];
	 
	 $field2=$_GET['fieldname'];
	 
	}

}

		if(isset($id))
		
		{
		
		   $select = mysql_query("select distinct ".$field." from ".$table." where ".$field."  like '".$term."%' and  ".$field2."  = '".$id."' order by ".$field."  asc limit 0,10 ");
				
		}
		else
		{
		  $select = mysql_query("select distinct ".$field." from ".$table." where ".$field."  like '".$term."%' order by ".$field."  asc limit 0,10 ");
		}
		$json = array();
				
				while($row=mysql_fetch_array($select))
				{
				
				
						$json[] = array(
							
							'value' => $row[$field]);   
					}
					
				
		
					
				echo json_encode($json);
				

  
  
  ?>
 
