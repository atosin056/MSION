<?php

session_start();

include '../connect.php';

include '../functions.php';

if (isset($_GET["query"])) {
	
	$select = "SELECT * FROM `company_users` WHERE `unique_id`='".$_GET['query']."'";

	$select_query = mysqli_query($conn, $select);

	if (mysqli_num_rows($select_query) > 0) {
		
		while ($row = mysqli_fetch_assoc($select_query)){

			$email = $row["email"];

			$company_name = $row["company_name"];

			$company_website = $row["company_website"];

			$company_logo = $row["company_logo"];

			$tagline = $row["tagline"];

			$about = $row["about"];

			$location = $row["location"];

			$founding_year = $row["founding_year"];

			$company_size = $row["company_size"];


			//Store in sessions

			$_SESSION["email"] = $email;

			$_SESSION["company_name"] = $company_name;

			$_SESSION["company_logo"] = $company_logo;

			$_SESSION["tagline"] = $tagline;

			$_SESSION["about"] = $about;

			$_SESSION["location"] = $location;

			$_SESSION["founding_year"] = $founding_year;

			$_SESSION["company_size"] = $company_size;

			$_SESSION["website"] = $company_website;


		}

		header('location: dashboard.php');	

	}

}



if (isset($_POST["upload"])) {
       
    if (isset($_FILES["profile"]) && $_FILES["profile"]["error"] <= 0) {
        
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png", "PNG" => "image/PNG", "gif" => "image/gif");

        $filename = $_FILES["profile"]["name"];
    
        $filetype = $_FILES["profile"]["type"];
    
        $filesize = $_FILES["profile"]["size"];
    
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

    
        if (!array_key_exists($ext, $allowed)) {
    
            die("Please select a valid file format");
    
        }
        
        $maxsize = 5000000000000 * 1024 * 1024;

        if ($filesize > $maxsize) {
    
            die("Error: Filesize too Massive");
    
        }

        if (in_array($filetype, $allowed)) {
    
            $move = move_uploaded_file($_FILES["profile"]["tmp_name"], "profile/". $filename);

            if ($move) {

            	$updatedb = "UPDATE `company_users` SET `company_logo`='".$filename."' WHERE `email`='".$_SESSION["email"]."'";

            	$updatedb_query = mysqli_query($conn, $updatedb);

            	if ($updatedb_query) {
            		
            		$_SESSION["company_logo"] = $filename;

            		header('location: dashboard.php');

            	}

            }

        }

    }

}

if (isset($_POST["about_update"])) {
	
	$about = str_replace(array("\r\n", "\n", "\r"), '<br>', $_POST["about"]);

	

	$update = "UPDATE `company_users` SET `about`='".mysqli_real_escape_string($conn, $about)."' WHERE `email`='".$_SESSION["email"]."'";

	$update_query = mysqli_query($conn, $update);

	if ($update_query) {
		
		$_SESSION["about"] = $about;

		header('location: dashboard.php');

	}

	// else{

	// 	echo $update;

	// }

}

// Replace <br> with newline characters (\n)

$aboutForTextarea = str_replace(array('<br>', '<br />'), "\n", $_SESSION["about"]);

// Escape special HTML characters for textarea

$aboutForTextarea = htmlspecialchars($aboutForTextarea, ENT_QUOTES, 'UTF-8');


?>

<html>

<head>

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>MSION - Where talents meet opportunities. | Dashboard</title>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="../css/main.css">

</head>

<body>

<!-- First Modal -->

<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modal1Title" aria-hidden="true">

	<div class="modal-dialog modal-dialog-centered" role="document">

	    <div class="modal-content">

	      <div class="modal-header">

	        <h5 class="modal-title" id="modal1Title">Profile Image</h5>

	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

	          <span aria-hidden="true">x</span>

	        </button>

	      </div>

	      <div class="modal-body">

	        <div style="display: flex;width: 100% !important;justify-content: center;">
	        	
	        	<div id="preview-container">
	        		
	        		<img src="profile/<?php echo $_SESSION["company_logo"]; ?>" style="border-radius: 100%;width: 250px;height: 250px;" id="preview-img">

	        	</div>

	        </div>

	      </div>

	      <div class="modal-footer">

	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

	        <form method="POST" enctype="multipart/form-data" id="profile-form">

	        	<input type="file" name="profile" id="profile-file" style="display: none;">

	        	<button type="button" class="btn btn-primary" id="upload-file">Change Profile Photo</button>

	    	</form>

	      </div>
	    
	    </div>
  
  </div>

</div>

<!-- Second one -->

<!-- Second Biography Modal -->

<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="modal1Title" aria-hidden="true">

	<div class="modal-dialog modal-dialog-centered" role="document">

	    <div class="modal-content">

	      <div class="modal-header">

	        <h5 class="modal-title" id="modal1Title">About</h5>

	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

	          <span aria-hidden="true">x</span>

	        </button>

	      </div>

	      <div class="modal-body">

	      	<form method="POST">

		      	<div class="form-group">
											
					<textarea name="about" required class="form-control" style="border-radius: 20px !important;height: 200px;padding-left: 20px;padding-top: 20px;line-height: 30px !important;" placeholder="Enter Text">
<?php echo $aboutForTextarea;?>
					</textarea>

				</div>

		      </div>

		      <div class="modal-footer">

		        	<button type="submit" class="get-started" style="color: white;" name="about_update">Update</button>

		      </div>

	  		</form>
	    
	    </div>
  
  </div>

</div>

<?php

include 'navbar.php';

?>

<div class="sections" style="background: white;padding-left: 100px;padding-right: 100px;">
	
	<div style="margin-top: 60px;">
		
		<div style="width: 100% !important;gap: 21px;background: transparent;justify-content: space-between;display: flex;padding-right: 30px;height: auto;">
				
			<div class="col-lg-8 col-md-8 col-sm-8" style="background: #FAFAFA;padding: 24px;border-radius: 24px;display: flex;flex-direction: column;gap: 24px;flex: 1 1 100;">
				
				<div class="dash-sec">
				
					<div class="row" style="gap: 8px;display: flex;background: transparent;">
						
						<div class="modal-trigger img-wrap" data-target="#modal1" data-toggle="modal" style="cursor: pointer;">
							
							<img src="profile/<?php echo $_SESSION['company_logo']; ?>" style="width: 100% !important;height: 100% !important;border-radius: inherit;">

						</div>

						<div style="padding-left: 0 !important;width: auto;display: flex;height: 100% !important;background: transparent;flex-direction: column;margin-top: 30px;">
							
							<div style="display: flex;gap: 8px;background: transparent;height: 35px;">

								<p style="width: auto;" class="fname"><?php echo $_SESSION["company_name"]; ?></p>

								<img src="../images/blue.png" style="width: 24px;height: 24px;">

							</div>

							<p class="titles"><?php echo $_SESSION["tagline"]; ?></p>

						</div>

					</div>

					<div style="display: flex;align-items: center;gap: 8px;">
					
						<a href="postjob.php?em=<?php echo $_SESSION["email"]; ?>">
							
							<div class="post-a-job">
								
								Post Job

							</div>

						</a>

					</div>

				</div>

				<div class="dash-sec" style="flex-direction: column;">
					
					<div style="display: flex;justify-content: space-between;">
						
						<div>
							
							<p class="bio">About</p>

						</div>

						<div class="modal-trigger" data-target="#modal2" data-toggle="modal">
							
							<img src="../images/edit.png">

						</div>

					</div>

					<div>
						
						<p class="bio-text"><?php echo $_SESSION["about"]; ?></p>

					</div>

				</div>

				<div class="dash-sec" style="flex-direction: column;">
					
					<div style="display: flex;justify-content: space-between;">
						
						<div>
							
							<p class="bio">Founding Year</p>

						</div>

						<div class="modal-trigger" data-target="#modal2" data-toggle="modal">
							
							<img src="../images/edit.png">

						</div>

					</div>

					<div class="year">
						
						<font><?php echo $_SESSION['founding_year']; ?></font>

					</div>

				</div>

				<div class="dash-sec" style="flex-direction: column;">
					
					<div style="display: flex;justify-content: space-between;">
						
						<div>
							
							<p class="bio">Size of Company</p>

						</div>

						<div class="modal-trigger" data-target="#modal2" data-toggle="modal">
							
							<img src="../images/edit.png">

						</div>

					</div>

					<div class="year">
						
						<font><?php echo $_SESSION['company_size']; ?></font>

					</div>

				</div>

			</div>

			<div class="col-lg-4 col-sm-4 col-md-4" style="background: #FAFAFA;padding: 24px;border-radius: 24px;display: flex;flex-direction: column;gap: 24px;height: auto;padding-bottom: 34px;height: 70% !important;flex: 1 1 100;">
				
				<div style="display: flex;flex-direction: column;gap: 30px;">
					
					<div class="dash-sec">
						
						<div style="width: 100% !important">
							
							<div style="width: 100% !important;display: flex;flex-direction: column;gap: 15px;">

								<div style="background: transparent;display: flex;justify-content: space-between;width: 100% !important;">

									<div style="width: auto;">
										
										<font class="bio">Industry</font>

									</div>

									<div style="width: 24px;height: 24px;">
										
										<img src="../images/edit.png">

									</div>

								</div>

								<div>

									<div style="display: flex;gap: 10px;padding-left: 10px;" class="row">
									
									<?php

									$industry_select = "SELECT * FROM `company_industry` WHERE `email`='".$_SESSION["email"]."'";

									$industry_select_query = mysqli_query($conn, $industry_select);

									if (mysqli_num_rows($industry_select_query) > 0) {
										
										while ($roww = mysqli_fetch_assoc($industry_select_query)){

											$industry = $roww["company_industry"];

									?>

										<div class="skill">
											
											<font><?php echo $industry; ?></font>

										</div>

										<?php

											}

										}

										?>

									</div>

								</div>

							</div>

						</div>

					</div>

					<div class="dash-sec">
						
						<div style="width: 100% !important">
							
							<div style="width: 100% !important;display: flex;flex-direction: column;gap: 15px;">

								<div style="background: transparent;display: flex;justify-content: space-between;width: 100% !important;">

									<div style="width: auto;">
										
										<font class="bio">Services</font>

									</div>

									<div style="width: 24px;height: 24px;">
										
										<img src="../images/edit.png">

									</div>

								</div>

								<div>

									<div style="display: flex;gap: 10px;padding-left: 10px;" class="row">
									
									<?php

									$services_select = "SELECT * FROM `company_services` WHERE `email`='".$_SESSION["email"]."'";

									$services_select_query = mysqli_query($conn, $services_select);

									if (mysqli_num_rows($services_select_query) > 0) {
										
										while ($roww = mysqli_fetch_assoc($services_select_query)){

											$services = $roww["company_service"];

									?>

										<div class="skill">
											
											<font><?php echo $services; ?></font>

										</div>

										<?php

											}

										}

										?>

									</div>

								</div>

							</div>

						</div>

					</div>

					<div class="dash-sec">
							
						<div style="width: 100%;">
							
							<div style="width: 100%;display: flex;flex-direction: column;gap: 10px;">
								
								<div style="background: transparent;display: flex;justify-content: space-between;width: 100% !important;">

									<div style="width: auto;">
										
										<font class="bio">Stack</font>

									</div>

									<div style="width: 24px;height: 24px;">
										
										<img src="../images/edit.png">

									</div>

								</div>

								<div>
									
									<div class="row" style="gap: 10px;">

										<?php

										$stack_select = "SELECT * FROM `company_stack` WHERE `email`='".$_SESSION["email"]."' ORDER BY `id` DESC";

										$stack_select_query = mysqli_query($conn, $stack_select);

										if (mysqli_num_rows($stack_select_query) > 0) {
											
											while ($rowwss = mysqli_fetch_assoc($stack_select_query)) {
												
											$stack = $rowwss["company_stack"];

											$logo_select = "SELECT * FROM `logos` WHERE `stack_name` LIKE '%".$stack."%'";

											$logo_select_query = mysqli_query($conn, $logo_select);

											if (mysqli_num_rows($logo_select_query) > 0) {
												
												while ($rowws = mysqli_fetch_assoc($logo_select_query)) {
													
													$stack_logo = $rowws["stack_picture"];


										?>
										
										<div style="width: 40px;background: transparent;height: 40px;" title="<?php echo $stack; ?>">
											
											<img src="../logos/<?php echo $stack_logo ?>" style="width: 40px !important;height: 40px !important;">

										</div>

										<?php

										}}

										else{



										?>

										<div class="skill">
											
											<font><?php echo $stack; ?></font>

										</div>

										<?php

										}}}

										?>

									</div>

								</div>

							</div>

						</div>

					</div>

					<div class="dash-sec">
							
						<div style="width: 100%;">
							
							<div style="width: 100%;display: flex;flex-direction: column;gap: 10px;">
								
								<div style="background: transparent;display: flex;justify-content: space-between;width: 100% !important;">

									<div style="width: auto;">
										
										<font class="bio">Social Handles</font>

									</div>

									<div style="width: 24px;height: 24px;">
										
										<img src="../images/edit.png">

									</div>

								</div>

								<div>
									
									<div class="row" style="gap: 10px;">

										<?php

										$social_select = "SELECT * FROM `company_socials` WHERE `email`='".$_SESSION["email"]."'";

										$social_select_query = mysqli_query($conn, $social_select);

										if (mysqli_num_rows($social_select_query) > 0) {
											
											while ($row = mysqli_fetch_assoc($social_select_query)){

												if (!is_null($row['linkedin'])) {

											

										?>


										<div style="width: 40px;background: transparent;height: 40px;">
											
											<img src="../images/linkedIn.png" style="width: 40px !important;height: 40px !important;">

										</div>

											<?php

											}

											if (!is_null($row['facebook'])) {

											?>

											<div style="width: 40px;background: transparent;height: 40px;">
											
												<img src="../images/facebook.png" style="width: 40px !important;height: 40px !important;">

											</div>

											<?php

											}

											if (!is_null($row['youtube'])) {

											?>

											<div style="width: 40px;background: transparent;height: 40px;">
											
												<img src="../images/youtube.png" style="width: 40px !important;height: 40px !important;">

											</div>

											<?php

											}

											if (!is_null($row['x'])) {

											?>

											<div style="width: 40px;background: transparent;height: 40px;">
											
												<img src="../images/ex.png" style="width: 40px !important;height: 40px !important;">

											</div>

											<?php

											}}}

											?>

									</div>

								</div>

							</div>

						</div>

					</div>

				</div>

			</div>

		</div>

	</div>

</div>

<?php 

include '../footer.php';

?>

</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Popper.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="js/main.js"></script>

<script type="text/javascript">

	$('#upload-file').on('click', function() {
       
        $('#profile-file').click();
    
    });

	
document.getElementById('profile-file').addEventListener('change', function(event) {
        var file = event.target.files[0];
        if (file) {
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById('preview-img').src = e.target.result;
            };

            reader.readAsDataURL(file);
        }
    });

document.addEventListener('DOMContentLoaded', (event) => {
    
    const uploadFileButton = document.getElementById('upload-file');
    
    const profileFileInput = document.getElementById('profile-file');
    
    const submitButton = document.createElement('button');

    // Hide the file input initially
    profileFileInput.style.display = 'none';

    // Create and style the submit button

    submitButton.type = 'submit';

    submitButton.name = 'upload';
    
    submitButton.className = 'btn btn-primary';
    
    submitButton.textContent = 'Upload';
    
    submitButton.style.display = 'none';  // Initially hidden


    // Add the submit button to the form

    const form = document.getElementById('profile-form');

    form.appendChild(submitButton);

    // // Show file input when "Change Profile Photo" button is clicked
    // uploadFileButton.addEventListener('click', () => {
    //     profileFileInput.click();
    // });

    // Show submit button when a file is selected
    profileFileInput.addEventListener('change', () => {
        
        if (profileFileInput.files.length > 0) {
        
            submitButton.style.display = 'inline-block';
        
            uploadFileButton.style.display = 'none';
        
        }

        else {
        
            submitButton.style.display = 'none';
        
            uploadFileButton.style.display = 'inline-block';
        
        }
    
    });

});

</script>

</html>