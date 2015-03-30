<?php
/* @var $this KnowledgeApplicationController */
/* @var $model KnowledgeApplication */

$this->breadcrumbs=array(
	'Knowledge Applications'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Crear', 'url'=>array('create')),
	array('label'=>'Ver', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Desplegar', 'url'=>array('index')),
	array('label'=>'Listar', 'url'=>array('admin')),
);
?>

<h1>Editar <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>