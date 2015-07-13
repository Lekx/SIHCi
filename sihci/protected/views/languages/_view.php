<?php
/* @var $this LanguagesController */
/* @var $data Languages */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_curriculum')); ?>:</b>
	<?php echo CHtml::encode($data->id_curriculum); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('language')); ?>:</b>
	<?php echo CHtml::encode($data->language); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('native_language')); ?>:</b>
	<?php echo CHtml::encode($data->native_language); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_traducer')); ?>:</b>
	<?php echo CHtml::encode($data->is_traducer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_teacher')); ?>:</b>
	<?php echo CHtml::encode($data->is_teacher); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('conversational_level')); ?>:</b>
	<?php echo CHtml::encode($data->conversational_level); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reading_level')); ?>:</b>
	<?php echo CHtml::encode($data->reading_level); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('writting_level')); ?>:</b>
	<?php echo CHtml::encode($data->writting_level); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('evaluation_date')); ?>:</b>
	<?php echo CHtml::encode($data->evaluation_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('document_percentage')); ?>:</b>
	<?php echo CHtml::encode($data->document_percentage); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('path')); ?>:</b>
	<?php echo CHtml::encode($data->path); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creation_date')); ?>:</b>
	<?php echo CHtml::encode($data->creation_date); ?>
	<br />

	*/ ?>

</div>