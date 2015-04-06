

<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div style="float:left;width: 20%;">
		
		<?php echo CHtml::link('Datos Personales',array('/sponsors/sponsorsInfo')); ?><br>
		<?php echo CHtml::link('Documentos Oficiales',array('/sponsors/create_docs')); ?><br>
		<?php echo CHtml::link('Datos de Direccion Actual',array('/sponsors/create_persons')); ?><br>
		<?php echo CHtml::link('Datos Laborales',array('/sponsors/create_billing')); ?><br>
		<?php echo CHtml::link('Líneas de Investigación',array('/sponsors/create_contact')); ?><br>
		<?php echo CHtml::link('Datos de Contacto',array('/sponsors/create_contact')); ?><br>
		<?php echo CHtml::link('Formacion Académica',array('/sponsors/create_contact')); ?><br>
		<?php echo CHtml::link('Nombramientos',array('/sponsors/create_contact')); ?><br>
</div>
<div style="float:left; width: 80%;">

	<div id="content">
		<?php echo $content; ?>
	</div>
</div>

	

<?php $this->endContent(); ?>