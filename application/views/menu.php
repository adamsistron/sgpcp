
<div class="Contenedor-Editable" id="Menu">
    <p style="margin: 0.05em; font-size: 8;margin-left: 1em; font-family: Arial; font-weight: bold; color: #A19B9E ">Opciones</p>
    <span class="PuntoHo_Cortico"></span>

               <a href="#" class="Contenedor-Texto-Menu"><span class="Text-menu" > Registrar  </span></a>
                <span class="PuntoHo_Cortico"></span>
                        <!--a href="<?php echo site_url('guardiapcp/eventos_relevantes')?>" class="Contenedor-Texto-sub-Menu" ><span class="Text-menu"> Eventos No deseados </span></a-->
                        <!--a href="<?php echo site_url('guardiapcp/logros')?>" class="Contenedor-Texto-sub-Menu" ><span class="Text-menu"> Logros/Aspectos Positivos </span></a-->
                        <a href="<?php echo site_url('guardiapcp/er')?>" class="Contenedor-Texto-sub-Menu" ><span class="Text-menu"> Eventos Relevantes </span></a>
                        <!--a href="<?php echo site_url('multiuploader/index')?>" class="Contenedor-Texto-sub-Menu" ><span class="Text-menu"> Example Multi Uploader </span></a-->
<?php $rol = $this->session->userdata('id_rol');if($rol==3){?>
                        <span class="PuntoHo_Cortico"></span>
                        <a href="#" class="Contenedor-Texto-Menu"><span class="Text-menu" > Datos Maestros </span></a>
                <span class="PuntoHo_Cortico"></span>
                        <a href="<?php echo site_url('guardiapcp/rfn')?>" class="Contenedor-Texto-sub-Menu" ><span class="Text-menu"> Negocio/Filial </span></a>
                        <a href="<?php echo site_url('guardiapcp/division')?>" class="Contenedor-Texto-sub-Menu" ><span class="Text-menu"> Sub-División 1 </span></a>   
                        <a href="<?php echo site_url('guardiapcp/distrito')?>" class="Contenedor-Texto-sub-Menu" ><span class="Text-menu"> Sub-División 2 </span></a>                        
<a href="<?php echo site_url('guardiapcp/desviacion')?>" class="Contenedor-Texto-sub-Menu" ><span class="Text-menu"> Desviación </span></a> 
                        <a href="<?php echo site_url('guardiapcp/tipos_eventos')?>" class="Contenedor-Texto-sub-Menu" ><span class="Text-menu"> Tipos de Desviación </span></a>                        
                        <!--a href="<?php echo site_url('guardiapcp/objetivos_estrategicos')?>" class="Contenedor-Texto-sub-Menu" ><span class="Text-menu"> Objetivos Estratégicos</span></a-->                        
                        <a href="<?php echo site_url('guardiapcp/usuarios')?>" class="Contenedor-Texto-sub-Menu" ><span class="Text-menu"> Usuarios </span></a>                        
                        <!--<a href="<?php echo site_url('guardiapcp/hora_tope')?>" class="Contenedor-Texto-sub-Menu" ><span class="Text-menu"> Hora Tope </span></a>-->                        
<?php }?>
                        <span class="PuntoHo_Cortico"></span>
                <a href="<?php echo site_url('sesion/logout')?>" class="Contenedor-Texto-Menu"><span class="Text-menu" > Salir(<?php echo strtoupper($this->session->userdata('indicador_usuario'));?>) </span></a>
    <span class="PuntoHo_Cortico"></span>
             

</div>
