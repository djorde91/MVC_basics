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
	
	public function productos($param1 = '', $param2 = ''){
		$this->content->m_contenido = $param1;
		echo "pagina de productos";
	}

	public function contacto($param1 = '', $param2 = ''){
		$this->content->m_contenido = $param1;
		echo "pagina de contacto";
		
	}

	public function sponsors($param1 = '', $param2 = ''){
		$this->content->m_contenido = $param1;
		echo "pagina de sponsors";
		
	}

	

}