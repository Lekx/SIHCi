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
            display: none;
            margin-top: -50px;
            margin-left: 455px;
            position: absolute;
			border-radius: 5px;
			border: 2px solid #F20862;
			background: #F20862;
			color: #fff;
			width: 190px !important;
			font-family: 'Caviar_Dreams_Bold' !important;
			font-size: 12px;
			line-height: 16px;
			padding: 8px 10px;
			text-align:  center;
        }
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

<input id="showFormResearch" type="button"  value="Agregar Nueva Línea de Investigación" class="addSomething">
<!-- <input id="hideFormResearch" type="button"  value="Cancelar" class="cancelSomething"> -->

<div class="research">
<div class="research2">
		<h5>Nombre de Investigación</h5>
		<!-- <input id="research" type="text" name="ResearchAreas_name" title="Nombre de Investigación" placeholder="Nombre de Investigación"> -->
			<?php echo $form->textField($model,'name',array('title'=>'Nombre de Investigación','size'=>60,'maxlength'=>150, 'placeholder'=>'Nombre de investigación')); ?>
    <div id="errorResearch" class="errors"> No debe estar vacío</div>
		</div>

</div><!-- form -->

	<?php
	$countDocs = 1;
	foreach ($getResearch as $key => $value) {
		echo "<hr>";
		echo "<div class='row'>";
		echo "<div class='research2'>";
		echo "<h5>Linea de Investigacion ".$countDocs.":</h5>";
		echo $form->textField($model,'name',array('title'=>'Nombre de Investigación','name'=>'getResearch[]','value'=>$getResearch[$key]->name,'size'=>60,'maxlength'=>150, 'placeholder'=>'Nombre de investigación'));
		echo $form->error($model,'name');
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
