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
		<?php echo $form->textField($model,'fullname',array('size'=>60,'maxlength'=>70,'placeholder'=>"Nombre completo del graduado"));?>
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
				                    
									 alert("Registro realizado con éxito.");
				                     $("#postdegree-graduates-form")[0].reset();
				                     window.location.href ="'.Yii::app()->createUrl('postdegreeGraduates/admin').'";
				                     $(".successdiv").show();		                         

	
		                         }		                         
		                         else
		                         {
			                     	 $(".errordiv").show(); 
			                     }       
		                  	}',                    
		                    
                        ),array('class'=>'savebutton')); 
        ?>
       	<?php echo CHtml::Button('Cancelar',array('submit' => array('postdegreeGraduates/admin'),'confirm'=>'Si cancela todo los datos escritos se borraran. ¿Está seguro de que desea cancelar?')); ?>
	</div>
	
<?php $this->endWidget(); ?>
  

</div><!-- form -->
	