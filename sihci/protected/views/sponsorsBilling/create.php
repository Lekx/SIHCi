<?php
/* @var $this SponsorsBillingController */
/* @var $model SponsorsBilling */

$this->breadcrumbs=array(
	'Sponsors Billings'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SponsorsBilling', 'url'=>array('index')),
	array('label'=>'Manage SponsorsBilling', 'url'=>array('admin')),
);
?>

<h1>Create SponsorsBilling</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>