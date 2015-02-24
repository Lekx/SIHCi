<?php
/* @var $this PersonsController */
/* @var $data Persons */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_user')); ?>:</b>
	<?php echo CHtml::encode($data->id_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('names')); ?>:</b>
	<?php echo CHtml::encode($data->names); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_name1')); ?>:</b>
	<?php echo CHtml::encode($data->last_name1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_name2')); ?>:</b>
	<?php echo CHtml::encode($data->last_name2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('marital_status')); ?>:</b>
	<?php echo CHtml::encode($data->marital_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('genre')); ?>:</b>
	<?php echo CHtml::encode($data->genre); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('birth_date')); ?>:</b>
	<?php echo CHtml::encode($data->birth_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rfc_rud')); ?>:</b>
	<?php echo CHtml::encode($data->rfc_rud); ?>
	<br />

	*/ ?>

</div>