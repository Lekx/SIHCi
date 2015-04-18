<?php
/* @var $this BooksChaptersController */
/* @var $data BooksChapters */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_curriculum')); ?>:</b>
	<?php echo CHtml::encode($data->id_curriculum); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('chapter_title')); ?>:</b>
	<?php echo CHtml::encode($data->chapter_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('book_title')); ?>:</b>
	<?php echo CHtml::encode($data->book_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('publishing_year')); ?>:</b>
	<?php echo CHtml::encode($data->publishing_year); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('publishers')); ?>:</b>
	<?php echo CHtml::encode($data->publishers); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('editorial')); ?>:</b>
	<?php echo CHtml::encode($data->editorial); ?>
	<br />

	
	<b><?php echo CHtml::encode($data->getAttributeLabel('volume')); ?>:</b>
	<?php echo CHtml::encode($data->volume); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pages')); ?>:</b>
	<?php echo CHtml::encode($data->pages); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('citations')); ?>:</b>
	<?php echo CHtml::encode($data->citations); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_of_authors')); ?>:</b>
	<?php echo CHtml::encode($data->total_of_authors); ?>
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


    <?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('creation_date')); ?>:</b>
	<?php echo CHtml::encode($data->creation_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('url_doc')); ?>:</b>
    <?php echo CHtml::encode($data->url_doc); ?>
    <br />

	*/ ?>

</div>