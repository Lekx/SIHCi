<?php
/* @var $this PressNotesController */
/* @var $model PressNotes */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'press-notes-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
	'enableClientValidation'=>true,
	'htmlOptions' => array('enctype'=>'multipart/form-data'),
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	<!-- <p class="note">Fields with <span class="required">*</span> are required.</p> -->

	<div class="row">
	    <span class="plain-select">
		<?php echo $form->dropDownList($model,'type',
			array(
				'Demostraciones'=>'Demostraciones',
				'Ferias Cientificas y Tecnologi'=>'Ferias Cientificas y Tecnologia',
				'Ferias Empresariales'=>'Ferias Empresariales',
				'Medios Impresos'=>'Medios Impresos',
				'Radio'=>'Radio',
				'Revistas de Divulgacion'=>'Revistas de Divulgacion',
				'Seminarios'=>'Simposio',
				'Talleres'=>'Talleres',
				'Teatro'=>'Teatro',
				'Televisión'=>'Televisión',
				'Videos'=>'Videos'
			),
			array('prompt'=>'Seleccionar participación', 'title'=>'Participación'));
		?>
		</span>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
	    <span class="plain-select">
		<?php echo $form->dropDownList($model,'directed_to',
		    array(
				'Empresarios'=>'Empresarios',
				'Estudiantes'=>'Estudiantes',
				'Funcionarios'=>'Funcionarios',
				'Público en general'=>'Público en general',
				'Sector Académico'=>'Sector Académico',
				'Sector Privado'=>'Sector Privado',
				'Sector Público'=>'Sector Público',
				'Sector Social'=>'Sector Social'
			),
		    array('prompt'=>'Dirigido A..','title'=>'Dirigido'));
		?>
		</span>
		<?php echo $form->error($model,'directed_to'); ?>
	</div>

	<div class="row">
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
		    'model' => $model,
		    'language'=> 'es',
		    'attribute' => 'date',
		     'options' => array(
			     		'changeMonth'=>true, //cambiar por Mes
			     		'changeYear'=>true, //cambiar por Año
			    			'maxDate' => 'now',
		     	),
		    'htmlOptions' => array(
		    	    'dateFormat'=>'d/m/Y',
		    		'size' => '10',         
		    		'readOnly'=>true,
		        	'maxlength' => '10', 
		        	'placeholder'=>"Fecha de la publicación",
		        	'title'=>'Fecha de Publicación',
		    ),
		));
		?>
		<?php echo $form->error($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'title',array('size'=>45,'maxlength'=>150,'placeholder'=>'Título de la publicación','title'=>'Título de la publicación (maximo 45 caracteres)')); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'responsible_agency',array('size'=>45,'maxlength'=>150,'placeholder'=>'Dependencia responsable','title'=>'Dependencia responsable (maximo 45 caracteres)')); ?>
		<?php echo $form->error($model,'responsible_agency'); ?>
	</div>

	<div class="row">
		<?php echo $form->textArea($model,'note',array('size'=>45,'maxlength'=>150,'placeholder'=>'Nota periodistica', 'title'=>'Nota periodistica (maximo 45 caracteres)')); ?>
		<?php echo $form->error($model,'note'); ?>
	</div>

	<div class="row">
	<span class="radiotext">Tipo de Participación</span>
		<?php $status = array('Nacional' => 'Nacional','Extranjero'=>'Extranjero'); 
		    echo $form-> RadioButtonList($model,'is_national' ,$status, array('separator' => ' ','labelOptions'=>array('style'=>'display:inline'))); 
		 ?>
		<?php echo $form->error($model,'is_national'); ?>
	</div>
	
	<div class="row buttons">
	 <?php echo CHtml::ajaxButton ($model->isNewRecord ? 'Guardar' : 'Modificar',CController::createUrl('pressNotes/'.($model->isNewRecord ? 'create' : 'update/'.$model->id)), 
        				array(
        					'dataType'=>'json',
                     		'type'=>'post',
                     		'success'=>'function(data) 
                     		 {
		                       
		                        if(data.status=="success")
		                        {
		                             $(".successdiv").show();		                         
								}		                         
		                        else
		                        {
			                    	$(".errordiv").show(); 
			                    }       
		                  	}',                            
                        ),array('class'=>'savebutton')); 
        ?>	
       	   <?php echo CHtml::link('Cancelar',array('pressNotes/admin'),array('confirm'=>'Si cancela todo los datos escritos se borraran. ¿Está seguro de que desea cancelar?')); ?>
	
	</div>	

	
<?php $this->endWidget(); ?>

</div><!-- form -->