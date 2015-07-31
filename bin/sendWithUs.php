<?php

if(empty($_POST['email']))
{
  return false;
}

$email = trim($_POST['email']);
$fullname = trim($_POST['fullname']);
$location = trim($_POST['location']);

// Send email about load

// $name2 = $_POST['name2'];
// $email2 = $_POST['email2'];
// $message2 = $_POST['message2'];

$to = 'lindsay@hotmamafit.com'; // Email submissions are sent to this email

// Create email 
$email_subject = "Message from Hot Mama Franchise 8.1";
$email_body = "You have received a new message. \n\n".
        "Name2: $fullname \nEmail2: $email \nMessage2: $location \n";
$headers = "From: lindsay@hotmamafit.com\r\n";
$headers .= "Reply-To: $email\r\n";
  $headers .= "Bcc: barton@liift.io\r\n";

mail($to,$email_subject,$email_body,$headers); // Post message


// Send Email through SendWithUs

$emailid = "tem_cifc3marzBTFdyBCfXeWNe";

$data = json_encode(array('email_id' => $emailid, 'recipient' => array('address' => $email), 'email_data' => array('fullname' => $fullname, 'location' => $location)));

$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, 'https://api.sendwithus.com/api/v1/send');
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_USERPWD, 'live_30aaae37fe6c9d9e63b19f85b0b53efc05baff73:');
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_exec($curl);
curl_close($curl);


return true;

?>
