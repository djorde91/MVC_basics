<?php 

/**
 * 
 */
class User
{
	public $name;
	protected $conn;

	public function __construct() {

	  $this->conn = new Database();
      $this->conn->connect();
    }

     public function create_user($p_username, $p_phone){

      try{
  
            $stmt = $this->conn->do_query("INSERT INTO cliente(name, phone) 
                                                         VALUES(:username, :phone)");
                   
            $stmt->bindparam(":username", $p_username);
            $stmt->bindparam(":phone", $p_phone);
              
            $stmt->execute(); 
            
            return $stmt; 
      }catch(PDOException $e)
      {
        echo $e->getMessage();
        echo $e->getLine();
      }       
    }

}