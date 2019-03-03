<?php

class App
{

	protected $controller = 'home';
	protected $method = 'index';
	protected $params = [];

	public function __construct()
	{
		//print_r($this-> parseUrl());
		$url = $this->parseUrl();

		

		if (file_exists('../app/controllers/' . $url[0]. '.php')) 
		{
			$this->controller = $url[0];
			unset($url[0]);
			// el unset es necesario para la selección de los params
		}

		require_once '../app/controllers/' . $this->controller . '.php';

		//echo $this->controller;
		$this->controller = new $this->controller;
		//var_dump($this->controller);

		if (isset($url[1]) ) 
		{
			if (method_exists($this->controller, $url[1]) ) 
			{
				$this->method = $url[1];
				unset($url[1]); 
				// el unset es necesario para la selección de los params
			}
		}
		
		
		$this->params= $url ? array_values($url) : [];

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

