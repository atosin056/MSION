<?php

session_start();

include '../connect.php';

if (!isset($_GET["fuid"])) {

    header('location: verify_otp.php');

    exit();

}

if (isset($_POST["submit"])) {
       
    $tagline = mysqli_real_escape_string($conn, $_POST['tagline']);
    
    $about = mysqli_real_escape_string($conn, $_POST["about"]);

    if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] <= 0) {
        
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png", "PNG" => "image/PNG", "gif" => "image/gif");

        $filename = $_FILES["photo"]["name"];
    
        $filetype = $_FILES["photo"]["type"];
    
        $filesize = $_FILES["photo"]["size"];
    
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

    
        if (!array_key_exists($ext, $allowed)) {
    
            die("Please select a valid file format");
    
        }
        
        $maxsize = 5000000000000 * 1024 * 1024;

        if ($filesize > $maxsize) {
    
            die("Error: Filesize too Massive");
    
        }

        if (in_array($filetype, $allowed)) {
    
            $move = move_uploaded_file($_FILES["photo"]["tmp_name"], "profile/". $filename);

            if ($move) {
    
                $update = "UPDATE `company_users` SET `about`='".$about."',`tagline`='".$tagline."',`company_logo`='".$filename."' WHERE `email`='".$_SESSION["otp_email_send"]."'";

                $update_query = mysqli_query($conn, $update);

                if ($update_query) {
    
                    header('location: complete2.php?distro='.$_GET['fuid']);
    
                }
    
    			else{

    				echo $update;

    			}

            }
    
        }
    
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

	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="../css/main.css">

</head>

<body>

<div style="padding-left: 220px;padding-right: 220px;background: white;width: 100% !important;height: auto !important;padding-top: 100px;padding-bottom: 100px;">
	
	<div>
		
		<div class="row" style="background: transparent;justify-content: space-between;">
			
			<div style="background: transparent;width: 320px;display: flex;align-items: center;">
				
				<img src="../images/bar.png">

			</div>

			<div style="width: 90px;">
				
				<div class="skip-button">Skip</div>

			</div>

		</div>

		<div style="padding: 15px;background: #FAFAFA;width: 100% !important;height: auto !important;margin-top: 30px;padding-bottom: 64px;padding-left: 20px;">

			<form method="POST" enctype="multipart/form-data">

				<div style="display: flex;flex-direction: column;gap: 16px;">

					<div style="width: 100% !important;background: white;padding: 24px;border-radius: 20px;">

						<div class="row" style="gap: 20px;">
						
							<div class="form-group" style="width: 120px;background: transparent;">
									
								<input type="file" required name="photo" id="profileImageInput" style="display: none;">

								<div class="profile-image-wrapper" onclick="document.getElementById('profileImageInput').click();">
									
									<img src="../images/circle.png" id="profileImagePreview">

								</div>
								
							</div>

							<div style="background: transparent;width: 40% !important;display: flex;align-items: center;">
								
								<p style="font-size: 25px;color: #726C6C;" id="uploadStatus">Upload a profile picture</p>

							</div>

						</div>

					</div>

					<div style="background: white;width: 100% !important;padding: 20px;border-radius: 20px;">
						
						<div style="display: flex;flex-direction: column;gap: 20px;">
							
							<div class="form-group">
								
								<input type="text" name="cname" class="form-control per" style="border-radius: 20px;height: 56px;padding-left: 20px;cursor: not-allowed;color: #8e9197;background: transparent;" disabled placeholder="company name" value="<?php echo $_SESSION["companys_name"]; ?>">

							</div>

							<div class="form-group">
								
								<input type="text" name="tagline" class="form-control" style="border-radius: 20px;height: 56px;padding-left: 20px;" placeholder="Tagline">

							</div>

						</div>

					</div>

					<div style="width: 100% !important;background: white;padding: 24px;border-radius: 20px;">

						<div style="display: flex;flex-direction: column;gap: 16px;">

							<div>

								<div>
									
									<h4 style="font-size: 22px;font-weight: 600;">About</h4>

								</div>

								<div style="display: flex;flex-direction: column;gap: 20px;margin-top: 15px;">
									
									<div class="form-group">
										
										<textarea name="about" required class="form-control" style="border-radius: 20px !important;height: 200px;padding-left: 20px;padding-top: 20px;" placeholder="Enter Text"></textarea>

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
											
											<img src="../images/arrow-right.png">

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

	document.getElementById('profileImageInput').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById('profileImagePreview');
            preview.src = e.target.result;
            preview.style.display = 'block';

            // Update the text in the <p> tag with the filename
            const uploadStatus = document.getElementById('uploadStatus');
            uploadStatus.textContent = `${file.name}`;
        };
        reader.readAsDataURL(file);
    }
});
document.getElementById('fileInput').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const fileIcon = document.getElementById('fileIcon');
    const uploadText = document.getElementById('uploadText');

    if (file) {
        const fileName = file.name;
        const fileExtension = fileName.split('.').pop().toLowerCase();

        // Change the icon based on the file extension
        if (fileExtension === 'docx') {
            fileIcon.src = 'images/docx_icon.webp'; // Path to your .docx icon image
        }
        if (fileExtension === 'pdf') {
        	fileIcon.src = 'images/pdf_icon.png';
        }
        uploadText.textContent = `${fileName}`;
    }
});

	
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