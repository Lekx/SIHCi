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


	<?php 

	echo $form->errorSummary($model); 
	foreach ($getGrades as $key => $value) {
		
		echo	'<div class="row">';
			echo $form->labelEx($model,'country'); 
			echo $form->textField($model,'country',array('name'=>'getCountry[]','value'=>$getGrades[$key]->country,'size'=>50,'maxlength'=>50, 'placeholder'=>'País')); 
			echo $form->error($model,'country'); 
		echo '</div>';

		echo	'<div class="row">';
			echo $form->labelEx($model,'grade'); 
			echo $form->dropDownList($model,'grade',array('Trabajo'=>'Trabajo','Residencial'=>'Recidencial', 
																'Particular'=>'Particular',
				                                                          'Campus'=>'Campus', 'otro'=>'otro'), 
			                                                       array('name'=>'getGrade[]','prompt'=>'Grado','options' => array($getGrades[$key]->grade=>array('selected'=>true))), 
			                                                       array('size'=>10,'maxlength'=>10)); 
			echo $form->error($model,'grade');
		echo '</div>';

		echo	'<div class="row">';
			echo $form->labelEx($model,'writ_number');
			 echo $form->textField($model,'writ_number',array('name'=>'getWritNumber[]','value'=>$getGrades[$key]->writ_number,'title'=>'Número de Cédula','size'=>50,'maxlength'=>50, 'placeholder'=>'Número de Cédula')); 
			echo $form->error($model,'writ_number');
		echo '</div>';

		echo	'<div class="row">';
			 echo $form->labelEx($model,'title'); 
			 echo $form->textField($model,'title',array('name'=>'getTitle[]','value'=>$getGrades[$key]->title,'size'=>45,'maxlength'=>45,'placeholder'=>'Título')); 
			 echo $form->error($model,'title'); 
		echo '</div>';


		echo	'<div class="row">';
			 echo $form->labelEx($model,'obtention_date'); 
			
			$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			    'language'=> 'es',
			    'attribute' => 'obtention_date',
			    'model' => $model,
			    'value'=>$getGrades[$key]->obtention_date,
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
				 echo $form->error($model,'obtention_date'); 
		echo '</div>';

		echo	'<div class="row">';
			 echo $form->labelEx($model,'status'); 
			 echo $form->dropDownList($model,'status',array('Creditos_Terminados'=>'Creditos Terminados',
																'Grado_Obtenido'=>'Grado Obtenido', 
																'Proceso'=>'Proceso','Truncado'=>'Truncado'), 
			                                                       array('name'=>'getStatus[]','prompt'=>'Estatus','options' => array($getGrades[$key]->status=>array('selected'=>true))), 
			                                                       array('size'=>10,'maxlength'=>10)); 
			 echo $form->error($model,'status'); 
		echo '</div>';

		echo	'<div class="row">';
			 echo $form->labelEx($model,'thesis_title'); 
			 echo $form->textField($model,'thesis_title',array('name'=>'getThesisTitle[]','value'=>$getGrades[$key]->thesis_title,'size'=>60,'maxlength'=>250,'placeholder'=>'Título de Tésis')); 
			echo $form->error($model,'thesis_title'); 
		echo '</div>';

		echo	'<div class="row">';
			 echo $form->labelEx($model,'state');
			 echo $form->dropDownList($model,'state',array('en_Proceso'=>'En Proceso',
																'Terminado'=>'Terminado'), 
			                                                       array('name'=>'getState[]','prompt'=>'Estado','options' => array($getGrades[$key]->state=>array('selected'=>true))), 
			                                                       array('size'=>10,'maxlength'=>10)); 
			 echo $form->error($model,'state'); 
		echo '</div>';

		echo	'<div class="row">';
			 echo $form->labelEx($model,'sector'); 
			 echo $form->dropDownList($model,'sector',array('No especificado'=>'No especificado','Instituciones del sector gobierno federal centralizado'=>'Instituciones del sector gobierno federal centralizado',
				                                                 'Instituciones del sector entidades paraestatales'=>'Instituciones del sector entidades paraestatales','Instituciones del sector gobierno de las entidades federativas'=>'Instituciones del sector gobierno de las entidades federativas',
				                                                 'Instituciones del sector de educacion superior publicas'=>'Instituciones del sector de educacion superior publicas','Instituciones del sector de educacion superior privadas'=>'Instituciones del sector de educacion superior privadas',
				                                                 'Instituciones del sector privado de empresas productivas (adiat)'=>'Instituciones del sector privado de empresas productivas (adiat)','Instituciones / organizaciones no lucrativas'=>'Instituciones / organizaciones no lucrativas',
				                                                 'Instituciones / organizaciones extranjeras'=>'Instituciones / organizaciones extranjeras','consultoras'=>'consultoras','Gobierno municipal'=>'Gobierno municipal','Gobierno federal descentralizado'=>'Gobierno federal descentralizado',
				                                                 'Gobierno Federal Desconcentrado'=>'Gobierno Federal Desconcentrado','Centros Públicos de Investigación'=>'Centros Públicos de Investigación','Centros Privados de Investigación'=>'Centros Privados de Investigación'),
				                                                 array('name'=>'getSector[]','prompt'=>'Sector','options' => array($getGrades[$key]->sector=>array('selected'=>true)))); 
			 echo $form->error($model,'sector'); 
		echo '</div>';

		echo	'<div class="row">';
			 echo $form->labelEx($model,'institution'); 
			 echo $form->textField($model,'institution',array('name'=>'getInstitution[]','value'=>$getGrades[$key]->institution,'size'=>60,'maxlength'=>150,'placeholder'=>'Institución')); 
			 echo $form->error($model,'institution'); 
		echo '</div>';

		echo	'<div class="row">';
			 echo $form->labelEx($model,'area'); 
			 echo $form->textField($model,'area',array('name'=>'getArea[]','value'=>$getGrades[$key]->area,'size'=>45,'maxlength'=>45,'placeholder'=>'Área')); 
			 echo $form->error($model,'area'); 
		echo '</div>';

		echo	'<div class="row">';
			 echo $form->labelEx($model,'discipline'); 
			 echo $form->textField($model,'discipline',array('name'=>'getDiscipline[]','value'=>$getGrades[$key]->discipline,'size'=>45,'maxlength'=>45,'placeholder'=>'Disciplina')); 
			 echo $form->error($model,'discipline'); 
		echo '</div>';

		echo	'<div class="row">';
			 echo $form->labelEx($model,'subdiscipline'); 
			 echo $form->textField($model,'subdiscipline',array('name'=>'getSubdiscipline[]','value'=>$getGrades[$key]->subdiscipline,'size'=>45,'maxlength'=>45,'placeholder'=>'Subdisciplina')); 
			 echo $form->error($model,'subdiscipline'); 
		echo '</div>';
	}
	echo	'<div class="row buttons">';
		echo '<input type="submit" onclick="validationFrom()" value="Guardar">';
		echo '<input type="button" onclick="cleanUp()" value="Limpiar">';
		echo CHtml::link('Cancelar',array('/site/index')); 
	echo '</div>';
?>

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