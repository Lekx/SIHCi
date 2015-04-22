<?php
/* @var $this CertificationsController */
/* @var $data Certifications */
?>

<div class="view">
     
     <?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_curriculum')); ?>:</b>
	<?php echo CHtml::encode($data->id_curriculum); ?>
	<br />
     
     */?>
	<b><?php echo CHtml::encode($data->getAttributeLabel('folio')); ?>:</b>
	<?php echo CHtml::encode($data->folio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reference')); ?>:</b>
	<?php echo CHtml::encode($data->reference); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reference_type')); ?>:</b>
	<?php echo CHtml::encode($data->reference_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('specialty')); ?>:</b>
	<?php echo CHtml::encode($data->specialty); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('validity_date_start')); ?>:</b>
	<?php echo CHtml::encode($data->validity_date_start); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('validity_date_end')); ?>:</b>
	<?php echo CHtml::encode($data->validity_date_end); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	*/ ?>

</div>