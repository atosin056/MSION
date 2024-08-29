<?php

session_start();

include 'connect.php';

if (isset($_GET["search"]) && !isset($_GET["location"])) {
	
	$keyword = $_GET["search"];

	$select = "SELECT DISTINCT jobs.* FROM jobs LEFT JOIN tag ON jobs.unique_id = tag.unique_id WHERE jobs.jobtitle = '".$search."' OR tag.tag = '".$search."'";

	

}

?>