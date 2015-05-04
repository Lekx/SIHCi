<?php
/* @var $this ResearchAreasController */
/* @var $model ResearchAreas */
/* @var $form CActiveForm */
?>
<script>
		function cleanUp(){
			var text;
			var result = confirm("¿Está usted seguro de limpiar estos datos?");
			if (result==true) {
				$('[id^=ResearchAreas_]').val('');
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
	'id'=>'research-areas-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>150, 'placeholder'=>'Nombre de investigación')); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row buttons">
	    <?php echo CHtml::ajaxButton ($model->isNewRecord ? 'Guardar' : 'Modificar',CController::createUrl('AdminResearchAreas/'.($model->isNewRecord ? 'create' : 'update/'.$model->id)), 
        				array(
							'dataType'=>'json',
                     		'type'=>'post',
                     		'success'=>'function(data) 
                     		 {
		                                      
		                         if(data.status=="success")
		                         {
				                     alert("Registro realizado con éxito");
				                     $("#research-areas-form")[0].reset();
   				                     window.location.href ="'.Yii::app()->createUrl('AdminResearchAreas/admin').'";		                         

		                         }		                         
		                         else
		                         {
			                     	alert("Complete los campos con *");   
			                     }       
		                  	}',                    
		                    
                        )); 
        ?>
        <?php  if($model->isNewRecord) 
			 echo '<input class="cleanbutton" type="button" onclick="cleanUp()"" value="Borrar">';
		?>
       	<?php echo CHtml::link('Cancelar', array('/AdminResearchAreas/admin'),array('confirm' => 'Si cancela todo los datos escritos se borraran. ¿Está seguro de que desea cancelar?')); ?>

		<div class="200">
		
		</div>
		
		<div class="404">
		</div>
		
	</div>
	
<?php $this->endWidget(); ?>

</div><!-- form -->