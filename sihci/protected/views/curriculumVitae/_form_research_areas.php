<?php
/* @var $this ResearchAreasController */
/* @var $model ResearchAreas */
/* @var $form CActiveForm */
?>
<style type="text/css">  
         .errors{
            -webkit-boxshadow: 0 0 10px rgba(0, 0, 0, 0.3);
            -moz-box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            -o-box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            background: red;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            color: #fff;
            display: none;
            font-size: 10px;
            margin-top: -50px;
            margin-left: 315px;
            padding: 10px;
            position: absolute;
        }
        .research{
            display: none;
        }
    </style>
	
<script>
   $(document).ready(function(){
            $("#btnCreate").click(function(){
                
                var research = $("#research").val(); 
             
                if(research == ""){
                    $("#errorResearch").fadeIn("slow");
                    return false;
                }else{
                    $("#errorResearch").fadeOut();
                 }
 
            });//click
            $("#showForm").on( "click", function() {
				$('.research').show(); 
				$('#hideForm').show();
			 });
			$("#hideForm").on( "click", function() {
				$('.research').hide(); 
			});
        });//ready
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
<input type="button" id="showForm" value="Agregar Línea de Investigación">
<input class="research"  type="button" id="hideForm" value="Cancelar">

<div class="research">
	<div class='row'>
		Nombre de Investigación
		<input id="research" type="text" name="nameResearch" title="Nombre de Investigación" placeholder="Nombre de Investigación">
		<div id="errorResearch" class="errors"> No debe ser nulo</div><br>
		<input class="savebutton" type="submit" id="btnCreate" value="Crear Línea de Investigación">
	</div>
</div><!-- form -->
<br>
<br>
	<?php 
	$countDocs = 1;
	foreach ($getResearch as $key => $value) {
		echo "<hr>";
		echo "<div class='row'>";
		echo "Linea de Investigacion ".$countDocs." ";
		echo $form->textField($model,'name',array('title'=>'Nombre de Investigación','name'=>'getResearch[]','value'=>$getResearch[$key]->name,'size'=>60,'maxlength'=>150, 'placeholder'=>'Nombre de investigación')); 
		echo $form->error($model,'name'); 
		echo CHtml::button('Elminar',array('submit' => array('curriculumVitae/deleteResearch', 'id'=>$getResearch[$key]->id),'confirm'=>'¿Seguro que desea eliminarlo?'));
		echo "</div>";
		echo "<hr>";
		
		$countDocs ++;
	}
	?>

	<div class="row buttons">
		<input class="savebutton" type="submit" onclick="validationFrom()" value="Guardar">
		<input class="cleanbutton" type="button" onclick="cleanUp()" value="Borrar">
		<?php echo CHtml::button('Cancelar', array('submit' => array('curriculumVitae/personalData'), 'confirm'=>'¿Seguro que desea Cancelar?')); ?>

	</div>
	
	
<?php $this->endWidget(); ?>

