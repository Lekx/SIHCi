<?php
/* @var $this ResearchAreasController */
/* @var $model ResearchAreas */


$this->menu=array(
	array('label'=>'List ResearchAreas', 'url'=>array('index')),
	array('label'=>'Manage ResearchAreas', 'url'=>array('admin')),
);
?>

<h1>Líneas de Investigación</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
