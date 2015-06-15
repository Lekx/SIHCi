<?php
/* @var $this ProjectsController */
/* @var $model Projects */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'searchValue',
	'action'=>Yii::app()->createUrl($this->route),
	'enableAjaxValidation'=>true,
	'method'=>'get',
)); ?>

 		<div class="inner-addon right-addon">
					 <i class="glyphicon glyphicon-search"></i>
	   	<?php echo $form->textField($model,'searchValue',array('size'=>60,'maxlength'=>70, 'placeholder'=>'Patrocinador, Título, Disciplina, Unidad Hospitalaria, Folio, No. Registro Estatus', 'class'=>'searchcrud')); ?>	
		<?php echo CHtml::submitButton('',array('class'=>'searchcrudbut')); ?>
</div>

<?php /*

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_curriculum'); ?>
		<?php echo $form->textField($model,'id_curriculum'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'discipline'); ?>
		<?php echo $form->textField($model,'discipline',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'research_type'); ?>
		<?php echo $form->textField($model,'research_type',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'priority_topic'); ?>
		<?php echo $form->textField($model,'priority_topic',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sub_topic'); ?>
		<?php echo $form->textField($model,'sub_topic',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'justify'); ?>
		<?php echo $form->textArea($model,'justify',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_sni'); ?>
		<?php echo $form->textField($model,'is_sni'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'develop_uh'); ?>
		<?php echo $form->textField($model,'develop_uh',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'institution_colaboration'); ?>
		<?php echo $form->textField($model,'institution_colaboration'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'national_institutions'); ?>
		<?php echo $form->textField($model,'national_institutions'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'participant_institutions'); ?>
		<?php echo $form->textArea($model,'participant_institutions',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'international_institutions_'); ?>
		<?php echo $form->textField($model,'international_institutions_'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'participant_institutions_international'); ?>
		<?php echo $form->textArea($model,'participant_institutions_international',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'colaboration_type'); ?>
		<?php echo $form->textField($model,'colaboration_type',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'has_adtl_caracteristics_a'); ?>
		<?php echo $form->textField($model,'has_adtl_caracteristics_a'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'adtl_caracteristics_a'); ?>
		<?php echo $form->textArea($model,'adtl_caracteristics_a',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'has_adtl_caracteristics_b'); ?>
		<?php echo $form->textField($model,'has_adtl_caracteristics_b'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'adtl_caracteristics_b'); ?>
		<?php echo $form->textArea($model,'adtl_caracteristics_b',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'has_adtl_caracteristics_c'); ?>
		<?php echo $form->textField($model,'has_adtl_caracteristics_c'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'adtl_caracteristics_c'); ?>
		<?php echo $form->textArea($model,'adtl_caracteristics_c',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'has_adtl_caracteristics_d'); ?>
		<?php echo $form->textField($model,'has_adtl_caracteristics_d'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'adtl_caracteristics_d'); ?>
		<?php echo $form->textArea($model,'adtl_caracteristics_d',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'has_adtl_caracteristics_e'); ?>
		<?php echo $form->textField($model,'has_adtl_caracteristics_e'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'adtl_caracteristics_e'); ?>
		<?php echo $form->textArea($model,'adtl_caracteristics_e',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'has_adtl_caracteristics_f'); ?>
		<?php echo $form->textField($model,'has_adtl_caracteristics_f'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'adtl_caracteristics_f'); ?>
		<?php echo $form->textArea($model,'adtl_caracteristics_f',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'has_adtl_caracteristics_g'); ?>
		<?php echo $form->textField($model,'has_adtl_caracteristics_g'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'adtl_caracteristics_g'); ?>
		<?php echo $form->textArea($model,'adtl_caracteristics_g',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'folio'); ?>
		<?php echo $form->textField($model,'folio',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_sponsored'); ?>
		<?php echo $form->textField($model,'is_sponsored'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'registration_number'); ?>
		<?php echo $form->textField($model,'registration_number',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

	*/?>

<?php $this->endWidget(); ?>

</div><!-- search-form -->