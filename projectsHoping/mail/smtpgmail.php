<?php
include "classes/class.phpmailer.php"; // include the class name
function send_mail($to,$from,$fromname,$sub,$body,$cc="",$bcc="")
{
$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug=1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth=true; // authentication enabled
$mail->SMTPSecure='ssl'; // secure transfer enabled REQUIRED for GMail
$mail->Host="smtp.gmail.com";
$mail->Port=465; // or 587
$mail->IsHTML(true);
$mail->Username ="anitageetsharma@gmail.com";
$mail->Password ="salman164";
$mail->SetFrom($from,$fromname);
$mail->Subject=$sub;
$mail->Body =$body;
$mail->AddAddress($to);
$mail->AddCC($cc);
$mail->AddBCC($bcc);
if(!$mail->Send())
{
echo "Mailer Error:".$mail->ErrorInfo;
return false;
}
else
{
return true;	
//echo "Mail Hasbeen Sent";
}
}
?>