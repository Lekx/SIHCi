<?php
/* @var $this PatentController */
/* @var $model Patent */

$this->breadcrumbs=array(
	'Patents'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Patent', 'url'=>array('index')),
	array('label'=>'Crear Patent', 'url'=>array('create')),
	array('label'=>'View Patent', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Patent', 'url'=>array('admin')),
);
?>

<h1>Editar  <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>