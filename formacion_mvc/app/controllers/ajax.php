<?php 
require_once ($_SERVER['DOCUMENT_ROOT'] . "/app/core/Controller.php");

class Ajax extends Controller
{
		protected $content;

		public function __construct(){
		$this->content = $this->model('m_Others');
		}

		public function login(){

			if (isset($_POST['f_iniciar'])) {
				
					if($this->content->iniciar_sesion($_POST['f_username'], $_POST['f_password']))
					{
					echo "login_correcto";	
					
					}else{		
					echo "login_error";			
								            		                   	
					}	

			}
								
		}

}