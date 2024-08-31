<?php

session_start();

include 'connect.php';

if (!isset($_GET["job_id"])) {
	
	header('location: jobsearch.php');

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
				
				<div class="skip-button">Back</div>

			</div>

			<div style="background: transparent;width: 320px;display: flex;align-items: center;">
				
				<img src="images/bar.png">

			</div>

		</div>

		<div style="padding: 15px;background: #FAFAFA;width: 100% !important;height: auto !important;margin-top: 30px;padding-bottom: 64px;padding-left: 20px;">

			<form method="POST" enctype="multipart/form-data">

				<div style="display: flex;flex-direction: column;gap: 16px;">

					<div class="dash-sec" style="width: 100% !important;">

						<div style="width: 100% !important;">
							
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

					<div style="width: 100% !important;background: white;padding: 24px;border-radius: 20px;">
						
						<div>
							
							<h4 style="font-size: 22px;font-weight: 600;">Upload / Resume CV</h4>

						</div>

						<div>
							
							<input type="file" id="fileInput" name="file" accept=".docx, .pdf" style="display: none;" />

							<div class="upload-area" onclick="document.getElementById('fileInput').click();">
								
								<div style="display: flex;flex-direction: column;">
									
									<div style="width: 100% !important;display: flex;justify-content: center;">
										
										<img id="fileIcon" src="images/upload.png" style="width: 40px !important;height: 40px !important;border-radius: 50px;">

									</div>

									<div>
										
										<div style="text-align: center;display: flex;flex-direction: column;gap: 8px;">
											
											<font><font style="font-weight: 600;color: #016B98;">Click to upload</font> or drag and drop</font>

											<font id="uploadText" style="color: var(--Grey-600, #475367);">PDF, DOCX, JPG or GIF (max. 800x400px)</font>

										</div>

									</div>

								</div>

							</div>

						</div>

					</div>

					<div style="background: white;width: 100% !important;padding: 20px;border-radius: 20px;">
						
						<div style="display: flex;flex-direction: column;gap: 20px;">
							
							<div class="form-group">
								
								<input type="text" name="fullname" class="form-control" style="border-radius: 100px;height: 56px;padding-left: 20px;" placeholder="Fullname" >

							</div>

							<div class="form-group">
								
								<input type="text" name="title" class="form-control" style="border-radius: 100px;height: 56px;padding-left: 20px;" placeholder="Title">

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
											
									<input type="submit" name="submit" class="submit" value="Continue" style="width: 100% !important;">

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



</body>

</html>