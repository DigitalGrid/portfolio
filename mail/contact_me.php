<?php
require 'PHPMailerAutoload.php';
// Check for empty fields
if(empty($_POST['name'])    ||
   empty($_POST['email'])   ||
   empty($_POST['message']) ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
 echo "No arguments Provided!";
 return false;
   }
 
$name = $_POST['name'];
$email_address = $_POST['email'];
$message = $_POST['message'];
 
// Create the email and send the message
$to = 'christofer.jadelius@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nMessage:\n$message";
$headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address"; 
mail($to,$email_subject,$email_body,$headers);


$mail = new PHPMailer;
 
$mail->Host = 'smtp.gmail.com';                       // Specify main and backup server
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'christofer.jadelius@gmail.com';                   // SMTP username
$mail->Password = 'Funkydoggen010603';               // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
$mail->Port = 587;                                    //Set the SMTP port number - 587 for authenticated TLS
$mail->setFrom($email_address, $name);     //Set who the message is to be sent from
//$mail->addReplyTo('labnol@gmail.com', 'First Last');  //Set an alternative reply-to address
//$mail->addAddress('josh@example.net', 'Josh Adams');  // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
//$mail->addAttachment('/usr/labnol/file.doc');         // Add attachments
//$mail->addAttachment('/images/image.jpg', 'new.jpg'); // Optional name
//$mail->isHTML(true);                                  // Set email format to HTML
 
$mail->Subject = $email_subject;
$mail->Body    = $message;
$mail->AltBody = $message ;
 
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
 
if(!$mail->send()) {
   //echo 'Message could not be sent.';
   //echo 'Mailer Error: ' . $mail->ErrorInfo;
   //exit;
   return false;
}
return true;   
?>