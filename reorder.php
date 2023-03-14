<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sale";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE products SET stock = stock + 10 WHERE stock < 6";

if ($conn->query($sql) === TRUE) {
    $response = array("status" => "success");
} else {
    $response = array("status" => "error");
}

echo json_encode($response);

$conn->close();
?>