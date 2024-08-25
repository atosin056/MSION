<?php

session_start();

$t = session_destroy();

if ($t) {
	
	header('location: index.php');

}

?>