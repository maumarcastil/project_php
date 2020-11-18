<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


require './src/Exception.php';
require './src/PHPMailer.php';
require './src/SMTP.php';


$nombre = "este es el nombre";
$informacion = "esta es la info";


$html = "<tbody><tr height='32' style='height:32px'><td></td></tr><tr align='center'><td><div><div></div></div><table border='0' cellspacing='0' cellpadding='0' style='padding-bottom:20px;max-width:516px;min-width:220px'><tbody><tr>";
        $html .= "<td width='8' style='width:8px'></td><td><div style='border-style:solid;border-width:thin;border-color:#dadce0;border-radius:8px;padding:40px 20px' align='center' class='m_114319817842147933mdv2rw'><img src='https://ci5.googleusercontent.com/proxy/T_zJ7UbaC9x27OP4-ZCPfDipqYLSGum30AlaxEycVclfvxO8Cze0sZ0kCrXlx6a-MgvW2tswbIyiNVfczjDuGh9okorzC5SUJDfwkHr6-3j1KUu94HuAw5uxM_jaElQef3Sub84=s0-d-e1-ft#https://www.gstatic.com/images/branding/googlelogo/2x/googlelogo_color_74x24dp.png' width='74' height='24' aria-hidden='true' style='margin-bottom:16px' alt='Google' class='CToWUd'><div style='font-family:'Google Sans',Roboto,RobotoDraft,Helvetica,Arial,sans-serif;border-bottom:thin solid #dadce0;color:rgba(0,0,0,0.87);line-height:32px;padding-bottom:24px;text-align:center;word-break:break-word'>";
        $html .= "<div style='font-size:24px'>Empresa</div><table align='center' style='margin-top:8px'><tbody><tr style='line-height:normal'><td><a style='font-family:'Google Sans',Roboto,RobotoDraft,Helvetica,Arial,sans-serif;color:rgba(0,0,0,0.87);font-size:14px;line-height:20px'>".$nombre;            
        $html .= "</a></td></tr></tbody></table></div><div style='font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:20px;text-align:left'><strong>Informacion adicional.</strong><br>".$informacion;
        $html .= "</div></div></td><td width='8' style='width:8px'></td></tr></tbody></table></td></tr><tr height='32' style='height:32px'><td></td></tr></tbody>";

$mail = new PHPMailer();

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// SMTP::DEBUG_OFF = off (for production use)
// SMTP::DEBUG_CLIENT = client messages
// SMTP::DEBUG_SERVER = client and server messages
$mail->SMTPDebug = SMTP::DEBUG_SERVER;

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption mechanism to use - STARTTLS or SMTPS
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = 'correopruebasp001@gmail.com';

//Password to use for SMTP authentication
$mail->Password = 'proyectoweb001';

//Set who the message is to be sent from
$mail->setFrom('correopruebasp001@gmail.com', 'First Last');

//Set who the message is to be sent to
$mail->addAddress('cadicossamm@gmail.com', 'John Doe');

//Set the subject line
$mail->Subject = 'PHPMailer GMail SMTP test';

//Replace the plain text body with one created manually
$mail->Body = $html;

//Replace the plain text body with one created manually
$mail->AltBody = $html;
//send the message, check for errors
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message sent!';
    //Section 2: IMAP
    //Uncomment these to save your message in the 'Sent Mail' folder.
    #if (save_mail($mail)) {
    #    echo "Message saved!";
    #}
}