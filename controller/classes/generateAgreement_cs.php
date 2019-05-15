<?php

$rootpath = $_SERVER["DOCUMENT_ROOT"] . "/dealportal";
include($rootpath . '/controller/lib/html2pdf/html2pdf.class.php');

function generate_agreement($clientArr) {

    //print_r($clientArr);
    //$clientArr=$clientArr1[0];
    //echo $clientArr[0]['first_name'];
    $rootpath = $_SERVER["DOCUMENT_ROOT"] . "/dealportal";
    $first_name = $clientArr['first_name'];
    $middle_name = $clientArr['middle_name'];
    $last_name = $clientArr['last_name'];
    $address = $clientArr['street_address'];
    $phone = $clientArr['phone'];
    $email = $clientArr['email'];
    $city = $clientArr['city'];
    $province = $clientArr['province'];
    $postal = $clientArr['postal_code'];

    $setup_fee = $clientArr['setup_fee'];
    $reoccur_fee = $clientArr['reoccur_fee'];
    $reoccur_fee_date = $clientArr['reoccur_fee_date'];
    $setup_fee_date = $clientArr['setup_fee_date'];
    $confirmation_emt = $clientArr['emt_payment'];
    $product_id = $clientArr['product_id'];
    //$reoccur_fee = number_format($reoccur_fee, 2); uncomment it soon
    $mattress_size = $clientArr['mattress_size'];
    $mattress_cost = $clientArr['mattress_cost'];

    $current_date = date('l F jS Y');
    $reoccurFeeDate = date('l F jS Y', strtotime($reoccur_fee_date));
    $setup_fee_date = date('l F jS Y', strtotime($setup_fee_date));
    $payment_type = "";
    $offer = "";
    $service = "";
    $payment_text_for_finance_agreement = "";

    //calls function to calculate loan value
    $calc_values = loanValues($reoccur_fee, $setup_fee);
    $principal = $calc_values['principal'] + $setup_fee;
    $cost_of_borrow = $calc_values['cost_of_borrow'];
    $total_payment = $calc_values['total_payment'];
    $membership_total = $calc_values['membership_total'];

    if (strpos($setup_fee, '.') !== false) {
        $setup_fee = $setup_fee;
    } else {
        $setup_fee = $setup_fee . ".00";
    }

    if (strpos($reoccur_fee, '.') !== false) {
        $reoccur_fee = $reoccur_fee;
    } else {
        $reoccur_fee = $reoccur_fee . ".00";
    }


    if (strtolower($payment_type) == 'express') {            //express payment.
        if ($confirmation_emt == 'on') {
            $payment_type = "Express Payment (99). With EMT.";
        } else
            $payment_type = "Express Payment (99).";

        $payment_text_for_finance_agreement = "<li>Initial payment $99 due immediately. And the balance of $" . ($setup_fee - 99) . " due on " . $setup_fee_date . "</li>";
    }
    else {                                     //standard payment
        if ($confirmation_emt == 'on') {
            $payment_type = "Standard Payment. With EMT.";
            $payment_text_for_finance_agreement = "<li>Payment of $" . $setup_fee . " due immediately.</li>";
        } else {
            $payment_type = "Standard Payment.";
            $payment_text_for_finance_agreement = "<li>Payment of $" . $setup_fee . " due on " . $setup_fee_date . ".</li>";
        }
    }

    $offer = "";
    $full_name = $first_name . " " . $middle_name . " " . $last_name;
    //create directory
    $structure = $last_name . "_" . $first_name . "_" . date("F_j_Y_g_i_a");
    $savePath = $rootpath . "/view/includes/docs/pdf/" . $structure . "/";
    if (!file_exists($savePath)) {
        mkdir($savePath, 0777, true);
    }

    // Signature Image
    $sign = $rootpath . "/view/includes/docs/noimage.png";
    $imagepath = "https://creditscores.ca/checkout/view/includes/docs/pdfs/" . $last_name . "_" . $first_name . "/" . $last_name . "_" . $first_name . "_signature.png";
    if (file_exists($imagepath)) {
        $sign = $imagepath;
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

    if ($mattress_size != '') {
        array_push($real_values, $mattress_size);
        array_push($real_values, $mattress_cost);
        array_push($placeholders, '[MATTRESS_SIZE]');
        array_push($placeholders, '[MATTRESS_COST]');
    }

    $filename1 = $last_name . '_' . $first_name . '_cc.pdf';
    $filename2 = $last_name . '_' . $first_name . '_finance.pdf';
    $filename3 = $last_name . '_' . $first_name . '_mattress_finance.pdf';

    //Get the files and replace placeholders with real values in agreement file

    $contract1 = file_get_contents('https://creditscores.ca/checkout/view/includes/docs/membership_agreement.html');
    $contract1 = str_replace($placeholders, $real_values, $contract1);
    $contract2 = file_get_contents('https://creditscores.ca/checkout/view/includes/docs/finance_agreement.html');
    $contract2 = str_replace($placeholders, $real_values, $contract2);

    //convert to PDF
    $html2pdf = new HTML2PDF('P', 'A4', 'en');
    $html2pdf->writeHTML($contract1);
    $html2pdf->Output($savePath . $filename1, 'F');  //F for save

    $html2pdf = new HTML2PDF('P', 'A4', 'en');
    $html2pdf->writeHTML($contract2);
    $html2pdf->Output($savePath . $filename2, 'F');  //F for save
    return $savePath . "|" . $filename1 . "|" . $filename2;
}

define('RATE', .2999); // loanrate /
define('TERM', 52); // loanTERM /
define('FREQ', 26); // loanFREQ /

function PV($R, $n, $pmt, $m = 1) {
    $Z = 1 / (1 + ($R / $m));
    return ($pmt * $Z * (1 - pow($Z, $n))) / (1 - $Z);
}

function loanValues($csPayment, $setupfee) {
    $principle = PV(RATE, TERM, $csPayment, FREQ);
    $membershiptotal = $principle + $setupfee; //principal amount of loan
    $totalpayment = ($csPayment * TERM) + $setupfee; //totalpayment amount duo by you
    $costofBorrow = $totalpayment - $membershiptotal;
    return array('principal' => sprintf('%0.2f', $principle),
        'membership_total' => sprintf('%0.2f', $membershiptotal),
        'total_payment' => sprintf('%0.2f', $totalpayment),
        'cost_of_borrow' => sprintf('%0.2f', $costofBorrow));
}

?>
