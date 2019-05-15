<?php

$rootpath=$_SERVER["DOCUMENT_ROOT"]."/dealportal";
include($rootpath."/model/config.php");
include($rootpath."/controller/classes/sanitize.php");
include($rootpath."/controller/lib/PHPMailer/PHPMailerAutoload.php");
date_default_timezone_set("America/Edmonton");


function get_post($input){

  return (isset($input)) ? trim(strip_tags($input)) : "";

}

// Check the POST Variable Set
if($_POST){
  $first_name = (isset($_POST['first_name'])) ? trim($_POST['first_name']) : "";
  $middle_name = (isset($_POST['middle_name'])) ? trim($_POST['middle_name']) : "";
  $last_name = (isset($_POST['last_name'])) ? trim($_POST['last_name']) : "";
  $email = (isset($_POST['email'])) ? trim($_POST['email']) : "";
  $phone = (isset($_POST['phone'])) ? trim($_POST['phone']) : "";
  $mobile =  (isset($_POST['mobile'])) ? trim($_POST['mobile']) : "";
  $dob =  (isset($_POST['DOB'])) ? trim($_POST['DOB']) : "";
  $gender = (isset($_POST['gender'])) ? trim($_POST['gender']) : "";
  $citizen = (isset($_POST['citizen'])) ? trim($_POST['citizen']) : "";
  $agent =  (isset($_POST['agent'])) ? trim($_POST['agent']) : "";
  $street_address =  (isset($_POST['address'])) ? trim($_POST['address']) : "";
  $laneTwo =  (isset($_POST['laneTwo'])) ? trim($_POST['laneTwo']) : "";
  $unt =  (isset($_POST['unt'])) ? trim($_POST['unt']) : "";
  $postal_code = (isset($_POST['postal'])) ? trim($_POST['postal']) : "";
  $city =  (isset($_POST['city'])) ? trim($_POST['city']) : "";
  $province = (isset($_POST['province'])) ? trim($_POST['province']) : "";
  //$po_box = (isset($_POST['po_box'])) ? $_POST['po_box'] : "";
  $time_at_address = (isset($_POST['time_at_address'])) ? $_POST['time_at_address'] : "";
  $occupation =  (isset($_POST['occupation'])) ? $_POST['occupation'] : "";
  $income =  (isset($_POST['income'])) ? $_POST['income'] : "";
  $emp_time = (isset($_POST['emp_time'])) ? $_POST['emp_time'] : "";
  $emp_name =  (isset($_POST['emp_name'])) ? $_POST['emp_name'] : "";
  $emp_address =  (isset($_POST['emp_address'])) ? $_POST['emp_address'] : "";
  $emp_city = (isset($_POST['emp_city'])) ? $_POST['emp_city'] : "";
  $emp_province =  (isset($_POST['emp_province'])) ? $_POST['emp_province'] : "";
  $emp_postal = (isset($_POST['emp_postal'])) ? $_POST['emp_postal'] : "";
  $emp_phone =  (isset($_POST['emp_phone'])) ? $_POST['emp_phone'] : "";
  $num_creditcards = (isset($_POST['num_creditcards'])) ? $_POST['num_creditcards'] : "";
  $total_cards_balances = (isset($_POST['total_cards_balances'])) ? $_POST['total_cards_balances'] : "";
  $total_cards_payments = (isset($_POST['total_cards_payments'])) ? $_POST['total_cards_payments'] : "";
  $rent_own =  (isset($_POST['rent_own'])) ? $_POST['rent_own'] : "";
  $rent_mortgage_payment =(isset($_POST['rent_mortgage_payment'])) ? $_POST['rent_mortgage_payment'] : "";
  $car_loan_amount = (isset($_POST['car_loan_amount'])) ? $_POST['car_loan_amount'] : "";
  $total_car_payments = (isset($_POST['total_car_payments'])) ? $_POST['total_car_payments'] : "";
  $number_of_bankruptcy =(isset($_POST['number_of_bankruptcy'])) ? $_POST['number_of_bankruptcy'] : "";
  $bankruptcy_date = (isset($_POST['bankruptcy_date'])) ? $_POST['bankruptcy_date'] : "";
  $bankruptcy_discharge_date = (isset($_POST['bankruptcy_discharge_date'])) ? $_POST['bankruptcy_discharge_date'] : "";
  $total_bankruptcy_payment = (isset($_POST['total_bankruptcy_payment'])) ? $_POST['total_bankruptcy_payment'] : "";
  $consumer_discharge_date = (isset($_POST['consumer_discharge_date'])) ? $_POST['consumer_discharge_date'] : "";
  $total_consumer_payments = (isset($_POST['total_consumer_payments'])) ? $_POST['total_consumer_payments'] : "";
  $sin = (isset($_POST['sin'])) ? $_POST['sin'] : "";
  $primaryid_type = (isset($_POST['PrimaryIDType'])) ? $_POST['PrimaryIDType'] : "";
  $primaryid_number = (isset($_POST['PrimaryIDNumber'])) ? $_POST['PrimaryIDNumber'] : "";
  $primaryid_placeofissue = (isset($_POST['PrimaryIDPlaceOfIssue'])) ? $_POST['PrimaryIDPlaceOfIssue'] : "";
  $primaryid_expirydate = (isset($_POST['PrimaryIDExpiryDate'])) ? $_POST['PrimaryIDExpiryDate'] : "";
  $secondaryid_type = (isset($_POST['SecondaryIDType'])) ? $_POST['SecondaryIDType'] : "";
  $secondaryid_number = (isset($_POST['SecondaryIDNumber'])) ? $_POST['SecondaryIDNumber'] : "";
  $secondaryid_placeofissue = (isset($_POST['SecondaryIDPlaceOfIssue'])) ? $_POST['SecondaryIDPlaceOfIssue'] : "";
  $secondaryid_expirydate = (isset($_POST['SecondaryIDExpiryDate'])) ? $_POST['SecondaryIDExpiryDate'] : "";
  $mother_info = (isset($_POST['MotherInfo'])) ? $_POST['MotherInfo'] : "";
  $reoccur_fee_date = (isset($_POST['reoccur_fee_date'])) ? $_POST['reoccur_fee_date'] : "";
  $setup_fee_date = (isset($_POST['setup_fee_date'])) ? $_POST['setup_fee_date'] : "";
  $bank_name = (isset($_POST['bank_name'])) ? $_POST['bank_name'] : "";
  $branch_address = (isset($_POST['branch_address'])) ? $_POST['branch_address'] : "";
  /*$branch_city = (isset($_POST['branch_city'])) ? $_POST['branch_city'] : "";
  $branch_province = (isset($_POST['branch_province'])) ? $_POST['branch_province'] : "";
  $branch_postalcode = (isset($_POST['branch_postalcode'])) ? $_POST['branch_postalcode'] : ""; */
  $institution_number = (isset($_POST['institution_number'])) ? $_POST['institution_number'] : "";
  $account_number = (isset($_POST['account_number'])) ? $_POST['account_number'] : "";
  $transit_number = (isset($_POST['transit_number'])) ? $_POST['transit_number'] : "";
  $product_id = (isset($_POST['product_id'])) ? $_POST['product_id'] : "";
  $product_name = (isset($_POST['product_name'])) ? $_POST['product_name'] : "";
  $CAT_include = (isset($_POST['CAT_include'])) ? $_POST['CAT_include'] : "";
  $setup_fee = (isset($_POST['setup_fee'])) ? $_POST['setup_fee'] : "";
  $reoccur_fee = (isset($_POST['reoccur_fee'])) ? $_POST['reoccur_fee'] : "";
  $promo_box =  (isset($_POST['promo_box'])) ? $_POST['promo_box'] : "";
  $promo_code = (isset($_POST['promo_code'])) ? $_POST['promo_code'] : "";
  $promo_value = (isset($_POST['promo_value'])) ? $_POST['promo_value'] : "";
  $final_setup_fee = (isset($_POST['final_setup_fee'])) ? $_POST['final_setup_fee'] : "";
  $final_payment_type = (isset($_POST['final_payment_type'])) ? $_POST['final_payment_type'] : "";
  $terms =(isset($_POST['terms'])) ? $_POST['terms'] : "";
  $contract_terms = (isset($_POST['contract_terms'])) ? $_POST['contract_terms'] : "";
  $totalAmount = (isset($_POST['totalAmount'])) ? $_POST['totalAmount'] : "";
  $amount = (isset($_POST['amount'])) ? $_POST['amount'] : "";
  $pass = (isset($_POST['pass'])) ? $_POST['pass'] : "";
  $source =  (isset($_POST['source'])) ? $_POST['source'] : "";
  $form_token =  (isset($_POST['form_token'])) ? $_POST['form_token'] : "";
  $browser_type = (isset($_POST['browser_type'])) ? $_POST['browser_type'] : "";
  $browser_version =  (isset($_POST['browser_version'])) ? $_POST['browser_version'] : "";
  $platform = (isset($_POST['platform'])) ? $_POST['platform'] : "";
  $id_checkbox = (isset($_POST['pep'])) ? $_POST['pep'] : "";
  $confirmation_emt = (isset($_POST['confirmation_emt'])) ? $_POST['confirmation_emt'] : "";
  $finance_terms = (isset($_POST['finance_terms'])) ? $_POST['finance_terms'] : "";
  $systemip = (isset($_POST['systemIP'])) ? $_POST['systemIP'] : "";
  $agreement_path = $_POST["agreement_path"];
  $contract_path="path not found";
  $client_street_address="";
  $mattress_size = (isset($_POST['mattress_size'])) ? $_POST['mattress_size'] : "";
  $mattress_cost = (isset($_POST['mattress_cost'])) ? $_POST['mattress_cost'] : "";
  

  $client_street_address=$street_address;
  if(!empty($unt)){ $client_street_address.=" - ".$unt." "; }
  if(!empty($laneTwo)){ $client_street_address.=$laneTwo." "; }


  if(!empty($reoccur_fee_date)){
    $reoccur_fee_date=date('Y-m-d',strtotime($reoccur_fee_date));
  }
  if(!empty($setup_fee_date)){
    $setup_fee_date=date('Y-m-d',strtotime($setup_fee_date));
  }

  echo $contract_path=$rootpath."/view/includes/docs/pdf/".$last_name."_".$first_name."_". date("F_j_Y_g_i_a");
  /*$contract_path=$rootpath."/view/includes/docs/pdf/".$last_name."_".$first_name."_". date("F_j_Y_g_i_a");
  $contracts_arrayurl = explode("|",$agreement_path);
  $agreement_path1="http://checkout.creditcanada.net".$contracts_arrayurl[0];
  $agreement_path2="http://checkout.creditcanada.net".$contracts_arrayurl[1];


  if(mkdir($contract_path)) { // Make directory in deal portal back end

    $PDF_CONTENTS = file_get_contents($agreement_path1); //cc agreement
    file_put_contents($contract_path."/".$last_name."_".$first_name."_cc.pdf", $PDF_CONTENTS);
    $PDF_CONTENTS = file_get_contents($agreement_path2); //cc agreement
    file_put_contents($contract_path."/".$last_name."_".$first_name."_finance.pdf", $PDF_CONTENTS);
    $index_file_content = "<?php header('Location: " . PAGE_NOT_FOUND_404 . "')?>";

    file_put_contents($contract_path. "/index.php", $index_file_content);

    $html=$agreement_path1."<br />";
    $html.=$contract_path."/".$last_name."_".$first_name."_cc.pdf"."<br /><br />";



  }*/



  try{

    if(!empty($first_name) && !empty($last_name) && !empty($email) ){

       $Query="CALL addClientDetails('".mysqli_real_escape_string($conn,$first_name)."', '".mysqli_real_escape_string($conn,$middle_name)."', '".mysqli_real_escape_string($conn,$last_name)."',
      '".mysqli_real_escape_string($conn,$email)."', '$phone', '$mobile', '$dob', '$gender', '$citizen', '$agent', '".mysqli_real_escape_string($conn,$client_street_address)."',
      '$postal_code', '".mysqli_real_escape_string($conn,$city)."', '$province', '$time_at_address' , '$occupation', '$income', '$emp_time', '".mysqli_real_escape_string($conn,$emp_name)."',
      '".mysqli_real_escape_string($conn,$emp_address)."', '".mysqli_real_escape_string($conn,$emp_city)."', '$emp_province', '$emp_postal', '$emp_phone', '$num_creditcards',
      '$total_cards_balances', '$total_cards_payments','$rent_own', '$rent_mortgage_payment', '$car_loan_amount', '$total_car_payments', '$number_of_bankruptcy', '$bankruptcy_date',
      '$bankruptcy_discharge_date', '$total_bankruptcy_payment', '$consumer_discharge_date', '$total_consumer_payments', '$sin', '$primaryid_type', '$primaryid_number', '$primaryid_placeofissue',
      '$primaryid_expirydate', '$secondaryid_type', '$secondaryid_number', '$secondaryid_placeofissue', '$secondaryid_expirydate', '".mysqli_real_escape_string($conn,$mother_info)."',
      '$reoccur_fee_date', '$setup_fee_date', '".mysqli_real_escape_string($conn,$bank_name)."', '".mysqli_real_escape_string($conn,$branch_address)."', '$institution_number', '$account_number',
      '$transit_number', '$product_id', '$product_name', '$CAT_include', '$setup_fee', '$reoccur_fee', '$promo_box', '$promo_code', '$promo_value', '$final_setup_fee', '$final_payment_type',
      '$terms', '$contract_terms', '$totalAmount', '$amount', '$pass', '$source', '$form_token', '$browser_type', '$browser_version', '$platform','$finance_terms','$confirmation_emt',
      '$id_checkbox','$systemip','".mysqli_real_escape_string($conn,$agreement_path)."','".mysqli_real_escape_string($conn,$contract_path)."',
	  '$mattress_size',
	  '$mattress_cost'
	  )" ;


      $Result=mysqli_query($conn,$Query);

      if($Result === false){
        throw new Exception;
      }


    }

  }catch(Exception $e){

      $mail = new PHPMailer;
      $mail->isSMTP();                                      // Set mailer to use SMTP
      $mail->Host = 'smtp.1and1.com';  // Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                               // Enable SMTP authentication
      $mail->Username = 'outgoing@canadacreditcard.ca';    // SMTP username
      $mail->Password = 'AR6e8Gw3MntP';                           // SMTP password
      $mail->SMTPSecure = 'TLS';                            // Enable TLS encryption, `ssl` also accepted
      $mail->Port = 25;                                    // TCP port to connect to
      $mail->From = 'info@canadacreditcard.ca';
      $mail->FromName = 'Deal Portal Query Error';

      $mail->addAddress('nirmala-a@creditcanada.net');
      $mail->isHTML(true);
      // Set email format to HTML
      $mailsubjectBody = "Insert Query Error: Deal Portal Application ";
      $mail->Subject = $mailsubjectBody;


      $html='<table border=0 width=950 >
      <tr> <td colspan=2> <strong>Client Information</strong> </td> </tr>
      <tr> <td colspan=2 > <strong >Error while inserting data into deal portal </strong> </td> </tr>
      <tr> <td colspan=2 > <strong >Please Create the PDF File and update the path in table "financial_info"</strong> </td> </tr>';
      foreach($_POST as $key => $value){
        $html.='<tr>
        <td>'.$key.'</td>
        <td>'.$value.'</td>
        </tr>';
      }
      $html.='<tr> <th colspan=2> &nbsp; </th> </tr>
      <tr> <th colspan=2> &nbsp; </th> </tr>
      </table>';
      $html.="<hr />";
      $html.='<p>
      <h4 style="color:red;">Add Deal Procedure Call:</h4><br />
      '.$Query.'
      </p>';

      $mail->msgHTML($html);
      $mail->send();

  }


}

/*$first_name = sanitize("nirmala's");
$middle_name = "prem";
$last_name = "kumar";
$email = "test@gmail.com";
$phone = "2263400941";
$mobile = "2263400941";
$dob = "1962-09-02" ;
$gender = "F";
$citizen = "Canadian Citizen";
$agent = "joe-c";
$street_address = "1587 Albert Rd";
$lane = "";
$postal_code = "N8Y 3R3";
$city = "";
$province = "ON";
$occupation = "368";
$income = "944";
$emp_time = "Does Not Apply";
$emp_name = "governemtn";
$emp_address = "xxxxx";
$emp_city = "windsor";
$emp_province = "ON";
$emp_postal = "r4rf5t5";
$emp_phone = "";
$num_creditcards = "None";
$total_cards_balances = "";
$total_cards_payments = "";
$rent_own = "Own";
$rent_mortgage_payment = "342.78";
$car_loan_amount = "";
$total_car_payments = "321.99";
$number_of_bankruptcy = "";
$bankruptcy_date = "2016-11-6";
$bankruptcy_discharge_date = "";
$total_bankruptcy_payment = "345.23";
$consumer_discharge_date = "2017-05-12";
$total_consumer_payments = "";
$sin = "53656565";
$primaryid_type = "Health Card";
$primaryid_number = "546546565";
$primaryid_placeofissue = "ON";
$primaryid_expirydate = "2023-12-12";
$secondaryid_type = "Passport";
$secondaryid_number = "456546456FGH";
$secondaryid_placeofissue = "ON";
$secondaryid_expirydate = "2030-12-5";
$mother_info = "test";
$reoccur_fee_date = "Friday March 10th 2017";
$setup_fee_date = "Sunday March 19th 2017";
$bank_name = "010";
$branch_address = "Tecumseh and Lincoln,1600 Tecumseh Road E.";
$branch_city = "Windsor";
$branch_province = "ON";
$branch_postalcode = "N8W 1C5";
$institution_number = "235434";
$account_number = "456756756756";
$transit_number = "34543";
$product_id = "2";
$product_name = "2 in 1 Credit Transformer";
$CAT_include = "No";
$setup_fee = "199.00";
$reoccur_fee = "69.00";
$promo_box = "testpromo";
$promo_code = "fdg456";
$promo_value = "dfgh5654";
$final_setup_fee = "199.00";
$final_payment_type = "Standard Payment";
$terms = "checked";
$contract_terms = "on";
$totalAmount = "15";
$amount = "15.00";
$pass = "CANADACREDIT";
$source = "CANADACREDIT";
$form_token = "58bc4e2481ff0";
$browser_type = "Chrome";
$browser_version = "56.0.2924.87";
$platform = "Windows"; */



/* $Query="CALL addClientDetails('".mysqli_real_escape_string($conn,$first_name)."', '".mysqli_real_escape_string($conn,$middle_name)."', '".mysqli_real_escape_string($conn,$last_name)."',
'".mysqli_real_escape_string($conn,$email)."', '".mysqli_real_escape_string($conn,$phone)."', '".mysqli_real_escape_string($conn,$mobile)."', '".mysqli_real_escape_string($conn,$dob)."',
'".mysqli_real_escape_string($conn,$gender)."', '".mysqli_real_escape_string($conn,$citizen)."', '".mysqli_real_escape_string($conn,$agent)."', '".mysqli_real_escape_string($conn,$street_address)."',
'".mysqli_real_escape_string($conn,$lane)."', '".mysqli_real_escape_string($conn,$postal_code)."', '".mysqli_real_escape_string($conn,$city)."', '".mysqli_real_escape_string($conn,$province)."',
'".mysqli_real_escape_string($conn,$occupation)."', '".mysqli_real_escape_string($conn,$income)."', '".mysqli_real_escape_string($conn,$emp_time)."', '".mysqli_real_escape_string($conn,$emp_name)."',
'".mysqli_real_escape_string($conn,$emp_address)."', '".mysqli_real_escape_string($conn,$emp_city)."', '".mysqli_real_escape_string($conn,$emp_province)."', '".mysqli_real_escape_string($conn,$emp_postal)."',
'".mysqli_real_escape_string($conn,$emp_phone)."', '".mysqli_real_escape_string($conn,$num_creditcards)."', '".mysqli_real_escape_string($conn,$total_cards_balances)."', '".mysqli_real_escape_string($conn,$total_cards_payments)."',
'".mysqli_real_escape_string($conn,$rent_own)."', '".mysqli_real_escape_string($conn,$rent_mortgage_payment)."', '".mysqli_real_escape_string($conn,$car_loan_amount)."', '".mysqli_real_escape_string($conn,$total_car_payments)."',
'".mysqli_real_escape_string($conn,$number_of_bankruptcy)."', '".mysqli_real_escape_string($conn,$bankruptcy_date)."', '".mysqli_real_escape_string($conn,$bankruptcy_discharge_date)."', '".mysqli_real_escape_string($conn,$total_bankruptcy_payment)."',
'".mysqli_real_escape_string($conn,$consumer_discharge_date)."', '".mysqli_real_escape_string($conn,$total_consumer_payments)."', '".mysqli_real_escape_string($conn,$sin)."', '".mysqli_real_escape_string($conn,$primaryid_type)."',
'".mysqli_real_escape_string($conn,$primaryid_number)."', '".mysqli_real_escape_string($conn,$primaryid_placeofissue)."', '".mysqli_real_escape_string($conn,$primaryid_expirydate)."', '".mysqli_real_escape_string($conn,$secondaryid_type)."',
'".mysqli_real_escape_string($conn,$secondaryid_number)."', '".mysqli_real_escape_string($conn,$secondaryid_placeofissue)."', '".mysqli_real_escape_string($conn,$secondaryid_expirydate)."', '".mysqli_real_escape_string($conn,$mother_info)."',
'".mysqli_real_escape_string($conn,$reoccur_fee_date)."', '".mysqli_real_escape_string($conn,$setup_fee_date)."', '".mysqli_real_escape_string($conn,$bank_name)."', '".mysqli_real_escape_string($conn,$branch_address)."', '".mysqli_real_escape_string($conn,$branch_city)."',
'".mysqli_real_escape_string($conn,$branch_province)."', '".mysqli_real_escape_string($conn,$branch_postalcode)."', '".mysqli_real_escape_string($conn,$institution_number)."', '".mysqli_real_escape_string($conn,$account_number)."',
'".mysqli_real_escape_string($conn,$transit_number)."', '".mysqli_real_escape_string($conn,$product_id)."', '".mysqli_real_escape_string($conn,$product_name)."', '".mysqli_real_escape_string($conn,$CAT_include)."',
'".mysqli_real_escape_string($conn,$setup_fee)."', '".mysqli_real_escape_string($conn,$reoccur_fee)."', '".mysqli_real_escape_string($conn,$promo_box)."',  '".mysqli_real_escape_string($conn,$promo_code)."',
'".mysqli_real_escape_string($conn,$promo_value)."', '".mysqli_real_escape_string($conn,$final_setup_fee)."', '".mysqli_real_escape_string($conn,$final_payment_type)."', '".mysqli_real_escape_string($conn,$terms)."',
'".mysqli_real_escape_string($conn,$contract_terms)."', '".mysqli_real_escape_string($conn,$totalAmount)."', '".mysqli_real_escape_string($conn,$amount)."', '".mysqli_real_escape_string($conn,$pass)."', '".mysqli_real_escape_string($conn,$source)."',
'".mysqli_real_escape_string($conn,$form_token)."', '".mysqli_real_escape_string($conn,$browser_type)."', '".mysqli_real_escape_string($conn,$browser_version)."',
'".mysqli_real_escape_string($conn,$platform)."')" ;*/

?>
