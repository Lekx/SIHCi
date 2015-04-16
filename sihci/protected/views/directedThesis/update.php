<?php
/* @var $this DirectedThesisController */
/* @var $model DirectedThesis */

$this->breadcrumbs=array(
	'Directed Thesises'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Tesis', 'url'=>array('index')),
	array('label'=>'Crear Tesis', 'url'=>array('create')),
	array('label'=>'Ver Tesis', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Tesis', 'url'=>array('admin')),
);
?>

<h1>Actualizar Tesis <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>