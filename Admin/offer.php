<?php
//order.php    offer.php

include('database_connection.php');

include('function.php');

if(!isset($_SESSION['type']))
{
	header('location:login.php');
}

include('header.php');


?>

<!-- auto complete -->
<?php 


$query = "SELECT distinct comp FROM offer";

$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
// $filtered_rows = $statement->rowCount();
// print_r($result);
$skillData = array(); 
$i=0;
foreach($result as $row)
{
	// echo $row['comp'];
	$data['id'] = $i;
     $data['value'] = $row['comp'];
     array_push($skillData, $data);
     $i++;
}




?>



	<link rel="stylesheet" href="css/datepicker.css">
	<script src="js/bootstrap-datepicker1.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
	

	<!-- jQuery -->
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
	 
	<!-- jQuery UI -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
 
	<!-- date picker -->
	<script>
		$(document).ready(function(){
			$('#offer_date').datepicker({
				format: "yyyy-mm-dd",
				autoclose: true
			});
	});
	</script>

	<span id="alert_action"></span>
	<div class="row">
		<div class="col-lg-12">
			
			<div class="panel panel-default">
                <div class="panel-heading">
                	<div class="row">
                    	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
                            <h3 class="panel-title">Offer List</h3>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6" align="right">
                            <button type="button" name="add" id="add_button" class="btn btn-success btn-xs">Add</button>    	
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                	<table id="order_data" class="table table-bordered table-striped">
                		<thead>
							<tr>
								<th>Offerr ID</th>
								<th>Student ID</th>
								<th>Company</th>
								<th>Package</th>
								<th>Bond</th>
								<th>Offer Date</th>
								<!--<?php
								// if($_SESSION['type'] == 'master')
								// {
									// echo '<th>Created By</th>';
								// }
								?> -->

								<th></th>
								<th></th>
								<!-- <th></th> -->
							</tr>
						</thead>
                	</table>
                </div>
            </div>
        </div>
    </div>


    <!-- form to add data -->
     <span id="span_product_details"></span>
    <div id="orderModal" class="modal fade">

    	<div class="modal-dialog">
    		<form method="post" id="order_form">
    			<div class="modal-content">
    				<div class="modal-header">
    					<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"><i class="fa fa-plus"></i> Create Offer</h4>
    				</div>
    				<div class="modal-body">
    					<div class="row">
    						<div id="select-box"></div>
    						<div id="student-data">
							<div class="col-md-6">

								<div class="form-group">
									<label id="students-label">Enter Students Name</label>
									<input type="text" name="name" id="name" class="form-control" required />
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label id="students-label">Class</label>
									<input type="text" name="cls" id="cls" class="form-control" required />
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label id="students-label">Division</label>
									<input type="text" name="division" id="division" class="form-control" required />
								</div>
							</div>
							</div>
							
							
    						<div class="col-md-8">
							<label>Enter Company Name </label>
							<input type="text" name="comp[]" id="comp" class="form-control" required />
							

							<script type="text/javascript">
							
									var passedArray = <?php echo json_encode($skillData); ?>;
									$(document).ready(function(){
							    	console.log(passedArray);
							    	$("#comp").autocomplete({
							    	source: passedArray,
							    	autoFocus:true,
							    	});
							    	});
							</script>


							<label> Package </label>
							<input type="float" name="package[]" id="package" class="form-control" required />

							<label> Bond </label>
							<input type="float" name="bond[]" id="bond" class="form-control" required />

							<label>Date</label>
							<input type="text" name="offer_date[]" id="offer_date" class="form-control" required />
							<div class="col-md-1">
								<button type="button" name="add_more" id="add_more" class="btn btn-success btn-xs">+</button>
							</div>

							<div class="form-group" id="add-fields"> 
	
    						</div>
    						</div>



						</div>


							<!-- <span id="row"> -->

    					<div class="modal-footer">
    						<input type="hidden" name="inventory_order_id" id="inventory_order_id" />
    						<input type="hidden" name="btn_action" id="btn_action" />
    						<input type="submit" name="action" id="action" class="btn btn-info" value="Add" />
    					</div>
    				</div>
    			</div>
    		</form>
    	</div>

    </div>
		
<script type="text/javascript">

    $(document).ready(function(){

    	var orderdataTable = $('#order_data').DataTable({
			"processing":true,
			"serverSide":true,
			"order":[],
			"ajax":{
				url:"offer_fetch.php",
				type:"POST"
			},
			<?php
			if($_SESSION["type"] == 'master')
			{
			?>
			// "columnDefs":[
			// 	{
			// 		"targets":[4, 5, 6, 7, 8, 9],
			// 		"orderable":false,
			// 	},
			// ],
			<?php
			}
			else
			{
			?>
			"columnDefs":[
				{
					"targets":[4, 5, 6, 7, 8],
					"orderable":false,
				},
			],
			<?php
			}
			?>
			"pageLength": 10
		});

    	// prompt is displayed which contains form
		$('#add_button').click(function(){
			$('#orderModal').modal('show');
			$('#order_form')[0].reset();
			$('.modal-title').html("<i class='fa fa-plus'></i> Create Order");
			$('#action').val('Add');
			$('#btn_action').val('Add');
			$('#span_product_details').html('');
			$('#add-fields').empty();
			$('#name, #cls, #division, #students-label').show();
			$('#name, #cls, #division').prop('required',true);
			$('#select-box').html('');
			// $('#pid').addAttr('')
			// add_product_row();
		});

		var count = 1;
		// new input fields are added in the form
		function add_product_row(count = '')
		{
			var html = '';
			html += '<span id="row'+count+'">'
			html += '<br> </br><label>Enter Company Name </label>';
			html += '<input type="text" name="comp[]" id="comp" class="com form-control" required />';

			html += '<label> Package </label>';
			html += '<input type="float" name="package[]" id="package" class="form-control" required />';

			html += '<label> Bond </label>';
			html += '<input type="float" name="bond[]" id="bond" class="form-control" required />';

			html += '<label>Date</label>';
			html += '<input type="date" name="offer_date[]" id="#offer_date" class="form-control" required />'

			html += '<div class="col-md-1">';
				if(count == '')
				{
					html += '<button type="button" name="add_more" id="add_more" class="btn btn-success btn-xs">+</button>';
				}
				else
				{
					html += '<button type="button" name="remove" id="'+count+'" class="btn btn-danger btn-xs remove">-</button><br>';
				}
			html += '</div>';
			html += '</span>';

													
			$('#add-fields').append(html);

			// var passedArray = <?php echo json_encode($skillData); ?>;
			// $(document).ready(function(){
			// 	console.log(passedArray);
			// 	$(".com").autocomplete({
			// 		source: passedArray,
			// 		autoFocus:true,
			// 	});
			// });

			// $('.selectpicker').selectpicker();
		}

		

		//to add input more input fields
		$(document).on('click', '#add_more', function(){
			count = count + 1;
			add_product_row(count);
		});


		// to remove added input fields
		$(document).on('click', '.remove', function(){
			var row_no = $(this).attr("id");
			$('#row'+row_no).remove();
		});


		// on submitting the form 
		$(document).on('submit', '#order_form', function(event){
			event.preventDefault();
			$('#action').attr('disabled', 'disabled');
			var form_data = $(this).serialize();
			$.ajax({
				url:"offer_action.php",
				method:"POST",
				data:form_data,
				success:function(data){
					$('#order_form')[0].reset();
					$('#orderModal').modal('hide');
					$('#alert_action').fadeIn().html('<div class="alert alert-success">'+data+'</div>');
					$('#action').attr('disabled', false);
					orderdataTable.ajax.reload();
				}
			});
		});


		$(document).on('click', '.update', function(){
			// $('#span_product_details').html('');
			var oid = $(this).attr("id");
			var btn_action = 'fetch_single';
			$.ajax({
				url:"offer_action.php",
				method:"POST",
				data:{oid:oid, btn_action:btn_action},
				dataType:"json",
				success:function(data)
				{
					$('#orderModal').modal('show');

					// $("#pid").val(data.pid);
					// $('#name').val(data.name);
					// $("#cls").val(data.cls);
					// $("#division").val(data.division);
					$('#add-fields').empty();
					$('#name, #cls, #division').removeAttr('required');
					$('#name, #cls, #division, #students-label').hide();
					$("#pid").show();
					// $('#cls').removeAttr('required');
					// $('#cls').hide();
					// $('#division').removeAttr('required');
					// $('#division').hide();

					// $('#oid').val(data.oid);
					$('#pid').val(data.pid);
					$('#comp').val(data.comp);
					$('#package').val(data.package);
					$('#bond').val(data.bond);
					$('#offer_date').val(data.offer_date);
					$('#select-box').html(data.product_details);

					$('.modal-title').html("<i class='fa fa-pencil-square-o'></i> Edit Order");
					$('#action').val('Edit');
					$('#btn_action').val('Edit');
				}
			})
		});


		$(document).on('click', '.delete', function(){
			var oid = $(this).attr("id");
			// var status = $(this).data("status");
			var btn_action = "delete";
			if(confirm("Are you sure you want to change status?"))
			{
				$.ajax({
					url:"offer_action.php",
					method:"POST",
					data:{oid:oid, btn_action:btn_action},
					success:function(data)
					{
						$('#alert_action').fadeIn().html('<div class="alert alert-info">'+data+'</div>');
						orderdataTable.ajax.reload();
					}
				})
			}
			else
			{
				return false;
			}
		});

    });
</script>