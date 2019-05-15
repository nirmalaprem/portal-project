<?php
include ('includes/header.php');
include ('includes/topnav.php');
include ('includes/sidebar.php');
?>
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
		  <div  id="table-content">

		  </div>
		  <a class="btn btn-float bgm-red m-btn" data-ma-action="print" ><i class="zmdi zmdi-print"></i></a>
      </div>



    </div>
  </div>


</section>


<!-- /#wrapper -->

<?php include('includes/footer.php');?>

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
