<?php
/* @var $this ProjectsController */
/* @var $model Projects */
/* @var $form CActiveForm */
?>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script type="text/javascript">
function accionCancelar(){
$('<div></div>').appendTo('form')
    .html('<div><h6>Esta seguro de cancelar la accion actual? todo su trabajo no guardado sera borrado.</h6></div>')
    .dialog({
        modal: true,
        title: 'Cancelar',
        zIndex: 10000,
        autoOpen: true,
        width: 'auto',
        resizable: false,
        buttons: {
            Continuar: function () {
                window.location = yii.urls.cancelProject;
                $(this).dialog("close");
            },
            "Quedarme donde estoy": function () {
                $(this).dialog("close");
            }
        },
        close: function (event, ui) {
            $(this).remove();
        }
    });
}
	var section = 1;
	function changeSection(value){
				section += value;
		$(".sections").hide();
		if(section == 3){
			$("#next").hide();
			$("#send").show();
		}
		else{
			$("#next").show();
			$("#send").hide();
		}

		if(section == 1)
			$("#back").hide();
		else
			$("#back").show();


		//alert("ouch, you fucked me bby! "+section);
		$("#section"+section).show();
	}
	function ajaxSave(value){
		var request = $.ajax({
		  url: yii.urls.base+"/index.php/projects/create",
		  method: "POST",
		  data: $("#projects-form").serialize()+"&type="+value,
		  dataType: "json"
		});

			request.done(function(data) {
				alert(data);
				window.location = yii.urls.cancelProject;
		});
			
	}

	function save(value){
			if(value=="send"){
				$('<div></div>').appendTo('form')
				    .html('<div><h6>¿Esta seguro de enviar a revisión este proyecto?</h6></div>')
				    .dialog({
				        modal: true,
				        title: 'Cancelar',
				        zIndex: 10000,
				        autoOpen: true,
				        width: 'auto',
				        resizable: false,
				        buttons: {
				            "Enviar a revisión": function () {
				            	ajaxSave("send");
				                $(this).dialog("close");

				            },
				            "Guardar como borrador": function () {
				            	ajaxSave("draft");
				                $(this).dialog("close");
				            }
				        },
				        close: function (event, ui) {
				            $(this).remove();
				        }
				    });
				
			}else
				ajaxSave("draft")

			
	}
</script>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'projects-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>

	<?php echo $form->errorSummary($model); ?>
<div id="section1" class="sections" >
	<div class="row">
		<?php 
			if(Yii::app()->user->id_roles==13){
				$researcher = "";
				if(!$model->isNewRecord){
					$researcher = $model->idCurriculum->idUser->persons[0];
					$researcher = $researcher['last_name1']." ".$researcher['last_name2'].", ".$researcher['names'];
				}
				echo "Encargado <br>";
				$this->widget('ext.MyAutoComplete', array(
				    'model'=>$model,
				    'attribute'=>'id_curriculum',
				    'name'=>'Projects[id_curriculum]',
				    'id'=>'id_curriculum',
				    'value'=>$researcher,
				    'source'=>$this->createUrl('/sponsorship/getResearchers'),  
				    'options'=>array(
				        'minLength'=>'0' 
				    ),
				));
			}
		?>
	</div>
	<div class="row">
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>250,'placeholder'=>'Título','title'=>'Título')); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'discipline',array('size'=>60,'maxlength'=>100,'placeholder'=>'Diciplina','title'=>'Diciplina')); ?>
		<?php echo $form->error($model,'discipline'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'research_type',array('size'=>60,'maxlength'=>250,'placeholder'=>'Tipo de Investigación','title'=>'Tipo de Investigación')); ?>
		<?php echo $form->error($model,'research_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'priority_topic',array('size'=>60,'maxlength'=>100,'placeholder'=>'Tema prioritario','title'=>'Tema prioritario')); ?>
		<?php echo $form->error($model,'priority_topic'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'sub_topic',array('size'=>60,'maxlength'=>100,'placeholder'=>'Subtema prioritario','title'=>'Subtema prioritario')); ?>
		<?php echo $form->error($model,'sub_topic'); ?>
	</div>

	<div class="row">
		<?php echo $form->textArea($model,'justify',array('rows'=>6, 'cols'=>50,'placeholder'=>'Justificación del tema','title'=>'Justificación del tema')); ?>
		<?php echo $form->error($model,'justify'); ?>
	</div>
</div>




<div id="section2" class="sections" style="display:none;">
	<div class="row">
		<?php echo $form->textField($model,'is_sni',array('placeholder'=>'¿Es SNI?','title'=>'¿Es SNI?')); ?>
		<?php echo $form->error($model,'is_sni'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'develop_uh',array('size'=>50,'maxlength'=>50,'placeholder'=>'Unidad hospitalaria','title'=>'Unidad hospitalaria')); ?>
		<?php echo $form->error($model,'develop_uh'); ?>
	</div>
</div>

<div id="section3" class="sections" style="display:none;">
	<div class="row">
		<?php echo $form->textField($model,'institution_colaboration',array('placeholder'=>'Institución que colabora','title'=>'Institución que colabora')); ?>
		<?php echo $form->error($model,'institution_colaboration'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'national_institutions',array('placeholder'=>'Instituciones nacionales','title'=>'Instituciones nacionales')); ?>
		<?php echo $form->error($model,'national_institutions'); ?>
	</div>

	<div class="row">
		<?php echo $form->textArea($model,'participant_institutions',array('rows'=>6, 'cols'=>50,'placeholder'=>'Instituciones participantes','title'=>'Instituciones participantes')); ?>
		<?php echo $form->error($model,'participant_institutions'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'international_institutions_',array('placeholder'=>'Instituciones internacionales','title'=>'Instituciones internacionales')); ?>
		<?php echo $form->error($model,'international_institutions_'); ?>
	</div>

	<div class="row">
		<?php echo $form->textArea($model,'participant_institutions_international',array('rows'=>6, 'cols'=>50,'placeholder'=>'Instituciones internacionales participantes','title'=>'Instituciones internacionales participantes')); ?>
		<?php echo $form->error($model,'participant_institutions_international'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'colaboration_type',array('size'=>60,'maxlength'=>150,'placeholder'=>'Tipo de colaboracion','title'=>'Tipo de colaboracion')); ?>
		<?php echo $form->error($model,'colaboration_type'); ?>
	</div>
	<div class="row">
	<p>Protocolos en donde se propongan el uso de medicamentos,equipo o material médico no incluido en el cuadro básico institucional</p>
		<?php echo $form->textArea($model,'adtl_caracteristics_a',array('rows'=>6, 'cols'=>50,'placeholder'=>'Justificación','title'=>'Justificación')); ?>
		<?php echo $form->error($model,'adtl_caracteristics_a'); ?>
	</div>
	<div class="row">
	<p>Protocolos que contemplen cambios en la polótica institucional sobre la presentación de servicios de salud</p>
		<?php echo $form->textArea($model,'adtl_caracteristics_b',array('rows'=>6, 'cols'=>50,'placeholder'=>'Justificación','title'=>'Justificación')); ?>
		<?php echo $form->error($model,'adtl_caracteristics_b'); ?>
	</div>
	<div class="row">
	<p>Protocolos planeados para realizarse entre el instituto Mexicano del Seguro Social y otras insituciones nacionales o extrajeras.</p>
		<?php echo $form->textArea($model,'adtl_caracteristics_c',array('rows'=>6, 'cols'=>50,'placeholder'=>'Justificación','title'=>'Justificación')); ?>
		<?php echo $form->error($model,'adtl_caracteristics_c'); ?>
	</div>
	<div class="row">
	<p>Protocoolos que requieren la autorización específica de la Secretaría de Salud según la ley General de Salud</p>
		<?php echo $form->textArea($model,'adtl_caracteristics_d',array('rows'=>6, 'cols'=>50,'placeholder'=>'Justificación','title'=>'Justificación')); ?>
		<?php echo $form->error($model,'adtl_caracteristics_d'); ?>
	</div>
	<div class="row">
	<p>Protocolos que reciban apoyo económico o meterial de la industria farmacéutica o entidades con fines lucrativos</p>
		<?php echo $form->textArea($model,'adtl_caracteristics_e',array('rows'=>6, 'cols'=>50,'placeholder'=>'Justificación','title'=>'Justificación')); ?>
		<?php echo $form->error($model,'adtl_caracteristics_e'); ?>
	</div>
	<div class="row">
	<p>Protocolos que se realicen en más de una unidad del Instituo Mexicano del seguro Social con la participación de pacientes, muestras o datos</p>
		<?php echo $form->textArea($model,'adtl_caracteristics_f',array('rows'=>6, 'cols'=>50,'placeholder'=>'Justificación','title'=>'Justificación')); ?>
		<?php echo $form->error($model,'adtl_caracteristics_f'); ?>
	</div>
	<div class="row">
	<p>Protocolos cuyos autores se inconformen con el dictamen emitido por los Comités Locales de Investigación en Salud</p>
		<?php echo $form->textArea($model,'adtl_caracteristics_g',array('rows'=>6, 'cols'=>50,'placeholder'=>'Justificación','title'=>'Justificación')); ?>
		<?php echo $form->error($model,'adtl_caracteristics_g'); ?>
	</div>

	</div>

	<div class="row buttons">
		<?php 
		//echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); 
		
		echo " ".Chtml::button('Guardar en Borrador',array("id"=>"draft","onClick"=>"save('draft')",'class'=>'savebutton'));

		//echo " ".Chtml::button('Borrar',array("type"=>"reset", "onClick"=>"alert('Está usted seguro de limpiar estos datos');"));
		echo " ".Chtml::button('Cancelar',array("id"=>"x","onClick"=>"accionCancelar()",'class'=>'cancelb'));
		echo " ".Chtml::button('Guardar y enviar',array("id"=>"send","onClick"=>"save('send')",'style'=>'display:none;','class'=>'savepro'));
		echo " ".Chtml::button('>',array("id"=>"next","onClick"=>"changeSection(1);","style"=>"float:right;",'class'=>'Rarrow glyphicon-chevron-right'));
		echo " ".Chtml::button('<',array("id"=>"back","onClick"=>"changeSection(-1);","style"=>"display:none;float:right;",'class'=>'Larrow'));
		

		?>

	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->