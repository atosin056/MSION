<?php

session_start();

require 'vendor/autoload.php';

use Smalot\PdfParser\Parser as PdfParser;

use PhpOffice\PhpWord\IOFactory as WordParser;

include 'connect.php';

$unique_id = md5(random_int(1, 10) . random_int(1, 10) . random_int(1, 10) . random_int(1, 10) . random_int(1, 10));

$_SESSION["unique_id"] = $unique_id;

if (isset($_POST['submit'])) {

	$error_response = false;

	$email = $_POST["email"];

	$password = md5($_POST["password"]);


	//Check if the data is existing

	$check = "SELECT * FROM `users` WHERE `email`='" . $email . "'";

	$check_query = mysqli_query($conn, $check);

	if (mysqli_num_rows($check_query) > 0) {

		$error_response = true;

		if ($error_response) {

			$error_msg = 'This User Exists in the Database';

			//Store the error message in a session

			$_SESSION["error_msg"] = $error_msg;

			echo '<div style="width: 100% !important;display: flex;justify-content: center;position: absolute;margin-top: 20px;">

	<div class="error-msg" id="error-msg">
					
		<p><?php echo $_SESSION["error_msg"]; ?></p>

	</div>

</div>';
		}
	} else {

		$insert = "INSERT INTO `users` (`id`,`email`,`unique_id`) VALUES (NULL, '" . $email . "','" . $_SESSION["unique_id"] . "')";

		$insert_query = mysqli_query($conn, $insert);

		if ($insert_query) {

			$update = "UPDATE `users` SET `password`='" . $password . "' where `unique_id`='" . $_SESSION["unique_id"] . "'";

			$update_query = mysqli_query($conn, $update);

			if ($update_query) {

				$_SESSION["otp_email_send"] = $email;

				if (isset($_SESSION["otp_email_send"])) {

					header('location: otp_send_mail.php');
				}
			}
		} else {

			echo $insert;
		}
	}
}

?>

<html>

<head>

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>MSI Nigeria - Where talents meet opportunities. | Create an Account</title>

	<link rel="preconnect" href="https://fonts.googleapis.com">

	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="css/main.css">

</head>

<body>

	<div style="width: 100% !important;height: 100% !important;background: transparent;">

		<div style="height: 100% !important;width: 100% !important;margin: 0;padding: 0;" class="row">

			<div class="col-lg-6 col-md-6 col-sm-6" style="background: url('images/regbg.png');height: 100% !important;display: flex;flex-direction: column;gap: 24px;padding-top: 50px;padding-left: 50px;">

				<div style="background: transparent;width: 100% !important;display: flex;justify-content: flex-start;">

					

				</div>

			</div>

			<div class="col-lg-6 col-md-6 col-sm-6" style="background: white;height: 100% !important;display: flex;justify-content: center;align-items: center;padding-top: 250px !important;overflow-y: auto;padding-bottom: 64px;">

				<div style="width: 100% !important;background: transparent;padding-left: 100px;padding-right: 100px;">

					<a href="index.php" style="padding-bottom: 100px;">

						<div>

							<img src="images/logo.png">

						</div>

					</a>

					<div style="margin-top: 30px;">

						<div class="log-text">

							<h4>Create an Account</h4>

						</div>

						<div style="margin-top: 30px;">

							<form method="POST" style="display: flex;flex-direction: column;gap: 12px;">

								<div style="display: flex;">

									<div style="width: 10% !important;height: 56px;background: white;display: flex;justify-content: center;align-items: center;border-top-left-radius: 20px;border-bottom-left-radius: 20px;box-shadow: -3px 0px 10px #D8F3FF; border-top: 1px solid #13B7FD;border-bottom: 1px solid #13B7FD;border-left: 1px solid #13B7FD;border-right: none;">

										<div style="background: transparent;width: 24px;height: 24px;margin-left: 10px;">

											<img src="images/mail.png" style="width: 100% !important;height: 100% !important;">

										</div>

									</div>

									<div style="width: 100% !important;">

										<input type="email" required name="email" class="form-control person" style="background: white;box-shadow: 10px 0px 10px #D8F3FF; border-top: 1px solid #13B7FD;border-bottom: 1px solid #13B7FD;border-right: 1px solid #13B7FD;border-left: none !important;border-radius: 0px;height: 56 !important;border-top-right-radius: 20px;border-bottom-right-radius: 20px;" placeholder="Email Address">

									</div>

								</div>

								<div style="display: flex;">

									<div style="width: 10% !important;height: 56px;background: white;display: flex;justify-content: center;align-items: center;border-top-left-radius: 20px;border-bottom-left-radius: 20px; border-top: 1px solid var(--Neutrals-Neutrals200, #CCCBCB);border-bottom: 1px solid var(--Neutrals-Neutrals200, #CCCBCB);border-left: 1px solid var(--Neutrals-Neutrals200, #CCCBCB);border-right: none;">

										<div style="background: transparent;width: 24px;height: 24px;margin-left: 10px;">

											<img src="images/lock.png" style="width: 100% !important;height: 100% !important;">

										</div>

									</div>

									<div style="width: 100% !important;">

										<input type="password" required name="password" class="form-control person" style="background: white;border-top: 1px solid var(--Neutrals-Neutrals200, #CCCBCB);border-bottom: 1px solid var(--Neutrals-Neutrals200, #CCCBCB);border-right: 1px solid var(--Neutrals-Neutrals200, #CCCBCB);border-left: none !important;border-radius: 0px;height: 56 !important;border-top-right-radius: 20px;border-bottom-right-radius: 20px;" minlength="8" maxlength="20" placeholder="Password">

									</div>

								</div>

								<div class="form-group" style="margin-top: 20px;display: flex;gap: 10px;">

									<input type="checkbox" name="notification" style="width: 20px;height: 20px;border: 1px solid grey;">
									<font style="font-size: 14px;color: #433E3F;">Receive notifications via email</font>

								</div>

								<div class="form-group" style="margin-top: 20px;">

									<input type="submit" name="submit" class="submit" value="Create Account">

								</div>

								<div style="margin-top: 20px;">

									<div>

										<div>

											<img src="images/Dividers.png">

										</div>

									</div>

									<div style="display: flex;flex-direction: column;gap: 10px;margin-top: 20px;">

										<a href="google_auth.php?action=register">

											<div class="google">

												<div style="width: 24px;height: 24px;">

													<img src="images/google.png" style="width: 100% !important;height: 100% !important;">

												</div>

												<div>

													<font>Continue with Google</font>

												</div>

											</div>

										</a>

										<a href="linkedin_auth.php?action=register">

											<div class="google">

												<div style="width: 24px;height: 24px;">

													<img src="images/linkedin.png" style="width: 100% !important;height: 100% !important;">

												</div>

												<div>

													<font>Continue with LinkedIn</font>

												</div>

											</div>

										</a>

									</div>

									<div style="margin-top: 20px;">

										<font>Already have an Account? <a href="login.php">Login</a></font>

									</div>

								</div>

							</form>

						</div>

					</div>

				</div>

			</div>

		</div>

	</div>

</body>

<script type="text/javascript">
	// Array of text options

	const contentOptions = [{
			text: "This is the first text option.",
			staffName: "Moyin Adedeji",
			staffRole: "Designer, McGeorge"
		},
		{
			text: "Oluwatosin Lloyd Akinfenwa made the app man. He is working well, He is just using this text to test his JS",
			staffName: "Oluwatosin Lloyd Akinfenwa",
			staffRole: "Web Developer, McGeorgeConsulting LTD."
		},
		{
			text: "Oluwatosin Akinfenwa created an innovative login system that enhances security and user experience.",
			staffName: "Jane Smith",
			staffRole: "Graphic Designer, Creative Studio"
		},
		{
			text: "Oluwatosin Akinfenwa designed a user-friendly interface that has been praised by all users.",
			staffName: "Emily Johnson",
			staffRole: "UI/UX Designer, Innovatech"
		},
		{
			text: "Oluwatosin Akinfenwa developed a scalable backend system that handles millions of requests efficiently.",
			staffName: "David Brown",
			staffRole: "Front-End Developer, CodeWorks"
		}
	];

	// Function to change the text and staff details randomly
	function changeContent() {
		const randomIndex = Math.floor(Math.random() * contentOptions.length);
		document.getElementById("randomText").innerText = contentOptions[randomIndex].text;
		document.getElementById("staffInfo").innerHTML = `
      <font>${contentOptions[randomIndex].staffName}</font>
      <font style="color: grey !important; font-size: 12px;">${contentOptions[randomIndex].staffRole}</font>
    `;
	}
	// Change content every 3 seconds (3000 milliseconds)
	setInterval(changeContent, 3000);

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