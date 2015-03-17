<?php
/* @var $this PostdegreeGraduatesController */
/* @var $model PostdegreeGraduates */
/* @var $form CActiveForm */
echo '<pre>';
print_r(Curriculum::model()->findByAttributes(array('id_user'=>Yii::app()->user->id))->id);
echo '</pre>';
?>

<div class="form">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'postdegree-graduates-form',
		'enableAjaxValidation'=>true,
	)); ?>

	<p class="note">Los campos marcados con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->textField($model,'id_curriculum', array( 'placeholder' => 'id_curriculum')); ?>
		<?php echo $form->error($model,'id_curriculum'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'fullname',array('size'=>60,'maxlength'=>70,'placeholder'=>"Nombre completo del graduado"));?>
		<?php echo $form->error($model,'fullname'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar': 'Guardar'); ?>
		<?php echo CHtml::resetButton($model->isNewRecord ?  'Borrar' : 'Borrar'); ?>	
    </div>
	
<?php $this->endWidget(); ?>
  

</div><!-- form -->
	