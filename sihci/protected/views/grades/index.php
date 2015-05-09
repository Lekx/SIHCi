<?php
/* @var $this GradesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Grades',
);

$this->menu=array(
	array('label'=>'Create Grades', 'url'=>array('create')),
	array('label'=>'Manage Grades', 'url'=>array('admin')),
);
?>

<h1>Grades</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
