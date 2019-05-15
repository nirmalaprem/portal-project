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

if(!empty($_GET))
{

    $userid=$_GET['userID'];
    $fieldname=$_GET['fieldname'];
    $fieldvalue=$_GET['fieldvalue'];

/*echo "User: ".$userid."<br />";
echo "fieldname: ".$fieldname."<br />";
echo "fieldvalue: ".$fieldvalue."<br />";*/

    if($fieldname == "username"){

        // Check if the username is already taken
        $query = " SELECT * FROM users WHERE username = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('s' , $fieldvalue);
        $result = $stmt->execute();
        $row = $stmt->fetch();
        if($row){ $msg="This username is already in use"; }
        $stmt->close();


        if(empty($msg)){

            $query = " UPDATE users SET  username = ? WHERE id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('si' , $fieldvalue,$userid);
            $result = $stmt->execute();
            $stmt->close();
            $msg="Username updated successfully!";
        }


    }elseif($fieldname == "email"){

        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('s', $fieldvalue);
        $result = $stmt->execute();
        $row = $stmt->fetch();
        if($row){ $msg="This email address is already registered"; }
        $stmt->close();

        if(empty($msg)){

            $query = " UPDATE users SET  email = ? WHERE id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('si' , $fieldvalue,$userid);
            $result = $stmt->execute();
            $stmt->close();

            $msg="Email Address updated successfully!";

        }
    }elseif($fieldname == "password"){

        $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));
        $password = hash('sha256', $fieldvalue . $salt);
        for($round = 0; $round < 65536; $round++){ $password = hash('sha256', $password . $salt); }

        $query = " UPDATE users SET  password = ? , salt = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ssi' , $password,$salt,$userid);
        $result = $stmt->execute();
        $stmt->close();

        $msg="Password updated successfully!";

    }elseif($fieldname == "team"){

        $query = " UPDATE users SET  teamid = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ii' , $fieldvalue,$userid);
        $result = $stmt->execute();
        $stmt->close();

        $msg="Team updated successfully!";

    }elseif($fieldname == "role"){

        $query = " UPDATE users SET  roleid = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ii' , $fieldvalue,$userid);
        $result = $stmt->execute();
        $stmt->close();

        $msg="Role updated successfully!";

    }elseif($fieldname == "status"){

        $query = " UPDATE users SET  status = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('si' , $fieldvalue,$userid);
        $result = $stmt->execute();
        $stmt->close();

        $msg="Status updated successfully!";

    }

}

    echo $msg;


 ?>
