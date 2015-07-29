<?php
/* @var $this PersonsController */
/* @var $model Persons */
/* @var $form CActiveForm */

?>

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


	<div class="row">
		<section title=".slideThree">
	    <!-- .slideThree -->
	    <div class="slideThree">
			<?php echo $form->checkbox($curriculum,'status',array('size'=>30,'maxlength'=>30, 'placeholder'=>"Nombres", 'id'=>'slideThree')); ?>
	 		<label for="slideOne"></label>
	    </div>
	    <!-- end .slideThree -->
	  </section>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'names',array('size'=>30,'maxlength'=>30, 'placeholder'=>'Nombres', 'title'=>'Nombres')); ?>
          <?php echo $form->error($model,'names'); ?>
	</div>

	<div class="row">

		<?php echo $form->textField($model,'last_name1',array('size'=>20,'maxlength'=>20, 'placeholder'=>"Apellido Paterno", 'title'=>'Apellido Paterno')); ?>
          	<?php echo $form->error($model,'last_name1'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'last_name2',array('size'=>20,'maxlength'=>20, 'placeholder'=>'Apellido Materno' , 'title'=>'Apellido Materno')); ?>

          	<?php echo $form->error($model,'last_name2'); ?>
	</div>

	<div class="row">


    <span class="plain-select">
		<?php echo $form->dropDownList($model,'marital_status',array('soltero'=>'Soltero','viudo'=>'Viudo', 'casado'=>'Casado',
			                                                          'divorciado'=>'Divorciado', 'union libre'=>'Unión Libre'),
		                                                       array('prompt'=> 'Seleccionar Estado Civil','title'=>'Estado Civil','options' => array(''=>array('selected'=>true))),
		                                                       array('size'=>10,'maxlength'=>10)); ?>


          	 </span>
          	 <?php echo $form->error($model,'marital_status'); ?>
	</div>

	<div class="row">
    <span class="plain-select">
		<?php

			
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
		    'language'=> 'es',
		    'attribute' => 'birth_date',
		    'model' => $model,
		   	//'flat'=>true,
		     'options' => array(
			     		'changeMonth'=>true, //cambiar por Mes
			     		'changeYear'=>true, //cambiar por Año
			    		'maxDate' => 'now-5475',
				      'yearRange'=>'1930:now',


		     	),
		    'htmlOptions' => array(
		    			'readonly'=>true,
		    			'title'=>'Fecha de Nacimiento',
		        		'placeholder'=>"Fecha de Nacimiento"),
				));
	?>
	 </span>
          <?php echo $form->error($model,'birth_date'); ?>
	</div>



		<div class="row">
		    <span class="plain-select">
		<?php echo $form->dropDownList($model,'genre',array('Hombre'=>'Hombre',
															'Mujer'=>'Mujer',),
		                                                       array('title'=>'Sexo','prompt'=>' Seleccionar Sexo','options' => array(''=>array('selected'=>true))),
		                                                       array('size'=>10,'maxlength'=>10)); ?>

		</span>
          <?php echo $form->error($model,'genre'); ?>
	</div>

<div class="row">
    <span class="plain-select">
	<?php $this->widget('ext.CountrySelectorWidget', array(

		'value' => $model->country,
		'name' => Chtml::activeName($model, 'country'),
		'id' => Chtml::activeId($model, 'country'),
		'useCountryCode' => false,
		'defaultValue' => 'Mexico',
		'firstEmpty' => true,
		'firstText' => 'Seleccionar Pais',

		)); ?>

          <?php echo $form->error($model,'country'); ?>
          </span>
	</div>

	<div class="row">
	<!-- Nacionalidad es renderizado de Curriculum.php-->
		<?php echo $form->textField($curriculum,'native_country',array('size'=>45,'maxlength'=>45, 'placeholder'=>"Nacionalidad",'title'=>'Nacionalidad')); ?>

          <?php echo $form->error($curriculum,'native_country'); ?>
	</div>

	<div class="row1">
	 <span class="plain-select">
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
		                                                       array('title'=>'Estado','prompt'=>'Seleccionar Estado','options' => array(''=>array('selected'=>true))),
		                                                       array('size'=>10,'maxlength'=>10)); ?>


            <?php echo $form->error($model,'state_of_birth'); ?>
            </span>
	</div>

	<div class="row">

		<?php echo $form->textField($model,'curp_passport',array('size'=>18,'maxlength'=>18, 'title'=>'CURP o Pasaporte','placeholder'=>"Curp")); ?>


          <?php echo $form->error($model,'curp_passport'); ?>
	</div>

	<div class="row">

		  <?php echo $form->fileField($model,'photo_url',array('size'=>60,'maxlength'=>100, 'value'=>'foto.png', 'placeholder'=>"Foto", "title"=>"Foto de Perfil")); ?>

		<?php echo $form->error($model,'photo_url'); ?>
		<?php


		?>
	</div>

	<div class="row">


		<?php echo $form->textField($model,'person_rfc',array('title'=>'RFC','size'=>13,'maxlength'=>13, 'placeholder'=>"RFC")); ?>
		<?php echo $form->error($model,'person_rfc'); ?>


	</div>

	<div class="row buttons">
		 <?php echo CHtml::htmlButton('Guardar',array(
                'onclick'=>'send("personal-data-form", "curriculumVitae/personalData", "'.$model->id.'","curriculumVitae/personalData","");',
                 //'id'=> 'post-submit-btn',
                'class'=>'savebutton',
            ));
   		 ?>
		 <?php echo CHtml::link('Cancelar',array('curriculumVitae/personalData'),array('confirm'=>'Si cancela todo los datos escritos se borraran. ¿Está seguro de que desea cancelar?')); ?>
	</div>



<?php $this->endWidget(); ?>

</div><!-- form -->
