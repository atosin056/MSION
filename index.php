<?php

session_start();

?>

<html>

<head>

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>MSION - Where talents meet opportunities.</title>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/smooth-scrollbar/8.10.8/smooth-scrollbar.css">
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/smooth-scrollbar/8.10.8/smooth-scrollbar.min.js"></script>
	
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="css/main.css">

</head>

<body>

	<div class="chatbot-icon" id="chat-toggle" style="font-size: 50px;padding-top: 10px;cursor: pointer;">
		
		🤖

	</div>

	<div class="chatbot" style="display: flex;align-items: flex-end;width: 400px !important;z-index: 100000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000;position: fixed;top: 0;height: 100vh;">
		
		<div style="width: 400px !important;height:95vh;background: white;box-shadow: 0px 0px 40px #292E78;border-top-left-radius: 20px;border-top-right-radius: 20px;" id="chatbox">
			
			<div class="chat-head" style="width: 100% !important;height: auto;padding: 24px;background: #292E78 !important;">
				
				<font>MSIN BOT</font>

			</div>

			<div class="chat-body" style="padding-top: 30px;padding-left: 30px;padding-right: 30px;">
				
				<div style="width: 100%;display: flex;justify-content: flex-start;">

                    <div class="from typewriter-text">
                        
                        Hi there! I am MSINBOT 👋, your friendly AI assistant. I was developed by MSION to help you with your queries and provide information. How can I assist you today?

                    </div>

                </div>
<!-- 
                <div style="width: 100%;display: flex;justify-content: flex-end;">

                    <div class="to typewriter-text">
                        
                       Yo whatsupp

                    </div>

                </div> -->

			</div>

			<div class="chat-bottom">
                        
	            <form method="POST" id="chatForm">

	                <div style="display: flex;width: 100%;">
	                
	                    <div class="form-group">
	                        
	                        <input type="text" name="message" placeholder="Type a Message.." class="form-control wolo" style="height: 60px;flex-grow: 1;border-right: none;border-top-right-radius: 0px;border-bottom-right-radius: 0px;border-bottom: 0px;border-left: 0px;padding-left: 20px;">

	                    </div>

	                    <div style="display: flex;justify-content: flex-end;flex-grow: 1;padding-right: 20px;border-top: 1px solid #C8CBD9;">
	                        
	                        <input type="submit" name="submit" value="→" style="background: transparent;border: none;">

	                    </div>

	                </div>

	            </form>

            </div>

		</div>

	</div>


<?php

include 'navbar.php';

?>



<div class="header">

	<div>
		
		<div class="row">
			
			<div class="col-lg-7 col-sm-7 col-md-7" style="background: transparent;display: flex;align-items: center;">

				<div>
				
					<div class="header-text">
						
						<h4 style="font-size: 50px;font-weight: 700;line-height: 70px;">Where talents meet opportunities.</h4>

						<p style="color: #433E3F;line-height: 30px;">Find jobs that suits your interest & skills, find remote jobs you love, research the fastest-growing remote companies Looking for a career change? We got you covetransparent</p>

					</div>

					<div>
						
						<div class="row" style="gap: 8px;">
							
							<a href="<?php if (isset($_SESSION["email"])) {
								
								echo 'dashboard.php';

							}else{ echo 'register.php';} ?>" style="width: auto;padding: 0;">
								
								<div class="get-started">
									
									Find a Job

								</div>

							</a>

							<?php

							if (isset($_SESSION["email"])) {
								
							?>

							<a href="company/register.php" style="width: auto;padding: 0;pointer-events: none;cursor: not-allowed !important;">
								
								<div class="get-started" style="background: #7474801A !important;color: black !important;">
									
									Hire Talents

								</div>

							</a>

							<?php

							}

							else{

							?>

							<a href="company/register.php" style="width: auto;padding: 0;">
								
								<div class="get-started" style="background: #7474801A !important;color: black !important;">
									
									Hire Talents

								</div>

							</a>

							<?php } ?>

						</div>

					</div>

				</div>

			</div>

			<div class="col-lg-5 col-sm-5 col-md-5 header-image" style="background: transparent;">
				
				<img src="images/header.png" style="width: 100% !important;">

			</div>

		</div>

	</div>

</div>

<div class="partners">
	
	<div style="width: 100% !important;">
		
		<div style="display: flex;justify-content: center;">
			
			<div class="col-lg-7 col-sm-7 col-md-7" style="background: transparent;display: flex;justify-content: center;flex-direction: column;">
				
				<div style="background: transparent;width: 100%;">
					
					<h4 style="font-size: 28px;text-align: center;font-weight: 400;line-height: 38px;">World's class companies hiring <br>talents on MSION</h4>

				</div>

				<div style="background: transparent;width: 100% !important;">
					
					<div style="display: flex;justify-content: space-between;" class="row">
						
						<div style="width: 108.21px;height: 108.21px;">
							
							<a href="http://google.com" target="_blank">

								<img src="images/p1.png" style="width: 100% !important;height: 100% !important;">

							</a>

						</div>

						<div style="width: 108.21px;height: 108.21px;">
							
							<a href="http://amazon.com" target="_blank">

								<img src="images/p2.png" style="width: 100% !important;height: 100% !important;">

							</a>

						</div>

						<div style="width: 108.21px;height: 108.21px;">
							
							<a href="http://microsoft.com" target="_blank">

								<img src="images/p3.png" style="width: 100% !important;height: 100% !important;">

							</a>

						</div>

						<div style="width: 108.21px;height: 108.21px;">
							
							<a href="http://spotify.com" target="_blank">

								<img src="images/p4.png" style="width: 100% !important;height: 100% !important;">

							</a>

						</div>

						<div style="width: 108.21px;height: 108.21px;">
							
							<a href="http://meta.com" target="_blank">

								<img src="images/p5.png" style="width: 100% !important;height: 100% !important;">

							</a>

						</div>

						<div style="width: 108.21px;height: 108.21px;">
							
							<a href="http://stripe.com" target="_blank">

								<img src="images/p6.png" style="width: 100% !important;height: 100% !important;">

							</a>

						</div>

					</div>

				</div>

			</div>

		</div>

	</div>

</div>

<div style="background: #FAFAFA;width: 100% !important;height: auto !important;" class="section-2">
	
	<div style="display: flex;flex-direction: column;">
		
		<div class="col-lg-9 col-sm-9 col-md-9">
			
			<h4 style="font-size: 40px;font-weight: 700;">Explore thousands of job opportunities</h4>

			<p style="color: #433E3F;font-weight: 400;line-height: 30px;">Filter job listings based on location, industry, job type, and more. With our advanced search filters, you can narrow down your search to exactly what you're looking for.</p>

		</div>

		<div class="row" style="justify-content: space-between;height: 65px; !important;">
			
			<div class="col-lg-6 col-md-6 col-sm-6">
				
				<form method="POST">
					
					<div style="display: flex;">

						<div style="width: 70px;height: 64px;background: white;display: flex;justify-content: center;align-items: center;border-top-left-radius: 20px;border-bottom-left-radius: 20px;box-shadow: -3px 0px 10px #D8F3FF; border-top: 1px solid #13B7FD;border-bottom: 1px solid #13B7FD;border-left: 1px solid #13B7FD;border-right: none;">	
							
							<div style="background: transparent;width: 24px;height: 24px;">
									
								<img src="images/search.png" style="width: 100% !important;height: 100% !important;">

							</div>

						</div>

						<div style="width: 400px;">
							
							<input type="text" name="search" class="form-control" style="background: white;box-shadow: 10px 0px 10px #D8F3FF; border-top: 1px solid #13B7FD;border-bottom: 1px solid #13B7FD;border-right: none;border-left: none !important;border-radius: 0px !important;height: 64px !important;" placeholder="Job Title/keyword | Location">

						</div>

						<div style="width: auto;padding-right: 10px;background: white;display: flex;align-items: center;justify-content: center;border-radius: 0 !important;border-top-right-radius: 20px !important;border-bottom-right-radius: 20px !important;border-left: none !important;border: 1px solid #13B7FD;">
							
							<input type="submit" name="submit" class="find-job" value="Find Job">

						</div>

					</div>

				</form>

			</div>

			<div class="col-lg-6 col-md-6 col-sm-6" style="background: transparent;height: 64px;">
				
				<div style="display: flex;margin-left: 20px;gap: 20px;" class="row">
					
					<div class="posts">

						<div>
							
							<img src="images/post.png">

						</div>

						<div>
							
							<font style="font-size: 16px;font-weight: 600;">104,742</font>

							<font style="font-size: 14px;color: #433E3F;">Jobs posted</font>

						</div>
						
					</div>

					<div class="posts">

						<div>
							
							<img src="images/post2.png">

						</div>

						<div>
							
							<font style="font-size: 16px;font-weight: 600;">12,907</font>

							<font style="font-size: 14px;color: #433E3F;">Companies</font>

						</div>
						
					</div>

					<div class="posts">

						<div>
							
							<img src="images/post3.png">

						</div>

						<div>
							
							<font style="font-size: 16px;font-weight: 600;">104,742</font>

							<font style="font-size: 14px;color: #433E3F;">Users</font>

						</div>
						
					</div>

				</div>

			</div>

		</div>

		<div style="margin-top: 20px;padding-bottom: 100px;">
			
			<div class="row" style="gap: 16px;width: 100% !important;background: transparent;">
				
				<div class="first-post">
					
					<div>
						
						<img src="images/par.png">

					</div>

					<div>
						
						<font class="manage">Financial management</font>

						<br>

						<font class="role">10,347 Open roles</font>

					</div>

				</div>

				<div class="first-post">
					
					<div>
						
						<img src="images/par2.png">

					</div>

					<div>
						
						<font class="manage">Management analysis</font>

						<br>

						<font class="role">10,347 Open roles</font>

					</div>

				</div>

				<div class="first-post">
					
					<div>
						
						<img src="images/par3.png">

					</div>

					<div>
						
						<font class="manage">Quality control management</font>

						<br>

						<font class="role">10,347 Open roles</font>

					</div>

				</div>

				<div class="first-post">
					
					<div>
						
						<img src="images/par4.png">

					</div>

					<div>
						
						<font class="manage">Product Design Engineering</font>

						<br>

						<font class="role">10,347 Open roles</font>

					</div>

				</div>

				<div class="first-post">
					
					<div>
						
						<img src="images/par5.png">

					</div>

					<div>
						
						<font class="manage">Operation researcher</font>

						<br>

						<font class="role">10,347 Open roles</font>

					</div>

				</div>

				<div class="first-post">
					
					<div>
						
						<img src="images/par6.png">

					</div>

					<div>
						
						<font class="manage">Product Design Engineering</font>

						<br>

						<font class="role">10,347 Open roles</font>

					</div>

				</div>

				<div class="first-post">
					
					<div>
						
						<img src="images/par7.png">

					</div>

					<div>
						
						<font class="manage">Quality control management</font>

						<br>

						<font class="role">10,347 Open roles</font>

					</div>

				</div>

				<div class="first-post">
					
					<div>
						
						<img src="images/par8.png">

					</div>

					<div>
						
						<font class="manage">Software development</font>

						<br>

						<font class="role">10,347 Open roles</font>

					</div>

				</div>

				<div class="first-post">
					
					<div>
						
						<img src="images/par9.png">

					</div>

					<div>
						
						<font class="manage">Financial management</font>

						<br>

						<font class="role">10,347 Open roles</font>

					</div>

				</div>

				<div class="first-post">
					
					<div>
						
						<img src="images/par10.png">

					</div>

					<div>
						
						<font class="manage">Management Analysis</font>

						<br>

						<font class="role">10,347 Open roles</font>

					</div>

				</div>

				<div class="first-post">
					
					<div>
						
						<img src="images/par11.png">

					</div>

					<div>
						
						<font class="manage">Tosin Did it!</font>

						<br>

						<font class="role">10,347 Open roles</font>

					</div>

				</div>

				<div class="first-post">
					
					<div>
						
						<img src="images/par12.png">

					</div>

					<div>
						
						<font class="manage">Financial management</font>

						<br>

						<font class="role">10,347 Open roles</font>

					</div>

				</div>

			</div>

		</div>

	</div>

</div>

<div style="width: 100% !important;height: auto;padding: 64px 100px;background: white;display: flex;flex-direction: column;gap: 64px;">
	
	<div style="display: flex;justify-content: center;">
		
		<div class="col-lg-5 col-md-5 col-sm-5 how" style="text-align: center;">
			
			<h4>How MSION Works</h4>

			<p>Step-by-step guide on how job seekers and recruiters can use MSION</p>

		</div>

	</div>

	<div>
		
		<div class="row" style="gap: 16px;">
			
			<div class="second-post">
					
				<div>
						
					<img src="images/b1.png">

				</div>

				<div style="display: flex;flex-direction: column;gap: 6px;">
						
					<font class="manager">Create an account</font>

					<font class="roles" style="line-height: 26px;">Start your journey by signing up with MSION.</font>

				</div>

			</div>

			<div class="second-post">
					
				<div>
						
					<img src="images/b1.png">

				</div>

				<div style="display: flex;flex-direction: column;gap: 6px;">
						
					<font class="manager">Create an account</font>

					<font class="roles" style="line-height: 26px;">Start your journey by signing up with MSION.</font>

				</div>

			</div>

			<div class="second-post">
					
				<div>
						
					<img src="images/b1.png">

				</div>

				<div style="display: flex;flex-direction: column;gap: 6px;">
						
					<font class="manager" style="line-height: 25px;font-size: 16px;">Update your profile and upload your CV</font>

					<font class="roles" style="line-height: 26px;">This profile will be your professional identity on the platform.</font>

				</div>

			</div>

			<div class="second-post">
					
				<div>
						
					<img src="images/b1.png">

				</div>

				<div style="display: flex;flex-direction: column;gap: 6px;">
						
					<font class="manager" style="font-size: 16px;line-height: 30px;">Explore job listings or candidates</font>

					<font class="roles" style="line-height: 22px;font-size: 12px;">For job seekers, dive into a vast array of job listings tailored to your preferences.</font>

				</div>

			</div>

			<div class="second-post">
					
				<div>
						
					<img src="images/b1.png">

				</div>

				<div style="display: flex;flex-direction: column;gap: 6px;">
						
					<font class="manager" style="font-size: 16px;line-height: 30px;">Access Courses and Career Resources</font>

					<font class="roles" style="line-height: 22px;font-size: 12px;">Take advantage of MSION's extensive library of courses, webinars, and expert insights.</font>

				</div>

			</div>

		</div>

	</div>

</div>

<div style="background: #FAFAFA;width: 100% !important;height: auto !important;padding-left: 100px;">
	
	<div>
		
		<div class="row" style="justify-content: space-between;width: 100% !important;padding: 0 !!important;margin: 0 !important;">
			
			<div class="col-lg-5 col-sm-5 col-md-5" style="background: transparent;display: flex;align-items: center;">
			
				<div>
					
					<div class="helper">

						<p>How MSION helps with</p>
						
						<h4>Resume Buliding</h4>

						<p class="craft">Craft an impressive resume that highlights your skills and experiences with our built-in resume builder. With MSION, you'll have access to easy-to-use templates and tools to create a professional resume that stands out to potential employers.</p>

					</div>

				</div>

			</div>

			<div class="col-lg-6 col-sm-6 col-md-6">
				

				<img src="images/help.png" style="width: 100% !important;">

			</div>

		</div>

	</div>

</div>

<div style="background: #FFF;width: 100% !important;height: auto !important;" class="section-2">
	
	<div style="display: flex;">

		<div class="col-lg-6 col-sm-6 col-md-6">
			
			<h4 style="font-size: 40px;font-weight: 700;">Hire talented job seekers</h4>

			<p style="color: #433E3F;font-weight: 400;line-height: 30px;">MSION has a suite of tools to help you hire the best  talent all over the world. Find talent, post jobs, and promote your brand to thousands of motivated job seekers. It only takes a few minutes to create your company profile.</p>

		</div>

		<div class="col-lg-6 col-sm-6 col-md-6" style="display: flex;justify-content: flex-end;">
			
			<a href="#" style="width: 292px !important;display: block;">
				
				<div class="company-profile">
					
					<div class="row" style="background: transparent;width: 100% !important;gap: 10px;">
						
						<div style="width: 24px;height: 24px;background: transparent;">
							
							<img src="images/Plus.png">

						</div>

						<div style="background: transparent;width: auto;padding-top: 2.5px;">
							
							<font style="font-size: 12px;">Create company profile</font>

						</div>

					</div>

				</div>

			</a>

		</div>

	</div>

	<div>
		
		<div class="row" style="justify-content: space-between;width: 100% !important;flex-wrap: wrap;gap: 16px;">
			
			<div class="col-lg-4 col-md-4 col-sm-4 seekers">
				
				<div style="display: flex;flex-direction: column;gap: 20px;">
					
					<div style="width: 100% !important;height: 224px;">
						
						<img src="images/s1.png" style="width: 100% !important;height: 100% !important;">

					</div>

					<div class="seek-text"> 
						
						<p>Create a free company profile</p>

						<font>MSION has a suite of tools to help you hire the best  talent all over the world. Find talent, post jobs, and promote your brand to thousands of motivated job seekers. It only </font>

					</div>

					<div>
						
						<a href="#">
							
							<div class="create-profile">
								
								Create company profile

							</div>

						</a>

					</div>

				</div>

			</div>

			<div class="col-lg-4 col-md-4 col-sm-4 seekers">
				
				<div style="display: flex;flex-direction: column;gap: 20px;">
					
					<div style="width: 100% !important;height: 224px;">
						
						<img src="images/s2.png" style="width: 100% !important;height: 100% !important;">

					</div>

					<div class="seek-text"> 
						
						<p>Job posting</p>

						<font>MSION has a suite of tools to help you hire the best  talent all over the world. Find talent, post jobs, and promote your brand to thousands of motivated job seekers. It only </font>

					</div>

					<div>
						
						<a href="#">
							
							<div class="create-profile">
								
								Post a job

							</div>

						</a>

					</div>

				</div>

			</div>

			<div class="col-lg-4 col-md-4 col-sm-4 seekers">
				
				<div style="display: flex;flex-direction: column;gap: 20px;">
					
					<div style="width: 100% !important;height: 224px;">
						
						<img src="images/s3.png" style="width: 100% !important;height: 100% !important;">

					</div>

					<div class="seek-text"> 
						
						<p>Finding talents</p>

						<font>MSION has a suite of tools to help you hire the best  talent all over the world. Find talent, post jobs, and promote your brand to thousands of motivated job seekers. It only </font>

					</div>

					<div>
						
						<a href="#">
							
							<div class="create-profile">
								
								Showcase brand

							</div>

						</a>

					</div>

				</div>

			</div>

		</div>

	</div>

</div>

<div class="section-2" style="background: #FAFAFA;height: auto !important;">
	
	<div>
		
		<div style="background: #FAFAFA;">
			
			<div style="width: 100% !important;height: auto !important;background: white;border-top-left-radius: 24px;padding-top: 50px;padding-bottom: 64px;border-top-right-radius: 24px;">

				<div style="display: flex;gap: 20px;width: 100% !important;">

					<div class="col-lg-6 col-sm-6 col-md-6" style="background: transparent;flex: 1 1 100px;display: flex;align-items: center;justify-content: center; /* Grow, shrink, and base width */">

						<div class="sec">
						
							<h4>Find your dream job</h4>

							<ul>
								
								<li>Advanced Search Filters</li>

								<li>Personalized Job Alerts</li>

								<li>Resume Management</li>

								<li>Interview Scheduling</li>

							</ul>

						</div>

					</div>

					<div class="col-lg-6 col-sm-6 col-md-6" style="background: transparent;flex: 1 1 100px;height: 360px;">
						
						<img src="images/dream.png" style="width: 100% !important;height: 100% !important;">

					</div>
 				
 				</div>

			</div>

		</div>

		<div style="background: white;padding-left: 100px !important;margin-left: -100px !important;margin-right: -100px !important;padding-right: 100px;">

			<div style="width: 100% !important;height: auto !important;background: #FAFAFA;border-bottom-left-radius: 24px;border-bottom-right-radius: 24px;padding-top: 50px;padding-bottom: 64px;">

				<div style="display: flex;gap: 20px;width: 100% !important;justify-content: space-between;background: transparent;">

					<div class="col-lg-6 col-sm-6 col-md-6" style="background: transparent;flex: 1 1 100px;height: 360px;">
						
						<img src="images/sec2.png" style="width: 100% !important;height: 100% !important;">

					</div>

					<div class="col-lg-5 col-sm-5 col-md-5" style="background: transparent;flex: 1 1 100px;display: flex;align-items: center;justify-content: center;padding-left: 30px; /* Grow, shrink, and base width */">

						<div class="sec" style="background: transparent;">
						
							<h4 style="font-size: 30px;font-weight: 600;">Streamlining Recruitment for Success</h4>

							<ul>
								
								<li>Advanced Search Filters</li>

								<li>Personalized Job Alerts</li>

								<li>Resume Management</li>

								<li>Interview Scheduling</li>

							</ul>

						</div>

					</div>

				</div>

			</div>

		</div>

	</div>

</div>

<div class="section-2" style="background: url('images/bg.png') !important;width: 100% !important;height: auto;padding: 64px 100px;">
	
	<div>
		
		<div class="row" style="gap: 10px;">
			
			<div class="col-lg-4 col-sm-4 col-md-4 testimonial">
				
				<div>
					
					<div>
						
						<img src="images/].png">

					</div>

					<div class="testi">
						
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>

					</div>

					<div style="width: 100% !important;justify-content: flex-end;display: flex;">
						
						<div>
							
							<img src="images/[.png">

						</div>

					</div>

					<div style="display: flex;justify-content: center;">

						<div>

							<div style="display: flex;justify-content: center;">
						
								<div style="width: 40px;height: 40px;border-radius: 50px;border: 1.386px solid var(--Radial, #FFA800); lightgray 50% / cover no-repeat;">
									
									<img src="images/tes.png" style="width: 100% !important;height: 100% !important;border-radius: inherit !important;">

								</div>

							</div>

							<div style="display: flex;flex-direction: column;text-align: center;">
								
								<font style="font-weight: 600;">John Smith</font>

								<font style="color: var(--Neutrals-Neutrals600, #726C6C);text-align: center;font-family: Montserrat;font-size: 8px;font-style: normal;font-weight: 400;line-height: 120%; /* 9.6px */">Founder of Awesomeux Technology</font>

							</div>

						</div>

					</div>

				</div>

			</div>

			<div class="col-lg-4 col-sm-4 col-md-4 testimonial">
				
				<div>
					
					<div>
						
						<img src="images/].png">

					</div>

					<div class="testi">
						
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>

					</div>

					<div style="width: 100% !important;justify-content: flex-end;display: flex;">
						
						<div>
							
							<img src="images/[.png">

						</div>

					</div>

					<div style="display: flex;justify-content: center;">

						<div>

							<div style="display: flex;justify-content: center;">
						
								<div style="width: 40px;height: 40px;border-radius: 50px;border: 1.386px solid var(--Radial, #FFA800); lightgray 50% / cover no-repeat;">
									
									<img src="images/tes.png" style="width: 100% !important;height: 100% !important;border-radius: inherit !important;">

								</div>

							</div>

							<div style="display: flex;flex-direction: column;text-align: center;">
								
								<font style="font-weight: 600;">John Smith</font>

								<font style="color: var(--Neutrals-Neutrals600, #726C6C);text-align: center;font-family: Montserrat;font-size: 8px;font-style: normal;font-weight: 400;line-height: 120%; /* 9.6px */">Founder of Awesomeux Technology</font>

							</div>

						</div>

					</div>

				</div>

			</div>

			<div class="col-lg-4 col-sm-4 col-md-4 testimonial">
				
				<div>
					
					<div>
						
						<img src="images/].png">

					</div>

					<div class="testi">
						
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>

					</div>

					<div style="width: 100% !important;justify-content: flex-end;display: flex;">
						
						<div>
							
							<img src="images/[.png">

						</div>

					</div>

					<div style="display: flex;justify-content: center;">

						<div>

							<div style="display: flex;justify-content: center;">
						
								<div style="width: 40px;height: 40px;border-radius: 50px;border: 1.386px solid var(--Radial, #FFA800); lightgray 50% / cover no-repeat;">
									
									<img src="images/tes.png" style="width: 100% !important;height: 100% !important;border-radius: inherit !important;">

								</div>

							</div>

							<div style="display: flex;flex-direction: column;text-align: center;">
								
								<font style="font-weight: 600;">John Smith</font>

								<font style="color: var(--Neutrals-Neutrals600, #726C6C);text-align: center;font-family: Montserrat;font-size: 8px;font-style: normal;font-weight: 400;line-height: 120%; /* 9.6px */">Founder of Awesomeux Technology</font>

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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script type="text/javascript" src="js/main.js"></script>


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


	function typewriterEffect(element, speed = 30) {
    const text = element.textContent;
    element.textContent = ''; // Clear the text content
    let index = 0;

    function type() {
      if (index < text.length) {
        element.textContent += text.charAt(index);
        index++;
        setTimeout(type, speed);
      }
    }

    type();
  }

  // Initialize the typing effect for all elements with class 'typewriter-text'
  document.addEventListener('DOMContentLoaded', function () {
    const elements = document.querySelectorAll('.typewriter-text');
    elements.forEach(element => typewriterEffect(element, 20)); // 20ms per character
  });

  // Initialize the typing effect for the element with ID 'typewriter-text'
  document.addEventListener('DOMContentLoaded', function () {
    typewriterEffect('typewriter-text', 20); // 50ms per character
  });

    
    

   



document.addEventListener("DOMContentLoaded", function() {
    
    var chatbox = document.getElementById("chatbox");
    
    var chatToggle = document.getElementById("chat-toggle");



    // Toggle the chatbox when the chat icon is clicked

    chatToggle.addEventListener("click", function() {

        if (chatbox.classList.contains("show")) {

            chatbox.classList.remove("show");

            setTimeout(function() {

                chatbox.style.display = "none";

            }, 300); // Wait for the transition to complete before hiding

        } else {

            chatbox.style.display = "block";

            setTimeout(function() {

                chatbox.classList.add("show");

            }, 10); // Tiny delay to trigger transition

        }

    });



    // Hide chatbox if clicked outside

    document.addEventListener("click", function(event) {

        if (!chatbox.contains(event.target) && !chatToggle.contains(event.target)) {

            chatbox.classList.remove("show");

            setTimeout(function() {

                chatbox.style.display = "none";

            }, 300);

        }

    });

});


document.addEventListener("DOMContentLoaded", function() {

    var chatForm = document.getElementById('chatForm');

    var chatInput = document.querySelector('input[name="message"]');

    var chatBox = document.querySelector('.chat-body');

    var chatToggle = document.getElementById('chat-toggle');

    var chatbox = document.getElementById('chatbox');



    // Handle form submission

    chatForm.addEventListener('submit', function(event) {

        event.preventDefault();

        var userMessage = chatInput.value;



        // Display user message

        var userDiv = document.createElement('div');

        userDiv.style.width = '100%';

        userDiv.style.display = 'flex';

        userDiv.style.justifyContent = 'flex-end';


        var userMessageDiv = document.createElement('div');

        userMessageDiv.className = 'to';

        userMessageDiv.textContent = `${userMessage}`;

        userDiv.appendChild(userMessageDiv);



        chatBox.appendChild(userDiv);



        // Add typing indicator

        var typingDiv = document.createElement('div');

        typingDiv.className = 'typing-indicator';

        typingDiv.style.width = '100%';

        typingDiv.style.display = 'flex';

        typingDiv.style.justifyContent = 'center';

        typingDiv.textContent = 'Bot is typing...';

        

        chatBox.appendChild(typingDiv);


        // Send message to server via AJAX
       
        var xhr = new XMLHttpRequest();

        xhr.open('POST', 'chat.php', true);

        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function() {

            if (xhr.status >= 200 && xhr.status < 400) {

                var data = JSON.parse(xhr.responseText);

                // Remove typing indicator

                chatBox.removeChild(typingDiv);


                // Display chatbot response

                var botDiv = document.createElement('div');

                botDiv.style.width = '100%';

                botDiv.style.display = 'flex';

                botDiv.style.justifyContent = 'flex-start';


                var botMessageDiv = document.createElement('div');

                botMessageDiv.className = 'from typewriter-text';

                botMessageDiv.textContent = `${data.reply}`;

                botDiv.appendChild(botMessageDiv);



                chatBox.appendChild(botDiv);


                // Scroll to the bottom
                chatBox.scrollTop = chatBox.scrollHeight;




                // Clear input field

                chatInput.value = '';

            } else {

                console.error('Server error:', xhr.statusText);

                chatBox.removeChild(typingDiv); // Remove typing indicator if error occurs

            }

        };

        xhr.onerror = function() {

            console.error('Request failed');

            chatBox.removeChild(typingDiv); // Remove typing indicator if request fails

        };

        xhr.send('message=' + encodeURIComponent(userMessage));

    });



    // Hide chatbox when clicking outside

    document.addEventListener('click', function(event) {

        if (!chatbox.contains(event.target) && !chatToggle.contains(event.target)) {

            chatbox.style.display = 'none';

        }

    });

});
</script>

<script src="bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="js/main.js"></script>

</html>