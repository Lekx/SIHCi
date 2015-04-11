<?php
/* @var $this SponsorsContactsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sponsors Contacts',
);

$this->menu=array(
	array('label'=>'Create SponsorsContacts', 'url'=>array('create')),
	array('label'=>'Manage SponsorsContacts', 'url'=>array('admin')),
);
?>

<h1>Sponsors Contacts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
