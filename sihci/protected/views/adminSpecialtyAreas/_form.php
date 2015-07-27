<?php
/* @var $this AdminSpecialtyAreasController */
/* @var $model AdminSpecialtyAreas */
/* @var $form CActiveForm */
?>
<script type="text/javascript">
$(document).ready(function() {
    $(".numericOnly").keydown(function (e) {
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
            (e.keyCode == 65 && e.ctrlKey === true) ||
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                return;
        }
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }

    });
});

function lettersOnly(e)
{
 	key = e.keyCode || e.which;
 	tecla = String.fromCharCode(key).toLowerCase();
 	letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
	especiales = [8,9,37,39,46,45,47];


	 tecla_especial = false
 		for(var i in especiales)
 		{
     		if(key == especiales[i])
     		{
  				tecla_especial = true;
  				break;
            } 
 		}
 
        if(letras.indexOf(tecla)==-1 && !tecla_especial)
     		return false;
}
</script>

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
		<?php echo $form->textField($model,'specialty',array('size'=>60,'maxlength'=>200,'onKeyPress'=>'return lettersOnly(event)', 'placeholder'=>'Especialidad','title'=>'Especialidad')); ?>
		<?php echo $form->error($model,'specialty'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'subspecialty',array('size'=>60,'maxlength'=>200,'onKeyPress'=>'return lettersOnly(event)', 'placeholder'=>'Subespecialidad','title'=>'Subespecialidad')); ?>
		<?php echo $form->error($model,'subspecialty'); ?>
	</div>

	<?php $this->widget('ext.widgets.reCopy.ReCopyWidget', array(
 						'targetClass'=>'subspecialtyRegistry',
 						'addButtonLabel'=>'Agregar nueva subespecialidad',
		 ));
    ?>

    <div class="subspecialtyRegistry ">
	   <?php  echo "<input type='hidden' name='idsAdminSpecialtyAreas[]'>"; ?>

		   <div class="row">
			  <?php echo $form->textField($modelSpecialtyAreas ,'ext_subspecialty',array('name'=>'ext_subspecialtys[]','size'=>30,'maxlength'=>200, 'onKeyPress'=>'return lettersOnly(event)','placeholder'=>'Subespecialidad','title'=>'Subespecialidad')); ?>
			  <?php echo $form->error($modelSpecialtyAreas ,'ext_subspecialty');?>
		   </div>
   	</div>

   	<?php
	if(!$model->isNewRecord)
		  foreach ($modelSpecialtyArea  as $key => $value)
		  { ?>
				  <?php echo "<input type='hidden' value='".$value->id."' name='idsAdminSpecialtyAreas[]'>"; ?>
				  <div class="row">
					  <?php echo $form->textField($value,'ext_subspecialty',array('name'=>'ext_subspecialtys[]','value'=>$value->ext_subspecialty,'size'=>30,'maxlength'=>200,'onKeyPress'=>'return lettersOnly(event)' ,'placeholder'=>'Subespecialidad','title'=>'Subespecialidad')); ?>
					  <?php echo $form->error($value,'ext_subspecialty');?>
				  </div>

	<?php } ?>

	<div class="row buttons">
       <?php echo CHtml::htmlButton($model->isNewRecord ? 'Guardar': 'Modificar',array(
                'onclick'=>'send("admin-specialty-areas-form","adminSpecialtyAreas/'.($model->isNewRecord ? 'create' : 'update').'", "'.(isset($_GET['id']) ? $_GET['id'] : 0).'","adminSpecialtyAreas/admin","");',
                'class'=>'savebutton',
            ));
    	 ?>

       	<?php echo CHtml::link('Cancelar', array('/adminSpecialtyAreas/admin'),array('confirm' => 'Si cancela todo los datos escritos se borraran. ¿Está seguro de que desea cancelar?')); ?>
	</div>


<?php $this->endWidget(); ?>

</div><!-- form -->
