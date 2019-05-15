<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$msg="";
if(isset($_GET['Msg'])){

    $msgno=$_GET['Msg'];
    if($msgno == 1){
        $msg="Your Login Access Has Deactivated";
    }elseif($msgno == 2){
        $msg="Please Enter The Correct Password";
    }elseif($msgno == 3){
        $msg="Please Enter The Correct Username And Password";
    }

}


?>


<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->

<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Deals | Portal</title>

        <!-- Vendor CSS -->
        <link href="view/assets/vendors/bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
        <link href="view/assets/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="view/assets/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css" rel="stylesheet">
        <link href="view/assets/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="view/assets/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">

        <!-- CSS -->
        <link href="view/assets/css/app.min.1.css" rel="stylesheet">
        <link href="view/assets/css/app.min.2.css" rel="stylesheet">

    </head>
    <body>
<body class="login-img3-body">

    <div class="container">
        <div id="dash_view" class="mini-charts">

            <form class="login-form" action="controller/login.php" method="post">
            <div class="row">
                <div class="col-sm-4">
                </div>
                <div class="col-sm-3">
                        <div class="login-wrap">
                            <p>
                                <strong style="color:#0c5d7c;font-size:30px">Deal Portal Login Form</strong>
                            </p>
                            <p class="login-img"><img src="view/assets/images/Logo-CanadaCredit.png" /></p>

                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                            <!--<div class="input-group"> -->
                                <span class="input-group-addon"><i class="icon_profile"></i></span>
                                <input value='' name="username" type="text" class="form-control" placeholder=" Username" autofocus>
                            <!--</div> -->
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-sm-12">
                            <!--<div class="input-group"> -->
                                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                                <input name="password" type="password" class="form-control" placeholder=" Password">

                            <!--</div> -->
                            </div>
                        </div>

                        <div class="row">

                            <div  id="error"><font color="red"><?php echo $msg; ?></font></div>
                            <label class="checkbox">
                                <!-- <input type="checkbox" value="remember-me"> Remember me -->
                                <!--<span class="pull-right"> <a href="#"> Forgot Password?</a></span> -->
                            </label>

                        </div>
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-4">
                                <div class="input-group">
                                <button class="btn login-btn btn-lg btn-block" type="submit" name="login" id="login">Login</button>
                                </div>
                            </div>
                        </div>
                </div>
            </div>

            </form>
        </div>
    </div>
</body>

</html>
