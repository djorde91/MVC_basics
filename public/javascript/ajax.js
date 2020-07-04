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

	 $(".form_delete").submit(function(e) {
	                e.preventDefault();
	                var button_page_delete = $('input[name=f_pageToDelete]', this).val();
	                var form = $('input[name=f_pageToDelete]', this).closest('tr');


	            $.ajax({

	              type:'POST',
	             
	              data: { 
	              	f_pageToDelete: button_page_delete 
	                          		
	                     },

	              success:function(data){
	              	//$("body").html(data); //No es correcto.
	             	form.remove();            	
	    		}
	     })
	 })

	 $("#crear_pagina").submit(function(e) {
	                e.preventDefault();
	                var button_page_create = $('input[name=f_page_name]', this).val();	              

	            $.ajax({

	              type:'POST',
	             
	              data: { 
	              	f_page_name: button_page_create
	                          		
	                     },

	              success:function(data){
	              	$("body").html(data);            	           	
	   		    }
	     })
	 })

	 $("#actualizar_pagina").submit(function(e) {
	                e.preventDefault();
	                var textarea_content = $('textarea[name=f_content]', this).val();
	                var page_id = $('input[name=f_content_edit]', this).val(); 	              

	            $.ajax({

	              type:'POST',
	         
	              data: { 
	              	f_content: textarea_content,
	              	f_content_edit: page_id                  		
	                     },

	              success:function(data){
	              	swal("Página actualizada","","success");
            	           	
	   		    }
	     })
	 })

	 $(".form_edit").submit(function(e) {
	                e.preventDefault();
	               var button_page_edit = $('input[name=f_pageToEdit]', this).val();	              

	            $.ajax({

	              type:'POST',
	             
	              data: { 
	              	f_pageToEdit: button_page_edit
	                          		
	                     },

	              success:function(response){

	              	$("body").html(response); 
	              	// result = $(response).find('#page_title');
	              	// console.log(result);	              	 
              		// $("#page_title").html(result[0].innerHTML);                    	           	
	   		    }
	     })
	 })




 }); 
