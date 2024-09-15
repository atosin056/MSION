<?php

session_start();

include '../connect.php';

include '../functions.php';

$email = $_GET["email"];

$job_id = $_GET["job_id"];

$sel = "SELECT * FROM `users` WHERE `email`='".$email."'";

$sel_query = mysqli_query($conn, $sel);

if (mysqli_num_rows($sel_query) > 0) {
	
	while ($roe = mysqli_fetch_assoc($sel_query)){

		$fullname = $roe["fullname"];

		$_SESSION['fname'] = $fullname;

	}

}



//Update the Database

$update = "UPDATE `applicants` SET `application_status`='Hired' WHERE `job_id`='".$job_id."' AND `email`='".$email."'";

$update_query = mysqli_query($conn, $update);

if ($update_query) {
	
	$select = "SELECT * FROM `job` WHERE `unique_id`='".$job_id."'";

	$select_query = mysqli_query($conn, $select);

	if (mysqli_num_rows($select_query) > 0) {
		
		while ($row = mysqli_fetch_assoc($select_query)){

			$company_name = $row["company_name"];

		}

		

	}

	header('location: hired_send_email.php?email='.$email.'&&company_name='.$company_name.'&&job_id='.$job_id.'&&company_email='.$_SESSION["email"]);


}


?>