<?php

session_start();
   require 'connect.php';
   $user_name=$_SESSION['user_name'];
   $email=$_SESSION['login'];
   

   $issues = $_POST['issues'];
   $sql = "INSERT into issues (user_name,email,issues)
                 values ('$user_name','$email','$issues')";
  
      
         $result = mysqli_query($conn,$sql);
         if(!$result){
            echo "<script>alert('something went wrong')</script>";
  
         }
  
         header("Location: convert1.php");
?>