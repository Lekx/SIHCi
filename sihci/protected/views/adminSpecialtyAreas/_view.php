<?php
/* @var $this AdminSpecialtyAreasController */
/* @var $data AdminSpecialtyAreas */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('specialty')); ?>:</b>
	<?php echo CHtml::encode($data->specialty); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subspecialty')); ?>:</b>
	<?php echo CHtml::encode($data->subspecialty); ?>
	<br />


</div>