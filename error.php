<?php

if (isset($_SESSION["error_msg"])) {

?>

<div style="width: 100% !important;display: flex;justify-content: center;position: absolute;margin-top: 20px;">

	<div class="error-msg" id="error-msg">
					
		<p><?php echo $_SESSION["error_msg"]; ?></p>

	</div>

</div>

<?php

}

?>