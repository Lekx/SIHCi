<?php
/* @var $this CopyrightsController */
/* @var $model Copyrights */

$this->breadcrumbs=array(
	'Copyrights'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'Crear', 'url'=>array('create')),
	array('label'=>'Gestionar', 'url'=>array('admin')),
	//array('label'=>'Desplegar', 'url'=>array('index')),
	//array('label'=>'Modificar', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Eliminar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>Registro con fecha 	<?php echo var_export(substr($model->creation_date, 0, 10), true).PHP_EOL;?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'participation_type',
		'title',
		'application_date',
		'step_number',
		'resume',
		'beneficiary',
		'entity',
		'impact_value',
		'creation_date',
		/*'id',
		'id_curriculum',*/
	),
)); ?>