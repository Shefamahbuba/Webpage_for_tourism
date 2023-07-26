<?php
 session_start();
 require 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>travel website</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/about.css">
    <link rel="stylesheet" href="../css/index1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
   
    <div class="main-container">
        <div class="video-container">
         
            <video loop autoplay muted>
               <source src="../images/slider/video_water3.mp4" type="video/mp4">
 
            </video>
         
        </div>
        <div class="bars">
           <div class="logo-bar">
             <div class="logo">
                 <h2>TRAVEL</h2>

             </div>
               <div class="nav-bar">
                   <ul>
                   <li>
                           <a href="#about">About</a>
                       </li>
                       <li>
                           <a href="#packages">Packages</a>
                       </li>
                       <li>
                           <a href="#contact-us">Contact Us</a>
                       </li>
                       
                   </ul>
               </div>

             <div class="log-in-link" id="log-in-link">
              <a href="#">Log in</a>
             </div>
             
            


           

        </div>
        
        <div class="text-content">
                <h1>Welcome to Travel</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, sequi.</p>
        </div>

        
        
        




    </div>
    <div id="about">
    <?php
        include 'about.php';
    ?>

    </div>
    <div id="packages">
    <h1>
            PACKAGES
        </h1>

    <?php
           
            $sql = "SELECT *FROM packages";
          
           
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
                     
                     
                     <div><a href="booking.php?pkgid=<?php echo $row['tour_name'];?>">More Info</a></div>
                    </div>
                    </div>
                    
                    
            
                    </div>;
            
         <?php }?>
    </div>





    <div class="log-in">
                <ul>
                <li><a href="login.php">User</a>
                </li>
                <li><a href="login-admin.php">Admin</a>
                </li>
                </ul>


                <div class="cross"></div>
             </div>


             <div id="contact-us">
                 <ul>
                     <li>
                         Call us <a href="tel:+8801780439272"> <i class="fas fa-phone"></i></a>
                     </li>
                     <li> Email us<a href="mailto:abidahasina@gmail.com"> <i class="fas fa-envelope"></i></a></li>
                 </ul>
                 <div class="social-media">
                     <ul>
                         <li>
                                <a href="http://www.facebook.com" target="_blank" rel="noopener noreferrer"><i class="fab fa-facebook-square"></i></a>
                         </li>
                         <li>
                         <a href="http://www.instagram.com" target="_blank" rel="noopener noreferrer"><i class="fab fa-instagram"></i></a>
                         </li>
                         <li>
                         <a href="http://www.twitter.com" target="_blank" rel="noopener noreferrer"><i class="fab fa-twitter"></i></a>
                             
                         </li>
                     </ul>
                 </div>
             </div>
    
</body>


<script src="../js/main-index.js"></script>
</html>