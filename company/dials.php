<?php

session_start();

include '../connect.php';

if (!isset($_SESSION["email"])) {
	
	header('location: ../login.php');

}

$select = "SELECT * FROM `job` WHERE `company_name`='".$_SESSION["company_name"]."' ORDER BY `timecreated` DESC LIMIT 1";

$select_query = mysqli_query($conn, $select);

if (mysqli_num_rows($select_query) > 0) {
	
	while ($row = mysqli_fetch_assoc($select_query)) {

		$applicants = $row["applicants"];

		$_SESSION["applicants"] = $applicants;

	}

}

$select1 = "SELECT COUNT(*) AS total FROM `job` WHERE `company_name`='".$_SESSION["company_name"]."'";

$select1_query = mysqli_query($conn, $select1);

if ($select1_query) {
	
	while ($roe = mysqli_fetch_assoc($select1_query)){

		$total = $roe["total"];

		$_SESSION["jb-total"] = $total;

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

	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="../css/main.css">

</head>

<body>

<?php

include 'navbar.php';

?>

<div class="sections" style="background: white;padding-top: 164px;">
	
	<div>
		
		<div>
			
			<p class="bio">
				
				Dashboard Overview

			</p>

		</div>

		<div>
			
			<div class="japp">
				
				<div style="background: transparent;width: 100% !important;column-gap: 8px;row-gap: 10px;display: flex;flex-wrap: wrap;">
					
					<div class="col-md-4 col-sm-4 col-lg-4 tota" style="background: transparent;">
						
						<div style="background: transparent;display: flex;gap: 16px;justify-content: space-between;width: 100% !important;">
							
							<div style="display: flex;flex-direction: column;gap: 4px;background: transparent;padding-left: 0;padding-right: 0;">
								
								<font class="total_app">Total Applications</font>

								<font class="number"><?php echo $_SESSION["applicants"]; ?> Job applications</font>

							</div>

							<div style="width: 40px;height: 40px;background: transparent;padding-left: 0;">
								
								<img src="../images/tota.png">

							</div>

						</div>

					</div>

					<div class="col-md-4 col-sm-4 col-lg-4 tota" style="background: transparent;">
						
						<div style="background: transparent;display: flex;gap: 16px;justify-content: space-between;width: 100% !important;">
							
							<div style="display: flex;flex-direction: column;gap: 4px;background: transparent;padding-left: 0;padding-right: 0;">
								
								<font class="total_app">Total Interviews</font>

								<font class="number">57 Interviews</font>

							</div>

							<div style="width: 40px;height: 40px;background: transparent;padding-left: 0;">
								
								<img src="../images/tota.png">

							</div>

						</div>

					</div>

					<div class="col-md-4 col-sm-4 col-lg-4 tota" style="background: transparent;">
						
						<div style="background: transparent;display: flex;gap: 16px;justify-content: space-between;width: 100% !important;">
							
							<div style="display: flex;flex-direction: column;gap: 4px;background: transparent;padding-left: 0;padding-right: 0;">
								
								<font class="total_app">Hired Talents</font>

								<font class="number">57 Interviews</font>

							</div>

							<div style="width: 40px;height: 40px;background: transparent;padding-left: 0;">
								
								<img src="../images/tota.png">

							</div>

						</div>

					</div>

					<div class="col-md-4 col-sm-4 col-lg-4 tota" style="background: transparent;">
						
						<div style="background: transparent;display: flex;gap: 16px;justify-content: space-between;width: 100% !important;">
							
							<div style="display: flex;flex-direction: column;gap: 4px;background: transparent;padding-left: 0;padding-right: 0;">
								
								<font class="total_app">Jobs Posted</font>

								<font class="number"><?php echo $_SESSION["jb-total"]; ?> Jobs</font>

							</div>

							<div style="width: 40px;height: 40px;background: transparent;padding-left: 0;">
								
								<img src="../images/tota.png">

							</div>

						</div>

					</div>

					<div class="col-md-4 col-sm-4 col-lg-4 tota" style="background: transparent;">
						
						<div style="background: transparent;display: flex;gap: 16px;justify-content: space-between;width: 100% !important;">
							
							<div style="display: flex;flex-direction: column;gap: 4px;background: transparent;padding-left: 0;padding-right: 0;">
								
								<font class="total_app">Total Applications Rejected</font>

								<font class="number">405 Applications</font>

							</div>

							<div style="width: 40px;height: 40px;background: transparent;padding-left: 0;">
								
								<img src="../images/tota.png">

							</div>

						</div>

					</div>

					<div class="col-md-4 col-sm-4 col-lg-4 tota" style="background: transparent;">
						
						<div style="background: transparent;display: flex;gap: 16px;justify-content: space-between;width: 100% !important;">
							
							<div style="display: flex;flex-direction: column;gap: 4px;background: transparent;padding-left: 0;padding-right: 0;">
								
								<font class="total_app">--</font>

								<font class="number">--</font>

							</div>

							<div style="width: 40px;height: 40px;background: transparent;padding-left: 0;">
								
								<img src="../images/tota.png">

							</div>

						</div>

					</div>

				</div>

			</div>

		</div>

		<div style="margin-top: 20px;">
			
			<div>
				
				<div class="tbhead">
					
					<div style="width: 100% !important;display: flex;height: 52px !important;background: transparent;">
						
						<div class="holder" style="width: 20% !important;background: transparent;">
							
							<font class="ap-text">Applicant</font>

						</div>

						<div class="holder" style="width: 12% !important;background: transparent;">
							
							<font class="ap-text">Date</font>

						</div>

						<div class="holder" style="width: 12% !important;background: transparent;">
							
							<font class="ap-text">Time</font>

						</div>

						<div class="holder" style="width: 15% !important;background: transparent;">
							
							<font class="ap-text">Job Title</font>

						</div>

						<div class="holder" style="width: 12% !important;background: transparent;">
							
							<font class="ap-text">Stage</font>

						</div>

						<div class="holder" style="width: 15% !important;background: transparent;">
							
							<font class="ap-text">Application Status</font>

						</div>

						<div class="holder" style="width: 10% !important;background: transparent;">
							
							<font class="ap-text">Ranking</font>

						</div>

						<div class="holder" style="flex-grow: 1;">
							
							<font class="ap-text">Applicant</font>

						</div>

					</div>

				</div>

			</div>

		</div>

	</div>

</div>

</body>

</html>