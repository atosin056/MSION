<?php

session_start();

?>

<html>

<head>

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>MSION - Where talents meet opportunities. | Contact Us</title>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="css/main.css">

</head>

<body>

<?php

include 'navbar.php';

?>

<div class="header" style="padding-top: 140px;height: auto; !important;padding-bottom: 100px;">
	
	<div style="background: url('images/bg2.png');width: 100% !important;padding-top: 80px;height: 150% !important;background-repeat: no-repeat;display: flex;justify-content: flex-end;">
		
		<div style="background: transparent;width: 50%;padding-right: 50px;">
			
			<div class="col-lg-7 col-sm-7 col-md-7" style="background: transparent;width: 100% !important;">

				<h4 class="get-in-touch">Get in touch with our team</h4>

				<form method="POST" style="margin-top: 30px;">
					
					<div class="form-group">
						
						<input type="text" name="name" class="form-control contact" placeholder="Name">

					</div>

					<div class="form-group" style="margin-top: 16px;">
						
						<input type="email" name="email" class="form-control contact" placeholder="Email">

					</div>

					<div class="form-group" style="margin-top: 16px;">
						
						<textarea name="message" class="form-control contact" placeholder="Message" style="height: 400px;border-radius: 20px;"></textarea>

					</div>

					<div class="form-group" style="margin-top: 16px;">
						
						<input type="submit" name="submit" class="submit" value="Send">

					</div>

				</form>

			</div>

		</div>

	</div>

</div>

<?php

include 'footer.php';

?>

</body>

<script type="text/javascript">
	
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