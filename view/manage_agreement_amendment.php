<?php
include ('includes/header.php');
include ('includes/topnav.php');
include ('includes/sidebar.php');
?>
<section id="content">
  <div class="container">
    <div class="block-header">
      <h2 ><a href="#" class="home">Manage Agreement Amendment</a></h2>
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

      <div  class="card">
          <!-- <p align="center" >
            <a target="_blank" href="http://184.68.121.126/dealportal/view/agreement_amendment.php" class="btn btn-success btn-sm" >Create New Agreement Amendment </a>
          </p>  -->

          <div class="table-responsive">
            <table id="data-table-basic" class="table table-striped">

              <thead>
                <tr>
                  <th>Created Date</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Address Info</th>
                  <th>Agreement File</th>
                  <th>Created By</th>
                </tr>
              </thead>
              <tbody id="tbody">
              </tbody>
            </table>


        </div>

    </div>
    <div class="create_main_btn"><a href="http://184.68.121.126/dealportal/view/agreement_amendment.php"  alt="Create New Agreement" style="color:#FFF; text-align: center; width: 100%; margin-top: 12px;" class="zmdi zmdi-plus"></a></div>
  </div>
</section>
<!-- /#wrapper -->
</body>
<?php include('includes/footer.php');?>

<script>



  $(document).ready(function(){

    function tablerequest(){
      this.request = "agreementInfo";
      this.action = 0;
    }

    var table;
    var param = new tablerequest();

    table = $('#data-table-basic').DataTable({
      "processing": true,
      "order": [[ 1, 'dsc' ]],
      "ajax": { "url":'../controller/page_request.php?request=' + param.request + '&action=' + param.action, },
      columns: [
        /*{
          "data": null,
          "className":      'details-control',
          "defaultContent": '',
          "bSortable": false,
          "mRender": function (o) { return '<a class="details-control btn btn-info btn-xs glyphicon glyphicon-plus" href="javascript:void(0);">' + '' + '</a>'; }
        },*/
        {data: 'createddate'},
        {data: 'firstname'},
        {data: 'lastname'},
        {data: 'email'},
        {data: 'phonenumber'},
        {data: 'address'},
        {data: 'agreefile'},
        {data: 'createdby'}
      ]

    });


  });


  $(".refresh").on('click', function(event) {

    try{
      table.ajax.reload();
    }catch(e){
      //console.log("Table is blank!");
    }
  });





  </script>
  </html>
