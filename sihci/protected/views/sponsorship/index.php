<?php
/* @var $this SponsorshipController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sponsorships',
);

$this->menu=array(
	array('label'=>'Create Sponsorship', 'url'=>array('create')),
	array('label'=>'Manage Sponsorship', 'url'=>array('admin')),
);
?>

<h1>Sponsorships</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
