<?php
session_start();

$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'samantha';

$conn = mysqli_connect($host, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$email = $_POST['email'];
$password = $_POST['password'];
$query = "SELECT * FROM users WHERE user_email = '$email' AND user_pass = '$password'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $role = $row['user_role'];
    $_SESSION['user_role'] = $role;
    header('Location: ' . ($role == 'admin' ? 'admin.php' : 'user.php'));
} else {
    if (mysqli_num_rows($result) == 0) {
        echo "Invalid email or password";
    } else {
        echo "Multiple users found with the same email and password. Please contact support.";
    }
}
?>