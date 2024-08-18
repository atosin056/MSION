<?php

session_start();

include 'connect.php';

if (!isset($_SESSION["email"])) {
	
	header('location: login.php');

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

<?php

include 'navbar.php';

?>

<div class="sections" style="background: white;padding-left: 100px;padding-right: 100px;">
	
	<div style="margin-top: 60px;">
		
		<div style="width: 100% !important;gap: 21px;background: transparent;justify-content: space-between;display: flex;padding-right: 30px;height: auto;">
				
			<div class="col-lg-8 col-md-8 col-sm-8" style="background: #FAFAFA;padding: 24px;border-radius: 24px;display: flex;flex-direction: column;gap: 24px;flex: 1 1 100;">
				
				<div class="dash-sec">
				
					<div class="row" style="gap: 8px;display: flex;">
						
						<div class="img-wrap">
							
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

						<a href="#">

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

						<a href="#">

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

						<div>
							
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

						<div>
							
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

						<div style="width: 24px;height: 24px;">
							
							<img src="images/edit.png">

						</div>

					</div>

					<div style="display: flex;flex-direction: column;gap: 20px;">
						
						<div class="experience-box">
							
							<div>
								
								<p class="exp-as">UI/ UX designer | McGeorgeConsulting LTD</p>

								<p class="exp-loc">Ilorin | June 2024 - Present</p>

								<p class="exp-loc">https://www.website.com</p>

							</div>

							<div>
								
								<div style="display: flex;gap: 8px;">
									
									<div class="exp-role">
										
										<div style="display: flex;align-items: center;">
											
											<img src="images/point.png">

										</div>

										<div>
											
											<font class="ui">UI/UX Design</font>

										</div>

									</div>

									<!-- End -->

									<div class="exp-role">
										
										<div style="display: flex;align-items: center;">
											
											<img src="images/point.png">

										</div>

										<div>
											
											<font class="ui">Interaction Design</font>

										</div>

									</div>

									<!-- End -->
									
									<div class="exp-role">
										
										<div style="display: flex;align-items: center;">
											
											<img src="images/point.png">

										</div>

										<div>
											
											<font class="ui">Product Design</font>

										</div>

									</div>

									<!-- End -->
									
									<div class="exp-role">
										
										<div style="display: flex;align-items: center;">
											
											<img src="images/point.png">

										</div>

										<div>
											
											<font class="ui">Creative Design</font>

										</div>

									</div>

									<!-- End -->
									
								</div>

							</div>

						</div>

						<!-- End -->

						<div class="experience-box">
						
							<div>
								
								<p class="exp-as">UI/ UX designer | McGeorgeConsulting LTD</p>

								<p class="exp-loc">Ilorin | June 2024 - Present</p>

								<p class="exp-loc">https://www.website.com</p>

							</div>

							<div>
								
								<div style="display: flex;gap: 8px;">
									
									<div class="exp-role">
										
										<div style="display: flex;align-items: center;">
											
											<img src="images/point.png">

										</div>

										<div>
											
											<font class="ui">UI/UX Design</font>

										</div>

									</div>

									<!-- End -->

									<div class="exp-role">
										
										<div style="display: flex;align-items: center;">
											
											<img src="images/point.png">

										</div>

										<div>
											
											<font class="ui">Interaction Design</font>

										</div>

									</div>

									<!-- End -->
									
									<div class="exp-role">
										
										<div style="display: flex;align-items: center;">
											
											<img src="images/point.png">

										</div>

										<div>
											
											<font class="ui">Product Design</font>

										</div>

									</div>

									<!-- End -->
									
									<div class="exp-role">
										
										<div style="display: flex;align-items: center;">
											
											<img src="images/point.png">

										</div>

										<div>
											
											<font class="ui">Creative Design</font>

										</div>

									</div>

								</div>
									
							</div>

						</div>

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

<script src="bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="js/main.js"></script>

</html>