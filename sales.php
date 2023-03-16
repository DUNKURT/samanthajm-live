<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="css/sales.css" />
  <title>Samantha | Dashboard</title>
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
  <div class="container text-center">
    <div class="row">
      <div class="col">
        <button class="btn btn-success">Sales Today</button>
      </div>
      <div class="col">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "samantha";
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT COUNT(*) as count FROM products WHERE stock > 6";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $count = $row["count"];

        echo '<button class="btn btn-primary">In Stock (' . $count . ')</button>';

        $conn->close();
        ?>
      </div>
      <div class="col">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "samantha";
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT COUNT(*) as count FROM products WHERE stock < 6";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $count = $row["count"];

        echo '<button class="btn btn-danger">Low Stock (' . $count . ')</button>';

        $conn->close();
        ?>
      </div>
    </div>
  </div>

</body>

</html>