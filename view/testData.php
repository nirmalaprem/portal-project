
<?php

exit;


date_default_timezone_set("America/Edmonton");
$rootpath=$_SERVER["DOCUMENT_ROOT"]."/dealportal";
include($rootpath."/model/config.php");

//magoon_kathy_May_31_2017_2_13_pm
$agreement_path="/view/includes/docs/pdfs/Barnes_Fitzroy/Barnes_Fitzroy_CC_Agreement_June_1_2017_12_45_pm.pdf|/view/includes/docs/pdfs/Barnes_Fitzroy/Barnes_Fitzroy_CC_Agreement_Finance_June_1_2017_12_45_pm.pdf";
$first_name="kathy";
$last_name="magoon";
echo $contract_path=$rootpath."/view/includes/docs/pdf/Barnes_Fitzroy_June_1_2017_1_14_pm";
$contracts_arrayurl = explode("|",$agreement_path);
$agreement_path1="http://checkout.creditcanada.net".$contracts_arrayurl[0];
$agreement_path2="http://checkout.creditcanada.net".$contracts_arrayurl[1];


//if(mkdir($contract_path)) { // Make directory in deal portal back end

  $PDF_CONTENTS = file_get_contents($agreement_path1); //cc agreement
  file_put_contents($contract_path."/Barnes_Fitzroy_cc.pdf", $PDF_CONTENTS);

  $PDF_CONTENTS = file_get_contents($agreement_path2); //cc agreement
  file_put_contents($contract_path."/Barnes_Fitzroy_finance.pdf", $PDF_CONTENTS);
  $index_file_content = "<?php header('Location: " . PAGE_NOT_FOUND_404 . "')?>";

  file_put_contents($contract_path. "/index.php", $index_file_content);
  //copy($agreement_path1,$contract_path."/".$last_name."_".$first_name."_cc.pdf");

//}

exit;

/*try{
  $contract_path=$rootpath."/view/includes/docs/pdf/".$last_name."_".$first_name."_". date("F_j_Y_g_i_a");

  $agreement_path="/view/includes/docs/pdfs/Charbonneau_Tanya/Charbonneau_Tanya_CC_Agreement_May_15_2017_1_34_pm.pdf|/view/includes/docs/pdfs/Charbonneau_Tanya/Charbonneau_Tanya_CC_Agreement_Finance_May_15_2017_1_34_pm.pdf";
   $contracts_arrayurl = explode("|", $agreement_path);
echo "https://checkout.creditcanada.net/".$contracts_arrayurl[0];
if (mkdir( $contract_path)) { // MAke directory in deal portal back end

$agreement_path1="https://checkout.creditcanada.net".$contracts_arrayurl[0];
$agreement_path2="https://checkout.creditcanada.net".$contracts_arrayurl[1];

  $PDF_CONTENTS = file_get_contents($agreement_path1); //cc agreement
  file_put_contents($contract_path."/".$last_name."_".$first_name."_cc.pdf", $PDF_CONTENTS);
  $PDF_CONTENTS = file_get_contents($agreement_path2); //cc agreement
  file_put_contents($contract_path."/".$last_name."_".$first_name."_finance.pdf", $PDF_CONTENTS);
  $index_file_content = "<?php header('Location: " . PAGE_NOT_FOUND_404 . "')?>";

  file_put_contents($contract_path. "/index.php", $index_file_content);
  // error_log( "Contract Exception Error: ".$e->getMessage());

}
}
catch(Exception $e){

  error_log( "Contract Exception Error: ".$e->getMessage());
  echo  "Contract Exception Error: ".$e->getMessage();

} */
//file_put_contents($rootpath."/view/includes/docs/pdf/Ahmed_Ahmed_CC_Agreement_May_9_2017_2_37_pm.pdf", file_get_contents($url1));

//file_put_contents($rootpath."/view/includes/docs/pdf/test.txt", "Hello Nirmala!!!!");

//file_put_contents('/var/www/html/sample.txt','Some random Text');


/*$all_data=array("first_name" => "Dawn",
"middle_name" => "L",
"last_name" => "Ward",
"email" => "lynnette19_81@outlook.com",
"phone" => "5193290877",
"mobile" => "5193290877",
"dob" => "1981-02-26" ,
"gender" => "F",
"citizen" => "Canadian Citizen",
"agent" => "pat-e",
"street_address" => "1200 Mersea Road 2",
"lane" => "",
"postal_code" => "N8H 3V7",
"city" => "Leamington",
"province" => "ON",
"occupation" => "368",
"income" => "944",
"emp_time" => "Does Not Apply",
"emp_name" => "governemtn",
"emp_address" => "xxxxx",
"emp_city" => "windsor",
"emp_province" => "ON",
"emp_postal" => "r4rf5t5",
"emp_phone" => "",
"num_creditcards" => "None",
"total_cards_balances" => "",
"total_cards_payments" => "",
"rent_own" => "Own",
"rent_mortgage_payment" => "342.78",
"car_loan_amount" => "",
"total_car_payments" => "321.99",
"number_of_bankruptcy" => "",
"bankruptcy_date" => "2016-11-6",
"bankruptcy_discharge_date" => "",
"total_bankruptcy_payment" => "345.23",
"consumer_discharge_date" => "2017-05-12",
"total_consumer_payments" => "",
"sin" => "53656565",
"primaryid_type" => "Health Card",
"primaryid_number" => "546546565",
"primaryid_placeofissue" => "ON",
"primaryid_expirydate" => "2023-12-12",
"secondaryid_type" => "Passport",
"secondaryid_number" => "456546456FGH",
"secondaryid_placeofissue" => "ON",
"secondaryid_expirydate" => "2030-12-5",
"mother_info" => "test",
"reoccur_fee_date" => "Friday March 10th 2017",
"setup_fee_date" => "Sunday March 19th 2017",
"bank_name" => "010",
"branch_address" => "Tecumseh and Lincoln,1600 Tecumseh Road E.",
"branch_city" => "Windsor",
"branch_province" => "ON",
"branch_postalcode" => "N8W 1C5",
"institution_number" => "235434",
"account_number" => "56756756",
"transit_number" => "34543",
"product_id" => "2",
"product_name" => "2 in 1 Credit Transformer",
"CAT_include" => "No",
"setup_fee" => "199.67",
"reoccur_fee" => "79.00",
"promo_box" => "testpromo",
"promo_code" => "fdg456",
"promo_value" => "dfgh5654",
"final_setup_fee" => "199.34",
"final_payment_type" => "Standard Payment",
"terms" => "checked",
"contract_terms" => "on",
"totalAmount" => "15",
"amount" => "15.00",
"pass" => "CANADACREDIT",
"source" => "CANADACREDIT",
"form_token" => "5918b950dd4f9",
"browser_type" => "Chrome",
"browser_version" => "56.0.2924.87",
"platform" => "Windows",
"pep" => "",
"confirmation_emt" => "",
"finance_terms" => "",
"agreement_path" => "https://checkout.creditcanada.net/view/includes/docs/pdfs/Michaud_Gabriel/Michaud_Gabriel_CC_Agreement_May_14_2017_12_21_pm.pdf|
https://checkout.creditcanada.net/view/includes/docs/pdfs/Michaud_Gabriel/Michaud_Gabriel_CC_Agreement_Finance_May_14_2017_12_21_pm.pdf");

$url = 'http://184.68.121.126/dealportal/controller/functions/getClientData.php';

	$options = array(
		'http' => array(
			'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
			'method'  => 'POST',
			'content' => http_build_query($all_data),
		),
	);

	$context  = stream_context_create($options);
	echo $result = file_get_contents($url, false, $context);


*/



?>
