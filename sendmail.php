<?php 

require 'PHPmailer/PHPMailerAutoload.php';


$mail = new PHPMailer;

//Enable SMTP debugging. 
$mail->SMTPDebug = 0;                               
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = "smtp.gmail.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = "edunovaw23@gmail.com";                 
$mail->Password = "edunova205555";                           
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";                           
//Set TCP port to connect to 
$mail->Port = 587; 
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);                                         

$mail->setFrom($_POST["email"]);


$mail->addAddress("edunovaw23@gmail.com", "Croatia bogdanovci");

$mail->isHTML(true);

$mail->Subject = $_POST["subject"];
$mail->Body = $_POST["message"];
$mail->AltBody = $_POST["message"];

if(!$mail->send()) 
{
    return "Mailer Error: " . $mail->ErrorInfo;
    header("location: contact.php");
} 
else 
{
    return "Message has been sent successfully";
}


print_r($_POST);