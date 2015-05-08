<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Guardiapcp_aprob extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
                //$this->load->library('image_CRUD');
		$this->load->library('grocery_CRUD','session');
	}

	public function _example_output($output = null)
	{
		
            $this->load->view('main-aplicacion.php',$output);

	}

	public function index()
	{
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}

        public function eventos()
	{
		try{
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->set_table('eventos');
			$crud->set_subject('EVENTOS');
                        $crud->set_relation('id_rfn','rfn','descripcion_rfn');
                        $crud->set_relation('id_division','division','descripcion_division'); 	 
                        $crud->set_relation('id_distrito','distrito','descripcion_distrito'); 
                        $crud->set_relation('id_tipo','tipos_eventos','descripcion_tipo'); 
                        $crud->field_type('indicador_usuario','invisible');

                        $crud->set_field_upload('file_url','assets/uploads/files');
                        
			$crud->required_fields('id_rfn','id_division','id_distrito','id_tipo','descripcion_evento','accion_realizada', 'impacto_operacional', 'descripcion_impacto', 'fecha_evento');
                        
                        /*$crud->fields('indicador_usuario','fecha_evento','id_rfn','id_division','id_distrito','id_tipo','descripcion_evento','accion_realizada', 'impacto_operacional', 'descripcion_impacto', 'file_url');
                        
                        $crud->display_as('id_rfn','Región/Filial/Negocio');
                        $crud->display_as('id_division','División');
                        $crud->display_as('id_distrito','Distrito');
                        $crud->display_as('id_tipo','Tipo');
                        $crud->display_as('descripcion_evento','Descripción del Evento');
                        $crud->display_as('accion_realizada','Acción Realizada');
                        $crud->display_as('impacto_operacional','Impacto Operacional');
                        $crud->display_as('descripcion_impacto','Descripción del Impacto Operacional');
                        $crud->display_as('fecha_evento','Fecha del Evento');
                        $crud->display_as('file_url','Adjuntar archivo gif|jpeg|jpg|png');*/
                        
                        $id_rol = $this->session->userdata('id_rol');
                        $indicador_usuario = $this->session->userdata('indicador_usuario');
                        
                        if($id_rol==1){
                            $crud->unset_delete();
                            $crud->unset_columns('aprobacion_regional','aprobacion_nacional','indicador_regional','indicador_nacional');
                            $crud->fields('indicador_usuario','fecha_evento','id_rfn','id_division','id_distrito','id_tipo','descripcion_evento','accion_realizada', 'impacto_operacional', 'descripcion_impacto', 'file_url');                        
                            $crud->display_as('id_rfn','Región/Filial/Negocio');
                            $crud->display_as('id_division','División');
                            $crud->display_as('id_distrito','Distrito');
                            $crud->display_as('id_tipo','Tipo');
                            $crud->display_as('descripcion_evento','Descripción del Evento');
                            $crud->display_as('accion_realizada','Acción Realizada');
                            $crud->display_as('impacto_operacional','Impacto Operacional');
                            $crud->display_as('descripcion_impacto','Descripción del Impacto Operacional');
                            $crud->display_as('fecha_evento','Fecha del Evento');
                            $crud->display_as('file_url','Adjuntar archivo gif | jpeg | jpg | png');
                        }
                        if($id_rol==2){
                            $crud->unset_delete();
                            $crud->where('`eventos`.indicador_usuario',$indicador_usuario);
                            $crud->unset_columns('aprobacion_nacional','indicador_regional','indicador_nacional');
                            $crud->fields('indicador_usuario','fecha_evento','id_rfn','id_division','id_distrito','id_tipo','descripcion_evento','accion_realizada', 'impacto_operacional', 'descripcion_impacto', 'file_url','aprobacion_regional');                        
                            $crud->display_as('id_rfn','Región/Filial/Negocio');
                            $crud->display_as('id_division','División');
                            $crud->display_as('id_distrito','Distrito');
                            $crud->display_as('id_tipo','Tipo');
                            $crud->display_as('descripcion_evento','Descripción del Evento');
                            $crud->display_as('accion_realizada','Acción Realizada');
                            $crud->display_as('impacto_operacional','Impacto Operacional');
                            $crud->display_as('descripcion_impacto','Descripción del Impacto Operacional');
                            $crud->display_as('fecha_evento','Fecha del Evento');
                            $crud->display_as('file_url','Adjuntar archivo gif | jpeg | jpg | png');
                            $crud->display_as('aprobacion_regional','Aprobación');
                        }
                        if($id_rol==3){
                            $crud->unset_delete();
                            $crud->unset_columns('aprobacion_regional','indicador_regional','indicador_nacional');
                            $crud->field_type('aprobacion_nacional','true_false');
                            $crud->fields('indicador_usuario','fecha_evento','id_rfn','id_division','id_distrito','id_tipo','descripcion_evento','accion_realizada', 'impacto_operacional', 'descripcion_impacto', 'file_url','aprobacion_nacional');                        
                            $crud->display_as('id_rfn','Región/Filial/Negocio');
                            $crud->display_as('id_division','División');
                            $crud->display_as('id_distrito','Distrito');
                            $crud->display_as('id_tipo','Tipo');
                            $crud->display_as('descripcion_evento','Descripción del Evento');
                            $crud->display_as('accion_realizada','Acción Realizada');
                            $crud->display_as('impacto_operacional','Impacto Operacional');
                            $crud->display_as('descripcion_impacto','Descripción del Impacto Operacional');
                            $crud->display_as('fecha_evento','Fecha del Evento');
                            $crud->display_as('file_url','Adjuntar archivo gif | jpeg | jpg | png');
                            $crud->display_as('aprobacion_nacional','Aprobación');
                        }

                        $crud->callback_before_insert($this->logs($accion='evento-insert'));
                        $crud->callback_before_update($this->logs($accion='evento-update'));
                        $crud->callback_before_delete($this->logs($accion='evento-delete'));

                        
			//$crud->columns('city','country','phone','addressLine1','postalCode');

			$output = $crud->render();

			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	public function usuarios()
	{
		try{
			$crud = new grocery_CRUD();
			
			$crud->set_language("spanish");

			//$crud->set_theme('datatables');
			$crud->set_table('usuario');
			$crud->set_subject('USUARIOS');
			//$crud->required_fields('city');
			//$crud->columns('city','country','phone','addressLine1','postalCode');
			$crud->set_relation('id_rol','roles','nombre_rol');
			//$crud->display_as('to001_indicador','Indicador')->display_as('to001_fk_tm008_ubic_id','Regi&oacute;n/Negocio/Filial')->display_as('to001_rol','Rol');

			$output = $crud->render();

			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
        public function roles_management()
	{
		try{
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->set_table('roles');
                        $crud->fields('nombre_rol', 'descripcion_rol');
			/*$crud->set_subject('Usuarios');
			$crud->required_fields('nombre_usuario','indicador_usuario');
			$crud->fields('nombre_usuario', 'indicador_usuario','rol_sistema_usuario','rol_incidente_usuario');
                         
                         */
			//$crud->field_type('nombre_usuario', 'colocar_tipo de campo');

			$output = $crud->render();

			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

}
