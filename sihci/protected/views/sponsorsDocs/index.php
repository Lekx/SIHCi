<?php
/* @var $this SponsorsDocsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sponsors Docs',
);

$this->menu=array(
	array('label'=>'Create SponsorsDocs', 'url'=>array('create')),
	array('label'=>'Manage SponsorsDocs', 'url'=>array('admin')),
);
?>

<h1>Sponsors Docs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
