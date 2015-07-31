<?php	
	if(empty($_POST['name2']) || empty($_POST['email2']) || empty($_POST['message2']))
	{
		return false;
	}
	
	$name2 = $_POST['name2'];
	$email2 = $_POST['email2'];
	$message2 = $_POST['message2'];
	
	$to = 'lindsay@hotmamafit.com'; // Email submissions are sent to this email

	// Create email	
	$email_subject = "Message from Hot Mama Franchise 8.1";
	$email_body = "You have received a new message. \n\n".
				  "Name2: $name2 \nEmail2: $email2 \nMessage2: $message2 \n";
	$headers = "From: lindsay@hotmamafit.com\r\n";
	$headers .= "Reply-To: $email2\r\n";
    $headers .= "Bcc: barton@liift.io\r\n";
	
	mail($to,$email_subject,$email_body,$headers); // Post message
	return true;			
?>