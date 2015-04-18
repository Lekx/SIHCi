<?php
/* @var $this ResearchAreasController */
/* @var $model ResearchAreas */
/* @var $form CActiveForm */
?>
<style type="text/css">  
        .research{
            display: none;
        }
    </style>

<script>
$(document).ready(function(){
		$("#showForm").on( "click", function() {
			$('.research').show(); 
			$('#hideForm').show();
		 });
		$("#hideForm").on( "click", function() {
			$('.research').hide(); 
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


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'research-areas-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>


	<?php echo $form->errorSummary($model); ?>
		<?php //print_r($getResearch) ;
	$countDocs = 1;
	foreach ($getResearch as $key => $value) {
	
		echo "Linea de Investigacion ".$countDocs." ";
	//	echo $form->labelEx($getResearch[$key],'name');
		echo $form->textField($getResearch[$key],'name',array('size'=>60,'maxlength'=>150, 'placeholder'=>'Nombre de investigación')); 
		echo $form->error($getResearch[$key],'name'); 

		echo "<br>";
		echo "------------------------------------------------------------";
		echo "<br>";
		
		$countDocs ++;
	}
	?>

	<input type="button" id="showForm" value="Agregar Línea de Investigacion">
	<input class="research" type="button" id="hideForm" value="Ocultar">

<div class="research">

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>150, 'placeholder'=>'Nombre de investigación')); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
	

	<div class="row buttons">
		<input type="submit" onclick="validationFrom()" value="Guardar">
		<input type="button" onclick="cleanUp()" value="Limpiar">
		<?php echo CHtml::link('Cancelar',array('/site/index')); ?>
	</div>
	
<?php $this->endWidget(); ?>

</div><!-- form -->