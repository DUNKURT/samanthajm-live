<?php
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'samantha';

    $conn = mysqli_connect($host, $username, $password, $database);

    if (!$conn) {
        die('Could not connect to the database: ' . mysqli_connect_error());
    }

    $sql = "UPDATE users SET user_email='$email', user_pass='$password' WHERE user_id='$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "User record updated successfully.";
    } else {
        echo "Error updating user record: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>