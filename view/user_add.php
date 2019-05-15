<?php
include ('includes/header.php');
include ('includes/topnav.php');
include ('includes/sidebar.php');
?>
<section id="content">
  <div class="container">
    <div class="block-header">
      <h2 ><a href="#" class="home">User Add</a></h2>
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
            <h2>Add New User
                <small>Please Fill up the User Information</small>
            </h2>
        </div>
        <div class="card-body card-padding">
          <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-3">

              <form method="POST" enctype="multipart/form-data" name="useraddForm" id="useraddForm" action="">
                <p>
                  <h4 align="center" >Add New User Form</h4>
                </p>

                  <div class="form-group">
                      <div class="fg-line">
                          <input type="text" class="form-control" id="username" name="username" placeholder="user Name"  >
                      </div>
                  </div>

                  <div class="form-group">
                      <div class="fg-line">
                          <input type="text" class="form-control"  id="email" name="email" placeholder="Email"  >
                      </div>
                  </div>


                  <div class="form-group">
                      <div class="fg-line">
                          <input type="password" class="form-control" id="password" name="password" placeholder="passsword"  >
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="fg-line">
                          <select class="form-control intselect" id="team" name="team"   >

                            </select>
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="fg-line">
                          <select class="form-control intselect" id="role" name="role"  >

                            </select>
                      </div>
                  </div>
                  <br />
                  <p align="center">
                    <input type="submit" class="btn-primary btn-lg" id="useraddsubmit" name="useraddsubmit" value="Add User">
                  </p>
                  <br />
                  <div align="center" id="message" style="color:red;font-weight:bold;font-size:15px">
                  </div>
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


$('#useraddForm').submit( function( e ) {

    if ($('#useraddForm').valid()) {

        $("#message").html("<img src='assets/images/loading.gif' width='35' height='35' />");
        $.ajax( {
          url: '../controller/user_db_add.php',
          type: 'POST',
          data: $('#useraddForm').serializeArray(),
          success: function(data, textStatus, jqXHR)
            {
              $("#message").html(data);
            }
        } );

    }
    e.preventDefault();
  });


  $('#useraddForm').validate({
    rules: {
        username: {
            required: true,
            lettersonly:true,
        },
        email: {
            required: true,
            email:true,
        },
        password: {
            required: true,
        },
        team: {
            required: true,
        },
        role: {
            required: true,
        },

    },
    messages: {
      username: {
          required: "Please Enter A User Name",
      },
      email: {
          required: "Please Enter A Email Address",
      },
      password: {
          required: "Please Enter A Password",
      },
      team: {
          required: "Please Select A Team",
      },
      city: {
          required: "Please Select A Role",
      },

    },
    /*errorPlacement: function(error, element) {
        error.insertAfter('.form-group'); //So i putted it after the .form-group so it will not include to your append/prepend group.
        //element.After(error);
    },*/
    highlight: function(element) {
        $(element).closest('.form-group').addClass('has-error');
    },
    unhighlight: function(element) {
        $(element).closest('.form-group').removeClass('has-error');
    }
});

jQuery.validator.addMethod("lettersonly", function(value, element)
{
return this.optional(element) || /^[a-z-]+$/i.test(value);
}, "Letters and dash (-) only please");

</script>
