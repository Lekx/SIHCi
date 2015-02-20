<?php
/* @var $this PaisesController */
/* @var $data Paises */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pais')); ?>:</b>
	<?php echo CHtml::encode($data->pais); ?>
	<br />


</div>