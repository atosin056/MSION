<?php

session_start();

require_once 'vendor/autoload.php'; // Include LinkedIn API Client Library

// LinkedIn API credentials

$clientID = '776d6sag7ov48j';

$clientSecret = 'fI4mrSCMZhBgIvxv';

$redirectUrl = 'https://5e6b-105-112-67-21.ngrok-free.app/MSION/linkedin_auth.php';



// Initialize the LinkedIn client

$client = new \League\OAuth2\Client\Provider\GenericProvider([

    'clientId'                => $clientID,    // The client ID assigned to you by LinkedIn

    'clientSecret'            => $clientSecret, // The client password assigned to you by LinkedIn

    'redirectUri'             => $redirectUrl,

    'urlAuthorize'            => 'https://www.linkedin.com/oauth/v2/authorization',

    'urlAccessToken'          => 'https://www.linkedin.com/oauth/v2/accessToken',

    'urlResourceOwnerDetails' => 'https://api.linkedin.com/v2/me',

]);

// Request authorization

$authorizationUrl = $client->getAuthorizationUrl([

    'scope' => ['profile', 'email']

]);


if (isset($_GET['code'])) {
    
    // Retrieve the access token
    
    $accessToken = $client->getAccessToken('authorization_code', [
    
        'code' => $_GET['code']
    
    ]);

    // Fetch the user's profile information
    
    $resourceOwner = $client->getResourceOwner($accessToken);

    // Get profile details
    
    $profileResponse = file_get_contents('https://api.linkedin.com/v2/emailAddress?q=members&projection=(elements*(handle~))', false, stream_context_create([
    
        'http' => [
    
            'header' => 'Authorization: Bearer ' . $accessToken->getToken()
    
        ]
    
    ]));

    $profileData = json_decode($profileResponse, true);
    
    $email = $profileData['elements'][0]['handle~']['emailAddress'];

    // Handle the email address
    
    $_SESSION['linkedin_email'] = $email;

    // Your existing code for user handling
    
    include 'connect.php';

    // Check if the user is logging in or signing up
    
    $select = "SELECT * FROM `users` WHERE `email`='" . $_SESSION['linkedin_email'] . "'";
    
    $select_query = mysqli_query($conn, $select);

    if (mysqli_num_rows($select_query) > 0) {
    
        while ($row = mysqli_fetch_assoc($select_query)) {
    
            $email = $row['email'];
    
            $_SESSION['logged_email'] = $email;
    
        }

        if (isset($_SESSION['logged_email'])) {
    
            // Perform other stuff here
    
            header('Location: dashboard.php');
    
        }

    }

    else {

        // Register the user

        $insert = "INSERT INTO `users` (`id`, `email`, `unique_id`) VALUES (NULL, '" . $email . "','" . $unique_id . "')";

        $insert_query = mysqli_query($conn, $insert);

        if ($insert_query) {

            $_SESSION['linkedin_email_send'] = $email;

            if (isset($_SESSION['linkedin_email_send'])) {

                header('Location: otp_send_mail.php');

            }

        }

    }

}

else {
 
    // Redirect to LinkedIn for authorization
 
    $authorizationUrl = $client->getAuthorizationUrl();
 
    $_SESSION['oauth2state'] = $client->getState();
 
    header('Location: ' . $authorizationUrl);
}

if (isset($_GET['error'])) {
    
    // Log the error for debugging
    
    error_log('LinkedIn OAuth Error: ' . $_GET['error_description']);
    
    // Redirect to a custom error page
    
    header('Location: register.php?error=' . urlencode($_GET['error_description']));
    
    exit;

}

?>
