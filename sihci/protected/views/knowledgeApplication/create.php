<?php
/* @var $this KnowledgeApplicationController */
/* @var $model KnowledgeApplication */

$this->breadcrumbs=array(
	'Knowledge Applications'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List KnowledgeApplication', 'url'=>array('index')),
	array('label'=>'Manage KnowledgeApplication', 'url'=>array('admin')),
);
?>

<h1>Create KnowledgeApplication</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>