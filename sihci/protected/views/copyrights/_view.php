<?php
/* @var $this CopyrightsController */
/* @var $data Copyrights */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_curriculum')); ?>:</b>
	<?php echo CHtml::encode($data->id_curriculum); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('participation_type')); ?>:</b>
	<?php echo CHtml::encode($data->participation_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('application_date')); ?>:</b>
	<?php echo CHtml::encode($data->application_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('step_number')); ?>:</b>
	<?php echo CHtml::encode($data->step_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('resume')); ?>:</b>
	<?php echo CHtml::encode($data->resume); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('beneficiary')); ?>:</b>
	<?php echo CHtml::encode($data->beneficiary); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('entity')); ?>:</b>
	<?php echo CHtml::encode($data->entity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('impact_value')); ?>:</b>
	<?php echo CHtml::encode($data->impact_value); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creation_date')); ?>:</b>
	<?php echo CHtml::encode($data->creation_date); ?>
	<br />

	*/ ?>

</div>