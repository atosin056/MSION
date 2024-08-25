<?php

session_start();

include 'connect.php';

if (!isset($_SESSION["email"])) {

    header('location: dashboard.php');

}

if (isset($_POST["submit"])) {

    // Get POST data and Sanitize the input so it would be secure.
    
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    
    $password = mysqli_real_escape_string($conn, md5($_POST["password"]));
    
    $new_password = mysqli_real_escape_string($conn, md5($_POST["newpassword"]));
    
    $confirmpassword = mysqli_real_escape_string($conn, md5($_POST["confirmpassword"]));

    // Update the 'name' in 'users' table

    $update = "UPDATE `users` SET `fullname`='$name',`title`='".$title."' WHERE `email`='".$_SESSION["email"]."'";
    
    $update_query = mysqli_query($conn, $update);

    if ($update_query) {

        if (isset($email) && !empty($email)) {

            // Select all tables that have the 'email' column
    
            $select = "SELECT DISTINCT table_name, column_name FROM information_schema.columns WHERE column_name LIKE '%email%' AND table_schema = 'MSION';";

            $select_query = mysqli_query($conn, $select);

            if (mysqli_num_rows($select_query) > 0) {

                while ($row = mysqli_fetch_assoc($select_query)) {
                
                    $table_name = $row['TABLE_NAME'];

                    // Update the email in each table that has the 'email' column
                
                    $update = "UPDATE `$table_name` SET `email` = '$email' WHERE `email` = '".$_SESSION["email"]."'";
                
                    $update_query = mysqli_query($conn, $update);

                    if (!$update_query) {
                
                        // Handle errors if any
                
                    }

                    else{

	               		// If email is updated in all tables, log the user out to prevent issues with session
	                
		            	if (isset($password) && $password == $_SESSION["password"] && $new_password == $confirmpassword) {
		            		
		            		$update_final = "UPDATE `users` SET `password`='".$new_password."' WHERE `id`='".$_SESSION["logged_id"]."'";

		            		$update_final_query = mysqli_query($conn, $update_final);

		            		if ($update_final_query) {
		            			
		            			$_SESSION["password"] = $new_password;

                                $_SESSION['fullname'] = $name;

                                $_SESSION["title"] = $title;

                                header('location: dashboard.php');

		            		}

		            	}

		            	else{

                            $_SESSION['fullname'] = $name;

                            $_SESSION["title"] = $title;

		            		header('location: dashboard.php');

		            	}

	            	}

	            }
        
    	    }

        	else{

        		header('location: logout.php');

        	}	
    
    	}

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
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    
    <link rel="stylesheet" type="text/css" href="css/main.css">

</head>

<body>

<?php

include 'navbar.php';

?>

<div class="sections" style="padding-top: 164px;background: white;">

    <div>

        <div>

            <p class="search-results">Settings</p>

        </div>

        <div class="info-set">

            <div style="width: 100% !important;display: flex;flex-direction: column;gap: 24px;">

                <div class="dash-sec" style="width: 100% !important;">

                    <div style="width: 100% !important;">

                        <div style="display: flex;flex-direction: column;width: 100% !important;gap: 16px;">

                            <font class="persona">Personal Information</font>

                            <font class="not-p">Update your personal information here</font>

                        </div>

                    </div>

                </div>

                <form method="POST">

                	<?php

                	$real_time_select = "SELECT * FROM `users` WHERE `email`='".$_SESSION["email"]."'";

                	$real_time_query = mysqli_query($conn, $real_time_select);

                	if (mysqli_num_rows($real_time_query) > 0) {
                		
                		while($row = mysqli_fetch_assoc($real_time_query)){

                			$name = $row["fullname"];

                			$email_current = $row["email"];

                			$_SESSION['nom'] = $name;

                			$_SESSION["emol"] = $email_current;

                		}	

                	}

                	?>

                    <div class="dash-sec">

                        <div style="display: flex;width: 100% !important;gap: 16px;">

                            <div style="background: transparent;display: flex;align-items: center;">

                                <font class="para">Name: </font>

                            </div>

                            <div style="flex-grow: 1;background: transparent;">

                                <input type="text" name="name" class="form-control input-field person" 
                                    style="background: white;border: 1px solid #CCCBCB;border-radius: 20px;height: 56px;padding-left: 20px;" value="<?php echo $_SESSION["nom"]; ?>">
                            
                            </div>
                        
                        </div>
                    
                    </div>

                    <div class="dash-sec" style="margin-top: 24px;">
                    
                        <div style="display: flex;width: 100% !important;gap: 16px;">
                    
                            <div style="background: transparent;display: flex;align-items: center;">
                    
                                <font class="para">Email: </font>
                    
                            </div>
                    
                            <div style="flex-grow: 1;background: transparent;">
                    
                                <input type="email" name="email" class="form-control input-field person" style="background: white;border: 1px solid #CCCBCB;border-radius: 20px;height: 56px;padding-left: 20px;" value="<?php echo $_SESSION["emol"]; ?>">
                            
                            </div>
                        
                        </div>
                    
                    </div>

                    <div class="dash-sec">

                        <div style="display: flex;width: 100% !important;gap: 16px;">

                            <div style="background: transparent;display: flex;align-items: center;">

                                <font class="para">Title: </font>

                            </div>

                            <div style="flex-grow: 1;background: transparent;">

                                <input type="text" name="title" class="form-control input-field person" 
                                    style="background: white;border: 1px solid #CCCBCB;border-radius: 20px;height: 56px;padding-left: 20px;" value="<?php echo $_SESSION["title"]; ?>">
                            
                            </div>
                        
                        </div>
                    
                    </div>

                </div>

            </div>

            <div class="info-set" style="flex-direction: column;margin-top: 24px;">
                    	
               	<div class="dash-sec" style="width: 100% !important;">
                    
	        	    <div style="display: flex;width: 100% !important;gap: 16px;">
	                    
	                    <div style="background: transparent;display: flex;align-items: center;">
	                    
	                        <font class="para">Password: </font>
	                    
	                    </div>
	                    
	                    <div style="flex-grow: 1;background: transparent;">
	                    
	                        <input type="password" name="password" class="form-control input-field person" style="background: white;border: 1px solid #CCCBCB;border-radius: 20px;height: 56px;padding-left: 20px;">
	                            
	                    </div>
                        
                    </div>
                    
                </div>

                <div class="dash-sec" style="width: 100% !important">
                    
	                <div style="display: flex;width: 100% !important;gap: 16px;">
	                    
	                    <div style="background: transparent;display: flex;align-items: center;">
	                    
	                        <font class="para">New Password: </font>
	                    
	                    </div>
	                    
	                    <div style="flex-grow: 1;background: transparent;">
	                    
	                        <input type="password" name="newpassword" class="form-control input-field person" style="background: white;border: 1px solid #CCCBCB;border-radius: 20px;height: 56px;padding-left: 20px;">
	                            
	                    </div>
	                        
                	</div>
                    
                </div>

                <div class="dash-sec" style="width: 100% !important">
                    
	                <div style="display: flex;width: 100% !important;gap: 16px;">
	                    
	                    <div style="background: transparent;display: flex;align-items: center;">
	                    
	                        <font class="para">Confirm Password: </font>
	                    
	                    </div>
	                    
	            		<div style="flex-grow: 1;background: transparent;">
	                    
	                        <input type="password" name="confirmpassword" class="form-control input-field person" style="background: white;border: 1px solid #CCCBCB;border-radius: 20px;height: 56px;padding-left: 20px;">
	                            
	                    </div>
	                        
                    </div>
                    
                </div>

                <div class="dash-sec" style="width: 100% !important;">
                	
                	<div style="flex-grow: 1;display: flex;justify-content: flex-end;">
                		
                		<input type="submit" name="submit" value="Update" class="get-started" style="border: none;">

                	</div>

                </div>

			</div>
                
        </form>

    </div>
        
</div>
    
</div>

</div>

</body>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        var currentPage = '<?php echo basename($_SERVER["PHP_SELF"], ".php"); ?>';
        var links = document.querySelectorAll('.navField');

        links.forEach(link => {
            if (link.getAttribute('data-page') === currentPage) {
                link.classList.add('link-active');
            }
        });
    });
</script>

</html>
