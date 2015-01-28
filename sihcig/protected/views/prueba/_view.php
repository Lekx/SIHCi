<?php
/* @var $this PruebaController */
/* @var $data Prueba */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sexo')); ?>:</b>
	<?php echo CHtml::encode($data->sexo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('orientacion')); ?>:</b>
	<?php echo CHtml::encode($data->orientacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estaensusdias')); ?>:</b>
	<?php echo CHtml::encode($data->estaensusdias); ?>
	<br />


</div>