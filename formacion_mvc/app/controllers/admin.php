<?php 

/**
 * 
 */
class Admin extends Controller
{
	protected $content;

	public function __construct(){
		$this->content = $this->model('m_admin');
		
	}

	public function index($param1=''){
		$this->view('admin/index', ['text' => $param1]);

	}

}