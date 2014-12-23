

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />


<link rel="stylesheet" type="text/css" media="screen" href="css/ui.jqgrid.css" />
<link rel="stylesheet" type="text/css" media="screen" href="css/jquery-ui-1.11.0.custom/jquery-ui.css" /> 
<style type="text/css">


label{
    font-family: Arial;
    font-size: 12px;
    text-shadow: 0.1em 0.1em 0.3em #AAA;
}
.da{
    width: 190px;
}
.ui-jqgrid tr.jqgrow td {
  white-space: normal !important;
}
.complet{
    width: 300px;
    border-color: #AAA;
    text-align: left;
    color: red;
    position: relative;
}
</style>
<script src="css/jquery-ui-1.11.0.custom/external/jquery/jquery.js" type="text/javascript"></script>
<script src="css/jquery-ui-1.11.0.custom/jquery-ui.js" type="text/javascript"></script>
<script src="js/jquery-1.11.0.min.js" type="text/javascript"></script>
<script src="js/i18n/grid.locale-es.js" type="text/javascript"></script>
<script src="js/jquery.jqGrid.min.js" type="text/javascript"></script>
<script src="js/src/jqDnR.js" type="text/javascript"></script>
<script src="js/src/jqModal.js" type="text/javascript"></script>
<script src="js/src/grid.common.js" type="text/javascript"></script>
<script src="js/src/grid.formedit.js" type="text/javascript"></script>
 
<script type="text/javascript">
$(function () {
var lastSelList;

    $("#list").jqGrid({

	onSelectRow: function(id){ 
	if(id && id!==lastSelList){ 
                jQuery('#list').restoreRow(lastSelList); 
                lastSelList=id; 
                $('#id_tarea').val(id);
                //$("#list2").trigger('reloadGrid'); 
            validar_complemento();    
            $(".da").attr("disabled",true);
	} 
		//Aqui se pueden agregar eventos al Seleccionar una Fila/Row
                //jQuery('#list').editRow(id, true); 
                //alert(id);
                $("#list2").trigger('reloadGrid'); 
                
	},
        
        //Ocultar Columna    
        LoadComplete: function(){ 
            $("#list").hideCol("tm006_descripcion");
        },
        
        

        url: "plan/plan_operativo",
        datatype: "xml",
        mtype: "POST",
        postData: {
            invid:$("#id_tarea").val(),
            tm008_ubicacion_id:function() { return $("#ubicacion").val(); },
            anio:function() { return $("#anio").val(); }
    
        },
        colNames: ["No","Objetivo", "Linea Acción", "Actividad", "Tarea","Plan"],
        colModel: [
            { name: "tm007_tareas_id",editable: false, width: "20%", align:"center" },//No
            { name: "tm004_nombre",editable: false, width: "245%" },//Objetivo
            { name: "tm005_descripcion",editable: true, width: "275%"},//Linea de Acción
            { name: "tm006_descripcion",hidden:true,editable: true, width: "300%"},//Actividad
            { name: "tm007_tareas_id",editable: true, width: "300%"},//Tarea
            //{ name: "plan",editable: false, width: "25%",edittype: 'image', align:"center" },//Plan
            { name: "plan",editable: false, width: "30%",edittype: 'image',formatter:imageFormat, align:"center" },//Plan
        ],//tm004_nombre, tm005_descripcion, tm006_descripcion, tm007_tareas_id, tm007_descripcion
        pager: "#pager",
        rowNum: 84,
        //rowList: [10, 50, 100],
        sortname: "tm006_actividad_numero",
        sortorder: "asc",
        grouping:false, 
        groupingView : { 
            groupField : ['tm006_descripcion']
        },
        
        viewrecords: true,
        gridview: true,
        //autoencode: true,
        with:"90%",
        height:200,
        caption: "Tareas a Planificar",
	//multiselect: true,
        //multikey:true,
        editurl:"plan/plan_operativo"

	
    })
        .navGrid('#pager',{edit:false,add:false,del:false,search:false, view:false, }
        ,
        {
        
        //jqModal:false,
        reloadAfterSubmit:true,
        closeOnEscape:true,
        //savekey: [true,13],
        closeAfterEdit:true,
        closeAfterAdd:true,
        //width:400,
        //viewPagerButtons:true,
        onclickSubmit:function(params, postdata){
            var p=params;
            var pt=postdata;
            //alert('Edit');
        },
        
    }  ,
        {
        
        //jqModal:false,
        reloadAfterSubmit:true,
        closeOnEscape:true,
        //savekey: [true,13],
        //closeAfterEdit:true,
        closeAfterAdd:true,
        //width:400,
        //viewPagerButtons:true,
        onclickSubmit:function(params, postdata){
            var p=params;
            var pt=postdata;
            //alert('Add');
        }
        
    }
        
                )
        /*.navButtonAdd('#pager',{
            caption:"PTA", 
            title:"Planificar Tareas Anuales",
            buttonicon:"ui-icon-calendar", 
            onClickButton: function(){ 
                
                $(".da").attr("disabled",false);
                
            }, 
            position:"last"
        });*/
        ;
        function imageFormat( cell, options, rowObject ){
        //alert(cellvalue);
        if(cell==1){
            return "<span class='ui-icon ui-icon-check'></span>";
        }else{
            return "<span class='ui-icon ui-icon-minus'></span>";
        }
        
        //return "$"+cellvalue+options+rowObject;
}
        
var lastSelList2;
$("#list2").jqGrid({

	onSelectRow: function(id){ 
	if(id && id!==lastSelList2){ 
		 jQuery('#list2').restoreRow(lastSelList2); 
		 lastSelList2=id; 
	} 
		//Aqui se pueden agregar eventos al Seleccionar una Fila/Row
        var editparameters = {
	
                url : "plan/plan_operativo_mes",
                mtype : "POST",
                postData: {
                    tm007_tareas_id:function() { return $("#id_tarea").val(); },
                    tm008_ubicacion_id:function() { return $("#ubicacion").val(); },
                    anio:function() { return $("#anio").val(); }

                },
        }
                jQuery('#list2').editRow(id, true); 
	},
        //`planid`, `invid`, `mes`, `planificadas`, `bajo_demanda`
        url: "plan/plan_operativo_mes",
        datatype: "xml",
        mtype: "POST",
        postData: {
            tm007_tareas_id:function() { return $("#id_tarea").val(); },
            tm008_ubicacion_id:function() { return $("#ubicacion").val(); },
            anio:function() { return $("#anio").val(); }
            
        },
  
        colNames: ["No ", "Tarea", "Año", "Mes", "Planificadas", "Ejecutadas", "Bajo Demanda"],
        colModel: [
            { name: "to013_plan_anual_id",editable: false, width: "25%" },
            { name: "tarea",editable: false, width: "455%",sortorder:false },
            { name: "anio",editable: false, width: "65%", sortorder:false, align: "center" },
            { name: "mes",editable: false, width: "65%", sortorder:false, align: "center" },
            { name: "planificadas",editable: true, width: "80%", sortorder:false, align: "center" },
            { name: "ejecutadas",editable: true, width: "80%", sortorder:false, align: "center" },
            { name: "bajo_demanda",editable: true, width: "90%", sortorder:false, align: "center" }
        ],
        pager: "#pager2",
        rowNum: 12,
        rowList: [6, 9, 12],
        sortname: "to013_plan_anual_id",
        sortorder: "asc",
        viewrecords: true,
        
        gridview: true,
        autoencode: true,
        //with:900,
        height:120,
        caption: "Plan de Tareas Mensuales",
        
	//multiselect: true,
        //multikey:true,
        edit:true,
        editurl:"plan/plan_operativo_mes"

	
    }).navGrid('#pager2',{edit:false,add:false,del:false,search:false, view:false})


    $(".da").attr("disabled",true);
    //$(".event2").attr("readonly",true);
    cargar_plan();
    cambiar_ubicacion();
    
        //$("#list").hideCol("tm006_descripcion");
        //$('#cargar_plan').hide();

        
        //VALIDAR FORMULARIO


}); 
function cambiar_ubicacion(){
    $( "#ubicacion" ).change(function() {
        
        var rnfs = $(this).find('option:selected');
        var rnf = rnfs.text();
        
        alert("Cambiará de Región/Negocio/Filial: "+rnf);
        $("#list").trigger('reloadGrid');       
    });
}
    
function cargar_plan(){
    $( "#cargar_plan" ).click(function() {
        var r = confirm("¿Está seguro de usar estos datos para cargar el Plan Operativo?");
        if (r === true) {
              if(!validarFormulario("form")){   
        return false;              
    }else{               
       
            $.ajax({
                type: "POST",
                url: "plan/insert_pao",
                data: {
                    tm007_tareas_id:$("#id_tarea").val(),
                    tm008_ubicacion_id:$("#ubicacion").val(),
                    tm009_responsable_id:$("#responsable").val(),
                    tm010_frecuencia_id:$("#frecuencia").val(),
                    tm011_unidad_id:$("#unidad").val(),
                    meta:$("#meta").val(),
                    anio:$("#anio").val()
                }
                })
                .done(function( msg ) {
                //$("#carga").val(msg)
                if(msg!=0){
                    //alert("aqui");       
                    $("#cargar_plan").hide();        
                    $("#list").trigger('reloadGrid');         
                    $("#list2").trigger('reloadGrid'); 
                    $(".complet").attr("disabled",true);
                    
                }else{
                    $("#list").trigger('reloadGrid'); 
                    $("#list2").trigger('reloadGrid'); 
                    $("#cargar_plan").show();
                }
                });
         //alert("bien se enviara el formulario");  
    }
} else {
        alert("Ha Presionado Cancelar!");
        }
        
    });
    
}
function validar_complemento(){
    
            $.ajax({
                type: "POST",
                url: "plan/validar_complemento",
                data: {
                    tm007_tareas_id:$("#id_tarea").val(),
                    tm008_ubicacion_id:$("#ubicacion").val(),
                    /*tm009_responsable_id:$("#responsable").val(),
                    tm010_frecuencia_id:$("#frecuencia").val(),
                    tm011_unidad_id:$("#unidad").val(),
                    meta:$("#meta").val(),*/
                    anio:$("#anio").val()
                }
                })
                .done(function( msg ) {
                //alert( "---: " + msg );
                if(msg!=0){
                    var arr = msg.split('*');
                
                    $("#responsable").val(arr[0]);
                    $("#frecuencia").val(arr[1]);
                    $("#unidad").val(arr[2]);
                    $("#meta").val(arr[3]);
                    $("#cargar_plan").hide();
                    $(".complet").attr("disabled",true);
                    
                }else{
                    $("#responsable").val(0);
                    $("#frecuencia").val(0);
                    $("#unidad").val(0);
                    $("#meta").val(0);
                    $("#cargar_plan").show();
                    $(".complet").attr("disabled",false);
                }
               
                    
                });
        
    
}
function validarFormulario(frm){
    var v= true;     
    $(frm).find('.complet').each(function(){ 
        if ($(this).attr('data-check')) {  
            if( $(this).attr("data-check")!= "" ){  
                if($(this).val() == "0"){ 
                    alert("El Campo '" +$(this).attr("data-check")+"' No debe estar vacio");  
                    v = false;                 
                }    
            }    
        }        
    }); 
    return v; 
    }
    
  

</script>

</head>
<body>
    <center>
        <div style="margin-top: 1em; margin-bottom: 1em; border:4px #AAA;">
        <table border="0">
            <tr>
                <td>
                    <?php 
                    $attributes = array('class' => 'form', 'id' => 'form', 'name' => 'form',);
                    echo form_open('#',$attributes);
                    echo form_label('Región/Negocio/Filial', 'ubicacion');
                        
                    ?>
                </td>
                <td>
                    <?php 
                        $ubi=$this->session->userdata('ubicacion');
                        //$attr='id="ubicacion" class="complet event2" data-check="ubicacion" disabled="true"';
                        //echo form_dropdown('ubicacion', $ubicacion, $ubi,$attr);
                        $attr='id="ubicacion" class="complet event2" data-check="ubicacion"';
                        echo form_dropdown('ubicacion', $ubicacion, '0',$attr);
                    ?>
                </td>
                <td>
                    <?php 
                    echo form_label('AÑO', 'anio');
                        
                    ?>
                </td>
                <td>
                    <?php 
                        $anios=array(
                            "0"=>"--Seleccione--",
                            "2011"=>"2011",
                            "2012"=>"2012",
                            "2013"=>"2013",
                            "2014"=>"2014",
                        );
                        
                        $attr='id="anio" class="complet event2" data-check="anio"';
                        echo form_dropdown('anio', $anios, '2014',$attr);
                    ?>
                </td>
            </tr>
        </table>
    </div>
        </center>
    <div>
        <table id="list"><tr><td></td></tr></table>
        <div id="pager"></div>
        
    </div>
    <center>
    <div style="margin-top: 0.5em; margin-bottom: 0.5em; border:4px #AAA;display: block">
        <table border="0">
            <tr>
                <td>
                    <?php 
                    
                    echo form_label('RESPONSABLE', 'responsable');
                        
                    ?>
                </td>
                <td>
                    <?php 
                        
                        $attr='id="responsable" class="complet" data-check="responsable"';
                        echo form_dropdown('responsable', $responsables, '0',$attr);
                    ?>
                </td>
                <td>
                    <?php 
                    echo form_label('FRECUENCIA', 'frecuencia');
                        
                    ?>
                </td>
                <td>
                    <?php 
                        
                        $attr='id="frecuencia" class="complet" data-check="frecuencia"';
                        echo form_dropdown('frecuencia', $frecuencia, '0',$attr);
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php 
                    echo form_label('META', 'meta');
                        
                    ?>
                </td>
                <td align="right">
                    <?php 
                        $data = array(
                            'name'        => 'meta',
                            'id'          => 'meta',
                            'value'       => '0',
                            'maxlength'   => '2',
                            'size'        => '50',
                            'class'       => 'complet',
                            'style'       => 'width:296px',
                             'data-check' => "meta",
                          );

                        echo form_input($data);
                    ?>
                </td>
                <td>
                    <?php 
                    echo form_label('UNIDAD', 'unidad');
                        
                    ?>
                </td>
                <td>
                    <?php 
                        
                        $attr='id="unidad" class="complet" data-check="unidad"';
                    echo form_dropdown('unidad', $unidad, '0',$attr);
                    $string = "</div></div>";
                    echo form_close($string);
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <center>
                    <button id="cargar_plan" class="fm-button ui-state-default ui-corner-all fm-button-icon-left">
                        <span class="ui-icon ui-icon-calendar"></span>
                        <!--<img src="<?php echo base_url('images/ELI.gif')?>"/>-->
                        <!--<span class="ui-icon ui-icon-check"></span>-->
                        Cargar Plan
                    </button>
                    </center>
                </td>
            </tr>
        </table>
    </div>
        </center>
    <div>
        <table border="0" id="list2"><tr><td></td></tr></table>
        <div id="pager2"></div>
        
    </div>
    <input type="hidden" id="id_tarea" value="0"/>
</body>
</html>
