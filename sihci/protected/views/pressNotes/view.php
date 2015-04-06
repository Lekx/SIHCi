<?php
/* @var $this PressNotesController */
/* @var $model PressNotes */

$this->breadcrumbs=array(
	'Press Notes'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List PressNotes', 'url'=>array('index')),
	array('label'=>'Create PressNotes', 'url'=>array('create')),
	array('label'=>'Update PressNotes', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PressNotes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Esta usted seguro de eliminar este registro?')),
	array('label'=>'Manage PressNotes', 'url'=>array('admin')),
);
?>

<h1>Registro #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_curriculum',
		'type',
		'directed_to',
		'date',
		'title',
		'responsible_agency',
		'notas_periodisticas',
		'is_national',
		'key_words',
	),
)); ?>
