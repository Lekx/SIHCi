<?php
/* @var $this PostdegreeGraduatesController */
/* @var $model PostdegreeGraduates */

$this->breadcrumbs=array(
	'Postdegree Graduates'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Crear', 'url'=>array('create')),
	array('label'=>'Gestionar', 'url'=>array('admin')),
);
?>

<h1>Registro con fecha 	<?php echo var_export(substr($model->creation_date, 0, 10), true).PHP_EOL; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', 

	array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_curriculum',
		'fullname',
	),
)); 
 
 
?>


