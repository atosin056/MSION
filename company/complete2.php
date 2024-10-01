<?php

session_start();

include '../connect.php';

if (!isset($_GET["distro"])) {

    header('location: complete.php');
}

if (isset($_POST["submit"])) {

    $location = $_POST["location"];

    $founding = $_POST["founding"];


    $size = $_POST["size"];

    //Update the DB

    $update = "UPDATE `company_users` SET `location`='" . $location . "',`founding_year`='" . $founding . "',`company_size`='" . $size . "'";

    $update_query = mysqli_query($conn, $update);

    if ($update_query) {

        $servicesJson = $_POST['servicesArray'] ?? '[]';

        $services = json_decode($servicesJson, true);


        foreach ($services as $service) {

            $insert1 = "INSERT INTO `company_services` (`id`, `company_service`, `email`) VALUES (NULL, '" . $service . "', '" . $_SESSION["otp_email_send"] . "')";

            $insert1_query = mysqli_query($conn, $insert1);
        }

        $industryJson = $_POST['industryArray'] ?? '[]';

        $industrys = json_decode($industryJson, true);


        foreach ($industrys as $industry) {

            $insert2 = "INSERT INTO `company_industry` (`id`, `company_industry`, `email`) VALUES (NULL, '" . $industry . "', '" . $_SESSION["otp_email_send"] . "')";

            $insert2_query = mysqli_query($conn, $insert2);
        }

        $stackJson = $_POST['stackArray'] ?? '[]';

        $stacks = json_decode($stackJson, true);


        foreach ($stacks as $stack) {

            $insert3 = "INSERT INTO `company_stack` (`id`, `company_stack`, `email`) VALUES (NULL, '" . $stack . "', '" . $_SESSION["otp_email_send"] . "')";

            $insert3_query = mysqli_query($conn, $insert3);
        }

        header('location: complete3.php?msitos=' . $_GET["distro"]);
    }
}

?>

<html>

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MSI Nigeria - Where talents meet opportunities. | Complete your profile</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="../css/main.css">

</head>

<body>

    <div style="padding-left: 220px;padding-right: 220px;background: white;width: 100% !important;height: auto !important;padding-top: 100px;padding-bottom: 100px;">

        <div>

            <div class="row" style="background: transparent;justify-content: space-between;">

                <div style="background: transparent;width: 320px;display: flex;align-items: center;">

                    <img src="../images/bar60.png">

                </div>

                <div style="width: 90px;">

                    <div class="skip-button">Skip</div>

                </div>

            </div>

            <div style="padding: 15px;background: #FAFAFA;width: 100% !important;height: auto !important;margin-top: 30px;padding-bottom: 64px;padding-left: 20px;">

                <form method="POST" enctype="multipart/form-data">

                    <div style="display: flex;flex-direction: column;gap: 16px;">

                        <div style="width: 100% !important;background: white;padding: 24px;border-radius: 20px;display: flex;flex-direction: column;gap: 20px;">

                            <div style="display: flex;flex-direction: column;gap: 16px;">

                                <div>

                                    <div>

                                        <h4 style="font-size: 22px;font-weight: 600;">Location</h4>

                                    </div>

                                    <div style="display: flex;flex-direction: column;gap: 20px;margin-top: 15px;">

                                        <div class="form-group">

                                            <select name="location" id="country" required class="form-control" style="border-radius: 20px !important;height: 56px;padding-left: 20px;" placeholder="Enter Text">

                                                <option value="Nigeria">Nigeria</option>

                                            </select>

                                        </div>

                                    </div>

                                </div>

                                <div>

                                    <div>

                                        <h4 style="font-size: 22px;font-weight: 600;">Founding Year</h4>

                                    </div>

                                    <div style="display: flex;flex-direction: column;gap: 20px;margin-top: 15px;">

                                        <div class="form-group">

                                            <input type="number" name="founding" class="form-control person" style="height: 56px;border-radius: 20px;padding-left: 20px;" placeholder="1999">

                                        </div>

                                    </div>

                                </div>

                                <div>

                                    <div>

                                        <h4 style="font-size: 22px;font-weight: 600;">Size of Employees</h4>

                                    </div>

                                    <div style="display: flex;flex-direction: column;gap: 20px;margin-top: 15px;">

                                        <div class="form-group">

                                            <select name="size" required class="form-control" style="border-radius: 20px !important;height: 56px;padding-left: 20px;" placeholder="Enter Text">

                                                <option value="1-4 Employees">1 - 4 Employees</option>

                                                <option value="5-99 Employees">5 - 99 Employees</option>

                                                <option value="100-499 Employees">100 - 499 Employees</option>

                                                <option value="500+ Employees">500+ Employees</option>

                                            </select>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div style="width: 100% !important;background: white;padding: 24px;border-radius: 20px;">

                            <div style="display: flex;flex-direction: column;gap: 16px;">

                                <div>

                                    <div>

                                        <h4 style="font-size: 22px;font-weight: 600;">Services (Enter up to 10)</h4>

                                    </div>

                                    <div style="margin-top: 20px;">

                                        <div class="form-group">

                                            <input type="text" name="services" class="form-control" style="border-radius: 20px;height: 56px;padding-left: 20px;" id="serviceInput" placeholder="Enter services">

                                        </div>

                                        <div id="serviceSuggestions"></div>

                                        <div id="servicesContainer"></div>

                                        <input type="hidden" required name="servicesArray" id="servicesArray">

                                    </div>

                                </div>

                                <div>

                                    <div>

                                        <h4 style="font-size: 22px;font-weight: 600;">Industry (Enter up to 10)</h4>

                                    </div>

                                    <div style="margin-top: 20px;">

                                        <div class="form-group">

                                            <input type="text" name="industry" class="form-control" style="border-radius: 20px;height: 56px;padding-left: 20px;" id="industryInput" placeholder="Enter services">

                                        </div>

                                        <div id="industrySuggestions"></div>

                                        <div id="industryContainer"></div>

                                        <input type="hidden" required name="industryArray" id="industryArray">

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
        "Docker", "Kubernetes", "UI/UX Design", "Full-Stack Development", "MySql", "Bootstrap", "MongoDB",

        // Tools and Technologies
        "Git", "Docker", "Jenkins", "Visual Studio Code", "Sublime Text", "Atom",
        "Eclipse", "IntelliJ IDEA", "PyCharm", "Postman", "PostgressSQL", "Maven", "Gradle",
        "Webpack", "Babel", "NPM", "Yarn", "Node.js", "Ruby on Rails", "NextJS", "ExpressJS",
        "Laravel", "Spring Boot", "Vue.js", "Tailwind", "Sass", "LessJS", "JIRA", "Trello",
        "Slack", "Odoo", "Dart", "Google Play",
        "Microsoft Teams", "Google Analytics", "Tableau", "Power BI", "AWS", "Webflow", "Canva",
        "Azure", "GCP", "Terraform", "Elasticsearch", "ExpressJS",

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


    let servicesList = [
        // Business Services
        "Consulting", "Market Research", "Financial Advisory",
        "Marketing Services", "Sales Management", "Customer Support",
        "Project Management", "IT Services", "Human Resources",
        "Logistics Management", "Event Planning", "Legal Services",
        "Compliance", "Brand Management", "Business Development",

        // IT Services
        "Software Development", "Web Development", "App Development",
        "Cybersecurity", "Cloud Services", "Data Analysis",
        "Technical Support", "Network Administration", "IT Consulting",
        "E-commerce Solutions", "Machine Learning", "AI Solutions",

        // Other Services
        "Photography", "Videography", "Graphic Design", "Content Writing",
        "SEO Optimization", "Social Media Management", "Copywriting",
        "Language Translation", "Virtual Assistant", "Tutoring",
        "Personal Training", "Life Coaching", "Pet Care", "House Cleaning",
        "Gardening", "Catering", "Travel Planning", "Event Hosting"
    ];

    const selectedServices = [];
    const serviceInput = document.getElementById('serviceInput');
    const serviceSuggestions = document.getElementById('serviceSuggestions');
    const servicesContainer = document.getElementById('servicesContainer');
    const servicesArrayInput = document.getElementById('servicesArray');

    serviceInput.addEventListener('input', function() {
        const query = this.value.toLowerCase();
        serviceSuggestions.innerHTML = '';
        if (query) {
            const filteredServices = servicesList.filter(service => service.toLowerCase().startsWith(query));
            if (filteredServices.length > 0) {
                filteredServices.forEach(service => {
                    const suggestionItem = document.createElement('div');
                    suggestionItem.textContent = service;
                    suggestionItem.className = 'suggestion-item';
                    suggestionItem.addEventListener('click', () => addService(service));
                    serviceSuggestions.appendChild(suggestionItem);
                });
            }
            const addNewServiceItem = document.createElement('div');
            addNewServiceItem.textContent = `Add "${this.value}"`;
            addNewServiceItem.className = 'suggestion-item';
            addNewServiceItem.addEventListener('click', () => addNewService(this.value));
            serviceSuggestions.appendChild(addNewServiceItem);
            serviceSuggestions.style.display = 'block';
            serviceInput.style.borderBottomLeftRadius = '0';
            serviceInput.style.borderBottomRightRadius = '0';
            serviceInput.style.borderBottom = 'none';
        } else {
            serviceSuggestions.style.display = 'none';
        }
    });

    function addService(service) {
        if (!selectedServices.includes(service) && selectedServices.length < 15) {
            selectedServices.push(service);
            const serviceItem = document.createElement('div');
            serviceItem.className = 'service-item';
            serviceItem.textContent = service;
            servicesContainer.appendChild(serviceItem);
            serviceInput.value = '';
            serviceSuggestions.style.display = 'none';
            servicesArrayInput.value = JSON.stringify(selectedServices);
            serviceInput.style.borderBottomLeftRadius = '20px';
            serviceInput.style.borderBottomRightRadius = '20px';
            serviceInput.style.borderBottom = '1px solid #CCCBCB';
        }
    }

    function addNewService(newService) {
        if (!selectedServices.includes(newService) && selectedServices.length < 15) {
            servicesList.push(newService);
            addService(newService);
        }
    }

    document.addEventListener('click', function(event) {
        if (!serviceSuggestions.contains(event.target) && event.target !== serviceInput) {
            serviceSuggestions.style.display = 'none';
            // Restore border bottom radius
            serviceInput.style.borderBottomLeftRadius = '20px';
            serviceInput.style.borderBottomRightRadius = '20px';
            serviceInput.style.borderBottom = '1px solid #CCCBCB';
        }
    });

    let industryList = [
        // Business Services
        "Consulting", "Market Research", "Financial Advisory",
        "Marketing Services", "Sales Management", "Customer Support",
        "Project Management", "IT Services", "Human Resources",
        "Logistics Management", "Event Planning", "Legal Services",
        "Compliance", "Brand Management", "Business Development",

        // IT Services
        "Software Development", "Web Development", "App Development",
        "Cybersecurity", "Cloud Services", "Data Analysis",
        "Technical Support", "Network Administration", "IT Consulting",
        "E-commerce Solutions", "Machine Learning", "AI Solutions",

        // Other Services
        "Photography", "Videography", "Graphic Design", "Content Writing",
        "SEO Optimization", "Social Media Management", "Copywriting",
        "Language Translation", "Virtual Assistant", "Tutoring",
        "Personal Training", "Life Coaching", "Pet Care", "House Cleaning",
        "Gardening", "Catering", "Travel Planning", "Event Hosting"
    ];

    const selectedIndustry = [];
    const industryInput = document.getElementById('industryInput');
    const industrySuggestions = document.getElementById('industrySuggestions');
    const industryContainer = document.getElementById('industryContainer');
    const industryArrayInput = document.getElementById('industryArray');

    industryInput.addEventListener('input', function() {
        const query = this.value.toLowerCase();
        industrySuggestions.innerHTML = '';
        if (query) {
            const filteredIndustry = industryList.filter(industry => industry.toLowerCase().startsWith(query));
            if (filteredIndustry.length > 0) {
                filteredIndustry.forEach(industry => {
                    const suggestionItem = document.createElement('div');
                    suggestionItem.textContent = industry;
                    suggestionItem.className = 'suggestion-item';
                    suggestionItem.addEventListener('click', () => addIndustry(industry));
                    industrySuggestions.appendChild(suggestionItem);
                });
            }
            const addNewIndustryItem = document.createElement('div');
            addNewIndustryItem.textContent = `Add "${this.value}"`;
            addNewIndustryItem.className = 'suggestion-item';
            addNewIndustryItem.addEventListener('click', () => addNewIndustry(this.value));
            industrySuggestions.appendChild(addNewIndustryItem);
            industrySuggestions.style.display = 'block';
            industryInput.style.borderBottomLeftRadius = '0';
            industryInput.style.borderBottomRightRadius = '0';
            industryInput.style.borderBottom = 'none';
        } else {
            industrySuggestions.style.display = 'none';
        }
    });

    function addIndustry(industry) {
        if (!selectedIndustry.includes(industry) && selectedIndustry.length < 15) {
            selectedIndustry.push(industry);
            const industryItem = document.createElement('div');
            industryItem.className = 'industry-item';
            industryItem.textContent = industry;
            industryContainer.appendChild(industryItem);
            industryInput.value = '';
            industrySuggestions.style.display = 'none';
            industryArrayInput.value = JSON.stringify(selectedIndustry);
            industryInput.style.borderBottomLeftRadius = '20px';
            industryInput.style.borderBottomRightRadius = '20px';
            industryInput.style.borderBottom = '1px solid #CCCBCB';
        }
    }

    function addNewIndustry(newIndustry) {
        if (!selectedIndustry.includes(newIndustry) && selectedIndustry.length < 15) {
            industryList.push(newIndustry);
            addIndustry(newIndustry);
        }
    }

    document.addEventListener('click', function(event) {
        if (!industrySuggestions.contains(event.target) && event.target !== industryInput) {
            industrySuggestions.style.display = 'none';
            // Restore border bottom radius
            industryInput.style.borderBottomLeftRadius = '20px';
            industryInput.style.borderBottomRightRadius = '20px';
            industryInput.style.borderBottom = '1px solid #CCCBCB';
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

    //End of services.

    const countries = [
        "Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antigua and Barbuda", "Argentina", "Armenia",
        "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus",
        "Belgium", "Belize", "Benin", "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil",
        "Brunei", "Bulgaria", "Burkina Faso", "Burundi", "Cabo Verde", "Cambodia", "Cameroon", "Canada",
        "Central African Republic", "Chad", "Chile", "China", "Colombia", "Comoros", "Congo (Congo-Brazzaville)",
        "Costa Rica", "Croatia", "Cuba", "Cyprus", "Czechia (Czech Republic)", "Denmark", "Djibouti", "Dominica",
        "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia",
        "Eswatini (fmr. Swaziland)", "Ethiopia", "Fiji", "Finland", "France", "Gabon", "Gambia", "Georgia",
        "Germany", "Ghana", "Greece", "Grenada", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti",
        "Holy See", "Honduras", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Israel",
        "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Kuwait", "Kyrgyzstan", "Laos",
        "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Madagascar",
        "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania", "Mauritius", "Mexico",
        "Micronesia", "Moldova", "Monaco", "Mongolia", "Montenegro", "Morocco", "Mozambique", "Myanmar (formerly Burma)",
        "Namibia", "Nauru", "Nepal", "Netherlands", "New Zealand", "Nicaragua", "Niger", "Nigeria", "North Korea",
        "North Macedonia", "Norway", "Oman", "Pakistan", "Palau", "Palestine State", "Panama", "Papua New Guinea",
        "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Qatar", "Romania", "Russia", "Rwanda", "Saint Kitts and Nevis",
        "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia",
        "Senegal", "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia",
        "South Africa", "South Korea", "South Sudan", "Spain", "Sri Lanka", "Sudan", "Suriname", "Sweden", "Switzerland",
        "Syria", "Tajikistan", "Tanzania", "Thailand", "Timor-Leste", "Togo", "Tonga", "Trinidad and Tobago", "Tunisia",
        "Turkey", "Turkmenistan", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States of America",
        "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe"
    ];

    // Populate the <select> element
    const selectElement = document.getElementById('country');
    countries.forEach(country => {
        const option = document.createElement('option');
        option.value = country;
        option.textContent = country;
        selectElement.appendChild(option);
    });
</script>

<script src="bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="js/main.js"></script>

</html>