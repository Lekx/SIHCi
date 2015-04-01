<?php
/* @var $this PatentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Patents',
);

$this->menu=array(
	array('label'=>'Crear Patent', 'url'=>array('create')),
	array('label'=>'Manage Patent', 'url'=>array('admin')),
);
?>

<h1>Patents</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
