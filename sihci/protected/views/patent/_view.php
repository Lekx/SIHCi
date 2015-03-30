<?php
/* @var $this PatentController */
/* @var $data Patent */
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('state')); ?>:</b>
	<?php echo CHtml::encode($data->state); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('application_type')); ?>:</b>
	<?php echo CHtml::encode($data->application_type); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('application_number')); ?>:</b>
	<?php echo CHtml::encode($data->application_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('patent_type')); ?>:</b>
	<?php echo CHtml::encode($data->patent_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('consession_date')); ?>:</b>
	<?php echo CHtml::encode($data->consession_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('record')); ?>:</b>
	<?php echo CHtml::encode($data->record); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('presentation_date')); ?>:</b>
	<?php echo CHtml::encode($data->presentation_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('international_clasification')); ?>:</b>
	<?php echo CHtml::encode($data->international_clasification); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('owner')); ?>:</b>
	<?php echo CHtml::encode($data->owner); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('resumen')); ?>:</b>
	<?php echo CHtml::encode($data->resumen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('industrial_exploitation')); ?>:</b>
	<?php echo CHtml::encode($data->industrial_exploitation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('resource_operator')); ?>:</b>
	<?php echo CHtml::encode($data->resource_operator); ?>
	<br />

	*/ ?>

</div>