<?php

session_start();

include 'connect.php';

?>

<html>

<head>

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>MSION - Where talents meet opportunities. | Dashboard</title>

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

<div class="sections" style="background: white;">
	
	<div>
		
		<div>
			
			<div>
				
				<p class="search-results">Jobs Applied for <font class="results-found">(6)</font></p>

			</div>

			<div>
				
				<div style="background: transparent;gap: 16px;width: auto !important;flex-wrap: wrap;" class="row">
			
					<div class="col-lg-4 col-md-4 col-sm-4 job-story-box">
						
						<div style="border-bottom: 1px solid var(--Neutrals-Neutrals200, #CCCBCB);;padding-bottom: 20px;">
							
							<div style="display: flex;gap: 10px;">
								
								<div class="company-logo">
									
									<img src="images/logo.png" style="width: 100% !important;height: 100% !important;">

								</div>

								<div>
									
									<div style="display: flex;flex-direction: column;height: 100% !important;background: transparent;">
										
										<div style="display: flex;align-items: center;height: auto;">

											<div style="height: auto;background: transparent;height: 80%;">

												<h4 class="name">MSI Nigeria</h4>

												<p class="location">Abuja, Nigeria</p>

											</div>

										</div>

									</div>

								</div>

								<div style="flex-grow: 1;display: flex;justify-content: flex-end;">
									
									<div style="flex-direction: column;gap: 5px;display: flex;background: transparent;justify-content: flex-end;align-items: flex-end;">
											
										<div class="active" style="display: inline-flex;">
											
											<div>
												
												<img src="images/active.png">

											</div>

											<div>
												
												<font class="active-text">Seen</font>

											</div>

										</div>

										<div style="background: transparent;display: flex;justify-content: flex-end;">
											
											<div>

												<img src="images/verified-tick.png" style="width: 16px;height: 16px;">&nbsp;<font class="time" style="font-size: 14px;">Verified Company</font>

											</div>

										</div>

									</div>

								</div>

							</div>

						</div>

						<div>
							
							<div style="display: flex;gap: 8px;flex-direction: column;">
								
								<div>
									
									<font class="post">Technical Support Specialist</font>

								</div>

								<div>
									
									<p class="job-post">We are a car wash business and have been opened since 2001, we look are very concerned about providing the best customer <a href="#">...see more</a></p>

								</div>

								<div>
									
									<div class="row" style="padding-left: 16px;gap: 8px;">
										
										<div class="resources">
											
											<div style="width: 16px;height: 16px;">
												
												<img src="images/Bag.png" style="width: 16px;height: 16px;">

											</div>

											<div>
												
												<font class="full-time">Full-time</font>

											</div>

										</div>

										<div class="resources">
											
											<div style="width: 16px;height: 16px;">
												
												<img src="images/Location.png" style="width: 16px;height: 16px;">

											</div>

											<div>
												
												<font class="full-time">Remote</font>

											</div>

										</div>

										<div class="resources">
											
											<div style="width: 16px;height: 16px;">
												
												<img src="images/Money.png" style="width: 16px;height: 16px;">

											</div>

											<div>
												
												<font class="full-time money">$40K - $60K USD</font>

											</div>

										</div>

									</div>

								</div>

							</div>

						</div>

					</div>

					<!-- End -->

					<div class="col-lg-4 col-md-4 col-sm-4 job-story-box">
						
						<div style="border-bottom: 1px solid var(--Neutrals-Neutrals200, #CCCBCB);;padding-bottom: 20px;">
							
							<div style="display: flex;gap: 10px;">
								
								<div class="company-logo">
									
									<img src="images/logo.png" style="width: 100% !important;height: 100% !important;">

								</div>

								<div>
									
									<div style="display: flex;flex-direction: column;height: 100% !important;background: transparent;">
										
										<div style="display: flex;align-items: center;height: auto;">

											<div style="height: auto;background: transparent;height: 80%;">

												<h4 class="name">MSI Nigeria</h4>

												<p class="location">Abuja, Nigeria</p>

											</div>

										</div>

									</div>

								</div>

								<div style="flex-grow: 1;display: flex;justify-content: flex-end;">
									
									<div style="flex-direction: column;gap: 5px;display: flex;">
											
										<div class="active">
											
											<div>
												
												<img src="images/active.png">

											</div>

											<div>
												
												<font class="active-text">Active</font>

											</div>

										</div>

										<div style="background: transparent;display: flex;justify-content: flex-end;">
											
											<font class="time">2Hrs Ago</font>

										</div>

									</div>

								</div>

							</div>

						</div>

						<div>
							
							<div style="display: flex;gap: 8px;flex-direction: column;">
								
								<div>
									
									<font class="post">Technical Support Specialist</font>

								</div>

								<div>
									
									<p class="job-post">We are a car wash business and have been opened since 2001, we look are very concerned about providing the best customer <a href="#">...see more</a></p>

								</div>

								<div>
									
									<div class="row" style="padding-left: 16px;gap: 8px;">
										
										<div class="resources">
											
											<div style="width: 16px;height: 16px;">
												
												<img src="images/Bag.png" style="width: 16px;height: 16px;">

											</div>

											<div>
												
												<font class="full-time">Full-time</font>

											</div>

										</div>

										<div class="resources">
											
											<div style="width: 16px;height: 16px;">
												
												<img src="images/Location.png" style="width: 16px;height: 16px;">

											</div>

											<div>
												
												<font class="full-time">Remote</font>

											</div>

										</div>

										<div class="resources">
											
											<div style="width: 16px;height: 16px;">
												
												<img src="images/Money.png" style="width: 16px;height: 16px;">

											</div>

											<div>
												
												<font class="full-time money">$40K - $60K USD</font>

											</div>

										</div>

									</div>

								</div>

							</div>

						</div>

					</div> 

					<!-- End -->

					<div class="col-lg-4 col-md-4 col-sm-4 job-story-box">
						
						<div style="border-bottom: 1px solid var(--Neutrals-Neutrals200, #CCCBCB);;padding-bottom: 20px;">
							
							<div style="display: flex;gap: 10px;">
								
								<div class="company-logo">
									
									<img src="images/logo.png" style="width: 100% !important;height: 100% !important;">

								</div>

								<div>
									
									<div style="display: flex;flex-direction: column;height: 100% !important;background: transparent;">
										
										<div style="display: flex;align-items: center;height: auto;">

											<div style="height: auto;background: transparent;height: 80%;">

												<h4 class="name">MSI Nigeria</h4>

												<p class="location">Abuja, Nigeria</p>

											</div>

										</div>

									</div>

								</div>

								<div style="flex-grow: 1;display: flex;justify-content: flex-end;">
									
									<div style="flex-direction: column;gap: 5px;display: flex;">
											
										<div class="closed">
											
											<div>
												
												<img src="images/closed.png">

											</div>

											<div>
												
												<font class="active-text">Closed</font>

											</div>

										</div>

										<div style="background: transparent;display: flex;justify-content: flex-end;">
											
											<font class="time">2Hrs Ago</font>

										</div>

									</div>

								</div>

							</div>

						</div>

						<div>
							
							<div style="display: flex;gap: 8px;flex-direction: column;">
								
								<div>
									
									<font class="post">Technical Support Specialist</font>

								</div>

								<div>
									
									<p class="job-post">We are a car wash business and have been opened since 2001, we look are very concerned about providing the best customer <a href="#">...see more</a></p>

								</div>

								<div>
									
									<div class="row" style="padding-left: 16px;gap: 8px;">
										
										<div class="resources">
											
											<div style="width: 16px;height: 16px;">
												
												<img src="images/Bag.png" style="width: 16px;height: 16px;">

											</div>

											<div>
												
												<font class="full-time">Full-time</font>

											</div>

										</div>

										<div class="resources">
											
											<div style="width: 16px;height: 16px;">
												
												<img src="images/Location.png" style="width: 16px;height: 16px;">

											</div>

											<div>
												
												<font class="full-time">Remote</font>

											</div>

										</div>

										<div class="resources">
											
											<div style="width: 16px;height: 16px;">
												
												<img src="images/Money.png" style="width: 16px;height: 16px;">

											</div>

											<div>
												
												<font class="full-time money">$40K - $60K USD</font>

											</div>

										</div>

									</div>

								</div>

							</div>

						</div>

						<!-- <div style="display: flex;">
							
							<div style="display: flex;flex-direction: column;gap: 8px;">
								
								<div style="display: flex;gap: 4px;">

									<div style="width: 16px;height: 16px;">
										
										<img src="images/Users.png" style="width: 16px;height: 16px;">

									</div>

									<div>
										
										<font class="application-number">95 Applications</font>

									</div>

								</div>

								<div style="display: flex;gap: 4px;">

									<div style="width: 16px;height: 16px;">
										
										<img src="images/verified-tick.png" style="width: 16px;height: 16px;">

									</div>

									<div>
										
										<font class="application-number">Verified Company</font>

									</div>

								</div>

							</div>

							<div style="display: flex;justify-content: flex-end;flex-grow: 1;">
								
								<a href="#">
									
									<div class="View">
										
										<font>View Job</font>

									</div>

								</a>

							</div>

						</div>
 -->
					</div> 

					<!-- End -->

					<div class="col-lg-4 col-md-4 col-sm-4 job-story-box">
						
						<div style="border-bottom: 1px solid var(--Neutrals-Neutrals200, #CCCBCB);;padding-bottom: 20px;">
							
							<div style="display: flex;gap: 10px;">
								
								<div class="company-logo">
									
									<img src="images/logo.png" style="width: 100% !important;height: 100% !important;">

								</div>

								<div>
									
									<div style="display: flex;flex-direction: column;height: 100% !important;background: transparent;">
										
										<div style="display: flex;align-items: center;height: auto;">

											<div style="height: auto;background: transparent;height: 80%;">

												<h4 class="name">MSI Nigeria</h4>

												<p class="location">Abuja, Nigeria</p>

											</div>

										</div>

									</div>

								</div>

								<div style="flex-grow: 1;display: flex;justify-content: flex-end;">
									
									<div style="flex-direction: column;gap: 5px;display: flex;">
											
										<div class="active">
											
											<div>
												
												<img src="images/active.png">

											</div>

											<div>
												
												<font class="active-text">Active</font>

											</div>

										</div>

										<div style="background: transparent;display: flex;justify-content: flex-end;">
											
											<font class="time">2Hrs Ago</font>

										</div>

									</div>

								</div>

							</div>

						</div>

						<div>
							
							<div style="display: flex;gap: 8px;flex-direction: column;">
								
								<div>
									
									<font class="post">Technical Support Specialist</font>

								</div>

								<div>
									
									<p class="job-post">We are a car wash business and have been opened since 2001, we look are very concerned about providing the best customer <a href="#">...see more</a></p>

								</div>

								<div>
									
									<div class="row" style="padding-left: 16px;gap: 8px;">
										
										<div class="resources">
											
											<div style="width: 16px;height: 16px;">
												
												<img src="images/Bag.png" style="width: 16px;height: 16px;">

											</div>

											<div>
												
												<font class="full-time">Full-time</font>

											</div>

										</div>

										<div class="resources">
											
											<div style="width: 16px;height: 16px;">
												
												<img src="images/Location.png" style="width: 16px;height: 16px;">

											</div>

											<div>
												
												<font class="full-time">Remote</font>

											</div>

										</div>

										<div class="resources">
											
											<div style="width: 16px;height: 16px;">
												
												<img src="images/Money.png" style="width: 16px;height: 16px;">

											</div>

											<div>
												
												<font class="full-time money">$40K - $60K USD</font>

											</div>

										</div>

									</div>

								</div>

							</div>

						</div>

						<!-- <div style="display: flex;">
							
							<div style="display: flex;flex-direction: column;gap: 8px;">
								
								<div style="display: flex;gap: 4px;">

									<div style="width: 16px;height: 16px;">
										
										<img src="images/Users.png" style="width: 16px;height: 16px;">

									</div>

									<div>
										
										<font class="application-number">95 Applications</font>

									</div>

								</div>

								<div style="display: flex;gap: 4px;">

									<div style="width: 16px;height: 16px;">
										
										<img src="images/verified-tick.png" style="width: 16px;height: 16px;">

									</div>

									<div>
										
										<font class="application-number">Verified Company</font>

									</div>

								</div>

							</div>

							<div style="display: flex;justify-content: flex-end;flex-grow: 1;">
								
								<a href="#">
									
									<div class="View">
										
										<font>View Job</font>

									</div>

								</a>

							</div>

						</div>
 -->
					</div> 

					<!-- End -->

					<div class="col-lg-4 col-md-4 col-sm-4 job-story-box">
						
						<div style="border-bottom: 1px solid var(--Neutrals-Neutrals200, #CCCBCB);;padding-bottom: 20px;">
							
							<div style="display: flex;gap: 10px;">
								
								<div class="company-logo">
									
									<img src="images/logo.png" style="width: 100% !important;height: 100% !important;">

								</div>

								<div>
									
									<div style="display: flex;flex-direction: column;height: 100% !important;background: transparent;">
										
										<div style="display: flex;align-items: center;height: auto;">

											<div style="height: auto;background: transparent;height: 80%;">

												<h4 class="name">MSI Nigeria</h4>

												<p class="location">Abuja, Nigeria</p>

											</div>

										</div>

									</div>

								</div>

								<div style="flex-grow: 1;display: flex;justify-content: flex-end;">
									
									<div style="flex-direction: column;gap: 5px;display: flex;">
											
										<div class="active">
											
											<div>
												
												<img src="images/active.png">

											</div>

											<div>
												
												<font class="active-text">Active</font>

											</div>

										</div>

										<div style="background: transparent;display: flex;justify-content: flex-end;">
											
											<font class="time">2Hrs Ago</font>

										</div>

									</div>

								</div>

							</div>

						</div>

						<div>
							
							<div style="display: flex;gap: 8px;flex-direction: column;">
								
								<div>
									
									<font class="post">Technical Support Specialist</font>

								</div>

								<div>
									
									<p class="job-post">We are a car wash business and have been opened since 2001, we look are very concerned about providing the best customer <a href="#">...see more</a></p>

								</div>

								<div>
									
									<div class="row" style="padding-left: 16px;gap: 8px;">
										
										<div class="resources">
											
											<div style="width: 16px;height: 16px;">
												
												<img src="images/Bag.png" style="width: 16px;height: 16px;">

											</div>

											<div>
												
												<font class="full-time">Full-time</font>

											</div>

										</div>

										<div class="resources">
											
											<div style="width: 16px;height: 16px;">
												
												<img src="images/Location.png" style="width: 16px;height: 16px;">

											</div>

											<div>
												
												<font class="full-time">Remote</font>

											</div>

										</div>

										<div class="resources">
											
											<div style="width: 16px;height: 16px;">
												
												<img src="images/Money.png" style="width: 16px;height: 16px;">

											</div>

											<div>
												
												<font class="full-time money">$40K - $60K USD</font>

											</div>

										</div>

									</div>

								</div>

							</div>

						</div>

						<!-- <div style="display: flex;">
							
							<div style="display: flex;flex-direction: column;gap: 8px;">
								
								<div style="display: flex;gap: 4px;">

									<div style="width: 16px;height: 16px;">
										
										<img src="images/Users.png" style="width: 16px;height: 16px;">

									</div>

									<div>
										
										<font class="application-number">95 Applications</font>

									</div>

								</div>

								<div style="display: flex;gap: 4px;">

									<div style="width: 16px;height: 16px;">
										
										<img src="images/verified-tick.png" style="width: 16px;height: 16px;">

									</div>

									<div>
										
										<font class="application-number">Verified Company</font>

									</div>

								</div>

							</div>

							<div style="display: flex;justify-content: flex-end;flex-grow: 1;">
								
								<a href="#">
									
									<div class="View">
										
										<font>View Job</font>

									</div>

								</a>

							</div>

						</div>
 -->
					</div> 

					<!-- End -->

					<div class="col-lg-4 col-md-4 col-sm-4 job-story-box">
						
						<div style="border-bottom: 1px solid var(--Neutrals-Neutrals200, #CCCBCB);;padding-bottom: 20px;">
							
							<div style="display: flex;gap: 10px;">
								
								<div class="company-logo">
									
									<img src="images/logo.png" style="width: 100% !important;height: 100% !important;">

								</div>

								<div>
									
									<div style="display: flex;flex-direction: column;height: 100% !important;background: transparent;">
										
										<div style="display: flex;align-items: center;height: auto;">

											<div style="height: auto;background: transparent;height: 80%;">

												<h4 class="name">MSI Nigeria</h4>

												<p class="location">Abuja, Nigeria</p>

											</div>

										</div>

									</div>

								</div>

								<div style="flex-grow: 1;display: flex;justify-content: flex-end;">
									
									<div style="flex-direction: column;gap: 5px;display: flex;">
											
										<div class="active">
											
											<div>
												
												<img src="images/active.png">

											</div>

											<div>
												
												<font class="active-text">Active</font>

											</div>

										</div>

										<div style="background: transparent;display: flex;justify-content: flex-end;">
											
											<font class="time">2Hrs Ago</font>

										</div>

									</div>

								</div>

							</div>

						</div>

						<div>
							
							<div style="display: flex;gap: 8px;flex-direction: column;">
								
								<div>
									
									<font class="post">Technical Support Specialist</font>

								</div>

								<div>
									
									<p class="job-post">We are a car wash business and have been opened since 2001, we look are very concerned about providing the best customer <a href="#">...see more</a></p>

								</div>

								<div>
									
									<div class="row" style="padding-left: 16px;gap: 8px;">
										
										<div class="resources">
											
											<div style="width: 16px;height: 16px;">
												
												<img src="images/Bag.png" style="width: 16px;height: 16px;">

											</div>

											<div>
												
												<font class="full-time">Full-time</font>

											</div>

										</div>

										<div class="resources">
											
											<div style="width: 16px;height: 16px;">
												
												<img src="images/Location.png" style="width: 16px;height: 16px;">

											</div>

											<div>
												
												<font class="full-time">Remote</font>

											</div>

										</div>

										<div class="resources">
											
											<div style="width: 16px;height: 16px;">
												
												<img src="images/Money.png" style="width: 16px;height: 16px;">

											</div>

											<div>
												
												<font class="full-time money">$40K - $60K USD</font>

											</div>

										</div>

									</div>

								</div>

							</div>

						</div>

						<!-- <div style="display: flex;">
							
							<div style="display: flex;flex-direction: column;gap: 8px;">
								
								<div style="display: flex;gap: 4px;">

									<div style="width: 16px;height: 16px;">
										
										<img src="images/Users.png" style="width: 16px;height: 16px;">

									</div>

									<div>
										
										<font class="application-number">95 Applications</font>

									</div>

								</div>

								<div style="display: flex;gap: 4px;">

									<div style="width: 16px;height: 16px;">
										
										<img src="images/verified-tick.png" style="width: 16px;height: 16px;">

									</div>

									<div>
										
										<font class="application-number">Verified Company</font>

									</div>

								</div>

							</div>

							<div style="display: flex;justify-content: flex-end;flex-grow: 1;">
								
								<a href="#">
									
									<div class="View">
										
										<font>View Job</font>

									</div>

								</a>

							</div>

						</div>
 -->
					</div> 

					<!-- End -->

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