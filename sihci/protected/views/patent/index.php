<?php
/* @var $this PatentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Patents',
);

$this->menu=array(
	array('label'=>'Evaluación CV', 'url'=>array('EvaluateCV/index')),
	array('label'=>'Gestionar', 'url'=>array('admin')),
	array('label'=>'Crear', 'url'=>array('create')),
);
?>

<h3>Propiedad intelectual: Patentes </h3>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
