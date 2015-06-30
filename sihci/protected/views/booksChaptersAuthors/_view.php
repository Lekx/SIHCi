<?php
/* @var $this BooksChaptersAuthorsController */
/* @var $data BooksChaptersAuthors */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_art_guides')); ?>:</b>
	<?php echo CHtml::encode($data->id_art_guides); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('position')); ?>:</b>
	<?php echo CHtml::encode($data->position); ?>
	<br />


</div>