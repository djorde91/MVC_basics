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

    public function show_pages(){

      try{

          $stmt = $this->conn->do_query("SELECT * FROM pages");
          $stmt->execute(array());

          $array_pages = array(); 
          $contador = 0;

          while($registro = $stmt->fetch(PDO::FETCH_ASSOC)){

            $array_pages[$contador] = $registro;
            $contador++;

          }
          return $array_pages;

        }
        catch(PDOException $e){

            echo $e->getMessage();
            echo $e->getLine();
          }
    }

    //LA FUNCION SHOW_PAGES Y EDIT_PAGES SE PARECEN MUCHO. COMO SE PODRÍA OPTIMIZAR MÁS EL CÓDIGO?
    public function edit_pages($p_page_id){

      try{

          $stmt = $this->conn->do_query("SELECT page_content FROM pages WHERE page_id=:page_id");
          $stmt->execute(array(':page_id'=>$p_page_id));
  
          $array_content = array(); 
          
          while($registro = $stmt->fetch(PDO::FETCH_ASSOC)){

            $array_content = $registro;
            
          } 
          return $array_content;

        }
        catch(PDOException $e){

            echo $e->getMessage();
            echo $e->getLine();
          }
    }


}