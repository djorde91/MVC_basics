<?php 

/**
 * 
 */
class Home extends Controller
{
	protected $user;

	public function __construct(){
		$this->user = $this->model('User');
	}
	
	public function index($param1 = '', $param2 = '')
	{

		$this->user->name = $param1;
		$this->view('home/index', ['name' => $this->user->name]);

	}

	public function create($param1 = '', $param2 = ''){
			$this->user->create_user($param1, $param2);
			echo "Usuario creado, revisar la tabla para ver resultados";

	}


}