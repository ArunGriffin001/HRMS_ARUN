<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");        

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

    exit(0);
}
class Comman extends MX_Controller {
	public function __construct()
	{
	parent::__construct();
	}
	function index()
	{
	echo "Staff";
	}
	function pagenotfound()
	{
		echo "404";
	}
	function sendmail()
	{
    // $to="noreply@atsadvisornetwork.com";
	$to="syscraft.rupesh@gmail.com";
	$from="rupesh.malviya@syscraftonline.com";
	$from_name="rupesh";
	global $error;
	include(APPPATH."/libraries/mail/class.phpmailer.php");
	//include(APPPATH."/library/mail/class.phpmailer.php");
	error_reporting(E_ALL);
$mail = new PHPMailer();  // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true;  // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
$mail->Port = 465;
$subject="ATS";
$mail->Host = 'mail.atsadvisornetwork.com';
$mail->Username = "noreply@atsadvisornetwork.com";  
$mail->Password = ",i^LD&SIvn?j";   
$body="<h1>Hello123</h1>"; 

// $subject="syscraftonline";
// $mail->Host = 'syscraftonline.com';
// $mail->Username = "rupesh.malviya@syscraftonline.com";  
// $mail->Password = "rupesh1234";    

// $subject="gmail";
// $mail->Host = 'smtp.googlemail.com';
// $mail->Username = "shrma.aashish@gmail.com";  
// $mail->Password = "rupesh@123456";    


$mail->SetFrom($from, $from_name);
$mail->Subject = $subject;
$mail->Body = $body;
$mail->IsHTML(true);
$mail->AddAddress($to);
if(!$mail->Send()) {
$error = 'Mail error: '.$mail->ErrorInfo;
echo $error;
die;
return false;
} else {
echo $error = 'Message sent!';
die;
return true;
}
	}
	

}//close controller