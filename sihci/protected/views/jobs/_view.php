<?php
/* @var $this JobsController */
/* @var $data Jobs */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_curriculum')); ?>:</b>
	<?php echo CHtml::encode($data->id_curriculum); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('organization')); ?>:</b>
	<?php echo CHtml::encode($data->organization); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('area')); ?>:</b>
	<?php echo CHtml::encode($data->area); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('start_day')); ?>:</b>
	<?php echo CHtml::encode($data->start_day); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('start_month')); ?>:</b>
	<?php echo CHtml::encode($data->start_month); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('start_year')); ?>:</b>
	<?php echo CHtml::encode($data->start_year); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hospital_unit')); ?>:</b>
	<?php echo CHtml::encode($data->hospital_unit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rud')); ?>:</b>
	<?php echo CHtml::encode($data->rud); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('schedule')); ?>:</b>
	<?php echo CHtml::encode($data->schedule); ?>
	<br />

	*/ ?>

</div>