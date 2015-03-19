<?php
/* @var $this CongressesController */
/* @var $model Congresses */
/* @var $form CActiveForm */
?>
<!--PC01-Registrar datos  Participacion en congresos-->
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'congresses-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Los campos marcados con <span class="required">*</span> son necesarios.</p>

	<?php echo $form->errorSummary($model); ?>


	<div class="row">
		<?php echo $form->textField($model,'work_title',array('size'=>60,'maxlength'=>200, 'placeholder'=>'Puesto')); ?>
		<?php echo $form->error($model,'work_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'year', array('placeholder'=>'Año')); ?>
		<?php echo $form->error($model,'year'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'congress',array('size'=>60,'maxlength'=>200, 'placeholder'=>'Congreso')); ?>
		<?php echo $form->error($model,'congress'); ?>
	</div>

	<div class="row">
         <?php 
                $status = array('Nacional' => 'Nacional','Internacional'=>'Internacional'); 
                echo $form-> RadioButtonList($model,'type' ,$status, array ('separador' => ''));?>
         <?php echo $form->error($model,'type');?>
	 
	</div>

	<div class="row">
		 <?php
	        $this->widget(
	            'yiiwheels.widgets.formhelpers.WhCountries',
	            array(
	                'name' => 'Congresses[country]',
	                'id' => 'Congresses_country',
	                'value' => '',
	                'useHelperSelectBox' => true,
	                'pluginOptions' => array(
	                    'country' => '',
	                    'language' => 'es_ES',
	                    'flags' => true
	                )
	            )
	        );
	        ?>
	</div>

	<div class="row">
        <?php echo $form->dropDownList($model,'work_type',array('','Conferencia Magistral','Articulo in Extenso','Ponencia','Poster'));
     ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'keywords',array('size'=>60,'maxlength'=>250,'placeholder'=>'Palabras Clave')); ?>
		<?php echo $form->error($model,'keywords'); ?>
	</div>

	<div class="row button">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar' : 'Guardar'); ?>
		 <?php echo CHtml::resetButton($model->isNewRecord ? 'Borrar' : 'Borrar'); ?>
		<?php echo CHtml::resetButton($model->isNewRecord ? 'Cancelar' : 'Cancelar'); ?>
		
	</div>
	
<?php $this->endWidget(); ?>
</div><!-- form -->