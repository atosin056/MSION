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
				
				<p class="search-results">Saved Jobs <font class="results-found">(<?php echo $_SESSION["jobs"]; ?>)</font></p>

			</div>

			<div>
				
				<div style="background: transparent;gap: 16px;width: auto !important;flex-wrap: wrap;" class="row">
			
					<?php
					
					$se = "SELECT * FROM `saved_jobs` WHERE `email`='".$_SESSION["email"]."'";

					$se_query = mysqli_query($conn, $se);

					if (mysqli_num_rows($se_query) > 0) {

						// Create an array to store the ids

						$jobids = [];
						
						while ($row = mysqli_fetch_assoc($se_query)){

							 $jobids[] = "'" . mysqli_real_escape_string($conn, $row["unique_id"]) . "'";

						}

						if (!empty($jobids)) {
					       
					        // Convert array of job IDs to a comma-separated string
					       
					        $jobIdsString = implode(',', $jobids);

					        $sele = "SELECT * FROM `job` WHERE `unique_id` IN ($jobIdsString)";

					        $sele_query = mysqli_query($conn, $sele);

					        if (mysqli_num_rows($sele_query) > 0) {
					        	
					        	while ($roe = mysqli_fetch_assoc($sele_query)){

									$company_logo = $roe["company_logo"];

									$company_name = $roe["company_name"];

									$company_location = $roe["company_location"];

									$status = $roe["status"];

									$jobtitle = $roe["jobtitle"];

									$jobdesc = $roe["jobdescription"];

									$jobtype = $roe["jobtype"];

									$location = $roe["location"];

									$salary = $roe["salary"];

									$currency = $roe["currency"];

									$timecreated = $roe["timecreated"];

									$unique_id = $roe["unique_id"];

									$requirements = $roe["requirements"];

									$responsibilities = $roe["responsibilities"];

									$questions = $roe["questions"];

									$requirements_text = $roe["requirements_text"];

									$responsibilities_text = $roe["responsibilities_text"];

									$questions_text = $roe["questions_text"];

									$deadline = $roe["deadline"];

						


					?>

					<div class="col-lg-4 col-md-4 col-sm-4 job-story-box">
						
						<div style="border-bottom: 1px solid var(--Neutrals-Neutrals200, #CCCBCB);;padding-bottom: 20px;">
							
							<div style="display: flex;gap: 10px;">
								
								<div class="company-logo">
									
									<img src="company/profile/<?php echo $company_logo; ?>" style="width: 100% !important;height: 100% !important;border-radius: inherit;border: inherit;">

								</div>

								<div>
									
									<div style="display: flex;flex-direction: column;height: 100% !important;background: transparent;">
										
										<div style="display: flex;align-items: center;height: auto;">

											<div style="height: auto;background: transparent;height: 80%;">

												<h4 class="name"><?php echo $company_name; ?></h4>

												<p class="location"><?php echo $company_location; ?></p>

											</div>

										</div>

									</div>

								</div>

								<div style="flex-grow: 1;display: flex;justify-content: flex-end;">
									
									<div style="flex-direction: column;gap: 5px;display: flex;background: transparent;justify-content: flex-end;align-items: flex-end;">
											
										<div class="active" style="display: inline-flex;">
											
											<div>
												
												<img src="images/active.png">

											</div>

											<div>
												
												<font class="active-text"><?php echo $status; ?></font>

											</div>

										</div>

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
												
												<font class="full-time money"><?php echo $salary; ?> <?php echo $currency; ?></font>

											</div>

										</div>

									</div>

								</div>

							</div>

						</div>

					</div>

					<!-- End -->

					<?php


				}}}}

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