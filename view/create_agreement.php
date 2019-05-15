<?php
include ('includes/header.php');
include ('includes/topnav.php');
include ('includes/sidebar.php');


?>
<section id="content">
  <div class="container">
    <div class="block-header">
      <h2 ><a href="#" class="home">Canada Credit Agreement </a></h2>
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
            <h2>Canada Credit Agreement Form
                <small>Please Fill up the customer Information</small>
            </h2>
        </div>
        <div class="card-body card-padding">
          <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-3">

              <form method="POST" enctype="multipart/form-data" name="agreementForm" id="agreementForm" action="">

                <!--<p>
                  <h4 align="center" >Canada Credit Agreement Form</h4>
                </p><div class="form-group">
                    <div class="fg-line">
                        <input type="text" class="form-control date-picker" id="agreementdate" name="agreementdate" data-toggle="dropdown" placeholder="Click here..." >
                    </div>
                </div> -->

                  <div class="form-group">
                      <div class="fg-line">
                          <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name" required >
                      </div>
                  </div>

                  <div class="form-group">
                      <div class="fg-line">
                          <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name" >
                      </div>
                  </div>

                  <div class="form-group">
                      <div class="fg-line">
                          <input type="text" class="form-control"  id="email" name="email" placeholder="Email" >
                      </div>
                  </div>

                  <div class="form-group">
                      <div class="fg-line">
                          <input type="text" class="form-control" id="phonenumber" name="phonenumber" placeholder="Phone Number" >
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="fg-line">
                          <input type="text" class="form-control" id="address" name="address" placeholder="Address" >
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="fg-line">
                          <input type="text" class="form-control" id="city" name="city" placeholder="City" >
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="fg-line">
                        <select class="form-control intselect" id="province" name="province"  >
                            <option value="0"> - Select Province - </option>
                            <option value="AB">Alberta</option>
                            <option value="BC">British Columbia</option>
                            <option value="SK">Saskatchewan</option>
                            <option value="MB">Manitoba</option>
                            <option value="ON">Ontario</option>
                            <option value="QC">Quebec</option>
                            <option value="NB">New Brunswick</option>
                            <option value="PE">PEI</option>
                            <option value="NS">Nova Scotia</option>
                            <option value="NL">Newfoundland and Labrador</option>
                            <option value="YT">Yukon</option>
                            <option value="NT">Northwest Territories</option>
                            <option value="NU">Nunavut</option>
                          </select>

                      </div>
                  </div>
                  <div class="form-group">
                      <div class="fg-line">
                          <input type="text" class="form-control" id="postalcode" name="postalcode" placeholder="Postal Code" >
                      </div>
                  </div>

                  <br />
                  <p align="center">
                    <input type="submit" class="btn-warning btn-lg" id="generateagreement" name="generateagreement" value="Generate Agreement">
                  </p>
                    <br />
                    <br />
                  <div class="form-group">
                    <div id="downloadPDF" ></div>
                  </div>
              </form>

            </div>
            <div class="col-sm-1">

            </div>
            <div class="col-sm-3">
              <div class="form-group">
                  <div class="fg-line">
                    <p class="f-500 m-b-15 c-black">Basic Example</p>  
                    <div class="select">
                      <select id="product" name="product" class="form-control">
                          <option value="" disabled selected> -- Select Product -- </option>
                          <option value="2">2 in 1 Credit Transfer</option>
                          <option value="1">Premium Credit Advise</option>
                      </select>
                    </div>

                  </div>
              </div>
              <div class="form-group">
                  <div class="fg-line">
                      <input type="text" class="form-control date-picker" id="setupdate" name="setupdate" data-toggle="dropdown" placeholder="Setup Fee Date..." >
                  </div>
              </div>
              <div class="form-group">
                  <div class="fg-line">
                      <input type="text" class="form-control date-picker" id="reoccurdate" name="reoccurdate" data-toggle="dropdown" placeholder="Reoccur Fee Date..." >
                  </div>
              </div>
              <div class="form-group">
                <div class="fg-line">
                    <input type="text" class="form-control" id="setupfee" name="setupfee" placeholder="Setup Fee" >
                </div>
              </div>
              <div class="form-group">
                <div class="fg-line">
                    <input type="text" class="form-control" id="reoccurfee" name="reoccurfee" placeholder="Reoccur Fee" >
                </div>
              </div>
              <div class="form-group">
                <div class="fg-line">
                  <div class="checkbox">
                  <label>
                      <input type="checkbox"  name="emtpayment" id="emtpayment">
                      <i class="input-helper"></i>
                      <span id="financelink">Paying By EMT</span>
                  </label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


    </div>
    <div class="create_main_btn"><a href="http://184.68.121.126/dealportal/view/manage_agreement_amendment.php" style="color:#FFF; text-align: center; width: 100%; margin-top: 12px;" class="zmdi zmdi-long-arrow-return"></a></div>
  </div>


</section>


<!-- /#wrapper -->

<?php include('includes/footer.php');?>


<script>


/*$("#firstname").on('change', function() {
  var fname=$('#firstname').val();
  if($('#lastname').val() != ""){
    fname+= " "+$('#lastname').val();
  }
  $('#a_firstname').html(fname);
  $('#a_first_name').html(fname);

});

$("#lastname").on('change', function() {
    var name=$('#firstname').val();
    name+=" "+$('#lastname').val();
    $('#a_firstname').html(name);
    $('#a_first_name').html(name);
});

$("#email").on('change', function() {
  $('#a_email').html($('#email').val());
});

$("#phonenumber").on('change', function() {
  $('#a_phonenumber').html($('#phonenumber').val());
});

$("#address").on('change', function() {
  $('#a_address').html($('#address').val());
});

$("#city").on('change', function() {
  $('#a_city').html($('#city').val());
});

$("#province").on('change', function() {
  $('#a_province').html($('#province').val());
});

$("#postalcode").on('change', function() {
  $('#a_code').html($('#postalcode').val());
});

$("#incrsuf").on('change', function() {
  $('#a_diffsuf').html($('#incrsuf').val());
  var diffsuf= $('#incrsuf').val();
  if(diffsuf!=""){
    $('#decsuf').attr('readonly', true);
    $("#decsuf-error").hide();
    $("#decsuf-error").parent('div').removeClass('has-error');
    $('#a_diff_suf').html('');
    }else{
      $('#decsuf').attr('readonly', false);
        //$('#a_diffsuf').html('<em style="color: #f00; font-weight:bold;">[NEW SUF COST]</em>');
  }
});
$("#decsuf").on('change', function() {
  $('#a_diff_suf').html($('#decsuf').val());
  var diffsuf1= $('#decsuf').val();
  if(diffsuf1!=""){
      $('#incrsuf').attr('readonly', true);
      $("#decsuf-error").hide();
      $("#decsuf-error").parent('div').removeClass('has-error');
    }else{
      $('#incrsuf').attr('readonly', false);
      //$('#a_diff_suf').html('<em style="color: #f00; font-weight:bold;">[NEW SUF COST]</em>');
  }
});

$("#agreementdate").on('blur', function() {
    $('#a_agreementdate').html($('#agreementdate').val());
    $('#a_agdate').html($('#agreementdate').val());
    $('#a_ag_date').html($('#agreementdate').val());

});

$('#agreementForm').submit( function( e ) {

    if ($('#agreementForm').valid()) {

        var incrsuf=$("#incrsuf").val();
        var decsuf=$("#decsuf").val();

        if(incrsuf=="" && decsuf==""){
            $("#decsuf-error").show();
            $("#decsuf-error").parent('div').addClass('has-error');
            return false;
          }else{
            $("#decsuf-error").hide();
              $("#decsuf-error").parent('div').removeClass('has-error');
          }

        $("#downloadPDF").html("<img src='assets/images/loading.gif' width='30' height='30' />");
        $.ajax( {
          url: '../controller/generate_amendmentagreement.php',
          type: 'POST',
          data: $('#agreementForm').serializeArray(),
          success: function(data, textStatus, jqXHR)
            {
              //console.log(data);
              var obj = $.parseJSON(data);
              //console.log(data);
              var filename='http://184.68.121.126/dealportal/view/includes/docs/amendmentPdf/'+obj.filename;
              $("#downloadPDF").html('<strong style="color:red">Agreement Has Been Generated Successfully !!</strong><br /><a target="_blank" href="'+filename+'" class="btn btn_info"> Click To View Agreement</a>');
            }
        } );

    }
    e.preventDefault();
  });




  $('#agreementForm').validate({
    rules: {
        firstname: {
            required: true,
        },
        lastname: {
            required: true,
        },
        agreementdate: {
            required: true,
        },
        email: {
            required: true,
            email:true,
        },
        phonenumber: {
            required: true,
        },
        address: {
            required: true,
        },
        city: {
            required: true,
        },
        province: {
            required: true,
        },
        postalcode: {
            required: true,
        },

    },
    messages: {
      firstname: {
          required: "Please Enter A First Name",
      },
      lastname: {
          required: "Please Enter A Last Name",
      },
      agreementdate: {
          required: "Please Select A Agreement Date",
      },
      email: {
          required: "Please Enter A Email Address",
      },
      phonenumber: {
          required: "Please Enter A Phone Number",
      },
      address: {
          required: "Please Enter A Address",
      },
      city: {
          required: "Please Enter A City",
      },
      province: {
          required: "Please Select A Province",
      },
      postalcode: {
          required: "Please Enter A Postal Code",
      },

    },

    highlight: function(element) {
        $(element).closest('.form-group').addClass('has-error');
    },
    unhighlight: function(element) {
        $(element).closest('.form-group').removeClass('has-error');
    }
});

*/




</script>
