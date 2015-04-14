<?php
/* @var $this BooksChaptersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Books Chapters',
);

$this->menu=array(
	array('label'=>'Crear Capitulo', 'url'=>array('create')),
	array('label'=>'Administrar Capitulo', 'url'=>array('admin')),
);
?>

<h1>Capitulos de Libros</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
