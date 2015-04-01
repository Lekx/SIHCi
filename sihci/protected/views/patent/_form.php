<?php
/* @var $this PatentController */
/* @var $model Patent */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'patent-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Los campos <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	
	<div class="row">
		<?php echo $form->labelEx($model,'country'); ?>
		<?php
	        $this->widget(
	            'yiiwheels.widgets.formhelpers.WhCountries',
	               array(
		                'name' => 'Patent[country]',
		                'attribute'=>'country',
		                'value' => 'MX',
		                'useHelperSelectBox' => true,
		                'pluginOptions' => array(
		                    'country' => '',
		                    'language' => 'es_ES',
		                    'flags' => true
	                )
	            )
	        );
	    ?>	
		<?php echo $form->error($model,'country'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'participation_type'); ?>
		<?php echo $form->dropDownList($model,'participation_type',
			  array(
				  		''=>'',
				  		'Inventor'=>'Inventor',
				  		'Coinventor'=>'Coinventor'
				  	)
			  );
	    ?>			
		<?php echo $form->error($model,'participation_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>150,'placeholder'=>'Nombre')); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'state'); ?>
		<?php echo $form->dropDownList($model,'state',
				array(
						''=>'',
						'En explotación comercial'=>'En explotación comercial',
						'En trámite'=>'En trámite',
						'Registrada'=>'Registrada'
					 )
				 ); 
		?>
		<?php echo $form->error($model,'state'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'application_type'); ?>
		<?php 
                $status = array('No.Solicitud'=>'No.Solicitud', 'No.Registro'=>'No.Registro');
                echo $form->radioButtonList($model,'application_type',$status,array('separator'=>' '));
        ?>
		<?php echo $form->error($model,'application_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'application_number'); ?>
		<?php echo $form->textField($model,'application_number',array('placeholder'=>'Número de registro o Número de solicitud')); ?>
		<?php echo $form->error($model,'application_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'patent_type'); ?>
		<?php echo $form->dropDownList($model,'patent_type',
			   array(
						''=>'',
						'Diseño industrial'=>'Diseño industrial',
						'Modelo de utilidad'=>'Modelo de utilidad',
						'Patente'=>'Patente'
					)
				); 
		?>
		<?php echo $form->error($model,'patent_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'consession_date'); ?>
		<?php
			$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			    'model' => $model,
			    'language'=> 'es',
			    'attribute' => 'consession_date',
			    'htmlOptions' => array(
			    	    'dateFormat'=>'d/m/Y',
			    		'size' => '10',         
			        	'maxlength' => '10', 
			        	'placeholder'=>"Fecha de concesión",
			    ),
			));
		?>
		<?php echo $form->error($model,'consession_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'record'); ?>
		<?php echo $form->textField($model,'record',array('size'=>60,'maxlength'=>250,'placeholder'=>'Expediente')); ?>
		<?php echo $form->error($model,'record'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'presentation_date'); ?>
			<?php
			$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			    'model' => $model,
			    'language'=> 'es',
			    'attribute' => 'presentation_date',
			    'htmlOptions' => array(
			    	    'dateFormat'=>'d/m/Y',
			    		'size' => '10',         
			        	'maxlength' => '10', 
			        	'placeholder'=>"Fecha de presentación",
			    ),
			));
		?>
		<?php echo $form->error($model,'presentation_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'international_clasification'); ?>
		<?php echo $form->textField($model,'international_clasification',array('size'=>60,'maxlength'=>100, 'placeholder'=>'Clasificación internacional')); ?>
		<?php echo $form->error($model,'international_clasification'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>150,'placeholder'=>'Titulo')); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'owner'); ?>
		<?php echo $form->textField($model,'owner',array('size'=>60,'maxlength'=>70,'placeholder'=>'Propietario')); ?>
		<?php echo $form->error($model,'owner'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'resumen'); ?>
		<?php echo $form->textArea($model,'resumen',array('rows'=>6, 'cols'=>50,'placeholder'=>'Resumen')); ?>
		<?php echo $form->error($model,'resumen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'industrial_exploitation'); ?>
		<?php echo $form->textField($model,'industrial_exploitation',array('placeholder'=>'Explatación industrial')); ?>
		<?php echo $form->error($model,'industrial_exploitation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'resource_operator'); ?>
		<?php echo $form->textField($model,'resource_operator',array('size'=>60,'maxlength'=>70,'placeholder'=>'Quién lo explota')); ?>
		<?php echo $form->error($model,'resource_operator'); ?>
	</div>

	<div class="row buttons">
        <input type="submit" onclick='validationFrom()' value="Guardar"> 	
        <input type='reset' onclick='alert("Está usted seguro de limpiar estos datos")' value="Borrar"> 

		<script>

			function validationFrom()
			{
				alert("Registro realizado con éxito");
				return false;
			}	
			
		</script>        
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->