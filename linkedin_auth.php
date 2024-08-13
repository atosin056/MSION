<?php

require_once 'vendor/autoload.php'; // Include LinkedIn API Client Library

use Happyr\LinkedIn\LinkedIn;

// Initialize the LinkedIn client
$clientID = 'YOUR_LINKEDIN_CLIENT_ID';
$clientSecret = 'YOUR_LINKEDIN_CLIENT_SECRET';
$redirectUrl = 'http://localhost/Qwizzy/linkedin_auth.php';

// Creating LinkedIn client
$linkedin = new LinkedIn($clientID, $clientSecret);

$linkedin->setRedirectUrl($redirectUrl);

if (isset($_GET["code"])) {
    
    // Fetch the access token using the authorization code
    $accessToken = $linkedin->getAccessToken($_GET['code']);

    // Set the access token to the LinkedIn client
    $linkedin->setAccessToken($accessToken);

    // Get user information from LinkedIn
    $linkedin_info = $linkedin->get('v2/me');
    $email_info = $linkedin->get('v2/emailAddress?q=members&projection=(elements*(handle~))');

    $email = $email_info['elements'][0]['handle~']['emailAddress'];
    $firstName = $linkedin_info['localizedFirstName']; // First name
    $lastName = $linkedin_info['localizedLastName'];  // Last name

    // My Insert Query
    session_start();

    $_SESSION["email"] = $email;
    $_SESSION["firstname"] = $firstName;
    $_SESSION["lastname"] = $lastName;

    include 'connect.php';

    $select = "SELECT * FROM `users` WHERE `email`='" . $_SESSION["email"] . "'";
    $select_query = mysqli_query($conn, $select);

    if (mysqli_num_rows($select_query) > 0) {
        header('location: dashboard.php');
    } else {
        $otp = random_int(0, 5) . random_int(0, 5) . random_int(0, 5) . random_int(0, 5) . random_int(0, 5) . random_int(0, 5);

        $insert = "INSERT INTO `users` (`id`,`firstname`,`lastname`,`email`,`password`,`phone`,`address`,`otp`) VALUES (NULL,'" . $_SESSION["firstname"] . "','" . $_SESSION["lastname"] . "','" . $_SESSION["email"] . "',' ',' ',' ','" . $otp . "')";

        $insert_query = mysqli_query($conn, $insert);

        if ($insert_query) {
            header('location: proceed.php?passkey=yes');
        }
    }

} else {
    // Redirect to LinkedIn authentication page
    $loginUrl = $linkedin->getLoginUrl(['scope' => 'r_liteprofile r_emailaddress']);
    header('Location: ' . $loginUrl);
}

?>
