<?php

$from="";//from mail id
$account="";//account mail id
$password="";//account mail password

$to="";//to mail id
$fromc="";//from mail id
$from_name="Verification Message";
$msg="<strong>You have been Selected as Volunteer Secretary of our NSS Unit<br />
</strong>"; // HTML message
$subject="Request Verification";


//error_reporting(0);
include("class.phpmailer.php");
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->CharSet = 'UTF-8';
$mail->Host = "smtp.gmail.com";
//$mail->Host = "www.vtrio.com";
$mail->SMTPAuth= true;
$mail->Port = 465; // Or 587
$mail->Username= $account;
$mail->Password= $password;
$mail->SMTPSecure = 'ssl';
$mail->From = $fromc;
$mail->FromName= $from_name;
$mail->isHTML(true);
$mail->Subject = $subject;
$mail->Body = $msg;
$mail->addAddress($to);
//$mail->AddAttachment("Scan5.pdf");

//$mail->AddAttachment("logo.gif");
if(!$mail->send()){
 echo "Mailer Error: " . $mail->ErrorInfo;
}else{
?>
<script>
//alert("Message send to the Mail ID");
//window.location="inbox.php"; 
</script>
<?php
echo "E-Mail has been sent";
}

?>