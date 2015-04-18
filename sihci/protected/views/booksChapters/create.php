<?php
/* @var $this BooksChaptersController */
/* @var $model BooksChapters */

$this->breadcrumbs=array(
	'Books Chapters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Capitulos', 'url'=>array('index')),
	array('label'=>'Administrar Capitulos', 'url'=>array('admin')),
);
?>

<h1>Crear Capitulos</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'modelAuthors'=>$modelAuthors)); ?>