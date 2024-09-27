<?php

session_start();

include 'connect.php';

include 'functions.php';

use SendinBlue\Client\Configuration;

		use SendinBlue\Client\Api\TransactionalEmailsApi;

		use GuzzleHttp\Client;

if (!isset($_SESSION["email"])) {
	
	header('location: login.php');

}

if (isset($_GET["applied"])) {
	
	

		$body = '<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Welcome to MSION</title>
    <style>
        /* Fallback styles for email clients */
        body {
            width: 100% !important;
            background-color: #E8E8E8;
            margin: 0;
            padding: 0;
            font-family: Montserrat, sans-serif;
        }
        .email-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: white;
            padding: 24px;
            box-sizing: border-box;
        }
        .email-header {
            padding-bottom: 30px;
            border-bottom: 1px solid #CBD8CD;
            
        }
        .email-header img {
            max-width: 100px;
        }
        .email-content {
            padding-top: 20px;
        }
        .email-content p {
            line-height: 1.6;
            color: #333333;
        }
        .email-content h1 {
            font-weight: 600;
            font-size: 20px;
            color: #333333;
        }
        .email-footer {
            margin-top: 40px;
        }
        .email-footer p {
            font-weight: 600;
        }
        p{
            line-height: 30px !important;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <img src="http://msiontest.mtest.org.ng/images/logo.png" alt="MSION Logo">
        </div>
        <div class="email-content">
            <h1>Hi👋! atosin056@gmail.com</h1>
            <p style="line-height: 30px;">We have detected a job application from your MSION account. If this was you, no further action is required. We will notify you about any updates regarding the application.</p>
            
            <p style="line-height: 30px;">If you did not make this application, please contact us immediately for assistance.</p>
            
            <p>Thank you for using MSION.</p>
            
            <p>We are confident that your experience with MSION will be productive and rewarding. Our team is dedicated to helping you reach your career goals, and we cannot wait to see what you achieve.</p>
            
            <p>If you have any questions or need assistance, we are always here to help. Welcome once again, and let us get started on building a brighter future together!</p>
        </div>
        <div class="email-footer">
            <p>Best Regards,</p>
            <p>The MSION team!</p>
        </div>
    </div>
</body>
</html>
';
	    
	        // Initialize Sendinblue API
	    
	        $config = Configuration::getDefaultConfiguration()->setApiKey('api-key', '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');
	   
	        $apiInstance = new TransactionalEmailsApi(
	   
	            new Client(),
	   
	            $config
	   
	        );

	        $sendSmtpEmail = new \SendinBlue\Client\Model\SendSmtpEmail([

	            'subject' => 'MSION Job Application Success',

	            'sender' => ['name' => 'MSION', 'email' => 'atosin056@gmail.com'],

	            'to' => [['email' => $_SESSION["email"], 'name' => 'User']],

	            'htmlContent' => $body

	        ]);



	        try {

	            $response = $apiInstance->sendTransacEmail($sendSmtpEmail);

	            // Insert OTP into database

	           header('location: jobsearch.php');

	        } catch (Exception $e) {

	            echo 'Exception when calling TransactionalEmailsApi->sendTransacEmail: ', $e->getMessage(), PHP_EOL;

	        }

	    }



if (isset($_GET["search"])) {
    
    // Assuming $conn is your MySQLi connection
    
    $search = '%' . $_GET["search"] . '%';

    // Prepare the SQL statement
    
    $stmt = $conn->prepare("SELECT COUNT(DISTINCT job.unique_id) AS total FROM job LEFT JOIN tag ON job.unique_id = tag.unique_id WHERE job.jobtitle LIKE ? OR tag.tag LIKE ?");

    if ($stmt === false) {
        // Handle the case where the statement fails to prepare
        die("MySQL error: " . $conn->error);
    }

    // Bind the parameters
    $stmt->bind_param('ss', $search, $search);

    // Execute the statement
    if ($stmt->execute()) {
        // Bind the result to a variable
        $stmt->bind_result($total);

        // Fetch the result
        $stmt->fetch();

        // Store the total count in the session
        $_SESSION["search_results"] = $total;
    } else {
        // Handle the case where the query execution fails
        die("Execution failed: " . $stmt->error);
    }

    // Close the statement
    $stmt->close();
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

<div class="sections" style="padding-top: 100px;background: #FAFAFA;height: 100% !important;">
	
	<div style="display: flex;justify-content: center;align-items: center;height: 100% !important;width: 100% !important;">
		
		<div style="display: flex;flex-direction: column;justify-content: center;text-align: center;width: 100% !important;gap: 10px;">
			
			<div>
				
				<h4 class="dream-job">Find your dream Job</h4>

			</div>

			<div>
				
				<p class="next-role">Looking for your next role? there are plenty of opportunities lined up for you, good luck on your search!</p>

			</div>

			<div style="width: 100% !important;">
				
				<form method="GET">
					
					<div style="display: flex;width: 100% !important;">

						<div style="width: 70px;height: 64px;background: white;display: flex;justify-content: center;align-items: center;border-top-left-radius: 20px;border-bottom-left-radius: 20px;box-shadow: -3px 0px 10px #D8F3FF; border-top: 1px solid #13B7FD;border-bottom: 1px solid #13B7FD;border-left: 1px solid #13B7FD;border-right: none;padding-left: 40px;">	
							
							<div style="background: transparent;width: 24px;height: 24px;">
									
								<img src="images/search.png" style="width: 100% !important;height: 100% !important;">

							</div>

						</div>

						<div style="width: 100% !important;">
							
							<input type="text" name="search" class="form-control" style="background: white;box-shadow: 10px 0px 10px #D8F3FF; border-top: 1px solid #13B7FD;border-bottom: 1px solid #13B7FD;border-right: none;border-left: none !important;border-radius: 0px !important;height: 64px !important;" placeholder="Job Title/keyword" required>

						</div>

						<div style="width: 100% !important;">
							
							<input type="text" name="location" class="form-control" style="background: white;box-shadow: 10px 0px 10px #D8F3FF; border-top: 1px solid #13B7FD;border-bottom: 1px solid #13B7FD;border-right: none;border-left: none !important;border-radius: 0px !important;height: 64px !important;" placeholder="| Location">

						</div>

						<div style="width: auto;padding-right: 10px;background: white;display: flex;align-items: center;justify-content: center;border-radius: 0 !important;border-top-right-radius: 20px !important;border-bottom-right-radius: 20px !important;border-left: none !important;border: 1px solid #13B7FD;">
							
							<input type="submit" name="submit" class="find-job" value="Find Job">

						</div>

					</div>

				</form>

			</div>

			<div style="display: flex;flex-wrap: wrap;width: 100%;column-gap: 8px;row-gap: 10px;">

				<?php

				$select5 = "SELECT * FROM `job_filters` ORDER BY `id` ASC";

				$select5_query = mysqli_query($conn, $select5);

				if (mysqli_num_rows($select5_query) > 0) {
					
					while ($fetch = mysqli_fetch_assoc($select5_query)) {

						$filter = $fetch["filter"];

				?>

				<a href="jobsearch.php?search=<?php echo $filter; ?>" style="color: inherit !important;">
				
					<div class="jo-search" style="color: black !important;">
						
						<?php echo $filter; ?>

					</div>

				</a>

				<?php

				}

				}

				?>

			</div>

		</div>

	</div>	

</div>

<div class="sections" style="background: white;">
	
	<div>
		
		<div>
			
			<div>
				
				<p class="search-results">Search Results <font class="results-found">(<?php if(isset($_SESSION["search_results"])){echo $_SESSION['search_results'].' '.'Jobs found';}elseif(!isset($_SESSION["job_count"])){
					echo 'Showing all jobs';}else{echo $_SESSION["job_count"].' '.'Jobs found';} ?>)</font></p>

			</div>

			<div>
				
				<div style="background: transparent;gap: 16px;width: auto !important;flex-wrap: wrap;" class="row">
			
					<?php

					if (!isset($_GET["search"])) {
					
						$jb_select = "SELECT * FROM `job` ORDER BY `timecreated` DESC";

						$jb_select_query = mysqli_query($conn, $jb_select);

						if (mysqli_num_rows($jb_select_query) > 0) {
							
							while ($row = mysqli_fetch_assoc($jb_select_query)) {

								$company_logo = $row["company_logo"];

								$company_name = $row["company_name"];

								$company_location = $row["company_location"];

								$status = $row["status"];

								$jobtitle = $row["jobtitle"];

								$jobdesc = $row["jobdescription"];

								$jobtype = $row["jobtype"];

								$location = $row["location"];

								$salary = $row["salary"];

								$currency = $row["currency"];

								$timecreated = $row["timecreated"];

								$unique_id = $row["unique_id"];

								$applicants = $row["applicants"];

							

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
									
									<div style="flex-direction: column;gap: 5px;display: flex;">
											
										<div class="active">
											
											<div>
												
												<img src="images/active.png">

											</div>

											<div>
												
												<font class="active-text"><?php echo $status; ?></font>

											</div>

										</div>

										<div style="background: transparent;display: flex;justify-content: flex-end;">
											
											<font class="time"><?php

											$timestamp = strtotime($timecreated); // Example timestamp

											echo timeAgo($timestamp); // Outputs: e.g., "5 days ago"

										?></font>

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

						<div style="display: flex;">
							
							<div style="display: flex;flex-direction: column;gap: 8px;">
								
								<div style="display: flex;gap: 4px;">

									<div style="width: 16px;height: 16px;">
										
										<img src="images/Users.png" style="width: 16px;height: 16px;">

									</div>

									<div>
										
										<font class="application-number"><?php echo $applicants; ?> Applications</font>

									</div>

								</div>

								<div style="display: flex;gap: 4px;">

									<div style="width: 16px;height: 16px;">
										
										<img src="images/verified-tick.png" style="width: 16px;height: 16px;">

									</div>

									<div>
										
										<font class="application-number">Verified Company</font>

									</div>

								</div>

							</div>

							<div style="display: flex;justify-content: flex-end;flex-grow: 1;">
								
								<a href="job.php?job_id=<?php echo $unique_id; ?>">
									
									<div class="View">
										
										<font>View Job</font>

									</div>

								</a>

							</div>

						</div>

					</div> 

					<!-- End -->

					<?php

					}}}

					if (isset($_GET["search"])) {
	
						$keyword = $_GET["search"];

						$select1 = "SELECT DISTINCT job.* FROM job LEFT JOIN tag ON job.unique_id = tag.unique_id WHERE job.jobtitle LIKE '%".$keyword."%' OR tag.tag LIKE '%".$keyword."%'";

						$select1_query = mysqli_query($conn, $select1);

						if (mysqli_num_rows($select1_query) > 0) {
							
							while ($ro = mysqli_fetch_assoc($select1_query)){

								$company_logo = $ro["company_logo"];

								$company_name = $ro["company_name"];

								$company_location = $ro["company_location"];

								$status = $ro["status"];

								$jobtitle = $ro["jobtitle"];

								$jobdesc = $ro["jobdescription"];

								$jobtype = $ro["jobtype"];

								$location = $ro["location"];

								$salary = $ro["salary"];

								$applicants = $ro["applicants"];

								$currency = $ro["currency"];

								$timecreated = $ro["timecreated"];

								$unique_id = $ro["unique_id"];



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
									
									<div style="flex-direction: column;gap: 5px;display: flex;">
											
										<div class="active">
											
											<div>
												
												<img src="images/active.png">

											</div>

											<div>
												
												<font class="active-text"><?php echo $status; ?></font>

											</div>

										</div>

										<div style="background: transparent;display: flex;justify-content: flex-end;">
											
											<font class="time"><?php

											$timestamp = strtotime($timecreated); // Example timestamp

											echo timeAgo($timestamp); // Outputs: e.g., "5 days ago"

										?></font>

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

						<div style="display: flex;">
							
							<div style="display: flex;flex-direction: column;gap: 8px;">
								
								<div style="display: flex;gap: 4px;">

									<div style="width: 16px;height: 16px;">
										
										<img src="images/Users.png" style="width: 16px;height: 16px;">

									</div>

									<div>
										
										<font class="application-number"><?php echo $applicants; ?> Applications</font>

									</div>

								</div>

								<div style="display: flex;gap: 4px;">

									<div style="width: 16px;height: 16px;">
										
										<img src="images/verified-tick.png" style="width: 16px;height: 16px;">

									</div>

									<div>
										
										<font class="application-number">Verified Company</font>

									</div>

								</div>

							</div>

							<div style="display: flex;justify-content: flex-end;flex-grow: 1;">
								
								<a href="job.php?job_id=<?php echo $unique_id; ?>">
									
									<div class="View">
										
										<font>View Job</font>

									</div>

								</a>

							</div>

						</div>

					</div>

					<?php

					}}}

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