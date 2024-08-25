<?php

require 'vendor/autoload.php';

use PhpOffice\PhpWord\IOFactory;
use GuzzleHttp\Client;

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

function sendToGoogleGenerativeAPI($text) {
    $client = new Client();
    $apiKey = 'AIzaSyCqlxqpyK9THnLBskfwif__XJl_SoiNZ5g'; // Replace with your actual API key
    $apiEndpoint = 'https://generativelanguage.googleapis.com/v1beta2/models/text-bison-001:predict'; // Updated endpoint

    try {
        $response = $client->post($apiEndpoint, [
            'query' => ['key' => $apiKey],  // API key as query parameter
            'json' => [
                'prompt' => ['text' => $text],  // Adjust according to API's expected input structure
            ],
            'headers' => [
                'Content-Type' => 'application/json',
            ],
        ]);

        $data = json_decode($response->getBody(), true);
        return $data;
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
        return null;
    }
}

// Example usage
$filePath = 'cv/Collaboration Agreement.docx'; // Replace with the path to your .docx file
$text = extractTextFromDocx($filePath);
$responseData = sendToGoogleGenerativeAPI($text);

if ($responseData) {
    echo "<pre>";
    print_r($responseData);
    echo "</pre>";
} else {
    echo "Failed to get a response from the Google Generative Language API.";
}

?>
