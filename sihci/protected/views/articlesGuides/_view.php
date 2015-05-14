<?php
/* @var $this ArticlesGuidesController */
/* @var $data ArticlesGuides */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_resume')); ?>:</b>
	<?php echo CHtml::encode($data->id_resume); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isbn')); ?>:</b>
	<?php echo CHtml::encode($data->isbn); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('editorial')); ?>:</b>
	<?php echo CHtml::encode($data->editorial); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('edicion')); ?>:</b>
	<?php echo CHtml::encode($data->edicion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('publishing_year')); ?>:</b>
	<?php echo CHtml::encode($data->publishing_year); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('volumen')); ?>:</b>
	<?php echo CHtml::encode($data->volumen); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('volumen_no')); ?>:</b>
	<?php echo CHtml::encode($data->volumen_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('start_page')); ?>:</b>
	<?php echo CHtml::encode($data->start_page); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('end_page')); ?>:</b>
	<?php echo CHtml::encode($data->end_page); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('article_type')); ?>:</b>
	<?php echo CHtml::encode($data->article_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('copies_issued')); ?>:</b>
	<?php echo CHtml::encode($data->copies_issued); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('magazine')); ?>:</b>
	<?php echo CHtml::encode($data->magazine); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('url_document')); ?>:</b>
	<?php echo CHtml::encode($data->url_document); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keywords')); ?>:</b>
	<?php echo CHtml::encode($data->keywords); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creation_date')); ?>:</b>
	<?php echo CHtml::encode($data->creation_date); ?>
	<br />

	*/ ?>

</div>