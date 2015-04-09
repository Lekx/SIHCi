<?php
/* @var $this DirectedThesisController */
/* @var $data DirectedThesis */
?>

<div class="view">

	<!-- <b><?php /* echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); */ ?>
	<br /> -->

	<!-- <b><?php /* echo CHtml::encode($data->getAttributeLabel('id_curriculum')); ?>:</b>
    <?php echo CHtml::encode($data->id_curriculum); */ ?>
    <br /> -->

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('conclusion_date')); ?>:</b>
	<?php echo CHtml::encode($data->conclusion_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('author')); ?>:</b>
	<?php echo CHtml::encode($data->author); ?>
	<br />

	<!-- <b><?php /* echo CHtml::encode($data->getAttributeLabel('path')); ?>:</b>
	<?php echo CHtml::encode($data->path); */ ?>
	<br /> -->

	<b><?php echo CHtml::encode($data->getAttributeLabel('grade')); ?>:</b>
	<?php echo CHtml::encode($data->grade);  ?>
	<br />

	
	<b><?php echo CHtml::encode($data->getAttributeLabel('sector')); ?>:</b>
	<?php echo CHtml::encode($data->sector); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('organization')); ?>:</b>
	<?php echo CHtml::encode($data->organization); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('second_level')); ?>:</b>
	<?php echo CHtml::encode($data->second_level); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('area')); ?>:</b>
	<?php echo CHtml::encode($data->area); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('discipline')); ?>:</b>
	<?php echo CHtml::encode($data->discipline); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subdiscipline')); ?>:</b>
	<?php echo CHtml::encode($data->subdiscipline); ?>
	<br />

	

</div>