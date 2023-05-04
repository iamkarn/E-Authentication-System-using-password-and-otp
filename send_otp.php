<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$con=mysqli_connect('localhost','root','','KaranAuth');
$email=$_POST['email'];
$res=mysqli_query($con,"select * from registration where email='$email'");
$count=mysqli_num_rows($res);
if($count>0){
	$otp=rand(111111,999999);
	mysqli_query($con,"update registration set otp='$otp' where email='$email'");
    $html="Your otp verification code is ".$otp;
	$_SESSION['EMAIL']=$email;
    smtp_mailer($email,'OTP Verification',$html);
    echo "yes";
}else{
	echo "not_exist";
}

function smtp_mailer($to,$subject,$msg){
	$mail = new PHPMailer(true); 
	$mail->IsSMTP(); 
	$mail->SMTPDebug = 1; 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'ssl'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 465; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "karanvir33888@gmail.com";
	$mail->Password = "ndwnbmcbiedysxqu";
	$mail->setFrom("karanvir33888@gmail.com"); 
    $mail->isHTML(true);
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	if($mail->Send()){
        
     return;
    }
    
/* echo " 
   <script> 
    alert('Mail sent successfully');
    document.location.href = 'otp_verify.php' ;
  </script> 
     ";  */
}
?>