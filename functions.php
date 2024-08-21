<?php

function existing_data ($table_name,$column,$data,$other_lines){

	$error_response = false;

	$select = "SELECT * FROM `$table_name` WHERE `$column`='".$data."'";

	$select_query = mysqli_query($conn, $select);

	if (mysqli_num_rows($select_query) > 0) {
		
		$error_response = true;

		$error_msg = 'This Data already Exists in the Database';

	}

	else{

		$other_lines;

	}

}

function insert ($table_name, $table_parameters, $values, $action){

	$insert = "INSERT INTO `$table_name` ($table_parameter) VALUES ('$values')";

	$insert_query = mysqli_query($conn, $insert);

	if ($insert_query) {
		
		$action;

	}

}

function rankCVWithAPI($cvText, $jobDescription) {
    
    $apiUrl = "https://api.example.com/rank"; // Replace with the actual API endpoint
    
    $postData = [
    
        'cvText' => $cvText,
    
        'jobDescription' => $jobDescription
    
    ];

    $ch = curl_init($apiUrl);
    
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
    
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    
    $response = curl_exec($ch);
    
    curl_close($ch);

    $responseData = json_decode($response, true);

    return $responseData['ranking'] ?? 1; // Default to 1 if no ranking is returned

}

function analyzeAndScoreCV($cvText, $jobTitle) {
    
    $language = new LanguageClient([
    
        'keyFilePath' => 'path/to/your-service-account-file.json'  // Path to your Google Cloud service account key
    
    ]);

    
    // Analyze the CV text
    
    $cvAnnotation = $language->analyzeEntities($cvText);
    
    $cvEntities = array_map('strtolower', array_column($cvAnnotation->entities(), 'name'));


    // Analyze the job title

    $jobAnnotation = $language->analyzeEntities($jobTitle);

    $jobEntities = array_map('strtolower', array_column($jobAnnotation->entities(), 'name'));


    // Compare entities and calculate score

    $matchedEntities = array_intersect($cvEntities, $jobEntities);

    $score = count($matchedEntities) / max(count($jobEntities), 1) * 5;  // Scale to 1-5

    return [

        'cvEntities' => $cvEntities,

        'jobEntities' => $jobEntities,

        'matchedEntities' => $matchedEntities,

        'score' => round($score, 2)

    ];

}

function getScore($cvText, $jobTitle, $language) {
    
    // Analyze the CV text
    
    $cvAnnotation = $language->analyzeEntities($cvText);
    
    $cvEntities = array_map('strtolower', array_column($cvAnnotation->entities(), 'name'));

    // Analyze the job title
    
    $jobAnnotation = $language->analyzeEntities($jobTitle);
    
    $jobEntities = array_map('strtolower', array_column($jobAnnotation->entities(), 'name'));

    // Compare entities and calculate score
    
    $matchedEntities = array_intersect($cvEntities, $jobEntities);
    
    $score = count($matchedEntities) / max(count($jobEntities), 1) * 5;  // Scale to 1-5

    return round($score, 2);

}

function getCvScore($cvText, $jobTitle) {
    
    // Define the API endpoint
    
    $apiEndpoint = 'https://generativelanguage.googleapis.com/v1beta2/models/text:predict';

    // Hardcoded API key
    
    $apiKey = 'AIzaSyCqlxqpyK9THnLBskfwif__XJl_SoiNZ5g'; // Replace with your actual API key

    // Prepare the API request payload
    
    $data = array(
    
        'input' => array(
    
            'text' => $cvText
    
        ),
    
        'context' => array(
    
            'text' => $jobTitle
    
        )
    
    );

    // Set up the HTTP request options
    
    $options = array(
    
        'http' => array(
    
            'header' => "Content-type: application/json\r\n" .
    
                        "Authorization: Bearer $apiKey\r\n",
    
            'method' => 'POST',
    
            'content' => json_encode($data),
    
        ),
    
    );

    // Create the context for the request
    
    $context = stream_context_create($options);

    // Send the request and get the response
    
    $result = file_get_contents($apiEndpoint, false, $context);
    
    if ($result === false) {
    
        return "Error calling Generative Language API.";
    
    }

    // Decode the JSON response
    
    $response = json_decode($result, true);

    // Extract and return the score from the response
    
    if (isset($response['score'])) {
    
        return $response['score']; // Adjust based on actual API response
    
    } else {
    
        return "Unexpected API response.";
    
    }

}

function extractTextFromPdf($pdfFile) {

    $output = shell_exec("pdftotext " . escapeshellarg($pdfFile) . " -");

    return $output;

}

function extractTextFromWord($filePath) {
   
    // Load the Word document
   
    $phpWord = IOFactory::load($filePath);

    // Initialize an empty string to hold the text
   
    $text = '';

    // Iterate through sections and extract text
   
    foreach ($phpWord->getSections() as $section) {
   
        foreach ($section->getElements() as $element) {
   
            if (method_exists($element, 'getText')) {
   
                $text .= $element->getText() . PHP_EOL;
   
            }
   
        }
    }

    return $text;

}



?>