<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
date_default_timezone_set("America/Denver");
$rootpath=$_SERVER["DOCUMENT_ROOT"]."/dealportal";
include($rootpath."/model/common.php");
include($rootpath."/controller/classes/sanitize.php");
include($rootpath."/controller/classes/dbdisplay.php");


if(isset($_GET["request"]) && isset($_GET["action"]))
{
  //get the post vars so we know whats up
  $user = $_SESSION['CCuser'];
  $user_id = $user['id'];
  $user_name = $user['username'];
  $request=$_GET["request"];
  $action=$_GET["action"];


  // create the objects
  $dbobj = new dbdisplay();
  switch ($request) {

    case "download_allinfo":

        $clientid=$_GET['clientID'];
        $filename="downloadfile/info_".date('ymdhis').".txt";
        $list=$dbobj->getclient_detailsbyID($clientid);
        $content="";

        foreach($list as $key => $value){
          $content.=$key.": ".$value."\n";
        }
        file_put_contents($filename, $content);

        echo "http://184.68.121.126/dealportal/controller/".$filename;
        //echo json_encode($list);
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Length: ". filesize("$filename").";");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/octet-stream; ");
        header("Content-Transfer-Encoding: binary");

        readfile($filename);

    break;

  }

}










?>
