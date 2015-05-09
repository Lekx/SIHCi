<?php
/* @var $this SponsorshipController */
/* @var $model Sponsorship */

$this->breadcrumbs=array(
	'Sponsorships'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Sponsorship', 'url'=>array('index')),
	array('label'=>'Create Sponsorship', 'url'=>array('create')),
	array('label'=>'View Sponsorship', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Sponsorship', 'url'=>array('admin')),
);
?>

<h1>Update Sponsorship <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>