<?php 
    $ajax = new Ajax();

    if(isset($_POST['f_sesion']) ){
        session_destroy();
        header("Location: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
        exit;   
        
     }

    if(isset($_POST['f_iniciar']) ){
                $ajax->login();
                exit();
                // para que la response no cargue el html.
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
 	<link rel="stylesheet" href="/public/css/style.css">
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.26.29/sweetalert2.all.js"></script>
    <script src="/public/javascript/ajax.js"></script>
    <script src="/public/javascript/scripts.js"></script>
</head>
 <body>

 
<?php if (isset($_SESSION['session_usuario']) /*isset cookie.. Falta la cookie*/){

	echo '
	<div class="cute_crud">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Page ID</th>
                <th>URL</th>
                <th>Page name</th>
                <th> Options</th>
            </tr>
        </thead>
        <tbody>';

    $ajax->ajax_show_pages();


    echo '
        </tbody>
    </table>
</div>

	<div class="row">
		<div class="cute_close_session">
		<form method="post" name="closeSession" action="">
			<button type="submit" class="btn btn-warning" name="f_sesion">Cerrar sesión</button>			  		  
		</form>				
		</div>
	</div>';


 }else{
 	echo '
 	<div class="row">
 		<div class="cute_form">
 			<form id="form_login" method="post" name="loginAdmin" action="">
				  <div class="form-group">
				    <label for="exampleInputEmail1">User</label>
				    <input required name="f_username" type="text" class="form-control" aria-describedby="emailHelp" placeholder="el usuario es admin">
				    
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Password</label>
				    <input required name="f_password" type="password" class="form-control" placeholder="la password es admin">
				  </div>
				  <button type="submit" class="btn btn-primary" name="f_iniciar">Submit</button>		  
			</form>			
 		</div>
 	</div>
	
	<div class="row">
		<div class="cute_close_session">
		<form method="post" name="closeSession" action="">
			<button type="submit" class="btn btn-warning" name="f_sesion">Cerrar sesión</button>			  		  
		</form>				
		</div>
	</div>'
 	 ;

 
 }

 if (isset($_POST['f_editar'])) {
        $ajax->ajax_edit_pages();
 }

 ?>

 </body>
 </html>

 <?php/* echo $data['text']; */ ?>
