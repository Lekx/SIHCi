<?php
/* @var $this ResearchAreasController */
/* @var $dataProvider CActiveDataProvider */



$this->menu=array(
	array('label'=>'Create ResearchAreas', 'url'=>array('create')),
	array('label'=>'Manage ResearchAreas', 'url'=>array('admin')),
);
?>

<h1>Research Areases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
