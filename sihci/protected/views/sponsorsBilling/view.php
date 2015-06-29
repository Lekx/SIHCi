<?php
/* @var $this SponsorsBillingController */
/* @var $model SponsorsBilling */

$this->breadcrumbs=array(
	'Sponsors Billings'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List SponsorsBilling', 'url'=>array('index')),
	array('label'=>'Create SponsorsBilling', 'url'=>array('create')),
	array('label'=>'Update SponsorsBilling', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SponsorsBilling', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SponsorsBilling', 'url'=>array('admin')),
);
?>

<h1>View SponsorsBilling #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_sponsor',
		'id_address_billing',
		'name',
		'rfc',
		'email',
	),
)); ?>
