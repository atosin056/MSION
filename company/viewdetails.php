<?php

session_start();

include '../connect.php';

include '../functions.php';

if (!isset($_SESSION['company_name'])){

	header('location: ../login.php');

}

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

	if (isset($_POST["sub"])) {

		$message = str_replace(array("\r\n", "\n", "\r"), '<br>', $_POST["message"]);

		$to = $_GET["email"];

		$from = $_SESSION["email"];

		$insert = "INSERT INTO `messages` (`id`,`sender`,`reciever`,`message`) VALUES (NULL, '".$from."','".$to."','".mysqli_real_escape_string($conn, $message)."')";

		$insert_query = mysqli_query($conn, $insert);
		
		if ($insert_query) {

		    header('Refresh: 0');

		}

	}

?>

<div style="width: 100% !important;height: auto;padding-top: 100px;padding-bottom: 100px;background: transparent;position: absolute;top: 0;z-index: 1000000000;justify-content: center;align-items: center;display: none;overflow-y: auto;" id="body">
	
	<div style="width: 100%;display: flex;justify-content: center;align-items: center;height: auto !important;">
		
		<div class="cante">
			
			<div class="cante-header" style="justify-content: space-between;display: flex;">
				
				<div class="what-to-do">
					
					<div>
						
						<img src="../images/send_mail.png" style="width: 24px;height: 24px;">

					</div>

					<div>
						
						<font class="send-m">Send a Message</font>

					</div>

				</div>

				<div style="cursor: pointer;" id="close">
					
					<img src="../images/close.png">

				</div>

			</div>

			<div class="cante-body">
				
				<div class="messaging-area" id="chat-box" style="margin-top: 20px;border-bottom: 1px solid #CCCCBB;padding-bottom: 30px;">	




					<!-- $message_select = "SELECT * FROM `messages` WHERE `sender`='".$_SESSION["email"]."' AND `reciever`='".$_GET["email"]."' OR `reciever`='".$_SESSION["email"]."' AND `sender`='".$_GET["email"]."'";

					$message_select_query = mysqli_query($conn, $message_select);

					if (mysqli_num_rows($message_select_query) > 0) {

						while ($futch = mysqli_fetch_assoc($message_select_query)){

							$sender = $futch["sender"];

							$reciever = $futch["reciever"];

							$message = $futch["message"]; -->

					
					<!-- ?> -->

					
					<!-- if ($reciever == $_SESSION["email"]) {
						

					?>
 -->
					<div style="display: flex;gap: 8px;">
					
						<div class="you">
							<!-- 
							<?php

							//echo $message;

							?> -->

						</div>

					</div>

					<!-- From me -->

					
					<!-- // }

					//if ($sender == $_SESSION["email"]) { -->
						

					?>

					<div style="display: flex;gap: 8px;justify-content: flex-end;">
					
						<div class="me">
							
							
							<!-- //echo $message;

							?> -->

						</div>

					</div>

					// }}}

					<!-- ?> -->

				</div>

				<form class="messaging-footer" method="POST">
					
					<div style="width: 40px;height: 40px;background: blue;border-radius: 100% !important;">
							
						<img src="profile/<?php echo $_SESSION["company_logo"]; ?>" style="width: 100% !important;height: 100% !important;border-radius: inherit;">

					</div>

					<div style="flex-grow: 1;">
						
						<textarea type="text" name="message" class="form-control" style="border-radius: 20px;height: 120px;padding-top: 20px;padding-left: 20px;" placeholder="type a message ..."></textarea>

					</div>

					<div>
						
						<input type="submit" name="sub" value="↑" class="message">

					</div>

				</form>

			</div>

		</div>

	</div>

</div>

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
							
							<div class="talent" id="chat">
								
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

								<a href="../cv/<?php echo $_SESSION["ololo"]; ?>" download>
								
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


document.getElementById("close").addEventListener("click", function() {

    document.getElementById("body").style.display = "none";

});

document.getElementById("chat").addEventListener("click", function() {

    document.getElementById("body").style.display = "block";

});




</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

    function fetchMessages() {
        
        $.ajax({
        
            url: 'fetch_messages.php?email=<?php echo $_GET["email"]; ?>',
        
            method: 'GET',
        
            dataType: 'json',
        
            success: function(response) {
        
                // Clear existing messages
        
                $('#chat-box').html('');

                // Loop through the messages and display them
        
                response.forEach(function(message) {
        
                    if (message.reciever == '<?php echo $_SESSION["email"]; ?>') {
        
                        $('#chat-box').append(`
        
                            <div style="display: flex;gap: 8px;">
        
                                <div class="you">${message.message}</div>
        
                            </div>
        
                        `);
        
                    }

                    else if (message.sender == '<?php echo $_SESSION["email"]; ?>') {
                    
                        $('#chat-box').append(`
                    
                            <div style="display: flex;gap: 8px;justify-content: flex-end;">
                    
                                <div class="me">${message.message}</div>
                    
                            </div>
                    
                        `);
                    
                    }
                
                });
            
            }
        
        });
    
    }

    // Fetch messages every 5 seconds
    
    setInterval(fetchMessages, 1000);

    // Initial fetch
    
    fetchMessages();

</script>


</html>