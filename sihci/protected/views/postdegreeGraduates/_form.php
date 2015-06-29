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

	<div class="row">
		<?php echo $form->textField($model,'fullname',array('size'=>60,'maxlength'=>70,'placeholder'=>"Nombre completo del graduado", 'title'=>'Nombre del graduado (maximo 60 caracteres)'));?>
		<?php echo $form->error($model,'fullname'); ?>
	</div>
	
	<div class="row buttons">
	 <?php echo CHtml::ajaxButton ($model->isNewRecord ? 'Guardar' : 'Modificar',CController::createUrl('postdegreeGraduates/'.($model->isNewRecord ? 'create' : 'update/'.$model->id)), 
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
       <?php echo CHtml::link('Cancelar',array('postdegreeGraduates/admin'),array('confirm'=>'Si cancela todo los datos escritos se borraran. ¿Está seguro de que desea cancelar?')); ?>
	</div>
	
<?php $this->endWidget(); ?>
  

</div><!-- form -->
	