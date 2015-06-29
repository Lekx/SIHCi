<?php
/* @var $this CongressesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Congresses',
);

$this->menu=array(
	array('label'=>'Crear ', 'url'=>array('create')),
	array('label'=>'Gestionar', 'url'=>array('admin')),
);
?>


<h1>Participaci&oacuten en Congresos</h1>


<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
