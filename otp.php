<html>

<head>

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>MSION - Where talents meet opportunities. | Verify your account</title>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="css/main.css">

</head>

<body>

<div style="width: 100% !important;height: 100% !important;background: white;display: flex;justify-content: center;align-items: center;overflow-y: auto;padding-top: 150px !important;padding-bottom: 100px;">
	
	<div class="col-lg-5 col-md-5 col-sm-5">
		
		<div style="text-align: center;">
			
			<h4 class="check">Check your inbox</h4>

			<p>Verify your email by entering the code sent to <br>example@gmail.com</p>

		</div>

		<div style="width: 100% !important;display: flex;justify-content: center;">
			
			<img src="images/bigmail.png">

		</div>

		<form method="POST">

			<div style="display: flex;flex-direction: row;gap: 20px;justify-content: center;margin-top: 30px;">

				<div class="form-group login-field">
										
					<input type="text" class="form-control act input-field" name="otp[]" maxlength="1" oninput="moveToNext(this, 'otp2')" id="otp1" required>

	            </div>

	            <div class="form-group login-field">

	             	<input type="text" class="form-control act input-field" name="otp[]" maxlength="1" oninput="moveToNext(this, 'otp3')" id="otp2" required>

	            </div>

	            <div class="form-group login-field">
						                
				    <input type="text" class="form-control act input-field" name="otp[]" maxlength="1" oninput="moveToNext(this, 'otp4')" id="otp3" required>

				</div>

				<div class="form-group login-field">
						                
				    <input type="text" class="form-control act input-field" name="otp[]" maxlength="1" oninput="moveToNext(this, 'otp5')" id="otp4" required>

				</div>

				<div class="form-group login-field">
						                
				    <input type="text" class="form-control act input-field" name="otp[]" maxlength="1" oninput="moveToNext(this, 'otp6')" id="otp5" required>

				</div>

			</div>

			<div class="form-group" style="margin-top: 24px;">
				
				<input type="submit" name="submit" class="submit" value="Verify">

			</div>

			<div class="form-group" style="margin-top: 24px;text-align: center;">
				
				<font>Didn't get a mail <a href="#">Resend</a></font>

			</div>

		</form>

	</div>

</div>

</body>

<script type="text/javascript">

	function moveToNext(current, nextFieldID) {
	    
	        if (current.value.length >= current.maxLength) {
	    	
	    	    document.getElementById(nextFieldID).focus();
	        
	        }
	    
	    }
	    
	    document.getElementById('otpForm').addEventListener('submit', function(e) {
	    
	        var otpInputs = document.querySelectorAll('input[name="otp[]"]');
	    
	        var otpValue = '';
	    
	        otpInputs.forEach(function(input) {
	    
	            otpValue += input.value;
	    
	        });
	    
	        var otpHiddenInput = document.createElement('input');

	        otpHiddenInput.type = 'hidden';

	        otpHiddenInput.name = 'otp';

	        otpHiddenInput.value = otpValue;

	        this.appendChild(otpHiddenInput);
		});

		function moveToNext(current, nextFieldID) {
            
            if (current.value.length >= current.maxLength) {
            
                document.getElementById(nextFieldID).focus();
            
            }
        
        }

        document.getElementById('otpForm').addEventListener('submit', function(e) {
        
            var otpInputs = document.querySelectorAll('input[name="otp[]"]');
        
            var otpValue = '';
        
            otpInputs.forEach(function(input) {
        
                otpValue += input.value;
        
            });
        
            var otpHiddenInput = document.createElement('input');
        
            otpHiddenInput.type = 'hidden';
        
            otpHiddenInput.name = 'otp';
        
            otpHiddenInput.value = otpValue;
        
            this.appendChild(otpHiddenInput);
        
        });

  // Array of text options
  
  const contentOptions = [
    {
      text: "This is the first text option.",
      staffName: "Moyin Adedeji",
      staffRole: "Designer, McGeorge"
    },
    {
      text: "Oluwatosin Lloyd Akinfenwa made the app man. He is working well, He is just using this text to test his JS",
      staffName: "Oluwatosin Lloyd Akinfenwa",
      staffRole: "Web Developer, McGeorgeConsulting LTD."
    },
    {
      text: "Oluwatosin Akinfenwa created an innovative login system that enhances security and user experience.",
      staffName: "Jane Smith",
      staffRole: "Graphic Designer, Creative Studio"
    },
    {
      text: "Oluwatosin Akinfenwa designed a user-friendly interface that has been praised by all users.",
      staffName: "Emily Johnson",
      staffRole: "UI/UX Designer, Innovatech"
    },
    {
      text: "Oluwatosin Akinfenwa developed a scalable backend system that handles millions of requests efficiently.",
      staffName: "David Brown",
      staffRole: "Front-End Developer, CodeWorks"
    }
  ];

  // Function to change the text and staff details randomly
  function changeContent() {
    const randomIndex = Math.floor(Math.random() * contentOptions.length);
    document.getElementById("randomText").innerText = contentOptions[randomIndex].text;
    document.getElementById("staffInfo").innerHTML = `
      <font>${contentOptions[randomIndex].staffName}</font>
      <font style="color: grey !important; font-size: 12px;">${contentOptions[randomIndex].staffRole}</font>
    `;
  }
  	// Change content every 3 seconds (3000 milliseconds)
  	setInterval(changeContent, 3000);
	
	document.addEventListener('DOMContentLoaded', function() {
    
    var currentPage = '<?php echo basename($_SERVER["PHP_SELF"], ".php"); ?>';
    
    var links = document.querySelectorAll('.nav-link');

    links.forEach(link => {
    
        if (link.getAttribute('data-page') === currentPage) {
    
            link.classList.add('link-active');
    
        }
    
    });
    
});

</script>

<script src="bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="js/main.js"></script>

</html>