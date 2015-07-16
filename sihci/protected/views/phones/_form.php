<?php
/* @var $this PhonesController */
/* @var $model Phones */
/* @var $form CActiveForm */

$this->widget('ext.widgets.reCopy.ReCopyWidget', array(
     'targetClass'=>'emails',
     'addButtonLabel'=>'Agregar nuevo',
  ));
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'phones-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="emails">
			<div class="row">
			<!-- email viene de PhonesController.php-->
			<?php echo $form->textField($emails,'email',array('size'=>45,'maxlength'=>45, 'placeholder'=>"email")); ?>
			<?php echo $form->error($emails,'email'); ?>
		</div>
			<div class="row">
		<!-- tipo de email viene de PhonesController.php-->
		<?php echo $form->labelEx($emails,'type'); ?>
			<?php echo $form->dropDownList($emails,'type',array(''=>'','Trabajo'=>'Trabajo','Residencial'=>'Recidencial',
																'Particular'=>'Particular',
				                                                'Campus'=>'Campus', 'otro'=>'otro'),
			                                                       array('options' => array(''=>array('selected'=>true)))); ?>
			<?php echo $form->error($emails,'type'); ?>
		</div>

	</div>

<div class="phone">
<?php
$this->widget('ext.widgets.reCopy.ReCopyWidget', array(
     'targetClass'=>'phone',
     'addButtonLabel'=>'Agregar nuevo',
  ));
?>
	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->dropDownList($model,'type',array(''=>'','Trabajo'=>'Trabajo','Residencial'=>'Recidencial',
															'Particular'=>'Particular',
			                                                'Campus'=>'Campus', 'otro'=>'otro'),
		                                                       array('options' => array(''=>array('selected'=>true)))); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'country_code'); ?>
		<?php echo $form->textField($model,'country_code',array('placeholder'=>'Lada País')); ?>
		<?php echo $form->error($model,'country_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'local_area_code'); ?>
		<?php echo $form->textField($model,'local_area_code',array('placeholder'=>'Lada Estado')); ?>
		<?php echo $form->error($model,'local_area_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone_number'); ?>
		<?php echo $form->textField($model,'phone_number',array('placeholder'=>'Número Telefónico')); ?>
		<?php echo $form->error($model,'phone_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'extension'); ?>
		<?php echo $form->textField($model,'extension',array('placeholder'=>'Extensión')); ?>
		<?php echo $form->error($model,'extension'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_primary'); ?>
		<?php echo $form->checkBox($model,'is_primary'); ?>
		<?php echo $form->error($model,'is_primary'); ?>
	</div>
</div><!--FORM Phone -->

	<div class="row buttons">
		<input type="submit" onclick="validationFrom()" value="Guardar">
		<input type="button" onclick="cleanUp()" value="Limpiar">
		<?php echo CHtml::link('Cancelar',array('/phones/admin')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
