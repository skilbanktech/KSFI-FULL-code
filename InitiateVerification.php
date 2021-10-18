<?php session_start();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
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
<script language="javascript" src="js/contactus.js" type="text/javascript"> </script>
<script language="javascript" src="js/paging.js" type="text/javascript"> </script>
<script language="javascript" src="js/common.js" type="text/javascript"> </script>
<script language="javascript" src="js/copy_state.js" type="text/javascript"></script>
<script language="javascript" src="js/loanApplication.js" type="text/javascript"> </script>
<script language="javascript" src="js/InitiateVeri.js" type="text/javascript"> </script><script language="javascript" src="js/jquery-1.6.2.min.js" type="text/javascript"> </script>
<!--ajax function for populate email on combo select change --><script>	function AjaxFunction(val1,fld,val2)	{		var selval1 = val1;	var selval2 = val2;		        $.ajax({	            type: 'POST',            url: 'send_PopulateEmail.php',            data: "value1="+selval1+"&value2="+selval2,			 			 cache: false,			       success:  function(data){	  	  	  $('#'+fld).html(data);	  	 }	  });	  
  }
</script>


<style type="text/css">

.auto-style2 {
	background-image: url('images/rtoutline.jpg');
}
.auto-style3 {
	margin-left: 2px;
	margin-bottom: 2px;
}
.auto-style4 {
	margin-left: 0px;
}
.verticalmenu
{
	/*font: bold 12px arial, helvetica, sans-serif; */
	font-weight:bold;
	font-size:21px;
	background:#99CCFF;
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

.auto-style5 {
	margin-left: 11px;
}

</style>
</head>

<body id="Body">

<?php  include('./common/common_mainmenu.php'); //sub-menuinclude('./common/common_submenu.php');
		//database connection
include('./connection.php');
include_once('common/Constants.php');
if(($_SESSION['usertype'] == 'Employee') || ($_SESSION['usertype'] == 'Partner') || ($_SESSION['usertype'] == 'Agency'))
{
    $reference_id=$_SESSION['AppID'];
    $_SESSION['id']=$reference_id;
    $email = $_SESSION['internal_email'];
}
else 
{
    $reference_id=$_SESSION['id'];
    $email = $_SESSION['email'];
}

            $query="select username from login_details where role='Agency'";
                $record=mysql_query($query);

                $AgencyName="";
                while($row1 = @mysql_fetch_assoc($record))
                {
                    $username=$row1["username"];
                    $AgencyName.="<OPTION VALUE=\"$username\">".$username;
                }
                
                
    $squery =  "select * from initiateverification where reference_id='".$reference_id."' order by InitiatedDate desc";
	$sresult =  mysql_query($squery);
	
	$query_usertype="select distinct usertype from roles";
                    $record_usertype=mysql_query($query_usertype);
                    // echo  $query;
                    $UserType="";
                    while($row1_usertype = @mysql_fetch_assoc($record_usertype))
                    {
                        $UserTyp=$row1_usertype["usertype"];
                        $UserType.="<OPTION VALUE=\"$UserTyp\">".$UserTyp;
                    }
                   
    $mode="0";              
    $select_query1 = "select idInitiateVeri,ResidenceVeri,EnrollmentVeri,OffTelephoneVeri,Remark,InitiatedDate,VerificationStatus,
                        reference_id,ResiTelephoneVeri,EmploymentVeri,FieldUsertype,FieldEmail,TeleUsertype,TeleEmail,EnrolUsertype,EnrolEmail,
                        Initiatedby,ResiVeriStatus,OffTeleVeriStatus,EnrolVeriStatus,EmpVeriStatus,ResiTeleVeriStatus,FieldVeri,TeleVeri,EnrolVeri
                        from initiateverification where reference_id='".$reference_id."' order by InitiatedDate desc";
	$select_record1=mysql_query($select_query1);	
	$row1= mysql_fetch_row($select_record1);       
          if($row1)
           {     
            $mode="1";
            $col1 = array('idInitiateVeri','ResidenceVeri','EnrollmentVeri','OffTelephoneVeri','Remark','InitiatedDate','VerificationStatus',
                'reference_id','ResiTelephoneVeri','EmploymentVeri','FieldUsertype','FieldEmail','TeleUsertype','TeleEmail','EnrolUsertype','EnrolEmail',
                'Initiatedby','ResiVeriStatus','OffTeleVeriStatus','EnrolVeriStatus','EmpVeriStatus','ResiTeleVeriStatus','FieldVeri','TeleVeri','EnrolVeri');
            $fetch1 = array_combine($col1,$row1); 	
           }
	
    $appaddress="";
    $empaddress="";
    $appmobile=""; //Resi
    $offteleno=""; //Tele
    $student_query = "Select reference_id,firstname,middlename,lastname,dob,email,password,address,street1,street2,state,district,
            city,pincode,stdcode,phone,mobile,phone1,prevUniversity,prevCollege,prevCourse,marks,prefer_day,
            prefer_time,query,app_date,source,mail_status,update_date,partnername,app_status,employment,business,designation,
            income,bankbal,appworking,verificationstatus,Empaddress,Empstreet1,Empstreet2,Empcountry,Empstate,
            Empcity,Emppincode,Empstdcode,Empphone,AppliedBy from student_details where reference_id ='".$reference_id."'";
	$student_record=mysql_query($student_query); 
	//or die(mysql_error());	
	$studentrow= @mysql_fetch_assoc($student_record);		             
     
	if($studentrow)
        {     
            $studentcol = array('reference_id','firstname','middlename','lastname','dob','email','password','address','street1','street2','state','district',
                            'city','pincode','stdcode','phone','mobile','phone1','prevUniversity','prevCollege','prevCourse','marks','prefer_day',
                            'prefer_time','query','app_date','source','mail_status','update_date','partnername','app_status','employment','business',
                            'designation','income','bankbal','appworking','verificationstatus','Empaddress','Empstreet1','Empstreet2','Empcountry',
                            'Empstate','Empcity','Emppincode','Empstdcode','Empphone','AppliedBy');
            $studentfetch = array_combine($studentcol,$studentrow); 								    $AppliedBy = $studentfetch['AppliedBy'];
               
            $appaddress=$studentfetch['address'];
            $empaddress=$studentfetch['Empaddress'];
            $appmobile=$studentfetch['mobile'];
            $offteleno=$studentfetch['Empphone'];
	}

            $select_query6 = "select reference_id,address,street1,street2,state,district,city,pincode,stdcode,phone,Email,ContactPerson,college
                                from collegeaddressdetail where reference_id ='".$reference_id."'";
            $select_record6=mysql_query($select_query6); 
            //or die(mysql_error());	
            $row6= mysql_fetch_row($select_record6);  
	
    $coladdress ="";    
    if($row6)
    {     
	$col6 = array('reference_id','address','street1','street2','state','district','city','pincode','stdcode','phone','Email','ContactPerson','college');
	$fetch6 = array_combine($col6,$row6); 	
	
	$coladdress=$fetch6['address'];
	}
	
	$select_query2 = "Select reference_id,coborrowerid,relation,relative,cfirstname,cmiddlename,clastname,cdob,
                        cpanno,cemail,caddress,cstreet1,cstreet2,cstate,cdistrict,ccity,cpincode,cstdcode,cphone,cmobile,cphone1,
                        cemployment,cbusiness,cdesignation,cincome,cloan,housingamt,caramt,jeepamt,twowheeleramt,consamt,totamt,
                        cbankbal,samestudadd,housingemi,caremi,jeepemi,twowheeleremi,consemi,totemi,cempaddress,cempstreet1,cempstreet2,
                        cempstate,cempdistrict,cempcity,cemppincode,cempstdcode,cempphone from coapplicant_details 
                        where reference_id = '".$reference_id."'";
	$select_record2=mysql_query($select_query2); 
	//or die(mysql_error());
	
    $cobo1address="";
    $cobo2address="";
    $cobo1empadd="";
    $cobo2empadd="";
    
    $ResiTelephoneCoApp1="";
    $ResiTelephoneCoApp2="";
    $OffTelephoneCoApp1="";
    $OffTelephoneCoApp2="";
  
        $col2 = array('reference_id','coborrowerid','relation','relative','cfirstname','cmiddlename','clastname','cdob',
                    'cpanno','cemail','caddress','cstreet1','cstreet2','cstate','cdistrict','ccity','cpincode','cstdcode','cphone','cmobile','cphone1',
                    'cemployment','cbusiness','cdesignation','cincome','cloan','housingamt','caramt','jeepamt','twowheeleramt','consamt','totamt',
                    'cbankbal','samestudadd','housingemi','caremi','jeepemi','twowheeleremi','consemi','totemi','cempaddress','cempstreet1','cempstreet2',
                    'cempstate','cempdistrict','cempcity','cemppincode','cempstdcode','cempphone');

        $row2= mysql_fetch_row($select_record2);
	 if($row2)
            {
               $fetch2 = array_combine($col2,$row2); 
               
               $cobo1address = $fetch2['caddress'];
               $cobo1empadd = $fetch2['cempaddress'];
               $ResiTelephoneCoApp1 = $fetch2['cmobile'];
               $OffTelephoneCoApp1 = $fetch2['cempphone'];
            }
      
       $rowc2= mysql_fetch_row($select_record2);
         if($rowc2)
            { 
              $fetchc2 = array_combine($col2,$rowc2);
             
              $cobo2address = $fetch2['caddress'];
              $cobo2empadd = $fetch2['cempaddress'];
              $ResiTelephoneCoApp2 = $fetchc2['cmobile'];
              $OffTelephoneCoApp2 = $fetchc2['cempphone'];
            }

$VeriStatus="Pending";
$initiated="Initiated";
$Initiatedfail="Initiated Send Failed";
$Completed = "Completed";

//echo $appaddress. " | ".$cobo1address. " | " .$cobo2address." | " .$empaddress. " | ".$cobo1empadd." | ".$cobo2empadd. "_____" ;
//echo $offteleno. " | " .$OffTelephoneCoApp1." | ".$OffTelephoneCoApp2. " | " .$appmobile. " | ".$ResiTelephoneCoApp1." | " .$ResiTelephoneCoApp2;
?>
	<form id="Form" action="send_AppStatus.php" autocomplete="off" enctype="multipart/form-data" method="post" name="Form" onsubmit="return ValidateInitiateVerification(this)">
            <table align="center" style="width:700px; height: 225px" >
                <tr><td><div id="appstatus_panel">
                        <table align="center" style="width: 850px; height: 225px">
                            <tr><td style="width: 800px; height: 20px;"></td></tr>
                            <tr>
                            <td class="heading" colspan="3">Initiate Verification</td>
                            </tr>
                            <tr>
                                <td colspan="3" align="center" style="height: 388px">
                              <table>
                                <tr>
                                    <td style="width: 180px" colspan="2">Reference ID</td>
                                            <td colspan="2">:</td>
                                            <td colspan="10">
                                            <input name="referenceID" size="40" readonly="readonly" type="text" value="<?php echo $reference_id; ?>" style="width: 350px" ></td></tr> 
                                    <tr>
                                            <td colspan="12">Verifications To Be Done:</td>
                                            <td colspan="2">&nbsp;</td>
                                    </tr>

                                    <tr>
                                            <td style="width: 180px" colspan="2"></td>
                                            <td colspan="2">&nbsp;</td>
                                            <td colspan="4"></td>
                                            <td colspan="2"></td>
                                            <td colspan="2">&nbsp;</td>
                                            <td colspan="2">&nbsp;</td>
                                    </tr>

                                <tr>
                                        <td style="width: 180px; height: 24px;" colspan="2">
                                                <input name="chkFieldVeri" id="chkFieldVeri" type="checkbox"  
                                                <?php 
                                               // if($empaddress=="" && $coboaddress=="" && $coboempadd=="" && $appaddress=="" )
                                                if($appaddress=="" && $cobo1address=="" && $cobo2address=="" && $empaddress=="" && $cobo1empadd=="" && $cobo2empadd=="")
                                                                {  echo "disabled='disabled'"; } 
                                                        else
                                                            {
                                                                if($row1)
                                                                { 
                                                                    if($fetch1['FieldVeri'] !='')
                                                                        { echo "checked";} 
                                                                    else{ }
                                                                }
                                                                else
                                                                { echo "checked";}
                                                            }   
                                                ?>
                 onclick="Disabledfieldveri(this,'resiApp','resiCoApp1','resiCoApp2','chkEmploymentApp','chkEmploymentCoApp1','chkEmploymentCoApp2','cmbFieldVeriUserType','FieldEmail','appaddress','cobo1address','cobo2address','empaddress','cobo1empadd', 'cobo2empadd')">
                                                <b>Field Verification</b></td>
									
                                                
                                                <td style="height: 24px" colspan="2"></td>
                                                <td style="height: 24px; width: 138px;" colspan="4"><b>Field Verification AppType</b></td>
                                                <td colspan="4" style="height: 24px"><b>Select UserType</b></td>
                                                <td style="height: 24px" colspan="2"><b>Email ID</b></td>
                                                <td style="height: 24px" colspan="2"><b>Verification Status</b></td>
                                </tr>

   <!--  //------------------------------    Residence Verification   ------------------------------------------------------------- -->   
            <tr>
                <td style="width: 180px" colspan="2">Residence verification</td>
                <td colspan="2">::</td>
                <td colspan="4" style="width: 150px">
                <input name="resiApp" id="resiApp" type="checkbox"  <?php 
                        if($appaddress!="")
                        { 
                            if($row1)
                                {
                                    $resiApp =$fetch1['ResidenceVeri'];                                                            
                                    $str =explode(".",$resiApp);                                                            
                                    if(in_array('Borrower', $str))
                                    { echo "checked='checked'"; } 
                                        /* else
                                        {       if($fetch1['FieldVeri'] =='')
                                                { echo "disabled='disabled'"; }
                                        }*/
                                }  
                        }
                        else{echo "disabled='disabled'";}  ?> 
                        value="Borrower">Borrower
                <input name="resiCoApp1" id="resiCoApp1" type="checkbox" 
                        <?php if($cobo1address!="")
                                { 
                                    if($row1){
                                                $resiCoApp1=$fetch1['ResidenceVeri'];                                                         
                                                $str =explode(".",$resiCoApp1);                                                            
                                                if(in_array('Co-Borrower1', $str)){ echo "checked='checked'"; } 
                                                else
                                                    { 
                                                        if($fetch1['FieldVeri'] =='')
                                                        { echo "disabled='disabled'"; }
                                                    }    
                                            }                                                                                                                  
                                }
                            else { echo "disabled='disabled'"; } ?> value="Co-Borrower1">Co-Borrower-1
                                    
                <input name="resiCoApp2" id="resiCoApp2" type="checkbox" 
                        <?php if($cobo2address!="")
                                    { 
                                    if($row1){
                                                $resiCoApp2=$fetch1['ResidenceVeri'];                                                         
                                                $str =explode(".",$resiCoApp2);                                                            
                                                if(in_array('Co-Borrower2', $str)){ echo "checked='checked'"; } 
                                                else
                                                { 
                                                    if($fetch1['FieldVeri'] =='')
                                                    { echo "disabled='disabled'"; }
                                                }    
                                                                    
                                                                 }                                                                                                                  
                                    }
                            else{echo "disabled='disabled'";} ?> value="Co-Borrower2">Co-Borrower-2
            </td>
   <!--  //----------------------Select User Type Combo-Box of residence ----------------------// -->                       
            <td colspan="4">
                        <select id="cmbFieldVeriUserType" name="cmbFieldVeriUserType"  <?php 
                       // if($empaddress=="" && $coboaddress=="" && $coboempadd=="" && $appaddress=="")
                        if($appaddress=="" && $cobo1address=="" && $cobo2address=="" && $empaddress=="" && $cobo1empadd=="" && $cobo2empadd=="")
                                        {
                                            echo "disabled='disabled'"; 
                                        } 
                                        else
                                        {
                                            if($row1){ if($fetch1['FieldVeri'] ==''){ echo "disabled='disabled'"; } }
                                            
                                            
                                              }  ?> 
                                     onchange="AjaxFunction(this.value,'FieldEmail','<?php echo $AppliedBy;?>');" size="1" class="auto-style5">
                                    
                            <option value=''>Select</option><!--<?php echo $UserType ?> -->
	                                <?php
                                        require "connection.php";// connection to database 
                                        $q=mysql_query("select distinct role from rolerights where rights_id='12'");	
                                        while($n=mysql_fetch_array($q)){ ?>
                                                <option <?php if($row1){ if($fetch1['FieldUsertype'] == $n["role"]){ echo "selected='selected'";} }?> 
                                                value="<?php echo $n["role"]; ?>"><?php echo $n["role"]; ?></option>
                                        <?php } ?>
                        </select>
	   </td>
    <!--  //----------------------Select Email ID of residence ----------------------// -->                      
            <td colspan="2">
            <select name="FieldEmail" id="FieldEmail">
                <?php if($row1) { if($fetch1['FieldEmail']!=""){ print '<option value="'.$fetch1['FieldEmail'].'">'.$fetch1['FieldEmail'].'</option>'; }} ?>
            </select>
            </td>
            
            
            <td colspan="2">
                <input name="ResiveriStatus" id="ResiveriStatus" type="text" 
                value="<?php if($row1) { 
                        if($fetch1['ResiVeriStatus']!="")
                        {     
                                if($fetch1['ResiVeriStatus']==Initiated)
                                { echo $initiated;
                                }
                                elseif($fetch1['ResiVeriStatus']==Initiated_Fail)
                                { echo $Initiatedfail;
                                }
                                elseif($fetch1['ResiVeriStatus']==Completed)
                                { echo $Completed;
                                }
                        }
                        else
                        {
                        echo $VeriStatus;
                        }
                }
                else{echo $VeriStatus;} ?>"  readonly="readonly">
            </td>
     </tr>
      <!--  //------------------------------    Employment Verification   ------------------------------------------------------------- -->            
                            
    <tr>
        <td style="width: 180px" colspan="2">Employment Verification</td>
        <td colspan="2">::</td>
        <td colspan="4" style="width: 150px">
            <input name="chkEmploymentApp" id="chkEmploymentApp" type="checkbox" <?php  
                if($empaddress!="")
                            { 
                                if($row1)
                                    {
                                        $empApp =$fetch1['EmploymentVeri'];                                                            
                                        $str =explode(".",$empApp);                                                            
                                        if(in_array('Borrower', $str)){ echo "checked='checked'"; } 
                                        else
                                            { if($fetch1['FieldVeri'] =='')
                                                { echo "disabled='disabled'"; }
                                            }                                
                                    } 
                            }
                else { echo "disabled='disabled'";}   ?> value="Borrower">Borrower
                            
            <input name="chkEmploymentCoApp1" type="checkbox" id="chkEmploymentCoApp1" <?php 
                if($cobo1empadd!="")
                            { 
                              if($row1)
                                  {
                                    $empcoApp1 =$fetch1['EmploymentVeri'];                                                            
                                    $str =explode(".",$empcoApp1);                                                            
                                    if(in_array('Co-Borrower1', $str)){ echo "checked='checked'"; } 
                                    else
                                        { if($fetch1['FieldVeri'] =='')
                                            { echo "disabled='disabled'"; }
                                        }     }  
                            }
                else{echo "disabled='disabled'";}  ?> value="Co-Borrower1">Co-Borrower-1
                                    
            <input name="chkEmploymentCoApp2" type="checkbox" id="chkEmploymentCoApp2" <?php 
               if($cobo2empadd!="")
                           { 
                              if($row1)
                                  {
                                    $empcoApp2 =$fetch1['EmploymentVeri'];                                                            
                                    $str =explode(".",$empcoApp2);                                                            
                                    if(in_array('Co-Borrower2', $str)){ echo "checked='checked'"; } else
                                    { if($fetch1['FieldVeri'] =='')
                                        { echo "disabled='disabled'"; }
                                    }     }  
                          }
              else{echo "disabled='disabled'";}  ?> value="Co-Borrower2">Co-Borrower-2
      </td>
      
      
      <!--  //----------------------Verification Status of Employment ----------------------// -->          
      
    <td colspan="6">&nbsp;</td>
    <td colspan="2">
        <input name="EmpveriStatus" id="EmpveriStatus" type="text" readonly="readonly" 
        value="<?php if($row1)
                        { 
                            if($fetch1['EmpVeriStatus']!="") 
                            { 
                            if($fetch1['EmpVeriStatus']==Initiated)
                                            { echo $initiated;
                                            }
                                            elseif($fetch1['EmpVeriStatus']==Initiated_Fail)
                                            { echo $Initiatedfail;
                                            }
                                            elseif($fetch1['ResiVeriStatus']==Completed)
                                            { echo $Completed;
                                            }

                            }
                             else{ echo $VeriStatus;} 
                        }
                    else{echo $VeriStatus;} ?>">

    </td>
</tr>
                            
<!--  //------------------------------    Telephone Verification   ------------------------------------------------------------- -->                               
      <tr>
        <td style="width: 180px" colspan="2">
                <input name="chkTelephoneVeri" id="chkTelephoneVeri" type="checkbox" 
                <?php  
                if(($appmobile=="" || $appmobile=="0") && ($offteleno=="" || $offteleno=="0") && 
                   ($OffTelephoneCoApp1=="" || $OffTelephoneCoApp1=="0") && ($OffTelephoneCoApp2=="" || $OffTelephoneCoApp2=="0") &&
                   ($ResiTelephoneCoApp1=="" || $ResiTelephoneCoApp1=="0") && ($ResiTelephoneCoApp2=="" || $ResiTelephoneCoApp2=="0") )
                {
                     echo "disabled='disabled'"; 
                } 
                else
                {				        
                    if($row1){ if($fetch1['TeleVeri'] !='')
                        { echo "checked";} else{ }}
                        else{ echo "checked";}
                }    ?>
                onclick="Disabledfieldveri(this,'chkOffTelephoneApp','chkOffTelephoneCoApp1','chkOffTelephoneCoApp2','chkResiTelephoneApp','chkResiTelephoneCoApp1','chkResiTelephoneCoApp2','cmbOffTelephoneUsertype','OffEmailID','offteleno','OffTelephoneCoApp1','OffTelephoneCoApp2','appmobile','ResiTelephoneCoApp1','ResiTelephoneCoApp2')">
                <b>Telephone verification</b></td>

        <td colspan="2">&nbsp;</td>
        <td colspan="4"><b>Telephone Verification Apptype.</b></td>
        <td colspan="2">&nbsp;</td>
      </tr>

<!--  //------------------------------  Office  Telephone Verification   ------------------------------------------------------------- -->                                                           
        <tr>
                <td style="width: 180px; height: 26px;" colspan="2">Office Telephone verification</td>
                <td colspan="2" style="height: 26px">::</td>
                <td colspan="4" style="height: 26px">
                  <input  name="chkOffTelephoneApp" id="chkOffTelephoneApp" <?php 
                    if($offteleno!="" && $offteleno!="0")
                        { 
                              if($row1)
                                  {
                                    $offteleApp =$fetch1['OffTelephoneVeri'];                                                            
                                    $str =explode(".",$offteleApp);                                                            
                                        if(in_array('Borrower', $str))
                                            { echo "checked='checked'"; }
                                        else
                                        { if($fetch1['TeleVeri'] =='')
                                            { echo "disabled='disabled'"; }
                                        }     
                                  }      
                       }
                       else
                           { echo "disabled='disabled'";} ?>  type="checkbox" value="Borrower">Borrower
                            
                <input  name="chkOffTelephoneCoApp1" id="chkOffTelephoneCoApp1" type="checkbox" <?php 
                                if($OffTelephoneCoApp1!="" && $OffTelephoneCoApp1!="0")
                                    { 							
                                      if($row1)
                                        {
                                            $offtelecoApp =$fetch1['OffTelephoneVeri'];                                                            
                                            $str =explode(".",$offtelecoApp);                                                            
                                            if(in_array('Co-Borrower1', $str)){ echo "checked='checked'"; }
                                            else
                                            { if($fetch1['TeleVeri'] =='')
                                                { echo "disabled='disabled'"; }
                                            }        
                                        } 
                                    }else{echo "disabled='disabled'"; }   ?> value="Co-Borrower1">Co-Borrower-1
                                
                            
                <input  name="chkOffTelephoneCoApp2" id="chkOffTelephoneCoApp2" type="checkbox" <?php 
                                if($OffTelephoneCoApp2!="" && $OffTelephoneCoApp2!="0")
                                    { 							
                                      if($row1)
                                        {
                                            $offtelecoApp =$fetch1['OffTelephoneVeri'];                                                            
                                            $str =explode(".",$offtelecoApp);                                                            
                                            if(in_array('Co-Borrower2', $str)){ echo "checked='checked'"; }
                                            else
                                            { if($fetch1['TeleVeri'] =='')
                                                { echo "disabled='disabled'"; }
                                            }        
                                        } 
                                    }else
                                        {echo "disabled='disabled'"; }   ?> value="Co-Borrower2">Co-Borrower-2
    </td>
                                    
    <td style="width: 89px; height: 26px;" colspan="4">
            <select id="cmbOffTelephoneUsertype" name="cmbOffTelephoneUsertype" 
                            <?php 
                            if(($appmobile=="" || $appmobile=="0") && ($offteleno=="" || $offteleno=="0") && 
                               ($OffTelephoneCoApp1=="" || $OffTelephoneCoApp1=="0") && ($OffTelephoneCoApp2=="" || $OffTelephoneCoApp2=="0") &&
                               ($ResiTelephoneCoApp1=="" || $ResiTelephoneCoApp1=="0") && ($ResiTelephoneCoApp2=="" || $ResiTelephoneCoApp2=="0") )
                                 {
                                    echo "disabled='disabled'"; 
                                 }
                            else{
                                if($row1){ if($fetch1['TeleVeri'] ==''){ echo "disabled='disabled'"; } }
                         }?> 
                        onchange="AjaxFunction(this.value,'OffEmailID','<?php echo $AppliedBy;?>');" size="1">
                
                <option value=''>Select</option>
                        <?php
                            require "connection.php";// connection to database 
                            $q=mysql_query("select distinct role from rolerights where rights_id='12'");	
                            while($n=mysql_fetch_array($q))
                                  { ?>
                                    <option <?php if($row1){ if($fetch1['TeleUsertype'] == $n["role"]){ echo "selected='selected'";} }?> 
                                                                    value="<?php echo $n["role"]; ?>"><?php echo $n["role"]; ?></option>
                            <?php } ?>
            </select>
    </td>
    <td colspan="2" style="height: 26px">
            <select name="OffEmailID" id="OffEmailID"> 
                         <?php if($row1) { if($fetch1['TeleEmail']!=""){ print '<option value="'.$fetch1['TeleEmail'].'">'.$fetch1['TeleEmail'].'</option>'; }} ?>
            </select></td>
            
    <td colspan="2" style="height: 26px">
            <input name="OffTeleVeriStatus" id="OffTeleVeriStatus" type="text" readonly="readonly" 
                   value="<?php if($row1) 
                                  { 
                                    if($fetch1['OffTeleVeriStatus']!="")
                                    { 	if($fetch1['OffTeleVeriStatus']==Initiated)
                                                    { echo $initiated;
                                                    }
                                                    elseif($fetch1['OffTeleVeriStatus']==Initiated_Fail)
                                                    { echo $Initiatedfail;
                                                    }
                                                    elseif($fetch1['ResiVeriStatus']==Completed)
                                                    { echo $Completed;
                                                    }
                                    } 
                                    else{echo $VeriStatus;} 
                                  }
                                  else
                                      {echo $VeriStatus;} ?>">
    </td>
</tr>
                                                                
 <!--  //------------------------------   Residence Telephone verification   ------------------------------------------------------------- -->                                                                   
                                                                
    <tr>
            <td style="width: 180px" colspan="2">Residence Telephone verification</td>
            <td colspan="2">::</td>
            <td colspan="4">
                <input  name="chkResiTelephoneApp" id="chkResiTelephoneApp" type="checkbox" <?php 
                    if($appmobile!="" && $appmobile!="0")
                      {
                        if($row1)
                            {
                                $resiteleApp =$fetch1['ResiTelephoneVeri'];                                                            
                                $str =explode(".",$resiteleApp);                                                            
                                if(in_array('Borrower', $str)){ echo "checked='checked'"; }
                                else
                                { 
                                    if($fetch1['TeleVeri'] =='')
                                    { echo "disabled='disabled'"; }
                                }       
                            } 
                     }
                     else 
                         { echo "disabled='disabled'"; }   ?> value="Borrower">Borrower

                <input  name="chkResiTelephoneCoApp1" id="chkResiTelephoneCoApp1" type="checkbox"  <?php 
                    if($ResiTelephoneCoApp1!="" && $ResiTelephoneCoApp1!="0")
                      {
                        if($row1)
                            {
                                $resitelecoApp =$fetch1['ResiTelephoneVeri'];                                                            
                                $str =explode(".",$resitelecoApp);                                                            
                                if(in_array('Co-Borrower1', $str)){ echo "checked='checked'"; } 
                                else
                                {
                                    if($fetch1['TeleVeri'] =='')
                                    { echo "disabled='disabled'"; }
                                }     
                            }   
                      }
                      else { echo "disabled='disabled'"; } ?> value="Co-Borrower1">Co-Borrower-1
                                                                        
                <input  name="chkResiTelephoneCoApp2" id="chkResiTelephoneCoApp2" type="checkbox"  <?php 
                     if($ResiTelephoneCoApp2!="" && $ResiTelephoneCoApp2!="0")
                        {
                          if($row1)
                            {
                                $resitelecoApp =$fetch1['ResiTelephoneVeri'];                                                            
                                $str =explode(".",$resitelecoApp);                                                            
                                if(in_array('Co-Borrower2', $str)){ echo "checked='checked'"; } 
                                else
                                    { if($fetch1['TeleVeri'] =='')
                                        { echo "disabled='disabled'"; }
                                    }     
                            }   
                        }
                        else { echo "disabled='disabled'";} ?> value="Co-Borrower2">Co-Borrower-2  
            </td>
            
            
            <td colspan="6"></td>          
            <td >
            <input name="resiTeleVeriStatus" id="resiTeleVeriStatus" type="text" readonly="readonly"
                value="<?php if($row1) {if($fetch1['ResiTeleVeriStatus']!="")
                                { if($fetch1['ResiTeleVeriStatus']==Initiated)
                                            { echo $initiated;
                                            }
                                            elseif($fetch1['ResiTeleVeriStatus']==Initiated_Fail)
                                            { echo $Initiatedfail;
                                            }
                                            elseif($fetch1['ResiVeriStatus']==Completed)
                                            { echo $Completed;
                                            }
                                } 
                            else{echo $VeriStatus;} }else{echo $VeriStatus;} ?>"></td>
    </tr>
    <tr>
            <td style="width: 180px" colspan="2">
            &nbsp;</td>
            <td colspan="2">&nbsp;</td>
            <td colspan="8">
            &nbsp;</td>
            <td colspan="2">
            &nbsp;</td>
    </tr>
                                                                
     <!--  //------------------------------   Enrollment verification   ------------------------------------------------------------- -->                                                                                                                               
            <tr>
                <td style="width: 180px" colspan="2">
                    <input name="chkEnrolmentveri" id="chkEnrolmentveri"  type="checkbox" 									<?php
                            if($coladdress!="")
                                {  if($row1){ if($fetch1['EnrolVeri'] !='')
                                                { echo "checked";}     
                                            else{ }
                                            }
                                else{ echo "checked";}
                                }
                            else
                                {
                                    echo  "disabled='disabled'";
                                }    
                                 ?>  
                        onclick="DisabledEnrolmentveri(this,'cmbEnrolVeriUserType','EnrolEmailID')"><b>Borrower Enrollment verification</b>
                </td>
                
                <td colspan="2">:</td>
                <td colspan="4">&nbsp;</td>
                   
                <td style="width: 89px" colspan="4">
                    <select id="cmbEnrolVeriUserType" name="cmbEnrolVeriUserType" <?php 
                    if($coladdress!="")
                                {
                                    if($row1){ if($fetch1['EnrolVeri'] ==''){ echo "disabled='disabled'"; } }
                                }
                        else
                        {
                        echo "disabled='disabled'"; 
                        }
                      ?> 
                                        onchange="AjaxFunction(this.value,'EnrolEmailID','<?php echo $AppliedBy;?>');"  size="1">
                        <option value=''>Select</option><!--<?php echo $UserType ?> -->
                    <?php
                        require "connection.php";// connection to database 
                        $q=mysql_query("select distinct role from rolerights where rights_id='12'");	
                        while($n=mysql_fetch_array($q)){ ?>
                        <option <?php if($row1){ if($fetch1['EnrolUsertype'] == $n["role"]){ echo "selected='selected'";} }?> 
                            value="<?php echo $n["role"]; ?>"><?php echo $n["role"]; ?></option>
                        <?php } ?>
                    </select>
                </td>
                            
                <td colspan="2">
                            <select name="EnrolEmailID" id="EnrolEmailID"> 
                                <?php if($row1) { if($fetch1['EnrolEmail']!=""){ print '<option value="'.$fetch1['EnrolEmail'].'">'.$fetch1['EnrolEmail'].'</option>'; }} ?>
                            </select>
                </td>
                            
                <td colspan="2">
                            <input name="EnrolVeristatus" id="EnrolVeristatus" type="text" readonly="readonly" 
                            value="<?php if($row1) 
                                            {if($fetch1['EnrolVeriStatus']!="")
                                                { 
                                                    if($fetch1['ResiTeleVeriStatus']==Initiated)
                                                        { echo $initiated;
                                                        }
                                                        elseif($fetch1['ResiTeleVeriStatus']==Initiated_Fail)
                                                        { echo $Initiatedfail;
                                                        }
                                                        elseif($fetch1['ResiVeriStatus']==Completed)
                                                        { echo $Completed;
                                                        }
                                                }
                                            else{echo $VeriStatus;}
                                            }
                                         else{echo $VeriStatus;} ?>">
                </td>
            </tr>
            <tr>
                <td style="width: 180px" colspan="2">Remark</td>
                <td colspan="2">:</td>
                <td colspan="8"><textarea name="remark" rows="4" style="width: 349px"><?php if($row1) { echo $fetch1['Remark']; } ?></textarea></td>
                <td colspan="2">&nbsp;</td>
            </tr>

    <!--  ------------------------------------ BUTTON ---------------------------------------------------  -->
                            <tr>
                                <td align="center" colspan="12" style="height: 32px">																 <?php  if(($_SESSION['usertype'] == 'Employee') || ($_SESSION['usertype'] == 'Partner')  )                                       { ?>						                      <a href="DisplaySearchResult.php"><input name="btnBack" type="button" value="Back to Search Results " /></a> 					                      	<?php } ?>
                                    <input name="submit" type="submit" value="Initiate Verification" onclick="setaction('Send_InitiateVerification.php');">
                                    <input type="hidden" name="no" value="<?php echo $reference_id ?>">
                                </td>
                                <td align="center" colspan="2" style="height: 32px"></td>
                            </tr>
                                                        
                            <tr>
                                    <td align="center" colspan="14" class="warning">Verification can be Initiated only after required details are entered in application
                                    </td>
                            </tr>

                            <tr>
                                <td align="center">
                                    <input name="appaddress" id="appaddress" type="text" value="<?php echo $appaddress; ?>" style="display:none"></td>
                                <td align="center" colspan="2">
                                    <input name="cobo1address" id="cobo1address" type="text" value="<?php echo $cobo1address; ?>" style="display:none"></td>
                                <td align="center" colspan="2">
                                    <input name="cobo2address" id="cobo2address" type="text" value="<?php echo $cobo2address; ?>" style="display:none"></td>
                                
                                <td align="center" colspan="2">
                                    <input name="empaddress" id="empaddress" type="text" value="<?php echo $empaddress; ?>" style="display:none"></td>
                                <td align="center" colspan="2">
                                    <input name="cobo1empadd" id="cobo1empadd" type="text" value="<?php echo $cobo1empadd; ?>" style="display:none"></td>
                                <td align="center" colspan="2">
                                    <input name="cobo2empadd" id="cobo2empadd" type="text" value="<?php echo $cobo2empadd; ?>" style="display:none"></td>
                                
                                <td align="center" colspan="2">
                                    <input name="offteleno" id="offteleno" type="text" value="<?php echo $offteleno; ?>" style="display:none"></td>
                                <td align="center">
                                    <input name="OffTelephoneCoApp1" id="OffTelephoneCoApp1" type="text" value="<?php echo $OffTelephoneCoApp1; ?>" style="display:none"></td>
                                <td align="center">
                                    <input name="OffTelephoneCoApp2" id="OffTelephoneCoApp2" type="text" value="<?php echo $OffTelephoneCoApp2; ?>" style="display:none"></td>
                                  
                                <td align="center" colspan="2">
                                    <input name="appmobile" id="appmobile" type="text" value="<?php echo $appmobile; ?>" style="display:none"></td>
                                <td align="center" colspan="2">
                                    <input name="ResiTelephoneCoApp1" id="ResiTelephoneCoApp1" type="text" value="<?php echo $ResiTelephoneCoApp1; ?>" style="display:none"></td>
                                <td align="center" colspan="2">
                                    <input name="ResiTelephoneCoApp2" id="ResiTelephoneCoApp2" type="text" value="<?php echo $ResiTelephoneCoApp2; ?>" style="display:none"></td>
                               
                            </tr>
                            </table>
                    </td></tr>
                </table>
                </div>
            </td>
            </tr>
									
        <tr><td height="20" colspan="3"></td></tr>

   <!--     <tr>
                <td class="heading" colspan="3">Application Status History</td>

        <tr>
                <td colspan="3" align="center">
                <table id="box-table-a" class="auto-style4" style="width: 938px">
                <thead>
                <tr>
                <th  width="100px"> reference_id</th>
                <th  width="100px"> Date</th>
                <th  width="100px"> VerificationStatus</th>									
                </tr>

                <?php
										
		while ($row = mysql_fetch_array($sresult) ) 
                    {
                        print '<tr>'
                            .'<td>'. $row['reference_id'] .'</td>'	
                            .'<td>'. $row['InitiatedDate'] .'</td>'				
                            .'<td>'. $row['VerificationStatus'].'</td>'
                            .'</tr>';
                    }	
                ?>			
                        </thead>
                        <tr>
                            <td align="center" colspan="6">
                                <?php if(($_SESSION['usertype'] == 'Employee') || ($_SESSION['usertype'] == 'Partner')){ ?>
                                <input name="btnBack" type="button" value="Back" onclick="history.back(-1)" /><?php } ?></td>
                        </tr>
 -->
                </table>
	<div id="pageNavPosition" align="center"> </div>

		<table border="0" cellpadding="0" cellspacing="0" width="978">
						<tr>
							<td class="line" colspan="2" height="1">
							<img alt="" height="1" src="images/pixel.gif" width="1"></td>
						</tr>
						<tr class="bgfooter">
							<td colspan="1" height="25" width="22">
							<img alt="" height="1" src="images/pixel.gif" width="22"></td>
							<td id="dnn_BottomPane" align="left" class="footer" nowrap="nowrap">
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td align="left" class="normal">
									<a class="Normal" href="disclaimer.html" target="_self">
									Disclaimer</a>&nbsp;&nbsp; |&nbsp;&nbsp;
									<a class="Normal" href="privacypolicy.html" target="_self">
									Privacy Policy</a></td>
								</tr>
							</table>
							</td>
						</tr>
						<tr>
							<td class="line" colspan="2" height="1">
							<img alt="" height="1" src="images/pixel.gif" width="1"></td>
						</tr>
					</table>
					
					<table border="0" cellpadding="0" cellspacing="0" width="978">
						<tr>
							<td height="20px" width="27px"></td>
							<td align="left" class="footer">
							<div class="skinfooter"> Copyright &copy; 2011 KSFi Pvt Ltd.</div>
							</td>
						</tr>
					</table>
					</td>
					<td background="images/rtoutline.jpg" class="rtbgborder" width="12px">
					</td>
				</tr>
			</table>
			</td>
			</tr>
			</table>
		</div>
	</form>
</div>
<script type="text/javascript"><!--
    var pager = new Pager('box-table-a',10); 
    pager.init(); 
    pager.showPageNav('pager', 'pageNavPosition'); 
    pager.showPage(1);
//--></script>

</body>

</html>
