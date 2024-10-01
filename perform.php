<?php

session_start();

include 'connect.php';

include 'functions.php';

?>

<html>

<head>

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>MSI Nigeria - Where talents meet opportunities. | Dashboard</title>

	<link rel="preconnect" href="https://fonts.googleapis.com">

	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="css/main.css">

</head>

<body>

	<?php

	if (isset($_POST["sub"])) {

		$message = str_replace(array("\r\n", "\n", "\r"), '<br>', $_POST["message"]);

		$to = $_GET["email"];

		$from = $_SESSION["email"];

		$insert = "INSERT INTO `messages` (`id`,`sender`,`reciever`,`message`) VALUES (NULL, '" . $from . "','" . $to . "','" . mysqli_real_escape_string($conn, $message) . "')";

		$insert_query = mysqli_query($conn, $insert);

		if ($insert_query) {

			header('Refresh: 0');
		}
	}

	?>

	<div style="width: 100% !important;height: auto;background: transparent;position: absolute;top: 0;z-index: 1000000000;justify-content: center;align-items: center;display: block;padding-top: 100px;padding-bottom: 100px;overflow-y: auto;" id="body">

		<div style="width: 100%;display: flex;justify-content: center;align-items: center;height: 100% !important;">

			<div class="cante">

				<div class="cante-header" style="justify-content: space-between;display: flex;">

					<div class="what-to-do">

						<div>

							<img src="images/send_mail.png" style="width: 24px;height: 24px;">

						</div>

						<div>

							<font class="send-m">Send a Message</font>

						</div>

					</div>

					<div style="cursor: pointer;" id="close">

						<img src="images/close.png">

					</div>

				</div>

				<div class="cante-body">

					<div class="messaging-area" id="messaging-area" style="margin-top: 20px;border-bottom: 1px solid #CCCCBB;padding-bottom: 30px;">



					</div>

					<form class="messaging-footer" method="POST">

						<div style="width: 40px;height: 40px;background: blue;border-radius: 100% !important;">

							<img src="profile/<?php echo $_SESSION["profile-pic"]; ?>" style="width: 100% !important;height: 100% !important;border-radius: inherit;">

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

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	<script>
		function fetchMessages() {

			$.ajax({

				url: 'fetch_messages.php?email=<?php echo $_GET["email"]; ?>',

				method: 'GET',

				dataType: 'json',

				success: function(response) {

					// Clear the current messages

					$('#messaging-area').html('');



					// Loop through the fetched messages and append them to the messaging area

					response.forEach(function(message) {

						if (message.reciever == '<?php echo $_SESSION["email"]; ?>') {

							$('#messaging-area').append(`

                            <div style="display: flex;gap: 8px;">

                                <div class="you">${message.message}</div>

                            </div>

                        `);

						} else if (message.sender == '<?php echo $_SESSION["email"]; ?>') {

							$('#messaging-area').append(`
                    
                            <div style="display: flex;gap: 8px;justify-content: flex-end;">
                    
                                <div class="me">${message.message}</div>
                    
                            </div>
                    
                        `);

						}

					});

				}

			});

		}

		// Fetch messages every 1 second

		setInterval(fetchMessages, 1000);

		// Initial fetch

		fetchMessages();
	</script>