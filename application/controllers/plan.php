<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Plan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url','form');
		$this->load->library('grocery_CRUD','session');
	}

	public function _example_output($output = null)
	{
            $session_id = $this->session->userdata('indicador');
            
            if($session_id<>''){
                $this->load->view('main-aplicacion_plan.php',$output);
            }else{
                redirect('/', 'refresh');
            }
//            $this->data['responsables']=  $this->responsables();
            
	}

	public function offices()
	{
		$output = $this->grocery_crud->render();

		$this->_example_output($output);
	}

	public function index()
	{
		//$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
		
                $this->_example_output((object)array(
                    'output' => '' , 
                    'js_files' => array() ,
                    'css_files' => array(),
                    'responsables'=>$this->responsables(),
                    'unidad'=>$this->unidad(),
                    'frecuencia'=>$this->frecuencia(),
                    'ubicacion'=>$this->ubicacion_option(),
                    
                        
                        ));
	}

        public function insert_pao()//Inserta los meses para cargar el plan de la tarea
	{
		$tm007_tareas_id = $_POST['tm007_tareas_id']; 
                $tm008_ubicacion_id = $_POST['tm008_ubicacion_id']; 
                $tm009_responsable_id = $_POST['tm009_responsable_id']; 
                $tm010_frecuencia_id = $_POST['tm010_frecuencia_id']; 
                $tm011_unidad_id = $_POST['tm011_unidad_id']; 
                $meta = $_POST['meta']; 
                $anio = $_POST['anio']; 

//echo "$anio";die();

//echo $invid;die();

    $sql_id = "SELECT * FROM to013_plan_anual WHERE anio=$anio AND tm008_ubicacion_id=$tm008_ubicacion_id AND tm007_tareas_id=$tm007_tareas_id";

    $result_id = mysql_query($sql_id);

    //echo mysql_num_rows($result);die();

    if(mysql_num_rows($result_id) > 0)
    {
        echo 0;
    }else{

    $sql = "
    INSERT INTO to013_plan_anual
    (tm007_tareas_id, tm008_ubicacion_id, tm009_responsable_id, tm010_frecuencia_id, tm011_unidad_id, meta, anio, mes) 
    VALUES 
    ($tm007_tareas_id,$tm008_ubicacion_id,$tm009_responsable_id,$tm010_frecuencia_id,$tm011_unidad_id,$meta,$anio,'Enero'),
    ($tm007_tareas_id,$tm008_ubicacion_id,$tm009_responsable_id,$tm010_frecuencia_id,$tm011_unidad_id,$meta,$anio,'Febrero'),
    ($tm007_tareas_id,$tm008_ubicacion_id,$tm009_responsable_id,$tm010_frecuencia_id,$tm011_unidad_id,$meta,$anio,'Marzo'),
    ($tm007_tareas_id,$tm008_ubicacion_id,$tm009_responsable_id,$tm010_frecuencia_id,$tm011_unidad_id,$meta,$anio,'Abril'),
    ($tm007_tareas_id,$tm008_ubicacion_id,$tm009_responsable_id,$tm010_frecuencia_id,$tm011_unidad_id,$meta,$anio,'Mayo'),
    ($tm007_tareas_id,$tm008_ubicacion_id,$tm009_responsable_id,$tm010_frecuencia_id,$tm011_unidad_id,$meta,$anio,'Junio'),
    ($tm007_tareas_id,$tm008_ubicacion_id,$tm009_responsable_id,$tm010_frecuencia_id,$tm011_unidad_id,$meta,$anio,'Julio'),
    ($tm007_tareas_id,$tm008_ubicacion_id,$tm009_responsable_id,$tm010_frecuencia_id,$tm011_unidad_id,$meta,$anio,'Agosto'),
    ($tm007_tareas_id,$tm008_ubicacion_id,$tm009_responsable_id,$tm010_frecuencia_id,$tm011_unidad_id,$meta,$anio,'Septiembre'),
    ($tm007_tareas_id,$tm008_ubicacion_id,$tm009_responsable_id,$tm010_frecuencia_id,$tm011_unidad_id,$meta,$anio,'Octubre'),
    ($tm007_tareas_id,$tm008_ubicacion_id,$tm009_responsable_id,$tm010_frecuencia_id,$tm011_unidad_id,$meta,$anio,'Noviembre'),
    ($tm007_tareas_id,$tm008_ubicacion_id,$tm009_responsable_id,$tm010_frecuencia_id,$tm011_unidad_id,$meta,$anio,'Diciembre')

    ;";

    $this->db->query($sql);
    echo 1;
    }
                
                
	}
        public function validar_complemento()//Región / Negocio / Filial
	{
            $tm007_tareas_id = $_POST['tm007_tareas_id'];
            $tm008_ubicacion_id = $_POST['tm008_ubicacion_id'];
            $anio = $_POST['anio'];         
            $sql="SELECT distinct  
                    
                    tm009_responsable_id, tm010_frecuencia_id,
                    tm011_unidad_id, meta
                    FROM to013_plan_anual WHERE tm007_tareas_id=$tm007_tareas_id AND tm008_ubicacion_id=$tm008_ubicacion_id AND anio=$anio";
            //echo $sql;die();
		$query = $this->db->query($sql);
                if ($query->num_rows() > 0)
                {
                   $row = $query->row(); 

                   echo "$row->tm009_responsable_id*$row->tm010_frecuencia_id*$row->tm011_unidad_id*$row->meta";
                }else{
                    echo 0;
                }
                
                
	}
        public function ubicacion_option()//Región / Negocio / Filial
	{
		$query = $this->db->query("SELECT tm008_ubicacion_id, tm008_descripcion FROM tm008_ubicacion ORDER BY tm008_descripcion ASC");
                $options = array();
                $options[0] = "--Seleccione--";
                foreach ($query->result_array() as $row)
                    {
                      $options[$row['tm008_ubicacion_id']] = $row['tm008_descripcion'];
                       
                    }
                return $options;
                
                
	}
        public function responsables()
	{
		$query = $this->db->query("SELECT tm009_responsable_id, tm009_descripcion FROM tm009_responsable ORDER BY tm009_descripcion ASC");
                $options = array();
                $options[0] = "--Seleccione--";
                foreach ($query->result_array() as $row)
                    {
                      $options[$row['tm009_responsable_id']] = $row['tm009_descripcion'];
                       
                    }
                return $options;
                
                
	}
        public function frecuencia()
	{
		$query = $this->db->query("SELECT tm010_frecuencia_id, tm010_descripcion FROM tm010_frecuencia ORDER BY tm010_descripcion ASC");
                $options = array();
                $options[0] = "--Seleccione--";
                foreach ($query->result_array() as $row)
                    {
                      $options[$row['tm010_frecuencia_id']] = $row['tm010_descripcion'];
                       
                    }
                return $options;
	}
        public function unidad()
	{
		$query = $this->db->query("SELECT tm011_unidad_id , tm011_descripcion FROM tm011_unidad ORDER BY tm011_descripcion ASC");
                $options = array();
                $options[0] = "--Seleccione--";
                foreach ($query->result_array() as $row)
                    {
                      $options[$row['tm011_unidad_id']] = $row['tm011_descripcion'];
                       
                    }
                return $options;
	}
        
	public function plan_operativo()
	{
 
            
            // to the url parameter are added 4 parameters as described in colModel
            // we should ; get these parameters to construct the needed query
            // Since we specify in the options of the grid that we will use a GET method 
            // we should use the appropriate command to obtain the parameters. 
            // In our case this is $_POST. If we specify that we want to use post 
            // we should use $_POST. Maybe the better way is to use $_REQUEST, which
            // contain both the GET and POST variables. For more information refer to php documentation.
            // Get the requested page. By default grid sets this to 1. 
            $page = $_POST['page']; 

            // get how many rows we want to have into the grid - rowNum parameter in the grid 
            $limit = $_POST['rows']; 

            // get index row - i.e. user click to sort. At first time sortname parameter -
            // after that the index from colModel 
            $sidx = $_POST['sidx']; 

            // sorting order - at first time sortorder 
            $sord = $_POST['sord']; 

            // if we not pass at first time index use the first column for the index or what you want
            if(!$sidx) $sidx =1; 



            // calculate the number of rows for the query. We need this for paging the result 
            //***$result = mysql_query("SELECT COUNT(*) AS count FROM tm007_tareas"); 
            $result = $this->db->query('SELECT COUNT(*) AS count FROM tm007_tareas');
            //print_r($result);die();
            if ($result->num_rows() > 0)
            {
               $row = $result->row(); 

               $count = $row->count;
            }

            // calculate the total pages for the query 
            if( $count > 0 && $limit > 0) { 
                          $total_pages = ceil($count/$limit); 
            } else { 
                          $total_pages = 0; 
            } 

            // if for some reasons the requested page is greater than the total 
            // set the requested page to total page 
            if ($page > $total_pages) $page=$total_pages;

            // calculate the starting position of the rows 
            $start = $limit*$page - $limit;

            // if for some reasons start position is negative set it to 0 
            // typical case is that the user type 0 for the requested page 
            if($start <0) $start = 0; 

            // the actual query for the grid data 
            $SQL = "select tm004_nombre, tm005_descripcion, tm006_actividad_numero, tm006_descripcion, tm007_tareas_id, tm007_descripcion 
            from 
            tm004_objetivos_pp
            inner join tm005_lineas_accion ON tm004_objetivo_pp_id = tm005_fk_tm004_objetivo_id
            inner join tm006_actividades ON tm05_lineas_accion_id = tm006_fk_tm005_lineas_acc_id
            inner join tm007_tareas ON tm006_actividades_id = tm007_fk_tm006_activ_id ORDER BY $sidx $sord LIMIT $start , $limit"; 
            //echo $SQL."   ";

            //$result = mysql_query( $SQL ) or die("Couldn't execute query.".mysql_error()); 
            $result = $this->db->query($SQL);

            // we should set the appropriate header information. Do not forget this.
            header("Content-type: text/xml;charset=utf-8");

            $s = "<?xml version='1.0' encoding='utf-8'?>";
            $s .=  "<rows>";
            $s .= "<page>".$page."</page>";
            $s .= "<total>".$total_pages."</total>";
            $s .= "<records>".$count."</records>";

            // be sure to put text data in CDATA
            //while($row = mysql_fetch_array($result,MYSQL_ASSOC)) {
            $i=1;
            $anio = $_POST['anio'];
            $tm008_ubicacion_id = $_POST['tm008_ubicacion_id'];
            $invid=$_POST['invid'];
            
            
            foreach ($result->result_array() as $row){
                $j=0;
                //if($tm008_ubicacion_id<>0 && $invid==$row['tm007_tareas_id']){
                if($tm008_ubicacion_id<>0){
                   $result_valid = $this->db->query("SELECT to013_plan_anual_id FROM to013_plan_anual 
                           WHERE 
                           tm008_ubicacion_id=$tm008_ubicacion_id 
                           AND anio=$anio
                           AND tm007_tareas_id=".$row['tm007_tareas_id']);
                   //echo $result_valid;die();
                    if ($result_valid->num_rows() > 0)
                    {
                       $j=1;
                    }else{
                        $j=0;
                    } 
                }
                
                if($j==1){
                    $color="gray";
                    $b1="";
                    $b2="";
                }else{
                    $color="black";
                    $b1="<b>";
                    $b2="</b>";
                }
                
                $s .= "<row id='". $row['tm007_tareas_id']."'>";            
                $s .= "<cell><![CDATA[<font color='$color'>$b1". $row['tm006_actividad_numero']."$b2</font>]]></cell>";
                $s .= "<cell><![CDATA[<font color='$color'>$b1". $row['tm004_nombre']."$b2</font>]]></cell>";
                $s .= "<cell><![CDATA[<font color='$color'>$b1". $row['tm005_descripcion']."$b2</font>]]></cell>";
                $s .= "<cell><![CDATA[<font color='$color'>$b1". $row['tm006_descripcion']."$b2</font>]]></cell>";
                $s .= "<cell><![CDATA[<font color='$color'>$b1". $row['tm007_descripcion']."$b2</font>]]></cell>";
                $s .= "<cell>". $j ."</cell>";
                $s .= "</row>";
                $i++;
            }
            $s .= "</rows>"; 

            echo $s;

	}
        
        public function plan_operativo_mes(){
            




//if($tm007_tareas_id<>"0"){
    //echo "Entro";
if(!empty($_POST['oper'])){
    
    $oper = $_POST['oper']; 
    $id = $_POST['id']; 
    
    $planificadas = $_POST['planificadas']; 
    $ejecutadas = $_POST['ejecutadas']; 
    $bajo_demanda = $_POST['bajo_demanda']; 
    
    //echo "$oper-$id-$invdate-$invid-$amount";//die();
    
    if($_POST['oper']=='add'){
       
        $sql = "INSERT INTO invheader (invdate, amount, tax, total, note) VALUES
        ('$invdate', $amount, $tax, $total, '$note');";
        
    }elseif ($_POST['oper']=='edit') {
        
        $sql = "UPDATE to013_plan_anual SET planificadas=$planificadas, ejecutadas=$ejecutadas, bajo_demanda=$bajo_demanda WHERE to013_plan_anual_id=$id";
       
    }elseif ($_POST['oper']=='del') {
       
        echo "if".$_POST['oper'];  
        
    }  else {
       
        echo "otra"; 
        
    }
    //echo $sql;die();
    //***mysql_query($sql) or die("Couldn't execute query.".mysql_error()); 
    $this->db->query($sql);
}else{
$tm007_tareas_id = $_POST['tm007_tareas_id'];
$tm008_ubicacion_id = $_POST['tm008_ubicacion_id'];
$anio = $_POST['anio'];    

// to the url parameter are added 4 parameters as described in colModel
// we should ; get these parameters to construct the needed query
// Since we specify in the options of the grid that we will use a GET method 
// we should use the appropriate command to obtain the parameters. 
// In our case this is $_POST. If we specify that we want to use post 
// we should use $_POST. Maybe the better way is to use $_REQUEST, which
// contain both the GET and POST variables. For more information refer to php documentation.
// Get the requested page. By default grid sets this to 1. 
$page = $_POST['page']; 
 
// get how many rows we want to have into the grid - rowNum parameter in the grid 
$limit = $_POST['rows']; 
 
// get index row - i.e. user click to sort. At first time sortname parameter -
// after that the index from colModel 
$sidx = $_POST['sidx']; 
 
// sorting order - at first time sortorder 
$sord = $_POST['sord']; 
 
// if we not pass at first time index use the first column for the index or what you want
if(!$sidx) $sidx =1; 
 

 
// calculate the number of rows for the query. We need this for paging the result 


$result = $this->db->query("
        SELECT COUNT(*) AS count FROM to013_plan_anual 
        WHERE
        tm007_tareas_id=$tm007_tareas_id AND
        tm008_ubicacion_id=$tm008_ubicacion_id AND
        anio=$anio");
            //print_r($result);die();
            if ($result->num_rows() > 0)
            {
               $row = $result->row();               

               $count = $row->count;
            }

//***$row = mysql_fetch_array($result,MYSQL_ASSOC); 
//***$count = $row['count']; 
 
// calculate the total pages for the query 
if( $count > 0 && $limit > 0) { 
              $total_pages = ceil($count/$limit); 
} else { 
              $total_pages = 0; 
} 
 
// if for some reasons the requested page is greater than the total 
// set the requested page to total page 
if ($page > $total_pages) $page=$total_pages;
 
// calculate the starting position of the rows 
$start = $limit*$page - $limit;
 
// if for some reasons start position is negative set it to 0 
// typical case is that the user type 0 for the requested page 
if($start <0) $start = 0; 
 
// the actual query for the grid data 

$SQL="SELECT to013_plan_anual.to013_plan_anual_id, tm007_tareas.tm007_descripcion,to013_plan_anual.anio, to013_plan_anual.mes, to013_plan_anual.planificadas, to013_plan_anual.ejecutadas, to013_plan_anual.bajo_demanda FROM to013_plan_anual,tm007_tareas  
        WHERE 
        to013_plan_anual.tm007_tareas_id=tm007_tareas.tm007_tareas_id AND
        to013_plan_anual.tm007_tareas_id=$tm007_tareas_id AND
        to013_plan_anual.tm008_ubicacion_id=$tm008_ubicacion_id AND
        to013_plan_anual.anio=$anio
        ORDER BY $sidx $sord LIMIT $start , $limit";
        
//$SQL = "SELECT invid, invdate, amount, tax,total, note FROM invheader WHERE invid=$invid ORDER BY $sidx $sord LIMIT $start , $limit"; 

//echo $SQL;

//$result = mysql_query( $SQL ) or die("Couldn't execute query.".mysql_error()); 
$result = $this->db->query($SQL);
 
// we should set the appropriate header information. Do not forget this.
header("Content-type: text/xml;charset=utf-8");
 
$s = "<?xml version='1.0' encoding='utf-8'?>";
$s .=  "<rows>";
$s .= "<page>".$page."</page>";
$s .= "<total>".$total_pages."</total>";
$s .= "<records>".$count."</records>";
 
// be sure to put text data in CDATA
//while($row = mysql_fetch_array($result,MYSQL_ASSOC)) {
    foreach ($result->result_array() as $row){
    $s .= "<row id='". $row['to013_plan_anual_id']."'>";            
    $s .= "<cell>". $row['to013_plan_anual_id']."</cell>";
    $s .= "<cell><![CDATA[". $row['tm007_descripcion']."]]></cell>";
    //$s .= "<cell><![CDATA[<font>". $row['tm007_descripcion']."</font>]]></cell>";
    $s .= "<cell>". $row['anio']."</cell>";
    $s .= "<cell>". $row['mes']."</cell>";
    $s .= "<cell>". $row['planificadas']."</cell>";
    $s .= "<cell>". $row['ejecutadas']."</cell>";
    $s .= "<cell>". $row['bajo_demanda']."</cell>";
    $s .= "</row>";
}
$s .= "</rows>"; 
 
echo $s;
}    
        }

                public function ubicacion()
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
	}
	public function usuarios()
	{
		try{
			$crud = new grocery_CRUD();
			
			$crud->set_language("spanish");

			//$crud->set_theme('datatables');
			$crud->set_table('to001_usuarios');
			$crud->set_subject('Usuario');
			//$crud->required_fields('city');
			//$crud->columns('city','country','phone','addressLine1','postalCode');
			$crud->set_relation('to001_fk_tm008_ubic_id','tm008_ubicacion','tm008_descripcion');
			//$crud->display_as('to001_indicador','Indicador')->display_as('to001_fk_tm008_ubic_id','Regi&oacute;n/Negocio/Filial')->display_as('to001_rol','Rol');

			$output = $crud->render();

			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	public function objetivospp()
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
	            $crud->set_relation('tm007_fk_tm006_activ_id','tm006_actividades','tm006_descripcion');
			$crud->display_as('tm007_descripcion','Tarea')->display_as('tm007_fk_tm006_activ_id','Actividad');
                  $crud->set_relation_n_n('Control', 'tr001_control_tarea', 'tm003_controles', 'tr001_fk_tm007_tareas_id', 'tr001_fk_tm003_control_id', trim('{tm003_numero_control} - {tm003_nombre_control}'),'tr001_control_tarea_id');
    

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
	}

}
