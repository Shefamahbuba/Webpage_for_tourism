<?php
session_start();

require 'connect.php';
$u_name=$_GET['user_name'];
$p_name=$_GET['p_name'];

echo "transaction successfull";

$success= 0;

$val_id=urlencode($_POST['val_id']);
$store_id=urlencode("rueta608d63ad081e7");
$store_passwd=urlencode("rueta608d63ad081e7@ssl");
$requested_url = ("https://sandbox.sslcommerz.com/validator/api/validationserverAPI.php?val_id=".$val_id."&store_id=".$store_id."&store_passwd=".$store_passwd."&v=1&format=json");

$handle = curl_init();
curl_setopt($handle, CURLOPT_URL, $requested_url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false); # IF YOU RUN FROM LOCAL PC
curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false); # IF YOU RUN FROM LOCAL PC

$result = curl_exec($handle);

$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

if($code == 200 && !( curl_errno($handle)))
{
	$success=1;

	# TO CONVERT AS ARRAY
	# $result = json_decode($result, true);
	# $status = $result['status'];

	# TO CONVERT AS OBJECT
	$result = json_decode($result);

	# TRANSACTION INFO
	$status = $result->status;
	$tran_date = $result->tran_date;
	$tran_id = $result->tran_id;
	$val_id = $result->val_id;
	$amount = $result->amount;
	$store_amount = $result->store_amount;
	$bank_tran_id = $result->bank_tran_id;
	$card_type = $result->card_type;

	# EMI INFO
	$emi_instalment = $result->emi_instalment;
	$emi_amount = $result->emi_amount;
	$emi_description = $result->emi_description;
	$emi_issuer = $result->emi_issuer;

	# ISSUER INFO
	$card_no = $result->card_no;
	$card_issuer = $result->card_issuer;
	$card_brand = $result->card_brand;
	$card_issuer_country = $result->card_issuer_country;
	$card_issuer_country_code = $result->card_issuer_country_code;

	# API AUTHENTICATION
	$APIConnect = $result->APIConnect;
	$validated_on = $result->validated_on;
	$gw_version = $result->gw_version;


    if($success==1){
        $sql = "INSERT into payment (cust_name,status,transfer_date,transfer_id,val_id,amount,store_amount,bank_transfer_id,card_type)
                 values ('$u_name','$status','$tran_date','$tran_id','$val_id','$amount','$store_amount','$bank_tran_id','$card_type')";
         
          
    $result = $conn-> query($sql);
    
    if(! $result) {
       die('Could not get data: ' . mysqli_error($conn));
    }
    $sql1="UPDATE booked set payment ='Paid' where cust_name='$u_name' AND package_name ='$p_name'";
    $result1 = $conn-> query($sql1);
    
    if(! $result1) {
       die('Could not get data: ' . mysqli_error($conn));
    }
    

}else{
    $sql1="INSERT into booked (payment) values('due')";
    $result1 = $conn-> query($sql1);
    
    if(! $result1) {
       die('Could not get data: ' . mysqli_error($conn));
    }
}


    }

    
?>




<div class="div">
	<a href="http://localhost/PROJECT_3100/php/index2.php?user_name=<?php echo $u_name?>login=<?php echo $p_name  ?>" >GO Home</a>
</div>