<?php
/* @var $this KnowledgeApplicationController */
/* @var $model KnowledgeApplication */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'knowledge-application-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->textArea($model,'term1',array('rows'=>6, 'cols'=>50,
			'placeholder'=>'Pregunta 1 Trabajo libre o publicación(es) Autor(es) título, revista, año, volumen, páginas')); ?>
		<?php echo $form->error($model,'term1'); ?>
	</div>

	<div class="row">
		<?php echo $form->textArea($model,'term2',array('rows'=>6, 'cols'=>50,
			'placeholder'=>' Pregunta 2 Problema por el cual se realizó el estudio de investigación ')); ?>
		<?php echo $form->error($model,'term2'); ?>
	</div>

	<div class="row">
		<?php echo $form->textArea($model,'term3',array('rows'=>6, 'cols'=>50,
			'placeholder'=>'Pregunta 3 Conocimiento científico	ÚTIL generado en la investigación con potencial de aplicación para la innovación en  salud')); ?>
		<?php echo $form->error($model,'term3'); ?>
	</div>

	<div class="row">
		<?php echo $form->textArea($model,'term4',array('rows'=>6, 'cols'=>50,
			'placeholder'=>' Pregunta 4 Estrategias para la transferencia y aplicación del conocimiento científico para la innovación de programas de salud, programas educativos, registros de propiedad intelectual y la elaboración de políticas públicas en salud')); ?>
		<?php echo $form->error($model,'term4'); ?>
	</div>

	<div class="row">
		<?php echo $form->textArea($model,'term5',array('rows'=>6, 'cols'=>50,
			'placeholder'=>'Pregunta 5 Impacto en salud, social y económico de la transferencia y aplicación del conocimiento científico BENEFICIOS, para los pacientes, los profesionales de la salud y las instituciones entre otros'));
		?>
		<?php echo $form->error($model,'term5'); ?>
	</div>

	<div class="row buttons">

        <input type="submit" onclick='validationFrom()' value="Guardar"> 	
        <input type='button' onclick='cleanUp()' value="Limpiar"> 
        <input type='button' onclick="location.href='http://localhost/SIHCi/sihci/index.php/knowledgeApplication/admin'" value="Cancelar"> 
		    	
      	<script>
			
			function cleanUp()
			{
			    var text;
			    var result = confirm("¿Está usted seguro de limpiar estos datos?");
			    if (result == true) 
			    	 $('[id^=KnowledgeApplication_]').val('');
			     
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


