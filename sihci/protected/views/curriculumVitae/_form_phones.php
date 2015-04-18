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

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'phones-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<button class="newaddres">
		<?php 
		$this->widget('ext.widgets.reCopy.ReCopyWidget', array(
			'targetClass'=>'emails',
			'addButtonLabel'=>'Agregar Email Extra',
			)); 
			?>
	</button>

	<div class="emails">
	<h5>Email:</h5>
		<select title="Tipo de Email" name="typesEmails[]">
  			<option value="" selected="">Tipo Email</option> 
  			<option value="Trabajo">Trabajo</option>
  			<option value="Residencial">Residencial</option>
  			<option value="Particular">Particular</option>
  			<option value="Campus">Campus</option>
  			<option value="otro">otro</option>
		</select>
		<input  title="Email" type="text" name="emails[]" placeholder="Email">
		<br>
	</div>

			<div class="row">
				<?php 
		//print_r($getEmails);
				$countEmail = 1;
				foreach($getEmails as $key){

					echo "<h5>Email:</h5>";
					echo $form->dropDownList($emails,'type',array(''=>'','Trabajo'=>'Trabajo','Residencial'=>'Residencial', 
						'Particular'=>'Particular',
						'Campus'=>'Campus', 'otro'=>'otro'), 
					array( 'title'=>'Tipo de Email','name'=>'getTypeEmail[]','options' => array(''.$key['type'].''=>array('selected'=>true))));
					echo $form->error($emails,'type');

					echo $form->textField($emails,'email',array('name'=>'getEmail[]','value'=>''.$key['email'].'','placeholder'=>'Email', 'title'=>'Email'));
					echo $form->error($emails, 'email');
					$countEmail ++;
					echo "<hr>";
				}
				?>
			</div>
		
<button class="newaddres">
	<?php 
		$this->widget('ext.widgets.reCopy.ReCopyWidget', array(
			'targetClass'=>'phone',
			'addButtonLabel'=>'Agregar Telefono Extra',
			)); 
			?>
</button>

<div class="phone">
<h5>Telefono:</h5>
		<select title="Tipo de Teléfono" name="typesPhones[]">
  			<option value="" selected="">Tipo de Teléfono</option> 
  			<option value="Trabajo">Trabajo</option>
  			<option value="Residencial">Residencial</option>
  			<option value="Particular">Particular</option>
  			<option value="Campus">Campus</option>
  			<option value="otro">otro</option>
		</select>

		<div class="phoneinput">
			<input type="text"  class="phones country" name="countryCode[]" maxlength="2" placeholder="[52]">
			<input type="text" class="phones state" name="localAreaCode[]" maxlength="3" placeholder="[33]">
			<input type="text" class="phones phonew" name="phoneNumber[]" maxlength="10" placeholder="[000-000-00]">
			<input type="text" class="phones extension" name="extension[]" maxlength="8" placeholder="[Ext]"> 
		</div>
		<br>
</div><!--FORM Phone -->



		<?php 		
		foreach ($getPhones as $key) {
	
		echo "<h5>Telefono:</h5>";
		echo $form->dropDownList($model,'type',array(''=>'','Trabajo'=>'Trabajo','Residencial'=>'Residencial', 
															'Particular'=>'Particular',
			                                                'Campus'=>'Campus', 'otro'=>'otro'), 
		                                                       array('title'=>'Tipo de Telefono','name'=>'getTypesPhones[]','options' => array(''.$key['type'].''=>array('selected'=>true)))); 
		 echo $form->error($model,'type');

		 echo $form->textField($model,'country_code',array('name'=>'getCountryCode[]','value'=>''.$key['country_code'].'','placeholder'=>'País'));
		 echo $form->error($model,'country_code');

		 echo $form->textField($model,'local_area_code',array('name'=>'getLocalAreaCode[]','value'=>''.$key['local_area_code'].'','placeholder'=>'Estado'));
		 echo $form->error($model,'local_area_code'); 

		 echo $form->textField($model,'phone_number',array('name'=>'getPhoneNumber[]','value'=>''.$key['phone_number'].'','placeholder'=>'Número Telefónico'));
		 echo $form->error($model,'phone_number'); 

		 echo $form->textField($model,'extension',array('name'=>'getExtension[]','value'=>''.$key['extension'].'','placeholder'=>'Ext')); 
		 echo $form->error($model,'extension'); 

		 echo $form->checkBox($model,'is_primary',array('name'=>'getIsPrimary[]','value'=>''.$key['is_primary'].'')); 
		 echo $form->error($model,'is_primary'); 
		}
		 ?>
	

	<div class="row buttons">
		<input class="savebutton" type="submit" onclick="validationFrom()" value="Guardar">
		<input class="cleanbutton" type="button" onclick="cleanUp()" value="Borrar">
		<?php echo CHtml::button('Cancelar',array('/site/index')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

