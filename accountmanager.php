<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="css/accountmanager.css" />
  <link rel="icon" href="/image/SJM_Icon.png" type="image/jpg" />
  <title>Account Manager | Samantha</title>
</head>

<body>
	 <nav class="navbar navbar-expand-lg bg-body-tertiary navbar bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"> 
            Samantha
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
            <a class="nav-link" href="inventory_report.html">Reports</a>
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
                <a class="dropdown-item" href="login.html">Logout</a>
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
    <h2>Account Manager</h2>
    <button type="button" class="btn btn-primary" onclick="window.location.href='create_account.html'">Add Account</button>
    <div class="table-responsive">
      <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "samantha";

      $conn = mysqli_connect($servername, $username, $password, $dbname);
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }

      $sql = "SELECT * FROM users WHERE user_role <> 'admin'";
      $result = mysqli_query($conn, $sql);

      echo '<table class="table table-bordered table-hover">';
      echo '<thead><tr><th>ID</th><th>Email</th><th>Password</th><th>Role</th><th>Action</th></tr></thead>';
      echo '<tbody>';
      while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row["user_id"] . '</td>';
        echo '<td>' . $row["user_email"] . '</td>';
        echo '<td>' . $row["user_pass"] . '</td>';
        echo '<td>' . $row["user_role"] . '</td>';
        echo '<td><a href="delete.php?id=' . $row["user_id"] . '">Delete</a></td>';
        echo '</tr>';
      }
      echo '</tbody>';
      echo '</table>';

      mysqli_close($conn);
      ?>

    </div>
  </div>
</body>

</html>