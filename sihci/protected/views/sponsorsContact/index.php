<?php
/* @var $this SponsorsContactController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sponsors Contacts',
);

$this->menu=array(
	array('label'=>'Create SponsorsContact', 'url'=>array('create')),
	array('label'=>'Manage SponsorsContact', 'url'=>array('admin')),
);
?>

<h1>Sponsors Contacts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
