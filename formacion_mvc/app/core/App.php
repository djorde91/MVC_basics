<?php

class App
{
	protected $controller = 'home';
	protected $method = 'index';
	protected $params = [];
	protected $url;

	//Permitir al usuario crear sus propias páginas desde la home
	//Pendiente hacer un select en la BBDD de las páginas creadas por el usuario y añadirlas al array. (CMS)

	protected $urls = [
		'contacto' => 'others/contacto',
		'admin' => 'others/admin',
		'test' => 'home/test'
	];

	public function __construct()
	{

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

			if(isset($this->urls[$_GET['url']]))
				$url = $this->urls[$_GET['url']];
            //array($result['page_url'], $result[])
            //
			return $url = explode('/',filter_var(trim($url, '/'),FILTER_SANITIZE_URL));
				
		}
	}

}

