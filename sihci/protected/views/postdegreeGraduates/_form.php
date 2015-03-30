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
		<input type="submit" onclick='validationFrom()' value="Guardar"> 	
        <input type='reset' onclick='alert("Está usted seguro de limpiar estos datos")' value="Borrar"> 
      	
      	<script>
			function validationFrom()
			{
				alert("Registro realizado con éxito");
				return false;
			}	

		</script>	
    </div>
	
<?php $this->endWidget(); ?>
  

</div><!-- form -->
	