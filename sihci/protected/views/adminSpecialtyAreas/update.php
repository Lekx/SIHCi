<?php
/* @var $this AdminSpecialtyAreasController */
/* @var $model AdminSpecialtyAreas */

$this->breadcrumbs=array(
	'Admin Specialty Areases'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Gestionar', 'url'=>array('admin')),
	array('label'=>'Crear', 'url'=>array('create')),
);
?>

<h1>Modificar <?php echo $model->specialty; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'modelSpecialtyAreas'=>$modelSpecialtyAreas,'modelSpecialtyArea'=>$modelSpecialtyArea)); ?>