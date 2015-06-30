

<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div style="float:left;width: 20%;">
		
		<?php echo CHtml::link('Datos Personales',array('/curriculumVitae/personalData')); ?><br>
		<?php echo CHtml::link('Documentos Oficiales',array('/curriculumVitae/docsIdentity')); ?><br>
		<?php echo CHtml::link('Datos de Direccion Actual',array('/curriculumVitae/addresses')); ?><br>
		<?php echo CHtml::link('Datos Laborales',array('/curriculumVitae/jobs')); ?><br>
		<?php echo CHtml::link('Líneas de Investigación',array('/curriculumVitae/researchAreas')); ?><br>
		<?php echo CHtml::link('Datos de Contacto',array('/curriculumVitae/phones')); ?><br>
		<?php echo CHtml::link('Formacion Académica',array('/curriculumVitae/grades')); ?><br>
		<?php echo CHtml::link('Nombramientos',array('/curriculumVitae/commission')); ?><br>
</div>
<div style="float:left; width: 80%;">

	<div id="content">
		<?php echo $content; ?>
	</div>
</div>

	

<?php $this->endContent(); ?>