

<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div style="float:left;width: 20%;">
		
		<?php echo CHtml::link('Datos Empresa',array('/sponsors/sponsorsInfo')); ?><br>
		<?php echo CHtml::link('Documentos Probatorios',array('/sponsors/create_docs')); ?><br>
		<?php echo CHtml::link('Datos de Representante',array('/sponsors/create_persons')); ?><br>
		<?php echo CHtml::link('Datos de Facturacion',array('/sponsors/create_billing')); ?><br>
		<?php echo CHtml::link('Datos de Contacto',array('/sponsors/create_contact')); ?><br>
		<?php echo CHtml::link('Datos de Contactos',array('/sponsors/create_contacts')); ?><br>
</div>
<div style="float:left; width: 80%;">

	<div id="content">
		<?php echo $content; ?>
	</div>
</div>

	

<?php $this->endContent(); ?>