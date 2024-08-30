<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Textarea with LI Tags</title>
    <style>
        textarea { width: 100%; height: 150px; }
    </style>
</head>
<body>
    <form method="post" action="" onsubmit="return formatTextareas()">
        <textarea id="listInput" class="list-input" name="listInput" rows="6" cols="40"></textarea>
        <button type="submit">Submit</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the submitted value from the textarea
        $textareaValue = $_POST['listInput'];

        // Output the textarea content
        echo "<h3>Submitted Content:</h3>";
        echo "<ul>" . $textareaValue . "</ul>";
    }
    ?>
    
    <script>
        function formatTextareas() {
            // Get all textarea elements with class 'list-input'
            var textareas = document.querySelectorAll(".list-input");
            
            // Loop through each textarea
            textareas.forEach(function(textarea) {
                // Split the textarea content by new lines
                var lines = textarea.value.split('\n');
                
                // Format each line by wrapping it with <li> tags
                var formattedValue = lines.map(line => `<li>${line.trim()}</li>`).join('');
                
                // Set the formatted value back to the textarea for submission
                textarea.value = formattedValue;
            });
            
            // Return false to prevent form submission if you want to see the result without refreshing the page
            return true;
        }
    </script>
</body>
</html>
