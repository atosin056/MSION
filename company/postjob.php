<?php

session_start();

include '../connect.php';

include '../functions.php';

if($_GET["em"] == $_SESSION["email"]){

	if (isset($_POST["post"])) {
		
		$jobtitle = $_POST["jobtitle"];

		$jobdesc = $_POST["jobdesc"];

		$location = $_POST["location"];

		$experience = $_POST["experience"];



		$field1 = $_POST["field1"];

		$title1 = $_POST["title1"];



		$field2 = $_POST["field2"];

		$title2 = $_POST["title2"];


		$field3 = $_POST["field3"];

		$title3 = $_POST["title3"];



		$cv_rating = '1';

		//Code to check the rating

		if ($experience == "Entry level") {
			
			$cv_rating = '1';

			$_SESSION["cv_rating"] = $cv_rating;

		}

		if ($experience == "Junior level") {
			
			$cv_rating = '2';

			$_SESSION["cv_rating"] = $cv_rating;

		}

		if ($experience == "Mid level") {
			
			$cv_rating = '3';

			$_SESSION["cv_rating"] = $cv_rating;

		}

		if ($experience == "Senior") {
			
			$cv_rating = '4';

			$_SESSION["cv_rating"] = $cv_rating;

		}

		if ($experience == "Executive") {
			
			$cv_rating = '5';

			$_SESSION["cv_rating"] = $cv_rating;

		}

		$jobtype = $_POST["jobtype"];

		$currency = $_POST["currency"];

		$salary = $_POST["salary"];

		$deadline = $_POST["deadline"];

		$application_link = $_POST["application_link"];

		$unique_id = random_int(2, 10).random_int(3, 10);

		$_SESSION["unique_id"] = $unique_id;

		$unique_id = md5($unique_id);

		$skillstagJson = $_POST['skilltagsArray'] ?? '[]';
	   
	    $skillstags = json_decode($skillstagJson, true);


	    foreach ($skillstags as $skillstag) {

	    	$insert1 = "INSERT INTO `tag` (`id`, `tag`, `unique_id`,`company_name`) VALUES (NULL, '".$skillstag."', '".$unique_id."','".$_SESSION["company_name"]."')";

        	$insert1_query = mysqli_query($conn, $insert1);

	    }


		//Update the DB

		$insert = "INSERT INTO `job` (`id`,`jobtitle`,`jobdescription`,`cv_rating`,`jobtype`,`currency`,`salary`,`deadline`,`application_link`,`unique_id`,`company_name`,`company_logo`,`company_location`,`location`,`requirements`,`responsibilities`,`questions`,`requirements_text`,`responsibilities_text`,`questions_text`) VALUES (NULL,'".$jobtitle."','".mysqli_real_escape_string($conn, $jobdesc)."','".$cv_rating."','".$jobtype."','".$currency."','".$salary."','".$deadline."','".$application_link."','".$unique_id."','".$_SESSION["company_name"]."','".$_SESSION["company_logo"]."','".$_SESSION["location"]."','".$location."','".$title1."','".$title2."','".$title3."','".$field1."','".$field2."','".$field3."')";

		$insert_query = mysqli_query($conn, $insert);

		if ($insert_query) {
			
			header('location: dashboard.php');

		}

	}

}

?>

<html>

<head>

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>MSION - Where talents meet opportunities. | Dashboard</title>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
	
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="../css/main.css">

</head>

<body>

<?php

include 'navbar.php';

?>

<div class="sections" style="background: white;padding-top: 164px;">
	
	<div>
		
		<div>
			
			<div>
				
				<font class="bio">Post Job</font>

			</div>

			<form style="gap: 20px;display: flex;margin-top: 20px;" method="POST" onsubmit="return formatTextareas()">
				
				<div class="col-lg-6 col-sm-6 col-md-6" style="flex: 1 1 100;background: #FAFAFA;border-radius: 24px 24px 0px 0px;padding: 24px;display: flex;flex-direction: column;gap: 24px;">
				
					<div class="dash-sec" style="flex-direction: column;gap: 20px;">
						
						<div>
							
							<label class="label-for">Job Title</label>

							<input required type="text" name="jobtitle" class="form-control personal" placeholder="e.g Project Manager" style="margin-top: 10px;">

						</div>

						<div>
							
							<label class="label-for">Job Description</label>

							<textarea name="jobdesc" class="form-control personal" placeholder="Enter Text" style="margin-top: 10px;height: 200px;padding-top: 20px;"></textarea>

						</div>

					</div>

					<!-- End -->

					<div class="dash-sec" style="flex-direction: column;gap: 20px;">
						
						<div style="display: flex;flex-direction: column;gap: 20px;">


							<div>
								
								<label class="label-for">Field Title</label>

								<input required type="text" name="title1" class="form-control personal" placeholder="e.g Job Requirements" style="margin-top: 10px;">

							</div>

							<div>
								
								<label class="label-for">Field Description</label>

								<textarea required name="field1" class="form-control personal list-input" placeholder="Enter Field Description ✨" style="margin-top: 10px;height: 200px;padding-top: 20px;"></textarea>

							</div>

						</div>

						<div style="display: flex;flex-direction: column;gap: 20px;">

							<div>
								
								<label class="label-for">Field Title</label>

								<input required type="text" name="title2" class="form-control personal" placeholder="e.g Responsibilities" style="margin-top: 10px;">

							</div>

							<div>
								
								<label class="label-for">Field Description</label>

								<textarea name="field2" class="form-control personal list-input" placeholder="Enter Field Description ✨" style="margin-top: 10px;height: 200px;padding-top: 20px;"></textarea>

							</div>

						</div>

						<div style="display: flex;flex-direction: column;gap: 20px;">

							<div>
								
								<label class="label-for">Field Title</label>

								<input required type="text" name="title3" class="form-control personal" placeholder="e.g Questions" style="margin-top: 10px;">

							</div>

							<div>
								
								<label class="label-for">Field Description</label>

								<textarea name="field3" class="form-control personal list-input" placeholder="Enter Field Description ✨" style="margin-top: 10px;height: 200px;padding-top: 20px;"></textarea>

							</div>

						</div>	

					</div>

					<!-- End -->

				</div>

				<div class="col-lg-6 col-sm-6 col-md-6" style="flex: 1 1 100;background: #FAFAFA;border-radius: 24px 24px 0px 0px;padding: 24px;display: flex;flex-direction: column;gap: 24px;">

					<div class="dash-sec" style="flex-direction: column;gap: 20px;">
						
						<div>
							
							<label class="label-for">Location</label>

							<div class="form-control personal" style="display: flex;align-items: center;gap: 30px;margin-top: 10px;">

								<div style="display: flex;align-items: center;gap: 5px;">

									<input type="checkbox" name="location" onclick="onlyOne(this)" value="Remote" class="locate"> <font style="font-size: 14px;background: transparent;margin-top: 2px;">Remote</font>

								</div>

								<div style="display: flex;align-items: center;gap: 5px;">

									<input type="checkbox" class="locate" name="location" value="onsite" onclick="onlyOne(this)"> <font style="font-size: 14px;margin-top: 4px;">Onsite</font>

								</div>

								<div style="display: flex;align-items: center;gap: 5px;">
									
									<input type="checkbox" class="locate" name="location" value="Hybrid" onclick="onlyOne(this)"> <font style="font-size: 14px;margin-top: 4px;">Hybrid</font>

								</div>

							</div>

						</div>

						<div>
							
							<label class="label-for">Experience of Applicant</label>

							<div class="form-control" style="height: auto !important;display: flex;flex-wrap: wrap;align-items: center;row-gap: 15px;column-gap: 35px;margin-top: 10px;padding: 24px;border-radius: 20px;">

								<div style="display: flex;align-items: center;gap: 5px;">

									<input type="checkbox" name="experience" onclick="onlyone(this)" value="Entry level" class="locate"> <font style="font-size: 14px;background: transparent;margin-top: 2px;">Entry Level</font>

								</div>

								<div style="display: flex;align-items: center;gap: 5px;">

									<input type="checkbox" name="experience" onclick="onlyone(this)" value="Junior level" class="locate"> <font style="font-size: 14px;background: transparent;margin-top: 2px;">Junior Level</font>

								</div>

								<div style="display: flex;align-items: center;gap: 5px;">

									<input type="checkbox" name="experience" onclick="onlyone(this)" value="Mid level" class="locate"> <font style="font-size: 14px;background: transparent;margin-top: 2px;">Mid Level</font>

								</div>

								<div style="display: flex;align-items: center;gap: 5px;">

									<input type="checkbox" name="experience" onclick="onlyone(this)" value="Senior" class="locate"> <font style="font-size: 14px;background: transparent;margin-top: 2px;">Senior</font>

								</div>

								<div style="display: flex;align-items: center;gap: 5px;">

									<input type="checkbox" name="experience" onclick="onlyone(this)" value="Executive" class="locate"> <font style="font-size: 14px;background: transparent;margin-top: 2px;">Executive</font>

								</div>

							</div>

						</div>

						<div>
							
							<label class="label-for">Job Type</label>

							<div class="form-control" style="height: auto !important;display: flex;flex-wrap: wrap;align-items: center;row-gap: 15px;column-gap: 35px;margin-top: 10px;padding: 24px;border-radius: 20px;">

								<div style="display: flex;align-items: center;gap: 5px;">

									<input type="checkbox" name="jobtype" onclick="onlyne(this)" value="full-time" class="locate"> <font style="font-size: 14px;background: transparent;margin-top: 2px;">Full Time</font>

								</div>

								<div style="display: flex;align-items: center;gap: 5px;">

									<input type="checkbox" name="jobtype" onclick="onlyne(this)" value="part-time" class="locate"> <font style="font-size: 14px;background: transparent;margin-top: 2px;">Part Time</font>

								</div>

								<div style="display: flex;align-items: center;gap: 5px;">

									<input type="checkbox" name="jobtype" onclick="onlyne(this)" value="Contract" class="locate"> <font style="font-size: 14px;background: transparent;margin-top: 2px;">Contract</font>

								</div>

								<div style="display: flex;align-items: center;gap: 5px;">

									<input type="checkbox" name="jobtype" onclick="onlyne(this)" value="Internship" class="locate"> <font style="font-size: 14px;background: transparent;margin-top: 2px;">Internship</font>

								</div>

								<div style="display: flex;align-items: center;gap: 5px;">

									<input type="checkbox" name="jobtype" onclick="onlyne(this)" value="Volunteer" class="locate"> <font style="font-size: 14px;background: transparent;margin-top: 2px;">Volunteer</font>

								</div>

							</div>

						</div>

						<div>

							<label class="label-for">Relevant Skill tags</label>

							<div style="margin-top: 20px;">

							    <div class="form-group">

							        <input type="text" name="skilltags" class="form-control" style="border-radius: 20px; height: 56px; padding-left: 20px;" id="skilltagInput" placeholder="Enter skill tags">

							    </div>

							    <div id="skilltagSuggestions" class="suggestions"></div>
						
							    <div id="skilltagsContainer" class="skilltags-container"></div>
						
							    <input required type="hidden" required name="skilltagsArray" id="skilltagsArray">
						
							</div>

						</div>

					</div>

					
					<div class="dash-sec" style="flex-direction: column;gap: 20px;">
						
						<div>

							<label class="label-for">Annual Salary (Salary Range)</label>

							<div style="margin-top: 10px;padding: 0;" class="form-control personal" id="personal-container">
							    
								<div>
									
									<div style="display: flex;height: 100% !important;padding-left: 10px;">
										
										<select class="currency-select" id="currency-select" name="currency" class="form-control" style="width: 80px;height: 56px !important;border-radius: 20px;background: transparent;border: none;">
											


										</select>

										<div style="flex-grow: 1;background: transparent;">

											<input required type="text" name="salary" class="form-control personal" style="border-radius: 0px;border-top-right-radius: 20px;background: transparent;border-bottom-right-radius: 20px;border: inherit;" placeholder="45000 - 75000">

										</div>

									</div>

								</div>

							</div>

						</div>

						<div>
							
							<label class="label-for">Application Deadline</label>

							<div style="margin-top: 10px;">

								<input required type="date" id="formatted-date" placeholder="Select Date" name="deadline" class="form-control personal" style="height: 56px;background: transparent;">

							</div>

						</div>

						<div>
							
							<label class="label-for">External Application Link</label>

							<div style="margin-top: 10px;">

								<input required type="url" placeholder="http://www.example.com/apply" name="application_link" class="form-control personal" style="height: 56px;background: transparent;">

							</div>

						</div>

					</div>

					<div class="dash-sec" style="flex-direction: column;gap: 20px;">
						
						<div>
							
							<label class="label-for">Company's name</label>

							<div style="margin-top: 10px;">

								<input required type="url" disabled required placeholder="http://www.example.com/apply" class="form-control personal" style="height: 56px;background: transparent;" value="<?php echo $_SESSION["company_name"]; ?>">

							</div>

						</div>

						<div>
							
							<label class="label-for">Company's Website</label>

							<div style="margin-top: 10px;">

								<input required type="url" disabled required placeholder="http://www.example.com/apply" class="form-control personal" style="height: 56px;background: transparent;" value="<?php echo $_SESSION["website"]; ?>">

							</div>

						</div>

						<div>
							
							<label class="label-for">Company's Email</label>

							<div style="margin-top: 10px;">

								<input required type="url" disabled required placeholder="http://www.example.com/apply" class="form-control personal" style="height: 56px;background: transparent;" value="<?php echo $_SESSION["email"]; ?>">

							</div>

						</div>

					</div>

					<div class="dash-sec">
						
						<div style="width: 100% !important;">
							
							<input type="submit" name="post" class="p-job" value="Publish Job">

						</div>

					</div>

				</div>

			</form>

		</div>

	</div>

</div>

</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>


<script>


function onlyOne(checkbox) {

    var checkboxes = document.getElementsByName('location');

    checkboxes.forEach((item) => {

        if (item !== checkbox) item.checked = false;

    });
}


function formatTextareas() {
	
	// Get all textarea elements with class 'list-input'
	
	var textareas = document.querySelectorAll(".list-input");

	// Loop through each textarea
	
	textareas.forEach(function(textarea) {
	
	    // Split the textarea content by new lines
	
	    var lines = textarea.value.split('\n');
	

	
	    // Format each line by wrapping it with <li> tags
	
	    var formattedValue = lines.map(line => `<li class="responsibilities">${line.trim()}</li>`).join('');
	

	
	    // Set the formatted value back to the textarea for submission
	
	    textarea.value = formattedValue;
	
	});

	// Return false to prevent form submission if you want to see the result without refreshing the page
	
	return true;

}


function onlyone(checkbox) {

    var checkboxes = document.getElementsByName('experience');

    checkboxes.forEach((item) => {

        if (item !== checkbox) item.checked = false;

    });
}


// Get the container element
// Get the container element
const personalContainer = document.getElementById('personal-container');

// Add event listener for click to add 'personal-active' class
personalContainer.addEventListener('click', () => {
    personalContainer.classList.add('personal-active');
});

// Add event listener to remove 'personal-active' class when clicking outside
document.addEventListener('click', (event) => {
    if (!personalContainer.contains(event.target)) {
        personalContainer.classList.remove('personal-active');
    }
});



function onlyne(checkbox) {

    var checkboxes = document.getElementsByName('jobtype');

    checkboxes.forEach((item) => {

        if (item !== checkbox) item.checked = false;

    });
}

let skilltagsList = [
    // Example Skill Tags
    "UI/UX Design", "Creative Design", "Figma", "Design", "Consulting", "Market Research",
    "Financial Advisory", "Marketing Services", "Sales Management", "Customer Support",
    "Project Management", "IT Services", "Human Resources", "Logistics Management",
    "Event Planning", "Legal Services", "Compliance", "Brand Management", "Business Development",
    "Software Development", "Web Development", "App Development", "Cybersecurity", "Cloud Services",
    "Data Analysis", "Technical Support", "Network Administration", "IT Consulting", "E-commerce Solutions",
    "Machine Learning", "AI Solutions", "Photography", "Videography", "Graphic Design", "Content Writing",
    "SEO Optimization", "Social Media Management", "Copywriting", "Language Translation", "Virtual Assistant",
    "Tutoring", "Personal Training", "Life Coaching", "Pet Care", "House Cleaning", "Gardening", "Catering",
    "Travel Planning", "Event Hosting"
];

const selectedSkilltags = [];
const skilltagInput = document.getElementById('skilltagInput');
const skilltagSuggestions = document.getElementById('skilltagSuggestions');
const skilltagsContainer = document.getElementById('skilltagsContainer');
const skilltagsArrayInput = document.getElementById('skilltagsArray');

skilltagInput.addEventListener('input', function() {
    const query = this.value.toLowerCase();
    skilltagSuggestions.innerHTML = '';
    if (query) {
        const filteredSkilltags = skilltagsList.filter(skilltag => skilltag.toLowerCase().startsWith(query));
        if (filteredSkilltags.length > 0) {
            filteredSkilltags.forEach(skilltag => {
                const suggestionItem = document.createElement('div');
                suggestionItem.textContent = skilltag;
                suggestionItem.className = 'suggestion-item';
                suggestionItem.addEventListener('click', () => addSkilltag(skilltag));
                skilltagSuggestions.appendChild(suggestionItem);
            });
        }
        const addNewSkilltagItem = document.createElement('div');
        addNewSkilltagItem.textContent = `Add "${this.value}"`;
        addNewSkilltagItem.className = 'suggestion-item';
        addNewSkilltagItem.addEventListener('click', () => addNewSkilltag(this.value));
        skilltagSuggestions.appendChild(addNewSkilltagItem);
        skilltagSuggestions.style.display = 'block';
        skilltagInput.style.borderBottomLeftRadius = '0';
        skilltagInput.style.borderBottomRightRadius = '0';
        skilltagInput.style.borderBottom = 'none';
    } else {
        skilltagSuggestions.style.display = 'none';
    }
});

function addSkilltag(skilltag) {
    if (!selectedSkilltags.includes(skilltag) && selectedSkilltags.length < 15) {
        selectedSkilltags.push(skilltag);

        const skilltagItem = document.createElement('div');
        skilltagItem.className = 'skilltag-item';
        skilltagItem.textContent = skilltag;

        const removeButton = document.createElement('span');
        removeButton.textContent = 'X';
        removeButton.className = 'remove-btn';
        removeButton.addEventListener('click', () => removeSkilltag(skilltag));
        
        skilltagItem.appendChild(removeButton);
        skilltagsContainer.appendChild(skilltagItem);

        skilltagInput.value = '';
        skilltagSuggestions.style.display = 'none';
        skilltagsArrayInput.value = JSON.stringify(selectedSkilltags);

        // Restore input styles
        skilltagInput.style.borderBottomLeftRadius = '20px';
        skilltagInput.style.borderBottomRightRadius = '20px';
        skilltagInput.style.borderBottom = '1px solid #CCCBCB';
    }
}

function addNewSkilltag(newSkilltag) {
    if (!selectedSkilltags.includes(newSkilltag) && selectedSkilltags.length < 15) {
        skilltagsList.push(newSkilltag);
        addSkilltag(newSkilltag);
    }
}

function removeSkilltag(skilltag) {
    const index = selectedSkilltags.indexOf(skilltag);
    if (index !== -1) {
        selectedSkilltags.splice(index, 1);
        updateSkilltagsContainer();
        skilltagsArrayInput.value = JSON.stringify(selectedSkilltags);
    }
}

function updateSkilltagsContainer() {
    skilltagsContainer.innerHTML = '';
    selectedSkilltags.forEach(skilltag => {
        const skilltagItem = document.createElement('div');
        skilltagItem.className = 'skilltag-item';
        skilltagItem.textContent = skilltag;

        const removeButton = document.createElement('span');
        removeButton.textContent = 'X';
        removeButton.className = 'remove-btn';
        removeButton.addEventListener('click', () => removeSkilltag(skilltag));
        
        skilltagItem.appendChild(removeButton);
        skilltagsContainer.appendChild(skilltagItem);
    });
}

document.addEventListener('click', function(event) {
    if (!skilltagSuggestions.contains(event.target) && event.target !== skilltagInput) {
        skilltagSuggestions.style.display = 'none';

        // Restore input styles
        skilltagInput.style.borderBottomLeftRadius = '20px';
        skilltagInput.style.borderBottomRightRadius = '20px';
        skilltagInput.style.borderBottom = '1px solid #CCCBCB';
    }
});
   $(document).ready(function () {
            $.ajax({
                url: "https://restcountries.com/v3.1/all", // Fetch all countries
                method: "GET",
                success: function (data) {
                    data.forEach(function (country) {
                        if (country.currencies) {
                            // Get the currency code and flag
                            const currencyCode = Object.keys(country.currencies)[0];
                            const flagEmoji = country.flag;

                            // Add to the dropdown
                            $('#currency-select').append(
                                `<option value="${currencyCode}" data-flag="${flagEmoji}">${currencyCode}</option>`
                            );
                        }
                    });

                    // Initialize Select2 plugin
                    $('#currency-select').select2({
                        templateResult: formatState,
                        templateSelection: formatState,
                        minimumResultsForSearch: -1 // Hide search box
                    });
                }
            });

            function formatState(opt) {
                if (!opt.id) {
                    return opt.text;
                }
                var flag = $(opt.element).attr('data-flag');
                var currency = opt.text;
                
                // Display only one flag followed by the currency code
                return $('<span>' + flag + ' ' + currency + '</span>');
            }
        });

</script>


</html>