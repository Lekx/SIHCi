<?php
/* @var $this EmailsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Emails',
);

$this->menu=array(
	array('label'=>'Create Emails', 'url'=>array('create')),
	array('label'=>'Manage Emails', 'url'=>array('admin')),
);
?>

<h1>Emails</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
