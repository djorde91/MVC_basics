 <?php 
if(isset($_POST['adminLogin']) ){

		$control->control_login();	
	}


  ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>others-index</title>
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 	<script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

 	<style>
 		.cute_form{
 			padding: 15px;
 			margin: auto;
 			border: 1px solid lightgrey;
 			border-radius: 10px;

 		}


 	</style>

 </head>
 <body>

 	<?php echo $data['text']; ?>

 	<div class="row">
 		<div class="col-sm-6 cute_form">
 			<form method="post" name="loginAdmin">
				  <div class="form-group">
				    <label for="exampleInputEmail1">Email address</label>
				    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
				    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Password</label>
				    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
				  </div>
				  <button type="submit" class="btn btn-primary" name="adminLogin">Submit</button>
			</form>			
 		</div>
 	</div>
 </body>
 </html>