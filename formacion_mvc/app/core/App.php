<?php

class App
{

	protected $controller = 'home';
	protected $method = 'index';
	protected $params = [];
	protected $url;

	//Permitir al usuario crear sus propias páginas desde la home
	//Pendiente hacer un select en la BBDD de las páginas creadas por el usuario y añadirlas al array. (CMS)

	protected $others_controllers = array("contacto", "sponsors", "productos");

	public function __construct()
	{
		//print_r($this-> parseUrl());

		$this->url = $this->parseUrl();


		if(isset($this->url[0]) &&  $this->url[0] !== "")
		{
			if (file_exists('../app/controllers/' . $this->url[0]. '.php')) 
			{
				$this->controller = $this->url[0];
				
				
			}else if( in_array($this->url[0],$this->others_controllers)){
				$this->controller = "others";
				$this->method = $this->url[0]; //ESTO ES MUY HACKY. ESTA MAL
				

			}else {
				http_response_code(404);
				$this->controller = '_404';
			}	
			unset($this->url[0]);	
		}	

		require_once '../app/controllers/' . $this->controller . '.php';

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
		echo "<br>";
		//print_r($url);

	}


	public function parseUrl()
	{
		if (isset($_GET['url'])) 
		{
				//echo '<br>'. $_GET['url'];
				return $url = explode('/',filter_var(trim($_GET['url'], '/'),FILTER_SANITIZE_URL));
				
		}
	}

}

