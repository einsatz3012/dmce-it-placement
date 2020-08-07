<?php

	$db = mysqli_connect("localhost", "root", "", "placement");

  $msg = "";

  	// basic image and text data
  $output = $db->query("SELECT * from image");
 	$output = $output->fetch_array(MYSQLI_ASSOC);

 	// contact details
 	$contact_details = $db->query("SELECT * from tpo_connect");
 	$contact_details = $contact_details->fetch_array(MYSQLI_ASSOC);

 	// Testimonials Details
	$testimonial = $db->query("SELECT * from testimonials");
 	$testimonial = $testimonial->fetch_all(MYSQLI_ASSOC);

  	// Update Banner Data ...
  	if (isset($_POST['banner_update'])) {
  	
  		// Get image name
   		$banner_path = $_FILES['image']['name'];
   		
   		// check user has selected a file or not
   		if($banner_path) {
 	  		$banner_path = "./images/banner/" . $banner_path;
 	  	}
   		else {
	   		$banner_path = $output['banner_path'];
	   	}

   		// check user has entered any header text
   		if($_POST['banner_header']) {
			 $banner_header = mysqli_real_escape_string($db, $_POST['banner_header']);
		  }
		  else {
			 $banner_header = mysqli_real_escape_string($db, $output['banner_header']);
		  }

		  // check user has entered any banner text or not
		  if($_POST['banner_text']) {
			 $banner_text = mysqli_real_escape_string($db, $_POST['banner_text']);
		  }
		  else {
			 $banner_text = mysqli_real_escape_string($db, $output['banner_text']);
		  }
  	

  		// image file directory
	  	$target = "./images/banner/".basename($banner_path);
  		

  		$sql = "UPDATE image set 
  				banner_path = '$banner_path',
  				banner_header = '$banner_header',
  				banner_text = '$banner_text'
  				-- Where id = '5'
  		";
  	
  		// execute query
  		// mysqli_query($db, $sql);

      if(mysqli_query($db, $sql)){
        echo "Records were updated successfully.";
      } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
      }

  		if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  			$msg = "Image uploaded successfully";
  		}else{
  			$msg = "Failed to upload image";
  		}
  	
  	}

  	//  Update About Section Data
 	  if (isset($_POST['about_update'])) {
  	
  		// Get image name
   		$about_img_path = $_FILES['about_image']['name'];
   		// echo "$about_img_path";
   		// check for file upload
   		if ($about_img_path) {
   			$about_img_path = "./images/about/" . $about_img_path;
   		  // echo $about_img_path;
      }
   		else{
   			$about_img_path = $output['about_img_path'];
        // echo $about_img_path;
   		}

   		// check header is entered
   		if ($_POST['about_header']) {
   			$about_header = mysqli_real_escape_string($db, $_POST['about_header']);
   			// echo "present";
   			// echo $about_header;
   		}
  		else {
  			$about_header = mysqli_real_escape_string($db, $output['about_header']);
   			// echo "absent";
   			// echo $about_header;
  		}

   		// check text is entered
   		if ($_POST['about_text']) {
   			$about_text1 = mysqli_real_escape_string($db, $_POST['about_text']);
   			// echo "present";
   			// echo $about_text;
   		}
  		else {
  			$about_text1 = mysqli_real_escape_string($db, $output['about_text']);
   			// echo "absent";
   			// echo $about_text;
  		}


	  	// image file directory
  		$target = "./images/about/".basename($about_img_path);

      // echo $about_img_path;
      // echo $about_header;
      // echo $about_text;
  	
      $sql = "UPDATE image set 
              about_img_path = '$about_img_path', 
              about_header = '$about_header',
              about_text = '$about_text1'
              ";
    
  	
  		// execute query
  		// mysqli_query($db, $sql);

      if(mysqli_query($db, $sql)){
        echo "Records were updated successfully.";
      } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
      }


  		if (move_uploaded_file($_FILES['about_image']['tmp_name'], $target)) {
  			$msg = "Image uploaded successfully";
  		}else{
  			$msg = "Failed to upload image";
  		}
  	
  	}

  	// Update Placement Head's Contact Details
  	if (isset($_POST['plc_contact_update'])) {

   		// check name is entered
   		if ($_POST['plc_head_name']) {
   			$plc_head_name = mysqli_real_escape_string($db, $_POST['plc_head_name']);
   		}
   		else {
   			$plc_head_name = mysqli_real_escape_string($db, $contact_details['name']);
   		}

   		// check contact number is entered
   		if ($_POST['plc_head_contact']) {
   			$plc_head_contact = mysqli_real_escape_string($db, $_POST['plc_head_contact']);
   		}
   		else {
   			$plc_head_contact = mysqli_real_escape_string($db, $contact_details['phone']);
   		}

   		// check email is entered
   		if ($_POST['plc_head_mail']) {
   			$plc_head_mail = mysqli_real_escape_string($db, $_POST['plc_head_mail']);
   		}
   		else {
   			$plc_head_mail = mysqli_real_escape_string($db, $contact_details['email']);
   		}


  		$sql = "UPDATE tpo_connect set 
  				name = '$plc_head_name',
  				phone = '$plc_head_contact',
  				email = '$plc_head_mail'
  				-- Where id = '5'
  		";
  	
  		// execute query
  		// mysqli_query($db, $sql);
      if(mysqli_query($db, $sql)){
        echo "Records were updated successfully.";
      } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
      }

  	}

  	// Update Office's Contact Details
  	if (isset($_POST['office_contact_update'])) {

   		// check name is entered
   		if ($_POST['office_addr']) {
   			$addr = mysqli_real_escape_string($db, $_POST['office_addr']);
   		}
   		else {
   			$addr =  mysqli_real_escape_string($db, $contact_details['addr']);
   		}

   		// check contact number is entered
   		if ($_POST['office_contact']) {
   			$office_no = mysqli_real_escape_string($db, $_POST['office_contact']);
   		}
   		else {
   			$office_no =  mysqli_real_escape_string($db, $contact_details['office_no']);
   		}

   		// check email is entered
   		if ($_POST['office_mail']) {
   			$office_mail = mysqli_real_escape_string($db, $_POST['office_mail']);
   		}
   		else {
   			$office_mail = mysqli_real_escape_string($db, $contact_details['office_mail']);
   		}


  		$sql = "UPDATE tpo_connect set 
  				addr = '$addr',
  				office_no = '$office_no',
  				office_mail = '$office_mail'
  				-- Where id = '5'
  		";
  	
  		// execute query
  		// mysqli_query($db, $sql);

      if(mysqli_query($db, $sql)){
        echo "Records were updated successfully.";
      } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
      }

  	}

    // update testimonial details
    if(isset($_POST['testimonial_update'])) {
      echo $_POST['testimonial_update'];
      $id=$_POST['testimonial_update'];

      $testimonial_var = $db->query("SELECT * from testimonials Where id='$id'");
      $testimonial_var = $testimonial_var->fetch_array(MYSQLI_ASSOC);

      // echo $_POST['attestant'];
      // echo $_POST['testimonial'];
      // echo $_POST['designation'];
      // echo $_POST['organization'];

      // check attestant is entered
      if ($_POST['attestant']) {
        $attestant = mysqli_real_escape_string($db, $_POST['attestant']);
        echo "present";
        echo $attestant;
      }
      else {
        $attestant = mysqli_real_escape_string($db, $testimonial_var['attestant']);
        echo "absent";
        echo $attestant;
      }

      // check testimonial is entered
      if ($_POST['testimonial']) {
        $testimonial = mysqli_real_escape_string($db, $_POST['testimonial']);
        echo "present";
        echo $testimonial;
      }
      else {
        $testimonial = mysqli_real_escape_string($db, $testimonial_var['testimonial']);
        echo "absent";
        echo $testimonial;
      }

      // check header is entered
      if ($_POST['designation']) {
        $designation = mysqli_real_escape_string($db, $_POST['designation']);
        echo "present";
        echo $designation;
      }
      else {
        $designation = mysqli_real_escape_string($db, $testimonial_var['designation']);
        echo "absent";
        echo $designation;
      }

      // check text is entered
      if ($_POST['organization']) {
        $organization = mysqli_real_escape_string($db, $_POST['organization']);
        echo "present";
        echo $organization;
      }
      else {
        $organization = mysqli_real_escape_string($db, $testimonial_var['organization']);
        echo "absent";
        echo $organization;
      }

      $sql = "UPDATE testimonials set 
              attestant = '$attestant', 
              testimonial = '$testimonial',
              designation = '$designation',
              organization = '$organization'
              Where id='$id'
              ";
    
      if(mysqli_query($db, $sql)){
        echo "Records were updated successfully.";
      } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
      }


    }

	$output = $db->query("SELECT * from image");
 	$output = $output->fetch_array(MYSQLI_ASSOC);

 	$contact_details = $db->query("SELECT * from tpo_connect");
 	$contact_details = $contact_details->fetch_array(MYSQLI_ASSOC);

  // Testimonials Details
  $testimonial = $db->query("SELECT * from testimonials");
  $testimonial = $testimonial->fetch_all(MYSQLI_ASSOC);

  // $db->close();
?>


<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<link rel="stylesheet" href="assets/css/main.css" />
	<link rel="stylesheet" href="./assets/css/ui_form.css" />
  <link rel="stylesheet" href="./assets/css/homeStyles.css" />
</head>
<body style="background-color: whitesmoke; background-image: none;">

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
			<li><a href="index.html">Home</a></li>
			<li><a href="elements.html">Elements</a></li>
			<li><a href="generic.html">Generic</a></li>
		</ul>
	</nav>

<!-- ***************************************************************************************************************** -->
	<!-- Image , Header, Text  -->
	<div class="flex-container">
		<div id="">
			<h2> Banner Update : </h2>
			<img id="banner_img_id" src=<?php echo $output['banner_path']; ?> >
			<div id="banner_header_id"> <strong> Image Header : </strong> <?php echo $output['banner_header']; ?></div>
			<div id="banner_text_id"> <strong>Image Text: </strong> <?php echo $output['banner_text']; ?></div>

			<form method="POST" action="" enctype="multipart/form-data" id="banner_update_form">
 	 			<input type="hidden" name="size" value="1000000">
  		  	
  		  		<input type="file" name="image">
  				<input type="text" name="banner_header" id="banner_header" placeholder=<?php echo $output['banner_header']; ?>>
    	  		<input type="text" id="banner_text" name="banner_text" placeholder=<?php echo $output['banner_text']; ?>>
  
  				<button type="submit" name="banner_update" id="banner_update">Update</button>
  		
    		</form>
		</div>
	<!-- </div> -->

	<!-- <div id="content"> -->
		<div id="">
			<h2>About Section Update :</h2>
	 		<img id='about_img_id' src=<?php echo $output['about_img_path']; ?> >
			<div id="about_header_id"> <strong> Image Header : </strong> <?php echo $output['about_header']; ?></div>
			<div id="about_text_id"> <strong> Image Text: </strong> <?php echo $output['about_text']; ?></div>

			<form method="POST" action="" enctype="multipart/form-data" id="about_update_form">
  				<input type="hidden" name="size" value="1000000">

  		  	<input type="file" name="about_image">		
  				<input type="text" name="about_header" id="about_header" placeholder=<?php echo $output['about_header']; ?>	>   
          <textarea placeholder="<?php echo $output['about_text']; ?>" id="about_text" name="about_text"></textarea> 

  				<button type="submit" name="about_update" id="about_update">Update</button>
  	
    	</form>
		</div>
	</div>

<!-- **************************************************************************************************************** -->
	<!-- Contact Details -->
	<div class="flex-container">
		<div>
			<h2> Placement Head Details Update : </h2>
			<b>Name : </b> <?php echo $contact_details['name']; ?> <br>
			<b>Contact No : </b> <?php echo $contact_details['phone']; ?>	<br>
			<b> Mail : </b> <?php echo $contact_details['email']; ?>	<br>

			<form method="POST" action="" enctype="multipart/form-data" id="contact_update_form">
				<input type="text" name="plc_head_name" id="plc_head_name" placeholder=<?php echo $contact_details['name']; ?>>
				<input type="tel" name="plc_head_contact" id="plc_head_contact"  
					pattern="[0-9]{3}[0-9]{2}[0-9]{2}[0-9]{3}" placeholder=<?php echo $contact_details['phone']; ?>>
				<input type="email" name="plc_head_mail" id="plc_head_mail" 
					placeholder=<?php echo $contact_details['email']; ?>>

				<button type="submit" name="plc_contact_update" id="plc_contact_update">Update</button>
			</form>
		</div>
	<!-- </div> -->


	<!-- <div class=""> -->
		<div>
			<h2> Placement Office Details Update : </h2>
			<b>Name : </b> <?php echo $contact_details['addr']; ?> <br>
			<b>Contact No : </b> <?php echo $contact_details['office_no']; ?>	<br>
			<b> Mail : </b> <?php echo $contact_details['office_mail']; ?>	<br>

			<form method="POST" action="" enctype="multipart/form-data" id="contact_update_form">
				<input type="text" name="office_addr" id="office_addr" placeholder=<?php echo $contact_details['addr']; ?>>
				<input type="tel" name="office_contact" id="office_contact"  
					pattern="[0-9]{3}[0-9]{2}[0-9]{2}[0-9]{3}" placeholder=<?php echo $contact_details['office_no']; ?>>
				<input type="email" name="office_mail" id="office_mail" 
					placeholder=<?php echo $contact_details['office_mail']; ?>>

				<button type="submit" name="office_contact_update" id="office_contact_update">Update</button>
			</form>
		</div>
	</div>

<!-- ************************************************************************************************************** -->

                             <!-- <h2 class="text-center">Research</h2> -->
<!--                             <?php 
                         
      foreach ($testimonial as $row) {
        // echo "<Section>";


                echo "<div class='card'>";
                    echo "<div class='card-img'>";
                        // echo "<blockquote><p>".$row['testimonial']."</p></blockquote>";
                        echo "<div class='overlay'>";
                            echo "<div class='overlay-content'>";
                                echo "<a href='#!'>Edit Info</a>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
 
                    echo "<div class='content'>";
                      echo "<blockquote><p>".$row['testimonial']."</p></blockquote>";
                      echo "<div class='author'>";
                        echo "<div class='image'> <img src='images/pic03.jpg' alt='' /> </div>";
                        echo "<p class='credit'>- <strong>".$row['attestant']."</strong> <span>".$row['designation']." - ".$row['organization'].".</span></p>";
                      echo "</div>";
                    echo "</div>";
                echo "</div>";
            // echo "<div class='card__face card__face--back'>";
        //       echo "backside";
        //     echo "</div>";
        //   echo "</div>";
        // echo "</Section>";

      }
      // echo "</div>";
    ?> -->
                        <!-- </a> -->
                    <!-- </div> -->
                <!-- </div> -->
<!-- **************************************************************************************************************** -->

  <div class="flex-container">
      <?php                 
        foreach ($testimonial as $testimonial) {
          echo "<div>";
            echo "<h2> Testimonials : </h4>";
            // echo $testimonial['id']; echo "<br>";
            // echo "<div></div>";
            echo "<b> Attestant : </b>".$testimonial['attestant']."<br>";
            echo "<b> Testimonials : </b>".$testimonial['testimonial']."<br>";
            echo "<b> Designation : </b>".$testimonial['designation']."<br>";
            echo "<b> Organization : </b>".$testimonial['organization']."<br>";
            // echo "<button type='button' id='formButton'>Toggle Form!</button>";
          echo "</div>";
          echo "<div>";
          echo "<form method='POST' action='' enctype='multipart/form-data' id='testimonial_update_form'>"; 
          echo "<input type='text' name='attestant' id='attestant".$testimonial['id']."' placeholder=".$testimonial['attestant'].">";
          echo "<textarea placeholder=".$testimonial['testimonial']." id='testimonial".$testimonial['id']."' name='testimonial'></textarea> ";
          echo "<input type='text' name='designation' id='designation".$testimonial['id']."' placeholder=".$testimonial['designation'].">";
          echo "<input type='text' name='organization' id='organization1".$testimonial['id']."' placeholder=".$testimonial['organization'].">";

          echo "<button type='submit' value='".$testimonial['id']."' name='testimonial_update' id='testimonial_update".$testimonial['id']."'>Update</button>";
          echo "</form>";
          echo "</div>";         

        }
      ?>
  </div>
<!--  <form method="POST" action="" enctype="multipart/form-data" id="contact_update_form">
        <input type="text" name="plc_head_name" id="plc_head_name" placeholder=<?php echo $contact_details['name']; ?>>
        <input type="tel" name="plc_head_contact" id="plc_head_contact"  
          pattern="[0-9]{3}[0-9]{2}[0-9]{2}[0-9]{3}" placeholder=<?php echo $contact_details['phone']; ?>>
        <input type="email" name="plc_head_mail" id="plc_head_mail" 
          placeholder=<?php echo $contact_details['email']; ?>>

        <button type="submit" name="plc_contact_update" id="plc_contact_update">Update</button>
      </form>
    </div>
  </div> -->

  <!-- <button type="button" id="formButton">Toggle Form!</button> -->

</body>

	<!-- Scripts -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/browser.min.js"></script>
	<script src="assets/js/breakpoints.min.js"></script>
	<script src="assets/js/util.js"></script>
	<script src="assets/js/main.js"></script>


<!-- 	<script type="text/javascript">
		var card = document.querySelector('.card');
card.addEventListener( 'click', function() {
  card.classList.toggle('is-flipped');
});
	</script>
 -->
<!-- 	<script type="text/javascript">


		$("#banner_update").click(function(e) {
			// e.preventDefault();
			
     		$.ajax({
				url:"ui_update_form.php",
				method:"POST",
                success: function (output) {
					// alert(output);
                },
                error: function (argument) {
                	// alert(argument);
                }
              });
		});	
	</script> -->
</html>