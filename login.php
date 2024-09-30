<?php

session_start();

include 'connect.php';

use SendinBlue\Client\Configuration;

use SendinBlue\Client\Api\TransactionalEmailsApi;

use GuzzleHttp\Client;


if (isset($_POST["submit"])) {

	$email = $_POST["email"];

	$password = md5($_POST["password"]);

	if (isset($_GET["reg"])) {

		require 'vendor/autoload.php';



		$body = '<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Welcome to MSI Nigeria</title>
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
            <img src="http://MSI Nigeriatest.mtest.org.ng/images/logo.png" alt="MSI Nigeria Logo">
        </div>
        <div class="email-content">
            <h1>Welcome on Board 👋! ' . $email . '</h1>
            <p style="line-height: 30px;">We are thrilled to welcome you to MSI Nigeria! We are excited to have you join our community, where job opportunities and professional growth await you. Whether you are looking to explore new roles, enhance your skills, or take your career to the next level, we are here to support you every step of the way.</p>
            
            <p style="line-height: 30px;">At MSI Nigeria, we believe in making your job search and professional development as smooth and fulfilling as possible. Our platform is designed to match you with opportunities that align with your skills, experience, and aspirations. Beyond job listings, we provide resources and expert guidance to help you grow, learn, and stay ahead in today’s competitive job market.</p>
            
            <p>Now that you are part of MSI Nigeria, we encourage you to explore all the tools and features available to you. Complete your profile to help us find the best opportunities for you, and don’t hesitate to dive into our wide range of job listings. Your professional journey is unique, and we are committed to supporting you along the way.</p>
            
            <p>We’re confident that your experience with MSI Nigeria will be productive and rewarding. Our team is dedicated to helping you reach your career goals, and we can’t wait to see what you achieve.</p>
            
            <p>If you have any questions or need assistance, we are always here to help. Welcome once again, and let’s get started on building a brighter future together!</p>
        </div>
        <div class="email-footer">
            <p>Warm Regards,</p>
            <p>The MSI Nigeria team!</p>
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

			'subject' => 'MSI Nigeria Registration Completion',

			'sender' => ['name' => 'MSI Nigeria', 'email' => 'atosin056@gmail.com'],

			'to' => [['email' => $email, 'name' => 'User']],

			'htmlContent' => $body

		]);



		try {

			$response = $apiInstance->sendTransacEmail($sendSmtpEmail);

			// Insert OTP into database

			header('location: login.php');
		} catch (Exception $e) {

			echo 'Exception when calling TransactionalEmailsApi->sendTransacEmail: ', $e->getMessage(), PHP_EOL;
		}
	} else {


		//check the DB and find the user and store his data in a session

		$select = "SELECT * FROM `users` WHERE `email`='" . $email . "' AND `password`='" . $password . "'";

		$select_query = mysqli_query($conn, $select);

		if (mysqli_num_rows($select_query) > 0) {

			while ($row = mysqli_fetch_assoc($select_query)) {

				$id = $row["id"];

				$profile = $row["profile"];

				$biography = $row["biography"];

				$email = $row["email"];

				$password = $row["password"];

				$fullname = $row["fullname"];

				$title = $row["title"];

				$looking = $row["looking"];

				$cv = $row["cv"];

				$status = $row["acct_status"];

				$unique_id = $row["unique_id"];

				$cv_rating = $row["cv_rating"];


				$_SESSION['cv_rating'] = $cv_rating;

				$_SESSION["unique_id"] = $unique_id;

				$_SESSION["acct_status"] = $status;

				$_SESSION["looking"] = $looking;

				$_SESSION["cv"] = $cv;

				$_SESSION["logged_id"] = $id;

				$_SESSION["fullname"] = $fullname;

				$_SESSION['title'] = $title;

				$_SESSION["profile-pic"] = $profile;

				$_SESSION["biography"] = $biography;

				$_SESSION["email"] = $email;

				$_SESSION["password"] = $password;
			}

			header('location: dashboard.php');
		}

		//Register The User.

		elseif (mysqli_num_rows($select_query) == 0) {

			$select2 = "SELECT * FROM `company_users` WHERE `email`='" . $email . "' AND `password`='" . $password . "'";

			$select2_query = mysqli_query($conn, $select2);

			if (mysqli_num_rows($select2_query) > 0) {

				while ($r = mysqli_fetch_assoc($select2_query)) {

					$uniqueid = $r["unique_id"];

					$_SESSION["comp_unique"] = $uniqueid;
				}

				header('location: company/dashboard.php?query=' . $uniqueid);
			} else {

				$error_response = true;

				if ($error_response) {

					$error_msg = 'You have Entered an Incorrect OTP, Please check your Inbox and Try again';

					echo '<div style="width: 100% !important;display: flex;justify-content: center;position: absolute;margin-top: 20px;">

	<div class="error-msg" id="error-msg">
					
		<p>You have Entered Incorrect Login Details, Please Try again</p>

	</div>

</div>';
				}
			}
		}
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

	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="css/main.css">

</head>

<body>

	<div style="width: 100% !important;height: 100% !important;background: yellow;">

		<div style="height: 100% !important;width: 100% !important;margin: 0;padding: 0;" class="row">

			<div class="col-lg-6 col-md-6 col-sm-6" style="background: url('images/log.png');height: 100% !important;display: flex;flex-direction: column;gap: 24px;padding-top: 50px;padding-left: 50px;">

				<div style="background: transparent;width: 100% !important;display: flex;justify-content: flex-start;">

					<a href="index.php">

						<div>

							<img src="images/logo.png">

						</div>

					</a>

				</div>

				<div style="width: 100% !important;height: 90%;display: flex;justify-content: center;align-items: center;">

					<div class="login-bg">

						<div style="width: 100% !important;display: flex;justify-content: center;">

							<img src="images/mess.png">

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

						<h4>Login with your Email</h4>

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

									<input type="text" id="pe" name="email" class="form-control person" style="background: white;box-shadow: 10px 0px 10px #D8F3FF; border-top: 1px solid #13B7FD;border-bottom: 1px solid #13B7FD;border-right: 1px solid #13B7FD;border-left: none !important;border-radius: 0px;height: 56 !important;border-top-right-radius: 20px;border-bottom-right-radius: 20px;" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" placeholder="Email Address">

								</div>

							</div>

							<div style="display: flex;">

								<div style="width: 10% !important;height: 56px;background: white;display: flex;justify-content: center;align-items: center;border-top-left-radius: 20px;border-bottom-left-radius: 20px; border-top: 1px solid var(--Neutrals-Neutrals200, #CCCBCB);border-bottom: 1px solid var(--Neutrals-Neutrals200, #CCCBCB);border-left: 1px solid var(--Neutrals-Neutrals200, #CCCBCB);border-right: none;">

									<div style="background: transparent;width: 24px;height: 24px;margin-left: 10px;">

										<img src="images/lock.png" style="width: 100% !important;height: 100% !important;">

									</div>

								</div>

								<div style="width: 100% !important;">

									<input type="password" name="password" class="form-control person" style="background: white;border-top: 1px solid var(--Neutrals-Neutrals200, #CCCBCB);border-bottom: 1px solid var(--Neutrals-Neutrals200, #CCCBCB);border-right: 1px solid var(--Neutrals-Neutrals200, #CCCBCB);border-left: none !important;border-radius: 0px;height: 56 !important;border-top-right-radius: 20px;border-bottom-right-radius: 20px;" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>" placeholder="Password">

								</div>

							</div>

							<div class="form-group" style="margin-top: 20px;">

								<input type="submit" name="submit" class="submit" value="Login">

							</div>

							<div style="margin-top: 20px;">

								<div>

									<div>

										<img src="images/Dividers.png">

									</div>

								</div>

								<div style="display: flex;flex-direction: column;gap: 10px;margin-top: 20px;">

									<a href="google_auth.php">

										<div class="google">

											<div style="width: 24px;height: 24px;">

												<img src="images/google.png" style="width: 100% !important;height: 100% !important;">

											</div>

											<div>

												<font>Login with Google</font>

											</div>

										</div>

									</a>

									<!-- <a href="linkedin_auth.php?action=login">
								
									<div class="google">
										
										<div style="width: 24px;height: 24px;">
											
											<img src="images/linkedin.png" style="width: 100% !important;height: 100% !important;">

										</div>

										<div>
											
											<font>Login with LinkedIn</font>

										</div>

									</div>

								</a> -->

								</div>

								<div style="margin-top: 20px;">

									<font>Are you new Here? <a href="register.php">Create Account</a></font>

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