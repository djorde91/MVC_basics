<?php 

/**
 * 
 */
class m_Others
{
	protected $conn;
  public $m_contenido;

	public function __construct() {

	  $this->conn = new Database();
      $this->conn->connect();
  }


}