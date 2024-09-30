<?php

header('Content-Type: application/json');

// OpenAI API key and endpoint

$apiKey = '';

$apiEndpoint = 'https://api.openai.com/v1/chat/completions';

// Get message from POST request

$message = $_POST['message'] ?? '';



// Predefined responses with keywords

$predefinedResponses = [

    'what is your name' => 'I am Benjamin, developed by MSI Nigeria.',

    'who developed you' => 'I was developed by MSI Nigeria.',

    'contact MSI Nigeria' => 'Send them an email: atosin056@gmail',

];



// Check for predefined responses based on keywords

$messageLower = strtolower($message);

foreach ($predefinedResponses as $keyword => $response) {

    if (strpos($messageLower, $keyword) !== false) {

        echo json_encode(['reply' => $response]);

        exit();
    }
}



// Prepare the request payload for OpenAI

$data = [

    'model' => 'gpt-4', // Use GPT-4 model

    'messages' => [

        ['role' => 'user', 'content' => $message]

    ],

    'max_tokens' => 500

];



$ch = curl_init($apiEndpoint);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_HTTPHEADER, [

    'Authorization: Bearer ' . $apiKey,

    'Content-Type: application/json'

]);

curl_setopt($ch, CURLOPT_POST, true);

curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));



$response = curl_exec($ch);

curl_close($ch);




if ($response === false) {

    echo json_encode(['reply' => 'Error communicating with AI']);
} else {

    $responseData = json_decode($response, true);

    $reply = $responseData['choices'][0]['message']['content'] ?? 'No reply from AI';

    echo json_encode(['reply' => $reply]);
}
