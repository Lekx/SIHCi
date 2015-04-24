<?php
/* @var $this KnowledgeApplicationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Knowledge Applications',
);

$this->menu=array(
	array('label'=>'Crear', 'url'=>array('create')),
	array('label'=>'Gestionar', 'url'=>array('admin')),
);
?>

<h1>Gestionar Aplicación del Conocimiento:</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
