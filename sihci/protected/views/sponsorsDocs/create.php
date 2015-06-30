<?php
/* @var $this SponsorsDocsController */
/* @var $model SponsorsDocs */

$this->breadcrumbs=array(
	'Sponsors Docs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SponsorsDocs', 'url'=>array('index')),
	array('label'=>'Manage SponsorsDocs', 'url'=>array('admin')),
);
?>

<h1>Create SponsorsDocs</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>