<?php
    include('conn.php');
    if (isset($_POST['submit'])) {
        $user_email = $_POST['user_email'];
        $user_pass = $_POST['user_pass'];

        $sql = "select * from users where user_email = '$user_email' and user_pass = '$user_pass'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        
        if($count == 1){  
            header("Location: dashboard.php");
        }  
        else{  
            echo  '<script>
                        window.location.href = "index.php";
                        alert("Login failed. Invalid username or password!!")
                    </script>';
        }     
    }
    ?>