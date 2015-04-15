<?php
/* @var $this SystemLogController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'System Logs',
);

$this->menu=array(
	array('label'=>'Create SystemLog', 'url'=>array('create')),
	array('label'=>'Manage SystemLog', 'url'=>array('admin')),
);
?>

<h1>System Logs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
