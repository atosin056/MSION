<?php

session_start();

include 'connect.php';

if (!isset($_GET["distro"])) {

	header('location: complete.php');

}

if (isset($_POST["submit"])) {
	
	$bio = mysqli_real_escape_string($conn, $_POST["biography"]);

	$looking = mysqli_real_escape_string($conn, $_POST["looking"]);


	//Update the DB

	$update = "UPDATE `users` SET `biography`='".$bio."',`looking`='".$looking."' WHERE `email`='".$_SESSION["otp_email_send"]."'";

	$update_query = mysqli_query($conn, $update);

	if ($update_query) {

	    $skillsJson = $_POST['skillsArray'] ?? '[]';
	   
	    $skills = json_decode($skillsJson, true);


	    foreach ($skills as $skill) {
        	
        	$email = $_SESSION["otp_email_send"];

        	$insert = "INSERT INTO `skills` (`id`, `skill`, `email`) VALUES (NULL, '".$skill."', '".$email."')";

        	$insert_query = mysqli_query($conn, $insert);

        
        }	
        
        $stacksJson = $_POST['stackArray'] ?? '[]';
	   
		$stacks = json_decode($stacksJson, true);


		foreach ($stacks as $stack) {

		   	$email = $_SESSION["otp_email_send"];

		   	$stack_insert = "INSERT INTO `stack` (`id`, `stack`, `email`) VALUES (NULL, '".$stack."', '".$email."')";

		   	$stack_query = mysqli_query($conn, $stack_insert);

		   	if ($stack_query) {
			    		
		   		header('location: complete3.php?msitos='.$_GET["distro"]);

		   	}

		}

	}

}

?>

<html>

<head>

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>MSION - Where talents meet opportunities. | Complete your profile</title>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="css/main.css">

</head>

<body>

<div style="padding-left: 220px;padding-right: 220px;background: white;width: 100% !important;height: auto !important;padding-top: 100px;padding-bottom: 100px;">
	
	<div>
		
		<div class="row" style="background: transparent;justify-content: space-between;">
			
			<div style="background: transparent;width: 320px;display: flex;align-items: center;">
				
				<img src="images/bar60.png">

			</div>

			<div style="width: 90px;">
				
				<div class="skip-button">Skip</div>

			</div>

		</div>

		<div style="padding: 15px;background: #FAFAFA;width: 100% !important;height: auto !important;margin-top: 30px;padding-bottom: 64px;padding-left: 20px;">

			<form method="POST" enctype="multipart/form-data">

				<div style="display: flex;flex-direction: column;gap: 16px;">

					<div style="width: 100% !important;background: white;padding: 24px;border-radius: 20px;">

						<div style="display: flex;flex-direction: column;gap: 16px;">

							<div>

								<div>
									
									<h4 style="font-size: 22px;font-weight: 600;">Biography</h4>

								</div>

								<div style="display: flex;flex-direction: column;gap: 20px;margin-top: 15px;">
									
									<div class="form-group">
										
										<textarea name="biography" required class="form-control" style="border-radius: 20px !important;height: 200px;padding-left: 20px;padding-top: 20px;" placeholder="Enter Text"></textarea>

									</div>

								</div>

							</div>

							<div>

								<div>
									
									<h4 style="font-size: 22px;font-weight: 600;">What I'm looking for</h4>

								</div>

								<div style="display: flex;flex-direction: column;gap: 20px;margin-top: 15px;">
									
									<div class="form-group">
										
										<textarea name="looking" required class="form-control" style="border-radius: 20px !important;height: 200px;padding-left: 20px;padding-top: 20px;" placeholder="Enter Text"></textarea>

									</div>

								</div>

							</div>

						</div>

					</div>

					<div style="width: 100% !important;background: white;padding: 24px;border-radius: 20px;">
						
						<div style="display: flex;flex-direction: column;gap: 16px;">

							<div>

								<div>
									
									<h4 style="font-size: 22px;font-weight: 600;">Skills (Enter up to 15)</h4>

								</div>

								<div style="margin-top: 20px;">
									
									<div class="form-group">
										
										<input type="text" name="skills" class="form-control" style="border-radius: 20px;height: 56px;padding-left: 20px;" id="skillInput" placeholder="Enter Skills">

									</div>

									<div id="suggestions"></div>

									<div id="skillsContainer"></div>

									<input type="hidden" required name="skillsArray" id="skillsArray">

								</div>

							</div>

							<div>

								<div>
									
									<h4 style="font-size: 22px;font-weight: 600;">Stack (Tools Used)</h4>

								</div>

								<div style="margin-top: 20px;">
									
									<div class="form-group">
										
										<input type="text" name="stack" class="form-control" style="border-radius: 20px;height: 56px;padding-left: 20px;" id="stackInput" placeholder="Search Tools">

									</div>

									<div id="stack-suggestions"></div>

									<div id="stack-container"></div>

									<input type="hidden" required name="stackArray" id="stackArray">

								</div>

							</div>

						</div>

					</div>

					<div style="margin-top: 24px;padding-left: 9px;padding-right: 9px;" class="form-group">
						
						<div class="row" style="background: transparent;">
							
							<div class="col-md-6 col-sm-6 col-lg-6 row" style="background: transparent;">
								
								<a href="complete.php" style="background: transparent;">
									
									<div class="row go-back">
										
										<div style="background: transparent;width: 24px;height: 24px;">
											
											<img src="images/arrow-right.png">

										</div>

										<div style="width: auto;">
											
											<font>Go Back</font>

										</div>

									</div>

								</a>

							</div>
						
							<div style="flex: 1;width: 100% !important;background: transparent;">
										
								<div class="col-lg-6 col-md-6 col-sm-6" style="background: transparent;width: 100% !important;">
											
									<input type="submit" name="submit" class="submit" value="Continue" style="width: 100% !important;">

								</div>

							</div>

						</div>

					</div>

				</div>

			</form>
		
		</div>

	</div>

</div>

</body>

<script type="text/javascript">

	 let skillsList = [
    // Business Skills
    "Project Management", "Strategic Planning", "Business Analysis",
    "Marketing Strategy", "Salesforce", "Customer Relationship Management",
    "Agile Methodology", "Business Development", "Leadership", "Negotiation",
    "Team Management", "Brand Management", "Market Research",
    "Business Intelligence", "Supply Chain Management",
    
    // Finance Skills
    "Financial Analysis", "Investment Banking", "Risk Management",
    "Financial Modeling", "Corporate Finance", "Wealth Management",
    "Accounting", "Auditing", "Taxation", "Portfolio Management",
    "Quantitative Analysis", "Economics", "Derivatives", "Asset Management",
    
    // Other Skills
    "Communication", "Public Speaking", "Time Management", "Critical Thinking",
    "Problem Solving", "Adaptability", "Creativity", "Writing",
    "Research", "Emotional Intelligence", "Language Proficiency",
    "Graphic Design", "Photography", "Video Editing", "Music Production",
    "Cooking", "Gardening", "Sports Coaching", "Teaching"
];
    const selectedSkills = [];
    const skillInput = document.getElementById('skillInput');
    const suggestions = document.getElementById('suggestions');
    const skillsContainer = document.getElementById('skillsContainer');
    const skillsArrayInput = document.getElementById('skillsArray');

    skillInput.addEventListener('input', function() {
        const query = this.value.toLowerCase();
        suggestions.innerHTML = '';
        if (query) {
            const filteredSkills = skillsList.filter(skill => skill.toLowerCase().startsWith(query));
            if (filteredSkills.length > 0) {
                filteredSkills.forEach(skill => {
                    const suggestionItem = document.createElement('div');
                    suggestionItem.textContent = skill;
                    suggestionItem.className = 'suggestion-item';
                    suggestionItem.addEventListener('click', () => addSkill(skill));
                    suggestions.appendChild(suggestionItem);
                });
            }
            const addNewSkillItem = document.createElement('div');
            addNewSkillItem.textContent = `Add "${this.value}"`;
            addNewSkillItem.className = 'suggestion-item';
            addNewSkillItem.addEventListener('click', () => addNewSkill(this.value));
            suggestions.appendChild(addNewSkillItem);
            suggestions.style.display = 'block';
            skillInput.style.borderBottomLeftRadius = '0';
        	skillInput.style.borderBottomRightRadius = '0';
        	skillInput.style.borderBottom = 'none';
        } else {
            suggestions.style.display = 'none';

        }
    });

    function addSkill(skill) {
        if (!selectedSkills.includes(skill) && selectedSkills.length < 15) {
            selectedSkills.push(skill);
            const skillItem = document.createElement('div');
            skillItem.className = 'skill-item';
            skillItem.textContent = skill;
            skillsContainer.appendChild(skillItem);
            skillInput.value = '';
            suggestions.style.display = 'none';
            skillsArrayInput.value = JSON.stringify(selectedSkills);
            skillInput.style.borderBottomLeftRadius = '20px';
       		skillInput.style.borderBottomRightRadius = '20px';
       		skillInput.style.borderBottom = '1px solid #CCCBCB';
        }
    }

    function addNewSkill(newSkill) {
        if (!selectedSkills.includes(newSkill) && selectedSkills.length < 15) {
            skillsList.push(newSkill);
            addSkill(newSkill);
        }
    }

   document.addEventListener('click', function(event) {
    if (!suggestions.contains(event.target) && event.target !== skillInput) {
        suggestions.style.display = 'none';
        // Restore border bottom radius
        skillInput.style.borderBottomLeftRadius = '20px';
        skillInput.style.borderBottomRightRadius = '20px';
        skillInput.style.borderBottom = '1px solid #CCCBCB';
    }
});
	
	document.addEventListener('DOMContentLoaded', function() {
    
    var currentPage = '<?php echo basename($_SERVER["PHP_SELF"], ".php"); ?>';
    
    var links = document.querySelectorAll('.nav-link');

    links.forEach(link => {
    
        if (link.getAttribute('data-page') === currentPage) {
    
            link.classList.add('link-active');
    
        }
    
    });
    
});

	let stackList = [
	// Tech Skills
    "JavaScript", "Python", "Java", "C#", "PHP", "Ruby", "C++", "TypeScript",
    "Swift", "Kotlin", "GoLang", "SQL", "HTML", "CSS", "React", "Angular", "Vue.js",
    "Django", "Flask", "Laravel", "Machine Learning", "Artificial Intelligence",
    "Data Science", "Cybersecurity", "DevOps", "Blockchain", "Cloud Computing",
    "Docker", "Kubernetes", "UI/UX Design", "Full-Stack Development","MySql","Bootstrap","MongoDB",
    
    // Tools and Technologies
    "Git", "Docker", "Jenkins", "Visual Studio Code", "Sublime Text", "Atom",
    "Eclipse", "IntelliJ IDEA", "PyCharm", "Postman","PostgressSQL", "Maven", "Gradle",
    "Webpack", "Babel", "NPM", "Yarn", "Node.js", "Ruby on Rails","NextJS","ExpressJS",
    "Laravel", "Spring Boot","Vue.js","Tailwind", "Sass", "LessJS", "JIRA", "Trello", 
    "Slack","Odoo","Dart","Google Play",
    "Microsoft Teams", "Google Analytics", "Tableau", "Power BI", "AWS","Webflow","Canva",
    "Azure", "GCP","Terraform", "Elasticsearch","ExpressJS",

    // Educational tools
    "Textbooks", "Whiteboard", "Projector", "Lesson Plans", "Grading Software", "Worksheets",
    "Chalk", "Markers", "Interactive Board", "Online Learning Platforms", "Educational Apps", "Classroom Management Software",

    // Photography tools
    "Camera", "Lenses", "Tripod", "Lighting Equipment", "Photo Editing Software", "Memory Cards",
    "Reflectors", "Backdrops", "Gimbals", "Drones", "Camera Bags", "Studio Lights",

    // Culinary tools
    "Knives", "Cutting Boards", "Pots and Pans", "Oven", "Mixing Bowls", "Spices and Ingredients",
    "Blender", "Food Processor", "Microwave", "Sous-vide Machine", "Grill", "Measuring Spoons",

    // Medical tools
    "Stethoscope", "Sphygmomanometer", "Medical Records", "Prescription Pad", "Thermometer", "Diagnostic Software",
    "Surgical Instruments", "X-Ray Machine", "Ultrasound Machine", "Blood Pressure Monitor", "First Aid Kit", "Medical Imaging Software",

    // Architectural tools
    "Blueprints", "CAD Software", "Measuring Tools", "Scale Models", "Drafting Table", "3D Rendering Software",
    "Laser Measure", "Architectural Scale", "T-Square", "Modeling Clay", "Virtual Reality (VR) Tools", "Plotter",

    // Musical tools
    "Instrument", "Sheet Music", "Music Stand", "Recording Equipment", "Digital Audio Workstation (DAW)", "Amplifiers",
    "Metronome", "Tuner", "MIDI Controller", "Synthesizer", "Microphones", "Headphones",

    // Writing tools
    "Laptop", "Word Processor", "Notebook", "Reference Books", "Editing Software", "Coffee",
    "Typewriter", "Pens", "Dictionary", "Grammar Checker", "Scrivener", "Speech-to-Text Software",

    // Artistic tools
    "Canvas", "Brushes", "Paints", "Palette", "Easel", "Sketchbook",
    "Charcoal Pencils", "Pastels", "Acrylics", "Watercolors", "Oil Paints", "Stencil",

    // Construction tools
    "Hammer", "Drill", "Screwdriver", "Measuring Tape", "Safety Gear", "Blueprints",
    "Wrench", "Saw", "Level", "Nail Gun", "Sledgehammer", "Tool Belt",

    // Scientific tools
    "Lab Equipment", "Microscope", "Test Tubes", "Data Analysis Software", "Research Journals", "Safety Goggles",
    "Centrifuge", "Petri Dishes", "Bunsen Burner", "Lab Coats", "Spectrophotometer", "Pipettes",

    // Office tools
    "Desktop Computer", "Printer", "Fax Machine", "Office Supplies", "Email Software", "Project Management Tools",
    "Shredder", "Scanner", "Photocopier", "Teleconferencing Equipment", "Office Chairs", "Desks",

    // Sports tools
    "Soccer Ball", "Tennis Racket", "Running Shoes", "Water Bottle", "Training Equipment", "Stopwatch",
    "Gym Equipment", "Fitness Tracker", "Yoga Mat", "Resistance Bands", "Bicycle", "Sportswear",

    // Gardening tools
    "Shovel", "Rake", "Pruning Shears", "Watering Can", "Garden Gloves", "Soil",
    "Hoe", "Wheelbarrow", "Compost Bin", "Plant Pots", "Fertilizer", "Seeds",

    // Fashion design tools
    "Sewing Machine", "Fabric", "Scissors", "Measuring Tape", "Mannequin", "Needle and Thread",
    "Pattern Paper", "Dress Forms", "Pins", "Tailor’s Chalk", "Zippers", "Buttons",

    // Travel tools
    "Suitcase", "Passport", "Travel Guide", "Camera", "Maps", "Travel Insurance",
    "Travel Apps", "Itinerary Planner", "Packing Cubes", "Travel Pillow", "Luggage Tags", "Currency Converter",

    // Event planning tools
    "Calendar", "Budgeting Software", "Vendor Contracts", "Guest List", "Venue Maps", "Decorations",
    "Catering Menus", "RSVP Tracking", "Event Timeline", "Seating Chart", "Invitations", "Audio/Visual Equipment"
];

const selectedStack = [];
const stackInput = document.getElementById('stackInput');
const stackSuggestions = document.getElementById('stack-suggestions');
const stackContainer = document.getElementById('stack-container');
const stackArrayInput = document.getElementById('stackArray');

stackInput.addEventListener('input', function() {
    const query = this.value.toLowerCase();
    stackSuggestions.innerHTML = '';
    if (query) {
        const filteredStack = stackList.filter(tool => tool.toLowerCase().startsWith(query));
        if (filteredStack.length > 0) {
            filteredStack.forEach(tool => {
                const suggestionItem = document.createElement('div');
                suggestionItem.textContent = tool;
                suggestionItem.className = 'stack-suggestion-item';
                suggestionItem.addEventListener('click', () => addTool(tool));
                stackSuggestions.appendChild(suggestionItem);
            });
        }
        const addNewToolItem = document.createElement('div');
        addNewToolItem.textContent = `Add "${this.value}"`;
        addNewToolItem.className = 'stack-suggestion-item';
        addNewToolItem.addEventListener('click', () => addNewTool(this.value));
        stackSuggestions.appendChild(addNewToolItem);
        stackSuggestions.style.display = 'block';
        stackInput.style.borderBottomLeftRadius = '0';
        stackInput.style.borderBottomRightRadius = '0';
        stackInput.style.borderBottom = 'none';
    } else {
        stackSuggestions.style.display = 'none';
    }
});

function addTool(tool) {
    if (!selectedStack.includes(tool) && selectedStack.length < 15) {
        selectedStack.push(tool);
        const toolItem = document.createElement('div');
        toolItem.className = 'tool-item';
        toolItem.textContent = tool;
        stackContainer.appendChild(toolItem);
        stackInput.value = '';
        stackSuggestions.style.display = 'none';
        stackArrayInput.value = JSON.stringify(selectedStack);
        stackInput.style.borderBottomLeftRadius = '20px';
        stackInput.style.borderBottomRightRadius = '20px';
        stackInput.style.borderBottom = '1px solid #CCCBCB';
    }
}

function addNewTool(newTool) {
    if (!selectedStack.includes(newTool) && selectedStack.length < 15) {
        stackList.push(newTool);
        addTool(newTool);
    }
}

document.addEventListener('click', function(event) {
    if (!stackSuggestions.contains(event.target) && event.target !== stackInput) {
        stackSuggestions.style.display = 'none';
        stackInput.style.borderBottomLeftRadius = '20px';
        stackInput.style.borderBottomRightRadius = '20px';
        stackInput.style.borderBottom = '1px solid #CCCBCB';
    }
});

</script>

<script src="bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="js/main.js"></script>

</html>