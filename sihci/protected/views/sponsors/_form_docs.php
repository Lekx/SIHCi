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
		<?php echo $form->dropDownList($model,'file_name',array(''=>'',
			'Decreto de creación, acta constitutiva o documento que acredite la creación de la empresa' => 'Decreto de creación, acta constitutiva o documento que acredite la creación de la empresa',
			'Documento con el que se acreditan las facultades del representante o apoderado (poder, acta de asamblea, nombramiento, etc)'=>'Documento con el que se acreditan las facultades del representante o apoderado (poder, acta de asamblea, nombramiento, etc)',
			'Licencias, autorizaciones, permisos para las actividades, etc'=>'Licencias, autorizaciones, permisos para las actividades, etc.',
			'RFC o equivalente (empresa)'=>'RFC o equivalente (empresa)',
			'Comprobante de domicilio (opcional para extranjeras)'=>'Comprobante de domicilio (opcional para extranjeras)',
			'Identificación Oficial del Representante'=>'Identificación Oficial del Representante')); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'path'); ?>
		<?php echo $form->fileField($model,'path',array('size'=>100,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'path'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->