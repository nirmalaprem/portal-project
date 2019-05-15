<?php
$rootpath=$_SERVER["DOCUMENT_ROOT"]."/dealportal";
include($rootpath."/model/config.php");

    unset($_SESSION['CCuser']);
    header("Location:../index.php");
    die("Redirecting to: ../index.php");
?>
