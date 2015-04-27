<?php
/* @var $this BooksChaptersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Books Chapters',
);

$this->menu=array(
	array('label'=>'Crear', 'url'=>array('create')),
	array('label'=>'Gestionar', 'url'=>array('admin')),
);
?>

<h1>Books Chapters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
