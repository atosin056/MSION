<?php
session_start();

include('../connect.php'); // Include your database connection

$sender = $_SESSION["email"];

$receiver = $_GET["email"];

$message_select = "SELECT * FROM `messages` WHERE (`sender`='$sender' AND `reciever`='$receiver') OR (`reciever`='$sender' AND `sender`='$receiver')";

$message_select_query = mysqli_query($conn, $message_select);

$messages = [];

if (mysqli_num_rows($message_select_query) > 0) {

    while ($futch = mysqli_fetch_assoc($message_select_query)) {

        $messages[] = $futch;

    }

}

echo json_encode($messages);

?>
