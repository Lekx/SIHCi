<?php
/* @var $this PressNotesController */
/* @var $data PressNotes */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_curriculum')); ?>:</b>
	<?php echo CHtml::encode($data->id_curriculum); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('directed_to')); ?>:</b>
	<?php echo CHtml::encode($data->directed_to); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('responsible_agency')); ?>:</b>
	<?php echo CHtml::encode($data->responsible_agency); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('notas_periodisticas')); ?>:</b>
	<?php echo CHtml::encode($data->notas_periodisticas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_national')); ?>:</b>
	<?php echo CHtml::encode($data->is_national); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('key_words')); ?>:</b>
	<?php echo CHtml::encode($data->key_words); ?>
	<br />

	*/ ?>

</div>