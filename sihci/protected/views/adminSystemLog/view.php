<?php
/* @var $this AdminSystemLogController */
/* @var $model SystemLog */

$this->breadcrumbs=array(
	'Gestionar'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Modificar Registro', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Gestionar', 'url'=>array('admin')),
);
?>

<h1>Detalles de la Acción <?php echo $model->id; ?></h1>

<?php 
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$person,
	'attributes'=>array(
		'names',
		'last_name1',
		'last_name2',

	),
)); 
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$user,
	'attributes'=>array(
		'id_roles',
		'email',

	),
)); 
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_user',
		'section',
		'details',
		'action',
		'datetime',
	),
)); 


?>
