<?php
/* @var $this SponsorsDocsController */
/* @var $model SponsorsDocs */

$this->breadcrumbs=array(
	'Sponsors Docs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SponsorsDocs', 'url'=>array('index')),
	array('label'=>'Create SponsorsDocs', 'url'=>array('create')),
	array('label'=>'Update SponsorsDocs', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SponsorsDocs', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SponsorsDocs', 'url'=>array('admin')),
);
?>

<h1>View SponsorsDocs #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_sponsor',
		'file_name',
		'path',
	),
)); ?>
