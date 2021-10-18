<?php
ob_start();
session_start();

include('connection.php');

$refid=$_GET['refid'];
$Msg= 23;
if (isset($_SESSION['firstname']))
{
    $select_rolerights="select * from rolerights where role='".$_SESSION['Currentrole']."' and rights_id=20"; 
    $record_roleright=mysql_query($select_rolerights);
    
    if (@mysql_fetch_assoc($record_roleright))
    {
                
         $deletecoapplicant="delete from coapplicant_details where reference_id='$refid'";
         $run_del=mysql_query($deletecoapplicant);
        // echo   $deletecoapplicant;
         
	 $deletestudentdetails="delete from student_details where reference_id='$refid'";
         $run_studel=mysql_query($deletestudentdetails);
        // echo   $deletestudentdetails;

         $deletecourse_details="delete from course_details where reference_id='$refid'";
         $run_course_details=mysql_query($deletecourse_details);
        // echo   $deletecourse_details;

	 $deletesomedate="delete from collegeaddressdetail where reference_id='$refid'";
         $run_delcollege=mysql_query($deletesomedate);
        // echo   $deletesomedate;
         
         $deletesDoc_details="delete from document_details where reference_id='$refid'";
         $run_delDoc_details=mysql_query($deletesDoc_details);
        // echo   $deletesDoc_details;
         
         // Delete the directory if it exists to remove all uploaded files
         
      If(file_exists('./'.$refid))
      { 
         
         $it = new RecursiveDirectoryIterator('./'.$refid);
         $files = new RecursiveIteratorIterator($it,
                    RecursiveIteratorIterator::CHILD_FIRST);
         
        foreach($files as $file) {
            
            echo $file->getFilename();
            if ($file->getFilename() === '.' || $file->getFilename() === '..') {
                continue;
            }
            if ($file->isDir()){
                rmdir($file->getRealPath());
            } else {
                unlink($file->getRealPath());
            }
        }
        rmdir('./'.$refid);
      }
      $Msg = 21;
        
    }
}

header("Location: ./AppStatusDetails.php?Msg=".$Msg);
          
mysql_close($con);
?>