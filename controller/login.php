<?php

$rootpath=$_SERVER["DOCUMENT_ROOT"]."/dealportal";
include($rootpath."/model/config.php");
include($rootpath."/controller/classes/sanitize.php");
include($rootpath."/controller/lib/PHPMailer/PHPMailerAutoload.php");
session_start();


if(isset($_POST['login'])){

    $username=$_POST['username'];
    $password=$_POST['password'];
    $login_ok=false;

    $sql="select id,username,password,salt,email,status,roleid,teamid from users where username='".$username."'";
    $result=mysqli_query($conn,$sql);


    if($result->num_rows > 0){

        $row=mysqli_fetch_assoc($result);

        $status=$row['status'];
        $db_password=$row['password'];
        $salt=$row['salt'];
        $msg=0;

            $check_password = hash('sha256', $password . $salt);
            for($round = 0; $round < 65536; $round++){
                $check_password = hash('sha256', $check_password . $salt);
            }
            if($check_password === $db_password){

                if($status === 'active'){
                    $login_ok = true;
                    $_SESSION['CCuser'] = $row;
                }else{
                    // Not An Active Client
                    $msg=1;
                }

            }else{
                // Password doent match
                $msg=2;
            }

        }else{

           // Error doesn't exist
           $msg=3;
        }

        if($login_ok == true){
            header("Location: ../view/dashboard.php");
        }else{
            header("Location:../index.php?Msg=$msg");
        }


}









 ?>
