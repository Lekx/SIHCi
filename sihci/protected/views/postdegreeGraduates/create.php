<?php
/* @var $this PostdegreeGraduatesController */
/* @var $model PostdegreeGraduates */

$this->breadcrumbs=array(
	'Postdegree Graduates'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PostdegreeGraduates', 'url'=>array('index')),
	array('label'=>'Manage PostdegreeGraduates', 'url'=>array('admin')),
);
?>

<h1>Create PostdegreeGraduates</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>