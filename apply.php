<?php

session_start();

include 'connect.php';

if (!isset($_GET["job_id"])) {
	
	header('location: jobsearch.php');

}

if (isset($_POST["apply"])) {
	
	$phone = $_POST['phone'];

	$email = $_SESSION["email"];

	$coverletter = str_replace(array("\r\n", "\n", "\r"), '<br>', $_POST["coverletter"]);


	$unique_id = $_GET["job_id"];

	$name = $_SESSION["fullname"];

	$title = $_SESSION["title"];


	$insert = "INSERT INTO `applicants` (`id`,`fname`,`title`,`phone`,`email`,`coverletter`,`cv`,`cv_rating`,`stage`,`application_status`,`date_entered`) VALUES (NULL, '".$name."','".$title."','".$phone."','".$email."','".$coverletter."','".$_SESSION["cv"]."','".$_SESSION["cv_rating"]."','Questioning','nothing',CURRENT_TIMESTAMP())";

	$insert_query = mysqli_query($conn, $insert);

	if ($insert_query) {
		
		header('location: jobsearch.php?applied=yes');

	}

	else{

		echo $insert;

	}

}

?>

<html>

<head>

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>MSION - Where talents meet opportunities.</title>

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

<div style="padding-left: 220px;padding-right: 220px;background: white;width: 100% !important;height: auto !important;padding-top: 100px;padding-bottom: 100px;margin-top: 64px;">
	
	<div>
		
		<div class="row" style="background: transparent;justify-content: space-between;">
			
			<div style="width: 90px;">
				
				<div class="skip-button" id="back" style="cursor: pointer;">Back</div>

			</div>

			<div style="background: transparent;width: 320px;display: flex;align-items: center;">
				
				<img src="images/bar80.png">

			</div>

		</div>

		<div style="padding: 15px;background: #FAFAFA;width: 100% !important;height: auto !important;margin-top: 30px;padding-bottom: 64px;padding-left: 20px;border-radius: 20px;">

			<form method="POST" enctype="multipart/form-data">

				<div style="display: flex;flex-direction: column;gap: 16px;">

					<div class="dash-sec" style="width: 100% !important;">

						<div style="width: 100% !important;display: flex;flex-direction: column;gap: 20px;">

							<div>
								
								<font class="bio">Resume / CV</font>

							</div>
							
							<div class="resume" style="width: 100% !important;">

								<a href="cv/<?php echo $_SESSION["cv"]; ?>" download>
								
									<div style="display: flex;gap: 8px;">
										
										<div style="width: 40px;height: 40px;">
											
											<img src="images/file type.png" id="fileTypeImage" style="width: 100% !important;height: 100% !important;">

										</div>

										<div style="display: flex;align-items: center;">

											<div style="flex-direction: column;display: flex;gap: 3px;">
											
												<font class="cv-name"><?php echo $_SESSION["cv"]; ?></font>

												<font class="addons">313 KB. 2 July 2024</font>

											</div>

										</div>

									</div>

								</a>

							</div>

						</div>

					</div>

					<div class="dash-sec">
						
						<div style="display: flex;flex-direction: column;gap: 20px;width: 100% !important;">
								
							<div class="form-group">
								
								<input type="text" name="fullname" class="form-control" style="border-radius: 20px;height: 56px;padding-left: 20px;cursor: not-allowed;background: transparent;" disabled placeholder="Fullname" value="<?php echo $_SESSION["fullname"]; ?>">

							</div>

							<div class="form-group">
								
								<input type="text" name="title" class="form-control" style="border-radius: 20px;height: 56px;padding-left: 20px;cursor: not-allowed;background: transparent;" disabled placeholder="Title" value="<?php echo $_SESSION["title"]; ?>">

							</div>

						</div>

						</div>

						<div class="dash-sec" style="flex-direction: column;gap: 20px;">
							
							<div style="width: 100% !important;">
								
								<label class="label-for">Email Address</label>

								<div class="form-group" style="margin-top: 10px;">
								
									<input type="email" name="email" class="form-control" style="border-radius: 20px;height: 56px;padding-left: 20px;cursor: not-allowed;background: transparent;" disabled placeholder="Title" value="<?php echo $_SESSION["email"]; ?>">

								</div>

							</div>

							<div style="width: 100% !important;">
								
								<label class="label-for">Phone Number</label>

								<div class="form-group" style="margin-top: 10px;">
								
									<input type="phone" name="phone" id="phone-input" class="form-control" style="border-radius: 20px;height: 56px;padding-left: 20px;background: transparent;" placeholder="(234) 911 519 7167">

								</div>

							</div>

						</div>

						<div class="dash-sec">
							
							<div style="width: 100% !important;">
								
								<font class="bio">Additional text/Cover letter</font>

								<div class="form-group" style="margin-top: 20px;">
									
									<textarea name="coverletter" placeholder="Enter Text" class="form-control list-input" style="height: 200px;border-radius: 20px;padding-top: 20px;padding-left: 20px;line-height: 30px;"></textarea>

								</div>

							</div>

						</div>

					</div>

					<div style="margin-top: 24px;padding-left: 9px;padding-right: 9px;" class="form-group">
						
						<div>
							
							<div style="flex: 1;width: 100% !important;background: transparent;">
										
								<div class="col-lg-6 col-md-6 col-sm-6" style="background: transparent;width: 100% !important;">
											
									<input type="submit" name="apply" class="submit" value="Submit Application" style="width: 100% !important;">

								</div>

							</div>

						</div>

					</div>

				</div>

			</form>
		
		</div>

	</div>

</div>

<?php

include 'footer.php';

?>

</body>

<script type="text/javascript">

	document.getElementById('phone-input').addEventListener('input', function (e) {
    // Remove all non-digit characters
    let value = e.target.value.replace(/\D/g, '');

    // Format the input value
    value = value.replace(/(\d{3})(?=\d)/g, '$1 ').trim();

    // Set the formatted value back to the input
    e.target.value = value;
});

	
	const fileName = "<?php echo $_SESSION["cv"]; ?>";

	const fileExtension = fileName.split('.').pop().toLowerCase();

	const imgElement = document.getElementById('fileTypeImage');

	if (fileExtension === 'pdf') {
	 
	    imgElement.src = 'images/pdf.png'; // Path to the PDF image

	}

	else if (fileExtension === 'docx') {
	    
	    imgElement.src = 'images/docx_icon.png'; // Path to the DOCX image

	}

	document.addEventListener('DOMContentLoaded', function() {
    
    var currentPage = '<?php echo basename($_SERVER["PHP_SELF"], ".php"); ?>';
    
    var links = document.querySelectorAll('.nav-link');

    links.forEach(link => {
    
        if (link.getAttribute('data-page') === currentPage) {
    
            link.classList.add('link-active');
    
        }
    
    });
    
});

const backButton = document.getElementById('back');

backButton.addEventListener('click', function () {
	
	window.location.href = 'jobsearch.php?search';

})

</script>

</body>

</html>