<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="css/create_account.css" />
  <link rel="icon" href="/image/SJM_Icon.png" type="image/jpg" />
  <title>Edit User | Samantha</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary navbar bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="/image/SamanthaJM-removebg-preview.png" alt="Logo" width="140" height="50"
            class="d-inline-block align-text-top" />
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
            <a class="nav-link" href="#">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Brands</a>
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
  <h2>Edit User</h2>
  <form action="edit_account.php" method="post">
    <div class="form-group">
      <label for="id">ID</label>
      <select class="form-control" id="id" name="id" required>
        <?php
          // Connect to the database
          $conn = mysqli_connect("localhost", "root", "", "samantha");

          // Check if the connection was successful
          if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
          }

          // Query the database for all the user IDs
          $sql = "SELECT user_id FROM users";
          $result = mysqli_query($conn, $sql);

          // Loop through the query results and create an option element for each ID
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $row['user_id'] . "'>" . $row['user_id'] . "</option>";
          }

          // Close the database connection
          mysqli_close($conn);
        ?>
      </select>
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <button class="create-account-button" name="submit">Edit Account</button>
    <button class="creates-account-button" onclick="window.location.href='accountmanager.php'">Back</button>
  </form>
</div>

</body>

</html>