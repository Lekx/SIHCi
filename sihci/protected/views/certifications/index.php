<?php
/* @var $this CertificationsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Certifications',
);

$this->menu=array(
	array('label'=>'Crear Certificaciones', 'url'=>array('create')),
	array('label'=>'Administrar Certificaciones', 'url'=>array('admin')),
);
?>

<h1>Certificaciones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
