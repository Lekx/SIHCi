<?php
/* @var $this KnowledgeApplicationController */
/* @var $model KnowledgeApplication */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'knowledge-application-form',
	'enableAjaxValidation'=>true,
	'enableClientValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true)	
	//'enableClientValidation'=>true,
	//'clientOptions'=>array('validateOnSubmit'=>true,
	//	)
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
)); ?>
	
	<?php echo $form->errorSummary($model); ?>
	
	<div class="row">
        <?php echo $form->labelEx($model,'Pregunta 1 <br> Trabajo libre o publicación(es) Autor(es) título, revista, año, volumen, páginas'); ?>
        <?php echo $form->textArea($model,'term1',array('cols'=>65,'maxlength' => 500, 'style'=>'width: 720px; height: 70px;')); ?>
		<?php echo $form->error($model,'term1'); ?>
	</div>

	<div class="row">
        <?php echo $form->labelEx($model,'Pregunta 2 <br> Problema por el cual se realizó el estudio de investigación'); ?>
		<?php echo $form->textArea($model,'term2',array('cols'=>65,'maxlength' => 500,'style'=>'width: 720px; height: 70px;')); ?>
		<?php echo $form->error($model,'term2'); ?>
	</div>

	<div class="row">
        <?php echo $form->labelEx($model,'Pregunta 3 <br> Conocimiento científico útil generado en la investigación con potencial de aplicación para la innovación en  salud'); ?>
		<?php echo $form->textArea($model,'term3',array('cols'=>65,'maxlength' => 500,'style'=>'width: 720px; height: 70px;')); ?>
		<?php echo $form->error($model,'term3'); ?>
	</div>

	<div class="row">
        <?php echo $form->labelEx($model,'Pregunta 4 <br> Estrategias para la transferencia y aplicación del conocimiento científico para la innovación de programas de salud, programas educativos, registros de propiedad intelectual y la elaboración de políticas públicas en salud'); ?>
		<?php echo $form->textArea($model,'term4',array('cols'=>65,'maxlength' => 500,'style'=>'width: 720px; height: 70px;')); ?>
		<?php echo $form->error($model,'term4'); ?>
	</div>

	<div class="row">
        <?php echo $form->labelEx($model,'Pregunta 5 <br> Impacto en salud, social y económico de la transferencia y aplicación del conocimiento científico BENEFICIOS, para los pacientes, los profesionales de la salud y las instituciones entre otros'); ?>
		<?php echo $form->textArea($model,'term5',array('cols'=>65,'maxlength' => 500,'style'=>'width: 720px; height: 70px;')); ?>
		<?php echo $form->error($model,'term5'); ?>
	</div>

	<div class="row buttons">
	 <?php echo CHtml::ajaxButton ($model->isNewRecord ? 'Guardar' : 'Modificar',CController::createUrl('knowledgeApplication/'.($model->isNewRecord ? 'create' : 'update/'.$model->id)), 
        				array(
							'dataType'=>'json',
                     		'type'=>'post',
                     		'success'=>'function(data) 
                     		 {
		                                      
		                         if(data.status=="success")
		                         {
				                     alert("Registro realizado con éxito");
				                     $("#knowledge-application-form")[0].reset();
   				                     window.location.href ="'.Yii::app()->createUrl('knowledgeApplication/admin').'";		                         

		                         }		                         
		                         else
		                         {
			                     	alert("Complete los campos con *");   
			                     }       
		                  	}',                    
		                    
                        )); 
        ?>
        <?php  if($model->isNewRecord) 
			 echo '<input class="cleanbutton" type="button" onclick="cleanUp()"" value="Borrar">';
		?>
       	<?php echo CHtml::link('Cancelar', array('/knowledgeApplication/admin'),array('confirm' => 'Si cancela todo los datos escritos se borraran. ¿Está seguro de que desea cancelar?')); ?>
	</div>
				  
<?php $this->endWidget(); ?>

</div><!-- form -->


