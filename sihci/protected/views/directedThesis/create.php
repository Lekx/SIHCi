<?php
/* @var $this DirectedThesisController */
/* @var $model DirectedThesis */

$this->breadcrumbs=array(
	'Directed Thesises'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'Listar Tesis', 'url'=>array('index')),
	array('label'=>'Gestionar', 'url'=>array('admin')),
);
?>

<h1>Tesis Dirigidas</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>