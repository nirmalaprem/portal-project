
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
<header id="header" class="clearfix" data-current-skin="teal">
    <ul class="header-inner">
        <li id="menu-trigger" data-trigger="#sidebar">
            <div class="line-wrap">
                <div class="line top"></div>
                <div class="line center"></div>
                <div class="line bottom"></div>
            </div>
        </li>

        <li class="hidden-xs">
            <!-- <a href="index.php" class="m-l-10"><img src="assets/img/demo/logo.png" alt=""></a> -->
        </li>

        <li class="pull-right">
            <ul class="top-menu">


                <li id="top-search">
                    <a href="#"><i class="tm-icon zmdi zmdi-search"></i></a>
                </li>

                <li class="dropdown">
                    <a data-toggle="dropdown" href="#">
                        <i class="tm-icon zmdi zmdi-email"></i>
                        <i class="tmn-counts"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg pull-right">
                        <div class="listview">
                            <div class="lv-header">
                                Messages
                            </div>
                            <div class="lv-body">
                                <a class="lv-item" href="#">
                                    <div class="media">
                                        <div class="pull-left">
                                            <img class="lv-img-sm" src="assets/img/profile-pics/1.jpg" alt="">
                                        </div>
                                        <div class="media-body">
                                            <div class="lv-title">New Deal!</div>
                                            <small class="lv-small">By Sales Agent</small>
                                        </div>
                                    </div>
                                </a>
                                <a class="lv-item" href="#">
                                    <div class="media">
                                        <div class="pull-left">
                                            <img class="lv-img-sm" src="assets/img/profile-pics/2.jpg" alt="">
                                        </div>
                                        <div class="media-body">
                                            <div class="lv-title">Deal Cancelled</div>
                                            <small class="lv-small">View Deal Info</small>
                                        </div>
                                    </div>
                                </a>



                            </div>
                            <a class="lv-footer" href="#">View All</a>
                        </div>
                    </div>
                </li>

                <!-- <li class="dropdown hidden-xs">
                    <a data-toggle="dropdown" href="#">
                        <i class="tm-icon zmdi zmdi-view-list-alt"></i>
                        <i class="tmn-counts"></i>
                    </a>
                    <div class="dropdown-menu pull-right dropdown-menu-lg">
                        <div class="listview">
                            <div class="lv-header">
                                Tasks
                            </div>
                            <div class="lv-body">
                                <div class="lv-item">
                                    <div class="lv-title m-b-5">Daily Goal</div>

                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%">
                                            <span class="sr-only">95% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="lv-item">
                                    <div class="lv-title m-b-5">Weekly Goal</div>

                                    <div class="progress">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="lv-item">
                                        <div class="lv-title m-b-5">Monthly Goal</div>

                                    <div class="progress">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <a class="lv-footer" href="#">View All</a>
                        </div>
                    </div>
                </li> -->
                <!-- <li class="dropdown">
                    <a data-toggle="dropdown" href="#"><i class="tm-icon zmdi zmdi-more-vert"></i></a>
                    <ul class="dropdown-menu dm-icon pull-right">
                        <li class="skin-switch hidden-xs">
                            <span class="ss-skin bgm-lightblue" data-skin="lightblue"></span>
                            <span class="ss-skin bgm-bluegray" data-skin="bluegray"></span>
                            <span class="ss-skin bgm-cyan" data-skin="cyan"></span>
                            <span class="ss-skin bgm-teal" data-skin="teal"></span>
                            <span class="ss-skin bgm-orange" data-skin="orange"></span>
                            <span class="ss-skin bgm-blue" data-skin="blue"></span>
                        </li>
                        <li class="divider hidden-xs"></li>
                        <li class="hidden-xs">
                            <a data-action="fullscreen" href="#"><i class="zmdi zmdi-fullscreen"></i> Toggle Fullscreen</a>
                        </li>
                        <li>
                            <a data-action="clear-localstorage" href="#"><i class="zmdi zmdi-delete"></i> Clear Local Storage</a>
                        </li>
                        <li>
                            <a href="#"><i class="zmdi zmdi-face"></i> Privacy Settings</a>
                        </li>
                        <li>
                            <a href="#"><i class="zmdi zmdi-settings"></i> Other Settings</a>
                        </li>
                    </ul>
                </li> -->
                <!-- <li class="hidden-xs" id="chat-trigger" data-trigger="#chat">
                    <a href="#"><i class="tm-icon zmdi zmdi-comment-alt-text"></i></a>
                </li> -->
            </ul>
        </li>
    </ul>


    <!-- Top Search Content -->
    <div id="top-search-wrap">
        <div class="tsw-inner">
            <i id="top-search-close" class="zmdi zmdi-arrow-left"></i>
            <input type="text">
        </div>
    </div>
</header>
<section id="main" data-layout="layout-1">
    <aside id="sidebar" class="sidebar c-overflow">
        <div class="profile-menu">
            <a href="#">
                <div class="profile-pic">
                    <img src="assets/img/profile-pics/1.jpg" alt="">
                </div>

                <div class="profile-info">
                    Deals Portal

                    <i class="zmdi zmdi-caret-up"></i>
                </div>
            </a>

            <!-- <ul class="main-menu" >
                <li>
                    <a href="profile-about.php"><i class="zmdi zmdi-account"></i> View Profile</a>
                </li>
                <li>
                    <a href="#"><i class="zmdi zmdi-input-antenna"></i> Privacy Settings</a>
                </li>
                <li>
                    <a href="#"><i class="zmdi zmdi-settings"></i> Settings</a>
                </li>
                <li>
                    <a href="#"><i class="zmdi zmdi-time-restore"></i> Logout</a>
                </li>
            </ul> -->

        </div>

        <ul class="main-menu">
            <li><a  href="dashboard.php"><i class="zmdi zmdi-home"></i> Home</a></li>
            <li><a  href="../controller/logout.php"><i class="zmdi zmdi-time-restore"></i> Logout</a></li>
            <!-- <li class="sub-menu">
                <a href="#"><i class="zmdi zmdi-collection-text"></i> Forms</a>

                <ul>
                    <li><a href="form-elements.php">Credit Report</a></li>
                    <li><a href="form-components.php">Credit Repair</a></li>
                    <li><a href="form-examples.php">Debt Settlment</a></li>
                    <li><a href="form-validations.php">My Letters</a></li>
                </ul>
            </li>
            <li><a href="#"><i class="zmdi zmdi-collection-item"></i>My Letters</a></li> -->

        </ul>
    </aside>


    </aside>
<section id="content">
  <div class="container invoice">
    <div class="block-header">
      <h2 ><a href="#" class="home">Reports</a></h2>
      <ul class="actions">
        <li>
          <a href="#">
            <i class="zmdi zmdi-trending-up"></i>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="zmdi zmdi-check-all"></i>
          </a>
        </li>
        <li class="dropdown">
          <a href="#" data-toggle="dropdown">
            <i class="zmdi zmdi-more-vert"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-right">
            <li>
              <a class="refresh" href="#">Refresh</a>
            </li>

          </ul>
        </li>
      </ul>
    </div>


      <div class="card">

        <div class="card-body card-padding">
          <div class="row">
              <div class="col-sm-3 m-b-20">
                  <div class="form-group fg-line">
                      <label>Start Date</label>
                      <input type='text' class="form-control date-picker" id="startdate" data-toggle="dropdown" placeholder="Click here..." requried>

                  </div>
              </div>

              <div class="col-sm-3 m-b-20">
                  <div class="form-group fg-line">
                      <label>End Date </label>
                      <input type='text' class="form-control date-picker"  id="enddate" data-toggle="dropdown" placeholder="Click here..." requried>
                  </div>
              </div>

              <div class="col-sm-3 m-b-20">
                  <div class="form-group fg-line">
                      <label>AssignedTo</label>
                      <span id="load_agent"></span>
                  </div>
              </div>
              <div class="col-sm-3 m-b-20">
                  <div class="form-group fg-line">
                    <a target="_blank"  class="btn btn-success btn-sm" id="report_search">Search</a>
                  </div>
              </div>

          </div>
      </div>

        <div  id="table-content">

        </div>

    </div>
  </div>
  <a class="btn btn-float bgm-red m-btn" data-ma-action="print" href=""><i class="zmdi zmdi-print"></i></a>

</section>


<!-- /#wrapper -->

</section>
<footer>
	<!-- jQuery -->
	<!-- <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script> -->
	<!-- Javascript Libraries -->
	<script src="assets/vendors/bower_components/jquery/dist/jquery.min.js"></script>
	<script src="assets/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

	<script src="assets/vendors/bower_components/flot/jquery.flot.js"></script>
	<script src="assets/vendors/bower_components/flot/jquery.flot.resize.js"></script>
	<script src="assets/vendors/bower_components/flot.curvedlines/curvedLines.js"></script>
	<script src="assets/vendors/sparklines/jquery.sparkline.min.js"></script>
	<script src="assets/vendors/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>

	<script src="assets/vendors/bower_components/moment/min/moment.min.js"></script>
	<script src="assets/vendors/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
	<script src="assets/vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js"></script>
	<script src="assets/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.min.js"></script>
	<script src="assets/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="assets/vendors/bower_components/Waves/dist/waves.min.js"></script>
	<script src="assets/vendors/bootstrap-growl/bootstrap-growl.min.js"></script>
	<script src="assets/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

	<!-- Placeholder for IE9 -->
	<!--[if IE 9 ]>
			<script src="vendors/bower_components/jquery-placeholder/jquery.placeholder.min.js"></script>
	<![endif]  -->

	<script src="assets/js/flot-charts/curved-line-chart.js"></script>
	<script src="assets/js/flot-charts/line-chart.js"></script>
	<script src="assets/js/charts.js"></script>

	<script src="assets/js/charts.js"></script>
	<script src="assets/js/functions.js"></script>
	<script src="assets/js/demo.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<!-- <script type="text/javascript" src="assets/js/bootstrap.min.js"></script> -->

	<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
	<!-- <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.0/js/bootstrap2-toggle.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.7/js/bootstrap-dialog.min.js"></script> -->
	<script src="assets/js/notie.js"></script>
	<!-- <script type="text/javascript" src="assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
	<script type="text/javascript" src="assets/js/jquery.bootstrap.wizard.min.js" charset="UTF-8"></script> -->

</footer>
</body>
</html>

<script>

$.ajax({
  url:'../controller/page_request.php?request=user_list&action=0',
  success:function(result){

    $("#load_agent").html(result);

  }
});



$("#report_search").on('click',function(e){

  var start_date=$("#startdate").val();
  var end_date=$("#enddate").val();
  var agent=$("#agent").val();

  if(start_date !="" && end_date !=""  && agent !="" ){

  $.ajax({
    url:'../controller/page_request.php?request=app_report&action=0&startDate='+start_date+'&endDate='+end_date+'&Agent='+agent,
    success:function(result){

      $("#table-content").html(result);

    }
  });

}else{
  $("#table-content").html('<div class="card-header ch-alt text-center"><h4 class="c-red f-400">Please Empty Value Does not Generate The Report</h4></div>');
}


});




</script>
</html>
