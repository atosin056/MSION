<nav id="navbar-example" class="navbar navbar-expand-lg navbar-light bg-light fixed-top navbar-fixed">
  
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

	          		<a href="jobsearch.php" class="nav-link" data-page="jobsearch">Job Search</a>

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

	    	<?php
	         	
	        if (isset($_SESSION["email"]) && isset($_SESSION["profile-pic"])){	

	         ?>	

	         <div class="navbar-nav-end">
	         		
		        <div style="display: flex;">
		         		
		         	<div>

			        	<div class="dashboard-login" id="profile-container" style="cursor: pointer;">
			         			
			        		<img src="images/new/icon.png" style="width: 100% !important;height: 100% !important;border-radius: inherit;" id="profile-pic">

			        	</div>

		        	</div>

	        	</div>

	        </div>

	        <div id="profile-dropdown" class="profile-dropdown">
			    
			    <div style="width: 100% !important;background: white;border-radius: 12px;padding-left: 12px;padding-right: 12px;display: flex;flex-direction: column;gap: 8px;">
			    	
			    	<a href="dashboard.php">

				    	<div class="list">
				    		
				    		<div>
				    			
				    			<img src="images/profile.png" style="width: 24px;height: 24px;">

				    		</div>

				    		<div>
				    			
				    			<font>Profile</font>

				    		</div>

				    	</div>

				    </a>

				    <a href="jobsearch.php">

				    	<div class="list">
				    		
				    		<div>
				    			
				    			<img src="images/Bag.png" style="width: 24px;height: 24px;">

				    		</div>

				    		<div>
				    			
				    			<font>Find Jobs</font>

				    		</div>

				    	</div>

				    </a>

				    <a href="applied.php">

				    	<div class="list">
				    		
				    		<div>
				    			
				    			<img src="images/applications.png" style="width: 24px;height: 24px;">

				    		</div>

				    		<div>
				    			
				    			<font>Applications</font>

				    		</div>

				    	</div>

				    </a>

				    <a href="notification.php">

				    	<div class="list">
				    		
				    		<div>
				    			
				    			<img src="images/bell.png" style="width: 24px;height: 24px;">

				    		</div>

				    		<div>
				    			
				    			<font>Notifications</font>

				    		</div>

				    	</div>

				    </a>

				    <a href="saved.php">

				    	<div class="list">
				    		
				    		<div>
				    			
				    			<img src="images/bell.png" style="width: 24px;height: 24px;">

				    		</div>

				    		<div>
				    			
				    			<font>Saved Jobs</font>

				    		</div>

				    		<div style="flex-grow: 1;justify-content: flex-end;display: flex;">
				    			
				    			<div style="padding: 10px;border-radius: 100px;background: #E3E3E3;width: auto;">
				    				
				    				<?php
									
									include 'connect.php';

									// Your database connection should already be established here
									// $conn = new mysqli('localhost', 'username', 'password', 'database_name');

									$count = "SELECT COUNT(*) AS total FROM `saved_jobs`";
									
									$result = mysqli_query($conn, $count);

									if ($result) {
									
									    // Fetch the result as an associative array
									
									    $row = $result->fetch_assoc();

									    // Store the total count in the session
									
									    $_SESSION["jobs"] = $row['total'];
									
									}

									else {
									
									    // Handle the case where the query fails
									
									    echo "Query failed: " . mysqli_error($conn);
									
									}

									echo $_SESSION["jobs"];

									?>


				    			</div>

				    		</div>

				    	</div>

				    </a>

			    </div>

			    <!-- Second -->

			    <div style="width: 100% !important;background: white;border-radius: 12px;padding-left: 12px;padding-right: 12px;display: flex;flex-direction: column;gap: 8px;margin-top: 10px;">
			    	
			    	<a href="#">

				    	<div class="list">
				    		
				    		<div>
				    			
				    			<img src="images/Headset.png" style="width: 24px;height: 24px;">

				    		</div>

				    		<div>
				    			
				    			<font>Help</font>

				    		</div>

				    	</div>

				    </a>

				    <a href="settings.php">

				    	<div class="list">
				    		
				    		<div>
				    			
				    			<img src="images/Gear.png" style="width: 24px;height: 24px;">

				    		</div>

				    		<div>
				    			
				    			<font>Settings</font>

				    		</div>

				    	</div>

				    </a>

				    <a href="logout.php">

				    	<div class="list sign-out">
				    		
				    		<div>
				    			
				    			<img src="images/signout.png" style="width: 24px;height: 24px;">

				    		</div>

				    		<div>
				    			
				    			<font>Sign Out</font>

				    		</div>

				    	</div>

				    </a>

			    </div>
			
			</div>

			<script type="text/javascript">
				document.getElementById("profile-pic").onclick = function() {
		        var dropdown = document.getElementById("profile-dropdown");
		        if (dropdown.style.display === "none" || dropdown.style.display === "") {
		            dropdown.style.display = "block";
		        } else {
		            dropdown.style.display = "none";
		        }
		    }
			</script>

	        <?php

	     	}

	     	if(isset($_SESSION["comp_unique"])){

	     		include 'connect.php';

	     		$sele = "SELECT * FROM `company_users` WHERE `unique_id`='".$_SESSION["comp_unique"]."'";

	     		$sele_query = mysqli_query($conn, $sele);

	     		if(mysqli_num_rows($sele_query) > 0){

	     			while ($row = mysqli_fetch_assoc($sele_query)){

	     				$company_logo = $row["company_logo"];

	     				$_SESSION["log"] = $company_logo;

	     			}

	     		}

	     		?>

	     		<div class="navbar-nav-end">
	         		
		        <div style="display: flex;">
		         		
		         	<div>

			        	<div class="dashboard-login" id="profile-container" style="cursor: pointer;">
			         			
			        		<img src="profile/<?php echo $_SESSION['log']; ?>" style="width: 100% !important;height: 100% !important;border-radius: inherit;" id="log-pic">

			        	</div>

		        	</div>

	        	</div>

	        </div>

	        <div id="log-dropdown" class="profile-dropdown">
			    
			    <div style="width: 100% !important;background: white;border-radius: 12px;padding-left: 12px;padding-right: 12px;display: flex;flex-direction: column;gap: 8px;">
			    	
			    	<a href="company/dashboard.php">

				    	<div class="list">
				    		
				    		<div>
				    			
				    			<img src="images/profile.png" style="width: 24px;height: 24px;">

				    		</div>

				    		<div>
				    			
				    			<font>Profile</font>

				    		</div>

				    	</div>

				    </a>

				    <a href="company/dials.php">

				    	<div class="list">
				    		
				    		<div>
				    			
				    			<img src="images/dshbrd.png" style="width: 24px;height: 24px;">

				    		</div>

				    		<div>
				    			
				    			<font>Dashboard</font>

				    		</div>

				    	</div>

				    </a>

				    <a href="../applied.php">

				    	<div class="list">
				    		
				    		<div>
				    			
				    			<img src="images/applications.png" style="width: 24px;height: 24px;">

				    		</div>

				    		<div>
				    			
				    			<font>Applications</font>

				    		</div>

				    	</div>

				    </a>

				    <a href="../notification.php">

				    	<div class="list">
				    		
				    		<div>
				    			
				    			<img src="images/bell.png" style="width: 24px;height: 24px;">

				    		</div>

				    		<div>
				    			
				    			<font>Notifications</font>

				    		</div>

				    	</div>

				    </a>

				    <a href="../saved.php">

				    	<div class="list">
				    		
				    		<div>
				    			
				    			<img src="images/bell.png" style="width: 24px;height: 24px;">

				    		</div>

				    		<div>
				    			
				    			<font>Saved Jobs</font>

				    		</div>

				    		<div style="flex-grow: 1;justify-content: flex-end;display: flex;">
				    			
				    			<div style="padding: 10px;border-radius: 100px;background: #E3E3E3;width: auto;">
				    				
				    				3

				    			</div>

				    		</div>

				    	</div>

				    </a>

			    </div>

			    <!-- Second -->

			    <div style="width: 100% !important;background: white;border-radius: 12px;padding-left: 12px;padding-right: 12px;display: flex;flex-direction: column;gap: 8px;margin-top: 10px;">
			    	
			    	<a href="../#">

				    	<div class="list">
				    		
				    		<div>
				    			
				    			<img src="images/Headset.png" style="width: 24px;height: 24px;">

				    		</div>

				    		<div>
				    			
				    			<font>Help</font>

				    		</div>

				    	</div>

				    </a>

				    <a href="../settings.php">

				    	<div class="list">
				    		
				    		<div>
				    			
				    			<img src="images/Gear.png" style="width: 24px;height: 24px;">

				    		</div>

				    		<div>
				    			
				    			<font>Settings</font>

				    		</div>

				    	</div>

				    </a>

				    <a href="logout.php">

				    	<div class="list sign-out">
				    		
				    		<div>
				    			
				    			<img src="../images/signout.png" style="width: 24px;height: 24px;">

				    		</div>

				    		<div>
				    			
				    			<font>Sign Out</font>

				    		</div>

				    	</div>

				    </a>

			    </div>
			
			</div>

			<script type="text/javascript">
				document.getElementById("log-pic").onclick = function() {
		        var dropdown = document.getElementById("log-dropdown");
		        if (dropdown.style.display === "none" || dropdown.style.display === "") {
		            dropdown.style.display = "block";
		        } else {
		            dropdown.style.display = "none";
		        }
		    }
			</script>

			<?php

	     	}

	     	if (!isset($_SESSION["email"]) && !isset($_SESSION["comp_unique"])){

	        ?>

	    	<div class="navbar-nav-end">
	         		
	         	<div style="display: flex;">
	         		
	         		<a href="login.php">

		         		<div class="login">
		         			
		         			<font>Login</font>

		         		</div>

	         		</a>

	         		<a href="register.php">
	         			
	         			<div class="get-started">
	         				
	         				Get started

	         			</div>

	         		</a>

	         	</div>

	        </div>

	        <?php

	    	}

	        ?>

	    </div>

  	</div>

</nav>
