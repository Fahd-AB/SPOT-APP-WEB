<?php
error_reporting(0);
require "mailer/class.phpmailer.php";
require "mailer/class.smtp.php";


$req="";
$req=$_GET['client_req'];
$o = json_decode($req);

// envoyeur
$name_env=$o->{'name'};
$email_env=$o->{'email'};
$subject_env=$o->{'subject'};
$message_env=$o->{'message'};
// envoyeur


$mail = new PHPMailer;
$mail->CharSet = 'UTF-8';
//Enable SMTP debugging. 
$mail->SMTPDebug = 3;                               
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = "smtp.gmail.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = "spot.app.mail@gmail.com";                 
$mail->Password = "test0000";                           
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";                           
//Set TCP port to connect to 
$mail->Port = 587;                                   

$mail->From = $email_env;
$mail->FromName = $name_env;

$mail->addAddress("spot.app.mail@gmail.com", "Spot Team");

$mail->isHTML(true);

$mail->Subject = $subject_env;
$mail->Body = '<html>
        <head>
          <title>Mail from '. $name_env .'</title>
        </head>
        <body>
          <table style="width: 500px; font-family: arial; font-size: 14px;" border="1">
            <tr style="height: 32px;">
              <th align="right" style="width:150px; padding-right:5px;">Name:</th>
              <td align="left" style="padding-left:5px; line-height: 20px;">'. $name_env .'</td>
            </tr>
            <tr style="height: 32px;">
              <th align="right" style="width:150px; padding-right:5px;">E-mail:</th>
              <td align="left" style="padding-left:5px; line-height: 20px;">'. $email_env .'</td>
            </tr>
            <tr style="height: 32px;">
              <th align="right" style="width:150px; padding-right:5px;">Subject:</th>
              <td align="left" style="padding-left:5px; line-height: 20px;">'. $subject_env .'</td>
            </tr>
            <tr style="height: 32px;">
              <th align="right" style="width:150px; padding-right:5px;">Message:</th>
              <td align="left" style="padding-left:5px; line-height: 20px;">'. $message_env  .'</td>
            </tr>
          </table>
        </body>
        </html>
        ';
//$mail->AltBody = "This is the plain text version of the email content";

if(!$mail->send()) 
{
    echo "Mailer Error: " . $mail->ErrorInfo;
} 
else 
{
    echo "Message has been sent successfully";
}

?>