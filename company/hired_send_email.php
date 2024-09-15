
<?php


include '../connect.php';

include '../functions.php';



use SendinBlue\Client\Configuration;

use SendinBlue\Client\Api\TransactionalEmailsApi;

use GuzzleHttp\Client;

session_start();

$job_id = $_GET["job_id"];

$email = $_GET["email"];

if (!isset($_GET['email']) || !isset($_GET["company_name"]) || !isset($_GET["job_id"])) {

    header('location: dashboard.php?error');

    exit;

} 


else {
     // code...

   

    $body = '
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>You have Received This Job</title>
    <style>
        body {
            margin: 0;
            font-family: Tahoma, Geneva, Verdana, sans-serif;
            background: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #555;
        }
        .container {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 90%;
            max-width: 600px;
            text-align: center;
        }
        .header {
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            color: #ffffff;
            padding: 20px;
            border-radius: 12px 12px 0 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 700;
        }
        .profile {
            margin: 20px 0;
            text-align: center;
        }
        .profile h2 {
            margin: 10px 0;
            font-size: 22px;
            color: #333;
        }
        .profile p {
            font-size: 16px;
            color: #666;
        }
        .content {
            margin: 20px 0;
            font-size: 16px;
            line-height: 1.6;
        }
        .content p {
            margin: 10px 0;
        }
        .button {
            display: inline-block;
            padding: 12px 24px;
            font-size: 16px;
            font-weight: 600;
            color: #ffffff;
            background: #6e8efb;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            cursor: pointer;
            transition: background 0.3s, transform 0.3s;
            margin-top: 20px;
        }
        .button:hover {
            background: #5a7dff;
            transform: translateY(-2px);
        }
        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #888;
        }
        .footer p {
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>You have Received This Job</h1>
        </div>
        <div class="profile">
            <h2>'.$_GET["company_name"].'</h2>
            <p>'.$_GET["company_email"].'</p>
        </div>
        <div class="content">
            <p>Congratulations!</p>
            <p>You have received a new job opportunity. Please review the details below and get in touch if you have any questions or need further information.</p>
            <a href="http://localhost/MSION/login.php" class="button" target="_blank">Go back to website</a>
        </div>
        <div class="footer">
            <p>&copy; 2024 MSION. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
';
       
       // Initialize Sendinblue API
       
        $config = Configuration::getDefaultConfiguration()->setApiKey('api-key', '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');
       
        $apiInstance = new TransactionalEmailsApi(
       
            new Client(),
       
            $config
       
        );



        $sendSmtpEmail = new \SendinBlue\Client\Model\SendSmtpEmail([

            'subject' => 'MSION Job Application Success',

            'sender' => ['name' => 'MSION', 'email' => 'atosin056@gmail.com'],

            'to' => [['email' => $_GET["email"], 'name' => 'User']],

            'htmlContent' => $body

        ]);



        try {

            $response = $apiInstance->sendTransacEmail($sendSmtpEmail);

            // Insert OTP into database

            $insert = "INSERT INTO `hired` (`id`, `email`, `job_id`,`company_name`) VALUES (NULL, '".$_GET["email"]."', '".$_GET["job_id"]."','".$_GET["company_name"]."')";

            $insert_query = mysqli_query($conn, $insert);

            if ($insert_query) {
                
                header('location: dials.php?hired='.$email.'&&job_id='.$job_id);
                
                exit;
            
            }

            else{

                echo 'Tosin';

            }

        }

        catch (Exception $e) {
        
            echo 'Exception when calling TransactionalEmailsApi->sendTransacEmail: ', $e->getMessage(), PHP_EOL;
        
        }
    
    }



?>
