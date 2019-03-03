<?php 

/**
 * 
 */
class Contact extends Controller
{
	
	public function index($param1 = '', $param2 = '')
	{  
		echo 'Contact controller and method index()';
		echo " <br> param1 = $param1 <br> param2= $param2";
	}
}