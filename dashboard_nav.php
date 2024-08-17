<?php

session_start();

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light" style="border-bottom: 1px solid #F2F4F7;">
  
   <div class="container-fluid">
   
    	<a class="navbar-brand" href="index.php">
      	
	      	<div>
	      		
	      		<img src="images/logo.png" style="width: 60px;height: 50px;">

	    	</div>

    	</a>
   
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	   
	    	<span class="navbar-toggler-icon"></span>
	   
	    </button>
	   
	    <div class="collapse navbar-collapse" id="navbarNav">

	      	<ul class="navbar-nav mx-auto">
	       
	        	<li class="nav-item link">

	          		<a href="index.php" class="nav-link" data-page="index">Home</a>

	         	</li>

	         	<li class="nav-item link">

	          		<a href="#" class="nav-link" data-page="job">Job Search</a>

	         	</li>

	         	<li class="nav-item link">

	          		<a href="#" class="nav-link" data-page="resources">Resources</a>

	         	</li>

	         	<li class="nav-item link">

	          		<a href="about.php" class="nav-link" data-page="about">About us</a>

	         	</li>

	         	<li class="nav-item link">

	          		<a href="contact.php" class="nav-link" data-page="contact">Contact</a>

	         	</li>

	    	</ul>

	    	<div class="navbar-nav-end">
	         		
	         <div style="display: flex;">
	         		
	         	<div>

		        		<div class="dashboard-login">
		         			
		        			<img src="profile/<?php echo $_SESSION['profile-pic']; ?>" style="width: 100% !important;height: 100% !important;">

		        		</div>

	         	</div>

	         </div>

	        </div>

	    </div>

  	</div>

</nav>
