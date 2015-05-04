<?php
/* @var $this BooksChaptersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Books Chapters',
);

$this->menu=array(
	array('label'=>'Gestionar', 'url'=>array('admin')),
	array('label'=>'Crear', 'url'=>array('create')),
);
?>

<h1>Cap&iacute;tulos de libros</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
