<?php

include '../connect.php';
require '../vendor/autoload.php'; // Ensure you've installed the Sendinblue library via Composer

use SendinBlue\Client\Configuration;
use SendinBlue\Client\Api\TransactionalEmailsApi;
use GuzzleHttp\Client;

session_start();

if (!isset($_SESSION['otp_email_send'])) {
    header('location: register.php');
    exit;
} else {
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
        // Initialize Sendinblue API
        $config = Configuration::getDefaultConfiguration()->setApiKey('api-key', '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');
        $apiInstance = new TransactionalEmailsApi(
            new Client(),
            $config
        );

        $sendSmtpEmail = new \SendinBlue\Client\Model\SendSmtpEmail([
            'subject' => 'MSION Registration OTP Code',
            'sender' => ['name' => 'MSION', 'email' => 'atosin056@gmail.com'],
            'to' => [['email' => $_SESSION["otp_email_send"], 'name' => 'User']],
            'htmlContent' => $body
        ]);

        try {
            $response = $apiInstance->sendTransacEmail($sendSmtpEmail);
            // Insert OTP into database
            $insert = "INSERT INTO `otp` (`id`, `otp`, `email`) VALUES (NULL, '$otp', '".$_SESSION["otp_email_send"]."')";
            $insert_query = mysqli_query($conn, $insert);

            if ($insert_query) {
                header('location: verify_otp.php');
                exit;
            }

        } catch (Exception $e) {
            echo 'Exception when calling TransactionalEmailsApi->sendTransacEmail: ', $e->getMessage(), PHP_EOL;
        }
    }
}

?>
