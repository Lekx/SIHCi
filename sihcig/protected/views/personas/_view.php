<?php
/* @var $this PersonasController */
/* @var $data Personas */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario')); ?>:</b>
	<?php echo CHtml::encode($data->id_usuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombres')); ?>:</b>
	<?php echo CHtml::encode($data->nombres); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('a_paterno')); ?>:</b>
	<?php echo CHtml::encode($data->a_paterno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('a_materno')); ?>:</b>
	<?php echo CHtml::encode($data->a_materno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('edo_civil')); ?>:</b>
	<?php echo CHtml::encode($data->edo_civil); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sexo')); ?>:</b>
	<?php echo CHtml::encode($data->sexo); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_nacimiento')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_nacimiento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rfc_rud')); ?>:</b>
	<?php echo CHtml::encode($data->rfc_rud); ?>
	<br />

	*/ ?>

</div>