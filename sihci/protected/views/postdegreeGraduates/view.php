<?php
/* @var $this PostdegreeGraduatesController */
/* @var $model PostdegreeGraduates */

$this->breadcrumbs=array(
	'Postdegree Graduates'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PostdegreeGraduates', 'url'=>array('index')),
	array('label'=>'Create PostdegreeGraduates', 'url'=>array('create')),
	array('label'=>'Update PostdegreeGraduates', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PostdegreeGraduates', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Esta usted seguro de desactivar/eliminar este registro?')),
	array('label'=>'Manage PostdegreeGraduates', 'url'=>array('admin')),
);
?>

<h1>Registro. #<?php echo $model->id; ?></h1>

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


