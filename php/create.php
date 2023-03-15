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

	$productName = validate($_POST['product']);
	$expirationDate = validate($_POST['expiration']);
	$stock = validate($_POST['stock']);
	$brand = validate($_POST['brand']);
	$category = validate($_POST['category']);
	$price = validate($_POST['price']);
	$status = validate($_POST['status']);

	$product_data = '&product=' . $productName . '&expiration=' . $expirationDate . '&stock=' . $stock . '&brand=' . $brand . '&category=' . $category . '&price=' . $price . '&status=' . $status;
if (empty($productName)) {
		header("Location: ../index.php?error=Product Name is required&$product_data");
	} elseif (empty($expirationDate)) {
		header("Location: ../index.php?error=Expiration Date is required&$product_data");
	} elseif (empty($stock)) {
		header("Location: ../index.php?error=Stock is required&$product_data");
	} elseif (empty($brand)) {
		header("Location: ../index.php?error=Brand is required&$product_data");
	} elseif (empty($category)) {
		header("Location: ../index.php?error=Category is required&$product_data");
	} elseif (empty($price)) {
		header("Location: ../index.php?error=Price is required&$product_data");
	} elseif (empty($status)) {
		header("Location: ../index.php?error=Status is required&$product_data");
	} else {
		$sql = "INSERT INTO products(product, expiration, stock, brand, category, price, status) 
               VALUES('$productName', '$expirationDate', '$stock', '$brand', '$category', '$price', '$status')";
		$result = mysqli_query($conn, $sql);
		if ($result) {
			header("Location: ../read.php?success=successfully created");
		} else {
			header("Location: ../create.php?error=unknown error occurred&$product_data");
		}
	}
}