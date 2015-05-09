<?php
/* @var $this CurriculumController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Curriculums',
);

$this->menu=array(
	array('label'=>'Create Curriculum', 'url'=>array('create')),
	array('label'=>'Manage Curriculum', 'url'=>array('admin')),
);
?>

<h1>Curriculums</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
