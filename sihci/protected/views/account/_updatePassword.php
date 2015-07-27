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
	<?php echo $form->errorSummary($details); ?>
	<div class="cvtitle">
    <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/DireccionGeneral.png" alt="">
    <h1>Cuenta</h1>
    <hr>
</div>
<h4>Modificar Contraseña:</h4>


	<div class="row">
		<?php echo $form->passwordField($details,'password',array('value' => '','autocomplete' => 'off', "placeholder"=>"Contraseña Actual","title"=>'Contraseña Actual',"maxlength"=>"18")); ?>
		<?php echo $form->error($details,'password'); ?>
		<hr>
	</div>

	<div class="row">
		<input type="password" name="Account[password2]" id="Account_password2" placeholder="Nueva Contraseña" title="Nueva Contraseña" oncopy="return false;" onpaste="return false;" oncut="return false;" maxlength="18">
	</div>

	<div class="row">
		<input type="password" name="Account[password22]" id="Account_password22" placeholder="Repetir Nueva Contraseña" title="Repetir Nueva Contraseña" oncopy="return false;" onpaste="return false;" oncut="return false;" maxlength="18">
	</div>

	<hr>

	<div class="row buttons">
		<?php echo CHtml::htmlButton('Enviar',array(
						'onclick'=>'send("account-form", "account/updatePassword", "'.(isset($_GET['id']) ? $_GET['id'] : 0).'","site/index","")',
						'class'=>'savebutton',
				));
	?>
	<?php echo CHtml::link('Cancelar',array('account/infoAccount'),array('confirm'=>'Si cancela todo los datos escritos se borraran. ¿Está seguro de que desea cancelar?')); ?>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->
