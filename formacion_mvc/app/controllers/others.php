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

}