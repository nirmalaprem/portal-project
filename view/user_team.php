<?php
include ('includes/header.php');
include ('includes/topnav.php');
include ('includes/sidebar.php');
?>
<section id="content">
  <div class="container">
    <div class="block-header">
      <h2 ><a href="#" class="home">User Manage</a></h2>
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

    <div class="card" id="profile-main">
            <div class="pm-overview c-overflow">

                <div class="card-header bgm-orange">
                    <div class="c-white"align="center"><h2>Teams</h2></div>
                    <!--<button class="bgm-white btn btn-default bg btn-float waves-effect waves-circle waves-float"><i class="zmdi zmdi-plus"></i></button> -->
                </div>

                <div class="pmo-block pmo-contact hidden-xs">
                  <div class="row" >
                      <div class="col-sm-12" id="teamlist">

                      </div>
                  </div>
                </div>

                <div class="card-header bgm-orange">
                    <div class="c-white"align="center"><h2>Roles</h2></div>
                    <!--<button class="bgm-white btn btn-default bg btn-float waves-effect waves-circle waves-float"><i class="zmdi zmdi-plus"></i></button> -->
                </div>

                <div class="pmo-block pmo-contact hidden-xs">
                  <div class="row" >
                      <div class="col-sm-12" id="rolelist">

                      </div>
                  </div>
                </div>
            </div>

            <div class="pm-body clearfix">
              <div class="card-header bgm-cyan">
                  <div class="c-white"align="center"><h2>User List</h2></div>

                  <button class="bgm-bluegray btn btn-default bg btn-float waves-effect waves-circle waves-float" id="useradd"><i class="zmdi zmdi-plus"></i></button>
              </div>
              <div class="table-responsive">
                <table id="data-table-basic" class="table table-striped">

                  <thead>
                    <tr>
                      <th>Created Date</th>
                      <th>User Name</th>
                      <th>Email</th>
                      <!-- <th>Password</th>  -->
                      <th>Team Name</th>
                      <th>Role Name</th>
                      <th>Active Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody id="tbody">
                  </tbody>
                </table>


            </div>

            </div>
        </div>

  </div>


</section>


<!-- /#wrapper -->

<?php include('includes/footer.php');?>

<script>

$(document).ready(function(){

$(document).on('click', '.edit', function(){
    var userid = $(this).attr('id');
    console.log(userid);
    window.location.href = "http://184.68.121.126/dealportal/view/user_edit.php?userID="+userid;

});

$.ajax({
  url:'../controller/page_request.php?request=team_list&action=0',
  success:function(result){
    $("#teamlist").html(result);

  }
});

$.ajax({
  url:'../controller/page_request.php?request=role_list&action=0',
  success:function(result){
    $("#rolelist").html(result);

  }
});


function tablerequest() {
  this.request = "all_user_list";
  this.action = 0;
}
var table;
//table request object
var param = new tablerequest();

table = $('#data-table-basic').DataTable({
  "processing": true,
  "order": [[ 1, 'dsc' ]],
  "ajax":{ "url":'../controller/page_request.php?request=' + param.request + '&action=' + param.action },
  columns: [

    {data: 'createddate'},
    {data: 'username'},
    {data: 'email'},
    {data: 'team_name'},
    {data: 'role_name'},
    {data: 'status'},
    {data: 'button'}
  ]

});

$("#useradd").on('click',function(e){

  window.location.href = "http://184.68.121.126/dealportal/view/user_add.php";
});

});

</script>
</html>
