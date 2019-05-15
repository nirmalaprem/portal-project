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
session_start();

$user = $_SESSION['CCuser'];
$user_id = $user['id'];
$user_name = $user['username'];

// create the objects
$dbobj = new dbdisplay();

function get_post($input){
  $output =(isset($input)) ? strip_tags(trim($input)) : '';
  return $output;
}


$agreement_info=file_get_contents($rootpath."/view/includes/docs/amendment_agreement.html");

$agreementdate=get_post($_POST['agreementdate']);
$firstname=get_post($_POST['firstname']);
$lastname=get_post($_POST['lastname']);
$email=get_post($_POST['email']);
$phonenumber=get_post($_POST['phonenumber']);
$address=get_post($_POST['address']);
$city=get_post($_POST['city']);
$province=get_post($_POST['province']);
$postalcode=get_post($_POST['postalcode']);
$incrsuf=get_post($_POST['incrsuf']);
$decsuf=get_post($_POST['decsuf']);
/*$fileName = get_post($_FILES['clientsign']['name']);
$fileTempName = get_post($_FILES['clientsign']['tmp_name']);*/

$dbagree_date=str_replace("/","-",$agreementdate);

$filename=$lastname."_".$firstname."_".date('dmyhis').".pdf";
$agree_date=date('l F jS Y' , strtotime($dbagree_date));

$clientname=$firstname." ".$lastname;
$agreement_info=str_replace("[DATE]",$agree_date,$agreement_info);
$agreement_info=str_replace("[NAME]",$clientname,$agreement_info);
$agreement_info=str_replace("[EMAIL]",$email,$agreement_info);
$agreement_info=str_replace("[PHONE]",$phonenumber,$agreement_info);
$agreement_info=str_replace("[ADDRESS]",$address,$agreement_info);
$agreement_info=str_replace("[CITY]",$city,$agreement_info);
$agreement_info=str_replace("[PROVINCE]",$province,$agreement_info);
$agreement_info=str_replace("[CODE]",$postalcode,$agreement_info);
$agreement_info=str_replace("[INCR DIFFERENCE IN SUF]",$incrsuf,$agreement_info);
$agreement_info=str_replace("[DECR DIFFERENCE IN SUF]",$decsuf,$agreement_info);

/*if(!empty($fileName)){
  $customer_sign=$lastname."_".$firstname."_".date('dmyhis')."_".$_FILES['clientsign']['name'];
  move_uploaded_file($_FILES['clientsign']['tmp_name'], $rootpath."/view/includes/docs/amendmentPdf/".$customer_sign);
  if(file_exists($rootpath."/view/includes/docs/amendmentPdf/".$customer_sign)){
    $agreement_info=str_replace("[SIGN]","http://184.68.121.126/dealportal/view/includes/docs/amendmentPdf/".$customer_sign,$agreement_info);
  }else{
    $agreement_info=str_replace("[SIGN]","http://184.68.121.126/dealportal/view/includes/docs/noimage.png",$agreement_info);
  }
}else{
  $agreement_info=str_replace("[SIGN]","http://184.68.121.126/dealportal/view/includes/docs/noimage.png",$agreement_info);
}*/

//echo $agreement_info;
$diffsuf=0;
if(!empty($incrsuf)){
  $diffsuf=$incrsuf;
}
if(!empty($decsuf)){
  $diffsuf=$decsuf;
}

$html2pdf = new HTML2PDF('P', 'A4', 'en');
$html2pdf->writeHTML($agreement_info);
$html2pdf->Output($rootpath."/view/includes/docs/amendmentPdf/".$filename, 'F');
$pdfdoc = $html2pdf->Output($rootpath."/view/includes/docs/amendmentPdf/".$filename, 'S');

$filenameArr['filename']=$filename;

$result=$dbobj->add_agreement_amendment(date('Y-m-d',strtotime($dbagree_date)),$firstname,$lastname,$email,$phonenumber,$address,
$city,$province,$postalcode,$diffsuf,$filename,$user_name);

//echo $result;

echo json_encode($filenameArr);

?>
