<?php include 'php/update.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Update</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
	<?php
	$imagePath = "image/SJM_Icon.png";
	?>
	<link rel="icon" href="<?php echo $imagePath; ?>" type="image/png" />
</head>
<body>
	<div class="container">
		<form action="php/update.php" 
			  method="post">
			
		   <h4 class="display-4 text-center">Update</h4><hr><br>
		     <?php if (isset($_GET['error'])) { ?>
		   <div class="alert alert-danger" role="alert">
			  <?php echo $_GET['error']; ?>
		    </div>
		   <?php } ?>
		   <div class="form-group">
				<label for="name">Product Name</label>
				<input type="text" class="form-control" id="product" name="product" value="<?= $row['product'] ?>" placeholder="Enter Product Name">
			</div>

			<div class="form-group">
				<label for="exp_date">Expiration Date</label>
				<input type="date" class="form-control" id="expiration" name="expiration" value="<?= $row['expiration'] ?>" placeholder="Enter Expiration Date">
			</div>

			<div class="form-group">
				<label for="stock">Stock</label>
				<input type="number" class="form-control" id="stock" name="stock" value="<?= $row['stock'] ?>" placeholder="Enter Stock Quantity">
			</div>

			<div class="form-group">
				<label for="brand">Brand</label>
				<input type="text" class="form-control" id="brand" name="brand" value="<?= $row['brand'] ?>" placeholder="Enter Brand">
			</div>

			<div class="form-group">
				<label for="category">Category</label>
				<input type="text" class="form-control" id="category" name="category" value="<?= $row['category'] ?>" placeholder="Enter Category">
			</div>

			<div class="form-group">
				<label for="price">Price</label>
				<input type="number" class="form-control" id="price" name="price" value="<?= $row['price'] ?>" placeholder="Enter Price">
			</div>

			<div class="form-group">
    <label for="status">Status</label>
    <select class="form-control" id="status" name="status">
        <option value="Available" <?= (!isset($_GET['status']) && $row['status'] == 'Available') ? 'selected' : '' ?>>Available</option>
        <option value="Out of Stock" <?= (!isset($_GET['status']) && $row['status'] == 'Out of Stock') ? 'selected' : '' ?>>Out of Stock</option>
        <option value="Discontinued" <?= (!isset($_GET['status']) && $row['status'] == 'Discontinued') ? 'selected' : '' ?>>Discontinued</option>
    </select>
</div>
<input type="text" name="id" value="<?= $row['id'] ?>" hidden>


		   <button type="submit" 
				   class="btn btn-primary"
				   name="update">Update</button>
			<a href="read.php" class="link-primary">View</a>
		</form>
	</div>
</body>
</html>