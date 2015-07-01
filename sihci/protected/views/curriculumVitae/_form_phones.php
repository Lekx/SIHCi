<?php
/* @var $this PhonesController */
/* @var $model Phones */
/* @var $form CActiveForm */
?>
<script>
$(document).ready(function() {
      $(".numericOnly").keydown(function (e) {
          if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
              (e.keyCode == 65 && e.ctrlKey === true) ||
              (e.keyCode >= 35 && e.keyCode <= 40)) {
                  return;
          }
          if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
              e.preventDefault();
          }

      });
  });</script>
<style type="text/css">  
		#btnCreateEmail{
				background-color: #00b973 !important;
			}
		#btnCreatePhone{
				background-color: #00b973 !important;
			}
/* 	.deleteEmail, .deletePhone{
		background-color: #dd7777 !important;
    color: white !important;
    display: block !important;
    height: 25px !important;
    margin: 15px !important;
    padding: 3px;
    text-align: center !important;
    width: 450px !important;
	} */
	
         .errors{
            -webkit-boxshadow: 0 0 10px rgba(0, 0, 0, 0.3);
            -moz-box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            -o-box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            background: red;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            display: none;
            margin-top: -50px;
            margin-left: 455px;
            position: absolute;
			border-radius: 5px; 
			border: 2px solid #F20862;
			background: #F20862;
			color: #fff;
			width: 190px !important;
			font-family: 'Caviar_Dreams_Bold' !important;
			font-size: 12px;
			line-height: 16px;
			padding: 8px 10px;
			text-align:  center;
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

<input id="showFormEmail" type="button" value="Agregar Nuevo Email">


	<div class="emails">
	 <div class="row">
		 <span class="plain-select1">
		 	<h5>Email:</h5>
			<select id="typeEmail" title="Tipo de Email" name="typesEmails">
	  			<option value="" selected="">Tipo Email</option> 
	  			<option value="Trabajo">Trabajo</option>
	  			<option value="Residencial">Residencial</option>
	  			<option value="Particular">Particular</option>
	  			<option value="Campus">Campus</option>
	  			<option value="otro">otro</option>
			</select>
		</span>
		</div>
		<div id="errorTypeEmail" class="errors"> Debe seleccionar Tipo de Email</div>
		<div class="row">
		<input id="mail" title="Email" type="text" name="emails" placeholder="Email">
		<div id="errorMail" class="errors"> Debe ser un correo válido: ejemplo@mail.com</div>
		</div>

	
         <?php echo CHtml::ajaxButton ('Crear Nuevo email',CController::createUrl('curriculumVitae/phones'), 
                         array(
							'dataType'=>'json',
                     		'type'=>'post',
                     		'success'=>'function(data) 
                     		 {
		                                      
		                         if(data.status=="200")
		                         {
				                     $(".successdiv").show(); 
		                         }		                         
		                         else
		                         {
			                     	   $(".successdiv").show();  
			                     }       
		                  	}',                    
                            
                        ), array('id'=>'btnCreateEmail')); 
            ?>
		
	</div>
		

		<?php 
		//print_r($getEmails);
		$countEmail = 1;
		foreach($getEmails as $key => $value){

				echo "<div class='row'>";
				echo "<h5>Email:</h5>";
				echo " <span class='plain-select'>";
				echo $form->dropDownList($emails,'type',array('Trabajo'=>'Trabajo','Residencial'=>'Residencial', 
															'Particular'=>'Particular',
			                                                'Campus'=>'Campus', 'otro'=>'otro'), 
		                                                       array('title'=>'Tipo de Email','prompt'=>'Tipo de Email','required'=>'true','name'=>'getTypeEmail[]','options' => array(''.$getEmails[$key]->type.''=>array('selected'=>true))));
				echo "</span>";
				echo "</div>";
				echo "<div class='row'>";
				echo $form->error($emails,'type');
			 	echo $form->textField($emails,'email',array('title'=>'Email','required'=>'true','name'=>'getEmail[]','value'=>''.$getEmails[$key]->email.'','placeholder'=>'Email'));
			 	echo $form->error($emails, 'email');
			 	echo "</div>";
			 	
				echo CHtml::button('Elminar',array('submit' => array('curriculumVitae/deleteEmail', 'id'=>$getEmails[$key]->id),'confirm'=>'¿Seguro que desea eliminarlo?' , 'class'=>'deleteSomething'));
			 	$countEmail ++;
			 	echo "<hr>";
		}
		?>

		<br>


	<input type="button" id="showFormPhone" value="Agregar Nuevo Teléfono">

<div class="phone">
<div class="row">
 <span class="plain-select">
	<select id="typePhone" title="Tipo de Teléfono" name="typesPhones">
			<option value="" selected="">Tipo de Teléfono</option> 
			<option value="Trabajo">Trabajo</option>
			<option value="Residencial">Residencial</option>
			<option value="Particular">Particular</option>
			<option value="Campus">Campus</option>
			<option value="otro">otro</option>
	</select>
	</span>
		<div id="errorTypePhone" class="errors"> Debe seleccionar tipo de Teléfono</div>
	</div>

			<div class="phoneinput">
			<div class="row">
				<?php echo $form->textField($model,'country_code',array('id'=>'countryCode','class'=>'phones country numericOnly','required'=>true,'name'=>'countryCode','placeholder'=>'[52]', 'title'=>'Lada Nacional')); ?>
				
				<div id="errorCountry" class="errors"> Debe escribir Lada Nacional y tiene que ser número</div>
				<input id="localCode" type="text" class="phones state numericOnly" name="localAreaCode" maxlength="3" placeholder="[33]" title="Lada Local">
				<div id="errorLocal" class="errors"> Debe escribir Lada Estatal y tiene que ser número</div>
				<input id="phoneNum" type="text" class="phones phonew numericOnly" name="phoneNumber" maxlength="10" placeholder="[000-000-00]" title="Número de Teléfono">
				<div id="errorPhone" class="errors"> Debe escribir número de Teléfono y tiene que ser número</div>
				<input type="text" class="phones extension numericOnly" name="extension" maxlength="8" placeholder="[Ext]" title="Extensión"> 
				</div>
			</div>

          <?php echo CHtml::ajaxButton ('Crear Nuevo Teléfono',CController::createUrl('curriculumVitae/phones'), 
                        array(
							'dataType'=>'json',
                     		'type'=>'post',
                     		'success'=>'function(data) 
                     		 {
		                                      
		                         if(data.status=="200")
		                         {
				                     $(".successdiv").show(); 
		                         }		                         
		                         else
		                         {
			                     	   $(".successdiv").show();  
			                     }       
		                  	}',                    
		                    
                        ), array('id'=>'btnCreatePhone','class'=>'addSomething')); 
            ?>

</div><!--FORM Phone -->
<hr>
	
		<?php
		foreach ($getPhones as $key => $value) {
	 	echo "<div class='row'>";
      	echo "<h5>Teléfono:</h5>";
     	echo " <span class='plain-select'>";
		echo $form->dropDownList($model,'type',array('Trabajo'=>'Trabajo','Residencial'=>'Residencial', 
															'Particular'=>'Particular',
			                                                'Campus'=>'Campus', 'otro'=>'otro'), 
		                                                       array('title'=>'Tipo de Teléfono','prompt'=>'Tipo de Teléfono','required'=>'true','name'=>'getTypesPhones[]','options' => array($getPhones[$key]->type=>array('selected'=>true)))); 
		 echo "</span>";
		 echo $form->error($model,'type');
		 echo "</div>";
		 echo "<div class='phoneinput'>";
		 echo "<div class='row'>";
		 echo $form->textField($model,'country_code',array('class'=>'phones country numericOnly','required'=>true,'name'=>'getCountryCode[]','value'=>$getPhones[$key]->country_code,'placeholder'=>'[52]', 'title'=>'Lada Nacional'));
		 echo $form->error($model,'country_code');

		 echo $form->textField($model,'local_area_code',array('class'=>'phones state numericOnly','required'=>'true','name'=>'getLocalAreaCode[]','value'=>$getPhones[$key]->local_area_code,'placeholder'=>'[33]', 'title'=>'Lada Local'));
		 echo $form->error($model,'local_area_code'); 

		 echo $form->textField($model,'phone_number',array('class'=>'phones phonew numericOnly','required'=>'true','name'=>'getPhoneNumber[]','value'=>$getPhones[$key]->phone_number,'placeholder'=>'[000-000-00-00]', 'title'=>'Número de Teléfono'));
		 echo $form->error($model,'phone_number'); 

		 echo $form->textField($model,'extension',array('class'=>'phones extension numericOnly','name'=>'getExtension[]','value'=>$getPhones[$key]->extension,'placeholder'=>'[Ext]', 'title'=>'Extensión')); 
		 echo $form->error($model,'extension'); 
		 echo "<br>";
		 echo "<br>";
		 
		echo "Marcar como primario ";
     echo $form->radioButton($model,'is_primary',array('name'=>'getIsPrimary[]', 'uncheckValue'=>'0', 'checked'=>$getPhones[$key]->is_primary)); 
      echo $form->error($model,'is_primary'); 
      echo "</div>";
		 echo CHtml::button('Elminar',array('submit' => array('curriculumVitae/deletePhone', 'id'=>$getPhones[$key]->id),'confirm'=>'¿Seguro que desea eliminarlo?','class'=>'deleteSomething'));
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
		                                      
		                         if(data.status=="200")
		                         {
				                     $(".successdiv").show(); 
		                         }		                         
		                         else
		                         {
		                         	alert("Aún no ha creado un teléfono y/o un email");
                                     window.location.href ="'.Yii::app()->createUrl('curriculumVitae/phones').'";  
			                     	$(".errordiv").show();   

			                     }       
		                  	}',                    
		                    
                      ), array('class'=>'savebutton'));  ?>
		
		<?php echo CHtml::Button('Cancelar',array('submit' => array('curriculumVitae/index'),'confirm'=>'¿Seguro que desea Cancelar?')); ?>
	</div>
<hr>
<?php $this->endWidget(); ?>


</div><!-- form -->


