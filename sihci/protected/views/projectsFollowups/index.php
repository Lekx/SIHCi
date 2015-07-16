<?php
/* @var $this ProjectsFollowupsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Projects Followups',
);

$this->menu=array(
	array('label'=>'Create ProjectsFollowups', 'url'=>array('create')),
	array('label'=>'Manage ProjectsFollowups', 'url'=>array('admin')),
);
?>

<h1>Projects Followups</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
