<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
$rootpath=$_SERVER["DOCUMENT_ROOT"]."/dealportal";
include($rootpath."/model/sales_config.php");
include($rootpath."/controller/classes/sales_dbdisplay.php");


$action=$_GET['action'];


$sls_dbobj=new salesdbdisplay();

switch ($action) {

  case "user_list":

      /*$response = $sls_dbobj->user_list();

      print_r($response);

      $data='<select class="form-control" multiple ><option value="" >All</option>';

      foreach($response as  $value){
        print_r($value);
        $data.='<option value="'.$value['email'].'" >'.$value['email'].'</option>';
      }

      $data.='</select>';

      echo $data;*/

  break;

  default :
    echo "Switch default condition";

}






 ?>
