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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>

<body>

<style type="text/css">
    
    body{
        margin: 0;
        padding: 0;
        font-family: montserrat;
    }
    .number-style {
        
    }
    .number-style span {
        
    }
    p{
        line-height: 30px;
    }

</style>

<div>
    
    <div style="display: flex;flex-direction: column;">

        <div>
            
            <img src="https://i.postimg.cc/pLxStymD/otp.png" style="width: 100% !important;">

        </div>

        <div style="width: 100% !important;background: white;padding-top: 50px;padding-bottom: 50px;">
            
            <div style="padding-right: 100px;padding-left: 100px;text-align: center;">
                
                <div class="user">
                    
                    <font>Hello User</font>

                </div>

                <div>
                    
                    <p style="line-height: 30px;">We are committed to ensuring the highest level of security for your account. As part of this effort, we have generated a One-Time Password (OTP) to help you access your account securely. This code is only valid for the next 10 minutes, so please make sure to use it promptly.</p>

                </div>

                <div style="width: 100% !important;display: flex;justify-content: center;">
                    
                    <<div class="number-style">
                
                <p style="display: flex;gap: 16px;text-align: center;">' . $otp . '</p>
           
           </div>
                
                </div>

                <div>
                    
                    <p style="line-height: 30px;">An OTP adds an extra layer of security by ensuring that only you can access your account, even if someone else knows your password. It’s a simple yet effective way to protect your personal and sensitive information from unauthorized access.</p>

                </div>

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