<?php
/* @var $this PostdegreeGraduatesController */
/* @var $model PostdegreeGraduates */

$this->breadcrumbs=array(
	'Postdegree Graduates'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Gestionar', 'url'=>array('admin')),
	array('label'=>'Crear', 'url'=>array('create')),
);
?>

<h1>Registro de <?php echo $model->fullname ?></h1>

<?php $this->widget('zii.widgets.CDetailView', 

	array(
	'data'=>$model,
	'attributes'=>array(
		/*'id',
		'id_curriculum',*/
		'fullname',
	),
)); 
 
 
?>


