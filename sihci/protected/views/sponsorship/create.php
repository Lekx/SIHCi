<?php
/* @var $this SponsorshipController */
/* @var $model Sponsorship */

$this->breadcrumbs=array(
	'Sponsorships'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Sponsorship', 'url'=>array('index')),
	array('label'=>'Manage Sponsorship', 'url'=>array('admin')),
);
?>

<h1>Create Sponsorship</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>