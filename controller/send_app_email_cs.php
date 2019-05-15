<?php

error_reporting(E_ALL ^ E_NOTICE);
//error_reporting(E_ALL);
ini_set('display_errors', 1);
date_default_timezone_set("America/Denver");
$rootpath=$_SERVER["DOCUMENT_ROOT"]."/dealportal";
include($rootpath."/model/common.php");
include($rootpath."/controller/classes/sanitize.php");
include($rootpath."/controller/classes/dbdisplay.php");
include($rootpath."/controller/lib/html2pdf/html2pdf.class.php");
include ($rootpath."/controller/lib/PHPMailer/PHPMailerAutoload.php");
session_start();

$user = $_SESSION['CCuser'];
$user_id = $user['id'];
$user_name = $user['username'];

$client_id=$_POST['client_id'];
$toaddress=$_POST['toaddress'];
$mailsubject=$_POST['mailsubject'];
$ccagreement=(isset($_POST['ccagreement'])) ? $_POST['ccagreement'] : "";
$financeagreement=(isset($_POST['financeagreement'])) ? $_POST['financeagreement'] : "";
$mattressfinanceagreement = (isset($_POST['mattressfinanceagreement'])) ? $_POST['mattressfinanceagreement'] : "";
$msgBody=$_POST['mcontent'];


$dbobj = new dbdisplay();

	$mail = new PHPMailer;
	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.1and1.com';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'outgoing@creditcanada.net';    // SMTP username
	$mail->Password = 'gmaster74';                           // SMTP password
	$mail->SMTPSecure = 'TLS';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 25;                                    // TCP port to connect to
	$mail->From = 'nirmala-a@creditcanada.net';
	//$mail->setFrom('apps@creditcanada.net', 'creditcanada.net');

	// To Address
	$pos = strpos($toaddress, ",");
	if($pos === false){
		$mail->addAddress($toaddress);
	}else{

		$toaddrExp=explode(",",$toaddress);
		for($i=0;$i<=count($toaddrExp);$i++){
			if(!empty($toaddrExp[$i])){
				$mail->addAddress($toaddrExp[$i]);
			}
		}
	}

	$mail->isHTML(true);
	$mail->Subject = $mailsubject;
  	$mail->msgHTML($msgBody);

	// Attachments
	if(!empty($ccagreement)){
		$mail->AddAttachment($ccagreement);
	}
	if(!empty($financeagreement)){

		$mail->AddAttachment($financeagreement);
	}

	if(!empty($mattressfinanceagreement)){

		$mail->AddAttachment($mattressfinanceagreement);
	}
	if(!$mail->send()) {
		echo "Error On While Sending Email ".$mail->ErrorInfo;

	}else{

		$mailcomment='Email sent successfully to '.$toaddress;
		$user_info=$dbobj->adduser_trackinfo($client_id,$user_id,'Send Application Email',$mailcomment,$user_name);
    echo "Email has been Sent Successfully !!!";
  }


 ?>
