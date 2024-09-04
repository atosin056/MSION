
<?php


include '../connect.php';

require '../vendor/autoload.php'; // Ensure you've installed the Sendinblue library via Composer


use SendinBlue\Client\Configuration;

use SendinBlue\Client\Api\TransactionalEmailsApi;

use GuzzleHttp\Client;

session_start();

if (!isset($_GET['email']) || !isset($_GET["company_name"]) || !isset($_GET["job_id"])) {

    header('location: dashboard.php?error');

    exit;

} 

else {
    $body = '<font style="width: 18px;line-height: 30px;"><b>Dear '.$_GET["email"].'</b></font><br><br><p style="line-height: 30px;">We interviewed a number of candidates for [job title or position], and we’ve decided to move forward with another candidate.
<br><br>
Although your interview demonstrated your credentials and experience well, [reason for rejection]. However, we’d like to offer the opportunity to interview for a second position as [job position or title]. We’ve enclosed a job description for you to review.
<br><br>
If you decide you’re interested in talking with us about this second opening, please contact me at [email and/or phone number] to schedule an interview at your earliest convenience. First-round interviews are currently in progress for this position.
<br><br>
Thank you so much for your interest in joining [your company’s name] and taking the time to meet our interview team. If you qualify in the future, please feel free to apply for other open positions with our company.

We wish you the best of luck with your job search. Once again, thank you for your interest in our company.
<br><br>
Regards,
<br>
Firstname and Lastname
<br>
HR at MSION</p>';
       
       // Initialize Sendinblue API
       
        $config = Configuration::getDefaultConfiguration()->setApiKey('api-key', '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');
       
        $apiInstance = new TransactionalEmailsApi(
       
            new Client(),
       
            $config
       
        );



        $sendSmtpEmail = new \SendinBlue\Client\Model\SendSmtpEmail([

            'subject' => 'MSION Job Application: Declined.',

            'sender' => ['name' => 'MSION', 'email' => 'atosin056@gmail.com'],

            'to' => [['email' => $_GET["email"], 'name' => 'User']],

            'htmlContent' => $body

        ]);



        try {

            $response = $apiInstance->sendTransacEmail($sendSmtpEmail);

            // Insert OTP into database

            $insert = "INSERT INTO `rejected` (`id`, `email`, `job_id`,`company_name`) VALUES (NULL, '".$_GET["email"]."', '".$_GET["job_id"]."','".$_GET["company_name"]."')";

            $insert_query = mysqli_query($conn, $insert);

            if ($insert_query) {
                
                header('location: dials.php?rejected');
                
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
