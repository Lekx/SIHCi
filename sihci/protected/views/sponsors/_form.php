<?php
/* @var $this SponsorsController */
/* @var $model Sponsors */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sponsors-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	
	<div class="row">
		<?php echo $form->labelEx($modelAddresses,'country'); ?>
		<?php echo $form->textField($modelAddresses,'country',array('size'=>50,'maxlength'=>50, 'placeholder'=>'País')); ?>
		<?php echo $form->error($modelAddresses,'country'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelAddresses,'zip_code'); ?>
		<?php echo $form->textField($modelAddresses,'zip_code',array('placeholder'=>'Código Postal')); ?>
		<?php echo $form->error($modelAddresses,'zip_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelAddresses,'state'); ?>
		<?php echo $form->textField($modelAddresses,'state',array('size'=>20,'maxlength'=>20, 'placeholder'=>'Estado')); ?>
		<?php echo $form->error($modelAddresses,'state'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelAddresses,'delegation'); ?>
		<?php echo $form->textField($modelAddresses,'delegation',array('size'=>30,'maxlength'=>30, 'placeholder'=>'Delegación')); ?>
		<?php echo $form->error($modelAddresses,'delegation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelAddresses,'city'); ?>
		<?php echo $form->textField($modelAddresses,'city',array('size'=>50,'maxlength'=>50, 'placeholder'=>'Ciudad')); ?>
		<?php echo $form->error($modelAddresses,'city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelAddresses,'town'); ?>
		<?php echo $form->textField($modelAddresses,'town',array('size'=>30,'maxlength'=>30, 'placeholder'=>'Municipio')); ?>
		<?php echo $form->error($modelAddresses,'town'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelAddresses,'colony'); ?>
		<?php echo $form->textField($modelAddresses,'colony',array('size'=>45,'maxlength'=>45, 'placeholder'=>'Colonia')); ?>
		<?php echo $form->error($modelAddresses,'colony'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelAddresses,'street'); ?>
		<?php echo $form->textField($modelAddresses,'street',array('size'=>50,'maxlength'=>50, 'placeholder'=>'Calle')); ?>
		<?php echo $form->error($modelAddresses,'street'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelAddresses,'external_number'); ?>
		<?php echo $form->textField($modelAddresses,'external_number',array('size'=>8,'maxlength'=>8, 'placeholder'=>'Número Externo')); ?>
		<?php echo $form->error($modelAddresses,'external_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelAddresses,'internal_number'); ?>
		<?php echo $form->textField($modelAddresses,'internal_number',array('size'=>8,'maxlength'=>8, 'placeholder'=>'Número Interno')); ?>
		<?php echo $form->error($modelAddresses,'internal_number'); ?>
	</div>
	
	<!--///////////////////////FORM SPONSORS/////////////////////////////////////////////////////////////-->

	<!--<div class="row">
		<?php /*echo $form->labelEx($model,'id_user'); ?>
		<?php echo $form->textField($model,'id_user'); ?>
		<?php echo $form->error($model,'id_user');*/  ?>
	</div>-->

	<!--<div class="row">
		<?php /*echo $form->labelEx($model,'id_address'); ?>
		<?php echo $form->textField($model,'id_address'); ?>
		<?php echo $form->error($model,'id_address');*/ ?>
	</div>-->

	<div class="row">
		<?php echo $form->labelEx($model,'sponsor_name'); ?>
		<?php echo $form->textField($model,'sponsor_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'sponsor_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'website'); ?>
		<?php echo $form->textField($model,'website',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'website'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sector'); ?>
		<?php echo $form->textField($model,'sector',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'sector'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'class'); ?>
		<?php echo $form->textField($model,'class',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'class'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'branch'); ?>
		<?php echo $form->textField($model,'branch',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'branch'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'main_activity'); ?>
		<?php echo $form->textField($model,'main_activity',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'main_activity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'legal_structure'); ?>
		<?php echo $form->textField($model,'legal_structure',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'legal_structure'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'employeess_number'); ?>
		<?php echo $form->textField($model,'employeess_number'); ?>
		<?php echo $form->error($model,'employeess_number'); ?>
	</div>

	<div class="row">

		<?php echo $form->fileField($modelPersons,'photo_url',array('size'=>60,'maxlength'=>100, 'placeholder'=>"Foto")); ?>
		<?php echo $form->error($modelPersons,'photo_url'); ?>     
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->