<?php
/* @var $this PersonsController */
/* @var $model Persons */
/* @var $form CActiveForm */

?>
	<script>
		function cleanUp(){
			var text;
			var result = confirm("¿Está usted seguro de limpiar estos datos?");
			if (result==true) {
				$('[id^=Persons_]').val('');
				$('[id^=Curriculum_]').val('');
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
	'id'=>'personal-data-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

<?php echo $form->errorSummary($model); ?>
<?php echo $form->errorSummary($curriculum); ?>
	<div class="row">
		<?php echo $form->labelEx($curriculum,'status'); ?>
		<?php echo $form->checkbox($curriculum,'status',array('size'=>30,'maxlength'=>30, 'placeholder'=>"Nombres")); ?>
		<?php echo $form->error($curriculum,'status'); ?>
	</div>

	<div class="row 1">
		<?php echo $form->textField($model,'names',array('size'=>30,'maxlength'=>30, 'placeholder'=>"Nombres")); ?>
		<?php echo $form->error($model,'names'); ?>
		 <div class="infobox">
                Nombres
          </div>
	</div>

	<div class="row">
	
		<?php echo $form->textField($model,'last_name1',array('size'=>20,'maxlength'=>20, 'placeholder'=>"Apellido Paterno")); ?>
		<?php echo $form->error($model,'last_name1'); ?>
		 <div class="infobox">
                Apellido Paterno
          </div>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'last_name2',array('size'=>20,'maxlength'=>20, 'placeholder'=>"Apellido Materno")); ?>
		<?php echo $form->error($model,'last_name2'); ?>
		 <div class="infobox">
                Apellido Materno
          </div>
	</div>

	<div class="row">
		<?php echo $form->dropDownList($model,'marital_status',array('soltero'=>'Soltero','viudo'=>'Viudo', 'casado'=>'Casado',
			                                                          'divorciado'=>'Divorciado', 'union libre'=>'Unión Libre'), 
		                                                       array('prompt'=> 'Estado Civil','options' => array(''=>array('selected'=>true))), 
		                                                       array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'marital_status'); ?>
		 <div class="infobox">
                Estado Civil
          </div>
	</div>

	<div class="row">

		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
		    'language'=> 'es',
		    'attribute' => 'birth_date',
		    'model' => $model,
		   // 'flat'=>false,
		     'options' => array(
			     		'changeMonth'=>true, //cambiar por Mes
			     		'changeYear'=>true, //cambiar por Año
			    			'maxDate' => 'now-5475',
		     	),
		    'htmlOptions' => array(
		    			'size'=>'10',
		    			'maxlength'=>'10', 
		        		'placeholder'=>"Fecha de Nacimiento"),
				));
	?>
	<?php echo $form->error($model,'birth_date'); ?>
	 <div class="infobox">
                Fecha de Nacimiento
          </div>
	</div>


		<div class="row">
		<?php echo $form->dropDownList($model,'genre',array('Hombre'=>'Hombre',
															'Mujer'=>'Mujer',), 
		                                                       array('prompt'=>'Sexo','options' => array(''=>array('selected'=>true))), 
		                                                       array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'genre'); ?>
		 <div class="infobox">
                Sexo
          </div>
	</div>

<div class="row">
	<?php $this->widget('ext.countrySelectorWidget', array(
		'value' => $model->country,
		'name' => Chtml::activeName($model, 'country'),
		'id' => Chtml::activeId($model, 'country'),
		'useCountryCode' => false,
		'defaultValue' => 'Mexico',
		'firstEmpty' => true,
		'firstText' => 'Pais',
		)); ?>

	    <?php echo $form->error($model,'country'); ?>
	     <div class="infobox">
                Pais
          </div>
	</div>
  
	<div class="row">
	<!-- Nacionalidad es renderizado de Curriculum.php-->
		<?php echo $form->textField($curriculum,'native_country',array('size'=>45,'maxlength'=>45, 'placeholder'=>"Nacionalidad")); ?>
		<?php echo $form->error($curriculum,'native_country'); ?>
		 <div class="infobox">
                Nacionalidad
          </div>
	</div>

	<div class="row">
		<?php echo $form->dropDownList($model,'state_of_birth',array(       'Aguascalientes'=>'Aguascalientes',
																			'Baja_California'=>'Baja California', 
																			'Baja_California_Sur'=>'Baja California Sur',
			                                                         		'Campeche'=>'Campeche', 
			                                                         		'Chiapas'=>'Chiapas',
			                                                         		'Chihuahua'=>'Chihuahua',
			                                                         		'Coahuila'=>'Coahuila',
			                                                         		'Distrito_Federal'=>'Distrito Federal',
			                                                         		'Estado_de_Mexico'=>'Estado de México',
			                                                         		'Guanajuato'=>'Guanajuato',
			                                                         		'Guerrero'=>'Guerrero',
			                                                         		'Hidalgo'=>'Hidalgo',
			                                                         		'Jalisco'=>'Jalisco',
			                                                         		'Michoacan'=>'Michoacán',
			                                                         		'Morelos'=>'Morelos',
			                                                         		'Nayarit'=>'Nayarit',
			                                                         		'Nuevo_Leon'=>'Nuevo León',
			                                                         		'Oaxaca'=>'Oaxaca',
			                                                         		'Puebla'=>'Puebla',
			                                                         		'Queretaro'=>'Querétaro',
			                                                         		'Quintana_Roo'=>'Quintana Roo',
			                                                         		'San_Luis_Potosi'=>'San Luis Potosí',
			                                                         		'Sinaloa'=>'Sinaloa',
			                                                         		'Sonora'=>'Sonora',
			                                                         		'Tabasco'=>'Tabasco',
			                                                         		'Tamaulipas'=>'Tamaulipas',
			                                                         		'Tlaxcala'=>'Tlaxcala',
			                                                         		'Veracruz'=>'Veracruz',
			                                                         		'Yucatan'=>'Yucatán',
			                                                         		'Zacatecas'=>'Zacatecas',), 
		                                                       array('prompt'=>'Estado','options' => array(''=>array('selected'=>true))), 
		                                                       array('size'=>10,'maxlength'=>10)); ?>
	    <?php echo $form->error($model,'state_of_birth'); ?>
	     <div class="infobox">
                Estado</p>
          </div>
	</div>

	<div class="row">
		
		<?php echo $form->textField($model,'curp_passport',array('size'=>20,'maxlength'=>20, 'placeholder'=>"Curp")); ?>
		<?php echo $form->error($model,'curp_passport'); ?>
		 <div class="infobox">
                CURP</p>
          </div>
	</div>

	<div class="row">
		
		<?php echo $form->textField($model,'curp_passport',array('size'=>20,'maxlength'=>20, 'placeholder'=>"Pasaporte")); ?>
		<?php echo $form->error($model,'curp_passport'); ?>
		 <div class="infobox">
                Pasaporte</p>
          </div>
	</div>

	<div class="row">
<<<<<<< HEAD
		
		<?php echo $form->fileField($model,'photo_url',array('size'=>60,'maxlength'=>100, 'placeholder'=>"Foto")); ?>
		<?php echo $form->error($model,'photo_url'); ?>
		<?php 

		echo "<img src='".Yii::app()->baseUrl.'/users/'.Yii::app()->user->id.'/cve-hc/perfil.png'."' alt='Foto de Perfil' width='100' height='100'>";

		?>
		    
=======
	
		<?php echo $form->fileField($model,'photo_url',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'photo_url'); ?>  
		 <div class="infobox">
                Foto de Peril</p>
          </div>   
>>>>>>> 7e84071268cec08828db97b17e9ad6a3522e43c2
	</div>

	<div class="row">

		<?php echo $form->textField($model,'person_rfc',array('size'=>13,'maxlength'=>13, 'placeholder'=>"RFC")); ?>

		<?php echo $form->error($model,'person_rfc'); ?>
<<<<<<< HEAD

=======
		 <div class="infobox">
                RFC
          </div>
>>>>>>> 7e84071268cec08828db97b17e9ad6a3522e43c2
	</div>

	<div class="row buttons">
		<input class="savebutton" type="submit" onclick="validationFrom()" value="Guardar">
		<input class="cleanbutton" type="button" onclick="cleanUp()" value="Borrar">
		<?php echo CHtml::link('Cancelar',array('/site/index')); ?>
	</div>



<?php $this->endWidget(); ?>

</div><!-- form -->