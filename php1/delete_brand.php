<?php  

if(isset($_GET['id'])){
   include "../db_conn.php";
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	$id = validate($_GET['id']);

	$sql = "DELETE FROM brand
	        WHERE id=$id";
   $result = mysqli_query($conn, $sql);
   if ($result) {
   	  header("Location: ../brand.php?success=successfully deleted");
   }else {
      header("Location: ../brand.php?error=unknown error occurred");
   }

}else {
	header("Location: ../brand.php");
}