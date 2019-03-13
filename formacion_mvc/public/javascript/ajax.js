$( document ).ready(function() {


	 $("#form_login").submit(function(e) {
	                e.preventDefault();
	                var username = $('input[name=f_username]', this).val();
	                var pass = $('input[name=f_password]', this).val();

	            $.ajax({

	              type:'POST',
	             
	              data: {
	                          		
	              		 f_iniciar: $(this).serialize(),  
	              		 f_username: username,	                    	                     
	                     f_password: pass
	                     },

	              success:function(response){

	              		var respuesta = $.trim(response);
	              		
	              		if (respuesta == 'login_error') {
	              			 swal("Ha habido un error.","Nombre o usuario incorrectos","error");
	              			            			  
	              		}
	              		else if (respuesta == "login_correcto"){
	              			location.reload( true );
	              		}
	 	              	
	    		}
	     })
	 })

 }); 
