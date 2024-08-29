<?php

session_start();

include 'connect.php';

include 'functions.php';

if (!isset($_SESSION["email"])) {

    header('Location: login.php');

    exit();

}


$bio = $_SESSION["biography"];

$title = $_SESSION["title"];

$desired_position = $_SESSION["looking"];

// Retrieve skills

$select = "SELECT * FROM `skills` WHERE `email`='" .$_SESSION["email"] . "'";

$select_query = mysqli_query($conn, $select);

$skills = [];

if (mysqli_num_rows($select_query) > 0) {

    while ($row = mysqli_fetch_assoc($select_query)) {

        $skills[] = $row["skill"];

    }

}



// Retrieve stack

$stselect = "SELECT * FROM `stack` WHERE `email`='" .$_SESSION["email"] . "'";

$stselect_query = mysqli_query($conn, $stselect);



$stack = [];

if (mysqli_num_rows($stselect_query) > 0) {

    while ($row = mysqli_fetch_assoc($stselect_query)) {

        $stack[] = $row["stack"];

    }

}



$skills_string = implode(", ", $skills);

$stack_string = implode(", ", $stack);



// Generate CV content

$generatedContent = generateCVContent($bio, $title, $desired_position, $skills_string, $stack_string);


// Generate and download CV
createAndDownloadCV($generatedContent);

// Redirect after download (though it won't execute until the download is complete)

header('Location: dashboard.php'); // Replace with the page you want to redirect to

// exit();

?>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">


    <link rel="stylesheet" type="text/css" href="css/main.css">

    <title>Please Wait</title>

    <style>

        body {
            font-family: montserrat, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .spinner {
            border: 8px solid #f3f3f3;
            border-radius: 50%;
            border-top: 8px solid #3498db;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
            margin: 0 auto;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        h1 {
            margin: 20px 0;
        }
   
   </style>

</head>

<body>

    <div class="container">

        <div class="spinner"></div>

        <h1>Please Wait...</h1>

        <p>Your request is being processed. This may take a few moments.</p>

    </div>

</body>

</html>

