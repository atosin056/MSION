<?php 
session_start();
require '../connect.php';

// Check if company_name and unique_id are set in the query string
if (isset($_GET['company_name']) && isset($_GET['unique_id'])) {
    $name = $_GET["company_name"];
    $uniqueId = $_GET["unique_id"];

    // Fetch applicants for the specified company
    $rows = mysqli_query($conn, "SELECT * FROM `applicants` WHERE `company_name`='$name'");

    // Start output buffering
    ob_start();
    ?>
    
    <table border="1">
        <tr>
            <td>id</td>
            <td>Fullname</td>
            <td>Title</td>
            <td>Phone</td>
            <td>Coverletter</td>
            <td>Email</td>
            <td>CV RATING</td>
            <td>Stage</td>
        </tr>
        <?php foreach ($rows as $row): ?>
        <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["fname"]; ?></td>
            <td><?php echo $row["title"]; ?></td>
            <td><?php echo $row["phone"]; ?></td>
            <td><?php echo $row["coverletter"]; ?></td>
            <td><?php echo $row["email"]; ?></td>
            <td><?php echo $row["cv_rating"]; ?></td>
            <td><?php echo $row["stage"]; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <?php
    // Capture the output
    $output = ob_get_clean();

    // Set headers for the Excel download
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename='Data_for_the_week.xlsx'");

    // Output the captured data
    echo $output;

    // Delete the visit record
    $delete = "DELETE FROM `visits` WHERE `unique_id`='$uniqueId'";
    mysqli_query($conn, $delete);

    // Stop further execution
    exit;
}
?>

