<!DOCTYPE html>
<html>
  <head>
    <title>Inventory Report | SamanthaJM</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
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
    <?php
  $imagePath = "image/SJM_Icon.png";
  ?>
  <link rel="icon" href="<?php echo $imagePath; ?>" type="image/png" />
    <link rel="stylesheet" href="css/inventory_report.css" />
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
      <div class="row">
        <div class="col-md-12">
          <h2>Inventory Report</h2>
          <form>
            <div class="form-group">
              <label for="fromDate">From:</label>
              <input
                type="date"
                class="form-control"
                id="fromDate"
                name="fromDate"
              />
            </div>
            <div class="form-group">
              <label for="toDate">To:</label>
              <input
                type="date"
                class="form-control"
                id="toDate"
                name="toDate"
              />
            </div>
            <button type="button" class="btn btn-success" onclick="getData()">
              Submit
            </button>
            <button
              type="button"
              class="btn btn-primary"
              onclick="printTable()"
            >
              Print Table
            </button>
            <button class="btn btn-danger" id="reorderBtn">Re-order</button>
          </form>
          <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Product Name</th>
                  <th>Expiration Date</th>
                  <th>Stock</th>
                  <th>Brand</th>
                  <th>Category</th>
                  <th>Price</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="text/javascript"></script>
    <script src="js/script.js"></script>
    <script>
      $("#reorderBtn").click(function () {
        reorder();
      });

      function reorder() {
        $.ajax({
          url: "reorder.php",
          method: "GET",
          dataType: "json",
          success: function (data) {
            if (data.status === "success") {
              alert("Re-order successful");
              getData();
            } else {
              alert("Re-order failed");
            }
          },
        });
      }
    </script>
  </body>
</html>
