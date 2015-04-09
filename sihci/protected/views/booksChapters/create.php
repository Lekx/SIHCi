<?php
/* @var $this BooksChaptersController */
/* @var $model BooksChapters */

$this->breadcrumbs=array(
	'Books Chapters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BooksChapters', 'url'=>array('index')),
	array('label'=>'Manage BooksChapters', 'url'=>array('admin')),
);
?>

<h1>Create BooksChapters</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>