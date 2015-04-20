<?php
/* @var $this JobsController */
/* @var $model Jobs */
/* @var $form CActiveForm */
?>
	<script>
		function cleanUp(){
			var text;
			var result = confirm("¿Está usted seguro de limpiar estos datos?");
			if (result==true) {
				$('[id^=Jobs_]').val('');
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
	'id'=>'jobs-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>
	
	<div class="row">
		
		<?php echo $form->textField($model,'organization',array( 'title'=>'Organización','size'=>60,'maxlength'=>100, 'placeholder'=>'Organización')); ?>
		<?php echo $form->error($model,'organization'); ?>
	</div>

	<div class="row">
	
		
		<?php echo $form->textField($model,'area',array( 'title'=>'Área','size'=>45,'maxlength'=>45, 'placeholder'=>'Área')); ?>
		<?php echo $form->error($model,'area'); ?>
	</div>

	<div class="row">
	
		<?php echo $form->textField($model,'title',array( 'title'=>'Título o Puesto','size'=>45,'maxlength'=>45, 'placeholder'=>'Título o Puesto')); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->dropDownList($model,'start_day',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5',
																'6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10','11'=>'11',
																'12'=>'12','13'=>'13','14'=>'14','15'=>'15','16'=>'16',
																'17'=>'17','18'=>'18','19'=>'19','20'=>'20','21'=>'21',
																'22'=>'22','23'=>'23','24'=>'24','25'=>'25','26'=>'26',
																'27'=>'27','28'=>'28','29'=>'29','30'=>'30','31'=>'31'), 
			                                                     array( 'title'=>'Día de Inicio','prompt'=>'Dia de Inicio','options' => array(''=>array('selected'=>true))), 
		    	                                                 array('size'=>10,'maxlength'=>10),
		                                                         array('placeholder'=>'Día de Inicio')); ?>
		

		<?php echo $form->error($model,'start_day'); ?>
	</div>

	<div class="row">

		<?php echo $form->dropDownList($model,'start_month',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5',
																'6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10','11'=>'11',
																'12'=>'12'), 
		                                                       array( 'prompt'=>'Mes de Inicio','title'=>'Mes de Inicio','options' => array(''=>array('selected'=>true))), 
		                                                       array('size'=>10,'maxlength'=>10),
		                                                       array('placeholder'=>'Mes de Inicio')); ?>
	
		<?php echo $form->error($model,'start_month'); ?>
	</div>

	<div class="row">

		<?php echo $form->dropDownList($model,'start_year',array('1980'=>'1980','2'=>'2','3'=>'3','4'=>'4','5'=>'5',
																'6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10','11'=>'11',
																'2015'=>'2015'), 
		                                                       array( 'prompt'=>'Año de Inicio','title'=>'Año de Inicio','options' => array(''=>array('selected'=>true))), 
		                                                       array('size'=>10,'maxlength'=>10),
		                                                       array('placeholder'=>'Año de Inicio')); ?>
	
		<?php echo $form->error($model,'start_year'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'hospital_unit',array( 'title'=>'Unidad Hospitalaria','size'=>50,'maxlength'=>50, 'placeholder'=>'Unidad Hospitalaria')); ?>
		<?php echo $form->error($model,'hospital_unit'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'rud',array( 'title'=>'RUD', 'size'=>50,'maxlength'=>50, 'placeholder'=>'RUD')); ?>
		<?php echo $form->error($model,'rud'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'schedule',array( 'title'=>'Horario de Trabajo','size'=>45,'maxlength'=>45, 'placeholder'=>'Horario de Trabajo')); ?>
		<?php echo $form->error($model,'schedule'); ?>
	</div>

	<div class="row buttons">
		<input class="savebutton" type="submit" onclick="validationFrom()" value="Guardar">
		<input class="cleanbutton" type="button" onclick="cleanUp()" value="Limpiar">
		<?php echo CHtml::button('Cancelar',array('/site/index')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->