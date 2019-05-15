<?php
$rootpath=$_SERVER["DOCUMENT_ROOT"]."/dealportal";
include($rootpath."/model/DC_config.php");
include($rootpath."/controller/classes/sanitize.php");



echo $occupationID=$_GET['occupationID'];
$occupation_name="";

if(!empty($occupationID)){

echo $sql="select occupation_name from DCBank.occupation_list where occupation_id=$occupationID";
$result=mysqli_query($dc_conn,$sql);
print_r($result);
if($result->num_rows > 0){

  $row=mysqli_fetch_assoc($result);

  $occupation_name=$row['occupation_name'];

}

}
echo $occupation_name;



 ?>
