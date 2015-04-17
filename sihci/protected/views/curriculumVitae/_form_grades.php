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
		<?php echo $form->textField($model,'country',array('size'=>50,'maxlength'=>50, 'placeholder'=>'País')); ?>
		<div class="infobox">
                Pais
          </div> 
	</div>

	<div class="row">
		<?php echo $form->dropDownList($model,'grade',array(''=>'','Trabajo'=>'Trabajo','Residencial'=>'Residencial', 
															'Particular'=>'Particular',
			                                                          'Campus'=>'Campus', 'otro'=>'Otro'), 
		                                                       array('options' => array(''=>array('selected'=>true))), 
		                                                       array('size'=>10,'maxlength'=>10)); ?>
		<div class="infobox">
                Grado
          </div>
		<?php echo $form->error($model,'grade'); ?>
	</div>

	<div class="row">
		<?php echo $form->dropDownList($model,'writ_number',array(''=>'','Trabajo'=>'Trabajo','Residencial'=>'Residencial', 
															'Particular'=>'Particular',
			                                                          'Campus'=>'Campus', 'otro'=>'otro'), 
		                                                       array('options' => array(''=>array('selected'=>true))), 
		                                                       array('size'=>10,'maxlength'=>10)); ?>
		<div class="infobox">
                Numero de Cedula
          </div>
		<?php echo $form->error($model,'writ_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'title',array('size'=>45,'maxlength'=>45,'placeholder'=>'Título')); ?>
		<div class="infobox">
                Titulo
          </div>
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
		    			'maxlength'=>'10', 
		        		'placeholder'=>"Fecha de Obtención"),
				));
	?>
		
		<div class="infobox">
                Fecha de Obtención
          </div>
		<?php echo $form->error($model,'obtention_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->dropDownList($model,'status',array(''=>'','Creditos_Terminados'=>'Creditos Terminados',
															'Grado_Obtenido'=>'Grado Obtenido', 
															'Proceso'=>'Proceso','Truncado'=>'Truncado'), 
		                                                       array('options' => array(''=>array('selected'=>true))), 
		                                                       array('size'=>10,'maxlength'=>10)); ?>
		<div class="infobox">
                Estado
          </div>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'thesis_title',array('size'=>60,'maxlength'=>250,'placeholder'=>'Título de Tésis')); ?>
		<div class="infobox">
                Título Tésis
          </div>
		<?php echo $form->error($model,'thesis_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->dropDownList($model,'state',array(''=>'','en_Proceso'=>'En Proceso',
															'Terminado'=>'Terminado'), 
		                                                       array('options' => array(''=>array('selected'=>true))), 
		                                                       array('size'=>10,'maxlength'=>10)); ?>
		<div class="infobox">
               Estado
          </div>
		<?php echo $form->error($model,'state'); ?>
	</div>

	<div class="row">
		<?php echo $form->dropDownList($model,'sector',array(''=>'','1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5',
																'6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10','11'=>'11',
																'12'=>'12','13'=>'13','14'=>'14','15'=>'15','16'=>'16',
																'17'=>'17','18'=>'18','19'=>'19','20'=>'20','21'=>'21',
																'22'=>'22','23'=>'23','24'=>'24','25'=>'25','26'=>'26',
																'27'=>'27','28'=>'28','29'=>'29','30'=>'30','31'=>'31'), 
		                                                       array('options' => array(''=>array('selected'=>true))), 
		                                                       array('size'=>10,'maxlength'=>10),
		                                                         array('placeholder'=>'Día de Inicio')); ?>
		<div class="infobox">
                Día de Inicio
          </div>
		<?php echo $form->error($model,'sector'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'institution',array('size'=>60,'maxlength'=>150,'placeholder'=>'Institución')); ?>
		<div class="infobox">
              Institución
          </div>
		<?php echo $form->error($model,'institution'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'area',array('size'=>45,'maxlength'=>45,'placeholder'=>'Área')); ?>
		<div class="infobox">
              Área
          </div>
		<?php echo $form->error($model,'area'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'discipline',array('size'=>45,'maxlength'=>45,'placeholder'=>'Disciplina')); ?>
		<div class="infobox">
                Disciplina
          </div>
		<?php echo $form->error($model,'discipline'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'subdiscipline',array('size'=>45,'maxlength'=>45,'placeholder'=>'Subdisciplina')); ?>
		<div class="infobox">
                Subdisciplina
          </div>
		<?php echo $form->error($model,'subdiscipline'); ?>
	</div>

	<div class="row buttons">
		<input class="savebutton"  type="submit" onclick="validationFrom()" value="Guardar">
		<input class="cleanbutton" type="button" onclick="cleanUp()" value="Borrar">
		<?php echo CHtml::button('Cancelar',array('/site/index')); ?>
	</div>


<?php $this->endWidget(); ?>

</div><!-- form -->