<?php
session_start();
  $p_name=$_GET['pkgid'];
  $_SESSION['p_name']=$_GET['pkgid'];
  require 'connect.php';
  if(strlen($_SESSION['login'])==0)
	{?>	
    <script>alert("Log In First!")</script>
       
<?php header('location:index.php');
}
else{}?>
    <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Package-details</title>
            <link rel="stylesheet" href="../css/bookin.css">
            
        </head>
        <body>
            <div class="main-container">
                <div class="bars">
                    <div class="logo">
                              TRAVEL
                    </div>
                    <div class="nav-bar">
                        <ul>
                            <li><a href="index1.php">HOME</a></li>
                           
                        </ul>
                    </div>
                </div>
                <div class="package-details">
                <?php
           
           $sql = "SELECT *FROM packages Where tour_name='$p_name'";
         
          
           $result = $conn-> query($sql);
           
           if(! $result) {
              die('Could not get data: ' . mysqli_error($conn));
           }
          
         while($row = $result-> fetch_assoc()){ ?>



          
               <div class="sql-fetch">
               <div class="size">
               <div class="picture"><?php echo "<img src='../images/slider/".$row['tour_image']."' >"?></div>
                
                <div class="proper-des"><div class="package_name"><h4>Package Name:</h4><?php echo $row['tour_name']?></div>
                <div class="price"><h4>Package Price(BDT) :</h4><?php echo $row['fare']?></div>
                <div class="transport"><h4>Place From :</h4><?php echo $row['place_from']?></div>
                <div class="transport"><h4>Place To :</h4><?php echo $row['place_to']?></div>
                <div class="transport"><h4>Places to be :</h4><?php echo $row['places_to_be']?></div>
                <div class="facilities"><p>The tour is for </p><?php echo $row['duration']?><p>Day-Night</p></div>

                
                <div><a href="#book-now">Book Now</a></div>
                <?php
                $_SESSION['price']=$row['fare'];
                ?>
                    
                    
                    
                   </div>
                   </div>
                   
                   
           
                   </div>
           
        <?php }?>
                </div>

                <div id="book-now">

                     <form action="booking-process.php?price=<?php echo  $_SESSION['price'];?>" method="post">
                     <label for="" required>Contact No:</label>
                     <input type="tel" name="contact" id="contact">
                     <label for="">Check-in</label>
                     <input type="date" name="check_in" id="check_in">
                     <button type="submit" name="payment" id="payment">Payment</a></button>
                     </form>
                     
                </div>
            </div>
        </body>
        </html>






        
         