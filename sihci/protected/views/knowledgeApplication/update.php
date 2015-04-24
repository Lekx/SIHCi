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
	array('label'=>'Gestionar', 'url'=>array('admin')),
);
?>

<h1>Registro con fecha 	<?php echo var_export(substr($model->creation_date, 0, 10), true).PHP_EOL;?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>