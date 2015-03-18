<?php
/* @var $this PersonsController */
/* @var $model Persons */
/* @var $form CActiveForm */
?>

<div class="form">
	<?php 
	Yii::app()->bootstrap->register(); 
	Yii::app()->clientScript->registerCssFile(
	Yii::app()->clientScript->getCoreScriptUrl().
	'/jui/css/base/jquery-ui.css'
);
Yii::app()->getClientScript()->registerCoreScript( 'jquery' );
Yii::app()->getClientScript()->registerCoreScript( 'jquery.ui' );
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'persons-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>
	
	<?php echo $form->errorSummary($model); ?>
	
	<div class="row">
		
		<?php echo $form->textField($model,'names',array('size'=>30,'maxlength'=>30, 'placeholder'=>"Nombres")); ?>
		<?php echo $form->error($model,'names'); ?>
	</div>

	<div class="row">
	
		<?php echo $form->textField($model,'last_name1',array('size'=>20,'maxlength'=>20, 'placeholder'=>"Apellido Paterno")); ?>
		<?php echo $form->error($model,'last_name1'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'last_name2',array('size'=>20,'maxlength'=>20, 'placeholder'=>"Apellido Materno")); ?>
		<?php echo $form->error($model,'last_name2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'marital_status'); ?>
		<?php echo $form->dropDownList($model,'marital_status',array('soltero'=>'Soltero','viudo'=>'Viudo', 'casado'=>'Casado',
			                                                          'divorciado'=>'Divorciado', 'union libre'=>'Unión Libre'), 
		                                                       array('options' => array('soltero'=>array('selected'=>true))), 
		                                                       array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'marital_status'); ?>
	</div>

	<div class="row">
    <?php
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
		    'language'=> 'es',
		    'attribute' => 'birth_date',
		    'name' => 'birth_date',
		    'value' =>$model->birth_date,
		    'model' => $model,
		    'flat'=>true,
		    'options' => array(
			    		'showAnim' => 'drop', 
			    		'showButtonPanel' => true,
			    		'dateFormat' => 'yy-m-d',
			    		'changeMonth'=>true, //cambiar por Mes
			    		'changeYear'=>true, //cambiar por Año
			    		'yearRange'=>'1920:2099', //minimo año
			    		'minDate' => '1920-01-01', //minima fecha
			   			'maxDate' => 'now-5475',
		    	),
		    'htmlOptions' => array(
		    			'style'=>'', 
		        		'placeholder'=>"Fecha de Nacimiento"),
				));
	?>
	<?php echo $form->error($model,'birth_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'genre'); ?>
		<?php echo $form->dropDownList($model,'genre',array('Hombre'=>'Hombre','Mujer'=>'Mujer'), 
		                                              array('options' => array('1'=>array('selected'=>true))), 
		                                              array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'genre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'country'); ?>
		<?php
		$this->widget(
            'yiiwheels.widgets.formhelpers.WhCountries',
            array(
                'name' => 'country',
                'value' => 'US',
                'useHelperSelectBox' => true,
                'pluginOptions' => array(
                    'country' => 'US',
                    'language' => 'es_ES',
                    'flags' => true
                ),
                'htmlOptions' => array(
						   'data-available' => 'DE,MX'
						),
            )
        );
        ?>
		<?php echo $form->error($model,'country'); ?>
	</div>
  
	<div class="row">
	<!-- Nacionalidad es renderizado de Curriculum.php-->
		<?php echo $form->textField($curriculum,'native_country',array('size'=>45,'maxlength'=>45, 'placeholder'=>"Nacionalidad")); ?>
		<?php echo $form->error($curriculum,'native_country'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'state_of_birth',array('size'=>45,'maxlength'=>45, 'placeholder'=>"Estado")); ?>
		<?php echo $form->error($model,'state_of_birth'); ?>
	</div>

	<div class="row">
		
		<?php echo $form->textField($model,'curp_passport',array('size'=>20,'maxlength'=>20, 'placeholder'=>"Curp o Pasaporte")); ?>
		<?php echo $form->error($model,'curp_passport'); ?>
	</div>

	<div class="row">

		<?php echo $form->fileField($model,'photo_url',array('size'=>60,'maxlength'=>100, 'placeholder'=>"Foto")); ?>
		<?php echo $form->error($model,'photo_url'); ?>     
	</div>

	<div class="row">

		<?php echo $form->textField($model,'person_rfc',array('size'=>13,'maxlength'=>13, 'placeholder'=>"RFC")); ?>
		<?php echo $form->error($model,'person_rfc'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar' : 'Guardar'); ?>
		<?php echo CHtml::resetButton($model->isNewRecord ? 'Borrar' : 'Borrar'); ?>
	</div>


<?php $this->endWidget(); ?>

</div><!-- form -->