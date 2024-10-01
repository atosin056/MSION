<?php

session_start();

include 'connect.php';

include 'functions.php';

if (isset($_GET["company"])) {

	$select = "SELECT * FROM `company_users` WHERE `company_name`='" . $_GET['company'] . "'";

	$select_query = mysqli_query($conn, $select);

	if (mysqli_num_rows($select_query) > 0) {

		while ($row = mysqli_fetch_assoc($select_query)) {

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

		header('location: viewcompany.php');
	}
}

?>

<html>

<head>

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>MSI Nigeria - Where talents meet opportunities. | Dashboard</title>

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

						<div class="row" style="gap: 8px;display: flex;background: transparent;">

							<div style="border-radius: 100% !important;width: 140px;height: 120px;">

								<img src="images/logo.png" style="width: 100% !important;height: 100% !important;border-radius: inherit;">

							</div>

							<div style="padding-left: 0 !important;width: auto;display: flex;height: 100% !important;background: transparent;flex-direction: column;margin-top: 30px;">

								<div style="display: flex;gap: 8px;background: transparent;height: 35px;">

									<p style="width: auto;" class="fname">MSI Nigeria</p>

									<img src="images/blue.png" style="width: 24px;height: 24px;">

								</div>

								<p class="titles"><?php echo $_SESSION["tagline"]; ?></p>

							</div>

						</div>

						<div style="display: flex;align-items: center;gap: 8px;">

						</div>

					</div>

					<div class="dash-sec" style="flex-direction: column;">

						<div style="display: flex;justify-content: space-between;">

							<div>

								<p class="bio">About</p>

							</div>

						</div>

						<div>

							<p class="bio-text">MSI Nigeria Reproductive Choices is a result-oriented social enterprise, which uses modern management and marketing techniques to provide reproductive health care and allied services. MSI Nigeria’s goal is to meet the needs of underserved Nigerians and dramatically improve access and use of a range of reproductive health services. MSI Nigeria Reproductive Choices is part of Marie Stopes International’s Global Partnership which is in over 37 countries worldwide and it operates in Nigeria through six service delivery channels.</p>

						</div>

					</div>

					<div class="dash-sec" style="flex-direction: column;">

						<div style="display: flex;justify-content: space-between;">

							<div>

								<p class="bio">Founding Year</p>

							</div>

						</div>

						<div class="year">

							<font>2009</font>

						</div>

					</div>

					<div class="dash-sec" style="flex-direction: column;">

						<div style="display: flex;justify-content: space-between;">

							<div>

								<p class="bio">Size of Company</p>

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

									</div>

									<div>

										<div style="display: flex;gap: 10px;padding-left: 10px;" class="row">

											<?php

											$industry_select = "SELECT * FROM `company_industry` WHERE `email`='" . $_SESSION["email"] . "'";

											$industry_select_query = mysqli_query($conn, $industry_select);

											if (mysqli_num_rows($industry_select_query) > 0) {

												while ($roww = mysqli_fetch_assoc($industry_select_query)) {

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

									</div>

									<div>

										<div style="display: flex;gap: 10px;padding-left: 10px;" class="row">

											<?php

											$services_select = "SELECT * FROM `company_services` WHERE `email`='" . $_SESSION["email"] . "'";

											$services_select_query = mysqli_query($conn, $services_select);

											if (mysqli_num_rows($services_select_query) > 0) {

												while ($roww = mysqli_fetch_assoc($services_select_query)) {

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

									</div>

									<div>

										<div class="row" style="gap: 10px;">

											<?php

											$stack_select = "SELECT * FROM `company_stack` WHERE `email`='" . $_SESSION["email"] . "' ORDER BY `id` DESC";

											$stack_select_query = mysqli_query($conn, $stack_select);

											if (mysqli_num_rows($stack_select_query) > 0) {

												while ($rowwss = mysqli_fetch_assoc($stack_select_query)) {

													$stack = $rowwss["company_stack"];

													$logo_select = "SELECT * FROM `logos` WHERE `stack_name` LIKE '%" . $stack . "%'";

													$logo_select_query = mysqli_query($conn, $logo_select);

													if (mysqli_num_rows($logo_select_query) > 0) {

														while ($rowws = mysqli_fetch_assoc($logo_select_query)) {

															$stack_logo = $rowws["stack_picture"];


											?>

															<div style="width: 40px;background: transparent;height: 40px;" title="<?php echo $stack; ?>">

																<img src="logos/<?php echo $stack_logo ?>" style="width: 40px !important;height: 40px !important;">

															</div>

														<?php

														}
													} else {



														?>

														<div class="skill">

															<font><?php echo $stack; ?></font>

														</div>

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

						<div class="dash-sec">

							<div style="width: 100%;">

								<div style="width: 100%;display: flex;flex-direction: column;gap: 10px;">

									<div style="background: transparent;display: flex;justify-content: space-between;width: 100% !important;">

										<div style="width: auto;">

											<font class="bio">Social Handles</font>

										</div>

									</div>

									<div>

										<div class="row" style="gap: 10px;">

											<?php

											$social_select = "SELECT * FROM `company_socials` WHERE `email`='" . $_SESSION["email"] . "'";

											$social_select_query = mysqli_query($conn, $social_select);

											if (mysqli_num_rows($social_select_query) > 0) {

												while ($row = mysqli_fetch_assoc($social_select_query)) {

													if (!is_null($row['linkedin'])) {


											?>



														<div style="width: 40px;background: transparent;height: 40px;">

															<a href="<?php echo $row["linkedin"]; ?>" target="_blank">

																<img src="images/linkedIn.png" style="width: 40px !important;height: 40px !important;">

															</a>

														</div>

													<?php

													}

													if (!is_null($row['facebook'])) {

													?>

														<div style="width: 40px;background: transparent;height: 40px;">

															<a href="<?php echo $row["facebook"]; ?>" target="_blank">

																<img src="images/facebook.png" style="width: 40px !important;height: 40px !important;">

															</a>

														</div>

													<?php

													}

													if (!is_null($row['youtube'])) {

													?>

														<div style="width: 40px;background: transparent;height: 40px;">

															<a href="<?php echo $row["youtube"]; ?>" target="_blank">

																<img src="images/youtube.png" style="width: 40px !important;height: 40px !important;">
															</a>

														</div>

													<?php

													}

													if (!is_null($row['x'])) {

													?>

														<div style="width: 40px;background: transparent;height: 40px;">

															<a href="<?php echo $row["x"]; ?>" target="_blank">

																<img src="images/ex.png" style="width: 40px !important;height: 40px !important;">

															</a>

														</div>

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

					</div>

				</div>

			</div>

		</div>

	</div>

	<?php

	include 'footer.php';

	?>

</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Popper.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="js/main.js"></script>

</html>