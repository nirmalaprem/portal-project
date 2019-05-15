<?php
include ('includes/header.php');
include ('includes/topnav.php');
include ('includes/sidebar.php');


?>
<section id="content">
  <div class="container">
    <div class="block-header">
      <h2 ><a href="#" class="home">Agreement Amendment</a></h2>
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
            <h2>Agreement Amendment Form
                <small>Please Fill up the customer Information</small>
            </h2>
        </div>
        <div class="card-body card-padding">
          <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-3">

              <form method="POST" enctype="multipart/form-data" name="agreementForm" id="agreementForm" action="">
                <p>
                  <h4 align="center" >Agreement Amendment Form</h4>
                </p>
                <div class="form-group">
                    <div class="fg-line">
                        <input type="text" class="form-control date-picker" id="agreementdate" name="agreementdate" data-toggle="dropdown" placeholder="Click here..." >
                    </div>
                </div>

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
                  <div class="form-group">
                      <div><b>New SUF Cost</b></div>
                      </br>
                      <div class="fg-line">
                          <input type="text" class="form-control" id="incrsuf" name="incrsuf" placeholder="Increase In Membership Fee" >
                      </div>
                      <div class="fg-line">
                          <input type="text" class="form-control" id="decsuf" name="decsuf" placeholder="Decrease In Membership Fee" >
                      </div>
                      <div id="decsuf-error" style="display:none;">Please Enter Any Membership Fee</div>
                  </div>
                  <br />
                  <p align="center">
                    <input type="submit" class="btn-warning btn-lg" id="agreementamendment" name="agreementamendment" value="Generate Amendment Agreement">
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
            <div class="col-sm-7">

            <style>
             body {
             font-family: Arial, Helvetica, sans-serif;

             }
             .col_25 {
             width: 170px;
             vertical-align:top;
             }
             .col_20 {
             width:200px;
             vertical-align:top;
             }
             .col_100 {
             /*width:696px;*/
             width:100%;
             }
             .col_40 {
             width: 300px;
             vertical-align:top;
             }
             .col_50 {
             width: 344px;
             vertical-align:top;
             }
             .col_30 {
             width:400px;
             vertical-align:top;
             font-size:45px;
             }
             .col_70 {
             width:480px;
             vertical-align:top;
             }
             p {
             font-size:9px;
             line-height: 12px;
             margin-top:0px;
             padding-left: 5px;
             padding-right:5px;
             }
             .upper {
             text-transform:uppercase;
             }
             .center {
             text-align:center;
             margin-left:auto;
             margin-right:auto;
             display:block;
             }
             .border {
             border: 1px solid #ddd;
             }
             table {
             font-size:9px;
             line-height: 12px;
             margin: 5px auto;
             }
             td {
             padding-top:5px;
             padding-bottom:5px;
             vertical-align: top;
             }
             th {
             padding-top: 10px;
             padding-bottom: 0;
             }
             table.add-on {
             font-size:9px;
             line-height: 12px;
             margin: 5px auto;
             }
             table.add-on td {
             border: solid;
             border-width: thin;
             padding: 5px;
             border-color: #225815;
             vertical-align: middle;

             }
             h1 {
             font-weight:bold;
             text-transform: uppercase;
             font-size: 14px;
             }
             .orange {
             background: #225815;
             color: #fff;
             text-align: center;
             vertical-align: middle;
             }
             .orange2 {
             color: #225815;
             text-transform: uppercase;
             font-weight: bold;
             font-size:10px;
             }
             p{
               font-size: 14px;
             }
             </style>

           <!--<page backtop="7mm" backbottom="7mm" backleft="5mm" backright="5mm"> -->
           <table cellspacing="2" class="col_100" >
               <tr>
                   <td class="col_30"><img src="http://checkout.creditcanada.net/view/assets/images/logo.png" /></td>
                   <td class="col_60" style="color: #225815; padding: 5px; vertical-align: middle; text-align: right;"><h1>CANADA CREDIT IMPROVEMENT SYSTEM AMENDMENT AGREEMENT</h1></td>
               </tr>
           </table>

           <table cellspacing="2" class="col_100" >
               <tr>
                   <th class="orange " colspan="3"><h1>GENERAL TERMS and CONDITIONS</h1></th>
               </tr>
               <tr>
                   <td class="border col_20"><p><strong>This Amendment Agreement made on the </strong></p>
                       <p>Date: <br /><br />
                           <span id="a_agreementdate"><em style="color: #f00; font-weight:bold;">[DATE]</em></span></p></td>
                   <td class="border col_30"><p><strong>Between the Membership Applicant </strong></p>
                       <p>Name: <span id="a_firstname"><em style="color: #f00; font-weight:bold;">[NAME]</em></span><br /><br />
                           Email: <span id="a_email"><em style="color: #f00; font-weight:bold;">[EMAIL]</em></span><br /><br />
                           Tel (Home): <span id="a_phonenumber"><em style="color: #f00; font-weight:bold;">[PHONE]</em></span><br /><br />
                           Address: <span id="a_address"><em style="color: #f00; font-weight:bold;">[ADDRESS]</em></span><br /><br />
                           City: <span id="a_city"><em style="color: #f00; font-weight:bold;">[CITY]</em></span><br /><br />
                           Province: <span id="a_province"><em style="color: #f00; font-weight:bold;">[PROVINCE]</em></span><br /><br />
                           Postal Code: <span id="a_code"><em style="color: #f00; font-weight:bold;">[CODE]</em></span></p></td>
                   <td class="border col_40"><p><strong>And the Membership provider offering <br />services and assistance with credit related matters</strong></p>
                       <p>Canada Credit (Provider)<br /><br />
                           9625 Macleod Trail SW<br /><br />
                           Calgary, Alberta T2J 0P6<br /><br />
                           1-866-530-3646<br /><br />
                           (403) 301-5380 (fax)</p></td>
               </tr>
           </table>

           <table cellspacing="2" class="col_100">
               <tr>
                   <th class="orange col_100" colspan="3"><h1>AMENDMENT AGREEMENT</h1></th>
               </tr>
               <tr>
                   <td class="col_100">
               <p>I <u><span id="a_first_name"><em style="color: #f00; font-weight:bold;">[NAME]</em></span></u> hereby amend my Canada Credit Improvement Membership Agreement, and SkyCap Finance Agreement dated <u><span id="a_ag_date"><em style="color: #f00; font-weight:bold;">[DATE]</em></span></u> (the Agreements) as follows:</p>
                   </td>
               </tr>
           <tr>
                <td class="col_100">
                  <div id="increaseDiv">
               <p><strong>Option 1</strong></p>
               <ul>
                 <li><p>Adding the Use of Tablet Computer or Portable Computer during the term of the Agreement</p></li>
                 <li><p>Adding the CAT Platinum Visa Card&trade; with up to $100.00 Pre-loaded to Card </p></li>
                 <li><p>Increase in Membership Fee, Principal Amount and First Payment of <u><span id="a_diffsuf"><em style="color: #f00; font-weight:bold;">[NEW SUF COST]</em></span></u>.</p></li>
               </ul>
                </div>
                <div id="decreaseDiv">
               <p><strong>Option 2</strong></p>
               <ul>
                 <li><p>Removing the Use of Tablet Computer or Portable Computer during the term of the Agreement</p></li>
                 <li><p>Removing the CAT Platinum Visa Card&trade; with up to $100.00 Pre-loaded to Card </p></li>
                 <li><p>Decrease in Membership Fee, Principal Amount and First Payment of <u><span id="a_diff_suf"><em style="color: #f00; font-weight:bold;">[NEW SUF COST]</em></span></u>.</p></li>
               </div>
               </li>
                   </td>
               </tr>
           <tr>
                   <td class="col_100">
               <p>This Amending Agreement referentially incorporates the Agreements, and does not otherwise modify the Agreements.</p>
               <p>For greater certainty, the  Amending Agreement does not change the number or frequency of Periodic Payments due, nor the Cost of Borrowing under the Agreements.</p>
               <p>This Amending Agreement to the Agreements is executed by digital signature by all Parties, effective as of the date indicated below.</p>
                   </td>
               </tr>
           </table>


           <table cellspacing="2" class="col_100">
               <tr>
                   <td class="border col_20" style="height: 80px;"><p>Date: <br /><br />
                       <span id="a_agdate"><em style="color: #f00; font-weight:bold;">[DATE]</em></span></p></td>
                   <td class="border col_30" style="height: 80px;">
                       <p>Customer Signature: <br />
                           <img style=" width:100px;margin: 0px;" src="[SIGN]" />
                       </p>
                   </td>
                   <td class="border col_30" style="height: 80px;"><p>Canada Credit Signature: <br />
                       <img style=" width:75px;margin: 0px; float:right" src="http://checkout.creditcanada.net/view/assets/images/Sheldon.png"  /></p></td>
               </tr>
           </table>
           <!--</page> -->

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


$("#firstname").on('change', function() {
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
        /*$('#a_diffsuf').html('<em style="color: #f00; font-weight:bold;">[NEW SUF COST]</em>');*/
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
      /*$('#a_diff_suf').html('<em style="color: #f00; font-weight:bold;">[NEW SUF COST]</em>');*/
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


  /*$.validator.addMethod("email", function(value, element)
   {
     var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
     return regex.test(email);
   }, "Please enter a valid email address.");*/


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
        /*diffsuf: {
            required: true,
        },
        diffsuf1: {
            required: true,
        },*/
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
    /*  diffsuf: {
          required: "Please Enter A Difference In Suf",
      },
      diffsuf1: {
          required: "Please Enter A Difference In Suf",
      },*/
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

  /*$("#firstname").keypress(function () {
    $('#a_firstname').html($('#firstname').val());
  });
  $("#lastname").keypress(function () {
    var name=$('#firstname').val();
    name+=$('#lastname').val();
    $('#a_firstname').html(name);
  });*/




</script>
