<?php
include ('includes/header.php');
include ('includes/topnav.php');
include ('includes/sidebar.php');

$clientid=$_GET[ClinetID];

?>
<section id="content">
  <div class="container">
    <div class="block-header">
      <h2 ><a href="#" class="home">Send Application Email</a></h2>
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
            <h2>Send Application Email
                <small>Send application email of a client </small>
            </h2>
        </div>
        <div class="card-body card-padding">
          <div class="row">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-4">

              <form method="POST"  enctype="multipart/form-data" name="appemailForm" id="appemailForm" action="">
                <input type="hidden"  id="client_id" name="client_id" value="<?php echo $clientid; ?>" />

                  <div class="col-sm-3">
                    <small >To Address</small>
                  </div>
                  <div class="col-sm-9">
                    <div class="form-group">
                        <div class="fg-line">
                            <input type="text" class="form-control" id="toaddress" name="toaddress" value="apps@creditcanada.net" placeholder="To Address"  >
                        </div>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <small >Subject : </small>
                  </div>
                  <div class="col-sm-9">
                    <div class="form-group">
                        <div class="fg-line">
                            <input type="text" class="form-control"  id="subject" name="subject"  placeholder="Subject" disabled   >
                        </div>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <small >Attachments : </small>
                  </div>

                  <div class="col-sm-9">
                      <div class="checkbox">
                        <label>
                            <input type="checkbox"  checked name="ccagreement" id="ccagreement">
                            <i class="input-helper"></i>
                            <span id="cclink">CC Agreement</span>
                        </label>
                      </div>
                      <br />
                      <div class="checkbox">
                      <label>
                          <input type="checkbox" checked name="financeagreement" id="financeagreement">
                          <i class="input-helper"></i>
                          <span id="financelink">Finance Agreement</span>
                      </label>
                      </div>
                <div class="checkbox" id="mattressAgreementContainer" style="display: none;">
                      <label>
                          <input type="checkbox" name="mattressfinanceagreement" id="mattressfinanceagreement">
                          <i class="input-helper"></i>
                          <span id="mattressfinancelink">Mattress Finance Agreement</span>
                      </label>
                      </div>

                  </div>
                  <div class="col-sm-12" align="center">
                    <textarea id="mcontent" name="mcontent" hidden="hidden"></textarea>
                    <input type="text"   id="mailsubject" name="mailsubject"  hidden  >
                    <br /></div>
                  <div class="col-sm-12" align="center">
                    <div class="form-group">
                        <div class="fg-line">
                            <button class="sendAppemail btn btn-danger btn-sm" name="sendappemail" id="sendappemail" >Send Email</button>
                        </div>
                    </div>
                  </div>

                  <div align="center" id="message" style="color:red;font-weight:bold;font-size:15px">
                  </div>
                  <br />
                  <br />

              </form>

            </div>

            <div class="col-sm-1"></div>
            <div class="col-sm-4">

              <div class="messages card">
                    <div class="m-sidebar">
                        <header>
                            <h2 class="hidden-xs">Mail Content</h2>
                        </header>

                        <div class="list-group c-overflow mCustomScrollbar _mCS_3 mCS-autoHide" style="position: relative; overflow: visible;"><div id="mCSB_3" class="mCustomScrollBox mCS-minimal-dark mCSB_vertical_horizontal mCSB_outside" style="max-height: none;" tabindex="0"><div id="mCSB_3_container" class="mCSB_container mCS_x_hidden mCS_no_scrollbar_x" style="position: relative; top: 0px; left: 0px; width: 100%;" dir="ltr">
                            <a class="list-group-item media" href="">
                                <div class="pull-left">
                                    <!--<img src="img/demo/profile-pics/4.jpg" alt="" class="lgi-img mCS_img_loaded"> -->
                                </div>
                                <div class="media-body">
                                  <div id="mailcontent"></div>
                                </div>
                            </a>

                        </div></div><div id="mCSB_3_scrollbar_vertical" class="mCSB_scrollTools mCSB_3_scrollbar mCS-minimal-dark mCSB_scrollTools_vertical" style="display: block;"><div class="mCSB_draggerContainer"><div id="mCSB_3_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 50px; height: 200px; top: 0px; display: block; max-height: 310px;" oncontextmenu="return false;"><div class="mCSB_dragger_bar" style="line-height: 50px;"></div></div><div class="mCSB_draggerRail"></div></div></div><div id="mCSB_3_scrollbar_horizontal" class="mCSB_scrollTools mCSB_3_scrollbar mCS-minimal-dark mCSB_scrollTools_horizontal" style="display: none;"><div class="mCSB_draggerContainer"><div id="mCSB_3_dragger_horizontal" class="mCSB_dragger" style="position: absolute; min-width: 50px; width: 0px; left: 0px;" oncontextmenu="return false;"><div class="mCSB_dragger_bar"></div></div><div class="mCSB_draggerRail"></div></div></div></div>

                    </div>

                </div>

            </div>

          </div>
        </div>


    </div>
    <div class="create_main_btn"><a href="dashboard.php" style="color:#FFF; text-align: center; width: 100%; margin-top: 12px;" class="zmdi zmdi-long-arrow-return"></a></div>
  </div>


</section>


<!-- /#wrapper -->

<?php include('includes/footer.php');?>


<script>

var clientid=$("#client_id").val();
$.ajax({
  url:'../controller/email_application.php?client_id='+clientid,
  success:function(result){

    var json = $.parseJSON(result);

    
    $("#subject").val(json.subject);
    $("#mailsubject").val(json.subject);
    $("#mcontent").val(json.content);
    $("#mailcontent").html(json.content);
    $("#ccagreement").val(json.ccfile);
    $("#financeagreement").val(json.financefile);
    
    $("#cclink").html(json.ccfilelink);
    $("#financelink").html(json.financefilelink);

    if(json.mattressAgreement == 1)
    {
      $("#mattressAgreementContainer").show();
      $("#mattressfinanceagreement").attr('checked',"true");
      $("#mattressfinanceagreement").val(json.mattressfinancefile);
      $("#mattressfinancelink").html(json.mattressfinancefilelink);
    }

  }
});

$("#appemailForm").on('submit',function(e){

  if ($('#appemailForm').valid()) {

      $("#message").html("<img src='assets/images/loading.gif' width='35' height='35' />");
      $.ajax( {
        url: '../controller/send_app_email.php',
        type: 'POST',
        data: $('#appemailForm').serializeArray(),
        success: function(data, textStatus, jqXHR)
          {
            $("#message").html(data);
          }
      } );

  }
  e.preventDefault();
});







</script>
