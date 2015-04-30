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
        .emails{
            display: none;
        }
        .phone{
            display: none;
        }
    </style>
	
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/protected/views/curriculumVitae/script/script.js"></script>
<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'phones-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.

	'enableAjaxValidation' => true,
));?>

	<?php echo $form->errorSummary($model); ?>

<input id="showFormEmail" type="button" value="Agregar Email">
<input id="hideFormEmail" class="emails"  type="button" value="Cancelar">


	<div class="emails">
		<h5>Email:</h5>
			<select id="typeEmail" title="Tipo de Email" name="typesEmails">
	  			<option value="" selected="">Tipo Email</option> 
	  			<option value="Trabajo">Trabajo</option>
	  			<option value="Residencial">Residencial</option>
	  			<option value="Particular">Particular</option>
	  			<option value="Campus">Campus</option>
	  			<option value="otro">otro</option>
		</select>
		<div id="errorTypeEmail" class="errors"> Debe seleccionar Tipo de Email</div>
		<br>
		<input id="mail" title="Email" type="text" name="emails" placeholder="Email">
		<div id="errorMail" class="errors"> Debe ser un correo válido: ejemplo@mail.com</div><br>

	
         <?php echo CHtml::ajaxButton ('Agregar email',CController::createUrl('curriculumVitae/phones'), 
                        array(
                            'dataType'=>'json',
                            'type'=>'post',
                            'success'=>'function(data) 
                             {
                                              
                                 if(data.status=="success")
                                 {
                                     alert("Su nuevo Email se ha creado con éxito");
                                     window.location.href ="'.Yii::app()->createUrl('curriculumVitae/phones').'";
                                 }                               
                                 else
                                 {
                                      alert("Su nuevo Email se ha creado con éxito");
                                     window.location.href ="'.Yii::app()->createUrl('curriculumVitae/phones').'";  
                                 }       
                            }',                    
                            
                        ), array('id'=>'btnCreateEmail')); 
            ?>
		
	</div>
		

		<?php 
		//print_r($getEmails);
		$countEmail = 1;
		foreach($getEmails as $key => $value){

			
				echo "<h5>Email:</h5>";
				echo $form->dropDownList($emails,'type',array('Trabajo'=>'Trabajo','Residencial'=>'Residencial', 
															'Particular'=>'Particular',
			                                                'Campus'=>'Campus', 'otro'=>'otro'), 
		                                                       array('title'=>'Tipo de Email','prompt'=>'Tipo de Email','required'=>'true','name'=>'getTypeEmail[]','options' => array(''.$getEmails[$key]->type.''=>array('selected'=>true))));
				echo $form->error($emails,'type');

			 	echo $form->textField($emails,'email',array('title'=>'Email','required'=>'true','name'=>'getEmail[]','value'=>''.$getEmails[$key]->email.'','placeholder'=>'Email'));
			 	echo $form->error($emails, 'email');
			 	
				echo CHtml::button('Elminar',array('submit' => array('curriculumVitae/deleteEmail', 'id'=>$getEmails[$key]->id),'confirm'=>'¿Seguro que desea eliminarlo?'));
			 	$countEmail ++;
			 	echo "<hr>";
		}
		?>

		<br>


	<input type="button" id="showFormPhone" value="Agregar Teléfono">
	<input class="phone"  type="button" id="hideFormPhone" value="Cancelar">

<div class="phone">
	<br>
	<select id="typePhone" title="Tipo de Teléfono" name="typesPhones">
			<option value="" selected="">Tipo de Teléfono</option> 
			<option value="Trabajo">Trabajo</option>
			<option value="Residencial">Residencial</option>
			<option value="Particular">Particular</option>
			<option value="Campus">Campus</option>
			<option value="otro">otro</option>
	</select>
		<br>
		<div id="errorTypePhone" class="errors"> Debe seleccionar tipo de Teléfono</div><br>

			<div class="phoneinput">
				<input id="countryCode" type="text"  class="phones country" name="countryCode" maxlength="2" placeholder="[52]">
				<div id="errorCountry" class="errors"> Debe escribir Lada Nacional y tiene que ser número</div>
				<input id="localCode" type="text" class="phones state" name="localAreaCode" maxlength="3" placeholder="[33]">
				<div id="errorLocal" class="errors"> Debe escribir Lada Estatal y tiene que ser número</div>
				<input id="phoneNum" type="text" class="phones phonew" name="phoneNumber" maxlength="10" placeholder="[000-000-00]">
				<div id="errorPhone" class="errors"> Debe escribir número de Teléfono y tiene que ser número</div>
				<input type="text" class="phones extension" name="extension" maxlength="8" placeholder="[Ext]"> 
			</div>

          <?php echo CHtml::ajaxButton ('Agregar Teléfono',CController::createUrl('curriculumVitae/phones'), 
                        array(
                            'dataType'=>'json',
                            'type'=>'post',
                            'success'=>'function(data) 
                             {
                                              
                                 if(data.status=="success")
                                 {
                                     alert("Su nuevo Teléfono se ha creado con éxito");
                                     window.location.href ="'.Yii::app()->createUrl('curriculumVitae/phones').'";
                                 }                               
                                 else
                                 {
                                      alert("Su nuevo Teléfono se ha creado con éxito");
                                     window.location.href ="'.Yii::app()->createUrl('curriculumVitae/phones').'";  
                                 }       
                            }',                    
                            
                        ), array('id'=>'btnCreatePhone')); 
            ?>

</div><!--FORM Phone -->
<hr>
	
		<?php
		foreach ($getPhones as $key => $value) {
      echo "<h5>Teléfono:</h5>";
		echo $form->dropDownList($model,'type',array('Trabajo'=>'Trabajo','Residencial'=>'Residencial', 
															'Particular'=>'Particular',
			                                                'Campus'=>'Campus', 'otro'=>'otro'), 
		                                                       array('title'=>'Tipo de Teléfono','prompt'=>'Tipo de Teléfono','required'=>'true','name'=>'getTypesPhones[]','options' => array($getPhones[$key]->type=>array('selected'=>true)))); 
		 echo $form->error($model,'type');
		 echo "<div class='phoneinput'>";

		 echo $form->textField($model,'country_code',array('class'=>'phones country','required'=>true,'name'=>'getCountryCode[]','value'=>$getPhones[$key]->country_code,'placeholder'=>'[52]'));
		 echo $form->error($model,'country_code');

		 echo $form->textField($model,'local_area_code',array('class'=>'phones state','required'=>'true','name'=>'getLocalAreaCode[]','value'=>$getPhones[$key]->local_area_code,'placeholder'=>'[33]'));
		 echo $form->error($model,'local_area_code'); 

		 echo $form->textField($model,'phone_number',array('class'=>'phones phonew','required'=>'true','name'=>'getPhoneNumber[]','value'=>$getPhones[$key]->phone_number,'placeholder'=>'[000-000-00]'));
		 echo $form->error($model,'phone_number'); 

		 echo $form->textField($model,'extension',array('class'=>'phones extension','name'=>'getExtension[]','value'=>$getPhones[$key]->extension,'placeholder'=>'[Ext]')); 
		 echo $form->error($model,'extension'); 
 echo "<br>";
		echo "Marcar como primario ";
     echo $form->radioButton($model,'is_primary',array('name'=>'getIsPrimary[]', 'uncheckValue'=>'0', 'checked'=>$getPhones[$key]->is_primary)); 
      echo $form->error($model,'is_primary'); 
      echo "<br>";
		 echo CHtml::button('Elminar',array('submit' => array('curriculumVitae/deletePhone', 'id'=>$getPhones[$key]->id),'confirm'=>'¿Seguro que desea eliminarlo?'));
		 echo "</div>";
		  echo "<hr>";

     
		}
		 ?>
	

	<div class="row buttons">
         <?php echo CHtml::ajaxButton ('Guardar',CController::createUrl('curriculumVitae/phones'), 
                        array(
                            'dataType'=>'json',
                            'type'=>'post',
                            'success'=>'function(data) 
                             {
                                              
                                 if(data.status=="success")
                                 {
                                     alert("Registro realizado con éxito");
                                     window.location.href ="'.Yii::app()->createUrl('curriculumVitae/phones').'";
                                 }                               
                                  else
                                 {
                                    alert("No existe ningun registro");   
                                 }        
                            }',                    
                            
                        ), array('class'=>'savebutton')); ?>
		<input class="cleanbutton" type="button" onclick="cleanUp()" value="Borrar">
		<?php echo CHtml::Button('Cancelar',array('submit' => array('curriculumVitae/index'),'confirm'=>'¿Seguro que desea Cancelar?')); ?>
	</div>
<hr>
<?php $this->endWidget(); ?>


</div><!-- form -->


