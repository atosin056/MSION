<?php

session_start();

include 'connect.php';

if (!isset($_SESSION["email"])) {
	
	header('location: login.php');

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

            	$updatedb = "UPDATE `users` SET `profile`='".$filename."' WHERE `email`='".$_SESSION["email"]."'";

            	$updatedb_query = mysqli_query($conn, $updatedb);

            	if ($updatedb_query) {
            		
            		$_SESSION["profile-pic"] = $filename;

            		header('location: dashboard.php');

            	}

            }

        }

    }

}

if (isset($_POST["biography_update"])) {
	
	$bio = mysqli_real_escape_string($conn, $_POST["biography"]);

	

	$update = "UPDATE `users` SET `biography`='".$bio."' WHERE `email`='".$_SESSION["email"]."'";

	$update_query = mysqli_query($conn, $update);

	if ($update_query) {
		
		$_SESSION["biography"] = $bio;

		header('location: dashboard.php');

	}

	// else{

	// 	echo $update;

	// }

}

if (isset($_POST["looking_update"])) {
	
	$looking = mysqli_real_escape_string($conn, $_POST["looking"]);

	$update = "UPDATE `users` SET `looking`='".$looking."' WHERE `email`='".$_SESSION["email"]."'";

	$update_query = mysqli_query($conn, $update);

	if ($update_query) {
		
		header('location: logout.php');

	}

	// else{

	// 	echo $update;

	// }

}

if(isset($_POST["experience_update"])){

	$company_name = mysqli_real_escape_string($conn, $_POST["company_name"]);

	$role = mysqli_real_escape_string($conn, $_POST["role"]);

	$start_date = mysqli_real_escape_string($conn, $_POST["start_date"]);

	if (isset($_POST["end_date"])) {
		
		$end_date = mysqli_real_escape_string($conn, $_POST["end_date"]);

	}

	else{

		$end_date = 'Present';

	}

	$location = mysqli_real_escape_string($conn, $_POST["location"]);

	$website = mysqli_real_escape_string($conn, $_POST["website"]);


	$skillsJson = $_POST['skillsArray'] ?? '[]';
	   
	$skills = json_decode($skillsJson, true);


	foreach ($skills as $skill) {

		$ins = "INSERT INTO `user_experience` (`id`, `email`,`company_name`,`company_website`,`location`,`role`,`start_date`,`end_date`) VALUES (NULL, '".$_SESSION["email"]."','".$company_name."','".$website."','".$location."','".$role."','".$start_date."','".$end_date."')";

		$ins_query = mysqli_query($conn, $ins);
		
		if ($ins_query) {
			
			$inse = "INSERT INTO `experience` (`id`,`skills`,`company_name`,`email`) VALUES (NULL, '".$skill."','".$company_name."','".$_SESSION["email"]."')";

			$inse_query = mysqli_query($conn, $inse);
			
			if ($inse_query) {
				
				header('location: dashboard.php');

			}	
		
		}

	}	

}

?>

<html>

<head>

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>MSION - Where talents meet opportunities. | Dashboard</title>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="css/main.css">

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
	        		
	        		<img src="profile/<?php echo $_SESSION["profile-pic"]; ?>" style="border-radius: 100%;width: 250px;height: 250px;" id="preview-img">

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

<!-- Second Biography Modal -->

<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="modal1Title" aria-hidden="true">

	<div class="modal-dialog modal-dialog-centered" role="document">

	    <div class="modal-content">

	      <div class="modal-header">

	        <h5 class="modal-title" id="modal1Title">Biography</h5>

	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

	          <span aria-hidden="true">x</span>

	        </button>

	      </div>

	      <div class="modal-body">

	      	<form method="POST">

		      	<div class="form-group">
											
					<textarea name="biography" required class="form-control" style="border-radius: 20px !important;height: 200px;padding-left: 20px;padding-top: 20px;line-height: 30px !important;" placeholder="Enter Text">
<?php echo $_SESSION["biography"];?>
					</textarea>

				</div>

		      </div>

		      <div class="modal-footer">

		        	<button type="submit" class="get-started" style="color: white;" name="biography_update">Update</button>

		      </div>

	  		</form>
	    
	    </div>
  
  </div>

</div>

<!-- Third Looking Modal -->

<div class="modal fade" id="modal3" tabindex="-1" role="dialog" aria-labelledby="modal1Title" aria-hidden="true">

	<div class="modal-dialog modal-dialog-centered" role="document">

	    <div class="modal-content">

	      <div class="modal-header">

	        <h5 class="modal-title" id="modal1Title">What I'm Looking for</h5>

	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

	          <span aria-hidden="true">x</span>

	        </button>

	      </div>

	      <div class="modal-body">

	      	<form method="POST">

		      	<div class="form-group">
											
					<textarea name="looking" required class="form-control" style="border-radius: 20px !important;height: 200px;padding-left: 20px;padding-top: 20px;line-height: 30px !important;" placeholder="Enter Text">
<?php echo $_SESSION["looking"];?>
					</textarea>

				</div>

		      </div>

		      <div class="modal-footer">

		        	<button type="submit" class="get-started" style="color: white;" name="looking_update">Update</button>

		      </div>

	  		</form>
	    
	    </div>
  
  </div>

</div>

<!-- Fourth Looking Modal -->

<div class="modal fade" id="modal4" tabindex="-1" role="dialog" aria-labelledby="modal1Title" aria-hidden="true">

	<div class="modal-dialog modal-dialog-centered" role="document" style="margin-top: 100px !important;">

	    <div class="modal-content">

	      <div class="modal-header">

	        <h5 class="modal-title" id="modal1Title">Experience</h5>

	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

	          <span aria-hidden="true">x</span>

	        </button>

	      </div>

	      <div class="modal-body">

	      	<form method="POST" style="display: flex;gap: 20px;flex-direction: column;">

		      	<div class="form-group">
												
					<input type="text" name="role" placeholder="Job Title" class="form-control input-field" style="border-radius: 20px !important;height: 56px;padding-left: 20px;line-height: 30px !important;">

				</div>

				<div class="form-group">
												
					<input type="text" name="company_name" placeholder="Company Name" class="form-control input-field" style="border-radius: 20px !important;height: 56px;padding-left: 20px;line-height: 30px !important;">

				</div>

				<div class="form-group">
												
					<input type="text" name="location" placeholder="Company Location: e.g Ilorin" class="form-control input-field" style="border-radius: 20px !important;height: 56px;padding-left: 20px;line-height: 30px !important;">

				</div>

				<div class="form-group">
												
					<input type="text" name="start_date" placeholder="Start Date e.g June 2024" class="form-control input-field" style="border-radius: 20px !important;height: 56px;padding-left: 20px;line-height: 30px !important;">

				</div>

				<div class="form-group">
												
					<input type="text" name="end_date" placeholder="End Date" class="form-control input-field" style="border-radius: 20px !important;height: 56px;padding-left: 20px;line-height: 30px !important;">

				</div>

				<div class="form-group">
												
					<input type="text" name="website" placeholder="Company Website" class="form-control input-field" style="border-radius: 20px !important;height: 56px;padding-left: 20px;line-height: 30px !important;">

				</div>

				<div style="margin-top: 20px;">
									
					<div class="form-group">
										
						<input type="text" name="skills" class="form-control" style="border-radius: 20px;height: 56px;padding-left: 20px;" id="skillInput" placeholder="Enter Skills">

					</div>

					<div id="suggestions"></div>

					<div id="skillsContainer"></div>

						<input type="hidden" required name="skillsArray" id="skillsArray">

					</div>

		      </div>

		      <div class="modal-footer">

		        	<button type="submit" class="get-started" style="color: white;" name="experience_update">Update</button>

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
				
					<div class="row" style="gap: 8px;display: flex;">
						
						<div class="modal-trigger img-wrap" data-target="#modal1" data-toggle="modal" style="cursor: pointer;">
							
							<img src="profile/<?php echo $_SESSION['profile-pic']; ?>" style="width: 100% !important;height: 100% !important;border-radius: inherit;">

						</div>

						<div style="padding-left: 0 !important;width: auto;display: flex;height: 100% !important;background: transparent;flex-direction: column;margin-top: 30px;">
							
							<p style="width: auto;" class="fname"><?php echo $_SESSION["fullname"]; ?></p>

							<p class="title"><?php echo $_SESSION["title"]; ?></p>

						</div>

					</div>

					<div style="display: flex;align-items: center;gap: 8px;">
						
						<?php

						$status = "SELECT * FROM `users` WHERE `email`='".$_SESSION["email"]."' AND `acct_status`='unverified'";

						$status_query = mysqli_query($conn, $status);

						if (mysqli_num_rows($status_query) > 0) {
							
						?>

						<a href="verify_acct.php?id=<?php echo $_SESSION['unique_id']; ?>">

							<div class="verify-button">
								
								<div>
									
									<img src="images/verify.png">

								</div>

								<div>
									
									<font style="font-size: 14px;color: black;">Verify Account</font>

								</div>

							</div>

						</a>

						<?php

						}

						?>

						<a href="settings.php">

							<div class="edit-profile">
								
								<div>
									
									<img src="images/NotePencil.png">

								</div>

							</div>

						</a>

					</div>

				</div>

				<div class="dash-sec" style="flex-direction: column;">
					
					<div style="display: flex;justify-content: space-between;">
						
						<div>
							
							<p class="bio">Biography</p>

						</div>

						<div class="modal-trigger" data-target="#modal2" data-toggle="modal">
							
							<img src="images/edit.png">

						</div>

					</div>

					<div>
						
						<p class="bio-text"><?php echo $_SESSION["biography"]; ?></p>

					</div>

				</div>

				<div class="dash-sec" style="flex-direction: column;">
					
					<div style="display: flex;justify-content: space-between;">
						
						<div>
							
							<p class="bio">What I’m looking for</p>

						</div>

						<div class="modal-trigger" data-target="#modal3" data-toggle="modal">
							
							<img src="images/edit.png">

						</div>

					</div>

					<div>
						
						<p class="bio-text"><?php echo $_SESSION["looking"]; ?></p>

					</div>

				</div>

				<div class="dash-sec" style="flex-direction: column;gap: 20px;">
					
					<div style="background: transparent;display: flex;justify-content: space-between;width: 100% !important;">

						<div style="width: auto;">
							
							<font class="bio">Experience</font>

						</div>

						<div class="modal-trigger" data-target="#modal4" data-toggle="modal">
							
							<img src="images/edit.png">

						</div>

					</div>

					<div style="display: flex;flex-direction: column;gap: 20px;">

						<?php

						$exp_select = "SELECT DISTINCT `company_name`, `role`, `location`, `start_date`, `end_date`, `company_website` FROM `user_experience` WHERE `email`='" . $_SESSION["email"] . "'";

						$exp_select_query = mysqli_query($conn, $exp_select);


						if (mysqli_num_rows($exp_select_query) > 0) {
							
							while ($r = mysqli_fetch_assoc($exp_select_query)){

								$role = $r["role"];

								$location = $r["location"];

								$start_date = $r["start_date"];

								$end_date = $r["end_date"];

								$website = $r["company_website"];

								$company_name = $r["company_name"];

							

						?>
						
						<div class="experience-box">
							
							<div>
								
								<p class="exp-as"><?php echo $role; ?> | <?php echo $company_name; ?></p>

								<p class="exp-loc"><?php echo $location; ?> | <?php echo $start_date ?> - <?php echo $end_date ?></p>

								<p class="exp-loc"><?php echo $website; ?></p>

							</div>

							<div>
								
								<div style="display: flex;gap: 8px;">

									<?php

									$sel = "SELECT * FROM `experience` WHERE `company_name`='".$company_name."'";

									$sel_query = mysqli_query($conn, $sel);

									if (mysqli_num_rows($sel_query) > 0) {
										
										while ($ow = mysqli_fetch_assoc($sel_query)){

											$skill = $ow["skills"];

									?>
									
									<div class="exp-role">
										
										<div style="display: flex;align-items: center;">
											
											<img src="images/point.png">

										</div>

										<div>
											
											<font class="ui"><?php echo $skill; ?></font>

										</div>

									</div>

									<?php

									}}

									?>

									
								</div>

							</div>

						</div>

						<?php

						}}

						?>

						

						<!-- End -->

					</div>

				</div>

			</div>

			<div class="col-lg-4 col-sm-4 col-md-4" style="background: #FAFAFA;padding: 24px;border-radius: 24px;display: flex;flex-direction: column;gap: 24px;height: auto;padding-bottom: 34px;height: 70% !important;flex: 1 1 100;">
				
				<div style="display: flex;flex-direction: column;gap: 30px;">
					
					<div class="dash-sec" style="flex-direction: column;gap: 20px;">
						
						<div style="background: transparent;display: flex;justify-content: space-between;width: 100% !important;">

							<div style="width: auto;">
								
								<font class="bio">Resume</font>

							</div>

							<div style="width: 24px;height: 24px;">
								
								<img src="images/edit.png">

							</div>

						</div>

						<div>
							
							<div class="resume">

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

								<a href="#">

									<div style="background: transparent;">
										
										<img src="images/bin.png">

									</div>

								</a>

							</div>

						</div>

						<div>
							
							<a href="#">
								
								<div class="extract-cv">
									
									Extract CV from Profile

								</div>

							</a>

						</div>

					</div>

					<div class="dash-sec">
						
						<div style="width: 100% !important">
							
							<div style="width: 100% !important;display: flex;flex-direction: column;gap: 15px;">

								<div style="background: transparent;display: flex;justify-content: space-between;width: 100% !important;">

									<div style="width: auto;">
										
										<font class="bio">Skills</font>

									</div>

									<div style="width: 24px;height: 24px;">
										
										<img src="images/edit.png">

									</div>

								</div>

								<div>

									<div style="display: flex;gap: 10px;padding-left: 10px;" class="row">
									
									<?php

									$skill_select = "SELECT * FROM `skills` WHERE `email`='".$_SESSION["email"]."'";

									$skill_select_query = mysqli_query($conn, $skill_select);

									if (mysqli_num_rows($skill_select_query) > 0) {
										
										while ($row = mysqli_fetch_assoc($skill_select_query)){

											$skill = $row["skill"];

									?>

										<div class="skill">
											
											<font><?php echo $skill; ?></font>

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
										
										<img src="images/edit.png">

									</div>

								</div>

								<div>
									
									<div class="row" style="gap: 10px;">

										<?php

										$stack_select = "SELECT * FROM `stack` WHERE `email`='".$_SESSION["email"]."' ORDER BY `id` DESC";

										$stack_select_query = mysqli_query($conn, $stack_select);

										if (mysqli_num_rows($stack_select_query) > 0) {
											
											while ($rowss = mysqli_fetch_assoc($stack_select_query)) {
												
											$stack = $rowss["stack"];

											$logo_select = "SELECT * FROM `logos` WHERE `stack_name` LIKE '%".$stack."%'";

											$logo_select_query = mysqli_query($conn, $logo_select);

											if (mysqli_num_rows($logo_select_query) > 0) {
												
												while ($rows = mysqli_fetch_assoc($logo_select_query)) {
													
													$stack_logo = $rows["stack_picture"];


										?>
										
										<div style="width: 40px;background: transparent;height: 40px;" title="<?php echo $stack; ?>">
											
											<img src="logos/<?php echo $stack_logo ?>" style="width: 40px !important;height: 40px !important;">

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
										
										<img src="images/edit.png">

									</div>

								</div>

								<div>
									
									<div class="row" style="gap: 10px;">

										<?php

										$social_select = "SELECT * FROM `socials` WHERE `email`='".$_SESSION["email"]."'";

										$social_select_query = mysqli_query($conn, $social_select);

										if (mysqli_num_rows($social_select_query) > 0) {
											
											while ($ro = mysqli_fetch_assoc($social_select_query)){

												if (!is_null($ro['linkedin'])) {

											

										?>


										<div style="width: 40px;background: transparent;height: 40px;">
											
											<img src="images/linkedIn.png" style="width: 40px !important;height: 40px !important;">

										</div>

											<?php

											}

											if (!is_null($ro['facebook'])) {

											?>

											<div style="width: 40px;background: transparent;height: 40px;">
											
												<img src="images/facebook.png" style="width: 40px !important;height: 40px !important;">

											</div>

											<?php

											}

											if (!is_null($ro['youtube'])) {

											?>

											<div style="width: 40px;background: transparent;height: 40px;">
											
												<img src="images/youtube.png" style="width: 40px !important;height: 40px !important;">

											</div>

											<?php

											}

											if (!is_null($ro['x'])) {

											?>

											<div style="width: 40px;background: transparent;height: 40px;">
											
												<img src="images/ex.png" style="width: 40px !important;height: 40px !important;">

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

include 'footer.php';

?>

</body>

<script>

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


	document.addEventListener('DOMContentLoaded', function() {
    
    var currentPage = '<?php echo basename($_SERVER["PHP_SELF"], ".php"); ?>';
    
    var links = document.querySelectorAll('.navField');

    links.forEach(link => {
    
        if (link.getAttribute('data-page') === currentPage) {
    
            link.classList.add('link-active');
    
        }
    
    });
    
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

</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Popper.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="js/main.js"></script>

<script type="text/javascript">
	
	
	// JavaScript to trigger the file input when the button is clicked
    
    $('#upload-file').on('click', function() {
       
        $('#profile-file').click();
    
    });

    // // Function to trigger file input click
    // document.getElementById('preview-img').addEventListener('click', function() {
    //     document.getElementById('profile-input').click();
    // });

    // Function to preview the selected image
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

     let skillsList = [
    // Business Skills
    "Project Management", "Strategic Planning", "Business Analysis",
    "Marketing Strategy", "Salesforce", "Customer Relationship Management",
    "Agile Methodology", "Business Development", "Leadership", "Negotiation",
    "Team Management", "Brand Management", "Market Research",
    "Business Intelligence", "Supply Chain Management",
    
    // Finance Skills
    "Financial Analysis", "Investment Banking", "Risk Management",
    "Financial Modeling", "Corporate Finance", "Wealth Management",
    "Accounting", "Auditing", "Taxation", "Portfolio Management",
    "Quantitative Analysis", "Economics", "Derivatives", "Asset Management",
    
    // Other Skills
    "Communication", "Public Speaking", "Time Management", "Critical Thinking",
    "Problem Solving", "Adaptability", "Creativity", "Writing",
    "Research", "Emotional Intelligence", "Language Proficiency",
    "Graphic Design", "Photography", "Video Editing", "Music Production",
    "Cooking", "Gardening", "Sports Coaching", "Teaching"
];
 const selectedSkills = [];
    const skillInput = document.getElementById('skillInput');
    const suggestions = document.getElementById('suggestions');
    const skillsContainer = document.getElementById('skillsContainer');
    const skillsArrayInput = document.getElementById('skillsArray');

    skillInput.addEventListener('input', function() {
        const query = this.value.toLowerCase();
        suggestions.innerHTML = '';
        if (query) {
            const filteredSkills = skillsList.filter(skill => skill.toLowerCase().startsWith(query));
            if (filteredSkills.length > 0) {
                filteredSkills.forEach(skill => {
                    const suggestionItem = document.createElement('div');
                    suggestionItem.textContent = skill;
                    suggestionItem.className = 'suggestion-item';
                    suggestionItem.addEventListener('click', () => addSkill(skill));
                    suggestions.appendChild(suggestionItem);
                });
            }
            const addNewSkillItem = document.createElement('div');
            addNewSkillItem.textContent = `Add "${this.value}"`;
            addNewSkillItem.className = 'suggestion-item';
            addNewSkillItem.addEventListener('click', () => addNewSkill(this.value));
            suggestions.appendChild(addNewSkillItem);
            suggestions.style.display = 'block';
            skillInput.style.borderBottomLeftRadius = '0';
        	skillInput.style.borderBottomRightRadius = '0';
        	skillInput.style.borderBottom = 'none';
        } else {
            suggestions.style.display = 'none';

        }
    });

    function addSkill(skill) {
        if (!selectedSkills.includes(skill) && selectedSkills.length < 15) {
            selectedSkills.push(skill);
            const skillItem = document.createElement('div');
            skillItem.className = 'skill-item';
            skillItem.textContent = skill;
            skillsContainer.appendChild(skillItem);
            skillInput.value = '';
            suggestions.style.display = 'none';
            skillsArrayInput.value = JSON.stringify(selectedSkills);
            skillInput.style.borderBottomLeftRadius = '20px';
       		skillInput.style.borderBottomRightRadius = '20px';
       		skillInput.style.borderBottom = '1px solid #CCCBCB';
        }
    }

    function addNewSkill(newSkill) {
        if (!selectedSkills.includes(newSkill) && selectedSkills.length < 15) {
            skillsList.push(newSkill);
            addSkill(newSkill);
        }
    }

   document.addEventListener('click', function(event) {
    if (!suggestions.contains(event.target) && event.target !== skillInput) {
        suggestions.style.display = 'none';
        // Restore border bottom radius
        skillInput.style.borderBottomLeftRadius = '20px';
        skillInput.style.borderBottomRightRadius = '20px';
        skillInput.style.borderBottom = '1px solid #CCCBCB';
    }
});
</script>

</html>