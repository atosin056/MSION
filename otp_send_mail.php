<?php

include 'connect.php';

require 'vendor/autoload.php'; // Ensure you've installed the Mailgun library via Composer

use Mailgun\Mailgun;

session_start();

if (!isset($_SESSION['otp_email_send'])) {
 
    header('location: register.php');
 
    exit;

}

else {

    $otp = random_int(1,9).random_int(1,9).random_int(1,9).random_int(1,9).random_int(1,9);

    $body = '
    <html>

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title></title>

</head>

<body style="width: 100% !important;display: flex;justify-content: center;">

<div style="padding: 20px;background: #013E59;width: 50% !important;display: flex;justify-content: center;">

    <div style="background: #white;height: 100% !important;width: 100%;display: flex;align-items: center;">
        
        <div style="background: #ffffff9c;width: 100% !important;height: auto;padding-left: 20px;padding-right: 20px;padding-bottom: 100px;color: #013E59;">

            <div>

                <p style="font-family: poppins;text-align: center;font-size: 25px;font-weight: 600;">Hullo User 👋</p>

                <p style="font-family: poppins;">Here is your OTP:</p>

                <div style="display: flex;justify-content: center;padding: 5px;">

                    <div style="background: #013E59;width: auto;padding-left: 20px;padding-right: 20px;border-radius: 100px;">

                        <p style="letter-spacing: 10px;color: white;font-weight: 600;font-family: poppins;border-radius: 100px;">' . $otp . '</p>

                    </div>

                </div>

                <p style="font-family: poppins;line-height: 30px;">Please use the following One Time Password (OTP) to complete your login process. This code is valid for the next 10 minutes. 
    If you did not request this OTP, please ignore this email.</p>
           
            </div>

        
        </div>
    
    </div>

</div>

</body>

</html>';

    if (isset($_SESSION["otp_email_send"])) {
       
        $mg = Mailgun::create('key-b5432b4fe8edec8fb33a835f1deec977'); // Your Mailgun API key
       
        $domain = "sandboxd9a1d2b46dc84cfe95de719c6aab5939.mailgun.org"; // Your Mailgun sandbox domain

        try {
       
            $response = $mg->messages()->send($domain, [
       
                'from'    => 'MSION@sandboxd9a1d2b46dc84cfe95de719c6aab5939.mailgun.org',
       
                'to'      => $_SESSION["otp_email_send"],
       
                'subject' => 'MSION Registration OTP Code',
       
                'html'    => $body,
       
            ]);

            $insert = "INSERT INTO `otp` (`id`, `otp`, `email`) VALUES (NULL, '$otp', '".$_SESSION["otp_email_send"]."')";
       
            $insert_query = mysqli_query($conn, $insert);


            if ($insert_query) {

                header('location: verify_otp.php');

                exit;

            }

        }

        catch (Exception $e) {
        
            echo 'Caught exception: ' . $e->getMessage() . "\n";
        
        }
    
    }

}

?>