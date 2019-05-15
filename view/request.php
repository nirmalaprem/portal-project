<?php include('includes/header.php');?>
<div id="page-wrapper">

	<div class="container-fluid">

		<!-- Page Heading -->
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
					Requests <small>New requests List</small>
				</h1>

			</div>
		</div>
		<!-- /.row -->


		<div class="row">

			<div class="col-lg-12">

				<div class="table-responsive">
					<ol class="breadcrumb">
						<li class="active">
							<i class="fa fa-bell"></i>
						</li>
					</ol>
				</div>
				<table id="service_table" class="table table-bordered table-hover table-striped">
					<thead>
						<tr>
							<th>Created Date</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Email</th>
							<th>Phone</th>
							<th>DOB</th>
							<th>Agent</th>
							<th>Product Name</th>
							<th>CAT Card</th>

						</tr>
					</thead>
					<tbody id="tbody">
					</tbody>
				</table>

			</div>
		</div>
		<!-- /.row -->

		<?php
		if($_SESSION['user']['level'] == 1 || $_SESSION['user']['level'] == 3){
			include ('includes/info_form.php');

		}else{
			include ('includes/info_form_readonly.php');
		}


		?>



	</div>
	<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->



</body>


<?php include('includes/footer.php');?>
<script>
$(document).ready(function(){
	/***
	Returns static vars to only be used in table
	list ajax call
	!!!change var action according to page
	***/
	function tablerequest() {
		this.request = "list";
		this.action = 0;
	}
	//table request object
	var param = new tablerequest();
	//GLOBAL
	var result;
	var table;
	var cust_id;
	var locked = 0;

	table = $('#service_table').DataTable({

		"processing": true,
		"order": [[ 0, 'desc' ]],
		"ajax": {
			"url": "../controller/page_request.php?request=" + param.request + "&action=" + param.action,
		},
		columns: [
			{data: 'createddate'},
			{data: 'first_name'},
			{data: 'last_name'},
			{data: 'email'},
			{data: 'phone'},
			{data: 'dob'},
			{data: 'agent'},
			{data: 'product_name'},
			{data: 'CAT_include'}
		]
	});







});













</script>

</html>
