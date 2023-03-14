<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sale";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$fromDate = $_POST["fromDate"];
$toDate = $_POST["toDate"];

$sql = "SELECT * FROM products WHERE expiration BETWEEN '$fromDate' AND '$toDate'";
$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

echo json_encode($data);

$conn->close();
?>