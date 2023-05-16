<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title> Samantha | Cashier </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
</head>

<body>
<nav>
        </label>
       
        <ul>
        <li><a class="active" href="dashboard.php">Home</a></li>         
            <li><a   href="index.php">Products</a></li>
            <li><a  href="main.php">Buy Product</a></li>
            <li><a href="cart.php">Cart</a></li>
            <li><a  href="checkout.php">Checkout</a></li>
            <li><a href="soldtoday.php">Sold Today</a></li>
            <li><a href="login.php">Log out</a></li>
        </ul>
</nav>

    <?php
    include('conn.php');

    $sql = "SELECT COUNT(*) as count FROM products";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die('Error: ' . mysqli_error($cnn));
    }

    $row = mysqli_fetch_assoc($result);
    $count = $row["count"];

    // echo '<button class="btn btn-primary">In Stock (' . $count . ')</button>';
    echo '<button class="button button2" style="background:white; color:black;">Total number of Products:  (' . $count . ')</button>';

    mysqli_close($conn);
    ?>
</body>

</html>