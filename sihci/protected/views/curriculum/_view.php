<?php
/* @var $this CurriculumController */
/* @var $data Curriculum */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_user')); ?>:</b>
	<?php echo CHtml::encode($data->id_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_actual_address')); ?>:</b>
	<?php echo CHtml::encode($data->id_actual_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('native_country')); ?>:</b>
	<?php echo CHtml::encode($data->native_country); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('native_language')); ?>:</b>
	<?php echo CHtml::encode($data->native_language); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SNI')); ?>:</b>
	<?php echo CHtml::encode($data->SNI); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('researcher_title')); ?>:</b>
	<?php echo CHtml::encode($data->researcher_title); ?>
	<br />

	*/ ?>

</div>