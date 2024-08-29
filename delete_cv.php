<?php

session_start();

include 'connect.php';

if (!isset($_SESSION["email"])) {
	
	header('location: login.php');

}

$update = "UPDATE `users` SET `cv`=' ',`cv_rating`=' ' WHERE `email`='".$_SESSION["email"]."'";

$update_query = mysqli_query($conn, $update);

if ($update_query) {
	
	$_SESSION["cv"] = ' ';

	header('location: dashboard.php');

}

?>