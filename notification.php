<?php

session_start();

include 'connect.php';

?>

<html>

<head>

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>MSION - Where talents meet opportunities. | Notifications</title>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="css/main.css">

</head>

<body>

<?php

include 'navbar.php';

?>

<div class="sections" style="background: white;padding-top: 164px;">
	
	<div>
		
		<div>
			
			<div style="display: flex;flex-direction: column;gap: 20px;">
					
				<div>
				
					<p class="search-results">Notifications<font class="results-found"> (5)</font></p>

				</div>

				<div style="display: flex;flex-direction: column;gap: 16px;">
				
					<div style="display: flex;flex-direction: column;gap: 24px;">

						<?php

							$select = "SELECT * FROM `messages` WHERE `reciever`='".$_SESSION["email"]."' ORDER BY `id` DESC";

							$select_query = mysqli_query($conn, $select);

							if (mysqli_num_rows($select_query) > 0) {
								
								while ($row = mysqli_fetch_assoc($select_query)){

									$sender = $row["sender"];

									$message = $row["message"];

									$_SESSION["sender"] = $sender;

							

						?>
						
						<a href="perform.php?email=<?php echo $sender; ?>">

							<div class="notification">
								
								<div style="flex-grow: 1;">
									
									<div style="display: flex;flex-direction: column;gap: 10px;">
										
										<font class="info"><?php echo $sender; ?> Just messaged you!</font>

										<font class="not"><?php echo substr($message, 0,200); ?></font>

									</div>

								</div>

							</div>

						</a>

						<?php

						}}

						?>

					</div>

				</div>

			</div>

		</div>

	</div>
	
</div>

<?php

include 'footer.php';

?>

</body>

<script>

	document.addEventListener('DOMContentLoaded', function() {
    
    var currentPage = '<?php echo basename($_SERVER["PHP_SELF"], ".php"); ?>';
    
    var links = document.querySelectorAll('.navField');

    links.forEach(link => {
    
        if (link.getAttribute('data-page') === currentPage) {
    
            link.classList.add('link-active');
    
        }
    
    });
    
});

const fileName = "<?php echo $_SESSION["cv"]; ?>";

const fileExtension = fileName.split('.').pop().toLowerCase();

const imgElement = document.getElementById('fileTypeImage');

if (fileExtension === 'pdf') {
 
    imgElement.src = 'images/pdf.png'; // Path to the PDF image

}

else if (fileExtension === 'docx') {
    
    imgElement.src = 'images/docx_icon.png'; // Path to the DOCX image

}

</script>

<script src="bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="js/main.js"></script>

</html>