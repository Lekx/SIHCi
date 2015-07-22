<?php
/* @var $this CopyrightsController */
/* @var $model Copyrights */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'copyrights-form',
	'enableAjaxValidation'=>true,
	
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
)); ?>

	<div class="row">
	 <span class="plain-select">		
			<?php echo $form->dropDownList($model,'participation_type',
				array(
						'Autor'=>'Autor',
						'Co-autor'=>'Co-autor'
					),
					array('prompt'=>'Seleccionar participación', 'title'=>'Seleccionar participación')
				); 
		?>
		</span>
		<?php echo $form->error($model,'participation_type'); ?>
	</div>

	<div class="row">		
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>150,'placeholder'=>'Título','title'=>'Título')); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php
			$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			    'model' => $model,
			    'language'=> 'es',
			    'attribute' => 'application_date',
			    'htmlOptions' => array(
			    	    'dateFormat'=>'d/m/Y',
			    		'size' => '10',         
			    		'readOnly'=>true,
			        	'maxlength' => '10', 
			        	'placeholder'=>"Fecha de solicitud",
			        	'title'=>'Fecha de solicitud',
			    ),
			));
		?>
		<?php echo $form->error($model,'application_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'step_number',array('placeholder'=>'Número de tramite','title'=>'Número de tramite')); ?>
		<?php echo $form->error($model,'step_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->textArea($model,'resume',array('rows'=>6, 'cols'=>50,'maxlength'=>150,'placeholder'=>'Resumen', 'title'=>'Resumen')); ?>
		<?php echo $form->error($model,'resume'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'beneficiary',array('size'=>60,'maxlength'=>150,'placeholder'=>'Beneficiario','title'=>'Beneficiario')); ?>
		<?php echo $form->error($model,'beneficiary'); ?>
	</div>

	<div class="row">
	 <span class="plain-select">	
		<?php echo $form->dropDownList($model,'entity',
				array(
						'Pública'=>'Pública',
						'Privada'=>'Privada',
						'Sector social'=>'Sector social'
					),
					array('prompt'=>'Seleccionar entidad', 'title'=>'Entidad')
				); 
		?>
		</span>
		<?php echo $form->error($model,'entity'); ?>
	</div>

	<div class="row">
		<?php echo $form->textArea($model,'impact_value',array('rows'=>6, 'cols'=>50,'maxlength'=>150,'placeholder'=>' Generación de valor e impacto para el beneficiario', 'title'=>' Generación de valor e impacto para el beneficiario')); ?>
		<?php echo $form->error($model,'impact_value'); ?>
	</div>

	<div class="row buttons">
	    <?php echo CHtml::htmlButton($model->isNewRecord ? 'Guardar': 'Modificar',array(
                'onclick'=>'send("copyrights-form","copyrights/'.($model->isNewRecord ? 'create' : 'update').'", "'.(isset($_GET['id']) ? $_GET['id'] : 0).'","copyrights/admin","");',
                'class'=>'savebutton',
            ));
    	?>              
        <?php echo CHtml::link('Cancelar',array('copyrights/admin'),array('confirm'=>'Si cancela todo los datos escritos se borraran. ¿Está seguro de que desea cancelar?')); ?>

			
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
