<?php

session_start();

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


	$_SESSION["otp_send_email"] = $email;

	include 'connect.php';

	//Check if User is Logging in or signing Up

	$select = "SELECT * FROM `users` WHERE `email`='".$_SESSION["otp_send_email"]."'";

	$select_query = mysqli_query($conn, $select);

	if (mysqli_num_rows($select_query) > 0) {

		while ($row = mysqli_fetch_assoc($select_query)){
		
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

	elseif(mysqli_num_rows($select_query) == 0) {

		$select2 = "SELECT * FROM `company_users` WHERE `email`='".$_SESSION["otp_send_email"]."'";

		$select2_query = mysqli_query($conn, $select2);

		if (mysqli_num_rows($select2_query) > 0) {
			
			

		}

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

}

else{

	header('Location: ' . $client->createAuthUrl());

}


?>
