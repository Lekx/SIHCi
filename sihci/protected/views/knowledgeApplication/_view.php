<?php
/* @var $this KnowledgeApplicationController */
/* @var $data KnowledgeApplication */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_curriculum')); ?>:</b>
	<?php echo CHtml::encode($data->id_curriculum); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('term1')); ?>:</b>
	<?php echo CHtml::encode($data->term1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('term2')); ?>:</b>
	<?php echo CHtml::encode($data->term2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('term3')); ?>:</b>
	<?php echo CHtml::encode($data->term3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('term4')); ?>:</b>
	<?php echo CHtml::encode($data->term4); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('term5')); ?>:</b>
	<?php echo CHtml::encode($data->term5); ?>
	<br />


</div>