<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
date_default_timezone_set("America/Denver");
$rootpath = $_SERVER["DOCUMENT_ROOT"] . "/dealportal";
include($rootpath . "/model/common.php");
include($rootpath . "/controller/classes/generateAgreement_cs.php");
include($rootpath . "/controller/classes/sanitize.php");
include($rootpath . "/controller/classes/dbdisplay.php");
include($rootpath . "/controller/lib/PHPMailer/PHPMailerAutoload.php");

if (isset($_GET["request"]) && isset($_GET["action"])) {
    //get the post vars so we know whats up

    $user = $_SESSION['CCuser'];
    $user_id = $user['id'];
    $user_name = $user['username'];
    $request = $_GET["request"];
    $action = $_GET["action"];


    // create the objects
    $dbobj = new dbdisplay();


    switch ($request) {
        //display DB result based on flag
        case "get_count_all":

            $requests = $dbobj->getdealcount(0);
            $counts['TOTALDEAL'] = $requests['num'];



            $requests = $dbobj->getdealcount(1);
            $counts['TD'] = $requests['num'];

            $requests = $dbobj->getdealcount(2);
            $counts['YD'] = $requests['num'];

            $requests = $dbobj->getdealcount(3);
            $counts['TWD'] = $requests['num'];

            $requests = $dbobj->getdealcount(4);
            $counts['LWD'] = $requests['num'];

            $requests = $dbobj->getdealcount(5);
            $counts['TMD'] = $requests['num'];

            $requests = $dbobj->getdealcount(6);
            $counts['LMD'] = $requests['num'];

            echo json_encode($counts);

            break;

        case "filters":

            $filterid = $_GET["filterID"];
            $list = $dbobj->getdealslist($filterid);

             echo json_encode($list,JSON_FORCE_OBJECT);
           // echo "<pre>";print_r($list);
            //Build Buttons
            if (!empty($list)) {
                $return_arr["aaData"] = $list;
            } else {

                $list["createddate"] = "";
                $list["first_name"] = "";
                $list["last_name"] = "";
                $list["email"] = "";
                $list["phone"] = "";
                $list["dob"] = "";
                $list["agent"] = "";
                $list["product_name"] = "";
                $list["CAT_include"] = "";

                $return_arr["aaData"] = $list;
            }

            echo "yrdy";
            echo json_encode($return_arr);
            exit;

            break;
        case "redo_agreement":

            $clientid = $_GET['clientID'];
            $list = $dbobj->getclient_detailsbyID($clientid);



            $agreementinfo = generate_agreement($list);
            //echo "<pre>";print_r($agreementinfo);exit;
            $user_info = $dbobj->adduser_trackinfo($clientid, $user_id, 'Redo Agreement', 'Client agreement was created successfully', $user_name);

            //$agreementinfo="/var/www/html/dealportal/view/includes/docs/pdf/Bernard_Jean-Robert_August_14_2017_12_02_pm/|Bernard_Jean-Robert_cc.pdf|Bernard_Jean-Robert_finance.pdf";


            echo $agreementinfo;


            break;
        case "redo_agreement_save":

            $clientid = $_GET['clientID'];
            $redofilepath = $_GET['redoFilePath'];
            $filepatharr = explode(",", $redofilepath);
            $redopath = substr($filepatharr[0], 0, -1);

            $list = $dbobj->setredoagreement_pathbyID($clientid, $redopath);
            $user_info = $dbobj->adduser_trackinfo($clientid, $user_id, 'Save Redo Agreement', 'Created agreement path was saved successfully', $user_name);
            echo "<font style='color:#009688'><b>Thank You,Agreement Path was saved successfully!</b></font>";

            break;
        case "download_allinfo":

            $clientid = $_GET['clientID'];

            $list = $dbobj->getclient_detailsbyID($clientid);
            $content = "";
            $filename = "downloadfile/" . $list['last_name'] . "_" . $list['first_name'] . "_application_" . date('ymd') . ".txt";
            foreach ($list as $key => $value) {
                if ($key != "clientid" && $key != "agreement_path" && $key != "contract_folderpath") {
                    $content .= $key . ": " . $value . "\r\n";
                }
            }
            file_put_contents($filename, $content);

            echo "http://184.68.121.126/dealportal/controller/" . $filename;

            break;
        case "crm_addcontact":

            $clientid = $_GET['clientID'];
            $list = $dbobj->getclient_detailsbyID($clientid);

            //echo json_encode($list);
            //set POST variables
            $url = 'http://crm.cashslab.ca/webservice_2017/view/DealPortal_transfer_leadtocontact.php';
            $fields = array(
                'firstname' => urlencode($list['first_name']),
                'lastname' => urlencode($list['last_name']),
                'email' => urlencode($list['email']),
                'phonenumber' => urlencode($list['phone']),
                'mobilenumber' => urlencode($list['mobile']),
                'street' => urlencode($list['street_address']),
                'city' => urlencode($list['city']),
                'province' => urlencode($list['province']),
                'postalcode' => urlencode($list['postal_code']),
                'product' => urlencode($list['product_name']),
                'setupfee' => urlencode($list['setup_fee']),
                'catcard' => urlencode($list['CAT_include']),
                'applicationdate' => urlencode($list['createddate']),
                'agent' => urlencode($list['agent'])
            );

            //url-ify the data for the POST
            $fields_string = "";
            foreach ($fields as $key => $value) {
                $fields_string .= $key . '=' . $value . '&';
            }
            rtrim($fields_string, '&');
            //open connection
            $ch = curl_init();
            //set the url, number of POST vars, POST data
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, count($fields));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            //execute post
            $result = curl_exec($ch);
            //close connection
            curl_close($ch);

            echo $result;

            break;
        case "user_list":

            $requests = $dbobj->user_list();
            $data = '<select class="form-control" id="agent" multiple ><option value="All" >All</option>';

            foreach ($requests as $key => $value) {
                $data .= '<option value="' . $value['user_name'] . '" >' . $value['user_name'] . '</option>';
            }
            /* $data.="<option value='abisoye-j'>Abisoye J</option><option value='adedotun-d'>Adedotun D.</option><option value='alison-t'>Alison T.</option><option value='angel-r'>Angel R.</option><option value='anna-d'>Anna D.</option><option value='belene-e'>Belene E.</option><option value='blake-m'>Blake M.</option><option value='brian-b'>Brian B.</option><option value='bryan-r'>Bryan R.</option><option value='cazimir-l'>Cazimir L.</option><option value='cenedra-j'>Ce'nedra J.</option><option value='cheyenne-h'>Cheyenne H.</option><option value='christie-m'>Christie-Lea M.</option><option value='chukuma-i'>Chukuma I.</option><option value='crystal-c'>Crystal C.</option><option value='danielle-h'>Danielle H.</option><option value='david-m'>David M.</option><option value='denise-s'>Denise S.</option><option value='derek-s'>Derek S.</option><option value='desiree-c'>Desiree C.</option><option value='dora-b'>Dora B.</option><option value='emad-a'>Emad A.</option><option value='irina-o'>Irina O.</option><option value='jamie-r'>Jamie-Lynn R.</option><option value='jasphine-b'>Jasphine B.</option><option value='jean-m'>Jean-Francois M.</option><option value='ken-p'>Ken P.</option><option value='kiely-k'>Kiely</option><option value='kimberly-n'>Kimberly N.</option><option value='kyle-g'>Kyle G.</option><option value='lola-a'>Lola A.</option><option value='lynn-l'>Lynn L.</option><option value='maggerlyn-t'>Maggerlyn T.</option><option value='manny-k'>Manny K.</option><option value='mitchell-r'>Mitchell R</option><option value='mohammed-j'>Mohammed J.</option><option value='morgan-s'>Morgan S.</option><option value='nessreen-s'>Nessreen S.</option><option value='pat-e'>Pat E.</option><option value='patricia-m'>Patricia M.</option><option value='peace-h'>Peace H.</option><option value='rae-anne-g'>Rae-Anne G.</option><option value='rebecca-e'>Rebecca E.</option><option value='samantha-b'>Samantha B.</option><option value='samantha-m'>Samantha M.</option><option value='shauna-n'>Shauna N.</option><option value='shea-m'>Shea M.</option><option value='sheldon'>Sheldon</option><option value='stacey-ann-h'>Stacey-Ann H.</option><option value='tristan-p'>Tristan P.</option><option value='tristen-w'>Tristen W.</option><option value='victoria-k'>Victoria K.</option>"; */

            $data .= '</select>';

            echo $data;

            break;

        case "app_report":

            $startdate = $_GET['startDate'];
            $enddate = $_GET['endDate'];
            $gent = $_GET['Agent'];
            $agent_arr = array();
            $result_arr = array();

            $startdate = date('Y-m-d', strtotime(str_replace('/', '-', $startdate)));
            $enddate = date('Y-m-d', strtotime(str_replace('/', '-', $enddate)));

            if ($gent == "All") {

                $requests = $dbobj->user_list();
                foreach ($requests as $key => $value) {
                    $agent_arr[] = $value['user_name'];
                }
            } else {
                $agent_arr = explode(',', $gent);
            }

            foreach ($agent_arr as $agentname) {
                $response = $dbobj->app_received_list($startdate, $enddate, $agentname);
                $result_arr[$agentname] = $response;
            }



            $html = "";

            foreach ($result_arr as $key => $agentvalue) {
                $agentpoints = 0;
                $html .= '<table class="table table-hover">
            <thead>
            <tr class="success c-white" ><th></th><th></th><th>' . $key . '</th>
            <th> Date From  ' . date('F j, Y', strtotime($startdate)) . ' To   ' . date('F j, Y', strtotime($enddate)) . '</th>
            <th> DealCount : ' . count($agentvalue) . '</th>
            </tr>
              <tr class="info">
                <th>Created Date</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Points</th>
              </tr>
            </thead>
            <tbody>';

                foreach ($agentvalue as $value) {
                    $html .= '<tr>
                <td>' . $value['createddate'] . '</td>
                <td>' . $value['first_name'] . '</td>
                <td>' . $value['last_name'] . '</td>
                <td >' . $value['email'] . '</td>
                <td >1</td>
              </tr>';
                    $agentpoints = $agentpoints + 1;
                }

                $html .= '<tr class="info">
            <th ></th>
            <th ></th>
            <th ></th>
            <th>Total Points</th>
            <th>' . $agentpoints . '</th>
            </tr>
            </tbody>
            </table><br /><hr /><br />';
            }

            echo $html;

            break;
        case "all_user_list":

            $list = $dbobj->get_all_userlist();
            $return_arr = array();
            $data_arr = array();
            //print_r($list);
            if (!empty($list)) {
                foreach ($list as $value) {
                    $value['button'] = '<input type="button" class="edit btn btn-danger" id="' . $value['userid'] . '" value="Edit"  />';
                    $data_arr[] = $value;
                }
                $return_arr["aaData"] = $data_arr;
            } else {

                $list["createddate"] = "";
                $list["username"] = "";
                $list["email"] = "";
                //$list["password"] = "";
                $list["team_name"] = "";
                $list["role_name"] = "";
                $list["status"] = "";
                $list["button"] = "";

                $return_arr["aaData"] = $list;
            }
            echo json_encode($return_arr);

            break;
        case "team_list":

            $list = $dbobj->get_all_teamlist();
            $html = "";

            if ($action == 1) {
                echo json_encode($list);
            } else {

                foreach ($list as $key => $value) {
                    $html .= '<div class="form-group fg-line">
                  <label>' . $value['team_name'] . '</label>
              </div>';
                }

                echo $html;
            }
            break;
        case "role_list":
            $list = $dbobj->get_all_rolelist();
            $html = "";

            if ($action == 1) {

                echo json_encode($list);
            } else {

                foreach ($list as $key => $value) {
                    $html .= '<div class="form-group fg-line">
                  <label>' . $value['role_name'] . '</label>
              </div>';
                }
                echo $html;
            }




            break;
        case "agreementInfo":

            $list = $dbobj->getAgreementAmendmentlist();

            //print_r($list);

            $return_arr = array();
            $tabledata = array();
            //Build Buttons
            if (!empty($list)) {


                foreach ($list as $key => $value) {

                    $value['address'] = $value['streetaddress'] . "<br />" . $value['city'] . "<br />" . $value['province'] . " " . $value['postalcode'];
                    $value['agreefile'] = '<a target="_blank" href="http://184.68.121.126/dealportal/view/includes/docs/amendmentPdf/' . $value['agreementfilename'] . '" class="btn btn-success btn-sm" >View Agreement </a>';

                    $tabledata[] = $value;
                }
                //  $list[0]['address']="";
                //  $list[0]['agreefile']="";
                //$list['address']=$list['streetaddress']."<br />".$list['city']."<br />".$list['province']." ".$list['postalcode'];
                //$list['agreefile']='<a target="_blank" href="http://184.68.121.126/dealportal/view/includes/docs/amendmentPdf/'.$tabledata['agreementfilename'].'" class="btn btn-success btn-sm" >View Agreement </a>';
                //echo "<br />Table Output<br />";
                //print_r($tabledata);

                $return_arr["aaData"] = $tabledata;
            } else {

                $list["createddate"] = "";
                $list["firstname"] = "";
                $list["lastname"] = "";
                $list["email"] = "";
                $list["phonenumber"] = "";
                $list["address"] = "";
                $list["agreefile"] = "";
                $list["createdby"] = "";

                $return_arr["aaData"] = $list;
            }

            echo json_encode($return_arr);
            break;
        case "user_info":

            $userid = $_GET['userID'];
            $list = $dbobj->getUserInfoByID($userid);
            echo json_encode($list);

            break;
        default:
            // DEFAULT
            echo "Error:unknown request! Please Contact Admin";
    }
}
?>
