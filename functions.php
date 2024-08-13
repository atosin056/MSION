<?php

function existing_data ($table_name,$column,$data,$other_lines){

	$error_response = false;

	$select = "SELECT * FROM `$table_name` WHERE `$column`='".$data."'";

	$select_query = mysqli_query($conn, $select);

	if (mysqli_num_rows($select_query) > 0) {
		
		$error_response = true;

		$error_msg = 'This Data already Exists in the Database';

	}

	else{

		$other_lines;

	}

}

function insert ($table_name, $table_parameters, $values, $action){

	$insert = "INSERT INTO `$table_name` ($table_parameter) VALUES ('$values')";

	$insert_query = mysqli_query($conn, $insert);

	if ($insert_query) {
		
		$action;

	}

}

?>