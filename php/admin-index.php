<?php

include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../css/admin-index.css">
</head>
<body>
    <div class="main-container">
        <div class="upper-panel">
            <div class="logo">
                <h1>TRAVEL</h1>
            </div>

        </div>
        <div class="work-panel">
            <div class="project">
                <a href="#project">PACKAGES</a>

            </div>
            <div class="users">
            <a href="#users">USERS</a>

            </div>
            <div class="issues">
            <a href="#issues">ISSUES</a>

            </div>
            <div class="bookings">
            <a href="#bookings">BOOKING</a>

            </div>
        </div>
        <div class="work-list">
        <div id="project">
            <ul>
                <li id="Cpackage"><a href="#create-packages">Create packages</a></li>
                <li id="Upackage"><a href="#update-packages">Update packages</a></li>
                <li id="Dpackage"><a href="#delete-packages">Delete packages</a></li>
            </ul>

        </div>
        


        </div>
        <div class="create-packages" id="create-packages" >
            <form action="create-packages.php" method="post" enctype ="multipart/form-data">
                <label for="tour_id">Tour ID:</label>
                <input type="text" name="tour_id" id="tour_id">
                <label for="tour_name">Tour Name:</label>
                <input type="text" name="tour_name" id="tour_name">
                <label for="place_from">Place From:</label>
                <input type="text" name="place_from" id="place_from">
                <label for="place_to">Place To:</label>
                <input type="text" name="place_to" id="place_to">
                <label for="places_to_be">Places To Be:</label>
                <input type="text" name="places_to_be" id="places_to_be">
                <label for="duration">Duration:</label>
                <input type="text" name="duration" id="duration">
                <label for="fare">Fare</label>
                <input type="text" name="fare" id="fare">
                <label for="descriptions">Descriptions:</label>
                <input type="text" name="descriptions" id="descriptions">
                <input type="file" name="tour-image" id="tour-image">
                
                <button type="submit" name ="submit">Submit</button>

            </form>
        </div>
        <div class="update-packages" id="update-packages">
        <form action="update-package.php" method="post">
        <label for="tour_id">Tour ID:</label>
                <input type="text" name="tour_id" id="tour_id">
                <label for="tour_name">Tour Name:</label>
                <input type="text" name="tour_name" id="tour_name">
                <label for="place_from">Place From:</label>
                <input type="text" name="place_from" id="place_from">
                <label for="place_to">Place To:</label>
                <input type="text" name="place_to" id="place_to">
                <label for="places_to_be">Places To Be:</label>
                <input type="text" name="places_to_be" id="places_to_be">
                <label for="duration">Duration:</label>
                <input type="text" name="duration" id="duration">
                <label for="fare">Fare</label>
                <input type="text" name="fare" id="fare">
                <label for="descriptions">Descriptions:</label>
                <input type="text" name="descriptions" id="descriptions">
                <input type="file" name="image" id="image">
                <button type="submit" name ="update">Update</button>

        </form>
         
        </div>

         
        <div class="delete-packages"id="delete-packages">
            <form action="delete-packages.php" method="post">
                <input type="text"name="p_name" placeholder="enter package name" required>
                <button type="submit" name="delete">Delete</button>
            </form>
        </div>




        <div class="show-first" id="bookings">
           <h1>Booked Packages</h1>
       <div class="users-list">
        <?php
            
            $sql = "SELECT *FROM booked";
          
           
            $result = $conn-> query($sql);
            
            if(! $result) {
               die('Could not get data: ' . mysqli_error($conn));
            }
            echo '<table>';
            echo '<tr><th>'."User Name".'</th><th>'."Location".'</th><th>'."Payment".'</th><th>'."Check_in".'</th></tr>';
          while($row = $result-> fetch_assoc()){



           
            echo '<tr><td>'.$row['cust_name'].'</td><td>'.$row['package_name'].'</td><td>'.$row['payment'].'</td><td>'.$row['check_in'].'</td></tr>';
            
          }
          echo '</table>';
            ?>
            

        </div>
        
    </div>
       </div>













       <div class="show-first" id ="issues">
           <h1>Issues</h1>
       <div class="users-list">
        <?php
            $i=0;
            $sql = "SELECT *FROM issues";
          
           
            $result = $conn-> query($sql);
            
            if(! $result) {
               die('Could not get data: ' . mysqli_error($conn));
            }
          while($row = $result-> fetch_assoc()){?>
          <div class="user-issues">
          <div class="user-name"><h5>User Name :</h5><?php echo $row['user_name']?></div>
          <div class="user-email"><h5>User Email :</h5><?php echo $row['email']?></div>
          <div class="user-issues1"><h5>User issues :</h5><?php echo $row['issues']?></div>
          <div class="action"><a href="../php/refund.php?issue_email=<?php echo $row['email'];?>">Refund</a></div>
          </div>
          


           

           
            
         <?php }
            ?>


         <?php 
         


        ?>


           
            

        </div>
        
    </div>
       </div>

       
        
       <div class="show-first" id="users">
           <h1>Users</h1>
       <div class="users-list">
        <?php
            
            $sql = "SELECT *FROM users";
          
           
            $result = $conn-> query($sql);
            
            if(! $result) {
               die('Could not get data: ' . mysqli_error($conn));
            }
            echo '<table>';
            echo '<tr><th>'."User ID".'</th><th>'."User Name".'</th><th>'."User Email".'</th></tr>';
          while($row = $result-> fetch_assoc()){



           
            echo '<tr><td>'.$row['user_id'].'</td><td>'.$row['user_name'].'</td><td>'.$row['user_email'].'</td></tr>';
            
          }
          echo '</table>';
            ?>
            

        </div>
        
    </div>
       </div>

  

</body>
</html>
