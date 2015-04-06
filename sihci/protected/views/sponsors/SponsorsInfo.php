<?php
/* @var $this SponsorsController */
/* @var $model Sponsors */

$this->breadcrumbs=array(
	'Sponsors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Sponsors', 'url'=>array('index')),
	array('label'=>'Manage Sponsors', 'url'=>array('admin')),
);
?>

<h1>Create Sponsors</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'modelAddresses'=>$modelAddresses,'modelPersons'=>$modelPersons)); ?>