<?php
/* @var $this CopyrightsController */
/* @var $dataProvider CActiveDataProvider */



$this->menu=array(
	array('label'=>'Create Copyrights', 'url'=>array('create')),
	array('label'=>'Manage Copyrights', 'url'=>array('admin')),
);
?>

<h1>Copyrights</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
