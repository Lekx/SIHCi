<?php
/* @var $this SponsorsBillingController */
/* @var $model SponsorsBilling */

$this->breadcrumbs=array(
	'Sponsors Billings'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SponsorsBilling', 'url'=>array('index')),
	array('label'=>'Create SponsorsBilling', 'url'=>array('create')),
	array('label'=>'View SponsorsBilling', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SponsorsBilling', 'url'=>array('admin')),
);
?>

<h1>Update SponsorsBilling <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>