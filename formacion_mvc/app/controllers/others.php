<?php 

/**
 * 
 */
class Others extends Controller
{
	protected $content;

	public function __construct(){
		$this->content = $this->model('m_Others');
		
	}

	public function index($param1=''){
		$this->view('others/index', ['text' => $param1]);

	}

	public function login(){

		if (isset($_POST['f_iniciar'])) {
		
					if($this->content->iniciar_sesion($_POST['f_username'], $_POST['f_password']))
					{
					echo "login_correcto";	
						
						// header('location:vista/perfil.php'); //el redirect se hace desde ajax.
					}else{		
					echo "login_incorrecto";
												            		                   	
					}	

			}
								
	}	

}