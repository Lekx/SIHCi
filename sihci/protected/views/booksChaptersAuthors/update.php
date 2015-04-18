<?php
/* @var $this BooksChaptersAuthorsController */
/* @var $model BooksChaptersAuthors */

$this->breadcrumbs=array(
	'Books Chapters Authors'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BooksChaptersAuthors', 'url'=>array('index')),
	array('label'=>'Create BooksChaptersAuthors', 'url'=>array('create')),
	array('label'=>'View BooksChaptersAuthors', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage BooksChaptersAuthors', 'url'=>array('admin')),
);
?>

<h1>Update BooksChaptersAuthors <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>