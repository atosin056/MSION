<?php

if (!isset($_GET["msitos"])) {

	header('location: complete2.php');

}

session_start();

include 'connect.php';

if (isset($_POST["submit"])) {
	
	$facebook = $_POST['facebook'];

	$youtube = $_POST["youtube"];

	$x = $_POST["x"];

	$linkedin = $_POST["linkedin"];


	$socials = [
    
    'facebook' => !empty($facebook) ? $facebook : null,
    
    'linkedin' => !empty($linkedin) ? $linkedin : null,
    
    'youtube' => !empty($youtube) ? $youtube : null,
    
    'x' => !empty($x) ? $x : null,
    
    'email' => !empty($email) ? $email : $_SESSION["otp_email_send"] // Ensure email is not null

	];

	// Prepare the base SQL query

	$insert_query = "INSERT INTO `socials` (`id`, `facebook`, `linkedin`, `youtube`, `x`, `email`) VALUES (NULL, ";

	$values = [];

	// Build the values part of the query dynamically

	foreach ($socials as $handle_name => $link) {

	    if ($link !== null) {

	        $values[] = "'" . mysqli_real_escape_string($conn, $link) . "'";

	    } else {

	        // Ensure we include NULL for fields with no value

	        $values[] = "NULL";

	    }

	}

	// Append the values to the query

	$insert_query .= implode(', ', $values) . ")";

	// Execute the query

	if (mysqli_query($conn, $insert_query)) {

	    // Redirect to dashboard

	    header("Location: login.php");

	    exit();
	}

	else {

	    // Handle error

	    echo "Error: " . mysqli_error($conn);

	}

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

<div style="padding-left: 220px;padding-right: 220px;background: white;width: 100% !important;height: auto !important;padding-top: 100px;padding-bottom: 100px;">
	
	<div>
		
		<div class="row" style="background: transparent;justify-content: space-between;">
			
			<div style="background: transparent;width: 320px;display: flex;align-items: center;">
				
				<img src="images/bar80.png">

			</div>

			<div style="width: 90px;">
				
				<div class="skip-button">Skip</div>

			</div>

		</div>

		<div style="padding: 15px;background: #FAFAFA;width: 100% !important;height: auto !important;margin-top: 30px;padding-bottom: 64px;padding-left: 20px;">

			<form method="POST">

				<div style="display: flex;flex-direction: column;gap: 16px;">

					<div style="width: 100% !important;background: white;padding: 24px;border-radius: 20px;">

						<div>
							
							<h4 style="font-size: 22px;font-weight: 600;">Social handles</h4>

						</div>

						<div>
							
							<div>
								
								<div style="display: flex;width: 100% !important;gap: 16px;">
									
									<div class="handles" data-target="linkedinField">
										
										<img src="images/linkedIn.png" style="border-radius: inherit;width: 100% !important;height: 100% !important;">

									</div>

									<!-- <div class="handles" data-target="githubField">
										
										<img src="images/github.png" style="border-radius: inherit;width: 100% !important;height: 100% !important;">

									</div> -->

									<div class="handles" data-target="youtubeField">
										
										<img src="images/youtube.png" style="border-radius: inherit;width: 100% !important;height: 100% !important;">

									</div>

									<div class="handles" data-target="xField">
										
										<img src="images/ex.png" style="border-radius: inherit;width: 100% !important;height: 100% !important;">

									</div>

									<div class="handles" data-target="FaceBookField">
										
										<img src="images/facebook.png" style="border-radius: inherit;width: 100% !important;height: 100% !important;">

									</div>

									<!-- <div class="handles" data-target="instagramField">
										
										<img src="images/ig.png" style="border-radius: inherit;width: 100% !important;height: 100% !important;">

									</div> -->

									<!-- <div class="handles" data-target="tictocField">
										
										<img src="images/tictoc.png" style="border-radius: inherit;width: 100% !important;height: 100% !important;">

									</div>

									<div class="handles" data-target="wwwField">
										
										<img src="images/www.png" style="border-radius: inherit;width: 100% !important;height: 100% !important;">

									</div> -->

								</div>

							</div>

						</div>

					</div>

					<div style="width: 100% !important;background: white;padding: 24px;border-radius: 20px;">
						
						<div>
							
							<h4 style="font-size: 22px;font-weight: 600;">Enter links</h4>

						</div>

						<div>
						
							<div style="display: flex;flex-direction: column;gap: 24px;">
								
								<div style="gap: 16px;" id="linkedinField" class="link-field">
									
									<div class="handless">
										
										<img src="images/linkedIn.png" style="width: 100% !important;border-radius: inherit;height: 100% !important;">

									</div>

									<div style="flex: 1 1 100;">
										
										<input type="text" name="linkedin" class="form-control" style="padding-left: 20px;border-radius: 20px;height: 56px; !important;width: 100% !important;" placeholder="LinkedIn Link">

									</div>

								</div>

								<div style="gap: 16px;" id="youtubeField" class="link-field">
									
									<div class="handless">
										
										<img src="images/youtube.png" style="width: 100% !important;border-radius: inherit;height: 100% !important;">

									</div>

									<div style="flex: 1 1 100;">
										
										<input type="text" name="youtube" class="form-control" style="padding-left: 20px;border-radius: 20px;height: 56px !important;width: 100% !important;" placeholder="Youtube Link">

									</div>

								</div>

								<div style="gap: 16px;" id="xField" class="link-field">
									
									<div class="handless">
										
										<img src="images/ex.png" style="width: 100% !important;border-radius: inherit;height: 100% !important;">

									</div>

									<div style="flex: 1 1 100px;">
										
										<input type="text" name="x" class="form-control" style="padding-left: 20px;border-radius: 20px;height: 56px !important;width: 100% !important;" placeholder="X Link">

									</div>

								</div>

								<div style="gap: 16px;" id="FaceBookField" class="link-field">
									
									<div class="handless">
										
										<img src="images/facebook.png" style="width: 100% !important;border-radius: inherit;height: 100% !important;">

									</div>

									<div style="flex: 1 1 100px;">
										
										<input type="text" name="facebook" class="form-control" style="padding-left: 20px;border-radius: 20px;height: 56px !important;width: 100% !important;" placeholder="FaceBook Link">

									</div>

								</div>
							
							</div>

						</div>

					</div>

					<div style="margin-top: 24px;padding-left: 9px;padding-right: 9px;" class="form-group">
						
						<div class="row" style="background: transparent;">
							
							<div class="col-md-6 col-sm-6 col-lg-6 row" style="background: transparent;">
								
								<a href="register.php" style="background: transparent;">
									
									<div class="row go-back">
										
										<div style="background: transparent;width: 24px;height: 24px;">
											
											<img src="images/arrow-right.png">

										</div>

										<div style="width: auto;">
											
											<font>Go Back</font>

										</div>

									</div>

								</a>

							</div>
						
							<div style="flex: 1;width: 100% !important;background: transparent;">
										
								<div class="col-lg-6 col-md-6 col-sm-6" style="background: transparent;width: 100% !important;">
											
									<input type="submit" name="submit" class="submit" value="Finish Up" style="width: 100% !important;">

								</div>

							</div>

						</div>

					</div>

				</div>

			</form>
		
		</div>

	</div>

</div>

</body>

<script type="text/javascript">

	document.addEventListener('DOMContentLoaded', () => {
    function handleIconClick(event) {
        const targetId = event.currentTarget.getAttribute('data-target');
        const targetField = document.getElementById(targetId);

        if (targetField) {
            // Toggle the visibility and the active class of the selected link field
            if (targetField.style.display === 'flex') {
                targetField.style.display = 'none';
                targetField.classList.remove('active');
            } else {
                targetField.style.display = 'flex';
                targetField.classList.add('active');
            }
        } else {
            console.error(`No element found with id: ${targetId}`);
        }
    }

    // Add event listeners to all icons
    document.querySelectorAll('.handles').forEach(icon => {
        icon.addEventListener('click', handleIconClick);
    });
});



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