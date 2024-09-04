<?php

session_start();

include 'connect.php';

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

<div class="sections" style="background: white;padding-top: 164px;">
	
	<div>
		
		<div>
			
			<div>

				<?php

				$jb_count = "SELECT COUNT(*) AS totalss FROM `applicants` WHERE `email`='".$_SESSION["email"]."'";

				$job_count_query = mysqli_query($conn, $jb_count);

				if (mysqli_num_rows($job_count_query) > 0) {
					
					while ($row = mysqli_fetch_assoc($job_count_query)){

						$job_count = $row["totalss"];

					}

				}

				?>
				
				<p class="search-results">Jobs Applied for <font class="results-found">(<?php echo $job_count; ?>)</font></p>

			</div>

			<div>
				
				<div style="background: transparent;gap: 16px;width: auto !important;flex-wrap: wrap;" class="row">
			
					<?php
					
						$jb_select = "SELECT * FROM `applicants` WHERE `email`='".$_SESSION["email"]."'";

						$jb_select_query = mysqli_query($conn, $jb_select);

						if (mysqli_num_rows($jb_select_query) > 0) {
							
							while ($row = mysqli_fetch_assoc($jb_select_query)) {

								$company_name = $row["company_name"];

								$application_status = $row["application_status"];

							}

							$new = "SELECT * FROM `job` WHERE `company_name`='".$company_name."'";

							$new_query = mysqli_query($conn, $new);

							if (mysqli_num_rows($new_query) > 0) {
								
								while ($row = mysqli_fetch_assoc($new_query)){

									$cm_logo = $row["company_logo"];

									$cm_name = $row["company_name"];

									$cm_location = $row["company_location"];

									$jobtitle = $row["jobtitle"];

									$jobdesc = $row["jobdescription"];

									$jobtype = $row["jobtype"];

									$location = $row["location"];

									$salary = $row["salary"];

									$currency = $row["currency"];


					?>

					<div class="col-lg-4 col-md-4 col-sm-4 job-story-box">
						
						<div style="border-bottom: 1px solid var(--Neutrals-Neutrals200, #CCCBCB);;padding-bottom: 20px;">
							
							<div style="display: flex;gap: 10px;">
								
								<div class="company-logo">
									
									<img src="company/profile/<?php echo $cm_logo; ?>" style="width: 100% !important;height: 100% !important;border-radius: inherit;">

								</div>

								<div>
									
									<div style="display: flex;flex-direction: column;height: 100% !important;background: transparent;">
										
										<div style="display: flex;align-items: center;height: auto;">

											<div style="height: auto;background: transparent;height: 80%;">

												<h4 class="name"><?php echo $cm_name; ?></h4>

												<p class="location"><?php echo $cm_location; ?></p>

											</div>

										</div>

									</div>

								</div>

								<div style="flex-grow: 1;display: flex;justify-content: flex-end;">
									
									<div style="flex-direction: column;gap: 5px;display: flex;background: transparent;justify-content: flex-end;align-items: flex-end;">
											
										<?php
										
										if ($application_status == "nothing") {
										
										?>	

										<div class="active not-yet" style="display: inline-flex;">
											
											<div>
												
												<img src="images/not-yet.png">

											</div>

											<div>
												
												<font class="active-text">Not viewed Yet</font>

											</div>

										</div>

										<?php

										}

										elseif ($application_status == "rejected"){

										?>

										<div class="closed" style="display: inline-flex;">
											
											<div>
												
												<img src="images/closed.png">

											</div>

											<div>
												
												<font class="active-text">Declined</font>

											</div>

										</div>

										<?php

										}

										else{


										?>

										<div class="active" style="display: inline-flex;">
											
											<div>
												
												<img src="images/active.png">

											</div>

											<div>
												
												<font class="active-text"><?php echo $application_status; ?></font>

											</div>

										</div>

										<?php

										}

										?>

										<div style="background: transparent;display: flex;justify-content: flex-end;">
											
											<div>

												<img src="images/verified-tick.png" style="width: 16px;height: 16px;">&nbsp;<font class="time" style="font-size: 14px;">Verified Company</font>

											</div>

										</div>

									</div>

								</div>

							</div>

						</div>

						<div>
							
							<div style="display: flex;gap: 8px;flex-direction: column;">
								
								<div>
									
									<font class="post"><?php echo $jobtitle; ?></font>

								</div>

								<div>
									
									<p class="job-post"><?php echo $jobdesc; ?></p>

								</div>

								<div>
									
									<div class="row" style="padding-left: 16px;gap: 8px;">
										
										<div class="resources">
											
											<div style="width: 16px;height: 16px;">
												
												<img src="images/Bag.png" style="width: 16px;height: 16px;">

											</div>

											<div>
												
												<font class="full-time"><?php echo $jobtype; ?></font>

											</div>

										</div>

										<div class="resources">
											
											<div style="width: 16px;height: 16px;">
												
												<img src="images/Location.png" style="width: 16px;height: 16px;">

											</div>

											<div>
												
												<font class="full-time"><?php echo $location; ?></font>

											</div>

										</div>

										<div class="resources">
											
											<div style="width: 16px;height: 16px;">
												
												<img src="images/Money.png" style="width: 16px;height: 16px;">

											</div>

											<div>
												
												<font class="full-time money"><?php echo $salary ?> <?php echo $currency ?></font>

											</div>

										</div>

									</div>

								</div>

							</div>

						</div>

					</div>

					<!-- End -->

					<?php

					}

					}
					
					}

					?>

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