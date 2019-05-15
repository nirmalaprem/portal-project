<?php
include ('includes/header.php');
include ('includes/topnav.php');
include ('includes/sidebar.php');

$userid=$_GET[userID];
?>
<section id="content">
  <div class="container">
    <div class="block-header">
      <h2 ><a href="#" class="home">User Edit</a></h2>
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
        <div class="card-header">
            <h2>Edit User
                <small>Please update User Information</small>
            </h2>
        </div>
        <div class="card-body card-padding">
          <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-3">

              <form method="POST" enctype="multipart/form-data" name="useraddForm" id="useraddForm" action="">
                <input type="hidden"  id="user_id" name="user_id" value="<?php echo $userid; ?>" />
                <p>
                  <h4 align="center" >Edit User Form</h4>
                </p>

                  <div class="form-group">
                      <div class="fg-line">
                          <input type="text" class="form-control" id="username" name="username" onchange="updateuserinfo(this.value,'username')" placeholder="user Name"  >
                      </div>
                  </div>

                  <div class="form-group">
                      <div class="fg-line">
                          <input type="text" class="form-control"  id="email" name="email" onchange="updateuserinfo(this.value,'email')" placeholder="Email"  >
                      </div>
                  </div>


                  <div class="form-group">
                      <div class="fg-line">
                          <input type="password" class="form-control" id="password" name="password" onchange="updateuserinfo(this.value,'password')" placeholder="passsword"  >
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="fg-line">
                          <select class="form-control intselect" id="team" name="team" onchange="updateuserinfo(this.value,'team')"  >

                            </select>
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="fg-line">
                          <select class="form-control intselect" id="role" name="role" onchange="updateuserinfo(this.value,'role')"  >

                            </select>
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="fg-line">
                          <select class="form-control intselect" id="status" name="status" onchange="updateuserinfo(this.value,'status')"  >
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                          </select>
                      </div>
                  </div>
                  <br />
                  <br />
                  <div align="center" id="message" style="color:red;font-weight:bold;font-size:15px">
                  </div>
                  <br />
                  <br />
                  <!--<p align="center">
                    <input type="submit" class="btn-primary btn-lg" id="useraddsubmit" name="useraddsubmit" value="Add User">
                  </p>
                  <br />  -->

              </form>

            </div>

            <div class="col-sm-1">

            </div>

          </div>
        </div>


    </div>
    <div class="create_main_btn"><a href="http://184.68.121.126/dealportal/view/user_team.php" style="color:#FFF; text-align: center; width: 100%; margin-top: 12px;" class="zmdi zmdi-long-arrow-return"></a></div>
  </div>


</section>


<!-- /#wrapper -->

<?php include('includes/footer.php');?>


<script>

$.ajax({
  url:'../controller/page_request.php?request=team_list&action=1',
  success:function(result){

    var json = $.parseJSON(result);
    var option='<option value="0" disabled selected > - Select Team - </option>';

    for (var i=0;i<json.length;++i)
    {
        option+='<option value="'+json[i].id+'">'+json[i].team_name+'<option/>';
    }
    $("#team").html(option);

  }
});

$.ajax({
  url:'../controller/page_request.php?request=role_list&action=1',
  success:function(result){
    var json = $.parseJSON(result);
    var option='<option value="0" disabled selected > - Select Role - </option>';

    for (var i=0;i<json.length;++i)
    {
        option+='<option value="'+json[i].role_id+'">'+json[i].role_name+'<option/>';
    }
    $("#role").html(option);

  }
});

var user=$("#user_id").val();
$.ajax({
  url:'../controller/page_request.php?request=user_info&action=0&userID='+user,
  success:function(result){

    var json = $.parseJSON(result);

    $("#username").val(json[0].username);
    $("#email").val(json[0].email);
    $("#password").val(json[0].password);
    $("#role").val(json[0].roleid);
    $("#team").val(json[0].teamid);
    $("#status").val(json[0].status);
  }
});

function updateuserinfo(value,idname){


  var user=$("#user_id").val();
console.log(user);
  $("#message").html("");
  var stmt=true;
  if(idname == "username"){

       var SpCharacters = /^[a-z-]+$/;
       if (!SpCharacters.test(value)) {
            $("#message").html("Please use letters and dash(-) only");
           stmt=false;
       }
  }

  if(idname == "email"){

    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    if (filter.test(value)) {
    }else{
      $("#message").html("Please use valid email address ");
      stmt=false;
    }


  }

  if(idname == "password"){
      var strlen=value.length;
      if(strlen < 7){
        $("#message").html("Please use more than 6 letters to password");
        stmt=false;
      }
  }

  if(idname == "team"){
      if(value == "" || value == 0 || value == null){
        $("#message").html("Please select anyone of the team");
        stmt=false;
      }
  }

  if(idname == "role"){
      if(value == "" || value == 0 || value == null){
        $("#message").html("Please select anyone of the role");
        stmt=false;
      }
  }

// Ajax call to update user Info
  if(stmt === true){
    $.ajax({
      url:'../controller/user_db_update.php?userID='+user+'&fieldname='+idname+'&fieldvalue='+value,
      success:function(result){
        console.log(result);
        $("#message").html(result);
      }
    });
  }



}



</script>
