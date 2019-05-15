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

$client_id=$_GET['client_id'];
$subject="";
$promo="";
$payment_type="";
$mailsubject="";


// create the objects
$dbobj = new dbdisplay();

$list=$dbobj->getclient_detailsbyID($client_id);


$mailsubject=$list['first_name']." ".$list['middle_name']." ".$list['last_name']." Canada Credit Agreement";

if(!empty($list['promo_code']) && !empty($list['promo_value']) ){
  $promo=$list['promo_code'] . " ($".$list['promo_value'].")";
  $mailsubject.=" ".$list['promo_code'];
}

if($list['confirmation_emt'] == "on") {
  $payment_type = "Standard Payment. With EMT.";
}else {
    $payment_type = "Standard Payment.";
}

$occu=$dbobj->getoccupationbyid($list['occupation']);
$occupation_name=$occu['occupation_name'];
$occupation=$occupation_name;


$msgBody .= '<STRONG><u>Product Information:</u></STRONG>';
$msgBody .= "<table><tr><td><span><b>CAT Option: </b></span></td><td> <font color='#0000CC'>".$list['CAT_include']."</font></td></tr>";
if($list['mattress_size'] != '')
$msgBody .= "<tr><td><span><b>Mattress Selected: </b></span></td><td> <font color='#0000CC'>".$list['mattress_size']."</font></td></tr>";
$msgBody .= "<tr><td><span><b>agent_name: </b></span></td><td> <font color='#0000CC'>".$list['agent']."</font></td></tr>";
//$msgBody .= "<tr><td><span><b>leadid: </b></span></td><td> <font color='#0000CC'></font></td></tr>";
$msgBody .= "<tr><td><span><b>Product: </b></span></td><td> <font color='#0000CC'>" . $list['product_name'] . "</font></td></tr>";
$msgBody .= "<tr><td><span><b>Credit repair addon: </b></span></td><td> <font color='#0000CC'></font></td></tr>";
$msgBody .= "<tr><td><span><b>PROMO: </b></span></td><td> <font color='#0000CC'>". $promo ."</font></td></tr>";
$msgBody .= "<tr><td><span><b>Total Setup: </b></span></td><td> <font color='#0000CC'>$".$list['setup_fee'] ."</font></td></tr>";
$msgBody .= "<tr><td><span><b>Setup Date: </b></span></td><td> <font color='#0000CC'>".$list['setup_fee_date']."</font></td></tr>";
$msgBody .= "<tr><td><span><b>Total Recuring: </b></span></td><td> <font color='#0000CC'>$". $list['reoccur_fee'] ."</font></td></tr>";
$msgBody .= "<tr><td><span><b>Recuring Fee Option: </b></span></td><td> <font color='#0000CC'>Bi-weekly</font></td></tr>";
$msgBody .= "<tr><td><span><b>Recuring start date: </b></span></td><td> <font color='#ff0000'>".$list['reoccur_fee_date']."</font></td></tr>";
if($list['mattress_cost'] != '')
$msgBody .= "<tr><td><span><b>Mattress Cost: </b></span></td><td> <font color='#0000CC'> $".$list['mattress_cost']."</font></td></tr>";



$msgBody .= '</table></td>';
$msgBody .= '<STRONG><u>Banking Information:</u></STRONG><table>';

$msgBody .= "<tr><td><span><b>Financial_Institution_Name: </b></span></td><td> <font color='#0000CC'>".$list['bank_name']."</font></td></tr>";
$msgBody .= "<tr><td><span><b>Branch_Address: </b></span></td><td> <font color='#0000CC'>".$list['branch_address']."</font></td></tr>";
$msgBody .= "<tr><td><span><b>Institution_Number: </b></span></td><td> <font color='#0000CC'>".$list['institution_number']."</font></td></tr>";
$msgBody .= "<tr><td><span><b>Transit_Number: </b></span></td><td> <font color='#0000CC'>".$list['transit_number']."</font></td></tr>";
$msgBody .= "<tr><td><span><b>Account_Number: </b></span></td><td> <font color='#0000CC'>".$list['account_number']."</font></td></tr>";
$msgBody .= "<tr><td><span><b>Payment Type: </b></span></td><td> <font color='#ff0000' size='4'><strong>".$payment_type."</strong></font></td></tr></table>";
$msgBody .= '</table></td>';

$msgBody .= '<STRONG><u>Client Information:</u></STRONG>';
$msgBody .= '<table>';
$msgBody .= "<tr><td><span><b>first_name: </b></span></td><td> <font color='#0000CC'>".$list['first_name']."</font></td></tr>";
$msgBody .= "<tr><td><span><b>middle_name: </b></span></td><td> <font color='#0000CC'>".$list['middle_name']."</font></td></tr>";
$msgBody .= "<tr><td><span><b>last_name: </b></span></td><td> <font color='#0000CC'>".$list['last_name']."</font></td></tr>";
$msgBody .= "<tr><td><span><b>email: </b></span></td><td> <font color='#0000CC'>".$list['email']."</font></td></tr>";
$msgBody .= "<tr><td><span><b>home_phone: </b></span></td><td> <font color='#0000CC'>".$list['phone']."</font></td></tr>";
$msgBody .= "<tr><td><span><b>gender: </b></span></td><td> <font color='#0000CC'>".$list['gender']."</font></td></tr>";
$msgBody .= "<tr><td><span><b>dob: </b></span></td><td> <font color='#0000CC'>".$list['dob']."</font></td></tr>";

$msgBody .= "<tr><td><span><b>Address: </b></span></td><td> <font color='#0000CC'>".$list['street_address']."</font></td></tr>";
$msgBody .= "<tr><td><span><b>City: </b></span></td><td> <font color='#0000CC'>".$list['city']."</font></td></tr>";
$msgBody .= "<tr><td><span><b>Province_Territory: </b></span></td><td> <font color='#0000CC'>".$list['province']."</font></td></tr>";
$msgBody .= "<tr><td><span><b>postal: </b></span></td><td> <font color='#0000CC'>".$list['postal_code']."</font></td></tr>";
$msgBody .= "<tr><td><span><b>PO Box: </b></span></td><td> <font color='#0000CC'>".$list['po_box']."</font></td></tr>";
$msgBody .= "<tr><td><span><b>Time_at_address: </b></span></td><td> <font color='#0000CC'>".$list['time_at_address']."</font></td></tr>";

$msgBody .= "<tr><td><span><b>citizenship: </b></span></td><td> <font color='#0000CC'>".$list['citizen']."</font></td></tr>";
$msgBody .= "<tr><td><span><b>sin: </b></span></td><td> <font color='#0000CC'>".$list['sin']."</font></td></tr>";
$msgBody .= "<tr><td><span><b>Monthly_Income: </b></span></td><td> <font color='#0000CC'>".$list['income']."</font></td></tr>";
$msgBody .= "<tr><td><span><b>Employer_name: </b></span></td><td> <font color='#0000CC'>".$list['emp_name']."</font></td></tr>";
$msgBody .= "<tr><td><span><b>job_title: </b></span></td><td> <font color='#0000CC'>".$occupation."</font></td></tr>";
$msgBody .= "<tr><td><span><b>Employer_phone: </b></span></td><td> <font color='#0000CC'>".$list['emp_phone']."</font></td></tr>";
$msgBody .= "<tr><td><span><b>Employer_addy: </b></span></td><td> <font color='#0000CC'>".$list['emp_address']."</font></td></tr>";
$msgBody .= "<tr><td><span><b>Employer_city: </b></span></td><td> <font color='#0000CC'>".$list['emp_city']."</font></td></tr>";
$msgBody .= "<tr><td><span><b>Employer_Province_Territory: </b></span></td><td> <font color='#0000CC'>".$list['emp_province']."</font></td></tr>";
$msgBody .= "<tr><td><span><b>Employer_postal: </b></span></td><td> <font color='#0000CC'>".$list['emp_postal']."</font></td></tr>";
$msgBody .= "<tr><td><span><b>Employer_lenght: </b></span></td><td> <font color='#0000CC'>".$list['emp_time']."</font></td></tr>";
$msgBody .= "<tr><td><span><b>number_of_CC: </b></span></td><td> <font color='#0000CC'>".$list['num_creditcards']."</font></td></tr>";
$msgBody .= "<tr><td><span><b>Credit_Card_Balance: </b></span></td><td> <font color='#0000CC'>".$list['total_cards_balances']."</font></td></tr>";
$msgBody .= "<tr><td><span><b>Credit_Card_payment: </b></span></td><td> <font color='#0000CC'>".$list['total_cards_payments']."</font></td></tr>";
$msgBody .= "<tr><td><span><b>Rent or own: </b></span></td><td> <font color='#0000CC'>".$list['rent_own']."</font></td></tr>";
$msgBody .= "<tr><td><span><b>Rent_Mortgage_Payemnt: </b></span></td><td> <font color='#0000CC'>".$list['rent_mortgage_payment']."</font></td></tr>";
$msgBody .= "<tr><td><span><b>Vehicle_loan_ammount: </b></span></td><td> <font color='#0000CC'>".$list['car_loan_amount']."</font></td></tr>";
$msgBody .= "<tr><td><span><b>Vehicle_loan_payment: </b></span></td><td> <font color='#0000CC'>".$list['total_car_payments']."</font></td></tr>";
$msgBody .= "<tr><td><span><b>Number of Bankruptcy: </b></span></td><td> <font color='#0000CC'>".$list['number_of_bankruptcy']."</font></td></tr>";
$msgBody .= "<tr><td><span><b>bankrupt_date: </b></span></td><td> <font color='#0000CC'>".$list['bankruptcy_date']."</font></td></tr>";
$msgBody .= "<tr><td><span><b>discharge_date: </b></span></td><td> <font color='#0000CC'>".$list['bankruptcy_discharge_date']."</font></td></tr>";
$msgBody .= "<tr><td><span><b>expected_dischargedate: </b></span></td><td> <font color='#0000CC'>".$list['consumer_discharge_date']."</font></td></tr>";
$msgBody .= "<tr><td><span><b>bankrupt_contribution: </b></span></td><td> <font color='#0000CC'>".$list['total_bankruptcy_payment']."</font></td></tr>";
$msgBody .= "<tr><td><span><b>Consumer_Proposal Contribution: </b></span></td><td> <font color='#0000CC'>".$list['total_consumer_payments']."</font></td></tr>";
$msgBody .= "<tr><td><span><b>Expected_Date_of_Completion: </b></span></td><td> <font color='#0000CC'></font></td></tr>";
$msgBody .= "<tr><td><span><b>terms: </b></span></td><td> <font color='#0000CC'>".$list['terms']."</font></td></tr>";
$msgBody .= '</table>';
$msgBody .= "<br><br><br><br>".$crm_update_result;
$msgBody .= "<br><br><br><br><table border='1'><tr><td><span><b>Ip form completed at: </b></span></td><td> <font color='#0000CC'>".$list['system_ip']."</font></td></tr></table>";
$msgBody .= "<br><table border='0'><tr><td><span><b>Browser Type: </b></span></td><td> <font color='#0000CC'>".$list['browser_type']."</font></td></tr></table>";
$msgBody .= "<br><table border='0'><tr><td><span><b>Browser Version: </b></span></td><td> <font color='#0000CC'>".$list['browser_version']."</font></td></tr></table>";
$msgBody .= "<br><table border='0'><tr><td><span><b>Platform: </b></span></td><td> <font color='#0000CC'>".$list['platform']."</font></td></tr></table>";
$msgBody .= "</table></td></tr></table>";


$agreement_path=$list['contract_folderpath'];
$filename1=$list['last_name']."_".$list['first_name']."_cc.pdf";
$filename2=$list['last_name']."_".$list['first_name']."_finance.pdf";

$maillarr=array();


$maillarr['subject']=ucfirst($mailsubject);
$maillarr['content']=$msgBody;
$maillarr['ccfile']=$agreement_path."/".$filename1;
$maillarr['financefile']=$agreement_path."/".$filename2;


$file1link=str_replace('/var/www/html','http://184.68.121.126',$agreement_path)."/".$filename1;
$file2link=str_replace('/var/www/html','http://184.68.121.126',$agreement_path)."/".$filename2;

$maillarr['ccfilelink']='<a href="'.$file1link.'" target="_blank">'.$filename1.'</a>';
$maillarr['financefilelink']='<a href="'.$file2link.'" target="_blank" >'.$filename2.'</a>';

$maillarr['mattressAgreement'] = FALSE;

if($list['mattress_size'] != '')
{
	$maillarr['mattressAgreement'] = TRUE;
	$filename3=$list['last_name']."_".$list['first_name']."_mattress_finance.pdf";
	$file3link=str_replace('/var/www/html','http://184.68.121.126',$agreement_path)."/".$filename3;
	$maillarr['mattressfinancefile']=$agreement_path."/".$filename3;
	$maillarr['mattressfinancefilelink']='<a href="'.$file3link.'" target="_blank" >'.$filename3.'</a>';	
}




echo json_encode($maillarr);
exit;

?>
