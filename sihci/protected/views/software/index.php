<?php
/* @var $this SoftwareController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Softwares',
);

$this->menu=array(
	array('label'=>'Evaluación CV', 'url'=>array('EvaluateCV/index')),
	array('label'=>'Gestionar', 'url'=>array('admin')),
	array('label'=>'Crear', 'url'=>array('create')),
);
?>

<h1>Registro de propiedad intelectual: Software</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
