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

<style type="text/css">  
        .docs{
            display: none;
        }
    </style>

<script>
$(document).ready(function(){
		$("#showForm").on( "click", function() {
			$('.docs').show(); 
			$('#hideForm').show();
			$('#showForm').hide();
		 });
		$("#hideForm").on( "click", function() {
			$('.docs').hide(); 
			$('#showForm').show();
		});
	});
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
	'id'=>'docs-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); 

?>


	<?php echo $form->errorSummary($model); ?>

	<input type="button" id="showForm" value="Agregar Documento"><br>
	<input class="docs" type="button" id="hideForm" value="Ocultar"><br>
<div class="docs">
	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->dropDownList($model,'type',array('acta'=>'Acta de Nacimiento','pasaporte'=>'Pasaporte',
															'curp'=>'CURP', 'ife' => 'IFE'), 
		                                              array('id'=>'typeDoc','prompt'=>'Tipo de Documento','options' => array(''=>array('selected'=>true))), 
		                                              array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('id'=>'descriptionDoc','size'=>60,'maxlength'=>250, 'placeholder'=>'descripción')); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'doc_id'); ?>
			<?php echo $form->fileField($model,'doc_id',array('id'=>'pathDoc','size'=>60,'maxlength'=>100, 'placeholder'=>"documento oficial a subir")); ?>
		<?php echo $form->error($model,'doc_id'); ?>  
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_Primary'); ?>
		<?php echo $form->checkBox($model,'is_Primary',array('id'=>'isPrimary')); ?>
		<?php echo $form->error($model,'is_Primary'); ?>
	</div>

	
</div>
		<?php //print_r($getDocs) ;
	$countDocs = 1;
	foreach ($getDocs as $key => $value) {
	echo	'<div class="row">';
		echo $form->labelEx($model,'type'); 
		echo $form->dropDownList($model,'type',array(

										'acta'=>'Acta de Nacimiento',
										'pasaporte'=>'Pasaporte',
										'curp'=>'CURP', 
										'ife' => 'IFE'
										), 
		                                              array('prompt'=>'Tipo de Documento','options' => array($getDocs[$key]->type=>array('selected'=>true))), 
		                                              array('size'=>10,'maxlength'=>10)); 
	    echo $form->error($model,'type');
	echo	'</div>';

	echo	'<div class="row">';
		 echo $form->labelEx($model,'description'); 
		 echo $form->textField($model,'description',array('value'=>$getDocs[$key]->description,'size'=>60,'maxlength'=>250, 'placeholder'=>'descripción')); 
		 echo $form->error($model,'description'); 
	echo	'</div>';
	echo	'<div class="row">';
		 echo $form->labelEx($model,'doc_id'); 
		// echo $form->fileField($model,'doc_id',array('value'=>$getDocs[$key]->doc_id,'size'=>60,'maxlength'=>250, 'placeholder'=>'descripción')); 
		// echo $form->error($model,'doc_id'); 
		// echo $form->fileField($model, 'doc_id[]')->fileInput(['multiple' => true]);
		// echo CHtml::activeFileField($model, $getDocs[$key]->doc_id); 
		 echo "<a href='/SIHCi/sihci".$getDocs[$key]->doc_id."'>  Archivo ".$getDocs[$key]->type."</a>";
	echo	'</div>';
		

	echo	'<div class="row">';
		 echo $form->labelEx($model,'is_Primary'); 
		 echo $form->checkBox($model,'is_Primary',array('value'=>$getDocs[$key]->is_Primary,'size'=>60,'maxlength'=>250, 'placeholder'=>'descripción')); 
		 echo $form->error($model,'is_Primary'); 
	echo	'</div>';

		echo "<br>";
		echo "------------------------------------------------------------";
		echo "<br>";
	
		$countDocs ++;
	}
	?>

	<div class="row buttons">
		<input type="submit" onclick="validationFrom()" value="Guardar">
		<input type="button" onclick="cleanUp()" value="Limpiar">
		<?php echo CHtml::link('Cancelar',array('/site/index')); ?>
	</div>
	
	
<?php $this->endWidget(); ?>

</div><!-- form -->