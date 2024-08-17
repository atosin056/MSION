<?php

session_start();

include 'connect.php';

if (!isset($_SESSION["logged-email"])) {
	
	header('location: login.php');

}

?>

<html>

<head>

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>MSION - Where talents meet opportunities. | Complete your profile</title>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="css/main.css">

</head>

<body>

<?php

include 'dashboard_nav.php';

?>

<div class="sections" style="background: white;">
	
	<div style="">
		
		<div style="display: flex;" class="row">
				
			<div class="col-lg-7 col-md-7 col-sm-7" style="background: #FAFAFA;padding: 24px;border-radius: 24px;">
				
				<div style="background: white;">
					
					<div class="row">
						
						<div class="img-wrap">
							
							<img src="profile/<?php echo $_SESSION['profile-pic']; ?>" style="width: 100% !important;height: 100% !important;">

						</div>

					</div>

				</div>

			</div>

		</div>

	</div>

</div>

</body>

<script>

	document.addEventListener('DOMContentLoaded', function() {
    
    var currentPage = '<?php echo basename($_SERVER["PHP_SELF"], ".php"); ?>';
    
    var links = document.querySelectorAll('.navField');

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