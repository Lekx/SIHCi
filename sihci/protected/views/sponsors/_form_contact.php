<?php
/* @var $this SponsorsContactController */
/* @var $model SponsorsContact */
/* @var $form CActiveForm */
?>
<script type="text/javascript">
	
$(document).ready(function(){

$('.fType').on('change', function(e) {
	var option = $(this).val();
  

 $(this).parent().children('.removable').remove();

	if(option == 'EMAIL'){
		
		$(this).parent().append('<div class="row"><input type="hidden" class="removable dFieldT" name="values1[]" ></div> <div class="row"><input type="hidden" class="removable dFieldT" name="values2[]" ></div><div class="row"><input type="text" name="values3[]" class="removable dFieldE" placeholder="email"></div>');

	}else if(option == 'CELULAR'){
		
		$(this).parent().append('<div class="row"><input type="hidden" class="removable dFieldT" name="values1[]" ></div> <div class="row"><input type="text" class="removable dFieldT" name="values2[]" ></div><div class="row"><input type="text" name="values3[]" class="removable dFieldC" placeholder="celular"></div>');

	}else{
		
		$(this).parent().append('<div class="row"><input type="text" class="removable dFieldT" name="values1[]" placeholder="Lada 1"></div> <div class="row"><input type="text" class="removable dFieldT" name="values2[]" placeholder="Lada 2"></div><div class="row"><input type="text" class="removable dFieldT" name="values3[]" placeholder="Telefono"></div>');

	}



});

});


</script>
<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'sponsors-contact-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation' => false,
));?>

<div class="recopy">
	<hr>
		<?php 
			
			echo $form->dropDownList($model, 'type',array('TELEFONO'=>'Teléfono','CELULAR'=>'Celular','FAX'=>'Fax','EMAIL'=>'Email'), 
			                     						array('prompt'=>'Tipo de Contacto','name'=>'types[]','class'=>'fType','options' => array(''=>array('selected'=>true))),array('size' => 20, 'maxlength' => 20 ,'title'=>'Tipo de Contacto'));
			echo $form->error($model, 'type');;
		?>
	
	</div>
</div>
<hr>

<div class="row">

	<?php

$this->widget('ext.widgets.reCopy.ReCopyWidget', array(
	'targetClass' => 'recopy',
	'addButtonLabel' => 'Agregar nuevo',
));
?>
</div>
	<div class="row">
	
	<?php
	foreach ($modelPull as $valuePull) {
		echo "<hr>";
		echo "<input type='hidden' value='".$valuePull['id']."' name ='modelPullIds[]'>";  //array('prompt'=> $valuePull['type'])
	
		echo "<div class='row'>";
		echo "  <span class='plain-select'>";
		echo $form->dropDownList($model, 'type', array('telefono'=>'Teléfono','celular'=>'Celular','fax'=>'Fax','email'=>'Email'), array('prompt'=> $valuePull['type']),
		                     						array('name' => 'modelPullTypes[]','class'=>'fType','options' => array($valuePull['type']=>array('selected'=>true))),array('size' => 20, 'maxlength' => 20,'title'=>'Tipo de Contacto'));
		echo "</span>";
		echo $form->error($model, 'type');
		echo "</div>";

	
		$valueArray= explode("-", $valuePull['value']);
				echo "<div class='row'>";
		echo '<input type="'.($valuePull['type'] == 'email' ||  $valuePull['type'] == 'celular' ? 'hidden' : 'text').'"  name="valuesUpdate1[]" value="'.$valueArray[0].'" >';
		echo "</div>";
		echo "<div class='row'>";
		echo '<input type="'.($valuePull['type'] == 'email'  ? 'hidden' : 'text').'"  name="valuesUpdate2[]" value="'.$valueArray[1].'" >';
		echo "</div>";
		echo "<div class='row'>";
		echo '<input type="text" name="valuesUpdate3[]" placeholder="'.$valuePull['type'].'" value="'.$valueArray[2].'" >';
		echo "</div>";
		echo "<hr>";
		echo CHtml::link('Eliminar',array('Sponsors/deleteContact','id'=>$valuePull['id']), array('class'=>'deleteSomething'));
}
?>
	</div>





	<div class="row buttons">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',  array('class'=>'savebutton'));?>
			
		<?php echo CHtml::Button('Cancelar',array('submit' => array('sponsors/sponsorsInfo'),'confirm'=>'¿Seguro que desea Cancelar?')); ?>
	</div>

<?php $this->endWidget();?>

</div><!-- form -->