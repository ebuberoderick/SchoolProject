<?php
include "qrcode.php"; 
// Create QRcode object 
$qc = new QRCODE(); 

//=============================== list of QR code types==========================
// create text QR code 
// $qc->TEXT("Hello Victor A"); 

// URL QR code 
// $qc->URL('www.google.com');

// EMAIL QR code 
// $qc->EMAIL('info@techiesbadi.in', 'SUBJECT', 'MESSAGE');

// PHONE QR code 
// $qc->PHONE('08130075358');

// SMS QR code 
// $qc->SMS('08130075358', 'i love you');

// CONTACT QR code 
$qc->CONTACT('NAME', 'ADDRESS', 'PHONE', 'EMAIL');


// ================================================================================
// render QR code

$qc->QRCODE(400,"rrt.png");
?>



<!-- ==========================sending bulk SMS ===================================-->

<!-- First, We need to register at the http://bulksmsserviceproviders.com/ -->
<?php
//Your authentication key
$authKey = "YourAuthKey";
//Multiple mobiles numbers separated by comma
$mobileNumber = "9999999";
//Sender ID,While using route4 sender id should be 6 characters long.
$senderId = "102234";
//Your message to send, Add URL encoding here.
$message = rawurlencode("Test message");
//Define route 
$route = "template";
//Prepare you post parameters
$postData = array(
    'authkey' => $authKey,
    'mobiles' => $mobileNumber,
    'message' => $message,
    'sender' => $senderId,
    'route' => $route
);
//API URL
$url = "http://sms.bulksmsserviceproviders.com/api/send_http.php";
// init the resource
$ch = curl_init();
curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $postData
    //,CURLOPT_FOLLOWLOCATION => true
));
//Ignore SSL certificate verification
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//get response
$output = curl_exec($ch);
//Print error if any
if (curl_errno($ch)) {
    echo 'error:' . curl_error($ch);
}
curl_close($ch);
echo $output;
?>
<!-- ========================================================== -->