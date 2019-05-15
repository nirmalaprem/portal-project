<?php


$rootpath=$_SERVER["DOCUMENT_ROOT"]."/dealportal";
include($rootpath."/model/config.php");
include($rootpath."/controller/classes/sanitize.php");
include($rootpath."/controller/lib/PHPMailer/PHPMailerAutoload.php");
date_default_timezone_set("America/Edmonton");



  $first_name = "Fitzroy";
  $middle_name = "";
  $last_name = "Barnes ";
  $email = "markbarnes27@hotmail.com";
  $agreement_path = "/view/includes/docs/pdfs/Barnes_Fitzroy/Barnes_Fitzroy_CC_Agreement_June_1_2017_12_45_pm.pdf|/view/includes/docs/pdfs/Barnes_Fitzroy/Barnes_Fitzroy_CC_Agreement_Finance_June_1_2017_12_45_pm.pdf";
  $contract_path = "";

  if(empty($contract_path)){
    $contract_path=$rootpath."/view/includes/docs/pdf/".$last_name."_".$first_name."_". date("F_j_Y_g_i_a");
  }

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


  }

  echo $Query="select clientid from personal_info where first_name='".mysqli_real_escape_string($conn,$first_name)."' and last_name='".mysqli_real_escape_string($conn,$last_name)."'
  and  email='".mysqli_real_escape_string($conn,$email)."'";
  $Result=mysqli_query($conn,$Query);
  echo "<br />";
  if($Result === false){
    echo "Error";
    echo "<br />";
  }else{

    $row=mysqli_fetch_assoc($Result);
    $clientID=$row['clientid'];
    echo $updateQuery="update financial_info set contract_folderpath='".mysqli_real_escape_string($conn,$contract_path)."' where client_id='$clientID'";
    //mysqli_query($conn,$updateQuery);
      echo "<br />";
  }

    echo "<br />";
    echo "Cntract Path :<br />".$contract_path;

 ?>
