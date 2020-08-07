<?php
//user.php

include('database_connection.php');

// if(!isset($_SESSION["user_id"]))
// {
// 	header('location:login.php');
// }


include('header.php');

if(count($_POST)>0) {
$connect->prepare("UPDATE tpo_connect set name='" . $_POST['name'] . "', phone='" . $_POST['contact'] . "', addr='" . $_POST['address'] . "', office_no='" . $_POST['clg_phone'] . "' ,email='" . $_POST['email'] . "'")->execute();
$message = "Record Modified Successfully";
}

$result = $connect->prepare("SELECT * FROM tpo_connect");
$result->execute();
$row =  $result->fetch(PDO::FETCH_ASSOC);

?>

	<form method="POST" class="w3-container w3-card-4 w3-light-grey" action="">
	
		Name : <input type="text" name="name" class="w3-input w3-border" value="<?php echo $row['name']; ?>">
		<br>

		Contact : <input type="contact" name="contact" class="w3-input w3-border" value="<?php echo $row['phone']; ?>">
		<br>

		Email : <input type="Email" name="email" class="w3-input w3-border" value="<?php echo $row['email']; ?>">
		<br>

		Address : <input name="address" class="w3-input w3-border" value="<?php echo $row['addr']; ?>">
		<br>
  
 		College contact no. : <input type="contact" name="clg_phone" class="w3-input w3-border" value="<?php echo $row['office_no']; ?>">
		<br>

  		<input type="submit" value="UPDATE" class="w3-btn w3-teal">

	</form>

	<br /><br />  
  <div class="container" style="width:900px;">  
   <h3 align="center">Add, Update or Delete Images</h3>  
   <br />
   <div align="right">
    <button type="button" name="add" id="add" class="btn btn-success">Add</button>
   </div>
   <br />
   <div id="image_data">

   </div>
  </div>  
 </body>  
</html>



<div id="imageModal" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Add Image</h4>
   </div>
   <div class="modal-body">
    <form id="image_form" method="post" enctype="multipart/form-data">
     <p><label>Select Image</label>
     <input type="file" name="image" id="image" /></p><br />
     <input type="hidden" name="action" id="action" value="insert" />
     <input type="hidden" name="image_id" id="image_id" />
     <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" />
      
    </form>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>
 
<script>  
$(document).ready(function(){
 
 fetch_data();

 function fetch_data()
 {
  var action = "fetch";
  $.ajax({
   url:"action.php",
   method:"POST",
   data:{action:action},
   success:function(data)
   {
    $('#image_data').html(data);
   }
  })
 }
 $('#add').click(function(){
  $('#imageModal').modal('show');
  $('#image_form')[0].reset();
  $('.modal-title').text("Add Image");
  $('#image_id').val('');
  $('#action').val('insert');
  $('#insert').val("Insert");
 });
 $('#image_form').submit(function(event){
  event.preventDefault();
  var image_name = $('#image').val();
  if(image_name == '')
  {
   alert("Please Select Image");
   return false;
  }
  else
  {
   var extension = $('#image').val().split('.').pop().toLowerCase();
   if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
   {
    alert("Invalid Image File");
    $('#image').val('');
    return false;
   }
   else
   {
    $.ajax({
     url:"action.php",
     method:"POST",
     data:new FormData(this),
     contentType:false,
     processData:false,
     success:function(data)
     {
      alert(data);
      fetch_data();
      $('#image_form')[0].reset();
      $('#imageModal').modal('hide');
     }
    });
   }
  }
 });
 $(document).on('click', '.update', function(){
  $('#image_id').val($(this).attr("id"));
  $('#action').val("update");
  $('.modal-title').text("Update Image");
  $('#insert').val("Update");
  $('#imageModal').modal("show");
 });
 $(document).on('click', '.delete', function(){
  var image_id = $(this).attr("id");
  var action = "delete";
  if(confirm("Are you sure you want to remove this image from database?"))
  {
   $.ajax({
    url:"action.php",
    method:"POST",
    data:{image_id:image_id, action:action},
    success:function(data)
    {
     alert(data);
     fetch_data();
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


