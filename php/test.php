<?php
session_start();
require 'connect.php';


if(isset($_POST['payment'])){
    
   
    
    $contact_no=$_POST['contact'];
    $check_in=$_POST['check_in'];
    $user_name=$_SESSION['user_name'];
    $email=$_SESSION['login'];
    $p_name=$_SESSION['p_name'];
    
    
    $sql = "INSERT into booked (cust_name,cust_email,cust_phone,package_name,check_in)
               values ('$user_name','$email','$contact_no','$p_name','$check_in')";

    
       $result = mysqli_query($conn,$sql);
       if(!$result){
          echo "<script>alert('something went wrong')</script>";

       }

       $sql1="SELECT *from packages where package_name ='$p_name'";
       $result1 = mysqli_query($conn,$sql1);
       if(!$result1){
        echo "<script>alert('something went wrong')</script>";

     }else{
         while($row=$result1-> fetch_assoc()){
             $new_value= $row['no_of_bookings']+1;
         }
         $sql2="UPDATE packages set no_of_bookings='$new_value' where  package_name ='$p_name'";
         $result2 = mysqli_query($conn,$sql2);
         if(!$result2){
            echo "<script>alert('something went wrong')</script>";
  
         }
     }
       
}

?>