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

     public function iniciar_sesion($p_username, $p_password){

      try{

        $stmt = $this->conn->do_query("SELECT * FROM users WHERE user_name=:username");
        $stmt->execute(array(':username'=>$p_username));
        $filas=$stmt->fetch(PDO::FETCH_ASSOC);
           
           //if (password_verify($p_password, $filas['user_password']) ) {
              //Falta hashear la contraseña.
             if ( $p_password == $filas['user_password']) {  

              $_SESSION['session_usuario'] = $filas['user_name'];    

            return true;

          }else{

            return false; 
          }

        }
        catch(PDOException $e){

            echo $e->getMessage();
            echo $e->getLine();
          }
    }

    public function show_pages($id = false, $columns = "*"){

      try{
          $query = "SELECT $columns FROM pages";
          $args = array();

          if($id !== false){
            $query .= " WHERE page_id=:page_id";
            $args = array(':page_id'=>$id);
          }

          $stmt = $this->conn->do_query($query);
          $stmt->execute($args);

          $array_pages = $stmt->fetchAll(PDO::FETCH_ASSOC);
          
          return $array_pages;

        }
        catch(PDOException $e){

            echo $e->getMessage();
            echo $e->getLine();
          }
    }


}