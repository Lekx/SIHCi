<?php
/* @var $this SponsorsContactsController */
/* @var $model SponsorsContacts */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'sponsors-contacts-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation' => true,
));?>

<div class="recopy">
	<div class="row">
	<hr>
		<?php
		
	echo $form->textField($model, 'fullname', array('title'=>'Nombre Completo','placeholder'=>'Nombre Completo','name' => 'fullnames[]','size' => 60, 'maxlength' => 70));
	echo $form->error($model, 'fullname');
?>


	</div>
</div>

<hr>
	<?php

$this->widget('ext.widgets.reCopy.ReCopyWidget', array(
	'targetClass' => 'recopy',
	'addButtonLabel' => 'Agregar nuevo',
));
?>



	<div class="row">
		<?php
foreach ($fullname as $value) {
	echo "<input type='hidden' value='".$value['id']."' name ='fullnamesUpdateId[]'>";

	echo $form->textField($model, 'fullname', array('title'=>'Nombre Completo','placeholder'=>'Nombre Completo','name' => 'fullnamesUpdate[]', 'value' => $value['fullname'], 'size' => 60, 'maxlength' => 70));
	echo $form->error($model, 'fullname');
	echo CHtml::link('Eliminar',array('Sponsors/deleteContacts','id'=>$value['id']));
	echo '<hr>';
}
?>

	</div>





<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',  array('class'=>'savebutton'));?>
		<?php echo CHtml::Button('Cancelar',array('submit' => array('sponsors/sponsorsInfo'),'confirm'=>'¿Seguro que desea Cancelar?')); ?>
	</div>


<?php $this->endWidget();?>

</div><!-- form -->
