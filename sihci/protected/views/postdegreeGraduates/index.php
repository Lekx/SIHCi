<?php
/* @var $this PostdegreeGraduatesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Postdegree Graduates',
);

$this->menu=array(
	array('label'=>'Create PostdegreeGraduates', 'url'=>array('create')),
	array('label'=>'Manage PostdegreeGraduates', 'url'=>array('admin')),
);
?>

<h1>Postdegree Graduates</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
