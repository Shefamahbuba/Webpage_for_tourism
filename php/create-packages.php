<?php 

include 'connect.php';

session_start();

error_reporting(0);



if (isset($_POST['submit'])) {
    $t_id = $_POST['tour_id'];
    $t_name = $_POST['tour_name'];
    $place_from = $_POST['place_from'];
    $place_to = $_POST['place_to'];
    $places_to_be= $_POST['places_to_be'];
    $duration = $_POST['duration'];
    $fare = $_POST['fare'];
    $descriptions=$_POST['descriptions'];
    $image =$_FILES['tour-image']['name'];
    $target="../images/slider/".basename($image);
    

	$sql = "INSERT into packages (tour_id,tour_name,place_from,place_to,places_to_be,duration,
    fare,description,tour_image,no_of_bookings) values ('$t_id','$t_name','$place_from','$place_to','$places_to_be','$duration','$fare','$descriptions','$image','0') ";
   

    
	$result = mysqli_query($conn, $sql);
    
    if(!$result){
        die(mysqli_error($conn));
    }
	else{
        echo "<script>alert('Package created succesfully')</script>";
        header("Location:admin-index.php");
    }
}

?>