<?php
/* @var $this PhonesController */
/* @var $model Phones */
/* @var $form CActiveForm */
?>
	<script>
		function cleanUp(){
			var text;
			var result = confirm("¿Está usted seguro de limpiar estos datos?");
			if (result==true) {
				$('[id^=Phones_]').val('');
				$('[id^=Emails_]').val('');
			}else{

			}
			document.getElementById("demo").innerHTML = text;
		}
		function validationFrom(){
			alert("Registro Realizado con éxito");
			return false;
		}

</script>
<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'phones-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation' => true,
));?>

	<?php echo $form->errorSummary($model);?>
<?php
$this->widget('ext.widgets.reCopy.ReCopyWidget', array(
	'targetClass' => 'emails',
	'addButtonLabel' => 'Agregar nuevo',
));
?>
	<div class="emails">
		Tipo de email
		<select name="typesEmails[]">
  			<option value="" selected=""></option>
  			<option value="Trabajo">Trabajo</option>
  			<option value="Residencial">Residencial</option>
  			<option value="Particular">Particular</option>
  			<option value="Campus">Campus</option>
  			<option value="otro">otro</option>
		</select><br>
		Email
		<input type="text" name="emails[]">
		</div>
		<?php
//print_r($getEmails);
$countEmail = 1;
foreach ($getEmails as $key) {

	echo $countEmail;
	echo $form->labelEx($emails, 'type');
	echo $form->dropDownList($emails, 'type', array('' => '', 'Trabajo' => 'Trabajo', 'Residencial' => 'Residencial',
		'Particular' => 'Particular',
		'Campus' => 'Campus', 'otro' => 'otro'),
		array('name' => 'getTypeEmail[]', 'options' => array('' . $key['type'] . '' => array('selected' => true))));
	echo $form->error($emails, 'type');

	echo $form->labelEx($emails, 'email');
	echo $form->textField($emails, 'email', array('name' => 'getEmail[]', 'value' => '' . $key['email'] . '', 'placeholder' => 'Email'));
	echo $form->error($emails, 'email');
	$countEmail++;
	echo "<br>";
}
?>


<?php
$this->widget('ext.widgets.reCopy.ReCopyWidget', array(
	'targetClass' => 'phone',
	'addButtonLabel' => 'Agregar nuevo',
));
?>
<div class="phone">
		Tipo de Teléfono
		<select name="typesPhones[]">
  			<option value="" selected=""></option>
  			<option value="Trabajo">Trabajo</option>
  			<option value="Residencial">Residencial</option>
  			<option value="Particular">Particular</option>
  			<option value="Campus">Campus</option>
  			<option value="otro">otro</option>
		</select><br>
		Lada País
		<input type="text" name="countryCode[]" maxlength="2"><br>
		Lada Estado
		<input type="text" name="localAreaCode[]" maxlength="3"><br>
		Número de Teléfono
		<input type="text" name="phoneNumber[]" maxlength="10"><br>
		Extensión
		<input type="text" name="extension[]" maxlength="8"><br>
		Es primario
		<?php echo $form->checkBox($model, 'is_primary', array('name' => 'isPrimary[]'));?>

</div><!--FORM Phone -->
		<?php
foreach ($getPhones as $key) {

	echo $form->labelEx($model, 'type');
	echo $form->dropDownList($model, 'type', array('' => '', 'Trabajo' => 'Trabajo', 'Residencial' => 'Residencial',
		'Particular' => 'Particular',
		'Campus' => 'Campus', 'otro' => 'otro'),
		array('name' => 'getTypesPhones[]', 'options' => array('' . $key['type'] . '' => array('selected' => true))));
	echo $form->error($model, 'type');

	echo $form->labelEx($model, 'country_code');
	echo $form->textField($model, 'country_code', array('name' => 'getCountryCode[]', 'value' => '' . $key['country_code'] . '', 'placeholder' => 'Lada País'));
	echo $form->error($model, 'country_code');

	echo $form->labelEx($model, 'local_area_code');
	echo $form->textField($model, 'local_area_code', array('name' => 'getLocalAreaCode[]', 'value' => '' . $key['local_area_code'] . '', 'placeholder' => 'Lada Estado'));
	echo $form->error($model, 'local_area_code');

	echo $form->labelEx($model, 'phone_number');
	echo $form->textField($model, 'phone_number', array('name' => 'getPhoneNumber[]', 'value' => '' . $key['phone_number'] . '', 'placeholder' => 'Número Telefónico'));
	echo $form->error($model, 'phone_number');

	echo $form->labelEx($model, 'extension');
	echo $form->textField($model, 'extension', array('name' => 'getExtension[]', 'value' => '' . $key['extension'] . '', 'placeholder' => 'Extensión'));
	echo $form->error($model, 'extension');

	echo $form->labelEx($model, 'is_primary');
	echo $form->checkBox($model, 'is_primary', array('name' => 'getIsPrimary[]', 'value' => '' . $key['is_primary'] . ''));
	echo $form->error($model, 'is_primary');
}
?>



	<div class="row buttons">
		<input type="submit" onclick="validationFrom()" value="Guardar">
		<input type="button" onclick="cleanUp()" value="Limpiar">
		<?php echo CHtml::link('Cancelar', array('/site/index'));?>
	</div>

<?php $this->endWidget();?>

</div><!-- form -->

