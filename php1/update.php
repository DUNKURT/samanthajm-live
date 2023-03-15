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

        $sql = "SELECT * FROM brand WHERE id=$id";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
        } else {
                header("Location: brand.php");
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
        $brand = validate($_POST['brand']);
        $status = validate($_POST['status']);

 if (empty($brand)) {
                header("Location: ../update.php?id=$id&error=Brand is required");
        } else if (empty($status)) {
                header("Location: ../update.php?id=$id&error=Status is required");
        } else {

                $sql = "UPDATE brand SET 
                    brand='$brand', 
                    status='$status'
                WHERE id=$id ";

                $result = mysqli_query($conn, $sql);

                if ($result) {
                        header("Location: ../brand.php?success=successfully updated");
                } else {
                        header("Location: ../update_brand.php?id=$id&error=Unknown error occurred");
                }
        }
} else {
        header("Location: brand.php");
}