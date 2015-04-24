<?php
/* @var $this PostdegreeGraduatesController */
/* @var $model PostdegreeGraduates */
/* @var $form CActiveForm */
?>

<div class="form">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'postdegree-graduates-form',
		'enableAjaxValidation'=>true,
	)); ?>

	<p class="note">Los campos marcados con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->textField($model,'fullname',array('size'=>60,'maxlength'=>70,'placeholder'=>"Nombre completo del graduado"));?>
		<?php echo $form->error($model,'fullname'); ?>
	</div>
	
	<div class="row buttons">
	 <?php echo CHtml::ajaxSubmitButton ($model->isNewRecord ? 'Guardar' : 'Modificar',CController::createUrl('postdegreeGraduates/'.($model->isNewRecord ? 'create' : 'update/'.$model->id)), 
        				array(
							'dataType'=>'json',
                     		'type'=>'post',
                     		'success'=>'function(data) 
                     		 {
		                                      
		                         if(data.status=="success")
		                         {
				                     alert("Registro realizado con éxito");
				                     $("#postdegree-graduates-form")[0].reset();
		                         }		                         
		                         else
		                         {
			                     	alert("Complete los campos con *");   
			                     }       
		                  	}',                    
		                    
                        )); 
        ?>
		<?php echo CHtml::resetButton($model->isNewRecord ? 'Borrar' : 'Borrar'); ?>
       	<?php echo CHtml::link('Cancelar',array('/postdegreeGraduates/admin')); ?>
	</div>
	
<?php $this->endWidget(); ?>
  

</div><!-- form -->
	