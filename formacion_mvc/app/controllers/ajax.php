<?php 
require_once ($_SERVER['DOCUMENT_ROOT'] . "/app/core/Controller.php");

class Ajax extends Controller
{
		protected $content;

		public function __construct(){
		$this->content = $this->model('m_Others');
		}

		public function login(){

			if (isset($_POST['f_iniciar'])) {
				
					if($this->content->iniciar_sesion($_POST['f_username'], $_POST['f_password']))
					{
					echo "login_correcto";	
					
					}else{		
					echo "login_error";			
								            		                   	
					}	

			}
								
		}

		public function ajax_show_pages(){

			$array_pages = $this->content->show_pages();	
			//var_dump($array_pages);

		    foreach ($array_pages as $value): 
			    echo'
			    <tr>
			      <td> '. $value["page_id"]. ' </td>
			      <td> '. $value["page_url"] .' </td>
			      <td> '. $value["page_name"] .' </td>
			      <td>
			        <form method="post" name="" action="">
			            <button type="submit" class="btn btn-info" name="f_editar">Editar</button>
			            <button type="submit" class="btn btn-danger" name="f_eliminar">Eliminar</button>
			            <input type="hidden" name="f_pageToEdit" value="'. $value["page_id"].'"/>
			        </form>
			      </td>
			    </tr>  
			    ';
		    endforeach;

		}

		public function ajax_edit_pages(){

			$array_pages = $this->content->edit_pages($_POST['f_pageToEdit']);	
			    echo '
				    <div class="row">
				        <div class="cute_crud">
				        <textarea class="tinymce_class">'. $array_pages["page_content"] . '</textarea>
				        </div>
				        
				    </div>
				    ';

		}

}

