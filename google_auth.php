<?php

require_once 'vendor/autoload.php'; // Include Google API Client Library

// Initialize the Google client
$clientID = '351934803577-50ddfmp2cm6h7gcbubas4qtnm8kc190i.apps.googleusercontent.com';

$clientSecret = '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';

$redirectUrl = 'http://localhost/MSION/google_auth.php';


//Creating google client

$client = new Google_Client();

$client->setClientId($clientID);

$client->setClientSecret($clientSecret);

$client->setRedirectUri($redirectUrl);

$client->addScope('profile');

$client->addScope('email');


if (isset($_GET["code"])) {
	
	$token = $client->fetchAccessTokenWithAuthCode($_GET["code"]);

	$client->setAccessToken($token);


	$gauth = new Google_Service_Oauth2($client);

	$google_info = $gauth->userinfo->get();

	$email = $google_info->email;


	$unique_id = $_SESSION["unique_id"];

    session_start();

	$_SESSION["otp_send_email"] = $email;

	include 'connect.php';

	//Check if User is Logging in or signing Up

	$select = "SELECT * FROM `users` WHERE `email`='".$_SESSION["otp_send_email"]."'";

	$select_query = mysqli_query($conn, $select);

	if (mysqli_num_rows($select_query) > 0) {

		while ($row = mysqli_fetch_assoc($select_query)){
		
			$email = $row["email"];

			$_SESSION["logged-email"] = $email;

		}

		if (isset($_SESSION['logged_email'])) {
			
			//Perform Other stuff here 

			//I would need to do this cuz i need the user cv, stack and all

			header('location: dashboard.php');

		}

	}

	//Register The User.

	else{	

		$insert = "INSERT INTO `users` (`id`,`email`,`unique_id`) VALUES (NULL, '".$email."','".$unique_id."')";

		$insert_query = mysqli_query($conn, $insert);

		if ($insert_query) {
			
			$_SESSION["otp_email_send"] = $email;

			if (isset($_SESSION["otp_email_send"])) {
	
				header('location: otp_send_mail.php');

			}

		}

	}

}

else{

	header('Location: ' . $client->createAuthUrl());

}


?>
