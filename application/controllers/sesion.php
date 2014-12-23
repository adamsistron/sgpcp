<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sesion extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
                $this->load->helper('form');
		$this->load->library('grocery_CRUD');
	}

	public function _exp_output($output = null)
	{

            $this->load->view('sesion.php',$output);
            
	}
//	public function login()
//	{
//            print_r($_POST);
//            echo "<script>alert('...')</script>";
//	}
        public function auth_pdvsa($user,$pass)
        {
        if ($user == '' or empty($user) or $pass == '' or empty($pass))
           return false;
            $ldap = ldap_connect("167.134.201.179");
		//print($ldap);die();
            if ($ldap){
                if (!(@ldap_bind($ldap, 'pdvsa2000\\'.$user, $pass)))
					return false;
				@ldap_close($ldap);
		}                
		return true;
        }
        public function login()
        {
        $user = trim(strtolower($this->input->post('indicador')));
        $pssw = trim($this->input->post('password'));
        
                $auth_pdvsa=$this->auth_pdvsa($user,$pssw);
                
                $query_usuario = $this->db->get_where('to001_usuarios', array('to001_indicador' => $user));

                if ($query_usuario->num_rows() > 0)
                {
                   $row = $query_usuario->row();

                   $newdata = array(
                   'id_usuario'  => $row->to001_usuario_id,
                   'indicador'  => $row->to001_indicador,
                   'ubicacion'  => $row->to001_fk_tm008_ubic_id,
                   'rol'  => $row->to001_rol,
                   'logged_in' => TRUE
                    );
                    
                    if(!$auth_pdvsa){
                        echo "<script>alert('Indicador y/o Contraseña Incorrecta')</script>";
                        redirect('/', 'refresh');
                    }else{
                        $this->session->set_userdata($newdata);
                        //print_r($this->session->all_userdata());die();
                        //$this->logs($accion='sesion-inicio');
                        $indicador=  strtoupper($user);
                        echo "<script>alert('Bienvenido $indicador')</script>";
                        redirect('/guardiapcp/eventos', 'refresh');
                    }
                }else{
                    echo "<script>alert('Indicador NO Registrado en el Sistema')</script>";
                    redirect('/', 'refresh');
                } 

        }
	public function logout()
	{
            $indicador = strtoupper($this->session->userdata('indicador'));
            $this->session->sess_destroy();
            echo "<script>alert('Hasta Luego $indicador')</script>";
            redirect('/', 'refresh');
	}

	public function index()
	{
		$this->_exp_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}

}
