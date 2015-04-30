<?php
/* @var $this ResearchAreasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Research Areases',
);

$this->menu=array(
	array('label'=>'Crear', 'url'=>array('create')),
	array('label'=>'Gestionar', 'url'=>array('admin')),
);
?>

<h1>Research Areases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
