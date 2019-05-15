<?php


$rootpath=$_SERVER["DOCUMENT_ROOT"]."/dealportal";
include($rootpath."/model/config.php");
include($rootpath."/controller/classes/sanitize.php");
include($rootpath."/controller/lib/PHPMailer/PHPMailerAutoload.php");
date_default_timezone_set("America/Edmonton");


function get_post($input){

  return (isset($input)) ? trim($input) : "";

}

// Check the POST Variable Set
if($_POST){

  $first_name = get_post($_POST['first_name']); //(isset($_POST['first_name'])) ? $_POST['first_name'] : "";
  $middle_name = get_post($_POST['middle_name']); //(isset($_POST['middle_name'])) ? $_POST['middle_name'] : "";
  $last_name = get_post($_POST['last_name']); //(isset($_POST['last_name'])) ? $_POST['last_name'] : "";
  $email = get_post($_POST['email']); //(isset($_POST['email'])) ? $_POST['email'] : "";
  $agreement_path = get_post($_POST['agreement_path']); //(isset($_POST['agreement_path'])) ? $_POST['agreement_path'] : "";
  $contract_path = get_post($_POST['dealportalpath']); //(isset($_POST['dealportalpath'])) ? $_POST['dealportalpath'] : "";
  $selected_mattress = get_post($_POST['selected_mattress']);

  if(empty($contract_path)){
    $contract_path=$rootpath."/view/includes/docs/pdf/".$last_name."_".$first_name."_". date("F_j_Y_g_i_a");
  }

  $contracts_arrayurl = explode("|",$agreement_path);
  $agreement_path1="http://creditscores.ca/checkout".$contracts_arrayurl[0];
  $agreement_path2="http://creditscores.ca/checkout".$contracts_arrayurl[1];

  if(mkdir($contract_path)) { // Make directory in deal portal back end
    $PDF_CONTENTS = file_get_contents($agreement_path1); //cc agreement
    file_put_contents($contract_path."/".$last_name."_".$first_name."_cc.pdf", $PDF_CONTENTS);
    $PDF_CONTENTS = file_get_contents($agreement_path2); //cc agreement
    file_put_contents($contract_path."/".$last_name."_".$first_name."_finance.pdf", $PDF_CONTENTS);
    $index_file_content = "<?php header('Location: " . PAGE_NOT_FOUND_404 . "')?>";
    file_put_contents($contract_path. "/index.php", $index_file_content);
  }


}


 ?>
