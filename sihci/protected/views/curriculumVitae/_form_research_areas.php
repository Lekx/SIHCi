<?php
/* @var $this ResearchAreasController */
/* @var $model ResearchAreas */
/* @var $form CActiveForm */
?>
<style type="text/css">

        .research{
            display: none;
        }
        .row
        {
        	margin-left: 0px !important;
        }
    </style>

<script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/protected/views/curriculumVitae/script/script.js"></script>


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'research-areas-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>


	<?php echo $form->errorSummary($model); ?>

<input id="showFormResearch" type="button"  value="Agregar nueva línea de investigación" class="addSomething">
<!-- <input id="hideFormResearch" type="button"  value="Cancelar" class="cancelSomething"> -->

<div class="research">
<div class="research2">
		<h5>Nombre de investigación</h5>
		<!-- <input id="research" type="text" name="ResearchAreas_name" title="Nombre de Investigación" placeholder="Nombre de Investigación"> -->
			<?php echo $form->textField($model,'name',array('title'=>'Nombre de investigación','size'=>60,'maxlength'=>150, 'placeholder'=>'Nombre de investigación')); ?>
    	<div id="ResearchAreas_name1_em_" class="errorMessage" style="display:none;"></div>
		</div>

</div><!-- form -->

	<?php
	$countDocs = 1;
	foreach ($getResearch as $key => $value) {
		echo "<hr>";
		echo "<div class='row'>";
		echo "<div class='research2'>";
		echo "<h5>Línea de investigacion ".$countDocs.":</h5>";
		echo $form->textField($model,'name',array('title'=>'Nombre de investigación','name'=>'getResearch[]','value'=>$getResearch[$key]->name,'size'=>60,'maxlength'=>150, 'placeholder'=>'Nombre de investigación'));
		echo	'<div id="getResearch1_em_" class="errorMessage" style="display:none;"></div>';
		echo "</div>";
		echo CHtml::button('Elminar',array('submit' => array('curriculumVitae/deleteResearch', 'id'=>$getResearch[$key]->id),'confirm'=>'¿Seguro que desea eliminarlo?','class'=>'deleteSomething'));
		echo "</div>";
		echo "<hr>";

		$countDocs ++;
	}
	?>

	<div class="row buttons">
    <?php echo CHtml::htmlButton('Guardar',array(
               'onclick'=>'send("research-areas-form", "curriculumVitae/researchAreas", "'.$model->id.'","curriculumVitae/researchAreas","");',
                //'id'=> 'post-submit-btn',
               'class'=>'savebutton',
           ));
       ?>

    <?php echo CHtml::link('Cancelar',array('curriculumVitae/researchAreas'),array('confirm'=>'Si cancela todo los datos escritos se borraran. ¿Está seguro de que desea cancelar?')); ?>
	</div>


<?php $this->endWidget(); ?>
