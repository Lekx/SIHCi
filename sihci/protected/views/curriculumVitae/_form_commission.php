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
<script>
		function cleanUp(){
			var text;
			var result = confirm("¿Está usted seguro de limpiar estos datos?");
			if (result==true) {
				$('[id^=Curriculum_]').val('');
			}else{

			}
			document.getElementById("demo").innerHTML = text;
		}
		function validationFrom(){
			alert("Registro Realizado con éxito");
			return false;
		}
</script>

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
		<?php echo $form->labelEx($model,'SNI'); ?>
		<?php echo $form->textField($model,'SNI',array('size'=>60,'maxlength'=>250, 'placeholder'=>'SNI')); ?>
		<?php echo $form->error($model,'SNI'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'researcher_title'); ?>
			<?php echo $form->textField($model,'researcher_title',array('size'=>60,'maxlength'=>100, 'placeholder'=>"Nombramiento")); ?>
		<?php echo $form->error($model,'researcher_title'); ?>  
	</div>

</div>

	<div class="row buttons">
		<input type="submit" onclick="validationFrom()" value="Guardar">
		<input type="button" onclick="cleanUp()" value="Limpiar">
		<?php echo CHtml::link('Cancelar',array('/site/index')); ?>
	</div>
	
<?php $this->endWidget(); ?>

</div><!-- form -->