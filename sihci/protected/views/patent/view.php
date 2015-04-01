<?php
/* @var $this PatentController */
/* @var $model Patent */

$this->breadcrumbs=array(
	'Patents'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Patent', 'url'=>array('index')),
	array('label'=>'Crear Patent', 'url'=>array('create')),
	array('label'=>'Update Patent', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Patent', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Patent', 'url'=>array('admin')),
);
?>

<h1>Registro #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_curriculum',
		'country',
		'participation_type',
		'name',
		'state',
		'application_type',
		'application_number',
		'patent_type',
		'consession_date',
		'record',
		'presentation_date',
		'international_clasification',
		'title',
		'owner',
		'resumen',
		'industrial_exploitation',
		'resource_operator',
	),
)); ?>
