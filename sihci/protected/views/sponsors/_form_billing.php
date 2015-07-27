<?php
/* @var $this SponsorsBillingController */
/* @var $model SponsorsBilling */
/* @var $form CActiveForm */
?>


<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'sponsors-billing-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation' => true,
));?>


	Utlizar la misma Dirección.
	<div class="row">
		<input type="checkbox" id="sponsorsBillingCheck" name="sameAddress"  <?php echo $sameAd == true ? "CHECKED" : "";?>/>
	</div>
	</div>
	<div id="sponsorsBillingForm" id="sponsorsBillingForm">

<div class="row">
  <span class="plain-select">
      <?php $this->widget('ext.CountrySelectorWidget', array(

		'value' => $modelAddresses->country,
		'name' => Chtml::activeName($modelAddresses, 'country'),
		'id' => Chtml::activeId($modelAddresses, 'country'),
		'useCountryCode' => false,
		'defaultValue' => 'Mexico',
		'firstEmpty' => true,
		'firstText' => 'Pais',

		)); ?>
</span>
</div>

<div class="row">
		<?php echo $form->textField($modelAddresses, 'zip_code', array('placeholder' => 'Código Postal','title' => 'Código Postal', 'class' => 'numericOnly'));?>
		<?php echo $form->error($modelAddresses, 'zip_code');?>
</div>
<div class="row">
		<?php echo $form->textField($modelAddresses, 'state', array('size' => 20, 'maxlength' => 20, 'placeholder' => 'Estado','title' => 'Estado','onKeypress'=>'return lettersOnly(event)'));?>
		<?php echo $form->error($modelAddresses, 'state');?>
		</div>
<div class="row">
		<?php echo $form->textField($modelAddresses, 'delegation', array('size' => 30, 'maxlength' => 30, 'placeholder' => 'Delegación','title' => 'Delegación','onKeypress'=>'return lettersOnly(event)'));?>
		<?php echo $form->error($modelAddresses, 'delegation');?>
		</div>
<div class="row">
		<?php echo $form->textField($modelAddresses, 'city', array('size' => 50, 'maxlength' => 50, 'placeholder' => 'Ciudad','title' => 'Ciudad','onKeypress'=>'return lettersOnly(event)'));?>
		<?php echo $form->error($modelAddresses, 'city');?>
		</div>
<div class="row">
		<?php echo $form->textField($modelAddresses, 'town', array('size' => 30, 'maxlength' => 30, 'placeholder' => 'Municipio','title' => 'Municipio','onKeypress'=>'return lettersOnly(event)'));?>
		<?php echo $form->error($modelAddresses, 'town');?>
		</div>
<div class="row">
		<?php echo $form->textField($modelAddresses, 'colony', array('size' => 45, 'maxlength' => 45, 'placeholder' => 'Colonia','title' => 'Colonia'));?>
		<?php echo $form->error($modelAddresses, 'colony');?>
		</div>
<div class="row">
		<?php echo $form->textField($modelAddresses, 'street', array('size' => 50, 'maxlength' => 50, 'placeholder' => 'Calle', 'title' => 'Calle'));?>
		<?php echo $form->error($modelAddresses, 'street');?>
		</div>
<div class="row">
		<?php echo $form->textField($modelAddresses, 'external_number', array('size' => 8, 'maxlength' => 8, 'placeholder' => 'Número Externo', 'title' => 'Número Externo','class' => 'numericOnly'));?>
		<?php echo $form->error($modelAddresses, 'external_number');?>
		</div>
<div class="row">
		<?php echo $form->textField($modelAddresses, 'internal_number', array('size' => 8, 'maxlength' => 8, 'placeholder' => 'Número Interno','title' => 'Número Externo' ,'class' => 'numericOnly'));?>
		<?php echo $form->error($modelAddresses, 'internal_number');?>
		</div>
	</div>


	<div id="billing" name="billing">
	<div class="row">
		<?php echo $form->textField($model, 'name', array('size' => 45, 'placeholder' => 'Nombre', 'maxlength' => 45,'title' => 'Nombre','onKeypress'=>'return lettersOnly(event)'));?>
		<?php echo $form->error($model, 'name');?>
</div>
<div class="row">
		<?php echo $form->textField($model, 'rfc', array('size' => 20, 'placeholder' => 'RFC', 'title' => 'RFC','maxlength' => 20, 'class' => ''));?>
		<?php echo $form->error($model, 'rfc');?>
		</div>
<div class="row">
		<?php echo $form->textField($model, 'email', array('size' => 60, 'placeholder' => 'Correo electronico', 'title' => 'Correo electronico','maxlength' => 40, 'email' => 'email'));?>
		<?php echo $form->error($model, 'email');?>
		</div>
	</div>




	<div class="row buttons">
		<?php echo CHtml::htmlButton('Enviar',array(
								'onclick'=>'send("sponsors-billing-form", "sponsors/create_billing", "'.(isset($_GET['id']) ? $_GET['id'] : 0).'","'.Yii::app()->controller->id.'/'.Yii::app()->controller->action->id.'/'.(isset($_GET['id']) ? $_GET['id'] : 0).'","")',
								'class'=>'savebutton',
						));
		?>
		<?php echo CHtml::Button('Cancelar',array('submit' => array('sponsors/sponsorsInfo'),'confirm'=>'¿Seguro que desea Cancelar?','id'=>'cancelar')); ?>
	</div>

<?php $this->endWidget();?>

</div><!-- form -->
