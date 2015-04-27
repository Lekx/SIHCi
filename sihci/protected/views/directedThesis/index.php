<?php
/* @var $this DirectedThesisController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Directed Thesises',
);

$this->menu=array(
	array('label'=>'Crear', 'url'=>array('create')),
	array('label'=>'Gestionar', 'url'=>array('admin')),
);
?>

<h1>Tesis Dirigida</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
