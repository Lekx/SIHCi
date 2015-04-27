<?php
/* @var $this CopyrightsController */
/* @var $model Copyrights */

$this->breadcrumbs=array(
	'Copyrights'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'Gestionar', 'url'=>array('admin')),
	array('label'=>'Crear', 'url'=>array('create')),
	
);
?>

<h1>Registro <?php echo $model->title ?></h1>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'participation_type',
		'title',
		'application_date',
		'step_number',
		'resume',
		'beneficiary',
		'entity',
		'impact_value',
		'creation_date',
		/*'id',
		'id_curriculum',*/
	),
)); ?>