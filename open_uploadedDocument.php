



<?php

ob_start();

session_start();




if((isset($_SESSION['usertype']))||(isset($_SESSION['id'])))

{


$reference_id_encoded=$_GET['reference'];

$reference_id = base64_decode(strtr($reference_id_encoded, '-_', '+*'));

$doc=$_GET['doc'];
	

?>
    
<html>
<head>
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
</head>
<body>

<iframe width="100%" height="100%"  src="<?php echo $reference_id ."/".$doc;?>" frameborder="0" allowfullscreen></iframe>

</body>
</html>
<?php } 
 else
 { 

header('Location:./index.php'); 

ob_flush();
exit;

} ?>