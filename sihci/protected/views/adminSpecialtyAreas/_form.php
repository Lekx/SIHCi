<?php
/* @var $this AdminSpecialtyAreasController */
/* @var $model AdminSpecialtyAreas */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'admin-specialty-areas-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>


	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->textField($model,'specialty',array('size'=>60,'maxlength'=>200, 'placeholder'=>'Especialidad','title'=>'Especialidad')); ?>
		<?php echo $form->error($model,'specialty'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'subspecialty',array('size'=>60,'maxlength'=>200, 'placeholder'=>'Subespecialida','title'=>'Subespecialida')); ?>
		<?php echo $form->error($model,'subspecialty'); ?>
	</div>

	<?php $this->widget('ext.widgets.reCopy.ReCopyWidget', array(
 			'targetClass'=>'subspecialtyRegistry',
 			'addButtonLabel'=>'Agregar nueva subespecialida',
		 ));
    ?>
    <div class="subspecialtyRegistry ">
	   <?php  echo "<input type='hidden' name='idsAdminSpecialtyAreas[]'>"; ?>

		   <div class="row">
			  <?php echo $form->textField($modelSpecialtyAreas ,'ext_subspecialty',array('name'=>'ext_subspecialtys[]','size'=>30,'maxlength'=>30, 'placeholder'=>'Subespecialida','title'=>'Subespecialida')); ?>
			  <?php echo $form->error($modelSpecialtyAreas ,'ext_subspecialty');?>
		   </div>
   	</div>

   	<?php
	if(!$model->isNewRecord)
		  foreach ($modelSpecialtyArea  as $key => $value)
		  { ?>
				  <?php echo "<input type='hidden' value='".$value->id."' name='idsAdminSpecialtyAreas[]'>"; ?>

				  <div class="row">
					  <?php echo $form->textField($value,'ext_subspecialty',array('name'=>'ext_subspecialty[]','value'=>$value->ext_subspecialty,'size'=>30,'maxlength'=>30, 'placeholder'=>'Subespecialidad','title'=>'Subespecialidad')); ?>
					  <?php echo $form->error($value,'ext_subspecialty');?>
				  </div>

	<?php } ?>

	<div class="row buttons">
        <?php echo CHtml::ajaxButton ($model->isNewRecord ? 'Guardar' : 'Modificar',CController::createUrl('adminSpecialtyAreas/'.($model->isNewRecord ? 'create' : 'update/'.$model->id)),
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


       	<?php echo CHtml::link('Cancelar', array('/adminSpecialtyAreas/admin'),array('confirm' => 'Si cancela todo los datos escritos se borraran. ¿Está seguro de que desea cancelar?')); ?>
	</div>


<?php $this->endWidget(); ?>

</div><!-- form -->
