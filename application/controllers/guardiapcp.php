<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Guardiapcp extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
                $this->load->library('image_CRUD');    
		$this->load->library('grocery_CRUD','session');
                $this->load->library('Grocery_CRUD_Multiuploader');
	}
        
        function Output_HTML($output = null, $view="crud")
        {	
	$this->load->view($view,$output);
        }
        
	public function _example_output($output = null)
	{
		
            $this->load->view('main-aplicacion.php',$output);
            /*
            $session_id = $this->session->userdata('indicador_usuario');
            if($session_id<>''){
                $this->load->view('main-aplicacion.php',$output);
            }else{
                redirect('/', 'refresh');
            }
*/            
            //$this->load->view('example',$output);
	}

	public function index()
	{
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}

        public function rfn()
	{
		try{
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->set_table('rfn');
			$crud->set_subject('REGIÓN/FILIAL/NEGOCIO');
                        //$crud->set_relation('id_rfn','rfn','descripcion_rfn');
			//$crud->required_fields('city');
			//$crud->columns('city','country','phone','addressLine1','postalCode');

			$output = $crud->render();

			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
        }
        public function division()//Sub División 1
	{
		try{
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->set_table('division');
			$crud->set_subject('Sub-División 1');
                        $crud->set_relation('id_rfn','rfn','descripcion_rfn');
			$crud->display_as('id_rfn','Región/Filial/Negocio');
			$crud->display_as('descripcion_division','Nombre Sub-Division 1');
			//$crud->fields('descripcion_rfn','division');      
			//$crud->required_fields('city');
			//$crud->columns('city','country','phone','addressLine1','postalCode');

			$output = $crud->render();

			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
        }
        public function distrito()//Sub División 2
	{
		try{
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->set_table('distrito');
			$crud->set_subject('Sub-División 2');
                        $crud->set_relation('id_rfn','rfn','descripcion_rfn');
			$crud->set_relation('id_division','division','descripcion_division');
			$crud->display_as('descripcion_distrito','Nombre Sub-Division 2');
			$crud->display_as('id_division','Nombre Sub-Division 1');
			$crud->display_as('id_rfn','Región/Filial/Negocio');
			//$crud->required_fields('city');
			//$crud->columns('city','country','phone','addressLine1','postalCode');

			$output = $crud->render();

			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
        }
        public function desviacion()
	{
		try{
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->set_table('desviacion');
			$crud->set_subject('Eventos No Deseado (Desviación)');
			$crud->display_as('nombre_desviacion','Nombre Desviación');
                        //$crud->set_relation('id_rfn','rfn','descripcion_rfn');
			//$crud->required_fields('city');
			//$crud->columns('city','country','phone','addressLine1','postalCode');

			$output = $crud->render();

			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
        }
        public function tipos_eventos()
	{
		try{
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->set_table('tipos_eventos');
			$crud->set_subject('Tipo de Evento');
			$crud->display_as('id_desviacion','Evento No Deseado (Desviación)');
			$crud->display_as('descripcion_tipo','Nombre Tipo de Evento');
                        $crud->set_relation('id_desviacion','desviacion','nombre_desviacion');
			//$crud->required_fields('city');
			//$crud->columns('city','country','phone','addressLine1','postalCode');

			$output = $crud->render();

			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
        }
        
        public function objetivos_estrategicos()
	{
		try{
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->set_table('objetivos_estrategicos');
			$crud->set_subject('OBJETIVOS ESTRATÉGICOS');
                        //$crud->set_relation('id_rfn','rfn','descripcion_rfn');
			//$crud->required_fields('city');
			//$crud->columns('city','country','phone','addressLine1','postalCode');

			$output = $crud->render();

			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
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
                      //  $crud->new_multi_upload(arg1,arg2);

                        /* Uses default settings */
                        //$crud->new_multi_upload("my_pictures");
                        
                        $id_rol = $this->session->userdata('id_rol');
                        $indicador_usuario = $this->session->userdata('indicador_usuario');
                        
                        if($id_rol==1){
                            $crud->unset_delete();
                            $crud->unset_columns('aprobacion_regional','aprobacion_nacional','indicador_regional','indicador_nacional');
                            $crud->fields('indicador_usuario','fecha_evento','id_rfn','id_division','id_distrito','id_tipo','descripcion_evento','accion_realizada', 'impacto_operacional', 'descripcion_impacto', 'file_url');                        
                            $crud->display_as('id_rfn','Región/Filial/Negocio');
                            $crud->display_as('id_division','Sub-División 1');
                            $crud->display_as('id_distrito','Sub-División 2');
                            $crud->display_as('id_tipo','Tipo de Evento');
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
			    $crud->display_as('id_division','Sub-División 1');
                            $crud->display_as('id_distrito','Sub-División 2');
                            $crud->display_as('id_tipo','Tipo de Evento');
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
                            $crud->display_as('id_division','Sub-División 1');
                            $crud->display_as('id_distrito','Sub-División 2');
                            $crud->display_as('id_tipo','Tipo de Evento');
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
        public function logros()
	{
		try{
			$crud = new grocery_CRUD();
			$crud->set_table('logros');
			$crud->set_subject('LOGROS');

                        $crud->set_relation('id_rfn','rfn','descripcion_rfn');
                        $crud->set_relation('id_objetivo','objetivos_estrategicos','descripcion_objetivo');
                        $crud->field_type('indicador_usuario','invisible');
                        
                        $crud->fields('indicador_usuario','fecha_logro','id_rfn','descripcion_logro','id_objetivo', 'valor_agregado');                                              
                        $crud->display_as('id_rfn','Región/Filial/Negocio');
                        $crud->display_as('fecha_logro','Fecha');
                        $crud->display_as('descripcion_logro','Descripción del Logro');                                              
                        $crud->display_as('id_objetivo','Objetivo Estratégico');                        
                        $crud->display_as('valor_agregado','Valor Agregado');  
                        
                        $id_rol = $this->session->userdata('id_rol');
                        $indicador_usuario = $this->session->userdata('indicador_usuario');
                        
                        if($id_rol==1){
                            $crud->unset_delete();
                        }
                        if($id_rol==2){
                            $crud->unset_delete();
                            $crud->where('`eventos`.indicador_usuario',$indicador_usuario);
                        }
                        if($id_rol==3){
                            $crud->unset_delete();
                            
                        }

                        $crud->callback_before_insert($this->logs($accion='logro-insert'));
                        $crud->callback_before_update($this->logs($accion='logro-update'));
                        $crud->callback_before_delete($this->logs($accion='logro-delete'));
                        
			$output = $crud->render();

			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
        public function logs($accion='a'){

                    $data = $this->session->all_userdata();
                    $data['accion'] = $accion;
                    $this->db->insert('logs', $data); 
        }
        
        
        
        public function imagenes_eventos()
        {
	// No required if you have set timezone already... :)
	if( ! ini_get('date.timezone') )
	{ 
		date_default_timezone_set('GMT'); 
	}
	
	try{

	$crud = new Grocery_CRUD_Multiuploader(); 
	//$this->db = $this->load->database("guardia_pcp",true);
	$crud->set_table('eventos');
	$crud->set_subject('EVENTOS');
        
	//$col = array("title","my_pictures","my_files","my_mail_attachments");
	/*$col = array("my_pictures");	
	$crud->fields($col);
	$crud->columns($col);*/
        $crud->set_relation('id_rfn','rfn','descripcion_rfn');
        $crud->set_relation('id_division','division','descripcion_division'); 	 
        $crud->set_relation('id_distrito','distrito','descripcion_distrito'); 
        $crud->set_relation('id_tipo','tipos_eventos','descripcion_tipo'); 
        $crud->set_relation('id_evento','imagenes_eventos','url');
        $crud->field_type('indicador_usuario','invisible');
        $crud->required_fields('id_rfn','id_division','id_distrito','id_tipo','descripcion_evento','accion_realizada', 'impacto_operacional', 'descripcion_impacto', 'fecha_evento');
        $id_rol = $this->session->userdata('id_rol');
        $indicador_usuario = $this->session->userdata('indicador_usuario');
        if($id_rol==3){
                            //$crud->unset_delete();
                            $crud->unset_columns('aprobacion_regional','indicador_regional','indicador_nacional');
                            $crud->field_type('aprobacion_nacional','true_false');
                            //$crud->fields('indicador_usuario','fecha_evento','id_rfn','id_division','id_distrito','id_tipo','descripcion_evento','accion_realizada', 'impacto_operacional', 'descripcion_impacto', 'file_url','aprobacion_nacional','my_pictures');                        
                            /*$crud->display_as('id_rfn','Región/Filial/Negocio');
                            $crud->display_as('id_division','División');
                            $crud->display_as('id_distrito','Distrito');
                            $crud->display_as('id_tipo','Tipo');
                            $crud->display_as('descripcion_evento','Descripción del Evento');
                            $crud->display_as('accion_realizada','Acción Realizada');
                            $crud->display_as('impacto_operacional','Impacto Operacional');
                            $crud->display_as('descripcion_impacto','Descripción del Impacto Operacional');
                            $crud->display_as('fecha_evento','Fecha del Evento');
                            //$crud->display_as('file_url','Adjuntar archivo gif | jpeg | jpg | png');
                            $crud->display_as('aprobacion_nacional','Aprobación');
                            $crud->edit_fields('aprobacion_nacional');*/
                            $col = array('indicador_usuario','fecha_evento','id_rfn','id_division','id_distrito','id_tipo','descripcion_evento','accion_realizada', 'impacto_operacional', 'descripcion_impacto','aprobacion_nacional','my_pictures');	
                            $crud->fields($col);
                            $crud->columns($col);
                            $crud->display_as('id_rfn','Región/Filial/Negocio');
			    $crud->display_as('id_division','Sub-División 1');
                            $crud->display_as('id_distrito','Sub-División 2');
                            $crud->display_as('id_tipo','Tipo de Evento');
                            $crud->display_as('descripcion_evento','Descripción del Evento');
                            $crud->display_as('accion_realizada','Acción Realizada');
                            $crud->display_as('impacto_operacional','Impacto Operacional');
                            $crud->display_as('descripcion_impacto','Descripción del Impacto Operacional');
                            $crud->display_as('fecha_evento','Fecha del Evento');
                            $crud->display_as('aprobacion_nacional','Aprobación');
                            $crud->display_as('my_pictures','Imágenes');
                        }

	$config = array(

		/* Destination directory */
		"path_to_directory"       =>'assets/grocery_crud_multiuploader/GC_uploads/pictures/',

		/* Allowed upload type */
		"allowed_types"           =>'gif|jpeg|jpg|png|pdf',

		/* Show allowed file types while editing ? */
		"show_allowed_types"      => true,
	
		/* No file text */
		"no_file_text"            =>'No Pictures',

		/* enable full path or not for anchor during list state */
		"enable_full_path"        => false,

		/* Download button will appear during read state */
		"enable_download_button"  => true,

		/* One can restrict this button for specific types...*/
		"download_allowed"        => 'jpg' 		
	 );
	$crud->new_multi_upload("my_pictures",$config);
	
	/*$config = array(
		"path_to_directory"       =>'assets/grocery_crud_multiuploader/GC_uploads/files/',
		"allowed_types"           =>'pdf|doc|html',
		"show_allowed_types"      => true,
		"no_file_text"            =>'No files',
		"enable_full_path"        => false,
		"enable_download_button"  => true,
		"download_allowed"        => 'pdf'		
	 );
	$crud->new_multi_upload("my_files",$config);

	$config = array(
		"path_to_directory"       =>'assets/grocery_crud_multiuploader/GC_uploads/mail/',
		"allowed_types"           =>'txt|dat',
		"show_allowed_types"      => true,
		"no_file_text"            =>'No attachments',
		"enable_full_path"        => false,
		"enable_download_button"  => true,
		"download_allowed"        => 'dat'		
	 );
	$crud->new_multi_upload("my_mail_attachments",$config);*/

	$output = $crud->render();
	//$this->Output_HTML($output);	
	$this->_example_output($output);	
	
	}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		
	}		
		

    }

        
                public function aprobacion_region()
	{
		try{
			$crud = new grocery_CRUD();
			$crud->set_table('eventos');
			$crud->set_subject('EVENTOS');
                        $crud->set_relation('id_rfn','rfn','descripcion_rfn');
                        $crud->set_relation('id_division','division','descripcion_division'); 	 
                        $crud->set_relation('id_distrito','distrito','descripcion_distrito'); 
                        $crud->set_relation('id_tipo','tipos_eventos','descripcion_tipo'); 
                        $crud->set_relation('id_evento','imagenes_eventos','url');
                        $crud->field_type('indicador_usuario','invisible');                                                 
                        $crud->set_field_upload('file_url','assets/uploads/files');
                        
                       // imagenes_eventos();

                        
			$crud->required_fields('id_rfn','id_division','id_distrito','id_tipo','descripcion_evento','accion_realizada', 'impacto_operacional', 'descripcion_impacto', 'fecha_evento');
                        $id_rol = $this->session->userdata('id_rol');
                        $indicador_usuario = $this->session->userdata('indicador_usuario');
                        //$crud->new_multi_upload("file_url");
                       
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
                            $crud->edit_fields('aprobacion_nacional');
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
        

 
       
  
       

        
	/*public function ubicacion()
	{
		try{
			$crud = new grocery_CRUD();
			
			$crud->set_language("spanish");

			//$crud->set_theme('datatables');
			$crud->set_table('tm008_ubicacion');
			$crud->set_subject('Regi&oacute;n / Negocio / Filial');
			//$crud->required_fields('city');
			//$crud->columns('city','country','phone','addressLine1','postalCode');
			//$crud->set_relation('to001_fk_tm008_ubic_id','tm008_ubicacion','tm008_descripcion');
			$crud->display_as('tm008_descripcion','Regi&oacute;n / Negocio / Filial');

			$output = $crud->render();

			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	public function dominio()
	{
		try{
			$crud = new grocery_CRUD();
			
			$crud->set_language("spanish");

			//$crud->set_theme('datatables');
			$crud->set_table('tm001_dominios');
			$crud->set_subject('Dominio');
			$crud->columns('tm001_numero_dominio','tm001_nombre_dominio','tm001_descripcion');
			$crud->fields('tm001_numero_dominio','tm001_nombre_dominio','tm001_descripcion');
			$crud->display_as('tm001_nombre_dominio','Dominio')->display_as('tm001_numero_dominio','N&uacute;mero')->display_as('tm001_descripcion','Descripci&oacute;n');

			$output = $crud->render();

			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	public function objetivoscc()
	{
		try{
			$crud = new grocery_CRUD();
			
			$crud->set_language("spanish");

			//$crud->set_theme('datatables');
			$crud->set_table('tm002_objetivos');
			$crud->set_subject('Objetivo');
			$crud->set_relation('tm002_fk_tm001_dominio_id','tm001_dominios','tm001_nombre_dominio');
			$crud->columns('tm002_numero_objetivo','tm002_fk_tm001_dominio_id','tm002_nombre_objetivo','tm002_descripcion_objetivo');
			$crud->fields('tm002_numero_objetivo','tm002_fk_tm001_dominio_id','tm002_nombre_objetivo','tm002_descripcion_objetivo');
		      $crud->display_as('tm002_numero_objetivo','N&uacute;mero')->display_as('tm002_nombre_objetivo','Objetivo de Control')->display_as('tm002_descripcion_objetivo','Descripci&oacute;n')->display_as('tm002_fk_tm001_dominio_id','Dominio');

			$output = $crud->render();

			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	public function control()
	{
		try{
			$crud = new grocery_CRUD();
			
			$crud->set_language("spanish");

			//$crud->set_theme('datatables');
			$crud->set_table('tm003_controles');
			$crud->set_subject('Control');
			$crud->set_relation('tm003_fk_tm002_objetivo_id','tm002_objetivos','tm002_nombre_objetivo');
			$crud->columns('tm003_numero_control','tm003_fk_tm002_objetivo_id','tm003_nombre_control');
			//$crud->fields('tm002_numero_objetivo','tm002_fk_tm001_dominio_id','tm002_nombre_objetivo','tm002_descripcion_objetivo');
		      $crud->display_as('tm003_nombre_control','Control_ISO')->display_as('tm003_numero_control','N&uacute;mero')->display_as('tm003_fk_tm002_objetivo_id','Objetivo');

			$output = $crud->render();

			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}*/
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
	/*public function objetivospp()
	{
		try{
			$crud = new grocery_CRUD();
			
			$crud->set_language("spanish");

			//$crud->set_theme('datatables');
			$crud->set_table('tm004_objetivos_pp');
			$crud->set_subject('Objetivo del Plan de la Patria');
			//$crud->required_fields('city');
			//$crud->columns('city','country','phone','addressLine1','postalCode');
			//$crud->set_relation('to001_fk_tm008_ubic_id','tm008_ubicacion','tm008_descripcion');
			$crud->display_as('tm004_nombre','Objetivo del Plan de la Patria');

			$output = $crud->render();

			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	public function lineas_accion()
	{
		try{
			$crud = new grocery_CRUD();
			
			$crud->set_language("spanish");

			//$crud->set_theme('datatables');
			$crud->set_table('tm005_lineas_accion');
			$crud->set_subject('Lineas de Acci&oacute;n');
	            $crud->set_relation('tm005_fk_tm004_objetivo_id','tm004_objetivos_pp','tm004_nombre');
			$crud->display_as('tm005_descripcion','Linea de Acci&oacute;n')->display_as('tm005_fk_tm004_objetivo_id','Objetivo Plan de la Patria');

			$output = $crud->render();

			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
      public function actividades()
	{
		try{
			$crud = new grocery_CRUD();
			
			$crud->set_language("spanish");

			//$crud->set_theme('datatables');
			$crud->set_table('tm006_actividades');
			$crud->set_subject('Actividad');
	            $crud->set_relation('tm006_fk_tm005_lineas_acc_id','tm005_lineas_accion','tm005_descripcion');
			$crud->display_as('tm006_descripcion','Actividad')->display_as('tm006_fk_tm005_lineas_acc_id','Linea de Acci&oacute;n')->display_as('tm006_actividad_numero','N&uacute;mero');

			$output = $crud->render();

			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
      public function tareas()
	{
		try{
			$crud = new grocery_CRUD();
			
			$crud->set_language("spanish");

			//$crud->set_theme('datatables');
			$crud->set_table('tm007_tareas');
			$crud->set_subject('Tarea');
                        $crud->field_type('tm007_descripcion','string');
                        $crud->set_relation('tm007_fk_tm006_activ_id','tm006_actividades','tm006_descripcion');
			$crud->display_as('tm007_descripcion','Tarea')
                             ->display_as('tm007_fk_tm006_activ_id','Actividad');
                        $crud->set_relation_n_n('Control', 'tr001_control_tarea', 'tm003_controles', 'tr001_fk_tm007_tareas_id', 'tr001_fk_tm003_control_id', trim('{tm003_numero_control} - {tm003_nombre_control}'),'tr001_control_tarea_id');
    
//
			$output = $crud->render();

			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
      public function unidad_medida()
	{
		try{
			$crud = new grocery_CRUD();
			
			$crud->set_language("spanish");

			//$crud->set_theme('datatables');
			$crud->set_table('tm011_unidad');
			$crud->set_subject('Unidad de Medida');
	            $crud->display_as('tm011_descripcion','Unidad de Medida');

			$output = $crud->render();

			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	public function employees_management()
	{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('employees');
			$crud->set_relation('officeCode','offices','city');
			$crud->display_as('officeCode','Office City');
			$crud->set_subject('Employee');

			$crud->required_fields('lastName');

			$crud->set_field_upload('file_url','assets/uploads/files');

			$output = $crud->render();

			$this->_example_output($output);
	}

	public function customers_management()
	{
			$crud = new grocery_CRUD();

			$crud->set_table('customers');
			$crud->columns('customerName','contactLastName','phone','city','country','salesRepEmployeeNumber','creditLimit');
			$crud->display_as('salesRepEmployeeNumber','from Employeer')
				 ->display_as('customerName','Name')
				 ->display_as('contactLastName','Last Name');
			$crud->set_subject('Customer');
			$crud->set_relation('salesRepEmployeeNumber','employees','lastName');

			$output = $crud->render();

			$this->_example_output($output);
	}

	public function orders_management()
	{
			$crud = new grocery_CRUD();

			$crud->set_relation('customerNumber','customers','{contactLastName} {contactFirstName}');
			$crud->display_as('customerNumber','Customer');
			$crud->set_table('orders');
			$crud->set_subject('Order');
			$crud->unset_add();
			$crud->unset_delete();

			$output = $crud->render();

			$this->_example_output($output);
	}

	public function products_management()
	{
			$crud = new grocery_CRUD();

			$crud->set_table('products');
			$crud->set_subject('Product');
			$crud->unset_columns('productDescription');
			$crud->callback_column('buyPrice',array($this,'valueToEuro'));

			$output = $crud->render();

			$this->_example_output($output);
	}

	public function valueToEuro($value, $row)
	{
		return $value.' &euro;';
	}

	public function film_management()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('film');
		$crud->set_relation_n_n('actors', 'film_actor', 'actor', 'film_id', 'actor_id', 'fullname','priority');
		$crud->set_relation_n_n('category', 'film_category', 'category', 'film_id', 'category_id', 'name');
		$crud->unset_columns('special_features','description','actors');

		$crud->fields('title', 'description', 'actors' ,  'category' ,'release_year', 'rental_duration', 'rental_rate', 'length', 'replacement_cost', 'rating', 'special_features');

		$output = $crud->render();

		$this->_example_output($output);
	}

	public function film_management_twitter_bootstrap()
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('twitter-bootstrap');
			$crud->set_table('film');
			$crud->set_relation_n_n('actors', 'film_actor', 'actor', 'film_id', 'actor_id', 'fullname','priority');
			$crud->set_relation_n_n('category', 'film_category', 'category', 'film_id', 'category_id', 'name');
			$crud->unset_columns('special_features','description','actors');

			$crud->fields('title', 'description', 'actors' ,  'category' ,'release_year', 'rental_duration', 'rental_rate', 'length', 'replacement_cost', 'rating', 'special_features');

			$output = $crud->render();
			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	function multigrids()
	{
		$this->config->load('grocery_crud');
		$this->config->set_item('grocery_crud_dialog_forms',true);
		$this->config->set_item('grocery_crud_default_per_page',10);

		$output1 = $this->offices_management2();

		$output2 = $this->employees_management2();

		$output3 = $this->customers_management2();

		$js_files = $output1->js_files + $output2->js_files + $output3->js_files;
		$css_files = $output1->css_files + $output2->css_files + $output3->css_files;
		$output = "<h1>List 1</h1>".$output1->output."<h1>List 2</h1>".$output2->output."<h1>List 3</h1>".$output3->output;

		$this->_example_output((object)array(
				'js_files' => $js_files,
				'css_files' => $css_files,
				'output'	=> $output
		));
	}

	public function offices_management2()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('offices');
		$crud->set_subject('Office');

		$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));

		$output = $crud->render();

		if($crud->getState() != 'list') {
			$this->_example_output($output);
		} else {
			return $output;
		}
	}

	public function employees_management2()
	{
		$crud = new grocery_CRUD();

		$crud->set_theme('datatables');
		$crud->set_table('employees');
		$crud->set_relation('officeCode','offices','city');
		$crud->display_as('officeCode','Office City');
		$crud->set_subject('Employee');

		$crud->required_fields('lastName');

		$crud->set_field_upload('file_url','assets/uploads/files');

		$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));

		$output = $crud->render();

		if($crud->getState() != 'list') {
			$this->_example_output($output);
		} else {
			return $output;
		}
	}

	public function customers_management2()
	{

		$crud = new grocery_CRUD();

		$crud->set_table('customers');
		$crud->columns('customerName','contactLastName','phone','city','country','salesRepEmployeeNumber','creditLimit');
		$crud->display_as('salesRepEmployeeNumber','from Employeer')
			 ->display_as('customerName','Name')
			 ->display_as('contactLastName','Last Name');
		$crud->set_subject('Customer');
		$crud->set_relation('salesRepEmployeeNumber','employees','lastName');

		$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));

		$output = $crud->render();

		if($crud->getState() != 'list') {
			$this->_example_output($output);
		} else {
			return $output;
		}
	}*/

}