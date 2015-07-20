<?php
/* @var $this ProjectsFollowupsController */
/* @var $data ProjectsFollowups */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_project')); ?>:</b>
	<?php echo CHtml::encode($data->id_project); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_user')); ?>:</b>
	<?php echo CHtml::encode($data->id_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('followup')); ?>:</b>
	<?php echo CHtml::encode($data->followup); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('url_doc')); ?>:</b>
	<?php echo CHtml::encode($data->url_doc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creation_date')); ?>:</b>
	<?php echo CHtml::encode($data->creation_date); ?>
	<br />


</div>