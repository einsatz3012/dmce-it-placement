<?php
//index.php
include('database_connection.php');
include('function.php');

// if(!isset($_SESSION["user_id"]))
// {
// 	header("location:login.php");
// }

include('header.php');

?>
	<br />
	<div class="row">
	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading"><strong>Total Students</strong></div>
			<div class="panel-body" align="center">
				<h1><?php echo count_total_students($connect); ?></h1>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading"><strong>Total Offers</strong></div>
			<div class="panel-body" align="center">
				<h1><?php echo count_total_offers($connect); ?></h1>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading"><strong>Total Companies</strong></div>
			<div class="panel-body" align="center">
				<h1><?php echo count_total_companies($connect); ?></h1>
			</div>
		</div>
	</div>

		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading"><strong>Highest Package</strong></div>
				<div class="panel-body" align="center">
					<h1><?php echo highest_package($connect); ?> LPA</h1>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading"><strong>Average Package</strong></div>
				<div class="panel-body" align="center">
					<h1><?php echo average_package($connect); ?> LPA</h1>
				</div>
			</div>
		</div>

	</div>

<?php
include("footer.php");
?>