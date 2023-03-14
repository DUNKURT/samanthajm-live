<?php

$host = 'localhost'; 
$user = 'root';
$pass = ''; 
$dbname = 'samantha'; 
$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = 'user'; 

    $sql = "INSERT INTO users (user_email, user_pass, user_role) VALUES ('$email', '$password', '$role')";
    if ($conn->query($sql) === TRUE) {
        header('Location: accountmanager.php');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>