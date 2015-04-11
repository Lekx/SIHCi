<?php
/* @var $this CopyrightsController */
/* @var $model Copyrights */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'copyrights-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'participation_type'); ?>
			<?php echo $form->dropDownList($model,'participation_type',
				array(
						''=>'',
						'Autor'=>'Autor',
						'Coautor'=>'Coautor'
					)
				); 
		?>
		<?php echo $form->error($model,'participation_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'application_date'); ?>
		<?php
			$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			    'model' => $model,
			    'language'=> 'es',
			    'attribute' => 'application_date',
			    'htmlOptions' => array(
			    	    'dateFormat'=>'d/m/Y',
			    		'size' => '10',         
			        	'maxlength' => '10', 
			        	'placeholder'=>"Fecha de solicitud",
			    ),
			));
		?>
		<?php echo $form->error($model,'application_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'step_number'); ?>
		<?php echo $form->textField($model,'step_number'); ?>
		<?php echo $form->error($model,'step_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'resume'); ?>
		<?php echo $form->textArea($model,'resume',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'resume'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'beneficiary'); ?>
		<?php echo $form->textField($model,'beneficiary',array('size'=>60,'maxlength'=>70)); ?>
		<?php echo $form->error($model,'beneficiary'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'entity'); ?>
		<?php echo $form->dropDownList($model,'entity',
				array(
						''=>'',
						'Publica'=>'Publica',
						'Privada'=>'Privada',
						'Sector social'=>'Sector social'
					)
				); 
		?>
		<?php echo $form->error($model,'entity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'impact_value'); ?>
		<?php echo $form->textArea($model,'impact_value',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'impact_value'); ?>
	</div>

	<div class="row buttons">
		
		<?php echo CHtml::ajaxButton ("Guardar", CController::createUrl('copyrights/create'),array(
						'type'=>'POST',
                        'data'=> 'js:$("#copyrights-form").serialize()+ "&ajax=copyrights-form"',                        
                        'success'=>'js:function(response)
                         { 
                        	if(response == "404")
                        	{
                        		$("#400").html("error");
                        	} 
                        	else if(response = "200") 
                        	{
                        		alert("Registro realizado con éxito");                     		                           		
                        	}
                         }'
                )); 
        ?>
		<?php echo CHtml::resetButton($model->isNewRecord ? 'Borrar' : 'Borrar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->