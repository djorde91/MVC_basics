<?php 

/**
 * 
 */
class Contact extends Controller
{
	protected $user;

	public function __construct(){
		$this->user = $this->model('User');
	}


	public function index($param1 = '', $param2 = '')
	{  

		echo " <br> param1 = $param1 <br> param2= $param2";
		$this->user->name = $param1;
		$this->view('contact/index', ['name' => $this->user->name]);
	}

}