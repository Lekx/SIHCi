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

		$(this).parent().append('<input type="hidden" class="removable dFieldT" name="values1[] onKeypress = "return validateEmail (event)" ><input type="hidden" class="removable dFieldT" name="values2[]" ><input type="email" name="values3[]" class="removable dFieldE" placeholder="Correo Electronico"  onKeypress = "return numericAndLettersOnly(event)" onsubmit = "validateEmail()" onKeypress = "return validateEmail(event)">');


	}else if(option == 'CELULAR'){

		$(this).parent().append('<input type="hidden" class="removable dFieldT" name="values1[]" onKeypress = "return numericOnly(event) maxlength = "4"><input type="text" class="hidden dFieldT" name="values2[]" onKeypress = "return numericOnly(event)" maxlength = 3 ><input type="text" name="values3[]" class="removable dFieldC" placeholder="Celular" onKeypress = "return numericOnly(event)" maxlength = "12">');

	}else{

		$(this).parent().append('<input type="text" class="removable dFieldT" name="values1[]" placeholder="Lada 1" onKeypress = "return numericOnly(event)" maxlength = "2"><input type="text" class="removable dFieldT" name="values2[]" placeholder="Lada 2" onKeypress = "return numericOnly(event)" maxlength = "3"><input type="text" class="removable dFieldT" name="values3[]" placeholder="Telefono" onKeypress = "return numericOnly(event)" maxlength = "12">');

	}



});

});

function lettersOnly(e) {
	key = e.keyCode || e.which;
	tecla = String.fromCharCode(key).toLowerCase();
	letras = " áéíóúabcdefghijklmnñopqrstuvwxyz.@";
	especiales = "8-9-37-38-46-164-64";

	tecla_especial = false
	for (var i in especiales) {
		if (key == especiales[i]) {
			tecla_especial = true;
			break;
		}
	}

	if (letras.indexOf(tecla) == -1 && !tecla_especial)
		return false;
}
function numericOnly(e) {
	key = e.keyCode || e.which;
	tecla = String.fromCharCode(key).toLowerCase();
	numbers = " 1234567890";
	especiales = "8-9-37-38-46-164";

	tecla_especial = false
	for (var i in especiales) {
		if (key == especiales[i]) {
			tecla_especial = true;
			break;
		}
	}

	if (numbers.indexOf(tecla) == -1 && !tecla_especial)
		return false;
}

function numericAndLettersOnly(e) {
	key = e.keyCode || e.which;
	tecla = String.fromCharCode(key).toLowerCase();
	numbers = " 1234567890áéíóúabcdefghijklmnñopqrstuvwxyz.@_-";
	especiales = "8-9-37-38-46-164";

	tecla_especial = false
	for (var i in especiales) {
		if (key == especiales[i]) {
			tecla_especial = true;
			break;
		}
	}

	if (numbers.indexOf(tecla) == -1 && !tecla_especial)
		return false;
}

function validateEmail(e) {
    expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if ( !expr.test(email) )
        alert("Error: La dirección de correo " + email + " es incorrecta.");
}
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
	<div class="row">
	  <span class="plain-select1">
		<?php

			echo $form->dropDownList($model, 'type',array('TELEFONO'=>'Teléfono','CELULAR'=>'Celular','EMAIL'=>'Correo electronico'),
			                     						array('prompt'=>'Tipo de Contacto','name'=>'types[]','class'=>'fType','options' => array(''=>array('selected'=>true))),array('size' => 20, 'maxlength' => 20 ,'title'=>'Tipo de Contacto'));
			echo $form->error($model, 'type');;
		?>
		</span>
	</div>
	</div>
</div>
<hr>


	<?php
$this->widget('ext.widgets.reCopy.ReCopyWidget', array(
	'targetClass' => 'recopy',
	'addButtonLabel' => 'Agregar nuevo',
));
?>



	<?php
	foreach ($modelPull as $valuePull) {
		echo "<hr>";

		echo "<div class='row'>";
		echo '<input type="text" value="'.$valuePull['type'].'" disabled>';
		echo "</div>";


		$valueArray= explode("-", $valuePull['value']);
		echo "<div class='row'>";
		echo '<input type="'.($valuePull['type'] == 'EMAIL' ||  $valuePull['type'] == 'CELULAR' ? 'hidden' : 'text').'"  name="valuesUpdate1[]" value="'.$valueArray[0].'" disabled>';
		echo "</div>";
		echo "<div class='row'>";
		echo '<input type="'.($valuePull['type'] == 'EMAIL'  ||  $valuePull['type'] == 'CELULAR' ? 'hidden' : 'text').'"  name="valuesUpdate2[]" value="'.$valueArray[1].'" disabled>';
		echo "</div>";
		echo "<div class='row'>";
		echo '<input type="text" name="valuesUpdate3[]" placeholder="'.$valuePull['type'].'" value="'.$valueArray[2].'" disabled>';
		echo "</div>";
		echo "<hr>";
		echo CHtml::button('Eliminar',array('submit'=>array('Sponsors/deleteContact','id'=>$valuePull['id']),'confirm'=>'¿Seguro que desea eliminarlo?','class'=>'deleteSomething'));

}
?>





	<div class="row buttons">
		<?php echo CHtml::htmlButton('Guardar',array(
								'onclick'=>'send("sponsors-contact-form", "sponsors/create_contact", "'.(isset($_GET['id']) ? $_GET['id'] : 0).'","'.Yii::app()->controller->id.'/'.Yii::app()->controller->action->id.'/'.(isset($_GET['id']) ? $_GET['id'] : 0).'","")',
								'class'=>'savebutton',
						));
		?>		<?php echo CHtml::Button('Cancelar',array('submit' => array('sponsors/sponsorsInfo'),'confirm'=>'¿Seguro que desea Cancelar?')); ?>
	</div>

<?php $this->endWidget();?>

</div><!-- form -->
