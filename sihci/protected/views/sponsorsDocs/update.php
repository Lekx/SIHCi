<?php
/* @var $this SponsorsDocsController */
/* @var $model SponsorsDocs */

$this->breadcrumbs=array(
	'Sponsors Docs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SponsorsDocs', 'url'=>array('index')),
	array('label'=>'Create SponsorsDocs', 'url'=>array('create')),
	array('label'=>'View SponsorsDocs', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SponsorsDocs', 'url'=>array('admin')),
);
?>

<h1>Update SponsorsDocs <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>