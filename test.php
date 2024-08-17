<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Image Upload with Preview</title>
    <style>
        #imagePreview {
            margin-top: 10px;
        }
        #imagePreview img {
            max-width: 200px;
            max-height: 200px;
        }
    </style>
</head>

<body>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connect.php';
       
    $stackname = $_POST['stackname'];

    if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] <= 0) {
        
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png", "gif" => "image/gif");

        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        if (!array_key_exists($ext, $allowed)) {
            die("Please select a valid file format");
        }
        
        $maxsize = 5000000000000 * 1024 * 1024;

        if ($filesize > $maxsize) {
            die("Error: Filesize too Massive");
        }

        if (in_array($filetype, $allowed)) {
            $move = move_uploaded_file($_FILES["photo"]["tmp_name"], "logos/". $filename);

            if ($move) {
                $insert = "INSERT INTO `logos` (`id`,`stack_name`,`stack_picture`) VALUES (NULL, '".$stackname."','".$filename."')";
                $insert_query = mysqli_query($conn, $insert);

                if ($insert_query) {
                    echo 'success';
                }
            }
        }
    }
}

?>

<form method="POST" enctype="multipart/form-data">
    <label>Logo name:</label>
    <input type="file" name="photo" id="photoInput">

    <label>Stack Name</label>
    <input type="text" name="stackname" required>

    <div id="imagePreview"></div>

    <input type="submit" value="Upload">
</form>

<script>
    document.getElementById('photoInput').addEventListener('change', function(event) {
        var file = event.target.files[0];
        var preview = document.getElementById('imagePreview');

        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var img = document.createElement('img');
                img.src = e.target.result;
                preview.innerHTML = ''; // Clear previous previews
                preview.appendChild(img);
            }
            reader.readAsDataURL(file);
        } else {
            preview.innerHTML = ''; // Clear preview if no file selected
        }
    });
</script>

</body>

</html>
