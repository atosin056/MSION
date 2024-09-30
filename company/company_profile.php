<?php

session_start();

include '../connect.php';

if (!isset($_GET["fid"])) {

	header('location: register.php');
}

if (isset($_POST["create"])) {

	$company_name = mysqli_real_escape_string($conn, $_POST["name"]);

	$website = mysqli_real_escape_string($conn, $_POST["website"]);

	//Get the Unique id for the User

	$unique_id = $_GET["fid"];


	$update = "UPDATE `company_users` SET `company_name`='" . $company_name . "', `company_website`='" . $website . "' WHERE `unique_id`='" . $unique_id . "'";

	$update_query = mysqli_query($conn, $update);

	if ($update_query) {

		$_SESSION["companys_name"] = $company_name;

		header('location: company_otp_send_email.php');
	}
}

?>

<html>

<head>

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>MSI Nigeria - Where talents meet opportunities. | Login to your Account</title>

	<link rel="preconnect" href="https://fonts.googleapis.com">

	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="../css/main.css">

</head>

<body>

	<div style="width: 100% !important;height: 100% !important;background: yellow;">

		<div style="height: 100% !important;width: 100% !important;margin: 0;padding: 0;" class="row">

			<div class="col-lg-6 col-md-6 col-sm-6" style="background: url('../images/log.png');height: 100% !important;display: flex;flex-direction: column;gap: 24px;padding-top: 50px;padding-left: 50px;">

				<div style="background: transparent;width: 100% !important;display: flex;justify-content: flex-start;">

					<div>

						<img src="../images/logo.png">

					</div>

				</div>

				<div style="width: 100% !important;height: 90%;display: flex;justify-content: center;align-items: center;">

					<div class="login-bg">

						<div style="width: 100% !important;display: flex;justify-content: center;">

							<img src="../images/mess.png">

						</div>

						<div>

							<p id="randomText" style="text-align: center;line-height: 30px;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>

						</div>

						<div style="display: flex;flex-direction: column;text-align: center;" id="staffInfo">

							<font>Moyin Adedeji</font>

							<font style="color: grey !important;font-size: 12px;">Designer, McGeorge</font>

						</div>

					</div>

				</div>

			</div>

			<div class="col-lg-6 col-md-6 col-sm-6" style="background: white;height: 100% !important;display: flex;justify-content: center;align-items: center;padding-top: 210px !important;overflow-y: auto;padding-bottom: 64px;">

				<div style="width: 100% !important;background: transparent;padding-left: 100px;padding-right: 100px;">

					<div class="log-text">

						<h4>Create Company’s profile</h4>

					</div>

					<div style="margin-top: 30px;">

						<form method="POST" style="display: flex;flex-direction: column;gap: 12px;">

							<div style="display: flex;">

								<div style="width: 100% !important;">

									<input type="text" name="name" class="form-control person" style="height: 56px;padding-left: 20px;border-radius: 20px;" placeholder="Company Name">

								</div>

							</div>

							<div style="display: flex;">

								<div style="width: 100% !important;">

									<input type="url" name="website" class="form-control person" style="padding-left: 20px;border-radius: 20px;height: 56px;" placeholder="Company website">

								</div>

							</div>

							<div class="form-group" style="margin-top: 20px;">

								<input type="submit" name="create" class="submit" value="Create Company">

							</div>

							<div style="display: flex;justify-content: space-between;width: 100% !important;margin-top: 20px;">

								<div>

									<font>I need a Job? <a href="../register.php">Create job seeker account</a></font>

								</div>

								<div>

									<a href="register.php">Go Back</a></font>

								</div>

							</div>

						</form>

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