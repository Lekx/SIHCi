<?php
/* @var $this CopyrightsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Copyrights',
);

$this->menu=array(
	array('label'=>'Crear', 'url'=>array('create')),
	array('label'=>'Gestinar', 'url'=>array('admin')),
);
?>

<h1>Propiedad intelectual: Derecho de Autor</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>