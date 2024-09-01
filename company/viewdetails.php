<?php

session_start();

include '../connect.php';

include '../functions.php';

$select = "SELECT * FROM `users` WHERE `email`='".$_GET['email']."'";

$select_query = mysqli_query($conn, $select);

if (mysqli_num_rows($select_query) > 0) {
	
	while ($row = mysqli_fetch_assoc($select_query)){

		$name = $row["fullname"];

		$title = $row["title"];

		$profile = $row["profile"];


		$_SESSION["noms"] = $name;

		$_SESSION["titiles"] = $title;

		$_SESSION["pfps"] = $profile;

	}	

}

$sel = "SELECT * FROM `applicants` WHERE `job_id`='".$_GET["job_id"]."' AND `email`='".$_GET['email']."'";

$sel_query = mysqli_query($conn, $sel);

if (mysqli_num_rows($sel_query) > 0) {

	while ($row = mysqli_fetch_assoc($sel_query)){

		$phone = $row["phone"];

		$cv = $row["cv"];


		$_SESSION["ololo"] = $cv;

		$_SESSION["cololo"] = $phone;

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
			
			<div class="row" style="width: 100% !important;justify-content: space-between;">

				<div style="display: inline-block;width: auto;">
					
					<font class="bio"><a href="dials.php" style="color: inherit;"><font style="color: black;font-weight: 100;">←</font></a> <?php echo $_SESSION["noms"]; ?> - <?php echo $_SESSION["titiles"]; ?></font>

				</div>

				<div style="background: transparent;width: auto;display: inline-flex;padding: 0;gap: 50px;">
					
					<div style="background: transparent;width: 400px;">
						
						<form method="POST">
							
							<input type="search" name="search" placeholder="🔍 Search" class="form-control" style="height:46px;border-radius: 20px;padding-left: 20px;">

						</form>

					</div>

					<div class="row" style="gap: 5px;">
						
						<a href="#" style="width: auto;display: inline-block;background: transparent;padding: 0;">
							
							<div class="talent">
								
								<img src="../images/Star.png">

							</div>

						</a>

						<a href="#" style="width: auto;display: inline-block;padding: 0;">
							
							<div class="talent">
								
								<img src="../images/Chats.png">

							</div>

						</a>

					</div>

				</div>

			</div>

			<form style="gap: 20px;display: flex;margin-top: 20px;" method="POST" onsubmit="return formatTextareas()">
				
				<div class="col-lg-6 col-sm-6 col-md-6" style="flex: 1 1 100;background: #FAFAFA;border-radius: 24px 24px 0px 0px;padding: 24px;display: flex;flex-direction: column;gap: 24px;">
				
					<div class="dash-sec" style="flex-direction: column;gap: 20px;">
						
						<div>
							
							<label class="label-for">Name</label>

							<input required type="text" name="jobtitle" class="form-control personal" placeholder="e.g Project Manager" style="margin-top: 10px;cursor: not-allowed;background: transparent;" disabled value="<?php echo $_SESSION["noms"]; ?>">

						</div>

						<div>
							
							<label class="label-for">Email</label>

							<input required type="text" name="jobtitle" class="form-control personal" placeholder="e.g Project Manager" style="margin-top: 10px;cursor: not-allowed;background: transparent;" disabled value="<?php echo $_GET["email"]; ?>">

						</div>

						<div>
							
							<label class="label-for">Phone:</label>

							<input required type="text" name="jobtitle" class="form-control personal" placeholder="e.g Project Manager" style="margin-top: 10px;cursor: not-allowed;background: transparent;" disabled value="<?php echo $_SESSION["cololo"]; ?>">

						</div>

					</div>

					<!-- End -->

					<div class="dash-sec" style="flex-direction: column;gap: 20px;">
						
						<div style="display: flex;flex-direction: column;gap: 20px;">

							<div>
								
								<label class="label-for">Resume / Curriculum Vitae (CV)</label>

								<div class="resume" style="width: 100% !important;margin-top: 10px;">

								<a href="cv/<?php echo $_SESSION["ololo"]; ?>" download>
								
									<div style="display: flex;gap: 8px;">
										
										<div style="width: 40px;height: 40px;">
											
											<img src="../images/docx_icon.png" id="fileTypeImage" style="width: 100% !important;height: 100% !important;">

										</div>

										<div style="display: flex;align-items: center;">

											<div style="flex-direction: column;display: flex;gap: 3px;">
											
												<font class="cv-name"><?php echo $_SESSION["ololo"]; ?></font>

												<font class="addons">313 KB. 2 July 2024</font>

											</div>

										</div>

									</div>

								</a>

							</div>

							</div>

						</div>

					</div>

					<!-- End -->

				</div>

				<div class="col-lg-6 col-sm-6 col-md-6" style="flex: 1 1 100;background: #FAFAFA;border-radius: 24px 24px 0px 0px;padding: 24px;display: inline-flex;flex-direction: column;gap: 24px;height: auto;">

					<div class="dash-sec" style="flex-direction: column;gap: 20px;">
						
						<div>
							
							<label class="label-for">Relevant Skill Tags</label>

							<div class="form-control personal" style="display: flex;align-items: center;margin-top: 10px;flex-wrap: wrap;column-gap: 8px;row-gap: 20px;">

								<?php

								$testify = "SELECT * FROM `tag` WHERE `unique_id`='".$_GET["job_id"]."'";

								$testify_query = mysqli_query($conn, $testify);

								if (mysqli_num_rows($testify_query) > 0) {
									
									while ($row = mysqli_fetch_assoc($testify_query)){

										$tag = $row["tag"];


								?>

								<div class="skill-tag">

									<?php echo $tag; ?>

								</div>

								<?php

								}}

								?>

							</div>

						</div>

					</div>

				</div>

			</form>

		</div>

	</div>

</div>

<?php

include 'footer.php';

?>

</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>


<script>



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


const fileName = "<?php echo $_SESSION["ololo"]; ?>";

	const fileExtension = fileName.split('.').pop().toLowerCase();

	const imgElement = document.getElementById('fileTypeImage');

	if (fileExtension === 'pdf') {
	 
	    imgElement.src = 'images/pdf.png'; // Path to the PDF image

	}

	else if (fileExtension === 'docx') {
	    
	    imgElement.src = '../images/docx_icon.png'; // Path to the DOCX image

	}


</script>


</html>