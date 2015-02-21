<?php
/* @var $this FilesManagerController */
/* @var $model FilesManager */

$this->breadcrumbs=array(
	'Files Managers'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FilesManager', 'url'=>array('index')),
	array('label'=>'Create FilesManager', 'url'=>array('create')),
	array('label'=>'View FilesManager', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage FilesManager', 'url'=>array('admin')),
);
?>

<h1>Update FilesManager <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>