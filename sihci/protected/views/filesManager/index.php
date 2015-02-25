<?php
/* @var $this FilesManagerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Files Managers',
);

$this->menu=array(
	array('label'=>'Create FilesManager', 'url'=>array('create')),
	array('label'=>'Manage FilesManager', 'url'=>array('admin')),
);
?>

<h1>Files Managers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
