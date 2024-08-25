<?php

session_start();

require_once 'vendor/autoload.php'; // Include Google API Client Library

// Initialize the Google client
$clientID = '746496280033-si3q1fr5dkhdob0si1tva69liatmr9ut.apps.googleusercontent.com';

$clientSecret = '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';

$redirectUrl = 'http://localhost/MSION/company/google_auth.php';


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


	$_SESSION["otp_send_email"] = $email;

	include '../connect.php';

	$insert = "INSERT INTO `company_users` (`id`,`email`,`unique_id`) VALUES (NULL, '".$email."','".$unique_id."')";

	$insert_query = mysqli_query($conn, $insert);

	if ($insert_query) {
			
		$_SESSION["otp_email_send"] = $email;

		if (isset($_SESSION["otp_email_send"])) {
	
			header('location: company_profile.php?fid='.$_SESSION["unique_id"]);

		}

	}

}


else{

	header('Location: ' . $client->createAuthUrl());

}


?>
