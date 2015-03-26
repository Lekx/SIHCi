<?php
/* @var $this SponsorsDocsController */
/* @var $model SponsorsDocs */
/* @var $form CActiveForm */
$this->widget('ext.widgets.reCopy.ReCopyWidget', array(
     'targetClass'=>'emails',
     'addButtonLabel'=>'Agregar nuevo',
  )); 


?>


<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sponsors-docs-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
	

	
	<?php echo $form->errorSummary($model); ?>


	<div class="row">
		<?php echo $form->dropDownList($model,'file_name',array(''=>'','Decreto de creación, acta constitutiva o documento que acredite la creación de la
empresa','Documento con el que se acreditan las facultades del representante o apoderado (poder, acta de asamblea, nombramiento, etc.)','Licencias, autorizaciones, permisos para las activi
dades, etc.','RFC o equivalente (empresa)','Comprobante de domicilio (opcional para extranjeras)','Identificación Oficial del Representante'),array('options' => array(''=>array('selected'=>true)))); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'path'); ?>
		<?php echo $form->fileField($model,'path',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'path'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->