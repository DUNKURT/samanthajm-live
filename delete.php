<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "samantha";


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {

    $id = $_GET["id"];


    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }


    $sql = "DELETE FROM users WHERE user_id = $id";
    if (mysqli_query($conn, $sql)) {

        mysqli_close($conn);
        header("Location: accountmanager.php");
        exit;
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
        mysqli_close($conn);
    }
} else {
    ?>
    <form method="POST">
        <p>Are you sure you want to delete this user?</p>
        <button type="submit" name="delete">Yes</button>
        <a href="accountmanager.php">No</a>
    </form>
    <?php
}
?>