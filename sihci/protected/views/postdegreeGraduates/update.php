<?php
/* @var $this PostdegreeGraduatesController */
/* @var $model PostdegreeGraduates */

$this->breadcrumbs=array(
	'Postdegree Graduates'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PostdegreeGraduates', 'url'=>array('index')),
	array('label'=>'Create PostdegreeGraduates', 'url'=>array('create')),
	array('label'=>'View PostdegreeGraduates', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage PostdegreeGraduates', 'url'=>array('admin')),
);
?>

<h1>Update PostdegreeGraduates <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>