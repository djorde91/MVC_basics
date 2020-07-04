<?php 

/**
 * 
 */
class Others extends Controller
{
	protected $content;

	public function __construct(){
		$this->content = $this->model('m_others');
		
	}

	public function index($param1=''){
		$this->view('Others/index', ['text' => $param1]);

	}

	public function show_content($param1=''){
		$content = $this->content->select_content($_GET["url"]);
		echo $content["page_content"];

	}

}