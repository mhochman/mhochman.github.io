<?php

/*$field_name = $_POST['cf_name'];
$field_email = $_POST['cf_email'];
$field_message = $_POST['cf_message'];

$mail_to = 'michellehochman@gmail.com';
$subject = 'Message from a site visitor '.$field_name;

$body_message = 'From: '.$field_name."\n";
$body_message .= 'E-mail: '.$field_email."\n";
$body_message .= 'Message: '.$field_message;

$headers = 'From: '.$field_email."\r\n";
$headers .= 'Reply-To: '.$field_email."\r\n";

$mail_status = mail($mail_to, $subject, $body_message, $headers);*/

/*if ($mail_status) { ?>
	<script language="javascript" type="text/javascript">
		alert('Thank you for the message. We will contact you shortly.');
		window.location = 'contact_page.html';
	</script>
<?php
}
else { ?>
	<script language="javascript" type="text/javascript">
		alert('Message failed. Please, send an email to michellehochman@gmail.com');
		window.location = 'contact_page.html';
	</script>
<?php
}*/


if(isset($_POST['email'])) {
    $email_to = "michellehochman@gmail.com";
    $email_subject = "New Contact Form Submittion Sent";

    function died($error) {
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }

    // validation expected data exists
	if($_POST['code'] != "Not a robot" ||
		!isset($_POST['yourname']) ||
        !isset($_POST['email']) ||
        !isset($_POST['message'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }

    $yourname = $_POST['yourname'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $code = $_POST['code'];
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
	if(!preg_match($email_exp,$email)) {
		$error_message .= 'The Email Address you entered does not appear to be valid.<br />';
    }

	$string_exp = "/^[A-Za-z .'-]+$/";

	if(!preg_match($string_exp,$yourname)) {
		$error_message .= 'The Name you entered does not appear to be valid.<br />';
    }
 
    if(strlen($message) < 2) {
		$error_message .= 'The Message you entered do not appear to be valid.<br />';
    }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
 
     
 
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
    $email_message .= "Name: ".clean_string($name)."\n";
    $email_message .= "Email: ".clean_string($email)."\n";
    $email_message .= "Message: ".clean_string($message)."\n";

// create email headers
 
$headers = 'From: '.$email."\r\n".
'Reply-To: '.$email."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
 
 
<!-- include your own success html here -->
 
 
 
Thank you for contacting me. I will be in touch with you very soon.
 
 
 
<?php
 
}
 
?>
