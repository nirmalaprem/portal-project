<?php
session_start();
if(empty($_SESSION['CCuser']))
{
    header("Location: ../index.php");
    die("Redirecting to ../index.php");
}
$loginuser=$_SESSION['CCuser'];
$user_name = $loginuser['username'];
$logteamid=$loginuser['teamid'];
$logroleid=$loginuser['roleid'];
?>
<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->


<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Deals | Portal</title>

        <!-- Vendor CSS -->
        <link href="assets/vendors/bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
        <link href="assets/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="assets/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet">
        <link href="assets/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css" rel="stylesheet">
        <link href="assets/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="assets/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">
        <link href="assets/vendors/bower_components/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="assets/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet">


        <!-- CSS -->
        <link href="assets/css/app.min.1.css" rel="stylesheet">
        <link href="assets/css/app.min.2.css" rel="stylesheet">


</head>
<body>
<input type="hidden" value="<?php echo $user_name; ?>" name="loginuser" id="loginuser"/>
