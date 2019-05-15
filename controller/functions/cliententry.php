<?php

exit;
$rootpath=$_SERVER["DOCUMENT_ROOT"]."/dealportal";
include($rootpath."/model/config.php");
include($rootpath."/controller/classes/sanitize.php");
include($rootpath."/controller/lib/PHPMailer/PHPMailerAutoload.php");
date_default_timezone_set("America/Edmonton");


function get_post($input){

  return (isset($input)) ? trim(strip_tags($input)) : "";

}



  $first_name = "Shelley";
  $middle_name = "";
  $last_name = "Watson";
  $email = "shelleymwatson@outlook.com";
  $phone =  "2504157205";
  $mobile =  "2504157205";
  $dob =  "1965-02-12";
  $gender =  "F";
  $citizen =  "Canadian Citizen";
  $agent =  "blake-m";
  $street_address =  "11 Pearce Pl ";
  $laneTwo =   "";
  $unt =  "";
  $postal_code =  "V9B 5V6";
  $city = "Victoria";
  $province = "BC";
  //$po_box = (isset($_POST['po_box'])) ? $_POST['po_box'] : "";
  $time_at_address ="";
  $occupation =   "368";
  $income =  "1400";
  $emp_time =  "Does Not Apply";
  $emp_name = "Disability";
  $emp_address =   "";
  $emp_city = "Montreal";
  $emp_province =  "QC";
  $emp_postal =  "";
  $emp_phone = "2504157205";
  $num_creditcards = "None";
  $total_cards_balances =  "";
  $total_cards_payments = "";
  $rent_own =   "Rent";
  $rent_mortgage_payment ="250";
  $car_loan_amount =  "";
  $total_car_payments =  "";
  $number_of_bankruptcy ="";
  $bankruptcy_date =  "";
  $bankruptcy_discharge_date =  "";
  $total_bankruptcy_payment =  "";
  $consumer_discharge_date = "";
  $total_consumer_payments = "";
  $sin =  "721768901";
  $primaryid_type = "33";
  $primaryid_number =  "100692980";
  $primaryid_placeofissue = "BC";
  $primaryid_expirydate =  "2022-02-12";
  $secondaryid_type =  "8";
  $secondaryid_number =  "721768901";
  $secondaryid_placeofissue = "BC";
  $secondaryid_expirydate =  "2017-08-15";
  $mother_info = "Nablo";
  $reoccur_fee_date = "2017-08-25";
  $setup_fee_date =  "2017-08-28";
  $bank_name =  "000";
  $branch_address =  "1400-888 dunsmuir st Vancouver bc V6C 3K4";
  /*$branch_city = (isset($_POST['branch_city'])) ? $_POST['branch_city'] : "";
  $branch_province = (isset($_POST['branch_province'])) ? $_POST['branch_province'] : "";
  $branch_postalcode = (isset($_POST['branch_postalcode'])) ? $_POST['branch_postalcode'] : ""; */
  $institution_number = "621";
  $account_number =  "132002066620";
  $transit_number =  "16001";
  $product_id = "1";
  $product_name = "Premium CreditAdvise";
  $CAT_include = "Yes";
  $setup_fee =  "199";
  $reoccur_fee = "79";
  $promo_box = "";
  $promo_code =  "";
  $promo_value =  "";
  $final_setup_fee ="199";
  $final_payment_type = "Standard Payment";
  $terms = "checked";
  $contract_terms = "";
  $totalAmount =  "";
  $amount ="";
  $pass = "CANADACREDIT";
  $source = "CANADACREDIT";
  $form_token =  "";
  $browser_type = "Chrome";
  $browser_version =   "60.0.3112.90";
  $platform =  "Windows";
  $id_checkbox = "";
  $confirmation_emt =  "";
  $finance_terms =  "";
  $systemip =  "184.71.213.234";
  $agreement_path ="";
  $contract_path="path not found";
  $client_street_address="";

  $client_street_address=$street_address;
  if(!empty($unt)){ $client_street_address.=" - ".$unt." "; }
  if(!empty($laneTwo)){ $client_street_address.=$laneTwo." "; }


  if(!empty($reoccur_fee_date)){
    $reoccur_fee_date=date('Y-m-d',strtotime($reoccur_fee_date));
  }
  if(!empty($setup_fee_date)){
    $setup_fee_date=date('Y-m-d',strtotime($setup_fee_date));
  }

  echo $contract_path=$rootpath."/view/includes/docs/pdf/Watson_Shelley_August_14_2017_4_15_pm";


echo "<br />";
echo $first_name;
echo "<br />";
echo $last_name;
echo "<br />";
echo $email;

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
      '$id_checkbox','$systemip','".mysqli_real_escape_string($conn,$agreement_path)."','".mysqli_real_escape_string($conn,$contract_path)."')" ;


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

exit;

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
