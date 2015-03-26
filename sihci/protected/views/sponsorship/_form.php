<?php
/* @var $this SponsorshipController */
/* @var $model Sponsorship */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sponsorship-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_user_sponsorer'); ?>
		<?php echo $form->textField($model,'id_user_sponsorer'); ?>
		<?php echo $form->error($model,'id_user_sponsorer'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_user_researcher'); ?>
		<?php echo $form->textField($model,'id_user_researcher'); ?>
		<?php echo $form->error($model,'id_user_researcher'); ?>
	</div>
<?php
	$this->widget('ext.MyAutoComplete', array(
	    'model'=>$model,
	    'attribute'=>'id_user_researcher',
	    'name'=>'Sponsorship[id_user_researcher]',
	    'id'=>'Sponsorship_id_user_researcher',
	    'source'=>$this->createUrl('/sponsorship/getResearchers'),  
	    'options'=>array(
	        'minLength'=>'0',
	    ),

	));
?>
	<div class="row">
		<?php echo $form->labelEx($model,'project_name'); ?>
		<?php echo $form->textField($model,'project_name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'project_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'keywords'); ?>
		<?php echo $form->textField($model,'keywords',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'keywords'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'state'); ?>
		<?php echo $form->textField($model,'state'); ?>
		<?php echo $form->error($model,'state'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->