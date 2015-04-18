<?php
/* @var $this GradesController */
/* @var $model Grades */
/* @var $form CActiveForm */
?>
	<script>
		function cleanUp(){
			var text;
			var result = confirm("¿Está usted seguro de limpiar estos datos?");
			if (result==true) {
				$('[id^=Grades_]').val('');
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
	'id'=>'grades-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>


	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'country'); ?>
		<?php echo $form->textField($model,'country',array('size'=>50,'maxlength'=>50, 'placeholder'=>'País')); ?>
		<?php echo $form->error($model,'country'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'grade'); ?>
		<?php echo $form->dropDownList($model,'grade',array('Trabajo'=>'Trabajo','Residencial'=>'Recidencial', 
															'Particular'=>'Particular',
			                                                          'Campus'=>'Campus', 'otro'=>'otro'), 
		                                                       array('prompt'=>'Grado','options' => array(''=>array('selected'=>true))), 
		                                                       array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'grade'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'writ_number'); ?>
		<?php echo $form->textField($model,'writ_number',array('size'=>50,'maxlength'=>50, 'placeholder'=>'Número de Cédula')); ?>
		<?php echo $form->error($model,'writ_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>45,'maxlength'=>45,'placeholder'=>'Título')); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'obtention_date'); ?>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
		    'language'=> 'es',
		    'attribute' => 'obtention_date',
		    'model' => $model,
		   // 'flat'=>false,
		     'options' => array(
			     		'changeMonth'=>true, //cambiar por Mes
			     		'changeYear'=>true, //cambiar por Año
			    			'maxDate' => 'now',
		     	),
		    'htmlOptions' => array(
		    			'size'=>'10',
		    			'maxlength'=>'10', 
		        		'placeholder'=>"Fecha de Obtención"),
				));
	?>
		<?php echo $form->error($model,'obtention_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status',array('Creditos_Terminados'=>'Creditos Terminados',
															'Grado_Obtenido'=>'Grado Obtenido', 
															'Proceso'=>'Proceso','Truncado'=>'Truncado'), 
		                                                       array('prompt'=>'Estatus','options' => array(''=>array('selected'=>true))), 
		                                                       array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'thesis_title'); ?>
		<?php echo $form->textField($model,'thesis_title',array('size'=>60,'maxlength'=>250,'placeholder'=>'Título de Tésis')); ?>
		<?php echo $form->error($model,'thesis_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'state'); ?>
		<?php echo $form->dropDownList($model,'state',array('en_Proceso'=>'En Proceso',
															'Terminado'=>'Terminado'), 
		                                                       array('prompt'=>'Estado','options' => array(''=>array('selected'=>true))), 
		                                                       array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'state'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sector'); ?>
		<?php echo $form->dropDownList($model,'sector',array('No especificado'=>'No especificado','Instituciones del sector gobierno federal centralizado'=>'Instituciones del sector gobierno federal centralizado',
			                                                 'Instituciones del sector entidades paraestatales'=>'Instituciones del sector entidades paraestatales','Instituciones del sector gobierno de las entidades federativas'=>'Instituciones del sector gobierno de las entidades federativas',
			                                                 'Instituciones del sector de educacion superior publicas'=>'Instituciones del sector de educacion superior publicas','Instituciones del sector de educacion superior privadas'=>'Instituciones del sector de educacion superior privadas',
			                                                 'Instituciones del sector privado de empresas productivas (adiat)'=>'Instituciones del sector privado de empresas productivas (adiat)','Instituciones / organizaciones no lucrativas'=>'Instituciones / organizaciones no lucrativas',
			                                                 'Instituciones / organizaciones extranjeras'=>'Instituciones / organizaciones extranjeras','consultoras'=>'consultoras','Gobierno municipal'=>'Gobierno municipal','Gobierno federal descentralizado'=>'Gobierno federal descentralizado',
			                                                 'Gobierno Federal Desconcentrado'=>'Gobierno Federal Desconcentrado','Centros Públicos de Investigación'=>'Centros Públicos de Investigación','Centros Privados de Investigación'=>'Centros Privados de Investigación'),
			                                                 array('prompt'=>'Sector','options' => array(''=>array('selected'=>true)))); ?>
		<?php echo $form->error($model,'sector'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'institution'); ?>
		<?php echo $form->textField($model,'institution',array('size'=>60,'maxlength'=>150,'placeholder'=>'Institución')); ?>
		<?php echo $form->error($model,'institution'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'area'); ?>
		<?php echo $form->textField($model,'area',array('size'=>45,'maxlength'=>45,'placeholder'=>'Área')); ?>
		<?php echo $form->error($model,'area'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'discipline'); ?>
		<?php echo $form->textField($model,'discipline',array('size'=>45,'maxlength'=>45,'placeholder'=>'Disciplina')); ?>
		<?php echo $form->error($model,'discipline'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subdiscipline'); ?>
		<?php echo $form->textField($model,'subdiscipline',array('size'=>45,'maxlength'=>45,'placeholder'=>'Subdisciplina')); ?>
		<?php echo $form->error($model,'subdiscipline'); ?>
	</div>

	<div class="row buttons">
		<input type="submit" onclick="validationFrom()" value="Guardar">
		<input type="button" onclick="cleanUp()" value="Limpiar">
		<?php echo CHtml::link('Cancelar',array('/site/index')); ?>
	</div>


<?php $this->endWidget(); ?>

</div><!-- form -->