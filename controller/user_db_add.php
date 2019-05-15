<?php
error_reporting(E_ALL ^ E_NOTICE);
//error_reporting(E_ALL);
ini_set('display_errors', 1);
date_default_timezone_set("America/Denver");
$rootpath=$_SERVER["DOCUMENT_ROOT"]."/dealportal";
include($rootpath."/model/common.php");
include($rootpath."/controller/classes/sanitize.php");
include($rootpath."/controller/classes/dbdisplay.php");
include($rootpath."/controller/lib/html2pdf/html2pdf.class.php");
session_start();

$user = $_SESSION['CCuser'];
$user_id = $user['id'];
$user_name = $user['username'];
$msg="";

if(!empty($_POST))
{
    $username=$_POST['username'];
    $email=$_POST['email'];
    $paswword=$_POST['paswword'];
    $team=$_POST['team'];
    $role=$_POST['role'];


    // Check if the username is already taken
    $query = " SELECT * FROM users WHERE username = ?";
    //$query_params = array(  );
    try {
        $stmt = $conn->prepare($query);
        $stmt->bind_param('s' , $username);
        $result = $stmt->execute();

    }
    catch(PDOException $ex){ $msg="Failed to run query: " . $ex->getMessage(); }
    $row = $stmt->fetch();
    if($row){ $msg="This username is already in use"; }
    $stmt->close();


    $query = "SELECT * FROM users WHERE email = ?";
    //$query_params = array(':email' => $email);
    try {
        $stmt = $conn->prepare($query);
        $stmt->bind_param('s', $email);
        $result = $stmt->execute();

    }
    catch(PDOException $ex){ $msg="Failed to run query: " . $ex->getMessage();}
    $row = $stmt->fetch();
    if($row){ $msg="This email address is already registered"; }
    $stmt->close();


    if(empty($msg)){
        // Add row to database
        $query = "INSERT INTO users (username,password,salt,email,roleid,teamid) VALUES (
                ?,?,?,?,?,?)";

        // Security measures
        $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));
        $password = hash('sha256', $_POST['password'] . $salt);
        for($round = 0; $round < 65536; $round++){ $password = hash('sha256', $password . $salt); }
        /*$query_params = array(
            ':username' => $username,
            ':password' => $password,
            ':salt' => $salt,
            ':email' => $email,
            ':roleid' => $role,
            ':teamid' => $team
        );*/
        try {
            $stmt = $conn->prepare($query);
            $stmt->bind_param('ssssii',$username,$password,$salt,$email,$role,$team);
            $result = $stmt->execute();
            $stmt->close();
            $msg="User Added Successfully !";

        }
        catch(PDOException $ex){ $msg="Failed to run query: " . $ex->getMessage(); }
      }
    }


    echo $msg;


 ?>
