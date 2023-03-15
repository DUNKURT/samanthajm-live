<?php

if (isset($_GET['id'])) {
        include "db_conn.php";

        function validate($data)
        {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
        }

        $id = validate($_GET['id']);

        $sql = "SELECT * FROM products WHERE id=$id";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
        } else {
                header("Location: read.php");
        }


} else if (isset($_POST['update'])) {
        include "../db_conn.php";

        function validate($data)
        {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
        }

        $id = validate($_POST['id']);
        $name = validate($_POST['product']);
        $exp_date = validate($_POST['expiration']);
        $stock = validate($_POST['stock']);
        $brand = validate($_POST['brand']);
        $category = validate($_POST['category']);
        $price = validate($_POST['price']);
        $status = validate($_POST['status']);

        if (empty($name)) {
                header("Location: ../update.php?id=$id&error=Name is required");
        } else if (empty($exp_date)) {
                header("Location: ../update.php?id=$id&error=Expiration Date is required");
        } else if (empty($stock)) {
                header("Location: ../update.php?id=$id&error=Stock is required");
        } else if (empty($brand)) {
                header("Location: ../update.php?id=$id&error=Brand is required");
        } else if (empty($category)) {
                header("Location: ../update.php?id=$id&error=Category is required");
        } else if (empty($price)) {
                header("Location: ../update.php?id=$id&error=Price is required");
        } else if (empty($status)) {
                header("Location: ../update.php?id=$id&error=Status is required");
        } else {

                $sql = "UPDATE products SET 
                    product='$name', 
                    expiration='$exp_date', 
                    stock='$stock', 
                    brand='$brand', 
                    category='$category', 
                    price='$price', 
                    status='$status'
                WHERE id=$id ";

                $result = mysqli_query($conn, $sql);

                if ($result) {
                        header("Location: ../read.php?success=successfully updated");
                } else {
                        header("Location: ../update.php?id=$id&error=Unknown error occurred");
                }
        }
} else {
        header("Location: read.php");
}