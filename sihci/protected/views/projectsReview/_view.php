<?php
/* @var $this ProjectsController */
/* @var $data Projects */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_curriculum')); ?>:</b>
	<?php echo CHtml::encode($data->id_curriculum); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('discipline')); ?>:</b>
	<?php echo CHtml::encode($data->discipline); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('research_type')); ?>:</b>
	<?php echo CHtml::encode($data->research_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('priority_topic')); ?>:</b>
	<?php echo CHtml::encode($data->priority_topic); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sub_topic')); ?>:</b>
	<?php echo CHtml::encode($data->sub_topic); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('justify')); ?>:</b>
	<?php echo CHtml::encode($data->justify); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_sni')); ?>:</b>
	<?php echo CHtml::encode($data->is_sni); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('develop_uh')); ?>:</b>
	<?php echo CHtml::encode($data->develop_uh); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('institution_colaboration')); ?>:</b>
	<?php echo CHtml::encode($data->institution_colaboration); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('national_institutions')); ?>:</b>
	<?php echo CHtml::encode($data->national_institutions); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('participant_institutions')); ?>:</b>
	<?php echo CHtml::encode($data->participant_institutions); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('international_institutions_')); ?>:</b>
	<?php echo CHtml::encode($data->international_institutions_); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('participant_institutions_international')); ?>:</b>
	<?php echo CHtml::encode($data->participant_institutions_international); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('colaboration_type')); ?>:</b>
	<?php echo CHtml::encode($data->colaboration_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('has_adtl_caracteristics_a')); ?>:</b>
	<?php echo CHtml::encode($data->has_adtl_caracteristics_a); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('adtl_caracteristics_a')); ?>:</b>
	<?php echo CHtml::encode($data->adtl_caracteristics_a); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('has_adtl_caracteristics_b')); ?>:</b>
	<?php echo CHtml::encode($data->has_adtl_caracteristics_b); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('adtl_caracteristics_b')); ?>:</b>
	<?php echo CHtml::encode($data->adtl_caracteristics_b); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('has_adtl_caracteristics_c')); ?>:</b>
	<?php echo CHtml::encode($data->has_adtl_caracteristics_c); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('adtl_caracteristics_c')); ?>:</b>
	<?php echo CHtml::encode($data->adtl_caracteristics_c); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('has_adtl_caracteristics_d')); ?>:</b>
	<?php echo CHtml::encode($data->has_adtl_caracteristics_d); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('adtl_caracteristics_d')); ?>:</b>
	<?php echo CHtml::encode($data->adtl_caracteristics_d); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('has_adtl_caracteristics_e')); ?>:</b>
	<?php echo CHtml::encode($data->has_adtl_caracteristics_e); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('adtl_caracteristics_e')); ?>:</b>
	<?php echo CHtml::encode($data->adtl_caracteristics_e); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('has_adtl_caracteristics_f')); ?>:</b>
	<?php echo CHtml::encode($data->has_adtl_caracteristics_f); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('adtl_caracteristics_f')); ?>:</b>
	<?php echo CHtml::encode($data->adtl_caracteristics_f); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('has_adtl_caracteristics_g')); ?>:</b>
	<?php echo CHtml::encode($data->has_adtl_caracteristics_g); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('adtl_caracteristics_g')); ?>:</b>
	<?php echo CHtml::encode($data->adtl_caracteristics_g); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('folio')); ?>:</b>
	<?php echo CHtml::encode($data->folio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_sponsored')); ?>:</b>
	<?php echo CHtml::encode($data->is_sponsored); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('registration_number')); ?>:</b>
	<?php echo CHtml::encode($data->registration_number); ?>
	<br />

	*/ ?>

</div>