<?php
/* @var $this DomiciliosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Domicilioses',
);

$this->menu=array(
	array('label'=>'Create Domicilios', 'url'=>array('create')),
	array('label'=>'Manage Domicilios', 'url'=>array('admin')),
);
?>

<h1>Domicilioses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
