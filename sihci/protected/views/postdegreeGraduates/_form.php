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
        <input type='button' onclick='cleanUp()' value="Limpiar"> 
      	
      	<script>
			
			function cleanUp()
			{
			    var text;
			    var result = confirm("¿Está usted seguro de limpiar estos datos?");
			    if (result == true) 
			    	 $('[id^=PostdegreeGraduates_]').val('');
			     
			    document.getElementById("demo").innerHTML = text;
			}
	
			function validationFrom()
			{
				alert("Registro realizado con éxito");
				return false;
			}	

		</script>	
    </div>
	
<?php $this->endWidget(); ?>
  

</div><!-- form -->
	