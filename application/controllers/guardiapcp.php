<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Guardiapcp extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
                $this->load->library('image_CRUD');    
		$this->load->library('grocery_CRUD','session','ajax_grocery_CRUD');
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
                        $crud->set_relation('s_id_rfn','rfn','descripcion_rfn');
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
		
                    //$this->load->library('ajax_grocery_CRUD');
                    
                    $crud = new grocery_CRUD();
                        
			$crud->set_table('distrito');
			$crud->set_subject('Sub-División 2');
                        
                        $crud->set_relation('id_rfn','rfn','descripcion_rfn');
			$crud->set_relation('id_division','division','{descripcion_division}-{s_id_rfn}');
                        //
			$crud->display_as('descripcion_distrito','Nombre Sub-Division 2');
			$crud->display_as('id_division','Nombre Sub-Division 1');
			$crud->display_as('id_rfn','Región/Filial/Negocio');
			
                        //$crud->set_relation_dependency('id_division','id_rfn','s_id_rfn');
                        
                        
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
			$crud->set_subject('Evento Relevante');
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
	$crud->set_subject('Evento Relevante');
        
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
        $crud->required_fields('id_rfn','id_division','id_tipo','descripcion_evento','accion_realizada', 'impacto_operacional', 'descripcion_impacto', 'fecha_evento');
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


        
        
        $crud->callback_add_field('id_division', array($this, 'empty_subdivision1_dropdown_select'));
			$crud->callback_edit_field('id_division', array($this, 'empty_subdivision1_dropdown_select'));
			$crud->callback_add_field('id_distrito', array($this, 'empty_subdivision2_dropdown_select'));
			$crud->callback_edit_field('id_distrito', array($this, 'empty_subdivision2_dropdown_select'));
						
			$output = $crud->render();
                        
                        			
			//DEPENDENT DROPDOWN SETUP
			$dd_data = array(
				//GET THE STATE OF THE CURRENT PAGE - E.G LIST | ADD
				'dd_state' =>  $crud->getState(),
				//SETUP YOUR DROPDOWNS
				//Parent field item always listed first in array, in this case countryID
				//Child field items need to follow in order, e.g stateID then cityID
				//'dd_dropdowns' => array('countryID','stateID','cityID'),
				'dd_dropdowns' => array('id_rfn','id_division','id_distrito'),
				//SETUP URL POST FOR EACH CHILD
				//List in order as per above
				'dd_url' => array('', site_url().'guardiapcp/get_subdivision1/', site_url().'guardiapcp/get_subdivision2/'),
				//LOADER THAT GETS DISPLAYED NEXT TO THE PARENT DROPDOWN WHILE THE CHILD LOADS
				'dd_ajax_loader' => base_url().'ajax-loader.gif'
			);
			$output->dropdown_setup = $dd_data;
			
			$this->_example_output($output);
	
	}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		
	}		
		

    }
    
    /**/
    //CALLBACK FUNCTIONS
	function empty_subdivision1_dropdown_select()
	{
		//CREATE THE EMPTY SELECT STRING
		$empty_select = '<select name="id_division" class="chosen-select" data-placeholder="Select Sub-División 1" style="width: 300px; display: none;">';
		$empty_select_closed = '</select>';
		//GET THE ID OF THE LISTING USING URI
		$listingID = $this->uri->segment(4);
		
		//LOAD GCRUD AND GET THE STATE
		$crud = new grocery_CRUD();
		$state = $crud->getState();
		
		//CHECK FOR A URI VALUE AND MAKE SURE ITS ON THE EDIT STATE
		if(isset($listingID) && $state == "edit") {
			//GET THE STORED STATE ID
			$this->db->select('id_rfn, id_division')
					 ->from('eventos_2')
					 ->where('id_evento', $listingID);
			$db = $this->db->get();
			$row = $db->row(0);
			$countryID = $row->id_rfn;
			$stateID = $row->id_division;
			
			//GET THE STATES PER COUNTRY ID
			$this->db->select('*')
					 ->from('division')
					 ->where('s_id_rfn', $countryID);
			$db = $this->db->get();
			
			//APPEND THE OPTION FIELDS WITH VALUES FROM THE STATES PER THE COUNTRY ID
			foreach($db->result() as $row):
				if($row->id_division == $stateID) {
					$empty_select .= '<option value="'.$row->id_division.'" selected="selected">'.$row->descripcion_division.'</option>';
				} else {
					$empty_select .= '<option value="'.$row->id_division.'">'.$row->descripcion_division.'</option>';
				}
			endforeach;
			
			//RETURN SELECTION COMBO
			return $empty_select.$empty_select_closed;
		} else {
			//RETURN SELECTION COMBO
			return $empty_select.$empty_select_closed;	
		}
	}
	function empty_subdivision2_dropdown_select()
	{
		//CREATE THE EMPTY SELECT STRING
		$empty_select = '<select name="id_distrito" class="chosen-select" data-placeholder="Select Sub-División 2" style="width: 300px; display: none;">';
		$empty_select_closed = '</select>';
		//GET THE ID OF THE LISTING USING URI
		$listingID = $this->uri->segment(4);
		
		//LOAD GCRUD AND GET THE STATE
		$crud = new grocery_CRUD();
		$state = $crud->getState();
		
		//CHECK FOR A URI VALUE AND MAKE SURE ITS ON THE EDIT STATE
		if(isset($listingID) && $state == "edit") {
			//GET THE STORED STATE ID
			$this->db->select('id_division, id_distrito')
					 ->from('eventos_2')
					 ->where('id_evento', $listingID);
			$db = $this->db->get();
			$row = $db->row(0);
			$stateID = $row->id_division;
			$cityID = $row->id_distrito;
			
			//GET THE CITIES PER STATE ID
			$this->db->select('*')
					 ->from('distrito')
					 ->where('id_division', $stateID);
			$db = $this->db->get();
			
			//APPEND THE OPTION FIELDS WITH VALUES FROM THE STATES PER THE COUNTRY ID
			foreach($db->result() as $row):
				if($row->city_id == $cityID) {
					$empty_select .= '<option value="'.$row->id_distrito.'" selected="selected">'.$row->descripcion_distrito.'</option>';
				} else {
					$empty_select .= '<option value="'.$row->id_distrito.'">'.$row->descripcion_distrito.'</option>';
				}
			endforeach;
			
			//RETURN SELECTION COMBO
			return $empty_select.$empty_select_closed;
		} else {
			//RETURN SELECTION COMBO
			return $empty_select.$empty_select_closed;	
		}
	}
				
	//GET JSON OF STATES
	function get_subdivision1()
	{
		$countryID = $this->uri->segment(3);
		
		$this->db->select("*")
				 ->from('division')
				 ->where('s_id_rfn', $countryID);
		$db = $this->db->get();
		
		$array = array();
		foreach($db->result() as $row):
			$array[] = array("value" => $row->id_division, "property" => $row->descripcion_division);
		endforeach;
		
		echo json_encode($array);
		exit;
	}
	
	//GET JSON OF CITIES
	function get_subdivision2()
	{
		$stateID = $this->uri->segment(3);
		
		$this->db->select("*")
				 ->from('distrito')
				 ->where('id_division', $stateID);
		$db = $this->db->get();
		
		$array = array();
		foreach($db->result() as $row):
			$array[] = array("value" => $row->id_distrito, "property" => $row->descripcion_distrito);
		endforeach;
		
		echo json_encode($array);
		exit;
	}
        /**/

        
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
