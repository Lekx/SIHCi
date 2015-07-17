<?php
/* @var $this BooksChaptersAuthorsController */
/* @var $model BooksChaptersAuthors */

$this->breadcrumbs=array(
	'Books Chapters Authors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BooksChaptersAuthors', 'url'=>array('index')),
	array('label'=>'Manage BooksChaptersAuthors', 'url'=>array('admin')),
);
?>

<h1>Create BooksChaptersAuthors</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>