<?php include "php/read.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Products | Samantha</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script
      src="https://kit.fontawesome.com/e96c3f3ee3.js"
      crossorigin="anonymous"
    ></script>
	<link rel="stylesheet" href="css/read.css" />
  <?php
  $imagePath = "image/SJM_Icon.png";
  ?>
  <link rel="icon" href="<?php echo $imagePath; ?>" type="image/png" />
</head>
<body>
  <?php
  $imagePath = "image/SamanthaJM-removebg-preview.png";
  ?>
  <nav class="navbar navbar-expand-lg bg-body-tertiary navbar bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="<?php echo $imagePath; ?>" alt="Logo" width="140" height="50">
        </a>
      </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="sales.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="read.php">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="brand.php">Brands</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="inventory_report.php">Reports</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Account
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="accountmanager.php">Manage Account</a></li>
              <li>
                <hr class="dropdown-divider" />
              </li>
              <li>
                <a class="dropdown-item" href="login1.php">Logout</a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
    <div class="box">
      <h4 class="display-4 text-center">Products</h4><br>
<!-- 	
        <a href="create.php" class="link-primary">Create</a> -->
        <button  
  class="btn btn-primary"
  name="update"
  onclick="window.location.href='create.php'">
  Create
</button>

      <?php if (isset($_GET['success'])) { ?>
		    <div class="alert alert-success" role="alert">
			  <?php echo $_GET['success']; ?>
		    </div>
		    <?php } ?>
			<?php if (mysqli_num_rows($result)) { ?>
			<table class="table table-bordered table-hover">
			  <thead>
			    <tr>
			      <th scope="col">ID</th>
			      <th scope="col">Product Name</th>
			      <th scope="col">Expiration Date</th>
				  <th scope="col">Stock</th>
				  <th scope="col">Brand</th>
				  <th scope="col">Category</th>
				  <th scope="col">Price</th>
				  <th scope="col">Status</th>
			      <th scope="col">Action</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php 
			  	   $i = 0;
			  	   while($rows = mysqli_fetch_assoc($result)){
			  	   $i++;
			  	 ?>
			    <tr>
				  <td><?php echo $rows['id']; ?></td>
				  <td><?php echo $rows['product']; ?></td>
			      <td><?php echo $rows['expiration']; ?></td>
				  <td><?php echo $rows['stock']; ?></td>
				  <td><?php echo $rows['brand']; ?></td>
				  <td><?php echo $rows['category']; ?></td>
				  <td><?php echo $rows['price']; ?></td>
				  <td><?php echo $rows['status']; ?></td>
						  <td><a href="update.php?id=<?=$rows['id']?>" 
			      	     class="btn btn-success">Update</a>

			      	  <a href="php/delete.php?id=<?=$rows['id']?>" 
			      	     class="btn btn-danger">Delete</a>
			      </td>
			    </tr>
			    <?php } ?>
			  </tbody>
			</table>
			<?php } ?>
			
		</div>
	</div>
</body>
</html>