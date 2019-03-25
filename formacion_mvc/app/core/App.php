<?php

class App
{
	protected $controller = 'home';
	protected $method = 'index';
	protected $params = [];
	protected $url;
	protected $conn;

	protected $urls = [
		'admin' => 'others/admin'
	];

	public function __construct()
	{
	    $this->conn = new Database();
        $this->conn->connect();

		$this->url = $this->parseUrl();

		if(isset($this->url[0]) &&  $this->url[0] !== "")
		{
			if (file_exists($_SERVER['DOCUMENT_ROOT']. "/app/controllers/" . $this->url[0]. '.php')) 
			{
				$this->controller = $this->url[0];
			}else {
				http_response_code(404);
				$this->controller = '_404';
			}	
			unset($this->url[0]);	
		}	

		require_once ($_SERVER['DOCUMENT_ROOT']. "/app/controllers/" . 'ajax' . ".php");
		require_once ($_SERVER['DOCUMENT_ROOT']. "/app/controllers/" . $this->controller . ".php");
	

		//echo $this->controller;
		$this->controller = new $this->controller;
		//var_dump($this->controller);

		if (isset($this->url[1]) ) 
		{
			if (method_exists($this->controller, $this->url[1]) ) 
			{
				$this->method = $this->url[1];
				unset($this->url[1]); 
				
			}
		}
		
		$this->params= $this->url ? array_values($this->url) : [];

		call_user_func_array([$this->controller,$this->method], $this->params);
		//print_r($url);

	}


	public function parseUrl()
	{	
		if (isset($_GET['url'])) 	
		{
			$url = $_GET['url'];
			$this->urls = self::select_urls($url);
			
			$bbdd_url = $this->urls["page_name"];

			if($url == $bbdd_url){
				$bbdd_url = $this->urls = "others/" . $bbdd_url ;
				$url = $bbdd_url;
			}

			return $url = explode('/',filter_var(trim($url, '/'),FILTER_SANITIZE_URL));
				
		}
	}

	 public function select_urls($p_name){ 

      $stmt = $this->conn->do_query("SELECT page_name FROM pages WHERE page_name = :p_name");
      $stmt->execute(array(':p_name'=>$p_name));
      $filas = $stmt->fetch(PDO::FETCH_ASSOC);

      return $filas;

    }

}

