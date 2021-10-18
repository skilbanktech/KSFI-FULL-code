fb13133dcbb7a550af25ecb08c8edbc5







<!DOCTYPE html>
<html lang="en">
<head>
<title>JavaScript - read JSON from URL</title>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>
<script>
var url = 'https://api.bank.codes/in-ifsc/?format=json&api_key=fb13133dcbb7a550af25ecb08c8edbc5&ifsc=ICIC0000069';

$.ajax({
	 
	
  dataType: "json",
  url: 'https://api.bank.codes/in-ifsc/?format=json&api_key=fb13133dcbb7a550af25ecb08c8edbc5&ifsc=ICIC0000069';
  data: data,
  success: function(data){
	  
	  
		
		alert();

  }		
});
</script>


<body>
    <div class="mypanel"></div>

    <script>
    $.getJSON('https://api.bank.codes/in-ifsc/?format=json&api_key=fb13133dcbb7a550af25ecb08c8edbc5&ifsc=ICIC0000069', function(data) {
        
        var text = `micr: ${data.micr}<br>
                    bank: ${data.bank}
                   `
                    
        
        $(".mypanel").html(text);
    });
    </script>
    
</body>
</html>