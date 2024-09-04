<?php

session_start();

include 'connect.php';

// Initialize the total count

$total = 17;

// Initialize inserted count

$insertedCount = isset($_SESSION['insertedCount']) ? $_SESSION['insertedCount'] : 0;



// Check if the form has been submitted

if (isset($_POST["submit"])) {

    $filter = $_POST["filter"];


    

                $updatedb = "INSERT INTO `job_filters` (`id`,`filter`) VALUES (NULL, '".$filter."')";

                $updatedb_query = mysqli_query($conn, $updatedb);

                if ($updatedb_query) {

                    // Increment the count if insertion is successful

                    $insertedCount++;

                    $_SESSION['insertedCount'] = $insertedCount;

                }

            }

// Calculate remaining count

$remaining = $total - $insertedCount;

?>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Upload logos</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>

<!-- Display the current progress -->
<h1><?php echo $insertedCount; ?> down, <?php echo $remaining; ?> more to go</h1>

<form method="POST">
    <input type="text" name="filter" placeholder="Filter name" required>
    <input type="submit" name="submit">
</form>

</body>
</html>
