<?php
/* @var $this CopyrightsController */
/* @var $model Copyrights */
/* @var $form CActiveForm */
?>
<script type="text/javascript">
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
});
</script>

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

	<div class="row">
	 <span class="plain-select">		
			<?php echo $form->dropDownList($model,'participation_type',
				array(
						'Autor'=>'Autor',
						'Coautor'=>'Coautor'
					),
					array('prompt'=>'Seleccionar participación', 'title'=>'Seleccionar participación')
				); 
		?>
		</span>
		<?php echo $form->error($model,'participation_type'); ?>
	</div>

	<div class="row">		
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>150,'placeholder'=>'Título de la obra','title'=>'Título de la obra (maximo 150 caracteres)')); ?>
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
		<?php echo $form->textField($model,'step_number',array('placeholder'=>'Número de tramite','title'=>'Número de tramite','class'=>'numericOnly')); ?>
		<?php echo $form->error($model,'step_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->textArea($model,'resume',array('rows'=>6, 'cols'=>50,'maxlength'=>1500,'placeholder'=>'Resumen', 'title'=>'Resumen (maximo 1500 caracteres)')); ?>
		<?php echo $form->error($model,'resume'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'beneficiary',array('size'=>60,'maxlength'=>70,'placeholder'=>'Beneficiario','title'=>'Beneficiario (maximo 70 caracteres)')); ?>
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
		<?php echo $form->textArea($model,'impact_value',array('rows'=>6, 'cols'=>50,'maxlength'=>1500,'placeholder'=>'Valor de impacto', 'title'=>'Valor de impacto (maximo 1500 caracteres)')); ?>
		<?php echo $form->error($model,'impact_value'); ?>
	</div>

	<div class="row buttons">
	    <?php echo CHtml::ajaxButton ($model->isNewRecord ? 'Guardar' : 'Modificar',CController::createUrl('copyrights/'.($model->isNewRecord ? 'create' : 'update/'.$model->id)), 
        				array(
							'dataType'=>'json',
                     		'type'=>'post',
                     		'success'=>'function(data) 
                     		 {
		                                      
		                         if(data.status=="success")
		                         {
									$(".successdiv").show();

		                         }		                         
		                         else
		                         {
			                     	$(".errordiv").show();   
			                     }       
		                  	}',                    
		                    
                        ),array('class'=>'savebutton')); 
        ?>
        
        <?php echo CHtml::Button('Cancelar',array('submit' => array('copyrights/admin'),'confirm'=>'Si cancela todo los datos escritos se borraran. ¿Está seguro de que desea cancelar?')); ?>

		<div class="200">
		
		</div>
		
		<div class="404">
		</div>
		
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

