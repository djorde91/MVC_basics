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

    public function update_content($p_content, $p_id){

      try{
  
            $stmt = $this->conn->do_query("UPDATE pages SET page_content = :content WHERE page_id = :pageid ");      
            $stmt->bindparam(":content", $p_content);
            $stmt->bindparam(":pageid", $p_id);
        
            $stmt->execute(); 
            
            return $stmt; 
      }

      catch(PDOException $e)
      {
        echo $e->getMessage();
        echo $e->getLine();

      }       
    }

    public function create_page($p_pagename){

      try{
            $page_url = "/" .$p_pagename;

            $stmt = $this->conn->do_query("INSERT INTO pages(page_name,page_url) 
                                                         VALUES(:pagename, :pageurl)");
            
            $stmt->bindparam(":pagename", $p_pagename);
            $stmt->bindparam(":pageurl", $page_url);
              
            $stmt->execute(); 
            
            return $stmt; 
      }catch(PDOException $e)
      {
        echo $e->getMessage();
        echo $e->getLine();
      }       
    }

    public function delete_page($p_page_id){

      try{
         
            $stmt = $this->conn->do_query("DELETE FROM pages WHERE page_id= :pageid");
            
            $stmt->bindparam(":pageid", $p_page_id);
              
            $stmt->execute(); 
            
            return $stmt; 
      }catch(PDOException $e)
      {
        echo $e->getMessage();
        echo $e->getLine();
      }       
    }



    
    }

