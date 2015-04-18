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
	'enableAjaxValidation'=>false,
)); ?>


	<div class="row">
		<?php echo $form->textField($model,'country',array('title'=>'País','size'=>50,'maxlength'=>50, 'placeholder'=>'País')); ?>
	</div>

	<div class="row">
		<?php echo $form->dropDownList($model,'grade',array(''=>'','Trabajo'=>'Trabajo','Residencial'=>'Residencial', 
															'Particular'=>'Particular',
			                                                          'Campus'=>'Campus', 'otro'=>'Otro'), 
		                                                       array('title'=>'Grado','options' => array(''=>array('selected'=>true))), 
		                                                       array('size'=>10,'maxlength'=>10)); ?>
		
		<?php echo $form->error($model,'grade'); ?>
	</div>

	<div class="row">
		<?php echo $form->dropDownList($model,'writ_number',array(''=>'','Trabajo'=>'Trabajo','Residencial'=>'Residencial', 
															'Particular'=>'Particular',
			                                                          'Campus'=>'Campus', 'otro'=>'otro'), 
		                                                       array('title'=>'Numero de Cedula','options' => array(''=>array('selected'=>true))), 
		                                                       array('size'=>10,'maxlength'=>10)); ?>
		
		<?php echo $form->error($model,'writ_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'title',array('title'=>'Titulo','size'=>45,'maxlength'=>45,'placeholder'=>'Título')); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">

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
		    			'title'=>'Fecha de Obtención',
		    			'maxlength'=>'10', 
		        		'placeholder'=>"Fecha de Obtención"),
				));
	?>
	
		<?php echo $form->error($model,'obtention_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->dropDownList($model,'status',array(''=>'','Creditos_Terminados'=>'Creditos Terminados',
															'Grado_Obtenido'=>'Grado Obtenido', 
															'Proceso'=>'Proceso','Truncado'=>'Truncado'), 
		                                                       array('title'=>'Estado','options' => array(''=>array('selected'=>true))), 
		                                                       array('size'=>10,'maxlength'=>10)); ?>
	
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'thesis_title',array('title'=>'Titulo Tésis','size'=>60,'maxlength'=>250,'placeholder'=>'Título de Tésis')); ?>
		<?php echo $form->error($model,'thesis_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->dropDownList($model,'state',array(''=>'','en_Proceso'=>'En Proceso',
															'Terminado'=>'Terminado'), 
		                                                       array('title'=>'Estado','options' => array(''=>array('selected'=>true))), 
		                                                       array('size'=>10,'maxlength'=>10)); ?>
		
		<?php echo $form->error($model,'state'); ?>
	</div>

	<div class="row">
		<?php echo $form->dropDownList($model,'sector',array(''=>'','1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5',
																'6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10','11'=>'11',
																'12'=>'12','13'=>'13','14'=>'14','15'=>'15','16'=>'16',
																'17'=>'17','18'=>'18','19'=>'19','20'=>'20','21'=>'21',
																'22'=>'22','23'=>'23','24'=>'24','25'=>'25','26'=>'26',
																'27'=>'27','28'=>'28','29'=>'29','30'=>'30','31'=>'31'), 
		                                                       array('title'=>'Día de Inicio','options' => array(''=>array('selected'=>true))), 
		                                                       array('size'=>10,'maxlength'=>10),
		                                                         array('placeholder'=>'Día de Inicio')); ?>
	
		<?php echo $form->error($model,'sector'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'institution',array('title'=>'Institución','size'=>60,'maxlength'=>150,'placeholder'=>'Institución')); ?>
		<?php echo $form->error($model,'institution'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'area',array('title'=>'Área','size'=>45,'maxlength'=>45,'placeholder'=>'Área')); ?>
		<?php echo $form->error($model,'area'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'discipline',array('title'=>'Disciplina','size'=>45,'maxlength'=>45,'placeholder'=>'Disciplina')); ?>
		<?php echo $form->error($model,'discipline'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'subdiscipline',array('title'=>'Subdisciplina','size'=>45,'maxlength'=>45,'placeholder'=>'Subdisciplina')); ?>
		<?php echo $form->error($model,'subdiscipline'); ?>
	</div>

	<div class="row buttons">
		<input class="savebutton"  type="submit" onclick="validationFrom()" value="Guardar">
		<input class="cleanbutton" type="button" onclick="cleanUp()" value="Borrar">
		<?php echo CHtml::button('Cancelar',array('/site/index')); ?>
	</div>


<?php $this->endWidget(); ?>

</div><!-- form -->