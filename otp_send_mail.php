<?php

include 'connect.php';

require 'vendor/autoload.php'; // Ensure you've installed the Mailgun library via Composer

use Mailgun\Mailgun;

session_start();

if (!isset($_SESSION['otp_email_send'])) {
    
    header('location: register.php');

}

else{

    $otp = random_int(1,9).random_int(1,9).random_int(1,9).random_int(1,10).random_int(1,9);

    $body = $otp;

    if (isset($_SESSION["otp_email_send"])) {
      
        // Instantiate the client.
      
        $mg = Mailgun::create('key-b5432b4fe8edec8fb33a835f1deec977'); // Your Mailgun API key
      
        $domain = "sandboxd9a1d2b46dc84cfe95de719c6aab5939.mailgun.org"; // Your Mailgun sandbox domain

        try {
            
            // Define the email parameters
            
            $response = $mg->messages()->send($domain, [
            
                'from'    => 'MSION@sandboxd9a1d2b46dc84cfe95de719c6aab5939.mailgun.org', // Must use the sandbox domain email
               
                'to'      => $_SESSION["otp_email_send"],
               
                'subject' => 'MSION Registration OTP Code',
               
                'html'    => $body,
           
            ]);

            // Insert into OTP table

            $insert = "INSERT INTO `otp` (`id`,`otp`,`email`) VALUES (NULL,'".$otp."','".$_SESSION["otp_email_send"]."')";

            $insert_query = mysqli_query($conn, $insert);

            if ($insert_query) {
                
                header('location: verify_otp.php');

            }
        
        } catch (Exception $e) {
         
            echo 'Caught exception: '. $e->getMessage() ."\n";
        
        }
    
    }

}
?>
