<?php 

/**
 * 
 */
class m_others
{
	protected $conn;

	public function __construct() {

	  $this->conn = new Database();
      $this->conn->connect();
    }


  public function select_content($p_name){

    try{
  
            $stmt = $this->conn->do_query("SELECT page_content FROM pages WHERE page_name = :p_name ");      
            $stmt->bindparam(":p_name", $p_name);
        
            $stmt->execute(array(':p_name'=>$p_name));
            $result =  $stmt->fetch(PDO::FETCH_ASSOC);
            //var_dump($result);
            return $result; 
      }

      catch(PDOException $e)
      {
        echo $e->getMessage();
        echo $e->getLine();

      }       
  }

}