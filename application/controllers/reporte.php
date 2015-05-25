<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reporte extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		/* Standard Libraries */
		//$this->load->database('dependent');
                $this->load->database();
		$this->load->helper('url');
		/* ------------------ */	
		
		$this->load->library('grocery_CRUD');	
	}
	
	function _example_output($output = null)
	{
		$this->load->view('example.php', $output);	
	}
	
	function index()
	{
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}	
	
	/*
	* CUSTOM DEPENDENT DROPDOWN
	*/
	function eventos_relevantes()
	{
			//GROCERY CRUD SETUP
			$crud = new grocery_CRUD();

			$crud->set_table('eventos');
			/*
                        $crud->columns('customerName','contactLastName','phone','countryID','stateID','cityID');
			$crud->display_as('salesRepEmployeeNumber','From Employeer')
				 ->display_as('customerName','Name')
				 ->display_as('cityID','City/Town')
				 ->display_as('stateID','State/Province')
				 ->display_as('countryID','Country')
				 ->display_as('contactLastName','Last Name');
                         * 
                         */
			$crud->set_subject('Eventos Relevantes');
			//$crud->set_relation('salesRepEmployeeNumber','employees','{lastName} {firstName}');
			$crud->set_relation('id_rfn','rfn','descripcion_rfn');
			$crud->set_relation('id_division','division','descripcion_division');
			$crud->set_relation('id_distrito','distrito','descripcion_distrito');
			//$crud->fields('customerName','contactLastName','phone','countryID','stateID','cityID');
			//$crud->required_fields('countryID','stateID','cityID');		
			
			//IF YOU HAVE A LARGE AMOUNT OF DATA, ENABLE THE CALLBACKS BELOW - FOR EXAMPLE ONE USER HAD 36000 CITIES AND SLOWERD UP THE LOADING PROCESS. THESE CALLBACKS WILL LOAD EMPTY SELECT FIELDS THEN POPULATE THEM AFTERWARDS
			$crud->callback_add_field('id_division', array($this, 'empty_state_dropdown_select'));
			$crud->callback_edit_field('id_division', array($this, 'empty_state_dropdown_select'));
			$crud->callback_add_field('id_distrito', array($this, 'empty_city_dropdown_select'));
			$crud->callback_edit_field('id_distrito', array($this, 'empty_city_dropdown_select'));
						
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
				'dd_url' => array('', site_url().'reporte/get_states/', site_url().'reporte/get_cities/'),
				//LOADER THAT GETS DISPLAYED NEXT TO THE PARENT DROPDOWN WHILE THE CHILD LOADS
				'dd_ajax_loader' => base_url().'ajax-loader.gif'
			);
			$output->dropdown_setup = $dd_data;
			
			$this->_example_output($output);
	}	
	
	//CALLBACK FUNCTIONS
	function empty_state_dropdown_select()
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
	function empty_city_dropdown_select()
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
	function get_states()
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
	function get_cities()
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
}