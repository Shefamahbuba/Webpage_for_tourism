<?php 

include 'connect.php';

session_start();

error_reporting(0);



if (isset($_POST['update'])) {
    $t_id = $_POST['tour_id'];
    $t_name = $_POST['tour_name'];
    $place_from = $_POST['place_from'];
    $place_to = $_POST['place_to'];
    $places_to_be= $_POST['places_to_be'];
    $duration = $_POST['duration'];
    $fare = $_POST['fare'];
    $descriptions=$_POST['descrptions'];
    $t_image = $_POST['image'];


	$sql = "UPDATE tour set tour_name='$t_name',place_from ='$place_from',package_facilities
    
    ='$p_facilities',package_attractions='$p_attractions',package_price='$p_price',
    package_transport='$p_transportation',package_image='$p_image' where package_name='$p_name' ";

    
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