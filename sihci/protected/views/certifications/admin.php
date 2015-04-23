<?php
/* @var $this CertificationsController */
/* @var $model Certifications */

$this->breadcrumbs=array(
	'Certifications'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar Certificaciones', 'url'=>array('index')),
	array('label'=>'Crear Certificaciones', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#certifications-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar Certificaciones</h1>

<?php echo CHtml::link('Búsqueda Avanzada',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'certifications-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		//'id_curriculum',
		'folio',
		'reference',
		'reference_type',
		'specialty',
		/*
		'validity_date_start',
		'validity_date_end',
		'type',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
