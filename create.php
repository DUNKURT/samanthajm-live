<!DOCTYPE html>
<html>

<head>
	<title>Create</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
		integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<div class="container">
		<form action="php/create.php" method="post">
			<h4 class="display-4 text-center">Create</h4>
			<hr><br>
			<?php if (isset($_GET['error'])) { ?>
				<div class="alert alert-danger" role="alert">
					<?php echo $_GET['error']; ?>
				</div>
			<?php } ?>

			<div class="form-group">
				<label for="name">Product Name</label>
				<input type="text" class="form-control" id="product" name="product" value="<?php if (isset($_GET['product']))
					echo ($_GET['product']); ?>" placeholder="Enter Product Name">
			</div>

			<div class="form-group">
				<label for="exp_date">Expiration Date</label>
				<input type="date" class="form-control" id="expiration" name="expiration" value="<?php if (isset($_GET['expiration']))
					echo ($_GET['expiration']); ?>" placeholder="Enter Expiration Date">
			</div>

			<div class="form-group">
				<label for="stock">Stock</label>
				<input type="number" class="form-control" id="stock" name="stock" value="<?php if (isset($_GET['stock']))
					echo ($_GET['stock']); ?>" placeholder="Enter Stock Quantity">
			</div>

<div class="form-group">
	<label for="brand">Brand</label>
	<select class="form-control" id="brand" name="brand">
		<option value="">Select Brand</option>
		<?php
		// Connect to the MySQL database
		$conn = mysqli_connect("localhost", "root", "", "samantha");

		// Retrieve the brands from the "brand" table
		$sql = "SELECT * FROM brand";
		$result = mysqli_query($conn, $sql);

		// Loop through the brands and populate the dropdown
		while ($row = mysqli_fetch_assoc($result)) {
			$selected = '';
			if (isset($_GET['brand']) && $_GET['brand'] == $row['brand']) {
				$selected = 'selected';
			}
			echo '<option value="' . $row['brand'] . '" ' . $selected . '>' . $row['brand'] . '</option>';
		}

		// Close the MySQL connection
		mysqli_close($conn);
		?>
	</select>
</div>
			<div class="form-group">
				<label for="category">Category</label>
				<input type="text" class="form-control" id="category" name="category" value="<?php if (isset($_GET['category']))
					echo ($_GET['category']); ?>" placeholder="Enter Category">
			</div>

			<div class="form-group">
				<label for="price">Price</label>
				<input type="number" class="form-control" id="price" name="price" value="<?php if (isset($_GET['price']))
					echo ($_GET['price']); ?>" placeholder="Enter Price">
			</div>

			<div class="form-group">
				<label for="status">Status</label>
				<select class="form-control" id="status" name="status">
					<option value="Available" <?php if (isset($_GET['status']) && $_GET['status'] == 'Available') {
						echo 'selected';
					} ?>>Available</option>
					<option value="Out of Stock" <?php if (isset($_GET['status']) && $_GET['status'] == 'Out of Stock') {
						echo 'selected';
					} ?>>Out of Stock</option>
					<option value="Discontinued" <?php if (isset($_GET['status']) && $_GET['status'] == 'Discontinued') {
						echo 'selected';
					} ?>>Discontinued</option>
				</select>
			</div>

			<button type="submit" class="btn btn-primary" name="create">Create</button>
			<a href="read.php" class="link-primary">View</a>
		</form>
	</div>
</body>

</html>