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
            
  
         }
  
         $sql1="SELECT *from packages where tour_name ='$p_name'";
         $result1 = mysqli_query($conn,$sql1);
         if(!$result1){
          
  
       }else{
           while($row=$result1-> fetch_assoc()){
               $new_value= $row['no_of_bookings']+1;
           }
           $sql2="UPDATE packages set no_of_bookings='$new_value' where  tour_name ='$p_name'";
           $result2 = mysqli_query($conn,$sql2);
           if(!$result2){
              
           }
       }
         
  }
$post_data = array();
$post_data['store_id'] = "rueta608d63ad081e7";
$post_data['store_passwd'] = "rueta608d63ad081e7@ssl
";
$post_data['total_amount'] = $_GET['price'];
$post_data['currency'] = "BDT";
$post_data['tran_id'] = "SSLCZ_TEST_".uniqid();
$post_data['success_url'] = "http://localhost/PROJECT_3100/php/success.php?user_name=$user_name&p_name=$p_name";
$post_data['fail_url'] = "http://localhost/PROJECT_3100/php/index1.php";
$post_data['cancel_url'] = "http://localhost/new_sslcz_gw/cancel.php";
# $post_data['multi_card_name'] = "mastercard,visacard,amexcard";  # DISABLE TO DISPLAY ALL AVAILABLE

# EMI INFO
$post_data['emi_option'] = "1";
$post_data['emi_max_inst_option'] = "9";
$post_data['emi_selected_inst'] = "9";

# CUSTOMER INFORMATION
$post_data['cus_name'] = $_SESSION['user_name'];
$post_data['cus_email'] = $_SESSION['login'];
$post_data['cus_add1'] = "Dhaka";
$post_data['cus_add2'] = "Dhaka";
$post_data['cus_city'] = "Dhaka";
$post_data['cus_state'] = "Dhaka";
$post_data['cus_postcode'] = "1000";
$post_data['cus_country'] = "Bangladesh";
$post_data['cus_phone'] = "01711111111";
$post_data['cus_fax'] = "01711111111";

# SHIPMENT INFORMATION
$post_data['ship_name'] = "testruetaw8ee";
$post_data['ship_add1 '] = "Dhaka";
$post_data['ship_add2'] = "Dhaka";
$post_data['ship_city'] = "Dhaka";
$post_data['ship_state'] = "Dhaka";
$post_data['ship_postcode'] = "1000";
$post_data['ship_country'] = "Bangladesh";

# OPTIONAL PARAMETERS
$post_data['value_a'] = "ref001";




$post_data['value_b '] = "ref002";
$post_data['value_c'] = "ref003";
$post_data['value_d'] = "ref004";

# CART PARAMETERS
$post_data['cart'] = json_encode(array(
    array("product"=>"DHK TO BRS AC A1","amount"=>"200.00"),
    array("product"=>"DHK TO BRS AC A2","amount"=>"200.00"),
    array("product"=>"DHK TO BRS AC A3","amount"=>"200.00"),
    array("product"=>"DHK TO BRS AC A4","amount"=>"200.00")
));
$post_data['product_amount'] = "100";
$post_data['vat'] = "5";
$post_data['discount_amount'] = "5";
$post_data['convenience_fee'] = "3";





# REQUEST SEND TO SSLCOMMERZ
$direct_api_url = "https://sandbox.sslcommerz.com/gwprocess/v3/api.php";

$handle = curl_init();
curl_setopt($handle, CURLOPT_URL, $direct_api_url );
curl_setopt($handle, CURLOPT_TIMEOUT, 30);
curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($handle, CURLOPT_POST, 1 );
curl_setopt($handle, CURLOPT_POSTFIELDS, $post_data);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, FALSE); # KEEP IT FALSE IF YOU RUN FROM LOCAL PC


$content = curl_exec($handle );

$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

if($code == 200 && !( curl_errno($handle))) {
	curl_close( $handle);
	$sslcommerzResponse = $content;
} else {
	curl_close( $handle);
	echo "FAILED TO CONNECT WITH SSLCOMMERZ API";
	exit;
}


$sslcz = json_decode($sslcommerzResponse, true );

if(isset($sslcz['GatewayPageURL']) && $sslcz['GatewayPageURL']!="" ) {
        
	echo "<meta http-equiv='refresh' content='0;url=".$sslcz['GatewayPageURL']."'>";
	
	exit;
} else {
	echo "JSON Data parsing error!";
}


?>




<?php

     $body = "Package :".$p_name."Name :".$user_name."Bill: ".$_SESSION['price']."Check in :".$check_in;
       require '../php/PHPMailer-master/src/PHPMailer.php';
       require '../php/PHPMailer-master/src/SMTP.php';
       require '../php/PHPMailer-master/src/Exception.php';
      

       use PHPMailer\PHPMailer\PHPMailer;
       use PHPMailer\PHPMailer\SMTP;
       use PHPMailer\PHPMailer\Exception;
    $mail = new PHPMailer();
    $mail-> isSMTP();
    $mail->Host ="smtp.gmail.com";
    $mail->SMTPAuth ="true";
    $mail->SMTPSecure ="tls";
    $mail->Port ="587";
    $mail->Username="abidahasina@gmail.com";
    $mail->Password="allah@akber";
    $mail->Subject="Bill";
    $mail->setFrom("abidahasina@gmail.com");
    $mail->Body =$body;
    $mail->addAddress("$i_email");
    
    if($mail->send()){
        echo "email sent successfully";

    }
    else{
        echo "email sent unsuccessfully";

    }


  

         ?>