<?php

session_start();

include 'connect.php';

if (!isset($_GET["job_id"])) {
	
	header('location: jobsearch.php');

}

else{

	$job_id = $_GET["job_id"];

	$insert = "INSERT INTO `saved_jobs` (`id`,`unique_id`,`email`) VALUES (NULL, '".$job_id."','".$_SESSION["email"]."')";

	$insert_query = mysqli_query($conn, $insert);

	if ($insert_query) {
		
		header('location: dashboard.php');

	}

}

?>