<?php

session_start();

?>

<html>

<head>

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>MSION - Where talents meet opportunities. | About Us</title>

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

	<div class="header">

		<div style="display: flex;flex-direction: column;gap: 40px;">

			<div class="row" style="justify-content: space-between;">

				<div class="col-lg-8 col-sm-8 col-md-8 ab">

					<h4>We set out to build a better <br>way to find jobs & talents</h4>

				</div>

				<div class="col-lg-4 col-sm-4 col-md-4 ab" style="display: flex;align-items: flex-end;">

					<p class="ap-p">Find jobs that suits your interest & skills, find remote jobs you love, research the fastest-growing remote companies </p>

				</div>

			</div>

			<div class="row" style="justify-content: space-between;">

				<div class="col-lg-8 col-sm-8 col-md-8">

					<img src="images/new/1.jpg" style="width: 100% !important;">

				</div>

				<div class="col-lg-4 col-sm-4 col-md-4">

					<img src="images/new/4.jpg" style="width: 100% !important;height: 100% !important;">

				</div>

			</div>

		</div>

	</div>

	<div class="sections" style="background: white;">

		<div>

			<div class="row" style="justify-content: space-between;">

				<div class="col-lg-5 col-sm-6 col-md-6 ab-sec1">

					<div class="row" style="background: transparent;">

						<div style="width: auto;background: transparent;display: flex;align-items: center;">

							<font class="our-story">Our Story</font>

						</div>

						<div style="width: auto;">

							<img src="images/elbow.png" style="width: 50px;height: 50px;">

						</div>

					</div>

					<div style="margin-top: 24px;">

						<img src="images/new/5.jpg" style="width: 100% !important;">

					</div>

				</div>

				<div class="col-lg-6 col-md-6 col-sm-6">

					<font class="long-story">

						MSI Nigeria Reproductive Choices is a result-oriented social enterprise, which uses modern
						management and marketing techniques to provide reproductive health care and allied services. MSI
						Nigeria’s goal is to meet the needs of underserved Nigerians and dramatically improve access and use
						of a range of reproductive health services.
						MSI Nigeria Reproductive Choices is part of Marie Stopes International’s Global Partnership which is in
						over 37 countries worldwide and it operates in Nigeria through six service delivery channels.

						
					</font>

				</div>

			</div>

		</div>

	</div>

	<div style="width: 100% !important;height: auto;padding: 64px 100px;background: #FAFAFA;display: flex;flex-direction: column;gap: 64px;">

		<div style="display: flex;justify-content: center;">

			<div class="col-lg-6 col-md-6 col-sm-6 how" style="text-align: center;">

				<h4>Our Team</h4>

				<p>Find jobs that suits your interest & skills, find remote jobs you love, research the fastest-growing remote companies </p>

			</div>

		</div>

		<div>

			<div class="row" style="gap: 16px;">

				<div class="third-post">

					<div>

						<img src="images/tes.png">

					</div>

					<div style="display: flex;flex-direction: column;gap: 6px;">

						<font class="manager">John Doe</font>

						<font class="roles" style="line-height: 26px;">Senior Engineer</font>

					</div>

				</div>

				<div class="third-post">

					<div>

						<img src="images/tes.png">

					</div>

					<div style="display: flex;flex-direction: column;gap: 6px;">

						<font class="manager">John Doe</font>

						<font class="roles" style="line-height: 26px;">Senior Engineer</font>

					</div>

				</div>

				<div class="third-post">

					<div>

						<img src="images/tes.png">

					</div>

					<div style="display: flex;flex-direction: column;gap: 6px;">

						<font class="manager">John Doe</font>

						<font class="roles" style="line-height: 26px;">Senior Engineer</font>

					</div>

				</div>

				<div class="third-post">

					<div>

						<img src="images/tes.png">

					</div>

					<div style="display: flex;flex-direction: column;gap: 6px;">

						<font class="manager">John Doe</font>

						<font class="roles" style="line-height: 26px;">Senior Engineer</font>

					</div>

				</div>

			</div>

		</div>

	</div>

	<div class="sections" style="background: white;">

		<div class="frame1" style="display: flex;">

			<div class="col-lg-6 col-sm-6 col-md-6 wing-text">

				<div class="tets">

					<h4>Join us today</h4>

					<p>Find jobs that suits your interest & skills, find remote jobs you love, research the fastest-growing remote companies </p>

				</div>

			</div>

			<div>

				<img src="images/wing.png" style="width: 100% !important;height: 100% !important;">

			</div>

		</div>

	</div>

	<?php

	include 'footer.php';

	?>

</body>

<script type="text/javascript">
	document.addEventListener('DOMContentLoaded', function() {

		var currentPage = '<?php echo basename($_SERVER["PHP_SELF"], ".php"); ?>';

		var links = document.querySelectorAll('.nav-link');

		links.forEach(link => {

			if (link.getAttribute('data-page') === currentPage) {

				link.classList.add('link-active');

			}

		});

	});
</script>

<script src="bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="js/main.js"></script>

</html>