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
	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="css/main.css">

</head>

<body>

<?php

include 'navbar.php';

?>

<div class="sections" style="padding-top: 100px;background: #FAFAFA;height: 50% !important;">
	
	<div style="display: flex;justify-content: center;align-items: center;height: 100% !important;width: 100% !important;">
		
		<div style="display: flex;flex-direction: column;justify-content: center;text-align: center;width: 100% !important;gap: 10px;">
			
			<div style="width: 100% !important;">
				
				<form method="POST">
					
					<div style="display: flex;width: 100% !important;">

						<div style="width: 70px;height: 64px;background: white;display: flex;justify-content: center;align-items: center;border-top-left-radius: 20px;border-bottom-left-radius: 20px;box-shadow: -3px 0px 10px #D8F3FF; border-top: 1px solid #13B7FD;border-bottom: 1px solid #13B7FD;border-left: 1px solid #13B7FD;border-right: none;padding-left: 40px;">	
							
							<div style="background: transparent;width: 24px;height: 24px;">
									
								<img src="images/search.png" style="width: 100% !important;height: 100% !important;">

							</div>

						</div>

						<div style="width: 100% !important;">
							
							<input type="text" name="jobtitle" class="form-control" style="background: white;box-shadow: 10px 0px 10px #D8F3FF; border-top: 1px solid #13B7FD;border-bottom: 1px solid #13B7FD;border-right: none;border-left: none !important;border-radius: 0px !important;height: 64px !important;" placeholder="Job Title/keyword" required>

						</div>

						<div style="width: 100% !important;">
							
							<input type="text" name="jobtitle" class="form-control" style="background: white;box-shadow: 10px 0px 10px #D8F3FF; border-top: 1px solid #13B7FD;border-bottom: 1px solid #13B7FD;border-right: none;border-left: none !important;border-radius: 0px !important;height: 64px !important;" placeholder="| Location">

						</div>

						<div style="width: auto;padding-right: 10px;background: white;display: flex;align-items: center;justify-content: center;border-radius: 0 !important;border-top-right-radius: 20px !important;border-bottom-right-radius: 20px !important;border-left: none !important;border: 1px solid #13B7FD;">
							
							<input type="submit" name="submit" class="find-job" value="Find Job">

						</div>

					</div>

				</form>

			</div>

		</div>

	</div>	

</div>

<div class="sections" style="background: white;">
	
	<div>
		
		<div>
			
			<div>
				
				<p class="search-results"><a href="jobsearch.php"><font style="color: black;font-weight: 200;">←</font></a> Search Results <font class="results-found">(2,210 jobs found)</font></p>

			</div>

			<div style="display: flex;width: 100% !important;gap: 24px;">
				
				<div style="width: 35%;background: transparent;height: 1400px !important;overflow-y: auto;">

					<div style="background: transparent;gap: 16px !important;flex-wrap: wrap;flex-direction: column;display: flex;width: 100%;">
						 
						<div class="job-story-box job-active">
							
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

							<div style="display: flex;">
								
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

						</div> 

						<!-- End -->

						<div class="job-story-box">
							
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

							<div style="display: flex;">
								
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

						</div> 

						<!-- End -->

						<div class="job-story-box">
							
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

							<div style="display: flex;">
								
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

						</div> 

						<!-- End -->

						<div class="job-story-box">
							
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

							<div style="display: flex;">
								
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

						</div> 

						<!-- End -->

						<div class="job-story-box">
							
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

							<div style="display: flex;">
								
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

						</div> 

						<!-- End -->

						<div class="job-story-box">
							
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
										
										<font class="post">Frontend Developer</font>

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

							<div style="display: flex;">
								
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

						</div> 

						<!-- End -->

					</div>

				</div>

				<!-- Start of next -->

				<div class="role-desc">
					
					<div style="background: transparent;width: 100% !important;height: 100% !important;border-radius: inherit;display: flex;flex-direction: column;gap: 24px;">
						
						<div style="padding-bottom: 20px;" class="dash-sec">

							<div style="display: flex;gap: 10px;width: 100% !important;">
										
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

								<div style="flex-grow: 1;display: flex;justify-content: flex-end;background: transparent;">
									
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

						<div class="dash-sec">
							
							<div style="display: flex;flex-direction: column;gap: 24px;">
								
								<div>
									
									<font class="j-name">Frontend Developer</font>

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
								
								<div style="display: flex;flex-direction: column;gap: 8px;background: transparent;">
								
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

								<div>
									
									<div style="margin-top: 24px;display: flex;gap: 10px;">

										<a href="#" style="display: inline-flex;">
										
											<div class="apply">
												
												<font>Apply</font>

											</div>

										</a>

										<a href="#" style="display: inline-flex;">
										
											<div class="c-profile">
												
												<font>View company’s profile</font>

											</div>

										</a>

										<a href="#" style="display: inline-flex;">
										
											<div class="bk-mark">
												
												<img src="images/bk-mark.png" style="width: 24px;height: 24px;">

											</div>

										</a>

									</div>

								</div>

							</div>

						</div>

					</div>

					<div class="dash-sec">
						
						<div style="width: 100% !important;">
							
							<div style="width: 100% !important;display: flex;flex-direction: column;gap: 24px;">
								
								<div style="display: flex;flex-direction: column;width: 100% !important;background: transparent;gap: 10px;">
									
									<font class="bio">Job Description</font>

									<font class="j-desc">We are a Digital Product Engineering company that is scaling in a big way! We build products, services, and experiences that inspire, excite, and delight. We work at scale — across all devices and digital mediums, and our people exist everywhere in the world (18000+ experts across 36 countries, to be exact). Our work culture is dynamic and non-hierarchical. We are looking for great new colleagues. That's where you come in!</font>

								</div>

								<div style="display: flex;flex-direction: column;width: 100% !important;background: transparent;gap: 10px;">
									
									<font class="bio">Responsibilities</font>

									<ul style="flex-direction: column;display: flex;gap: 5px;">
										
										<li class="responsibilities">Build web applications with web development best practices</li>

										<li class="responsibilities">Basic understanding of user interface and user experience (UI/UX) design</li>

										<li class="responsibilities">Work with UI/UX Designer to transform wireframes and mock-ups into usable/reusable front-end code with HTML, CSS, and JavaScript.</li>

										<li class="responsibilities">Optimizing components for maximum performance across a vast array of web-capable devices, mobile and desktop browsers</li>

										<li class="responsibilities">Write high-quality, scalable, and reusable code</li>

										<li class="responsibilities">Collaborate with other teams to identify and resolve complex technical issues</li>

										<li class="responsibilities">Attention to detail</li>

									</ul>

								</div>

								<div style="display: flex;flex-direction: column;width: 100% !important;background: transparent;gap: 10px;">
									
									<font class="bio">Requirements</font>

									<ul style="flex-direction: column;display: flex;gap: 5px;">
										
										<li class="responsibilities">Build web applications with web development best practices</li>

										<li class="responsibilities">Basic understanding of user interface and user experience (UI/UX) design</li>

										<li class="responsibilities">Work with UI/UX Designer to transform wireframes and mock-ups into usable/reusable front-end code with HTML, CSS, and JavaScript.</li>

										<li class="responsibilities">Optimizing components for maximum performance across a vast array of web-capable devices, mobile and desktop browsers</li>

										<li class="responsibilities">Write high-quality, scalable, and reusable code</li>

										<li class="responsibilities">Collaborate with other teams to identify and resolve complex technical issues</li>

										<li class="responsibilities">Attention to detail</li>

									</ul>

								</div>

								<div style="display: flex;flex-direction: column;width: 100% !important;background: transparent;gap: 10px;">
									
									<font class="bio">Application Questions</font>

									<ul style="flex-direction: column;display: flex;gap: 5px;">
										
										<li class="responsibilities">Have you worked with a team of Developers on a project?</li>

										<li class="responsibilities">Have you worked with a team of Developers on a project?</li>

									</ul>

								</div>

								<div style="display: flex;flex-direction: column;width: 100% !important;background: transparent;gap: 10px;">
									
									<font class="bio">Deadline</font>

									<font class="responsibilities">24th October 2024</font>

								</div>

								<div style="display: flex;flex-direction: column;width: 100% !important;background: transparent;gap: 10px;">
									
									<font class="bio">Employee Benefits</font>

									<ul style="flex-direction: column;display: flex;gap: 5px;">
										
										<li class="responsibilities">Life insurance</li>

										<li class="responsibilities">Healthcare insurance</li>

										<li class="responsibilities">Employee assistance program (EAP)</li>

										<li class="responsibilities">Paid vacation (At least 3 weeks per year)</li>

									</ul>

								</div>
				
							</div>

						</div>

					</div>

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