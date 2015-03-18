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
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->dropDownList($model,'type',array('Tipo de participación ','Demostraciones','Ferias Cientificas y Tecnologi',
		'Ferias Empresariales','Medios Impresos','Radio','Revistas de Divulgacion','Seminarios','Simposius','Talleres','Teatro','Televisión','Videos')); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->dropDownList($model,'directed_to',array('Dirigido a','Empresarios','Estudiantes','Funcionarios',
		'Público en general','Sector Académico','Sector Privado','Sector Público','Sector Social')); ?>
		<?php echo $form->error($model,'directed_to'); ?>
	</div>

	<div class="row">
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
		    'model' => $model,
		    'language'=> 'es',
		    'attribute' => 'date',
		    'htmlOptions' => array(
		    		'size' => '10',         
		        	'maxlength' => '10', 
		        	'placeholder'=>"Fecha de la publicación"   
		    ),
		));
		?>
		<?php echo $form->error($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'title',array('size'=>45,'maxlength'=>45,'placeholder'=>'Título de la publicacion')); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'responsible_agency',array('size'=>45,'maxlength'=>45,'placeholder'=>'Dependencia responsable')); ?>
		<?php echo $form->error($model,'responsible_agency'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'notas_periodisticas',array('size'=>45,'maxlength'=>45,'placeholder'=>'Nota periodistica')); ?>
		<?php echo $form->error($model,'notas_periodisticas'); ?>
	</div>

	<div class="row">
		<?php $status = array('Nacional' => 'Nacional','Extranjero'=>'Extranjero'); 
		    echo $form-> RadioButtonList($model,'is_national' ,$status, array ('separador' => '')); 
		 ?>
		<?php echo $form->error($model,'is_national'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'key_words',array('size'=>60,'maxlength'=>250,'placeholder'=>'Palabras claves')); ?>
		<?php echo $form->error($model,'key_words'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar' : 'Guardar'); ?>
		<?php echo CHtml::resetButton($model->isNewRecord ? 'Borrar' : 'Borrar'); ?>

	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->