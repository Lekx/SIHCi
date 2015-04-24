<?php
/* @var $this CopyrightsController */
/* @var $model Copyrights */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'copyrights-form',
	'enableAjaxValidation'=>true,
	'enableClientValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true)
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'participation_type'); ?>
			<?php echo $form->dropDownList($model,'participation_type',
				array(
						'Autor'=>'Autor',
						'Coautor'=>'Coautor'
					),
					array('prompt'=>'Tipo de participación')
				); 
		?>
		<?php echo $form->error($model,'participation_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>150,'placeholder'=>'Título')); ?>
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
		<?php echo $form->textField($model,'step_number',array('placeholder'=>'Número de tramite')); ?>
		<?php echo $form->error($model,'step_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'resume'); ?>
		<?php echo $form->textArea($model,'resume',array('rows'=>6, 'cols'=>50,'placeholder'=>'Resumen')); ?>
		<?php echo $form->error($model,'resume'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'beneficiary'); ?>
		<?php echo $form->textField($model,'beneficiary',array('size'=>60,'maxlength'=>70,'placeholder'=>'Beneficiario')); ?>
		<?php echo $form->error($model,'beneficiary'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'entity'); ?>
		<?php echo $form->dropDownList($model,'entity',
				array(
						'Pública'=>'Pública',
						'Privada'=>'Privada',
						'Sector social'=>'Sector social'
					),
					array('prompt'=>'Entidad')
				); 
		?>
		<?php echo $form->error($model,'entity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'impact_value'); ?>
		<?php echo $form->textArea($model,'impact_value',array('rows'=>6, 'cols'=>50,'placeholder'=>'Valor de impacto')); ?>
		<?php echo $form->error($model,'impact_value'); ?>
	</div>

	<div class="row buttons">
	    <?php echo CHtml::ajaxSubmitButton ('Guardar',CController::createUrl('copyrights/'.($model->isNewRecord ? 'create' : 'update/'.$model->id)), 
        				array(
							'dataType'=>'json',
                     		'type'=>'post',
                     		'success'=>'function(data) 
                     		 {
		                                      
		                         if(data.status=="success")
		                         {
				                     alert("Registro realizado con éxito");
				                     $("#copyrights-form")[0].reset();
				                     window.location.href ="'.Yii::app()->createUrl('copyrights/admin').'";
		                         }		                         
		                         else
		                         {
			                     	alert("Complete los campos con *");   
			                     }       
		                  	}',                    
		                    
                        )); 
        ?>
		<?php echo CHtml::resetButton($model->isNewRecord ? 'Borrar' : 'Borrar'); ?>
       	<?php echo CHtml::link('Cancelar',array('/copyrights/admin')); ?>

		<div class="200">
		
		</div>
		
		<div class="404">
		</div>
		
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

