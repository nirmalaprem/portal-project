<?php
$rootpath=$_SERVER["DOCUMENT_ROOT"]."/dealportal";
include($rootpath.'/controller/lib/html2pdf/html2pdf.class.php');


function generate_agreement($clientArr){

    //print_r($clientArr);
    //$clientArr=$clientArr1[0];

    //echo $clientArr[0]['first_name'];
    $rootpath=$_SERVER["DOCUMENT_ROOT"]."/dealportal";
    $first_name=$clientArr['first_name'];
    $middle_name=$clientArr['middle_name'];
    $last_name=$clientArr['last_name'];
    $address=$clientArr['street_address'];
    $phone=$clientArr['phone'];
    $email=$clientArr['email'];
    $city=$clientArr['city'];
    $province=$clientArr['province'];
    $postal=$clientArr['postal_code'];

    $setup_fee=$clientArr['setup_fee'];
    $reoccur_fee=$clientArr['reoccur_fee'];
    $reoccur_fee_date=$clientArr['reoccur_fee_date'];
    $setup_fee_date=$clientArr['setup_fee_date'];
    $confirmation_emt=$clientArr['emt_payment'];
    $product_id=$clientArr['product_id'];

    $current_date = date('l F jS Y');
    $reoccurFeeDate=date('l F jS Y', strtotime($reoccur_fee_date));
    $setup_fee_date=date('l F jS Y', strtotime($setup_fee_date));
    $payment_type ="";
    $offer="";
    $service="";
    $payment_text_for_finance_agreement="";
    //calls function to calculate loan value
    $calc_values = loanValues($reoccur_fee, $setup_fee);
    $principal = $calc_values['principal'] + $setup_fee;
    $cost_of_borrow = $calc_values['cost_of_borrow'];
    $total_payment = $calc_values['total_payment'];
    $membership_total = $calc_values['membership_total'];

    if(strpos($setup_fee, '.') !== false) {
        $setup_fee=$setup_fee;
      }else{
        $setup_fee=$setup_fee.".00";
      }

      if(strpos($reoccur_fee, '.') !== false) {
          $reoccur_fee=$reoccur_fee;
        }else{
          $reoccur_fee=$reoccur_fee.".00";
        }


    if(strtolower($payment_type) == 'express'){            //express payment.
        if($confirmation_emt == 'on') {
            $payment_type = "Express Payment (99). With EMT.";
        }else $payment_type = "Express Payment (99).";

        $payment_text_for_finance_agreement = "<li>Initial payment $99 due immediately. And the balance of $" . ($setup_fee - 99) ." due on " . $setup_fee_date."</li>";
    }
    else{                                     //standard payment
        if($confirmation_emt == 'on') {
            $payment_type = "Standard Payment. With EMT.";
            $payment_text_for_finance_agreement = "<li>Payment of $" . $setup_fee . " due immediately.</li>";
        }else {
            $payment_type = "Standard Payment.";
            $payment_text_for_finance_agreement = "<li>Payment of $" . $setup_fee . " due on " . $setup_fee_date . ".</li>";
        }
    }



    if($product_id==2){
    $offer="
        <p>What's included in your 2 in 1 Credit Transformer&trade; Membership?</p>
        <ul>
            <li>Use of Tablet Computer or Portable Computer during the term of the Agreement</li>
            <li>Access to the Android or Windows Application on the Tablet Computer or Portable Computer </li>
            <li>Access to the Debt Services Android or Windows Application Module provided by CreditAdvise&trade;</li>
            <li>Access to the Credit Services Android or Windows Application Module provided by CreditAdvise&trade;</li>
            <li>Credit Score Analysis</li>
            <li>Optimization Analysis</li>
            <li>IdentityLock&trade; Theft Protection</li>
            <li>Credit Score Booster Program</li>
            <li>Monthly Credit Score Analytics</li>
            <li>Individual Personalized Credit Services</li>
            <li>Post Bankruptcy Credit Services</li>
            <li>Financing and Mortgage Referral Service</li>
            <li>Live One-on-One Premium  Support and Customer Service (Real Credit Experts to answer your questions) </li>
            <li>CAT Platinum Visa Card&trade; with up to $100.00 Pre-loaded to Card</li>
        </ul>";
        $service="
        <p>Provider agrees to provide the Member with the use of a tablet computer or portable computer which acts as the portal and mechanism to enable the Canada Credit Improvement System, the Benefits and the Android or Windows Applications. <strong>Ownership of and title to the tablet or portable computer is retained by the Provider until the end of the term of the Agreement, at which time ownership of the tablet or portable computer will be transferred to and pass to the Member. The Member agrees to return the tablet or portable computer to the Provider if they cancel the Agreement. Use of the tablet or portable computer may be suspended or terminated by Provider in their sole discretion in the event that Member defaults on their financing obligations with the Third Party Lender</strong>.</p>
        <p>Please allow five to six (5-6) weeks for the tablet or portable computer to be shipped to you. Your tablet or portable computer comes with a manufacturer's warranty. Provider does not provide a warranty for the tablet or portable computer and are not liable for the warranty, performance or any repair or shipping costs associated with the tablet or portable computer. Customers must deal directly with the manufacturer for warranty issues for the tablet or portable computer.</p>
        <p>Credit Score improvement is a process that may take several months or years to achieve the best results. Our knowledge may offer you an edge and help you increase your score faster; however we can NOT guarantee specific results or timelines. It is also the Member's responsibility to carefully follow our program and insure all bills, collections, debts, accounts and balances are paid on time and kept within the prescribed limits. Our programs require the participation and diligence of the Member. There is a very strict no-refund policy in effect and we will not reply to any such requests. Canada Credit will NOT refund any Membership Fees either in whole or part. The Member agrees with this and all other terms of this Agreement and policy.</p>
        ";
    }elseif($product_id==1){
        $offer="
            <p>What's included in your CreditAdvise&trade; Premium Membership?</p>
            <ul>
                <li>Access to the Android or Windows Application For All Your Devices</li>
                <li>Access to the Debt Services Android or Windows Application Module provided by CreditAdvise&trade;</li>
                <li>Access to the Credit Services Android or Windows Application Module provided by CreditAdvise&trade;</li>
                <li>Credit Score Analysis</li>
                <li>Optimization Analysis</li>
                <li>IdentityLock&trade; Theft Protection</li>
                <li>Credit Score Booster Program</li>
                <li>Monthly Credit Score Analytics</li>
                <li>Individual Personalized Credit Services</li>
                <li>Post Bankruptcy Credit Services</li>
                <li>Financing and Mortgage Referral Service</li>
                <li>Live One-on-One Premium  Support and Customer Service (Real Credit Experts to answer your questions) </li>
                <li>CAT Platinum Visa Card&trade;</li>
              </ul>";
          $service="
          <p>Provider agrees to provide the Member with the use of a tablet computer or portable computer which acts as the portal and mechanism to enable the Canada Credit Improvement System, the Benefits and the Android or Windows Applications. <strong>Ownership of and title to the tablet or portable computer is retained by the Provider until the end of the term of the Agreement, at which time ownership of the tablet or portable computer will be transferred to and pass to the Member. The Member agrees to return the tablet or portable computer to the Provider if they cancel the Agreement. Use of the tablet or portable computer may be suspended or terminated by Provider in their sole discretion in the event that Member defaults on their financing obligations with the Third Party Lender</strong>.</p>
            <p>Please allow five to six (5-6) weeks for the tablet or portable computer to be shipped to you. Your tablet or portable computer comes with a manufacturer's warranty. Provider does not provide a warranty for the tablet or portable computer and are not liable for the warranty, performance or any repair or shipping costs associated with the tablet or portable computer. Customers must deal directly with the manufacturer for warranty issues for the tablet or portable computer.</p>
            <p>Credit Score improvement is a process that may take several months or years to achieve the best results. Our knowledge may offer you an edge and help you increase your score faster; however we can NOT guarantee specific results or timelines. It is also the Member's responsibility to carefully follow our program and insure all bills, collections, debts, accounts and balances are paid on time and kept within the prescribed limits. Our programs require the participation and diligence of the Member. There is a very strict no-refund policy in effect and we will not reply to any such requests. Canada Credit will NOT refund any Membership Fees either in whole or part. The Member agrees with this and all other terms of this Agreement and policy.</p>
          ";
    }
    else{
        $offer="
            <p>What's included in your Credit Advise&trade; Basic Membership?</p>
            <ul>
                <li>Access to the Android or Windows Application For One of Your Devices</li>
                <li>Access to the Debt Services Android or Windows Application Module provided by CreditAdvise&trade;</li>
                <li>Access to the Credit Services Android or Windows Application Module provided by CreditAdvise&trade;</li>
                <li>Credit Score Analysis</li>
                <li>Optimization Analysis</li>
                <li>IdentityLock&trade; Theft Protection</li>
                <li>Credit Score Booster Program</li>
                <li>Monthly Credit Score Analytics</li>
                <li>Individual Personalized Credit Services</li>
                <li>Post Bankruptcy Credit Services</li>
                <li>Financing and Mortgage Referral Service</li>
                <li>Live  Customer Service (Real Credit Experts to answer your questions) </li>
                <li>CAT Platinum Visa Card&trade;</li>
            </ul>";
        $service="
      <p>Provider agrees to provide the Member with the use of a tablet computer or portable computer which acts as the portal and mechanism to enable the Canada Credit Improvement System, the Benefits and the Android or Windows Applications. <strong>Ownership of and title to the tablet or portable computer is retained by the Provider until the end of the term of the Agreement, at which time ownership of the tablet or portable computer will be transferred to and pass to the Member. The Member agrees to return the tablet or portable computer to the Provider if they cancel the Agreement. Use of the tablet or portable computer may be suspended or terminated by Provider in their sole discretion in the event that Member defaults on their financing obligations with the Third Party Lender</strong>.</p>
        <p>Please allow five to six (5-6) weeks for the tablet or portable computer to be shipped to you. Your tablet or portable computer comes with a manufacturer's warranty. Provider does not provide a warranty for the tablet or portable computer and are not liable for the warranty, performance or any repair or shipping costs associated with the tablet or portable computer. Customers must deal directly with the manufacturer for warranty issues for the tablet or portable computer.</p>
        <p>Credit Score improvement is a process that may take several months or years to achieve the best results. Our knowledge may offer you an edge and help you increase your score faster; however we can NOT guarantee specific results or timelines. It is also the Member's responsibility to carefully follow our program and insure all bills, collections, debts, accounts and balances are paid on time and kept within the prescribed limits. Our programs require the participation and diligence of the Member. There is a very strict no-refund policy in effect and we will not reply to any such requests. Canada Credit will NOT refund any Membership Fees either in whole or part. The Member agrees with this and all other terms of this Agreement and policy.</p>
      ";
    }


    //$first_name="Test";
    //$last_name="Teee";
    $full_name=$first_name." ".$middle_name." ".$last_name;
    //create directory
    $structure = $last_name."_".$first_name."_". date("F_j_Y_g_i_a");
    $savePath = $rootpath."/view/includes/docs/pdf/".$structure."/";
    if (!file_exists($savePath)) {
        mkdir($savePath, 0777, true);
    }

    // Signature Image
    $sign=$rootpath."/view/includes/docs/noimage.png";
    $imagepath="http://checkout.creditcanada.net/view/includes/docs/pdfs/".$last_name."_".$first_name."/".$last_name."_".$first_name."_signature.png";
    if(file_exists($imagepath)){
      $sign=$imagepath;
    }



    $placeholders = array(
        '[NAME]',
        '[ADDRESS]',
        '[PHONE]',
        '[EMAIL]',
        '[CITY]',
        '[PROVINCE]',
        '[CODE]',
        '[DATE]',
        '[SIGN]',
        '[PRINCIPAL]',
        '[COSTOFBORROW]',
        '[TOTALPAYEMENT]',
        '[MEMBERSHIPTOTAL]',
        '[SETUPFEE]',
        '[REOCCURFEE]',
        '[REOCCURFEEDATE]',
        '[PAYMENTTEXT]',
        '[OFFER]',
        '[SERVICE]'
    );

    $real_values = array(
        $full_name,
        $address,
        $phone,
        $email,
        $city,
        $province,
        $postal,
        $current_date,
        $sign,
        $principal,
        $cost_of_borrow,
        $total_payment,
        $membership_total,
        $setup_fee,
        $reoccur_fee,
        $reoccurFeeDate,
        $payment_text_for_finance_agreement,
        $offer,
        $service
    );

    $filename1 = $last_name.'_'.$first_name.'_cc.pdf';
    $filename2 =  $last_name.'_'.$first_name.'_finance.pdf';

    //Get the files and replace placeholders with real values in agreement file
    $contract1 = file_get_contents('http://checkout.creditcanada.net/view/includes/docs/membership_agreement.html');
    $contract1 = str_replace($placeholders, $real_values, $contract1);
    $contract2 = file_get_contents('http://checkout.creditcanada.net/view/includes/docs/finance_agreement.html');
    $contract2 = str_replace($placeholders, $real_values, $contract2);

    //convert to PDF
    $html2pdf = new HTML2PDF('P', 'A4', 'en');
    $html2pdf->writeHTML($contract1);
    $html2pdf->Output($savePath . $filename1, 'F');  //F for save

    $html2pdf = new HTML2PDF('P', 'A4', 'en');
    $html2pdf->writeHTML($contract2);
    $html2pdf->Output($savePath . $filename2, 'F');  //F for save


    return $savePath."|".$filename1."|".$filename2;

}

define('RATE',  .2999); // loanrate /
define('TERM',  35); // loanTERM /
define('FREQ',  26); // loanFREQ /
function PV($R,$n,$pmt,$m=1) {
    $Z = 1 / (1 + ($R/$m));
    return ($pmt * $Z * (1 - pow($Z,$n)))/(1 - $Z);
}
function loanValues($csPayment, $setupfee)
{
    $principle = PV(RATE,TERM,$csPayment,FREQ);
    $membershiptotal = $principle + $setupfee;//principal amount of loan
    $totalpayment = ($csPayment*TERM)+ $setupfee;//totalpayment amount duo by you
    $costofBorrow = $totalpayment - $membershiptotal;
    return array('principal'=>sprintf('%0.2f', $principle),
        'membership_total'=>sprintf('%0.2f', $membershiptotal),
        'total_payment'=>sprintf('%0.2f', $totalpayment),
        'cost_of_borrow'=>sprintf('%0.2f', $costofBorrow));
}




//img section for signature
/*$json = $_POST["output"];
$width = $_POST["width"];
$height = $_POST["height"];
$img = sigJsonToImage($json,array('imageSize'=>array($width, $height)));
imagepng($img,$savePath."/".$structure.'_signature.png');
$sign=$savePath.$structure.'_signature.png';*/




?>
