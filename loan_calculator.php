
<?php 
session_start();


?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml">

<!-- #BeginTemplate "webtemplate.dwt" -->

<head id="Head">
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
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



<link id="KSFSkin" href="css/ksfi.css" rel="stylesheet" type="text/css">
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="bootstrap/js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="bootstrap/js/bootstrap-submenu.min.js" defer></script>


	
     </head>
        <!-- jQuery 2.0.2 -->
       
	<script type="text/javaScript">
	
		$(document).ready(function(){
		
			//var curl = $(location).attr('href');
			var curl = location.href.split("/").slice(-1);
		
			var aurl = "";
			$('li > a').each(function() {
				aurl = $(this).attr('href').split("/").slice(-1);
				if ("'"+curl+"'" == "'"+aurl+"'"){
				$(this).parent().parent().parent().addClass('active');
				$(this).parent().parent().parent().parent().addClass('active');
				$(this).parent().parent().parent().parent().parent().addClass('active');
				$(this).parent().parent().parent().parent().parent().parent().addClass('active');
				$(this).parent().parent().parent().parent().parent().parent().parent().addClass('active');
				}			
			});
			
			
		});
</script>


<style>
div.disclaimer
{
  position:absolute;
   width:100%;

   background:#ababab;
   text-align:center;
   font-size:small;
   
}

</style>	

		<script src="http://code.highcharts.com/highcharts.js"></script>
	<script src="http://code.highcharts.com/modules/exporting.js"></script>

    <body class="skin-black">
	        <!-- header logo: style can be found in header.less -->
      
         
              
          
	
	<script src="slider/js/simple-slider.js"></script>
	<link href="slider/css/simple-slider.css" rel="stylesheet" type="text/css" />

	
	<script type="text/Javascript">	
		$(document).ready(function(){
			$("#la").bind(
				"slider:changed", function (event, data) {				
					$("#la_value").html(data.value.toFixed(0)); 
					calculateEMI();
				}
			);

			$("#nm").bind(
				"slider:changed", function (event, data) {				
					$("#nm_value").html(data.value.toFixed(0)); 
					calculateEMI();
				}
			);
			
			$("#roi").bind(
				"slider:changed", function (event, data) {				
					$("#roi_value").html(data.value.toFixed(2)); 
					calculateEMI();
				}
			);
			
			function calculateEMI(){
				var loanAmount = $("#la_value").html();
				var numberOfMonths = $("#nm_value").html();
				var rateOfInterest = 28;
				var monthlyInterestRatio = (rateOfInterest/100)/12;
				
				
				  var rate = monthlyInterestRatio; // Monthly interest rate
		
        var term = $("#nm_value").html();
        var emi1 = loanAmount * rate * (Math.pow(1 + rate, term) / (Math.pow(1 + rate, term) - 1));
		
		 var emi= Math.round(emi1);
		 
				
				var top = Math.pow((1+monthlyInterestRatio),numberOfMonths);
				var bottom = top -1;
				var sp = top / bottom;
			//	var emi = ((loanAmount * monthlyInterestRatio) * sp);
				var full = numberOfMonths * emi;
				var interest = full - loanAmount;
				var int_pge =  (interest / full) * 100;
				$("#tbl_int_pge").html(int_pge.toFixed(2)+" %");
				//$("#tbl_loan_pge").html((100-int_pge.toFixed(2))+" %");
				
				var emi_str = emi.toFixed(2).toString().replace(/,/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
				var loanAmount_str = loanAmount.toString().replace(/,/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
				var full_str = full.toFixed(2).toString().replace(/,/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
				var int_str = interest.toFixed(2).toString().replace(/,/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
				
				$("#emi").html(emi_str);
				$("#tbl_emi").html(emi_str);
				$("#tbl_la").html(loanAmount_str);
				$("#tbl_nm").html(numberOfMonths);
				$("#tbl_roi").html(rateOfInterest);
				$("#tbl_full").html(full_str);
				$("#tbl_int").html(int_str);
				var detailDesc = "<thead><tr class='success'><th>Payment No.</th><th>Begining Balance</th><th>EMI</th><th>Principal</th><th>Interest</th><th>Ending Balance</th></thead><tbody>";
				var bb=parseInt(loanAmount);
				var int_dd =0;var pre_dd=0;var end_dd=0;
				for (var j=1;j<=numberOfMonths;j++){
					int_dd = bb * ((rateOfInterest/100)/12);
					pre_dd = emi.toFixed(2) - int_dd.toFixed(2);
					end_dd = bb - pre_dd.toFixed(2);
					detailDesc += "<tr><td>"+j+"</td><td>"+bb.toFixed(2)+"</td><td>"+emi.toFixed(2)+"</td><td>"+pre_dd.toFixed(2)+"</td><td>"+int_dd.toFixed(2)+"</td><td>"+end_dd.toFixed(2)+"</td></tr>";
					bb = bb - pre_dd.toFixed(2);
				}
					detailDesc += "</tbody>";
				$("#illustrate").html(detailDesc);
				 $('#container').highcharts({
				 
						chart: {
							plotBackgroundColor: null,
							plotBorderWidth: null,
							plotShadow: false
						},
						title: {
							text: 'EMI Calculator'
						},
						tooltip: {
							//pointFormat: '{series.name}: <b>{point.value}%</b>'
						},
						plotOptions: {
							pie: {
								allowPointSelect: true,
								cursor: 'pointer',
								dataLabels: {
								//	enabled: true,
									color: '#000000',
									connectorColor: '#000000',
									format: '<b>{point.name}</b>: {point.percentage:.1f} %'
								}
							}
						},
						series: [{
							type: 'pie',
							name: 'Amount',
							data: [
								['Loan',   eval(loanAmount)],
								['Interest',       eval(interest.toFixed(2))]
							]
						}]
					});			
			
			}
			calculateEMI();

		});
		
		
	</script>

<body>
      <?php include('./common/bootstrapcomHeader.php'); ?>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                  
					  <ol class="breadcrumb">
                        <li><a href="./"><i ></i> Home</a></li>
                        <li><a href="./personalloans.html">Personal Loan</a></li>
                        <li class="active">EMI Calculator</li>
                    </ol>
                    
                </section>

                <!-- Main content -->
                <section class="content" >
                    <div class="row">
						
                        <div class="col-md-12">
						
                            <div class="box">
							
			                                
								<div class="col-md-5">
									<h4><span class="label label-danger" style="font-size:14px" >Loan Amount is <strong><span class ='' id="la_value">10000</span></strong></span></h4>								
									<input type="text"   data-slider="true" value="25000" data-slider-range="10000,1000000" data-slider-step="10000"  id="la">
									
								
								
								
									<h4><span class="label label-danger" style="font-size:14px">No. of Month is <strong><span class =''  id="nm_value">36</span> </strong></span></h4>
									<input type="text" data-slider="true" value="36" data-slider-range="6,88" data-slider-step="3" data-slider-snap="true" id="nm">
									
								
								
								
									<br>
									
									
									
									
									
								</div>
								
								
						<div class="col-md-5" >
								
								<div class="alert alert-info col-md-5 ">									  
									  <center><strong>Monthly EMI</strong> <BR>
									  <button type="button"  class="btn-info btn-lg" id='emi'></button></center>
									</div>
									
									<div class="alert alert-info col-md-5">									  
									  <center><strong>Total Interest</strong> <BR>
									  <button type="button" class=" btn-info btn-lg" id='tbl_int'></button></center>
									</div>
									
									
									<div class="alert alert-info col-md-5 ">									  
									  <center><strong>Payable Amount</strong> <BR>
									  <button type="button" class="btn-info btn-lg" id='tbl_full'></button>
									  </center>
									</div>

									
								
											</div>
								
								
								<div class="box-body"  id='datatable'>
								
										
							
                            </div><!-- /.box -->

                            
                        </div><!-- /.col -->
                        
                    </div>
                </section><!-- /.content -->                
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
    </body>
	
	        <!-- Bootstrap -->
   

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-38615761-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<?php include('./common/bootstrap_commonFooter.php');?>
				
				

	