<?php

require 'vendor/autoload.php';

use PhpOffice\PhpWord\IOFactory;
use Smalot\PdfParser\Parser;

function extractTextFromDocx($filePath) {
    $phpWord = IOFactory::load($filePath); // Load the DOCX file
    $textContent = '';

    foreach ($phpWord->getSections() as $section) {
        foreach ($section->getElements() as $element) {
            if ($element instanceof \PhpOffice\PhpWord\Element\TextRun) {
                foreach ($element->getElements() as $textElement) {
                    if (method_exists($textElement, 'getText')) {
                        $textContent .= $textElement->getText() . ' ';
                    }
                }
            }
        }
    }

    return $textContent;
}
// $curriculum = [
//      'Primary 1' => [
//          'mathematics' => ['Counting', 'Addition and Subtraction', 'Shapes', 'Patterns'],
//          'english' => ['Alphabet', 'Basic Reading', 'Simple Sentences', 'Phonics'],
//          'science' => ['Introduction to Living Things', 'Objects Around Us', 'Weather'],
//          'social_studies' => ['Family', 'School', 'Community Helpers']
//      ],
//      'Primary 2' => [
//          'mathematics' => ['Simple Addition', 'Subtraction', 'Comparing Numbers', 'Time'],
//          'english' => ['Simple Grammar', 'Vocabulary Building', 'Basic Comprehension'],
//          'science' => ['Living and Non-living Things', 'Plants', 'The Sky'],
//          'social_studies' => ['Community', 'Neighborhood', 'Basic Geography']
//      ],
//      'Primary 3' => [
//          'mathematics' => ['Multiplication', 'Division', 'Money', 'Measurement'],
//          'english' => ['Grammar and Sentence Structure', 'Story Reading', 'Comprehension'],
//          'science' => ['The Human Body', 'Water Cycle', 'Energy Sources'],
//          'social_studies' => ['Government', 'Nigeria and Its Neighbors', 'Culture']
//      ],
//      'Primary 4' => [
//          'mathematics' => ['Fractions', 'Decimals', 'Word Problems', 'Shapes and Angles'],
//          'english' => ['Complex Sentences', 'Tenses', 'Reading Comprehension'],
//          'science' => ['Light and Sound', 'Earth and Space', 'Forces and Motion'],
//          'social_studies' => ['Government and Laws', 'Economic Activities', 'Civics']
//      ],
//      'Primary 5' => [
//          'mathematics' => ['Multiplying and Dividing Fractions', 'Area and Perimeter', 'Graphs'],
//          'english' => ['Writing Paragraphs', 'Reading Stories', 'Adverbs and Adjectives'],
//          'science' => ['The Environment', 'The Solar System', 'Health Education'],
//          'social_studies' => ['History of Nigeria', 'Economic Resources', 'Rights and Responsibilities']
//      ],
//      'Primary 6' => [
//          'mathematics' => ['Algebra Basics', 'Geometry', 'Problem Solving'],
//          'english' => ['Essay Writing', 'Advanced Grammar', 'Punctuation and Spelling'],
//          'science' => ['Electricity', 'States of Matter', 'Simple Machines'],
//          'social_studies' => ['World Geography', 'Nigerian Politics', 'Human Rights']
//      ],
//      'JSS 1' => [
//          'mathematics' => ['Fractions and Percentages', 'Ratio and Proportion', 'Simple Equations'],
//          'english' => ['Descriptive Writing', 'Summary Writing', 'Comprehension'],
//          'basic_science' => ['Cell Structure', 'Human Digestive System', 'Solar System'],
//          'social_studies' => ['National Symbols', 'Types of Government', 'Social Values']
//      ],
//      'JSS 2' => [
//          'mathematics' => ['Linear Equations', 'Statistics', 'Angles and Triangles'],
//          'english' => ['Narrative Writing', 'Speech Writing', 'Comprehension and Summary'],
//          'basic_science' => ['Respiration and Circulation', 'Simple Machines', 'Reproduction'],
//          'social_studies' => ['Citizenship', 'Colonialism', 'African Unity']
//      ],
//      'JSS 3' => [
//          'mathematics' => ['Quadratic Equations', 'Probability', 'Coordinate Geometry'],
//          'english' => ['Creative Writing', 'Letter Writing', 'Drama and Poetry'],
//          'basic_science' => ['Atomic Structure', 'Magnetism', 'Photosynthesis'],
//          'social_studies' => ['Democracy and Rule of Law', 'Conflicts and Resolutions', 'Globalization']
//      ],
//      'SS1' => [
//          'mathematics' => ['Indices and Logarithms', 'Trigonometry', 'Polynomials'],
//          'english' => ['Critical Reading', 'Formal and Informal Letters', 'Poetry and Drama'],
//          'physics' => ['Measurement and Units', 'Linear Motion', 'Heat Energy'],
//          'chemistry' => ['Atomic Structure', 'Periodic Table', 'Chemical Bonding'],
//          'biology' => ['Classification of Living Things', 'Ecology', 'Cell Structure'],
//          'economics' => ['Basic Economic Concepts', 'Demand and Supply', 'Market Structures']
//      ],
//      'SS2' => [
//          'mathematics' => ['Sequences and Series', 'Vectors', 'Complex Numbers'],
//          'english' => ['Essay Writing', 'Oral English', 'Literature Review'],
//          'physics' => ['Electricity and Magnetism', 'Fluid Dynamics', 'Thermodynamics'],
//          'chemistry' => ['Organic Chemistry', 'Solutions and Solubility', 'Acids and Bases'],
//          'biology' => ['Reproduction in Plants and Animals', 'Heredity and Genetics', 'Evolution'],
//          'economics' => ['Money and Banking', 'Public Finance', 'International Trade']
//      ],
//      'SS3' => [
//          'mathematics' => ['Calculus', 'Differentiation and Integration', 'Matrices'],
//          'english' => ['Critical Essay Writing', 'Public Speaking', 'World Literature'],
//          'physics' => ['Waves and Optics', 'Nuclear Physics', 'Quantum Mechanics'],
//          'chemistry' => ['Electrochemistry', 'Kinetics and Equilibrium', 'Polymers'],
//          'biology' => ['Evolution and Natural Selection', 'Biotechnology', 'Environmental Biology'],
//          'economics' => ['Economic Growth and Development', 'Environmental Economics', 'Labour Markets']
//      ]
// ];
function extractTextFromPdf($filePath) {
    $parser = new Parser();
    $pdf = $parser->parseFile($filePath);
    return $pdf->getText();
}
function parseClass($text) {
    $classes = [
        'Primary 1', 'Primary 2', 'Primary 3', 'Primary 4', 'Primary 5', 'Primary 6', 
        'JSS 1', 'JSS 2', 'JSS 3', 'SS1', 'SS2', 'SS3'
    ];

    foreach ($classes as $class) {
        // Use word boundaries to ensure we match the class name exactly
        if (preg_match('/\b' . preg_quote($class, '/') . '\b/i', $text)) {
            return $class;
        }
    }

    return null;
}


function parseGrades($text) {
    $grades = [];
    preg_match_all('/([A-Za-z_ ]+):\s*([0-9]{1,3})/', $text, $matches, PREG_SET_ORDER);
    foreach ($matches as $match) {
        $subject = strtolower(trim($match[1]));
        $grade = (int)$match[2];
        $grades[$subject] = $grade;
    }

    return $grades;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['document'])) {
    $fileTmpPath = $_FILES['document']['tmp_name'];
    $fileNameCmps = explode(".", $_FILES['document']['name']);
    $fileExtension = strtolower(end($fileNameCmps));

    if ($fileExtension === 'docx') {
        $extractedText = extractTextFromDocx($fileTmpPath);
    } elseif ($fileExtension === 'pdf') {
        $extractedText = extractTextFromPdf($fileTmpPath);
    } else {
        die("Error: Only .docx or .pdf files are allowed.");
    }

    $class = parseClass($extractedText);
    $grades = parseGrades($extractedText);

        if (empty($grades)) {
        die("Error: No grades found in the document.");
    }

    // Step 2: Analyze the grades using OpenAI
    $curriculum = getCurriculumForClass($class); // Assuming this fetches the curriculum for the class
    if (!$curriculum) {
        die("Error: Unable to fetch the curriculum for class $class.");
    }

    $suggestions = analyzeGradesWithOpenAI($class, $grades, $curriculum);
    if (empty($suggestions)) {
        die("Error: No improvement suggestions found.");
    }

    // Step 3: Fetch YouTube tutorials based on suggestions
    $allYouTubeResults = [];
    foreach ($suggestions as $suggestion) {
        $youTubeResults = fetchYouTubeTutorials($suggestion);
        $allYouTubeResults[$suggestion] = $youTubeResults;
    }

    // Step 4: Display the YouTube results to the user
    echo "<h3>Recommended YouTube Tutorials</h3>";
    foreach ($allYouTubeResults as $suggestion => $videos) {
        echo "<h4>Topic: $suggestion</h4>";
        echo "<ul>";
        foreach ($videos as $video) {
            echo "<li>";
            echo "<a href='{$video['url']}' target='_blank'>";
            echo "<img src='{$video['thumbnail']}' alt='{$video['title']}' style='width:120px; height:auto;'>";
            echo "<p>{$video['title']}</p>";
            echo "</a>";
            echo "</li>";
        }
        echo "</ul>";
    }
}

// Function to get the curriculum for a specific class
function getCurriculumForClass($class) {
    $curriculum = [
        'Primary 1' => [
            'mathematics' => ['Counting', 'Addition and Subtraction', 'Shapes', 'Patterns'],
            'english' => ['Alphabet', 'Basic Reading', 'Simple Sentences', 'Phonics'],
            'science' => ['Introduction to Living Things', 'Objects Around Us', 'Weather'],
            'social_studies' => ['Family', 'School', 'Community Helpers']
        ],
        'Primary 2' => [
            'mathematics' => ['Simple Addition', 'Subtraction', 'Comparing Numbers', 'Time'],
            'english' => ['Simple Grammar', 'Vocabulary Building', 'Basic Comprehension'],
            'science' => ['Living and Non-living Things', 'Plants', 'The Sky'],
            'social_studies' => ['Community', 'Neighborhood', 'Basic Geography']
        ],
        'Primary 3' => [
            'mathematics' => ['Multiplication', 'Division', 'Money', 'Measurement'],
            'english' => ['Grammar and Sentence Structure', 'Story Reading', 'Comprehension'],
            'science' => ['The Human Body', 'Water Cycle', 'Energy Sources'],
            'social_studies' => ['Government', 'Nigeria and Its Neighbors', 'Culture']
        ],
        'Primary 4' => [
            'mathematics' => ['Fractions', 'Decimals', 'Word Problems', 'Shapes and Angles'],
            'english' => ['Complex Sentences', 'Tenses', 'Reading Comprehension'],
            'science' => ['Light and Sound', 'Earth and Space', 'Forces and Motion'],
            'social_studies' => ['Government and Laws', 'Economic Activities', 'Civics']
        ],
        'Primary 5' => [
            'mathematics' => ['Multiplying and Dividing Fractions', 'Area and Perimeter', 'Graphs'],
            'english' => ['Writing Paragraphs', 'Reading Stories', 'Adverbs and Adjectives'],
            'science' => ['The Environment', 'The Solar System', 'Health Education'],
            'social_studies' => ['History of Nigeria', 'Economic Resources', 'Rights and Responsibilities']
        ],
        'Primary 6' => [
            'mathematics' => ['Algebra Basics', 'Geometry', 'Problem Solving'],
            'english' => ['Essay Writing', 'Advanced Grammar', 'Punctuation and Spelling'],
            'science' => ['Electricity', 'States of Matter', 'Simple Machines'],
            'social_studies' => ['World Geography', 'Nigerian Politics', 'Human Rights']
        ],
        'JSS 1' => [
            'mathematics' => ['Fractions and Percentages', 'Ratio and Proportion', 'Simple Equations'],
            'english' => ['Descriptive Writing', 'Summary Writing', 'Comprehension'],
            'basic_science' => ['Cell Structure', 'Human Digestive System', 'Solar System'],
            'social_studies' => ['National Symbols', 'Types of Government', 'Social Values']
        ],
        'JSS 2' => [
            'mathematics' => ['Linear Equations', 'Statistics', 'Angles and Triangles'],
            'english' => ['Narrative Writing', 'Speech Writing', 'Comprehension and Summary'],
            'basic_science' => ['Respiration and Circulation', 'Simple Machines', 'Reproduction'],
            'social_studies' => ['Citizenship', 'Colonialism', 'African Unity']
        ],
        'JSS 3' => [
            'mathematics' => ['Quadratic Equations', 'Probability', 'Coordinate Geometry'],
            'english' => ['Creative Writing', 'Letter Writing', 'Drama and Poetry'],
            'basic_science' => ['Atomic Structure', 'Magnetism', 'Photosynthesis'],
            'social_studies' => ['Democracy and Rule of Law', 'Conflicts and Resolutions', 'Globalization']
        ],
        'SS1' => [
            'mathematics' => ['Indices and Logarithms', 'Trigonometry', 'Polynomials'],
            'english' => ['Critical Reading', 'Formal and Informal Letters', 'Poetry and Drama'],
            'physics' => ['Measurement and Units', 'Linear Motion', 'Heat Energy'],
            'chemistry' => ['Atomic Structure', 'Periodic Table', 'Chemical Bonding'],
            'biology' => ['Classification of Living Things', 'Ecology', 'Cell Structure'],
            'economics' => ['Basic Economic Concepts', 'Demand and Supply', 'Market Structures']
        ],
        'SS2' => [
            'mathematics' => ['Sequences and Series', 'Vectors', 'Complex Numbers'],
            'english' => ['Essay Writing', 'Oral English', 'Literature Review'],
            'physics' => ['Electricity and Magnetism', 'Fluid Dynamics', 'Thermodynamics'],
            'chemistry' => ['Organic Chemistry', 'Solutions and Solubility', 'Acids and Bases'],
            'biology' => ['Reproduction in Plants and Animals', 'Heredity and Genetics', 'Evolution'],
            'economics' => ['Money and Banking', 'Public Finance', 'International Trade']
        ],
        'SS3' => [
            'mathematics' => ['Calculus', 'Differentiation and Integration', 'Matrices'],
            'english' => ['Critical Essay Writing', 'Public Speaking', 'World Literature'],
            'physics' => ['Waves and Optics', 'Nuclear Physics', 'Quantum Mechanics'],
            'chemistry' => ['Electrochemistry', 'Kinetics and Equilibrium', 'Polymers'],
            'biology' => ['Evolution and Natural Selection', 'Biotechnology', 'Environmental Biology'],
            'economics' => ['Economic Growth and Development', 'Environmental Economics', 'Labour Markets']
        ]
    ];

    // Check if class exists in the curriculum
    if (array_key_exists($class, $curriculum)) {
        return $curriculum[$class];
    }

    return null; // Return null if the class doesn't exist
}


function analyzeGradesWithOpenAI($class, $grades, $curriculum) {
    $client = new GuzzleHttp\Client();
    $apiKey = 'sk-proj-Qc0SnKLc98Rj2nN5L0QhT3BlbkFJtPCQHJr6Sl34QWV2bENO';

    $response = $client->post('https://api.openai.com/v1/chat/completions', [
        'json' => [
            'model' => 'gpt-4',
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'You are a helpful assistant. Provide separate concise topics where the student needs improvement based on their grades and the curriculum provided. Format each suggestion as a short, separate topic to be searched on YouTube. No sentences.'
                ],
                [
                    'role' => 'user',
                    'content' => "The student is in $class. The grades are: " . json_encode($grades) . ". Suggest topics where they need improvement based on this curriculum: " . json_encode($curriculum)
                ]
            ]
        ],
        'headers' => [
            'Authorization' => 'Bearer ' . $apiKey,
            'Content-Type' => 'application/json'
        ]
    ]);

    $body = $response->getBody();
    $data = json_decode($body, true);
    
    // Assume OpenAI returns topics in this format
    $suggestions = explode("\n", trim($data['choices'][0]['message']['content']));
    return $suggestions;
}

function fetchYouTubeTutorials($query) {
    $client = new GuzzleHttp\Client();
    $apiKey = 'AIzaSyBK-Elx7q7F4m0jctrG29hDsPnhtjaLIK0';
    $url = 'https://www.googleapis.com/youtube/v3/search';
    
    $response = $client->get($url, [
        'query' => [
            'part' => 'snippet',
            'q' => $query,
            'type' => 'video',
            'maxResults' => 5,
            'key' => $apiKey,
        ]
    ]);
    
    $body = $response->getBody();
    $data = json_decode($body, true);

    $videos = [];
    foreach ($data['items'] as $item) {
        $videos[] = [
            'title' => $item['snippet']['title'],
            'url' => 'https://www.youtube.com/watch?v=' . $item['id']['videoId'],
            'thumbnail' => $item['snippet']['thumbnails']['default']['url']
        ];
    }

    return $videos;
}

// Main flow

$suggestions = analyzeGradesWithOpenAI($class, $grades, $curriculum);

$allYouTubeResults = [];
foreach ($suggestions as $suggestion) {
    $youTubeResults = fetchYouTubeTutorials($suggestion);
    $allYouTubeResults[$suggestion] = $youTubeResults;
}
foreach ($allYouTubeResults as $suggestion => $results) {
    echo "Suggestion: $suggestion\n";
    
    foreach ($results as $videoData) {
        // Access each video's title and URL to print them
        //This is where i perform the insert query for the videos suggested
        echo "Thumbnail URL: " . $videoData['url'] . "\n\n";
    }
}
?>