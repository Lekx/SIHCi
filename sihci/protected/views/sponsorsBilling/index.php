<?php
/* @var $this SponsorsBillingController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sponsors Billings',
);

$this->menu=array(
	array('label'=>'Create SponsorsBilling', 'url'=>array('create')),
	array('label'=>'Manage SponsorsBilling', 'url'=>array('admin')),
);
?>

<h1>Sponsors Billings</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
