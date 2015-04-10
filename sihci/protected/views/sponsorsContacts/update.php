<?php
/* @var $this SponsorsContactsController */
/* @var $model SponsorsContacts */

$this->breadcrumbs=array(
	'Sponsors Contacts'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SponsorsContacts', 'url'=>array('index')),
	array('label'=>'Create SponsorsContacts', 'url'=>array('create')),
	array('label'=>'View SponsorsContacts', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SponsorsContacts', 'url'=>array('admin')),
);
?>

<h1>Update SponsorsContacts <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>