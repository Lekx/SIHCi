<?php
/* @var $this BooksChaptersController */
/* @var $model BooksChapters */

$this->breadcrumbs=array(
	'Books Chapters'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BooksChapters', 'url'=>array('index')),
	array('label'=>'Create BooksChapters', 'url'=>array('create')),
	array('label'=>'View BooksChapters', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage BooksChapters', 'url'=>array('admin')),
);
?>

<h1>Update BooksChapters <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>