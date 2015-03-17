<?php
/* @var $this PostdegreeGraduatesController */
/* @var $model PostdegreeGraduates */
/* @var $form CActiveForm */
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
		<?php
			$this->widget('zii.widgets.jui.CJuiButton',array(
				'buttonType'=>'button',
			    'name'=>'Borrar',
			    'caption'=>'Borrar',
			    'onclick'=>new CJavaScriptExpression('function(){alert("¿Esta usted seguro de borrar estos datos?"); this.blur(); return false;}'),
			));
		?>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar': 'Guardar'); ?>
		<?php echo CHtml::resetButton($model->isNewRecord ?  'Borrar' : 'Borrar'); ?>	
    </div>
	
<?php $this->endWidget(); ?>
  

</div><!-- form -->

