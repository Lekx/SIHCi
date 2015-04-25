<?php
/* @var $this PhonesController */
/* @var $model Phones */
/* @var $form CActiveForm */
?>
    <style type="text/css">  
        .errors{
            -webkit-boxshadow: 0 0 10px rgba(0, 0, 0, 0.3);
            -moz-box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            -o-box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            background: red;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            color: #fff;
            display: none;
            font-size: 10px;
            margin-top: -50px;
            margin-left: 315px;
            padding: 10px;
            position: absolute;
        }
    </style>
	<script>
	 var validateEmail = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
	 var validateNum = /^[0-9]+$/;
        $(document).ready(function(){
            $("#btnCreate").click(function(){
                
                var type = $("#typeEmail").val();
                var mail = $("#mail").val();
 
             
                if(type == ""){
                    $("#errorType").fadeIn("slow");
                    return false;
                }else{
                    $("#errorType").fadeOut();

                    if(mail == "" || !validateEmail.test(mail)){
                        $("#errorMail").fadeIn("slow");
                        return false;
                    }
                    else{
                        $("#errorMail").fadeOut();
                    }
                }
 
            });//click

             $("#btnCreatePhone").click(function(){
                
                var typePhone = $("#typePhone").val();
                var countryCode = $("#countryCode").val();
 				var localCode = $('#localCode').val();
 				var phoneNum = $('#phoneNum').val();
 
             
                if(typePhone == ""){
                    $("#errorTypePhone").fadeIn("slow");
                    return false;
                }else{
                    $("#errorTypePhone").fadeOut();

                    if(countryCode == "" || !validateNum.test(countryCode)){
                        $("#errorCountry").fadeIn("slow");
                        return false;
                    }else{
                        $("#errorCountry").fadeOut();
                        if (localCode == "" || !validateNum.test(localCode)) {
                        	$('#errorLocal').fadeIn("slow");
                        	return false;
                        }else{
                        	$('#errorLocal').fadeOut();
                        	if (phoneNum == "" || !validateNum.test(phoneNum)) {
                        		$('#errorPhone').fadeIn("slow");
                        		return false;
                        	}else{
                        		$('#errorPhone').fadeOut();
                        	}
                        }
                    }
                }
 
            });//click


        });//ready
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

	'enableAjaxValidation'=>true,
)); ?>

	<?php echo $form->errorSummary($model); ?>

		<?php 
		$this->widget('ext.widgets.reCopy.ReCopyWidget', array(
			'targetClass'=>'emails',
			'addButtonLabel'=>'Agregar Email Extra',
			)); 
			?>


	<div class="emails">
		<h5>Email:</h5>
			<select id="typeEmail" title="Tipo de Email" name="typesEmails[]">
	  			<option value="" selected="">Tipo Email</option> 
	  			<option value="Trabajo">Trabajo</option>
	  			<option value="Residencial">Residencial</option>
	  			<option value="Particular">Particular</option>
	  			<option value="Campus">Campus</option>
	  			<option value="otro">otro</option>
		</select>
		<div id="errorType" class="errors"> Debe seleccionar Tipo de Email</div>
		<br>
		<input id="mail" title="Email" type="text" name="emails[]" placeholder="Email">
		<div id="errorMail" class="errors"> Debe ser un correo válido: ejemplo@mail.com</div><br>

	</div>
		<input type="submit" id="btnCreate" value="Agregar email(s)">

		<br>
	</div>
		

		<?php 
		//print_r($getEmails);
		$countEmail = 1;
		foreach($getEmails as $key => $value){

			
				echo "<h5>Email:</h5>";
				echo $form->dropDownList($emails,'type',array('Trabajo'=>'Trabajo','Residencial'=>'Residencial', 
															'Particular'=>'Particular',
			                                                'Campus'=>'Campus', 'otro'=>'otro'), 
		                                                       array('prompt'=>'Tipo de Email','required'=>'true','name'=>'getTypeEmail[]','options' => array(''.$getEmails[$key]->type.''=>array('selected'=>true))));
				echo $form->error($emails,'type');

			 	echo $form->textField($emails,'email',array('required'=>'true','name'=>'getEmail[]','value'=>''.$getEmails[$key]->email.'','placeholder'=>'Email'));
			 	echo $form->error($emails, 'email');
			 	
				echo CHtml::button('Elminar',array('submit' => array('curriculumVitae/deleteEmail', 'id'=>$getEmails[$key]->id),'confirm'=>'¿Seguro que desea eliminarlo?'));
			 	$countEmail ++;
			 	echo "<hr>";
		}
		?>

		
<button class="newaddres">
	<?php 
		$this->widget('ext.widgets.reCopy.ReCopyWidget', array(
			'targetClass'=>'phone',
			'addButtonLabel'=>'Agregar Teléfono Extra',
			)); 
			?>
</button>

<div class="phone">

<h5>Telefono:</h5>
		<select id="typePhone" title="Tipo de Teléfono" name="typesPhones[]">
  			<option value="" selected="">Tipo de Teléfono</option> 
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

		</select>
		<div id="errorTypePhone" class="errors"> Debe seleccionar tipo de Teléfono</div><br>
		
		<?php echo $form->checkBox($model,'is_primary',array('name'=>'isPrimary[]')); ?>

			<div class="phoneinput">
			<input id="countryCode" type="text"  class="phones country" name="countryCode[]" maxlength="2" placeholder="[52]">
			<div id="errorCountry" class="errors"> Debe escribir Lada Nacional</div>
			<input id="localCode" type="text" class="phones state" name="localAreaCode[]" maxlength="3" placeholder="[33]">
			<div id="errorLocal" class="errors"> Debe escribir Lada Estatal</div>
			<input id="phoneNum" type="text" class="phones phonew" name="phoneNumber[]" maxlength="10" placeholder="[000-000-00]">
			<div id="errorPhone" class="errors"> Debe escribir número de Teléfono</div>
			<input type="text" class="phones extension" name="extension[]" maxlength="8" placeholder="[Ext]"> 
			</div>
		<input type="submit" id="btnCreatePhone" value="Agregar Teléfono(s)">

</div><!--FORM Phone -->
<hr>

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



	
		<?php
		foreach ($getPhones as $key => $value) {
	
		echo "<h5>Telefono:</h5>";
		echo $form->dropDownList($model,'type',array(''=>'','Trabajo'=>'Trabajo','Residencial'=>'Residencial', 
															'Particular'=>'Particular',
			                                                'Campus'=>'Campus', 'otro'=>'otro'), 
		                                                       array('prompt'=>'Tipo de Teléfono','required'=>'true','name'=>'getTypesPhones[]','options' => array($getPhones[$key]->type=>array('selected'=>true)))); 
		 echo $form->error($model,'type');

		 echo $form->labelEx($model,'country_code');
		 echo $form->textField($model,'country_code',array('required'=>true,'name'=>'getCountryCode[]','value'=>$getPhones[$key]->country_code,'placeholder'=>'Lada País'));
		 echo $form->error($model,'country_code');

		 echo $form->labelEx($model,'local_area_code');
		 echo $form->textField($model,'local_area_code',array('required'=>'true','name'=>'getLocalAreaCode[]','value'=>$getPhones[$key]->local_area_code,'placeholder'=>'Lada Estado'));
		 echo $form->error($model,'local_area_code'); 

		 echo $form->labelEx($model,'phone_number'); 
		 echo $form->textField($model,'phone_number',array('required'=>'true','name'=>'getPhoneNumber[]','value'=>$getPhones[$key]->phone_number,'placeholder'=>'Número Telefónico'));
		 echo $form->error($model,'phone_number'); 

		 echo $form->labelEx($model,'extension'); 
		 echo $form->textField($model,'extension',array('name'=>'getExtension[]','value'=>$getPhones[$key]->extension,'placeholder'=>'Extensión')); 
		 echo $form->error($model,'extension'); 

		 echo $form->labelEx($model,'is_primary'); 
		 echo $form->checkBox($model,'is_primary',array('name'=>'getIsPrimary[]','value'=>$getPhones[$key]->is_primary)); 

		 echo $form->error($model,'is_primary'); 
		 echo CHtml::button('Elminar',array('submit' => array('curriculumVitae/deletePhone', 'id'=>$getPhones[$key]->id),'confirm'=>'¿Seguro que desea eliminarlo?'));
		
		}
		 ?>
	

	<div class="row buttons">
		<input type="submit" onclick="validationFrom()" value="Guardar">
		<input type="button" onclick="cleanUp()" value="Limpiar">
		<?php echo CHtml::link('Cancelar', array('/site/index'));?>
		<input class="savebutton" type="submit" onclick="validationFrom()" value="Guardar">
		<input class="cleanbutton" type="button" onclick="cleanUp()" value="Borrar">
		<?php echo CHtml::button('Cancelar', array('submit' => array('curriculumVitae/personalData'), 'confirm'=>'¿Seguro que desea Cancelar?')); ?>
	</div>
<hr>
<?php $this->endWidget(); ?>


</div><!-- form -->

