<?php

session_start();

include '../connect.php';

include '../functions.php';

if (!isset($_SESSION["email"])) {
	
	header('location: ../login.php');

}




// Check if the 'viewresume' GET parameter is set


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

<body style="font-size: 16px !important;font-family: montserrat;">



<?php

if ($_GET["viewresume"]) {

	
	

?>


	<div class="overlay big-box" id="wholeBox">
		
		<div style="min-height: 100% !important;height: auto;background: white;width: 100% !important;padding: 50px;overflow-y: auto;">
			
			<?php

			$cv_select = "SELECT * FROM `applicants` WHERE `email`='".$_GET["viewresume"]."' AND `job_id`='".$_SESSION["j_id"]."'";

			$cv_select_query = mysqli_query($conn, $cv_select);

			if (mysqli_num_rows($cv_select_query) > 0) {
				
				while ($row = mysqli_fetch_assoc($cv_select_query)){

					$cv = $row["cv"];

				}

				$filePath = '../cv/'.$cv;
			
				$docContent = getDocxContentAsHtml($filePath);

				echo $docContent;

			}

			?>

				<div style="margin-top: 50px;display: flex;gap: 10px;">
		
					<div class="btn btn-primary" id="close">
						
						Close

					</div>


					<a href="perform.php?email=<?php echo $_GET["viewresume"]; ?>&&id=<?php echo $_SESSION['j_id']; ?>">

						<div class="btn btn-primary">
							
							Perform other task

						</div>

					</a>

			</div>

		</div>

	</div>

</a>

<?php

}

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

								<font class="number"><?php 

								$selects = "SELECT * FROM `applicants` WHERE `company_name`='".$_SESSION["company_name"]."' ORDER BY `date_entered` DESC LIMIT 1";

							    $selects_query = mysqli_query($conn, $selects);

							    if (mysqli_num_rows($selects_query) > 0) {

							    	while ($fu = mysqli_fetch_assoc($selects_query)){

							    		$jib = $fu["job_id"];


							    	}


								$s = "SELECT COUNT(*) AS totals FROM `hired` WHERE `job_id`='".$jib."'";

								$s_query = mysqli_query($conn, $s);

								if (mysqli_num_rows($s_query) > 0){

									while ($r = mysqli_fetch_assoc($s_query)){

										$hired = $r["totals"];

									}

									echo $hired;

								}

								else{

									echo '0';

								}
}

								 ?> Talent</font>

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

								<font class="number"><?php

								$selectss = "SELECT * FROM `applicants` WHERE `company_name`='".$_SESSION["company_name"]."' ORDER BY `date_entered` DESC LIMIT 1";

							    $selects_query = mysqli_query($conn, $selects);

							    if (mysqli_num_rows($selects_query) > 0) {

							    	while ($fu = mysqli_fetch_assoc($selects_query)){

							    		$jibs = $fu["job_id"];


							    	}


								$ss = "SELECT COUNT(*) AS totalss FROM `rejected` WHERE `job_id`='".$jibs."'";

								$ss_query = mysqli_query($conn, $ss);

								if (mysqli_num_rows($ss_query) > 0){

									while ($r = mysqli_fetch_assoc($ss_query)){

										$rejected = $r["totalss"];

									}

									echo $rejected;

								}

								else{

									echo '0';

								}
} ?> Applications</font>

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
			
			<div class="table-container">
			
			    <div class="table-header">
			
			        <div class="header-cell" style="width: 20%;">Applicant</div>
			
			        <div class="header-cell" style="width: 12%;">Date</div>
			
			        <div class="header-cell" style="width: 12%;">Time</div>
			
			        <div class="header-cell" style="width: 18%;">Job Title</div>
			
			        <div class="header-cell" style="width: 12%;">Stage</div>
			
			        <div class="header-cell" style="width: 18%;">Application Status</div>
			
			        <div class="header-cell" style="width: 9%;">Ranking</div>
			
			        <div class="header-cell applicant-cell">Actions</div>
			
			    </div>

			    <?php 

			    $select = "SELECT * FROM `applicants` WHERE `company_name`='".$_SESSION["company_name"]."' AND `job_id`='".$jib."' ORDER BY `date_entered` DESC";

			    $select_query = mysqli_query($conn, $select);

			    if (mysqli_num_rows($select_query) > 0) {
			    	
			    	while ($row = mysqli_fetch_assoc($select_query)) {

			    		$applicant_name = $row["fname"];

			    		$date_entered = $row["date_entered"];

			    		$cv_rating = $row["cv_rating"];

			    		$title = $row["title"];

			    		$application_status = $row["application_status"];

			    		$stage = $row["stage"];

			    		$email = $row["email"];

			    		$j_id = $row["job_id"];


			    	

			    ?>
			
			    <div class="table-row">
			
			        <div class="table-cell" style="width: 20%;"><?php echo $applicant_name; ?></div>
			
			        <div class="table-cell" style="width: 12%;"><?php echo convertToCustomDate($date_entered); ?></div>
			
			        <div class="table-cell" style="width: 12%;"><?php echo extractTime($date_entered); ?></div>
			
			        <div class="table-cell" style="width: 18%;"><?php echo $title; ?></div>
			
			        <div class="table-cell" style="width: 12%;"><?php if ($stage == 'Questioning'){

			        	echo 'Questioning';

			        } ?></div>
			
			        <div class="table-cell" style="width: 18%;"><?php 


			        if ($application_status == 'nothing'){

			        	echo 'Pending';

			        }

			        else{

			        echo $application_status;} ?></div>
			
			        <div class="table-cell" style="width: 9%;">

			        <?php

				        if ($cv_rating == '1') {
				        	
				        	echo '<img src="../images/1 star.png">';

				        }

				        if ($cv_rating == '2') {
				        	
				        	echo '<img src="../images/2 star.png">';

				        }

				        if ($cv_rating == '3') {
				        	
				        	echo '<img src="../images/3 star.png">';

				        }

				        if ($cv_rating == '4') {
				        	
				        	echo '<img src="../images/4 star.png">';

				        }

				        if ($cv_rating == '5') {
				        	
				        	echo '<img src="../images/5 star.png">';

				        }

			        ?>

			        </div>
			
					<?php

					if ($application_status == "Hired") {
						
						echo '<div class="table-cell applicant-cell action" style="cursor: pointer;text-align: center;"><a href="#" style="width: 100% !important;"><div style="width: 100% !important;">:</div></a></div>';

					}

					elseif ($application_status == "rejected"){

						echo '<div class="table-cell applicant-cell action" style="cursor: pointer;text-align: center;"><a href="#" style="width: 100% !important;"><div style="width: 100% !important;">:</div></a></div>';

					}

					else{

					?>

			        <div class="table-cell applicant-cell action" style="cursor: pointer;text-align: center;"><a href="dials.php?viewresume=<?php echo $email; ?>" style="width: 100% !important;"><div style="width: 100% !important;">:</div></a></div>

			        <?php

			    	}



			        ?>

			    </div>

			    <?php

				}$_SESSION["j_id"] = $j_id;}

			    ?>

			</div>


		</div>

	</div>

</div>

</body>

<script type="text/javascript">

	var close = document.getElementById('close');

	wholeBox = document.getElementById('wholeBox');

	close.addEventListener('click', function () {

		wholeBox.style.display = 'none';

	})

</script>

</html>