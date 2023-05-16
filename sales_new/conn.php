<?php
	$conn = new mysqli("localhost","root","","samantha");
	if($conn->connect_error){
		die("Connection Failed!".$conn->connect_error);
	}
?>