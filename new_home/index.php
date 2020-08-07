<?php
	include 'statistics.php';

	$conn = new mysqli("localhost", "root", "", "placement");
	$tpo_connect = $conn->query("SELECT * from tpo_connect");
 	$tpo_connect = $tpo_connect->fetch_array(MYSQLI_ASSOC);
	
	$output = $conn->query("SELECT * from image");
 	$output = $output->fetch_array(MYSQLI_ASSOC);

	$testimonial = $conn->query("SELECT * from testimonials");
 	$testimonial = $testimonial->fetch_all(MYSQLI_ASSOC);
 

?>

<!DOCTYPE HTML>
<!--
	Industrious by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>IT placements</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<!-- <link rel="stylesheet" href="assets/css/graph.css" /> -->

		<!-- graph -->
 		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script type="text/javascript">
		// Load the Visualization API and the piechart package.
    		google.charts.load('current', {'packages':['corechart']});

    	// Set a callback to run when the Google Visualization API is loaded.
    		google.charts.setOnLoadCallback(drawChart1);
    		google.charts.setOnLoadCallback(drawChart2);
    		google.charts.setOnLoadCallback(drawChart3);

    		function drawChart1() {
		    	var jsonData = $.ajax({
		         	url: "ChartData.php",
		         	method: "POST",
		         	data: {chartid: 1},
		         	dataType: "json",
		         	async: false
		        }).responseText;
		          
			      // Create our data table out of JSON data loaded from server.
			     var data = new google.visualization.DataTable();
			     data.addColumn('string', 'Year');
	 			 data.addColumn('number', 'Package');

	 			var dataPoints = JSON.parse(jsonData);
	 			for (var i = 0; i <= dataPoints.length - 1; i++) {
	 				dataPoints[i][0] = dataPoints[i][0].toString();
	 			  	// console.log(dataPoints[i]);
	 			}	
				data.addRows(dataPoints);
				console.log(data);

		      // Instantiate and draw our chart, passing in some options.
		        var options = {
            		'legend': 'above',// Hides the Legend.
					animation: {
          				duration: 8000,
          				easing: 'out',
          				startup: true
      				},
      				'backgroundColor': 'transparent',
					'is3D':true,
        		};

		    	var chart = new google.visualization.BarChart(document.getElementById('chart_div1'));
		    	chart.draw(data, options);
    		}

    		function drawChart2() {
		     	var jsonData = $.ajax({
		          	url: "ChartData.php",
		          	method: "POST",
		          	data: {chartid: 2},
		          	dataType: "json",
		          	async: false
		        }).responseText;
		          
			      // Create our data table out of JSON data loaded from server.
			     var data = new google.visualization.DataTable();
			     data.addColumn('string', 'Year');
	 			 data.addColumn('number', 'Placed students');
	 			 var dataArray = [];
	 			 var dataPoints = JSON.parse(jsonData);
	 			 for (var i = 0; i <= dataPoints.length - 1; i++) {
	 			  	dataPoints[i][0] = dataPoints[i][0].toString();
	 			  	// console.log(dataPoints[i]);
	 			}
				data.addRows(dataPoints);
				// console.log(data);

		      // Instantiate and draw our chart, passing in some options.
		        var options = {
            		'legend': 'above',// Hides the Legend.
					animation: {
          				duration: 8000,
          				easing: 'out',
          				startup: true,
      				},
      				'backgroundColor': 'transparent',
					'is3D':true
        		};

		     	var chart = new google.visualization.BarChart(document.getElementById('chart_div2'));
		     	chart.draw(data, options);
    		}

    		function drawChart3() {
		    	var jsonData = $.ajax({
		         	url: "ChartData.php",
		         	method: "POST",
		         	data: {chartid: 3},
		         	dataType: "json",
		         	async: false
		        }).responseText;
		          
			      // Create our data table out of JSON data loaded from server.
			    var data = new google.visualization.DataTable();
			    data.addColumn('string', 'Year');
	 			data.addColumn('number', 'Company visited');

	 			var dataPoints = JSON.parse(jsonData);
	 			for (var i = 0; i <= dataPoints.length - 1; i++) {
	 			  	dataPoints[i][0] = dataPoints[i][0].toString();
	 			  	// console.log(dataPoints[i]);
	 			 }

				data.addRows(dataPoints);
				// console.log(data);

		      // Instantiate and draw our chart, passing in some options.
		        var options = {
            		'legend': 'above',// Hides the Legend.
					animation: {
          				duration: 8000,
          				easing: 'out',
          				startup: true,	
      				},
      				'backgroundColor': 'transparent',
					'is3D':true
        		};

		      	var chart = new google.visualization.BarChart(document.getElementById('chart_div3'));
		      	chart.draw(data, options);
    		}

		</script>

	</head>

	<body class="is-preload">

		<!-- Header -->
			<header id="header">
				<a class="logo" href="./">IT</a>
				<nav>
					<a href="#menu">Menu</a>
				</nav>
			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="./">Home</a></li>
					<li><a href="ui_update_form.php">Form</a></li>
					<li><a href="#">Generic</a></li>
				</ul>
			</nav>

		<!-- Banner -->
			<section id="banner">
				<div class="inner">
					<h1><?php echo $output['banner_header'];?></h1>
					<p><?php echo $output['banner_text'];?></p>
				</div>
				<!-- <video autoplay loop muted playsinline src="images/pic03.jpg"></video> -->
			</section>

		<!-- Highlights -->
			<section class="wrapper">
				<div class="inner">
					<header class="special">
						<h2>Placement Highlights</h2>
						<p>Placements hightlights of the curent edicational year </p>
					</header>
					<div class="highlights">
						<section>
							<div class="content">
								<header>
									<a href="#" class="icon fa fa-line-chart"><span class="label">Icon</span></a>
									<h3>Highest Package</h3>
								</header>
								<p><?php echo highest_package($conn) ?> LPA.</p>
							</div>
						</section>

						<section>
							<div class="content">
								<header>
									<a href="#" class="icon fa fa-bar-chart"><span class="label">Icon</span></a>
									<h3>Average Package</h3>
								</header>
								<p><?php echo average_package($conn) ?> LPA.</p>
							</div>
						</section>

						<section>
							<div class="content">
								<header>
									<a href="#" class="icon fa fa-building-o"><span class="label">Icon</span></a>
									<h3>Companes Visiting</h3>
								</header>
								<p><?php echo company_visited($conn) ?> +</p>
							</div>
						</section>

<!-- 						<section>
							<div class="content">
								<header>
									<a href="#" class="icon fa-money "><span class="label">Icon</span></a>
									<h3>Offers</h3>
								</header>
								<p><?php echo offer_number($conn) ?>+.</p>
							</div>
						</section>

						<section>
							<div class="content">
								<header>
									<a href="#" class="icon fa-graduation-cap "><span class="label">Icon</span></a>
									<h3>Total students placed</h3>
								</header>
								<p>200+.</p>
							</div>
						</section>

						<section>
							<div class="content">
								<header>
									<a href="#" class="icon fa-percent "><span class="label">Icon</span></a>
									<h3>Placed Percent</h3>
								</header>
								<p>89%.</p>
							</div>
						</section> -->
					</div>
				</div>
			</section>

		<!-- graph -->
			<section class="">
		    <hr style="width: 35%; height: 4px; margin: auto; margin-bottom: 60px; background-color: rgba(206, 27, 27, 0.75); ">
			<!-- <div class="inner"> -->
				<header class="special">

					<h2>Placement Statistics</h2>
					<p>Generating random paragraphs can be an excellent way for writers to get their creative flow going at the beginning of the day.</p>
				</header>
				<div class="highlights">
					<section>
						<!-- <div class="content"> -->
							<header><h3 style="text-align: center;">Year vs Package</h3></header>
							<div id="chart_div1"></div>
						<!-- </div> -->
					</section>

					<section>
						<!-- <div class="content"> -->
							<header><h3 style="text-align: center;">Year vs Placed</h3></header>
							<div id="chart_div2"></div>
						<!-- </div> -->
					</section>

					<section>
						<!-- <div class="content"> -->
							<header><h3 style="text-align: center;">Year vs Comapany</h3></header>
							<div id="chart_div3"></div>
						<!-- </div> -->
					</section>
				</div>
			<!-- </div> -->
			</section>



		<!-- CTA -->
			<section id="cta" class="wrapper">
				<div class="inner">
<!-- 					<h2>About Placement Section</h2>
					<p>You can decide what you want to do in life, but I suggest doing something that creates. Something that leaves a tangible thing once you're done. That way even after you're gone, you will still live on in the things you created.</p> -->

					<h2><?php echo $output['about_header'];?></h2>
					<p><?php echo $output['about_text'];?></p>
				</div>
			</section>

		<!-- Testimonials -->
			<section class="wrapper">
				<div class="inner">
					<header class="special">
					<h2>Testimonials</h2>
					<p>You can decide what you want to do in life, but I suggest doing something that creates. Something that leaves a tangible thing once you're done. That way even after you're gone, you will still live on in the things you created.</p>
					</header>
					<div class="testimonials">
						<?php 
							foreach ($testimonial as $row) {
								echo "<section>";
									echo "<div class='content'>";
										echo "<blockquote><p>".$row['testimonial']."</p></blockquote>";
										echo "<div class='author'>";
											// echo "<div class='image'> <img src='images/pic03.jpg' alt='' /> </div>";
											echo "<p class='credit'>- <strong>".$row['attestant']."</strong> <span>".$row['designation']." - ".$row['organization'].".</span></p>";
										echo "</div>";
									echo "</div>";
								echo "</section>";

						}
						?>
<!-- 						<section>
							<div class="content">
								<blockquote>
									<p><?php echo $testimonial['testimonial']; ?>  </p>
								</blockquote>
								<div class="author">
									<div class="image">
										<img src="images/pic03.jpg" alt="" />
									</div>
									<p class="credit">- <strong>John Fitzgerald Kennedy</strong> <span>MNO - XYZ.</span></p>
								</div>
							</div>
						</section>
						<section>
							<div class="content">
								<blockquote>
									<p>An investment in knowledge pays the best interest.</p>
								</blockquote>
								<div class="author">
									<div class="image">
										<img src="images/pic03.jpg" alt="" />
									</div>
									<p class="credit">- <strong>Benjamin Franklin</strong> <span>MNO - XYZ</span></p>
								</div>
							</div>
						</section>
						<section>
							<div class="content">
								<blockquote>
									<p>Education is not the filling of a pail, but the lighting of a fire.</p>
								</blockquote>
								<div class="author">
									<div class="image">
										<img src="images/pic03.jpg" alt="" />
									</div>
									<p class="credit">- <strong>W.B. Yeats.</strong> <span>MNO - ABC.</span></p>
								</div>
							</div>
						</section> -->
					</div>
				</div>
			</section>


		<!-- Footer -->
			<footer id="footer">
				<div class="inner">
					<div class="content">
						<section>
							<h3>Conatct Us</h3>
							<p><!-- You can contact Us though we will not reply but still if you want contact us here --></p>
							<p>Contact Us Contact Us Contact Us Contact Us Contact Us Contact Us</p>
						</section>
						<section>
							<h4>Placement Head</h4>
							<ul class="plain">
								<li><a href="#"><i class="icon fa-user-o">&nbsp;</i><?php echo $tpo_connect['name']; ?></a></li>
								<li><a href="#"><i class="icon fa-phone">&nbsp;</i><?php echo $tpo_connect['phone']; ?></a></li>
								<li><a href="#"><i class="icon fa-envelope">&nbsp;</i><?php echo $tpo_connect['email'];?></a>
								</li>
								<!-- <li><a href="#">Dolor pulvinar magna etiam.</a></li> -->
							</ul>
						</section>

						<section>
							<h4>IT Dept Office</h4>
							<ul class="plain">
								<li><a href="#"><i class="icon fa-user-o">&nbsp;</i><?php echo $tpo_connect['addr'];?></a></li>
								<li><a href="#"><i class="icon fa-phone">&nbsp;</i><?php echo $tpo_connect['office_no']; ?></a></li>
								<li><a href="#"><i class="icon fa-envelope">&nbsp;</i>abcdef@gmail.com</a></li>
								<!-- <li><a href="#">Dolor pulvinar magna etiam.</a></li> -->
							</ul>
						</section>

<!-- 						<section>
							<h4>Social Media</h4>
							<ul class="plain">
								<li><a href="#"><i class="icon fa-twitter">&nbsp;</i>Twitter</a></li>
								<li><a href="#"><i class="icon fa-facebook">&nbsp;</i>Facebook</a></li>
								<li><a href="#"><i class="icon fa-instagram">&nbsp;</i>Instagram</a></li>
								<li><a href="#"><i class="icon fa-github">&nbsp;</i>Github</a></li>
							</ul>
						</section> -->
					</div>
					<div class="copyright">
						&copy; Datta Meghe College of Engineering <a href="#">Airoli</a>, New <a href="#">Mumbai</a>.
					</div>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			<script type="text/javascript">
				var path = "<?php echo $output['banner_path']; ?>"
				console.log(path);
				$("#banner").css("background-image", "url(" + path + ")");

				var path = "<?php echo $output['about_img_path']; ?>"
				console.log(path);
			    $("#cta").css("background-image", "url(" + path + ")");
			</script>

	</body>
</html>