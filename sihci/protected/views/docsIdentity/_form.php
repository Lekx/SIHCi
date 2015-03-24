<?php
/* @var $this DocsIdentityController */
/* @var $model DocsIdentity */
/* @var $form CActiveForm */
 $this->widget('ext.widgets.reCopy.ReCopyWidget', array(
     'targetClass'=>'docs',
     'addButtonLabel'=>'Agregar nuevo',
     'limit'=>4,
  )); 
?>
<script>
		function cleanUp(){
			var text;
			var result = confirm("¿Está usted seguro de limpiar estos datos?");
			if (result==true) {
				$('[id^=DocsIdentity_]').val('');
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
	'id'=>'docs-identity-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>


	<?php echo $form->errorSummary($model); ?>

<div class="docs">
	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->dropDownList($model,'type',array(''=>'','acta'=>'Acta de Nacimiento','pasaporte'=>'Pasaporte',
															'curp'=>'CURP', 'ife' => 'IFE'), 
		                                              array('options' => array(''=>array('selected'=>true))), 
		                                              array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>250, 'placeholder'=>'descripción')); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'doc_id'); ?>
			<?php echo $form->fileField($model,'doc_id',array('size'=>60,'maxlength'=>100, 'placeholder'=>"documento oficial a subir")); ?>
		<?php echo $form->error($model,'doc_id'); ?>  
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_Primary'); ?>
		<?php echo $form->checkBox($model,'is_Primary'); ?>
		<?php echo $form->error($model,'is_Primary'); ?>
	</div>
</div>

	<div class="row buttons">
		<input type="submit" onclick="validationFrom()" value="Guardar">
		<input type="button" onclick="cleanUp()" value="Limpiar">
	</div>
	
<?php $this->endWidget(); ?>

</div><!-- form -->