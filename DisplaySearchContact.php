<?php session_start();?>
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml">

<!-- #BeginTemplate "webtemplate.dwt" -->

<head id="Head">
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
<link id="KSFSkin" href="css/skin.css" rel="stylesheet" type="text/css" />
<link id="KSFSkin" href="css/ksfi.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="js/loanApplication.js" type="text/javascript"> </script>
<script language="javascript" src="js/copy_state.js" type="text/javascript"> </script>
<script language="javascript" src="js/contactus.js" type="text/javascript"> </script>
<script language="javascript" src="js/paging.js" type="text/javascript"> </script>
<script language="javascript" src="js/common.js" type="text/javascript"> </script>
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
</head>

<body id="Body">

<noscript></noscript>
<div align="center">
	<form id="Form"  autocomplete="off" enctype="multipart/form-data" method="post" name="Form" style="height: 100%;">
<?php include('./common/common_mainmenu.php'); ?>
					<!-- #BeginEditable "Content" -->
					<table width="100%" align="center"><tbody><tr><td height="20" class="heading" >Contact Search Result</td></tr>
					<tr><td>
					<table id="box-table-a" align="center" border="1" cellpadding="3" cellspacing="3">
					<thead>
					
					

					<tr>
						<th class="formHeader">Select</th>
						<th class="formHeader">Contact ID</th>
						<th class="formHeader">First Name</th>
						<th class="formHeader">Last Name</th>
						<th class="formHeader" style="width: 85px">City</th>
						<th class="formHeader" style="width: 85px">Contact No.</th>
                                                <th class="formHeader" style="width: 85px">Email</th>
                                                <th class="formHeader" style="width: 85px">Amount</th>
                                                <th class="formHeader" style="width: 85px">I am a</th>
                                                <th class="formHeader" style="width: 85px">Purpose of contact</th>
                                                <th class="formHeader" style="width: 85px">Date</th>
<!--                                                <th class="formHeader" style="width: 85px">Location</th>-->
                                                <?php  if($_SESSION['usertype'] == 'Employee') { ?>
                                                <th class="formHeader" style="width: 85px">Partner Name</th>
                                                <?php } ?>
						</tr></thead>
	<?php

            
   // -------------- to get " assignCity "   --------- 6/7/2013 -------Tanu------------
                        $selectUserDetail="select user_id,firstname,lastname,username,usertype,password,location,role,mobile 
                                        from login_details where username='".$_SESSION['internal_email']."'";
                        $userDetail_record=mysql_query($selectUserDetail);
                        $row_user= mysql_fetch_row($userDetail_record);

                        if($row_user)
                        {
                            $col = array('user_id','firstname','lastname','username','usertype','password','location','role','mobile');
                            $fetch = array_combine($col,$row_user); 
                        }
                        $assignCity=$fetch['location'];
           
                         if($restrictapp!="")
                            { echo($assignCity);
                              if($assignCity!="")
                              { 
                                  
                                $select_query="Select * from contact_details where fname like'%".$name."%'and phone like '%".$contact."%' 
                                    and email like '%".$email."%' and DATE(date) between '".$fdate."' and '".$tdate."'
                                    and id like '%".$contactID."%' and partnername='".$_SESSION['internal_email']."' 
                                    and city in (select location from login_details) order by date desc;";     
                           
                              }
                              else
                              {
                               $select_query="Select * from contact_details where fname like'%".$name."%'and phone like '%".$contact."%' 
                                    and email like '%".$email."%' and DATE(date) between '".$fdate."' and '".$tdate."'
                                    and id like '%".$contactID."%' and partnername='".$_SESSION['internal_email']."' 
                                    order by date desc;";     
                              }
                            }
                          else
                              {	
                                $select_query="Select * from contact_details where fname like'%".$name."%'and phone like '%".$contact."%' 
                                            and email like '%".$email."%' and DATE(date) between '".$fdate."' and '".$tdate."'
                                            and id like '%".$contactID."%'    order by date desc;";
                         
                              }
                
                              
                              

                $query="select username from login_details where role='Partner' or role='Field Officer'";
                $record=mysql_query($query);
                $option="";
                while($row1 = @mysql_fetch_assoc($record))
                {
                    $username=$row1["username"];
                    $option.="<OPTION VALUE=\"$username\">".$username;
                }

		$select_record=mysql_query($select_query);
		while ($row = @mysql_fetch_assoc($select_record) ) {
						
						

	      print '<tr >'
	       .'<td><input type="radio" name="myradio" value="'.$row['id'].'" id="'. $row['id'].'"
	        onclick="EnableRadioContactSearch(this)"></td>'
	       
	       

			.'<td>'. $row['id'] .'</td>'	
			.'<td>'. $row['fname'] .'</td>'
			.'<td>'. $row['lname'] .'</td>'	
                        .'<td>'. $row['city'] .'</td>'
                        .'<td>'. $row['phone'] .'</td>'
                        .'<td>'. $row['email'] .'</td>'
                        .'<td>'. $row['amount'] .'</td>'
                        .'<td>'. $row['iam'] .'</td>'
                        .'<td>'. $row['purposeofcontact'] .'</td>'
                        .'<td>'. $row['date'] .'</td>'
                       // .'<td><select id="'. $row['id'].'country" name="'. $row['id'].'country"  size="1"></select><script type="text/javascript">initCountry("","'. $row['id'].'country","","");</script></td>' 
                        .'<td>';
//                      
                    if($_SESSION['usertype'] == 'Employee')
                        {  
                                if(isset($row['partnername']))
                                    {
                                            $id=$row['id'];
                                         
                                         

                                            $selectpartner="select partnername from contact_details where id='$id'";
                                            $recordpartnername=mysql_query($selectpartner);
                                            //$selectPartnername=mysql_query($recordpartnername);
                                            //echo $selectpartner;
                                            while ($row = @mysql_fetch_assoc($recordpartnername) ) 
                                            { 

                                                $PartnerName=$row['partnername'];
                                                    // echo   $PartnerName;                  
                                                print  '<select disabled="disabled" name="'. $id .'Name" id="'. $id .'Name">\n'
                                                        .'<option value="'.$PartnerName.'">'.$PartnerName.'</option>}</select>' 
                                                        .'</td>';


                                            }
                                    }
                                    else
                                    {
                                        print '<select id="'. $row['id'].'Name" name="'. $row['id'].'Name"  size="1" onchange="OnChangeAssign(this)"><option>Select</option>'. $option .'</select></td>';
                                    }
                    }
                        
                        

//                        }else{while ($row = @mysql_fetch_assoc($selectPartnername) ) { $PartnerName=$row[partnername];
//                          "<select name=\"$strNameOrdinal\">\n"; 
//                          "<option value=\"$option\">$PartnerName</option>}</select>\n" .'</td>'
                      //  .'<td>'.if($row['partnername']==null){ .'<select id="'. $row['id'].'Name" name="'. $row['id'].'Name"  size="1"><OPTION VALUE=1>'. $option .'</select>'.}.'</td>'
		print '</tr>';
	         

    }					
?>
</table></td></tr></tbody></table>
<div id="pageNavPosition" align="center"> </div>
			<table align="center">
			<tbody>
			<tr><td height="20"></td></tr>
			<tr>
                     <td align="center">
                                   <input type='submit'  name="btnBack"
                           value='Back' onclick="setaction('ContactSearch.php');" ></input>
                               </td>
                        </tr>
			<tr><td height="50"></td></tr></tbody></table>
<!-- #EndEditable -->
			
			

					<table border="0" cellpadding="0" cellspacing="0" width="978">
						<tbody>
						<tr>
							<td class="line" colspan="2" height="1">
							<img alt="" height="1" src="images/pixel.gif" width="1" /></td>
						</tr>
						<tr class="bgfooter">
							<td colspan="1" height="25" width="22">
							<img alt="" height="1" src="images/pixel.gif" width="22" /></td>
							<td id="dnn_BottomPane" align="left" class="footer" nowrap="nowrap">
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tbody>
								<tr>
									<td align="left" class="normal">
									<a class="Normal" href="disclaimer.html" target="_self">
									Disclaimer</a>&nbsp;&nbsp; |&nbsp;&nbsp;
									<a class="Normal" href="privacypolicy.html" target="_self">
									Privacy Policy</a></td>
								</tr>
							</tbody>
							</table>
							</td>
						</tr>
						<tr>
							<td class="line" colspan="2" height="1">
							<img alt="" height="1" src="images/pixel.gif" width="1" /></td>
						</tr>
					</tbody>
					</table>
					
					

					<table border="0" cellpadding="0" cellspacing="0" width="978">
						<tbody>
						<tr>
							<td height="20px" width="27px"></td>
							<td align="left" class="footer">
							<div class="skinfooter"> Copyright &copy; 2011 KSFi Pvt Ltd.</div>
							</td>
						</tr>
					</tbody>
					</table>
					</td>
					<td background="images/rtoutline.jpg" class="rtbgborder" width="12px">
					</td>
				</tr>
			</tbody>
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

<!-- #EndTemplate -->

</html>