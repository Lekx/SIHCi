<?php
/* @var $this DocsIdentityController */
/* @var $model DocsIdentity */
/* @var $form CActiveForm */
 // $this->widget('ext.widgets.reCopy.ReCopyWidget', array(
 //     'targetClass'=>'docs',
 //     'addButtonLabel'=>'Agregar nuevo',
 //     'limit'=>4,
 //  )); 
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'commission-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>


	<?php echo $form->errorSummary($model); ?>

<div class="docs">
	
	<div class="row">
		<?php echo $form->textField($model,'SNI',array('title'=>'SNI','size'=>60,'maxlength'=>250, 'placeholder'=>'SNI')); ?>
		<?php echo $form->error($model,'SNI'); ?>
	</div>

	<div class="row">
			<?php echo $form->textField($model,'researcher_title',array('title'=>'Nombramiento','size'=>60,'maxlength'=>100, 'placeholder'=>"Nombramiento")); ?>
		<?php echo $form->error($model,'researcher_title'); ?>  
	</div>

</div>

	<div class="row buttons">
		<?php echo CHtml::ajaxButton ('Guardar',CController::createUrl('curriculumVitae/commission'), 
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
                  	}'),array('class'=>'savebutton'));   
		?>
		<input class="cleanbutton" type="button" onclick="cleanUp()" value="Borrar">
		<?php echo CHtml::Button('Cancelar',array('submit' => array('curriculumVitae/index'),'confirm'=>'¿Seguro que desea Cancelar?')); ?>
	</div>
	
<?php $this->endWidget(); ?>

</div><!-- form -->