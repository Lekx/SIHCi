<?php
/* @var $this SoftwareController */
/* @var $data Software */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_curriculum')); ?>:</b>
	<?php echo CHtml::encode($data->id_curriculum); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('country')); ?>:</b>
	<?php echo CHtml::encode($data->country); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('participation_type')); ?>:</b>
	<?php echo CHtml::encode($data->participation_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('beneficiary')); ?>:</b>
	<?php echo CHtml::encode($data->beneficiary); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('entity')); ?>:</b>
	<?php echo CHtml::encode($data->entity); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('manwork_hours')); ?>:</b>
	<?php echo CHtml::encode($data->manwork_hours); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('end_date')); ?>:</b>
	<?php echo CHtml::encode($data->end_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sector')); ?>:</b>
	<?php echo CHtml::encode($data->sector); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('organization')); ?>:</b>
	<?php echo CHtml::encode($data->organization); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('second_level')); ?>:</b>
	<?php echo CHtml::encode($data->second_level); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('resumen')); ?>:</b>
	<?php echo CHtml::encode($data->resumen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('objective')); ?>:</b>
	<?php echo CHtml::encode($data->objective); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contribution')); ?>:</b>
	<?php echo CHtml::encode($data->contribution); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('impact_value')); ?>:</b>
	<?php echo CHtml::encode($data->valor_impacto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('innovation_trascen')); ?>:</b>
	<?php echo CHtml::encode($data->innovation_trascen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('transfer_mechanism')); ?>:</b>
	<?php echo CHtml::encode($data->transfer_mechanism); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hr_formation')); ?>:</b>
	<?php echo CHtml::encode($data->hr_formation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('economic_support')); ?>:</b>
	<?php echo CHtml::encode($data->economic_support); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('path')); ?>:</b>
	<?php echo CHtml::encode($data->path); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creation_date')); ?>:</b>
	<?php echo CHtml::encode($data->creation_date); ?>
	<br />

	*/ ?>

</div>