<?php
/* @var $this CongressesController */
/* @var $data Congresses */
?>


<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('work_title')); ?>:</b>
	<?php echo CHtml::encode($data->work_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('year')); ?>:</b>
	<?php echo CHtml::encode($data->year); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('congress')); ?>:</b>
	<?php echo CHtml::encode($data->congress); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('country')); ?>:</b>
	<?php echo CHtml::encode($data->country); ?>
	<br />


</div>