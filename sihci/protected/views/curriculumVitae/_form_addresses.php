<?php
/* @var $this AddressesController */
/* @var $model Addresses */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'addresses-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>


	<div class="row">
	 <span class="plain-select">
	<?php $this->widget('ext.CountrySelectorWidget', array(

		'value' => $model->country,
		'name' => Chtml::activeName($model, 'country'),
		'id' => Chtml::activeId($model, 'country'),
		'useCountryCode' => false,
		'defaultValue' => 'Mexico',
		'firstEmpty' => true,
		'firstText' => 'Pais',

		)); ?>

          <?php echo $form->error($model,'country'); ?>
          </span>
	</div>

	<div class="row">
	
		<?php echo $form->textField($model,'zip_code',array('title'=>'Codigo Postal','placeholder'=>'Código Postal')); ?>
		<?php echo $form->error($model,'zip_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'state',array('title'=>'Estado','size'=>20,'maxlength'=>20, 'placeholder'=>'Estado')); ?>
		<?php echo $form->error($model,'state'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'delegation',array('title'=>'Delegación','size'=>30,'maxlength'=>30, 'placeholder'=>'Delegación')); ?>
		<?php echo $form->error($model,'delegation'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'city',array('title'=>'Ciudad','size'=>50,'maxlength'=>50, 'placeholder'=>'Ciudad')); ?>
		<?php echo $form->error($model,'city'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'town',array('title'=>'Municipio','size'=>30,'maxlength'=>30, 'placeholder'=>'Municipio')); ?>
		<?php echo $form->error($model,'town'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'colony',array('title'=>'Colonia','size'=>45,'maxlength'=>45, 'placeholder'=>'Colonia')); ?>
		<?php echo $form->error($model,'colony'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'street',array('title'=>'Calle','size'=>50,'maxlength'=>50, 'placeholder'=>'Calle')); ?>
		<?php echo $form->error($model,'street'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'external_number',array( 'title'=>'Numero Externo','size'=>8,'maxlength'=>8, 'placeholder'=>'Número Externo')); ?>
		<?php echo $form->error($model,'external_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'internal_number',array( 'title'=>'Número Interior','size'=>8,'maxlength'=>8, 'placeholder'=>'Número Interior')); ?>
		<?php echo $form->error($model,'internal_number'); ?>
	</div>

	<div class="row buttons">
			<?php echo CHtml::ajaxButton ('Guardar',CController::createUrl('curriculumVitae/addresses'), 
				array(
					'dataType'=>'json',
             		'type'=>'post',
             		'class'=>'savebutton',
             		'success'=>'function(data) 
             		 {
                                      
                         if(data.status=="200")
                         {
		                     $(".successdiv").show();
		                    
                         }		                         
                         else
                         {
	                     	  $(".errordiv").show(); 
	                     }       
                  	}',                    
                ), array('class'=>'savebutton'));  
		?>
		
		<?php echo CHtml::Button('Cancelar',array('submit' => array('curriculumVitae/index'),'confirm'=>'¿Seguro que desea Cancelar?','id'=>'cancelar')); ?>
		</div>

<?php $this->endWidget(); ?>

</div><!-- form -->