<?php

session_start();

include '../connect.php';

$select = "SELECT * FROM `users` WHERE `email`='".$_GET['email']."'";

$select_query = mysqli_query($conn, $select);

if (mysqli_num_rows($select_query) > 0) {
	
	while ($row = mysqli_fetch_assoc($select_query)){

		$name = $row["fullname"];

		$title = $row["title"];

		$profile = $row["profile"];


		$_SESSION["nom"] = $name;

		$_SESSION["titile"] = $title;

		$_SESSION["pfp"] = $profile;

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

<body style="font-size: 16px !important;font-family: montserrat;">

<?php

include 'navbar.php';

?>

<div class="sections" style="padding-top: 164px;background: white;">
	
	<div style="display: flex;justify-content: flex-end;">
		
		<a href="dials.php" style="color: inherit;"><p>Go Back</p></a>

	</div>

	<div style="background: #FAFAFA;width: 100% !important;padding: 24px;border-radius: 18px;display: flex;flex-direction: column;gap: 25px;">
		
		<div class="dash-sec">
				
			<div class="row" style="gap: 8px;display: flex;background: transparent;">
				
				<div style="border-radius: 100% !important;width: 140px;height: 120px;">
					
					<img src="../profile/<?php echo $_SESSION['pfp']; ?>" style="width: 100% !important;height: 100% !important;border-radius: inherit;">

				</div>

				<div style="padding-left: 0 !important;width: auto;display: flex;height: 100% !important;background: transparent;flex-direction: column;margin-top: 30px;">
					
					<div style="display: flex;gap: 8px;background: transparent;height: 35px;">

						<p style="width: auto;" class="fname"><?php echo $_SESSION["nom"]; ?></p>

						<img src="../images/blue.png" style="width: 24px;height: 24px;">

					</div>

					<p class="titles"><?php echo $_SESSION["titile"]; ?></p>

				</div>

			</div>

			<div style="display: flex;align-items: center;gap: 8px;">

			</div>

		</div>

		<div class="row">

			<div class="col-lg-6 col-md-6 col-sm-6">

				<div class="dash-sec" style="flex-direction: column;gap: 16px;">
					
					<font class="bio">Viewing</font>

					<div style="width: 100% !important;background: #FAFAFA;padding: 24px;border-radius: 20px;">
						
						<a href="viewdetails.php?email=<?php echo $_GET["email"]; ?>&&job_id=<?php echo $_GET["id"] ?>">
							
							<div class="list">

								<div style="width: 24px;height: 24px;">
									
									<img src="../images/app_details.png" style="width: 100% !important;height: 100% !important;">

								</div>
								
								<div style="display: flex;align-items: center;padding-top: 5px;">

									View Application Details

								</div>

							</div>

						</a>

						<a href="#">
							
							<div class="list">

								<div style="width: 24px;height: 24px;">
									
									<img src="../images/simstar.png" style="width: 100% !important;height: 100% !important;">

								</div>
								
								<div style="display: flex;align-items: center;padding-top: 5px;">

									View Graded Applications

								</div>

							</div>

						</a>

						<a href="#">
							
							<div class="list excellent">

								<div style="width: 24px;height: 24px;">
									
									<img src="../images/checked.png" style="width: 100% !important;height: 100% !important;">

								</div>
								
								<div style="display: flex;align-items: center;padding-top: 5px;">

									Hired

								</div>

							</div>

						</a>

					</div>

				</div>

			</div>

			<div class="col-lg-5 col-md-5 col-sm-5" style="flex-grow: 1;">

				<div class="dash-sec" style="flex-direction: column;gap: 16px;">
					
					<font class="bio">Scheduling / Others</font>

					<div style="width: 100% !important;background: #FAFAFA;padding: 24px;border-radius: 20px;">
						
						<a href="#">
							
							<div class="list">

								<div style="width: 24px;height: 24px;">
									
									<img src="../images/send_mail.png" style="width: 100% !important;height: 100% !important;">

								</div>
								
								<div style="display: flex;align-items: center;padding-top: 5px;">

									Send Mail

								</div>

							</div>

						</a>

						<a href="#">
							
							<div class="list">

								<div style="width: 24px;height: 24px;">
									
									<img src="../images/schedul_interview.png" style="width: 100% !important;height: 100% !important;">

								</div>
								
								<div style="display: flex;align-items: center;padding-top: 5px;">

									Schedule Interview

								</div>

							</div>

						</a>

						<a href="#">
							
							<div class="list sign-out">

								<div style="width: 24px;height: 24px;">
									
									<img src="../images/Trash.png" style="width: 100% !important;height: 100% !important;">

								</div>
								
								<div style="display: flex;align-items: center;padding-top: 5px;">

									Reject Application

								</div>

							</div>

						</a>

					</div>

				</div>

			</div>

		</div>

	</div>

</div>

</body>

</html>