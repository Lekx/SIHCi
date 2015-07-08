<?php
/* @var $this PatentController */
/* @var $model Patent */
/* @var $form CActiveForm */
?>
>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'patent-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableClientValidation'=>true,
	'enableAjaxValidation'=>true,
	'htmlOptions'=>array('enctype' => 'multipart/form-data'),
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>


	<?php // echo $form->errorSummary($model); ?>


	<div class="row">
	 <span class="plain-select">
		<?php $this->widget('ext.CountrySelectorWidget',
			array(
				'value' => $model->country,
				'name' => Chtml::activeName($model, 'country'),
				'id' => Chtml::activeId($model, 'country'),
				'useCountryCode' => false,
				'firstEmpty' => true,
				'firstText' => 'País',
		)); ?>
		</span>
		<?php echo $form->error($model,'country'); ?>
	</div>

	<div class="row">
	 <span class="plain-select">
		<?php echo $form->dropDownList($model,'participation_type',
			  	  array(
					  		'Inventor'=>'Inventor',
					  	'Co-inventor'=>'Co-inventor'
				  ),
				  array('prompt'=>'Seleccionar participación', 'title'=>'Pariticipacíon')
			 );
	    ?>
		<?php echo $form->error($model,'participation_type'); ?>
		</span>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'name',array('size'=>150,'maxlength'=>150,'placeholder'=>'Nombre de la patente','title'=>'Nombre de la patente (maximo  150 caracteres)')); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
	 <span class="plain-select">
		<?php echo $form->dropDownList($model,'state',
				array(
						'En explotación comercial'=>'En explotación comercial',
						'En trámite'=>'En trámite',
						'Registrada'=>'Registrada'
					 ),
				array('prompt'=>'Seleccionar estado de la patente','title'=>'Estado de Patente')
			);
		?>
		</span>
		<?php echo $form->error($model,'state'); ?>
	</div>

	<div class="row">
	<span class="radiotext">Tipo de Aplicación</span>
		<?php
                $status = array('No.Solicitud'=>'No.Solicitud', 'No.Registro'=>'No.Registro');
                echo $form->radioButtonList($model,'application_type',$status,array('separator'=>' ','labelOptions'=>array('style'=>'display:inline')));
        ?>
		<?php echo $form->error($model,'application_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'application_number',array('placeholder'=>'Número de registro o Número de solicitud', 'class'=>'numericOnly','title'=>'Numero de registro o de solicitud')); ?>
		<?php echo $form->error($model,'application_number'); ?>
	</div>

	<div class="row">
	<span class="plain-select">
		<?php echo $form->dropDownList($model,'patent_type',
			   array(
						'Diseño industrial'=>'Diseño industrial',
						'Modelo de utilidad'=>'Modelo de utilidad',
						'Patente'=>'Patente'
					),
			   	array('prompt'=>'Seleccionar tipo de patente','title'=>'Tipo de Patente')
				);
		?>
		</span>
		<?php echo $form->error($model,'patent_type'); ?>
	</div>

	<div class="row">
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
			        	'readonly'=>true,
			        	'placeholder'=>"Fecha de concesión",
			        	'title'=>'Fecha de concesión',
			    ),
			));
		?>
		<?php echo $form->error($model,'consession_date'); ?>
	</div>

	<div class="row">
        <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			    'model' => $model,
			    'language'=> 'es',
			    'attribute' => 'presentation_date',
			    'htmlOptions' => array(
			    	    'dateFormat'=>'d/m/Y',
			    		'size' => '10',
			   			'readonly'=>true,
			        	'maxlength' => '10',

			        	'placeholder'=>"Fecha de presentación",
			        	'title'=>'Fecha de presentación',
			    ),
			));
		?>
		<?php echo $form->error($model,'presentation_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'record',array('size'=>60,'maxlength'=>150,'placeholder'=>'Expediente', 'title'=>'Expediente (maximo  150 caracteres)')); ?>
		<?php echo $form->error($model,'record'); ?>
	</div>


	<div class="row">
		<?php echo $form->textField($model,'international_clasification',array('size'=>100,'maxlength'=>100, 'placeholder'=>'Clasificación internacional','title'=>'Clasificación internacional (maximo  100 caracteres)')); ?>
		<?php echo $form->error($model,'international_clasification'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>150,'placeholder'=>'Titular de la patente','title'=>'Titular de la patente (maximo  150 caracteres)')); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'owner',array('size'=>60,'maxlength'=>70,'placeholder'=>'Propietario','title'=>'Propietario (maximo  70 caracteres)' )); ?>
		<?php echo $form->error($model,'owner'); ?>
	</div>

	<div class="row">
		<?php echo $form->textArea($model,'resumen',array('rows'=>6, 'cols'=>50,'maxlength'=>250,'placeholder'=>'Resumen','title'=>'Resumen (maximo  250 caracteres)')); ?>
		<?php echo $form->error($model,'resumen'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'industrial_exploitation',array('placeholder'=>'Explatación industrial','title'=>'Explatación industrial','class'=>'numericOnly')); ?>
		<?php echo $form->error($model,'industrial_exploitation'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'resource_operator',array('size'=>60,'maxlength'=>150,'placeholder'=>'Quién lo explota', 'title'=>'Quién lo explota (maximo  70 caracteres)' )); ?>
		<?php echo $form->error($model,'resource_operator'); ?>
	</div>

	<div class="row buttons">
	 <?php echo CHtml::ajaxButton ($model->isNewRecord ? 'Guardar' : 'Modificar',CController::createUrl('patent/'.($model->isNewRecord ? 'create' : 'update/'.$model->id)),
	        				array(
								'dataType'=>'json',
	                     		'type'=>'post',
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

	                        ),array('class'=>'savebutton'));
	        ?>
	        <?php echo CHtml::link('Cancelar',array('patent/admin'),array('confirm'=>'Si cancela todo los datos escritos se borraran. ¿Está seguro de que desea cancelar?')); ?>


       	</div>
<?php $this->endWidget(); ?>

</div><!-- form -->
