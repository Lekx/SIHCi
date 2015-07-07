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
	<hr>
		<?php
		echo "<div class='row'>";
		echo $form->textField($model, 'fullname', array('title'=>'Nombre Completo','placeholder'=>'Nombre Completo','onKeypress'=>'return lettersOnly(event)','name' => 'fullnames[]','size' => 60, 'maxlength' => 70));
		echo $form->error($model, 'fullname');
		echo "</div>";
?>


</div>

<hr>
	<?php

$this->widget('ext.widgets.reCopy.ReCopyWidget', array(
	'targetClass' => 'recopy',
	'addButtonLabel' => 'Agregar nuevo',
));
?>

<hr>
<h4>Contactos Creados:</h4>
<hr>
		<?php
foreach ($fullname as $value) {
	echo "<input type='hidden' value='".$value['id']."' name ='fullnamesUpdateId[]'>";
	echo "<div class='row'>";
	echo $form->textField($model, 'fullname', array('title'=>'Nombre Completo','placeholder'=>'Nombre Completo','name' => 'fullnamesUpdate[]', 'value' => $value['fullname'], 'size' => 60, 'maxlength' => 70));
	echo $form->error($model, 'fullname');
	echo "</div>";
	echo CHtml::link('Eliminar',array('sponsors/deleteContacts','id'=>$value['id']),array('class'=>'deleteSomething'));
	echo '<hr>';
}
?>






<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',  array('class'=>'savebutton'));?>
		<?php echo CHtml::Button('Cancelar',array('submit' => array('sponsors/sponsorsInfo'),'confirm'=>'¿Seguro que desea Cancelar?')); ?>
	</div>


<?php $this->endWidget();?>

</div><!-- form -->
