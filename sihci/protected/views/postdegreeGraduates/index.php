<?php
/* @var $this PostdegreeGraduatesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Postdegree Graduates',
);

$this->menu=array(
	array('label'=>'Crear', 'url'=>array('create')),
	array('label'=>'Gestionar', 'url'=>array('admin')),
);
?>

<h1>Graduados de posgrado</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
