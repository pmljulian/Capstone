<?php
	//connection
	$con = mysqli_connect("localhost", "root", "", "capstone");

	//check
	if(!$con){
		die("Conenction Failed: " . mysqli_connect_error());	
	}
	//echo "Connected Succesfully";
?>