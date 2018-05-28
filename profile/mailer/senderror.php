<?php
error_reporting(0);
require "mailer/class.phpmailer.php";
require "mailer/class.smtp.php";


$req="";
$req=$_GET['client_req'];
$o = json_decode($req);

// recepteur
$name_recepteur=$o->{'name'};
$email_recepteur=$o->{'email'};
// recepteur


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

$mail->From = "spot.app.mail@gmail.com";
$mail->FromName = "Spot Team";

$mail->addAddress($email_recepteur, $name_recepteur);

$mail->isHTML(true);

$mail->Subject = "Réinitialisation de mot de passe";
$mail->Body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <style type="text/css">
    @import url(http://fonts.googleapis.com/css?family=Lato:400);

    /* Take care of image borders and formatting */

    img {
      max-width: 600px;
      outline: none;
      text-decoration: none;
      -ms-interpolation-mode: bicubic;
    }

    a {
      text-decoration: none;
      border: 0;
      outline: none;
    }

    a img {
      border: none;
    }

    /* General styling */

    td, h1, h2, h3  {
      font-family: Helvetica, Arial, sans-serif;
      font-weight: 400;
    }

    body {
      -webkit-font-smoothing:antialiased;
      -webkit-text-size-adjust:none;
      width: 100%;
      height: 100%;
      color: #37302d;
      background: #ffffff;
    }

    table {
      background:
    }

    h1, h2, h3 {
      padding: 0;
      margin: 0;
      color: #ffffff;
      font-weight: 400;
    }

    h3 {
      color: #21c5ba;
      font-size: 24px;
    }
  </style>

  <style type="text/css" media="screen">
    @media screen {
      td, h1, h2, h3 {
        font-family: "Lato", "Helvetica Neue", "Arial", "sans-serif" !important;
      }
    }
  </style>

  <style type="text/css" media="only screen and (max-width: 480px)">
    /* Mobile styles */
    @media only screen and (max-width: 480px) {
      table[class="w320"] {
        width: 320px !important;
      }

      table[class="w300"] {
        width: 300px !important;
      }

      table[class="w290"] {
        width: 290px !important;
      }

      td[class="w320"] {
        width: 320px !important;
      }

      table[class*="w260"] {
        width: 260px !important;
      }

      td[class*="mobile-center"] {
        text-align: center !important;
      }

      td[class*="mobile-padding"] {
        padding-left: 20px !important;
        padding-right: 20px !important;
        padding-bottom: 20px !important;
      }

      td[class*="mobile-block"] {
        display: block !important;
        width: 280px !important;
        text-align: left !important;
        padding-bottom: 20px !important;
      }

      td[class*="mobile-img"] {
        display: block !important;
        width: 100% !important;
        text-align: center !important;
        padding-bottom: 20px !important;
        width:320px !important;
      }
    }
  </style>
</head>
<body class="body" style="padding:0; margin:0; display:block; background:#ffffff; -webkit-text-size-adjust:none" bgcolor="#ffffff">
<table align="center" cellpadding="0" cellspacing="0" width="100%" height="100%" >
  <tr>
    <td align="center" valign="top" bgcolor="#ffffff"  width="100%">

    <table cellspacing="0" cellpadding="0" width="100%">
      <tr>
        <td style="border-bottom: 3px solid #1dabc5;" width="100%">
          <center>
            <table cellspacing="0" cellpadding="0" width="500" class="w320">
              <tr>
                <td valign="top" style="padding:10px 0; text-align:left;" class="mobile-center">
                  <img width="100" height="40" src="https://www.dropbox.com/s/3tpnr4hnktqxay8/logo.png?raw=1">
                </td>
              </tr>
            </table>
          </center>
        </td>
      </tr>
      <tr>
        <td background="https://www.filepicker.io/api/file/mEwMJfoIQlKlv1u3CSfU" bgcolor="#0d0102" valign="top" style="background: url(https://www.filepicker.io/api/file/mEwMJfoIQlKlv1u3CSfU) no-repeat center; background-color: #0d0102; background-position: center;">
          <!--[if gte mso 9]>
          <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="mso-width-percent:1000;height:303px;">
            <v:fill type="tile" src="https://www.filepicker.io/api/file/mEwMJfoIQlKlv1u3CSfU" color="#0d0102" />
            <v:textbox inset="0,0,0,0">
          <![endif]-->
          <div>
            <center>
              <table cellspacing="0" cellpadding="0" width="530" height="303" class="w320">
                <tr>
                  <td valign="middle" style="vertical-align:middle; padding-right: 15px; padding-left: 15px; text-align:left;" class="mobile-center" height="303">

                    <h1 style="text-transform: uppercase; color:#fff;">'.$name_recepteur.'</h1>
                    <h2 style="text-transform: uppercase; color:#fff;">Nous sommes désolé, nous nous pouvons pas identifier votre compte !</h2>

                  </td>
                </tr>
              </table>
            </center>
          </div>
          <!--[if gte mso 9]>
            </v:textbox>
          </v:rect>
          <![endif]-->
        </td>
      </tr>
      <tr>
        <td valign="top">
          <center>
            <table cellspacing="0"  cellpadding="30" width="500" class="w320">
              <tr>
                <td valign="top" style="border-bottom:1px solid #a1a1a1;">

                  <table cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                      <td style="text-align: center; color:#1dabc5; font-weight:bold;">
                        <h3>Les mots de passe des comptes sont confidentiels, il faut bien vérifier vos informations de récupération de votre compte !</h3>
                        <br>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
            <table cellspacing="0" cellpadding="0" width="500" class="w320">
             
              <tr>
			  <br>
			  <center>Meilleures salutations, Equipe SPOT.</center>
			  </tr>
              <tr>
                <td>
                  <table cellspacing="0" cellpadding="25" width="100%">
                    <tr>
                      <td>
                        &nbsp;
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </center>
        </td>
      </tr>
      <tr>
        <td style="background-color:#c2c2c2;">
          <center>
            <table cellspacing="0" cellpadding="0" width="500" class="w320">
              <tr>
                <td>
                  <table cellspacing="0" cellpadding="30" width="100%">
                    <tr>
                      <td style="text-align:center;">
                        <a href="#" style="text-decoration:none">
                          <img width="61" height="51" src="https://www.filepicker.io/api/file/vkoOlof0QX6YCDF9cCFV" alt="twitter" />
                        </a>
                        <a href="#" style="text-decoration:none">
                          <img width="61" height="51" src="https://www.filepicker.io/api/file/fZaNDx7cSPaE23OX2LbB" alt="google plus" />
                        </a>
                        <a href="#" style="text-decoration:none">
                          <img width="61" height="51" src="https://www.filepicker.io/api/file/b3iHzECrTvCPEAcpRKPp" alt="facebook" />
                        </a>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td>
                  <center>
                    <table style="margin:0 auto;" cellspacing="0" cellpadding="5" width="100%">
                      <tr>
                        <td style="text-align:center; margin:0 auto;" width="100%">
                           <a href="http://localhost" style="text-align:center; text-decoration:none">
                             <img style="margin:2 auto;" width="24" height="24" src="https://www.dropbox.com/s/1v3yzmjbngvfcln/logo1.png?raw=1" alt="logo link" />
							 <div style="color:#fff;font-size:12px">Droits réservées Spot © 2018</div>
                           </a>
                        </td>
                      </tr>
                    </table>
                  </center>
                </td>
              </tr>
            </table>
          </center>
        </td>
      </tr>
    </table>
    </td>
  </tr>
</table>
</body>
</html>';
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