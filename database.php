<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "test";

try {

    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // set the PDO error mode to exception
    //echo "Connected Successfully";
    
} catch(PDOException $e) {

    echo "Connection Failed" .$e->getMessage();
}


if(isset($_POST['order']))
{
    
    $tquantity = $_POST["tquantity"];
    $pquantity = $_POST["pquantity"];

    $equal = $tquantity - $pquantity;
        $id = $_POST["id2"];
        $name = $_POST["tquantity"];
        $price = $_POST["pprice"];

        $query = "UPDATE product SET ID=:id, Name=:name, Price=:price, Quantity=:quantity WHERE ID=:id ";

        $query_run = $conn->prepare($query);

        $data = [
            ':id' => $id,
            ':name' => $name,
            ':quantity' => $equal,
            ':price' => $price,
        ];
        $query_execute = $query_run->execute($data);

        if($query_execute)
        {
            $_SESSION['message'] = "Updated Successfully";
            
        }
        else
        {
            $_SESSION['message'] = "Not Updated";
           
        }


}

?>