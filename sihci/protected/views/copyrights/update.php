<?php
/* @var $this CopyrightsController */
/* @var $model Copyrights */

$this->breadcrumbs=array(
	'Copyrights'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	//array('label'=>'Desplegar', 'url'=>array('index')),
	array('label'=>'Crear', 'url'=>array('create')),
	array('label'=>'Gestionar', 'url'=>array('admin')),
);
?>
<h1>Registro con fecha 	<?php echo var_export(substr($model->creation_date, 0, 10), true).PHP_EOL;?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>