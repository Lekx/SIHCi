<?php
/* @var $this CertificationsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Certifications',
);

$this->menu=array(
	array('label'=>'Crear', 'url'=>array('create')),
	array('label'=>'Gestionar', 'url'=>array('admin')),
);
?>

<h1>Certificaciones por Concejos  Médicos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
