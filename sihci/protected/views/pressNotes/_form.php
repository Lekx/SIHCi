<?php
/* @var $this PressNotesController */
/* @var $model PressNotes */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'press-notes-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
	'enableClientValidation'=>true,
	'htmlOptions' => array('enctype'=>'multipart/form-data'),
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	<!-- <p class="note">Fields with <span class="required">*</span> are required.</p> -->

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->dropDownList($model,'type',
			array(
				'Demostraciones'=>'Demostraciones',
				'Ferias Cientificas y Tecnologi'=>'Ferias Cientificas y Tecnologi',
				'Ferias Empresariales'=>'Ferias Empresariales',
				'Medios Impresos'=>'Medios Impresos',
				'Radio'=>'Radio',
				'Revistas de Divulgacion'=>'Revistas de Divulgacion',
				'Seminarios'=>'Simposius',
				'Talleres'=>'Talleres',
				'Teatro'=>'Teatro',
				'Televisión'=>'Televisión',
				'Vidos'=>'Vidos'
			),
			array('prompt'=>'Tipo de participación'));
		?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->dropDownList($model,'directed_to',
		    array(
				'Empresarios'=>'Empresarios',
				'Estudiantes'=>'Estudiantes',
				'Funcionarios'=>'Funcionarios',
				'Público en general'=>'Público en general',
				'Sector Académico'=>'Sector Académico',
				'Sector Privado'=>'Sector Privado',
				'Sector Público'=>'Sector Público',
				'Sector Social'=>'Sector Social'
			),
		    array('prompt'=>'Dirigido a'));
		?>
		<?php echo $form->error($model,'directed_to'); ?>
	</div>

	<div class="row">
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
		    'model' => $model,
		    'language'=> 'es',
		    'attribute' => 'date',
		    'htmlOptions' => array(
		    	    'dateFormat'=>'d/m/Y',
		    		'size' => '10',         
		    		'readOnly'=>true,
		        	'maxlength' => '10', 
		        	'placeholder'=>"Fecha de la publicación",
		    ),
		));
		?>
		<?php echo $form->error($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'title',array('size'=>45,'maxlength'=>150,'placeholder'=>'Título de la publicacion')); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'responsible_agency',array('size'=>45,'maxlength'=>150,'placeholder'=>'Dependencia responsable')); ?>
		<?php echo $form->error($model,'responsible_agency'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'note',array('size'=>45,'maxlength'=>150,'placeholder'=>'Nota periodistica')); ?>
		<?php echo $form->error($model,'note'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_national'); ?>
		<?php $status = array('Nacional' => 'Nacional','Extranjero'=>'Extranjero'); 
		    echo $form-> RadioButtonList($model,'is_national' ,$status, array('separador' => '')); 
		 ?>
		<?php echo $form->error($model,'is_national'); ?>
	</div>
	
	<div class="row buttons">
	 <?php echo CHtml::ajaxButton ($model->isNewRecord ? 'Guardar' : 'Modificar',CController::createUrl('pressNotes/'.($model->isNewRecord ? 'create' : 'update/'.$model->id)), 
        				array(
        					'dataType'=>'json',
                     		'type'=>'post',
                     		'success'=>'function(data) 
                     		 {
		                       
		                        if(data.status=="success")
		                        {
		                           	alert("Registro realizado con éxito");
				                    $("#press-notes-form")[0].reset();
									window.location.href ="'.Yii::app()->createUrl('pressNotes/admin').'";		                         
								}		                         
		                        else
		                        {
			                    	alert("Complete los campos con *");   
			                    }       
		                  	}',                            
                        )); 
        ?>
		<?php  if($model->isNewRecord) 
			    	echo '<input class="cleanbutton" type="button" onclick="cleanUp()"" value="Borrar">'; ?>	
       	<?php echo CHtml::link('Cancelar', array('/pressNotes/admin'),array('confirm' => 'Si cancela todo los datos escritos se borraran. ¿Está seguro de que desea cancelar?')); ?>
	
	</div>	

	
<?php $this->endWidget(); ?>

</div><!-- form -->