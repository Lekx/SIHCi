<?php
/* @var $this SponsorsDocsController */
/* @var $model SponsorsDocs */
/* @var $form CActiveForm */
/*
$this->widget('ext.widgets.reCopy.ReCopyWidget', array(
     'targetClass'=>'emails',
     'addButtonLabel'=>'Agregar nuevo',
  )); 
*/

?>


<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sponsors-docs-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
	

	
	<?php echo $form->errorSummary($model); ?>


	<div class="row">
	Decreto de creación, acta constitutiva o documento que acredite la creación de la empresa:
		<?php echo $form->fileField($model, 'path', array('name'=>'Doc1')); ?> 
	</div>
	<div class="row">
	Documento con el que se acreditan las facultades del representante o apoderado (poder, acta de asamblea, nombramiento, etc.) 
		<?php echo $form->fileField($model, 'path', array('name'=>'Doc2')); ?> 
	</div>
	<div class="row">
	Licencias, autorizaciones, permisos para las actividades, etc. 
		<?php echo $form->fileField($model, 'path', array('name'=>'Doc3')); ?> 
	</div>
	<div class="row">
	RFC o equivalente (empresa)
		<?php echo $form->fileField($model, 'path', array('name'=>'Doc4')); ?> 
	</div>
	<div class="row">
	Comprobante de domicilio (opcional para extranjeras) 
		<?php echo $form->fileField($model, 'path', array('name'=>'Doc5')); ?> 
	</div>
	<div class="row">
	Identificación Oficial del Representante
		<?php echo $form->fileField($model, 'path', array('name'=>'Doc6')); ?> 
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->