<?php
/* @var $this SponsorsContactsController */
/* @var $model SponsorsContacts */

$this->breadcrumbs=array(
	'Sponsors Contacts'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SponsorsContacts', 'url'=>array('index')),
	array('label'=>'Create SponsorsContacts', 'url'=>array('create')),
	array('label'=>'Update SponsorsContacts', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SponsorsContacts', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SponsorsContacts', 'url'=>array('admin')),
);
?>

<h1>View SponsorsContacts #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_sponsor',
		'fullname',
	),
)); ?>
