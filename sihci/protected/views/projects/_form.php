<?php
/* @var $this ProjectsController */
/* @var $model Projects */
/* @var $form CActiveForm */
?>
<script type="text/javascript">
	var section = 1;
	function changeSection(value){
				section += value;
		$(".sections").hide();
		if(section == 3)
			$("#next").hide();
		else
			$("#next").show();

		if(section == 1)
			$("#back").hide();
		else
			$("#back").show();


		alert("ouch, you fucked me bby! "+section);
		$("#section"+section).show();
	}
</script>>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'projects-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>
<div id="section1" class="sections" style="border:1px solid #ccc;padding:15px; border-radus:3px;margin:10px;">
	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'discipline'); ?>
		<?php echo $form->textField($model,'discipline',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'discipline'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'research_type'); ?>
		<?php echo $form->textField($model,'research_type',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'research_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'priority_topic'); ?>
		<?php echo $form->textField($model,'priority_topic',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'priority_topic'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sub_topic'); ?>
		<?php echo $form->textField($model,'sub_topic',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'sub_topic'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'justify'); ?>
		<?php echo $form->textArea($model,'justify',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'justify'); ?>
	</div>
</div>
<div id="section2" class="sections" style="display:none;border:1px solid #ccc;padding:15px; border-radus:3px;margin:10px;">
	<div class="row">
		<?php echo $form->labelEx($model,'is_sni'); ?>
		<?php echo $form->textField($model,'is_sni'); ?>
		<?php echo $form->error($model,'is_sni'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'develop_uh'); ?>
		<?php echo $form->textField($model,'develop_uh',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'develop_uh'); ?>
	</div>
</div>
<div id="section3" class="sections" style="display:none;border:1px solid #ccc;padding:15px; border-radus:3px;margin:10px;">
	<div class="row">
		<?php echo $form->labelEx($model,'institution_colaboration'); ?>
		<?php echo $form->textField($model,'institution_colaboration'); ?>
		<?php echo $form->error($model,'institution_colaboration'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'national_institutions'); ?>
		<?php echo $form->textField($model,'national_institutions'); ?>
		<?php echo $form->error($model,'national_institutions'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'participant_institutions'); ?>
		<?php echo $form->textArea($model,'participant_institutions',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'participant_institutions'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'international_institutions_'); ?>
		<?php echo $form->textField($model,'international_institutions_'); ?>
		<?php echo $form->error($model,'international_institutions_'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'participant_institutions_international'); ?>
		<?php echo $form->textArea($model,'participant_institutions_international',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'participant_institutions_international'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'colaboration_type'); ?>
		<?php echo $form->textField($model,'colaboration_type',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'colaboration_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'has_adtl_caracteristics_a'); ?>
		<?php echo $form->textField($model,'has_adtl_caracteristics_a'); ?>
		<?php echo $form->error($model,'has_adtl_caracteristics_a'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'adtl_caracteristics_a'); ?>
		<?php echo $form->textArea($model,'adtl_caracteristics_a',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'adtl_caracteristics_a'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'has_adtl_caracteristics_b'); ?>
		<?php echo $form->textField($model,'has_adtl_caracteristics_b'); ?>
		<?php echo $form->error($model,'has_adtl_caracteristics_b'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'adtl_caracteristics_b'); ?>
		<?php echo $form->textArea($model,'adtl_caracteristics_b',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'adtl_caracteristics_b'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'has_adtl_caracteristics_c'); ?>
		<?php echo $form->textField($model,'has_adtl_caracteristics_c'); ?>
		<?php echo $form->error($model,'has_adtl_caracteristics_c'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'adtl_caracteristics_c'); ?>
		<?php echo $form->textArea($model,'adtl_caracteristics_c',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'adtl_caracteristics_c'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'has_adtl_caracteristics_d'); ?>
		<?php echo $form->textField($model,'has_adtl_caracteristics_d'); ?>
		<?php echo $form->error($model,'has_adtl_caracteristics_d'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'adtl_caracteristics_d'); ?>
		<?php echo $form->textArea($model,'adtl_caracteristics_d',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'adtl_caracteristics_d'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'has_adtl_caracteristics_e'); ?>
		<?php echo $form->textField($model,'has_adtl_caracteristics_e'); ?>
		<?php echo $form->error($model,'has_adtl_caracteristics_e'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'adtl_caracteristics_e'); ?>
		<?php echo $form->textArea($model,'adtl_caracteristics_e',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'adtl_caracteristics_e'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'has_adtl_caracteristics_f'); ?>
		<?php echo $form->textField($model,'has_adtl_caracteristics_f'); ?>
		<?php echo $form->error($model,'has_adtl_caracteristics_f'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'adtl_caracteristics_f'); ?>
		<?php echo $form->textArea($model,'adtl_caracteristics_f',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'adtl_caracteristics_f'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'has_adtl_caracteristics_g'); ?>
		<?php echo $form->textField($model,'has_adtl_caracteristics_g'); ?>
		<?php echo $form->error($model,'has_adtl_caracteristics_g'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'adtl_caracteristics_g'); ?>
		<?php echo $form->textArea($model,'adtl_caracteristics_g',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'adtl_caracteristics_g'); ?>
	</div>

	</div>

	<div class="row buttons">
		<?php 
		//echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); 
		
		echo " ".Chtml::button('Guardar en Borrador',array("id"=>"draft"));
		echo " ".Chtml::button('Guardar y enviar',array("id"=>"send"));
		echo " ".Chtml::button('Borrar',array("type"=>"reset", "onClick"=>"alert('Está usted seguro de limpiar estos datos');"));
		echo " ".Chtml::button('Cancelar',array("id"=>"x",));

		echo " ".Chtml::button('Siguiente >',array("id"=>"next","onClick"=>"changeSection(1);","style"=>"float:right;"));
		echo " ".Chtml::button('< Anterior',array("id"=>"back","onClick"=>"changeSection(-1);","style"=>"display:none;float:right;"));
		

		?>

	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->