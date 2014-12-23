<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
        <title>SSPO | Sistema para el Seguimiento del Plan Operativo</title>
        <link rel="shortcut icon" href="<?php echo base_url('images/pdvsa.ico');?>" />
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
<style type='text/css'>
body
{
	font-family: Arial;
	font-size: 14px;
        background: linear-gradient(#FFF ,#DDD );
}
a {
    color: blue;
    text-decoration: none;
    font-size: 14px;
}
a:hover
{
     text-decoration: underline;
}
</style>
</head>
<body>
	<div>
		<a href='<?php echo site_url('maestros/ubicacion')?>'>Regi&oacute;n / Negocio / Filial</a> |
		<a href='<?php echo site_url('maestros/usuarios')?>'>Usuarios</a> |
		<a href='<?php echo site_url('maestros/objetivospp')?>'>Objetivos del Plan de la Patria</a> |
		<a href='<?php echo site_url('maestros/lineas_accion')?>'>Lineas de Acci&oacute;n</a> |
		<a href='<?php echo site_url('maestros/actividades')?>'>Actividades</a> | 
		<a href='<?php echo site_url('maestros/tareas')?>'>Tareas</a> |		 
		<a href='<?php echo site_url('maestros/unidad_medida')?>'>Unidad de Medida</a> | 
		<a href='<?php echo site_url('maestros/dominio')?>'>Dominio</a> |
		<a href='<?php echo site_url('maestros/objetivoscc')?>'>Objetivo de Control</a>|
		<a href='<?php echo site_url('maestros/control')?>'>Control ISO 27002</a>
		
	</div>
	<div style='height:20px;'></div>  
        <?php //$this->load->view('menu_vertical');?>
    <center>
        <div style="width: 90%;">
            <?php echo $output; ?>
            
        </div>
    </center>

</body>
</html>
