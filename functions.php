<?php

require 'vendor/autoload.php';

use PhpOffice\PhpWord\IOFactory;

use GuzzleHttp\Client;

use PhpOffice\PhpWord\PhpWord;
function createAndDownloadDocument($filename, $title, $content) {
    // Create a new instance of PhpWord
    $phpWord = new PhpWord();
    
    // Add a section to the document
    $section = $phpWord->addSection();
    
    // Add title with formatting
    $section->addTitle($title, 1);
    
    // Add content text to the section
    $section->addText($content);
    
    // Set document properties (optional)
    $properties = $phpWord->getDocInfo();
    $properties->setCreator('MSION');
    $properties->setTitle($title);
    
    // Save the document to a temporary file
    $temp_file = tempnam(sys_get_temp_dir(), 'PHPWord');
    if ($temp_file === false) {
        throw new Exception("Unable to create a temporary file.");
    }
    
    // Save the document
    try {
        $phpWord->save($temp_file, 'Word2007');
    } catch (Exception $e) {
        throw new Exception("Failed to save the document: " . $e->getMessage());
    }
    
    // Serve the document for download
    header('Content-Description: File Transfer');
    header('Content-Disposition: attachment; filename="' . $filename . '.docx"');
    header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
    header('Content-Transfer-Encoding: binary');
    header('Content-Length: ' . filesize($temp_file));
    
    // Read the file and output it
    readfile($temp_file);
    
    // Clean up
    unlink($temp_file);
    
    exit; // Ensure no further output is sent
}


// Example usage: Call this function when you want to download the PDF
// generatePDF('example.pdf', 'My PDF Title', 'This is the content of the PDF document. You can customize it.');



function getDocxContentAsHtml($filePath) {
    // Load the DOCX file
    $phpWord = IOFactory::load($filePath);

    // Convert to HTML
    $htmlWriter = IOFactory::createWriter($phpWord, 'HTML');
    
    ob_start(); // Start output buffering
    $htmlWriter->save('php://output'); // Output the HTML content
    $htmlContent = ob_get_clean(); // Get the buffered content and clean the buffer

    return $htmlContent;
}

function extractTime($datetime) {
    
    // Create a DateTime object from the datetime string
    
    $date = new DateTime($datetime);

    
    // Extract the time part and format it as HH:MM:SS
    
    return $date->format('H:i:s');

}

function convertToCustomDate($datetime) {
   
    // Create a DateTime object from the datetime string
   
    $date = new DateTime($datetime);

    // Format the date as DD/MM/YYYY
   
    return $date->format('d/m/Y');

}

// Function to calculate time ago

function timeAgo($timestamp) {
    
    // Get the current time
    
    $current_time = time();
    
    // Ensure timestamp is in seconds
    
    if ($timestamp > 10000000000) {
    
        $timestamp /= 1000; // Convert from milliseconds to seconds
    
    }

    // Calculate the time difference
    
    $time_difference = $current_time - $timestamp;

    // Define time units
    
    $condition = array(
    
        12 * 30 * 24 * 60 * 60 => 'year',
    
        30 * 24 * 60 * 60 => 'month',
    
        24 * 60 * 60 => 'day',
    
        60 * 60 => 'hr',
    
        60 => 'min',
    
        1 => 'sec'
    
    );



    // Loop through time units and find the largest applicable unit

    foreach ($condition as $secs => $str) {

        $d = $time_difference / $secs;

        if ($d >= 1) {

            $t = round($d);

            return $t . ' ' . $str . ($t > 1 ? 's' : '') . ' ago';

        }

    }



    return 'just now'; // Fallback in case something goes wrong

}

function formatDate($date) {
    
    // Convert the input date string to a timestamp
    
    $timestamp = strtotime($date);

    // Format the date
    
    $formattedDate = date('jS F Y', $timestamp);

    return $formattedDate;

}

function extractTextFromDocx($filePath) {

    $phpWord = IOFactory::load($filePath);

    $extractedText = '';



    foreach ($phpWord->getSections() as $section) {

        foreach ($section->getElements() as $element) {

            if (method_exists($element, 'getElements')) {

                foreach ($element->getElements() as $childElement) {

                    if (method_exists($childElement, 'getText')) {

                        $extractedText .= $childElement->getText() . "\n";

                    }

                }

            }

        }

    }

    return $extractedText;

}

function replaceNewLinesWithBr($text) {
  
    // First, convert special HTML characters to entities
  
    $text = htmlspecialchars($text, ENT_QUOTES, 'UTF-8');

    // Replace all types of line breaks with <br>
  
    $text = str_replace(array("\r\n", "\r", "\n"), '<br>', $text);
  
    return $text;

}


function sendToOpenAIAPI($text, $profession) {

    $client = new Client();

    $apiKey = 'sk-proj-Qc0SnKLc98Rj2nN5L0QhT3BlbkFJtPCQHJr6Sl34QWV2bENO'; // Replace with your actual OpenAI API key

    $apiEndpoint = 'https://api.openai.com/v1/chat/completions';

    try {

        // Customize the prompt to ask for a rating based on a specific profession

        $prompt = "You are an expert $profession. Please read the following text and rate it based on its relevance, accuracy, and quality from the perspective of a $profession on a scale from 1 to 5. Be very critical in your evaluation—reserve a rating of 5 for text that is truly exceptional in every aspect, demonstrating thorough expertise, exceptional clarity, and relevance. A rating of 4 should be given to text that is professional enough and has the necessary things like name and date of birth. A rating of 3 should be given to text that is very good but may lack a small element of perfection. Average work should receive a rating of 2, while below-average work should be rated 1. Provide detailed feedback to justify your rating.\n\n$text\n\nProvide the rating in the following format:'Rating: X'where X is a number between 1 and 5.Include a brief explanation for your rating.";

        $response = $client->post($apiEndpoint, [
            
            'json' => [
                
                'model' => 'gpt-4',  // Specify the OpenAI model you want to use
                
                'messages' => [
                   
                    [

                        'role' => 'user',

                        'content' => $prompt

                    ]

                ],

                'max_tokens' => 100,  // Adjust as needed

            ],

            'headers' => [

                'Content-Type' => 'application/json',

                'Authorization' => 'Bearer ' . $apiKey

            ],

        ]);


        $data = json_decode($response->getBody(), true);

        // Extract the rating from the response content

        if (isset($data['choices'][0]['message']['content'])) {

            $content = $data['choices'][0]['message']['content'];

            if (preg_match('/Rating:\s*(\d)/', $content, $matches)) {

                $rating = $matches[1];

                return $rating;

            } else {

                echo "Failed to extract a valid rating from the response.";

            }

        }

        return null;

    } catch (Exception $e) {

        echo 'Error: ' . $e->getMessage();

        return null;

    }

}

// // Example usage
// $filePath = 'cv/Collaboration Agreement.docx'; // Replace with the path to your .docx file
// $text = extractTextFromDocx($filePath); // Assume this function extracts text from the docx file
// $profession = 'doctor'; // Replace with the profession or perspective you want to use
// $rating = sendToOpenAIAPI($text, $profession);

// if ($rating) {
//     echo "Rating from the perspective of a $profession: " . $rating;
// } else {
//     echo "Failed to get a valid rating from the OpenAI API.";
// }


// Function to send input to OpenAI API and get generated content

function generateCVContent($bio, $title, $desired_position, $skills, $stack) {

    $client = new Client();

    $apiKey = 'sk-proj-Qc0SnKLc98Rj2nN5L0QhT3BlbkFJtPCQHJr6Sl34QWV2bENO'; // Replace with your OpenAI API key

    $apiEndpoint = 'https://api.openai.com/v1/chat/completions';



    // Construct the prompt for the AI

    $prompt = "Create a professional CV based on the following details:\n\n";

    $prompt .= "Bio: $bio\n";

    $prompt .= "Title: $title\n";

    $prompt .= "Desired Position: $desired_position\n";

    $prompt .= "Skills: $skills\n";

    $prompt .= "Tech Stack: $stack\n";



    try {

        $response = $client->post($apiEndpoint, [

            'json' => [

                'model' => 'gpt-4', // Specify the OpenAI model you want to use

                'messages' => [

                    [

                        'role' => 'user',

                        'content' => $prompt

                    ]

                ],

                'max_tokens' => 500, // Adjust as needed

            ],

            'headers' => [

                'Content-Type' => 'application/json',

                'Authorization' => 'Bearer ' . $apiKey

            ],

        ]);



        $data = json_decode($response->getBody(), true);


        if (isset($data['choices'][0]['message']['content'])) {

            return $data['choices'][0]['message']['content'];

        } else {

            return "Failed to generate CV content.";

        }

    } catch (Exception $e) {

        return 'Error: ' . $e->getMessage();

    }

}

function createAndDownloadCV($generatedContent) {

    $phpWord = new PhpWord();

    $section = $phpWord->addSection();

    // Add generated content to the document
    $section->addText($generatedContent);



    // Send the document to the browser for download

    header('Content-Type: application/octet-stream');

    header('Content-Disposition: attachment;filename="Generated_CV.docx"');

    header('Cache-Control: max-age=0');



    $objWriter = IOFactory::createWriter($phpWord, 'Word2007');

    $objWriter->save('php://output');

    exit();

}


?>
