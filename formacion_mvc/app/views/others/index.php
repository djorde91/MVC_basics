 <?php 
if(isset($_POST['f_iniciar']) ){

		$this->login();
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
 			margin: 25px auto;
 			border: 1px solid lightgrey;
 			border-radius: 10px;

 		}


 	</style>

 </head>
 <body>

 
<?php if (isset($_SESSION['session_usuario'])){

	echo " <br> CRUD de creación de páginas y contenido";

 }else{
 	echo '
 	<div class="row">
 		<div class="col-sm-6 cute_form">
 			<form method="post" name="loginAdmin" action="">
				  <div class="form-group">
				    <label for="exampleInputEmail1">User</label>
				    <input name="f_username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="admin">
				    
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Password</label>
				    <input name="f_password" type="password" class="form-control" id="exampleInputPassword1" placeholder="admin">
				  </div>
				  <button type="submit" class="btn btn-primary" name="f_iniciar">Submit</button>		  
			</form>			
 		</div>
 	</div> ';
 }?>
 </body>
 </html>

 <?php echo $data['text']; ?>