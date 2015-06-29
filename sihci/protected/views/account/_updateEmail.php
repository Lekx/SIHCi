<?php
/* @var $this CurriculumController */
/* @var $model Curriculum */
/* @var $form CActiveForm */
?>

<?php

$this->menu = array(
	array('label' => 'Datos de Cuenta', 'url' => array('account/infoAccount')),
	
	
);
?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'account-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
	
	<div class="cvtitle">
    <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/DireccionGeneral.png" alt="">
    <h1>Cuenta</h1>
    <hr>
</div>
	<h4>Modificar Correo:</h4>

	<div class="row">
		<?php echo $form->textField($details,'email',array('title'=>'Email','disabled'=>'true')); ?>
		<?php echo $form->error($details,'email'); ?>
		<hr>
	</div>
	<div class="row">
	<input placeholder="Nuevo Correo" title="Nuevo Correo" type="text" name="Account[email2]" id="Account_email2" oncopy="return false;" onpaste="return false;" oncut="return false;">
	</div>

	<div class="row">
		<input placeholder="Repetir Nuevo Correo"  title="Nuevo Correo" type="text" name="Account[email22]" id="Account_email22" oncopy="return false;" onpaste="return false;" oncut="return false;">
	</div>
	<hr>

	<div class="row buttons">
		<?php echo CHtml::submitButton("Guardar", array('confirm'=>'¿Seguro que desea Guardar?','class'=>'savebutton') ); ?>
		<?php echo CHtml::Button('Cancelar',array('submit' => array('account/infoAccount'),'confirm'=>'¿Seguro que desea Cancelar?','id'=>'cancelar')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->