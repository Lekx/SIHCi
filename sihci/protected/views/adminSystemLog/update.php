<?php
/* @var $this AdminSystemLogController */
/* @var $model SystemLog */

$this->breadcrumbs=array(
	'Gestionar'=>array('index'),
	'Modificar',
);

$this->menu=array(
	//array('label'=>'List SystemLog', 'url'=>array('index')),
	array('label'=>'Detalles', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gestionar', 'url'=>array('admin')),
);
?>

<h4>Modificar Registro <?php echo $model->id." de:  ".$person->names." ".$person->last_name1." ".$person->last_name2.""; ?></h4>



<?php $this->renderPartial('_form', array('model'=>$model, )); ?>