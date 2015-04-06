<?php
/* @var $this SponsorsController */
/* @var $data Sponsors */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_user')); ?>:</b>
	<?php echo CHtml::encode($data->id_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_address')); ?>:</b>
	<?php echo CHtml::encode($data->id_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sponsor_name')); ?>:</b>
	<?php echo CHtml::encode($data->sponsor_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('website')); ?>:</b>
	<?php echo CHtml::encode($data->website); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sector')); ?>:</b>
	<?php echo CHtml::encode($data->sector); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('class')); ?>:</b>
	<?php echo CHtml::encode($data->class); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('branch')); ?>:</b>
	<?php echo CHtml::encode($data->branch); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('main_activity')); ?>:</b>
	<?php echo CHtml::encode($data->main_activity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('legal_structure')); ?>:</b>
	<?php echo CHtml::encode($data->legal_structure); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employeess_number')); ?>:</b>
	<?php echo CHtml::encode($data->employeess_number); ?>
	<br />

	*/ ?>

</div>