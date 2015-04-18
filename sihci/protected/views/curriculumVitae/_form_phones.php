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
                    $("#errorType").fadeOut();

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
                        		$('#errorLocal').fadeOut();
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

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'phones-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>

	<?php echo $form->errorSummary($model); ?>
<?php 
	$this->widget('ext.widgets.reCopy.ReCopyWidget', array(
 	'targetClass'=>'emails',
 	'addButtonLabel'=>'Agregar nuevo',
		 )); 
?>
	<div class="emails">
		Tipo de email
		<select id="typeEmail" name="typesEmails[]">
  			<option value="" selected="">Tipo de email</option> 
  			<option value="Trabajo">Trabajo</option>
  			<option value="Residencial">Residencial</option>
  			<option value="Particular">Particular</option>
  			<option value="Campus">Campus</option>
  			<option value="otro">otro</option>
		</select>
		<div id="errorType" class="errors"> Debe seleccionar Tipo de Email</div>
		<br>
		Email
		<input id="mail" type="text" name="emails[]">
		<div id="errorMail" class="errors"> Debe ser un correo existente ejemplo@mail.com</div><br>
		</div>
		<input type="submit" id="btnCreate" value="Agregar email(s)">
		<br>
		<?php 
		//print_r($getEmails);
		$countEmail = 1;
		foreach($getEmails as $key => $value){

				echo $countEmail;
				echo $form->labelEx($emails,'type'); 
				echo $form->dropDownList($emails,'type',array('Trabajo'=>'Trabajo','Residencial'=>'Residencial', 
															'Particular'=>'Particular',
			                                                'Campus'=>'Campus', 'otro'=>'otro'), 
		                                                       array('prompt'=>'Tipo de Email','required'=>'true','name'=>'getTypeEmail[]','options' => array(''.$getEmails[$key]->type.''=>array('selected'=>true))));
				echo $form->error($emails,'type');

				echo $form->labelEx($emails,'email');
			 	echo $form->textField($emails,'email',array('required'=>'true','name'=>'getEmail[]','value'=>''.$getEmails[$key]->email.'','placeholder'=>'Email'));
			 	echo $form->error($emails, 'email');
			 //	array('label'=>'Delete Emails', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
			 //	echo " <a href='id=".$getEmails[$key]->id."'/>Eliminar</a>";
			 //	Yii::app()->runController('systemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
				echo CHtml::link('Eliminar',array('curriculumVitae/delete',
                                     'id'=>''.$getEmails[$key]->id.'')); 
			 	$countEmail ++;
			 	echo "<br>";
		}
		?>
		
	
<?php 
	$this->widget('ext.widgets.reCopy.ReCopyWidget', array(
 	'targetClass'=>'phone',
 	'addButtonLabel'=>'Agregar nuevo',
		 )); 
?>
<div class="phone">
		Tipo de Teléfono
		<select id="typePhone" name="typesPhones[]">
  			<option value="" selected="">Tipo de Teléfono</option> 
  			<option value="Trabajo">Trabajo</option>
  			<option value="Residencial">Residencial</option>
  			<option value="Particular">Particular</option>
  			<option value="Campus">Campus</option>
  			<option value="otro">otro</option>
		</select>
		<div id="errorTypePhone" class="errors"> Debe seleccionar tipo de Teléfono</div><br>
		<br>

		Lada País
		<input id="countryCode" type="text" name="countryCode[]" maxlength="2"><br>
		<div id="errorCountry" class="errors"> Debe ser Numero con 2 dígitos</div><br>
		Lada Estado
		<input id="localCode" type="text" name="localAreaCode[]" maxlength="3"><br>
		<div id="errorLocal" class="errors"> Debe ser Número con 2 o 3 dígitos</div><br>
		Número de Teléfono
		<input id="phoneNum" type="text" name="phoneNumber[]" maxlength="10"><br>
		<div id="errorPhone" class="errors"> Debe ser Número con 8 o 10 dígitos</div><br>
		Extensión
		<input type="text" name="extension[]" maxlength="8"><br>
		Es primario
		<?php echo $form->checkBox($model,'is_primary',array('name'=>'isPrimary[]')); ?>
</div><!--FORM Phone -->
	<input type="submit" id="btnCreatePhone" value="Agregar Teléfono(s)">
	<br>
		<?php 		
		$countPhone=1;

		foreach ($getPhones as $key) {
		echo $countPhone;
		echo $form->labelEx($model,'type');
		echo $form->dropDownList($model,'type',array('Trabajo'=>'Trabajo','Residencial'=>'Residencial', 
															'Particular'=>'Particular',
			                                                'Campus'=>'Campus', 'otro'=>'otro'), 
		                                                       array('prompt'=>'Tipo de Teléfono','required'=>'true','name'=>'getTypesPhones[]','options' => array(''.$key['type'].''=>array('selected'=>true)))); 
		 echo $form->error($model,'type');

		 echo $form->labelEx($model,'country_code');
		 echo $form->textField($model,'country_code',array('required'=>true,'name'=>'getCountryCode[]','value'=>''.$key['country_code'].'','placeholder'=>'Lada País'));
		 echo $form->error($model,'country_code');

		 echo $form->labelEx($model,'local_area_code');
		 echo $form->textField($model,'local_area_code',array('required'=>'true','name'=>'getLocalAreaCode[]','value'=>''.$key['local_area_code'].'','placeholder'=>'Lada Estado'));
		 echo $form->error($model,'local_area_code'); 

		 echo $form->labelEx($model,'phone_number'); 
		 echo $form->textField($model,'phone_number',array('required'=>'true','name'=>'getPhoneNumber[]','value'=>''.$key['phone_number'].'','placeholder'=>'Número Telefónico'));
		 echo $form->error($model,'phone_number'); 

		 echo $form->labelEx($model,'extension'); 
		 echo $form->textField($model,'extension',array('name'=>'getExtension[]','value'=>''.$key['extension'].'','placeholder'=>'Extensión')); 
		 echo $form->error($model,'extension'); 

		 echo $form->labelEx($model,'is_primary'); 
		 echo $form->checkBox($model,'is_primary',array('name'=>'getIsPrimary[]','value'=>''.$key['is_primary'].'')); 
		 echo $form->error($model,'is_primary'); 
		 $countPhone++;
		}
		 ?>
	


	<div class="row buttons">
		<input type="submit" onclick="validationFrom()" value="Guardar">
		<input type="button" onclick="cleanUp()" value="Limpiar">
		<?php echo CHtml::link('Cancelar',array('/site/index')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

