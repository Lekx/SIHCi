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
	
	<div class="row question">
	<p>Trabajo libre o publicación(es) Autor(es) título, revista, año, volumen, páginas</p>
        <?php echo $form->textArea($model,'term1',array('placeholder'=>'Respuesta..')); ?>
		<?php echo $form->error($model,'term1'); ?>
	</div>

	<div class="row question">
	<p>Problema por el cual se realizó el estudio de investigación</p>
		<?php echo $form->textArea($model,'term2',array('placeholder'=>'Respuesta..')); ?>
		<?php echo $form->error($model,'term2'); ?>
	</div>

	<div class="row question">
	<p>Conocimiento científico útil generado en la investigación con potencial de aplicación para la innovación en  salud</p>
		<?php echo $form->textArea($model,'term3',array('placeholder'=>'Respuesta..')); ?>
		<?php echo $form->error($model,'term3'); ?>
	</div>

	<div class="row question">
	<p>Estrategias para la transferencia y aplicación del conocimiento científico para la innovación de programas de salud, programas educativos, registros de propiedad intelectual y la elaboración de políticas públicas en salud</p>
		<?php echo $form->textArea($model,'term4',array('placeholder'=>'Respuesta..')); ?>
		<?php echo $form->error($model,'term4'); ?>
	</div>

	<div class="row question">
	<p>Impacto en salud, social y económico de la transferencia y aplicación del conocimiento científico BENEFICIOS, para los pacientes, los profesionales de la salud y las instituciones entre otros</p>
		<?php echo $form->textArea($model,'term5',array('placeholder'=>'Respuesta..')); ?>
		<?php echo $form->error($model,'term5'); ?>
	</div>

	<div class="row question buttons">
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
		                    
                        ),array('class'=>'savebutton')); 
        ?>
        <?php echo CHtml::Button('Cancelar',array('submit' => array('knowledgeApplication/admin'),'confirm'=>'Si cancela todo los datos escritos se borraran. ¿Está seguro de que desea cancelar?')); ?>
	</div>
				  
<?php $this->endWidget(); ?>

</div><!-- form -->


