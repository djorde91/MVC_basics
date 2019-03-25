<?php 
require_once ($_SERVER['DOCUMENT_ROOT'] . "/app/core/Controller.php");

class Ajax extends Controller
{
		protected $content;

		public function __construct(){
		$this->content = $this->model('m_admin');
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

		public function ajax_create_page(){
			$this->content->create_page($_POST['f_page_name']);


		}

		public function ajax_delete_page(){
			$this->content->delete_page($_POST['f_pageToDelete']);
		
		}

		public function ajax_update_page(){
			$this->content->update_content($_POST['f_content'], $_POST['f_content_edit'] );

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
			      <div class="row">

			      <div class="col-md-12">
			        <form class="form_edit" style="float:left; margin-right:5px;" method="post" name="" action="">
			            <button type="submit" class="btn btn-info" >Editar</button>
			            <input type="hidden" name="f_pageToEdit" value="'. $value["page_id"].'"/>
			        </form>

			        <form class="form_delete" method="post" name="" action="">
			            <button type="submit" class="btn btn-danger" >Eliminar</button>
			            <input type="hidden" name="f_pageToDelete" value="'. $value["page_id"].'"/>
			        </form>

				  </div>
				 </div>

			       
			      </td>
			    </tr>  
			    ';
		    endforeach;

		}

		public function ajax_edit_pages(){

			$array_pages = $this->content->show_pages($_POST['f_pageToEdit'] )[0];
			//var_dump($array_pages);
			    echo '
				    <div class="row">
				    	<div class="cute_crud">
				    		<form id="actualizar_pagina" action="" method="post">
				        		<h2 id="page_title"> Page: '. $array_pages["page_name"] .'</h2>
				        		<textarea name="f_content" class="tinymce_class">'. $array_pages["page_content"] . '</textarea>
				        		<div class="tiny_submit_position" >
				    				<button type="submit" class="btn btn-success">Actualizar página</button>
									<input type="hidden" name="f_content_edit" value="'. $array_pages["page_id"].'"/>
								</div>

				    		</form>
				    	</div>
				        
				    </div>
				    ';
			//var_dump($_POST['f_content']);
			//var_dump($_POST['f_content_edit']);
       			                        

		}

}

