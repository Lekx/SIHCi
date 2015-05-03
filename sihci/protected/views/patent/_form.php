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
	'enableClientValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true)
)); ?>

	<p class="note">Los campos <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	
	<div class="row">
		<?php echo $form->labelEx($model,'country'); ?>
		<?php
			$this->widget('ext.CountrySelectorWidget', 
				array(
				    'value' => $model->country,
				    'name' => Chtml::activeName($model, 'country'),
				    'id' => Chtml::activeId($model, 'country'),
				    'useCountryCode' => false,
				    'defaultValue' => 'Mexico',
				    'firstEmpty' => false,
			    )
			);
		?>
		<?php echo $form->error($model,'country'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'participation_type'); ?>
		<?php echo $form->dropDownList($model,'participation_type',
			  	  array(
					  		'Inventor'=>'Inventor',
					  		'Coinventor'=>'Coinventor'	  	
				  ),				  
				  array('prompt'=>'Tipo de participación')			  
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
						'En explotación comercial'=>'En explotación comercial',
						'En trámite'=>'En trámite',
						'Registrada'=>'Registrada'
					 ),
				array('prompt'=>'Estado de la patente')
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
						'Diseño industrial'=>'Diseño industrial',
						'Modelo de utilidad'=>'Modelo de utilidad',
						'Patente'=>'Patente'
					),
			   	array('prompt'=>'Tipo de patente')
				); 
		?>
		<?php echo $form->error($model,'patent_type'); ?>
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
			   			 'readOnly'=>true,
			        	'maxlength' => '10', 
			        	
			        	'placeholder'=>"Fecha de presentación",
			    ),
			));
		?>
		<?php echo $form->error($model,'presentation_date'); ?>
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
			    		'readOnly'=>true,
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
		<?php echo CHtml::ajaxSubmitButton ('Guardar',CController::createUrl('patent/'.($model->isNewRecord ? 'create' : 'update/'.$model->id)), 
	        				array(
								'dataType'=>'json',
	                     		'type'=>'post',
	                     		'success'=>'function(data) 
	                     		 {
			                                      
			                         if(data.status=="success")
			                         {
					                     alert("Registro realizado con éxito");
					                     $("#patent-form")[0].reset();
	   									 window.location.href ="'.Yii::app()->createUrl('patent/admin').'";
			                         }		                         
			                         else
			                         {
				                     	alert("Complete los campos con *");   
				                     }       
			                  	}',                    
			                    
	                        )); 
	        ?>
			<?php 
				if($model->isNewRecord)
				   echo '<input class="cleanbutton" type="button" onclick="cleanUp()"" value="Borrar">';
			?>
           	<?php echo CHtml::link('Cancelar', array('/patent/admin'),array('confirm' => 'Si cancela todo los datos escritos se borraran. ¿Está seguro de que desea cancelar?')); ?>


       	</div>
<?php $this->endWidget(); ?>

</div><!-- form -->