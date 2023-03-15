<?php
session_start();
$con = mysqli_connect("localhost","root","","ims");

if(isset($_POST['save_select']))
{
    $bname = $_POST['bname'];
    $bstatus = $_POST['bstatus'];
   


    $query = "INSERT INTO branding (bname,bstatus) VALUES ('$bname','$bstatus')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Inserted Succesfully";
        header("Location: index.php");
    }
    else
    {
        $_SESSION['status'] = "Not Inserted";
        header("Location: index.php");
    }
}
?>