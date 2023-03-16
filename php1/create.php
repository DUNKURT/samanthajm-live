<?php

if (isset($_POST['create'])) {
	include "../db_conn.php";
	function validate($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	$current_date = date("Y-m-d");
	

	$brand = validate($_POST['brand']);
	$status = validate($_POST['status']);

	$product_data ='&brand=' . $brand . '&status=' . $status;
if (empty($brand)) {
		header("Location: ../index.php?error=Brand is required&$product_data");
	}elseif (empty($status)) {
		header("Location: ../index.php?error=Status is required&$product_data");
	} else {
		$sql = "INSERT INTO brand(brand, status, last_updated) 
               VALUES('$brand','$status','$current_date')";
		$result = mysqli_query($conn, $sql);
		if ($result) {
			header("Location: ../brand.php?success=successfully created");
		} else {
			header("Location: ../create_brand.php?error=unknown error occurred&$product_data");
		}
	}
}