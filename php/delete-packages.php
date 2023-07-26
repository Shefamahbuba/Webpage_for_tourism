<?php 

include 'connect.php';

session_start();

error_reporting(0);



if (isset($_POST['delete'])) {
    $p_name = $_POST['p_name'];
    


	$sql = "DELETE FROM packages where package_name='$p_name'";

    
	$result = mysqli_query($conn, $sql);
    if(!$result){
        die(mysqli_error($conn));
    }
	else{
        echo "<script>alert('Package updated succesfully')</script>";
        header("Location:admin-index.php");
    }
}

?>