<?php include 'php1/update.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Update</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="container">
		<form action="php1/update.php" 
		      method="post">
            
		   <h4 class="display-4 text-center">Update</h4><hr><br>
		   <?php if (isset($_GET['error'])) { ?>
		   <div class="alert alert-danger" role="alert">
			  <?php echo $_GET['error']; ?>
		    </div>
		   <?php } ?>

			<div class="form-group">
				<label for="brand">Brand</label>
				<input type="text" class="form-control" id="brand" name="brand" value="<?= $row['brand'] ?>" placeholder="Enter Brand">
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
			<a href="brand.php" class="link-primary">View</a>
		</form>
	</div>
</body>
</html>