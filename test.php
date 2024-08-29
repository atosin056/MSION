<?php
session_start();

include 'connect.php';

// Initialize the total count

$total = 72;

// Initialize inserted count

$insertedCount = isset($_SESSION['insertedCount']) ? $_SESSION['insertedCount'] : 2;



// Check if the form has been submitted

if (isset($_POST["submit"])) {

    $stack_name = $_POST["stack_name"];



    // File upload handling

    if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] <= 0) {

        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png", "PNG" => "image/PNG", "gif" => "image/gif");

        $filename = $_FILES["photo"]["name"];

        $filetype = $_FILES["photo"]["type"];

        $filesize = $_FILES["photo"]["size"];



        $ext = pathinfo($filename, PATHINFO_EXTENSION);



        if (!array_key_exists($ext, $allowed)) {

            die("Please select a valid file format");

        }


        $maxsize = 5000000000000 * 1024 * 1024;

        if ($filesize > $maxsize) {

            die("Error: Filesize too massive");


        }

        if (in_array($filetype, $allowed)) {

            $move = move_uploaded_file($_FILES["photo"]["tmp_name"], "logos/" . $filename);



            if ($move) {

                $updatedb = "INSERT INTO `logos` (`id`,`stack_name`,`stack_picture`) VALUES (NULL, '".$stack_name."','".$filename."')";

                $updatedb_query = mysqli_query($conn, $updatedb);

                if ($updatedb_query) {

                    // Increment the count if insertion is successful

                    $insertedCount++;

                    $_SESSION['insertedCount'] = $insertedCount;

                }

            }

        }

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

<form method="POST" enctype="multipart/form-data">
    <input type="file" name="photo" required>
    <input type="text" name="stack_name" placeholder="stack name" required>
    <input type="submit" name="submit">
</form>

</body>
</html>
