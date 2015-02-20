<?php
/* @var $this DomiciliosController */
/* @var $data Domicilios */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pais')); ?>:</b>
	<?php echo CHtml::encode($data->id_pais); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cp')); ?>:</b>
	<?php echo CHtml::encode($data->cp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('delegacion')); ?>:</b>
	<?php echo CHtml::encode($data->delegacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('municipio')); ?>:</b>
	<?php echo CHtml::encode($data->municipio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('colonia')); ?>:</b>
	<?php echo CHtml::encode($data->colonia); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('calle')); ?>:</b>
	<?php echo CHtml::encode($data->calle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numero_ext')); ?>:</b>
	<?php echo CHtml::encode($data->numero_ext); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numero_int')); ?>:</b>
	<?php echo CHtml::encode($data->numero_int); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ciudad')); ?>:</b>
	<?php echo CHtml::encode($data->ciudad); ?>
	<br />

	*/ ?>

</div>