<?php 
include('./connection.php');

class Common
{

	function GetStateName($state)
	{		
		if($state=='AP')		
		$state='Andhra Pradesh';		
		else if($state=='AS')		
		$state='Assam';		
		else if($state=='AR')	
		$state='Arunachal Pradesh';		
		else if($state=='GU')		
		$state='Gujrat';		
		else if($state=='BH')		
		$state='Bihar';		
		else if($state=='HR')		
		$state='Haryana';		
		else if($state=='HP')
		$state='Himachal Pradesh';	
		else if($state=='JK')		
		$state='Jammu & Kashmir';		
		else if($state=='KR')		
		$state='Karnataka';		
		else if($state=='KE')		
		$state='Kerala';		
		else if($state=='MP')		
		$state='Madhya Pradesh';		
		else if($state=='MH')		
		$state='Maharashtra';		
		else if($state=='MN')		
		$state='Manipur';		
		else if($state=='ME')		
		$state='Meghalaya';		
		else if($state=='MI')		
		$state='Mizoram';	
		else if($state=='NG')		
		$state='Nagaland';		
		else if($state=='OR')	
		$state='Orissa';		
		else if($state=='PU')		
		$state='Punjab';		
		else if($state=='RA')		
		$state='Rajasthan';		
		else if($state=='SI')		
		$state='Sikkim';		
		else if($state=='TN')		
		$state='Tamil Nadu';		
		else if($state=='TR')		
		$state='Tripura';		
		else if($state=='UP')		
		$state='Uttar Pradesh';		
		else if($state=='WB')		
		$state='West Bengal';		
		else if($state=='DL')		
		$state='Delhi';		
		else if($state=='GA')	
		$state='Goa';		
		else if($state=='PO')		
		$state='Pondichery';		
		else if($state=='LA')		
		$state='Lakshdweep';		
		else if($state=='DD')		
		$state='Daman & Diu';	
		else if($state=='DN')	
		$state='Dadra & Nagar';	
		else if($state=='CH')		
		$state='Chandigarh';		
		else if($state=='AN')	
		$state='Andaman & Nicobar';		
		else if($state=='UT')	
		$state='Uttaranchal';		
		else if($state=='JH')		
		$state='Jharkhand';		
		else if($state=='CT')		
		$state='Chattisgarh';
		else		
		$state=$state;
				
		return $state;		
	}
	
	function GetCollegeAddress($fld)
	{
	    $body="";
		$select_query6 = "select * from collegeaddressdetail where reference_id = '$fld'";
		$select_record6=mysql_query($select_query6); 
		//or die(mysql_error());
		
		$row6= mysql_fetch_row($select_record6);       
	    if($row6)
	    {     
		$col6 = array('reference_id','address','street1','street2','state','district','city','pincode','stdcode','phone','Email','ContactPerson');
		$fetch6 = array_combine($col6,$row6);
		
		$address=$fetch6['address'];
		$street1=$fetch6['street1'];
		$street2=$fetch6['street2'];
		$state=$fetch6['state'];
		$district=$fetch6['district'];
		$city=$fetch6['city'];
		$pincode=$fetch6['pincode'];
		$stdcode=$fetch6['stdcode'];
		$phone=$fetch6['phone'];
		$Email=$fetch6['Email'];
		$ContactPerson=$fetch6['ContactPerson'];
 		
		$body = "College Address:".$address." ".$street1." ".$street2." ".$city."  ".$district." ".$state." ".$pincode.",\r\n";
		$body .= "Phone No:".$stdcode." ".$phone."\r\n\n";
		$body .= "Email ID:".$Email."\r\n\n";

		}
		
		return $body ;
	}
}
?>